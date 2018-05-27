<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$table = $AJ_PRE.$module;
$table_data = $AJ_PRE.$module.'_data';
$table_answer = $AJ_PRE.$module.'_answer';
$PROCESS = $L['know_process'];
if($itemid) {
	$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
	($item && $item['status'] > 2) or wap_msg($L['msg_not_exist']);
	extract($item);	
	$could_answer = check_group($_groupid, $MOD['group_answer']);
	if($item['process'] != 1 || ($_username && $_username == $item['username'])) $could_answer = false;
	if($could_answer) {
		if($_username) {
			$r = $db->get_one("SELECT itemid FROM {$table_answer} WHERE username='$_username' AND qid=$itemid");
		} else {
			$r = $db->get_one("SELECT itemid FROM {$table_answer} WHERE ip='$AJ_IP' AND qid=$itemid AND addtime>$AJ_TIME-86400");
		}
	}
	if($action == 'list') {
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table_answer} WHERE qid=$itemid AND status=3");
		$items = $r['num'];
		$pages = wap_pages($items, $page, $pagesize);
		if($item['answer'] != $items) $db->query("UPDATE {$table} SET answer=$items WHERE itemid=$itemid");
		$lists = array();
		$result = $db->query("SELECT * FROM {$table_answer} WHERE qid=$itemid AND status=3 ORDER BY itemid DESC LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$lists[] = $r;
		}
		if($TP == 'touch') {
			$head_link = 'index.php?moduleid='.$moduleid.'&amp;itemid='.$itemid;
			$head_name = $L['answer_list'];
			$back_link = 'javascript:Dback(\''.$head_link.'\');';
			$pages = '';
		}
		$head_title = $title.$AJ['seo_delimiter'].$L['answer_list'].$AJ['seo_delimiter'].$MOD['name'].$AJ['seo_delimiter'].$head_title;
	} else if($action == 'answer') {
		$could_answer or wap_msg($L['answer_no_right']);
		require_once AJ_ROOT.'/include/post.func.php';
		if($submit) {
			$content = htmlspecialchars(trim($content));
			$content = convert($content, 'utf-8', AJ_CHARSET);
			if(!$content) wap_msg($L['type_answer']);
			$need_check =  $MOD['check_add'] == 2 ? $MG['check'] : $MOD['check_answer'];
			$status = get_status(3, $need_check);
			$db->query("INSERT INTO {$table_answer} (qid,content,username,addtime,ip,status) VALUES ('$itemid', '$content', '$_username', '$AJ_TIME', '$AJ_IP', '$status')");			
			if($status == 3) $db->query("UPDATE {$table} SET answer=answer+1");
			if($MOD['credit_answer'] && $_username && $status == 3) {
				$could_credit = true;
				if($MOD['credit_maxanswer'] > 0) {					
					$r = $db->get_one("SELECT SUM(amount) AS total FROM {$AJ_PRE}finance_credit WHERE username='$_username' AND addtime>$AJ_TIME-86400  AND reason='".$L['answer']."'");
					if($r['total'] > $MOD['credit_maxanswer']) $could_credit = false;
				}
				if($could_credit) {
					credit_add($_username, $MOD['credit_answer']);
					credit_record($_username, $MOD['credit_answer'], 'system', $L['answer'], 'ID:'.$itemid.'(WAP)');
				}
			}
			if($MOD['answer_message'] && $item['username']) {
				$linkurl = $MOD['linkurl'].$item['linkurl'];
				$message = lang($L['answer_message'], array(dsubstr($item['title'], 20, '...'), $item['title'], nl2br($content), $linkurl));
				send_message($item['username'], dsubstr($message, 60, '...'), $message);
			}
			wap_msg($status == 3 ? $L['answer_success'] : $L['answer_check'], "?moduleid=$moduleid&itemid=$itemid");
		} else {			
			if($TP == 'touch') {
				$head_link = 'index.php?moduleid='.$moduleid.'&amp;itemid='.$itemid.'&amp;action=list';
				$head_name = $L['answer_list'];
				$back_link = 'javascript:Dback(\''.$head_link.'\');';
				$pages = '';
			}
		}
	} else {
		$CAT = get_cat($catid);
		if(!check_group($_groupid, $MOD['group_show']) || !check_group($_groupid, $CAT['group_show'])) wap_msg($L['msg_no_right']);
		$description = '';
		$user_status = 3;
		$fee = get_fee($item['fee'], $MOD['fee_view']);
		require $action == 'pay' ? 'pay.inc.php' : 'content.inc.php';
		$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
		$content = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
		$content = $content['content'];
		if($TP == 'touch') {
			$head_link = 'index.php?moduleid='.$moduleid.'&amp;catid='.$catid;
			$head_name = $CAT['catname'];
			$back_link = 'javascript:Dback(\''.$head_link.'\');';
			$pages = '';
		} else {
			$content = strip_tags($content);
			$content = preg_replace("/\&([^;]+);/i", '', $content);
			if($user_status == 2) $description = get_description($content, $MOD['pre_view']);
			$contentlength = strlen($content);
			if($contentlength > $maxlength) {
				$start = ($page-1)*$maxlength;
				$content = dsubstr($content, $maxlength, '', $start);
				$pages = wap_pages($contentlength, $page, $maxlength);
			}
			$content = nl2br($content);
		}
		$best = $aid ? $db->get_one("SELECT * FROM {$AJ_PRE}know_answer WHERE itemid=$aid") : array();
		$editdate = timetodate($addtime, 5);
		$update = '';
		include AJ_ROOT.'/include/update.inc.php';
		$head_title = $title.$AJ['seo_delimiter'].$MOD['name'].$AJ['seo_delimiter'].$head_title;
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
	$condition = "status=3";
	if($keyword) $condition .= " AND keyword LIKE '%$keyword%'";
	if($catid) $condition .= $CAT ? " AND catid IN (".$CAT['arrchildid'].")" : " AND catid=$catid";
	if($areaid) $condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition", 'CACHE');
	$items = $r['num'];
	$pages = wap_pages($items, $page, $pagesize);
	$lists = array();
	if($items) {
		$order = $MOD['order'];
		$time = strpos($MOD['order'], 'add') !== false ? 'addtime' : 'edittime';
		$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['stitle'] = dsubstr($r['title'], $len);
			$r['date'] = timetodate($r[$time], 3);
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
?>