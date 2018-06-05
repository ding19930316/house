<?php defined('IN_AIJIACMS') or exit('Access Denied');?>
<?php include template('header');?>
<link href="../static/css/jquery-ui.min.css" />
<script type="text/javascript" src="/file/script/jquery.ui.autocomplete.js" ></script>
<!-- <link href="http://code.jquery.com/ui/1.10.4/themes/ui-darkness/jquery-ui.css" /> -->
<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" ></script> -->
<style media="screen">
ul.ui-autocomplete{
width:200px;
height:500px;
overflow:auto;
white-space:nowrap;
border:#7F9DB9 1px solid;
background-color: #f4f5f5;
}
ul.ui-autocomplete li.ui-menu-item{
border-bottom: #7F9DB9 1px solid;
}
</style>
<link href="<?php echo AJ_SKIN;?>user_jjr.css?v=3" rel="stylesheet" type="text/css" />
<script>var AGENT_URL="<?php echo $MODULE['6']['linkurl'];?>";var JS_URL="";var IMG_URL="";</script>
<link href="<?php echo AJ_SKIN;?>style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.tl{width:150px;text-align:right;padding-right:20px;}
.reg_title {border-bottom:#CCCCCC 1px solid;font-weight:bold;padding:0 0 10px 10px;margin:15px 55px 0 55px;font-size:14px;color:#FF6600;}
.reg_inp {border:#7F9DB9 1px solid;padding:3px 0 3px 0;}
.tips {position:absolute;z-index:1000;width:300px;background:url('image/tips_bg.gif') no-repeat 0 bottom;overflow:hidden;margin:-5px 0 0 -10px;}
.tips div{background:url('image/tips_top.gif') no-repeat;line-height:22px;padding:8px 10px 8px 35px;}
</style>
<div class="mt5"></div>
<div class="m">
<div class="left_box">
<div class="pos">当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $AJ['file_register'];?>">会员注册</a></div>
<div style="padding:20px 50px 20px 50px;">
<div style="background:#FAFAFA;padding:10px 20px 10px 20px;line-height:24px;">
<span class="f_b">
&raquo; 已经是会员？请<a href="<?php echo $AJ['file_login'];?>" class="b">点这里登录</a>&nbsp;
&raquo; 忘记了密码？请<a href="send.php" class="b">点这里找回</a>&nbsp;
<?php if($MOD['checkuser'] == 2) { ?>
&raquo; <span class="f_red">未收到验证信？</span>请<a href="send.php?action=check" class="b">点这里重发</a>
<?php } ?>
</span>
<br/>
<span class="f_gray">请认真、仔细地填写以下信息，严肃的商业信息有助于您获得别人的信任，结交潜在的商业伙伴，获取商业机会！<span class="f_red">*</span>为必填项
</span>
</div>
<br/>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<form action="<?php echo $AJ['file_register'];?>" method="post" target="send" onsubmit="return check();">
<input name="action" type="hidden" id="action" value="<?php echo crypt_action('register');?>"/>
<input name="forward" type="hidden" value="<?php echo $forward;?>"/>
<?php if($regtype == '1') { ?>
<div class="reg_title">公司认领</div>
<table cellpadding="5" cellspacing="5" width="100%">
<tbody>
<tr>
<td class="tl">公司名称 <span class="f_red">*</span></td>
<td><input type="text" class = "checkri"style="width:270px" class="reg_inp" style="width:200px;" name="post[rlcompany]" id="rlcompany" autocomplete="off"></td>
<td width="400"><input type="button" name="qxrl" value="取消认领" style="font-size:14px;padding:3px;"></td>
</tr>
</tbody>
</table>
<?php } ?>
<div class="reg_title">帐户信息</div>
<table cellpadding="5" cellspacing="5" width="100%">
<tr>
<td class="tl">会员类型 <span class="f_red">*</span></td>
<td>
<?php if(!$regtype) { ?>
<span<?php if(!$GROUP['5']['reg']) { ?> class="dsn"<?php } ?>
>
<input type="radio" name="post[regid]" value="5" id="g_5"onclick="reg(0);" checked/><label for="g_5"> <?php echo $GROUP['5']['groupname'];?></label>
</span>
<input type="radio" name="post[regid]" value="6" id="g_6"onclick="reg(1);" /><label for="g_6"> <?php echo $GROUP['6']['groupname'];?></label>
<input type="radio" name="post[regid]" value="7" id="g_7"onclick="reg(1);" /><label for="g_7"> <?php echo $GROUP['7']['groupname'];?></label>
<?php } ?>
<?php if($regtype == '1') { ?>中介<input type="hidden" class = "regtype" reg = "0" name="post[regid]" value="7" /><?php } ?>
<?php if($regtype == '2') { ?>经纪人<input type="hidden" class = "regtype" reg = "1" name="post[regid]" value="6" /><?php } ?>
<?php if($regtype == '3') { ?>个人会员<input type="hidden" class = "regtype" reg = "1" name="post[regid]" value="5" /><?php } ?>
</td>
</tr>
<table cellpadding="5" cellspacing="5" width="100%">
<tr onmouseover="Ds('tusername');" onmouseout="Dh('tusername');">
<td class="tl">会员名 <span class="f_red">*</span></td>
<td width="220"><input type="text" class="reg_inp" style="width:200px;" name="post[username]" id="username" onblur="validator('username');" autocomplete="off" <?php if($username) { ?> value="<?php echo $username;?>" readonly<?php } ?>
/>
</td>
<td>
<div class="tips" id="tusername" style="display:none;">
<div><?php echo $MOD['minusername'];?>-<?php echo $MOD['maxusername'];?>个字符，只能使用小写字母(a-z)、数字(0-9)、下划线(_)、中划线(-)，且以字母或数字开头和结尾</div>
</div>
<span id="dusername" class="f_red"></span>&nbsp;
</td>
</tr>
<?php if($MOD['passport'] && $passport) { ?>
<tr onmouseover="Ds('tpassport');" onmouseout="Dh('tpassport');">
<td class="tl">通行证用户名 &nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[passport]" id="passport" onblur="validator('passport');" autocomplete="off"<?php if($passport) { ?> value="<?php echo $passport;?>" readonly<?php } ?>
/></td>
<td>
<div class="tips" id="tpassport" style="display:none;">
<div>支持中文名，可用于论坛等系统用户名<br/>如果不填写，则和会员名一致</div>
</div>
<span id="dpassport" class="f_red"></span>&nbsp;
</td>
</tr>
<?php } ?>
<tr onmouseover="Ds('tpassword');" onmouseout="Dh('tpassword');">
<td class="tl">登录密码 <span class="f_red">*</span></td>
<td><input type="password" class="reg_inp" style="width:200px;" name="post[password]" id="password" onblur="validator('password');" autocomplete="off"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>
/></td>
<td>
<div class="tips" id="tpassword" style="display:none;">
<div><?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>个字符，区分大小写，推荐使用数字、字母和特殊符号组合</div>
</div>
<span id="dpassword" class="f_red"></span>&nbsp;
</td>
</tr>
<tr onmouseover="Ds('tcpassword');" onmouseout="Dh('tcpassword');">
<td class="tl">重复输入密码 <span class="f_red">*</span></td>
<td><input type="password" class="reg_inp" style="width:200px;" size="30" name="post[cpassword]" id="cpassword" onblur="validate('cpassword');" autocomplete="off"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>
/></td>
<td>
<div class="tips" id="tcpassword" style="display:none;">
<div>请再输入一遍上面填写的密码</div>
</div>
<span id="dcpassword" class="f_red"></span>&nbsp;
</td>
</tr>
</table>
<div class="reg_title">联系方式</div>
<table cellpadding="5" cellspacing="5" width="100%">
<tr onmouseover="Ds('ttruename');" onmouseout="Dh('ttruename');">
<td class="tl">真实姓名 <span class="f_red">*</span></td>
<td width="220">
<input type="text" class="reg_inp" style="width:100px;" name="post[truename]" id="truename" onblur="validate('truename');"/>
<input type="radio" name="post[gender]" value="1" checked id="gender_1"/><label for="gender_1"> 先生</label>
<input type="radio" name="post[gender]" value="2" id="gender_2"/><label for="gender_2"> 女士</label>
</td>
<td>
<div class="tips" id="ttruename" style="display:none;">
<div>请与有效身份证件上的姓名保持一致</div>
</div>
<span id="dtruename" class="f_red"></span>&nbsp;
</td>
</tr>
<tr>
<td class="tl">所在地区 <span class="f_red">*</span></td>
<td><?php echo ajax_area_select('post[areaid]', '请选择', $areaid, '', 2);?></td>
<td><span id="dareaid" class="f_red"></span>&nbsp;</td>
</tr>
<tr onmouseover="Ds('temail');" onmouseout="Dh('temail');">
<td class="tl">电子邮箱 <span class="f_red">*</span></td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[email]" id="email" onblur="validator('email');"<?php if($email) { ?> value="<?php echo $email;?>" readonly<?php } ?>
/></td>
<td>
<div class="tips" id="temail" style="display:none;">
<div>
<?php if($MOD['checkuser'] == 2) { ?>
<span class="f_red">系统设置了邮件验证注册，请确保当前的邮件地址真实有效<br/></span>
<?php } ?>
请使用常用常用邮箱(E-mail)地址，地址不会被公开且可用于登录网站
</div>
</div>
<span id="demail" class="f_red"></span>&nbsp;
</td>
</tr>
<?php if($could_emailcode) { ?>
<tr onmouseover="Ds('temailcode');" onmouseout="Dh('temailcode');">
<td class="tl">邮件验证码 <span class="f_red">*</span></td>
<td><input type="text" class="reg_inp" style="width:80px;" name="post[emailcode]" id="emailcode" onblur="validator('emailcode');"/>
<input type="button" value="立即发送" id="send_code" onclick="SendCode();"/>
</td>
<td>
<div class="tips" id="temailcode" style="display:none;">
<div>
点击“立即发送”按钮，系统将会发送一组6位数字验证码至您填写的电子邮箱，请接收邮件获取验证码后，填写在左侧的输入框内，继续完成注册
</div>
</div>
<span id="demailcode" class="f_red"></span>&nbsp;
</td>
</tr>
<tr id="sendok" style="display:none;">
<td class="tl">&nbsp;</td>
<td id="dsendok">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<?php } ?>
<tr onmouseover="Ds('tmobile');" onmouseout="Dh('tmobile');">
<td class="tl">手机号码 <?php if($could_mobilecode) { ?><span class="f_red">*</span><?php } else { ?>&nbsp;<?php } ?>
</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[mobile]" id="mobile"<?php if($could_mobilecode) { ?> onblur="validator('mobile');"<?php } ?>
/></td>
<td>
<div class="tips" id="tmobile" style="display:none;">
<div><?php if(!$could_mobilecode) { ?>推荐填写，以便直接与您取得联系<br/><?php } ?>
号码可用于登录网站和接收本站短信</div>
</div>
<span id="dmobile" class="f_red"></span>&nbsp;
</td>
</tr>
<!-- <?php if($could_mobilecode) { ?> -->
<tr onmouseover="Ds('tmobilecode');" onmouseout="Dh('tmobilecode');">
<td class="tl">手机验证码 <span class="f_red">*</span></td>
<td><input type="text" class="reg_inp" style="width:80px;" name="post[mobilecode]" id="mobilecode" onblur="validator('mobilecode');"/>
<input type="button" value="立即发送" id="send_scode" onclick="SendSCode();"/>
</td>
<td>
<div class="tips" id="tmobilecode" style="display:none;">
<div>
点击“立即发送”按钮，系统将会发送一组6位数字验证码至您填写的手机，请接收短信获取验证码后，填写在左侧的输入框内，继续完成注册
</div>
</div>
<span id="dmobilecode" class="f_red"></span>&nbsp;
</td>
</tr>
<tr id="sendsok" style="display:none;">
<td class="tl">&nbsp;</td>
<td id="dsendsok">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<!-- <?php } ?>
 -->
<tr onmouseover="Ds('tqq');" onmouseout="Dh('tqq');">
<td class="tl">QQ号码 &nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[qq]" id="qq"/></td>
<div class="tips" id="tqq" style="display:none;">
<div>推荐填写，以便即时在线与您取得联系</div>
</div>
<span id="dqq" class="f_red"></span>&nbsp;
</td>
</tr>
<tr>
<td class="tl">地址 &nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[address]" /></td>
</tr>
</table>
<div id="company_detail" style="display:none">
<div class="reg_title">公司信息</div>
<table cellpadding="5" cellspacing="5" width="100%">
<tr onmouseover="Ds('tcompany');" onmouseout="Dh('tcompany');">
<td class="tl">公司名称 <span class="f_red">*</span></td>
<td width="300"><input type="text" class="txt" id="villagename" name="post[company]" value="<?php echo $housename;?>"  >
<td>
<div class="tips" id="tcompany" style="display:none;">
<div>请填写公司全称，与营业执照保持一致，注册之后将不可更改</div>
</div>
<span id="dcompany" class="f_red"></span>&nbsp;
</td>
</tr>
<tr>
<td class="tl">公司地址&nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[comaddress]"/></td>
</tr>
<tr onmouseover="Ds('ttelephone');" onmouseout="Dh('ttelephone');">
<td class="tl">公司电话 <span class="f_red">*</span></td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[telephone]" id="telephone" onblur="validate('telephone');"/></td>
<td>
<div class="tips" id="ttelephone" style="display:none;">
<div>国内用户请加区号，国外用户请加国家码<br/>格式范例：86-010-88889999</div>
</div>
<span id="dtelephone" class="f_red"></span>&nbsp;
</td>
</tr>
<tr>
<td class="tl">社会信用代码&nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[code]"/></td>
</tr>
<tr>
<td class="tl">注册时间&nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[register_time]"/></td>
</tr>
<tr>
<td class="tl">注册资本&nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[register_mon]"/></td>
</tr>
<tr>
<td class="tl">法人代表&nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[owner]"/></td>
</tr>
<tr>
<td class="tl">公司邮箱&nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[comemail]"/></td>
</tr>
<tr>
<td class="tl">公司网址&nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[website]"/></td>
</tr>
<tr>
<td class="tl">公司简介&nbsp;</td>
<td><input type="textarea" class="reg_inp" style="width:400px;" name="post[intruce]"/></td>
</tr>
</table>
</div>
<table cellpadding="5" cellspacing="5" width="100%">
<tr>
<td class="tl">&nbsp;</td>
<td width="300"><input type="submit" name="submit" value="提交" style="font-size:14px;padding:3px;"/></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
<br/>
<!-- <div style="width:700px;height:100px;overflow-y:scroll;border:#9DBFDA 1px solid;background:#FAFAFA;margin:auto;line-height:180%;padding:10px;" id="agreement">
<center class="px14 f_b">请阅读本站服务条款</center>
<?php include template('agreement', $module);?>
</div> -->
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/guest.js"></script>
<script type="text/javascript">
var companys = [];
$.ajaxSetup({async : false});
$.ajax({
     type: "post",
     url: "<?php echo $MODULE['1']['linkurl'];?>company/list.html",
     data: {pingyin:true},
     dataType: "json",
     success: function(data){
 companys = data;
    },
 });
$("#rlcompany").autocomplete({
    source: companys,
messages: {
noResults: '',
results: function() {}
}
});
$(".checkri").blur(function(){
if($.inArray($(this).val(), companys) == -1)
{
$(this).val("");
}
});
$(document).ready(function(){
$("input[name='qxrl']").click(function(){
var text = $(this).text();
switch (text) {
case "取消认领":
$(this).text("恢复认领").val("恢复认领");
$("#rlcompany").attr("disabled","disabled");
$("#rlcompany").val("");
reg(1);
break;
default:
$(this).text("取消认领").val("取消认领");
$("#rlcompany").removeAttr("disabled");
reg(0);
}
})
})
if(Dd('username').value == '') Dd('username').focus();
var vid = '';
function validator(id) {
vid = id;
makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+Dd(id).value, AJPath, '_validator');
}
function _validator() {
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('d'+vid).innerHTML = xmlHttp.responseText ? '<img src="<?php echo AJ_SKIN;?>image/check_error.gif" align="absmiddle"/> '+xmlHttp.responseText : '<img src="<?php echo AJ_SKIN;?>image/check_right.gif" align="absmiddle"/> ';
}
}
function err_msg(str, id) {
Dd('d'+id).innerHTML = '<img src="<?php echo AJ_SKIN;?>image/check_'+(str ? 'error' : 'right')+'.gif" align="absmiddle"/> '+str;
}
function validate(type) {
if(type == 'cpassword') {
if(Dd('cpassword').value != Dd('password').value) {
err_msg('两次输入的密码不一致', type);
} else {
err_msg('', type);
}
}
if(type == 'truename') {
if(Dd('truename').value.length < 2) {
err_msg('请输入真实姓名', type);
} else {
err_msg('', type);
}
}
if(type == 'telephone') {
if(Dd('telephone').value.match(/^[0-9\-\(\)\+\.]{7,}$/)) {
err_msg('', type);
} else {
err_msg('请输入公司电话', type);
}
}
}
function reg(type) {
if(type) {
Ds('company_detail');
} else {
Dh('company_detail');
}
}
function Df(ID) {
Dd(ID).focus();
}
function check() {
var f,p;
f = 'username';
if(Dd(f).value == '') {
err_msg('请填写会员登录名', f);
Df(f);
return false;
}
if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
Df(f);
return false;
}
f = 'password';
if(Dd(f).value.length < 6) {
err_msg('请填写会员登录密码', f);
Df(f);
return false;
}
if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
Df(f);
return false;
}
f = 'cpassword';
if(Dd(f).value == '') {
err_msg('请重复输入密码', f);
Df(f);
return false;
}
if(Dd('password').value != Dd(f).value) {
err_msg('两次输入的密码不一致', f);
Df(f);
return false;
}
f = 'truename';
if(Dd(f).value == '') {
err_msg('请填写真实姓名', f);
Df(f);
return false;
}
f = 'email';
if(Dd(f).value.length < 6) {
err_msg('请填写电子邮箱', f);
Df(f);
return false;
}
if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
Df(f);
return false;
}
if(Dd('areaid_1').value == 0) {
Dmsg('请选择所在地', 'areaid');
return false;
}
<?php if($could_emailcode) { ?>
f = 'emailcode';
if(!Dd(f).value.match(/^[0-9]{6}$/)) {
Dmsg('请填写邮件验证码', f);
return false;
}
<?php } ?>
if(Dd('g_5').checked == false) {
f = 'company';
if(Dd(f).value == '') {
err_msg('请填写公司名称', f);
Df(f);
return false;
}
if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
Df(f);
return false;
}
if(Dd('type').value == '') {
Dmsg('请选择公司类型', 'type');
return false;
}
f = 'telephone';
if(Dd(f).value.length < 7) {
err_msg('请填写公司电话', f);
Df(f);
return false;
}
}
return true;
}
function SendCode() {
if(Dd('demail').innerHTML.indexOf('right') == -1) {
Dd('email').focus();
return;
}
makeRequest('action=<?php echo $action_sendcode;?>&value='+Dd('email').value, '<?php echo $AJ['file_register'];?>', '_SendCode');
Dh('sendok');
Dd('send_code').value = '正在发送';
Dd('send_code').disabled = true;
}
 $(document).ready(function(){
switch ($('.regtype').attr("reg")) {
case "1":
reg(1);
break;
default:
reg(0);
}
$('.regtype').attr("reg")
})
function _SendCode() {
var f = 'email';
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('send_code').value = xmlHttp.responseText == 1 ? '发送成功' : '立即发送';
Dd('send_code').disabled = xmlHttp.responseText == 1 ? true : false;
if(xmlHttp.responseText == 1) {
Ds('sendok');
Dd('dsendok').innerHTML = '<img src="<?php echo AJ_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_mailok.gif" align="absmiddle"/> <span class="f_green">邮件发送成功，</span> <a href="goto.php?action=emailcode&email='+Dd(f).value+'" target="_blank">立即查收</a>';
StopCode();
} else if(xmlHttp.responseText == 2) {
err_msg('邮件格式错误，请检查', f);
Df(f);
} else if(xmlHttp.responseText == 3) {
err_msg('邮件地址已存在，请更换', f);
Df(f);
} else if(xmlHttp.responseText == 4) {
err_msg('此邮件域名已经被禁止注册，请更换', f);
Df(f);
} else if(xmlHttp.responseText == 5) {
alert('邮件发送过快，请稍后再试');
} else if(xmlHttp.responseText == 6) {
alert('尝试发送次数太多，请稍后再试');
} else {
alert('未知错误，请重试');
}
}
}
function StopCode() {
Dd('send_code').disabled = true;
var i = 60;
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('send_code').value = '立即发送';
Dd('send_code').disabled = false;
clearInterval(interval);
} else {
Dd('send_code').value = '重新发送('+i+')';
i--;
}
},
1000);
}
function SendSCode() {
if(Dd('dmobile').innerHTML.indexOf('right') == -1) {
Dd('mobile').focus();
return;
}
makeRequest('action=<?php echo $action_sendscode;?>&value='+Dd('mobile').value, '<?php echo $AJ['file_register'];?>', '_SendSCode');
Dh('sendsok');
Dd('send_scode').value = '正在发送';
Dd('send_scode').disabled = true;
}
function _SendSCode() {
var f = 'mobile';
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('send_scode').value = xmlHttp.responseText == 1 ? '发送成功' : '立即发送';
Dd('send_scode').disabled = xmlHttp.responseText == 1 ? true : false;
if(xmlHttp.responseText == 1) {
Ds('sendsok');
Dd('dsendsok').innerHTML = '<img src="<?php echo AJ_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_mailok.gif" align="absmiddle"/> <span class="f_green">短信发送成功</span>';
StopSCode();
} else if(xmlHttp.responseText == 2) {
err_msg('手机号码格式错误，请检查', f);
Df(f);
} else if(xmlHttp.responseText == 3) {
err_msg('手机号码已存在，请更换', f);
Df(f);
} else if(xmlHttp.responseText == 5) {
alert('短信发送过快，请稍后再试');
} else if(xmlHttp.responseText == 6) {
alert('尝试发送次数太多，请稍后再试');
} else {
alert('未知错误，请重试');
}
}
}
function StopSCode() {
Dd('send_scode').disabled = true;
var i = 180;
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('send_scode').value = '立即发送';
Dd('send_scode').disabled = false;
clearInterval(interval);
} else {
Dd('send_scode').value = '重新发送('+i+')';
i--;
}
},
1000);
}
</script>
<script type="text/javascript">
seajs.use(["jjrfbconc", "emailpop"], function(fb) {
$("#email").emailpop();
fb.init("esf",{ autoc:AGENT_URL + "house.php?action=company"
});
});
</script>
