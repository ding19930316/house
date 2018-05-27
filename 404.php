<?php
/*
	[aijiacms System] Copyright (c) 2008-2011 aijiacms.com
	This is NOT a freeware, use is subject to license.txt
*/
require 'common.inc.php';
if(strpos($_SERVER['QUERY_STRING'], '404;') !== false) {
	$AJ_URL = str_replace('404;', '', $_SERVER['QUERY_STRING']);
	$AJ_URL = str_replace(':80', '', $AJ_URL);
}
if($AJ['log_404'] && strpos($AJ_URL, '/404.php') === false) {
	require AJ_ROOT.'/file/config/robot.inc.php';
	$url = addslashes($AJ_URL);
	$time = $AJ_TIME - 86400;
	$r = $db->get_one("SELECT itemid FROM {$AJ_PRE}404 WHERE addtime>$time AND url='$url'");
	if(!$r) $db->query("INSERT INTO {$AJ_PRE}404 (url,robot,username,ip,addtime) VALUES ('$url','".get_robot()."','$_username','$AJ_IP','$AJ_TIME')");
}
$head_title = '404 Not Found';
@header("HTTP/1.1 404 Not Found");
include template('404', 'message');
?>