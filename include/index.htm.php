<?php
/*
	[Aijiacms System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$data = AJ_DOMAIN ? 'if(window.location.href.indexOf("'.AJ_DOMAIN.'") != -1){document.domain = "'.AJ_DOMAIN.'";}' : '';
$data .= 'var DTPath = "'.AJ_PATH.'";';
$data .= 'var SKPath = "'.AJ_SKIN.'";';
$data .= 'var MEPath = "'.$MODULE[2]['linkurl'].'";';
$data .= 'var EXPath = "'.$MODULE[3]['linkurl'].'";';
$data .= 'var CKDomain = "'.$CFG['cookie_domain'].'";';
$data .= 'var CKPath = "'.$CFG['cookie_path'].'";';
$data .= 'var CKPrex = "'.$CFG['cookie_pre'].'";';
file_put(AJ_ROOT.'/file/script/config.js', $data);
$filename = $CFG['com_dir'] ? AJ_ROOT.'/'.$AJ['index'].'.'.$AJ['file_ext'] : AJ_CACHE.'/index.inc.html';
if(!$AJ['index_html']) {
	if(is_file($filename)) unlink($filename);
	return false;
}
$aijiacms_task = "moduleid=1&html=index";
$AREA = cache_read('area.php');
if($EXT['wap_enable']) $head_mobile = $EXT['wap_url'];
$seo_title = $AJ['seo_title'];
$head_keywords = $AJ['seo_keywords'];
$head_description = $AJ['seo_description'];
ob_start();
include template('index');
$data = ob_get_contents();
ob_clean();
file_put($filename, $data);
return true;
?>