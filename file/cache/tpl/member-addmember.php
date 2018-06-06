<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', 'member');?>
<link href="../static/css/jquery-ui.min.css" />
<script type="text/javascript" src="../static/js/jquery-ui.min.js" ></script>
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
<script type="text/javascript">c(3);</script>
<div class="tinfo">
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="addmember.php?action=add"><span>添加员工</span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s3"><a href="addmember.php"><span><?php if($action=='edit_all')echo "中介排序"; else echo "员工管理"?></span></a></td>
</tr>
</table>
</div>
<?php if($action=='add') { ?>
<form method="post" action="addmember.php" id="dform" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="companyid" value="<?php echo $_userid;?>"/>
<input type="hidden" name="groupid" value="6"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr >
<td class="tl">会员名 <span class="f_red">*</span></td>
<td width="220"><input type="text" class="reg_inp" style="width:200px;" name="post[username]" id="username" onblur="validator('username');"<?php if($username) { ?> value="<?php echo $username;?>" readonly<?php } ?>
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
<tr>
<td class="tl">通行证用户名 &nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[passport]" id="passport" onblur="validator('passport');"<?php if($passport) { ?> value="<?php echo $passport;?>" readonly<?php } ?>
/></td>
<td>
<div class="tips" id="tpassport" style="display:none;">
<div>支持中文名，可用于论坛等系统用户名<br/>如果不填写，则和会员名一致</div>
</div>
<span id="dpassport" class="f_red"></span>&nbsp;
</td>
</tr>
<?php } ?>
<tr>
<td class="tl">登录密码 <span class="f_red">*</span></td>
<td><input type="password" class="reg_inp" style="width:200px;" name="post[password]" id="password" onblur="validator('password');"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>
/></td>
<td>
<div class="tips" id="tpassword" style="display:none;">
<div><?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>个字符，区分大小写，推荐使用数字、字母和特殊符号组合</div>
</div>
<span id="dpassword" class="f_red"></span>&nbsp;
</td>
</tr>
<tr >
<td class="tl">重复输入密码 <span class="f_red">*</span></td>
<td><input type="password" class="reg_inp" style="width:200px;" size="30" name="post[cpassword]" id="cpassword" onblur="validate('cpassword');"<?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>
/></td>
<td>
<div class="tips" id="tcpassword" style="display:none;">
<div>请再输入一遍上面填写的密码</div>
</div>
<span id="dcpassword" class="f_red"></span>&nbsp;
</td>
</tr>
<tr >
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
<tr >
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
<tr >
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
<td class="tl">手机号码 &nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[mobile]" id="mobile"/></td>
<td>
<div class="tips" id="tmobile" style="display:none;">
<div>推荐填写，以便直接与您取得联系<br/>号码可用于登录网站和接收本站短信</div>
</div>
<span id="dmobile" class="f_red"></span>&nbsp;
</td>
</tr>
<!--
<tr >
<tr>
<td class="tl">QQ号码 &nbsp;</td>
<td><input type="text" class="reg_inp" style="width:200px;" name="post[qq]" id="qq"/></td>
<td>
<div class="tips" id="tqq" style="display:none;">
<div>推荐填写，以便即时在线与您取得联系</div>
</div>
<span id="dqq" class="f_red"></span>&nbsp;
</td>
</tr>
-->
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 确 定 " class="sBtn"/><input type="reset" name="reset" value=" 重 置 " class="sBtn"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">s('address');m('add');</script>
<?php } else if($action=='edit') { ?>
<form method="post" action="addmember.php" id="dform" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tbody id="Tabs0" style="display:;">
<tr>
<td class="tl">会员名</td>
<td class="tr f_b"><?php echo $username;?></td>
</tr>
<tr>
<td class="tl">Email</td>
<td class="tr"><input type="text" name="post[email]" id="email" value="<?php echo $email;?>"/><?php if($vemail) { ?>&nbsp;&nbsp;<img src="image/v_email.gif" title="已认证" align="absmiddle"/><?php } ?>
&nbsp;&nbsp;</td>
</tr>
<?php if($vtruename) { ?>
<tr>
<td class="tl"><span class="f_red">*</span>真实姓名</td>
<td class="tr"><input type="hidden" name="post[truename]" id="truename" value="<?php echo $truename;?>"/><?php echo $truename;?>&nbsp;&nbsp;<img src="image/v_truename.gif" title="已认证" align="absmiddle"/></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><span class="f_red">*</span>真实姓名</td>
<td class="tr"><input type="text" size="10" name="post[truename]" id="truename" value="<?php echo $truename;?>"/>&nbsp;<span id="dtruename" class="f_red"></span></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span>性别</td>
<td class="tr">
<input type="radio" name="post[gender]" value="1" <?php if($gender==1) { ?>checked="checked"<?php } ?>
/> 先生
<input type="radio" name="post[gender]" value="2" <?php if($gender==2) { ?>checked="checked"<?php } ?>
/> 女士
</td>
</tr>
<?php if($_groupid < 8) { ?>
<tr>
<td class="tl"><span class="f_red">*</span>所在地区</td>
<td class="tr"><?php echo ajax_area_select('post[areaid]', '请选择', $areaid);?>&nbsp;<span id="dareaid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">新登录密码</td>
<td class="tr"><input type="password" size="20" name="post[password]" id="password" onblur="validator('password');"/>&nbsp;<span class="f_gray">如不更改密码,请留空</span> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">重复新密码</td>
<td class="tr"><input type="password" size="20" name="post[cpassword]" id="cpassword"/>&nbsp;<span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">现有密码</td>
<td class="tr f_red"><input type="password" size="20" name="post[oldpassword]" id="oldpassword"/>&nbsp; 如要更改密码，需输入现有密码 <span id="doldpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">手机号码</td>
<td class="tr"><input type="text" name="post[mobile]" id="mobile" value="<?php echo $mobile;?>"/>&nbsp;<img src="image/v_mobile.gif" title="已认证" align="absmiddle"/>&nbsp;&nbsp;</td>
</tr>
<?php } ?>
<tr>
<td class="tl">部门</td>
<td class="tr"><input type="text" size="20" name="post[department]" id="department" value="<?php echo $department;?>"/></td>
</tr>
<tr>
<td class="tl">职位</td>
<td class="tr"><input type="text" size="20" name="post[career]" id="career" value="<?php echo $career;?>"/></td>
</tr>
<?php if($AJ['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><input type="text" size="20" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($AJ['im_ali']) { ?>
<tr>
<td class="tl">阿里旺旺</td>
<td class="tr"><input type="text" size="20" name="post[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($AJ['im_msn']) { ?>
<tr>
<td class="tl">MSN</td>
<td class="tr"><input type="text" size="30" name="post[msn]" id="msn" value="<?php echo $msn;?>"/></td>
</tr>
<?php } ?>
<?php if($AJ['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><input type="text" size="20" name="post[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">站内信提示音</td>
<td class="tr">
<div id="audition"></div>
<input type="radio" name="post[sound]" value="0" <?php if($sound==0) { ?>checked="checked"<?php } ?>
 id="sound_0"/><label for="sound_0"> 无</label>&nbsp;&nbsp;
<input type="radio" name="post[sound]" value="1" <?php if($sound==1) { ?>checked="checked"<?php } ?>
 id="sound_1"/> <a href="javascript:Inner('audition', sound('message_1'));Dd('sound_1').checked=true;void(0);" title="点击试听">提示音1</a>&nbsp;&nbsp;
<input type="radio" name="post[sound]" value="2" <?php if($sound==2) { ?>checked="checked"<?php } ?>
 id="sound_2"/> <a href="javascript:Inner('audition', sound('message_2'));Dd('sound_2').checked=true;void(0);" title="点击试听">提示音2</a>&nbsp;&nbsp;
<input type="radio" name="post[sound]" value="3" <?php if($sound==3) { ?>checked="checked"<?php } ?>
 id="sound_3"/> <a href="javascript:Inner('audition', sound('message_3'));Dd('sound_3').checked=true;void(0);" title="点击试听">提示音3</a>&nbsp;&nbsp;
</td>
</tr>
<?php if($MFD) { ?><?php echo fields_html('<td class="tl">', '<td class="tr">', $user, $MFD);?><?php } ?>
</tbody>
<tbody id="Tabs1" style="display:none;">
<tr>
<td class="tl">新支付密码</td>
<td class="tr"><input type="password" size="20" name="post[payword]" id="payword" onblur="validator('payword');"/>&nbsp;<span class="f_gray">如不更改支付密码，请留空</span> <span id="dpayword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">重复新支付密码</td>
<td class="tr"><input type="password" size="20" name="post[cpayword]" id="cpayword"/>&nbsp;<span id="dcpayword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">现有支付密码</td>
<td class="tr f_red"><input type="password" size="20" name="post[oldpayword]" id="oldpayword"/>&nbsp; 支付密码默认和注册设置密码相同&nbsp;&nbsp;<a href="send.php?action=payword"  class="t">找回支付密码</a><span id="doldpayword" class="f_red"></span></td>
</tr>
</tbody>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 保 存 " class="sBtn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="sBtn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">s('addmember');m('s3');</script>
<?php } else { ?>
<div class="con">
<table cellpadding="0" cellspacing="0" class="tb add">
<?php if($action == 'edit_all'){?>
<tr>
<th>ID</th>
<th >所在区域</th>
<th>公司名称</th>
<th>公司地址</th>
<th>公司电话</th>
<th>排名(双击修改)</th>
<th width="40">设置管理员</th>
</tr>
<?php foreach($companys_l as $k => $v){?>
<tr align="center">
<td width="32" height="30" ><?php echo $v['userid'];?></td>
<td><?php echo area_pos($v['areaid'], '');?></td>
<td><?php echo $v['company'];?></td>
<td><?php echo $v['address'];?></td>
<td><?php echo $v['telephone'];?></td>
<td class="double_click" companyid = '<?php echo $v['userid'];?>'><?php echo $v['level'];?></td>
<td>
<select class = "setmaster" companyid="<?php echo $v['userid'];?>">
<option value="">
</option>
<?php foreach($companys_l_s[$v['userid']] as $m){?>
<option value="<?php echo $m['userid']?>" <?php if($m['companymaster']) echo "selected"?>>
<?php echo $m['truename'];?>
</option>
<?}?>
</select>
</td>
</tr>
<?}?>
</table>
<?}else{?>
<tr>
<th>ID</th>
<th >会员名</th>
<th>真实姓名</th>
<th>添加时间</th>
<th>最后登录</th>
<th>登录次数</th>
<th width="40">删除</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td width="32" height="30" ><?php echo $v['userid'];?></td>
<td><?php echo $v['username'];?></td>
<td><?php echo $v['truename'];?></td>
<td class="px11 f_gray" title="更新时间 <?php echo $v['editdate'];?>"><?php echo $v['editdate'];?></td>
<td><?php echo $v['logindate'];?></td>
<td><?php echo $v['logintimes'];?></td>
<td><a href="addmember.php?action=delete&userid=<?php echo $v['userid'];?>" onclick="if(!confirm('确定要删除吗？此操作将不可撤销')) return false;"><img width="16" height="16" src="image/delete.png" title="删除" alt=""/></a></td>
</tr>
<?php } } ?>
</table>
<?}?>
</div>
<?if($action == 'edit_all'){?><div class= "addcompany" style="cursor: pointer;float:right;width:60;background-color:#1F5288;text-align:center;border-radius:2px;color:#fff;padding-left:4px;padding-right:4px">添加中介</div><?}?>
<?php if($MG['addmember_limit']) { ?>
<div class="limit">总共可发 <span class="f_b f_red"><?php echo $MG['addmember_limit'];?></span> 条&nbsp;&nbsp;&nbsp;当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">
$(document).ready(function(){
//================初始化数据
var preval = "";//定义双击修改的时候的初始值
var company_arr = [];
if(JSON.stringify('<?php echo $companys_n?>') != '{}'){
var companys = $.parseJSON('<?php echo $companys_n?>');
}else{
var companys = {};
}
for (x in companys)
  {
   company_arr.push(x);
  }
//===========end
//===========选择管理员
$("select.setmaster").bind("change",function(){
var companyid = $(this).attr("companyid");
// console.log($(this));
var val = $(this).val();
$.post("addmember.php?action=edit_all",{v:val,companyid:companyid,type:'setmaster'},function(res){
console.log(res);
});
});
//=========end
//双击修改排序========================
$(".double_click").dblclick(function(){
var db_this = $(this);
var companyid = db_this.attr("companyid");
var preval = db_this.html();
db_this.html("<input/>");
var input = $(this).find("input");
input.blur(function(){
var inputval = $(this).val();
if(isNaN(inputval)){//不是数字
// db_this.html(preval);
}else{
$.post("addmember.php?action=edit_all",{level:inputval,companyid:companyid,type:'doubleset'},function(res){
db_this.html(inputval);
});
}
});
});
//========================
//================添加按钮实现
$(".addcompany").click(function(){
// var companys = ["dasdsa","dasdsa","derwer23"];
var tr = "<tr>";
tr += "<td></td><td></td><td><input class = 'findcompany'/ style='width:90%'></td><td></td><td></td><td></td><td></td></tr>";
$("table.tb.add").append(tr);
$(".findcompany").autocomplete({
source: company_arr,
messages: {
noResults: '',
results: function() {}
}
});
$("input.findcompany").blur(function(){
var input_obj = $(this);
var input_obj_val = input_obj.val();
var td_select = '';
var exit_n = $.inArray(input_obj_val, company_arr)
  if(exit_n !=-1)
{
var input_obj_info = companys[input_obj_val];
// console.log(input_obj_info);
input_obj.closest("tr").find("td").each(function(index){
switch (index) {
case 0:
$(this).html(input_obj_info.userid);
break;
case 1:
// $(this).html(input_obj_info.areaid);
break;
case 2:
$(this).html(input_obj_info.company);
break;
case 3:
$(this).html(input_obj_info.address);
break;
case 4:
$(this).html(input_obj_info.telephone);
break;
case 5:
$(this).html(input_obj_info.level);
$(this).addClass("double_click").attr("companyid",input_obj_info.userid);
break;
case 6:
var a_html = "<select class = 'setmaster' companyid="+input_obj_info.userid+"><option value=''></option></select>";
$(this).html(a_html);
break;
}
$.post("addmember.php?action=edit_all",{type:"getline",companyid:input_obj_info.userid,areaid:input_obj_info.areaid},function(res){
if(JSON.stringify(res) != '{}'){
res = $.parseJSON(res);
var options = '';
for(x in res){
options += "<option value="+res[x].userid+">"+res[x].truename+"</option>";
}
$("select[companyid="+input_obj_info.userid+"]").append(options);
}
});
console.log(index);
$("select.setmaster").bind("change",function(){
var companyid = $(this).attr("companyid");
// console.log($(this));
var val = $(this).val();
$.post("addmember.php?action=edit_all",{v:val,companyid:companyid,type:'setmaster'},function(res){
console.log(res);
});
});
// $(this).html();
$(".double_click").dblclick(function(){
var db_this = $(this);
var companyid = db_this.attr("companyid");
var preval = db_this.html();
db_this.html("<input />");
var input = $(this).find("input");
input.blur(function(){
var inputval = $(this).val();
if(isNaN(inputval)){//不是数字
db_this.html(preval);
}else{
$.post("addmember.php?action=edit_all",{level:inputval,companyid:companyid,type:'doubleset'},function(res){
db_this.html(inputval);
});
}
});
});
});
company_arr.splice(exit_n,1);
}else{
input_obj.val("");
}
});
});
//====================end
});
</script>
<script type="text/javascript">s('addmember');m('s3');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
Dd('username').focus();
var vid = '';
function validator(id) {
vid = id;
makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+Dd(id).value, 'ajax.php', '_validator');
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
<?php if($MOD['question_register']) { ?>
f = 'answer';
if(Dd(f).value == '') {
Dmsg('请回答验证问题', f);
return false;
}
<?php } ?>
<?php if($MOD['captcha_register']) { ?>
f = 'captcha';
if(!is_captcha(Dd(f).value)) {
Dmsg('请填写验证码', f);
return false;
}
<?php } ?>
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
function _SendCode() {
var f = 'email';
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('send_code').value = xmlHttp.responseText == 1 ? '发送成功' : '立即发送';
Dd('send_code').disabled = xmlHttp.responseText == 1 ? true : false;
if(xmlHttp.responseText == 1) {
setTimeout('StopCode()', 5000);
Ds('sendok');
Dd('dsendok').innerHTML = '<img src="image/ico_mailok.gif" align="absmiddle"/> <span class="f_green">邮件发送成功，</span> <a href="goto.php?action=emailcode&email='+Dd(f).value+'" target="_blank">立即查收</a>';
} else if(xmlHttp.responseText == 2) {
err_msg('邮件格式错误，请检查', f);
Df(f);
} else if(xmlHttp.responseText == 3) {
err_msg('邮件地址已存在，请更换', f);
Df(f);
} else if(xmlHttp.responseText == 4) {
err_msg('此邮件域名已经被禁止注册，请更换', f);
Df(f);
} else {
alert('未知错误，请重试');
}
}
}
function StopCode() {
Dd('send_code').disabled = true;
var i = 30;
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
</script>
<?php } ?>
</div></div></div>
</body>
</html>
