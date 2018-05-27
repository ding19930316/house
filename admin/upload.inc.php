<?php
/*
	[Aijiacms System] Copyright (c) 2011-2014 [Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$menus = array (
    array('上传记录', '?file='.$file),
);
$id = isset($id) ? intval($id) : -1;
($id > -1 && $id < 10) or $id = -1;
if($id == -1 && $action != 'part') $action = 'part';
if($id > -1) $table = $AJ_PRE.'upload_'.$id;
switch($action) {
	case 'delete':
		$itemid or msg('请选择记录');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$result = $db->query("SELECT fileurl FROM {$table} WHERE pid IN ($itemids)");
		while($r = $db->fetch_array($result)) {
			 delete_upload($r['fileurl'], 0);
		}
		$db->query("DELETE FROM {$table} WHERE pid IN ($itemids)");
		dmsg('删除成功', $forward);
	break;
	case 'delete_record':
		$itemid or msg('请选择记录');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table} WHERE pid IN ($itemids)");
		dmsg('删除成功', $forward);
	break;
	case 'part':
		$lists = array();
		for($i = 0; $i < 10; $i++) {
			$r = array();
			$r['table'] = $AJ_PRE.'upload_'.$i;
			$t = $db->get_one("SHOW TABLE STATUS FROM `".$CFG['db_name']."` LIKE '".$r['table']."'");
			$r['rows'] = $t['Rows'];
			$r['name'] = $t['Comment'];
			$lists[] = $r;
		}
		include tpl('upload_part');
	break;
	default:
		$sfields = array('按条件', '文件名', '会员', '来源', '后缀', '信息ID');
		$dfields = array('fileurl', 'fileurl', 'username', 'upfrom', 'fileext', 'itemid');
		$sorder  = array('排序方式', '文件大小降序', '文件大小升序', '上传时间降序', '上传时间升序', '图片宽度降序', '图片宽度升序', '图片高度降序', '图片高度升序');
		$dorder  = array('pid DESC', 'filesize DESC', 'filesize ASC', 'addtime DESC', 'addtime ASC', 'width DESC', 'width ASC', 'height DESC', 'height ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($order) && isset($dorder[$order]) or $order = 0;
		$username = isset($username) ? $username : '';
		$thumb = isset($thumb) ? intval($thumb) : 0;
		$upfrom = isset($upfrom) ? $upfrom : '';
		$fromdate = isset($fromdate) ? $fromdate : '';
		$fromtime = is_date($fromdate) ? strtotime($fromdate.' 0:0:0') : 0;
		$todate = isset($todate) ? $todate : '';
		$totime = is_date($todate) ? strtotime($todate.' 23:59:59') : 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= $fields < 2 ? " AND $dfields[$fields] LIKE '%$keyword%'" : " AND $dfields[$fields]='$keyword'";
		if($fromtime) $condition .= " AND addtime>$fromtime";
		if($totime) $condition .= " AND addtime<$totime";
		if($mid) $condition .= " AND moduleid='$mid'";	
		if($itemid) $condition .= " AND itemid='$itemid'";	
		if($username) $condition .= " AND username='$username'";
		if($upfrom) $condition .= " AND upfrom='$upfrom'";
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);	
		$lists = array();
		$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['ext'] = file_ext($r['fileurl']);
			is_file(AJ_ROOT.'/file/ext/'.$r['ext'].'.gif') or $r['ext'] = 'oth';
			if($r['filesize'] > 1024*1024*1024) {
				$r['size'] = dround($r['filesize']/1024/1024/1024, 2).'G';
			} else if($r['filesize'] > 1024*1024) {
				$r['size'] = dround($r['filesize']/1024/1024, 2).'M';
			} else {
				$r['size'] = dround($r['filesize']/1024, 2).'K';
			}
			$r['addtime'] = timetodate($r['addtime'], 6);
			$r['image'] = is_image($r['fileurl']) ? 1 : 0;
			$r['fileurl'] = str_replace('.thumb.'.$r['ext'], '', $r['fileurl']);
			$r['img_w'] = $r['width'] > 100 ? 100 : $r['width'];
			$lists[] = $r;
		}
		include tpl('upload');
	break;
}
?>