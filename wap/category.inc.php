<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$pid = isset($pid) ? intval($pid) : 0;
$lists = get_maincat($pid, $moduleid);
$head_title = $MOD['name'].$AJ['seo_delimiter'].$head_title;
include template('category', $TP);
?>