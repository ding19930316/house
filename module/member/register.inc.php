<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
if($_userid) dheader($MOD['linkurl']);
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
if(isset($print)) exit(include template('agreement', $module));
if(!$MOD['enable_register']) message($L['register_msg_close'], AJ_PATH);
if($MOD['defend_proxy']) {
	if($_SERVER['HTTP_X_FORWARDED_FOR'] || $_SERVER['HTTP_VIA'] || $_SERVER['HTTP_PROXY_CONNECTION'] || $_SERVER['HTTP_USER_AGENT_VIA'] || $_SERVER['HTTP_CACHE_INFO'] || $_SERVER['HTTP_PROXY_CONNECTION']) {
		message(lang('include->defend_proxy'));
	}
}
if($MOD['banagent']) {
	$banagent = explode('|', $MOD['banagent']);
	foreach($banagent as $v) {
		if(strpos($_SERVER['HTTP_USER_AGENT'], $v) !== false) message($L['register_msg_agent'], AJ_PATH, 5);
	}
}
if($MOD['iptimeout']) {
	$timeout = $AJ_TIME - $MOD['iptimeout']*3600;
	$r = $db->get_one("SELECT userid FROM {$AJ_PRE}member WHERE regip='$AJ_IP' AND regtime>'$timeout'");
	if($r) message(lang($L['register_msg_ip'], array($MOD['iptimeout'])), AJ_PATH);
}
if($AJ['mail_type'] == 'close' && $MOD['checkuser'] == 2) $MOD['checkuser'] = 0;
require AJ_ROOT.'/include/post.func.php';
require MD_ROOT.'/member.class.php';
$do = new member;
$session = new dsession();

$could_emailcode = ($MOD['emailcode_register'] && $AJ['mail_type'] != 'close');
$action_sendcode = crypt_action('sendcode');
if($could_emailcode) {
	if($MOD['checkuser'] == 2) $MOD['checkuser'] = 0;
	if($action == $action_sendcode) {
		$email = isset($value) ? trim($value) : '';
		if(!is_email($email)) exit('2');
		if($do->email_exists($email)) exit('3');
		if(!$do->is_email($email)) exit('4');
		isset($_SESSION['email_send']) or $_SESSION['email_send'] = 0;
		if($_SESSION['email_time'] && $AJ_TIME - $_SESSION['email_time'] < 60) exit('5');
		if($_SESSION['email_send'] > 9) exit('6');

		$emailcode = random(6, '0123456789');
		$_SESSION['email'] = $email;
		$_SESSION['email_code'] = md5($email.'|'.$emailcode);
		$_SESSION['email_time'] = $AJ_TIME;
		$_SESSION['email_send'] = $_SESSION['email_send'] + 1;

		$title = $L['register_msg_emailcode'];
		$content = ob_template('emailcode', 'mail');
		send_mail($email, $title, stripslashes($content));
		exit('1');
	}
}

$could_mobilecode = ($MOD['mobilecode_register'] && $AJ['sms']);
$action_sendscode = crypt_action('sendscode');
if($could_mobilecode) {
	if($action == $action_sendscode) {
		$mobile = isset($value) ? trim($value) : '';
		if(!is_mobile($mobile)) exit('2');
		isset($_SESSION['mobile_send']) or $_SESSION['mobile_send'] = 0;
		if($do->mobile_exists($mobile)) exit('3');
		if($_SESSION['mobile_time'] && $AJ_TIME - $_SESSION['mobile_time'] < 180) exit('5');
		if($_SESSION['mobile_send'] > 4) exit('6');

		$mobilecode = random(6, '0123456789');
		$_SESSION['mobile'] = $mobile;
		$_SESSION['mobile_code'] = md5($mobile.'|'.$mobilecode);
		$_SESSION['mobile_time'] = $AJ_TIME;
		$_SESSION['mobile_send'] = $_SESSION['mobile_send'] + 1;

		$content = lang('sms->sms_code', array($mobilecode, $MOD['auth_days'])).$AJ['sms_sign'];
		send_sms($mobile, $$content);
		exit('1');
	}
}


$FD = $MFD = cache_read('fields-member.php');
$CFD = cache_read('fields-company.php');
isset($post_fields) or $post_fields = array();
if($MFD || $CFD) require AJ_ROOT.'/include/fields.func.php';
$GROUP = cache_read('group.php');
if($submit) {
	if($action != crypt_action('register')) dalert($L['check_sign'].'(1)');
	$post['passport'] = isset($post['passport']) && $post['passport'] ? $post['passport'] : $post['username'];
	if($MOD['passport'] == 'uc') {
		$passport = convert($post['passport'], AJ_CHARSET, $MOD['uc_charset']);
		require AJ_ROOT.'/api/uc.inc.php';
		list($uid, $rt_username, $rt_password, $rt_email) = uc_user_login($passport, $post['password']);
		if($uid == -2) dalert($L['register_msg_passport'], '', 'parent.Dd("passport").focus();');
	}
	$msg = captcha($captcha, $MOD['captcha_register'], true);
	if($msg) dalert($msg);
	$msg = question($answer, $MOD['question_register'], true);
	if($msg) dalert($msg);
	$post['email'] = trim($post['email']);
	if($_SESSION['regemail'] != md5(md5($post['email'].AJ_KEY.$AJ_IP))) dalert($L['check_sign'].'(2)');
	$RG = array();
	foreach($GROUP as $k=>$v) {
		if($k > 4 && $v['vip'] == 0) $RG[] = $k;
	}	
	$reload_captcha = $MOD['captcha_register'] ? reload_captcha() : '';
	$reload_question = $MOD['question_register'] ? reload_question() : '';
	in_array($post['regid'], $RG) or dalert($L['register_pass_groupid'], '', $reload_captcha.$reload_question);
	if($could_emailcode) {
		if(!preg_match("/[0-9]{6}/", $post['emailcode']) || $_SESSION['email_code'] != md5($post['email'].'|'.$post['emailcode'])) dalert($L['register_pass_emailcode'], '', $reload_captcha.$reload_question);
	}
	if($could_mobilecode) {
		if(!preg_match("/[0-9]{6}/", $post['mobilecode']) || $_SESSION['mobile_code'] != md5($post['mobile'].'|'.$post['mobilecode'])) dalert($L['register_pass_mobilecode'], '', $reload_captcha.$reload_question);
	}
	if($post['regid'] == 5) $post['company'] = $post['truename'];
	$post['groupid'] = $MOD['checkuser'] ? 4 : $post['regid'];
	$post['content'] = $post['introduce'] = $post['thumb'] = $post['banner'] = $post['catid'] = $post['catids'] = '';
	$post['edittime'] = 0;
	$inviter = get_cookie('inviter');
	$post['inviter'] = $inviter ? decrypt($inviter) : '';
	if($do->add($post)) {
		$userid = $do->userid;
		$username = $post['username'];
		$email = $post['email'];
		if($MFD) fields_update($post_fields, $do->table_member, $userid, 'userid', $MFD);
		if($CFD) fields_update($post_fields, $do->table_company, $userid, 'userid', $CFD);
		if($MOD['passport'] == 'uc') {
			$uid = uc_user_register($passport, $post['password'], $post['email']);
			if($uid > 0 && $MOD['uc_bbs']) uc_user_regbbs($uid, $passport, $post['password'], $post['email']);
		}
		//send sms
		if($MOD['welcome_sms'] && $AJ['sms'] && is_mobile($post['mobile'])) {
			$message = lang('sms->wel_reg', array($post['truename'], $AJ['sitename'], $post['username'], $post['password']));
			$message = strip_sms($message);
			send_sms($post['mobile'], $message);
		}
		//send sms
		if($MOD['checkuser'] == 2) {
			$auth = make_auth($username);
			$db->query("UPDATE {$AJ_PRE}member SET auth='$auth',authvalue='$email',authtime='$AJ_TIME' WHERE username='$username'");
			$authurl = $MOD['linkurl'].'send.php?action=check&auth='.$auth;
			$title = $L['register_msg_activate'];
			$content = ob_template('check', 'mail');
			send_mail($email, $title, $content);
			$goto = $MOD['linkurl'].'goto.php?action=register&email='.$email;
			dalert('', '', 'top.window.location="'.$goto.'";');
		} else if($MOD['checkuser'] == 0) {
			if($MOD['welcome_message'] || $MOD['welcome_email']) {
				$title = $L['register_msg_welcome'];
				$content = ob_template('welcome', 'mail');
				if($MOD['welcome_message']) send_message($username, $title, $content);
				if($MOD['welcome_email'] && $AJ['mail_type'] != 'close') send_mail($post['email'], $title, $content);
			}
		}
		if($could_emailcode) $db->query("UPDATE {$AJ_PRE}member SET vemail=1 WHERE username='$username'");
		if($could_mobilecode) $db->query("UPDATE {$AJ_PRE}member SET vmobile=1 WHERE username='$username'");
		if(!get_cookie('bind')) session_destroy();
		echo '<html><head><title>Login...</title><meta http-equiv="Content-Type" content="text/html;charset='.AJ_CHARSET.'"></head>';
		echo '<body onload="document.getElementById(\'login\').submit();">';
		echo '<form method="post" action="'.$MOD['linkurl'].$AJ['file_login'].'" id="login" target="_top">';
		echo '<input type="hidden" name="forward" value="'.($forward ? $forward : $MOD['linkurl']).'"/>';
		echo '<input type="hidden" name="username" value="'.$username.'"/>';
		echo '<input type="hidden" name="password" value="'.$post['password'].'"/>';
		echo '<input type="hidden" name="auto" value="1"/>';
		echo '<input type="hidden" name="captcha" value=""/>';
		echo '</form></body></html>';
		exit;
	} else {
		$reload_captcha = $MOD['captcha_register'] ? reload_captcha() : '';
		$reload_question = $MOD['question_register'] ? reload_question() : '';
		dalert($do->errmsg, '', $reload_captcha.$reload_question);
	}
} else {
	$COM_TYPE = explode('|', $MOD['com_type']);
	$COM_SIZE = explode('|', $MOD['com_size']);
	$COM_MODE = explode('|', $MOD['com_mode']);
	$MONEY_UNIT = explode('|', $MOD['money_unit']);
	$mode_check = dcheckbox($COM_MODE, 'post[mode][]', '', 'onclick="check_mode(this);"', 0);
	$auth = isset($auth) ? rawurldecode($auth) : '';
	$username = $password = $email = $passport = '';
	if($auth) {
		$auth = decrypt($auth);
		$auth = explode('|', $auth);
		$passport = $auth[0];
		if(check_name($passport)) $username = $passport;
		$password = $auth[1];
		$email = is_email($auth[2]) ? $auth[2] : '';
		if($email) $_SESSION['regemail'] = md5(md5($email.AJ_KEY.$AJ_IP));
	}
	$areaid = $cityid;
	set_cookie('forward_url', $forward);
	$head_title = $L['register_title'];
	include template('register', $module);
}
?>