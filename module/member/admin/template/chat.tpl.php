<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">对话搜索</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="条/页"/>
<input type="submit" value="搜 索" class="btn"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="Go('?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>');"/>
</td>
</tr>
</table>
</form>
<div class="tt">在线对话</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>发起人</th>
<th>最新消息</th>
<th>接收人</th>
<th>最新消息</th>
<th width="40">来源</th>
<th width="40">操作</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td>
<?php if(check_name($v['fromuser'])) { ?>
<a href="javascript:_user('<?php echo $v['fromuser'];?>')"><?php echo $v['fromuser'];?></a>
<?php } else { ?>
<a href="javascript:_ip('<?php echo $v['fromuser'];?>')" title="IP:<?php echo $v['fromuser'];?> - <?php echo ip2area($v['fromuser']);?>"><span class="f_gray">游客</span></a>
<?php } ?>
</td>
<td class="px11"><?php echo timetodate($v['freadtime'], 6);?></td>
<td><a href="javascript:_user('<?php echo $v['touser'];?>')"><?php echo $v['touser'];?></a></td>
<td class="px11"><?php echo timetodate($v['treadtime'], 6);?></td>
<td>
<?php if($v['forward']) { ?>
<a href="<?php echo $v['forward'];?>" target="_blank"><img src="admin/image/view.png" width="16" height="16" title="点击查看" alt=""/></a>
<?php } else { ?>
&nbsp;
<?php } ?>
</td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&chatid=<?php echo $v['chatid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="删除" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>