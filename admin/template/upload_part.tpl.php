<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">上传分表</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="60">分区</th>
<th>名称</th>
<th>表名</th>
<th>记录</th>
<th width="60">查看</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr align="center">
<td><?php echo $k;?></td>
<td><a href="javascript:Dwidget('?file=<?php echo $file;?>&id=<?php echo $k;?>', '上传记录[<?php echo $k;?>]');"><?php echo $v['name'];?></a></td>
<td><a href="javascript:Dwidget('?file=<?php echo $file;?>&id=<?php echo $k;?>', '上传记录[<?php echo $k;?>]');"><?php echo $v['table'];?></a></td>
<td><?php echo $v['rows'];?></td>
<td><a href="javascript:Dwidget('?file=<?php echo $file;?>&id=<?php echo $k;?>', '上传记录[<?php echo $k;?>]');" class="t">查看</a></td>
</tr>
<?php }?>
</table>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>