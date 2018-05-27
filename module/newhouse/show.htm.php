<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
if(!$MOD['show_html'] || !$itemid) return false;
$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
if(!$item || $item['status'] < 3) return false;
extract($item);
$CAT = get_cat($catid);
$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
$t = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
$content = $t['content'];
if($MOD['keylink']) $content = keylink($content, $moduleid);

$CP = $MOD['cat_property'] && $CAT['property'];
if($CP) {
	require_once AJ_ROOT.'/include/property.func.php';
	$options = property_option($catid);
	$values = property_value($moduleid, $itemid);
}
if($AJ['city']){
$mainarea = get_mainarea($cityid);
}else{
$mainarea = get_mainarea(0);}
//历史价格图
$linedate=htmlspecialchars_decode($linedate, ENT_QUOTES); 
//意向登记
$message=$db->pre.'message';

		$result = $db->query("SELECT * FROM $message  where title='$title'and typeid=1 LIMIT 0,6");
	
		while($r = $db->fetch_array($result)) {
			$r['adddate'] = timetodate($r['addtime'], $L['message_list_date']);
			
		     
			$messages[] = $r;
		}
//同价位楼盘  10条记录
$area=$db->pre.'area';

$h = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
$price = $h['price'];
$pricea=$h['price']-500;
$priceb=$h['price']+500;
	$tjw =$db->query("SELECT itemid,title,price,areaid,linkurl FROM  {$table} WHERE price!=0 AND price between $h[price]-500 and $h[price]+500  and $itemid != itemid and isnew=1 and $areaid=areaid ORDER BY itemid DESC LIMIT 0,10");
	while($tjws=$db->fetch_array($tjw)){
		$quyu = $tjws['areaid'];
		
		 $qynames = $db->query("SELECT areaname FROM $area WHERE areaid=$quyu");
		 $qyname = $db->fetch_array($qynames);
		 $diqu=$qyname['areaname'];
		 $tjws[quyu]=$diqu;
		 
		$same_price_list[]=$tjws;
	}
	//同区域楼盘  10条记录

	$tqy =$db->query("SELECT itemid,title,price,areaid,linkurl FROM  {$table} WHERE  $areaid=areaid and $itemid != itemid and isnew=1 ORDER BY itemid DESC LIMIT 0,10");
	while($tqys=$db->fetch_array($tqy)){
	
		 
		$same_quyu_list[]=$tqys;
	}
	//在线问房  10条记录
$ask=$db->pre.'ask';
	$tjw =$db->query("SELECT * FROM  $ask WHERE houseid=$itemid ORDER BY itemid DESC LIMIT 0,5");
	
	while($tjws=$db->fetch_array($tjw)){
	$quyu = $tjws['houseid'];
		
		 $qynames = $db->query("SELECT * FROM {$table} WHERE itemid=$quyu");
		 $qyname = $db->fetch_array($qynames);
		 $diqu=$qyname['title'];
		 $tjws[quyu]=$diqu;
	
		$ask_list[]=$tjws;
		
		
	}
		//在线问房  10条记录
$ask=$db->pre.'ask';
  $pagesize =5;
	if(!$pagesize || $pagesize > 100) $pagesize = 30;
	$offset = ($page-1)*$pagesize;
	$r = $db->get_one("SELECT COUNT(*) AS num FROM $ask   WHERE  houseid = $itemid");
	$items = $r['num'];
	$pages = pages($r['num'], $page, $pagesize);


	$tjw =$db->query("SELECT * FROM  $ask WHERE houseid=$itemid ORDER BY itemid DESC LIMIT $offset,$pagesize");
	
	while($tjws=$db->fetch_array($tjw)){
	$quyu = $tjws['houseid'];
		
		 $qynames = $db->query("SELECT * FROM {$table} WHERE itemid=$quyu");
		 $qyname = $db->fetch_array($qynames);
		 $diqu=$qyname['title'];
		 $tjws[quyu]=$diqu;
	
		$ask_lists[]=$tjws;	
	}
	//资讯  10条记录
$article=$db->pre.'article_8';
  $pagesize =5;
	if(!$pagesize || $pagesize > 100) $pagesize = 30;
	$offset = ($page-1)*$pagesize;
	$r = $db->get_one("SELECT COUNT(*) AS num FROM $article   WHERE  houseid = $itemid");
	$items = $r['num'];
	$pages = pages($r['num'], $page, $pagesize);


	$tjw =$db->query("SELECT * FROM  $article WHERE houseid=$itemid ORDER BY itemid DESC LIMIT $offset,$pagesize");
	
	while($tjws=$db->fetch_array($tjw)){
	$quyu = $tjws['houseid'];
		
		 $qynames = $db->query("SELECT * FROM {$table} WHERE itemid=$quyu");
		 $qyname = $db->fetch_array($qynames);
		 $diqu=$qyname['title'];
		 $tjws[quyu]=$diqu;
	
		$new_lists[]=$tjws;	
	}
	
	//相册图楼盘  10条记录
$area=$db->pre.'photo_12';
$pagesize =10;
	if(!$pagesize || $pagesize > 100) $pagesize = 30;
	$offset = ($page-1)*$pagesize;
	$r = $db->get_one("SELECT COUNT(*) AS num FROM $area   WHERE  houseid = $itemid");
	$items = $r['num'];
	$pages = pages($r['num'], $page, $pagesize);

	$tjw =$db->query("SELECT * FROM  $area WHERE  houseid = $itemid ORDER BY itemid DESC LIMIT $offset,$pagesize");
	while($tjws=$db->fetch_array($tjw)){
		 
		$pic_list[]=$tjws;
	}
$adddate = timetodate($addtime, 3);
$editdate = timetodate($edittime, 3);
$todate = $totime ? timetodate($totime, 3) : 0;
$expired = $totime && $totime < $AJ_TIME ? true : false;
$fileurl = $linkurl;
$linkurl = $MOD['linkurl'].$linkurl;
$thumbs = get_albums($item);
$albums =  get_albums($item, 1);
$amount = number_format($amount, 0, '.', '');
$fee = get_fee($item['fee'], $MOD['fee_view']);
if($map){
$map_mid = $map;
}else{
$map_mid=$map_mid ;}
$map=explode(",",$map_mid);
		foreach($map as $key =>$value){
		  $x =$map['0'];
		   $y=$map['1']; 
		   }
$user_status = 3;
$seo_file = 'show';
include AJ_ROOT.'/include/seo.inc.php';
$template = $item['template'] ? $item['template'] : ($CAT['show_template'] ? $CAT['show_template'] : 'show');
$aijiacms_task = "moduleid=$moduleid&html=show&itemid=$itemid";
ob_start();
include template($template, $module);
$data = ob_get_contents();
ob_clean();
$filename = AJ_ROOT.'/'.$MOD['moduledir'].'/'.$fileurl;
if($AJ['pcharset']) $filename = convert($filename, AJ_CHARSET, $AJ['pcharset']);
file_put($filename, $data);
return true;
?>