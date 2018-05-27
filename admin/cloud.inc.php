<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_AIJIACMS') or exit('Access Denied');
$install = file_get(AJ_CACHE.'/install.lock');
$url = decrypt('Vm4LJFB3BSIDaQYuB3RRfA92UHUBJQcyAWdSPAU/BzNVZl5oUHAHfgc0Vz9RYA', 'aijiacms').'?action='.$action.'&version='.AJ_VERSION.'&release='.AJ_RELEASE.'&lang='.AJ_LANG.'&charset='.AJ_CHARSET.'&install='.$install.'&os='.PHP_OS.'&soft='.urlencode($_SERVER['SERVER_SOFTWARE']).'&php='.urlencode(phpversion()).'&mysql='.urlencode(mysql_get_server_info()).'&url='.urlencode($AJ_URL).'&site='.urlencode($AJ['sitename']).'&auth='.strtoupper(md5($AJ_URL.$install.$_SERVER['SERVER_SOFTWARE']));
dheader($url);
?>