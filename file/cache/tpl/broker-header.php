<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo AJ_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $AJ['seo_delimiter'];?><?php } ?>
<?php echo $COM['company'];?><?php } ?>
</title>
<?php if($head_keywords) { ?><meta name="keywords" content="<?php echo $head_keywords;?>"/><?php } ?>
<?php if($head_description) { ?><meta name="description" content="<?php echo $head_description;?>"/><?php } ?>
<meta name="generator" content="aijiacms,www.aijiacms.com"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo AJ_SKIN;?>favicon.ico"/>
<link rel="bookmark" type="image/x-icon" href="<?php echo AJ_SKIN;?>favicon.ico"/>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<link href="<?php echo AJ_SKIN;?>reset.css" rel="stylesheet" type="text/css" />
<link rel=stylesheet type=text/css href="<?php echo $HSPATH;?>/company.css">
<META name=GENERATOR content="MSHTML 8.00.6001.18702">
<script type="text/javascript" src="<?php echo AJ_STATIC;?>lang/<?php echo AJ_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/page.js"></script>
<SCRIPT type=text/javascript src="<?php echo AJ_SKIN;?>js/jquery-1.4.2.min.js"></SCRIPT>
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo AJ_SKIN;?>js/jquery.pngFix.js"></script>
<script type="text/javascript"> 
$(function(){
$(document).pngFix();
});
</script> 
<![endif]--></HEAD>
<BODY>
<div id="top_bar">
<div class="cf wrap">
<div class="fl" id="aijiacms_member"></div>
<div class="fr">
<ul>
            <li class="home"><a class="a" href="<?php echo $MODULE['1']['linkurl'];?>" title="首页">首页</a></li>
<li class="favorite" id="favorite"><a class="a" href="<?php echo $MODULE['3']['linkurl'];?>shortcut.php" title="保存桌面">保存桌面</a></li>
<li class="phone"><a class="a" href="<?php echo $EXT['wap_url'];?>mobile.php" target="_blank">手机版</a></li>
                <li class="top_nav" ><a class="a" href="<?php echo $MODULE['1']['linkurl'];?>map">地图找房</a></li>
</ul>
</div>
</div>
</div>
<DIV id=main>
  <!--header-->
  