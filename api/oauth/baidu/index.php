<?php
require '../../../common.inc.php';
require 'init.inc.php';
$success = 0;
$DS = array();
if($_SESSION['bd_access_token']) {
	$par = 'access_token='.$_SESSION['bd_access_token'];
	$cur = curl_init(BD_USERINFO_URL);
	curl_setopt($cur, CURLOPT_POST, 1);
	curl_setopt($cur, CURLOPT_POSTFIELDS, $par);
	curl_setopt($cur, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($cur, CURLOPT_HEADER, 0);
	curl_setopt($cur, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1);
	$rec = curl_exec($cur);
	curl_close($cur);
	if(strpos($rec, 'uname') !== false) {
		$success = 1;
		$arr = json_decode($rec, true);
		$openid = $arr['uid'];
		$nickname = convert($arr['uname'], 'utf-8', AJ_CHARSET);
		$avatar = '';
		$url = '';
		$DS = array('bd_access_token');
	}
}
require '../aijiacms.inc.php';
?>