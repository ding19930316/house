<?php
defined('IN_AIJIACMS') or exit('Access Denied');
if($_userid) dheader($MOD['linkurl']);
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
require MD_ROOT.'/member.class.php';
require AJ_ROOT.'/include/post.func.php';
$do = new member;
$forward = $forward ? linkurl($forward) : AJ_PATH;
if(isset($auto)) $submit = true;
if($submit && $MOD['captcha_login'] && strlen($captcha) < 4) $submit = false;
$action = 'login';
if($submit) {
	captcha($captcha, $MOD['captcha_login']);
	$username = trim($username);
	$password = trim($password);
	if(strlen($username) < 3) message($L['login_msg_username']);
	if(strlen($password) < 5) message($L['login_msg_password']);
	$goto = isset($goto) ? true : false;
	if($goto) $forward = $MOD['linkurl'];
	$cookietime = isset($cookietime) ? 86400*30 : 0;
	$api_msg = $api_url = '';
	$option = isset($option) ? trim($option) : 'username';
	if(is_email($username) && $option == 'username') $option = 'email';
	if(!check_name($username) && $option == 'username') $option = 'passport';
	in_array($option, array('username', 'passport', 'email', 'mobile', 'company', 'userid')) or $option = 'username';
	$r = $db->get_one("SELECT username,passport FROM {$AJ_PRE}member WHERE `$option`='$username'");
	if($r) {
		$username = $r['username'];
		$passport = $r['passport'];
		//echo '({"html":"'.$typeword.' <b style=\"color:#ff6600;\">'.$username.'<\/b> [<a href=\"\/index.php?s=member\/index\/\" target=\"_blank\">\u7528\u6237\u4e2d\u5fc3<\/a>] [<a href=\"\/index.php?s=member\/index\/logout\">\u5b89\u5168\u9000\u51fa<\/a>]"})';
	} else {
		if($option == 'username' || $option == 'passport') {
			$passport = $username;
			if($option == 'username' && $MOD['passport']) {
				$r = $db->get_one("SELECT username FROM {$AJ_PRE}member WHERE `passport`='$username'");
				if($r) $username = $r['username'];
			}
		} else {
			message($L['login_msg_not_member'].'?');
		}
	}
	if($MOD['passport'] == 'uc') include AJ_ROOT.'/api/'.$MOD['passport'].'.inc.php';
	$user = $do->login($username, $password, $cookietime);
	if($user) {
		if($MOD['passport'] && $MOD['passport'] != 'uc') {
			$api_url = '';
			$user['password'] = is_md5($password) ? $password : md5($password);//Once MD5
			if(strtoupper($MOD['passport_charset']) != strtoupper(AJ_CHARSET)) $user = convert($user, AJ_CHARSET, $MOD['passport_charset']);
			extract($user);
			include AJ_ROOT.'/api/'.$MOD['passport'].'.inc.php';
			if($api_url) $forward = $api_url;
		}
		#if($MOD['sso']) include AJ_ROOT.'/api/sso.inc.php';
		if($AJ['login_log'] == 2) $do->login_log($username, $password, 0);
		if($api_msg) message($api_msg, $forward, -1);
		message($api_msg, $forward);
	} else {
		if($AJ['login_log'] == 2) $do->login_log($username, $password, 0, $do->errmsg);
		message($do->errmsg);
	}
} else {
	isset($username) or $username = $_username;
	isset($password) or $password = '';
	$register = isset($register) && $username ? 1 : 0;
	if(!$username) $username = get_cookie('username');
	if(!check_name($username)) $username = '';
	$OAUTH = cache_read('oauth.php');
	$oa = 0;
	foreach($OAUTH as $v) {
		if($v['enable']) {
			$oa = 1;
			break;
		}
	}
	set_cookie('forward_url', $forward);
	$head_title = $register ? $L['login_title_reg'] : $L['login_title'];
	// print_r($module);exit;
	include template('login', $module);
}

?>
