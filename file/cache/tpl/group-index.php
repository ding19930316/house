<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo AJ_CHARSET;?>"/>
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
<meta name="generator" content="www.aijiacms.com"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo AJ_PATH;?>favicon.ico"/>
<link href="<?php echo AJ_SKIN;?>common.css" rel="stylesheet">
<link href="<?php echo AJ_SKIN;?>tuan.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/page.js"></script>
<?php if($lazy) { ?><script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.lazyload.js"></script><?php } ?>
</head>
<body>
<!-- 顶部 -->
<div class="head_continer">
    <div class="head">
<div class="head_top">
<div class="guanli"><a href="<?php echo $MODULE['1']['linkurl'];?>" target="_blank" >首页</a><img src="<?php echo AJ_SKIN;?>images/tuan/jiange.gif"><a href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank" >新楼盘</a><img src="<?php echo AJ_SKIN;?>images/tuan/jiange.gif"><a href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank">二手房</a><img src="<?php echo AJ_SKIN;?>images/tuan/jiange.gif"><a href="<?php echo $MODULE['7']['linkurl'];?>" target="_blank" >租房</a><img src="<?php echo AJ_SKIN;?>images/tuan/jiange.gif"><a href="<?php echo $MODULE['8']['linkurl'];?>" target="_blank" >资讯</a><img src="<?php echo AJ_SKIN;?>images/tuan/jiange.gif"><a href="<?php echo $MODULE['18']['linkurl'];?>" target="_blank" >小区</a></div>
</div>
<div class="logo_bg">
     <ul>
  <li><a href="<?php echo $MODULE['1']['linkurl'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo AJ_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($AJ['logo']) { ?><?php echo $AJ['logo'];?><?php } else { ?><?php echo AJ_SKIN;?>image/logo.gif<?php } ?>
" alt="<?php echo $AJ['sitename'];?>"/></a></li>
  <li class="kouhao"><img src="<?php echo AJ_SKIN;?>images/tuan/kouhao.gif"></li>
  <li class="tel"><?php echo $AJ['telephone'];?></li>
</ul>
</div>
<div class="clear"></div>
</div>
<div class="nav_continer">
     <div class="nav">
                
             
   <a href="<?php echo $MODULE['15']['linkurl'];?>" class="focus">淘房团</a>
  <span><img src="<?php echo AJ_SKIN;?>images/tuan/nav_jg.gif"></span>
  <?php $maincat = get_maincatmenu(0,15)?>
  <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
  <a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>" class="<?php if($v['catid']==$catid) { ?>focus<?php } else { ?>f<?php } ?>
"><?php echo $v['catname'];?></a>
  <span><img src="<?php echo AJ_SKIN;?>images/tuan/nav_jg.gif"></span><?php } } ?>
 </div>
</div><!-- 顶部 -->
 <div class="col">
    <div class="col_left">
 <?php echo tag("moduleid=$moduleid&condition=status=3&catid=$catid&areaid=$cityid&pagesize=".$MOD['pagesize']."&page=$page&showpage=1&width=250&height=180&cols=3&datetype=5&order=".$MOD['order']."&fields=".$MOD['fields']."&target=_blank&template=list-group");?>
    
</div>
    
<div class="col_right">
<div class="box">
 <h3>最新楼盘动态</h3>
  <ul class="ad">
   <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&length=40&pagesize=1&order=addtime desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" class="leftImg" height="68" width="82"></a></li>
  <li class="f"><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li> <?php } } ?>
 </ul>
<div class="clear"></div>
 <ul class="tejia">
                  <ul class="news_list f12">
           <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&length=32&pagesize=3&order=addtime desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<LI><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></LI>
  <?php } } ?>
         </ul>
</div>
     <div class="kefu">
    <ul>
<li class="tel"><?php echo $AJ['telephone'];?></li>
<li class="time">周一至周五：9:00-18:00</li>
</ul>

</div>
      <a href="#"><img src="<?php echo AJ_SKIN;?>images/tuan/guanggao_01.gif"></a>
</div>
   <div class="clear"></div>
    <div id="process"><a name="buttom"></a>
    <div class="clearfix">
    <dl class="zcdl">
      <dt>注册登录</dt>
      <dd class="fgx"></dd>
      <dd>只要您是<?php echo $AJ['sitename'];?>浏览用户，即可免费参加“淘房团”活动，享有团购资格。</dd></dl><span class="next"></span>
    <dl class="zxtf">
      <dt>在线报名</dt>
      <dd class="fgx"></dd>
      <dd>登陆团购页面，了解楼盘及活动详情，留下个人真实姓名及联系信息，即报名成功。</dd></dl><span class="next"></span>
    <dl class="zckf">
      <dt>专场看房</dt>
      <dd class="fgx"></dd>
      <dd>跟随<?php echo $AJ['sitename'];?>看房团前往活动楼盘现场，了解项目详情，明确团房意向。</dd></dl><span class="next"></span>
    <dl class="xxxf">
      <dt>自由选房</dt>
      <dd class="fgx"></dd>
      <dd>在规定的团购活动时间内，按照团购优惠办法，与开发商签订认购协议或购房合同。</dd></dl><span class="next"></span>
    <dl class="rgqy">
      <dt>团购成功</dt>
      <dd class="fgx"></dd>
      <dd>成功团购后，根据不同团购规则，您还有可能获得诸如“置业礼包”等其他额外惊喜！</dd></dl></div>
    </div>
</div>
<!-- 底部 --><!-- 底部链接 -->
<div class="footer">
<p><a href="<?php echo $MODULE['1']['linkurl'];?>">网站首页</a><?php echo tag("table=webpage&condition=item=1&areaid=$cityid&order=listorder desc,itemid desc&template=list-webpage");?></p>
<p><div id="copyright"><?php echo $AJ['copyright'];?></div></p>
<?php if($AJ['icpno']) { ?>  <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $AJ['icpno'];?></a><?php } ?>
</div>

<script type="text/javascript">
<?php if($aijiacms_task) { ?>
show_task('<?php echo $aijiacms_task;?>');
<?php } else { ?>
<?php include AJ_ROOT.'/api/task.inc.php';?>
<?php } ?>
<?php if($lazy) { ?>$(function(){$("img").lazyload();});<?php } ?>
$('#back2top').click(function() {
$("html, body").animate({scrollTop:0}, 200);
});
</script>
</div></body></html>