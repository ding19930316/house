<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo AJ_SKIN;?>news.css" />
<body class="index">
<div id="main">
<div id="index_banner" class="cf">
<div class="left fl">
                <h2>
         <?php $tags=tag("moduleid=8&condition=status=3  and level=5&areaid=$cityid&length=36&pagesize=1&order=addtime desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a><?php } } ?> 
    </h2>
<div id="banner">
    <span id="banner_left"></span>
    <span id="banner_right"></span>
    <ul class="cf"> <?php $tags=tag("moduleid=8&condition=status=3 and level=2 and thumb!=''&areaid=$cityid&order=addtime desc&pagesize=6&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
                        <li>
                  <a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"> <img alt="<?php echo $t['alt'];?>" src="<?php echo imgurl($t['thumb']);?>" /></a>
                        <h5><span><?php echo $t['title'];?></span></h5>
                    </a>
                </li><?php } } ?> 
                </ul>
</div>
</div>
<div class="right fl">
    <h2 class="cf"><span class="fl">楼市快报</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-29.html" title="点击查看更多" target="_blank">更多&gt;&gt;</a></h2>
    <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=29&length=48&pagesize=9&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i==0) { ?> <ul class="cf"><?php } ?>
         <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li>
          <?php if($i==4 ) { ?></UL><ol class="cf"><?php } else if($i==8) { ?></ol><?php } ?>
 
  <?php } } ?>
</div>
</div>
<div class="index_a index_zz cf">
<div class="first fl">
            <h2 class="cf"><span>看房日记</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-34.html" title="看房日记" target="_blank">更多&gt;&gt;</a></h2>
        <div class="zz cf">
   <?php $tags=tag("moduleid=8&condition=status=3  and thumb!=''&areaid=$cityid&catid=34&length=56&order=addtime desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
        <div class="img fl"> <a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"> <img alt="<?php echo $t['alt'];?>" src="<?php echo imgurl($t['thumb']);?>" />
                        <p class="img_txt"><?php echo $t['title'];?></p>
                    </a>
                        </div>
<?php } } ?>
        <ul class="fl cf">
                          <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=34&length=48&pagesize=4&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
                    </ul>
    </div>
    <div class="zz no_br cf">
         <?php $tags=tag("moduleid=8&condition=status=3  and thumb!=''&areaid=$cityid&catid=34&length=36&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
        <div class="img fl"> <a target="_blank" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"> <img alt="<?php echo $t['alt'];?>" src="<?php echo imgurl($t['thumb']);?>" />
                        <p class="img_txt"><?php echo $t['title'];?></p>
                    </a>
                        </div>
<?php } } ?>
        <ul class="fl cf">
                          <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=34&length=42&pagesize=4&order=hits desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
                    </ul>
    </div>
</div>
            <div class="second fl">
            <h2 class="cf"><span>本地资讯</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-28.html" title="本地资讯" target="_blank">更多&gt;&gt;</a></h2>
 <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=28&length=48&pagesize=8&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i==0) { ?>  <ul class="cf list no_top"><?php } else if($i==4) { ?><ul class="cf list"> <?php } ?>
         <li><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li>
          <?php if($i==3|| $i==7) { ?></UL><?php } else { ?><?php } ?>
 
  <?php } } ?>
    
</div>
            <div class="third fl">
            <h2><p class="fl"><span>楼市新闻眼</span></p><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-33.html" title="楼市新闻眼" target="_blank">更多&gt;&gt;</a></h2>
 <?php $tags=tag("moduleid=8&condition=status=3 and thumb!=''&areaid=$cityid&catid=33&length=48&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
            <h3><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a></h3>
        <div class="img cf">
            <p class="fl"><?php echo dsubstr($t['introduce'], 122, $suffix = '..');?><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank">[详细]</a></p>
            <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><img class="fr" src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
        </div>
<?php } } ?>
        <ul class="cf list">
                   <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=33&length=48&pagesize=3&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
            </ul>
</div>
</div>
        <div class="ads"></div>
<div class="index_a cf">
<div class="first fl">
            <h2 class="cf"><span>项目动态</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-35.html" title="项目动态" target="_blank">更多&gt;&gt;</a></h2>
<?php $tags=tag("moduleid=8&condition=status=3 and thumb!=''&areaid=$cityid&catid=35&length=48&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
        <div class="sy cf">
  <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><img class="fl" src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
 <div class="txt fl">
            <h4><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></h4>
            <p><?php echo dsubstr($t['introduce'], 96, $suffix = '..');?><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"  target="_blank">[详细]</a></p>
        </div>
            </div>
<?php } } ?>
    <ul class="cf list">
                    <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=35&length=48&pagesize=5&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
            </ul>
</div>
            <div class="second fl">
            <h2 class="cf"><span>新房导购</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-32.html" title="新房导购" target="_blank">更多&gt;&gt;</a></h2>
        <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=32&length=48&pagesize=9&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i==0) { ?>  <ul class="cf list no_top"><?php } else if($i==4) { ?><ul class="cf list"> <?php } ?>
         <li><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li>
          <?php if($i==3|| $i==8) { ?></UL><?php } else { ?><?php } ?>
 
  <?php } } ?>
</div>
            <div class="third fl">
            <h2><p class="fl"><span>购房手册</span></p><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-37.html" title="购房手册" target="_blank">更多&gt;&gt;</a></h2>
            <?php $tags=tag("moduleid=8&condition=status=3 and thumb!=''&areaid=$cityid&catid=37&length=48&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
            <h3><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a></h3>
        <div class="img cf">
            <p class="fl"><?php echo dsubstr($t['introduce'], 122, $suffix = '..');?><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank">[详细]</a></p>
            <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><img class="fr" src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
        </div>
<?php } } ?>
        <ul class="cf list">
                   <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=37&length=48&pagesize=4&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
            </ul>
</div>
</div>

<div class="index_b cf">
<div class="first fl">
            <h2 class="cf"><span>人物访谈</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-30.html" title="访谈" target="_blank">更多&gt;&gt;</a></h2>
<?php $tags=tag("moduleid=8&condition=status=3 and thumb!=''&areaid=$cityid&catid=30&length=58&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
       <div class="img cf">
  <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><img class="fl" src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
 <div class="txt fl">
            <h4><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></h4>
            <p><?php echo dsubstr($t['introduce'], 56, $suffix = '..');?><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"  target="_blank">[详细]</a></p>
        </div>
            </div>
<?php } } ?>

    <ul class="cf list">
                  <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=30&length=48&pagesize=5&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
            </ul>
</div>
            <div class="second fl">
            <h2 class="cf"><span>家居装修</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-60.html" title="家居装修" target="_blank">更多&gt;&gt;</a></h2>
      <?php $tags=tag("moduleid=8&condition=status=3 and thumb!=''&areaid=$cityid&catid=60&length=48&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
       <div class="img cf">
  <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><img class="fl" src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
 <div class="txt fl">
            <h4><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></h4>
            <p><?php echo dsubstr($t['introduce'], 56, $suffix = '..');?><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"  target="_blank">[详细]</a></p>
        </div>
            </div>
<?php } } ?>

    <ul class="cf list">
                  <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=60&length=48&pagesize=5&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
            </ul>
</div>
            <div class="third fl">
            <h2 class="cf"><span>二手房资讯</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-36.html" title="二手房资讯" target="_blank">更多&gt;&gt;</a></h2>
        <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=36&length=48&pagesize=9&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i==0) { ?>  <ul class="cf list no_top"><?php } else if($i==4) { ?><ul class="cf list"> <?php } ?>
         <li><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li>
          <?php if($i==3|| $i==8) { ?></UL><?php } else { ?><?php } ?>
 
  <?php } } ?>
</div>
</div>
      
<div class="index_b cf">
<div class="first fl">
            <h2 class="cf"><span>政策法规</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-31.html" title="政策与金融" target="_blank">更多&gt;&gt;</a></h2>
       <?php $tags=tag("moduleid=8&condition=status=3 and thumb!=''&areaid=$cityid&catid=31&length=48&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
       <div class="img cf">
  <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><img class="fl" src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
 <div class="txt fl">
            <h4><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></h4>
            <p><?php echo dsubstr($t['introduce'], 56, $suffix = '..');?><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"  target="_blank">[详细]</a></p>
        </div>
            </div>
<?php } } ?>

    <ul class="cf list">
                  <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=31&length=48&pagesize=5&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
            </ul>
            </ul>
</div>
            <div class="second fl">
            <h2 class="cf"><span>土地市场</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-52.html" title="土地市场" target="_blank">更多&gt;&gt;</a></h2>
       <?php $tags=tag("moduleid=8&condition=status=3 and thumb!=''&areaid=$cityid&catid=52&length=48&order=hits desc&pagesize=1&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
       <div class="img cf">
  <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><img class="fl" src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
 <div class="txt fl">
            <h4><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></h4>
            <p><?php echo dsubstr($t['introduce'], 56, $suffix = '..');?><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"  target="_blank">[详细]</a></p>
        </div>
            </div>
<?php } } ?>

    <ul class="cf list">
                  <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&catid=52&length=48&pagesize=5&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <li> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li><?php } } ?>
            </ul>
</div>
            <div class="third fl">
            <h2 class="cf"><span>商铺动态</span><a class="more" href="<?php echo $MODULE['8']['linkurl'];?>list-53.html" title="商铺动态" target="_blank">更多&gt;&gt;</a></h2>
         <?php $tags=tag("moduleid=8&condition=status=3&areaid=$cityid&&length=48&pagesize=9&order=addtime desc&target=_blank&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i==0) { ?>  <ul class="cf list no_top"><?php } else if($i==4) { ?><ul class="cf list"> <?php } ?>
         <li><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" ><?php echo $t['title'];?></a> </li>
          <?php if($i==3|| $i==8) { ?></UL><?php } else { ?><?php } ?>
 
  <?php } } ?>
</div>
</div>
      
<div id="zt">
    <h2><span class="fl">专题汇总</span><p class="fr cf"><span id="zt_left"></span><span id="zt_right"></span></p></h2>
    <div class="index_zt">
        <ul class="cf"><?php $tags=tag("moduleid=8&condition=status=3 and thumb<>''&areaid=$cityid&length=28&pagesize=18&order=itemid desc&target=_blank&template=null");?>
 <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                            <li>
                   <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb']);?>" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"></a>
                        <p class="img_txt"><?php echo $t['title'];?></p>
                    </a>
                </li><?php } } ?>
                    </ul>
    </div>
</div>
</div>

<script type="text/javascript">
    seajs.use(["jquery"], function($) {
    var imgPlay= function(id,left,right) {
    var $div = $('#'+id),
    $ul = $div.find('ul').eq(0),
    $li = $ul.find('li'),
    $width = $li.width(),
    $left = $('#'+left),
    $right = $('#'+right),
    $str = '<ol>';
    $ul.css('width', $li.length * $width);
    for (var i = 0, l = $li.length; i < l; i++) {
    $str += '<li></li>';
    }
    $str += '</ol>';
    $div.append($str);
    var $ol = $div.find('ol'),
    $num = 0,
    $olLi = $ol.find('li');
    $ol.find('li').eq(0).addClass('on');
    $ol.on('mouseover', 'li', function(e) {
    var $this = $(this);
    $num = $this.index();
    $this.addClass('on').siblings().removeClass('on');
    $ul.stop().animate({
    'left': -$num * $width
    });
    });
    var $fn = function() {
    $num++;
    if ($num == $olLi.length) {
    $num = 0;
    } else if ($num < 0) {
    $num = $olLi.length - 1;
    }
    $ul.stop().animate({
    'left': -$num * $width
    });
    $olLi.eq($num).addClass('on').siblings().removeClass('on');
    };
    var timer = setInterval($fn, 5000);
    var $l = $div.offset().left + $width / 2;
    $div.on({
    'mouseover': function() {
    clearInterval(timer);
    $div.on('mousemove', function(e) {
    if (e.pageX > $l) {
    $right.show();
    $left.hide();
    } else {
    $left.show();
    $right.hide();
    }
    });
    },
    'mouseout': function() {
    timer = setInterval($fn, 5000);
    $right.add($left).hide();
    $div.off('mousemove');
    }
    });
    $left.on({
    'click': function() {
    $num -= 2;
    $fn();
    },
    'mouseover': function() {
    $(this).show();
    }
    });
    $right.on({
    'click': function() {
    $fn();
    },
    'mouseover': function() {
    $(this).show();
    }
    });
    }
    imgPlay('banner','banner_left','banner_right');
    var $xy=$('#dchd').find('ol');
    $xy.css('margin-left',-1*$xy.width()/2);
    //专题
    (function() {
    var $left=$('#zt_left'),
    $right=$('#zt_right'),
    $div=$('.index_zt'),
    $ul=$div.find('ul').eq(0),
    $width=$div.width()+10;
    $c=Math.ceil($ul.find('li').length/6)-1,
    $num=0;
    $left.on({
    'click':function() {
    $num++;
    if($num>$c){
    $num=0;
    }
  $ul.stop().animate({'left':$num*-$width});
    },
    'mouseover':function() {
    $(this).css('background-position','-3px -22px');
    },
    'mouseout':function() {
    $(this).css('background-position','-2px -2px');
    }
    });
    $right.on({
    'click':function() {
    $num--;
    if ($num<0) {
    $num=$c;
    }
    $ul.stop().animate({'left':$num*-$width});
    },
    'mouseover':function() {
    $(this).css('background-position','-25px -22px');
    },
    'mouseout':function() {
    $(this).css('background-position','-24px -2px');
    }
    });
    })();
    //图片hover
    (function() {
    $(".index_a,.index_b,#zt").find("a").has("img").has("p").on({
    "mouseover":function() {
    $(this).find("p").css({
    "background":"rgba(255,132,0,0.5)",
    "filter":"progid:DXImageTransform.Microsoft.gradient(startColorstr=#7fFF8400,endColorstr=#7fFF8400)"
    });
    },
    "mouseout":function() {
    $(this).find("p").css({
    "background":"rgba(0, 0, 0, 0.5)",
    "filter":"progid:DXImageTransform.Microsoft.gradient(GradientType = 0,startColorstr = '#80000000', endColorstr = '#80000000' )\9"
    });
    }
    }).end().not(":has(p)").on({
    "mouseover":function() {
    $(this).find("img").css("opacity",0.8);
    },
    "mouseout":function() {
    $(this).find("img").css("opacity",1);
    }
    });
    })();
    });
</script>
<?php include template('footer');?>