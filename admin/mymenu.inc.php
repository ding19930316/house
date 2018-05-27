<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/admin/admin.class.php';
$do = new admin;
$menus = array (
    array('我的面板', '?file='.$file),
);
if($submit) {
	if($do->update($_userid, $right, $_admin)) dmsg('更新成功', '?file='.$file.'&update=1');
	msg($do->errmsg);
} else {
	$dmenus = $do->get_menu($_userid);
	include tpl('mymenu');
}
?>