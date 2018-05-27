<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
$username = $domain = '';
$condition = "groupid>5 ";
$items = $db->count($table, $condition, $CFG['db_expires']);
if(isset($homepage) && check_name($homepage)) {
	$username = $homepage;
} else {
	$host = get_env('host');
	if(substr($host, 0, 4) == 'www.') {
		$whost = $host;
		$host = substr($host, 4);
	} else {
		$whost = $host;
	}
	if(strpos($MODULE[4]['linkurl'], $host) === false) {
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
	include AJ_ROOT.'/module/'.$module.'/init.inc.php';
} else {
	if(strpos($AJ_URL, $MOD['linkurl']) === false) dhttp(404);
	if($AJ['safe_domain']) {
		$safe_domain = explode('|', $AJ['safe_domain']);
		$pass_domain = false;
		foreach($safe_domain as $v) {
			if(strpos($AJ_URL, $v) !== false) { $pass_domain = true; break; }
		}
		$pass_domain or dhttp(404);
	}
	if(!check_group($_groupid, $MOD['group_index'])) include load('403.inc');
	if($MOD['index_html']) {	
		$html_file = AJ_ROOT.'/'.$MOD['moduledir'].'/index.inc.html';
		if(!is_file($html_file)) tohtml('index', $module);
		if(is_file($html_file)) exit(include($html_file));
	}
	$seo_file = 'index';
	include AJ_ROOT.'/include/seo.inc.php';
	if($page == 1) $head_canonical = $MOD['linkurl'];
	if($EXT['wap_enable']) $head_mobile = $EXT['wap_url'].'index.php?moduleid='.$moduleid.($page > 1 ? '&page='.$page : '');
	$aijiacms_task = "moduleid=$moduleid&html=index";
	include template('index', $module);
}
?>