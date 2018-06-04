<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
if($CFG['authadmin'] == 'cookie') {
	set_cookie($secretkey, '');
} else {
	session_destroy();
}
// exit("111");
$db->query("DELETE FROM {$db->pre}online WHERE userid=$_userid");
set_cookie('auth', '');
set_cookie('userid', '');
msg('已经安全退出网站后台管理', '?');
?>
