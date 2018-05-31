<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
// print_r($module);exit;
if(!check_group($_groupid, $MOD['group_search'])) {
	$head_title = lang('message->without_permission');
	include template('noright', 'message');
	exit;
}

// print_r($table);exit;
require AJ_ROOT.'/include/post.func.php';
include load('search.lang');
$CP = $MOD['cat_property'] && $catid && $CAT['property'];
$maincat = get_maincat($child ? $catid : $parentid, $moduleid);

if($AJ['city']){
$mainarea = get_mainarea($cityid);
}else{
$mainarea = get_mainarea(0);}
$list = isset($list) && in_array($list, array(0, 1, 2)) ? $list : 0;
$category_select = ajax_category_select('catid', $L['all_category'], $catid, $moduleid);
if(!$areaid && $cityid && strpos($AJ_URL, 'areaid') === false) {
	$areaid = $cityid;
	$ARE = $AREA[$cityid];
}
$area_select = ajax_area_select('areaid', $L['all_area'], $areaid);

if($MOD['sphinx']) exit(include MD_ROOT.'/sphinx.inc.php');

$thumb = isset($thumb) ? intval($thumb) : 0;
$price = isset($price) ? intval($price) : 0;
$letter = isset($letter) ? intval($letter) : 0;
$vip = isset($vip) ? intval($vip) : 0;
$day = isset($day) ? intval($day) : 0;
$minprice = isset($minprice) ? dround($minprice) : '';
$minprice or $minprice = '';
$maxprice = isset($maxprice) ? dround($maxprice) : '';
$maxprice or $maxprice = '';
$typeid = isset($typeid) && isset($TYPE[$typeid]) ? intval($typeid) : 99;
if($day) $fromdate = timetodate($AJ_TIME-$day*86400, 'Ymd');
$fromdate = isset($fromdate) && preg_match("/^([0-9]{8})$/", $fromdate) ? $fromdate : '';
$fromtime = $fromdate ? strtotime($fromdate.' 0:0:0') : 0;
$todate = isset($todate) && preg_match("/^([0-9]{8})$/", $todate) ? $todate : '';
$totime = $todate ? strtotime($todate.' 23:59:59') : 0;
$sfields = array($L['by_auto'], $L['by_title'], $L['by_content'], $L['by_introduce'], $L['by_company'], $L['by_brand']);
$dfields = array('keyword', 'title', 'content', 'introduce', 'company', 'brand');
$sorder  = array($L['order'], $L['order_auto'], $L['price_dsc'], $L['price_asc'], $L['vip_dsc'], $L['vip_asc'], $L['houseearm_dsc'], $L['houseearm_asc'], $L['edittime_dsc'], $L['edittime_asc']);
$dorder  = array($MOD['order'], '', 'price DESC', 'price ASC', 'vip DESC', 'vip ASC', 'houseearm DESC', 'houseearm ASC', 'edittime DESC', 'edittime ASC');
if(!$MOD['fulltext']) unset($sfields[2], $dfields[2]);
isset($fields) && isset($dfields[$fields]) or $fields = 0;
isset($order) && isset($dorder[$order]) or $order = 0;
$order_select  = dselect($sorder, 'order', '', $order);
$type_select = dselect($TYPE, 'typeid', $L['all_type'], $typeid);
$tags = $PPT = array();//PPT
if($AJ_QST) {
	if($kw) {
		if(strlen($kw) < $AJ['min_kw'] || strlen($kw) > $AJ['max_kw']) message(lang($L['word_limit'], array($AJ['min_kw'], $AJ['max_kw'])), $MOD['linkurl'].'search.php');
		if($AJ['search_limit'] && $page == 1) {
			if(($AJ_TIME - $AJ['search_limit']) < get_cookie('last_search')) message(lang($L['time_limit'], array($AJ['search_limit'])), $MOD['linkurl'].'search.php');
			set_cookie('last_search', $AJ_TIME);
		}
	}

	$pptsql = '';
	if($CP) {
		require AJ_ROOT.'/include/property.func.php';
		$PPT = property_condition($catid);
		foreach($PPT as $k=>$v) {
			$PPT[$k]['select'] = '';
			$oid = $v['oid'];
			$tmp = 'ppt_'.$oid;
			if(isset($$tmp)) {
				$PPT[$k]['select'] = $tmp = $$tmp;
				if($tmp && in_array($tmp, $v['options'])) {
					$tmp = 'O'.$oid.':'.$tmp.';';
					$pptsql .= " AND pptword LIKE '%$tmp%'";
				}
			}
		}
	}


	$fds = $MOD['fields'];

	$condition = '';
	if($catid) $condition .= $CAT['child'] ? " AND catid IN (".$CAT['arrchildid'].")" : " AND catid=$catid";
	if($areaid) $condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	if($thumb) $condition .= " AND thumb<>''";
	if($vip) $condition .= " AND vip>0";

	//价目格范围
	if($p== 1){
			$condition.=' AND price<30';
		}
	if($p == 2){
			$condition.=" AND price>=30  AND price<50";

		}
	if($p == 3){
			$condition.=' AND 50<=price AND price<80';

		}
	if($p== 4){
			$condition.=' AND 80<=price AND price<100';
		}
	if($p == 5){
			$condition.=' AND 100<=price AND price<120';
		}
	if($p == 6){
			$condition.=' AND 120<=price AND price<150';
		}
	if($p == 7){
			$condition.=' AND 150<=price AND price<200';
		}
			//面积范围
	if($a== 1){
			$condition.=' AND houseearm<40';
		}
	if($a == 2){
			$condition.=" AND houseearm>40  AND houseearm<60";}
	if($a == 3){
			$condition.=' AND 60<=houseearm AND houseearm<80';

		}
	if($a== 4){
			$condition.=' AND 80<=houseearm AND houseearm<100';
		}
	if($a == 5){
			$condition.=' AND 100<=houseearm AND houseearm<120';
		}
	if($a == 6){
			$condition.=' AND 120<=houseearm AND houseearm<150';
		}
	if($a == 7){
			$condition.=' AND 150<=houseearm';
		}
		//户型范围
	if($r== 1){
			$condition.=' AND room=1';
		}
	if($r == 2){
			$condition.=" AND room=2";}
	if($r == 3){
			$condition.=' AND room=3';

		}
	if($r== 4){
			$condition.=' AND room=4';
		}
	if($r == 5){
			$condition.=' AND 5<=room ';
		}

	//list_order 排序转换
switch ($_GET['order']){
	case "dd":
		$order = " order by price/houseearm desc";
		break;
	case "da":
		$order = " order by price/houseearm asc";
		break;
	case "ed":
		$order = " order by edittime desc";
		break;
		case "ea":
		$order = " order by edittime asc";
		break;
	case "pa":
		$order = " order by price asc";
		break;
	case "pd":
		$order = " order by price desc";
		break;
	case "ha":
		$order = " order by houseearm asc";
		break;
	case "hd":
		$order = " order by houseearm desc";
		break;
	default:
		$order = " order by itemid desc";
		break;
}

$letter = $_GET['letter'];
if($letter){
	$condition .= " and letter like '".$letter."%'";

}

	//if($price) $condition .= " AND price>0 AND unit<>''";
	if($minprice)  $condition .= " AND price>=$minprice";
	if($maxprice)  $condition .= " AND price<=$maxprice";
	if($typeid != 99) $condition .= " AND typeid=$typeid";
	if($fromtime) $condition .= " AND edittime>=$fromtime";
	if($totime) $condition .= " AND edittime<=$totime";
	if($dfields[$fields] == 'content') {
		if($keyword && $MOD['fulltext'] == 1) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		$condition = str_replace('AND ', 'AND i.', $condition);
		$condition = str_replace('i.content', 'd.content', $condition);
		$condition = "i.status=3 AND i.itemid=d.itemid".$condition;
		if($keyword && $MOD['fulltext'] == 2) $condition .= " AND MATCH(`content`) AGAINST('$kw'".(preg_match("/[+-<>()~*]/", $kw) ? ' IN BOOLEAN MODE' : '').")";
		$table = $table.' i,'.$table_data.' d';
		// print_r($table);exit;
		$fds = 'i.'.str_replace(',', ',i.', $fds);
	} else {
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($pptsql) $condition .= $pptsql;//PPT
		$condition = "status=3".$condition;
	}

	$pagesize = $MOD['pagesize'];
	$offset = ($page-1)*$pagesize;

// print($table);exit;
	$items = $db->count($table, $condition, $CFG['db_expires']);
	$pages = pages($items, $page, $pagesize);
verify();
// print_r($items);exit;
	if($items) {
		$order = $dorder[$order] ? " ORDER BY $dorder[$order]" : '';


		$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE {$condition}{$order} LIMIT {$offset},{$pagesize}", ($AJ['cache_search'] && $page == 1) ? 'CACHE' : '', $CFG['db_expires']);



		if($kw) {
			$replacef = explode(' ', $kw);
			$replacet = array_map('highlight', $replacef);
		}
		while($r = $db->fetch_array($result)) {
			$r['adddate'] = timetodate($r['addtime'], 5);
			$r['editdate'] = timetodate($r['edittime'], 3);
			$r['alt'] = $r['title'];
			$r['danjia']=floor($r['price']*10000/$r['houseearm']);
			$r['title'] = set_style($r['title'], $r['style']);
			if($kw) $r['title'] = str_replace($replacef, $replacet, $r['title']);
			if($kw) $r['introduce'] = str_replace($replacef, $replacet, $r['introduce']);
			$r['linkurl'] = $MOD['linkurl'].$r['linkurl'];
			$tags[] = $r;
		}
		$db->free_result($result);
		if($page == 1 && $kw) keyword($kw, $items, $moduleid);
	}
}
$showpage = 1;
$datetype = 5;
$seo_file = 'search';
include AJ_ROOT.'/include/seo.inc.php';
include template($MOD['template_search'] ? $MOD['template_search'] : 'search', $module);
?>
