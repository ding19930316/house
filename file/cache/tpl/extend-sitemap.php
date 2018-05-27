<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<style>
.map {padding:0 0 10px 0;}
.map p {margin:0px;line-height:28px;padding:0 0 0 20px;font-size:14px;}
</style>
<div class="m">
<div class="nav">当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="./">网站地图</a></div>
<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
<?php if($m['moduleid'] > 3 && !$m['islink']&& $m['ismenu']) { ?>
<div class="map">
<div class="box_head px13"><a href="<?php echo $m['linkurl'];?>" target="_blank"><strong><?php echo $m['name'];?></strong></a></div>
<div class="box_body">
<table cellspacing="0" cellspacing="0">
<?php $child = get_maincat(0, $m['moduleid']);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<?php if($i%6==0) { ?><tr><?php } ?>
<td valign="top" width="150">
<p><a href="<?php echo $m['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo set_style($c['catname'], $c['style']);?></a></p>
</td>
<?php if($i%6==5) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
</div>
<?php } ?>
<?php } } ?>
</div>
<?php include template('footer');?>