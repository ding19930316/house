<?php defined('IN_AIJIACMS') or exit('Access Denied');?>
<?php include template('header');?>
<div id="main">
<div class="bread">您当前的位置：：<a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><?php echo $AJ['sitename'];?></a> &gt;<a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &gt;<span>经纪人</span></div>
<div class="hslist" id="hslist">
<div class="hs_b">
<div class="cf">
<span>区域：</span>
<p id="hs_area" class="hs_hidep on">
                     <a <?php if(empty($areaid)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'r');?>.html">全部</a>
                                 <?php $mainarea = get_mainarea($cityid)?>
          <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><a <?php if($areaid==$v['areaid']) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list-r<?php echo $v['areaid'];?><?php echo deal_str($lst,'r');?>.html"><?php echo $v['areaname'];?></a><?php } } ?>
                            </p>
                    </div>

</div>
</div>
<div class="cf">
<div class="hlist_fl">
<h2>
<span class="hl_page">
共为您找到 <b class="red"><?php echo $items;?></b> 个经纪人
<?php if($page==1) { ?><span class="pre"></span><?php } else { ?><a class="pre" href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php if($page==1) { ?>1<?php } else { ?><?php echo $page-1;?><?php } ?>
.html"></a><?php } ?>
<?php echo $page;?><a class="next" href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php if($page==$total) { ?><?php echo $total;?><?php } else { ?><?php echo $page+1;?><?php } ?>
.html">下一页</a></span>
<span class="modTab">
  <?php $lx = array('经纪人', '中介');?>
  <a <?php if(empty($source)) { ?> class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'u');?>.html" >全部</a>
<?php if(is_array($lx)) { foreach($lx as $k => $v) { ?>  <a  <?php if($source==($k+1)) { ?>class="on"<?php } ?>
  href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'u');?>-u<?php echo $k+1;?>.html"><?php echo $v;?></a><?php } } ?>

</span>
</h2>
<div class="hlist_sort">
<div class="cf">
                      
<div class="fr_1">
<div class="hs_mlist" id="h_s1">默认排序<ul>
                                    <li>
                                        <a href="<?php echo $MOD['linkurl'];?>list.html">默认排序</a>
                                    </li>
                               
</ul>
</div>

</div>
</div>
</div>
                                  
                              <?php if($tags) { ?><?php include template('list-'.$module, 'tag');?><?php } ?>
                                           
                
                </div>
<div class="hlist_fr i_x_mt20">
<div class="lista">
<h4><a href="<?php echo $MOD['linkurl'];?>list-u1.html" target="_blank" class="more">更多&gt;&gt;</a>经纪人排行</h4>
                     
                        <ul class="jjrl"><?php $tags=tag("table=member&condition=groupid=6&areaid=$cityid&order=userid desc&pagesize=6&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                                                            <li>
                                 <a  class="jAvatar" href="<?php echo userurl($t['username'], '');?>" target="_blank"><img  src="<?php echo useravatar($t['username'], 'large');?>" width="90" height="90"></a>
                                    <p>
                                       <a href="<?php echo userurl($t['username'], '');?>" target="_blank"><?php echo userinfos($t['username']);?></a>
                                       <?php if($t['vip']) { ?><img src="<?php echo AJ_SKIN;?>image/vip.gif"/> <img src="<?php echo AJ_SKIN;?>image/vip_<?php echo $t['vip'];?>.gif"/></span><?php } ?>
           <br>
                                        区域：<?php echo area_pos($t['areaid'], '');?>                                        <br>电话：<?php echo $t['mobile'];?></p>
                                </li>
                                           <?php } } ?>
                                                    </ul>
                    </div>
                
</div>
</div>
</div>
<script>
seajs.use(["cookie"],function(alertM){

$("#hs_more div").add("#h_s1,#h_s2").on({
mouseenter:function(){
$(this).find("ul").show()
},
mouseleave:function(){
$(this).find("ul").hide()
}
})
});
</script>
<?php include template('footer');?>