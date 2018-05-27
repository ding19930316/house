<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?" method="post">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="order"/>
<div class="tt">采集规则配置管理</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="100">采集器名称</th>
<th width="100">采集器标识</th>
<th width="60">模块</th>
<th width="120">内容采集规则</th>
<th width="120">列表采集规则</th>
<th>操作</th>
</tr>
<?php foreach($Collectsite as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['name'];?></a></td>
<td><?php echo $v['config'];?></td>
<td><?php echo $modules[$v['modid']];?></td>
<td><a href="?file=collectset&action=edit&config=<?php echo $v['config'];?>">编辑</a> | <a href="javascript:if(confirm('确实要删除该采集规则么？')) document.location='?file=collectset&action=del&config=<?php echo $v['config'];?>'">删除</a></td>
<td><a href="?file=collectpage&siteid=<?php echo $k;?>&config=<?php echo $v['config'];?>">进入管理</a></td>
<td>
<a href="?file=<?php echo $file;?>&action=copy&copyid=<?php echo $k;?>">复制规则</a> | 
<a href="?file=<?php echo $file;?>&action=export&exportid=<?php echo $k;?>">导出规则</a> | 
<a href="" onclick="clearUrl('<?php echo $v['config'];?>');return false;">清空网址</a><?php tips('采集器采集成功，会记录采集成功网址，每次采集会对比网址库，采集过的自动跳过，如果网址库文件过大可能影响速度，或者改变规则URL时，可以清空网址库');?>
</td>
</tr>
<?php }?>
</table>
</form>
<script type="text/javascript">Menuon(1);</script>
<script language="javascript"> 
function copyUrl(txt)
{  
    window.clipboardData.setData("Text",txt); 
    alert("独立采集URL复制成功!"); 
} 
function clearUrl(txt) {
	makeRequest('file=<?php echo $file;?>&action=clearurl&arrname='+txt, '?', function(){
		if(xmlHttp.readyState==4 && xmlHttp.status==200) {
			if(xmlHttp.responseText) {
				var s = xmlHttp.responseText;
				alert(s);
			}
		}
	});
}
</script>
<span style="font-size:11px;color:#BCC9F0">
<?php echo '<BR>&nbsp;&nbsp;'.MYAJ_NAME.'&nbsp;'.MYAJ_VERSION.'<BR>&nbsp;&nbsp;技术支持QQ：'.MYAJ_QQ;?>
</span>
</body>
</html>