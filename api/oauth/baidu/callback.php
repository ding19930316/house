<?php
require '../../../common.inc.php';
require 'init.inc.php';
$_REQUEST['code'] or dalert('Error Request.', $MODULE[2]['linkurl'].$AJ['file_login'].'?step=callback&site='.$site);
$par = 'grant_type=authorization_code'
	 . '&code='.$_REQUEST['code']
	 . '&client_id='.BD_ID
	 . '&client_secret='.BD_SECRET
	 . '&redirect_uri='.urlencode(BD_CALLBACK);
$cur = curl_init(BD_TOKEN_URL);
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
	$_SESSION['bd_access_token'] = $arr['access_token'];
	dheader('index.php?time='.$AJ_TIME);
} else {
	dalert('Error Token.', $MODULE[2]['linkurl'].$AJ['file_login'].'?step=token&site='.$site);
}
?>