<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/admin/config/collectfunction.php';
require AJ_ROOT.'/admin/config/collectsite.php';
$menus = array (
    array('页面批量采集', '?file='.$file),
    //array('起止序号批量采集', '?file='.$file.'&type=seids'),
    //array('序号列表批量采集', '?file='.$file.'&type=ids'),
);
$this_forward = '?file='.$file.'&type='.$type;
if($action=='collect')
{ 
	include tpl('header');
	show_menu($menus);
}
@set_time_limit( 0 );
@session_write_close( );

if($action!='')
{ 
		if ( !isset( $siteid ) || !is_numeric( $siteid ) )
		{
				msg('请选择一个采集器');
		}
		if ( !file_exists( AJ_ROOT."/admin/config/site_".$Collectsite[$siteid]['config'].".php" ) )
		{
				msg('该采集器对应采集规则不存在');
		}
		include_once( AJ_ROOT."/admin/config/site_".$Collectsite[$siteid]['config'].".php" );
}
if($action=='collect')
{ 
		if ( !array_key_exists( $siteid, $Collectsite ) )
		{
				msg('该采集器暂时关闭采集');
		}
		if($Collectsite[$siteid]['verify_mode'] == 4)
		{
				msg('采集接口未开启');
		}
		$pass = false;
		if($Collectsite[$siteid]['verify_mode'] == 1) {
				if($_userid && $_userid == $CFG['founderid']) $pass = true;
		} else if($Collectsite[$siteid]['verify_mode'] == 2) {
				$auth = $_REQUEST['auth'];
				if((strlen($auth) >= 6 && $auth == $Collectsite[$siteid]['spider_auth']) || $spider_auth==1) $pass = true;
		} elseif($Collectsite[$siteid]['verify_mode'] == 3) {
				if($AJ_IP && $AJ_IP == $Collectsite[$siteid]['spider_ip']) $pass = true;
		}
		$pass or msg('身份校验失败');

		if(empty($MODULE[$myCollect['modid']])) 
		{
				msg('模块不存在');
		}
		if ( empty( $myCollect['rule']['title'] ) && empty( $myCollect['rule']['username'] ) )
		{
				msg('信息标题规则不能为空');
		}
		require_once AJ_ROOT.'/module/'.$module.'/'.$module.'.class.php';
		require AJ_ROOT.'/include/module.func.php';
		include AJ_ROOT.'/admin/config/myart.php';
		//默认会员模块
		$membermodule = 'member';
		require_once AJ_ROOT.'/module/'.$membermodule.'/'.$membermodule.'.class.php';
		include AJ_ROOT.'/lang/'.AJ_LANG.'/'.$membermodule.'.inc.php';
		if ( file_exists( AJ_ROOT."/admin/config/cache/sitecollectarr_".$Collectsite[$siteid]['config'].".php" ) )
		{
				include( AJ_ROOT."/admin/config/cache/sitecollectarr_".$Collectsite[$siteid]['config'].".php" );
				$ruleCollectArr_temp = $ruleCollectArr;
		}
		else
		{
				$ruleCollectArr_temp = array();
		}
		$AREA = cache_read('area.php');
		if(in_array($module, array('article', 'info'))) {
				$fdtable = $AJ_PRE.$module.'_'.$myCollect['modid'];
		} else {
				$fdtable = $AJ_PRE.$module;
		}
		//读取自定义字段设置
		$IFD = cache_read('fields-'.substr($fdtable, strlen($AJ_PRE)).'.php');
		$MFD = cache_read('fields-'.$membermodule.'.php');
		$CFD = cache_read('fields-company.php');
		if($IFD || $MFD || $CFD) require AJ_ROOT.'/include/fields.func.php';
		//读取公司ID缓存
		$compinfolistcache = AJ_ROOT."/admin/config/cache/compinfolistcache_".$siteid."_".$collectname.".php";
		if ( $thisidsarykey!='' && file_exists( $compinfolistcache ) )
		{
				include( $compinfolistcache );
		}
}
switch($type) {
	case 'seids':
		if($action=='collect')
		{
				echo '<div class="tt">按起止序号批量采集</div><script type="text/javascript">Menuon(1);</script>';
				$errtext = "";
				if ( !is_numeric( $startid ) )
				{
						$errtext .= "请输入信息起始序号<br />";
				}
				if ( !is_numeric( $endid ) )
				{
						$errtext .= "请输入信息结束序号<br />";
				}
				if ( empty( $errtext ) )
				{
						if($compinfolisturl != '')
						{
								$compinfolist = array();
								$compinfolist['type'] = 'seids';
								$compinfolist['startid'] = $startid;
								$compinfolist['endid'] = $endid;
								$compinfolist['listurl'] = $compinfolisturl;
								$compinfolist['idsurl'] = "?file=collectbatch&type=seids&action=collect&moduleid=".$moduleid."&auth=".$auth."&siteid=".urlencode($siteid)."&endid=".urlencode($endid);
								file_put_contents($compinfolistcache,"<?php\n\r".'$compinfolist='.var_export($compinfolist, TRUE)."\n\r?>");//写入缓存  
						}
						$idsarykey = $startid;	//获取当前KEY
						if ( $endid < $startid )
						{
								msg('全部信息采集完成',$this_forward,3);
								exit( );
						}
						if(in_array($startid,$ruleCollectArr))
						{
								echo "&nbsp;&nbsp;网址 ".str_replace( "<{infoid}>", $aid, $myCollect['urlinfo'] )." 已采集过，自动跳过<br /><hr />";
								print str_repeat(" ", 4096);
								ob_flush( );
								flush( );
						}
						else
						{
								$collectresult = false;		//采集成功标识
								$collectrepeat = false;		//采集重复标识
								$aid = $startid;
								echo sprintf( "&nbsp;&nbsp;正在检查序号为 %s 的信息", $startid )."<br />";
								print str_repeat(" ", 4096);
								ob_flush( );
								flush( );
								if($myCollect['apiname'] != '')
								{
										include( AJ_ROOT."/admin/config/".$myCollect['apiname'].".php" );
								}
								elseif($myCollect['modid'] == 2)
								{
										include( AJ_ROOT."/admin/config/api_user.php" );
								}
								elseif($myCollect['modid'] == 10)
								{
										include( AJ_ROOT."/admin/config/api_know.php" );
								}
								else
								{
										include( AJ_ROOT."/admin/config/api.php" );
								}
								if( $collectresult || $collectrepeat )  $ruleCollectArr_temp[] = $startid;
						}
						my_writearr( "sitecollectarr_".$Collectsite[$siteid]['config'],$ruleCollectArr_temp );
						++$startid;
						$url = "?file=collectbatch&type=seids&action=collect&moduleid=".$moduleid."&auth=".$auth."&siteid=".urlencode($siteid)."&startid=".urlencode
($startid)."&endid=".urlencode($endid).'&thisidsarykey='.urlencode($startid);
						//echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$url.'"></HEAD><BODY></BODY></HTML>';
						$showinfo = sprintf("信息 %s 采集完成，继续采集下一条。<br /><br /><a href=\"%s\">%s</a>", $url, $url );
						msg($showinfo, $url, 1);
				}
				else
				{
						msg($errtext, $this_forward, 3);
				}
		}
		else
		{
				include tpl('collectbatch_seids');
		}
	break;
	case 'ids':
		if($action=='collect')
		{
				echo '<div class="tt">按序号列表批量采集</div><script type="text/javascript">Menuon(2);</script>';
				$errtext = "";
				if ( empty($batchids) && empty($thisidsarykey) )
				{
						$errtext .= "请输入要采集的信息序号列表<br />";
				}
				if ( empty( $errtext ) )
				{
						if($thisidsarykey!='' && !empty($compinfolist['idsary']))
						{
								//从缓存读取未采集的公司ID
								$idsary = array();
								$compinfocount = count($compinfolist['idsary']);
								for($i=$thisidsarykey;$i<$compinfocount;$i++)
								{
										$idsary[] = $compinfolist['idsary'][$i];
								}
						}
						elseif(!empty($batchids))
						{
								$idsary = explode( ",", $batchids );
						}
						else
						{
								$idsary = array();
						}
						if($compinfolisturl != '')
						{
								$compinfolist = array();
								$compinfolist['type'] = 'ids';
								$compinfolist['idsary'] = $idsary;
								$compinfolist['listurl'] = $compinfolisturl;
								$compinfolist['idsurl'] = "?file=collectbatch&type=ids&action=collect&moduleid=".$moduleid."&auth=".$auth."&siteid=".urlencode($siteid);
								file_put_contents($compinfolistcache,"<?php\n\r".'$compinfolist='.var_export($compinfolist, TRUE)."\n\r?>");//写入缓存  
						}
						if($myCollect['apiname'] != '')
						{
								$apifile = AJ_ROOT."/admin/config/".$myCollect['apiname'].".php";
						}
						elseif($myCollect['modid'] == 2)
						{
								$apifile = AJ_ROOT."/admin/config/api_user.php";
						}
						elseif($myCollect['modid'] == 10)
						{
								$apifile = AJ_ROOT."/admin/config/api_know.php";
						}
						else
						{
								$apifile = AJ_ROOT."/admin/config/api.php";
						}
						foreach ( $idsary as $idsarykey => $aid )
						{
								$aid = trim( $aid );
								$ruleCollectid = $aid;
								if(in_array($aid,$ruleCollectArr))
								{
										echo "&nbsp;&nbsp;网址 ".str_replace( "<{infoid}>", $aid, $myCollect['urlinfo'] )." 已采集过，自动跳过<br /><hr />";
										print str_repeat(" ", 4096);
										ob_flush( );
										flush( );
								}
								else
								{
										$collectresult = false;		//采集成功标识
										$collectrepeat = false;		//采集重复标识
										if ( !empty( $aid ) )
										{
												echo sprintf( "&nbsp;&nbsp;正在检查序号为 %s 的信息", $aid )."<br />";
												print str_repeat(" ", 4096);
												ob_flush( );
												flush( );
												include( $apifile );
										}
										if( $collectresult || $collectrepeat )  $ruleCollectArr_temp[] = $ruleCollectid;
								}
						}
						//如果是按公司列表页面采集，需跳转
						if($thisidsarykey!='' && $compinfolist['type']=='page' && $compinfolist['pageurl']!='' && $compinfolist['listurl']!='')
						{
								$compinfourl = $compinfolist['pageurl'].'&compinfolisturl='.urlencode($compinfolist['listurl']);
								//echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$compinfourl.'"></HEAD><BODY></BODY></HTML>';exit;
								$showinfo = "公司信息列表采集完成，继续采集公司信息";
								msg($showinfo, $compinfourl, 1);
						}
						my_writearr( "sitecollectarr_".$Collectsite[$siteid]['config'],$ruleCollectArr_temp );
						msg('全部信息采集完成', $this_forward, 3);
				}
				else
				{
						msg($errtext, $this_forward, 3);
				}
		}
		else
		{
				include tpl('collectbatch_ids');
		}
	break;
	default:
		if($action=='collect')
		{
			echo '<div class="tt">按页面批量采集</div><script type="text/javascript">Menuon(0);</script>';
			$collectname = intval( $collectname );
			if ( !isset( $myCollect['listcollect'][$collectname] ) )
			{
					msg('您选择批量采集规则不存在');
			}
			if ( empty( $collectpagenum ) || !is_numeric( $collectpagenum ) )
			{
					$collectpagenum = 1;
			}
			if ( empty( $startpageid ) )
			{
					$startpageid = trim( $myCollect['listcollect'][$collectname]['startpageid'] );
			}
			if ( empty( $startpageid ) )
			{
					$startpageid = 1;
			}
			if ( !empty( $maxpagenum ) || is_numeric( $maxpagenum ) )
			{
					$maxpagenum = intval( $maxpagenum );
			}
			else
			{
					$maxpagenum = intval( $myCollect['listcollect'][$collectname]['maxpagenum'] );
			}
			$url = str_replace( "<{pageid}>", $startpageid, $myCollect['listcollect'][$collectname]['urlpage'] );
			$url = str_replace( "<{compuserid}>", $compuserid, $url );
			$colary = array(
					"proxy_host" => $myCollect['proxy_host'],
					"proxy_port" => $myCollect['proxy_port']
			);
			if ( $myCollect['referer'] )
			{
					$colary['referer'] = $myCollect['siteurl'];
			}
			if ( !empty( $myCollect['pagecharset'] ) )
			{
					$colary['charset'] = $myCollect['pagecharset'];
			}
			$source = my_urlcontents( $url, $colary );
			if ( empty( $source ) )
			{
					msg('目标网址或规则错误，没有采集到内容');
			}
			$pregstr = my_collectstoe( $myCollect['listcollect'][$collectname]['listarea'] );
			if ( !empty( $pregstr ) )
			{
					$matchvar = my_cmatchone( $pregstr, $source );
			}
			if ( !empty( $matchvar ) )
			{
					$source = $matchvar;
			}
			$pregstr = $matchvar = '';
			$pregstr = my_collectstoe( $myCollect['listcollect'][$collectname]['infoid'] );
			if ( !empty( $pregstr ) )
			{
					$matchvar = my_cmatchall( $pregstr, $source );
			}
			if ( !empty( $matchvar ) && is_array( $matchvar ) )
			{
					$aidsary = $matchvar;
			}
			else
			{
					msg('信息序号规则错误，没有采集到信息序号');
			}
			$nextpageid = "";
			if ( $myCollect['listcollect'][$collectname]['nextpageid'] == "++" )
			{
					$nextpageid = intval( $startpageid ) + 1;
			}
			else
			{
					$pregstr = my_collectstoe( $myCollect['listcollect'][$collectname]['nextpageid'] );
					if ( !empty( $pregstr ) )
					{
							$matchvar = my_cmatchone( $pregstr, $source );
					}
					if ( !empty( $matchvar ) )
					{
							$nextpageid = trim( my_textstr( $matchvar ) );
					}
			}
			if($compinfolisturl != '')
			{
					$compinfolist = array();
					$compinfolist['type'] = 'page';
					$compinfolist['idsary'] = $aidsary;
					$compinfolist['listurl'] = $compinfolisturl;
					$compinfolist['idsurl'] = "?file=collectbatch&type=ids&action=collect&moduleid=".$moduleid."&auth=".$auth."&siteid=".urlencode($siteid);
					$compinfolist['pageurl'] = "?file=collectbatch&action=collect&siteid=".$siteid."&collectname=".$collectname."&startpageid=".urlencode( $nextpageid 
)."&maxpagenum=".$maxpagenum."&moduleid=".$moduleid."&auth=".$auth."&collectpagenum=".( $collectpagenum + 1 );
					file_put_contents($compinfolistcache,"<?php\n\r".'$compinfolist='.var_export($compinfolist, TRUE)."\n\r?>");//写入缓存  
			}
			$aid = 0;
			echo "                                                                                                                                                                                                                                                                ";
			echo sprintf( "&nbsp;&nbsp;正在采集 %s - %s 第 %s 页<br />&nbsp;&nbsp;本页拥有信息共 %s 条<br />", $myCollect['sitename'], $myCollect['listcollect'][$collectname]['title'], $collectpagenum, count( $aidsary ) );
			print str_repeat(" ", 4096);
			ob_flush( );
			flush( );
			$cpoint = 1;
			$memberpage_default_catid = $memberpage_default_areaid = $page_default_catid = $page_default_areaid = 0;
			if($myCollect['modid'] == 2)
			{
					$memberpage_default_catid = $myCollect['listcollect'][$collectname]['catid'];
					$memberpage_default_areaid = $myCollect['listcollect'][$collectname]['areaid'];
			}
			else
			{
					$page_default_catid = $myCollect['listcollect'][$collectname]['catid'];
					$page_default_areaid = $myCollect['listcollect'][$collectname]['areaid'];
			}
			if($myCollect['apiname'] != '')
			{
					$apifile = AJ_ROOT."/admin/config/".$myCollect['apiname'].".php";
			}
			elseif($myCollect['modid'] == 2)
			{
					$apifile = AJ_ROOT."/admin/config/api_user.php";
			}
			elseif($myCollect['modid'] == 10)
			{
					$apifile = AJ_ROOT."/admin/config/api_know.php";
			}
			else
			{
					$apifile = AJ_ROOT."/admin/config/api.php";
			}
			foreach ( $aidsary as $idsarykey => $v )
			{
					$aid = trim( $v );
					$ruleCollectid = $aid;
					if(in_array($aid,$ruleCollectArr))
					{
							echo "&nbsp;&nbsp;网址 ".str_replace( "<{infoid}>", $aid, $myCollect['urlinfo'] )." 已采集过，自动跳过<br /><hr />";
							print str_repeat(" ", 4096);
							ob_flush( );
							flush( );
					}
					else
					{
							$collectresult = false;		//采集成功标识
							$collectrepeat = false;		//采集重复标识
							if ( !empty( $aid ) )
							{
									echo sprintf( "&nbsp;&nbsp;%s. 正在检查序号为 %s 的信息<br />", $cpoint, $aid );
									print str_repeat(" ", 4096);
									ob_flush( );
									flush( );
									++$cpoint;
									include( $apifile );
							}
							if( $collectresult || $collectrepeat )  $ruleCollectArr_temp[] = $ruleCollectid;
					}
			}
			my_writearr( "sitecollectarr_".$Collectsite[$siteid]['config'],$ruleCollectArr_temp );
			if ( $nextpageid == "" || $maxpagenum <= $collectpagenum )
			{
					//公司信息列表采集完毕，返回公司ID采集
					if($thisidsarykey!='' && $compinfolist['idsurl']!='')
					{
							$thisidsarykey = intval($thisidsarykey) + 1;
							if($compinfolist['type'] == 'seids')
							{
									if( $thisidsarykey<=$compinfolist['endid'] ) 
									{
											$compinfourl = $compinfolist['idsurl'].'&startid='.$thisidsarykey.'&thisidsarykey='.$thisidsarykey;
											//echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$compinfourl.'"></HEAD><BODY></BODY></HTML>';exit;
											$showinfo = "公司信息列表采集完成，继续采集公司信息";
											msg($showinfo, $compinfourl, 1);
									}
							}
							elseif($compinfolist['type'] != '')
							{
									if( !empty($compinfolist['idsary'][$thisidsarykey]) )
									{
											$compinfourl = $compinfolist['idsurl'].'&thisidsarykey='.$thisidsarykey;
											//echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$compinfourl.'"></HEAD><BODY></BODY></HTML>';exit;
											$showinfo = "公司信息列表采集完成，继续采集公司信息";
											msg($showinfo, $compinfourl, 1);
									}
							}
							if($compinfolist['pageurl']!='' && $compinfolist['listurl']!='')
							{
									$compinfourl = $compinfolist['pageurl'].'&compinfolisturl='.urlencode($compinfolist['listurl']);
									//echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$compinfourl.'"></HEAD><BODY></BODY></HTML>';exit;
									$showinfo = "本页公司信息采集完成，继续采集下一页公司信息";
									msg($showinfo, $compinfourl, 1);
							}
					}
					msg('批量采集完成',$this_forward,3);
					exit( );
			}
			$url = "?file=collectbatch&action=collect&siteid=".$siteid."&collectname=".$collectname."&startpageid=".urlencode( $nextpageid 
)."&maxpagenum=".$maxpagenum."&moduleid=".$moduleid."&auth=".$auth."&collectpagenum=".( $collectpagenum + 1 ).'&compuserid='.$compuserid.'&resuser='.$resuser;
			//echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$url.'"></HEAD><BODY></BODY></HTML>';
			$showinfo = sprintf("本页采集完成，继续采集下一页的信息。<br /><br />本页是第 %s 页，本次最多采集 %s 页", $collectpagenum, $maxpagenum );
			msg($showinfo, $url, 2);
		}
		else
		{
			include tpl('collectbatch');
		}
	break;
}
?>