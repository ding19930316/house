<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$db->query("DROP TABLE IF EXISTS `".$AJ_PRE.$module."_".$moduleid."`");
$db->query("DROP TABLE IF EXISTS `".$AJ_PRE.$module."_data_".$moduleid."`");
?>