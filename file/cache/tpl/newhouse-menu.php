<?php defined('IN_AIJIACMS') or exit('Access Denied');?><link href="<?php echo AJ_SKIN;?>xfreset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo AJ_SKIN;?>xinfang.css" rel="stylesheet" type="text/css" /><!--导航 begin -->

<div id="main">
<div class="bread">您当前的位置：<a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><?php echo $AJ['sitename'];?></a>&gt;<a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>&gt;<?php echo area_poss($areaid, ' ');?>&gt;<?php echo $title;?>&gt;<a class="red" href="<?php echo $MODULE['1']['linkurl'];?>">详细信息</a></div>
<div class="detail_header mt16">
    <span class="update_time">更新时间：<?php echo $editdate;?></span>
<div class="house_name cf">
<h1 class="fl">
<a href="<?php echo $linkurl;?>" title="<?php echo $title;?>"><?php echo $title;?></a>
                <i class="selstag<?php echo $typeid;?>"></i></h1>
<?php if($level) { ?><i class="house_tj"></i><?php } ?>
<h3>
   <?php $lei=explode(",",$catid);?>
     <?php if(is_array($lei)) { foreach($lei as $ks => $vs) { ?>
        <span><a><?php echo search_cats($vs, '6');?></a></span>
     <?php } } ?>  
 <?php if($lpts) { ?>
    <?php $ts=explode(",",$lpts);?>
     <?php if(is_array($ts)) { foreach($ts as $ks => $vs) { ?>
    <span><a><?php echo getbox_diaoval('lpts','checkbox',$vs,'newhouse_6');?></a></span>
     <?php } } ?>  
 <?php } ?>
                         </h3>
<div class="house_mobile fr">
<div><img src="http://qr.liantu.com/api.php?text=<?php echo $EXT['wap_url'];?>index.php?moduleid=<?php echo $moduleid;?>%26itemid=<?php echo $itemid;?>&w=90&m=2&el=L" widht="90" height="90"/>手机找房</div>
<p>
售楼处免费咨询电话：
<b class="red">
<?php if($telephone) { ?><?php echo $telephone;?><?php } else { ?>热线尚未开通<?php } ?>
</b><br>
                 <a href="#dianpingmodel" class="red dp"><?php echo get_dpnum($itemid);?></a>条点评
<a href="<?php echo $linkurl;?>wenfang.html" class="red wd"><?php echo get_wfnum($itemid);?></a>条问答
已参加团购<a href="javascript:void(0);" class="red tg dt_gb_sa"><?php echo get_buynum($title);?></a>人
访问<span class="red fw"><?php echo $hits;?></span>人　
</p>
</div>
</div>
<div class="house_nav">
<div id="house_nav">
<ul class="cf">
<?php $menu = array('index'=>'楼盘详情','xinxi'=>'详细信息', 'jiage'=>'楼盘价格', 'xiangce'=>'相册','huxing'=>'户型图', 'zixun'=>'最新动态', 'peitao'=>'地图交通',  'dianping'=>'点评', 'wenfang'=>'问房');?>
<?php if(is_array($menu)) { foreach($menu as $k => $v) { ?> 
<li><a href="<?php echo $linkurl;?><?php echo $k;?>.html" <?php if($at==$k) { ?>class='on'<?php } else { ?><?php } ?>
 ><?php echo $v;?></a></li>
<?php } } ?>
       <?php if($bbsurl) { ?><li><a href="<?php echo $bbsurl;?>">论坛</a></li><?php } ?>

</ul>
<a href="javascript:" class="dt_gb_sa">团购报名<i></i></a>
<form action="<?php echo $MODULE['6']['linkurl'];?>house.php?action=groupbuy" class="apply_form">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="fromuser" value="<?php echo $_username;?>"/>
<input type="hidden" name="touser" value="<?php echo $username;?>"/>
<input type="hidden" name="linkurl" value="<?php echo $linkurl;?>"/>
<input type="hidden" name="sex" value="先生"/>
<input type="hidden" name="email"  id="gb_email" value="<?php echo $_email;?>">
<input type="hidden" name="title" value="<?php echo $title;?>" size="60" id="title" class="pd3"/> 
<div id="ptf_zhanshi">
<!-- 无房无时间头部-->
<div class="title">
<h3>免费看房&nbsp;&nbsp;独家优惠</h3>
<span class="h3_info">请留下购房意向，有合适看房路线时，我们会及时通知您。<br>&#25628;&#32;&#34382;&#31934;&#21697;&#31038;&#21306;&#32;&#119;&#119;&#119;&#46;&#115;&#111;&#117;&#104;&#111;&#46;&#110;&#101;&#116;&#25552;&#20379;&#28304;&#30721;</span>
</div>
<!-- 无房无时间头部结束-->
<div class="info_wrap cf">
<div class="apply_text">
<ul>
<li class="icon1">看房专车 免费直达</li>
<li class="icon2">购房优惠 会员独享</li>
<li class="icon3">一站式购房专业指导</li>
</ul>
</div>
<div class="apply_menu"> <span class="alertName"></span>
<p>
<input type="text" id="dt_gb_name" class="text" name="truename" data-required="1" placeholder="请输入姓名">
</p>
<p>
<input type="text" id="dt_gb_mobile" class="text" name="mobile" data-required="1" placeholder="请输入手机号">
</p>
<p class="checkbox"><em class="cbox active" data-check="1"></em><span class="copyRight">同意 [<a href="<?php echo $MODULE['1']['linkurl'];?>about/agreement.html" target="_blank">免责协议</a>]</span> <span class="red none">请同意免责协议</span></p>
<p class="sub"><input value="立即报名" type="submit"></p>
</div>
</div>
</div>
<!-- 提交成功-->
<div class="success_wrap none"><img src="<?php echo AJ_SKIN;?>images/xinfang/success.png" width="44" height="44">
<p><span class="success">您已成功报名，资料已提交审核！</span><span class="waiting">审核通过后，工作人员将与您联系，请耐心等待。</span></p>
</div>
<!-- 提交成功-->
</form>
</div>
</div>
<script>
//获取点评、问答、团购、访问数据
seajs.use(["required"],function(getData){
         
             
var $menu = $("#house_nav");
//团购
var $gb_form=$menu.find("form").required(function(){
if(!/^[\u4e00-\u9fa5]{1,4}$/.test($("#dt_gb_name").val())){
alertM("请输入最多四个中文字",{cName:"error"})
return false;
}
if(!/^1[3458]\d{9}$|^0\d{2,3}\d{7,8}?$/.test($("#dt_gb_mobile").val())){
alertM("电话格式错误",{cName:"error"})
return false;
}
//alertM("正在提交…请稍候",{cName:"load",time:"y"})
$.ajax({
url:$gb_form.attr("action"),
type:"post",
dataType:"json",
data:$gb_form.serialize()
}).done(function(data){
$("#ptf_zhanshi").addClass("none");
$(".success_wrap").removeClass("none");
}).fail(function() {
alertM("提交失败，请检查网络连接是否已断开",{cName:"error"})
});
return false;
}),

$gb_a=$(".dt_gb_sa").on("click",function(){
if($gb_a.is(".on")){
$gb_a.removeClass("on");

$gb_form.slideUp();
}else{
$gb_a.addClass("on");
$gb_form.slideDown();
}
})
});
</script>
</div>
<!--scrollTop star-->
<script>
seajs.use(["alert","superm"], function(alertM,sm) {
var $menu = $("#house_nav"),
$w = $(window),
hBoolean = 1,
mh = $menu.offset().top;
if ((!-[1, ] && !window.XMLHttpRequest) || "ontouchend" in document) {
$w.on("scroll", function() {
if ($w.scrollTop() > mh) {
hBoolean = 0;
$menu[0].style.top = $w.scrollTop() - mh + "px";
} else if ($w.scrollTop() < mh && !hBoolean) {
hBoolean = 1;
$menu[0].style.top = 0;
}
})
} else {
$w.on("scroll", function() {
if ($w.scrollTop() > mh && hBoolean) {
hBoolean = 0;
$menu[0].style.position = "fixed";
} else if ($w.scrollTop() < mh && !hBoolean) {
hBoolean = 1;
$menu[0].style.position = "static";
}
})
}
})
</script>