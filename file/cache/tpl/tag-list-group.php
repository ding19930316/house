<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div class="bd">
<ul>
<li class="h1"><a href="#" class="youhui">[团购]</a><a href="<?php echo $t['linkurl'];?>" class="price" target="_blank"><?php echo $t['title'];?></a></li>
<li class="cuxiao"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" class="leftImg" alt="<?php echo $t['alt'];?>" height="120" width="180"></a>
     <p class="yuanjia"><span class="baomings"><b><?php echo $t['orders'];?></b>人已报名</span>市场价格：<span class="zhuzhai"><?php echo $t['marketprice'];?></span></p>
</li>
<li class="junjia"><a href="<?php echo $t['linkurl'];?>" class="kankan<?php if($t['process'] == 0 || $t['process'] == 1 || $t['process'] == 2) { ?><?php } else { ?>_over<?php } ?>
" target="_blank"></a><?php echo $t['price'];?></li>
</ul>
<img class="ft" src="<?php echo AJ_SKIN;?>images/tuan/ul_bg.gif">
</div>
<?php } } ?>
<?php if($showpage && $pages) { ?>
 <div class="page">
    <table border="0" cellpadding="1" cellspacing="5">
  <tbody><tr>
    <td class="align_c">
<?php echo $pages;?>
</td>
  </tr>
</tbody></table> 
 </div>
<?php } ?>
