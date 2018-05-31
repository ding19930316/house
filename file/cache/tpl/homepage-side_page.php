<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if($file == 'introduce') { ?>
<div class="side_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="side_body">
<ul>
<?php if(is_array($TYPE)) { foreach($TYPE as $t) { ?>
<li id="page_<?php echo $t['itemid'];?>"<?php if($itemid==$t['itemid']) { ?> class="f_b"<?php } ?>
><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
<?php } } ?>
<li id="page_credit"><a href="<?php echo userurl($username, 'file=credit');?>">诚信档案</a></li>
<li id="page_contact"><a href="<?php echo userurl($username, 'file=contact');?>">联系方式</a></li>
</ul>
</div>
<?php } ?>
