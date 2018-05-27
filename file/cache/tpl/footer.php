<?php defined('IN_AIJIACMS') or exit('Access Denied');?>
<div id="footer">
<p> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>">网站首页</a>
<?php echo tag("table=webpage&condition=item=1&areaid=$cityid&order=listorder desc,itemid desc&template=list-webpage");?>
<span>|</span> <a href="<?php echo $MODULE['1']['linkurl'];?>sitemap/">网站地图</a>
<?php if($EXT['guestbook_enable']) { ?> <span>|</span> <a href="<?php echo $EXT['guestbook_url'];?>">网站留言</a><?php } ?>
<?php if($EXT['ad_enable']) { ?> <span>|</span> <a href="<?php echo $EXT['ad_url'];?>">广告服务</a><?php } ?>
</p>

<p>ICP备案号：<?php if($AJ['icpno']) { ?><a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $AJ['icpno'];?></a><?php } ?>
 客服热线<?php if($AJ['telephone']) { ?> <?php echo $AJ['telephone'];?><?php } ?>
 （工作时间：周一至周五8:00至18:00）</p>
<p><?php echo $AJ['copyright'];?></p>
</div>
<script type="text/javascript">
<?php if($aijiacms_task) { ?>
show_task('<?php echo $aijiacms_task;?>');
<?php } else { ?>
<?php include AJ_ROOT.'/api/task.inc.php';?>
<?php } ?>
</script>
</body>
</html>