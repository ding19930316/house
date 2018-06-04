<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', $module);?>
<div class="tinfo">
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="action"><a href="avatar.php"><span>管理头像</span></a></td>
<td class="tab_nav">&nbsp;</td>
</tr>
</table>
</div>
<table cellpadding="0" cellspacing="0">
<tr>
<td valign="top" style="border-right:#DDDDDD 1px solid;padding-right:5px;" width="150" align="center">
<img src="<?php echo useravatar($_username, 'large');?>&time=<?php echo $AJ_TIME;?>" title="大头像"/>
<?php if($avatar) { ?><br/><br/><a href="avatar.php?action=delete" class="t" onclick="return confirm('确定要删除您的个人头像吗？');">[删除头像]</a><?php } ?>
</td>
<td width="650" height="450"><div id="avatarshow">&nbsp;</div></td>
</tr>
</table>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/swfobject.js"></script>
<script type="text/javascript">
if(swfobject.hasFlashPlayerVersion("8")) {
var flashVars = 
{
imgUrl: '<?php echo AJ_PATH;?>api/avatar/bg.jpg',
uploadUrl: '<?php echo AJ_PATH;?>api/avatar/upload.php?code=<?php echo encrypt("$_userid");?>',
uploadSrc: false,
copyright: '<?php echo decrypt('AztZdgcgU3QAagAoUCNRfAx1VnMBJVRkDmRXIAAnADoHOFlsAn8IPAY5CmA', 'aijiacms');?>'
};
swfobject.embedSWF('<?php echo AJ_PATH;?>api/avatar/avatar.swf', 'avatarshow', '650', '450', '8.0.0', '<?php echo AJ_STATIC;?>file/flash/expressInstall.swf', flashVars);
} else {
if(UA.match(/(iphone|ipad|ipod|mac os)/i)) {
$('#avatarshow').html('<center>抱歉，您的设备不支持Flash，无法使用此功能</center>');
} else {
$('#avatarshow').html('<center>抱歉，您的浏览器不支持Flash，无法使用此功能<br/><br/><a href="http://get.adobe.com/flashplayer/" target="_blank" class="t">点这里安装</a></center>');
}
}
function uploadevent(status) {
switch(status) {
case -1:
Go('?action=cancel');
break;
case 0:
alert('参数错误');
case 1:
Go('?action=update');
break;
case 2:
alert('请选择图片或拍照');
break;
case 3:
alert('图像格式错误');
Go('?action=error');
break;
default:
alert('上传失败，请重试');
Go('?action=error');
break;
}
}
s('edit');
<?php if($itemid) { ?>
Dd('myavatar').src=Dd('myavatar').src+'&time=<?php echo $itemid;?>}';
<?php } ?>
</script>
</div></div></div>
