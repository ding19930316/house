<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
$MOD['announce_enable'] or dheader(AJ_PATH);
$TYPE = get_type('announce', 1);
require MD_ROOT.'/announce.class.php';
$do = new announce();
$typeid = isset($typeid) ? intval($typeid) : 0;
if($itemid) {
	$do->itemid = $itemid;
	$item = $do->get_one();
	$item or dheader(AJ_PATH);
	extract($item);
	$adddate = timetodate($addtime, 3);
	$fromdate = $fromtime ? timetodate($fromtime, 3) : $L['timeless'];
	$todate = $totime ? timetodate($totime, 3) : $L['timeless'];
	$db->query("UPDATE {$AJ_PRE}announce SET hits=hits+1 WHERE itemid=$itemid");
	$head_title = $head_keywords = $head_description = $title.$AJ['seo_delimiter'].$L['announce_title'];
	$template = $item['template'] ? $item['template'] : 'announce';
	include template($template, $module);
} else {
	$head_title = $head_keywords = $head_description = $L['announce_title'];
	$condition = '1';
	if($typeid) $condition .= " AND typeid=$typeid";
	if($keyword) $condition .= " AND title LIKE '%$keyword%'";
	if($cityid) $condition .= ($AREA[$cityid]['child']) ? " AND areaid IN (".$AREA[$cityid]['arrchildid'].")" : " AND areaid=$cityid";
	$lists = $do->get_list($condition, 'listorder DESC,itemid DESC');
	include template('announce', $module);
}
?>