<?php defined('IN_AIJIACMS') or exit('Access Denied');?></td>
</tr>
</table>
</div>
<script type="text/javascript">
if(document.body.clientHeight > Dd('main').scrollHeight) Dd('main').style.height=document.body.clientHeight+'px';
if(get_cookie('m_side') == 11 && Dd('side_oh').className == 'side_h') {Dh('side');Dd('side_oh').className = 'side_s';}
var aijiacms_message = <?php echo $_message;?>;
var aijiacms_chat = <?php echo $_chat;?>;
<?php if($_message && $_sound) { ?>
if(window.location.href.indexOf('message.php') == -1) $('#aijiacms_space').html(sound('message_<?php echo $_sound;?>'));
<?php } ?>
<?php if($_chat) { ?>
if(window.location.href.indexOf('chat.php') == -1) $('#aijiacms_space').html(sound('chat_new'));
<?php } ?>
<?php if($_userid && $AJ['pushtime']) { ?>
window.setInterval('PushNew()',<?php echo $AJ['pushtime'];?>*1000);
<?php } ?>
</script>
</body>
</html>