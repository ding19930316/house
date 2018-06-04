<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php include template('header', 'member');?>
<script type="text/javascript">c(1);</script>
<div class="tinfo">
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=add"><span>添加<?php echo $MOD['name'];?></span></a></td>
<!-- <?php if($_userid) { ?>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s3"><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>"><span>已发布<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s2"><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s1"><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=1"><span>未通过<span class="px10">(<?php echo $nums['1'];?>)</span></span></a></td>
<td class="tab_nav">&nbsp;</td>
<td class="tab" id="s4"><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=4"><span>已过期<span class="px10">(<?php echo $nums['4'];?>)</span></span></a></td>
<td class="tab_nav">&nbsp;</td>
<?php } ?>
 -->
</tr>
</table>
</div>
<?php if($action=='add' || $action=='edit') { ?>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<form method="post" id="dform" action="<?php echo $MODULE['2']['linkurl'];?><?php echo $AJ['file_my'];?>" target="send" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="post[isnew]" value="1"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="6" cellspacing="1" class="tb">
<?php if($status==1 && $action=='edit' && $note) { ?>
<tr>
<td class="tl">未通过原因</td>
<td class="tr f_blue"><?php echo $note;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 销售状态</td>
<td class="tr">
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<input type="radio" name="post[typeid]" value="<?php echo $k;?>" <?php if($k==$typeid) { ?>checked<?php } ?>
 id="typeid_<?php echo $k;?>"/> <label for="typeid_<?php echo $k;?>" id="t_<?php echo $k;?>"><?php echo $v;?></label>&nbsp;
<?php } } ?>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 信息标题</td>
<td class="tr f_gray"><input name="post[title]" type="text" id="titlename" size="50" value="<?php echo $title;?>"/> （2-30个字）<span id="dtitle" class="f_red"></span></td>
</tr>
<?php if($action=='add' && $could_color) { ?>
<tr>
<td class="tl">标题颜色</td>
<td class="tr">
<?php echo dstyle('color');?>&nbsp;
设置信息标题颜色需消费 <strong class="f_red"><?php echo $MOD['credit_color'];?></strong> <?php echo $AJ['credit_name'];?>
</td>
</tr>
<?php } ?>
<tr>
<td class="tl">区域</td>
<td class="tr"><?php if($areaid) { ?><?php echo ajax_area_select('post[areaid]', '请选择', $areaid);?><?php } else { ?><?php echo ajax_area_select('post[areaid]', '请选择', $cityid);?><?php } ?>
 <span id="dareaid" class="f_red"></span></td>
</tr>
 <tr>
 <td class="tl"><span class="f_red">*</span> 新盘地址</td>
<td class="tr"><input name="post[address]" type="text" id="title" size="35" value="<?php echo $address;?>"/>
</td>
          </tr>
<tr>
<td class="tl"><span class="f_red">*</span> 物业类型</td>
<td class="tr"><?php echo get_category_checkboxes('post[catid]',  $moduleid, $catid);?></td>
</tr>
<?php if($CP) { ?>
<script type="text/javascript">
var property_catid = <?php echo $catid;?>;
var property_itemid = <?php echo $itemid;?>;
var property_admin = 0;
</script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/property.js"></script>
<?php if($itemid) { ?><script type="text/javascript">setTimeout("load_property()", 1000);</script><?php } ?>
<tbody id="load_property" style="display:none;">
<tr><td></td><td></td></tr>
</tbody>
<?php } ?>
<tr>
<td class="tl">楼盘特点</td>
<td class="tr"><input name="post[tedian]" type="text" id="title" size="35" value="<?php echo $tedian;?>"/></td>
</tr>
<tr>
<td class="tl">销售价格</td>
<td class="tr"><input type="text" name="post[price]" value="<?php echo $price;?>"  class="sup_input"/>元/㎡</td>
</tr>
<tr>
<td class="tl">售楼电话</td>
<td class="tr"><input  name="post[telephone]" type="text"  value="<?php echo $telephone;?>"  class="sup_input"/>(格式:028-88888888)</td>
</tr>
<tr>
<td class="tl">售楼地址</td>
<td class="tr"><input  name="post[sell_address]" type="text" class="sup_input" value="<?php echo $sell_address;?>" size="35" /></td>
</tr>
<tr>
<td class="tl">公交线路</td>
<td class="tr"><input  name="post[lp_bus]" type="text" value="<?php echo $lp_bus;?>"  class="sup_input"/>
</td>
</tr>
<tr>
<td class="tl">教育</td>
<td class="tr"><input  name="post[lp_edu]" type="text" class="sup_input" value="<?php echo $lp_edu;?>" size="35" /></td>
</tr>
<tr>
<td class="tl">医院</td>
<td class="tr"><input type="text" name="post[lp_hospital]" value="<?php echo $lp_hospital;?>"  class="sup_input"/></td>
</tr>
<tr>
<td class="tl">银行</td>
<td class="tr"><input  name="post[lp_bank]" type="text" class="sup_input" value="<?php echo $lp_bank;?>" size="30" /></td>
</tr>
<tr>
<td class="tl">规划面积</td>
<td class="tr"><input type="text" name="post[lp_totalarea]" value="<?php echo $lp_totalarea;?>"  class="sup_input"/>㎡</td>
</tr>
<tr>
<td class="tl">建筑面积</td>
<td class="tr"><input  name="post[lp_area]" type="text" class="sup_input" value="<?php echo $lp_area;?>" size="25" />㎡</td>
</tr>
<tr>
<td class="tl">规划户数</td>
<td class="tr"><input type="text" name="post[lp_number]" value="<?php echo $lp_number;?>"  class="sup_input"/>户</td>
</tr>
<tr>
<td class="tl">车位数</td>
<td class="tr"><input  name="post[lp_car]" type="text" class="sup_input" value="<?php echo $lp_car;?>" size="25" /></td>
</tr>
<tr>
<td class="tl">容积率</td>
<td class="tr"><input type="text" name="post[lp_volume]" value="<?php echo $lp_volume;?>"  class="sup_input"/>%</td>
</tr>
<tr>
<td class="tl">绿化率</td>
<td class="tr"><input  name="post[lp_green]" type="text" class="sup_input" value="<?php echo $lp_green;?>" size="25" />%</td>
</tr>
<tr>
<td class="tl">产权</td>
<td class="tr"><input type="text"  name="post[lp_year]" value="<?php echo $lp_year;?>" class="sup_input" />年</td>
</tr>
<tr>
<td class="tl">物&nbsp;业&nbsp;费</td>
<td class="tr"><input name="post[lp_costs]" type="text" id="title" size="15" value="<?php echo $lp_costs;?>"/>元(/㎡/月)</td>
</tr>
<tr>
<td class="tl">物业公司</td>
<td class="tr"><input name="post[lp_company]" type="text" id="title" size="35" value="<?php echo $lp_company;?>"/></td>
</tr>
<tr>
<td class="tl">地图标注</td>
<td class="tr"><?php include AJ_ROOT.'/api/map/baidu/post.inc.php';?></td>
</tr>
<tr>
<td class="tl">开盘时间</td>
<td class="tr"><?php echo dcalendar('post[selltime]', $selltime);?>&nbsp;&nbsp;交房时间:<?php echo dcalendar('post[completion]', $completion);?></td>
</tr>
<tr>
<td class="tl">编辑点评</td>
<td class="tr"><textarea name="post[lp_dianping]" cols="100" rows="5" ><?php echo $lp_dianping;?></textarea></td>
</tr>
<?php if($FD) { ?><?php echo fields_html('<td class="tl">', '<td class="tr">', $item);?><?php } ?>
<tr>
<td class="tl">详细说明</td>
<td class="tr f_gray"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $group_editor, '98%', 350);?><br/>
1、建议您描述以下方面：产品的性能及优点、用途、售后服务、包装等；<br/>
2、为避免不必要的纠纷，请使用本企业图片；<br/>
<span id="dcontent" class="f_red"></span>
</td>
</tr>
<?php if($MOD['swfu'] == 1) { ?>
<?php include AJ_ROOT.'/api/swfupload/editor.inc.php';?>
<?php } ?>
<tr>
<td class="tl">房源缩略图</td>
<td class="tr">
<input type="hidden" name="post[thumb]" id="thumb" value="<?php echo $thumb;?>"/>
<table width="480">
<tr align="center" height="120" class="c_p">
<td width="120"><img src="<?php if($thumb) { ?><?php echo $thumb;?><?php } else { ?><?php echo AJ_SKIN;?>image/waitpic.gif<?php } ?>
" id="showthumb" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb').src, 1);}else{Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);}" width="100" height="100"/></td>
</tr>
<tr align="center" class="c_p">
<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum('');"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum('','wait');"/></td>
</tr>
</table>
<span id="dthumb" class="f_red"></span>
</td>
</tr>
<tr<?php if(!$_userid) { ?> style="display:none;"<?php } ?>
>
<td class="tl">我的推荐</td>
<td class="tr">
<input type="radio" name="post[elite]" value="1"<?php if($elite) { ?> checked<?php } ?>
/> 是
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="post[elite]" value="0"<?php if(!$elite) { ?> checked<?php } ?>
/> 否
</td>
</tr>
<?php if($action=='edit') { ?>
<tr>
<td class="tl">联系人</td>
<td class="tr"><input name="post[truename]" type="text" id="truename" size="15" value="<?php echo $truename;?>" /> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">手机号码：</td>
<td class="tr"><input name="post[mobile]" id="mobile" type="text" size="18" value="<?php echo $mobile;?>"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl">联系人：</td>
<td class="tr"><input name="post[truename]" type="text" id="truename" size="15" value="<?php echo $user['truename'];?>" /> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">手机号码：</td>
<td class="tr"><input name="post[mobile]" id="mobile" type="text" size="18" value="<?php echo $user['mobile'];?>"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($action=='add' && $could_elite) { ?>
<tr>
<td class="tl">推荐到网站首页</td>
<td class="tr">
<input type="checkbox" name="elite" value="1" onclick="if(<?php echo $_credit;?> < <?php echo $MOD['credit_elite'];?>) {confirm('<?php echo $AJ['credit_name'];?>不足，当前余额:<?php echo $_credit;?>');this.checked=false;}"/>
需要上传至少1张图片，且需消费 <strong class="f_red"><?php echo $MOD['credit_elite'];?></strong> <?php echo $AJ['credit_name'];?>
</td>
</tr>
<?php } ?>
<?php if($fee_add) { ?>
<tr>
<td class="tl">发布此信息需消费</td>
<td class="tr"><span class="f_b f_red"><?php echo $fee_add;?></span> <?php echo $fee_unit;?></td>
</tr>
<?php if($fee_currency == 'money') { ?>
<tr>
<td class="tl"><?php echo $AJ['money_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_money;?><?php echo $fee_unit;?></span> <a href="charge.php?action=pay" target="_blank" class="t">[充值]</a></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><?php echo $AJ['credit_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_credit;?><?php echo $fee_unit;?></span> <a href="credit.php?action=buy" target="_blank" class="t">[购买]</a></td>
</tr>
<?php } ?>
<?php } ?>
<?php if($need_password) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_question) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证问题</td>
<td class="tr"><?php include template('question', 'chip');?> <span id="danswer" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_captcha) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($action=='add') { ?>
<tr style="display:none;" id="weibo_sync">
<td class="tl">同步主题</td>
<td class="tr" id="weibo_show"></td>
</tr>
<?php } ?>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 提 交 " class="sBtn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="sBtn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<?php if($action=='add') { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('<?php echo $action;?>');</script>
<?php } else { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php } else { ?>
<div class="tt">
<form action="<?php echo $AJ['file_my'];?>">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="status" value="<?php echo $status;?>"/>
&nbsp;<?php echo category_select('catid', '物业分类', $catid, $moduleid);?>&nbsp;
<?php echo dselect($TYPE, 'typeid', '信息类型', $typeid);?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $mycat_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="sBtn"/>
<input type="button" value=" 重 置 " class="sBtn" onclick="Go('<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&status=<?php echo $status;?>');"/>
</form>
</div>
</div>
<div class="con">
<form method="post">
<table cellpadding="0" cellspacing="0" class="tb">
<tr>
<th width="30"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>图片</th>
<th>标题</th>
<th>物业类型</th>
<th width="110"><?php if($timetype=='add') { ?>添加<?php } else { ?>更新<?php } ?>
时间</th>
<th width="50">浏览</th>
<th width="80">管理</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td><a href="javascript:_preview('<?php echo $v['thumb'];?>');"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo AJ_SKIN;?>image/nopic50.gif<?php } ?>
" width="50" class="thumb"/></a></td>
<td align="left" title="<?php echo $v['alt'];?>"><ul><li>&nbsp;<?php if($v['level']==1) { ?><img src="<?php echo AJ_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_home.gif" title="网站首页推广"/> <?php } ?>
<?php if($v['elite']) { ?><span class="f_red" title="公司主页推荐">[荐]</span> <?php } ?>
<?php if($v['status']==3) { ?><a href="<?php echo $v['linkurl'];?>" target="_blank" class="t"><?php } else { ?><a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $v['itemid'];?>" class="t"><?php } ?>
<?php echo $v['title'];?></a><?php if($v['status']==1 && $v['note']) { ?> <a href="javascript:" onclick="alert('<?php echo $v['note'];?>');"><img src="<?php echo AJ_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/why.gif" title="未通过原因"/></a><?php } ?>
</li></ul></td>
<td><a href="<?php echo $v['caturl'];?>" target="_blank"><?php echo $v['catname'];?></a></td>
<?php if($timetype=='add') { ?>
<td class="f_gray px11" title="更新时间 <?php echo timetodate($v['edittime'], 5);?>"><?php echo timetodate($v['addtime'], 5);?></td>
<?php } else { ?>
<td class="f_gray px11" title="添加时间 <?php echo timetodate($v['addtime'], 5);?>"><?php echo timetodate($v['edittime'], 5);?></td>
<?php } ?>
<td class="f_gray px11"><?php echo $v['hits'];?></td>
<td>
<a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="<?php echo AJ_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/edit.png" title="修改" alt=""/></a>
<?php if($MG['copy']) { ?>&nbsp;<a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=add&itemid=<?php echo $v['itemid'];?>&catid=<?php echo $v['catid'];?>"><img width="16" height="16" src="<?php echo AJ_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/new.png" title="复制信息" alt=""/></a><?php } ?>
<?php if($MG['delete']) { ?>&nbsp;<a href="<?php echo $AJ['file_my'];?>?mid=<?php echo $mid;?>&action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');"><img width="16" height="16" src="<?php echo AJ_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/delete.png" title="删除" alt=""/></a><?php } ?>
</td>
</tr>
<?php } } ?>
</table>
<?php if($MG['delete'] || $timetype!='add') { ?>
<div class="btns">
<?php if($MG['delete']) { ?>
<span class="f_r"><input type="submit" value=" 删除选中 " class="sBtn" onclick="if(confirm('确定要删除选中<?php echo $MOD['name'];?>吗？')){this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=delete'}else{return false;}"/></span>
<?php } ?>
<?php if($timetype!='add') { ?>
<input type="submit" value=" 刷新选中 " class="sBtn" onclick="this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=refresh';"/>
<?php if($MOD['credit_refresh']) { ?>
刷新一条信息一次需消费 <strong class="f_red"><?php echo $MOD['credit_refresh'];?></strong> <?php echo $AJ['credit_name'];?>，当<?php echo $AJ['credit_name'];?>不足时将不可刷新
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</form>
<!-- <?php if($MG['newhouse_limit'] || (!$MG['fee_mode'] && $MOD['fee_add'])) { ?>
<div class="limit">
<?php if($MG['newhouse_limit']) { ?>
总共可发 <span class="f_b f_red"><?php echo $MG['newhouse_limit'];?></span> 条&nbsp;&nbsp;&nbsp;
当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;
还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
<?php if(!$MG['fee_mode'] && $MOD['fee_add']) { ?>
发布信息收费 <span class="f_b f_red"><?php echo $MOD['fee_add'];?></span> <?php if($MOD['fee_currency'] == 'money') { ?><?php echo $AJ['money_unit'];?><?php } else { ?><?php echo $AJ['credit_unit'];?><?php } ?>
/条&nbsp;&nbsp;&nbsp;
可免费发布 <span class="f_b"><?php if($MG['newhouse_free_limit']<0) { ?>无限<?php } else { ?><?php echo $MG['newhouse_free_limit'];?><?php } ?>
</span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
</div>
<?php } ?>
 -->
<div class="pages"><?php echo $pages;?></div>
</div>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action == 'add' || $action == 'edit') { ?>
<script type="text/javascript">
function _p() {
if(Dd('tag').value) {
Ds('reccate');
}
}
function check() {
var l;
var f;
f = 'catid_1';
if(Dd(f).value == 0) {
Dmsg('请选择所属分类', 'catid', 1);
return false;
}
f = 'title';
l = Dd(f).value.length;
if(l < 2 || l > 30) {
Dmsg('信息标题应为2-30字，当前已输入'+l+'字', f);
return false;
}
<?php if($MOD['upload_thumb'] && $MG['upload']) { ?>
f = 'thumb';
l = Dd(f).value.length;
if(l < 5) {
Dmsg('请上传第一张产品图片', f);
return false;
}
<?php } ?>
<?php if(!$_userid) { ?>
f = 'company';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请填写公司名称', f);
return false;
}
if(Dd('areaid_1').value == 0) {
Dmsg('请选择所在地区', 'areaid');
return false;
}
f = 'truename';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请填写联系人', f);
return false;
}
f = 'mobile';
l = Dd(f).value.length;
if(l < 7) {
Dmsg('请填写手机', f);
return false;
}
<?php } ?>
<?php if($FD) { ?><?php echo fields_js();?><?php } ?>
if(Dd('property_require') != null) {
var ptrs = Dd('property_require').getElementsByTagName('option');
for(var i = 0; i < ptrs.length; i++) {
f = 'property-'+ptrs[i].value;
if(Dd(f).value == 0 || Dd(f).value == '') {
Dmsg('请填写或选择'+ptrs[i].innerHTML, f);
return false;
}
}
}
<?php if($need_password) { ?>
f = 'password';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写支付密码', f);
return false;
}
<?php } ?>
<?php if($need_question) { ?>
f = 'answer';
l = Dd(f).value.length;
if(l < 1) {
Dmsg('请填写验证问题', f);
return false;
}
if(Dd('c'+f).innerHTML.indexOf('error') != -1) {
Dd(f).focus();
return false;
}
<?php } ?>
<?php if($need_captcha) { ?>
f = 'captcha';
l = Dd(f).value;
if(!is_captcha(l)) {
Dmsg('请填写正确的验证码', f);
return false;
}
if(Dd('c'+f).innerHTML.indexOf('error') != -1) {
Dd(f).focus();
return false;
}
<?php } ?>
return true;
}
var aijiacms_oauth = '<?php echo $EXT['oauth'];?>';
</script>
<?php } ?>
<?php if($action=='add' && strlen($EXT['oauth']) > 1) { ?><?php echo load('weibo.js');?><?php } ?>
</div></div></div>
