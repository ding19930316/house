<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$typeid = isset($typeid) && isset($TYPE[$typeid]) ? intval($typeid) : 99;
if(!$MOD['list_html'] || !$catid) return false;
$CAT or $CAT = get_cat($catid);
if(!$CAT) return false;
unset($CAT['moduleid']);
extract($CAT);
$CP = $MOD['cat_property'] && $CAT['property'];
if($MOD['cat_property'] && $CAT['property']) {
	require_once AJ_ROOT.'/include/property.func.php';
	$PPT = property_condition($catid);
}
$maincat = get_maincat($child ? $catid : $parentid, $moduleid);
$areaids=$_GET['areaid'];
if($AJ['city']){
$mainarea = get_mainarea($cityid);
$mainareas = get_mainarea2($areaids);
}else{
$mainarea = get_mainarea(0);
$mainareas = get_mainarea3($areaids);}
//右边浏览过房源
if($_COOKIE['RRecentlyGoods']){
	$browseHouse = browseHouse($_COOKIE['RRecentlyGoods']);
  
 }
$condition = 'status=3';
$condition .= ($CAT['child']) ? " AND catid IN (".$CAT['arrchildid'].")" : " AND catid=$catid";
if($page == 1) {
	$items = $db->count($table, $condition);
	if($items != $CAT['item']) {
		$CAT['item'] = $items;
		$db->query("UPDATE {$AJ_PRE}category SET item=$items WHERE catid=$catid");
	}
} else {
	$items = $CAT['item'];
}
if($typeid != 99) $condition .= " AND typeid=$typeid";	
$pagesize = $MOD['pagesize'];
$showpage = 1;
$datetype = 5;
$template = $CAT['template'] ? $CAT['template'] : 'list';
$total = max(ceil($items/$MOD['pagesize']), 1);
if(isset($fid) && isset($num)) {
	$page = $fid;
	$topage = $fid + $num - 1;
	$total = $topage < $total ? $topage : $total;
}
for(; $page <= $total; $page++) {
	$offset = ($page-1)*$pagesize;
	$items = $db->count($table, $condition, $CFG['db_expires']);
	$itemsale=$items;
    $pages = pages($items, $page, $pagesize);
verify();
	$tags = array();
	$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE {$condition} ORDER BY ".$MOD['order']." LIMIT {$offset},{$pagesize}");
	while($r = $db->fetch_array($result)) {
		$r['adddate'] = timetodate($r['addtime'], 5);
		$r['editdate'] = timetodate($r['edittime'], 5);
		$r['alt'] = $r['title'];
		$r['title'] = set_style($r['title'], $r['style']);
		$r['linkurl'] = $MOD['linkurl'].$r['linkurl'];
		$tags[] = $r;
	}
	$seo_file = 'list';
	include AJ_ROOT.'/include/seo.inc.php';
	$aijiacms_task = "moduleid=$moduleid&html=list&catid=$catid&page=$page";
	$filename = AJ_ROOT.'/'.$MOD['moduledir'].'/'.listurl($CAT, $page);
	ob_start();
	include template($template, $module);
	$data = ob_get_contents();
	ob_clean();
	if($AJ['pcharset']) $filename = convert($filename, AJ_CHARSET, $AJ['pcharset']);
	file_put($filename, $data);
	if($page == 1) {
		$indexname = AJ_ROOT.'/'.$MOD['moduledir'].'/'.listurl($CAT, 0);
		if($AJ['pcharset']) $indexname = convert($indexname, AJ_CHARSET, $AJ['pcharset']);
		file_copy($filename, $indexname);
	}
}
return true;
?>