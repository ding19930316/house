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
<!-- <div class="panl">
<a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=last" class="r">通知(<?php echo $_message;?>)<i></i></a>
<div style="display: none;">
<a href="<?php echo $MODULE['2']['linkurl'];?>chat.php">新对话(<?php echo $_chat;?>)</a>
<a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=last">短消息(<?php echo $_message;?>)</a>
</div>
</div> -->
<!-- <a href="<?php echo userurl($_username);?>" target="_blank" title="我的店铺">我的店铺</a> -->
            <!-- <a style="color:#f80" href="<?php echo $MODULE['1']['linkurl'];?>fenxiao/" title="赚取佣金" target="_blank">赚取佣金</a> -->
<a href="<?php echo $MODULE['2']['linkurl'];?>">帐号：<?php echo $_username;?></a>
<a href="<?php echo $MODULE['2']['linkurl'];?>logout.php">[ 退出 ]</a>
<!-- <?php if($admin_user) { ?><a href="index.php?action=logout">注销授权</a><?php } ?>
 -->
<!-- <div class="panl" id="topBarPanl"> -->
<!-- <a class="r" href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $AJ['sitename'];?><?php } ?>
">返回首页<i></i></a>
<div style=""> -->
<a href="<?php echo $MODULE['1']['linkurl'];?>" target="_blank">首页</a>
<!-- <a href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank" title="新房">新房</a>
<a href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank" title="二手房">二手房</a>
<a href="<?php echo $MODULE['7']['linkurl'];?>" target="_blank" title="租房">租房</a>
</div> -->
<!-- </div> -->
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
<?php array_pop($MENUMODS);?>
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
 <!-- <?php if($_userid || $show_menu) { ?>
<h3>
<s></s><b class="l6">问题管理</b>
</h3>
<ul>
<li><a href="<?php echo $MODULE['2']['linkurl'];?>wenfang.php">问题受理</a></li>
   <li><a href="<?php echo $MODULE['2']['linkurl'];?>ask.php">客服中心</a></li>
</ul>
<?php } ?>
 -->
 <?php if($MG['homepage'] || $show_menu) { ?>
<h3>
<s></s><b class="l7">员工管理</b>
</h3>
<ul>
 <!-- <li ><a href="<?php echo $MODULE['2']['linkurl'];?>home.php" >商铺设置</a></li> -->
             <?php if(($MG['addmember_limit']>-1 && $MG['homepage']) || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>addmember.php">员工管理</a></li>
<?php } ?>
<!-- <?php if(($MG['link_limit']>-1 && $MG['homepage']) || $show_menu) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>link.php" >友情链接</a></li>
<?php } ?>
 -->
</ul>
<?php } ?>
<?php if($_userid || $show_menu) { ?>
<h3>
<s></s><b class="l8">资料修改</b>
</h3>
<ul>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>edit.php" >基本资料</a></li>
 <li ><a href="avatar.php" >头像</a></li>
<!-- <?php if($show_oauth) { ?>
<li ><a href="<?php echo $MODULE['2']['linkurl'];?>oauth.php" >一键登录</a></li>
<?php } ?>
 -->
    <!-- <li ><a href="validate.php?action=truename">身份证认证</a></li> -->
        <!-- <li ><a href="validate.php?action=company">执业资格证认证</a></li> -->
       <!-- <li ><a href="<?php echo $MODULE['2']['linkurl'];?>edit.php">密码</a></li> -->
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
<div class="conL">
<div class="jjrInfo">
<a href="avatar.php">
<img class="tx" src="<?php echo useravatar($_username, 'large');?>&time=<?php echo $AJ_TIME;?>" alt="点击更换头像" width="120" height="120"></a>
<h3>
欢迎您！<?php echo $_truename;?><img src="<?php echo AJ_SKIN;?>images/user_jjr/identity_<?php if($vtruename) { ?>yes<?php } else { ?>no<?php } ?>
.gif" title="未通过身份证认证">
<img src="<?php echo AJ_SKIN;?>images/user_jjr/aptitude_<?php if($vcompany) { ?>yes<?php } else { ?>no<?php } ?>
.gif" title="未通过执业资格认证">
</h3>
<p class="line">
会员组：<?php echo $MG['groupname'];?><br> 积分:<?php echo $_credit;?>分  <a href="credit.php" class="l"><?php echo $AJ['credit_name'];?>记录</a></p>
<p>
帐户状态：<?php if($_groupid == 4) { ?>
<b style="color:red;">尊敬的会员，您的帐号<span class="f_red f_b">正在审核中..</span><?php if($MOD['checkuser']==2) { ?><a href="send.php?action=check" class="l">请点这里验证您的邮箱</a>，系统将自动审核<?php } else { ?>请稍候，等待网站审核<?php } ?>
</b>
<?php } ?>
<?php if($_groupid > 5 && !$_edittime) { ?><b style="color:red;">未完善详细资，<a href="edit.php?tab=2" class="t f_b">现在就去完善</a>。</b>
<?php } ?>
<?php if($vip && $havedays < 11) { ?>
尊敬的<?php echo $MG['groupname'];?>，您的<?php echo VIP;?>服务将在 <strong class="f_red"><?php echo $havedays;?></strong> 天后到期，请您尽快续费。&nbsp;&nbsp;<a href="renew.php" class="t f_b">点击续费</a>
<?php } ?>
<font style="color:red;">已经开通</font>
<br>
<a class="blue" href="avatar.php">更换头像</a>
&nbsp;
<a class="blue" href="edit.php">修改资料</a>
&nbsp;
<!-- <a class="blue" href="credit.php">查看积分明细</a>
&nbsp;
<a class="blue" target="_black" href="<?php echo userurl($_username);?>">进入店铺</a> -->
</p>
</div>
<!-- <div class="tipInfo">
<h3>特别提醒：</h3>
您有未完成的认证信息，请尽快提交信息完成认证。马上认证：
  <?php if($MOD['vmember']) { ?> <?php if(!$avatar) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<a class="blue" href="avatar.php">头像认证</a><?php } ?>
<?php } ?>
  <?php if($MOD['vtruename']) { ?><?php if(!$vemail) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<a class="blue" href="validate.php?action=truename">身份证认证</a><?php } ?>
<?php } ?>
  <?php if($MOD['vemail']) { ?><?php if(!$vtruename) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<a class="blue" href="validate.php?action=email">邮箱认证</a><?php } ?>
<?php } ?>
  <?php if($MOD['vcompany'] && $groupid > 5) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!$vcompany) { ?><a class="blue" href="validate.php?action=company">执业资格证认证</a><?php } ?>
<?php } ?>
</div> -->
<div class="con mt10">
<div class="tabT">
<h3>使用情况</h3>
</div>
<table width="100%">
<tr>
<th width="10%">类别</th>
<?php if($MYMODS || $show_menu) { ?>
<?php if(is_array($MENUMODS)) { foreach($MENUMODS as $k => $v) { ?>
<th class="red" width="11%"><?php echo $MODULE[$v]['name'];?></th>
 <?php } } ?>
    <?php } ?>
</tr>
<tr>
<td>信息量</td>
<?php if($MYMODS || $show_menu) { ?>
<?php if(is_array($MENUMODS)) { foreach($MENUMODS as $k => $v) { ?>
<td><?php echo get_mnum(get_table($v),$username);?>条</td>
 <?php } } ?>
    <?php } ?>
</tr>
</table>
</div>
</div>
<script>
seajs.use(["alert","tip"],function(alertM){
var $feedback_type=$("#feedback_type").on("blur",function(){
if($feedback_type.val()==0)
$feedback_type.tip(0,"请选择意见分类")
else
$feedback_type.tip().remove();
}),
$info=$("#info").on("blur",function(){
if(!$info.val().length)
$info.tip(0,"请输入您的意见建议")
else
$info.tip().remove();
}),
$iform=$("#iform").on("submit",function(){
if($feedback_type.val()==0){
$feedback_type.tip(0,"请选择意见分类")
return false;
}
if(!$info.val().length){
$info.tip(0,"请输入您的意见建议")
return false;
}
$.ajax({
type:'POST',
url:AGENT_URL + "index/propose",
dataType:"json",
data:$iform.serialize()
}).done(function(data){
alertM(data.alert,{cName:data.state})
}).fail(function(){
alertM("提交修改失败，请检查网络连接是否已断开",{cName:"error"})
})
return false;
}).on("click","a.subBtn",function(){
$iform.trigger("submit");
})
})
</script></div>
