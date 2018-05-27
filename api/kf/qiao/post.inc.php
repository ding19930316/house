<?php
defined('IN_AIJIACMS') or exit('Access Denied');
preg_match("/^[0-9a-z]{32}$/", $kf) or $kf = '';
?>
<tr>
<td class="tl">在线客服帐号</td>
<td class="tr">
<input type="text" name="setting[kf]" id="kf" value="<?php echo $kf;?>" size="40"/>&nbsp;&nbsp;
<?php if($kf) { ?>
<a href="http://qiao.baidu.com/" class="t" target="_blank">帐号管理</a>
<?php } else { ?>
<a href="http://qiao.baidu.com/" class="t" target="_blank">帐号申请</a>
<?php } ?><br/><br/>
提示：注册后获取的客服代码"...hm.baidu.com/h.js%3F<span class="f_red">321c361fa45809b610d5ec4ae9a392c2</span>' type=..."中<span class="f_red">321c361fa45809b610d5ec4ae9a392c2</span>即为客服帐号
</td>
</tr>