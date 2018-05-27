<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">信息查看</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="200">标签</th>
<th>内容</th>
</tr>
<?php foreach($info as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><?php echo  $k.'（'.$names[$k].'）';?></td>
<td><?php echo $v;?></td>
</tr>
<?php }?>
</table>
<script type="text/javascript">Menuon(<?php echo $m;?>);</script>
</body>
</html>