<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
switch($action) {
	case 'login':
		if($_userid) wap_msg($L['has_logined'], 'index.php');
		if($submit) {
			require AJ_ROOT.'/include/post.func.php';
			require AJ_ROOT.'/module/member/member.class.php';
			$do = new member;
			if(!$username) wap_msg($L['type_username']);
			if(!$password) wap_msg($L['type_password']);
			if(strpos($username, '@') !== false) {
				$r = $db->get_one("SELECT username FROM {$AJ_PRE}member WHERE email='$username'");
				$r or wap_msg($L['not_email']);
				$username = $r['username'];
			}
			$user = $do->login($username, $password, 86400*365);
			if($user) {
				wap_msg($L['login_success'], $forward ? $forward : 'index.php');
			} else {
				wap_msg($do->errmsg);
			}
		} else {
			$head_title = $L['member_login'].$AJ['seo_delimiter'].$head_title;
			include template('login', $TP);
		}
	break;
	case 'logout':
		set_cookie('auth', '');
		wap_msg($L['logout_success'], 'index.php');
	break;
	case 'charge':
		if(!$_userid) wap_msg($L['please_login'], 'index.php?moduleid='.$moduleid.'&amp;action=login');
		if($submit) {
			if(!preg_match("/^[0-9a-zA-z]{6,}$/", $number)) wap_msg($L['not_card_number']);
			if(!preg_match("/^[0-9]{6,}$/", $password)) wap_msg($L['not_card_password']);
			$card = $db->get_one("SELECT * FROM {$AJ_PRE}finance_card WHERE number='$number'");
			if($card) {
				if($card['updatetime']) wap_msg($L['not_card_number']);
				if($card['totime'] < $AJ_TIME) wap_msg($L['not_card_number']);
				if($card['password'] != $password) wap_msg($L['not_card_password']);
				$db->query("INSERT INTO {$AJ_PRE}finance_charge (username,bank,amount,money,sendtime,receivetime,editor,status,note) VALUES ('$_username','card', '$card[amount]','$card[amount]','$AJ_TIME','$AJ_TIME','system','3','$number')");
				$db->query("UPDATE {$AJ_PRE}finance_card SET username='$_username',updatetime='$AJ_TIME',ip='$AJ_IP' WHERE itemid='$card[itemid]'");
				money_add($_username, $card['amount']);
				money_record($_username, $card['amount'], $L['by_card'], 'system', $L['card_charge'], $number.'(WAP)');
				$_money = $_money + $card['amount'];
				wap_msg($L['charge_success'], $forward);
			} else {
				wap_msg($L['not_card_number']);
			}
		} else {
			$head_title = $L['card_charge'].$AJ['seo_delimiter'].$head_title;
			include template('charge', $TP);
		}
	break;
	case 'message_send':
		if(!$_userid) wap_msg($L['please_login'], 'index.php?moduleid='.$moduleid.'&amp;action=login');
		if($submit) {
			require AJ_ROOT.'/include/post.func.php';
			require AJ_ROOT.'/module/member/message.class.php';
			$do = new message;
			$message = array();
			$message['typeid'] = 0;
			$message['touser'] = $touser;
			$message['title'] = $title;
			$message['content'] = $content;
			$message = convert($message, 'utf-8', AJ_CHARSET);
			if($do->send($message)) {
				wap_msg($L['send_success'], 'index.php?moduleid='.$moduleid.'&amp;action=message');
			} else {
				wap_msg($do->errmsg);
			}
		} else {			
			$head_title = $L['send_message'].$AJ['seo_delimiter'].$head_title;
			$touser = isset($touser) ? trim($touser) : '';
			$title = isset($title) ? trim($title) : '';
			$content = isset($content) ? trim($content) : '';
			if($TP == 'touch') {
				$head_link = 'index.php?moduleid='.$moduleid.'&amp;action=message';
				$back_link = 'javascript:Dback(\''.$head_link.'\');';
			}
			include template('message_send', $TP);
		}
	break;
	case 'message_delete':
		if(!$_userid) wap_msg($L['please_login'], 'index.php?moduleid='.$moduleid.'&amp;action=login');
		if($itemid) {
			require AJ_ROOT.'/include/post.func.php';
			require AJ_ROOT.'/module/member/message.class.php';
			$do = new message;			
			$do->itemid = $itemid;
			$do->delete();
			wap_msg($L['delete_message'], 'index.php?moduleid='.$moduleid.'&amp;action=message');
		} else {			
			wap_msg($L['not_message']);
		}
	break;
	case 'message':
		if(!$_userid) wap_msg($L['please_login'], 'index.php?moduleid='.$moduleid.'&amp;action=login');
		if($itemid) {
			require AJ_ROOT.'/module/member/message.class.php';
			$do = new message;
			$do->itemid = $itemid;
			$message = $do->get_one();
			if(!$message) wap_msg($L['msg_no_right']);
			extract($message);
			if($status == 4 || $status == 3) {
				if($touser != $_username) wap_msg($L['msg_no_right']);
				if(!$isread) {
					$do->read();
					if($feedback) $do->feedback();
				}
			} else if($status == 2 || $status == 1) {
				if($fromuser != $_username) wap_msg($L['msg_no_right']);
			}
			if($TP == 'touch') {
				$head_link = 'index.php?moduleid='.$moduleid.'&amp;action=message';
				$back_link = 'javascript:Dback(\''.$head_link.'\');';
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
			$adddate = timetodate($addtime, 5);
			$head_title = $title.$AJ['seo_delimiter'].$L['message_title'].$AJ['seo_delimiter'].$head_title;
		} else {
			$TYPE = $L['message_type'];
			$head_title = $L['message_title'].$AJ['seo_delimiter'].$head_title;
			$typeid = isset($typeid) ? intval($typeid) : -1;
			$condition = "touser='$_username' AND status=3";
			if($typeid != -1) $condition .= " AND typeid=$typeid";
			if($keyword) $condition .= " AND title LIKE '%$keyword%'";
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$AJ_PRE}message WHERE $condition");
			$pages = wap_pages($r['num'], $page, $pagesize);
			$lists = array();
			$result = $db->query("SELECT * FROM {$AJ_PRE}message WHERE $condition ORDER BY itemid DESC LIMIT $offset,$pagesize");
			while($r = $db->fetch_array($result)) {
				$r['adddate'] = timetodate($r['addtime'], 'm/d H:i');
				$r['type'] = $TYPE[$r['typeid']];
				$lists[] = $r;
			}
			if($TP == 'touch') {
				$back_link = 'index.php?moduleid='.$moduleid;
			}
		}
		include template('message', $TP);
	break;
	default:
		if($TP == 'touch') {
			if(!$_userid) wap_msg($L['please_login'], 'index.php?moduleid='.$moduleid.'&amp;action=login');
			$back_link = 'index.php';
			include template('member', $TP);
		} else {
			dheader('index.php');
		}
	break;
}
?>