<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
login();
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
require MD_ROOT.'/member.class.php';
require AJ_ROOT.'/include/post.func.php';
$do = new member;
$do->userid = $_userid;
$user = $do->get_one();

$MFD = cache_read('fields-member.php');
$CFD = cache_read('fields-company.php');
isset($post_fields) or $post_fields = array();
if($MFD || $CFD) require AJ_ROOT.'/include/fields.func.php';
$group_editor = $MG['editor'];
in_array($group_editor, array('Default', 'Aijiacms', 'Simple', 'Basic')) or $group_editor = 'Aijiacms';

$tab = isset($tab) ? intval($tab) : 0;
if($submit) {
	if($post['password'] && $user['password'] != md5(md5($post['oldpassword']))) message($L['error_password']);
	if($post['payword'] && $user['payword'] != md5(md5($post['oldpayword']))) message($L['error_payword']);
	$post['groupid'] = $user['groupid'];
	$post['email'] = $user['email'];
	$post['passport'] = $user['passport'];
	//$post['company'] = $user['company'];
	//$post['companyid'] = $post['companyid'];
	$post['domain'] = $user['domain'];
	$post['icp'] = $user['icp'];
	$post['skin'] = $user['skin'];
	$post['template'] = $user['template'];
	$post['edittime'] = $AJ_TIME;
	$post['bank'] = $user['bank'];
	$post['account'] = $user['account'];
	$post['validated'] = $user['validated'];
	$post['validator'] = $user['validator'];
	$post['validtime'] = $user['validtime'];
	$post['vemail'] = $user['vemail'];
	$post['vmobile'] = $user['vmobile'];
	$post['vtruename'] = $user['vtruename'];
	$post['vbank'] = $user['vbank'];
	$post['vcompany'] = $user['vcompany'];
	$post['vtrade'] = $user['vtrade'];
	$post['trade'] = $user['trade'];
	$post['support'] = $user['support'];
	$post['inviter'] = $user['inviter'];
	if($post['vmobile']) $post['mobile'] = $user['mobile'];
	if($post['vtruename']) $post['truename'] = $user['truename'];
	$post = daddslashes(dstripslashes($post));
	if($MFD) fields_check($post_fields, $MFD);
	if($CFD) fields_check($post_fields, $CFD);
	if($do->edit($post)) {
		if($MFD) fields_update($post_fields, $do->table_member, $do->userid, 'userid', $MFD);
		if($CFD) fields_update($post_fields, $do->table_company, $do->userid, 'userid', $CFD);
		if($user['edittime'] == 0 && $user['inviter'] && $MOD['credit_user']) {
			$inviter = $user['inviter'];
			$r = $db->get_one("SELECT itemid FROM {$AJ_PRE}finance_credit WHERE note='$_username' AND username='$inviter'");
			if(!$r) {
				credit_add($inviter, $MOD['credit_user']);
				credit_record($inviter, $MOD['credit_user'], 'system', $L['edit_invite'], $_username);
			}
		}
		if($user['edittime'] == 0 && $MOD['credit_edit']) {
			credit_add($_username, $MOD['credit_edit']);
			credit_record($_username, $MOD['credit_edit'], 'system', $L['edit_profile'], $AJ_IP);
		}
		if($post['password']) message($L['edit_msg_success'].$L['edit_msg_password'], '?tab='.$tab.'&success=1');
		dmsg($L['edit_msg_success'], '?tab='.$tab.'&success=1');
	} else {
		message($do->errmsg);
	}
} else {
	$COM_TYPE = explode('|', $MOD['com_type']);
	$COM_SIZE = explode('|', $MOD['com_size']);
	$COM_MODE = explode('|', $MOD['com_mode']);
	$MONEY_UNIT = explode('|', $MOD['money_unit']);
	$head_title = $L['edit_title'];
	extract($user);
	$mode_check = dcheckbox($COM_MODE, 'post[mode][]', $mode, 'onclick="check_mode(this, '.$MOD['mode_max'].');"', 0);
	$content_table = content_table(4, $userid, is_file(AJ_CACHE.'/4.part'), $AJ_PRE.'company_data');
	$t = $db->get_one("SELECT * FROM {$content_table} WHERE userid=$userid");
	if($t) {
		$introduce = $t['content'];
	} else {
		$introduce = '';
		$db->query("INSERT INTO {$content_table} (userid,content) VALUES ('$userid','')");
	}
	$cates = $catid ? explode(',', substr($catid, 1, -1)) : array();
	$is_company = $_groupid > 5 || ($_groupid == 4 && $regid > 5);
	$tab = isset($tab) ? intval($tab) : -1;
	if($tab == 2 && !$is_company) $tab = 0;
	include template('edit', $module);
}
?>