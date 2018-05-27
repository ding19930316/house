<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
function del_token($arr) {
	if($arr) {
		foreach($arr as $v) {
			$_SESSION[$v] = '';
		}
	}
}
if($success) {
	$U = $db->get_one("SELECT * FROM {$AJ_PRE}oauth WHERE openid='$openid' AND site='$site'");
	if($_userid) {
		if($U) {
			if($U['username'] == $_username) {
				$update = '';
				if($U['nickname'] != $nickname) $update .= ",nickname='".addslashes($nickname)."'";
				if($U['avatar'] != $avatar) $update .= ",avatar='".addslashes($avatar)."'";
				if($U['url'] != $url) $update .= ",url='".addslashes($url)."'";
				if($update) {
					$update = substr($update, 1);
					$db->query("UPDATE {$AJ_PRE}oauth SET {$update} WHERE itemid=$U[itemid]");
				}
				del_token($DS);
				dheader($MODULE[2]['linkurl'].'oauth.php');
			} else {
				$db->query("UPDATE {$AJ_PRE}oauth SET username='$_username',nickname='".addslashes($nickname)."',avatar='".addslashes($avatar)."',url='".addslashes($url)."' WHERE itemid=$U[itemid]");
				del_token($DS);
				dheader($MODULE[2]['linkurl'].'oauth.php');
			}
		} else {
			$db->query("DELETE FROM {$AJ_PRE}oauth WHERE username='$_username' AND site='$site'");
			$db->query("INSERT INTO {$AJ_PRE}oauth (username,site,openid,nickname,avatar,url,addtime,logintime,logintimes) VALUES ('$_username','$site','$openid','".addslashes($nickname)."','".addslashes($avatar)."','".addslashes($url)."','$AJ_TIME','$AJ_TIME','1')");
			$forward = get_cookie('forward_url');
			if($forward) set_cookie('forward_url', '');
			if(strpos($forward, 'api/oauth') !== false) $forward = '';
			del_token($DS);
			dheader($forward ? $forward : $MODULE[2]['linkurl'].'oauth.php');
		}
	} else {
		if($U) {
			$update = "logintimes=logintimes+1,logintime=$AJ_TIME";
			if($U['nickname'] != $nickname) $update .= ",nickname='".addslashes($nickname)."'";
			if($U['avatar'] != $avatar) $update .= ",avatar='".addslashes($avatar)."'";
			if($U['url'] != $url) $update .= ",url='".addslashes($url)."'";
			$db->query("UPDATE {$AJ_PRE}oauth SET {$update} WHERE itemid=$U[itemid]");
			include load('member.lang');
			$MOD = cache_read('module-2.php');
			include AJ_ROOT.'/include/module.func.php';
			include AJ_ROOT.'/module/member/member.class.php';
			$do = new member;
			$user = $do->login($U['username'], '', 0, true);
			if($user) {
				$forward = get_cookie('forward_url');
				if($forward) set_cookie('forward_url', '');
				if(strpos($forward, 'api/oauth') !== false) $forward = '';
				$forward or $forward = $MODULE[2]['linkurl'];
				del_token($DS);
				$api_msg = '';
				if($MOD['passport'] == 'uc') {				
					$action = 'oauth';
					$passport = $user['passport'];
					include AJ_ROOT.'/api/'.$MOD['passport'].'.inc.php';
				}
				#if($MOD['sso']) include AJ_ROOT.'/api/sso.inc.php';
				if($api_msg) message($api_msg, $forward, -1);
				dheader($forward);
			} else {
				message($do->errmsg, $MODULE[2]['linkurl'].$AJ['file_login']);
			}
		} else {
			if(!get_cookie('oauth_site')) {
				set_cookie('oauth_user', $nickname);
				set_cookie('oauth_site', $site);
				dheader(AJ_PATH);
			}
			set_cookie('bind', 1);
			$MOD = cache_read('module-2.php');
			$forward = AJ_PATH.'api/oauth/'.$site.'/';
			include template('bind', 'member');
		}
	}
} else {
	del_token($DS);
	dheader($MODULE[2]['linkurl'].$AJ['file_login'].'?error=oauth&step=userinfo&site='.$site);
}
?>