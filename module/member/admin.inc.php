<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
$admin_user = false;
if($_groupid == 1) {
	$admin_user = decrypt(get_cookie('admin_user'));
	if($admin_user) {
		$_USER = explode('|', $admin_user);
		if($_userid && $_username == $_USER[1]) {
			$userid = intval($_USER[0]);
			if($userid && $userid != $CFG['founderid']) {
				$USER = $db->get_one("SELECT username,passport,company,truename,password,groupid,email,message,chat,sound,online,sms,credit,money,loginip,admin,aid,edittime,trade FROM {$DT_PRE}member WHERE userid=$userid");
				if($USER) {
					if($USER['groupid'] == 1 && $_userid != $CFG['founderid']) exit('Request Denied');
					$_userid = $userid;
					extract($USER, EXTR_PREFIX_ALL, '');
					$MG = cache_read('group-'.$_groupid.'.php');
					$admin_user = true;
				}
			}
		}
	}
}
?>