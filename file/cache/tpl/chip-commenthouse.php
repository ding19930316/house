<?php defined('IN_AIJIACMS') or exit('Access Denied');?><?php if(in_array($moduleid, explode(',', get_module_setting(3, 'comment_module')))) { ?>
 <div  id="Comment"  style="display:;">

<script type="text/javascript">show_commenthouse('<?php echo $MODULE['3']['linkurl'];?>', <?php echo $moduleid;?>, <?php echo $itemid;?>);</script>
</div>
<?php } ?>
