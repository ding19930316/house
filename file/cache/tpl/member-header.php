<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="renderer" content="webkit">
<link href="<?php echo AJ_SKIN;?>favicon.ico" rel="shortcut icon" type="image/x-icon"/>
<link href="<?php echo AJ_SKIN;?>reset.css?v=3" rel="stylesheet" type="text/css" />
<link href="<?php echo AJ_SKIN;?>user_jjr.css?v=3" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="image/style.css"/>
<script src="<?php echo AJ_SKIN;?>js/sea.js?v=3" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo AJ_PATH;?>lang/<?php echo AJ_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo AJ_PATH;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_PATH;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo AJ_PATH;?>file/script/admin.js"></script>
<script type="text/javascript" src="<?php echo AJ_PATH;?>file/script/member.js"></script>
<title><?php if($head_title) { ?><?php echo $head_title;?><?php echo $AJ['seo_delimiter'];?><?php } ?>
会员中心<?php echo $AJ['seo_delimiter'];?><?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $AJ['sitename'];?><?php } ?>
<?php echo $AJ['seo_delimiter'];?></title>
<script>var AGENT_URL="<?php echo $MODULE['6']['linkurl'];?>";var JS_URL="";var IMG_URL="";</script>
</head>
<body>
<div id="header">
<div class="warp">
<h1>
<a href="<?php echo $MODULE['2']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><img src="<?php echo AJ_SKIN;?>images/user_jjr/logo_myagent.gif" alt="<?php echo $AJ['sitename'];?>">
</a><span class="glzx"><?php echo $MG['groupname'];?>管理</span>
</h1>
<div class="fr cf" id="login">
<span class="tel">客服热线：<?php echo $AJ['telephone'];?></span><br>
<div class="panl">
<a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=last" class="r">通知(<?php echo $_message;?>)<i></i></a>
<div style="display: none;">
<a href="<?php echo $MODULE['2']['linkurl'];?>chat.php">新对话(<?php echo $_chat;?>)</a>
<a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=last">短消息(<?php echo $_message;?>)</a>
</div>
</div>
<a href="<?php echo userurl($_username);?>" target="_blank" title="我的店铺">我的店铺</a>
            <a style="color:#f80" href="<?php echo $MODULE['1']['linkurl'];?>fenxiao/" title="赚取佣金" target="_blank">赚取佣金</a>

<a href="<?php echo $MODULE['2']['linkurl'];?>">帐号：<?php echo $_username;?></a>
<a href="<?php echo $MODULE['2']['linkurl'];?>logout.php">[ 退出 ]</a>
<?php if($admin_user) { ?><a href="index.php?action=logout">注销授权</a><?php } ?>
<div class="panl" id="topBarPanl">
<a class="r" href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $AJ['sitename'];?><?php } ?>
">返回首页<i></i></a>
<div style="">
<a href="<?php echo $MODULE['1']['linkurl'];?>" target="_blank">首页</a>
<a href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank" title="新房">新房</a>
<a href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank" title="二手房">二手房</a>
<a href="<?php echo $MODULE['7']['linkurl'];?>" target="_blank" title="租房">租房</a>
<a href="<?php echo $MODULE['8']['linkurl'];?>" target="_blank" title="资讯">资讯</a>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
seajs.use(["topbarlogin",'cookie'],function(){
$("#login div.panl").on("mouseenter",function(){
$(this).addClass("on").find("div").show();
}).on("mouseleave",function(){
$(this).removeClass("on").find("div").hide();
})
})
</script><div id="main">
            <div class="adb">
   
</div>
        <div  class="cf">
<div id="lmenu">
<h2>
<a href="<?php echo $MODULE['2']['linkurl'];?>">管理中心首页</a>
</h2>
<?php if($MYMODS || $show_menu) { ?>
<?php if(is_array($MENUMODS)) { foreach($MENUMODS as $k => $v) { ?>
<h3>
<s></s><b class="l<?php echo $k;?>"><?php echo $MODULE[$v]['name'];?>管理</b>
</h3>
<ul>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>my.php?mid=<?php echo $v;?>&action=add">发布<?php echo $MODULE[$v]['name'];?></a></li>
        <li ><a href="<?php echo $MODULE['2']['linkurl'];?>my.php?mid=<?php echo $v;?>">管理<?php echo $MODULE[$v]['name'];?></a></li>
</ul>
  <?php } } ?>
    <?php } ?>
<?php if($_userid || $show_menu) { ?>

<h3>
<s></s><b class="l5">工具箱</b>
</h3>
<ul>
<?php if($MG['inbox_limit']>-1 || $show_menu) { ?>
<li><a href="<?php echo $MODULE['2']['linkurl'];?>message.php"  >站内信息</a></li>
<?php } ?>
<!--
<?php if($MG['friend_limit']>-1 || $show_menu) { ?>
<li><a href="<?php echo $MODULE['2']['linkurl'];?>friend.php" >我的商友</a></li>
<?php } ?>
-->
<?php if($MG['favorite_limit']>-1 || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>favorite.php" >房源收藏</a></li>
<?php } ?>
<?php if($MG['alert_limit']>-1 || $show_menu) { ?>
<li><a href="<?php echo $MODULE['2']['linkurl'];?>alert.php" >房源提醒</a></li>
<?php } ?>
<?php if($MG['sms'] || $show_menu) { ?>
<?php if($AJ['sms']) { ?><li ><a href="<?php echo $MODULE['2']['linkurl'];?>sms.php" >手机短信</a></li><?php } ?>
<?php } ?>
<?php if($MG['mail'] || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>mail.php" >邮件订阅</a></li>
<?php } ?>
<?php if($MG['spread'] || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>spread.php" >排名推广</a></li>
<?php } ?>
<?php if($MG['ad'] || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>ad.php" >广告预定</a></li>
<?php } ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>trade.php" >我的订单</a></li>
            <li><a href="<?php echo $MODULE['2']['linkurl'];?>charge.php?action=record" >充值记录</a></li>
            <li><a href="<?php echo $MODULE['2']['linkurl'];?>credit.php"><?php echo $AJ['credit_name'];?>管理</a></li>
</ul>
 <?php } ?>
 <?php if($_userid || $show_menu) { ?>
<h3>
<s></s><b class="l6">问题管理</b>
</h3>
<ul>
<li><a href="<?php echo $MODULE['2']['linkurl'];?>wenfang.php">问题受理</a></li>
   <li><a href="<?php echo $MODULE['2']['linkurl'];?>ask.php">客服中心</a></li>
</ul>
<?php } ?>
 <?php if($MG['homepage'] || $show_menu) { ?>
<h3>
<s></s><b class="l7">店铺管理</b>
</h3>
<ul>
 <li ><a href="<?php echo $MODULE['2']['linkurl'];?>home.php" >商铺设置</a></li>
             <?php if(($MG['addmember_limit']>-1 && $MG['homepage']) || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>addmember.php">经纪人管理</a></li>
<?php } ?>
<?php if(($MG['link_limit']>-1 && $MG['homepage']) || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>link.php" >友情链接</a></li>
<?php } ?>
</ul>
<?php } ?>
<?php if($_userid || $show_menu) { ?>
<h3>
<s></s><b class="l8">资料管理</b>
</h3>
<ul>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>edit.php" >修改资料</a></li>
 <li ><a href="avatar.php" >头像认证</a></li>
<?php if($show_oauth) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>oauth.php" >一键登录</a></li>
<?php } ?>
    <li ><a href="validate.php?action=truename">身份证认证</a></li>
        <li ><a href="validate.php?action=company">执业资格证认证</a></li>
       <li ><a href="<?php echo $MODULE['2']['linkurl'];?>edit.php">修改密码</a></li>
</ul>
<?php } ?>
</div>
<script type="text/javascript">
seajs.use(["jquery","cookie"],function($){
var setCookie=function(){
var str="";
$h3.each(function(){
str+=($(this).attr("class")?"on":"off")+",";
})
$.cookie("lmenu",str,{path:"/"});
}
var $menu=$("#lmenu"),
$h3=$menu.on("click","h3",function(){
if($(this).attr("class")=="on")
$(this).removeClass("on").next().hide();
else
$(this).addClass("on").next().show();
setCookie();
}).find("h3");
var str=$.cookie("lmenu");
if(str){
str=str.split(",");
for(var i=0,l=str.length;i<l;i++){
if(str[i]=="on")
$h3.eq(i).addClass("on").next().show();
}
}else{
$h3.eq(0).addClass("on").next().show();
$h3.eq(1).addClass("on").next().show();
}
$menu.find("li.on").parent().show().prev().addClass("on");
})
</script>
<div class="fr" id="frcon">
<div class="bread"><a href="<?php echo $MODULE['2']['linkurl'];?>">管理中心</a><?php echo $head_title;?></div>
