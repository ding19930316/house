<?php
require 'config.inc.php';
require '../common.inc.php';
if($AJ_BOT) dhttp(403);
if(!$_userid  &&  $mid!=16) dheader($MODULE[2]['linkurl'].'publish.php');
// print_r($mid);exit;
if($mid) {
	$group_editor = $MG['editor'];
	in_array($group_editor, array('Default', 'Aijiacms', 'Simple', 'Basic')) or $group_editor = 'Aijiacms';
	$MST = cache_read('module-2.php');
	isset($admin_user) or $admin_user = false;
	$show_oauth = $MST['oauth'];
	$show_menu = $MST['show_menu'] ? true : false;
	if(!$_userid) $action = 'add';//Guest
	// print_r($_edittime);exit;
	// if($_groupid > 5 && !$_edittime && $action == 'add') dheader('edit.php?tab=2');
	if($_groupid > 4 && (($MST['vemail'] && $MG['vemail']) || ($MST['vmobile'] && $MG['vmobile']) || ($MST['vtruename'] && $MG['vtruename']) || ($MST['vcompany'] && $MG['vcompany']))) {
		$V = $db->get_one("SELECT vemail,vmobile,vtruename,vcompany FROM {$AJ_PRE}member WHERE userid=$_userid");
		if($MST['vemail'] && $MG['vemail']) {
			$V['vemail'] or dheader('validate.php?action=email&itemid=1');
		}
		if($MST['vmobile'] && $MG['vmobile']) {
			$V['vmobile'] or dheader('validate.php?action=mobile&itemid=1');
		}
		if($MST['vtruename'] && $MG['vtruename']) {
			$V['vtruename'] or dheader('validate.php?action=truename&itemid=1');
		}
		if($MST['vcompany'] && $MG['vcompany']) {
			$V['vcompany'] or dheader('validate.php?action=company&itemid=1');
		}
	}
	// print_r("111");exit;
	if($_credit < 0 && $MST['credit_less'] && $action == 'add') dheader('credit.php?action=less');
	if($submit) {
		// print_r(111);exit;
		check_post() or dalert($L['bad_data']);//safe
		$BANWORD = cache_read('banword.php');
		if($BANWORD && isset($post)) {
			$keys = array('title', 'tag', 'introduce', 'content');
			foreach($keys as $v) {
				if(isset($post[$v])) $post[$v] = banword($BANWORD, $post[$v]);
			}
		}
	}

	$MYMODS = array();
	if(isset($MG['moduleids']) && $MG['moduleids']) {
		$MYMODS = explode(',', $MG['moduleids']);
	}
	if($MYMODS) {
		foreach($MYMODS as $k=>$v) {
			$v = abs($v);
			if(!isset($MODULE[$v])) unset($MYMODS[$k]);
		}
	}
	$MENUMODS = $MYMODS;
	if($show_menu) {
		$MENUMODS = array();
		foreach($MODULE as $m) {
			if($m['islink']) continue;
			if($m['moduleid'] > 4 && $m['moduleid'] != 11) $MENUMODS[] = $m['moduleid'];
			if($m['moduleid'] == 9 && in_array(-9, $MYMODS)) $MENUMODS[] = -9;
		}
	}

	$vid = $mid;
	if($mid == 9 && isset($resume)) $vid = -9;
	if(!$MYMODS || !in_array($vid, $MYMODS)) message('', $MODULE[2]['linkurl'].$AJ['file_my']);

	$IMVIP = isset($MG['vip']) && $MG['vip'];
	$moduleid = $mid;//mid
	$module = $MODULE[$moduleid]['module'];
	if(!$module) message();
	$MOD = cache_read('module-'.$moduleid.'.php');
	$my_file = AJ_ROOT.'/module/'.$module.'/my.inc.php';
	if(is_file($my_file)) {
		// print_r($my_file);exit;

		require $my_file;
	} else {
		dheader($MODULE[2]['linkurl']);
	}
} else {
	// print_r("111");exit;
	require AJ_ROOT.'/module/'.$module.'/my.inc.php';
}
?>
