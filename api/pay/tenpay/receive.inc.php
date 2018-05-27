<?php
defined('IN_AIJIACMS') or exit('Access Denied');
//---------------------------------------------------------
//财付通即时到帐支付应答（处理回调）示例，商户按照此文档进行开发即可
//---------------------------------------------------------

require_once AJ_ROOT.'/api/pay/'.$bank.'/ResponseHandler.class.php';
require_once AJ_ROOT.'/api/pay/'.$bank.'/function.php';
require_once AJ_ROOT.'/api/pay/'.$bank.'/config.inc.php';

#log_result("进入前台回调页面");


/* 创建支付应答对象 */
$resHandler = new ResponseHandler();
$resHandler->setKey($key);

//判断签名
if($resHandler->isTenpaySign()) {
	
	//通知id
	$notify_id = $resHandler->getParameter("notify_id");
	//商户订单号
	$out_trade_no = $resHandler->getParameter("out_trade_no");
	//财付通订单号
	$transaction_id = $resHandler->getParameter("transaction_id");
	//金额,以分为单位
	$total_fee = $resHandler->getParameter("total_fee");
	//如果有使用折扣券，discount有值，total_fee+discount=原请求的total_fee
	$discount = $resHandler->getParameter("discount");
	//支付结果
	$trade_state = $resHandler->getParameter("trade_state");
	//交易模式,1即时到账
	$trade_mode = $resHandler->getParameter("trade_mode");

	$total_fee = ($total_fee+$discount)/100;
	
	
	if("1" == $trade_mode ) {
		if( "0" == $trade_state){ 
			//------------------------------
			//处理业务开始
			//------------------------------
			
			//注意交易单不要重复处理
			//注意判断返回金额
			
			//------------------------------
			//处理业务完毕
			//------------------------------	
			if($out_trade_no != $charge_orderid) {
				$charge_status = 2;
				$charge_errcode = '订单号不匹配';
				$note = $charge_errcode.'S:'.$charge_orderid.'R:'.$out_trade_no;
				log_write($note, 'rtenpay');
			} else if($total_fee != $charge_money) {
				$charge_status = 2;
				$charge_errcode = '充值金额不匹配';
				$note = $charge_errcode.'S:'.$charge_money.'R:'.$total_fee;
				log_write($note, 'rtenpay');
			} else {
				$charge_status = 1;
				$db->query("UPDATE {$AJ_PRE}finance_charge SET status=3,money=$charge_money,receivetime='$AJ_TIME',editor='$editor' WHERE itemid=$charge_orderid");
				money_add($r['username'], $r['amount']);
				money_record($r['username'], $r['amount'], $PAY[$bank]['name'], 'system', $L['charge_online'], 'ID:'.$charge_orderid);
				if($MOD['credit_charge'] > 0) {
					$credit = intval($r['amount']*$MOD['credit_charge']);
					if($credit > 0) {
						credit_add($r['username'], $credit);
						credit_record($r['username'], $credit, 'system', $L['charge_reward'], $L['charge'].$r['amount'].$AJ['money_unit']);
					}
				}
				$show = $MOD['linkurl'].'charge.php';
				if($tradeid) {						
					$td = $db->get_one("SELECT * FROM {$AJ_PRE}mall_order WHERE itemid=$tradeid");
					if($td['status'] == 1 && $td['buyer'] == $_username && $td['amount'] + $td['fee'] == $_money + $r['amount']) {
						$show = $MOD['linkurl'].'trade.php?action=update&step=pay&itemid='.$tradeid;
					} else {
						$tradeid = 0;
						set_cookie('tradeid', '0');
					}						
				}
				$resHandler->doShow($show);
			}
			
			#echo "<br/>" . "即时到帐支付成功" . "<br/>";
	
		} else {
			//当做不成功处理
			#echo "<br/>" . "即时到帐支付失败" . "<br/>";
		}
	}elseif( "2" == $trade_mode  ) {
		if( "0" == $trade_state) {
		
			//------------------------------
			//处理业务开始
			//------------------------------
			
			//注意交易单不要重复处理
			//注意判断返回金额
			
			//------------------------------
			//处理业务完毕
			//------------------------------	
			
			//echo "<br/>" . "中介担保支付成功" . "<br/>";
		
		} else {
			//当做不成功处理
			//echo "<br/>" . "中介担保支付失败" . "<br/>";
		}
	}
	
} else {
	//echo "<br/>" . "认证签名失败" . "<br/>";
	//echo $resHandler->getDebugInfo() . "<br>";
}

?>