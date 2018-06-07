<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" /><link href="/favicon.ico" rel="apple-touch-icon-precomposed" /><link href="/favicon.ico" rel="Bookmark" /><link href="/favicon.ico" rel="apple-touch-icon" /><link href="/favicon.ico" type="image/x-icon\" rel="icon" /><link href="/favicon.ico" type="image/x-icon\" rel="shortcut icon" />
  <link href="template/default/homepage/staticq/css/css.css" rel="stylesheet" />
</head>
<body>
    <div class="w_1200 mb20" style="overflow: hidden;margin-top:30px">
        <!--左侧信息-->
<div class="w_270 fl">
    <div class="jjrinfo mb20">
        <img src="<?php echo $MODULE['1']['linkurl'];?>api/avatar/show.php?username=<?php echo $COM['username']?>&size=large" class="jjrpic">
        <div class="jjrname"><?php echo $COM['truename'];?></div>
        <div class="other_message"><span class="color999"><a href="<?php echo $MODULE[1][linkurl].'index.php?homepage='.$COM['company'] ?>">所属中介：</span><span class="red f16"><?php echo $COM['company'];?></span></a></div>
        <div class="other_message"><span class="color999">电子邮箱：</span><?php echo $COM['email'];?></div>
        <div class="other_message"><span class="color999">联系手机：</span><span class="red f16"><?php echo $COM['mobile'];?></span></div>
        <div class="other_message"><span class="color999">QQ：<?php echo $COM['qq'];?></div>
        <div class="other_message"><span class="color999">地址：</span><?php echo $COM['address'];?></div>
        <div class="other_message"><span class="color999">注册时间：</span><?php echo date("Y-m-d",$COM['regtime']);?></div>
        <div class="other_message"><span class="color999">最后登陆时间：</span><?php echo  date("Y-m-d",$COM['logintime']);?></div>
        <div class="other_message"><span class="color999">登陆次数：</span><?php echo $COM['logintimes'];?></div>
    </div>
</div>
        <!--左侧信息-->
        <!--右侧信息开始-->
        <div class="w_900 fr pos_r">
            <div class="lplist">
                <ul>
                  <?php foreach($houses as $house){
                    $url = "house/show.php/itemid-".$house['itemid'].'/';
                    ?>
                    <li>
                      <div class="lpimg">
                          <a href="<php ?echo $url;?>" title="<?php echo $house['title'];?>">
                              <img src="template/default/homepage/staticq/picture/a21cbfbd-6eca-4a1b-a626-18f949d32d46.jpg"></a>
                          <div class="imgnumber">新房</div>
                      </div>
                      <h3><a href="<?php echo $url;?>"  target="_blank"><?php echo $house['title'];?></a></h3>
                      <div class="text1">
                        销售电话：<?php echo $house['telephone'];?>
                      </div>
                      <div class="text1 f12 color666">新盘地址：<?php echo $house['address'];?></div>
                      <div class="price3"style="color:red"><?php echo $house['price'];?>/平</div>
                    </li>
                  <?}?>
                  <?php foreach($sales as $sale){
                    $url = $CFG['url']."/sale/show-".$sale['itemid'].".html";
                    ?>
                      <li>
                        <div class="lpimg">
                            <a href="<php ?echo $url;?>" title="<?php echo $house['title'];?>">
                                <img src="template/default/homepage/staticq/picture/a21cbfbd-6eca-4a1b-a626-18f949d32d46.jpg"></a>
                            <div class="imgnumber">二手房</div>
                        </div>
                        <h3><a href="<?php echo $url;?>"  target="_blank"><?php echo $sale['title'];?></a></h3>
                        <div class="text1">
                          销售电话：<?php echo $sale['telephone'];?>
                        </div>
                        <div class="text1 f12 color666">房源地址：<?php echo $sale['address'];?></div>
                        <div class="price3"style="color:red"><?php echo $sale['price'];?>万</div>
                      </li>
                  <?}?>
                  <?php foreach($rents as $rent){
                    $url = $CFG['url']."/rent/show-".$rent['itemid'].".html";
                    ?>
                      <li>
                        <div class="lpimg">
                            <a href="<php ?echo $url;?>" title="<?php echo $house['title'];?>">
                                <img src="template/default/homepage/staticq/picture/a21cbfbd-6eca-4a1b-a626-18f949d32d46.jpg"></a>
                            <div class="imgnumber">出租房</div>
                        </div>
                        <h3><a href="<?php echo $url;?>"  target="_blank"><?php echo$rent['title'];?></a></h3>
                        <div class="text1">
                          销售电话：<?php echo $rent['telephone'];?>
                        </div>
                        <div class="text1 f12 color666">房源地址：<?php echo $rent['address'];?></div>
                        <div class="price3" style="color:red"><?php echo $rent['price'];?>/月</div>
                      </li>
                  <?}?>
                </ul>
            </div>
        </div>
        <!--右侧信息-->
    </div>
</body>
</html>
