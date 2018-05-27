<?php
/*
	[aijiacms System] Copyright (c) 2008-2011 aijiacms.com
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
if($action == 'ftp') {
	require AJ_ROOT.'/include/ftp.class.php';
	if(strpos($ftp_pass, '***') !== false) $ftp_pass = $AJ['ftp_pass'];
	$ftp = new dftp($ftp_host, $ftp_user, $ftp_pass, $ftp_port, $ftp_path, $ftp_pasv, $ftp_ssl);
	if(!$ftp->connected) dialog('FTP无法连接，请检查设置');
	if(!$ftp->dftp_chdir()) dialog('FTP无法进入远程存储目录，请检查远程存储目录');
	dialog('FTP设置正常,可以使用');
} else if ($action == 'mail') {
	define('TESTMAIL', true);
	if(strpos($smtp_pass, '***') !== false) $smtp_pass = $AJ['smtp_pass'];
	$AJ['mail_type'] = $mail_type;
	$AJ['smtp_host'] = $smtp_host;
	$AJ['smtp_port'] = $smtp_port;
	$AJ['smtp_auth'] = $smtp_auth;
	$AJ['smtp_user'] = $smtp_user;
	$AJ['smtp_pass'] = $smtp_pass;
	$AJ['mail_sender'] = $mail_sender;
	$AJ['mail_name'] = $mail_name;
	$AJ['mail_delimiter'] = $mail_delimiter;
	$AJ['mail_sign'] = '<br/>------------------------------------<br><a href="http://www.aijiacms.com/" target="_blank">Send By Aijiacms Mail Tester</a>';
	if(send_mail($testemail, $AJ['sitename'].'邮件发送测试', '<b>恭喜！您的站点['.$AJ['sitename'].']邮件发送设置成功！</b>')) dialog('邮件已发送至'.$testemail.'，请注意查收', $mail_sender);
	dialog('邮件发送失败，请检查设置');
} else {
	$tab = isset($tab) ? intval($tab) : 0;
	$all = isset($all) ? intval($all) : 0;
	if($submit) {
		if(!preg_match("/^[0-9a-z]{10,}$/i", $config['authkey'])) $config['authkey'] = random(18);
		if($setting['safe_domain']) {
			$setting['safe_domain'] = str_replace('http://', '', $setting['safe_domain']);
			if(substr($setting['safe_domain'], 0, 4) == 'www.') $setting['safe_domain'] = substr($setting['safe_domain'], 4);
		}
		if(substr($config['url'], -1) != '/') $config['url'] = $config['url'].'/';
		if($config['cookie_domain'] && substr($config['cookie_domain'], 0, 1) != '.') $config['cookie_domain'] = '.'.$config['cookie_domain'];
		if($config['cookie_domain'] != $CFG['cookie_domain']) $config['cookie_pre'] = 'D'.random(2).'_';
		$setting['smtp_pass'] = pass_decode($setting['smtp_pass'], $AJ['smtp_pass']);
		$setting['ftp_pass'] = pass_decode($setting['ftp_pass'], $AJ['ftp_pass']);
		$setting['sms_key'] = pass_decode($setting['sms_key'], $AJ['sms_key']);
		$setting['trade_pw'] = pass_decode($setting['trade_pw'], $AJ['trade_pw']);
		$setting['admin_week'] = implode(',', $setting['admin_week']);
		$setting['check_week'] = implode(',', $setting['check_week']);		
		if($setting['logo'] != $AJ['logo']) clear_upload($setting['logo']);
		if(!is_write(AJ_ROOT.'/config.inc.php')) msg('根目录config.inc.php无法写入，请设置可写权限');
		$tmp = file_get(AJ_ROOT.'/config.inc.php');
		foreach($config as $k=>$v) {
			$tmp = preg_replace("/[$]CFG\['$k'\]\s*\=\s*[\"'].*?[\"']/is", "\$CFG['$k'] = '$v'", $tmp);
		}
		file_put(AJ_ROOT.'/config.inc.php', $tmp);
		update_setting($moduleid, $setting);
		cache_module(1);
		cache_module();
		file_put(AJ_ROOT.'/file/avatar/remote.html', $setting['ftp_remote'] && $setting['remote_url'] ? $setting['remote_url'] : 'URL');
		$filename = AJ_ROOT.'/'.$setting['index'].'.'.$setting['file_ext'];
		if(!$setting['index_html'] && $setting['file_ext'] != 'php') file_del($filename);
		$mdir = AJ_ROOT.'/'.$MODULE[2]['moduledir'].'/';
		if($setting['file_register'] != $old_file_register) @rename($mdir.$old_file_register, $mdir.$setting['file_register']);
		if($setting['file_login'] != $old_file_login) @rename($mdir.$old_file_login, $mdir.$setting['file_login']);
		if($setting['file_my'] != $old_file_my) @rename($mdir.$old_file_my, $mdir.$setting['file_my']);
		dmsg('更新成功', '?moduleid='.$moduleid.'&file='.$file.'&tab='.$tab);
	} else {
		include AJ_ROOT.'/config.inc.php';
		extract(dhtmlspecialchars($CFG));
		extract(dhtmlspecialchars($AJ));
		$W = array('天', '一', '二', '三', '四', '五', '六');
		$smtp_pass = pass_encode($smtp_pass);
		$ftp_pass = pass_encode($ftp_pass);
		$smskey = $sms_key;
		$sms_key = pass_encode($sms_key);
		$trade_pw = pass_encode($trade_pw);
		if($kw) {
			$all = 1;
			ob_start();
		}
		include tpl('setting', $module);
		if($kw) {
			$data = $content = ob_get_contents();
			ob_clean();
			$data = preg_replace('\'(?!((<.*?)|(<a.*?)|(<strong.*?)))('.$kw.')(?!(([^<>]*?)>)|([^>]*?</a>)|([^>]*?</strong>))\'si', '<span class=highlight>'.$kw.'</span>', $data);
			$data = preg_replace('/<span class=highlight>/', '<a name=high></a><span class=highlight>', $data, 1);
			echo $data ? $data : $content;
		}
	}
}
?>