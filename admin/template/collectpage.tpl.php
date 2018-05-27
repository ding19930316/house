<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt"><?php echo $myCollect['sitename'];?>列表采集规则配置</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="40%">采集规则名称</th>
<th width="30%">最多采集页数</th>
<th width="30%">操作</th>
</tr>
<?php foreach($myCollect['listcollect'] as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><?php echo $v['title'];?></td>
<td><?php echo $v['maxpagenum'];?></td>
<td>
<a href="<?php echo "?file=collectbatch&action=collect&moduleid=".$myCollect['modid']."&siteid=".$siteid."&auth=".$myCollect['spider_auth']."&collectname=".$k;?>">采集</a> | 
<a href="?file=collectpage&action=edit&config=<?php echo $config;?>&cid=<?php echo $k;?>">编辑</a> | 
<a href="javascript:if(confirm('确实要删除该采集规则么？')) document.location='?file=collectpage&action=del&config=<?php echo $config;?>&cid=<?php echo $k;?>'">删除</a> 

</td>
</tr>
<?php }?>
</table>

<div class="tt">添加新的列表采集规则</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="add"/>
<input type="hidden" name="config" id="config" value="<?php echo $config;?>" />
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">采集规则名称</td>
<td><input name="title" type="text" id="title" size="30" />  <span id="dtitle" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">默认分类</td>
<td><?php echo ajax_category_select('catid', '选择分类', $myCollect['catid'], $myCollect['modid'] == 2 ? 4 : $myCollect['modid']);?></td>
</tr>
<tr>
<td class="tl">默认地区</td>
<td><?php echo ajax_area_select('areaid', '请选择', 0, '', 2);?></td>
</tr>
<tr>
<td class="tl">列表页面URL</td>
<td><input name="urlpage" type="text" id="urlpage" size="60" /> <?php tips('目标网站列表页地址，如果要采集多页，请用<{pageid}>代替页码');?> <span id="durlpage" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">列表区域识别规则</td>
<td><textarea class="textarea" name="listarea" id="listarea" rows="5" cols="60"></textarea>  <BR><span id="dlistarea" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">信息序号采集规则</td>
<td><textarea class="textarea" name="infoid" id="infoid" rows="5" cols="60"></textarea> <br><span id="dinfoid" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">下一页的页码采集规则</td>
<td><textarea class="textarea" name="nextpageid" id="nextpageid" rows="5" cols="60"></textarea> <?php tips('这里留空表示没有第二页，填入 ++ 则表示页面序号是加1方式递增的，否则输入页码的采集规则。');?></td>
</tr>
<tr>
<td class="tl">起始页页码</td>
<td><input name="startpageid" type="text" id="startpageid" size="30" /> </td>
</tr>
<tr>
<td class="tl">最多采集页数</td>
<td><input name="maxpagenum" type="text" id="maxpagenum" size="30" /> <?php tips('填0或留空标识不限制');?> </td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<script type="text/javascript">
function copyUrl(txt)
{  
    window.clipboardData.setData("Text",txt); 
    alert("独立采集URL复制成功!"); 
} 
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