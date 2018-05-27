<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
$MOD['poll_enable'] or dheader(AJ_PATH);
$TYPE = get_type('poll', 1);
require MD_ROOT.'/poll.class.php';
$do = new poll();
$typeid = isset($typeid) ? intval($typeid) : 0;
if($action == 'js') {
	$itemid or exit;
	echo 'document.write(\'<iframe src="'.$EXT['poll_url'].'index.php?action=show&itemid='.$itemid.'" style="width:99%;height:0;" scrolling="no" frameborder="0" id="poll__'.$itemid.'"></iframe>\');';
} else if($action == 'ajax') {
	if(!check_group($_groupid, $MOD['poll_group'])) exit($_userid ? $L['poll_error_1'] : $L['poll_error_2']);
	$itemid or exit($L['poll_error_3']);
	$I = $db->get_one("SELECT * FROM {$AJ_PRE}poll_item WHERE itemid=$itemid");
	$I or exit($L['poll_error_4']);
	$do->itemid = $pollid = $I['pollid'];
	$item = $do->get_one();
	$item or exit($L['poll_error_5']);
	if($item['fromtime'] && $item['fromtime'] > $AJ_TIME) exit($L['poll_error_6']);
	if($item['totime'] && $item['totime'] < $AJ_TIME) exit($L['poll_error_7']);
	$condition = $_username ? "AND username='$_username'" : "AND ip='$AJ_IP' AND polltime>".($AJ_TIME - 86400);
	$t = $db->get_one("SELECT * FROM {$AJ_PRE}poll_record WHERE itemid=$itemid {$condition}");
	if($t) exit($L['poll_error_8']);
	if($item['poll_max']) {		
		$t = $db->get_one("SELECT COUNT(*) AS num FROM {$AJ_PRE}poll_record WHERE pollid=$pollid {$condition}");
		if($t['num'] >= $item['poll_max']) exit(lang($L['poll_error_9'], array($item['poll_max'])));
	}
	$db->query("INSERT INTO {$AJ_PRE}poll_record (itemid,pollid,username,ip,polltime) VALUES ('$itemid','$pollid','$_username','$AJ_IP','$AJ_TIME')");
	$db->query("UPDATE {$AJ_PRE}poll_item SET polls=polls+1 WHERE itemid=$itemid");
	$db->query("UPDATE {$AJ_PRE}poll SET polls=polls+1 WHERE itemid=$pollid");
	exit('ok');
} else if($action == 'show') {
	$itemid or exit;
	$do->itemid = $itemid;
	$P = $do->get_one();
	$P or exit;
	extract($P);
	$cols = $poll_cols;
	$percent = dround(100/$cols).'%';	
	$pagesize = $poll_page;
	$offset = ($page-1)*$pagesize;
	$order = $poll_cols ? 'polls DESC,listorder DESC,itemid DESC' : 'listorder DESC,itemid DESC';
	$polls = $do->item_list("pollid=$itemid", $order);
	$condition = $_username ? "AND username='$_username'" : "AND ip='$AJ_IP' AND polltime>".($AJ_TIME - 86400);
	$votes = array();
	$result = $db->query("SELECT * FROM {$AJ_PRE}poll_record WHERE pollid=$itemid $condition");
	while($r = $db->fetch_array($result)) {
		$votes[$r['itemid']] = $r['itemid'];
	}
	$db->query("UPDATE {$AJ_PRE}poll SET hits=hits+1 WHERE itemid=$itemid");
	$template_poll = $P['template_poll'] ? $P['template_poll'] : 'poll';
	include template('poll_show', $module);
} else {
	if($itemid) {
		$do->itemid = $itemid;
		$item = $do->get_one();
		$item or dheader(AJ_PATH);
		extract($item);
		$adddate = timetodate($addtime, 3);
		$fromdate = $fromtime ? timetodate($fromtime, 3) : $L['timeless'];
		$todate = $totime ? timetodate($totime, 3) : $L['timeless'];
		if($item['seo_title']) {
			$seo_title = $item['seo_title'];
		} else {
			$head_title = $title.$AJ['seo_delimiter'].$L['poll_title'];
		}
		if($item['seo_keywords']) $head_keywords = $item['seo_keywords'];
		if($item['seo_description']) $head_description = $item['seo_description'];
		$template = $item['template'] ? $item['template'] : 'poll';
		include template($template, $module);
	} else {
		$head_title = $head_keywords = $head_description = $L['poll_title'];
		$condition = '1';
		if($typeid) $condition .= " AND typeid=$typeid";
		if($cityid) $condition .= ($AREA[$cityid]['child']) ? " AND areaid IN (".$AREA[$cityid]['arrchildid'].")" : " AND areaid=$cityid";
		$lists = $do->get_list($condition, 'addtime DESC');
		include template('poll', $module);
	}
}
?>