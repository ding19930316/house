<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
if(!check_group($_groupid, $MOD['group_index'])) include load('403.inc');
$typeid = isset($typeid) ? intval($typeid) : 99;
 if($AJ['city']){
$mainarea = get_mainarea($cityid);
$xiqoqu = get_xiqoqu($cityid);

}else{
$mainarea = get_mainarea(0);
$xiqoqu = get_xiqoqu(0);
}
isset($TYPE[$typeid]) or $typeid = 99;
$dtype = $typeid != 99 ? " AND typeid=$typeid" : '';
$maincat = get_maincat($catid ? $CAT['parentid'] : 0, $moduleid);
//ср╠ъД╞юю╧Щ╥©т╢
if($_COOKIE['SRecentlyGoods']){
	$browseHouse = browsesale($_COOKIE['SRecentlyGoods']);
  
 }
$seo_file = 'index';
include AJ_ROOT.'/include/seo.inc.php';
if($catid) $seo_title = $seo_catname.$seo_title;
if($typeid != 99) $seo_title = $TYPE[$typeid].$seo_delimiter.$seo_title;
if($page == 1) $head_canonical = $MOD['linkurl'];
$aijiacms_task = "moduleid=$moduleid&html=index";
if($EXT['wap_enable']) $head_mobile = $EXT['wap_url'].'index.php?moduleid='.$moduleid.($page > 1 ? '&page='.$page : '');
include template($MOD['template_index'] ? $MOD['template_index'] : 'index', $module);
?>