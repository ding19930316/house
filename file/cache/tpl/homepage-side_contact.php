<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if($file != 'contact' && $could_contact) { ?>
<div class="side_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=contact', $domain);?>"><img src="<?php echo $MODULE['4']['linkurl'];?>image/more.gif" title="更多"/></a></span><strong><?php echo $side_name[$HS];?></strong></div></div>
<div class="side_body">
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
