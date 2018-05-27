<?php
defined('IN_AIJIACMS') or exit('Access Denied');
dhttp(404, $AJ_BOT);
$head_title = lang($itemid ? 'message->item_not_exists' : 'message->cate_not_exists');
exit(include template($itemid ? 'show-notfound' : 'list-notfound', 'message'));
?>