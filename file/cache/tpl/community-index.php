<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<div id="main">
<div class="bread">您当前的位置：<a href="<?php echo $MODULE['1']['linkurl'];?>" title="<?php echo $AJ['sitename'];?>"><?php echo $AJ['sitename'];?></a>&gt;<a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>&gt;<span>小区找房</span></div>
<div class="hslist" id="hslist">
<h2 class="modTab">
<a href="<?php echo $MOD['linkurl'];?>list.html" >区域找房</a>
<a href="<?php echo $MODULE['1']['linkurl'];?>map">地图找房</a>
<a href="<?php echo $MODULE['18']['linkurl'];?>" class="on">小区找房</a>
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
<span>类型：</span>
&nbsp;&nbsp;
<a <?php if(empty($catid)) { ?>class="c"<?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'t');?>.html">全部</a>
                                                             <?php $maincat = get_maincat(0,6)?>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?><a <?php if($catid==$v['catid']) { ?>class="c"<?php } ?>
  href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'t');?>-t<?php echo $v['catid'];?>.html"><?php echo $v['catname'];?></a><?php } } ?>
             </div>

<div class="cf Letter">
<span>首字母：</span>
<p>
<a <?php if(empty($letter)) { ?>class="n c"<?php } else { ?><?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'j');?>.html" >全部</a>
    <?php $l = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');?>
<?php if(is_array($l)) { foreach($l as $k => $v) { ?><a <?php if($letter==$v) { ?>class="n c"<?php } else { ?><?php } ?>
 href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'j');?>-j<?php echo $v;?>.html"><?php echo $v;?></a><?php } } ?>
</p>
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
共为您找到 <b class="red"><?php echo $items;?></b> 个小区<a class="pre" href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php if($page==1) { ?>1<?php } else { ?><?php echo $page-1;?><?php } ?>
.html"></a><?php echo $page;?><a class="next" href="<?php echo $MOD['linkurl'];?>list<?php echo deal_str($lst,'g');?>-g<?php if($page==$total) { ?><?php echo $total;?><?php } else { ?><?php echo $page+1;?><?php } ?>
.html">下一页</a></span>
<span class="modTab">
<a <?php if(empty($hot)) { ?> class="on"<?php } ?>
 href="list.html" >全部小区</a>
                

</span>
</h2>
<div class="hlist_sort">
<div class="cf">
<form id="hls_search" action="<?php echo $MODULE['18']['linkurl'];?>search.html" class="cf fl">

<input type="search" id="hname" name="kw" placeholder="请输入小区名字" x-webkit-speech value="">
                
<button  id="kwsearch" type="submit">搜索</button>
</form>
<div class="fr_1">
<div class="hs_mlist" id="h_s1">默认排序<ul>
                                    <li>
                                        <a href="list<?php echo deal_str($lst,'n');?>.html">默认排序</a> 
                                    </li>
                                                                            <li>
                                            <a href="list<?php echo deal_str($lst,'n');?>-n1.html">人气从高到低</a>
                                        </li>
                                        <li>
                                            <a href="list<?php echo deal_str($lst,'n');?>-n2.html">人气从低到高</a>
                                        </li>
                                    </ul>
</div>
<a href="<?php if($ord==1) { ?>list<?php echo deal_str($lst,'n');?>-n2.html<?php } else { ?>list<?php echo deal_str($lst,'n');?>-n1.html<?php } ?>
"  class="A1 <?php if($ord==1) { ?>down<?php } ?>
<?php if($ord==2) { ?>up<?php } ?>
">人气</a>

</div>
</div>
</div>
                
                                  <?php echo tag("moduleid=$moduleid&condition=status=3$dtype&areaid=$cityid&&pagesize=".$MOD['pagesize']."&page=$page&showpage=1&datetype=5&order=".$MOD['order']."&fields=".$MOD['fields']."&template=list-community");?>
  

</div>
<div class="hlist_fr">
<div class="hlist_btn cf">
<a href="<?php echo $MODULE['2']['linkurl'];?>my.php?mid=5&action=add" class="obtn fl" target="_blank"><i class="edit"></i>发布出售</a>
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
                                        <td>&nbsp;<?php if($t['price']) { ?><?php echo $t['price'];?>万<?php } else { ?>面议<?php } ?>
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
seajs.use(["autofh","autoc","autab","cookie"],function(pk){
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