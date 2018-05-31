<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
    <link href="<?php echo AJ_SKIN;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo AJ_SKIN;?>login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo AJ_STATIC;?>lang/<?php echo AJ_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/page.js"></script>
<title>会员登录-<?php echo $AJ['sitename'];?></title>
</head>
<body>
<div class="header cf">
<h1><a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo AJ_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($AJ['logo']) { ?><?php echo $AJ['logo'];?><?php } else { ?><?php echo AJ_SKIN;?>images/logo.gif<?php } ?>
" alt="<?php echo $AJ['sitename'];?>"/><?php echo $AJ['sitename'];?></a></h1>
<div class="menu">
<a href="<?php echo $MODULE['1']['linkurl'];?>" title="返回首页">返回首页</a>|
<a href="<?php echo $MODULE['1']['linkurl'];?>extend/shortcut.php" title="将<?php echo $AJ['sitename'];?>放至桌面快捷方式">保存至桌面</a>
</div>
</div>
<div class="boyder">
<div id="main">
<div id="loginform" style="margin-top:24px;"><!-- 如果出现验证码把这里style删除 -->
 <form method="post" action="login.php"  onsubmit="return Dcheck();">
<input name="forward" type="hidden" id="forward" value="<?php echo $MODULE['1']['linkurl'];?>">
                    <h2>使用<?php echo $AJ['sitename'];?>帐号登录</h2>
<ul class="form">
<li>
<span>用户名：</span>
<input name="username" id="username" value="" type="text">
<s></s></li>
                        <li class="pt"></li>
<li>
<span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
<input name="password" id="password"  value="" type="password">
<s></s></li>
<?php if($MOD['captcha_login']) { ?>
  <li class="pt"></li>
<span>验证码：</span><?php include template('captchal', 'chip');?>

<?php } ?>
<li class="pt"></li>
                        <li class="h">
 <input name="cookietime" class="c" value="2592000" id="cookietime"<?php if($MOD['login_remember']) { ?> checked<?php } ?>
 type="checkbox"><label for="bind1" class="c" hidefocus="true">一个月内自动登录</label>
 <input type="checkbox" name="goto" value="1" class="c" id="goto"<?php if($MOD['login_goto']) { ?> checked<?php } ?>
/><label class="c" for="goto">进入会员中心</label>
</li>
<li class="h">
<input style="width:70px;" type="submit" name="submit" value="登 录" />
&nbsp; <a href="<?php echo $AJ['file_register'];?>" title="免费注册">免费注册</a>|<a href="send.php" title="忘记密码">忘记密码</a>
</li>
</ul>
</form>
<?php if($oa) { ?>
<div class="else">
使用以下帐号登录：<br>
<?php if(is_array($OAUTH)) { foreach($OAUTH as $k => $v) { ?>
<?php if($v['enable']) { ?><a href="<?php echo AJ_PATH;?>api/oauth/<?php echo $k;?>/connect.php" title="<?php echo $v['name'];?>"><img src="<?php echo AJ_PATH;?>api/oauth/<?php echo $k;?>/ico.png" alt="<?php echo $v['name'];?>"/></a> &nbsp;<?php } ?>
<?php } } ?></p> 
                  
</div>
<?php } ?>
</div>
</div>
</div>
<div id="footer">
技术支持：dede168.com</div>
<script type="text/javascript">
if(Dd('username').value == '') {
Dd('username').focus();
} else {
Dd('password').focus();
}
function Dcheck() {
if(Dd('username').value == '') {
confirm('请输入登录名称');
Dd('username').focus();
return false;
}
if(Dd('password').value == '') {
confirm('请输入密码');
Dd('password').focus();
return false;
}
<?php if($MOD['captcha_login']) { ?>
if(!is_captcha(Dd('captcha').value)) {
confirm('请填写验证码');
Dd('captcha').focus();
return false;
}
<?php } ?>
}
</script>
</body></html>