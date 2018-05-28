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
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"> -->
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.9.1.js"></script> -->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
<link href="css/style.css" rel="stylesheet" />
<style>
  .ui-tabs .ui-tabs-nav li {
    width:24%;
  }
  #tabs li{
    text-align：center;
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
  <div class="search-box clear" id="homeSearchMain"><form class="clear" action="<?php echo $MODULE['1']['linkurl'];?>sale/search.php"><input class="txt" name="kw" placeholder="中文名称/地名/楼盘名/开发商" autocomplete="off" id=""><input class="btn home-ico ico-search" type="submit" value="搜索"></form>
    <div id="suggest-cont" class="suggest-wrap"></div>
    <div class="city_list">
      <span>宜兴市</span>
      <span>崇安区</span>
      <span>南长区</span>
      <span>北塘区</span>
      <span>滨湖区</span>
      <span>锡山区</span>
      <span>惠山区</span>
      <span>新区</span>
      <span>江阴</span>
      <span>宜兴</span>
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
  <h3>中介注册</h3>
  <a class="coner" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>member/register.php?regtype=1">
  <div class="foot-ico foot-ico-1"></div><div class="ico-fix ico-fix-1"></div></a>
</li>、
  <li class="banner-2"><h3>经纪人注册</h3><a class="coner" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>member/register.php?regtype=2"><div class="foot-ico foot-ico-2"></div><div class="ico-fix ico-fix-2"></div></a></li>
  <li class="banner-3"><h3>个人注册</h3><a class="coner" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>member/register.php?regtype=3"><div class="foot-ico foot-ico-3"></div><div class="ico-fix ico-fix-3"></div></a></li>
  </ul></div></section>
        <?php $tags=tag("moduleid=5&condition=status=3 and thumb<>''&areaid=$cityid&length=22&pagesize=10&order=addtime desc&target=_blank&template=null");?>
<section class="rent"><div class="wrapper">
  <div class="tabox">
        <div class="hd">
          <ul>
            <li class=" ">疯狂抢购</li>
            <li class=" ">猜您喜欢</li>
            <li class=" ">热卖商品</li>
            <li class=" ">热评商品</li>
            <li class="on">新品上架</li></ul>
        </div>
        <div class="bd">
          <ul class="lh" style="display: none;">
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/1.1.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">艾家纺全棉加厚磨毛四件套</a></div>
              <div class="p-price">京东价：
                <strong>￥399.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/1.2.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">优曼真丝提花奢华四件套</a></div>
              <div class="p-price">京东价：
                <strong>￥1299.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/1.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">3999！大金1.5匹变频空调更安静！</a></div>
              <div class="p-price">京东价：
                <strong>￥3999.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/1.4.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">爸爸爱喜禾（犬子在，不远游！感动无数读者的电子书</a></div>
              <div class="p-price">京东价：
                <strong>￥1.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/1.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">【超值】飞利浦21.5英寸LED背光宽屏液晶显示</a></div>
              <div class="p-price">京东价：
                <strong>￥809.00</strong></div>
            </li>
          </ul>
          <ul class="lh" style="display: none;">
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.1.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">安钛克（Antec）VP 550P 额定550W 120mm静音风扇 主动PFC 黑化外型设计电源</a></div>
              <div class="p-price">京东价：
                <strong>￥399.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.2.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">G.SKILL（芝奇）RipjawsX DDR3 1600 8G(4G×2条)台式机内存(F3-12800CL9D-8GBXL )</a></div>
              <div class="p-price">京东价：
                <strong>￥235.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">希捷（Seagate）1TB ST1000DM003 7200转64M SATA 6Gb/秒 台式机硬盘 建达蓝德 盒装正品</a></div>
              <div class="p-price">京东价：
                <strong>￥438.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.4.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">华硕(ASUS)P8Z77-V LK主板(Intel Z77/LGA 1155)</a></div>
              <div class="p-price">京东价：
                <strong>￥899.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">大水牛（BUBALUS）电脑机箱 经典-A1008 灰黑色（不含电源）</a></div>
              <div class="p-price">京东价：
                <strong>￥112.00</strong></div>
            </li>
          </ul>
          <ul class="lh" style="display: none;">
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/3.1.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">冬季健身TOP1！瑞亚特仰卧板加送俯卧撑架</a></div>
              <div class="p-price">京东价：
                <strong>￥187.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/3.2.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">HTC Z715e!双核！魔音耳机！</a></div>
              <div class="p-price">京东价：
                <strong>￥2399.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/3.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">下单返现150元！格力9片电油汀</a></div>
              <div class="p-price">京东价：
                <strong>￥449.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/3.4.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">绿之源净味宝2居室除味超值套装 4000克</a></div>
              <div class="p-price">京东价：
                <strong>￥449.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/3.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">宏碁i5 4G GT630M 1G独显 月销量破</a></div>
              <div class="p-price">京东价：
                <strong>￥3599.00</strong></div>
            </li>
          </ul>
          <ul class="lh" style="display: none;">
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">希捷（Seagate）1TB ST1000DM003 7200转64M SATA 6Gb/秒 台式机硬盘 建达蓝德 盒装正品</a></div>
              <div class="p-price">京东价：
                <strong>￥438.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">希捷（Seagate）1TB ST1000DM003 7200转64M SATA 6Gb/秒 台式机硬盘 建达蓝德 盒装正品</a></div>
              <div class="p-price">京东价：
                <strong>￥438.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">希捷（Seagate）1TB ST1000DM003 7200转64M SATA 6Gb/秒 台式机硬盘 建达蓝德 盒装正品</a></div>
              <div class="p-price">京东价：
                <strong>￥438.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">希捷（Seagate）1TB ST1000DM003 7200转64M SATA 6Gb/秒 台式机硬盘 建达蓝德 盒装正品</a></div>
              <div class="p-price">京东价：
                <strong>￥438.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.3.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">希捷（Seagate）1TB ST1000DM003 7200转64M SATA 6Gb/秒 台式机硬盘 建达蓝德 盒装正品</a></div>
              <div class="p-price">京东价：
                <strong>￥438.00</strong></div>
            </li>
          </ul>
          <ul class="lh" style="display: block;">
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">大水牛（BUBALUS）电脑机箱 经典-A1008 灰黑色（不含电源）</a></div>
              <div class="p-price">京东价：
                <strong>￥112.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">大水牛（BUBALUS）电脑机箱 经典-A1008 灰黑色（不含电源）</a></div>
              <div class="p-price">京东价：
                <strong>￥112.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">大水牛（BUBALUS）电脑机箱 经典-A1008 灰黑色（不含电源）</a></div>
              <div class="p-price">京东价：
                <strong>￥112.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">大水牛（BUBALUS）电脑机箱 经典-A1008 灰黑色（不含电源）</a></div>
              <div class="p-price">京东价：
                <strong>￥112.00</strong></div>
            </li>
            <li>
              <div class="p-img ld">
                <a href="#">
                  <img src="images/2.5.jpg"></a>
              </div>
              <div class="p-name">
                <a href="#">大水牛（BUBALUS）电脑机箱 经典-A1008 灰黑色（不含电源）</a></div>
              <div class="p-price">京东价：
                <strong>￥112.00</strong></div>
            </li>
          </ul>
        </div>
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
 $(".city_list").find("span").click(function(){
   $("input[name='kw']").val($(this).text());
 });
</script>
<script type="text/javascript" src="js/jquery.SuperSlide.js"></script>
<script type="text/javascript">
$(".tabox").slide({delayTime: 0});
</script>
</body></html>
