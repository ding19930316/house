<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if($file != 'contact' && $could_contact) { ?>
<div class="union">
         <h3><?php echo $side_name[$HS];?></h3>
<ul>
<li>联系人：<?php echo $COM['truename'];?></li>
<?php if($COM['telephone']) { ?>
<li title="<?php echo $COM['telephone'];?>">电话：<?php echo $COM['telephone'];?></li>
<?php } ?>
<?php if($COM['mail']) { ?>
<li title="<?php echo $COM['mail'];?>">邮件：<?php echo $COM['mail'];?></li>
<?php } ?>
<?php if($COM['mobile']) { ?>
<li title="<?php echo $COM['mobile'];?>">手机：<?php echo $COM['mobile'];?></li>
<?php } ?>
<?php if($COM['fax']) { ?>
<li title="<?php echo $COM['fax'];?>">传真：<?php echo $COM['fax'];?></li>
<?php } ?>
</ul>
</div>
<?php } ?>
