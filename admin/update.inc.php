<?php
/*
	[Aijiacms System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$release = isset($release) ? intval($release) : 0;
$release or msg();
$release_dir = AJ_ROOT.'/file/update/'.$release;
switch($action) {
	case 'download':
		$PHP_URL = @get_cfg_var("allow_url_fopen");
		if(!$PHP_URL) msg('��ǰ��������֧��URL���ļ������޸�php.ini��allow_url_fopen = on');
		$url = 'http://www.aijiacms.com/update.php?product=b2b&release='.$release.'&charset='.AJ_CHARSET.'&version='.AJ_VERSION;
		$code = @file_get_contents($url);
		if($code) {
			if(substr($code, 0, 8) == 'StatusOk') {
				$code = substr($code, 8);
			} else {
				msg($code);
			}
		} else {
			msg('�޷����ӹٷ��������������Ի��Ժ����');
		}
		dir_create($release_dir);
		if(@copy($code, $release_dir.'/'.$release.'.zip')) {
			file_copy(AJ_ROOT.'/file/index.html', $release_dir.'/index.html');
			dir_create($release_dir.'/source/');
			dir_create($release_dir.'/backup/');
			msg('�������سɹ�����ʼ��ѹ��..', '?file='.$file.'&action=unzip&release='.$release);
		} else {
			msg('��������ʧ�ܣ�������..');
		}
	break;
	case 'unzip':
		require AJ_ROOT.'/admin/unzip.class.php';
		$zip = new unzip;
		$zip->extract_zip($release_dir.'/'.$release.'.zip', $release_dir.'/source/');
		if(is_file($release_dir.'/source/aijiacms/version.inc.php')) {			
			msg('���½�ѹ���ɹ�����ʼ�����ļ�..', '?file='.$file.'&action=copy&release='.$release);
		} else {
			msg('���½�ѹ��ʧ�ܣ�������..');
		}
	break;
	case 'copy':
		if($CFG['template'] != 'default' && is_dir($release_dir.'/source/aijiacms/template/default')) @rename($release_dir.'/source/aijiacms/template/default', $release_dir.'/source/aijiacms/template/'.$CFG['template']);
		if($CFG['skin'] != 'default' && is_dir($release_dir.'/source/aijiacms/skin/default')) @rename($release_dir.'/source/aijiacms/skin/default', $release_dir.'/source/aijiacms/skin/'.$CFG['skin']);
		$files = file_list($release_dir.'/source/aijiacms');
		foreach($files as $v) {
			$file_a = str_replace('file/update/'.$release.'/source/aijiacms/', '', $v);
			$file_b = str_replace('source/aijiacms/', 'backup/', $v);
			if(is_file($file_a)) file_copy($file_a, $file_b);
			file_copy($v, $file_a) or msg('�޷�����'.str_replace(AJ_ROOT.'/', '', $file_a).'<br/>�����ô��ļ����ϼ�Ŀ¼����Ϊ��д��Ȼ��ˢ�´�ҳ');
		}
		msg('�ļ����³ɹ�����ʼ���и���..', '?file='.$file.'&action=cmd&release='.$release);
	break;
	case 'cmd':
		@include $release_dir.'/source/cmd.inc.php';
		msg('�������гɹ�', '?file='.$file.'&action=finish&release='.$release);
	break;
	case 'finish':
		msg('ϵͳ���³ɹ� ��ǰ�汾V'.AJ_VERSION.' R'.AJ_RELEASE, '?file=cloud&action=update', 2);
	break;
	case 'undo':
		is_file($release_dir.'/backup/version.inc.php') or msg('�˰汾�����ļ������ڣ��޷���ԭ', '?file=cloud&action=update', 2);
		@include $release_dir.'/source/cmd.inc.php';
		$files = file_list($release_dir.'/backup');
		foreach($files as $v) {
			file_copy($v, str_replace('file/update/'.$release.'/backup/', '', $v));
		}
		msg('ϵͳ��ԭ�ɹ�', '?file=cloud&action=update', 2);
	break;
	default:
		$release > AJ_RELEASE or msg('��ǰ�汾����Ҫ���д˸���', '?file=cloud&action=update', 2);
		msg('���߸����Ѿ���������ʼ���ظ���..', '?file='.$file.'&action=download&release='.$release, 2);
	break;
}
?>