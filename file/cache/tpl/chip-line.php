<?php defined('IN_AIJIACMS') or exit('Access Denied');?>var aijiacms_userid = <?php echo $_userid;?>;
var aijiacms_username = '<?php echo $_username;?>';
var aijiacms_message = <?php echo $_message;?>;
var aijiacms_chat = <?php echo $_chat;?>;
var aijiacms_member = '';
<?php if($_userid) { ?>
aijiacms_member += ' <ul><li>您好：<?php echo $_truename;?></li><li class="message"><a class="message_a <?php if($_message) { ?>has_message<?php } ?>
" href="<?php echo $MODULE['2']['linkurl'];?>message.php" target="_blank">消息(<span><?php echo $_message;?></span>)</a></li><li class="user_place"><a class="user_place_a" href="<?php echo $MODULE['2']['linkurl'];?>" title="用户中心" target="_blank">用户中心</a></li><li class="esc"><a href="<?php echo $MODULE['2']['linkurl'];?>logout.php">[退出]</a></li></ul>';
<?php } else { ?>
<?php if($EXT['oauth']) { ?>
var oauth_site = '<?php echo get_cookie('oauth_site');?>';
var oauth_user = '<?php echo get_cookie('oauth_user');?>';
aijiacms_member += (oauth_user && oauth_site) ? '<img src="<?php echo AJ_PATH;?>api/oauth/'+oauth_site+'/ico.png" align="absmiddle"/> 欢迎，<strong>'+oauth_user+'</strong> | <a href="<?php echo AJ_PATH;?>api/oauth/'+oauth_site+'/index.php?time=<?php echo $AJ_TIME;?>">绑定帐号</a> | <a href="javascript:" onclick="oauth_logout();">注销登录</a>' : '欢迎，<span class="f_red">客人</span> | <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $AJ['file_login'];?>">请登录</a> | <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $AJ['file_register'];?>">免费注册</a> | <a href="<?php echo $MODULE['2']['linkurl'];?>send.php">忘记密码?</a>';
<?php } else { ?>
aijiacms_member += ' <span>您好，欢迎来到<?php echo $AJ['sitename'];?>！</span><span class="login"><b>[</b><a href="<?php echo $MODULE['2']['linkurl'];?>login.php" title="">登陆</a><b>]</b></span>&nbsp;&nbsp;<span><b>[</b><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $AJ['file_register'];?>" title="">免费注册</a><b>]</b></span>';
<?php } ?>
<?php } ?>
$('#aijiacms_member').html(aijiacms_member);
<?php if($AJ['city']) { ?>
$('#aijiacms_city').html('<?php echo $city_name;?>');
<?php } ?>
<?php if($_userid && $AJ['pushtime']) { ?>window.setInterval('PushNew()',<?php echo $AJ['pushtime'];?>*1000);<?php } ?>
