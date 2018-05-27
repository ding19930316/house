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
   <div class="lianjia-header" mod-id="lj-home-header">
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
<!-- <div class="nav_area last"><a href="<?php echo $MODULE['1']['linkurl'];?>map"><?php echo $city_name;?>地图找房</a></div>--></div></li><li class="kefu">客服热线  <?php echo $AJ['telephone'];?></li></ul><div class="login-panel typeUserInfo"><div class="typeShowUser"><span class="welcome">您好，欢迎来到<?php echo $AJ['sitename'];?>！请<a href="<?php echo $MODULE['1']['linkurl'];?>member/register.php"><span class="log">注册</span></a> 或 <a href="<?php echo $MODULE['1']['linkurl'];?>member/login.php" class="btn-login bounceIn actLoginBtn"><span class="reg">登录</span></a></span></div></div>
</div></div>
<div class="heroImage" id="heroImage" style="background-image:url(<?php echo $MODULE['1']['linkurl'];?>11/img/home-bg1.jpg)" data-stellar-background-ratio="0.07"></div>
<header class="lianjia-header nav-nobg" mod-id="lj-common-header"><div class="nav-wrap"><a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>">
<div class="home-banner"><img src="<?php echo $MODULE['1']['linkurl'];?>11/16-28-45-48-1.png" alt="<?php echo $AJ['sitename'];?>"></div></a>
<ul class="nav-lst">
<li><a class="on" href="<?php echo $MODULE['1']['linkurl'];?>">首页</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>sale/">二手房</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>house/">新房</a></li>
<li><a rel="nofollow" class="" href="<?php echo $MODULE['1']['linkurl'];?>rent/" target="_blank">租房</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>company/list.php">经纪人</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>community/">小区</a></li>
<li><a class="" href="<?php echo $MODULE['1']['linkurl'];?>news/" target="_blank">资讯</a></li></ul></div></header>
<!-- 主搜模块、查成交价模块 --><div class="main-wrap" mod-id="lj-home-search"><h2 class="banner home-ico ico-banner"></h2>
<div class="search-box-wrap"><div class="search-box-bg"></div><div class="search-box-con"><div class="search-box clear" id="homeSearchMain"><form class="clear" action="<?php echo $MODULE['1']['linkurl'];?>sale/search.php"><input class="txt" name="kw" placeholder="请输入城区、商圈或小区名开始找房..." autocomplete="off" id=""><input class="btn home-ico ico-search" type="submit" value="搜索"></form><div id="suggest-cont" class="suggest-wrap"></div></div><div class="hot-rec clear"><div class="left rec lazyStaticData">
                     
                      </div><div class="right map-search"> </div></div><div class="ie-bg"></div><div class="palm_lianjia"><div class="palm_text"></div><div class="palm_phone"><a href="<?php echo $EXT['mobile_url'];?>mobile.php" target="_blank"></a></div></div><div class="zhenfangyuan"><i></i><a href="<?php echo $MODULE['1']['linkurl'];?>"><?php echo $AJ['sitename'];?> 了解更多</a></div></div></div>
  <h3 class="sub-title">
专做客户做不了、划不来、不愿做的事
</h3>
  <div class="wrapper"><div class="notice-bar"><i class="i left"></i><!--<span class="label left"><a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>">最新成交</a></span>--><div class="list-wrap left"><ul id="slide-news"></ul></div></div></div></div>
  <section class="list-banner" mod-id="lj-home-nav-3-content">
  <div class="wrapper">
  <ul class="clear">
  <li class="banner-1">
  <h3>找二手房</h3>
  <a class="coner" target="_blank" href="<?php echo $MODULE['5']['linkurl'];?>">
  <div class="foot-ico foot-ico-1"></div><div class="ico-fix ico-fix-1"></div></a>
  <p class="p-1">100%真房源，每日上新</p><p class="p-2"><a target="_blank" href="<?php echo $MODULE['5']['linkurl'];?>">二手房</a></p></li>
  <li class="banner-2"><h3>租学区房</h3><a class="coner" target="_blank" href="<?php echo $MODULE['7']['linkurl'];?>"><div class="foot-ico foot-ico-2"></div><div class="ico-fix ico-fix-2"></div></a><p class="p-1">带孩子跨入希望的起跑线，直通重点</p><p class="p-2"><a target="_blank" href="<?php echo $MODULE['7']['linkurl'];?>">去找房</a></p></li>
  
  <li class="banner-3"><h3>找新房</h3><a class="coner" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>house/"><div class="foot-ico foot-ico-3"></div><div class="ico-fix ico-fix-3"></div></a><p class="p-1">提供最新房房源信息</p><p class="p-2"><a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>house/">找新房</a></p></li>
  
  
  </ul></div></section>
<section class="guess" mod-id="lj-home-guesslike"><div class="wrapper"><h2>二手房   <span  style="float:right; font-size:14px;"><a target='_blank' href='/sale'>更多</a></span></h2><ul class="guess-con clear">
        <?php $tags=tag("moduleid=5&condition=status=3 and thumb<>''&areaid=$cityid&length=22&pagesize=10&order=addtime desc&target=_blank&template=null");?> 
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>        
 <li >  <a target="_blank" href="<?php echo $t['linkurl'];?>">
        <img class="g-img lj-lazy" src="<?php echo imgurl($t['thumb']);?>">
        <p class="description"><?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } else { ?>待定<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
<span style="color:#FF0000"> <?php echo $t['housename'];?></span></p>
        </a>
    <p class="ddl">
    <span class="price left"><?php if($t['price']) { ?><?php echo $t['price'];?>万<?php } else { ?>面议<?php } ?>
</span><span class="p-del right">第<?php echo $t['floor1'];?>层/总<?php echo $t['floor2'];?>层</span></p>
    </li >    
     <?php } } ?>
 </ul></div></section>
<section class="s-truth"><div class="wrapper">
<img src="/images/ad_d.jpg" width="1000" height="79" alt=""></div></section>
<section class="guess" mod-id="lj-home-guesslike">
<div class="wrapper">
<h2>租房 <span  style="float:right; font-size:14px;"><a target='_blank' href='/rent'>更多</a></span></h2>
<ul class="guess-con clear">
          <?php $tags=tag("moduleid=7&condition=status=3 and thumb<>''&areaid=$cityid&length=22&pagesize=10&order=addtime desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>        
            <li>  <a target="_blank" href="<?php echo $t['linkurl'];?>">
        <img class="g-img lj-lazy" src="<?php echo imgurl($t['thumb']);?>" data-original="<?php echo imgurl($t['thumb']);?>">
        <p class="description"><?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } else { ?>待定<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
 <?php echo $t['housename'];?></p>
        </a>
    <p class="ddl">
    <span class="price left"><?php if($t['price']) { ?><span class="jg"><?php echo $t['price'];?></span>元/月<?php } else { ?><span class="jg">面议</span><?php } ?>
</span><span class="p-del right">第<?php echo $t['floor1'];?>层/总<?php echo $t['floor2'];?>层</span></p>
    </li> 
     <?php } } ?>
     </ul></div></section>
     
<!-- 掌上优房大banner -->
<section class="hand-lianjia" mod-id="lj-home-handlianjia">
<div class="bg-hand">
<div class="wrapper">
<a target="_blank" href="<?php echo $EXT['mobile_url'];?>mobile.php">
<div class="get-btn">
</div>
</a>
</div>
</div>
</section>
<!-- 新房模块  ok  23 znt --><section class="new-house" data-stellar-background-ratio="0.05" mod-id="lj-home-newhouse"><div class="wrapper"><div class="new-head clear"><span class="left title">新房</span><p class="right"><span class="right-con"><a target='_blank' href='/house'>更多</a></span></p></div>
<ul class="content-1 clear">
<?php $tags=tag("moduleid=6&condition=status=3 and isnew=1 and thumb!=''&areaid=$cityid&length=20&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
 <li class="left " > 
<a class="pic" target="_blank" href="<?php echo $t['linkurl'];?>" class="img-crop">
<img class="img" onload="RESIZEIMG(this, '' , '' ,true)" src="<?php echo imgurl($t['thumb']);?>" data-original="<?php echo imgurl($t['thumb']);?>" width="100%"></a><p class="p-1"><a target="_blank" href="<?php echo $t['linkurl'];?>"><span class="t-1"><?php echo $t['title'];?></span></a><i></i><span class="t-2"><?php echo $t['tedian'];?></span><span class="t-p right"><?php if($t['price']) { ?><span class="c-p"><?php echo $t['price'];?></span><span class="t-l">元/平米</span><?php } else { ?>一房一价<?php } ?>
</span></p><p class="p-2"><span class="t-3"><?php echo area_poss($t['areaid'], ' ');?> / <span class="t-4"><?php echo $t['kfs'];?></span></span></p></li> 
<?php } } ?>
<?php $tags=tag("moduleid=6&condition=status=3 and isnew=1 and thumb!=''&areaid=$cityid&length=20&order=addtime desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
 <li class="left last" > 
<a class="pic" target="_blank" href="<?php echo $t['linkurl'];?>" class="img-crop">
<img class="img" onload="RESIZEIMG(this, '' , '' ,true)" src="<?php echo imgurl($t['thumb']);?>" data-original="<?php echo imgurl($t['thumb']);?>" width="100%"></a><p class="p-1"><a target="_blank" href="<?php echo $t['linkurl'];?>"><span class="t-1"><?php echo $t['title'];?></span></a><i></i><span class="t-2"><?php echo $t['tedian'];?></span><span class="t-p right"><?php if($t['price']) { ?><span class="c-p"><?php echo $t['price'];?></span><span class="t-l">元/平米</span><?php } else { ?>一房一价<?php } ?>
</span></p><p class="p-2"><span class="t-3"><?php echo area_poss($t['areaid'], ' ');?> / <span class="t-4"><?php echo $t['kfs'];?></span></span></p></li> 
<?php } } ?> </ul>
<ul class="content-2 clear">
 <?php $tags=tag("moduleid=6&condition=status=3 and thumb!=''&areaid=$cityid&length=20&order=addtime desc&pagesize=4&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
    <li class="left ">
<div class="con">    
<a target="_blank" href="<?php echo $t['linkurl'];?>" class="img-crop"><img class="img lj-lazy"  src="<?php echo imgurl($t['thumb']);?>" style="left: -71px; height: 100%; "></a><p><a target="_blank" href="<?php echo $t['linkurl'];?>">
<span class="info"><?php echo $t['title'];?></span></a>
<span class="info"><?php if($t['price']) { ?><?php echo $t['price'];?>元/平米<?php } else { ?>一房一价<?php } ?>
元/平米</span>
<span class="info"><?php echo $t['tedian'];?></span></p>
<div class="des"><i></i>
<span title="<?php echo $t['tedian'];?>"><?php echo $t['tedian'];?></span></div></div>
<p class="location">
<i></i>
<span title="$t[sell_address]}"></span></p>
</li>
 <?php } } ?>
 </ul></div></section>
 
 
<section class="s-truth" mod-id="lj-home-searchtruth"><div class="bg-truth"><div class="wrapper"><div class="form clear"><div class="sear-result clear"></div>
<!--<form target="_blank" action="<?php echo $MODULE['1']['linkurl'];?>" method="post"><input type="text" class="sear-con left" name="k" value="" placeholder="请输入出售房源编号查询真伪..." autocomplete="off" id="truth"><input type="submit" class="home-tr left" value=""></form>--></div></div></div></section><!-- 房源编号查询模块  -->
<section class="rent"><div class="wrapper"><div class="news-con" mod-id="lj-home-consult"><h1>房产资讯</h1><ul class="clear"><li class="bb focus" id="homeFocus"><p class="pp">大家都在关注的话题</p><p class="label lazyStaticData">            
                <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>news/" title="二手房交易税"><span class="fangchan-1">二手房交易税</span></a>
              
                <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>news/" title="房产税"><span class="fangchan-2">房产税</span></a>
              
                <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>news/" title="住房公积金"><span class="fangchan-3">住房公积金</span></a>
              
                <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>news/" title="二手房交易流程"><span class="fangchan-4">二手房交易流程</span></a>
              
                <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>news/" title="二手房贷款"><span class="fangchan-5">二手房贷款</span></a>
              
                <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>news/" title="过户"><span class="fangchan-6">过户</span></a>
              
              </p><p class="introextra lazyStaticData">   
                   
                    <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&length=42&pagesize=8&order=addtime desc&target=_blank&template=null");?>
  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
 <span><i><?php if($t['houseid']) { ?> <a target="_blank" title="<?php echo $t['housename'];?>" href="<?php echo $MODULE['6']['linkurl'];?><?php echo $t['houseid'];?>" >[<?php echo $t['housename'];?>]</a><?php } ?>
</i><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></span>
                <br>
               <?php } } ?>
 </p></li><li class="bb house-news"><p class="pp clear"><span class="t-zixun left">最新房产资讯</span><span class="t-more right"><a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>news/">更多资讯</a></span></p><div class="lab-list"></div><ul class="content">
  <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&length=42&pagesize=8&order=addtime desc&target=_blank&template=null");?>
  <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
     <li class="ddl "><span class="det"><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></span><span class="time right"><?php echo date(‘Y-m-d’, $t['addtime']);?></span></li><?php } } ?>
   
   </ul></li><li class="ad bb last"><p class="pp">安心服务承诺</p><a target="_blank" href="/"><img class="lj-lazy" src="/images/ad_bottom.png" data-original="/images/ad_bottom.png" alt=""></a></li></ul></div>
</div></section><!-- SEO信息模块 --><section class="trust-dd"><div class="wrapper bbg"></div></section>
<div class="lianjia-link-box" mod-id="lj-common-linkbox">
<div class="wrapper">
<dl class="dl-lst clear"><dt>热门区域二手房</dt><dd>    <?php $mainarea = get_mainarea($cityid)?>
    <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><a  href="<?php echo $MODULE['5']['linkurl'];?>list-r<?php echo $v['areaid'];?>.html"><?php echo $v['areaname'];?>二手房</a><?php } } ?></dd></dl>
<dl class="dl-lst clear"><dt>热门区域新房</dt><dd>      <?php $mainarea = get_mainarea($cityid)?>
    <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><a  href="<?php echo $MODULE['6']['linkurl'];?>list-r<?php echo $v['areaid'];?>.html"><?php echo $v['areaname'];?>楼盘</a><?php } } ?>
                            </dd></dl>
<dl class="dl-lst clear"><dt>热门区域租房</dt><dd>     <?php $mainarea = get_mainarea($cityid)?>
    <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><a  href="<?php echo $MODULE['7']['linkurl'];?>list-r<?php echo $v['areaid'];?>.html"><?php echo $v['areaname'];?>租房</a><?php } } ?></dd></dl>
<dl class="dl-lst clear"><dt>合作及友情链接 <?php echo $AJ['QQ'];?></dt><dd>    <?php $tags=tag("table=link&condition=status=3 and thumb='' and username=''&areaid=$cityid&pagesize=".$AJ['page_text']."&order=listorder desc,itemid desc&template=null");?>
  <?php if(is_array($tags)) { foreach($tags as $t) { ?> 
         <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a>
 <?php } } ?>
 </dd></dl></div></div>
<div class="lianjia-footer" mod-id="lj-common-footer"><div class="wrapper"><div class="foot-content left">
<div class="link">
 <a target="_blank" href="/">网站首页</a>
                        <span class="stp">|</span><a href="<?php echo $MODULE['1']['linkurl'];?>about/index.html" target="_blank">关于我们</a>
                                         <!--     <span class="stp">|</span><a href="<?php echo $MODULE['1']['linkurl'];?>about/mianze.html" target="_blank">免责声明</a>
                                              <span class="stp">|</span><a href="<?php echo $MODULE['1']['linkurl'];?>about/recruitment.html" target="_blank">加入我们</a>-->
                                              <span class="stp">|</span><a href="<?php echo $MODULE['1']['linkurl'];?>about/agreement.html" target="_blank">使用协议</a>
                                              <span class="stp">|</span><a href="<?php echo $MODULE['1']['linkurl'];?>about/copyright.html" target="_blank">版权隐私</a>
                                              <span class="stp">|</span><a href="<?php echo $MODULE['1']['linkurl'];?>about/contact.html" target="_blank">联系方式</a>
                      <!--<span class="stp">|</span> <a href="<?php echo $MODULE['1']['linkurl'];?>sitemap/">网站地图</a>-->
<label></label></div>
<!--<div class="link link-z">
<a href="<?php echo $MODULE['1']['linkurl'];?>house/" target="_blank">楼盘</a>  <span class="stp">|</span> <?php $l = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');?>
<?php if(is_array($l)) { foreach($l as $k => $v) { ?>
<a <?php if($letter==$v) { ?>class="on"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'e');?>-e<?php echo $v;?>.html"><?php echo $v;?></a><span class="stp">|</span><?php } } ?>
</div>-->
<div style="color:#999; padding-bottom:10px;">客服热线：0554-6616188（工作时间：周一至周五8：00至18：00）</div>
<div class="copy"> <?php echo $AJ['icpno'];?></div><div class="compny"><?php echo $AJ['copyright'];?></div></div></div></div>
<div class="go_top" id="gotop" style="display: none; "></div>
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
 
</body></html>