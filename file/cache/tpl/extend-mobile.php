<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="nav">当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; 手机浏览</div>
</div>
<div class="m">
<div style="background:url('<?php echo AJ_STATIC;?>file/image/mobile_bg.png') no-repeat;height:490px;">
<div style="padding:50px 50px 0 540px;">
<div style="line-height:22px;font-size:14px;">
<br/>
<br/>
<br/>
<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;访问网址：</strong><?php if($action=='pc') { ?><span class="f_red">抱歉，请用手机访问</span><?php } ?>
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在手机浏览器地址栏输入：<a href="<?php echo $url;?>" class="b"><?php echo $url;?></a><br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;或者用二维码扫描软件扫描下面的二维码<br/>
</div>
<br/>
<div style="padding-left:100px;"><img src="http://qr.liantu.com/api.php?text=<?php echo urlencode($url);?>&w=100&m=2&el=L" widht="100" height="100"/>
</div>
</div>
</div>
</div>
