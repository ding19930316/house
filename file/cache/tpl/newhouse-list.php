<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<link href="<?php echo AJ_SKIN;?>xfreset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo AJ_SKIN;?>xinfang.css" rel="stylesheet" type="text/css" />
<div class="main">
         
    <div class="bread">您当前的位置：<a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><?php echo $AJ['sitename'];?></a>&gt;<a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>&gt;<span>楼盘搜索</span></div>
   
<div class="con">
<div class="hslist" id="hslist">
<h2>
<a href="<?php echo $MOD['linkurl'];?>list.html" class="qy on">区域地标</a>
<a href="<?php echo $MODULE['1']['linkurl'];?>map/house.html" class="map" target="_blank">地图找房</a>
</h2>
                            <div class="cf hsl_t">
                    <span>区域：</span>
                    <p id="hs_area" class="hs_hidep ">
                        <a href="javascript:" class="hs_hide" style="display: inline-none;"><u class="hs_mo">更多</u><u class="hs_le">收起</u></a>
<em><a <?php if(empty($areaid)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'r');?>.html">全部</a></em>
<?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><em><a <?php if($areaid==$v['areaid']) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list-r<?php echo $v['areaid'];?><?php echo deal_str($lst,'r');?>.html"><?php echo $v['areaname'];?></a></em><?php } } ?>
<?php if($areaid) { ?>
<span class="i">
<em><a <?php if(empty($bid)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'b');?>.html">全部</a></em>
<?php $mainareas = get_mainarea($areaid)?>
<?php if(is_array($mainareas)) { foreach($mainareas as $k => $v) { ?>
<em><a <?php if($bid==$v['areaid']) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list-b<?php echo $v['areaid'];?><?php echo deal_str($lst,'b');?>.html"><?php echo $v['areaname'];?></a></em><?php } } ?></span><?php } ?>

                       
                                                </p>
                </div>
            
<div class="cf">
<span>价格：</span>
<p>
<em><a <?php if(empty($range)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'p');?>.html">全部</a></em>
<?php $range_arr = getbox_name('range','newhouse_6')?>
    <?php if(is_array($range_arr)) { foreach($range_arr as $key => $v) { ?>
 <em><a <?php if($range==$key) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'p');?>-p<?php echo $key;?>.html"><?php echo $v;?></a></em><?php } } ?>
</p>
</div>
<div class="cf">
<span>类型：</span>
<p>
<em><a  <?php if(empty($catid)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'t');?>.html" >全部</a></em>
 <?php $maincat = get_maincat(0,6)?>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?> <em><a  <?php if($catid==$v['catid']) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'t');?>-t<?php echo $v['catid'];?>.html"><?php echo $v['catname'];?></a></em><?php } } ?>
</p>
</div>
<div class="cf">
<span>特色：</span>
<p>
                 <em><a  <?php if(empty($lpts)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'l');?>.html" >全部</a></em>
<?php $lpts_arr = getbox_name('lpts','newhouse_6')?>
    <?php if(is_array($lpts_arr)) { foreach($lpts_arr as $key => $v) { ?>
 <em><a <?php if($lpts==$key) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'l');?>-l<?php echo $key;?>.html"><?php echo $v;?></a></em><?php } } ?>
                        </p>
</div>
<div class="cf letter">
<span>字母：</span>
<p>
                   <a <?php if(empty($letter)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'e');?>.html" >全部</a>
  <?php $l = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');?>
               <?php if(is_array($l)) { foreach($l as $k => $v) { ?>
<a <?php if($letter==$v) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'e');?>-e<?php echo $v;?>.html"><?php echo $v;?></a><?php } } ?>
                        </p>
</div>
<div class="cf hsl_b">
<span>名称：</span>
<form action="" id="serach_form" method="post">

<input data-url="<?php echo $MOD['linkurl'];?>house.php?action=house" type="text" id="hname" name="kw" value="" placeholder="请输入楼盘名称（支持拼音或简拼）" autocomplete="off">
<a class="obtn" href="javascript:"><i class="search"></i><button type="submit"></button></a>
</form>
</div>
<div class="hs_more cf" id="hs_more">
<span>更多找房条件：</span>

<div class="hs_mlist">建筑类型<ul>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'j');?>.html">全部</a></li>
<?php $buildtype_arr = getbox_name('buildtype','newhouse_6')?>
    <?php if(is_array($buildtype_arr)) { foreach($buildtype_arr as $key => $v) { ?>
 <li><a <?php if($buildtype==$key) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'j');?>-j<?php echo $key;?>.html"><?php echo $v;?></a></li><?php } } ?>
</ul>
</div>
<div class="hs_mlist">装修情况<ul>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'f');?>.html">全部</a></li>
<?php $fix_arr = getbox_name('fitment','newhouse_6')?>
    <?php if(is_array($fix_arr)) { foreach($fix_arr as $key => $v) { ?>
 <li><a <?php if($fitment==$key) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'f');?>-f<?php echo $key;?>.html"><?php echo $v;?></a></li><?php } } ?>
</ul>
</div>
<div class="hs_mlist">开盘时间<ul style="display: none;">
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'o');?>.html">全部</a></li>
<?php $kaipan = array('本月开盘', '下月开盘', '3月内开盘', '6月内开盘', '前3月已开','前6月已开');?>
    <?php if(is_array($kaipan)) { foreach($kaipan as $k => $v) { ?>
 <li><a <?php if($opentime==($k+1)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'o');?>-o<?php echo $k+1;?>.html"><?php echo $v;?></a></li><?php } } ?>
</ul>
</div>

</div>
            </div>
<div class="fl xf_sh_list">
<div class="xf_sh_list_t">
<ul class="xszt cf">
<li><a <?php if(empty($typeid)) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'h');?>.html">全部</a></li>
  <?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?> 
<li><a  <?php if($typeid==($k+1)) { ?>class="on"<?php } ?>
  href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'h');?>-h<?php echo $k+1;?>.html"><?php echo $v;?></a></li><?php } } ?>
                  
</ul>
<div class="px">
<p>默认排序<span class="pointer"><i class="sj_icon"></i><u class="sj_icon"></u></span></p>
<ul><li><a href="list<?php echo deal_str($lst,'n');?>.html">默认排序</a></li>
    <li><a  href="list<?php echo deal_str($lst,'n');?>-n1.html">售价从高到低</a></li>
                                <li><a  href="list<?php echo deal_str($lst,'n');?>-n2.html">售价从低到高</a></li>
                                <li><a  href="list<?php echo deal_str($lst,'n');?>-n3.html">开盘时间由近到远</a></li>
                                <li><a  href="list<?php echo deal_str($lst,'n');?>-n4.html">开盘时间由远到近</a></li>
                            </ul>
</div>
<div class="ssjj">共为您找到 <span><?php echo $items;?></span> 个楼盘</div>
<div class="page">
<a href=" <?php if($page==1) { ?> javascript:void(0);<?php } else { ?><?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php echo $page-1;?>.html<?php } ?>
" class="fl"></a>
<a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php if($page==$total) { ?><?php echo $total;?><?php } else { ?><?php echo $page+1;?><?php } ?>
.html" class="fr"></a>
<span><em><?php echo $page;?></em>/<?php echo $total;?></span>
</div>
</div>

          
           <?php if($page==1 && $kw) { ?>
<?php echo ad($moduleid,$catid,$kw,6);?>
<?php echo load('m'.$moduleid.'_k'.urlencode($kw).'.htm');?>
<?php } ?>
<?php if($tags) { ?>
 <?php if(!empty($kw) and $items==1) { ?><?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
 <?php header("location:".$t['linkurl']);?>

<?php } } ?><?php } ?>
<?php if($page == 1) { ?><?php echo load('ad_m'.$moduleid.'_c'.$catid.'.htm');?><?php } ?>
<?php if($tags) { ?><?php include template('list-'.$module, 'tag');?><?php } ?>
            <?php } else { ?>

<?php include template('noresult', 'message');?>

<?php } ?>
</div>
        <div class="fr lp_right">
    
        <div class="category">
            <h2>推荐楼盘</h2>
            <ul>
                                <?php $tags=tag("moduleid=6&condition=status=3 and isnew=1&areaid=$cityid&length=42&pagesize=10&order=level desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> <li><span class="jg"><?php if($t['price']) { ?><?php echo $t['price'];?>元/平米<?php } else { ?>待定<?php } ?>
</span>[<?php echo area_pos($t['areaid'], '');?>] <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a></li><?php } } ?>
 
 
                            </ul>
        </div>
<div class="category adb">
    <?php echo ad($moduleid,$catid,$kw,7);?>
     </div>
        <div class="category">
            <h2>最新楼盘</h2>
            <ul>
                               <?php $tags=tag("moduleid=6&condition=status=3 and isnew=1&areaid=$cityid&length=42&pagesize=10&order=addtime desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> <li><span class="jg"><?php if($t['price']) { ?><?php echo $t['price'];?>元/平米<?php } else { ?>待定<?php } ?>
</span>[<?php echo area_pos($t['areaid'], '');?>] <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a></li><?php } } ?>
                            </ul>
        </div>
    
    
        <div class="category">
            <h2>热点楼盘</h2>
            <ul>
                               <?php $tags=tag("moduleid=6&condition=status=3 and isnew=1&areaid=$cityid&length=42&pagesize=10&order=hits desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> <li><span class="jg"><?php if($t['price']) { ?><?php echo $t['price'];?>元/平米<?php } else { ?>待定<?php } ?>
</span>[<?php echo area_pos($t['areaid'], '');?>] <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a></li><?php } } ?>
                            </ul>
        </div>
       
          
    </div>
<div style="clear:both;"></div>            <div class="guanzhu">
                <h2>网友正在关注的楼盘</h2>
                <ul class="cf">
                                       
   <?php $tags=tag("moduleid=6&condition=status=3 and isnew=1 and thumb<>''&areaid=$cityid&length=42&pagesize=6&order=hits desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> 
                        <li <?php if($i==5) { ?> class="no_fl"<?php } ?>
>
                            <div class="thumb">
                                <div class="img"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" width="150" height="110"></a></div>
                                <div class="text">
                                    <h3><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></h3>
                                    <p><?php if($t['price']) { ?><?php echo $t['price'];?>元/平米<?php } else { ?>待定<?php } ?>
</p>
                                </div>
                            </div>
                        </li><?php } } ?>

                                    </ul>
            </div>
            </div>
 
    <div class="shengming"> <?php echo $AJ['sitename'];?>所提供的2015 <?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
楼盘及<?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
房价信息仅供参考！<?php echo $AJ['sitename'];?> <?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
，专业的<?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
房产网，提供最全面的 <?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
新楼盘,  <?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
楼盘信息以及 <?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
房价查询，您可以查到<?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
新楼盘的打折优惠以及团购活动，为您找到最适合的<?php if($AJ['city']) { ?><?php echo $city_name;?><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
新房房产信息。</div>

<script>
seajs.use(["alert","loginafter","pk","autoc","cookie"],function(alertM,loginafter,pk){
/* 对比 */
pk({
elm:".xf_sh_list_b .detail .db",
hlength:3,
url:"<?php echo $MOD['linkurl'];?>pk/",
type:"楼盘"
})
/* 地区 */
var $hs_area=$("#hs_area").on("click",".hs_hide",function(){
if($.cookie("hs_hide")){
$hs_area.removeClass("on")
$.cookie("hs_hide","")
}else{
$hs_area.addClass("on")
$.cookie("hs_hide",1)
}
})
if($hs_area.height()>32){
$hs_area.addClass("hs_hidep").find(".hs_hide").css("display","inline-block")
}
if($.cookie("hs_hide")){
$hs_area.addClass("on")
}
$(".xf_sh_list_b .list").on("mouseenter","li",function(){
$(this).addClass('on')
}).on("mouseleave","li",function(){
$(this).removeClass('on')
})
var $hname=$("#hname").autoC("<?php echo $MOD['linkurl'];?>house.php?action=house"),
$form=$("#serach_form").on("submit",function(){
var kw = $hname.val();
if(kw == ""||kw==$hname.attr('placeholder')){
$hname.focus();
return false;
}
kw = encodeURIComponent(kw);
window.location.href = "<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'k');?>-k" + kw + ".html";
return false;
}).on("click","a.obtn",function(){
$form.trigger("submit")
});
/*********更多找房条件*************/
$("#hs_more div").on({
mouseenter:function(){
$(this).find("ul").show()
},
mouseleave:function(){
$(this).find("ul").hide()
}
})
/* 排序 */
$(".xf_sh_list_t .px").on({
mouseenter:function(){
$(this).addClass('on')
},
mouseleave:function(){
$(this).removeClass('on')
}
})
});
</script>
