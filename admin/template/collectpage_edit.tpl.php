<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>

<div class="tt">编辑批量采集规则</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="edit"/>
<input type="hidden" name="cid" value="<?php echo $cid;?>"/>
<input type="hidden" name="config" id="config" value="<?php echo $config;?>" />
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">采集网站</td>
<td><?php echo $myCollect['sitename'];?></td>
</tr>
<tr>
<td class="tl">采集规则名称</td>
<td><input name="title" type="text" id="title" size="30" value="<?php echo $myCollect['listcollect'][$cid]['title'];?>" />  <span id="dtitle" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">默认分类</td>
<td><?php echo ajax_category_select('catid', '', $myCollect['listcollect'][$cid]['catid'], $myCollect['modid'] == 2 ? 4 : $myCollect['modid']);?></td>
</tr>
<tr>
<td class="tl">默认地区</td>
<td><?php echo ajax_area_select('areaid', '请选择', $myCollect['listcollect'][$cid]['areaid']);?></td>
</tr>
<tr>
<td class="tl">列表页面URL</td>
<td><input name="urlpage" type="text" id="urlpage" size="60" value="<?php echo $myCollect['listcollect'][$cid]['urlpage'];?>" /> <?php tips('目标网站列表页地址，如果要采集多页，请用<{pageid}>代替页码');?> <span id="durlpage" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">列表区域识别规则</td>
<td><textarea class="textarea" name="listarea" id="listarea" rows="5" cols="60"><?php echo my_echorule( $myCollect['listcollect'][$cid]['listarea'], 'textarea' );?></textarea>  <BR><span id="dlistarea" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">信息序号采集规则</td>
<td><textarea class="textarea" name="infoid" id="infoid" rows="5" cols="60"><?php echo my_echorule( $myCollect['listcollect'][$cid]['infoid'], 'textarea' );?></textarea> <BR><span id="dinfoid" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">下一页的页码采集规则</td>
<td><textarea class="textarea" name="nextpageid" id="nextpageid" rows="5" cols="60"><?php echo my_echorule( $myCollect['listcollect'][$cid]['nextpageid'], 'textarea' );?></textarea> <?php tips('这里留空表示没有第二页，填入 ++ 则表示页面序号是加1方式递增的，否则输入页码的采集规则。');?></td>
</tr>
<tr>
<td class="tl">起始页页码</td>
<td><input name="startpageid" type="text" id="startpageid" size="30" value="<?php echo $myCollect['listcollect'][$cid]['startpageid'];?>" /> </td>
</tr>
<tr>
<td class="tl">最多采集页数</td>
<td><input name="maxpagenum" type="text" id="maxpagenum" size="30" value="<?php echo $myCollect['listcollect'][$cid]['maxpagenum'];?>" /> <?php tips('填0或留空标识不限制');?> </td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'title';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写采集规则名称', f);
		return false;
	}
	f = 'urlpage';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写采集页面地址', f);
		return false;
	}
	f = 'infoid';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写信息序号采集规则', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>