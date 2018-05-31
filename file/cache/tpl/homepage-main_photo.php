<?php defined('IN_AIJIACMS') or exit('Access Denied');?><div class="main_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=photo', $domain);?>"><img src="<?php echo $MODULE['4']['linkurl'];?>image/more.gif" title="更多"/></a></span><strong><?php echo $main_name[$HM];?></strong></div></div>
<div class="main_body">
<?php $tags=tag("moduleid=12&condition=status>2 and username='$username'&pagesize=".$main_num[$HM]."&order=addtime desc&fields=itemid,title,linkurl,thumb,addtime,items,open&template=null");?>
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i%4==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="25%" height="180">
<div class="thumb" onmouseover="this.className='thumb thumb_on';" onmouseout="this.className='thumb';">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=photo&itemid='.$t['itemid'], $domain);?><?php } ?>
"><img src="<?php echo $t['thumb'];?>" width="120" height="90" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>"/></a>
<div><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=photo&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></div>
<p><?php echo $t['items'];?>图<?php if($t['open']<3) { ?> <img src="<?php echo $MODULE['2']['linkurl'];?>image/ico_lock.gif" style="border:none;padding:0;" align="absmiddle" title="访问受限"/><?php } ?>
</p>
<p><?php echo timetodate($t['addtime'], 3);?></p>
</div>
</td>
<?php if($i%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>