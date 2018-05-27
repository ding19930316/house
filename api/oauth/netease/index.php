<?php
require '../../../common.inc.php';
require 'init.inc.php';
$success = 0;
$DS = array();
if($_SESSION['ne_access_token']) {	
	$url = NE_USERINFO_URL.'?access_token='.$_SESSION['ne_access_token'];
	$cur = curl_init($url);
	curl_setopt($cur, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($cur, CURLOPT_HEADER, 0);
	curl_setopt($cur, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1);
	$rec = curl_exec($cur);
	curl_close($cur);
	if(strpos($rec, 'userId') !== false) {
		$success = 1;
		$arr = json_decode($rec, true);
		$openid = $arr['userId'];
		$nickname = isset($arr['username']) ? convert($arr['username'], 'utf-8', AJ_CHARSET) : $arr['userId'];
		$avatar = '';
		$url = '';
		$DS = array('ne_access_token');
	}
}
require '../aijiacms.inc.php';
?>