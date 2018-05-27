<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">交易详情</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">商品名称</td>
<td class="tr"><a href="<?php echo $item['linkurl'];?>" target="_blank" class="t f_b"><?php echo $item['title'];?></a></td>
</tr>
<tr>
<td class="tl">订单单号</td>
<td><?php echo $item['itemid'];?></td>
</tr>
<tr>
<td class="tl">商品图片</td>
<td class="tr"><a href="<?php echo $item['linkurl'];?>" target="_blank"><img src="<?php if($item['thumb']) { ?><?php echo $item['thumb'];?><?php } else { ?><?php echo AJ_SKIN;?>image/nopic60.gif<?php } ?>" width="60" height="60"/></a></td>
</tr>
<tr>
<td class="tl">卖家</td>
<td><a href="javascript:_user('<?php echo $item['seller'];?>');" class="t"><?php echo $item['seller'];?></a></td>
</tr>
<tr>
<td class="tl">姓名</td>
<td><a href="javascript:_user('<?php echo $item['buyer'];?>');" class="t"><?php echo $item['buyer_name'];?></a></td>
</tr>

<tr>
<td class="tl">手机</td>
<td><?php echo $item['buyer_mobile'];?></td>
</tr>
<tr>
<td class="tl">下单时间</td>
<td><?php echo $item['addtime'];?></td>
</tr>
<tr>
<td class="tl">更新时间</td>
<td><?php echo $item['updatetime'];?></td>
</tr>
<tr>
<td class="tl">备注说明</td>
<td><?php echo $item['note'];?></td>
</tr>
<tr>
<td class="tl">订单密码</td>
<td><?php echo $item['password'];?></td>
</tr>
<tr>
<td class="tl">金额</td>
<td class="f_red"><?php echo $item['amount'];?></td>
</tr>
<tr>
<td class="tl">数量</td>
<td><?php echo $item['number'];?></td>
</tr>
<tr>
<td class="tl">总额</td>
<td class="f_red f_b"><?php echo $item['money'];?></td>
</tr>

</table>

<script type="text/javascript">Menuon(1);</script>
<?php include tpl('footer');?>