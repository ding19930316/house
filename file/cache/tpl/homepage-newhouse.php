<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show">您当前的位置：<a href="<?php echo $COM['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> &raquo; <?php echo $title;?><?php } ?>
</div>
<?php if($itemid) { ?>
<div class="main_head"><div><strong><?php echo $title;?></strong></div></div>
<div class="main_body">
<table width="100%" align="center">
<tr>
<td width="270" valign="top">
<div class="album">
<table width="100%" cellpadding="0" cellspacing="0">
<tr align="center">
<td width="250" valign="top"><div><span id="abm" title="点击图片查看大图"><img src="<?php echo $albums['0'];?>" onload="if(this.width>240){this.width=240;}" onmouseover="SAlbum(this.src);" onmouseout="HAlbum();" onclick="PAlbum(this);" id="DIMG"/></span></div></td>
</tr>
<tr>
<td>
<?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?><img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $albums[$k];?>');"class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>
" id="t_<?php echo $k;?>"/><?php } } ?></td>
</tr>
<tr align="center">
<td height="30" onclick="PAlbum(Dd('DIMG'));"><img src="<?php echo AJ_SKIN;?>image/ico_zoom.gif" width="16" height="16" align="absmiddle"/> 点击图片查看大图</td>
</tr>
</table>
</div>
</td>
<td valign="top">
<div id="imgshow" style="display:none;"></div>
<table width="100%" cellpadding="4" cellspacing="4">
<tr>
<td width="80" class="f_dblue">产 品：</td>
<td><span id="hits" class="f_r">浏览次数：<?php echo $hits;?></span><strong><?php echo $title;?></strong>&nbsp;</td>
</tr>
<?php if($model) { ?>
<tr>
<td class="f_dblue">型 号：</td>
<td><?php echo $model;?>&nbsp;</td>
</tr>
<?php } ?>
<?php if($standard) { ?>
<tr>
<td class="f_dblue">规 格：</td>
<td><?php echo $standard;?>&nbsp;</td>
</tr>
<?php } ?>
<?php if($brand) { ?>
<tr>
<td class="f_dblue">品 牌：</td>
<td><?php echo $brand;?>&nbsp;</td>
</tr>
<?php } ?>
<tr>
<td class="f_dblue">单 价：</td>
<td class="f_b f_orange"><?php if($price>0) { ?><?php echo $price;?><?php echo $AJ['money_unit'];?>/<?php echo $unit;?><?php } else { ?>面议<?php } ?>
&nbsp;</td>
</tr>
<tr>
<td class="f_dblue">最小起订量：</td>
<td class="f_b f_orange"><?php if($minamount) { ?><?php echo $minamount;?> <?php echo $unit;?><?php } ?>
&nbsp;</td>
</tr>
<tr>
<td class="f_dblue">供货总量：</td>
<td class="f_b f_orange"><?php if($amount) { ?><?php echo $amount;?> <?php echo $unit;?><?php } ?>
</td>
</tr>
<tr>
<td class="f_dblue">发货期限：</td>
<td>自买家付款之日起  <span class="f_b f_orange"><?php if($days) { ?><?php echo $days;?><?php } ?>
</span> 天内发货</td>
</tr>
<tr>
<td class="f_dblue">更新日期：</td>
<td><?php echo $editdate;?>&nbsp;&nbsp;有效期至：<?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?>
<?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?>
</td>
</tr>
<?php if($could_inquiry && !$expired) { ?>
<tr>
<td class="f_dblue">&nbsp;</td>
<td><a href="#message"><img src="<?php echo AJ_SKIN;?>image/btn_inquiry.gif" alt="意向登记"/></a></td>
</tr>
<?php } ?>
</table>
<script type="text/javascript">
document.write('<br/><br/><center><a href="<?php echo $MODULE['4']['linkurl'];?>home.php?action=prev&itemid=<?php echo $itemid;?>&username=<?php echo $username;?>" class="t">&#171;上一个房源</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MODULE['4']['linkurl'];?>home.php?action=next&itemid=<?php echo $itemid;?>&username=<?php echo $username;?>" class="t">下一个房源&#187;</a></center>');
</script>
</td>
</tr>
</table>
</div>
<div class="main_head"><div><strong>详细信息</strong></div></div>
<div class="main_body">
<?php if($CP) { ?><?php include template('property', 'chip');?><?php } ?>
<div class="content" id="content"><?php echo $content;?></div>
</div>
<?php if($could_inquiry) { ?>
<div class="main_head"><div><strong><span id="message_title">意向登记单</span><a name="message"></a></strong></div></div>
<div class="main_body">
<iframe src="<?php echo $inquiry_url;?>" name="fra" id="fra" style="width:98%;height:488px;" scrolling="no" frameborder="0"></iframe>
</div>
<?php } ?>
<?php if($could_comment && in_array($moduleid, explode(',', get_module_setting(3, 'comment_module')))) { ?>
<div id="comment_div" style="display:;">
<div class="main_head"><div><span class="f_r px12">共<span id="comment_count">0</span>条&nbsp;&nbsp;</span><strong><span id="message_title">相关评论</span></strong></div></div>
<div class="main_body"><iframe src="<?php echo $MODULE['3']['linkurl'];?>comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>" id="aijiacms_comment" style="width:100%;" scrolling="no" frameborder="0"></iframe>
</div>
</div>
<?php } ?>
<script type="text/javascript">
try {Dd('type_<?php echo $typeid;?>').style.backgroundColor = '#F1F1F1';}catch (e){}
</script>
<script type="text/javascript">
var content_id = 'content';
var img_max_width = <?php echo $MOD['max_width'];?>;
</script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/content.js"></script>
<?php } else { ?>
<div class="main_head"><div><strong>房源分类</strong></div></div>
<div class="main_body">
<div class="px13 lh18">
<?php $tags=tag("table=type&condition=item='product-".$userid."'&pagesize=40&order=listorder asc,typeid desc&template=null");?>
<div><span class="f_r"><a href="<?php echo $MENU[$menuid]['linkurl'];?>" class="t">显示全部</a>&nbsp;</span>&nbsp;&nbsp;<strong>我公司经营以下几类房源，请查看： </strong></div>
<table width="98%" cellpadding="3" cellspacing="3" align="center">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i%3==0) { ?><tr><?php } ?>
<td width="33%" id="type_<?php echo $t['typeid'];?>"><a href="<?php echo userurl($username, 'file=sale&typeid='.$t['typeid'], $domain);?>" title="<?php echo $t['typename'];?>" id="name_<?php echo $t['typeid'];?>"><?php echo set_style($t['typename'], $t['style']);?></a></td>
<?php if($i%3==2) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
</div>
<div class="main_head">
<div>
<span class="f_r f_n px12">
<?php if($view) { ?>
<a href="<?php echo userurl($username, 'file=sale&typeid='.$typeid, $domain);?>">以橱窗方式浏览</a> | <strong>以目录方式浏览</strong>
<?php } else { ?>
<strong>以橱窗方式浏览</strong> | <a href="<?php echo userurl($username, 'file=sale&view=1&typeid='.$typeid, $domain);?>">以目录方式浏览</a>
<?php } ?>
</span>
<strong><?php echo $MENU[$menuid]['name'];?></strong>
</div>
</div>
<div class="main_body">
<?php if($view) { ?>
<table cellpadding="5" cellspacing="1" width="100%" align="center">
<tr bgcolor="#F1F1F1">
<th width="100">图片</th>
<th>标 题</th>
<th width="110">更新时间</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center"<?php if($k%2==1) { ?> bgcolor="#FBFBFB"<?php } ?>
>
<td height="100"><a href="<?php echo $v['linkurl'];?>"><img src="<?php echo imgurl($v['thumb'], 1);?>" width="80" height="80" alt="" style="border:#C0C0C0 1px solid;"/></a></td>
<td align="left" class="lh18" valign="top"><a href="<?php echo $v['linkurl'];?>" class="px13"><?php echo $v['title'];?></a><br/><span class="f_gray"><?php echo $v['introduce'];?></span>
</td>
<td><?php echo timetodate($v['edittime'], 3);?></td>
</tr>
<?php } } ?>
</table>
<?php } else { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%4==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="25%" height="180">
<div class="thumb" onmouseover="this.className='thumb thumb_on';" onmouseout="this.className='thumb';">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php echo imgurl($v['thumb'], 1);?>" width="100" height="100" alt="<?php echo $v['alt'];?>"/></a>
<div><a href="<?php echo $v['linkurl'];?>"><?php echo $v['title'];?></a></div>
<p><?php echo timetodate($v['edittime'], 3);?></p>
</div>
</td>
<?php if($k%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
</div>
<script type="text/javascript">
try {Dd('type_<?php echo $typeid;?>').innerHTML = '<strong>'+Dd('name_<?php echo $typeid;?>').innerHTML+'</strong>';}catch (e){}
</script>
<?php } ?>
<?php include template('footer', $template);?>