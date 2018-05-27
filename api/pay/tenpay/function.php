<?php
defined('IN_AIJIACMS') or exit('Access Denied');

// 请注意服务器是否开通fopen配置
function  log_result($word) {
	return;
    $fp = fopen("log.txt","a");
    flock($fp, LOCK_EX) ;
    fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n\n");
    flock($fp, LOCK_UN);
    fclose($fp);
}



?>