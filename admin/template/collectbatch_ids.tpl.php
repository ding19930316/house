<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">按序号列表批量采集</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="collect"/>
<input type="hidden" name="type" value="<?php echo $type;?>" />
<input type="hidden" id="auth" name="auth" />
<input type="hidden" id="moduleid" name="moduleid"  />
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">选择采集器</td>
<td>
<select class="select" size="1" name="siteid" id="siteid" onchange="showmid(this)">
<option value="0" selected>选择采集器</option>
<?php foreach($Collectsite as $k=>$v) {?>
<option value="<?php echo $k;?>"><?php echo $v['name'];?></option>
<?php }?>
</select>
<span id="dsiteid" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">信息序号列表</td>
<td><textarea class="textarea" name="batchids" id="batchids" rows="5" cols="60"></textarea>  <?php tips('先选择采集网站，然后输入需要采集或更新的信息序号，多个序号用英文逗号(“,”)分开，如“123,234,345”');?><BR><span id="dbatchids" class="f_red"></span></td>
</tr>
<tr id="compinfolist" style="display:none;">
<td class="tl">公司信息列表采集URL</td>
<td><input name="compinfolisturl" type="text" id="compinfolisturl" size="80" value="" />  <?php tips('按公司发布的信息列表采集信息，此处填写公司信息列表的采集URL，请在列表规则管理页面获取');?> </td>
</tr>
<tr>
<td class="tl">采集测试</td>
<td><input name="collecttest" type="checkbox" id="collecttest" /> <?php tips('选择此项时，采集第一条数据测试，不入库');?> </td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'siteid';
	l = $(f).value;
	if(l == 0) {
		Dmsg('请选择采集网站', f);
		return false;
	}
	f = 'batchids';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写信息序号列表', f);
		return false;
	}
	return true;
}
function showmid(obj){
	<?php foreach($Collectsite as $k=>$v) {?>
	if(obj.options[obj.selectedIndex].value == <?php echo $k;?>) {
			$('moduleid').value = '<?php echo $v['modid'];?>';
			$('auth').value = '<?php echo $v['spider_auth'];?>';
			<?php if($v['modid']==2) {?>
			$('compinfolist').style.display = '';
			<?php } else { ?>
			$('compinfolist').style.display = 'none';
			<?php } ?>
	}
	<?php }?>
}
</script>
<script type="text/javascript">Menuon(2);</script>
</body>
</html>