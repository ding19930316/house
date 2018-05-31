<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta charset="utf-8"/>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
<?php if($EXT['archiver_enable']) { ?>
<link rel="archives" title="<?php echo $AJ['sitename'];?>" href="<?php echo $EXT['archiver_url'];?>"/>
<?php } ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo AJ_STATIC;?>favicon.ico"/>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<link href="<?php echo AJ_SKIN;?>reset.css" rel="stylesheet" type="text/css" />
<?php if($moduleid>8) { ?><link rel="stylesheet" type="text/css" href="<?php echo AJ_SKIN;?><?php echo $module;?>.css"/><?php } ?>
<?php if($moduleid==3) { ?><link rel="stylesheet" type="text/css" href="<?php echo AJ_SKIN;?>style.css"/><?php } ?>
<?php if($moduleid!=8 && $moduleid!=6  && $moduleid!=1) { ?><link href="<?php echo AJ_SKIN;?>esf.css" rel="stylesheet" type="text/css" /><?php } ?>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>lang/<?php echo AJ_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/page.js"></script>
<?php if($lazy) { ?><script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.lazyload.js"></script><?php } ?>
<script src="<?php echo AJ_SKIN;?>js/sea.js" type="text/javascript"></script>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $AJ['seo_delimiter'];?><?php } ?>
<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $AJ['sitename'];?><?php } ?>
<?php } ?>
</title>
<script type="text/javascript">
<?php if($head_mobile && $EXT['mobile_goto']) { ?>
GoMobile('<?php echo $head_mobile;?>');
<?php } ?>
<?php $searchid = ($moduleid > 3 && $MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) ?$moduleid : 6;?>
 var apptype = "<?php echo $MODULE[$searchid]['moduledir'];?>";
</script>
</head><body>
<div id="top_bar">
<div class="cf wrap">
<div class="fl" id="aijiacms_member"></div>
<div class="fr">
<ul>
            <li class="home"><a class="a" href="<?php echo $MODULE['1']['linkurl'];?>" title="首页">首页</a></li>
<li class="favorite" id="favorite"><a class="a" href="<?php echo $MODULE['3']['linkurl'];?>shortcut.php" title="保存桌面">保存桌面</a></li>
<li class="phone"><a class="a" href="<?php echo $MODULE['1']['linkurl'];?>/wap/mobile.php" target="_blank">手机版</a></li>
                <?php if($head_mobile) { ?><li class="h_qrcode"><a href="javascript:Dqrcode();">二维码</a>&nbsp;</li><?php } ?>
                <li class="top_nav" ><a class="a" href="<?php echo $MODULE['1']['linkurl'];?>map">地图找房</a></li>
</ul>
</div>
</div>
</div>
<?php if($head_mobile) { ?><div id="aijiacms_qrcode" style="display:none;"></div><?php } ?>
<h1 class="hide_title"><?php echo $head_title;?></h1><div class="nav_box">
<div id="nav">
<h1><a href="<?php echo $MODULE['1']['linkurl'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo AJ_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($AJ['logo']) { ?><?php echo $AJ['logo'];?><?php } else { ?><?php echo AJ_SKIN;?>images/logo.gif<?php } ?>
" alt="<?php echo $AJ['sitename'];?>"/></a></h1>
<?php if($AJ['city']) { ?><div id="city_change">
  <span><?php echo $city_name;?></span>
                    <a href="<?php echo AJ_PATH;?>api/city.php" id="city_c">更改城市<i></i></a>
                </div> <?php } ?>
<a href="<?php echo $MODULE['1']['linkurl'];?>map" target="_blank" class="i_smap">地图找房</a>
<form id="i_search" method="post" target="_blank" autocomplete="off" action="">
<div  style = "display:none" class="search_item" data-type="<?php echo $MODULE[$searchid]['moduledir'];?>"><span><?php echo $MODULE[$searchid]['name'];?></span><s><i></i><u></u></s></div>
<ul  style = "display:none"  class="search_item_list none">
<?php $searchids = array(6,5,7,8,14,16,13);?>
<?php if(!in_array($searchid, $searchids)) { ?>
<?php $searchids[] = $searchid;?>
<?php } ?>
<?php if(is_array($searchids)) { foreach($searchids as $s) { ?>
<li data-type="<?php echo $MODULE[$s]['moduledir'];?>"><?php echo $MODULE[$s]['name'];?></li><?php } } ?>
</ul>
<input  style= "left:0px" type="text" name="keyword" class="keyword " placeholder="请输入搜索内容"  x-webkit-speech value="<?php echo $keyword;?>">
<button type="submit" title="搜索" value="<?php echo $keyword;?>">搜索</button>
</form>
</div>
</div>
<script>
</script>
<?php if($moduleid!=1) { ?>
<div class="nav_menu c_blue">
<ul><li><a href="<?php echo $MODULE['1']['linkurl'];?>" <?php if($moduleid<4) { ?> class="on"<?php } ?>
><span>首页</span><em></em></a></li><?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu']) { ?><li><a href="<?php echo $m['linkurl'];?>"<?php if($m['isblank']) { ?> target="_blank"<?php } ?>
 <?php if($m['moduleid']==$moduleid) { ?> class="on"<?php } ?>
><span<?php if($m['style']) { ?> style="color:<?php echo $m['style'];?>;"<?php } ?>
><?php echo $m['name'];?></span></a><em></em></li><?php } ?>
<?php } } ?></ul>
</div>
<?php } ?>
