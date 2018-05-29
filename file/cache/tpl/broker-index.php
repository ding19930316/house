<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', $template);?>
 <div id=content>
    <!--新房首页-->
    <div class="banner mt10"><p><?php echo $COM['company'];?></p>
      <div class="menu png_bg">
        <a href="<?php echo $COM['linkurl'];?>" class="<?php if($file=='homepage') { ?>select<?php } else { ?><?php } ?>
">首页</a>
<?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
<a href="<?php echo $v['linkurl'];?>" class="<?php if($file==$menu_file[$k]) { ?>select<?php } else { ?><?php } ?>
"><?php echo $v['name'];?></a>
<?php } } ?>
      </div>
    </div>
    <div class="a_left">
     
    <?php if(is_array($HMAIN)) { foreach($HMAIN as $HM => $MAIN) { ?>
<?php include template('main_'.$main_file[$HM], $template);?>
<?php } } ?>
     

    </div>
     <div class="a_right">
       <div class="a_info">
         <h3><?php echo $COM['company'];?></h3>  
         <ul>
            <li><span class="a1">所属公司：</span><span class="a1_1"><b><A href="<?php echo userurl($t['username'], '');?>" 
  target=_blank><?php echo $COM['company'];?></A></b></span><div class="clear"></div></li>
            <li><span class="a1">主营区域：</span><span class="a1_1"><?php echo area_pos($COM['areaid'], '');?></span><div class="clear"></div></li>
            
            <li><span class="a1">所在地址：</span><span class="a1_1"><?php echo $COM['address'];?></span><div class="clear"></div></li>
            <li><span class="a1">服务热线：</span><span class="a1_1"><?php if($domain) { ?><?php echo $COM['telephone'];?><?php } else { ?><?php echo anti_spam($COM['telephone']);?><?php } ?>
</span><div class="clear"></div></li><?php if($COM['fax']) { ?>
 <li><span class="a1">公司传真：</span><span class="a1_1"><?php if($domain) { ?><?php echo $COM['fax'];?><?php } else { ?><?php echo anti_spam($COM['fax']);?><?php } ?>
</span><div class="clear"></div></li>           <?php } ?>
  
                             
         </ul>
       </div>
   <br />
   <?php if($side_pos==0) { ?>
<?php include template('side', $template);?>
<?php } ?>
    </div>
    <?php include template('footer', $template);?>
