<?php defined('IN_AIJIACMS') or exit('Access Denied');?>             <div class="dtl_jjr">
 <?php if($member) { ?>
                        <a href="<?php echo userurl($member['username'], '');?>" class="dtl_avatar" target="_blank">
                            <img src="<?php echo useravatar($username, 'large');?>" alt="<?php echo $member['truename'];?>">
                            <span><i></i><?php echo $member['truename'];?>的店铺</span>
                        </a>
                        <ul>
                          <li >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($item['username'] && $AJ['im_web']) { ?><?php echo im_web($item['username'].'&mid='.$moduleid.'&itemid='.$itemid);?>&nbsp;<?php } ?>
</li>
                            <li>服务区域：<?php echo area_pos($areaid, ' ');?></li>
                            <li>所在公司：<a href="<?php echo userurl($member['username'], '');?>" target="_blank"><?php echo $member['company'];?></a> </li>
  <li>腾讯聊天： <strong><?php if($member['qq'] && $AJ['im_qq']) { ?><?php echo im_qq($member['qq']);?>&nbsp;<?php } ?>
</strong> </li>
                            <li>联系电话： <strong class="red"><?php echo $member['mobile'];?></strong></li>                        </ul>
                        <p class="dtl_rz">
                          <?php if($member['vtruename']) { ?> <i class="sf"></i><?php } else { ?> <i class="sf_no"></i><?php } ?>
                           <?php if($member['vcompany']) { ?> <i class="zy"></i><?php } else { ?> <i class="zy_no"></i><?php } ?>
                            <!--<i class="cx_no"></i>-->
                        </p>
                        <p>
                           <a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=send&touser=<?php echo $member['username'];?>" class="btn_style2" id="leaveMG">给TA留言</a>
                        </p>
                 
<?php } else { ?>
<div class="ImgPhoto"><img src="<?php echo AJ_SKIN;?>image/sell/nophoto_180x180.gif">
<p>        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;游客<br>
</div><?php } ?>
</div>