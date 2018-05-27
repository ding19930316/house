<?php
$_DPOST = $_POST;
require '../../.../common.inc.php';
$_POST = $_DPOST;
if(!$_POST) exit('fail');
$bank = 'chinapay';
$PAY = cache_read('pay.php');
if(!$PAY[$bank]['enable']) exit('fail');
if(!$PAY[$bank]['partnerid']) exit('fail');
//if(!$PAY[$bank]['keycode']) exit('fail');
$receive_url = '';
require AJ_ROOT."/api/pay/".$bank."/netpayclient_config.php";
//加载 netpayclient 组件
require AJ_ROOT."/api/pay/".$bank."/netpayclient.php";
//导入公钥文件
$flag = buildKey(PUB_KEY);
$flag or exit('导入公钥文件失败！');

//获取交易应答的各项值
$merid = $_POST["merid"];
$orderno = $_POST["orderno"];
$transdate = $_POST["transdate"];
$amount = $_POST["amount"];
$currencycode = $_POST["currencycode"];
$transtype = $_POST["transtype"];
$status = $_POST["status"];
$checkvalue = $_POST["checkvalue"];
$gateId = $_POST["GateId"];
$priv1 = $_POST["Priv1"];
$flag = verifyTransResponse($merid, $orderno, $amount, $currencycode, $transdate, $transtype, $status, $checkvalue);
if($flag) {
	if($status == '1001') {
		//您的处理逻辑请写在这里，如更新数据库等。
		//注意：如果您在提交时同时填写了页面返回地址和后台返回地址，且地址相同，请在这里先做一次数据库查询判断订单状态，以防止重复处理该笔订单
		$priv1 = intval($priv1);
		$r = $db->get_one("SELECT * FROM {$AJ_PRE}finance_charge WHERE itemid='$priv1'");
		if($r) {
			if($r['status'] == 0) {
				$charge_orderid = $r['itemid'];
				$charge_money = $r['amount'] + $r['fee'];
				$charge_amount = $r['amount'];
				$editor = 'N'.$bank;
				if($amount == padstr($charge_money*100, 12)) {
					$db->query("UPDATE {$AJ_PRE}finance_charge SET status=3,money=$charge_money,receivetime='$AJ_TIME',editor='$editor' WHERE itemid=$charge_orderid");
					require AJ_ROOT.'/include/module.func.php';
					money_add($r['username'], $r['amount']);
					money_record($r['username'], $r['amount'], $PAY[$bank]['name'], 'system', '在线充值', '订单ID:'.$charge_orderid);
					$MOD = cache_read('module-2.php');
					if($MOD['credit_charge'] > 0) {
						$credit = intval($r['amount']*$MOD['credit_charge']);
						if($credit > 0) {
							credit_add($r['username'], $credit);
							credit_record($r['username'], $credit, 'system', '充值奖励', '充值'.$r['amount'].$AJ['money_unit']);
						}
					}
					exit('success');
				} else {
					$note = '充值金额不匹配S:'.$charge_money.'R:'.$amount;
					$db->query("UPDATE {$AJ_PRE}finance_charge SET status=1,receivetime='$AJ_TIME',editor='$editor',note='$note' WHERE itemid=$charge_orderid");//支付失败
					exit('fail');
				}
			} else if($r['status'] == 1) {
				exit('fail');
			} else if($r['status'] == 2) {
				exit('fail');
			} else {
				exit('success');
			}
		} else {
			exit('fail');
		}
	}
}
exit('fail');
?>