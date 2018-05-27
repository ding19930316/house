<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" onsubmit="return check();" enctype="multipart/form-data">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="excelimport"/>
<div class="tt">从EXCEL表中导入数据</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr id="p_0">
<td class="tl">选择模块</td>
<td>
<select name="moduleid" id="moduleid">
<option value="0">请选择</option>
<?php foreach($modules as $v) {?>
<option value="<?php echo $v['moduleid'];?>"><?php echo $v['modulename'];?></option>
<?php }?>
</select>
<span id="dmoduleid" class="f_red"></span>
</td>
</tr>
<tr id="p_0">
<td class="tl">EXCEL表</td>
<td>
<input type="file" name="excel" id="excel" size="60" value="" />
<span id="dexcel" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl"> </td>
<td height="30"><input type="submit" value="提交" class="btn"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'moduleid';
	l = $(f).value;
	if(l == 0) {
		Dmsg('请选择一个模块', f);
		return false;
	}
	f = 'excel';
	l = $(f).value;
	if(l == 0) {
		Dmsg('请选择一个EXCEL文件', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(<?php echo $m;?>);</script>
</body>
</html>