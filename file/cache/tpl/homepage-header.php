<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!--大话插件加载-->
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="static/dahua/jquery.SuperSlide.2.1.1.js"></script>
<!--大话插件加载end-->
<?php if($css) { ?><style type="text/css"><?php echo $css;?></style><?php } ?>
<link rel="stylesheet" rev="stylesheet" href="template/default/homepage/static/css/slick.css" type="text/css" />
<link rel="stylesheet" rev="stylesheet" href="template/default/homepage/static/css/ershou_web_broker_broker.css" type="text/css" />
<style media="screen">
.comrow{
    padding: 20px;
    border: 1px solid #ebebeb;
    overflow: hidden;
width: 1200px;
height: 260px;
margin: 0 auto;
border: none;
}
.left{
float: left;
width: 500px;
height: 100%;
padding: 20px;
}
.right{
float: right;
    width: 600px;
margin-top:20px;
}
.right p{
width: 100%;
font-size: 14px;
height: 30px;
line-height: 30px;
overflow: hidden;
margin:0px;
}
strong{
color: #666;
font-weight: bold;
}
.comrow-bot{
height: auto;
position: relative;
}
</style>
<div class="comrow">
<div class="left">
<style type="text/css">
/* css 重置 */
*{margin:0; padding:0; list-style:none; }
body{ background:#fff; font:normal 12px/22px 宋体;  }
img{ border:0;}
a{ text-decoration:none; color:#333;  }
/* 本例子css */
.slideBox{ width:450px; height:230px; overflow:hidden; position:relative; border:1px solid #ddd;  }
.slideBox .hd{ height:15px; overflow:hidden; position:absolute; right:5px; bottom:5px; z-index:1; }
.slideBox .hd ul{ overflow:hidden; zoom:1; float:left;  }
.slideBox .hd ul li{ float:left; margin-right:2px;  width:15px; height:15px; line-height:14px; text-align:center; background:#fff; cursor:pointer; }
.slideBox .hd ul li.on{ background:#f00; color:#fff; }
.slideBox .bd{ position:relative; height:100%; z-index:0;   }
.slideBox .bd li{ zoom:1; vertical-align:middle; }
.slideBox .bd img{ width:450px; height:230px; display:block;  }
/* 下面是前/后按钮代码，如果不需要删除即可 */
.slideBox .prev,
.slideBox .next{ position:absolute; left:3%; top:50%; margin-top:-25px; display:block; width:32px; height:40px; background:url(images/slider-arrow.png) -110px 5px no-repeat; filter:alpha(opacity=50);opacity:0.5;   }
.slideBox .next{ left:auto; right:3%; background-position:8px 5px; }
.slideBox .prev:hover,
.slideBox .next:hover{ filter:alpha(opacity=100);opacity:1;  }
.slideBox .prevStop{ display:none;  }
.slideBox .nextStop{ display:none;  }
</style>
<div id="slideBox" class="slideBox">
<div class="hd">
<ul><li>1</li><li>2</li><li>3</li></ul>
</div>
<div class="bd">
<ul>
<li><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic1.jpg" /></a></li>
<li><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic2.jpg" /></a></li>
<li><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic3.jpg" /></a></li>
</ul>
</div>
<!-- 下面是前/后按钮代码，如果不需要删除即可 -->
<a class="prev" href="javascript:void(0)"></a>
<a class="next" href="javascript:void(0)"></a>
</div>
<script type="text/javascript">
jQuery(".slideBox").slide({mainCell:".bd ul",autoPlay:true});
</script>
</div>
<div class="right">
<h1><b style="font-size:20px"><?php echo $COM['company']?></b></h1>
<p><strong>电话：</strong><?php echo $COM['telephone']?></p>
<p><strong>地址：</strong><?php echo $COM['address']?></p>
<p><strong>法人：</strong><?php echo $COM['owner']?></p>
<p><strong>邮箱：</strong><?php echo $COM['comemail']?></p>
<p><strong>注册时间：</strong><?php echo $COM['rigister_time']?></p>
<p><strong>注册资金：</strong><?php echo $COM['register_mon']?></p>
<p style="width:100%;height:auto"><strong>介绍：</strong><?php echo $COM['intruce']?></p>
</div>
</div>
<style media="screen">
.comrow-bot{
width: 1200px;
margin: 0 auto;
border: none;
padding: 20px;
}
.botli{
position: relative;
  width: 100%;
  height: 134px;
  cursor: pointer;
  padding: 23px 0 24px 7px;
  border-bottom: 1px dashed #999;
  background-color: #fff;
}
</style>
<div class="w1180">
    <div class="maincontent">
        <div class="list-content" id="list-content" style="width:100%">
        <div class="sortby clearfix"></div>
      <!-- 经纪人列表 start -->
<?php foreach($members as $member){?>
<div class="jjr-itemmod" link="<?php echo $MODULE['1']['linkurl'];?>index.php?homepage=<?php echo $COM['company'];?>&member=<?php echo $member['userid'];?>" _soj="esf_list_skfyfdgl" style="width:100%">
<a class="img" data-sign="true" target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>index.php?homepage=<?php echo $COM['company'];?>&member=<?php echo $member['userid'];?>" _soj="esf_list_skfyfdgl" title="<?php echo $member['truename']?>" alt="<?php echo $member['truename']?>" hidefocus="true">
<img class="thumbnail" src="static/picture/100x133.jpg" alt="<?php echo $member['truename']?>" width="100" height="133"/>
</a>
<div class="jjr-info">
<div class="jjr-title">
<h3>
<a target="_blank" title="<?php echo $member['truename']?>" href="<?php echo $MODULE['1']['linkurl'];?>index.php?homepage=<?php echo $COM['company'];?>&member=<?php echo $member['userid'];?>" _soj="esf_list_skfyfdgl"><?php echo $member['truename']?></a>
</h3>
<div class="broker-level clearfix">
<span class="stars-title"></span>
<div class="stars-wrap-bk" style="width:90px">
<p class="stars-bg" style="width:90px"><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i></p>
<p class="stars-solid" style="width:90px"><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i><i class="iconfont">&#xE108;</i></p>
</div>
<!-- 如果持平显示与同城平均水平持平 -->
</div>
<div class="brokercard-scorewrap clearfix">
<span class="brokercard-scoretitle"></span>
<div class="brokercard-scoredetail">
<div class="brokercard-sd-cont clearfix">
<!-- <span class="score-up clearfix no-pd-left" style="border-width:0;padding-left:0;">
<em>房源：</em><em class="score-num">100</em>
</span> -->
</div>
<div class="brokercard-sd-tip" style="bottom: 35px;">
<i class="arr-down"><i></i></i>
<div class="score-up"><span class="mg-r">房源真实：<em class="score-num">100</em><i class="score-tag"></i></span><span>打败了64.6%的同城经纪人</span>            </div>
<div class="score-up"><span class="mg-r">服务效率：<em class="score-num">100</em><i class="score-tag"></i></span><span>打败了59.7%的同城经纪人</span>            </div>
<div class="score-up"><span class="mg-r">用户评价：<em class="score-num">100</em><i class="score-tag"></i></span><span>打败了96.4%的同城经纪人</span>            </div>
</div>
</div>
</div>
 </div>
<p class="jjr-desc">
<span>电话：</span>
<!-- <div style="clear:both;display:inline-block;min-width:120px;"> -->
<?php echo $member['mobile'];?>
<!-- </div> -->
</p>
<p class="jjr-desc xq_tag"><span>地址：</span><?php echo $member['address'];?></p>
<div>
<div class="broker-tags clearfix">
<span><?php echo area_pos($member['areaid'], '');?></span>
<span class="pink-c">优质中介</span>
</div>
</div>
 </div>
</div>
<?}?>
    </div>
   </div>
  </div>
</body>
</html>
