<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show">您当前的位置：<a href="<?php echo $COM['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> &raquo; <?php echo $title;?><?php } ?>
</div>
<?php if($itemid) { ?>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<div class="title"><?php echo $title;?></div>
<div class="info">上传时间：<?php echo timetodate($addtime, 3);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浏览次数：<?php echo $hits;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MENU[$menuid]['linkurl'];?>">返回列表</a></div>
<div class="content">
<table cellpadding="5" cellspacing="1" width="100%" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FAFAFA" width="120" class="t_c f_b">发证机构：</td>
<td bgcolor="#FFFFFF">&nbsp;&nbsp;<?php echo $authority;?></td>
<td bgcolor="#FAFAFA" width="120" class="t_c f_b">发证时间 ：</td>
<td bgcolor="#FFFFFF">&nbsp;&nbsp;<?php echo timetodate($fromtime, 3);?></td>
</tr>
<tr>
<td bgcolor="#FAFAFA" class="t_c f_b">上传时间 ：</td>
<td bgcolor="#FFFFFF">&nbsp;&nbsp;<?php echo timetodate($addtime, 3);?></td>
<td bgcolor="#FAFAFA" class="t_c f_b">有效期至 ：</td>
<td bgcolor="#FFFFFF">&nbsp;&nbsp;<?php if($totime) { ?><?php echo timetodate($totime, 3);?><?php } else { ?>永久<?php } ?>
</td>
</tr>
</table>
</div>

</div>
<?php if($content) { ?>
<div class="main_head"><div><strong>证书介绍</strong></div></div>
<div class="main_body">
<div class="content"><?php echo $content;?></div>
</div>
<?php } ?>
<div class="main_head"><div><strong>证书图片</strong></div></div>
<div class="main_body">
<br/><center><a href="<?php echo $image;?>" target="_blank"><img src="<?php echo $image;?>" onload="if(this.width>600) this.width=600;" alt="<?php echo $title;?>"/></a></center><br/>
</div>
<?php } else { ?>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<div class="px13 lh18">
<table cellpadding="2" cellspacing="2" width="100%" align="center">
<tr bgcolor="#F1F1F1">
<th width="130" height="25">经纪人</th>
<th>经纪人姓名</th>

<th>日期</th>

</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<td style="padding:10px 0 10px 0;"><a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo AJ_SKIN;?>image/nophoto_90x90.gif<?php } ?>
" width="100" height="100"/></a></td>
<td bgcolor="#FBFBFB"><a href="<?php echo $v['linkurl'];?>"><?php echo $v['username'];?></a></td>

<td bgcolor="#FBFBFB" class="f_gray"><?php echo timetodate($v['editdate'], 3);?></td>

</tr>
<?php } } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
</div>
<?php } ?>
<?php include template('footer', $template);?>