<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<link href="<?php echo AJ_SKIN;?>xiaoqu.css" rel="stylesheet" type="text/css"/>
<div id="main">
<div class="bread">您当前的位置：<a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><?php echo $AJ['sitename'];?></a>&gt;<a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>&nbsp;&gt;<?php echo $title;?></div>
<div class="Atitle">
<h1><?php echo $title;?></h1>
<div class="subNav cf">
<ul class="cf">
<li><a class="on" href="<?php echo $linkurl;?>">小区概况</a></li>
            <li><a  href="<?php echo $linkurl;?>price.html">价格走势</a></li>
            <li><a  href="<?php echo $linkurl;?>sale.html">二手房</a></li>
            <li><a  href="<?php echo $linkurl;?>rent.html">租房</a></li>
            <li><a  href="<?php echo $linkurl;?>map.html">周边地图</a></li>
           
</ul>
</div>
</div><div class="intro cf mt10">
<div class="select-pic fl lh">
<a href="" target="_blank"><img  id="sBigImg" src="<?php echo imgurl240($thumb);?>" width="588"></a>

</div>
<div class="xq_right">
<p>
<span>本月均价：</span>
<?php if(get_avg_price($itemid)) { ?><strong class="xq_price"><?php echo get_avg_price($titemid);?></strong>元/平米 <?php } else { ?><strong>待定</strong><?php } ?>
    同比上月：<strong class="up_icon"><?php echo $percent_change;?></strong>
<a class="blue" href="<?php echo $linkurl;?>price.html" target="_blank">查看小区房价走势>></a>
</p>
<span></span>房源数量：<a class="blue" href="<?php echo $linkurl;?>sale.html" target="_blank">二手房：<?php echo get_sale($itemid);?>套</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="blue" href="<?php echo $linkurl;?>rent.html" target="_blank">租房：<?php echo get_rent($itemid);?>套</a>
<ul>
<li><span>所属区域：</span><?php echo area_pos($areaid, '');?></li>
<li><span>小区地址：</span><?php echo $address;?><a class="blue" href="<?php echo $linkurl;?>map.html" target="_blank">查看周边地图>></a></li>
</a><li><span>项目类型：</span>
<?php echo search_cats($catid, '6');?></li>
<li><span>车&nbsp;&nbsp;&nbsp;&nbsp;位&nbsp;：</span>&nbsp;<?php if($lp_car) { ?><?php echo $lp_car;?><?php } else { ?>待定<?php } ?>
</li>
<li><span>物&nbsp;业&nbsp;费&nbsp;：</span>&nbsp;<?php echo $lp_costs;?>元/平方米·月</li>
<li><span>物业公司：</span>&nbsp;<?php echo $lp_company;?></li>

</ul>
</div>
</div>
<div class="cf mt25">
<div class="fl w900">
<div class="xql f14">
<h2>小区介绍</h2>
<table border="1" cellpadding="0" cellspacing="0" class="partk w900">
<tbody>
<tr>
<td width="90" class="title">绿化率：</td>
<td width="230"><?php echo $lp_green;?>%</td>
<td width="90" class="title">容积率：</td>
<td width="230"><?php if($lp_volume) { ?><?php echo $lp_volume;?><?php } else { ?>待定<?php } ?>
</td>
</tr>
<tr>
<td class="title">建筑面积：</td>
<td width="230"><?php if($lp_area) { ?><?php echo $lp_area;?><?php } else { ?>待定<?php } ?>
</td>
<td width="90" class="title">占地面积：</td>
<td width="230"><?php if($lp_totalarea) { ?><?php echo $lp_totalarea;?><?php } else { ?>待定<?php } ?>
</td>
</tr>
<tr>
<td class="title">竣工时间：</td>
<td colspan="3"><?php if($completion) { ?><?php echo $completion;?><?php } else { ?>待定<?php } ?>
</td>
</tr>


</tbody>
</table><br>
<p><p>
<?php echo $introduce;?></p>
</p>
</div>
<div class="xql xqdt" id="tab2">
<ul class="cond-bar">
<li class="on">区域地标</li>
<li>周边介绍</li>
<li>生活服务</li>
</ul>
<div class="xq_map cf mapindex">
<div class="xq_ditu">
<div class="map" id="map"></div>
<a href="<?php echo $linkurl;?>map.html" target="_blank" class="seeB" style="margin-left:199px">查看大图</a>
</div>
<div class="cont">
<p>
<strong>地铁线路</strong><br>
暂无数据</p>
<p>
<strong>公交线路</strong><br>
<?php if($lp_bus) { ?><?php echo $lp_bus;?><?php } else { ?>暂无数据<?php } ?>
</p>
</div>
<div class="cont" style="display:none;">
<p>
中小学：<?php echo $lp_edu;?>
医院：<?php echo $lp_hospital;?>
银行：<?php echo $lp_bank;?>
其他：停车位：<?php echo $lp_car;?> 
</p>
<a class="blue" href="<?php echo $linkurl;?>map.html">更多>></a>
</div>
<div class="cont sh" style="display:none;" id="maptag">
<a href="javascript:" >运动健身</a>
<a href="javascript:" >公交</a>
<a href="javascript:" >医院</a>
<a href="javascript:" >学校</a>
<a href="javascript:" >医疗</a>
<a href="javascript:" >婚庆</a>
<a href="javascript:" >快递</a>
<a href="javascript:" >餐饮</a>
</div>
</div>
</div>
<div class="xql" style="position: relative;" id="tab3">
<h2><span class="blue"><?php echo $title;?></span>价格走势</h2>
<div class="jg_tab">
<a class="on" href="javascript:">二手房房价走势<span class="up"></span></a>

</div>
<div class="jgzs xq_bor">
<p class="mb10 fr">
本月均价：<?php if(get_avg_price($itemid)) { ?><strong class="orange"><?php echo get_avg_price($titemid);?></strong>元/平米 <?php } else { ?><strong>待定</strong><?php } ?>
<br>同比上月：<strong class="up_icon"><sub></sub><?php echo $percent_change;?></strong> 
<br>   
<a class="blue " href="<?php echo $linkurl;?>sale.html">查看最新二手房>></a>
</p>
<div style="width:500px;height:200px;margin:29px 0 0 0" id="hc1"></div>
</div>

</div>
</div>
<div class="w260 fr">
<div class="modD">
<h4>热门小区</h4>
<ul class="name-price">
<?php $tags=tag("moduleid=18&condition=status=3&areaid=$cityid&length=22&pagesize=6&order=hits desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li class="cf">
<span class="red"> <strong><?php if(get_avg_price($t['itemid'])) { ?><?php echo get_avg_price($t['itemid']);?></strong>元/㎡<?php } else { ?>待定</strong><?php } ?>
</span><a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a>
</li><?php } } ?>
</ul>
</div>
<div class="modD">
<h4>周边售房信息</h4>
<ul class="name-price">
<?php $tags=tag("moduleid=5&condition=status=3&areaid=$areaid&length=22&pagesize=6&order=hits desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><li class="cf">
<span class="red"> <strong><?php if($t['price']) { ?><?php echo $t['price'];?></strong>万<?php } else { ?>待定</strong><?php } ?>
</span><a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a>
</li><?php } } ?>
</ul>
</div>
<div class="modD">
<h4>周边租房信息</h4>
<ul class="name-price">
<?php $tags=tag("moduleid=7&condition=status=3&areaid=$areaid&length=22&pagesize=6&order=hits desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><li class="cf">
<span class="red"> <strong><?php if($t['price']) { ?><?php echo $t['price'];?></strong>元/月<?php } else { ?>待定</strong><?php } ?>
</span><a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a>
</li><?php } } ?>
</ul>
</div></div>
</div>
<div class="bottom-link">
<dl class="cf">
<dt>附近小区</dt>
<dd class="cf"><?php $tags=tag("moduleid=18&condition=status=3&areaid=$areaid&length=22&pagesize=5&order=addtime desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a>
 <?php } } ?>
</dd>
</dl>
</div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=A0d7a1091e5b98f5430228d016ee0ac7"></script>
<script type="text/javascript">
seajs.use(["jquery","snail-baiduaround","highcharts","autab"],function($,snail,highcharts){
$("#tab3").autab("div.jg_tab a","div.jgzs");
$("#tab2").autab("ul.cond-bar li","div.cont");
snail.setURL("<?php echo $MODULE['6']['linkurl'];?>");
snail.drawMap(parseFloat("<?php echo $x;?>"),parseFloat("<?php echo $y;?>"),"<?php echo $title;?>","map");
snail.getMaps();
$('#maptag a').click(function(){
snail.setKEY($(this).text());
snail.setH(false);
snail.getMaps();
})
highcharts('hc1',"<?php echo $title;?>",[<?php echo get_linedate($itemid);?>],[<?php echo get_lineprice($itemid);?>],'元/平米');
chart = new Highcharts.Chart({
            chart: {
                renderTo: 'hc2'
            },
           
            tooltip: {
                formatter: function() {
                    return '<b>' + this.series.name+'-' + this.x + '</b><br/>' + this.y+'元/月';
                }
            },
           
        });

})
</script>
