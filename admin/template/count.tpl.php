<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
if(!$itemid) show_menu($menus);
?>
<form action="?">
<div class="tt">统计报表</div>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<select name="mid">
<?php
	foreach($MODULE as $m) {
	if(!in_array($m['moduleid'], array(1,3,4)) && !$m['islink']) {
?>
<option value="<?php echo $m['moduleid'];?>"<?php echo $mid == $m['moduleid'] ? ' selected' : ''?>><?php echo $m['name'];?></option>
<?php } } ?>
</select>&nbsp;
<select name="year">
<option value="0">选择年</option>
<?php for($i = date("Y", $AJ_TIME); $i >= 2000; $i--) { ?>
<option value="<?php echo $i;?>"<?php echo $i == $year ? ' selected' : ''?>><?php echo $i;?>年</option>
<?php } ?>
</select>&nbsp;
<select name="month">
<option value="0">选择月</option>
<?php for($i = 1; $i < 13; $i++) { ?>
<option value="<?php echo $i;?>"<?php echo $i == $month ? ' selected' : ''?>><?php echo $i;?>月</option>
<?php } ?>
</select>&nbsp;
<input type="submit" value="生成报表" class="btn"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="Go('?file=<?php echo $file;?>&action=<?php echo $action;?>&mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>');"/>
</td>
</tr>
</table>
</form>
<?php
	if($year && $month && $mid) {
	$tb = get_table($mid);
	$fd = 'addtime';
	$ym = $year.'-'.$month;
	if($mid == 2) $fd = 'regtime';
	$d = date('t', strtotime($ym.'-1'));
	$chart_data = '';
	for($i = 1; $i <= $d; $i++) {
		$f = strtotime($ym.'-'.$i.' 00:00:00');
		$t = strtotime($ym.'-'.$i.' 23:59:59');
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$tb} WHERE `$fd`>=$f AND `$fd`<=$t");
		if($i > 1) $chart_data .= '\n';
		$chart_data .= $i.';'.($r['num'] ? $r['num'] : 0);
	}
?>
<div class="tt"><?php echo $MODULE[$mid]['name'];?> <?php echo $year;?>年<?php echo $month;?>月统计报表</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td style="padding:10px;">
<?php load('swfobject.js');?>
<script type="text/javascript" src="<?php echo AJ_PATH;?>api/amcharts/amcharts.js"></script>
<script type="text/javascript" src="<?php echo AJ_PATH;?>api/amcharts/amfallback.js"></script>
<div id="chartdiv" style="width:700px;height:400px;background:#FFFFFF;"></div>        
<script type="text/javascript">
var params = 
{
	bgcolor:"#FFFFFF"
};	
var flashVars = 
{
	path: "<?php echo AJ_PATH;?>api/amcharts/flash/",		
	chart_data: "<?php echo $chart_data;?>",
	chart_settings: "<settings><data_type>csv</data_type><plot_area><margins><left>50</left><right>40</right><top>50</top><bottom>50</bottom></margins></plot_area><grid><category><dashed>1</dashed><dash_length>4</dash_length></category><value><dashed>1</dashed><dash_length>4</dash_length></value></grid><axes><category><width>1</width><color>E7E7E7</color></category><value><width>1</width><color>E7E7E7</color></value></axes><values><value><min>0</min></value></values><legend><enabled>0</enabled></legend><angle>0</angle><column><width>85</width><balloon_text>{title}:{value}</balloon_text><grow_time>3</grow_time><sequenced_grow>1</sequenced_grow></column><graphs><graph gid='0'><title>总数</title><color>7F8DA9</color></graph></graphs><labels><label lid='0'><text><![CDATA[<b><?php echo $MODULE[$mid]['name'];?><?php echo $year;?>年<?php echo $month;?>月统计报表</b>]]></text><y>18</y><text_color>000000</text_color><text_size>13</text_size><align>center</align></label></labels></settings>"
};
if (swfobject.hasFlashPlayerVersion("8")) {
	swfobject.embedSWF("<?php echo AJ_PATH;?>api/amcharts/flash/amcolumn.swf", "chartdiv", "700", "400", "8.0.0", "<?php echo AJ_PATH;?>api/amcharts/flash/expressInstall.swf", flashVars, params);
} else {
	var amFallback = new AmCharts.AmFallback();
	amFallback.chartSettings = flashVars.chart_settings;
	amFallback.pathToImages = "<?php echo AJ_PATH;?>api/amcharts/images/";
	amFallback.chartData = flashVars.chart_data;
	amFallback.type = "column";
	amFallback.write("chartdiv");
}
</script>
</td>
</tr>
</table>
<?php
	} else if($year && $mid) {
	$tb = get_table($mid);
	$fd = 'addtime';
	$ym = $year;
	if($mid == 2) $fd = 'regtime';
	$chart_data = '';
	for($i = 1; $i < 13; $i++) {		
		$f = strtotime($ym.'-'.$i.'-1 00:00:00');
		$d = date('t', $f);
		$t = strtotime($ym.'-'.$i.'-'.$d.' 23:59:59');
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$tb} WHERE `$fd`>=$f AND `$fd`<=$t");
		if($i > 1) $chart_data .= '\n';
		$chart_data .= $i.';'.($r['num'] ? $r['num'] : 0);
	}
?>
<div class="tt"><?php echo $MODULE[$mid]['name'];?> <?php echo $year;?>年统计报表</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td style="padding:10px;">
<?php load('swfobject.js');?>
<script type="text/javascript" src="<?php echo AJ_PATH;?>api/amcharts/amcharts.js"></script>
<script type="text/javascript" src="<?php echo AJ_PATH;?>api/amcharts/amfallback.js"></script>
<div id="chartdiv" style="width:700px;height:400px;background:#FFFFFF;"></div>        
<script type="text/javascript">
var params = 
{
	bgcolor:"#FFFFFF"
};	
var flashVars = 
{
	path: "<?php echo AJ_PATH;?>api/amcharts/flash/",		
	chart_data: "<?php echo $chart_data;?>",
	chart_settings: "<settings><data_type>csv</data_type><plot_area><margins><left>50</left><right>40</right><top>50</top><bottom>50</bottom></margins></plot_area><grid><category><dashed>1</dashed><dash_length>4</dash_length></category><value><dashed>1</dashed><dash_length>4</dash_length></value></grid><axes><category><width>1</width><color>E7E7E7</color></category><value><width>1</width><color>E7E7E7</color></value></axes><values><value><min>0</min></value></values><legend><enabled>0</enabled></legend><angle>0</angle><column><width>85</width><balloon_text>{title}:{value}</balloon_text><grow_time>3</grow_time><sequenced_grow>1</sequenced_grow></column><graphs><graph gid='0'><title>总数</title><color>7F8DA9</color></graph></graphs><labels><label lid='0'><text><![CDATA[<b><?php echo $MODULE[$mid]['name'];?><?php echo $year;?>年统计报表</b>]]></text><y>18</y><text_color>000000</text_color><text_size>13</text_size><align>center</align></label></labels></settings>"
};
if (swfobject.hasFlashPlayerVersion("8")) {
	swfobject.embedSWF("<?php echo AJ_PATH;?>api/amcharts/flash/amcolumn.swf", "chartdiv", "700", "400", "8.0.0", "<?php echo AJ_PATH;?>api/amcharts/flash/expressInstall.swf", flashVars, params);
} else {
	var amFallback = new AmCharts.AmFallback();
	amFallback.chartSettings = flashVars.chart_settings;
	amFallback.pathToImages = "<?php echo AJ_PATH;?>api/amcharts/images/";
	amFallback.chartData = flashVars.chart_data;
	amFallback.type = "column";
	amFallback.write("chartdiv");
}
</script>
</td>
</tr>
</table>
<?php } else { ?>
<div class="tt">统计概况</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><a href="?moduleid=2&file=ask" class="t">待受理客服中心</a></td>
<td>&nbsp;<a href="?moduleid=2&file=ask&status=0"><span id="ask"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=charge" class="t">待受理在线充值</a></td>
<td>&nbsp;<a href="?moduleid=2&file=charge&status=0"><span id="charge"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=cash" class="t">待受理资金提现</a></td>
<td>&nbsp;<a href="?moduleid=2&file=cash&status=0"><span id="cash"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=16&file=order" class="t">待受理会员交易</a></td>
<td>&nbsp;<a href="?moduleid=16&file=order"><span id="trade"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=2&file=alert&action=check" class="t">待审核贸易提醒</a></td>
<td>&nbsp;<a href="?moduleid=2&file=alert&action=check"><span id="alert"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=guestbook" class="t">待回复网站留言</a></td>
<td>&nbsp;<a href="?moduleid=3&file=guestbook"><span id="guestbook"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=comment&action=check" class="t">待审核评论</a></td>
<td>&nbsp;<a href="?moduleid=3&file=comment&action=check"><span id="comment"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=link&action=check" class="t">待审核友情链接</a></td>
<td>&nbsp;<a href="?moduleid=3&file=link&action=check"><span id="link"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=2&file=news&action=check" class="t">待审核公司新闻</a></td>
<td>&nbsp;<a href="?moduleid=2&file=news&action=check"><span id="news"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=honor&action=check" class="t">待审核荣誉资质</a></td>
<td>&nbsp;<a href="?moduleid=2&file=honor&action=check"><span id="honor"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=2&file=link&action=check" class="t">待审核公司链接</a></td>
<td>&nbsp;<a href="?moduleid=2&file=link&action=check"><span id="comlink"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?file=keyword&status=2" class="t">待审核搜索关键词</a></td>
<td>&nbsp;<a href="?file=keyword&status=2"><span id="keyword"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
</tr>


<tr>
<td class="tl"><a href="?moduleid=2&file=validate&status=2" class="t">待审实名认证</a></td>
<td>&nbsp;<a href="?moduleid=2&file=validate&status=2"><span id="validate"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=ad&action=list&job=check" class="t">待审广告购买</a></td>
<td>&nbsp;<a href="?moduleid=3&file=ad&action=list&job=check"><span id="ad"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=spread&action=check" class="t">待审核排名推广</a></td>
<td>&nbsp;<a href="?moduleid=3&file=spread&action=check"><span id="spread"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"><a href="?moduleid=10&file=answer&action=check" class="t">待审核知道回答</a></td>
<td>&nbsp;<a href="?moduleid=10&file=answer&action=check"><span id="answer"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
</tr>


<tr>
<td class="tl"><a href="?moduleid=2&file=grade&action=check" class="t">会员升级申请</a></td>
<td>&nbsp;<a href="?moduleid=2&file=grade&action=check"><span id="member_upgrade"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
<td class="tl"></td>
<td>&nbsp;</td>
<td class="tl"></td>
<td>&nbsp;</td>
</tr>

<tr>
<td class="tl"><a href="?moduleid=2" class="t">会员</a></td>

<td width="10%">&nbsp;<a href="?moduleid=2"><span id="member"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=4&file=vip" class="t"><?php echo VIP;?>会员</a></td>

<td width="10%">&nbsp;<a href="?moduleid=4&file=vip"><span id="member_vip"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=2&action=check" class="t">待审核</a></td>

<td width="10%">&nbsp;<a href="?moduleid=2&action=check"><span id="member_check"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>


<td class="tl"><a href="?moduleid=2&action=add" class="t">今日新增</a></td>

<td width="10%">&nbsp;<a href="?moduleid=2"><span id="member_new"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
</tr>


<?php
foreach ($MODULE as $m) {
	if($m['moduleid'] < 5 || $m['islink']) continue;
?>

<?php 
if($m['moduleid'] == 9) $m['name'] = '招聘';
?>

<tr>
<td class="tl"><a href="<?php echo $m['linkurl'];?>" class="t" target="_blank"><?php echo $m['name'];?></a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>" class="t">已发布</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>_1"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&action=check" class="t">待审核</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&action=check"><span id="m_<?php echo $m['moduleid'];?>_2"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&action=add" class="t">今日新增</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>_3"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
</tr>


<?php
if($m['moduleid'] == 9) {
	$m['name'] = '简历';
?>
<tr>
<td class="tl"><a href="<?php echo $m['linkurl'];?>" class="t" target="_blank"><?php echo $m['name'];?></a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume"><span id="m_resume"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume" class="t">已发布</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume"><span id="m_resume_1"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume&action=check" class="t">待审核</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume&action=check"><span id="m_resume_2"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&file=resume&action=add" class="t">今日新增</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_resume_3"><img src="admin/image/count.gif" width="10" height="10" alt="正在统计"/></span></a></td>
</tr>

<?php } ?>

<?php
}
?>
</table>
<?php } ?>
<script type="text/javascript">Menuon(0);</script>
<script type="text/javascript" src="?file=<?php echo $file;?>&action=js"></script>
<?php include tpl('footer');?>