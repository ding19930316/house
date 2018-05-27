<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<div id="main">
<div class="bread">您当前的位置：<a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><?php echo $AJ['sitename'];?></a>&gt;<a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>&gt;<span>房源搜索</span></div>
<div class="hslist" id="hslist">
<h2 class="modTab">
<a href="<?php echo $MOD['linkurl'];?>list.html" class="on">区域找房</a>
<a href="<?php echo $MODULE['1']['linkurl'];?>map">地图找房</a>
<a href="<?php echo $MODULE['18']['linkurl'];?>">小区找房</a>
</h2>
<div class="hs_b">
                <div class="cf">
                    <span>区域：</span>
                    <p id="hs_area">
                        <a href="javascript:" class="hs_hide"><u class="hs_mo">更多</u><u class="hs_le">收起</u></a>
                       <a <?php if(empty($areaid)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'r');?>.html">全部</a>
                                                       <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?><a <?php if($areaid==$v['areaid']) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list-r<?php echo $v['areaid'];?><?php echo deal_str($lst,'r');?>.html"><?php echo $v['areaname'];?></a><?php } } ?>
                                                </p>
                                    </div>
              
<div class="cf">

<span>价格：</span>
&nbsp;&nbsp;
<a <?php if(empty($range)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'r');?>.html">全部</a>

                                                              <?php $range_arr = getbox_name('range','rent_7')?>
    <?php if(is_array($range_arr)) { foreach($range_arr as $key => $v) { ?>
 <a <?php if($range==$key) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'p');?>-p<?php echo $key;?>.html"><?php echo $v;?></a><?php } } ?>
 <em class="autoF">
<form action="list<?php echo deal_str($lst,'p');?>-e" method="get" >
<input type="number" value="<?php echo $minprice;?>"> - 
<input type="number" value="<?php echo $maxprice;?>"> 元
<button type="button" class="pobtn">筛选</button>
</form>
</em>
                                
          </div>
<div class="cf">

<span>面积：</span>
&nbsp;&nbsp;
    <a <?php if(empty($area)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'c');?>.html">全部</a>
                                                             <?php $mianji = array('40平米以下', '40-60平米', '60-80平米', '80-100平米', '100-120平米', '120-150平米','150平米以上');?>
<?php if(is_array($mianji)) { foreach($mianji as $k => $v) { ?> 
                  <a <?php if($area==($k+1)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'c');?>-c<?php echo $k+1;?>.html"><?php echo $v;?></a>
   <?php } } ?>  
   <em class="autoF">
<form action="list<?php echo deal_str($lst,'p');?>-m" method="get" >
<input type="number" value="<?php echo $minarea;?>"> - 
<input type="number" value="<?php echo $maxarea;?>">平米
<button type="button" class="pobtn">筛选</button>
</form>   
</em>   
  </div>
<div class="cf">
<span>户型：</span>
<p>
                      <a <?php if(empty($hu)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'i');?>.html">全部</a>
<?php $huxing = array('一室', '二室', '三室', '四室', '五室以上');?>
<?php if(is_array($huxing)) { foreach($huxing as $k => $v) { ?> <a <?php if($hu==($k+1)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'i');?>-i<?php echo $k+1;?>.html"><?php echo $v;?></a><?php } } ?>
                            </p>
</div>
<div class="hs_more" id="hs_more">
<span>更多：</span>
<div class="hs_mlist">装修不限<ul>
<li><a <?php if(empty($fix)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'v');?>.html">不限</a></li>
                  <?php $fix_arr = getbox_name('zhuanxiu','rent_7')?>
    <?php if(is_array($fix_arr)) { foreach($fix_arr as $key => $v) { ?>
<li><a <?php if($fix==$key) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'f');?>-f<?php echo $key;?>.html"><?php echo $v;?></a></li><?php } } ?>
                                </ul>
</div>
<div class="hs_mlist">楼层不限<ul>
        <li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'l');?>.html" >不限</a></li>
                    <li> <a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'l');?>-l1.html" >6层以下</a></li>
                                <li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'l');?>-l2.html" >6-12层</a></li>
                                <li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'l');?>-l3.html" >12-20层</a></li>
                                <li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'l');?>-l4.html" >20层以上</a></li>
                                </ul>
</div>
<div class="hs_mlist">朝向不限<ul>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'s');?>.html">不限</a></li>
                                                     <?php $toward_arr = getbox_name('toward','rent_7')?>
    <?php if(is_array($toward_arr)) { foreach($toward_arr as $key => $v) { ?>
<li><a  href="<?php echo $MOD['linkurl'];?>list-s<?php echo $key;?><?php echo deal_str($lst,'s');?>.html" ><?php echo $v;?></a></li><?php } } ?>  
                                </ul>
</div>
<div class="hs_mlist">房龄不限<ul>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'y');?>.html">不限</a></li>
                                                           <?php $yearr = array('2000年以前', '2000年以后', '2005年以后', '2010年以后');?>
<?php if(is_array($yearr)) { foreach($yearr as $k => $v) { ?>
<li><a  href="<?php echo $MOD['linkurl'];?>list-y<?php echo $k+1;?><?php echo deal_str($lst,'y');?>.html" ><?php echo $v;?></a></li><?php } } ?>  
                                </ul>
</div>
<div class="hs_mlist">类型不限<ul >
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'t');?>.html">不限</a></li>
                                                             <?php $maincat = get_maincat(0,7)?>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?><li><a   href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'t');?>-t<?php echo $v['catid'];?>.html"><?php echo $v['catname'];?></a></li><?php } } ?>
                                </ul>
</div>
</div> 
<?php if(!empty($lstaddr)) { ?>

<div class="hs_sltd">
                        您已选择： <?php echo $lstaddr;?>  <a href="list.html" class="clear">重置筛选条件</a>
                    </div>
<?php } ?>
                </div></div>
<div class="cf">
<div class="hlist_fl">
<h2>
<span class="hl_page">
共为您找到 <b class="red"><?php $rentcount=$db->get_one("SELECT COUNT(*) AS num FROM ".$AJ_PRE."rent_7 WHERE status=3");?>
<?php echo $rentcount['num'];?></b> 个房源<a class="pre" href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php if($page==1) { ?>1<?php } else { ?><?php echo $page-1;?><?php } ?>
.html"></a><?php echo $page;?><a class="next" href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php if($page==$total) { ?><?php echo $total;?><?php } else { ?><?php echo $page+1;?><?php } ?>
.html">下一页</a></span>
<span class="modTab">
<a <?php if(empty($hot)) { ?> class="on"<?php } ?>
 href="list.html" >全部房源</a>
                <a <?php if($hot=="1") { ?> class="on"<?php } ?>
 href="list<?php echo deal_str($lst,'u');?>-h1.html" >新推房源</a>
                <a <?php if($hot=="3") { ?> class="on"<?php } ?>
 href="list<?php echo deal_str($lst,'u');?>-h3.html" >急售房源</a>
                <a <?php if($hot=="2") { ?> class="on"<?php } ?>
 href="list<?php echo deal_str($lst,'u');?>-h2.html" >推荐房源</a>
                <a <?php if($source=="1") { ?> class="on"<?php } else { ?> class="red"<?php } ?>
 href="list<?php echo deal_str($lst,'u');?>-u1.html" >个人房源</a>

</span>
</h2>
<div class="hlist_sort">
<div class="cf">
<div class="fr ">
<div class="hs_mlist" style="float:right" id="h_s2">发布时间<ul>

                                     <li>  <a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'o');?>.html"  <?php if(empty($opentime)) { ?> class="c" <?php } ?>
>不限</a> </li>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'o');?>-o3.html" <?php if($opentime=="3") { ?> class="c" <?php } ?>
 >3天内发布</a></li>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'o');?>-o7.html" <?php if($opentime=="7") { ?>  class="c" <?php } ?>
>7天内发布</a></li>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'o');?>-o15.html" <?php if($opentime=="15") { ?>  class="c" <?php } ?>
>15天内发布</a></li>
<li><a href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'o');?>-o30.html" <?php if($opentime=="30") { ?>  class="c" <?php } ?>
>30天内发布</a></li>
                                                                           
                                        
</ul>
</div>
</div>
<div class="hs_mlist" id="h_s1">默认排序<ul>
                             <li>
<a href="list<?php echo deal_str($lst,'n');?>-n2.html" >面积从大到小</a>
</li>
<li>
<a href="list<?php echo deal_str($lst,'n');?>-n3.html" >面积从小到大</a>
</li>
<li>
<a href="list<?php echo deal_str($lst,'n');?>-n4.html" >租金从高到低</a>
</li>
<li>
<a href="list<?php echo deal_str($lst,'n');?>-n5.html" >租金从低到高</a>
</li>
</ul>
</div>
<a href="<?php if($ord==2) { ?>list<?php echo deal_str($lst,'n');?>-n3.html<?php } else { ?>list<?php echo deal_str($lst,'n');?>-n2.html<?php } ?>
"  class="A1 <?php if($ord==2) { ?>down<?php } ?>
<?php if($ord==3) { ?>up<?php } ?>
">面积</a>
<a href="<?php if($ord==4) { ?>list<?php echo deal_str($lst,'n');?>-n5.html<?php } else { ?>list<?php echo deal_str($lst,'n');?>-n4.html<?php } ?>
"  class="A1 <?php if($ord==4) { ?>down<?php } ?>
<?php if($ord==5) { ?>up<?php } ?>
">租金</a>

</div>

</div>
                
                                  <?php echo tag("moduleid=$moduleid&condition=status=3$dtype&areaid=$cityid&catid=$catid&pagesize=".$MOD['pagesize']."&page=$page&showpage=1&datetype=5&order=".$MOD['order']."&fields=".$MOD['fields']."&template=list-rent");?>
  

</div>
<div class="hlist_fr">
<div class="hlist_btn cf">
<a href="<?php echo $MODULE['2']['linkurl'];?>my.php?mid=7&action=add" class="obtn fl" target="_blank"><i class="edit"></i>发布出售</a>
<a href="<?php echo $MODULE['2']['linkurl'];?>" class="obtn fr" target="_blank"><i class="bag"></i>管理房源</a>
</div>
                <div class="lista">
<h4>您最近浏览过的房源</h4>
      <table>
                                                                    <tbody>
<?php if(is_array($browseHouse)) { foreach($browseHouse as $k => $t) { ?> <tr>
                                        <td><a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>"><?php echo $t['housename'];?></a></td>
                                        <td>&nbsp;<?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
</td>
                                        <td><?php echo $t['houseearm'];?>㎡</td>
                                        <td>&nbsp;<?php if($t['price']) { ?><?php echo $t['price'];?>元/月<?php } else { ?>面议<?php } ?>
</td>
                                    </tr>
                                            <?php } } ?>
                                                            </tbody></table>
                        </div><div class="lista">
<h4><a href="<?php echo $MODULE['1']['linkurl'];?>broken/" target="_blank" class="more">更多&gt;&gt;</a>经纪人排行</h4>
                     
                        <ul class="jjrl">
<?php echo tag("table=member&condition=groupid=6&areaid=$cityid&order=userid desc&pagesize=10&template=sale-jjr");?>
                                           
                                                    </ul>
                    </div>                
</div>
</div>


                  
        </div>

<script>
seajs.use(["pk","autofh","autoc","autab","cookie"],function(pk){
pk({
elm:"#hlist a.hlist_db",
hlength:4,
url:"<?php echo $MOD['linkurl'];?>pk/",
type:"房源"
})
$("#hname").autoC("<?php echo $MODULE['6']['linkurl'];?>house.php?action=xiaoqu");
$("#hota").autab("h2 span a","ul")
$("#hs_more div").add("#h_s1,#h_s2").on({
mouseenter:function(){
$(this).find("ul").show()
},
mouseleave:function(){
$(this).find("ul").hide()
}
})
$("#hslist em.autoF").autofh()
//$("#hslist").find("form").autofh()
$("#hlist").on("mouseenter","li",function(){
$(this).addClass('on')
}).on("mouseleave","li",function(){
$(this).removeClass('on')
}).on("click","li",function(){
$(this).find("h3 a")[0].click();
}).on("click","a",function(e){
e.stopPropagation();
}).find("li").each(function(i){
if(i%3==2)
$(this).css("border-right","0")
}).last().css("border-right","0")
var $hotarea=$("#hotarea")
$hotarea.on("mouseover","dt",function(){
$hotarea.find("dd").hide().end().find("dt").removeClass("s");
$(this).addClass("s").next().show();
})
var $hs_area=$("#hs_area").on("click",".hs_hide",function(){
if($.cookie("hs_hide")){
$hs_area.removeClass("on")
$.cookie("hs_hide","")
}else{
$hs_area.addClass("on")
$.cookie("hs_hide",1)
}
})
if($hs_area.height()>32){
$hs_area.addClass("hs_hidep").find(".hs_hide").css("display","inline-block")
}
if($.cookie("hs_hide")){
$hs_area.addClass("on")
}
$("#pics_result").on("change",function(){
var h=window.location.href;
if($(this).prop("checked")&&h.indexOf("v4")<0){
h=h.split(".htm")
setTimeout(function() {
window.location.href = h[0]+"-v4.html";
}, 99)
}else if(!$(this).prop("checked")&&h.indexOf("v4")>0){
h=h.split("-v4")
setTimeout(function() {
window.location.href = h[0]+h[1];
}, 99)
}
})
$("#B1").click(function(){
$.cookie("esf_list","3");
window.location.reload();
})
$("#B2").click(function(){
$.cookie("esf_list","1");
window.location.reload();
})
$("#B3").click(function(){
$.cookie("esf_list","2");
window.location.reload();
})
});
</script>
<script type="text/javascript">
$("#esfindex").attr("class","on");
</script>
<?php include template('footer');?>