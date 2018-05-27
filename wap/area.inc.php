<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$AREA = cache_read('area.php');
$pid = isset($pid) ? intval($pid) : 0;
$lists = array();
foreach($AREA as $a) {
	if($a['parentid'] == $pid) $lists[] = $a;
}
$head_title = $MOD['name'].$AJ['seo_delimiter'].$head_title;
include template('area', $TP);
?>