<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt">申请受理</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_hid">*</span> 会员名</td>
<td><?php echo $item['username'];?> <a href="javascript:_user('<?php echo $item['username'];?>');" class="t">[资料]</a></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 提现金额</td>
<td class="f_red"><strong><?php echo $item['amount'];?></strong></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 手续费</td>
<td class="f_blue"><strong><?php echo $item['fee'];?></strong></td>
</tr>
<tr class="on">
<td class="tl"><span class="f_hid">*</span> 收款方式</td>
<td><?php echo $item['bank'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 收款帐号</td>
<td><?php echo $item['account'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 收款人</td>
<td><?php echo $item['truename'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 手机</td>
<td><?php echo $member['mobile'];?></td>
</tr>
<?php if($member['qq']) { ?>
<tr>
<td class="tl"><span class="f_hid">*</span> QQ</td>
<td><?php echo im_qq($member['qq']);?> <?php echo $member['qq'];?></td>
</tr>
<?php } ?>
<?php if($member['msn']) { ?>
<tr>
<td class="tl"><span class="f_hid">*</span> MSN</td>
<td><?php echo im_msn($member['msn']);?> <?php echo $member['msn'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_hid">*</span> 申请时间</td>
<td><?php echo $item['addtime'];?></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 申请IP</td>
<td><?php echo $item['ip'];?></td>
</tr>
<tr class="on">
<td class="tl"><span class="f_red">*</span> 受理结果</td>
<td>
<?php
unset($_status[0]);
foreach($_status as $k=>$v) {
?>
<input name="status" type="radio" value="<?php echo $k;?>"/> <?php echo $v;?>&nbsp;
<?php } ?>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 原因及备注</td>
<td><input name="note" type="text" size="40"/></td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span> 注意</td>
<td class="f_red">此表单一经提交，将不可再修改或删除，请务必谨慎操作</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></div>
</form>
<script type="text/javascript">Menuon(0);</script>
<?php include tpl('footer');?>