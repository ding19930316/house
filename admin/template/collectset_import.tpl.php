<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">导入采集器配置</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="import"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">配置文件内容</td>
<td><textarea class="textarea" name="importtext" id="importtext" rows="20" cols="70"></textarea>  <?php tips('请将导出的文件内容粘贴到文本框');?><BR><span id="dimporttext" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">允许导入不同版本</td>
<td>
	<input type="radio" class="radio" name="ignoreversion" value="0" checked="checked" />否 
	<input type="radio" class="radio" name="ignoreversion" value="1" />是  
	<?php tips('如果允许的话，可能产生不兼容错误');?>
</td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'importtext';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写采集器配置文件内容', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(2);</script>
</body>
</html>