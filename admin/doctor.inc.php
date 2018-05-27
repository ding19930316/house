<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$menus = array (
    array('系统体检', '?file='.$file),
    array('PHP信息', '?file='.$file.'&action=phpinfo', ' target="_blank"'),
);
if($action == 'phpinfo') {
	phpinfo();
} else {
	include tpl('doctor');
}
?>