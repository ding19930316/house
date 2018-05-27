<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);

if ($action == 'show')
{
?>
<div class="tt">按页面批量采集</div>
<form method="get" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="collect"/>
<input type="hidden" name="siteid" value="<?php echo $siteid;?>" />
<input type="hidden" name="auth" value="<?php echo $myCollect['spider_auth'];?>" />
<input type="hidden" name="moduleid" value="<?php echo $myCollect['modid'];?>" />
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">采集器名称</td>
<td><?php echo $myCollect['sitename'];?></td>
</tr>
<tr>
<td class="tl">选择列表采集</td>
<td>
<select class="select" size="1" name="collectname" id="collectname">
<?php foreach($myCollect['listcollect'] as $k=>$v) {?>
<option value="<?php echo $k;?>"><?php echo $v['title'];?></option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td class="tl">起始页序号</td>
<td><input name="startpageid" type="text" id="startpageid" size="30" /> <?php tips('留空则按默认方式采集');?> </td>
</tr>
<tr>
<td class="tl">最多采集页数</td>
<td><input name="maxpagenum" type="text" id="maxpagenum" size="30" /> <?php tips('“起始页序号”和“最多采集页数”一般不用填，系统会按默认设置的方式进行。只有您需要不按默认方式进行时才设置，里面的填写格式要跟采集规则里面的设置一致。');?> </td>
</tr>
<?php if($myCollect['modid']==2) {?>
<tr>
<td class="tl">公司信息列表采集URL</td>
<td><input name="compinfolisturl" type="text" id="compinfolisturl" size="80" value="" />  <?php tips('按公司发布的信息列表采集信息，此处填写公司信息列表的采集URL，请在列表规则管理页面获取');?> </td>
</tr>
<?php }?>
<tr>
<td class="tl">采集测试</td>
<td><input name="collecttest" type="checkbox" id="collecttest" /> <?php tips('选择此项时，采集第一条数据测试，不入库');?> </td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<?php } else {?>
<div class="tt">按页面批量采集</div>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="show" />
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">选择采集器</td>
<td>
<select class="select" size="1" name="siteid" id="siteid">
<?php foreach($Collectsite as $k=>$v) {?>
<option value="<?php echo $k;?>"><?php echo $v['name'];?></option>
<?php }?>
</select>
<span id="dsiteid" class="f_red"></span>
</td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<?php }?>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>