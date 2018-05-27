<?php
/*
	[Aijiacms HOUSE System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
class dsession {
	var $obj;

    function dsession() {
		$this->obj = new Redis;
		include AJ_ROOT.'/file/config/redis.inc.php';
		$num = count($RedisServer);
		if($num == 1) {
			$key = 0;
		} else {
			$key = get_cookie('redis');
			if($key == -1) {
				$key = 0;
			} else if(!isset($RedisServer[$key])) {
				$key = array_rand($RedisServer);
				set_cookie('redis', $key ? $key : -1);
			}
		}
		$this->obj->connect($RedisServer[$key]['host'], $RedisServer[$key]['port']);

		if(AJ_DOMAIN) @ini_set('session.cookie_domain', '.'.AJ_DOMAIN);
    	session_set_save_handler(array(&$this,'open'), array(&$this,'close'), array(&$this,'read'), array(&$this,'write'), array(&$this,'destroy'), array(&$this,'gc'));
		session_cache_limiter('private, must-revalidate');
		session_start();
		header("cache-control: private");
    }

	function open($path, $name) {
		return true;
	}

	function close() {
		return true;
	}

	function read($sid) {
		return $this->obj->get($sid);
	}

	function write($sid, $data) {
		return $this->obj->setex($sid, 1800, $data);
	}

	function destroy($sid) {
	     return $this->obj->delete($sid);
	}

	function gc() {
	    return true;
	}
}
?>