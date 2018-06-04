<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', 'member');?>
<?php if($action=='add' || $action=='edit') { ?>
<ul id="fbp">
<li class="on"><b>1.</b><i></i>填写房源信息</li>
<li><b>2.</b><i class="p2"></i>上传房源图片</li>
<li class="l"><b>3.</b><i class="p3"></i>填写联系方式</li>
</ul>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<form method="post" id="dform" action="<?php echo $AJ['file_my'];?>" target="send" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="post[typeid]" value="<?php if($_groupid<=5) { ?>0<?php } else { ?>1<?php } ?>
"  />
<div class="con">
<div class="tabT">
<h3>基本信息</h3>
</div>
<ul class="formul black">
<li id="villagenamecon">
<span class="inl"> <b>*</b>
小区名称：
</span>
<input type="text" class="txt" id="villagename" name="post[housename]" value="<?php echo $housename;?>"  >
<input type="hidden" name="post[houseid]" id="cid" value="">
<p class="gray9">请输入小区名称，如：“青园”或“qyxq”，然后在下面打开的列表中选择即可。</p>
</li>
<li >
<span class="inl"> <b>*</b>
区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;域：
</span>
<?php if($areaid) { ?><?php echo ajax_area_select('post[areaid]', '请选择', $areaid);?><?php } else { ?><?php echo ajax_area_select('post[areaid]', '请选择', $cityid);?><?php } ?>
<input name="post[address]" value="<?php echo $address;?>" id="address" class="txt" type="text">


</li>
<li>
<span class="inl">
<b>*</b>
出租方式：
</span>
<input name="post[renttype]" class="hid" id="rent1" value="1" <?php if($renttype==1) { ?>checked<?php } ?>
 type="radio"> <label for="rent1">整租</label>
<input name="post[renttype]" class="hid" id="rent2" value="2" <?php if($renttype==2) { ?>checked<?php } ?>
 type="radio"> <label for="rent2">合租</label>


</span>
<span class="gray9"></span>
</li>
<li>
<span class="inl">
<b>*</b>
月&nbsp;&nbsp;租&nbsp;&nbsp;金：
</span>
<input id="price" name="post[price]" type="text" class="txt s" value="<?php echo $price;?>">
元/月

<span class="gray9">输入0或者不填表示面议</span>
</li>
<li style="display: list-item;" id="paytypecon">
<span class="inl">
<b>*</b>
付款方式：
</span>
押 <input name="post[paytype]"  value="<?php echo $paytype;?>" id="paytype" class="txt ts" type="text">
付 <input name="post[paytype2]" value="<?php echo $paytype2;?>" id="paytype2" class="txt ts" type="text">
<span class="gray9">面议或无需押金请输入“0”</span>
</li>
<li>
<span class="inl"> <b>*</b>
户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：
</span>
<input name="post[room]"  value="<?php echo $room;?>"  type="text" id="rooms" class="txt ts" >
室
<input name="post[hall]"  value="<?php echo $hall;?>"  type="text" id="halls" class="txt ts" >
厅
<input name="post[toilet]" value="<?php echo $toilet;?>"  type="text" id="toilets" class="txt ts" >
卫
<input name="post[houseearm]"  value="<?php echo $houseearm;?>" type="text" id="buildarea" class="txt s" value="请输入建筑面积">
㎡
<span class="gray9"></span>
</li>
<li>
<span class="inl"> <b>*</b>
类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：</span>
<?php echo category_select('post[catid]', '选择类型', $catid, $moduleid);?>

第
<input name="post[floor1]" id="floors" type="text" value="<?php echo $floor1;?>" class="txt ts" >
层/共
<input name="post[floor2]" id="totalfloors" type="text" value="<?php echo $floor2;?>" class="txt ts" >层<span class="gray9"></span>
<input id="houseage" name="post[houseyear]" type="text" class="txt s" value="<?php if($houseyear) { ?><?php echo $houseyear;?><?php } else { ?>请输入建造年代<?php } ?>
">
年

<span class="gray9"></span>
</li>


<?php if($FD) { ?><?php echo fields_htmltwo('<li>', '', $item);?><?php } ?>


<li>
<span class="inl">交通状况：</span>
<input  name="post[bus]" type="text" size="30" value="<?php echo $bus;?>"  class="txt" /><span class="spRemind">例:11、13路公交车</span></li>
<li>
<span class="inl">
地图标注：
</span>
<?php include AJ_ROOT.'/api/map/baidu/post.inc.php';?>

</li>
</ul>
</div>
<div class="con">
<div class="tabT">
<h3>详细信息</h3>
</div>
<ul class="formul black">
<li>
<span class="inl">
<b>*</b>
房源标题：
</span>
<input type="text" class="txt ttitle" name="post[title]"  value="<?php echo $title;?>" id="housetitle" >
<p>
<span class="red">增加点击量，吸引眼球第一步，应重点突出小区亮点！</span>
限4-30个中文字。
</p>
</li>
<li>
<span class="inl">
<b>*</b>
房源描述：
</span>
<div class="cf" id="editorCon">
<textarea name="post[content]" id="content" style="width:680px;height:200px;visibility:hidden;"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $group_editor, '101%', 350);?>
</div></li>
</ul>
</div>
<div class="con" style="height:auto;min-height:0">
<div class="tabT">
<h3>上传图片</h3>
</div>
<div class="upimg">

<div class="tips_2">
       <?php if($picnum >= $MG['maxitem']) { ?>
请上传<span id="img1name">图片</span>，你已经上传<span id="img1length"><?php echo $picnum;?></span>张，最多上传<span id="img1length"><?php echo $MG['maxitem'];?></span>张。
<?php } else { ?>
       请上传<span id="img1name">图片</span>，最多上传<span id="img1length"><?php echo $MG['maxitem'];?></span>张，单次最多上传<span id="img1length"><?php echo $MG['swfu_max'];?></span>张。


<input type="hidden" name="swf_upload" id="swf_upload"/>
<input type="hidden" name="post[thumb]" value="<?php echo $thumb;?>"/>

<?php include AJ_ROOT.'/api/swfupload/editor.inc.php';?>
<?php } ?>

<ul class="upimgList cf">
<?php if(is_array($piclists)) { foreach($piclists as $k => $v) { ?>

<li>
<img src="<?php echo $v['thumb'];?>" width="100" height="75" id="showthumb<?php echo $v['itemid'];?>" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(this.src, 1);}else{Dphoto(<?php echo $v['itemid'];?>,<?php echo $mid;?>,100,100, Dd('thumb<?php echo $v['itemid'];?>').value, true);}"/>

<span class="tit">
<?php if($thumb==$v['thumb']) { ?><label>封面图</label><?php } ?>
&nbsp;&nbsp;&nbsp;<a href="?mid=<?php echo $mid;?>&action=item_index&itemid=<?php echo $v['itemid'];?>" onclick="return _index();" class="gol" title="点击设为封面"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?mid=<?php echo $mid;?>&action=item_delete&itemid=<?php echo $v['itemid'];?>" onclick="return _delete();" class="del" title="点击删除此图片"></a>

</span>
</li>
<?php } } ?>
</ul>
</div>
</div></div>
<div class="con" style="height:auto;min-height:0">
<div class="tabT">
<h3>联系方式</h3>
</div>
<ul class="formul black">
       <?php if($action=='edit') { ?>
<li>
<span class="inl">
<b>*</b>
联系人：
</span>
<input type="text" class="txt s" name="post[truename]"   id="truename" size="15" value="<?php echo $truename;?>" ></li>
<li>
<span class="inl">
<b>*</b>
手机号码：
</span>
<input name="post[mobile]" id="mobile" type="text " size="18" value="<?php echo $mobile;?>"  class="txt s"/></li>
<?php } else { ?>
<li>
<span class="inl">
<b>*</b>
联系人：
</span>
<input type="text" class="txt s" name="post[truename]"   id="truename" size="15" value="<?php echo $user['truename'];?>" ></li>
<li>
<span class="inl">
<b>*</b>
手机号码：
</span>
<input name="post[mobile]" id="mobile" type="text " size="18" value="<?php echo $user['mobile'];?>"  class="txt s"/></li>
<?php } ?>
<?php if($fee_add) { ?>
<li><span class="inl">发布信息需：</span>
<span class="f_b f_red"><?php echo $fee_add;?></span> <?php echo $fee_unit;?>
<?php if($fee_currency == 'money') { ?>
<?php echo $AJ['money_name'];?>余额<span class="f_blue f_b"><?php echo $_money;?><?php echo $fee_unit;?></span> <a href="<?php echo $MODULE['2']['linkurl'];?>charge.php?action=pay" target="_blank" class="t">[充值]</a>
<?php } else { ?>
<?php echo $AJ['credit_name'];?>余额
<span class="f_blue f_b"><?php echo $_credit;?><?php echo $fee_unit;?></span> <a href="<?php echo $MODULE['2']['linkurl'];?>credit.php?action=buy" target="_blank" class="t">[购买]</a>
<?php } ?>
</li>
<?php } ?>
<?php if($need_password) { ?>
<li><span class="inl">支付密码：</span><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></li><?php } ?>
<?php if($need_question) { ?>
<li><span class="inl">验证问题：</span>
<?php include template('question', 'chip');?> <span id="danswer" class="f_red"></span></li>
<?php } ?>
<?php if($need_captcha) { ?>
<li><span class="inl">验证码：</span>
<?php include template('captcha', 'chip');?> <span id="danswer" class="f_red"></span></li>
<?php } ?>
</ul>


</div>
 <input type="submit" name="submit" value=" 发布房源信息 " class="subLBtn"/>


</form>
</div>
<div id="autoVn">

</div>
<script type="text/javascript">
seajs.use("jjrfbcon",function(fb){
fb.init("esf",{
  autoc:AGENT_URL + "house.php?action=xq"});
})
</script>
</div>
<?php } else { ?>
<div class="tinfo">
<form action="<?php echo $MODULE['2']['linkurl'];?><?php echo $AJ['file_my'];?>">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="status" value="<?php echo $status;?>"/>
<h3>搜索房源</h3>
<p>
<?php echo category_select('catid', '物业类型', $catid, $moduleid);?>


小区/地址：
<input name="kw" type="text" class="txt" value="">

<a href="javascript:" class="sBtn" id="subSearch">
<button type="submit"></button>搜索房源
</a>
<a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=3" class="sBtn">全部房源</a>
</p>
</form>
</div>
<div class="con">
<div class="tabT">
<a id="s3"  href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>">已发布房源(<?php echo $nums['3'];?>)</a>
<a id="s2" href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=2">待审房源(<?php echo $nums['2'];?>)</a>
<a id="s1" href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=1">未通过房源(<?php echo $nums['1'];?>)</a>
<a id="s4" href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=4">过期房源(<?php echo $nums['4'];?>)</a>
</div>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<form method="post"  id="houseList">
<div id="hideMenu">

<div class="tool">
<span class="fr">
共 <?php echo $nums[$status];?>条房源
</span>
<?php if($MG['delete'] || $timetype!='add') { ?>
           <input type="button" class="button_1" onClick="checkall(this.form);" value="全选" />
<input type="button" class="button_1" onClick="checkall(this.form);" value="取消选择" />

<?php if($timetype!='add') { ?>
<input type="submit" value=" 刷新 " class="button_1" onClick="this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=refresh';"/>
<?php if($MOD['credit_refresh']) { ?>
刷新一条信息一次需消费 <strong class="f_red"><?php echo $MOD['credit_refresh'];?></strong> <?php echo $AJ['credit_name'];?>，当<?php echo $AJ['credit_name'];?>不足时将不可刷新
<?php } ?>
<?php } ?>
<?php if($MG['delete']) { ?>
<input type="submit" value=" 删除 " class="button_1" onClick="if(confirm('确定要删除选中<?php echo $MOD['name'];?>吗？')){this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=delete'}else{return false;}"/>
<?php } ?>
<?php } ?>



</div>
<table width="100%">
<tr>
<th width="5%">
<input type="checkbox" onclick="checkall(this.form);"/></th>
<th>基本信息</th>
<th width="6%">
点击

</th>

<th width="16%">标签</th>
<th width="12%"><span class="red">更新时间</span><span class="black">发布时间</span></th>

<th width="10%">操作</th>
</tr>
</table>
</div>

<table width="100%" id="tlist">
<tr>
<th width="5%"></th>
<th></th>
<th width="6%"></th>

<th width="16%"></th>
<th width="12%"></th>

<th width="10%"></th>
</tr><?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?><tr>
 <td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
      <td>
<p>
<a target="_black" href="<?php echo $v['linkurl'];?>"><?php echo $v['housename'];?></a><?php if($v['elite']) { ?>&nbsp;<span class="f_red" title="主页推荐">[荐]</span> <?php } ?>
<?php if($v['thumb']) { ?>&nbsp;<span class="f_red" title="主页推荐">[图]</span> <?php } ?>
<br>
<?php echo $v['catname'];?>-<?php if($v['room']) { ?><?php echo $v['room'];?>室<?php } ?>
<?php if($v['hall']) { ?><?php echo $v['hall'];?>厅<?php } ?>
<?php if($v['toilet']) { ?><?php echo $v['toilet'];?>卫<?php } ?>
-<?php echo $v['houseearm'];?>平米-
<b class="red"><?php if($v['price']) { ?><?php echo $v['price'];?>元/月<?php } else { ?>面议<?php } ?>
</b>
<br>
<a href="<?php echo $v['linkurl'];?>" target="_black" title="<?php echo $v['alt'];?>" class="hic"><?php echo $v['title'];?></a>
</p>
</td>
<td>

<b class="blue"><?php echo $v['hits'];?></b>
&nbsp;
</td>

<td>
<?php if($v['istop']==0) { ?><a href="" onclick="showBoxtop(<?php echo $v['itemid'];?>);return false;" title="将此房源置顶">置顶</a><br><?php } else { ?>置顶有效期 <?php echo timetodate($v['to_time'], 3);?><?php } ?>
<?php if($v['ishot']==0) { ?><a href="" onclick="showBoxhot(<?php echo $v['itemid'];?>);return false;" title="将此房源急售">急售</a><?php } else { ?>急售有效期 <?php echo timetodate($v['hot_time'], 3);?><?php } ?>

</td>
<td title="最后更新：<?php echo timetodate($v['edittime'], 3);?>">
<span class="red"><?php echo timetodate($v['edittime'], 3);?></span>
<span class="black"><?php echo timetodate($v['addtime'], 3);?></span>
</td>

<td class="lastTd">
<a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $v['itemid'];?>">修改房源</a>
<br>
<?php if($MG['copy']) { ?><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=add&itemid=<?php echo $v['itemid'];?>&catid=<?php echo $v['catid'];?>">复制房源</a>
<br><?php } ?>
<?php if($MG['delete']) { ?><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');">删除房源</a><?php } ?>
</td>
  
</tr><?php } } ?>
 <?php } else { ?>
<tr>
  <td colspan="8" align="center">抱歉，没有找到符合要求的房子，试试其他条件吧！</td>
</tr><?php } ?>
</table>

</form>

  <div class="pages"><?php echo $pages;?></div>

</div>

<!--说明-->
<div class="tgray">
<h4>房源管理使用说明：</h4>
<?php if($MG['rent_limit'] || (!$MG['fee_mode'] && $MOD['fee_add'])) { ?>
<div class="limit">
<?php if($MG['rent_limit']) { ?>
总共可发 <span class="f_b f_red"><?php echo $MG['rent_limit'];?></span> 条&nbsp;&nbsp;&nbsp;
当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;
还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
<?php if(!$MG['fee_mode'] && $MOD['fee_add']) { ?>
发布信息收费 <span class="f_b f_red"><?php echo $MOD['fee_add'];?></span> <?php if($MOD['fee_currency'] == 'money') { ?><?php echo $AJ['money_unit'];?><?php } else { ?><?php echo $AJ['credit_unit'];?><?php } ?>
/条&nbsp;&nbsp;&nbsp;
可免费发布 <span class="f_b"><?php if($MG['rent_free_limit']<0) { ?>无限<?php } else { ?><?php echo $MG['rent_free_limit'];?><?php } ?>
</span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
</div>
<?php } ?>
</div>
</div>
  <!--底部-->
</div>
<script type='text/javascript' src='<?php echo AJ_SKIN;?>js/thickbox.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo AJ_SKIN;?>js/thickbox.css" />
<script language="javascript">
function showBox(item_id){
TB_show('房源成交','rentBargain.php?house_id='+item_id+'&height=370&width=400&modal=true&rnd='+Math.random(),false);
}
function showBoxOwner(item_id){
TB_show('业主信息','landlordSaleInfo.php?house_id='+item_id+'&height=150&width=400&modal=true&rnd='+Math.random(),false);
}
function showBoxtop(item_id){
TB_show('房源置顶','renttop.php?itemid='+item_id+'&height=200&width=400&modal=true&rnd='+Math.random(),false);
}
function showBoxhot(item_id){
TB_show('房源急售','renthot.php?itemid='+item_id+'&height=200&width=400&modal=true&rnd='+Math.random(),false);
}
</script>
<?php } ?>
</div>
