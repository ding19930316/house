<?php defined('IN_AIJIACMS') or exit('Access Denied');?>﻿<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta http-equiv="Cache-Control" content="no-transform" /><meta http-equiv="Cache-Control" content="no-siteapp" />
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $AJ['seo_delimiter'];?><?php } ?>
<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $AJ['sitename'];?><?php } ?>
<?php } ?>
</title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
<?php if($EXT['archiver_enable']) { ?>
<link rel="archives" title="<?php echo $AJ['sitename'];?>" href="<?php echo $EXT['archiver_url'];?>"/>
<?php } ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo AJ_STATIC;?>favicon.ico"/>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<link rel="stylesheet" href="/css/common.css">
<link rel="stylesheet" href="/css/home.css"><!--
<link href="<?php echo AJ_SKIN;?>reset.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" src="/js/html5.js"></script>
<script type="text/javascript" src="/js/page.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<!--大话插件加载-->
<script type="text/javascript" src="static/dahua/jquery.SuperSlide.2.1.1.js"></script>
<!--大话插件加载end-->
<style media="screen">
  .shadow{
    text-shadow: 0 1px 8px rgba(0,0,0,0.8);
  }
</style>
<script type="text/javascript">
<?php if($head_mobile && $EXT['mobile_goto']) { ?>
GoMobile('<?php echo $head_mobile;?>');
<?php } ?>
<?php $searchid = ($moduleid > 3 && $MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) ?$moduleid : 6;?>
 var apptype = "<?php echo $MODULE[$searchid]['moduledir'];?>";
</script>
</head><body>
<div class="top-fixed" id="top-fixed" mod-id="lj-home-fixtop"><div class="top-fixed-bg"></div><div class="top-fixew-width"><a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><div class="home-banner"></div></a>
<div class="search" id="homeSearchEle">
<form class="clear" action="<?php echo $MODULE['4']['linkurl'];?>search.php?kw="><input class="txt left" name="kw" placeholder="请输入城区、商圈或小区名开始找房..." autocomplete="off" id="keyword-box-01"><input class="btn home-ico ico-search left" type="submit" value="搜索"></form><div id="suggest-cont-01" class="suggest-wrap"></div></div><div class="fr typeUserInfo"><script type="text/template" class="template">
                            <a href="<?php echo $MODULE['1']['linkurl'];?>member/register.php"><span class="log">注册</span></a>
              <a href="<?php echo $MODULE['1']['linkurl'];?>member/login.php" class="btn-login bounceIn"><span class="reg">登录</span></a>
                    </script><div class="typeShowUser"><a href="<?php echo $MODULE['1']['linkurl'];?>member/register.php"><span class="log">注册</span></a>
              <a href="<?php echo $MODULE['1']['linkurl'];?>member/login.php" class="btn-login bounceIn"><span class="reg">登录</span></a></div></div></div></div>
   <!-- <div class="lianjia-header" mod-id="lj-home-header">
  <div class="nav-wrap">
  <div class="hhd left">
  <span class="city" id="aijiacms_city"></span>
  <span class="exchange"><div class="city-sel">
  </div>
  </span>
  </div>
  <ul class="nav-lst nav-lst-q">
  <li><a class="a" href="<?php echo $MODULE['3']['linkurl'];?>shortcut.php" title="保存桌面">保存桌面</a></li>
  <li><a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>about">了解我们</a></li>
  <li class="nav_f"><a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>sitemap">网站导航</a>
  <div class="sitemap-quick"><p>二手房</p><dd><a href="<?php echo $MODULE['1']['linkurl'];?>sale/">区域找房</a></dd><div class="nav_area">
        <?php $mainarea = get_mainarea($cityid)?>
    <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><a  href="<?php echo $MODULE['5']['linkurl'];?>list-r<?php echo $v['areaid'];?>.html"><?php echo $v['areaname'];?></a><?php } } ?>
                             <a href="<?php echo $MODULE['1']['linkurl'];?>sale/list.php" class="more">更多</a>
  </div><p>租房</p><div class="nav_area">       <?php $mainarea = get_mainarea($cityid)?>
    <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><a  href="<?php echo $MODULE['7']['linkurl'];?>list-r<?php echo $v['areaid'];?>.html"><?php echo $v['areaname'];?></a><?php } } ?><a href="<?php echo $MODULE['1']['linkurl'];?>rent/list.php" class="more">更多</a></div>
<div class="nav_area last"><a href="<?php echo $MODULE['1']['linkurl'];?>map"><?php echo $city_name;?>地图找房</a></div></div></li><li class="kefu">客服热线  <?php echo $AJ['telephone'];?></li></ul><div class="login-panel typeUserInfo"><div class="typeShowUser"><span class="welcome">您好，欢迎来到<?php echo $AJ['sitename'];?>！请<a href="<?php echo $MODULE['1']['linkurl'];?>member/register.php"><span class="log">注册</span></a> 或 <a href="<?php echo $MODULE['1']['linkurl'];?>member/login.php" class="btn-login bounceIn actLoginBtn"><span class="reg">登录</span></a></span></div></div>
</div></div> -->
<div class="heroImage" id="heroImage" style="background-image:url(<?php echo $MODULE['1']['linkurl'];?>11/img/home-bg1.jpg)" data-stellar-background-ratio="0.07"></div>
<!-- <header class="lianjia-header nav-nobg" mod-id="lj-common-header"><div class="nav-wrap"><a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>">
<div class="home-banner"><img src="<?php echo $MODULE['1']['linkurl'];?>11/16-28-45-48-1.png" alt="<?php echo $AJ['sitename'];?>"></div></a>
<ul class="nav-lst">
<li><a class="on" href="<?php echo $MODULE['1']['linkurl'];?>">首页</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>sale/">二手房</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>house/">新房</a></li>
<li><a rel="nofollow" class="" href="<?php echo $MODULE['1']['linkurl'];?>rent/" target="_blank">租房</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>company/list.php">经纪人</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>community/">小区</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>news/" target="_blank">资讯</a></li></ul></div></header> -->
<!-- 主搜模块、查成交价模块 -->
<div class="main-wrap" mod-id="lj-home-search"><h2 class="banner home-ico ico-banner"></h2>
<div class="search-box-wrap">
  <div class="search-box-bg"></div>
<div class="search-box-con">
  <div class="search-box clear" id="homeSearchMain"><form class="clear" action="<?php echo $MODULE['1']['linkurl'];?>company/list.html" method = "post"><input class="txt" name="keyword" placeholder="中文名称/地名/楼盘名/开发商" autocomplete="off" id=""><input class="btn home-ico ico-search" type="submit" value="搜索"></form>
    <div id="suggest-cont" class="suggest-wrap"></div>
    <div class="city_list">
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r6.html">崇安区</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r9.html">南长区</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r10.html">北塘区</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r11.html">滨湖区</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r12.html">锡山区</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r13.html">惠山区</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r14.html">新区</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r15.html">江阴</a></span><span>|</span>
      <span><a href="<?php echo $MODULE['1']['linkurl'];?>company/list-r16.html">宜兴</a></span>
    </div>
  </div>
<div class="hot-rec clear"><div class="left rec lazyStaticData">
</div>
<!-- <div class="right map-search"> </div> -->
</div><div class="ie-bg"></div>
<div class="palm_lianjia">
  <div class="palm_text"></div>
  <div class="palm_phone"><a href="<?php echo $EXT['mobile_url'];?>mobile.php" target="_blank"></a></div>
</div>
<div class="zhenfangyuan"><i></i><a href="<?php echo $MODULE['1']['linkurl'];?>"><?php echo $AJ['sitename'];?> 了解更多</a></div>
</div>
</div>
  <h3 class="sub-title">
专做客户做不了、划不来、不愿做的事
</h3>
  <div class="wrapper"><div class="notice-bar"><i class="i left"></i><!--<span class="label left"><a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>">最新成交</a></span>--><div class="list-wrap left"><ul id="slide-news"></ul></div></div></div></div>
  <section class="list-banner" mod-id="lj-home-nav-3-content">
  <div class="wrapper">
  <ul class="clear">
  <li class="banner-1">
  <h3 class="shadow">中介注册</h3>
  <a class="coner" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>member/register.php?regtype=1">
  <div class="foot-ico foot-ico-1"></div><div class="ico-fix ico-fix-1"></div></a>
</li>、
  <li class="banner-2"><h3 class="shadow">经纪人注册</h3><a class="coner" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>member/register.php?regtype=2"><div class="foot-ico foot-ico-2"></div><div class="ico-fix ico-fix-2"></div></a></li>
  <li class="banner-3"><h3 class="shadow">个人注册</h3><a class="coner" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>member/register.php?regtype=3"><div class="foot-ico foot-ico-3"></div><div class="ico-fix ico-fix-3"></div></a></li>
  </ul></div></section>
        <?php $tags=tag("moduleid=5&condition=status=3 and thumb<>''&areaid=$cityid&length=22&pagesize=10&order=addtime desc&target=_blank&template=null");?>
<section class="rent" style="border-bottom: 1px solid #d9d9d9;"><div class="wrapper">
  <style type="text/css">
/* css 重置 */
*{margin:0; padding:0; list-style:none; }
body{ background: rgb(245,245,245); font:normal 12px/22px 宋体;  }
img{ border:0;  }
a{ text-decoration:none; color:#333;  }
a:hover{ color:#1974A1;  }
/* 本例子css */
.slideTxtBox{ border:1px solid #ddd; text-align:left; border-radius:5px; }
.slideTxtBox .hd{ height:30px; line-height:30px;  position:relative; }
.slideTxtBox .hd ul{ float:left;  position:absolute; top:-1px;  }
.slideTxtBox .hd ul li{ float:left;     text-align: center;}
.slideTxtBox .hd ul li.on{ background:#fff; border:1px solid #ddd; border-bottom:2px solid #fff; color:#000}
.slideTxtBox .bd ul{ padding:15px;  zoom:1;  }
.slideTxtBox .bd li{ height:24px; line-height:24px;   }
.slideTxtBox .bd li .date{ float:right; color:#999;  }
.hd li{
  float: left;
  width: 300px;
  height: 46px;
  margin-top: 1px;
  font-size: 20px;
  line-height: 46px;
  border-right: 1px solid #e2e2e2;
  text-align: center;
  background: #f1f1f1;
  cursor: pointer;
}
.hd li.on{
  height: 46px;
  border-top: 2px solid #065fb9;
  color: #065fb9;
  background: #FFFFFF;
}
.x4{
  width:220px;
  padding:10px;
  display: inline-block;
}
.x2{
  margin-top: 30px;
  padding:10px;
  display: inline-block;
  width: 22.5%;
  text-align: center;
  background: white;
  box-shadow: 0px 2px 5px #CCC;
  outline: 1px solid #DDD;
}
.x2 img{
  margin:0px auto;
  width: 100%;
  height: 280px;
}
</style>
<h3 class="sub-title" style="color: #333;">
  房源推荐
</h3>
<div class="slideTxtBox">
  <div class="hd">
    <ul>
      <!-- {foreach name=foreach_name key=k item=v from=$tags1}
        <li><?php echo $v['truename'];?></li>
      {/foreach} -->
      <?php if(is_array($members_m)) { foreach($members_m as $k => $t) { ?>
      <li><?php echo $t['company'];?></li>
      <?php } } ?>
    </ul>
  </div>
  <div class="bd">
    <?php if(is_array($members_m)) { foreach($members_m as $k => $t) { ?>
      <div class="height:500px">
        <div class="x2">
          <a href="<?php echo $MODULE['1']['linkurl'];?>index.php?homepage=<?php echo $t['username'];?>">
            <img src="<?php echo $MODULE['1']['linkurl'];?>api/avatar/show.php?username=<?php echo $t['username'];?>&size=large" alt="" href="<?php echo $MODULE['1']['linkurl'];?>index.php?homepage=<?php echo $t['username'];?>">
          </a>
          <div class="" style="text-align:left;white-space:nowrap;padding:5px;">
            <p>所属公司：<a href="<?php echo userurl(get_agent($t['companyid']), '');?>" target="_blank"><?php echo $t['company'];?></a></p>
            <!-- <p class="num_house">房源：<a href="<?php echo userurl($t['username'], '');?>" target="_blank">售(<?php echo get_num('sale_5',$t['username']);?>)</a> <a href="<?php echo userurl($t['username'], '');?>" target="_blank">租(<?php echo get_num('rent_7',$t['username']);?>)</a></p> -->
            <p>电话：<?php echo $t['telephone'];?></p>
          </div>
        </div>
      </div>
    <?php } } ?>
    <!-- {foreach from=$tags key=num item="book"}
      <li class="x4">
        <?php echo $book['title'];?>
      </li>
    {/foreach} -->
      <!-- <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <ul> -->
        <!-- <li class="x4">
          <?php echo $t1['truename'];?>
        </li> -->
        <!-- <li class="x4"><?php echo $k;?></li>
        <?php echo $k;?> -->
        <!-- <?php if(is_array($t1)) { foreach($t1 as $kk => $tt) { ?>
          <li class="x4">
            <?php echo $tt['title'];?>
          </li>
        <?php } } ?> -->
      <!-- </ul>
      <?php } } ?> -->
  </div>
</div>
<script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
</div></section>
<section class="rent"><div class="wrapper">
  <h3 class="sub-title" style="color: #333;">
    其他推荐
  </h3>
  <div class="" style="margin:0 -10px;">
    <?php if(is_array($members_r)) { foreach($members_r as $k => $t) { ?>
      <div class="x2">
        <a href="<?php echo $MODULE['1']['linkurl'];?>index.php?homepage=<?php echo $t['username'];?>">
          <img src="<?php echo $MODULE['1']['linkurl'];?>api/avatar/show.php?username=<?php echo $t['username'];?>&size=large" alt="" href="<?php echo $MODULE['1']['linkurl'];?>index.php?homepage=<?php echo $t['username'];?>">
        </a>
        <div class="" style="text-align:left;white-space:nowrap;padding:5px;">
          <p>所属公司：<a href="<?php echo userurl(get_agent($t['companyid']), '');?>" target="_blank"><?php echo $t['company'];?></a></p>
          <!-- <p class="num_house">房源：<a href="<?php echo userurl($t['username'], '');?>" target="_blank">售(<?php echo get_num('sale_5',$t['username']);?>)</a> <a href="<?php echo userurl($t['username'], '');?>" target="_blank">租(<?php echo get_num('rent_7',$t['username']);?>)</a></p> -->
          <p>电话：<?php echo $t['telephone'];?></p>
        </div>
      </div>
    <?php } } ?>
  </div>
</div></section>
<!-- 代码 开始
<div class="scrollsidebar" id="hhService">
<div class="side_content">
<div class="side_list">
<div class="side_title">
<a title="隐藏" class="close_btn"><span>关闭</span></a></div>
<div class="side_center">
<div class="qqserver" style="margin-bottom:5px;">
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=799188412&site=qq&menu=yes" target="_blank">杨玉美
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=578797487&site=qq&menu=yes" target="_blank">刘宏太
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=2607456620&site=qq&menu=yes" target="_blank">刘凤梅
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=1525975983&site=qq&menu=yes" target="_blank">陈&nbsp;&nbsp; 敏
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=2316212911&site=qq&menu=yes" target="_blank">赵玉梅
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=495044967&site=qq&menu=yes" target="_blank">张继兴
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=1207148969&site=qq&menu=yes" target="_blank">王书香
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=569867430&site=qq&menu=yes" target="_blank">岳祥云
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=543591039&site=qq&menu=yes" target="_blank">王&nbsp;&nbsp; 雪
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=819172792&site=qq&menu=yes" target="_blank">王德兰
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
<p><a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=435893798&site=qq&menu=yes" target="_blank">吴媛媛
<img src="<?php echo AJ_SKIN;?>/images/esf/online.png"></a></p>
</div>
<strong>咨询热线：123456</strong><div class="msgserver">
<p>在线时间:9:00-18:00</p>
</div>
</div>
<div class="side_bottom">
</div>
</div>
</div>
<div class="show_btn"><span>在线客服</span></div>
</div>
<script src="<?php echo AJ_SKIN;?>js/jquery.min.js"></script>
<script src="<?php echo AJ_SKIN;?>js/jquery.hhService.js"></script>
<script>$(function(){$("#hhService").fix({float:'right',minStatue:false,skin:'green',durationTime:1000})});</script>
<!-- 代码 结束 -->
<script>
 // $(".city_list").find("span").click(function(){
 //   $("input[name='kw']").val($(this).text());
 // });
</script>
<script type="text/javascript">
$(".tabox").slide({delayTime: 0});
</script>
</body></html>
