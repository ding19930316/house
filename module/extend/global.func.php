<?php
defined('IN_AIJIACMS') or exit('Access Denied');
function ad_name($ad = array()) {
	if($ad['typeid'] > 5) {
		if($ad['key_word']) {
			return 'ad_t'.$ad['typeid'].'_m'.$ad['key_moduleid'].'_k'.urlencode($ad['key_word']).'_'.$ad['areaid'].'.htm';
		} else if($ad['key_catid']) {
			return 'ad_t'.$ad['typeid'].'_m'.$ad['key_moduleid'].'_c'.$ad['key_catid'].'_'.$ad['areaid'].'.htm';
		} else {
			return 'ad_t'.$ad['typeid'].'_m'.$ad['key_moduleid'].'_'.$ad['areaid'].'.htm';
		}
	} else {
		return 'ad_'.$ad['pid'].'_'.$ad['areaid'].'.htm';
	}
	return '';
}
?>