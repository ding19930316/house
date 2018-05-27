<?php
/*
	[Aijiacms System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$AREA = cache_read('area.php');
$cf = array();
$city = get_cookie('city');
$http_host = get_env('host');
if($city) {
	list($cityid, $city_domain) = explode('|', $city);
	$cityid = intval($cityid);
	if(strpos(AJ_PATH, $http_host) === false && strpos($city_domain, $http_host) === false) {
		$cf = $db->get_one("SELECT * FROM {$AJ_PRE}city WHERE domain='http://".$http_host."/'");
		if($cf ) {
			set_cookie('city', $cf ['areaid'].'|'.$cf ['domain'], $AJ_TIME + 365*86400);
			$cityid = $cf ['areaid'];
		}
	}
	#if($city_domain && !defined('AJ_ADMIN') && strpos($AJ_URL, AJ_PATH) !== false) dheader(str_replace(AJ_PATH, $city_domain, $AJ_URL));
} else {
	if(strpos(AJ_PATH, $http_host) === false) {
		$cf = $db->get_one("SELECT * FROM {$AJ_PRE}city WHERE domain='http://".$http_host."/'");
		if($cf ) {
			set_cookie('city', $cf ['areaid'].'|'.$cf ['domain'], $AJ_TIME + 365*86400);
			$cityid = $cf ['areaid'];
		}
	} else {
		if($AJ['city_ip'] && !defined('AJ_ADMIN') && !$AJ_BOT) {
			$iparea = ip2area($AJ_IP);
			$result = $db->query("SELECT * FROM {$AJ_PRE}city");
			while($r = $db->fetch_array($result)) {
				if(preg_match("/".$r['name'].($r['iparea'] ? '|'.$r['iparea'] : '')."/i", $iparea)) {
					set_cookie('city', $r['areaid'].'|'.$r['domain'], $AJ_TIME + 365*86400);
					$cityid = $r['areaid'];
					if($r['domain']) dheader($r['domain']);
					$cf = $r;
					break;
				}
			}
		}
	}
}
if($cityid) {
	$cf or $cf = $db->get_one("SELECT * FROM {$AJ_PRE}city WHERE areaid=$cityid");
	if(!defined('AJ_ADMIN')) {
		if($cf ['seo_title']) {		
			$AJ['seo_title'] = $city_sitename = $cf ['seo_title'];
		} else {
			$citysite = lang($L['citysite'], array($cf ['name']));
			$AJ['seo_title'] = $citysite.$AJ['seo_delimiter'].$AJ['seo_title'];
			$city_sitename = $citysite.$AJ['seo_delimiter'].$AJ['sitename'];
		}
		if($cf ['seo_keywords']) $AJ['seo_keywords'] = $cf ['seo_keywords'];
		if($cf ['seo_description']) $AJ['seo_description'] = $cf ['seo_description'];
	}
	$map_mid = $cf ['map_mid'];
	$city_name = $cf ['name'];
	$city_domain = $cf ['domain'];
	$city_template = $cf ['template'];
}
//д╛хоЁгйп

	$cf or $cf = $db->get_one("SELECT * FROM {$AJ_PRE}city WHERE hits=1");
	if(!defined('AJ_ADMIN')) {
		if($cf ['seo_title']) {		
			$AJ['seo_title'] = $city_sitename = $cf ['seo_title'];
		} else {
			$citysite = lang($L['citysite'], array($cf ['name']));
			$AJ['seo_title'] = $citysite.$AJ['seo_delimiter'].$AJ['seo_title'];
			//$AJ['sitename'] = $citysite.$AJ['seo_delimiter'].$AJ['sitename'];
			$city_sitename = $citysite.$AJ['seo_delimiter'].$AJ['sitename'];
		}
		if($cf ['seo_keywords']) $AJ['seo_keywords'] = $cf ['seo_keywords'];
		if($cf ['seo_description']) $AJ['seo_description'] = $cf ['seo_description'];
	}
	$city_namem = $cf ['name'];
	$cityid = $cf ['areaid'];
	$map_mid = $cf ['map_mid'];
	$city_domain = $cf ['domain'];
	$city_template = $cf ['template'];

if($city_domain) {
	foreach($MODULE as $k=>$v) {
		if($v['islink']) continue;
		$MODULE[$k]['linkurl'] = $k == 1 ? $city_domain : $city_domain.$v['moduledir'].'/';
	}
	$MOD['linkurl'] = $MODULE[$moduleid]['linkurl'];
	foreach($EXT as $k=>$v) {
		if(strpos($k, '_url') !== false) {
			$EXT[$k] = $city_domain.str_replace('_url', '', $k).'/';
		}
	}
}
?>