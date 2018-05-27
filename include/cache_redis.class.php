<?php
/*
	[Aijiacms HOUSE System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
class dcache {
	var $pre;
	var $obj;

    function dcache() {
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
    }

	function get($key) {
        return $this->obj->get($this->pre.$key);
    }

    function set($key, $val, $ttl = 600) {
         return $ttl ? $this->obj->setex($this->pre.$key, $ttl, $val) : $this->obj->set($this->pre.$key, $val);
    }

    function rm($key) {
        return $this->obj->delete($this->pre.$key);
    }

    function clear() {
        return $this->obj->flushAll();
    }

	function expire() {
		return true;
	}
}
?>