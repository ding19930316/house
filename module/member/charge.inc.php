<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
login();
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
require AJ_ROOT.'/include/post.func.php';
$PAY = cache_read('pay.php');
$amount = isset($amount) ? dround($amount) : '';
$tradeid = intval(get_cookie('tradeid'));
switch($action) {
	case 'record':
		$PAY = cache_read('pay.php');	
		$PAY['card']['name'] = $L['charge_card_name'];
		$_status = $L['charge_status'];
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($bank) or $bank = '';
		$condition = "username='$_username'";
		if($bank) $condition .= " AND bank='$bank'";
		if($fromtime) $condition .= " AND sendtime>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND sendtime<".(strtotime($totime.' 23:59:59'));
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$AJ_PRE}finance_charge WHERE $condition");
		$pages = pages($r['num'], $page, $pagesize);		
		$charges = array();
		$amount = $fee = $money = 0;
		$result = $db->query("SELECT * FROM {$AJ_PRE}finance_charge WHERE $condition ORDER BY itemid DESC LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['sendtime'] = timetodate($r['sendtime'], 5);
			$r['receivetime'] = $r['receivetime'] ? timetodate($r['receivetime'], 5) : '--';
			$r['dstatus'] = $_status[$r['status']];
			$amount += $r['amount'];
			$fee += $r['fee'];
			$money += $r['money'];
			$charges[] = $r;
		}
		$head_title = $L['charge_title_record'];
	break;
	case 'card':
		if($submit) {
			if(!preg_match("/^[0-9a-zA-z]{6,}$/", $number)) message($L['charge_pass_card_number']);
			if(!preg_match("/^[0-9]{6,}$/", $password)) message($L['charge_pass_card_password']);
			$card = $db->get_one("SELECT * FROM {$AJ_PRE}finance_card WHERE number='$number'");
			if($card) {
				if($card['updatetime']) message($L['charge_pass_card_used']);
				if($card['totime'] < $AJ_TIME) message($L['charge_pass_card_expired']);
				if($card['password'] != $password) message($L['charge_pass_card_error_password']);
				$db->query("INSERT INTO {$AJ_PRE}finance_charge (username,bank,amount,money,sendtime,receivetime,editor,status,note) VALUES ('$_username','card', '$card[amount]','$card[amount]','$AJ_TIME','$AJ_TIME','system','3','$number')");
				$db->query("UPDATE {$AJ_PRE}finance_card SET username='$_username',updatetime='$AJ_TIME',ip='$AJ_IP' WHERE itemid='$card[itemid]'");
				money_add($_username, $card['amount']);
				money_record($_username, $card['amount'], $L['charge_card_name'], 'system', $L['charge_card'], $L['charge_card_number'].':'.$number);
				message($L['charge_msg_card_success'], $MOD['linkurl'].'charge.php?action=record');
			} else {
				message($L['charge_pass_card_error_number']);
			}
		}
	break;
	case 'confirm':
		$amount = dround($amount);
		if($MOD['mincharge']) {
			if(strpos($MOD['mincharge'], '|') !== false) {
				in_array($amount, explode('|', $MOD['mincharge'])) or message($L['charge_pass_choose_amount']);
			} else {
				$amount >= intval($MOD['mincharge']) or message($L['charge_pass_amount_min'].$MOD['mincharge']);
			}
		} else {			
			$amount > 0 or message($L['charge_pass_type_amount']);
		}
		isset($PAY[$bank]) or message($L['charge_pass_bank']);
		$PAY[$bank]['enable'] or message($L['charge_pass_bank_close']);
		$fee = $PAY[$bank]['percent'] ? dround($amount*$PAY[$bank]['percent']/100) : 0;
		$charge = $fee + $amount;
		if(isset($goto)) {
			$receive_url = $MOD['linkurl'].'charge.php';
			$charge_title = '';
			if($tradeid) {
				$td = $db->get_one("SELECT * FROM {$AJ_PRE}mall_order WHERE itemid=$tradeid");
				if($td['status'] == 1 && $td['buyer'] == $_username && $td['amount'] + $td['fee'] == $_money + $amount) {
					$charge_title = dsubstr($td['title'], 40, '...');
				} else {
					$tradeid = 0;
					set_cookie('tradeid', '0');
				}
			}
			$db->query("INSERT INTO {$AJ_PRE}finance_charge (username,bank,amount,fee,sendtime) VALUES ('$_username','$bank','$amount','$fee','$AJ_TIME')");
			$orderid = $db->insert_id();
			include AJ_ROOT.'/api/pay/'.$bank.'/send.inc.php';
			exit;
		} else {
			$auto = isset($auto) ? $auto : 1;
			$head_title = $L['charge_title_confirm'];
		}
	break;
	case 'pay':
		$MOD['pay_online'] or dheader('?action=card');
		$auto = 0;
		if($MOD['mincharge']) {
			if(strpos($MOD['mincharge'], '|') !== false) {				
				$mincharge = 0;
				$charges = explode('|', $MOD['mincharge']);
			} else {
				$mincharge = intval($MOD['mincharge']);
				$charges = array();
			}
		} else {
			$mincharge = 0;
			$charges = array();
			if($amount) $auto = 1;
		}
		$head_title = $L['charge_title_pay'];
	break;
	default:
		$_POST = $_DPOST;
		$_GET = $_DGET;
		$head_title = $L['charge_title'];
		//$passed = true;
		$charge_errcode = '';
		$charge_status = 0;
		$charge_forward = '';
		/*
		0 fail
		1 success
		2 unknow
		*/
		$r = $db->get_one("SELECT * FROM {$AJ_PRE}finance_charge WHERE username='$_username' ORDER BY itemid DESC");
		if($r) {
			$charge_orderid = $r['itemid'];
			$charge_money = $r['amount'] + $r['fee'];
			$charge_amount = $r['amount'];
			if($r['status'] == 0) {
				$receive_url = '';
				$bank = $r['bank'];
				$editor = 'R'.$bank;
				$note = '';
				include AJ_ROOT.'/api/pay/'.$bank.'/receive.inc.php';
				if($charge_status == 1) {
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
					if($tradeid) {						
						$td = $db->get_one("SELECT * FROM {$AJ_PRE}mall_order WHERE itemid=$tradeid");
						if($td['status'] == 1 && $td['buyer'] == $_username && $td['amount'] + $td['fee'] == $_money + $r['amount']) {
							$charge_forward = 'trade.php?action=update&step=pay&itemid='.$tradeid;
						} else {
							$tradeid = 0;
							set_cookie('tradeid', '0');
						}						
					}
				} else {
					$db->query("UPDATE {$AJ_PRE}finance_charge SET status=1,receivetime='$AJ_TIME',editor='$editor',note='$note' WHERE itemid=$charge_orderid");
				}
			} else if($r['status'] == 1) {
				$charge_status = 2;		
				$charge_errcode = $L['charge_msg_order_fail'].$charge_orderid;
			} else if($r['status'] == 2) {
				$charge_status = 2;		
				$charge_errcode = $L['charge_msg_order_cancel'].$charge_orderid;
			} else {
				$charge_status = 1;
			}
		} else {
			$charge_status = 2;		
			$charge_errcode = $L['charge_msg_not_order'];
		}
	break;
}
include template('charge', $module);
?>