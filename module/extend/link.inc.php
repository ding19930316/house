<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
$MOD['link_enable'] or dheader(AJ_PATH);
require AJ_ROOT.'/include/post.func.php';
$TYPE = get_type('link', 1);
require MD_ROOT.'/link.class.php';
$do = new dlink();
$typeid = isset($typeid) ? intval($typeid) : 0;
if($action == 'reg') {
	$MOD['link_reg'] or message($L['link_reg_close']);
	if($submit) {
		captcha($captcha, 1);
		$post = dhtmlspecialchars($post);
		if($do->pass($post)) {
			$r = $db->get_one("SELECT itemid FROM {$AJ_PRE}link WHERE linkurl='$post[linkurl]' AND username=''");
			if($r) message($L['link_url_repeat']);
			$post['status'] = 2;
			$post['level'] = 0;
			$post['areaid'] = $cityid;
			$do->add($post);
			message($L['link_check'], './');
		} else {
			message($do->errmsg);
		}
	} else {
		$type_select = type_select('link', 1, 'post[typeid]', $L['link_choose_type'], 0, 'id="typeid"');
		$head_title = $L['link_reg'].$AJ['seo_delimiter'].$L['link_title'];
		include template('link', $module);
	}
} else {
	$head_title = $L['link_title'];
	if($typeid) $head_title = $TYPE[$typeid]['typename'].$AJ['seo_delimiter'].$head_title;
	$head_keywords = $head_description = '';
	include template('link', $module);
}
?>