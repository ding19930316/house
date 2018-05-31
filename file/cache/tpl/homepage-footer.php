<?php defined('IN_AIJIACMS') or exit('Access Denied');?></td>
<?php if($side_pos==1) { ?>
<td width="10" id="split"></td>
<td width="<?php echo $side_width;?>" valign="top" id="side"><?php include template('side', $template);?></td>
<?php } ?>
</tr>
</table>
</div>
<div class="m">
<div class="foot" id="foot">
<div>
<a href="<?php echo $COM['linkurl'];?>">网站首页</a>
<?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
&nbsp;|&nbsp;<a href="<?php echo $v['linkurl'];?>"><?php echo $v['name'];?></a>
<?php } } ?>
<?php if($api_stats && $stats) { ?>
<?php include AJ_ROOT.'/api/stats/'.$api_stats.'/show.inc.php';?>
<?php } ?>
&nbsp;|&nbsp;<a href="<?php echo $MODULE['2']['linkurl'];?>">管理入口</a>
</div>
</div>
</div>
<script type="text/javascript">Dd('position').innerHTML = Dd('pos_show').innerHTML;</script>
<?php if($api_kf && $kf) { ?>
<?php include AJ_ROOT.'/api/kf/'.$api_kf.'/show.inc.php';?>
<?php } ?>
</body>
</html>