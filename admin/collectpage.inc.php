<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/admin/config/collectfunction.php';
if ( empty( $config ) || !file_exists( AJ_ROOT."/admin/config/site_".$config.".php" ) )
{
		msg('该采集规则配置文件不存在');
}
include_once( AJ_ROOT."/admin/config/site_".$config.".php" );
$menus = array (
    array('添加规则', '?file=collectset&action=add'),
    array('规则管理', '?file=collectset'),
    array('规则导入', '?file='.$file.'&action=import'),
);
$this_forward = '?file='.$file.'&config='.$config;
$AREA = cache_read('area.php');
$CATEGORY = cache_read('category-'.$myCollect['modid'].'.php');

switch($action) {
	case 'add':
				$tmpary = array( );
				$tmpary['title'] = $title;
				$tmpary['catid'] = $catid;
				$tmpary['areaid'] = $areaid;
				$tmpary['urlpage'] = $urlpage;
				$tmpary['listarea'] = my_stripslashes(trim($_REQUEST['listarea']));
				$tmpary['infoid'] = my_stripslashes(trim($_REQUEST['infoid']));
				$tmpary['nextpageid'] = my_stripslashes(trim($_REQUEST['nextpageid']));
				$tmpary['startpageid'] = $startpageid;
				if ( is_numeric( $maxpagenum ) )
				{
								$tmpary['maxpagenum'] = intval( $maxpagenum );
				}
				else
				{
								$tmpary['maxpagenum'] = 0;
				}
				$myCollect['listcollect'][] = $tmpary;
				my_setconfigs( "site_".$config, "myCollect", $myCollect );
				msg('批量采集规则添加成功', $this_forward, 3);
	break;
	case 'edit':
		if($submit) {
				$tmpary = array( );
				$tmpary['title'] = $title;
				$tmpary['catid'] = $catid;
				$tmpary['areaid'] = $areaid;
				$tmpary['urlpage'] = $urlpage;
				$tmpary['listarea'] = my_stripslashes(trim($_REQUEST['listarea']));
				$tmpary['infoid'] = my_stripslashes(trim($_REQUEST['infoid']));
				$tmpary['nextpageid'] = my_stripslashes(trim($_REQUEST['nextpageid']));
				$tmpary['startpageid'] = $startpageid;
				if ( is_numeric( $maxpagenum ) )
				{
								$tmpary['maxpagenum'] = intval( $maxpagenum );
				}
				else
				{
								$tmpary['maxpagenum'] = 0;
				}
				$myCollect['listcollect'][$cid] = $tmpary;
				my_setconfigs( "site_".$config, "myCollect", $myCollect );
				msg('批量采集规则编辑成功', $this_forward, 3);
		} else {
				include tpl('collectpage_edit');
		}
	break;
	case 'del':
		if(!empty($config))
		{
				if( isset($cid) && !empty($myCollect['listcollect'][$cid]) )
				{
						unset( $myCollect['listcollect'][$cid] );
						my_setconfigs( "site_".$config, "myCollect", $myCollect );
				}
		}
		msg('批量采集规则删除成功', $this_forward, 3);
	break;
	default:
		include tpl('collectpage');
	break;
}
?>