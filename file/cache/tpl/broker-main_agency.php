<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!--
<div class="pic_list">
      <h3><span style="float:left;"><?php echo $COM['company'];?>经纪人</span><div style="width:60px; float:right;"><a href="<?php echo userurl($username, 'file=agency', $domain);?>">更多>></a></div></h3>
  
      <ul class="agent">
   <?php $tags=tag("moduleid=2&condition=companyid='$userid' &pagesize=".$main_num[$HM]."&order=edittime desc&fields=*&length=26&template=null");?>
<!--
  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li> <a href="<?php echo $t['linkurl'];?>" class="headpic" target="_blank"><img src="<?php if($t['thumb']) { ?><?php echo $t['thumb'];?><?php } else { ?><?php echo AJ_SKIN;?>image/nophoto_90x90.gif<?php } ?>
" width="90" height="90"/></a><p><?php echo $t['truename'];?><br><?php echo $t['telephone'];?></p></li>
  <?php } } ?>
                 
               </ul><div class="clear"></div>
    </div>
-->