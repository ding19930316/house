<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<div id="main">
        <div class="bread">
        <div class="fr">发布：<?php echo $editdate;?></div>
        您当前的位置：<a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><?php echo $AJ['sitename'];?></a>&gt;<a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>&gt;<span><a class="red" href="<?php echo $linkurl;?>"><?php echo $title;?></a></span></div>
<div class="detal cf">
<div class="dtl_fl">
<h1><?php echo $title;?></h1>
                                
<div class="cf">
<div class="dtl_flpic">
<img src="<?php echo imgurl($thumb);?>" id="bigp">
<a href="javascript:" id="gol"></a>
<a href="javascript:" id="gor"></a>
<div class="dtl_pl">
<ul id="dtl_pul">
                        
     <?php $tags=tag("table=house_pic&condition=item=$itemid&mid=7&pagesize=8&order=itemid desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>    
  <li><img data-bigurl="<?php echo $t['thumb'];?>" class="on" src="<?php echo $t['thumb'];?>" alt="<?php echo $alt;?>"></li><?php } } ?>
                          
                       
                                                                        
                                    </ul>
</div>
<p><?php if($fyts) { ?>
                                                                 <?php $ts=explode(",",$fyts);?>
 
     <?php if(is_array($ts)) { foreach($ts as $ks => $vs) { ?>
        <span class="ts" style="background:#<?php echo rand(0,255);?>;"><?php echo $vs;?></span>
     <?php } } ?>  
                                </p><?php } ?>
</div>
<div class="dtl_frinfo">
<table>
<tr>
<td colspan="2">租金：<span class="red"><?php if($price) { ?><b><?php echo $price;?></b>元/月</span><?php } else { ?><b>面议</b></span>   <?php } ?>
                          （<?php if($renttype==1) { ?>整租<?php } else { ?>合租<?php } ?>
/押<?php echo $paytype;?>付<?php echo $paytype2;?>）
                                                                </td>
</tr>
<tr>
<td width="210">面积：<?php echo $houseearm;?>平米</td>
<td>户型：<?php if($room) { ?><?php echo $room;?>室<?php } ?>
<?php if($hall) { ?><?php echo $hall;?>厅<?php } ?>
<?php if($toilet) { ?><?php echo $toilet;?>卫<?php } ?>
<?php if($balcony) { ?><?php echo $balcony;?>阳台<?php } ?>
</td>
</tr>
<tr>
<td>朝向：<?php echo getbox_diaoval('toward','checkbox',$toward,'rent_7');?></td>
<td>楼层：第<?php echo $floor1;?>层/总<?php echo $floor2;?>层</td>
</tr>
<tr>
<td>类型：<?php echo cat_pos($CAT, ' &raquo; ');?></td>
<td>装修：<?php echo getbox_diaoval('zhuanxiu','checkbox',$zhuanxiu,'rent_7');?></td>
</tr>
<tr>
<td>房龄：<?php echo $houseyear;?>年&nbsp;</td>

</tr>
<tr>
<td colspan="2">小区：<a href="<?php echo $MODULE['18']['linkurl'];?><?php echo $houseid;?>/" target="_blank" title="<?php echo $housename;?>" class="bal"><?php echo $housename;?></a></td>
</tr>
<tr>
<td colspan="2">地址：<?php echo area_pos($areaid, ' ');?> <font title="<?php echo $address;?>"><?php echo $address;?></font>&nbsp;<a href="javascript:" class="bal" id="dtl_t_map" data-href="#dtl_map">(地图)</a> </td>
</tr>
<tr>
<td colspan="2">交通： <font title="<?php echo $address;?>"><?php echo $bus;?></font></td>
</tr>
<tr>
<td colspan="2">房源特色：<font title="<?php echo $address;?>"><?php echo $fytsr;?></font></td>
</tr>
</table>
<div class="dtl_mobile">
<b><?php echo $telephone;?></b>
来电咨询时，请说明是在<?php echo $AJ['sitename'];?>看到的。
                                                           <?php if($username) { ?>     <a data-housetype="1" data-touser="<?php echo $username;?>" data-info="<?php echo area_pos($areaid, ' ');?>,<?php echo $address;?>,<?php if($room) { ?><?php echo $room;?>室<?php } ?>
<?php if($hall) { ?><?php echo $hall;?>厅<?php } ?>
<?php if($toilet) { ?><?php echo $toilet;?>卫<?php } ?>
,<?php echo $price;?>元/月" data-val="<?php echo $itemid;?>" data-url="<?php echo $linkurl;?>" class="obtn" href="javascript:void(0)" id="alm1">预约看房</a><?php } ?>
                            </div>
<div class="dtl_ca">
<form name="detailForm" id="detailForm" action="<?php echo $MODULE['2']['linkurl'];?>favorite.php" method="post">
<input type="hidden" name="action" value="add"/>
<input type="hidden" name="title" value="<?php echo $title;?>"/>
<input type="hidden" name="url" value="<?php echo $linkurl;?>"/>
</form>
<a href="javascript:document.getElementById('detailForm').submit();" class="favor">收藏</a>

<a href="javascript:" id="shareBtn">分享<i></i></a>

<div id="share_hide">
<ul></ul>
<span href="javascript:">分享<i></i></span>
</div>
</div>
</div>
</div>
<h3 id="dtl_info">
<a href="javascript:" data-href="#dtl_info" class="on">房源描述</a>
<?php if($thumb) { ?><a href="javascript:" data-href="#dtl_pic">房源图片</a> <?php } ?>
                       <a href="javascript:" data-href="#dtl_map">地图交通</a>
                        <a href="javascript:" data-href="#dtl_area">小区简介</a>
                    </h3>
                                    <div class="dtl_tip">
                        <div class="dtl_fu">
                            <b>房源配套：</b>
   <?php $ts=explode(",",$peitao);?>
     <?php if(is_array($ts)) { foreach($ts as $ks => $vs) { ?>
      <span><?php echo $vs;?></span>
  
     <?php } } ?> </div> 
  
                    </div>
                <div class="dtl_content">
<?php echo $content;?></div>
<?php if($thumb) { ?>
                                    <h3 id="dtl_pic">
                        <a href="javascript:" data-href="#dtl_info">房源描述</a>
                        <a href="javascript:" data-href="#dtl_pic" class="on">房源图片</a>
                                                    <a href="javascript:" data-href="#dtl_map">地图交通</a>
                            <a href="javascript:" data-href="#dtl_area">小区简介</a>
                                            </h3>
                    <div class="dtl_pics">
                                             
  <?php $tags=tag("table=house_pic&condition=item=$itemid&mid=7&pagesize=8&order=itemid desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>    
  <img  src="<?php echo $t['thumb'];?>" alt="<?php echo $alt;?>"><br><?php } } ?>

                                                </div><?php } ?>
                                    <h3 id="dtl_map">
                        <a href="javascript:" data-href="#dtl_info" >房源描述</a>
                       <?php if($thumb) { ?><a href="javascript:" data-href="#dtl_pic">房源图片</a> <?php } ?>
                            <a href="javascript:" data-href="#dtl_map" class="on">地图交通</a>
                        <a href="javascript:" data-href="#dtl_area">小区简介</a>
                    </h3>
                    <div class="dtl_tip">
                        <p>小区地址：<?php echo $address;?></p>
                        <p>公&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交：<?php echo $bus;?></p>
                    </div>
                                            <div class="dtl_maps cf">
                            <ul id="map_control">
                              
                                <li><a data-key="公交" href="javascript:"><i class="map_i2"></i>周边公交</a></li>
                                <li><a data-key="餐饮" href="javascript:"><i class="map_i3"></i>周边餐饮</a></li>
                                <li><a data-key="银行" href="javascript:"><i class="map_i4"></i>周边银行</a></li>
                                <li><a data-key="学校" href="javascript:"><i class="map_i5"></i>周边学校</a></li>
                                <li><a data-key="医院" href="javascript:"><i class="map_i6"></i>周边医院</a></li>
                                <li><a data-key="加油站" href="javascript:"><i class="map_i7"></i>周边加油站</a></li>
                            </ul>
                            <div id="map"></div>
                        </div>
                                        <h3 id="dtl_area">
                        <a href="javascript:" data-href="#dtl_info">房源描述</a>
                       <?php if($thumb) { ?><a href="javascript:" data-href="#dtl_pic">房源图片</a> <?php } ?>
                           <a href="javascript:" data-href="#dtl_map">地图交通</a>
                        <a href="javascript:" data-href="#dtl_area" class="on">小区简介</a>
                    </h3>
                    <div class="dtl_tip">
                        <table>
                            <tr>
                                <td>小区名称：<?php echo $housename;?></td>
                                <td>项目类型：<?php echo search_cats($catid, '6');?></td>
                                <td>绿化率：<?php echo $lp_green;?>%</td>
                            </tr>
                            <tr>
                                <td>物&nbsp;&nbsp;业&nbsp;&nbsp;费：<?php echo $lp_costs;?>元/平方米·月</td>
                                <td colspan="2">物业公司：<?php echo $lp_company;?></td>
                            </tr>
                            <tr>
                                <td colspan="3">开&nbsp;&nbsp;发&nbsp;&nbsp;商：<?php echo $kfs;?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="dtl_ainfo">
                        <h5><b><?php echo $housename;?>本月均价：
                                                <span class="red"><?php echo get_avg_price($houseid);?> 元/平米</span></b>
                                          该小区出售房源：<span><a class="blue" href="<?php echo $MODULE['18']['linkurl'];?><?php echo $houseid;?>/sale.html" target="_blank"><?php echo get_sale($houseid);?> 套</a></span>该小区出租房源：<span><a class="blue" href="<?php echo $MODULE['18']['linkurl'];?><?php echo $houseid;?>/rent.htmll" target="_blank"><?php echo get_rent($houseid);?> 套</a></span></h5>
                        <p>
                            <a href="javascript:" id="gz" class="dtl_gz">关注该小区</a>
                            <a href="<?php echo $MODULE['18']['linkurl'];?>show.php?itemid=<?php echo $houseid;?>" target="_blank" class="dtl_abtn">查看小区详细信息</a>
                           
                        </p>
                        <div class="dtl_aprice" id="ptab1">
                            <h4>
                                <span class="on">本小区价格走势</span>
                              
                            </h4>
                            <div id="hc1" class="dtl_aphc"></div>
                           
                        </div>
                    </div>
                                     
                      
                                        <h4 class="dtl_bh">
                        <a class="more" href="<?php echo $MODULE['18']['linkurl'];?><?php echo $houseid;?>/sale.html" target="_blank">更多</a>
                        <span>该小区其他二手房源</span>
                    </h4>
                    <ul class="cf dtl_pilist">
<?php $tags=tag("moduleid=5&condition=status=3 and houseid=$houseid&areaid=$cityid&length=22&pagesize=5&order=hits desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                                                <li>
                              <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><img class="scrollLoading" data-src="<?php echo imgurl($t['thumb']);?>" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>" width="160" height="120"></a>
                                <span><a href="<?php echo $t['linkurl'];?>"   class="blue" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></span>
                               <?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
<?php if($t['toilet']) { ?><?php echo $t['toilet'];?>卫<?php } ?>
<?php echo $t['houseearm'];?>平米<br>
                                <span class="red"><?php if($t['price']) { ?><?php echo $t['price'];?>元/月<?php } else { ?>面议<?php } ?>
</span>
                            </li><?php } } ?>
                                            </ul>
                </div>
<div class="dtl_fr">
<DIV  id="contact"><?php include template('contactfs', 'chip');?></DIV>
                   <?php if($username) { ?>
                                            <h3 class="dtl_rt">
                            该经纪人其他房源：
                        </h3>
                        <table class="h_rlist">
   <?php $tags=tag("moduleid=$moduleid&length=20&condition=status=3  and username='$username'&pagesize=8&order=edittime desc&width=80&height=80&cols=8&template=null");?>  
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>           <tr>
                                        <td><span><a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>"><?php echo $t['housename'];?></a></span></td>
                                        <td>&nbsp;<?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
</td>
                                        <td><?php echo $t['houseearm'];?>㎡</td>
                                        <td>&nbsp;<b class="red"><?php if($t['price']) { ?><?php echo $t['price'];?>万</b><?php } else { ?>面议</b><?php } ?>
</td>
                                    </tr>
                                            <?php } } ?>
                                                
                                                    </table>
<?php } ?>
                                        <h3 class="dtl_rt">
                        可能感兴趣的房源：
                    </h3>
                    <ul class="dtl_pilist">  <?php $tags=tag("moduleid=$moduleid&condition=status=3  and level>0 and thumb!='' &areaid=$cityid&pagesize=5&order=addtime desc&target=_blank&template=null");?>
   <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
                                                    <li>
                                <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><img  src="<?php echo imgurl($t['thumb']);?>" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>" ></a>
                                <span><a href="<?php echo $t['linkurl'];?>"   class="blue" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></span>
                                   <?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
<?php if($t['toilet']) { ?><?php echo $t['toilet'];?>卫<?php } ?>
<?php echo $t['houseearm'];?>平米<br>
                                <span class="red"><?php if($t['price']) { ?><?php echo $t['price'];?>元/月<?php } else { ?>面议<?php } ?>
</span>
                            </li>
                                              <?php } } ?>
                                            </ul>
                </div>
</div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=41ecef6e7501997ca9bc50e982577c82"></script>
<script>
seajs.use(["snail-baiduaround","highcharts","alert","config","alertlist","useryuyue","share","autab"],function(snail,hc,alertM,config,al,uyy){
/*PPT*/
var $dtl_pul = $("#dtl_pul").on("click","img",function(){
$dtl_pul.find(".on").removeClass("on")
$bigp.attr("src",$(this).addClass("on").attr("data-bigurl"))
}),
$bigp = $("#bigp"),
pul=Math.ceil($dtl_pul.find("img").length/4),
pui=0;
$("#gor").on("click",function(){
pui++;
if(pui==pul)
pui=0;
$dtl_pul.animate({
left:1-pui*385
})
})
$("#gol").on("click",function(){
pui--;
if(pui<0)
pui=pul-1;
$dtl_pul.animate({
left:1-pui*385
})
})
$dtl_pul.find("img").eq(0).trigger("click");

/*发送到手机*/
$("#sendinfo").click(function(){
al.sendHouse({
name:"",
info:"<?php echo area_pos($areaid, ' ');?>,<?php echo $address;?>,<?php if($room) { ?><?php echo $room;?>室<?php } ?>
<?php if($hall) { ?><?php echo $hall;?>厅<?php } ?>
<?php if($toilet) { ?><?php echo $toilet;?>卫<?php } ?>
,<?php echo $houseearm;?>平米,<?php echo $toward;?>,电话：<?php echo $telephone;?>",
hid:"<?php echo $itemid;?>",
checkurl:"<?php echo $MODULE['2']['linkurl'];?>sms.php",
murl:"<?php echo $MODULE['2']['linkurl'];?>sms.php"
});
})

/*分享*/
$("#share_hide").on("mouseleave",function(){
$("#share_hide").hide()
}).find("ul").share({text:""})
$("#shareBtn").on("mouseenter",function(){
$("#share_hide").show();
})

/*导航锚点*/
var $hs=$("#dtl_info,#dtl_area,#dtl_map,#dtl_pic").on("click","a",function(e){
var $h=$($(this).data("href"));
$('html,body').animate({
scrollTop: $h.offset().top
},function(){
$hs.removeClass("on")
$h.addClass("on")
})
e.preventDefault()
})
$("#dtl_t_map").on("click",function(e){
var $h=$($(this).data("href"));
$('html,body').animate({
scrollTop: $h.offset().top
},function(){
$hs.removeClass("on")
$h.addClass("on")
})
e.preventDefault()
})

/*收藏*/
$("#goFav").on("click",function(){
// al.favorite("<?php echo $MODULE['3']['linkurl'];?>shortcut.php?hid=<?php echo $itemid;?>",{hid:"<?php echo $itemid;?>",type:"1",identity:'1',url:"<?php echo $MODULE['6']['linkurl'];?>house.php?action=favorite"});

});
/*留言*/
$("#l_message").on("click",function(){
al.leaveMessage({
uid:"<?php echo $userid;?>",
uname:"<?php echo $truename;?>",
truename:"<?php echo $_truename;?>",
contact:"<?php echo $telephone;?>",
url:"<?php echo $MODULE['2']['linkurl'];?>message.php?action=send&touser=<?php echo $username;?>"
})
});

/*预约看房*/
uyy({
elm:"#alm1",
type:"esf",
sendurl:"",
url:"<?php echo $MODULE['6']['linkurl'];?>house.php?action=yuyue",
fromuser:"<?php echo $_username;?>",
truename:"<?php echo $_truename;?>",
mobile:"<?php echo $_mobile;?>"
})
/*小区地图*/
var laticoor = <?php echo $y;?>;
var longcoor = <?php echo $x;?>;
if(laticoor > 0 && longcoor > 0){
snail.setURL("<?php echo $MOD['linkurl'];?>");
snail.drawMap(parseFloat(longcoor),parseFloat(laticoor),"<?php echo $housename;?>","map");
snail.getMaps();
}
var $ps=$('#map_control a').on("click",function(){
snail.setKEY($(this).data("key"));
if($(this).data("key") == 'house'){
snail.setKEY("小区");
snail.setH(true);
}else{
snail.setH(false);
}
$ps.removeClass("on");
$(this).addClass("on");
snail.getMaps();
})


/*各个价格走势*/
hc('hc1',"<?php echo $housename;?>",[<?php echo get_linedate($houseid);?>],[<?php echo get_lineprice($houseid);?>],'元/平米');

setTimeout(function(){
$("#ptab1").autab("h4 span","div.dtl_aphc").find("span").eq(0).trigger("mouseenter");
},999);
});
</script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/album.js"></script>
<?php if($content) { ?><script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/content.js"></script><?php } ?>
<script type="text/javascript">
$("#esflist").attr("class","on");
</script>
