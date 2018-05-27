<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">进程列表</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>用户</th>
<th>主机</th>
<th>数据库</th>
<th>命令</th>
<th>时间</th>
<th>状态</th>
<th>SQL查询</th>
<th width="50">操作</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><?php echo $v['User'];?></td>
<td><?php echo $v['Host'];?></td>
<td><?php echo $v['db'];?></td>
<td><?php echo $v['Command'];?></td>
<td><?php echo $v['Time'];?></td>
<td><?php echo $v['State'];?></td>
<td><input type="text" style="width:150px;" value="<?php echo $v['Info'];?>" title="<?php echo $v['Info'];?>" onmouseover="this.select();"/></td>
<td><a href="?file=<?php echo $file;?>&action=kill&id=<?php echo $v['Id'];?>"><img src="admin/image/delete.png" width="16" height="16" title="结束进程" alt=""/></a></td>
</tr>
<?php }?>
</table>
<script type="text/javascript">Menuon(4);</script>
<?php include tpl('footer');?>