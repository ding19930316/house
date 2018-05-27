<?php defined('IN_AIJIACMS') or exit('Access Denied');?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
<li><a href="<?php echo userurl($t['username'], '');?>" class="jAvatar" target="_blank"><img src="<?php echo useravatar($t['username'], 'large');?>"></a>
<p><a href="<?php echo userurl($t['username'], '');?>"><?php echo $t['truename'];?></a>
<br>区域：<?php echo area_pos($t['areaid'], '');?><br>电话：<?php echo $t['mobile'];?></p></li> <?php } } ?>