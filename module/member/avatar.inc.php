<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
login();
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
require AJ_ROOT.'/include/post.func.php';
$avatar = useravatar($_userid, 'large', 0, 2);
switch($action) {
	case 'update':
		$t = $avatar ? 1 : 0;
		$db->query("UPDATE {$AJ_PRE}member SET avatar=$t WHERE userid=$_userid");
		dheader('avatar.php?itemid='.$AJ_TIME);
	break;
	case 'delete':
		if($avatar) {
			$img = array();
			$img[1] = useravatar($_userid, 'large', 0, 2);
			$img[2] = useravatar($_userid, '', 0, 2);
			$img[3] = useravatar($_userid, 'small', 0, 2);
			$img[4] = useravatar($_username, 'large', 1, 2);
			$img[5] = useravatar($_username, '', 1, 2);
			$img[6] = useravatar($_username, 'small', 1, 2);
			foreach($img as $i) {
				file_del($i);
			}
			if($AJ['ftp_remote'] && $AJ['remote_url']) {
				require AJ_ROOT.'/include/ftp.class.php';
				$ftp = new dftp($AJ['ftp_host'], $AJ['ftp_user'], $AJ['ftp_pass'], $AJ['ftp_port'], $AJ['ftp_path'], $AJ['ftp_pasv'], $AJ['ftp_ssl']);
				if($ftp->connected) {
					foreach($img as $i) {
						$t = explode("/file/", $i);
						$ftp->dftp_delete($t[1]);
					}
				}
			}
		}
		$db->query("UPDATE {$AJ_PRE}member SET avatar=0 WHERE userid=$_userid");
		dmsg($L['avatar_delete'], 'avatar.php?itemid='.$AJ_TIME);
	break;
	default:
		$head_title = $L['avatar_title'];	
	break;
}
include template('avatar', $module);
?>