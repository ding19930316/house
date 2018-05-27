<?php
/*
	[Aijiacms System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
require 'common.inc.php';
$username = $domain = '';
if(isset($homepage) && check_name($homepage)) {
	$username = $homepage;
} else if(!$cityid) {
	$host = get_env('host');
	if(substr($host, 0, 4) == 'www.') {
		$whost = $host;
		$host = substr($host, 4);
	} else {
		$whost = $host;
	}
	if(strpos(AJ_PATH, $host) === false) {
		$www = str_replace($CFG['com_domain'], '', $host);
		if(check_name($www)) {
			$username = $homepage = $www;
		} else {
			if($whost == $host) {//301 xxx.com to www.xxx.com
				$w3 = 'www.'.$host;
				$c = $db->get_one("SELECT userid FROM {$AJ_PRE}company WHERE domain='$w3'");
				if($c) d301('http://'.$w3);
			}
			$c = $db->get_one("SELECT username,domain FROM {$AJ_PRE}company WHERE domain='$whost'".($host == $whost ? '' : " OR domain='$host'"), 'CACHE');
			if($c) {
				$username = $homepage = $c['username'];
				$domain = $c['domain'];
			}
		}
	}
}
if($username) {
	$moduleid = 4;
	$module = 'company';
	$MOD = cache_read('module-'.$moduleid.'.php');
	include load('company.lang');
	require AJ_ROOT.'/module/'.$module.'/common.inc.php';
	include AJ_ROOT.'/module/'.$module.'/init.inc.php';
} else {
	if($AJ['safe_domain']) {
		$safe_domain = explode('|', $AJ['safe_domain']);
		$pass_domain = false;
		foreach($safe_domain as $v) {
			if(strpos($AJ_URL, $v) !== false) { $pass_domain = true; break; }
		}
		$pass_domain or dhttp(404);
	}
	if($AJ['index_html']) {
		$html_file = $CFG['com_dir'] ? AJ_ROOT.'/'.$AJ['index'].'.'.$AJ['file_ext'] : AJ_CACHE.'/index.inc.html';
		if(!is_file($html_file)) tohtml('index');		
		if(is_file($html_file)) exit(include($html_file));
	}
		if($AJ['city']){
$mainarea = get_mainarea($cityid);
$xiqoqu = get_xiqoqu($cityid);

}else{
$mainarea = get_mainarea(0);
$xiqoqu = get_xiqoqu(0);
}
	$AREA or $AREA = cache_read('area.php');
	if($EXT['wap_enable']) $head_mobile = $EXT['wap_url'];
	$seo_title = $AJ['seo_title'];
	$head_keywords = $AJ['seo_keywords'];
	$head_description = $AJ['seo_description'];
	if($city_template) {
		include template($city_template, 'city');
	} else {		
		include template('index');
	}
}
?>