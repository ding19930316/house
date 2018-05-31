<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<?php include template('menu', 'newhouse');?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=A0d7a1091e5b98f5430228d016ee0ac7"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/DistanceTool/1.2/src/DistanceTool_min.js"></script>
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=EZPBZ-ST7AD-BYW4U-PUYZJ-VMJLO-JTFPL&libraries=convertor"></script>
<div class="main lpxx">
   
<!-- 简介 -->
<div class="jianjie mt16 cf">
<div class="fl img" id="tab_1">
                               <?php if($picitems==0) { ?> 
   <div class="autab"><a target="_blank" href="<?php echo $linkurl;?>" title="<?php echo $title;?> "><img  title="<?php echo $title;?> " alt="<?php echo $alt;?> " src="<?php echo imgurl240($thumb);?>" ></a></div>
   <?php } else { ?>
  <?php $tags=tag("moduleid=12&&condition=houseid=$itemid&pagesize=5&order=itemid desc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>  <div class="autab"><a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?> "><img  title="<?php echo $t['title'];?> " alt="<?php echo $t['alt'];?> " src="<?php echo $t['thumb'];?>" ></a></div><?php } } ?>
<?php } ?>
                <div class="small_img">
<ul> 
<?php if($picitems==0) { ?>
  <li class="ht"><i class="xxicon icon-14"></i>
<a target="_blank" href="<?php echo $linkurl;?>" title="<?php echo $title;?> "><img  title="<?php echo $title;?> " alt="<?php echo $alt;?> " src="<?php echo imgurl($thumb);?>" ></a><span><?php echo $title;?></span></li>
 <?php } else { ?>

<?php $tags=tag("moduleid=12&&condition=houseid=$itemid&showcat=1&pagesize=5&order=itemid desc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
                                           <li class="ht"><i class="xxicon icon-14"></i>
<a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?> "><img  title="<?php echo $t['title'];?> " alt="<?php echo $t['alt'];?> " src="<?php echo $t['thumb'];?>" ></a><span><?php echo $t['catname'];?></span></li><?php } } ?><?php } ?>
   
                        </ul>
</div>
</div>
        <script>
seajs.use("autabhouse",function(){
var $dt = $("#tab_1").autab(".ht",".autab",0,0,0,function(){},true);
var $vp=$("#v_player");
if($vp.length){
$vp.on("click",function(){
$vp.data("html",$vp.html()).trigger("mouseleave",1).html('<embed src="<?php echo AJ_SKIN;?>js/cmstopPlayer.swf" allowFullScreen="true" quality="high" width="475" height="310" align="middle" allowScriptAccess="true" type="application/x-shockwave-flash" flashvars="file='+$vp.data("file")+'&amp;autoStart=1"></embed>')
});
$dt.find(".small_img li").slice(1).on("mouseenter",function(){
if($vp.data("html"))
$vp.html($vp.data("html")).data("html","").trigger("mouseleave",0)
})
}
});
</script>
<div class="fr text">
<ul class="js">
<li><b>平均单价：</b>
<span class="jiage red"><?php if($price) { ?><?php echo $price;?> <i>元/平米</i><?php } else { ?>待定<?php } ?>
</span>
                <a href="<?php echo $linkurl;?>jiage.html" class="xxicon icon-1" target="_blank">查看价格走势</a> <a href="<?php echo $MODULE['1']['linkurl'];?>tool" class="xxicon icon-2" target="_blank">贷款计算器</a>  <li class="sm">
                    <div class="sm_box">
                        <b>楼盘特点：</b><span style="color: #F33;"><?php echo $tedian;?></span>
                    </div>
                    <s class="none"><i></i><u></u></s>
                </li>
                <script>
                    seajs.use(["jquery"],function($){
                        if($(".text li.sm .sm_box").width() >= 590){
                            $(".text li.sm s").removeClass("none");
                            $(".text li.sm").hover(function(){
                                $(this).toggleClass("on");
                            });
                        }
                    });
                </script>
                <li class="cf">
<div class="fl">
<b style="float:left;">规划户数：</b>
<div class="lp_fen" data-id="477">
<ul id="scorecontent"><?php echo $lp_number;?>户</ul>
<span id="scoretotalcontent"></span>
</div>
<script>
seajs.use("get-jifen");
</script>
</div>
<div class="fr"><b>产权年限：</b><?php echo $lp_year;?>年</div></li>
<li class="cf"><div class="fl"><b>开盘时间：</b><?php echo $selltime;?> </div><div class="fr"><b>交房时间：</b><?php echo $completion;?></div></li>
<li class="cf"><div class="fl"><b>建筑类型：</b><?php echo getbox_diaoval('buildtype','checkbox',$buildtype,'newhouse_6');?></div><div class="fr"><b>装修情况</b>：<?php echo getbox_diaoval('fitment','checkbox',$fitment,'newhouse_6');?></div></li>
<li class="more" title="<?php echo $address;?>"><b>楼盘地址：</b><?php echo area_pos($areaid, ' ');?> <?php echo $address;?><a href="<?php echo $linkurl;?>peitao.html" target="_blank" class="xxicon icon-6"><i class="jtdt"></i>查看地图</a></li>
<li class="more"><b>交通状况：</b><?php echo $lp_bus;?></li>
<li class="more"><b>售楼地址：</b><?php echo $sell_address;?></li>
<li class="more"><a href="<?php echo $linkurl;?>xinxi.html" class="red" target="_blank">查看<?php echo $title;?>详细信息&gt;&gt;</a></li>
</ul>
<div class="tel cf">
<div class="fl"><i class="xxicon icon-13"></i></div>
<div class="fl">
<h3>联系时，请告知是在<?php echo $AJ['sitename'];?>上看到的，谢谢！</h3>
                    <p>                            <span class="red"><?php if($telephone) { ?><?php echo $telephone;?><?php } else { ?>热线尚未开通<?php } ?>
</span></p>
</div>
                </div>
<ul class="fun">
<li><a href="#" target="_blank" class="xxicon icon-7">收藏</a></li>
<li>
<a href="#" target="_blank" class="xxicon icon-8">分享</a>
<ul id="share" class="cf"></ul>
<script>
seajs.use(["jquery","share"],function($){
$(".icon-8").on("click",function(){
$("#share").toggle("on");
return false;
});
$("#share").share();
});
</script>
</li>
<li><a href="<?php echo $MODULE['6']['linkurl'];?>pk/<?php echo $itemid;?>" target="_blank" class="xxicon icon-9">楼盘对比</a></li>
<li class="saomiao">
<a href="javascript:;" class="xxicon icon-10">扫描到手机</a>
<div style="display: none;" id="smphone" class="erpop">
<img src="http://qr.liantu.com/api.php?text=<?php echo $EXT['wap_url'];?>index.php?moduleid=<?php echo $moduleid;?>%26itemid=<?php echo $itemid;?>&w=132&m=2&el=L" width="132" height="132" /></div>
</li>

</ul>
</div>
</div>
<!-- 动态、问答、论坛 -->
<div class="detail_c mt16 cf">
<div class="fl">
<div class="dongtai">
<div class="con_title"><a href="<?php echo $linkurl;?>zixun.html" class="more" target="_blank">更多…</a><?php echo $title;?>楼盘动态</div>
<div class="con_c">
                                                <ul>
                                                            <?php $tags=tag("moduleid=8&condition=status=3 and houseid=$itemid&length=42&pagesize=2&order=addtime desc&template=null");?>
  <?php if($tags) { ?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>           <li class="<?php if($i==0) { ?>on<?php } ?>
">
                                        <div class="thumb no_pic">
                                                                                        <div class="text">
                                                <h3><a href="<?php echo $t['linkurl'];?>"   class="blue" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></h3>
                                                <p><?php echo dsubstr($t['introduce'], 200, $suffix = '.....');?><span><?php echo date('Y-m-d', $t['addtime']);?></span></p>
                                            </div>
                                        </div>
                                    </li><?php } } ?>
<?php } else { ?>     <div class="no_result">
                                <h3>很抱歉，暂无<?php echo $title;?>动态</h3>
                            </div><?php } ?>
                                                            </ul>
                        </div>
</div>
</div>
<div class="fr">
<div class="wenda fr_t">
<div class="con_title"><a href="<?php echo $linkurl;?>wenfang.html" class="more" target="_blank">更多…</a><?php echo $title;?>楼盘问答</div>
<div class="con_c">
                                        <ul> <?php $tags=tag("table=wenfang&condition=status=3 and item_id=$itemid&pagesize=6&order=addtime desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>  
                                                            <li><a href="<?php echo $linkurl;?>wenfang.html" class="xxicon icon-15" target="_blank"><i></i><?php echo $t['content'];?></a> <a target="_blank" href="<?php echo $linkurl;?>wenfang.html" class="hf"><span class="red"><?php if($t['reply']) { ?>1{esle}0<?php } ?>
</span>回复</a></li><?php } } ?>
                                                    </ul>
                    

</div>
</div>

</div>
</div>
<!-- 楼栋信息 -->
    
<!-- 楼盘户型 -->
    <div class="huxing mt16">
<div class="con_title"><p class="more"><?php $maincat = get_maincat(24,12)?>
  <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?><?php if(get_categorynum($itemid,$v['catid'])) { ?><a  href="<?php echo $linkurl;?>huxing-c<?php echo $v['catid'];?>.html"><?php echo $v['catname'];?>(<?php echo get_categorynum($itemid,$v['catid']);?>)</a><?php } ?>
|<?php } } ?>

<a href="<?php echo $linkurl;?>huxing.html" target="_blank">更多户型…</a></p><?php echo $title;?>楼盘户型</div>
<div class="con_c">
<ul class="cf">
                <?php $tags=tag("moduleid=12&table=aijiacms_photo_12 m,aijiacms_photo_item_12 c&prefix=&condition=m.itemid=c.item  and m.houseid=$itemid&catid=24&pagesize=5&order=c.itemid asc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>           <li class="<?php if($i==0) { ?>on<?php } ?>
">
                            <div class="thumb">
                                <div class="img"><a target="_blank" href="<?php echo $t['linkurl'];?>#id=<?php echo $i+1;?>" class="gal_box"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $title;?> "></a></div>
                                <div class="text">
                                    <h3><a href="<?php echo $t['linkurl'];?>#id=<?php echo $i+1;?>" target="_blank"><?php echo $t['introduce'];?></a></h3>
                                    <p>面积大小：<?php echo $t['mianji'];?>平米</p>                                </div>
                            </div>
                        </li><?php } } ?>
</ul>
</div>
</div>
<!-- 楼盘相册 -->
<div class="huxing mt16">
<div class="con_title"><p class="more"><?php $maincat = get_maincat(0,12)?>
  <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?><?php if(get_categorynum($itemid,$v['catid'])) { ?><a  href="<?php echo $linkurl;?>xiangce-c<?php echo $v['catid'];?>.html"><?php echo $v['catname'];?>(<?php echo get_categorynum($itemid,$v['catid']);?>)</a><?php } ?>
|<?php } } ?> |
<a href="<?php echo $linkurl;?>xiangce.html" target="_blank">更多相册…</a></p><?php echo $title;?>楼盘相册</div>
<div class="con_c">
<ul class="cf">  <?php $tags=tag("moduleid=12&table=aijiacms_photo_12 m,aijiacms_photo_item_12 c&prefix=&condition=m.itemid=c.item  and m.houseid=$itemid&catid!=24&pagesize=5&order=c.itemid asc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>           <li class="<?php if($i==0) { ?>on<?php } ?>
">
                            <div class="thumb">
                                <div class="img"><a target="_blank" href="<?php echo $t['linkurl'];?>#id=<?php echo $i+1;?>" class="gal_box"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $title;?> "></a></div>
                                <div class="text">
                                   
                                    <p><?php echo date('Y年m月d日', $t['addtime']);?></p>                                </div>
                            </div>
                        </li><?php } } ?>

                             
                </ul>
</div>
</div>

<!-- 配套地图 -->
<div class="peitao mt16" id="tab_2">
<div class="con_title"><p class="more"><span><a href="javascript:;" class="ht on" >地图</a> | <a href="javascript:;" class="ht" >街景</a></span> <a href="<?php echo $MODULE['1']['linkurl'];?>map/house.html" class="xxicon icon-16" name="house" target="_blank">楼盘地图</a> | <a href="#" class="xxicon icon-17" >测距</a>  | <a href="#" class="xxicon icon-19" >驾车</a></p><?php echo $title;?>周边配套地图</div>
<div class="con_c_no_padding cf">
<div class="autab">
<div class="fl map">
<div id="map"></div>
</div>
<div class="fr">
<div class="map_tag">
<div class="nav cf" id="map_nav">
<a href="#" class="on"  name="公交"><i class="xxicon icon-q1"></i>交通</a>
<a href="#"  name="学校"><i class="xxicon icon-q2"></i>教育</a>
<a href="#"  name="超市"><i class="xxicon icon-q3"></i>生活</a>
<a href="#"  name="医院"><i class="xxicon icon-q4"></i>健康</a>
<a href="#" name="餐饮"><i class="xxicon icon-q5"></i>餐饮</a>
</div>
<ul class="list" id="search_box"></ul>
</div>
<div class="map_lp">
<div class="map_tit"><a href="javascript:void(0)" id="backMap">返回</a><strong id="traffic_title">驾车</strong></div>
<div class="map_lpcon">
<ul class="map_ipt" id="bus_ipt">
<li><input type="text" class="ipt_txt" id="sstartname" value="请输入起点" onfocus="XF_DETAIL_MAP.checkFocus(this,'请输入起点');" onblur="XF_DETAIL_MAP.checkBlur(this,'请输入起点');"></li>
<li><input type="text" class="ipt_txt" id="sendname" value="请输入终点" onfocus="XF_DETAIL_MAP.checkFocus(this,'请输入终点');" onblur="XF_DETAIL_MAP.checkBlur(this,'请输入终点');"></li>
<li><input type="button" class="ipt_btn" onClick="XF_DETAIL_MAP.transitSearch();" value="获取线路"></li>
<li class="change"><a href="javascript:void(0)" onclick="XF_DETAIL_MAP.changeStartEnd();"></a></li>
</ul>
</div>
</div>
<!-- 公交搜索结果 -->
<div class="traffic_result" style="display: none;" id="bus_wrap"></div>
<!-- 驾车搜索结果 -->
<div class="traffic_result" style="display: none;" id="drive_wrap"></div>
</div>
</div>
<div class="autab" id="qq_panorama"></div>
</div>
</div>
<script>
seajs.use(["autab","snail-baiduaroundhouse"],function(autab){
//地图和街景

var lat=parseFloat("<?php echo $y;?>"), //维度
lng=parseFloat("<?php echo $x;?>"); //经度
XF_DETAIL_MAP.setURL('<?php echo $MODULE['6']['linkurl'];?>');
XF_DETAIL_MAP.drawMap(lng,lat,"<?php echo $title;?>","map");
XF_DETAIL_MAP.getMaps();
var $ps=$('#map_nav a').on("click",function(){
XF_DETAIL_MAP.distanceClose();
XF_DETAIL_MAP.resetTo();
XF_DETAIL_MAP.setKEY($(this).attr("name"));
if($(this).attr('name') == 'house'){
XF_DETAIL_MAP.setH(true);
}else{
XF_DETAIL_MAP.setH(false);
}
$ps.add(".icon-17").removeClass("active");
$(this).addClass("active");
XF_DETAIL_MAP.getMaps();
return false;
});
//查询公交路线
$("#map_nav a.on").trigger("click");
var svid=0;
var status = false; //是否生成过街景
qq.maps.convertor.translate(new qq.maps.LatLng(lat, lng),3,function(res){
var panoService = new qq.maps.PanoramaService();
panoService.getPano(res[0], 1000, function(pano) {
if(pano){
svid=pano.svid
}else{
$("#qq_panorama").html('')
}
});
});
$("#tab_2").autab(".ht",".autab",0,.3,0,function(){
if(svid && !status){
var panorama = new qq.maps.Panorama(
document.getElementById("qq_panorama"),
{
pano: svid
}
);
status = true;
}
if($("#qq_panorama").is(":visible")){
$(".peitao .con_title p>a").css({color:"#ccc"}).click(function(){return false;});
}else{
$(".peitao .con_title p>a").css({color:"#666"});
}
},true);
$(".icon-17").click(function(){
XF_DETAIL_MAP.distanceOpen();
return false;
});

})
</script>
<?php if($price) { ?>
<!-- 参考月供 -->
    <div class="yuegong mt16">
<div class="con_title"><?php echo $title;?>参考月供</div>
<div class="con_c cf">
<div class="tools-mod">
<h4>计算条件</h4>
<div class="tools-item tools-item1">
<label class="fl">选择户型</label>
<div class="select-item fl">
<div class="xf-select xf-select-max">
<div class="text">
                                  <?php $tags=tag("moduleid=12&table=aijiacms_photo_12 m,aijiacms_photo_item_12 c&prefix=&condition=m.itemid=c.item  and c.mianji!='' and m.houseid=$itemid&catid=24&pagesize=1&order=c.listorder desc&template=null");?>
  <?php if($tags) { ?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> 
                            <span><?php echo $t['introduce'];?>  <?php echo $t['mianji'];?>m²</span>
                                        <input type="hidden" name="val_housetype" id="housetype" value="<?php echo $t['mianji'];?>"><?php } } ?>
<?php } else { ?>
<span>3室2厅1卫  100m²</span>
                                        <input type="hidden" name="val_housetype" id="housetype" value="100">
<?php } ?>
                                        <i class="lp-icons icon-tip"></i>
</div>
<ul>
                                  <?php $tags=tag("moduleid=12&table=aijiacms_photo_12 m,aijiacms_photo_item_12 c&prefix=&condition=m.itemid=c.item  and c.mianji!='' and m.houseid=$itemid&catid=24&pagesize=5&order=m.itemid desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> <li data-code="<?php echo $t['mianji'];?>" class=""><?php echo $t['introduce'];?>  <?php echo $t['mianji'];?>m²</li>
                                <?php } } ?>
                                
</ul>
</div>
</div>
</div>
<div class="tools-item tools-item2">
<label class="fl" data-junjia="<?php echo $price;?>" id="zongjia">估算总价</label>
<div class="select-item fl" id="label_price">-</div>
</div>
<div class="tools-item tools-item3">
<label class="fl" id="label_loanratio">按揭成数</label>
<div class="select-item fl">
<div class="xf-select xf-select-max">
<div class="text">
<span>7成</span>
<input type="hidden" name="val_loanratio" id="val_loanratio" value="70">
<i class="lp-icons icon-tip"></i>
</div>
<ul>
<li data-code="10">1成</li>
<li data-code="20">2成</li>
<li data-code="30">3成</li>
<li data-code="40">4成</li>
<li data-code="50">5成</li>
<li data-code="60">6成</li>
<li data-code="70">7成</li>
<li data-code="80">8成</li>
<li data-code="90">9成</li>
</ul>
</div>
</div>
</div>
<div class="tools-item tools-item4">
<label class="fl">贷款类别</label>
<div class="select-item fl">
<div class="xf-select xf-select-max">
<div class="text">
<span>商业贷款</span>
<input type="hidden" name="val_loantype" id="val_loantype" value="1">
<i class="lp-icons icon-tip"></i>
</div>
<ul>
<li data-code="1">商业贷款</li>
<li data-code="2">公积金贷款</li>
<li data-code="3">组合贷款</li>
</ul>
</div>
</div>
</div>
<div class="tools-item tools-item5 none" id="content_scale">
<label class="fl">贷款金额</label>
<div class="select-item fl loan-item">
<p class="gray" id="label_totalprice"></p>
<div class="loan-style">
<span class="lab gray">公积金</span>
<input type="text" class="int-text int-text-mid" id="val_loanfund">
<em>万元</em>
<span id="gjjtip" class="com-msg none">
<i class="lp-icons error-icon"></i>
<span>不能为空！</span>
</span>
</div>
<div class="loan-style">
<span class="lab gray">商业性</span>
<input type="text" class="int-text int-text-mid" id="val_loanbussiness">
<em>万元</em>
<span id="sdtip" class="com-msg none">
<i class="lp-icons error-icon"></i>
<span>不能为空！</span>
</span>
</div>
</div>
</div>
<div class="tools-item tools-item6">
<label class="fl">贷款时间</label>
<div class="select-item fl">
<div class="xf-select xf-select-max">
<div class="text">
<span>20年（240个月）</span>
<input type="hidden" name="val_loanmonth" id="val_loanmonth" value="20">
<i class="lp-icons icon-tip"></i>
</div>
<ul>
<li data-code="1">1年（12期）</li>
<li data-code="2">2年（24期）</li>
<li data-code="3">3年（36期）</li>
<li data-code="4">4年（48期）</li>
<li data-code="5">5年（60期）</li>
<li data-code="6">6年（72期）</li>
<li data-code="7">7年（84期）</li>
<li data-code="8">8年（96期）</li>
<li data-code="9">9年（108期）</li>
<li data-code="10">10年（120期）</li>
<li data-code="11">11年（132期）</li>
<li data-code="12">12年（144期）</li>
<li data-code="13">13年（156期）</li>
<li data-code="14">14年（168期）</li>
<li data-code="15">15年（180期）</li>
<li data-code="16">16年（192期）</li>
<li data-code="17">17年（204期）</li>
<li data-code="18">18年（216期）</li>
<li data-code="19">19年（228期）</li>
<li data-code="20">20年（240期）</li>
<li data-code="21">21年（252期）</li>
<li data-code="22">22年（264期）</li>
<li data-code="23">23年（276期）</li>
<li data-code="24">24年（288期）</li>
<li data-code="25">25年（300期）</li>
<li data-code="26">26年（312期）</li>
<li data-code="27">27年（324期）</li>
<li data-code="28">28年（336期）</li>
<li data-code="29">29年（348期）</li>
<li data-code="30">30年（360期）</li>
</ul>
</div>
</div>
</div>
<div class="tools-btn">
<i class="lp-icons btn-bg"></i>
<a href="javascript:;" class="btn btn-b" id="btn_startup">开始计算</a>
</div>
</div>
<div class="result-mod">
<h4>计算结果</h4>
<!-- charts-mod Starts -->
<div class="charts-mod">
<div class="charts-box" id="result-charts"></div>
<div class="text-box">
<h3>月均还款
<span class="price">-</span>
<em>元</em>
</h3>
<ul class="legend">
<li class="legend-pay">
<i class="lp-icons dot-1"></i>
<span>-</span>
</li>
<li class="legend-price">
<i class="lp-icons dot-2"></i>
<span>-</span>
</li>
<li class="legend-rate">
<i class="lp-icons dot-3"></i>
<span>-</span>
</li>
</ul>
</div>
</div>
<p class="result-tips">备注：以等额本息计算结果，数据仅供参考</p>
<!-- charts-mod End -->
</div>
</div>
</div>
<script>
seajs.use("yuegong");
</script>
    
<?php } ?>
<!-- 价格走势、相近楼盘 -->
<div class="detail_c mt16 cf">
<div class="fl">
<div class="zoushi">
<div class="con_title"><a href="<?php echo $linkurl;?>jiage.html" class="more" target="_blank">更多…</a><?php echo $title;?>价格走势</div>
<div class="con_c">
                                            <div class="title cf">
                            <span class="jg">当前参考售价：          <b><?php if($price) { ?><?php echo $price;?></b>元/平方米<?php } else { ?>待定</b><?php } ?>
</span>
                            <ul class="cf menu">
                              
                                <li><span data-date="all">全部</span></li>
                            </ul>
                        </div>
                    <div id="price_panl" data-id="477">
<img src="<?php echo AJ_SKIN;?>images/common/noprice.jpg"></div>
                    </div>
<script>
seajs.use(["highcharts","alert"],function(hs,alertM){

                        if($("#price_panl").size()>0){
hs('price_panl',"<?php echo $title;?>", <?php echo get_houseprice($itemid);?>,'元/平米');

                        }
});
</script>
</div>
</div>
<div class="fr">
                            <div class="xiangjin">
                    <div class="con_title"><a href="<?php echo $MODULE['6']['linkurl'];?>list.html" class="more" target="_blank">更多…</a>价位相近楼盘</div>
                    <div class="con_c">
                        <ul>
<?php $tags=tag("moduleid=6&condition=status=3 and isnew=1 and itemid!=$itemid and  $pricea<=price and price <=$priceb&areaid=$cityid&length=42&pagesize=10&order=addtime desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> <li>[<?php echo area_pos($t['areaid'], '');?>] <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a><span class="red"><?php if($t['price']) { ?><?php echo $t['price'];?>元/平<?php } else { ?>待定<?php } ?>
</span></li><?php } } ?>
 
                                                    </ul>
                    </div>
                </div>
            </div>
</div>
<!-- 点评、印象 -->
<div class="detail_c mt16 cf" id="dianpingmodel">

<div class="fl">

<?php include template('commenthouse', 'chip');?>
</div>
<div class="fr fr_t">

                            <div class="pk">
                    <div class="con_title"><?php echo $title;?>跟谁PK</div>
                    <div class="con_c">
                        <ul>
<?php $tags=tag("moduleid=6&condition=status=3 and isnew=1&areaid=$areaid&length=42&pagesize=11&order=addtime desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> <li>[<?php echo area_pos($t['areaid'], '');?>] <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a><a href="<?php echo $MODULE['6']['linkurl'];?>pk/<?php echo $itemid;?>-<?php echo $t['itemid'];?>" class="red" target="_blank">对比</a></li><?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
</div>
<!-- 网友正在关注的楼盘 -->
                    <div class="guanzhu mt16">
                <div class="con_title">网友正在关注的楼盘</div>
                <ul class="cf">
<?php $tags=tag("moduleid=6&condition=status=3 and isnew=1&areaid=$cityid&length=42&pagesize=6&order=hits desc&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?> 
                        <li <?php if($i==0) { ?>class="on"<?php } ?>
>
                            <div class="thumb">
                                <div class="img"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" width="150" height="110"></a></div>
                                <div class="text">
                                    <h3><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></h3>
                                    <p><?php if($t['price']) { ?><?php echo $t['price'];?>元/平米<?php } else { ?>待定<?php } ?>
</p>
                                </div>
                            </div>
                        </li><?php } } ?>
                </ul>
            </div>
        
<!-- 各楼盘对比 -->


</div>
<div class="detail_shengming">免责声明：本网站所刊载的"新房"所有资料及图表仅供参考使用，不声明或保证其内容之正确性或可靠性。刊载这些文档不视为<?php echo $title;?>已取得商品房预售许可证或达到可以销售的标准，且不构成对任何楼盘的购买的邀约或意图。参阅本网站上所刊的文档的人士，应被视为已确认得悉上述立场。购房者依据本网站提供的信息、资料及图表进行房屋交易做造成的任何后果与本网站无关。本网站有权但无此义务，改善或更正资料及图表任何部分之错误或疏忽。以上信息仅供参考，所有信息以开发商提供为准！
</div>
<script>
/**
 * alert 提示框
 * jquery jQuery
 * hx-list 户型列表
 *
 *
 */
seajs.use(["alert","jquery","hx-list"],function(alertM){
//收藏
$(".icon-7").on("click", function() {
var sURL = window.location.href;
var sTitle = document.title;
try {
window.external.addFavorite(sURL, sTitle);
} catch (e) {
try {
window.sidebar.addPanel(sTitle, sURL, "");
} catch (e) {
alertM("加入收藏失败，请使用Ctrl+D进行添加", {
cName: "alert"
});
}
}
return false;
});
//扫描到手机
$(".saomiao").mouseenter(function(){
$("#smphone").show();
}).mouseleave(function(){
$("#smphone").hide();
});
});
seajs.use(["alert","loginafter","autoc"],function(alertM,loginafter,pk){
});
seajs.use(["alert","cookie"], function(alertM,fm) {
if(!$.cookie("wx_tip1"))
var $wx_tip=$("#wx_tip").on("click","a",function(){
$wx_tip.remove();
$.cookie("wx_tip1","1",{expires:3})
}).css("display","block")
})
</script>
</body>
</html>