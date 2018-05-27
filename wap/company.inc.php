<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$table = $AJ_PRE.$module;
$userid = isset($userid) ? intval($userid) : 0;
$username = isset($username) ? trim($username) : '';
check_name($username) or $username = '';
if($userid || $username) {
	if($userid) $username = get_user($userid, 'userid', 'username');
	$item = userinfo($username);
	$item or wap_msg($L['msg_not_corp']);
	$item['groupid'] > 5 or wap_msg($L['msg_not_corp']);
	unset($item['keyword']);
	extract($item);	
	$could_contact = check_group($_groupid, $MOD['group_contact']);
	if($username == $_username) $could_contact = true;
	if($TP == 'touch') {
		$head_link = 'index.php?moduleid='.$moduleid.'&amp;userid='.$userid;
		$head_name = $company;
		$back_link = 'javascript:Dback(\''.$head_link.'\');';
	}

	if($action == 'introduce') {
		$content_table = content_table(4, $userid, is_file(AJ_CACHE.'/4.part'), $AJ_PRE.'company_data');
		$content = $db->get_one("SELECT content FROM {$content_table} WHERE userid=$userid");
		$content = $content['content'];
		if($TP == 'touch') {
			$pages = '';
		} else {
			$content = strip_tags($content);
			$content = preg_replace("/\&([^;]+);/i", '', $content);
			$contentlength = strlen($content);
			if($contentlength > $maxlength) {
				$start = ($page-1)*$maxlength;
				$content = dsubstr($content, $maxlength, '', $start);
				$pages = wap_pages($contentlength, $page, $maxlength);
			}
			$content = nl2br($content);
		}
		$head_title = $L['com_introduce'].$AJ['seo_delimiter'].$company.$L['wap_version'];
	} else if($action == 'news') {
		$table = $AJ_PRE.'news';
		$table_data = $AJ_PRE.'news_data';
		if($itemid) {
			$item = $db->get_one("SELECT * FROM {$table} m, {$table_data} d WHERE m.itemid=d.itemid AND m.itemid=$itemid AND m.status>2 AND m.username='$username'");
			$item or wap_msg($L['msg_not_exist']);
			extract($item);
			$db->query("UPDATE {$table} SET hits=hits+1 WHERE itemid=$itemid");
			$head_title = $title.$AJ['seo_delimiter'].$L['com_news'].$AJ['seo_delimiter'].$company.$L['wap_version'];
			$adddate = timetodate($addtime, 3);
			if($TP == 'touch') {
				$pages = '';
			} else {
				$content = strip_tags($content);
				$content = preg_replace("/\&([^;]+);/i", '', $content);
				$contentlength = strlen($content);
				if($contentlength > $maxlength) {
					$start = ($page-1)*$maxlength;
					$content = dsubstr($content, $maxlength, '', $start);
					$pages = wap_pages($contentlength, $page, $maxlength);
				}
				$content = nl2br($content);
			}
		} else {
			$typeid = isset($typeid) ? intval($typeid) : 0;
			$MTYPE = get_type('news-'.$userid);
			$condition = "username='$username' AND status=3";
			if($kw) $condition .= " AND title LIKE '%$keyword%'";		
			if($typeid) $condition .= " AND typeid='$typeid'";
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition", 'CACHE');
			$pages = wap_pages($r['num'], $page, $pagesize);
			$lists = array();
			$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY addtime DESC LIMIT $offset,$pagesize");
			while($r = $db->fetch_array($result)) {
				$r['title'] = dsubstr($r['title'], $len);
				$lists[] = $r;
			}
			$head_title = $L['com_news'].$AJ['seo_delimiter'].$company.$L['wap_version'];
		}
	} else if($action == 'sell') {
		$table = $AJ_PRE.'sell_5';
		$table_data = $AJ_PRE.'sell_data_5';
		if($itemid) {
			//
		} else {
			$typeid = isset($typeid) ? intval($typeid) : 0;
			$MTYPE = get_type('product-'.$userid);
			$condition = "username='$username' AND status=3";
			if($keyword) $condition .= " AND keyword LIKE '%$keyword%'";		
			if($typeid) $condition .= " AND mycatid='$typeid'";
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition", 'CACHE');
			$pages = wap_pages($r['num'], $page, $pagesize);
			$lists = array();
			$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY edittime DESC LIMIT $offset,$pagesize");
			while($r = $db->fetch_array($result)) {
				$r['stitle'] = dsubstr($r['title'], $len);
				$r['date'] = timetodate($r['edittime'], 5);
				$lists[] = $r;
			}
			$head_title = $L['com_sell'].$AJ['seo_delimiter'].$company.$L['wap_version'];
		}
	} else {
		if($page == 1) $db->query("UPDATE {$table} SET hits=hits+1 WHERE userid=$userid");
		if($TP == 'touch') {
			$back_link = 'index.php?moduleid='.$moduleid;
		}
		$head_title = $company.$L['wap_version'];
	}
} else {
	if($kw) {
		check_group($_groupid, $MOD['group_search']) or wap_msg($L['msg_no_search']);
	} else if($catid) {
		$CAT or wap_msg($L['msg_not_cate']);
		if(!check_group($_groupid, $MOD['group_list']) || !check_group($_groupid, $CAT['group_list'])) {
			wap_msg($L['msg_no_right']);
		}
	} else {
		check_group($_groupid, $MOD['group_index']) or wap_msg($L['msg_no_right']);
	}
	$head_title = $MOD['name'].$AJ['seo_delimiter'].$head_title;
	if($kw) $head_title = $kw.$AJ['seo_delimiter'].$head_title;
	$condition = "groupid>5";
	if($keyword) $condition .= " AND keyword LIKE '%$keyword%'";
	if($catid) $condition .= " AND catids LIKE '%,".$catid.",%'";
	if($areaid) $condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	$r = $db->get_one("SELECT COUNT(userid) AS num FROM {$table} WHERE $condition", 'CACHE');
	$items = $r['num'];
	$pages = wap_pages($items, $page, $pagesize);
	$lists = array();
	if($items) {
		$order = $MOD['order'];
		$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$lists[] = $r;
		}
		$db->free_result($result);
	}
	if($TP == 'touch') {
		if($catid) {
			$head_link = 'index.php?moduleid='.$moduleid.'&amp;catid='.$catid;
			$head_name = $CAT['catname'];
			$back_link = $CAT['parentid'] ? 'index.php?moduleid='.$moduleid.'&amp;catid='.$CAT['parentid'] : 'index.php?moduleid='.$moduleid;
		} else {
			$head_link = 'index.php?moduleid='.$moduleid;
			$head_name = $MOD['name'];
			$back_link = 'index.php';
		}
	}
}
include template($module, $TP);