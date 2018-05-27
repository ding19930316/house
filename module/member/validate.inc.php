<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
login();
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
$MOD['vmember'] or dheader($MOD['linkurl']);
require MD_ROOT.'/member.class.php';
require AJ_ROOT.'/include/post.func.php';
$do = new member;
$do->userid = $_userid;
$user = $do->get_one();
$username = $_username;
$auth = isset($auth) ? trim($auth) : '';
switch($action) {
	case 'email':
		$MOD['vemail'] or dheader($MOD['linkurl']);
		if($AJ['mail_type'] == 'close') message($L['send_mail_close']);
		$head_title = $L['validate_email_title'];
		if($user['vemail']) {
			$action = 'v'.$action;
			include template('validate', $module);
			exit;
		}
		if($auth) {
			if($auth == $user['auth']) {
				auth_time($user['authtime']);
				$email = $user['authvalue'];
				$r = $db->get_one("SELECT userid FROM {$AJ_PRE}member WHERE email='$email' AND userid<>$_userid");
				if($r) message($L['validate_email_exist'], $MOD['linkurl']);
				$db->query("UPDATE {$AJ_PRE}member SET email='$email',vemail=1,auth='',authvalue='',authtime=0 WHERE username='$username'");	
				$db->query("INSERT INTO {$AJ_PRE}validate (type,username,ip,addtime,status,title,editor,edittime) VALUES ('email','$username','$AJ_IP','$AJ_TIME','3','$email','system','$AJ_TIME')");
				message($L['validate_email_success'], $MOD['linkurl']);
			}
			dalert($L['check_auth'], AJ_PATH);
		} else {
			if($submit) {				
				captcha($captcha);
				is_email($email) or message($L['validate_email_bad']);
				$r = $db->get_one("SELECT userid FROM {$AJ_PRE}member WHERE email='$email' AND userid<>$_userid");
				if($r) message($L['validate_email_exist']);
				$auth = make_auth($username);
				$db->query("UPDATE {$AJ_PRE}member SET auth='$auth',authvalue='$email',authtime='$AJ_TIME' WHERE username='$username'");
				$authurl = $MOD['linkurl'].'validate.php?action='.$action.'&auth='.$auth;
				$title = $L['validate_email_mail'];
				$content = ob_template('validate', 'mail');
				send_mail($email, $title, stripslashes($content));
				dheader($MOD['linkurl'].'goto.php?action='.$action.'&email='.$email);
			} else {
				include template('validate', $module);
			}
		}
	break;
	case 'mobile':
		$MOD['vmobile'] or dheader($MOD['linkurl']);
		$AJ['sms'] or message($L['send_sms_close']);
		$head_title = $L['validate_mobile_title'];
		if($user['vmobile']) {
			$action = 'v'.$action;
			include template('validate', $module);
			exit;
		}
		if($auth) {
			if($auth == $user['auth']) {
				auth_time($user['authtime']);
				$mobile = $user['authvalue'];
				$r = $db->get_one("SELECT userid FROM {$AJ_PRE}member WHERE mobile='$mobile' AND vmobile=1 AND userid<>$_userid");
				if($r) message($L['validate_mobile_exist'], $MOD['linkurl']);
				$db->query("UPDATE {$AJ_PRE}member SET mobile='$mobile',vmobile=1,auth='',authvalue='',authtime=0 WHERE username='$username'");
				$db->query("INSERT INTO {$AJ_PRE}validate (type,username,ip,addtime,status,title,editor,edittime) VALUES ('mobile','$username','$AJ_IP','$AJ_TIME','3','$mobile','system','$AJ_TIME')");
				message($L['validate_mobile_success'], $MOD['linkurl']);
			}
			message($L['validate_mobile_code_error']);
		} else {
			$fee = $AJ['sms_fee'];
			if($submit) {
				is_mobile($mobile) or message($L['validate_mobile_bad']);
				$r = $db->get_one("SELECT userid FROM {$AJ_PRE}member WHERE mobile='$mobile' AND vmobile=1 AND userid<>$_userid");
				if($r) message($L['validate_mobile_exist']);
				if($fee && $_sms < 1) {
					$fee <= $_money or message($L['money_not_enough'], $MOD['linkurl'].'charge.php?action=pay');
					is_payword($_username, $password) or dalert($L['error_payword']);
				}
				$auth = random(6, '0123456789');
				$content = lang('sms->sms_code', array($auth, $MOD['auth_days'])).$AJ['sms_sign'];
				$sms_code = send_sms($mobile, $content);
				if(strpos($sms_code, $AJ['sms_ok']) !== false) {
					if($fee) {
						if($_sms < 1) {
							money_add($_username, -$fee);
							money_record($_username, -$fee, $L['in_site'], 'system', $L['validate_mobile_record'], $mobile);
						} else {
							sms_add($_username, -1);
							sms_record($_username, -1, $_username, $L['validate_mobile_record'], $mobile);
						}
					}
					$db->query("UPDATE {$AJ_PRE}member SET auth='$auth',authvalue='$mobile',authtime='$AJ_TIME' WHERE username='$username'");
					dheader('?code=1&action='.$action);
				} else {
					message($L['send_mobile_fail']);
				}
			}
			include template('validate', $module);
		}
	break;
	case 'truename':
		$MOD['vtruename'] or dheader($MOD['linkurl']);
		$head_title = $L['validate_truename_title'];
		$v = $db->get_one("SELECT * FROM {$AJ_PRE}validate WHERE type='$action' AND username='$username'");
		if($user['vtruename'] || $v) {
			$action = 'v'.$action;
			include template('validate', $module);
			exit;
		}
		if($submit) {
			if(!$truename) message($L['validate_truename_name']);
			if(!$thumb) message($L['validate_truename_image']);
			clear_upload($thumb.$thumb1.$thumb2);
			$truename = htmlspecialchars($truename);
			$thumb = htmlspecialchars($thumb);
			$thumb1 = htmlspecialchars($thumb1);
			$thumb2 = htmlspecialchars($thumb2);
			$db->query("INSERT INTO {$AJ_PRE}validate (type,username,ip,addtime,status,editor,edittime,title,thumb,thumb1,thumb2) VALUES ('$action','$username','$AJ_IP','$AJ_TIME','2','system','$AJ_TIME','$truename','$thumb','$thumb1','$thumb2')");
			dmsg($L['validate_truename_success'], '?action='.$action);
		} else {
			include template('validate', $module);
		}
	break;
	case 'company':
		$MOD['vcompany'] or dheader($MOD['linkurl']);
		$head_title = $L['validate_company_title'];
		$v = $db->get_one("SELECT * FROM {$AJ_PRE}validate WHERE type='$action' AND username='$username'");
		if($user['vcompany'] || $v) {
			$action = 'v'.$action;
			include template('validate', $module);
			exit;
		}
		if($submit) {
			if(!$company) message($L['validate_company_name']);
			if(!$thumb) message($L['validate_company_image']);
			clear_upload($thumb.$thumb1.$thumb2);
			$company = htmlspecialchars($company);
			$thumb = htmlspecialchars($thumb);
			$thumb1 = htmlspecialchars($thumb1);
			$thumb2 = htmlspecialchars($thumb2);
			$db->query("INSERT INTO {$AJ_PRE}validate (type,username,ip,addtime,status,editor,edittime,title,thumb,thumb1,thumb2) VALUES ('$action','$username','$AJ_IP','$AJ_TIME','2','system','$AJ_TIME','$company','$thumb','$thumb1','$thumb2')");
			dmsg($L['validate_company_success'], '?action='.$action);
		} else {
			include template('validate', $module);
		}
	break;
	case 'bank':
		$head_title = $L['validate_bank_title'];
		include template('validate', $module);
	break;
	default:
		dheader($MOD['linkurl']);
	break;
}
?>