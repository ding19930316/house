<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if($file != 'link') { ?>
<div class="union">
         <h3><?php echo $side_name[$HS];?></h3>
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
   