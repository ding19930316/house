<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
$task_item = 86400;
if($html == 'webpage') {
	$itemid or exit;
	$r = $db->get_one("SELECT linkurl FROM {$AJ_PRE}webpage WHERE itemid=$itemid");
	$r or exit;
	$r['islink'] and exit;
	$db->query("UPDATE {$AJ_PRE}webpage SET hits=hits+1 WHERE itemid=$itemid");
	if($r['edittime'] > @filemtime(AJ_ROOT.'/'.$r['linkurl'])) tohtml('webpage', $module);
} else if($html == 'announce') {
	$itemid or exit;
	$r = $db->get_one("SELECT linkurl,hits FROM {$AJ_PRE}announce WHERE itemid=$itemid");
	$r or exit;
	$r['islink'] and exit;
	echo 'try{Dd("hits").innerHTML = '.$r['hits'].';}catch(e){}';
	$db->query("UPDATE {$AJ_PRE}announce SET hits=hits+1 WHERE itemid=$itemid");
	if($r['edittime'] > @filemtime(AJ_ROOT.'/announce/'.$itemid.'.'.$AJ['file_ext'])) tohtml('announce', $module);
} else if($html == 'spread') {
	$itemid or exit;
	$r = $db->get_one("SELECT mid,word FROM {$AJ_PRE}spread WHERE itemid=$itemid");
	$r or exit;
	$filename = AJ_CACHE.'/htm/m'.$r['mid'].'_k'.urlencode($r['word']).'.htm';
	if($AJ_TIME - @filemtime($filename) > $task_item) {
		$MOD = cache_read('module-'.$r['mid'].'.php');
		tohtml('spread', $module);
	}
} else if($html == 'ad') {
	$a = $db->get_one("SELECT * FROM {$AJ_PRE}ad ORDER BY rand()");
	$a or exit;
	$aid = $a['aid'];
	if($AJ_TIME - @filemtime(AJ_CACHE.'/htm/'.ad_name($a)) > $task_item) {
		if($a['typeid'] == 6) {
			$MOD['linkurl'] = $MODULE[$a['key_moduleid']]['linkurl'];
		}
		tohtml('ad', $module);
	}
}
if(!$_userid) {
	$MOD = $EXT;
	if($MOD['sitemaps'] && ($AJ_TIME - @filemtime(AJ_ROOT.'/sitemaps.xml') > $MOD['sitemaps_update']*60)) tohtml('sitemaps', $module);
	if($MOD['baidunews'] && ($AJ_TIME - @filemtime(AJ_ROOT.'/baidunews.xml') > $MOD['baidunews_update']*60)) tohtml('baidunews', $module);
	$dc->expire();
}
?>