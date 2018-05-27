<?php
/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
define('AJ_NONUSER', true);
require 'common.inc.php';
if($AJ_BOT) dhttp(403);
require AJ_ROOT.'/include/post.func.php';
if(preg_match("/^[a-z0-9]{1}[a-z0-9_\-]{0,}[a-z0-9]{1}$/", $action)) @include AJ_ROOT.'/api/ajax/'.$action.'.inc.php';
?>