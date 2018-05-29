<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!--底部-->
<div class="clear"></div>
    <div id="foot" style="padding-bottom:20px;">
  <div id="footer">
  <p class="hui">
  <a href="<?php echo $COM['linkurl'];?>">网站首页</a>
  <?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
&nbsp;|&nbsp;<a href="<?php echo $v['linkurl'];?>"><?php echo $v['name'];?></a>
<?php } } ?>
<?php if($api_stats && $stats) { ?>
<?php include AJ_ROOT.'/api/stats/'.$api_stats.'/show.inc.php';?>
<?php } ?>
  </p>
  </div>
</div>
<script type="text/javascript">show_task('<?php echo $aijiacms_task;?>');</script></div>
<script type="text/javascript">Dd('position').innerHTML = Dd('pos_show').innerHTML;</script>
<?php if($api_kf && $kf) { ?>
<?php include AJ_ROOT.'/api/kf/'.$api_kf.'/show.inc.php';?>
<?php } ?>
</body>
</html>