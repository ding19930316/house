<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo AJ_CHARSET;?>"/>
<title>Send_Message</title>
<link rel="stylesheet" type="text/css" href="<?php echo $MODULE['4']['linkurl'];?>skin/common.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $HSPATH;?>style.css" />
<script type="text/javascript" src="<?php echo AJ_PATH;?>lang/<?php echo AJ_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/page.js"></script>
<script type="text/javascript">
if(parent.location == window.location) window.location='<?php echo userurl($username);?>';
</script>
</head>
<body style="background:#FFFFFF;">
<iframe src="" name="send" id="send" style="display:none;" scrolling="no" frameborder="0"></iframe>
<form method="post" action="<?php echo $MOD['linkurl'];?>home.php" id="dform" onsubmit="return check();" target="send">
<input type="hidden" name="job" value="<?php echo $job;?>"/>
<input type="hidden" name="username" value="<?php echo $username;?>"/>
<input type="hidden" name="action" value="send"/>
<table cellpadding="3" cellspacing="3" width="100%">
<tr>
<td width="100">主题 <span class="f_red">*</span></td>
<td><input type="text" name="title" value="<?php if($job=='inquiry' || $job=='price') { ?>我对贵公司的“<?php echo $title;?>”很感兴趣<?php } else if($job=='order') { ?>【订购】贵公司的“<?php echo $title;?>”<?php } ?>
" id="title" class="pd3" style="width:335px;"/></td>
</tr>
<tr>
<td>内容 <span class="f_red">*</span></td>
<td>
<textarea name="content" id="content" style="width:335px;height:100px;">
<?php if($job=='inquiry') { ?>
我公司有意购买此产品，可否提供此产品的报价单和最小起订量？
我还需要了解以下内容：
<?php } else if($job=='price') { ?>
请问您对此产品有多大的需求量？是长期有需求吗？
我还需要了解以下内容：
<?php } else if($job=='order') { ?>
订货总量：
相关说明：
<?php } ?>
</textarea></td>
</tr>
<tr>
<td>公司名 </td>
<td><input type="text" name="company" size="30" id="company" value="<?php echo $company;?>"/></td>
</tr>
<tr>
<td>联系人 <span class="f_red">*</span></td>
<td><input type="text" name="truename" size="30" id="truename" value="<?php echo $truename;?>"/></td>
</tr>
<tr>
<td>联系电话 <span class="f_red">*</span></td>
<td><input type="text" name="telephone" size="30" id="telephone" value="<?php echo $telephone;?>"/></td>
</tr>
<tr>
<td>电子邮箱</td>
<td><input type="text" name="email" size="30" id="email" value="<?php echo $email;?>"/></td>
</tr>
<?php if($AJ['im_qq']) { ?>
<tr>
<td>QQ </td>
<td><input type="text" size="20" name="qq" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($AJ['im_ali']) { ?>
<tr>
<td>阿里旺旺 </td>
<td><input type="text" size="20" name="ali" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($AJ['im_msn']) { ?>
<tr>
<td>MSN </td>
<td><input type="text" size="30" name="msn" id="msn" value="<?php echo $msn;?>"/></td>
</tr>
<?php } ?>
<?php if($AJ['im_skype']) { ?>
<tr>
<td>Skype </td>
<td><input type="text" size="20" name="skype" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
<tr>
<td>验证码 </td>
<td><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td> </td>
<td>
<input type="submit" name="submit" value=" 确 定 " class="sbm"/>&nbsp;
<input type="reset" value=" 重 写 " class="sbm"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function is_captcha(v) {
if(v == L['str_captcha']) return false;
if(v.match(/^[a-z0-9A-Z]{1,}$/)) {
return v.match(/^[a-z0-9A-Z]{4,}$/);
} else {
return v.length > 1;
}
}
function check() {
var l;
var f;
f = 'title';
l = Dd(f).value.length;
if(l < 5 || l > 50) {
alert('主题应为5-50字，当前已输入'+l+'字');
Dd(f).focus();
return false;
}
f = 'content';
l = Dd(f).value.length;
if(l < 10 || l > 2000) {
alert('内容应为10-2000字，当前已输入'+l+'字');
Dd(f).focus();
return false;
}
f = 'truename';
l = Dd(f).value.length;
if(l < 2) {
alert('请填写联系人');
Dd(f).focus();
return false;
}
f = 'telephone';
l = Dd(f).value.length;
if(l < 7) {
alert('请填写联系电话');
Dd(f).focus();
return false;
}
f = 'captcha';
l = Dd(f).value;
if(!is_captcha(l)) {
alert('请填写正确的验证码');
Dd(f).focus();
return false;
}
if(Dd('c'+f).innerHTML.indexOf('error') != -1) {
Dd(f).focus();
return false;
}
}
</script>
</body>
</html>