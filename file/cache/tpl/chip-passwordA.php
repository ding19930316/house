<?php defined('IN_AIJIACMS') or exit('Access Denied');?><input name="password" type="password" class="input" style="width:140px;" id="password"<?php if(isset($password)) { ?> value="<?php echo $password;?>"<?php } ?>
/>&nbsp;
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/keyboard.js"></script>
<img src="<?php echo AJ_STATIC;?>file/image/keyboard.gif" title="密码键盘" alt="" class="c_p" onclick="_k('password', 'kb', this);"/>
<div id="kb" style="display:none;"></div>
<?php if($AJ['md5_pass'] && ($action != 'login' || ($action == 'login' && !$MOD['passport']))) { ?>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/md5.js"></script>
<script type="text/javascript">init_md5();</script>
<?php } ?>
