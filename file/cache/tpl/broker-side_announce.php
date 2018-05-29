<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if($announce) { ?>
<br>
<div class="union">
         <h3><?php echo $side_name[$HS];?></h3>
       
<div style="line-height:180%;height:100px;overflow:hidden;padding:0 5px 0 5px;">
<marquee onmouseOver="this.stop();" onmouseout="this.start();" scrollamount="1" scrolldelay="85" direction="up" behavior="scroll" height="100"><?php echo $announce;?></marquee>
</div>
</div>
<?php } ?>
