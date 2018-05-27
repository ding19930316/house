<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
if(in_array($step, array('refund', 'add_time', 'receive_goods', 'get_pay', 'send_goods'))) {
	dheader('https://lab.alipay.com/consume/queryTradeDetail.htm?tradeNo='.$td['trade_no']);
} else {
	include AJ_ROOT.'/api/trade/'.$AJ['trade'].'/config.inc.php';
	$aliapy_config['seller_email'] = $seller['trade'];
	include AJ_ROOT.'/api/trade/'.$AJ['trade'].'/'.$api.'/pay.inc.php';
}
?>