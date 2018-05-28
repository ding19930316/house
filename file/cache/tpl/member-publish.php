<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>

<link href="<?php echo AJ_SKIN;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo AJ_SKIN;?>fabu.css" rel="stylesheet" type="text/css" />
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
</head>
<body style="background:none;">
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
<div class="fabu_font">
<div class="title">
<h1><a href="<?php echo $MODULE['1']['linkurl'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo AJ_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($AJ['logo']) { ?><?php echo $AJ['logo'];?><?php } else { ?><?php echo AJ_SKIN;?>images/logo.gif<?php } ?>
" alt="<?php echo $AJ['sitename'];?>"/></a>
发布房源
</h1>
</div><div id="main">
<div class="banner">
<h3>免费发布房源</h3>

<span id="ba_info">首先要填写基本信息才能发布</span>
</div>
</div>
<?php if($action==sucess) { ?>
<div class="show">


<form action="" class="main">
   <div class="suc-status newStatus">
                <h3><i class="icon ico-suc"></i>发布成功！客服稍后会联系您噢！</h3>
                <!-- <p>我们将最快为您推荐最优质、离您最近的经纪人联系您，请保持您的手机畅通，谢谢！</p> -->
                <p class="link-box">
                                      
                </p>
                <p><a href="<?php echo $MODULE['2']['linkurl'];?>publish.php" class="prop">&lt; 返回发布页</a></p>
            </div>
<?php } else { ?>
<div class="show">
<div class="shadow_up"></div>

<form id="form" action="" class="main">
<div id="page1">
<div class="page_form">
<ul class="fl">
<li class="cf"><span class="lab">选择发布类型：</span>
<label id="sell" class="lab_btn on">出售</label>
<label id="rent" class="lab_btn">出租</label>
</li>
<li class="cf" style="display:none;"><span class="lab">选择房源类型：</span>
<label id="esf" for="esf_i" class="lab_btn on">住宅<input type="radio" class="radio" checked="" id="esf_i" name="housetype" value="1"></label>
</li>
</ul>
<div id="form_cli">
<ul class="fl" id="esf_ul">
<li><span class="lab">小区名称：</span>
<input type="hidden" id="areaid" name="areaid"  value="">
<input type="hidden" id="map" name="map"  value="">
<input type="hidden" name="cid" id="esf_cid" value="">
<input name="address" value="" id="address" class="txt" type="hidden">
<a class="pad_r_sp" id="add_esf" href="javascript:">添加小区</a>
<input type="text" id="esf_name" name="communityname" autocomplete="off" class="pad_r">
</li>

<li><span class="lab">户型：</span>
<input name="room" type="text" id="room" class="s">
室
<input name="hall" type="text" id="hall" class="s">
厅
<input name="toilet" type="text" id="toilet" class="s">
卫
<span class="gray9"></span>
</li>
</ul>
</div>
<ul class="fl">
<li><span class="lab">面积：</span>
<input name="area" type="text" id="buildarea" class="s"> m²
<span class="gray9"></span>
</li>
<li><span class="lab" id="price_name">价格：</span>
<input id="price" name="price" type="text" class="s">
<span id="price_num">万</span>
<span class="gray9">0或者不填表示面议</span>
</li>
</ul>
<div class="buttons">
<a href="javascript:"><button type="submit"></button>下一步</a>
</div>
</div>
</div>
<div id="page2">
<div class="page_form">
<p><a href="javascript:" id="re_back">←返回上一步</a></p>
<ul class="fl" id="esf_ul">
<li><span class="lab">联系人：</span>
<input type="text" name="username" id="user_name" value="">
</li>
<li><span class="lab">手机号：</span>
<input type="text" id="mobile" name="mobile" value="">
</li>

</ul>
<div class="buttons">

<a href="javascript:" id="btn_fb"><button type="submit"></button>自己发布</a>
</div>
</div>
</div>
</form>
<?php } ?>
<div class="shadow_down"></div>
</div>

<script>
seajs.use("userfb1",function(uf){
uf.init({
esf_autoc:"<?php echo $MODULE['6']['linkurl'];?>house.php?action=xzxq",
esf_add:"<?php echo $MODULE['2']['linkurl'];?>addcommunity.php",
rent_fb:"<?php echo $MODULE['6']['linkurl'];?>house.php?action=faburent",
sell_fb:"<?php echo $MODULE['6']['linkurl'];?>house.php?action=fabusale"
});
});
</script></div>
<?php include template('footer');?>