<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
if($AJ_BOT || $_POST) dhttp(403);
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
if(!check_group($_groupid, $MOD['group_search'])) include load('403.inc');
require AJ_ROOT.'/include/post.func.php';
include load('search.lang');
$MS = cache_read('module-2.php');

if(!$areaid && $cityid && strpos($AJ_URL, 'areaid') === false) {
	$areaid = $cityid;
	$ARE = $AREA[$cityid];
}
function charsetIconv($vars,$from='utf-8',$to='gbk') {
	if (is_array($vars)) {
		$result = array();
		foreach ($vars as $key => $value) {
			$result[$key] = charsetIconv($value);
		}
	} else {
		$result = iconv($from,$to, $vars);
	}
	return $result;
}

$tags = array();
if($AJ_QST) {
	if($kw) {
		if(strlen($kw) < $AJ['min_kw'] || strlen($kw) > $AJ['max_kw']) message(lang($L['word_limit'], array($AJ['min_kw'], $AJ['max_kw'])), $MOD['linkurl'].'search.php');
		if($AJ['search_limit'] && $page == 1) {
			if(($AJ_TIME - $AJ['search_limit']) < get_cookie('last_search')) message(lang($L['time_limit'], array($AJ['search_limit'])), $MOD['linkurl'].'search.php');
			set_cookie('last_search', $AJ_TIME);
		}
	}
	$fds = $MOD['fields'];
	$condition = "groupid>5 ";

   $kw = safe_replace(charsetIconv($_GET['kw']));
	if($kw) $condition .= " AND company LIKE '%$kw%'";



	if($areaid) $condition .= ($ARE['child']) ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	
	$pagesize = $MOD['pagesize'];
	$offset = ($page-1)*$pagesize;
	$items = $db->count($table, $condition, $AJ['cache_search']);
	$pages = pages($items, $page, $pagesize);
	if($items) {
		$order = $MOD['order'] ? " ORDER BY ".$MOD['order'] : '';
		$result = $db->query("SELECT $fds FROM {$table} WHERE {$condition}{$order} LIMIT {$offset},{$pagesize}", $AJ['cache_search'] && $page == 1 ? 'CACHE' : '', $AJ['cache_search']);
		if($kw) {
			$replacef = explode(' ', $kw);
			$replacet = array_map('highlight', $replacef);
		}
		
		while($r = $db->fetch_array($result)) {
			//if($lazy && isset($r['thumb']) && $r['thumb']) $r['thumb'] = AJ_SKIN.'image/lazy.gif" original="'.$r['thumb'];
			//if($kw) $r['company'] = str_replace($replacef, $replacet, $r['company']);
			$tags[] = $r;
		}
		$db->free_result($result);
		if($page == 1 && $kw) keyword($kw, $items, $moduleid);
	}
}
$showpage = 1;
$seo_file = 'search';
include AJ_ROOT.'/include/seo.inc.php';
include template('search', $module);
?>