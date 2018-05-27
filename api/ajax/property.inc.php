<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$CAT or exit;
$CAT['property'] or exit;
include AJ_ROOT.'/include/property.func.php';
$admin = (isset($admin) && $admin) ? 1 : 0;
$moduleid = $CAT['moduleid'];
$options = property_option($catid);
$values = $itemid ? property_value($moduleid, $itemid) : array();
$select = '<select id="property_required" style="display:none;">';
$table = '';
foreach($options as $k=>$v) {
	isset($values[$v['oid']]) or $values[$v['oid']] = '';
	if($v['required']) {
		$star = '<span class="f_red">*</span> ';
	} else {
		$star = $admin ? '<span class="f_hid">*</span> ' : '';
	}
	$table .=  '<tr><td class="tl">'.$star.$v['name'].'</td><td class="tr">'.property_html($values[$v['oid']], $v['oid'], $v['type'], $v['value'], $v['extend']).' <span class="f_red" id="dproduct-'.$v['oid'].'"></span></td></tr>';
	$select .= $v['required'] ? '<option value="'.$v['oid'].'">'.$v['name'].'</option>' : '';
}
$select .= '</select>';
echo $table.$select;
?>