<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$menus = array (
    array('公司认证', '?moduleid='.$moduleid.'&file='.$file.'&action=company'),
    array('实名认证', '?moduleid='.$moduleid.'&file='.$file.'&action=truename'),
    array('手机认证', '?moduleid='.$moduleid.'&file='.$file.'&action=mobile'),
    array('邮件认证', '?moduleid='.$moduleid.'&file='.$file.'&action=email'),
);
$table = $AJ_PRE.'validate';
$V = array('company'=>'公司认证', 'truename'=>'实名认证', 'mobile'=>'手机认证', 'email'=>'邮件认证');
$S = array('company'=>'0', 'truename'=>'1', 'mobile'=>'2', 'email'=>'3');
$reason = isset($reason) ? trim($reason) : '';
if($reason == '操作原因') $reason = '';
$msg = isset($msg) ? 1 : 0;
$sms = isset($sms) ? 1 : 0;
if(!$AJ['sms']) $sms = 0;
switch($action) {
	case 'cancel':
		$itemid or msg('请选择记录');
		$i = 0;
		foreach($itemid as $id) {
			$r = $db->get_one("SELECT * FROM {$table} WHERE itemid='$id' AND status=3");
			if($r) {
				$username = $r['username'];
				$fd = $r['type'];
				$vfd = 'v'.$r['type'];
				$userid = get_user($username);
				if($r['thumb']) delete_upload($r['thumb'], $userid);
				if($r['thumb1']) delete_upload($r['thumb1'], $userid);
				if($r['thumb2']) delete_upload($r['thumb2'], $userid);
				$db->query("UPDATE {$AJ_PRE}member SET `{$vfd}`=0 WHERE username='$username'");
				$db->query("DELETE FROM {$table} WHERE itemid=$id");
				if($msg) {
					$content = $title = '您的'.$V[$fd].'已经被取消，请重新认证';
					if($reason) $content .= '<br/>取消原因:'.nl2br($reason);
					send_message($username, $title, $content);
				}
				if($msg) {
					$t = $db->get_one("SELECT mobile FROM {$AJ_PRE}member WHERE username='$username'");
					if($t) {
						$content = '您的'.$V[$fd].'已经被取消，请重新认证';
						if($reason) $content .= ',取消原因:'.$reason;
						send_sms($t['mobile'], $content.$AJ['sms_sign']);
					}
				}
				$i++;
			}
		}
		dmsg('取消认证 '.$i.' 条', $forward);		
	break;
	case 'reject':
		$itemid or msg('请选择记录');
		$i = 0;
		foreach($itemid as $id) {
			$r = $db->get_one("SELECT * FROM {$table} WHERE itemid='$id' AND status=2");
			if($r) {
				$username = $r['username'];
				$fd = $r['type'];
				$userid = get_user($username);
				if($r['thumb']) delete_upload($r['thumb'], $userid);
				if($r['thumb1']) delete_upload($r['thumb1'], $userid);
				if($r['thumb2']) delete_upload($r['thumb2'], $userid);
				$db->query("DELETE FROM {$table} WHERE itemid=$id");
				if($msg) {
					$content = $title = '您的'.$V[$fd].'没有通过审核，请重新认证';
					if($reason) $content .= '<br/>失败原因:'.nl2br($reason);
					send_message($username, $title, $content);
				}
				if($msg) {
					$t = $db->get_one("SELECT mobile FROM {$AJ_PRE}member WHERE username='$username'");
					if($t) {
						$content = '您的'.$V[$fd].'没有通过审核，请重新认证';
						if($reason) $content .= ',失败原因:'.$reason;
						send_sms($t['mobile'], $content.$AJ['sms_sign']);
					}
				}
				$i++;
			}
		}
		dmsg('拒绝认证 '.$i.' 条', $forward);		
	break;
	case 'check':
		$itemid or msg('请选择记录');
		$i = 0;
		foreach($itemid as $id) {
			$r = $db->get_one("SELECT * FROM {$table} WHERE itemid='$id' AND status=2");
			if($r) {
				$value = $r['title'];
				$username = $r['username'];
				$fd = $r['type'];
				$vfd = 'v'.$r['type'];
				$db->query("UPDATE {$AJ_PRE}member SET `{$fd}`='$value',`{$vfd}`=1 WHERE username='$username'");
				if($fd == 'company') $db->query("UPDATE {$AJ_PRE}company SET `company`='$value' WHERE username='$username'");
				$db->query("UPDATE {$table} SET status=3,editor='$_username',edittime='$AJ_TIME' WHERE itemid='$id'");
				if($msg) {
					$content = $title = '您的'.$V[$fd].'已经通过审核';
					if($reason) $content .= '<br/>'.nl2br($reason);
					send_message($username, $title, $content);
				}
				if($msg) {
					$t = $db->get_one("SELECT mobile FROM {$AJ_PRE}member WHERE username='$username'");
					if($t) {
						$content = '您的'.$V[$fd].'已经通过审核';
						if($reason) $content .= ','.$reason;
						send_sms($t['mobile'], $content.$AJ['sms_sign']);
					}
				}
				$i++;
			}
		}
		dmsg('通过认证 '.$i.' 条', $forward);		
	break;
	default:
		$action or $action = 'company';
		$menuid = $S[$action];
		$sfields = array('按条件', '认证项', '会员名', '操作人');
		$dfields = array('title', 'title', 'username', 'editor');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($type) or $type = '';
		$status = isset($status) ? intval($status) : 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND addtime>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND addtime<".(strtotime($totime.' 23:59:59'));
		if($action) $condition .= " AND type='$action'";
		if($status) $condition .= " AND status=$status";
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);	
		$lists = array();
		$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY itemid DESC LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['addtime'] = timetodate($r['addtime'], 5);
			$lists[] = $r;
		}
		include tpl('validate', $module);
	break;
}
?>