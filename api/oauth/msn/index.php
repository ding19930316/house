<?php
require '../../../common.inc.php';
require 'init.inc.php';
$success = 0;
$DS = array();
if($_SESSION['access_token']) {
	$url = 'https://apis.live.net/v5.0/me?access_token='.$_SESSION['access_token'];
	$cur = curl_init($url);
	curl_setopt($cur, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($cur, CURLOPT_HEADER, 0);
	curl_setopt($cur, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1);
	$rec = curl_exec($cur);
	curl_close($cur);
	$arr = json_decode($rec, true);
	if(isset($arr['id'])) {
		$success = 1;
		$openid = $arr['id'];
		if($arr['first_name']) {
			$nickname = convert($arr['first_name'], 'utf-8', AJ_CHARSET);
		} else {
			$nickname = $arr['emails']['account'];
			$nickname = str_replace(strstr($nickname, '@'), '', $nickname);
		}
		$avatar = '';
		$url = $arr['link'];
		$DS = array('access_token');
	}
}
require '../aijiacms.inc.php';
?>