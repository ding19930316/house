<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
$MOD['gift_enable'] or dheader(AJ_PATH);
$TYPE = get_type('gift', 1);
require MD_ROOT.'/gift.class.php';
$do = new gift();
$typeid = isset($typeid) ? intval($typeid) : 0;
switch($action) {
	case 'my':
		login();
		$condition = "username='$_username'";
		$lists = $do->get_my_order($condition);
		$head_title = $L['gift_my_order'].$AJ['seo_delimiter'].$L['gift_title'];
	break;
	case 'order':
		login();
		$itemid or dheader($MOD['gift_url']);
		$do->itemid = $itemid;
		$item = $do->get_one();
		$item or dheader($MOD['gift_url']);
		extract($item);
		$left = $amount - $orders > 0 ? $amount - $orders : 0;
		$process = $left ? get_process($fromtime, $totime) : 4;
		if($process == 1) dalert($L['gift_error_1'], $linkurl);
		if($process == 3) dalert($L['gift_error_3'], $linkurl);
		if($process == 4) dalert($L['gift_error_4'], $linkurl);
		if($_credit < $credit) dalert($L['gift_error_5'], $linkurl);
		if(!check_group($_groupid, $groupid)) dalert($L['gift_error_6'], $linkurl);
		$t = $db->get_one("SELECT * FROM {$AJ_PRE}gift_order WHERE itemid=$itemid AND username='$_username'");
		if($t) dalert($L['gift_error_7'], rewrite('index.php?action=my'));		
		credit_add($_username, -$credit);
		credit_record($_username, -$credit, 'system', $L['gift_credit_reason'], 'ID:'.$itemid);
		$db->query("INSERT INTO {$AJ_PRE}gift_order (itemid,credit,username,ip,addtime,status) VALUES ('$itemid','$credit','$_username','$AJ_IP','$AJ_TIME','".$L['gift_status']."')");
		$db->query("UPDATE {$AJ_PRE}gift SET orders=orders+1 WHERE itemid=$itemid");
		dheader(rewrite('index.php?success=1&itemid='.$itemid));
	break;
	default:
		if($itemid) {
			$do->itemid = $itemid;
			$item = $do->get_one();
			$item or dheader($MOD['gift_url']);
			extract($item);
			$left = $amount - $orders > 0 ? $amount - $orders : 0;
			$process = $left ? get_process($fromtime, $totime) : 4;
			$adddate = timetodate($addtime, 3);
			$fromdate = $fromtime ? timetodate($fromtime, 3) : $L['timeless'];
			$todate = $totime ? timetodate($totime, 3) : $L['timeless'];
			$middle = str_replace('.thumb.', '.middle.', $thumb);
			$gname = '';
			if($groupid) {
				$GROUP = cache_read('group.php');
				foreach(explode(',', $groupid) as $gid) {
					if(isset($GROUP[$gid])) $gname .= $GROUP[$gid]['groupname'].' ';
				}
			}
			$db->query("UPDATE {$AJ_PRE}gift SET hits=hits+1 WHERE itemid=$itemid");
			$head_title = $title.$AJ['seo_delimiter'].$L['gift_title'];
		} else {
			$pagesize = 8;
			$offset = ($page-1)*$pagesize;
			$condition = "1";
			if($keyword) $condition .= " AND title LIKE '%$keyword%'";
			if($typeid) $condition .= " AND typeid=$typeid";
			if($cityid) $condition .= ($AREA[$cityid]['child']) ? " AND areaid IN (".$AREA[$cityid]['arrchildid'].")" : " AND areaid=$cityid";
			$lists = $do->get_list($condition, 'addtime DESC');
			$head_title = $L['gift_title'];
		}
	break;
}
include template('gift', $module);
?>