<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$menus = array (
    array($MOD['name'].'管理', '?moduleid='.$moduleid),
    array('订单管理', '?moduleid='.$moduleid.'&file='.$file),
);
$_status = array(
	'<span style="color:#0000FF;">已提交</span>',
	'<span style="color:#FF0000;">已发货</span>',
	'<span style="color:#FF6600;">已消费</span>',
	'<span style="color:#008000;">交易成功</span>',
	'<span style="color:#888888;text-decoration:line-through;">已退款</span>',
);
$dstatus = array(
	'已提交',
	'已发货',
	'已消费',
	'交易成功',
	'已退款',
);
$table = $AJ_PRE.'group_order';
switch($action) {
	case 'refund':
		$itemid or msg('未选择记录');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$i = 0;
		$result = $db->query("SELECT * FROM {$table} WHERE itemid IN ($itemids)");
		while($r = $db->fetch_array($result)) {
			if($r['status'] < 3) {
				$i++;
				$itemid = $r['itemid'];
				money_add($r['buyer'], $r['amount']);
				money_record($r['buyer'], $r['amount'], '站内', 'system', '团购退款', '订单号:'.$itemid);			
				$db->query("UPDATE {$table} SET status=4,editor='$_username',updatetime=$AJ_TIME WHERE itemid=$itemid");
			}
		}
		dmsg('退款成功'.$i.'个订单', $forward);
	break;
	case 'show':
		$itemid or msg('未指定记录');
		$td = $item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid ");
		$item or msg('记录不存在');
		$item['money'] = $item['amount'];
		$item['addtime'] = timetodate($item['addtime'], 6);
		$item['updatetime'] = timetodate($item['updatetime'], 6);
		include tpl('order_show', $module);
	break;
	case 'delete':
		$itemid or msg('未选择记录');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table} WHERE itemid IN ($itemids)");
		dmsg('删除成功', $forward);
	break;
	default:
		$sfields = array('按条件', '商品名称', '卖家', '买家', '订单金额', '密码', '买家名称', '买家地址', '买家邮编', '买家电话', '买家手机', '买家物流', '发货物流', '发货单号', '备注');
		$dfields = array('title', 'title', 'seller', 'buyer', 'amount', 'password', 'buyer_name', 'buyer_address', 'buyer_postcode', 'buyer_phone', 'buyer_mobile', 'buyer_receive', 'send_type', 'send_no', 'note');
		$sorder  = array('排序方式', '下单时间降序', '下单时间升序', '更新时间降序', '更新时间升序', '商品单价降序', '商品单价升序', '购买数量降序', '购买数量升序', '订单金额降序', '订单金额升序');
		$dorder  = array('itemid DESC', 'addtime DESC', 'addtime ASC', 'updatetime DESC', 'updatetime ASC', 'price DESC', 'price ASC', 'number DESC', 'number ASC', 'amount DESC', 'amount ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$status = isset($status) && isset($dstatus[$status]) ? intval($status) : '';
		$itemid or $itemid = '';
		$gid = isset($gid) && $gid ? intval($gid) : '';
		isset($seller) or $seller = '';
		isset($buyer) or $buyer = '';
		isset($amounts) or $amounts = '';
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($dfromtime) or $dfromtime = '';
		isset($dtotime) or $dtotime = '';
		isset($timetype) or $timetype = 'addtime';
		isset($mtype) or $mtype = 'money';
		isset($minamount) or $minamount = '';
		isset($maxamount) or $maxamount = '';
		$logistic = isset($logistic) ? intval($logistic) : '-1';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$status_select = dselect($dstatus, 'status', '状态', $status, '', 1, '', 1);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND $timetype>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND $timetype<".(strtotime($totime.' 23:59:59'));
		if($status !== '') $condition .= " AND status='$status'";
		if($seller) $condition .= " AND seller='$seller'";
		if($buyer) $condition .= " AND buyer='$buyer'";
		if($itemid) $condition .= " AND itemid=$itemid";
		if($gid) $condition .= " AND gid=$gid";
		if($mtype == 'money') $mtype = "`amount`+`fee`";
		if($minamount != '') $condition .= " AND $mtype>=$minamount";
		if($maxamount != '') $condition .= " AND $mtype<=$maxamount";
		if($logistic>-1) $condition .= " AND logistic=$logistic";
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
		$pages = pages($r['num'], $page, $pagesize);		
		$lists = array();
		$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		$amount = $fee = $money = 0;
		while($r = $db->fetch_array($result)) {
		$r['addtime'] = str_replace(' ', '<br/>', timetodate($r['addtime'], 5));
		$r['updatetime'] = str_replace(' ', '<br/>', timetodate($r['updatetime'], 5));
			$r['dstatus'] = $_status[$r['status']];
			$r['money'] = $r['amount'];
			$amount += $r['amount'];
			$lists[] = $r;
		}
		$money = $amount + $fee;
		include tpl('order', $module);
}
?>