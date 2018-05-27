<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
if($AJ_BOT) return;
if($update) $db->query("UPDATE LOW_PRIORITY {$table} SET ".(substr($update, 1))." WHERE itemid=$itemid", 'UNBUFFERED');
if($page == 1) {
	if($AJ['cache_hits']) {
		 cache_hits($moduleid, $itemid);
	} else {
		$db->query("UPDATE LOW_PRIORITY {$table} SET hits=hits+1 WHERE itemid=$itemid", 'UNBUFFERED');
	}
}	
?>