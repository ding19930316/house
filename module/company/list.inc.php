<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
// print_r($_GET);exit;
$keyword = $_POST['keyword'];
$condition = array();
$mods = array(
	'company',
	'member',
	'newhouse_6',
	'rent_7'
);

foreach ($mods as $mod_item) {
	$condition[$CFG['tb_pre'].'_'.$mod_item] = "1";
}


//===========================================================================
// if($MOD['list_html']) {
// 	$html_file = listurl($CAT, $page);
// 	if(is_file(AJ_ROOT.'/'.$MOD['moduledir'].'/'.$html_file)) d301($MOD['linkurl'].$html_file);
// }
// if(!check_group($_groupid, $MOD['group_list']) || !check_group($_groupid, $CAT['group_list'])) include load('403.inc');
// unset($CAT['moduleid']);
// extract($CAT);
// $maincat = get_maincat($child ? $catid : $parentid, $moduleid);
//==========================================================================

// $condition = "groupid>5 ";

//==========================================================================
// $param = $_GET['param'];
// 	if(!empty($param)&&stristr($param,'-')!=false)
// 	{
// 		$param_arr = explode('-', $param);
// 		foreach($param_arr as $_v) {
// 				if($_v)
// 				{
// 					if(preg_match ( '/([a-z])([0-9_]+)/', $_v, $matchs))
// 					{
// 						$$matchs[1] = trim($matchs[2]);
// 					}
// 				}
// 			}
// 	    $areaid = $r;
// 		$ord = $n;
// 		$source = $u;
// 		$page = $g;
// 	}
// 	else
// 	{
//==========================================================================

 	$areaid = intval($_GET['r']);
	$ord = intval($_GET['n']);
	$page = intval($_GET['g']);
	$source = intval($_GET['u']);
	$keyword = trim($_POST['keyword']);
	// print_r($keyword);exit;
	$k = trim($_GET['k']);
	// }
	if($keyword !=0)
	{
		$keyword1 = iconv('gbk', 'utf-8', $keyword);//rewrite 只支持UTF-8编码的中文
		$lst1.= "-k".htmlentities(urlencode($keyword1));
		// $condition.=" and  (`company` like '%$keyword%' or `address` like '%$keyword%' )";
		foreach ($mods as $mod_item) {
			switch ($mod_item) {
				case 'company':
					$condition[$CFG['tb_pre'].'_'.$mod_item].= " and  (`company` like '%$keyword%' or `address` like '%$keyword%' )";
					break;
				case 'member':
					$condition[$CFG['tb_pre'].'_'.$mod_item].= " and  (`company` like '%$keyword%' or `address` like '%$keyword%' )";
				default:
					break;
			}
		}
		// $condition['company'].=" and  (`company` like '%$keyword%' or `address` like '%$keyword%' )";
	}

	//==========================================================================
	// if(!empty($k))
	// {
	// 	//$keyword = iconv('utf-8','gbk' , $k);
	// 	$lst1.= "-k".htmlentities(urlencode($k));
	// 	$condition.=" and  (`company` like '%$k%'  or `address` like '%$k%' )";
	// }
	//==========================================================================

if(!empty($areaid))
	{
		$lst = "-r".$areaid;
			// $condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
		foreach ($mods as $mod_item) {
			// print_r($mod_item);exit;
			switch ($mod_item) {
				case 'company':
				// print_r($mod_item);exit;
					$condition[$CFG['tb_pre'].'_'.$mod_item].= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
					break;

				default:
					break;
			}
		}
		// $condition['company'] .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	}

//==========================================================================
// if(!empty($source))
// 	{
// 		$lst.= "-u".$source;
// 		if($source==1)
// 		{
// 			$condition.='and groupid=6';
// 			$head_title = "经纪人";
// 		}
// 		elseif($source==2)
// 		{
// 				$condition.='and groupid=7 ';
// 			$head_title = "中介";
// 		}
//
// 	}
//==========================================================================

$page = max($page,1);
$pagesize = $MOD['pagesize'];
$offset = ($page-1)*$pagesize;
// $items = $db->count($table, $condition['company'], $CFG['db_expires']);
$items = 0;
foreach ($mods as $mod_item) {
	switch ($mod_item) {
		case 'company':
			$items += $db->count($table, $condition[$CFG['tb_pre'].'_'.$mod_item], $CFG['db_expires']);
			// $condition[$CFG['tb_pre'].'_'.$mod_item].= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
			break;

		default:
			break;
	}
}
verify();
// print_r($condition[$CFG['tb_pre'].'_'.'company']);exit;
$pages = housepages($items, $page, $lst,$pagesize);
$tags = array();
if($items) {
	foreach ($mods as $mod_item) {
		switch ($mod_item) {
			case 'company':
				$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE {$condition[$CFG['tb_pre'].'_'.$mod_item]} ORDER BY ".$MOD['order']." LIMIT {$offset},{$pagesize}", ($CFG['db_expires'] && $page == 1) ? 'CACHE' : '', $CFG['db_expires']);
				while($r = $db->fetch_array($result)) {
					//if($lazy && isset($r['thumb']) && $r['thumb']) $r['thumb'] = AJ_SKIN.'image/lazy.gif" original="'.$r['thumb'];
					$tags[] = $r;
				}
				break;

			default:
				break;
		}
	}
}
$showpage = 1;

$seo_file = 'list';
include AJ_ROOT.'/include/seo.inc.php';
if($EXT['wap_enable']) $head_mobile = $EXT['wap_url'].'index.php?moduleid='.$moduleid.'&catid='.$catid.($page > 1 ? '&page='.$page : '');
$template = $CAT['template'] ? $CAT['template'] : 'list';
// print_r($module);exit;
include template($template, $module);
?>
