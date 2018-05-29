<?php defined('IN_AIJIACMS') or exit('Access Denied');?> <div class="pic_list">
      <h3><span style="float:left;"><?php echo $main_name[$HM];?></span><div style="width:60px; float:right;"><a href="<?php echo userurl($username, 'file=sale', $domain);?>">更多>></a></div></h3>
      <ul class="agent">
  <?php $tags=tag("moduleid=5&condition=status>2 and username='$username' and elite=1 and thumb<>''&pagesize=".$main_num[$HM]."&order=edittime desc&fields=itemid,title,linkurl,thumb,price,room,hall,toilet,houseearm&length=16&template=null");?>
  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" width="90" height="90"></a><p><?php echo $t['title'];?><br><?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
 <?php if($t['price']>0) { ?><em><?php echo $t['price'];?></em>万元<?php } else { ?>面议<?php } ?>
</p></li>
 <?php } } ?>
               </ul><div class="clear"></div>
    </div></p>