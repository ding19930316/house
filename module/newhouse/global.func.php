<?php
defined('IN_AIJIACMS') or exit('Access Denied');

function get_photo($condition = 'status=3') {
		global $db, $items;
		$photo = $db->get_one("SELECT * FROM {$db->pre}photo_12 WHERE $condition");
		return $photo;
		}
?>