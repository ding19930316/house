<?php
/*
	[Aijiacms System] Copyright (c) 2011-2014 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
define('AJ_NONUSER', true);
require '../common.inc.php';
function get_express_code($name) {
	#http://code.google.com/p/kuaidi-api/wiki/Open_API_Chaxun_URL
	$name = strtolower($name);
	if(strpos($name, '顺丰') !== false) return 'sf';
	if(strpos($name, '申通') !== false) return 'st';
	if(strpos($name, '圆通') !== false) return 'yt';
	if(strpos($name, '中通') !== false) return 'zt';
	if(strpos($name, '宅急送') !== false) return 'zjs';
	if(strpos($name, '韵达') !== false) return 'yd';
	if(strpos($name, '天天') !== false) return 'tt';
	if(strpos($name, '如风达') !== false) return 'rufengda';
	if(strpos($name, '汇通') !== false) return 'huitongkuaidi';
	if(strpos($name, '全峰') !== false) return 'quanfengkuaidi';
	if(strpos($name, 'ems') !== false) return 'ems';
	if(strpos($name, 'dhl') !== false) return 'dhl';
	if(strpos($name, 'ups') !== false) return 'ups';
	if(strpos($name, 'tnt') !== false) return 'tnt';
	if(strpos($name, 'fedex') !== false) return 'fedex';
	if(strpos($name, '联邦') !== false) return 'lianb';
	return '';
}
$e = isset($e) ? trim($e) : '';
$n = isset($n) ? trim($n) : '';
if($e && $n) {
	$c = get_express_code($e);
	if($c) dheader('http://www.kuaidi100.com/chaxun?com='.$c.'&nu='.$n);
}
dheader('http://www.kuaidi100.com/?nu='.$n);
?>