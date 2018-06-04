<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>租房地图找房-<?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $AJ['seo_delimiter'];?><?php } ?>
<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $AJ['sitename'];?><?php } ?>
<?php } ?>
</title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<style type="text/css">
/*Document By JodJin 2011/07/04*/
html{width:100%;height:100%;overflow:hidden;border:0;}
body{font-family:Tahoma,"宋体";background-color:#ffffff;font-size:12px;color:#333;}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,p,b,em,span,i,pre,form,fieldset,label,input,textarea,blockquote{padding:0;margin:0;}input,select,textarea,button{vertical-align:middle;font-size:12px;font-family:Tahoma,"宋体";word-wrap:break-word;word-break:break-all;}table{border-collapse:collapse;border-spacing:0;}img{vertical-align:top;border:0;}ul,ol{list-style:none;}li{list-style-type:none;}h1,h2,h3,h4,h5,h6,textarea{font-size:12px;}em,i{font-weight:normal;font-style:normal;}a{color:#333;text-decoration:none;outline:none}a:hover{color:#f60;text-decoration:underline;outline:none}.show{display:block}.hidden{display:none}.fl{float:left;}.fr{float:right}.onetr{display:inline;float:left}.clear{font-size:0;line-height:0;clear:both;height:0;overflow:hidden}.orange{color:#f60}.ablue{color:#296ea0}
input,select,textarea,button{vertical-align:middle;font-size:12px;font-family:Tahoma,"宋体";word-wrap:break-word;word-break:break-all;}
#mapheader{height:60px;border-bottom:5px solid #015798;padding:10px 10px 0 10px;background:#fff url(<?php echo AJ_SKIN;?>images/map/shadow_line.gif) repeat-x 0 65px;}
.fastlink{float:right;color:#999;text-align:right;line-height:27px;}
.city_logo{float:left;border-left:1px solid #999;margin:11px 0 0 12px;padding-left:12px;}
#sitecity{float:none;padding:0;}
#sitecity i{font-family:"黑体";font-size:18px;color:#555;background:url(<?php echo AJ_SKIN;?>images/map/site_nav_bg.gif) right 7px no-repeat;padding-right:10px;cursor:pointer}
.mapss{float:left;padding:3px 0 0 8px;}
.mapss_nav{height:22px;color:#999}.mapss_nav a{margin:0 5px;}
.mapss_nav a.on{font-weight:bold;color:#296ea0}.mapss_nav a:hover.on{text-decoration:none}
.mapss_cont{padding-left:5px;}
.mapss_cont .inpt{border:1px solid #7ba3c0;display:inline;float:left;padding:3px 4px;height:16px;width:270px;line-height:16px;}
.mapss_cont .sbtn{width:45px;height:24px;background:url(<?php echo AJ_SKIN;?>images/map/map_ssbtn.gif);border:0;display:inline;float:left;cursor:pointer;margin-left:8px;}
#mapnoti{height:23px;background:#f1f7ff;border-bottom:1px solid #dee9f7;padding:0 5px;position:relative;z-index:90}
.oviews{padding:2px 5px 0 0;float:right}.oviews a{background:url(<?php echo AJ_SKIN;?>images/map/map_views.gif) no-repeat 0 3px;display:block;float:left;height:19px;overflow:hidden;line-height:19px;text-indent:17px;color:#296ea0;margin-left:8px;}a.m_fullp{background-position:0 -13px;}a.m_normp{background-position:0 -29px;}.oviews a:hover{color:#f60;}
.locachose{position:relative;z-index:10;width:50%}
.locachose ul{line-height:15px;height:23px;}
.locachose li{display:inline;float:left;color:#999;}
.locachose li span{display:block;float:left;padding:2px 5px;border:1px solid #f1f7ff;border-bottom:0;position:relative;z-index:100;top:1px;}
.locachose li span.onhov{border:1px solid #efae31;border-bottom:0;background:#fff;height:18px;}
.locachose li a{color:#296ea0;background:url(<?php echo AJ_SKIN;?>images/map/arrow_d.gif) no-repeat right 6px;padding-right:10px;}
.locachose li a:hover{color:#f60;}
.hovcont{border:1px solid #efae31;position:absolute;top:23px;z-index:99;background:#fff;display:none;width:340px;padding:8px 0 0 8px;}
.hovcont p{height:23px;color:#999;}
.hovcont a{color:#296ea0;display:inline;float:left;height:23px;width:83px;overflow:hidden}
.hovcont a:hover{color:#f60;}
#is_loading{padding-top:4px;float:left;display:none;}
#info_num{background:url(<?php echo AJ_SKIN;?>images/map/foundico.gif) no-repeat 0 6px;padding-left:10px;display:none;line-height:23px;}
#mapmain{position:relative;width:100%;background:#f9f9f9;overflow:hidden;}
#mapwin{position:absolute;z-index:66;border:3px solid #ddd;width:560px;height:410px;background:#fff;overflow:hidden;display:none}
#winBox{border:1px solid #9d9d9d;width:542px;height:392px;overflow:hidden;padding:8px;overflow:hidden}
#winBox a{color:#1361b0}#winBox a:hover{color:#f60}
#winBox .wintop{height:23px;overflow:hidden;border-bottom:1px solid #e2e2e2;cursor:move}
#winBox .wintop b{font-size:14px;}
#winBox .wini{color:#666;margin-left:5px;}#winBox .wini b{color:#f60}
#winBox .winclose{display:block;float:right;background:url(<?php echo AJ_SKIN;?>images/map/icon_close.gif) no-repeat;width:14px;height:14px;cursor:pointer;margin-top:1px;}
#winBox a:hover.winclose{background:url(<?php echo AJ_SKIN;?>images/map/icon_close.gif) no-repeat right 0;}
#winBox .win_shift{float:left;width:85px;line-height:19px;}
#winBox .win_shift h6{margin-top:4px;}
#winBox .win_shift a{white-space:nowrap;clear:both;display:block;}
#winBox .win_shift .onshift{font-weight:bold;color:#f60;}
#winBox .win_list{float:left;border-left:1px solid #e2e2e2;width:456px;height:376px;overflow:hidden;}
#winBox .win_list_top{height:27px;border-bottom:1px solid #e2e2e2;line-height:27px;padding-left:5px;background:#f6f6f6}
#winBox .win_list_top b{color:#f60;}
.list_order{float:right;padding-right:10px;}.list_order a{margin-left:8px;}
#winBox .list_order a.onorder{color:#f60;font-weight:bold}#winBox .list_order a.onorder i{font-weight:bold}
#winloading{padding:150px 0 0 140px;font-size:16px;color:#999;display:none}
.list_item{height:52px;overflow:hidden;border-bottom:1px solid #ececec;padding:5px 0 5px 5px;}
.list_item li{display:inline;float:left;overflow:hidden;word-wrap:break-word;word-break:break-all;}
.list_hov{background:#f0f6f9;border-bottom:1px solid #b6cae3}
.lit_1{width:75px;}.lit_1 img{border:1px solid #eee;padding:1px;background:#fff;}
.lit_2{width:260px;line-height:17px;color:#666;}.lit_2 span{color:#999}
.lit_3{width:115px;font-size:14px;color:#f60;font-weight:bold;text-align:center;padding-top:10px;}
.lit_3 i{font-size:12px;color:#666;}
.list_page{color:#666;height:21px;overflow:hidden;line-height:23px;padding:5px 5px 0 0;float:right}
.list_page a{float:left;margin-left:4px;}
.list_page em{float:left;margin-left:4px;}
.list_page em b{color:#3366cc}
#mapbody{background:#e5e3df;}
.mNone,.mNone span{display:none;}
.mBlue span, .mOrange span, .mRed span, .mGreen span, .mPurple span{background:url(<?php echo AJ_SKIN;?>images/map/mbg.gif) no-repeat;position:absolute;color:#fff;}
.mBlue .left, .mOrange .left, .mRed .left, .mGreen .left, .mPurple .left{width:8px;height:25px;line-height:0;font-size:0;z-index:497;}
.mBlue .right, .mOrange .right, .mRed .right, .mGreen .right, .mPurple .right{height:25px;line-height:25px;padding-right:8px;white-space:nowrap;z-index:498;left:8px;}
.mBlue .bottom, .mOrange .bottom, .mRed .bottom, .mGreen .bottom, .mPurple .bottom{width:20px;height:12px;line-height:0;font-size:0;z-index:499;top:22px;}
.mBlue .left{background-position:left top;}
.mBlue .right{background-position:right top;}
.mBlue .bottom{background-position:left -22px;}
.mOrange .left{background-position:left -34px;}
.mOrange .right{background-position:right -34px;}
.mOrange .bottom{background-position:left -56px;}
.mRed .left{background-position:left -68px;}
.mRed .right{background-position:right -68px;}
.mRed .bottom{background-position:left -90px;}
.mGreen .left{background-position:left -102px;}
.mGreen .right{background-position:right -102px;}
.mGreen .bottom{background-position:left -124px;}
.mPurple .left{background-position:left -136px;}
.mPurple .right{background-position:right -136px;}
.mPurple .bottom{background-position:left -158px;}
.houselis{border-bottom:1px dashed #d4d4d4;width:690px;padding:5px 0;zoom:1;overflow:hidden;}
.hlishover{background:#f0f6f9;border-bottom:1px solid #b6cae3}
.houselis div{word-wrap:break-word;word-break:break-all;}
.h_pic{float:left;padding-left:2px;width:68px;text-align:center}
.h_pic img{width:68px;height:52px;border:1px solid #e2e2e2;padding:2px;background:url(../images/loading.gif) no-repeat center}
.h_info{float:left;margin-left:10px;width:255px;}
.h_info h3{font-size:12px;line-height:18px;width:260px;height:18px;overflow:hidden;}
.h_info ul{padding-top:1px;}
.h_info ul li{height:21px;}
.tit_icon{margin:1px 0 0 5px;vertical-align:middle;}
.h_m2{float:left;font-size:12px;width:75px;text-align:center;padding-top:30px;}
.h_price{float:left;width:120px;text-align:center;padding-top:10px;}
.h_price b{font-size:14px;color:#f60}
</style>
<script type="text/javascript">
var c="mapbody";
var x=<?php echo $lan;?>;
var y=<?php echo $lat;?>;
var z=15;
var Districts=<?php echo $quyu;?>;
var Plates=[];
Plates[1]=[];
var Prices=['200元以下', '200-500元', '500-1000元', '1000-1500元', '1500-2000元', '2000-3000元','3000元以上'];
var Areas=['40㎡以下','40-60㎡','60-80㎡','80-100㎡','100-120㎡','120-150㎡','150㎡以上'];
var Units=['一室','二室','三室','四室','五室','五室以上'];
var params={city:"sy",ac:"",k:"",district:"",plate:"",price:"",area:"",units:"",r:Math.random()};
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=6bd2fcdebab1f867206fdc61a929f5c1f11bad89&v=1.2&services=false"></script>
<script type="text/javascript" src="<?php echo AJ_SKIN;?>js/map/jquery.js"></script>
<script type="text/javascript" src="<?php echo AJ_SKIN;?>js/map/mapPatch.js"></script>
<script type="text/javascript" src="<?php echo AJ_SKIN;?>js/map/maprentApi.js"></script>
<script type="text/javascript" src="<?php echo AJ_SKIN;?>js/map/mapObjrent.js"></script>
<SCRIPT src="used.js" type=text/javascript></SCRIPT>
</head>
<body>
<div id="mapheader">
  <div class="fastlink">您好！欢迎来<?php echo $AJ['sitename'];?><a href="<?php echo $MODULE['2']['linkurl'];?>/login.php" class="ablue">登录</a> | <a href="<?php echo $MODULE['2']['linkurl'];?>register.php" class="ablue">注册</a> | <a href="<?php echo $MODULE['1']['linkurl'];?>" class="agray">网站首页</a><br/>
   <a href="<?php echo $MODULE['1']['linkurl'];?>" target="_blank">网站首页</a> - <a href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank">新房中心</a> - <a href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank">二手房</a> - <a href="<?php echo $MODULE['8']['linkurl'];?>" target="_blank">房产资讯</a></div>
  <div class="fl"><a href="/"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo AJ_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($AJ['logo']) { ?><?php echo $AJ['logo'];?><?php } else { ?><?php echo AJ_SKIN;?>image/logo.png<?php } ?>
" width="260" height="60"></a></div>
  <div class="city_logo">
    <div id="sitecity"><i title="切换城市"><?php if($AJ['city']) { ?> <a href="<?php echo AJ_PATH;?>api/city.php" id="city_c"><?php echo $city_name;?></a><?php } else { ?><?php echo $AJ['city_sitename'];?><?php } ?>
</i></div>
    <a href="./"><img src="<?php echo AJ_SKIN;?>images/map/map_logo.gif"></a> </div>
  <div class="mapss">
    <div class="mapss_nav"><a href="<?php echo $MODULE['1']['linkurl'];?>map" >二手房地图</a> | <a href="<?php echo $MODULE['1']['linkurl'];?>map/rent.php" class="on">租房地图</a> | <a href="<?php echo $MODULE['1']['linkurl'];?>map/newhouse.php">新房地图</a></div>
    <div class="mapss_cont">
      <form action="<?php echo $MODULE['7']['linkurl'];?>search.php"   method="get">
        <input type="text" name="kw" class="inpt" value="" autocomplate="off">
        <input type="submit"  class="sbtn" value="">
      </form>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div id="mapnoti">
  <input type="hidden" name="ac" value="used">
  <div class="oviews"><a href="<?php echo $MODULE['7']['linkurl'];?>list.php" target="_blank" hidefocus>列表视图</a><a href="javascript:;" id="tab_m_views" class="m_fullp" hidefocus>全屏地图</a></div>
  <div class="locachose onetr">
    <ul>
      <li><span id="districts"><a href="javascript:;">选择城区</a></span></li>
      <li><span id="prices"><a href="javascript:;">价格不限</a></span></li>
            <li><span id="areas"><a href="javascript:;">面积不限</a></span></li>
            <li><span id="units"><a href="javascript:;">户型不限</a></span></li><?php echo $j;?>
    </ul>
    <div id="districtsIts" class="hovcont"></div>
    <div id="platesIts" class="hovcont"></div>
    <div id="pricesIts" class="hovcont"></div>
        <div id="areasIts" class="hovcont"></div>
        <div id="unitsIts" class="hovcont"></div>
  </div>
  <span id="is_loading" class="onetr"><img src="<?php echo AJ_SKIN;?>images/map/loading.gif"></span><span id="info_num" class="onetr"></span></div>
<div id="mapmain">
  <div id="mapwin">
    <div id="winBox">
      <div class="wintop" onMouseDown="mapPatch.drag(this.parentNode.parentNode,event,'mapmain');"><a href="javascript:;" onClick="mapObj.closeWin();" class="winclose" title="关闭"></a><b><a href="javascript:;" target="_blank" id="comuname"></a></b><span id="averprice" class="wini"></span></div>
      <div class="win_shift">
        <h6>按价格筛选</h6>
        <div id="shift_prices"></div>
        <h6>按户型筛选</h6>
        <div id="shift_units"></div>
      </div>
      <div class="win_list">
        <div class="win_list_top"><span class="list_order"><a href="javascript:;" id="areaOrder" hidefocus>面积<i>↑</i></a><a href="javascript:;" id="priceOrder" hidefocus>价格<i>↑</i></a></span>共找到<b id="listnum"></b>条房源</div>
        <div id="winloading"><img src="<?php echo AJ_SKIN;?>images/map/loading28x28.gif" style="vertical-align:middle"> 数据加载中,请稍候...</div>
        <div id="listcont"></div>
      </div>
    </div>
  </div>
  <div id="mapbody"></div>
</div>
</body>
</html>