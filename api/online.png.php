<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
define('AJ_NONUSER', true);
require '../common.inc.php';
if($AJ_BOT) dhttp(403);
$username = isset($username) ? trim($username) : '';
$userid = isset($userid) ? intval($userid) : 0;
$style = isset($style) ? intval($style) : 0;
$online = 0;
if(check_name($username)) {
	$o = $db->get_one("SELECT online FROM {$AJ_PRE}online WHERE username='$username'");
	if($o && $o['online']) $online = 1;
} else if($userid) {
	$o = $db->get_one("SELECT online FROM {$AJ_PRE}online WHERE userid=$userid");
	if($o && $o['online']) $online = 1;
}
$ico = AJ_STATIC.'file/image/web'.($style ? $style : '').($online ? '' : '-off').'.gif';
dheader($ico);
?>