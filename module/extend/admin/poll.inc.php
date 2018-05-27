<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$TYPE = get_type('poll', 1);
require MD_ROOT.'/poll.class.php';
$do = new poll();
$menus = array (
    array('添加票选', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array('票选列表', '?moduleid='.$moduleid.'&file='.$file),
    array('更新地址', '?moduleid='.$moduleid.'&file='.$file.'&action=update'),
    array('票选分类', 'javascript:Dwidget(\'?file=type&item='.$file.'\', \'票选分类\');'),
    array('模块设置', '?moduleid='.$moduleid.'&file=setting#'.$file),
);
if($_catids || $_areaids) require AJ_ROOT.'/admin/admin_check.inc.php';
switch($action) {
	case 'add':
		if($submit) {
			if($do->pass($post)) {
				$do->add($post);
				dmsg('添加成功', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			foreach($do->fields as $v) {
				isset($$v) or $$v = '';
			}
			$poll_max = 0;
			$poll_page = 30;
			$poll_cols = 3;
			$poll_order = 0;
			$thumb_width = 120;
			$thumb_height = 90;
			$addtime = timetodate($AJ_TIME);
			$menuid = 0;
			include tpl('poll_edit', $module);
		}
	break;
	case 'edit':
		$itemid or msg();
		$do->itemid = $itemid;
		if($submit) {
			if($do->pass($post)) {
				$do->edit($post);
				dmsg('修改成功', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			extract($do->get_one());
			$addtime = timetodate($addtime);
			$fromtime = $fromtime ? timetodate($fromtime, 3) : '';
			$totime = $totime ? timetodate($totime, 3) : '';
			$menuid = 1;
			include tpl('poll_edit', $module);
		}
	break;
	case 'update':
		$do->update();
		dmsg('更新成功', $forward);
	break;
	case 'delete':
		$itemid or msg('请选择票选');
		$do->delete($itemid);
		dmsg('删除成功', $forward);
	break;
	case 'level':
		$itemid or msg('请选择票选');
		$level = intval($level);
		$do->level($itemid, $level);
		dmsg('级别设置成功', $forward);
	break;
	case 'record':
		$pollid = intval($pollid);
		$pollid or msg();
		$do->itemid = $pollid;		
		$P = $do->get_one();
		$P or exit('票选不存在');
		$I = $do->item_all("pollid=$pollid");
		$condition = "pollid=$pollid";
		if($itemid) $condition .= " AND itemid=$itemid";
		if($keyword) $condition .= " AND (ip LIKE '%$keyword%' OR username LIKE '%$keyword%')";
		$lists = $do->get_list_record($condition);
		include tpl('poll_record', $module);
	break;
	case 'item':
		$itemid or msg();
		$do->itemid = $itemid;
		$P = $do->get_one();
		$P or exit('票选不存在');
		if($submit) {
			$do->item_update($post);
			$t = $db->get_one("SELECT SUM(polls) AS total FROM {$AJ_PRE}poll_item WHERE pollid=$itemid");
			if($t['total'] != $P['poll']) $db->query("UPDATE {$AJ_PRE}poll SET polls=$t[total] WHERE itemid=$itemid");
			dmsg('更新成功', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&itemid='.$itemid);
		} else {
			$sorder  = array('结果排序方式', '投票次数降序', '投票次数升序');
			$dorder  = array('listorder DESC,itemid DESC', 'polls DESC', 'polls ASC');
			$sfields = array('标题', '简介', '链接');
			$dfields = array('title', 'introduce', 'linkurl');
			isset($fields) && isset($dfields[$fields]) or $fields = 0;
			isset($order) && isset($dorder[$order]) or $order = 0;
			$fields_select = dselect($sfields, 'fields', '', $fields);
			$order_select  = dselect($sorder, 'order', '', $order);
			$condition = "pollid=$itemid";
			if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
			$lists = $do->item_list($condition, $dorder[$order]);
			include tpl('poll_item', $module);
		}
	break;
	default:
		$sorder  = array('结果排序方式', '添加时间降序', '添加时间升序', '投票总数降序', '投票总数升序', '浏览次数降序', '浏览次数升序', '选项总数降序', '选项总数升序', '开始时间降序', '开始时间升序', '到期时间降序', '到期时间升序');
		$dorder  = array('itemid DESC', 'addtime DESC', 'addtime ASC', 'polls DESC', 'polls ASC', 'hits DESC', 'hits ASC', 'items DESC', 'items ASC', 'fromtime DESC', 'fromtime ASC', 'totime DESC', 'totime ASC');
		isset($order) && isset($dorder[$order]) or $order = 0;
		isset($typeid) or $typeid = 0;
		$type_select = type_select('poll', 1, 'typeid', '请选择分类', $typeid);
		$order_select  = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($_areaids) $condition .= " AND areaid IN (".$_areaids.")";//CITY
		if($keyword) $condition .= " AND title LIKE '%$keyword%'";
		if($typeid) $condition .= " AND typeid=$typeid";
		if($areaid) $condition .= ($ARE['child']) ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
		$lists = $do->get_list($condition, $dorder[$order]);
		include tpl('poll', $module);
	break;
}
?>