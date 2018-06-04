<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';

//拼音检索
if($_POST['pingyin'])
{
	$result = $db->query("select * from aijiacms_company where 1");
	while($r = $db->fetch_array($result)) {
		$tags[] = array_merge($r);
	}
	foreach($tags as $v){
		$nar[] = $v['company'];
	}
	echo json_encode($nar);
	exit;
}
// print_r($_GET);exit;
$keyword = $_POST['keyword'];
$condition = array();
$mods = array(
	'company',
	'member',
	'newhouse_6',//小区
	'rent_7',
	'sale_5'
);
// print_r($_GET);exit;

// $result = $db->query("SELECT * FROM `aijiacms_company` ,`aijiacms_member`  WHERE 1 ");
// // print_r($result);exit;
// while($r = $db->fetch_array($result)) {
// 	//if($lazy && isset($r['thumb']) && $r['thumb']) $r['thumb'] = AJ_SKIN.'image/lazy.gif" original="'.$r['thumb'];
// 	$tags[] = $r;
// }
// print_r($tags);exit;

foreach ($mods as $mod_item) {
	$table = $CFG['tb_pre'].$mod_item;
	switch ($mod_item) {
		case 'newhouse_6':
			$condition[$table] = "status=3 ";
			break;
		default:
			$condition[$table] = "1";
			break;
	}
	// $condition[$CFG['tb_pre'].'_'.$mod_item] = "1";
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
// ==========================================================================
//
// $condition = "groupid>5 ";
//
// ==========================================================================
$param = $_GET['param'];
	if(!empty($param)&&stristr($param,'-')!=false)
	{
		$param_arr = explode('-', $param);
		foreach($param_arr as $_v) {
				if($_v)
				{
					if(preg_match ( '/([a-z])([0-9_]+)/', $_v, $matchs))
					{
						$$matchs[1] = trim($matchs[2]);
					}
				}
			}
	    $areaid = $r;
		$ord = $n;
		$source = $u;
		$page = $g;
	}
	else
	{
//==========================================================================

 	$areaid = intval($_GET['r']);
	$ord = intval($_GET['n']);
	$page = intval($_GET['g']);
	$source = intval($_GET['u']);
	$k = trim($_GET['k']);
	}
	if($keyword !='')
	{
		// print_r('111');exit;
		$keyword1 = iconv('gbk', 'utf-8', $keyword);//rewrite 只支持UTF-8编码的中文
		$lst1.= "-k".htmlentities(urlencode($keyword1));
		// $condition.=" and  (`company` like '%$keyword%' or `address` like '%$keyword%' )";
		foreach ($mods as $mod_item) {
			$table = trim($CFG['tb_pre'].$mod_item);
			$condition[$table].= " and  (`keyword` like '%$keyword%' )";
		}
		// print_r($condition);exit;
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
	// print_r($condition);exit;
if(!empty($areaid))
	{
		$lst = "-r".$areaid;
			// $condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
		foreach ($mods as $mod_item) {
			$table = trim($CFG['tb_pre'].$mod_item);
			$condition[$table].= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
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
$sql = array();
foreach ($mods as $mod_item) {
	$table = trim($CFG['tb_pre'].$mod_item);
	$sql[] = "select count(*) as tmpcount from $table WHERE {$condition[$table]}";
}
$sql = implode(" union all ",$sql);
$items = mysql_fetch_array($db->query("select sum(tmpcount) as items from ($sql) a"))['items'];
verify();
$pages = housepages($items, $page, $lst,$pagesize);
$tags = array();
if($items) {
	$sql = array();//{$offset},{$pagesize}
	foreach ($mods as $mod_item) {
		$table = trim($CFG['tb_pre'].$mod_item);
		switch ($mod_item) {
			case 'company':
				// $sql[] = "select * from $table WHERE {$condition[$table]}";
				$sql[] = "select userid as id,company as title,company,telephone,areaid,address,'$table' as modtype from $table WHERE {$condition[$table]}";
				break;
			case 'member':
				$sql[] = "select userid as id,truename as title,company,mobile as telephone,areaid,address,'$table' as modtype  from $table WHERE {$condition[$table]}";
				break;
			case 'newhouse_6':
				$sql[] = "select itemid as id,title,company,telephone,areaid,address,'$table' as modtype  from $table WHERE {$condition[$table]}";
				break;
			case 'rent_7':
				$sql[] = "select itemid as id,title,company,telephone,areaid,address,'$table' as modtype  from $table WHERE {$condition[$table]}";
				break;
			case 'sale_5':
				$sql[] = "select itemid as id,title,company,telephone,areaid,address,'$table' as modtype  from $table WHERE {$condition[$table]}";
				break;
			default:
				// code...
				break;
		}
	}
	$sql = implode(" union all ",$sql)." LIMIT ".$offset.','.$pagesize;
	// print_r($sql);exit;
	$result = $db->query($sql);
	while($r = $db->fetch_array($result)) {
		$tags[] = $r;
	}
}
// print_r($tags);exit;
$showpage = 1;

$seo_file = 'list';
include AJ_ROOT.'/include/seo.inc.php';
if($EXT['wap_enable']) $head_mobile = $EXT['wap_url'].'index.php?moduleid='.$moduleid.'&catid='.$catid.($page > 1 ? '&page='.$page : '');
$template = $CAT['template'] ? $CAT['template'] : 'list';
// print_r($module);exit;
include template($template, $module);
?>
