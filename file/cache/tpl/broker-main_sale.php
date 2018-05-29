<?php defined('IN_AIJIACMS') or exit('Access Denied');?><div class="houseinfo mt10">
      <h3><span>最新<?php echo $main_name[$HM];?></span><a href="<?php echo userurl($username, 'file=sale', $domain);?>">更多>></a></h3>
      <ul class="house">
  <?php $tags=tag("moduleid=5&condition=status>2 and username='$username' &pagesize=".$main_num[$HM]."&order=edittime desc&fields=*&length=56&template=null");?>
  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
    <div class="b_elist_lloupan">
             <div class="b_elist_lloupanimg fl"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" width="100" height="75"></div>
                <div class="b_elist_lloupantxt fl">
                <ul>
                      <li class="title"><a href="<?php echo $t['linkurl'];?>" class="title" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
                      <li><a href="<?php echo $MODULE['18']['linkurl'];?>show.php?itemid=<?php echo $t['houseid'];?>" target="_blank"><?php echo $t['housename'];?></a>  <?php echo $t['address'];?></li>
                     <li>户型：<?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
<?php if($t['toilet']) { ?><?php echo $t['toilet'];?>卫<?php } ?>
，楼层：<?php echo $t['floor1'];?>/<?php echo $t['floor2'];?> 房龄：<?php echo $t['houseyear'];?>年</li>
                      <li><span><?php if($t['username'] && $AJ['im_web']) { ?><?php echo im_web($t['username'].'&mid='.$moduleid.'&itemid='.$t['itemid']);?>&nbsp;<?php } ?>
<?php if($t['qq'] && $AJ['im_qq']) { ?><?php echo im_qq($t['qq']);?>&nbsp;<?php } ?>
<?php if($t['ali'] && $AJ['im_ali']) { ?><?php echo im_ali($t['ali']);?>&nbsp;<?php } ?>
<?php if($t['msn'] && $AJ['im_msn']) { ?><?php echo im_msn($t['msn']);?>&nbsp;<?php } ?>
<?php if($t['skype'] && $AJ['im_skype']) { ?><?php echo im_skype($t['skype']);?>&nbsp;<?php } ?>
</span>&nbsp;
                      <span><?php echo timetodate($t['edittime'], 3);?>前发布</span></li>
                    </ul>
                </div>
              <div class="b_elist_lloupantxt2 fl"><?php if($t['houseearm']) { ?><?php echo $t['houseearm'];?>平米<?php } else { ?>暂无<?php } ?>
</div>
                <div class="b_elist_lloupantxt3 fl"><?php if($t['price']>0) { ?><?php echo $t['price'];?>万元<?php } else { ?>面议<?php } ?>
</div>
                <div class="clear"></div>
            </div>

 <?php } } ?>
        </ul><div class="clear"></div>
    </div>