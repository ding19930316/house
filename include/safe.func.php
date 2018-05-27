<?php
/*
	[Aijiacms  System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
function dhtmlspecialchars($string) {
	if(is_array($string)) {
		return array_map('dhtmlspecialchars', $string);
	} else {
		if(defined('AJ_ADMIN')) {
			return str_replace(array('&amp;'), array('&'), htmlspecialchars($string, ENT_QUOTES));
		} else {
			return str_replace(array('&amp;', '&quot;', '&#34;', '"'), array('&', '', '', ''), htmlspecialchars($string, ENT_QUOTES));
		}
	}
}

function dsafe($string) {
	if(is_array($string)) {
		return array_map('dsafe', $string);
	} else {
		$string = preg_replace("/\<\!\-\-([\s\S]*?)\-\-\>/", "", $string);
		$string = preg_replace("/\/\*([\s\S]*?)\*\//", "", $string);
		$string = preg_replace("/&#([a-z0-9]+)([;]*)/i", "", $string);
		if(preg_match("/&#([a-z0-9]+)([;]*)/i", $string)) return nl2br(strip_tags($string));
		$match = array("/s[\s]*c[\s]*r[\s]*i[\s]*p[\s]*t/i","/d[\s]*a[\s]*t[\s]*a[\s]*\:/i","/b[\s]*a[\s]*s[\s]*e/i","/e[\\\]*x[\\\]*p[\\\]*r[\\\]*e[\\\]*s[\\\]*s[\\\]*i[\\\]*o[\\\]*n/i","/i[\\\]*m[\\\]*p[\\\]*o[\\\]*r[\\\]*t/i","/on([a-z]{2,})([\(|\=|\s]+)/i","/about/i","/frame/i","/link/i","/meta/i","/textarea/i","/eval/i","/alert/i","/confirm/i","/prompt/i","/cookie/i","/document/i","/newline/i","/colon/i","/<style/i","/\\\x/i");
		$replace = array("s<em></em>cript","da<em></em>ta:","ba<em></em>se","ex<em></em>pression","im<em></em>port","o<em></em>n\\1\\2","a<em></em>bout","f<em></em>rame","l<em></em>ink","me<em></em>ta","text<em></em>area","e<em></em>val","a<em></em>lert","/con<em></em>firm/i","prom<em></em>pt","coo<em></em>kie","docu<em></em>ment","new<em></em>line","co<em></em>lon","<sty1e","\<em></em>x");
		return preg_replace($match, $replace, $string);
	}
}

function strip_sql($string) {
	$match = array("/union/i","/where/i","/outfile/i","/dumpfile/i","/0x([a-z0-9]{2,})/i","/select([\s\S]*?)from/i","/select([\s\*\/\-\(\+@])/i","/update([\s\*\/\-\(\+@])/i","/replace([\s\*\/\-\(\+@])/i","/delete([\s\*\/\-\(\+@])/i","/drop([\s\*\/\-\(\+@])/i","/load_file[\s]*\(/i","/substring[\s]*\(/i","/substr[\s]*\(/i","/left[\s]*\(/i","/concat[\s]*\(/i","/concat_ws[\s]*\(/i","/make_set[\s]*\(/i","/ascii[\s]*\(/i","/hex[\s]*\(/i","/ord[\s]*\(/i","/char[\s]*\(/i");
	$replace = array('unio&#110;','wher&#101;','outfil&#101;','dumpfil&#101;','0&#120;\\1','selec&#116;\\1from','selec&#116;\\1','updat&#101;\\1','replac&#101;\\1','delet&#101;\\1','dro&#112;\\1','load_fil&#101;(','substrin&#103;(','subst&#114;(','lef&#116;(','conca&#116;(','concat_w&#115;(','make_se&#116;(','asci&#105;(','he&#120;(','or&#100;(','cha&#114;(');
	return is_array($string) ? array_map('strip_sql', $string) : preg_replace($match, $replace, $string);
}

function strip_uri($uri) {
	if(strpos($uri, '%') !== false) {
		while($uri != urldecode($uri)) {
			$uri = urldecode($uri);
		}
	}
	if(strpos($uri, '<') !== false || strpos($uri, "'") !== false || strpos($uri, '"') !== false || strpos($uri, '0x') !== false) {
		dhttp(403, 0);
		dalert('HTTP 403 Forbidden', AJ_PATH);
	}
}

function strip_kw($kw) {
	$kw = htmlspecialchars(trim(urldecode($kw)));
	if($kw) {
		if(strpos($kw, '%') !== false) return '';
		$kw = str_replace("'", '', $kw);
	}
	return $kw;
}

function strip_key($array, $deep = 0) {
	foreach($array as $k=>$v) {
		if($deep && !preg_match("/^[a-z0-9_\-]{1,}$/i", $k)) {
			dhttp(403, 0);
			dalert('HTTP 403 Forbidden', AJ_PATH);
		}
		if(is_array($v)) strip_key($v, 1);
	}
}

function strip_str($string, $level = 0) {
	return str_replace(array('\\','"', "'"), array('', '', ''), $string);
}
?>