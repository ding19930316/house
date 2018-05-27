<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
if(!$MOD['show_html'] || !$itemid) return false;
$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
$id=rentcookies($itemid);
if(!$item || $item['status'] < 3) return false;
extract($item);
$CAT = get_cat($catid);
$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
$t = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
$content = $t['content'];
if($MOD['keylink']) $content = keylink($content, $moduleid);

$CP = $MOD['cat_property'] && $CAT['property'];
if($CP) {
	require_once AJ_ROOT.'/include/property.func.php';
	$options = property_option($catid);
	$values = property_value($moduleid, $itemid);
}
if($AJ['city']){
$mainarea = get_mainarea($cityid);
}else{
$mainarea = get_mainarea(0);}

//同小区其他  10条记录
$tqy =$db->query("SELECT * FROM  {$table} WHERE  houseid=$houseid and $itemid != itemid  ORDER BY itemid DESC LIMIT 0,5");
	while($tqys=$db->fetch_array($tqy)){
      $same_xiaoqu_list[]=$tqys;
	     }
$CP = $MOD['cat_property'] && $CAT['property'];
if($CP) {
	require AJ_ROOT.'/include/property.func.php';
	$options = property_option($catid);
	$values = property_value($moduleid, $itemid);
}
$maincat = get_maincat($child ? $catid : $parentid, $moduleid);
if($AJ['city']){
$mainarea = get_mainarea($cityid);
}else{
$mainarea = get_mainarea(0);}
$adddate = timetodate($addtime, 3);
$editdate = timetodate($edittime, 3);
$danjia=floor($price*10000/$houseearm);
$todate = $totime ? timetodate($totime, 3) : 0;
$expired = $totime && $totime < $AJ_TIME ? true : false;
$fileurl = $linkurl;
$linkurl = $MOD['linkurl'].$linkurl;
$thumbs = get_albums($item);
$albums =  get_albums($item, 1);
$amount = number_format($amount, 0, '.', '');
$fee = get_fee($item['fee'], $MOD['fee_view']);
$user_status = 4;
$seo_file = 'show';
include AJ_ROOT.'/include/seo.inc.php';
$template = $item['template'] ? $item['template'] : ($CAT['show_template'] ? $CAT['show_template'] : 'show');
$aijiacms_task = "moduleid=$moduleid&html=show&itemid=$itemid";
if($EXT['wap_enable']) $head_mobile = $EXT['wap_url'].'index.php?moduleid='.$moduleid.'&itemid='.$itemid.($page > 1 ? '&page='.$page : '');
ob_start();
include template($template, $module);
$data = ob_get_contents();
ob_clean();
$filename = AJ_ROOT.'/'.$MOD['moduledir'].'/'.$fileurl;
if($AJ['pcharset']) $filename = convert($filename, AJ_CHARSET, $AJ['pcharset']);
file_put($filename, $data);
return true;
?>