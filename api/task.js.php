<?php
@set_time_limit(0);
#@ignore_user_abort(true);
define('AJ_TASK', true);
require '../common.inc.php';
check_referer() or exit;
if($AJ_BOT) exit;
header("Content-type:text/javascript");	
include template('line', 'chip');
$db->linked or exit;
isset($html) or $html = '';
if($html) {
	$task_index = intval($AJ['task_index']);
	$task_index > 60 or $task_index = 300;
	$task_list = intval($AJ['task_list']);
	$task_index > 300 or $task_index = 1800;
	if($moduleid == 1) {
		if($AJ['index_html'] && $AJ_TIME - @filemtime(AJ_ROOT.'/'.$AJ['index'].'.'.$AJ['file_ext']) > $task_index) tohtml('index');
	} else {
		include AJ_ROOT.'/module/'.$module.'/common.inc.php';
		include AJ_ROOT.'/module/'.$module.'/task.inc.php';
	}
}
if($AJ['message_email'] && $AJ['mail_type'] != 'close' && !$_userid) {
	$condition = 'isread=0 AND issend=0 AND status=3';
	if($AJ['message_time']) {
		$time = $AJ_TIME - $AJ['message_time']*60;
		$condition .= " AND addtime<$time";
	}
	if($AJ['message_type']) $condition .= " AND typeid IN ($AJ[message_type])";
	$msg = $db->get_one("SELECT * FROM {$AJ_PRE}message WHERE $condition ORDER BY itemid ASC");
	if($msg) {
		$db->query("UPDATE {$AJ_PRE}message SET issend=1 WHERE itemid=$msg[itemid]");
		$user = $db->get_one("SELECT groupid,email,send FROM {$AJ_PRE}member WHERE username='$msg[touser]'");
		if($user) {
			if($user['send']) {
				if(check_group($user['groupid'], $AJ['message_group'])) {
					extract($msg);
					$NAME = $L['message_type'];
					$member_url = $MODULE[2]['linkurl'];
					$content = ob_template('message', 'mail');
					send_mail($user['email'], '['.$NAME[$typeid].']'.$title, $content);
				}
			}
		}
	}
}
$db->close();
?>