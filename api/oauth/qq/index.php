<?php
require '../../../common.inc.php';
require 'init.inc.php';
$success = 0;
$DS = array();
if($_SESSION['qq_access_token']) {
	$par = 'access_token='.$_SESSION['qq_access_token'];
	$cur = curl_init(QQ_ME_URL);
	curl_setopt($cur, CURLOPT_POST, 1);
	curl_setopt($cur, CURLOPT_POSTFIELDS, $par);
	curl_setopt($cur, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($cur, CURLOPT_HEADER, 0);
	curl_setopt($cur, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1);
	$rec = curl_exec($cur);
	curl_close($cur);
	if(strpos($rec, 'client_id') !== false) {
		$rec = str_replace('callback(', '', $rec);
		$rec = str_replace(');', '', $rec);
		$rec = trim($rec);
		$arr = json_decode($rec, true);
		$openid = $arr['openid'];		
		if($OAUTH[$site]['sync']) set_cookie('qq_openid', encrypt($openid), $AJ_TIME + $_SESSION['qq_access_time']);
		$par = 'access_token='.$_SESSION['qq_access_token'].'&oauth_consumer_key='.QQ_ID.'&openid='.$openid;
		$cur = curl_init(QQ_USERINFO_URL);
		curl_setopt($cur, CURLOPT_POST, 1);
		curl_setopt($cur, CURLOPT_POSTFIELDS, $par);
		curl_setopt($cur, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($cur, CURLOPT_HEADER, 0);
		curl_setopt($cur, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1);
		$rec = curl_exec($cur);
		curl_close($cur);
		if(strpos($rec, 'nickname') !== false) {
			$success = 1;
			$arr = json_decode($rec, true);
			$nickname = convert($arr['nickname'], 'utf-8', AJ_CHARSET);
			$avatar = $arr['figureurl_2'];
			$url = '';
			$DS = array('qq_access_token', 'qq_access_time', 'state');
		}
	}
}
require '../aijiacms.inc.php';
?>