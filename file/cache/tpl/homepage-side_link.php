<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if($file != 'link') { ?>
<div class="side_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=link', $domain);?>"><img src="<?php echo $MODULE['4']['linkurl'];?>image/more.gif" title="更多"/></a></span><strong><?php echo $side_name[$HS];?></strong></div></div>
<div class="side_body">
<?php $tags=tag("table=link&condition=status=3 and username='$username'&pagesize=".$side_num[$HS]."&order=listorder desc&template=null");?>
<ul>
<?php if($tags) { ?>
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<li><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
<?php } } ?>
<?php } else { ?>
<li>暂无链接</li>
<?php } ?>
</ul>
</div>
<?php } ?>
