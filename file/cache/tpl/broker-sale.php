<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', $template);?>
  <link rel="stylesheet" type="text/css" href="<?php echo AJ_SKIN;?>sell/pages.css"/>
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
   <!--搜索-->
    <div class="br_searchA">
        <h6>出售房源</h6>
        <div class="br_select"> 
     <form action="<?php echo $COM['linkurl'];?>&file=sale" onsubmit="return check_kw();">
<input type="hidden" name="homepage" value="<?php echo $username;?>"/>
<input type="hidden" name="file" value="sale"/>
            <select name="catid">
            <option value="0">物业类型</option>
 <?php $maincat = get_maincat(0,5)?>
            <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>    
   <option value="<?php echo $v['catid'];?>" <?php if($v['catid']==$catid) { ?>selected="selected"<?php } ?>
><?php echo $v['catname'];?></option><?php } } ?>
                        </select>
            <select name="p">
            <option value="0">价格范围</option>
<?php $jiage = array('30万以下', '30万-50万', '50万-80万', '80万-100万', '100万-120万', '120万-150万','150万-200万');?>
                          <?php if(is_array($jiage)) { foreach($jiage as $k => $v) { ?>    
   <option value="<?php echo $k+1;?>" <?php if($_GET['p']==($k+1)) { ?>selected="selected"<?php } ?>
><?php echo $v;?></option><?php } } ?>
                        </select>
            <select name="r">
            <option value="0">户型</option>
                         <option selected="selected" value="">户型</option>
           <?php $huxing = array('一室', '二室', '三室', '四室', '其它');?>
    <?php if(is_array($huxing)) { foreach($huxing as $k => $v) { ?>    
   <option value="<?php echo $k+1;?>" <?php if($_GET['r']==($k+1)) { ?>selected="selected"<?php } ?>
><?php echo $v;?></option><?php } } ?>
                        </select>
             <select name="a">
            <option value="0">面积</option> 
                       <?php $mianji = array('40平米以下', '40-60平米', '60-80平米', '80-100平米', '100-120平米', '120-150平米','150平米以上');?>
    <?php if(is_array($mianji)) { foreach($mianji as $k => $v) { ?>    
   <option value="<?php echo $k+1;?>" <?php if($_GET['a']==($k+1)) { ?>selected="selected"<?php } ?>
><?php echo $v;?></option><?php } } ?>
            </select>
      
  <input type="text" name="kw" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>输入关键词<?php } ?>
" size="25" id="kw" class="textSty" onfocus="if(this.value=='输入关键词')this.value='';"/>
          
            <input type="submit" name="submit" value="" class="butSty">
            </form>
            </div>
     
    </div>
    <!--搜索_End-->
  <div class="houseinfo mt10">
      <h3><span>二手房</span></h3>
      <ul class="house">
 
  <?php if(is_array($lists)) { foreach($lists as $i => $t) { ?>
    <div class="b_elist_lloupan">
             <div class="b_elist_lloupanimg fl"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" width="100" height="75"></div>
                <div class="b_elist_lloupantxt fl">
                <ul>
                      <li class="title"><a href="<?php echo $t['linkurl'];?>" class="title" target="_blank" title="<?php echo $t['alt'];?>"><?php echo dsubstr($t['alt'], 56, $suffix = '');?></a></li>
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
       <div class="pagination b_mt20"><div class="pagination-inner" style="margin:15px"><?php echo $pages;?></div></div>

    </div>
     <div class="a_right">
      <div class="a_info">
         <h3><?php echo $t['company'];?></h3>  
         <ul>
            <li><span class="a1">所属公司：</span><span class="a1_1"><b><A href="<?php echo userurl($t['username'], '');?>" 
  target=_blank><?php echo $COM['company'];?></A></b></span><div class="clear"></div></li>
            <li><span class="a1">主营区域：</span><span class="a1_1"><?php echo area_pos($t['areaid'], '');?></span><div class="clear"></div></li>
            
            <li><span class="a1">所在地址：</span><span class="a1_1"><?php echo $COM['address'];?></span><div class="clear"></div></li>
            <li><span class="a1">服务热线：</span><span class="a1_1"><?php if($domain) { ?><?php echo $COM['telephone'];?><?php } else { ?><?php echo anti_spam($COM['telephone']);?><?php } ?>
</span><div class="clear"></div></li><?php if($COM['fax']) { ?>
 <li><span class="a1">公司传真：</span><span class="a1_1"><?php if($domain) { ?><?php echo $COM['fax'];?><?php } else { ?><?php echo anti_spam($COM['fax']);?><?php } ?>
</span><div class="clear"></div></li>           <?php } ?>
  
                             
         </ul>
       </div>
  
<?php if($side_pos==0) { ?>
<?php include template('side', $template);?>
<?php } ?>
    </div>
    
  <!--底部-->
<?php include template('footer', $template);?>
