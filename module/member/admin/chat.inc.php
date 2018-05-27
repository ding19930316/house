<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$menus = array (
    array('在线对话', '?moduleid='.$moduleid.'&file=chat'),
);
if($action == 'delete') {
	if(strlen($chatid) == 32) $db->query("DELETE FROM {$AJ_PRE}chat WHERE chatid='$chatid'");
	dmsg('删除成功', $forward);
} else {
	$sfields = array('按条件', '发起人', '接收人', '来源');
	$dfields = array('fromuser', 'fromuser', 'touser', 'forward');
	$sorder  = array('结果排序方式', '开始时间降序', '开始时间升序');
	$dorder  = array('freadtime DESC', 'freadtime DESC', 'freadtime ASC');
	isset($fields) && isset($dfields[$fields]) or $fields = 0;
	isset($order) && isset($dorder[$order]) or $order = 0;
	$fields_select = dselect($sfields, 'fields', '', $fields);
	$order_select  = dselect($sorder, 'order', '', $order);
	$condition = '1';
	if($keyword) $condition .= " AND $dfields[$fields]='$kw'";
	$order = $dorder[$order];
	if($page > 1 && $sum) {
		$items = $sum;
	} else {
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$AJ_PRE}chat WHERE $condition");
		$items = $r['num'];
	}
	$pages = pages($items, $page, $pagesize);
	$lists = array();
	$result = $db->query("SELECT * FROM {$AJ_PRE}chat WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
	while($r = $db->fetch_array($result)) {
		if($r['forward'] && strpos($r['forward'], '://') === false) $r['forward'] = 'http://'.$r['forward'];
		$lists[] = $r;
	}
	include tpl('chat', $module);
}
?>