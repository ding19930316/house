<?php

/*
此页面在服务端
用于上架新品
对应本机端 post_zishapot.php
*/
require '../common.inc.php';
	$cangku_id = $_POST['goods_id'];
	//die($cangku_id)	;
//防止重复
	$sql = 'SELECT goods_id FROM ' . $GLOBALS['ecs']->table('goods') . " WHERE cangku_id = '$cangku_id'";
	$cangku = $GLOBALS['db']->getOne($sql);	
	if($cangku <>'')
	{
		echo $cangku.',';	
		echo '<a href=http://'.$_SERVER['HTTP_HOST'].'/goods.php?id='.$cangku.' rel="noreferrer" id="testx" style="font-size:0px;position:absolute;left:-1000px;">test</a><script>document.getElementById("testx").click();</script>';	
		exit;
		}
//防止重复end

/* 处理商品数据 */
    $shop_price = !empty($_POST['shop_price']) ? $_POST['shop_price'] : 0;	
    $market_price = $_POST['market_price'];
    $promote_start_date = ($is_promote && !empty($_POST['promote_start_date'])) ? local_strtotime($_POST['promote_start_date']) : 0;
    $promote_end_date = ($is_promote && !empty($_POST['promote_end_date'])) ? local_strtotime($_POST['promote_end_date']) : 0;
    $goods_weight = !empty($_POST['goods_weight']) ? $_POST['goods_weight'] * $_POST['weight_unit'] : 0;
    $is_on_sale = isset($_POST['is_on_sale']) ? 1 : 0;
    $is_alone_sale = isset($_POST['is_alone_sale']) ? 1 : 0;
    $goods_number = isset($_POST['goods_number']) ? $_POST['goods_number'] : 0;
    $warn_number = isset($_POST['warn_number']) ? $_POST['warn_number'] : 0;
    $goods_type = isset($_POST['goods_type']) ? $_POST['goods_type'] : 0;
    $give_integral = isset($_POST['give_integral']) ? intval($_POST['give_integral']) : '-1';
    $rank_integral = isset($_POST['rank_integral']) ? intval($_POST['rank_integral']) : '-1';
    $suppliers_id = isset($_POST['suppliers_id']) ? intval($_POST['suppliers_id']) : '0';
    $goods_name_style = $_POST['goods_name_color'] . '+' . $_POST['goods_name_style'];
    $catgory_id = empty($_POST['cat_id']) ? '' : intval($_POST['cat_id']);
    $brand_id = empty($_POST['brand_id']) ? '' : intval($_POST['brand_id']);
	$is_yixing = empty($_POST['is_yixing']) ? '' : intval($_POST['is_yixing']);
	$jingxiao = empty($_POST['jingxiao']) ? '' : $_POST['jingxiao']; //之陶经销备注
	$niliao = empty($_POST['niliao']) ? '' : $_POST['niliao']; //泥料
	$cb_price = empty($_POST['cb_price']) ? '' : intval($_POST['cb_price']); //之陶成本价
	$salesnum = empty($_POST['salesnum']) ? '' : intval($_POST['salesnum']);
	$goods_gallery = $_POST['goods_gallery'];
	$goods_gallery = str_replace("\\", '', $goods_gallery); 
	$goods_gallery = unserialize($goods_gallery);
	$member_price = $_POST['member_price'];
	$member_price = str_replace("\\", '', $member_price); 
	$member_price = unserialize($member_price);	
	$video_urls = $_POST['video_urls'];
	$video_urls = str_replace("\\", '', $video_urls); 
	$video_urls = unserialize($video_urls);		
	$is_new = empty($_POST['is_new']) ? '1' : intval($_POST['is_new']);
	$goods_attr = $_POST['goods_attr'];
	$goods_attr = str_replace("\\", '', $goods_attr); 
	$goods_attr = unserialize($goods_attr);	
//	print_r($goods_attr);  
//	exit;



    /* 入库 */
if(isset($cangku_id))
{
	$sql = "INSERT INTO " . $ecs->table('goods') . " (goods_name, goods_name_style, goods_sn, nologo_mp4, is_yixing, jingxiao, niliao," .
			"cat_id, cb_price, s_name, rong, salesnum, brand_id, shop_price, market_price, is_promote, promote_price, " .
			"promote_start_date, promote_end_date, goods_img, goods_thumb, original_img, keywords, goods_brief, " .
			"seller_note, goods_weight, goods_number, warn_number, integral, give_integral, is_best, is_new, is_hot, w1000, is_qsg," .
			"is_on_sale, is_alone_sale, is_shipping, goods_desc, add_time, last_update, goods_type, rank_integral, suppliers_id, cangku_id)" .
			"VALUES ('$_POST[goods_name]', '$goods_name_style', '$goods_sn', '$nologo_mp4', '$is_yixing', '$jingxiao', '$niliao', '$catgory_id', " .
			"'$cb_price', '$_POST[s_name]', '$_POST[rong]', '$salesnum', '$brand_id', '$shop_price', '$market_price', '$_POST[is_promote]','$_POST[promote_price]', ".
			"'$promote_start_date', '$promote_end_date', '$_POST[goods_img]', '$_POST[goods_thumb]', '$_POST[original_img]', ".
			"'$_POST[keywords]', '$_POST[goods_brief]', '$_POST[seller_note]', '$goods_weight', '$goods_number',".
			" '$warn_number', '$_POST[integral]', '$give_integral', '$_POST[is_best]', '$is_new', '$_POST[is_hot]', '$_POST[w1000]', '$_POST[is_qsg]',  '$is_on_sale', '$is_alone_sale', '$_POST[is_shipping]', ".
			" '$_POST[goods_desc]', '" . gmtime() . "', '". gmtime() ."', '$goods_type', '$rank_integral', '$suppliers_id', '$cangku_id')";	
	$rs = $db->query($sql);
			
			
	if($rs){	
			$getID=mysql_insert_id();//$getID即为最后一条记录的ID	
			$sqlx = "UPDATE " .$ecs->table('goods'). " SET  `goods_sn` =  'ZT_$getID' WHERE  `goods_id` =$getID";
			$db->query($sqlx);
			
			//针对图片
			foreach($goods_gallery as $k => $v)
			{
				$sql_img = "INSERT INTO " . $ecs->table('goods_gallery') . " (goods_id, img_url, img_desc, paixu)" .
						"VALUES ('$getID', '$v[img_url]', '$v[img_desc]', '$v[paixu]')";	
				$db->query($sql_img);	
					}
					
			//针对属性
			foreach($goods_attr as $k => $v)
			{
				$sql_attr = "INSERT INTO " . $ecs->table('goods_attr') . " (goods_id, attr_id, attr_value, attr_price)" .
						"VALUES ('$getID', '$v[attr_id]', '$v[attr_value]', '$v[attr_price]')";	
				$db->query($sql_attr);	
					}	
			//针对会员价
			foreach($member_price as $k => $v)
			{
				$sql_price = "INSERT INTO " . $ecs->table('member_price') . " (goods_id, user_rank, user_price)" .
						"VALUES ('$getID', '$v[user_rank]', '$v[user_price]')";	
				$db->query($sql_price);	
					}	
					
			//针对视频
			foreach($video_urls as $k => $v)
			{
				$video_urls = "INSERT INTO " . $ecs->table('video_urls') . " (goods_id, article_id, video_url, video_desc, video_art, title)" .
						"VALUES ('$getID', '$v[article_id]', '$v[video_url]', '$v[video_desc]', '$v[video_art]', '$v[title]')";	
				$db->query($video_urls);	
					}						
			
			//扩展分类
			if(!empty($_POST[goods_cat]))
			{
			$s = "INSERT INTO " .$ecs->table('goods_cat'). " SET  `cat_id` =  '$_POST[goods_cat]', `goods_id` =  '$getID'";
			$db->query($s);	
			}
			
			  //echo "文章发布成功!";
			 // echo '`shangjian_id` =  '.$getID.';,';
			  echo $getID.',';
			  echo '<a href=http://'.$_SERVER['HTTP_HOST'].'/goods.php?id='.$getID.' rel="noreferrer" id="testx" style="font-size:0px;position:absolute;left:-1000px;">test</a><script>document.getElementById("testx").click();</script>';
/*			  echo '<a href=http://www.zishapot.com/goods.php?id='.$getID.' rel="noreferrer" id="testx" style="font-size:0px;position:absolute;left:-1000px;">test</a><script>document.getElementById("testx").click();</script>';		*/	  
			  
			}
	else{
			  echo "商品发布失败!";
		}	
}




?>