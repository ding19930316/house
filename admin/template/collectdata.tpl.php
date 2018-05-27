<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?" method="post"  id="form">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="moduleid" id="moduleid" value="1"/>
<input type="hidden" name="modid" id="modid" value="<?php echo $modid;?>"/>
<div class="tt">采集信息管理</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="40">选择</th>
<th>标题</th>
<th width="120">采集器</th>
<th width="120">列表规则</th>
<th width="180">采集时间</th>
</tr>
<?php foreach($info as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><input type="checkbox" name="item[]" value="<?php echo $v['sid'].'|'.$v['tid'].'|'.$v['huid'];?>" /></td>
<td><a href="?file=<?php echo $file;?>&action=show&tid=<?php echo $v['tid'];?>&modid=<?php echo $modid;?>"><?php echo $v['title'];?></a></td>
<td><?php echo (!empty($Collectsite[$v['robotid']]['name'])) ? $Collectsite[$v['robotid']]['name'] : $v['robotid'];?></td>
<td><?php echo $v['listname'];?></td>
<td><?php echo date("Y-m-d H:i:s",$v['robottime']);?></td>
</tr>
<?php }?>
</table>
<div class="btns">
批量操作： <input type="checkbox" name="chkall" onclick="checkall(this.form, 'item')">全选 <input type="radio" name="action" value="dataimport" onClick="jsop(this.value)"> 导入&nbsp;&nbsp;<input type="radio" name="action" value="delete" onClick="jsop(this.value)"> 删除&nbsp;&nbsp; <?php tips('导入和删除信息，只是隐藏信息，信息内容还保存在文件内，清空所有数据会删除所有内容文件，为保证速度及稳定性，请定时清空所有数据');?>
</div>
<div class="btns">
数据维护： <input type="radio" name="action" value="backup" onClick="jsop(this.value)"> 备份数据&nbsp;&nbsp; <input type="radio" name="action" value="recover" onClick="jsop(this.value)"> 恢复数据&nbsp;&nbsp; <input type="radio" name="action" value="deldb" onClick="jsop(this.value)"> 清空所有数据
</div>
<div class="btns" id="import1" style="display:none;">
选择分类： <?php echo ajax_category_select('newcatid', '选择分类', '', $modid == 2 ? 4 : $modid);?> <?php tips('不选择分类则使用采集分类入库');?>
</div>
<div class="btns" id="import2" style="display:none;">
选择地区： <?php echo ajax_area_select('newareaid', '选择地区', 0, '', 2);?> <?php tips('不选择地区则使用采集地区入库');?>
</div>
<div class="btns" id="import3" style="display:none;">
发布时间： <input type="text" size="30" name="newtime" value="<?php echo date("Y-m-d H:i:s");?>"> <?php tips('请按照时间格式设置，留空按采集到的时间入库');?>
</div>
<div class="btns" id="import4" style="display:none;">
关联会员： <input type="radio" name="relateduser" value="1"> 关联&nbsp;&nbsp; <input type="radio" name="relateduser" value="0" checked="checked"> 不关联 <?php tips('选择关联会员，在导入信息时会自动导入关联的会员信息，对会员模块无效');?>
</div>
<div class="btns">
<input type="submit" name="listsubmit" value="提交保存" class="submit">
<input type="reset" name="listreset" value="重置">
</div>
</form>
<div class="pages">
<?php 
if($page==1) echo '   <strong>&nbsp;1&nbsp;</strong>';
if($page>1) echo '   <a href="'.$this_forward.'&page='.($page-1).'&modid='.$modid.'" title="前页">&nbsp;&lt;&nbsp;</a>   <a href="'.$this_forward.'&page=1&modid='.$modid.'" title="首页">&nbsp;1&nbsp;</a>&nbsp;…&nbsp;';
$i=$page-4;
if($i<2) $i=2;
while($i<$page+4 && $i<$pages) {
	if($i==$page) echo '   <strong>&nbsp;'.$i.'&nbsp;</strong>';
	else echo '   <a href="'.$this_forward.'&page='.$i.'&modid='.$modid.'">&nbsp;'.$i.'&nbsp;</a>';
	$i++;
}
if ($page<$pages) echo '   &nbsp;…&nbsp;<a href="'.$this_forward.'&page='.$pages.'&modid='.$modid.'">&nbsp;'.$pages.'&nbsp;</a>   <a href="'.$this_forward.'&page='.($page+1).'&modid='.$modid.'" title="后页">&nbsp;&gt;&nbsp;</a>';
if($page==$pages) echo '   <strong>&nbsp;'.$page.'&nbsp;</strong>';
echo '   &nbsp;<cite>总'.$cnts.'条/'.$pages.'页</cite>&nbsp;';
?>
<input type="text" class="pages_inp" id="aijiacms_pageno" value="<?php echo $page;?>" onkeydown="if(event.keyCode==13 && this.value) {window.location.href='http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'].'?file='.$file.'&page={aijiacms_page}&modid='.$modid;?>'.replace(/\{aijiacms_page\}/, this.value);return false;}"> <input type="button" class="pages_btn" value="转" onclick="if($('aijiacms_pageno').value>0)window.location.href='http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'].'?file='.$file.'&page={aijiacms_page}&modid='.$modid;?>'.replace(/\{aijiacms_page\}/, $('aijiacms_pageno').value);"/>
</div>
<script type="text/javascript">Menuon(<?php echo $m;?>);</script>
<script language="javascript"> 
function jsop(opval)
{
		if(opval=='dataimport')
		{
				$('import1').style.display = '';
				$('import2').style.display = '';
				$('import3').style.display = '';
				$('import4').style.display = '';
				$('moduleid').value = '<?php echo $modid;?>';
		}
		else
		{
				$('import1').style.display = 'none';
				$('import2').style.display = 'none';
				$('import3').style.display = 'none';
				$('import4').style.display = 'none';
				$('moduleid').value = '1';
		}
}
function checkall(form, prefix, checkall, type) {
	var checkall = checkall ? checkall : 'chkall';
	var type = type ? type : 'name';
	
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		
		if(type == 'value' && e.type == "checkbox" && e.name != checkall) {
			if(e.name != checkall && (prefix && e.value == prefix)) {
				e.checked = form.elements[checkall].checked;
			}
		}else if(type == 'name' && e.type == "checkbox" && e.name != checkall) {
			if((!prefix || (prefix && e.name.match(prefix)))) {
				e.checked = form.elements[checkall].checked;
			}
		}
	}
}
</script>
</body>
</html>