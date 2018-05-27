<?php
/*
	[Aijiacms System] Copyright (c) 2008-2013 Aijiacms com
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$table = $AJ_PRE.'webpage';
if($itemid) {
	$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
	($item && $item['item'] == 1) or wap_msg($L['msg_not_exist']);
	$_item = $item['item'];
	unset($item['item']);
	extract($item);	
	if($TP == 'touch') {
		$head_link = 'index.php?action='.$action;
		$head_name = $L['wap_about'];
		$back_link = 'javascript:Dback(\''.$head_link.'\');';
		$pages = '';
	} else {
		$content = strip_tags($content);
		$content = preg_replace("/\&([^;]+);/i", '', $content);
		$contentlength = strlen($content);
		if($contentlength > $maxlength) {
			$start = ($page-1)*$maxlength;
			$content = dsubstr($content, $maxlength, '', $start);
			$pages = wap_pages($contentlength, $page, $maxlength);
		}
		$content = nl2br($content);
	}
	$editdate = timetodate($edittime, 5);
	$db->query("UPDATE {$table} SET hits=hits+1 WHERE itemid=$itemid");
	$head_title = $title.$AJ['seo_delimiter'].$L['wap_about'].$AJ['seo_delimiter'].$head_title;
} else {
	$head_title = $L['wap_about'].$AJ['seo_delimiter'].$head_title;
	$lists = array();
	$result = $db->query("SELECT * FROM {$table} WHERE item=1 ORDER BY listorder desc,itemid desc");
	while($r = $db->fetch_array($result)) {
		$r['stitle'] = dsubstr($r['title'], $len);
		$lists[] = $r;
	}
	$db->free_result($result);
	if($TP == 'touch') {
		$head_link = 'index.php?action='.$action;
		$head_name = $L['wap_about'];
		$back_link = 'index.php';
	}
}
include template('about', $TP);
?>