<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
require AJ_ROOT.'/include/post.func.php';
$head_title = $L['goto'];
$email = isset($email) && is_email($email) ? $email : '';
if($email) {
	$tmp = explode('@', $email);
	$url = str_replace('vip.', '', $tmp[1]);
	$url = 'http://mail.'.$url;
} else {
	$url = 'http://';
}
include template('goto', $module);
?>