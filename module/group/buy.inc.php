<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
if($AJ_BOT) dhttp(403);
//login();
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
require AJ_ROOT.'/include/post.func.php';
$itemid or dheader($MOD['linkurl']);
include load('misc.lang');
$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
if($item && $item['status'] > 2) {
	if($item['process'] == 2) message($L['group_expired']);
	if($item['username'] == $_username) message($L['buy_self']);
} else {
	message(lang('message->item_not_exists'), $MOD['linkurl']);
}
$user = userinfo($_username);
if($submit) {
	if($item['logistic']) {
		$add = array_map('trim', $add);
		$add['address'] = area_pos($add['areaid'], '').$add['address'];
		$add = array_map('htmlspecialchars', $add);
		$buyer_address = $add['address'];
		if(strlen($buyer_address) < 10) message($L['msg_type_address']);
		$buyer_postcode = $add['postcode'];
		if(strlen($buyer_postcode) < 6) message($L['msg_type_postcode']);
		$buyer_name = $add['truename'];
		if(strlen($buyer_name) < 2) message($L['msg_type_truename']);
		$buyer_phone = $add['telephone'];
		$buyer_receive = $add['receive'];
		if(strlen($buyer_receive) < 2) message($L['msg_type_express']);
	} else {
		$buyer_address = htmlspecialchars($user['address']);
		$buyer_postcode = htmlspecialchars($user['postcode']);
		$buyer_name = htmlspecialchars($user['truename']);
		$buyer_phone = htmlspecialchars($user['telephone']);
		$buyer_receive = '';
	}
	$buyer_mobile = htmlspecialchars($add['mobile']);
	$buyer_name = htmlspecialchars($add['truename']);
	is_mobile($buyer_mobile) or message($L['msg_type_mobile']);
	$number = intval($number);
	if($number < 1) $number = 1;
	$amount = $number*$item['price'];
	//if($amount > $_money) message($L['need_charge'], 'charge.php?action=pay&amount='.($amount-$_money));
	money_add($_username, -$amount);
	money_record($_username, -$amount, $L['in_site'], 'system', $L['group_order_credit'], 'ID('.$itemid.')');
		
	$note = htmlspecialchars($note);
	$title = addslashes($item['title']);
	$password = strtolower(random(6));
	$db->query("INSERT INTO {$AJ_PRE}group_order (gid,buyer,seller,title,thumb,price,number,amount,logistic,addtime,updatetime,note,password, buyer_postcode,buyer_address,buyer_name,buyer_phone,buyer_mobile,buyer_receive) VALUES ('$itemid','$_username','$item[username]','$title','$item[thumb]','$item[price]','$number','$amount','$item[logistic]','$AJ_TIME','$AJ_TIME','$note','$password','$buyer_postcode','$buyer_address','$buyer_name','$buyer_phone','$buyer_mobile','$buyer_receive')");
	//send sms
	if($AJ['sms'] && !$item['logistic']) {
		$oid = $db->insert_id();
		$message = lang('sms->ord_group', array($item['title'], $oid, $password));
		$message = strip_sms($message);
		send_sms($buyer_mobile, $message);
	}
	//send sms
	$db->query("UPDATE {$AJ_PRE}group SET orders=orders+1,sales=sales+$number WHERE itemid=$itemid");
	message($L['msg_buy_success'], $forward);
} else {
	$_MOD = cache_read('module-2.php');
	$result = $db->query("SELECT * FROM {$AJ_PRE}address WHERE username='$_username' ORDER BY  listorder ASC,itemid ASC LIMIT 30");
	$address = array();
	while($r = $db->fetch_array($result)) {	
		$address[] = $r;
	}
	$send_types = explode('|', trim($_MOD['send_types']));
	$head_title = $L['buy_title'];
	include template('buy', $module);
}
?>