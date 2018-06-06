<?php
defined('IN_AIJIACMS') or exit('Access Denied');
login();
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
//$MG['addmember_limit'] > -1 or dalert(lang('message->without_permission_and_upgrade'), 'goback');
require AJ_ROOT.'/include/post.func.php';
require MD_ROOT.'/addmember.class.php';
$do = new address();
// print_r($action);exit;
switch($action) {
	case 'add':
			if($MG['addmember_limit']) {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$AJ_PRE}member WHERE company='$_company'");
			if($r['num'] >= $MG['addmember_limit']) dalert(lang($L['limit_add'], array($MG['addmember_limit'], $r['num'])), 'goback');
		}
		if($submit) {
			if($do->pass($post)) {
				$post['company'] = $_company;
				$post['companyid'] = $db->get_one("select companyid from {$this->table_member} WHERE userid='$_userid'")['companyid'];
				$post['groupid'] = $post['groupid'];
			 $post['company'] = $post['truename'];
			$post['passport'] = $post['passport'] ? $post['passport'] : $post['username'];
			$post['edittime'] = $post['edittime'] ? $AJ_TIME : 0;
			$post['inviter'] = $post['username'];

								$do->add($post);
				dmsg($L['op_add_success'], $MOD['linkurl'].'addmember.php');
			} else {
				message($do->errmsg);
			}
		} else {
			$head_title = $L['addmember_title_add'];
		}
	break;
	case 'edit':
		$userid or message();
		$do->userid = $userid;
		echo $userid;
		$r = $do->get_one();
		if(!$r || $r['company'] != $_company) message();
		if($submit) {
			if($do->pass($post)) {
				$post['company'] = $_company;
				$do->edit($post);
				dmsg($L['op_edit_success'], $forward);
			} else {
				message($do->errmsg);
			}
		} else {
			extract($r);
			$head_title = $L['addmember_title_edit'];
		}
	break;
	case 'delete':
		$userid or message($L['addmember_msg_choose']);
		$do->userid = $userid;
		$r = $do->get_one();
		if(!$r || $r['company'] != $_company) message();
		$do->delete($userid);
		dmsg($L['op_del_success'], $forward);
	break;
	case 'edit_all':
	// print_r(111);exit;
		if($right['adminmaster']){
			if($_POST['type']){
				switch ($_POST['type']) {
					case 'setmaster':
						$resl = $db->query("update {$AJ_PRE}member set companymaster = '0' WHERE companyid='{$_POST['companyid']}'");
						if($_POST['v'] != '0')$res2 = $db->query("update {$AJ_PRE}member set companymaster = '1' WHERE userid='{$_POST['v']}'");
						echo "设置成功";
						exit;
						break;
					case 'doubleset':
						$level = (int)$_POST['level'];
						// print_r("update {$AJ_PRE}company set level = $level WHERE userid='{$_POST['companyid']}'");
						$resl = $db->query("update {$AJ_PRE}company set level = $level WHERE userid='{$_POST['companyid']}'");
						echo "设置成功";
						exit;
						break;
					case 'getline':
						$result = $db->query("select userid,truename from {$AJ_PRE}member where companyid = '{$_POST['companyid']}'");
						$resl = $db->query("update {$AJ_PRE}company set level = '999' WHERE userid='{$_POST['companyid']}'");
						// $result = $db->query("SELECT * FROM {$db->pre}member where companyid='$companyid'");
						while($r = $db->fetch_array($result)) {
							$members[] = $r;
						}
						// $resl = $db->query("update {$AJ_PRE}member set companymaster = '0' WHERE companyid='{$_POST['companyid']}'");
						// if($_POST['v'] != '0')$res2 = $db->query("update {$AJ_PRE}member set companymaster = '1' WHERE userid='{$_POST['v']}'");
						echo json_encode($members,JSON_UNESCAPED_UNICODE);
						exit;
						break;
					default:
						// code...
						break;
				}
			}

			$result = $db->query("select * from {$AJ_PRE}company WHERE level>='1000' limit 0,100");
			while($r = $db->fetch_array($result)) {
				$companys_n[$r['company']] = $r;
			}
			$companys_n = json_encode($companys_n,JSON_UNESCAPED_UNICODE);
			// print_r($companys_n);exit;
			$result = $db->query("select * from {$AJ_PRE}company WHERE level<'1000' order by level asc");
			while($r = $db->fetch_array($result)) {
				$companys_l[] = $r;
			}
			$companys_l_s = array();
			foreach ($companys_l as $v) {
				$result = $db->query("select * from {$AJ_PRE}member WHERE companyid = '{$v['userid']}' ");
				while($r = $db->fetch_array($result)) {
					$companys_l_s[$v['userid']][] = $r;
				}
			}
			// print_r($companys_l_s);exit;
		}
		else{
			$action = '';
			$condition = "company='$_company'";
			if($keyword) $condition .= " AND member LIKE '%$keyword%'";
			// print_r($condition);exit;
			$lists = $do->get_list($condition);
			$head_title = $L['addmember_title'];
		}
	break;
	default:
		$condition = "company='$_company'";
		if($keyword) $condition .= " AND member LIKE '%$keyword%'";
		// print_r($condition);exit;

		$lists = $do->get_list($condition);
		$head_title = $L['addmember_title'];
	break;
	}
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$AJ_PRE}member WHERE company='$_company'");
$limit_used = $r['num'];

$limit_free = $MG['addmember_limit'] && $MG['addmember_limit'] > $limit_used ? $MG['addmember_limit'] - $limit_used : 0;
// print_r($lists);exit;
include template('addmember', $module);
?>
