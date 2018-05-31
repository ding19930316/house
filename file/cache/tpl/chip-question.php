<?php defined('IN_AIJIACMS') or exit('Access Denied');?><span onmouseover="if(Dd('question').style.display=='none') reloadquestion();" onmouseout="checkanswer(Dd('answer').value);"><span id="question" style="display:none;"><span id="questionstr"></span>&nbsp;&nbsp;<a href="javascript:reloadquestion();">[换个问题]</a><br/></span>
<input name="answer" id="answer" type="text" size="30" onblur="checkanswer(this.value);"/><span id="canswer"></span>
</span>
<script type="text/javascript">
function reloadquestion() {
Dd('question').style.display = '';
Dd('canswer').innerHTML = '';
Dd('answer').value = '';
Dd('canswer').innerHTML = '';
s = document.createElement("script");
s.type = "text/javascript";
s.src = "<?php echo AJ_PATH;?>api/captcha.png.php?action=question&refresh="+Math.random()+".js";
document.body.appendChild(s);
}
function checkanswer(s) {
if(s.length < 1) {
Dd('answer').focus; return;
}
makeRequest('action=question&answer='+s, AJPath, '_checkanswer');
}
function _checkanswer() {    
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
if(xmlHttp.responseText == '0') {
Dd('canswer').innerHTML = '&nbsp;&nbsp;<img src="<?php echo AJ_SKIN;?>image/check_right.gif" align="absmiddle"/>';
} else {
Dd('answer').focus;
Dd('canswer').innerHTML = '&nbsp;&nbsp;<img src="<?php echo AJ_SKIN;?>image/check_error.gif" align="absmiddle"/>';
}
}
}
</script>