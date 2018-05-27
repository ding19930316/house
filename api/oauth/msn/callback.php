<?php
require '../../../common.inc.php';
require 'init.inc.php';
$_REQUEST['code'] or dalert('Error Request.', $MODULE[2]['linkurl'].$AJ['file_login'].'?step=callback&site='.$site);
$par = 'client_id='.urlencode(WRAP_CLIENT_ID)
	 . '&redirect_uri='.urlencode(WRAP_CALLBACK)
	 . '&client_secret='.urlencode(WRAP_CLIENT_SECRET)
	 . '&code='.urlencode($_REQUEST['code'])
	 . '&grant_type=authorization_code';
$cur = curl_init(WRAP_ACCESS_URL);
curl_setopt($cur, CURLOPT_POST, 1);
curl_setopt($cur, CURLOPT_POSTFIELDS, $par);
curl_setopt($cur, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($cur, CURLOPT_HEADER, 0);
curl_setopt($cur, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1);
$rec = curl_exec($cur);
curl_close($cur);
if(strpos($rec, 'access_token') !== false) {
	$arr = json_decode($rec, true);
	$_SESSION['access_token'] = $arr['access_token'];
	dheader('index.php?time='.$AJ_TIME);
} else {
	dalert('Error Token.', $MODULE[2]['linkurl'].$AJ['file_login'].'?step=token&site='.$site);
}
?>