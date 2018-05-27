<?php
defined('IN_AIJIACMS') or exit('Access Denied');
if(preg_match("/^http:\/\/s[0-9]{1,5}\.cnzz\.com\/stat\.php\?id=[0-9]{5,11}&web_id=[0-9]{5,11}$/", $stats)) {
?>
&nbsp;|&nbsp;<script type="text/javascript" src="<?php echo $stats;?>"></script>
<?php
}
?>