<?php defined('IN_AIJIACMS') or exit('Access Denied');?><div class="main_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=sale', $domain);?>"><img src="<?php echo $MODULE['4']['linkurl'];?>image/more.gif" title="更多"/></a></span><strong><?php echo $main_name[$HM];?></strong></div></div>
<div class="main_body">
<?php $tags=tag("moduleid=5&condition=status>2 and username='$username'&pagesize=".$main_num[$HM]."&order=edittime desc&fields=itemid,title,linkurl,thumb,edittime&template=null");?>
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i%5==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="20%" height="180">
<div class="thumb" onmouseover="this.className='thumb thumb_on';" onmouseout="this.className='thumb';">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sale&itemid='.$t['itemid'], $domain);?><?php } ?>
"><img src="<?php echo imgurl($t['thumb']);?>" width="100" height="100" alt="<?php echo $t['alt'];?>"/></a>
<div><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sale&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></div>
<p><?php echo timetodate($t['edittime'], 3);?></p>
</div>
</td>
<?php if($i%5==4) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>