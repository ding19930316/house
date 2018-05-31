<?php defined('IN_AIJIACMS') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo AJ_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $AJ['seo_delimiter'];?><?php } ?>
<?php echo $AJ['sitename'];?><?php } ?>
</title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo AJ_SKIN;?>xinfang.css"/>
<link href="<?php echo AJ_SKIN;?>xfreset.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo AJ_PATH;?>lang/<?php echo AJ_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo AJ_STATIC;?>file/script/page.js"></script>
<script src="<?php echo AJ_SKIN;?>/js/sea.js" type="text/javascript"></script>
</head>
<body oncontextmenu="return false">
<div id="aijiacms_comment">
<?php if($template == 'close') { ?>
<div class="comment_close">[该评论已关闭]</div>
<script style="text/javascript">
try{ parent.Dd('comment_div').style.display = 'none'; }
catch(e){}
</script>
<?php } else { ?>
<iframe src="" name="send" id="send" style="display:none;" scrolling="no" frameborder="0"></iframe>
<!-- 点评、印象 -->
<div class="dianping">
<div class="con_title"><a href="<?php echo $MODULE['6']['linkurl'];?><?php echo $itemid;?>/dianping.html" class="more" target="_blank">更多…</a><?php echo $title;?>楼盘点评</div>
<div class="con_c_no_padding">
<div class="title cf">
     <div class="fl">
<div class="zh cf">
<div class="pf">综合评分 <span class="red"><?php echo $count;?></span>/100</div>
<div class="jf"><ul class="xing"></ul><a href="<?php echo $MODULE['6']['linkurl'];?><?php echo $itemid;?>/dianping.html" target="_blank">(<span><?php echo get_dpnum($itemid);?></span>条点评)</a></div>
</div>

</div>
<div class="fr">
<a href="<?php echo $MODULE['6']['linkurl'];?><?php echo $itemid;?>/dianping.html" target="_blank" class="all">全部点评(<span><?php echo get_dpnum($itemid);?></span>)</a>
<a href="<?php echo $MODULE['6']['linkurl'];?><?php echo $itemid;?>/dianping.html" target="_blank" class="dp">我要点评</a>
</div>
</div>
                                            <ul class="list" id="re_dpl">
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
 
                                                            <li class="no_border" data-id="6654">
                                    <div class="thumb">
                                        <div class="img"><a href="#"><img src="<?php echo useravatar($v['name'], 'large');?>"></a><?php echo $v['name'];?></div>
                                        <div class="text dianping ">
                                            <h3><i class="r<?php echo $v['star'];?>"></i>&nbsp;&nbsp;<?php echo $v['addtime'];?>的点评</h3>
                                            <p><?php if($v['quotation']) { ?><?php echo $v['quotation'];?><?php } else { ?><?php echo $v['content'];?><?php } ?>
</p>
<?php if($v['reply']) { ?><p>
<?php if($v['editor']) { ?><span style="color:red;">管理员</span><?php } else { ?><span style="color:blue;"><?php echo $v['replyer'];?></span><?php } ?>
 <span style="font-size:11px;"><?php echo $v['replytime'];?></span> 回复： <?php echo nl2br($v['reply']);?></p><?php } ?>
  <div class="other"><?php if($MOD['comment_vote']) { ?>
<?php if($could_del) { ?>
<a href="?mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>&page=<?php echo $page;?>&action=delete&cid=<?php echo $v['itemid'];?>" target="send" onclick="return confirm('确定要删除此评论吗？')">删除</a>&nbsp; |
<?php } ?>
<a href="javascript:" onclick="V(<?php echo $v['itemid'];?>, 1, <?php echo $v['agree'];?>);" class="d">顶（<b id="v_<?php echo $v['itemid'];?>_1"><?php echo $v['agree'];?></b>）</a>|
       <a href="javascript:" onclick="V(<?php echo $v['itemid'];?>, 0, <?php echo $v['against'];?>);" class="c">踩（<b id="v_<?php echo $v['itemid'];?>_0"><?php echo $v['against'];?></b>）</a>
<?php } ?>

                                          
                                        </div>
                                    </div>
                                </li>
                                             <?php } } ?>
 <?php } else { ?> 
   <div class="no_result">
                                <h3>很抱歉，暂无<?php echo $title;?>点评</h3>
                            </div><?php } ?>
                                                    </ul>
                    </div>
</div>

</div>
<?php } ?>
</div>
<script style="text/javascript">
<?php if($template == 'comment') { ?>
function R(id) {
Dd('r_content').value = '评论举报，评论ID:'+id+'\n评论内容:\n'+Dd('c_'+id).innerHTML+'\n--------------------------\n举报理由:\n';
Dd('r_form').submit();
}
<?php if($MOD['comment_vote']) { ?>
var v_id = 0;
var v_op = 1;
var v_nm = 0;
function V(id, op, nm) {
v_id = id;
v_op = op;
v_nm = nm;
if(get_cookie('comment_vote_<?php echo $mid;?>_<?php echo $itemid;?>_'+id)) {
confirm('您已经对此评论表过态了');
return;
}
makeRequest('action=vote&mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>&cid='+id+'&op='+op, '?', '_V');
}
function _V() {
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
if(xmlHttp.responseText == -2) {
confirm('抱歉，您没有投票权限');
} else if (xmlHttp.responseText == -1) {
confirm('您已经对此评论表过态了');
} else if (xmlHttp.responseText == 0) {
alert('参数错误，如有疑问请联系管理员');
} else if (xmlHttp.responseText == 1) {
if(v_op == 1) {
Inner('v_'+v_id+'_1', ++v_nm);
} else {
Inner('v_'+v_id+'_0', ++v_nm);
}
}
}
}
<?php } ?>
function Q(qid){
  Dd('qid').value = qid;
  Ds('qbox');
  Dd('qbox').innerHTML = '&nbsp;<strong>引用:</strong><div class="title">'+Dd('i_'+qid).innerHTML+'</div><div class="content">'+Dd('c_'+qid).innerHTML+'</div>';
  H();
  Dd('content').focus();
}
function S() {
Inner('chars', <?php echo $MOD['comment_max'];?>-Dd('content').value.length);
}
function C() {
var user_status = <?php echo $user_status;?>;
if(user_status == 1) {
alert('您的会员组没有评论权限');
return false;
}
if(user_status == 2) {
if(confirm('您还没有登录,是否现在登录?')) {
top.location = '<?php echo $MODULE['2']['linkurl'];?><?php echo $AJ['file_login'];?>?forward=<?php echo urlencode($linkurl);?>';
}
return false;
}
if(Dd('star_2').checked == false && Dd('star_1').checked == false && Dd('star_0').checked == false) {
confirm('请选择您的评价');
Dd('star_2').focus();
return false;
}
if(Dd('content').value.length < <?php echo $MOD['comment_min'];?>) {
confirm('内容最少需要<?php echo $MOD['comment_min'];?>字');
Dd('content').focus();
return false;
}
if(Dd('content').value.length > <?php echo $MOD['comment_max'];?>) {
confirm('内容最多<?php echo $MOD['comment_max'];?>字');
Dd('content').focus();
return false;
}
<?php if($need_captcha) { ?>
if(!is_captcha(Dd('captcha').value)) {
confirm('请填写验证码');
Ds('tr_captcha');
H();
Dd('captcha').focus();
return false;
}
<?php } ?>
return true;
}
function F() {
<?php if($need_captcha) { ?>
Ds('tr_captcha');
<?php } ?>
H();
}
try{parent.Dd('comment_count').innerHTML = <?php echo $items;?>;}catch(e){}
<?php } ?>
function H() {
try{parent.Dd('aijiacms_comment').style.height = Dd('aijiacms_comment').scrollHeight+'px';}
catch(e){}
}
H();
</script>
</body>
</html>