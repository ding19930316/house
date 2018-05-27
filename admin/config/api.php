<?php
if ( !defined( "AJ_ROOT" ) )
{
		exit;
}
@ini_set('max_execution_time', 2000);	
include( AJ_ROOT."/admin/config/site_".$Collectsite[$siteid]['config'].".php" );
$CATEGORY = cache_read('category-'.$myCollect['modid'].'.php');

$aid = my_textstr( $aid );
$url = str_replace( "<{infoid}>", $aid, $myCollect['urlinfo'] );
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
$source = '';
$source = my_urlcontents( $url, $colary );
if ( empty( $source ) )
{
		echo "&nbsp;&nbsp;".date("H:i:s")." - ";
		echo sprintf( "读取对方内容页面失败，可能是对方无法访问或者本服务器禁止远程读取网页！<br />&nbsp;&nbsp;URL: <a href=\"%s\" target=\"_blank\">%s</a>", $url, $url );
}	
else
{
		$pregstr = $matchvar = '';
		$pregstr = my_collectstoe( $myCollect['rule']['title'] );
		$matchvar = my_cmatchone( $pregstr, $source );
		if ( !empty( $matchvar ) )
		{
				if(in_array($module, array('article', 'info', 'newhouse', 'sale', 'rent', 'video', 'photo'))) {
						$table = $AJ_PRE.$module.'_'.$myCollect['modid'];
						$table_data = $AJ_PRE.$module.'_data_'.$myCollect['modid'];
						$table_search = $AJ_PRE.$module.'_search_'.$myCollect['modid'];
				} else {
						$table = $AJ_PRE.$module;
						$table_data = $AJ_PRE.$module.'_data';
						$table_search = $AJ_PRE.$module.'_search';
				}
				$titlerepeat = 0;
				if($myCollect['titlerepeat'])
				{
						$condition = "title='".trim($matchvar)."'";
						$titlerepeat = $db->count($table,$condition);
				}
				if($titlerepeat>0)
				{
						$collectrepeat = true;
						echo "&nbsp;&nbsp;标题重复";
				}
				else
				{
						$info = array( );
						$do = new $module($myCollect['modid']);


						//采集规则匹配
						foreach($myCollect['rule'] as $k => $v) 
						{
								$pregstr = $matchvar = '';

								if(!empty($v)) $pregstr = my_collectstoe( $v );
								if ( !empty($pregstr) )
								{
										$matchvar = my_cmatchone( $pregstr, $source );
										if ( !empty($matchvar) )
										{
												$info[$k] = trim( $matchvar );
										}
								}
						}


						//多页采集
						foreach($myCollect['pagerule'] as $val) 
						{
								if(is_array($val) && count($val) > 1)
								{
										foreach($val as $k => $v) 
										{
												$pregstr = $matchvar = '';
												if($k == 'pageurl')	
												{
														$pagekey = $pageurl = $pagesource = '';
														$pageurl = str_replace( '<{infoid}>', $aid, $v );
														$pagekey = my_cmatchone( "/<\{(.*)\}>/isU", $pageurl );
														$pageurl = str_replace( '<{'.$pagekey.'}>', $info[$pagekey], $pageurl );
														$pagesource = my_urlcontents( $pageurl, $colary );
												}
												elseif(!empty($pagesource))
												{
														if(!empty( $v )) $pregstr = my_collectstoe( $v );
														if ( !empty($pregstr) )
														{
																$matchvar = my_cmatchone( $pregstr, $pagesource );
																if ( !empty($matchvar) )
																{
																		$info[$k] = trim( $matchvar );
																}
														}
												}
										}
								}
						}


						//内容分页采集
						$contpagemode = isset($myCollect['contpagemode']) ? intval($myCollect['contpagemode']) : 0;
						$pagecontent = $cont_pagerule = '';
						if(!empty( $myCollect['rule']['content'] )) $cont_pagerule = my_collectstoe( $myCollect['rule']['content'] );
						if($contpagemode==1 && !empty($cont_pagerule) && !empty($myCollect['contpage']['cont_listurl']))
						{
								$pregstr = $matchvar = '';
								$pregstr = my_collectstoe( $myCollect['contpage']['cont_listarea'] );
								if ( !empty( $pregstr ) )
								{
										$matchvar = my_cmatchone( $pregstr, $source );
								}
								if ( !empty( $matchvar ) )
								{
										$source = $matchvar;
								}
								$pregstr = my_collectstoe( $myCollect['contpage']['cont_listurl'] );
								if ( !empty( $pregstr ) )
								{
										$matchvar = my_cmatchall( $pregstr, $source );
								}
								if ( !empty( $matchvar ) && is_array( $matchvar ) )
								{
										$cont_pageurlarr = $matchvar;		
										foreach($cont_pageurlarr as $val) 
										{
												$cont_pagesource = $cont_pageurl = $pregstr = $matchvar = '';
												$cont_pageurl = my_prefixurl($val,$url);
												$cont_pagesource = my_urlcontents( $cont_pageurl, $colary );
												if(!empty($cont_pagesource))
												{
														$matchvar = my_cmatchone( $cont_pagerule, $cont_pagesource );
														if ( !empty($matchvar) )
														{
																$pagecontent .= '[pagebreak]'.trim( $matchvar );
														}
												}
										}
								}
						}
						elseif($contpagemode==2 && !empty($cont_pagerule) && !empty($myCollect['contpage']['cont_nextpage']))
						{
								$nextpageid = true;
								$cont_pagesource = $source;
								$k = 0;
								//循环采集文章,最多循环10次
								while ($nextpageid && $k<=10) {
										$cont_pagesource = $pregstr = $matchvar = '';
										if($k>0)
										{
												$cont_pagesource = my_urlcontents( $cont_pageurl, $colary );
												if(!empty($cont_pagesource))
												{
														$matchvar = my_cmatchone( $cont_pagerule, $cont_pagesource );
														if ( !empty($matchvar) )
														{
																$pagecontent .= '[pagebreak]'.trim( $matchvar );
														}
												}
												else
												{
														break;
												}
										}
										$cont_pageurl = $pregstr = $matchvar = '';
										$pregstr = my_collectstoe( $myCollect['contpage']['cont_listarea'] );
										if ( !empty( $pregstr ) )
										{
												$matchvar = my_cmatchone( $pregstr, $cont_pagesource );
										}
										if ( !empty( $matchvar ) )
										{
												$cont_pagesource = $matchvar;
										}
										$pregstr = $matchvar = '';
										$pregstr = my_collectstoe( $myCollect['contpage']['cont_nextpage'] );
										if ( !empty( $pregstr ) )
										{
												$matchvar = my_cmatchone( $pregstr, $cont_pagesource );
										}
										if ( !empty( $matchvar ) )
										{
												$cont_pageurl = my_prefixurl($matchvar,$url);
										}
										if ( empty( $cont_pageurl ) )
										{
												$nextpageid = false;
										}
										$k++;	
								}
						}
						if( !empty($info['content']) )	$info['content'] .= $pagecontent;


						//替换操作
						foreach($myCollect['replacelist'] as $k => $v) 
						{
								if( !empty($info[$k]) && !empty($v) )
								{
										$v = my_echorule( $v, 'replace' );
										$info[$k] = my_replace($v,$info[$k]);
								}
						}
						//exit($info['content']);


						//分类处理
						$findcat = false;
						$compcatname = '';
						if( !empty($info['catid']) )
						{
								foreach($CATEGORY as $k=>$v) {
										if($info['catid']==$v['catname'])
										{
												$info['catid'] = $v['catid'];
												$compcatname = $v['catname'];
												$findcat = true;
												break;
										}
								}

						}
						if(!$findcat)	$info['catid'] = '';


						//地区处理
						$findarea = false;
						if( !empty($info['areaid']) )
						{
								foreach($AREA as $k=>$v) {
										if($info['areaid']==$v['areaname'] || $info['areaid'].'市'==$v['areaname'])
										{
												$info['areaid'] = $v['areaid'];
												$findarea = true;
												break;
										}
								}

						}
						if(!$findarea)	$info['areaid'] = '';


						//详细内容格式化
						if( !empty($info['content']) && $myCollect['formatcontent'] )
						{
								$rsmessagearr = getrobotmessage($info['content'], $url);
								$info['content'] = $rsmessagearr['leachmessage'];
						}
						else
						{
								//图片链接补充完整
								preg_match_all("/<img.+src=('|\"|)?(.*)(\\1)([\s].*)?>/ismUe", $info['content'], $picurlarr);
								if(!empty($picurlarr[2])) $info['picarr'] = sarray_unique($picurlarr[2]);
								foreach ($info['picarr'] as $pickey => $picurl) {
										if(!empty($picurl)) {
												$info['content'] = str_replace($picurl, my_prefixurl($picurl,$url), $info['content']);
										}
								}
						}


						//默认值设置
						if($page_default_catid>0) $myCollect['defaultvalue']['catid'] = $page_default_catid;	//优先使用列表规则默认值
						if($page_default_areaid>0) $myCollect['defaultvalue']['areaid'] = $page_default_areaid;
						foreach($myCollect['defaultvalue'] as $k => $v) 
						{
								if( empty($info[$k]) && !empty($v) )
								{
										$v = my_echorule( $v, 'backslash' );
										$info[$k] = $v;
								}
						}

						//会员UID为空时使用username
						if(empty($info['uid'])) $info['uid'] = c($info['username']);
                         $info['username'] = c($info['username']);
						//打印测试数据
						if(!empty($collecttest))
						{
								echo '&nbsp;&nbsp;<textarea style="width:90%;" rows="40">'.my_arr2textarea( $info ).'</textarea>';exit;
						}


						//数据入库
						$post = array();
						if($info) {
								$post = $info;
								
								
								//$post['houseid'] = addBoroughcj($borough_id);
								if($post['thumb']!='')	$post['thumb'] = my_savethumb($post['thumb'],$url);
								if($post['thumb1']!='')	$post['thumb1'] = my_savethumb($post['thumb1'],$url);
								if($post['thumb2']!='')	$post['thumb2'] = my_savethumb($post['thumb2'],$url);
								if($myCollect['spider_mode']!=2) {
										if(isset($post['username'])) $_username = $post['username'];
										//提取自定义字段
										$post_fields = array();
										if($IFD)
										{
												foreach($post as $k => $v) 
												{
														if( stripos($k,"custom-") !== false )
														{
																$ck = str_replace("custom-","",$k);
																$post_fields[$ck] = $v;
																unset($post[$k]);
														}
												}
												isset($post_fields) or $post_fields = array();
												fields_check($post_fields, $IFD);
										}
								}
								if($myCollect['spider_mode']==2) {
										$rcd = array();
										$rcd['title'] = $post['title'];
										$rcd['robotid'] = $siteid;
										$rcd['listid'] = (isset($collectname)) ? $collectname : '-';
										$rcd['listname'] = (isset($collectname)) ? $myCollect['listcollect'][$collectname]['title'] : '-';
										$rcd['ispub'] = 0;
										$txtdb = 'module_'.$myCollect['modid'];
										$art = new myArt($txtdb);
    									$res = $art->newArt($post,$rcd);
										if(!empty($res)) {
												$collectresult = true;
												echo '&nbsp;&nbsp;<font color="green">离线采集成功</font>';
										} else {
												echo '&nbsp;&nbsp;离线采集失败';
										}
								} elseif($myCollect['spider_mode']==1) {
										get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
										$fs = cache_read($table.'.php');
										if(!$fs) {
												$fs = array();
												$result = $db->query("SHOW COLUMNS FROM `$table`");
												while($r = $db->fetch_array($result)) {
														$fs[] = $r['Field'];
												}
												cache_write($table.'.php', $fs);
										}
										$sqlk = $sqlv = '';
										foreach($post as $k=>$v) {
												if(!in_array($k, $fs)) continue;
												$sqlk .= ','.$k; $sqlv .= ",'$v'";
										}
										if(!$sqlk) {
												echo('&nbsp;&nbsp;无效数据');
										} else {
												$sqlk = substr($sqlk, 1);
												$sqlv = substr($sqlv, 1);
												$db->query("INSERT INTO {$table} ($sqlk) VALUES ($sqlv)");
												$itemid = $db->insert_id();
												$content = $post['content'];
												$housename=$post['housename'];
												$db->query("INSERT INTO {$table_data} (itemid,content)  VALUES ('$itemid', '$content')");
											
												if($IFD) fields_update($post_fields, $table, $itemid, 'itemid', $IFD);
												$collectresult = true;
												echo('&nbsp;&nbsp;<font color="green">信息发布成功</font>');
										}
								} else {
										foreach($do->fields as $v) {
												isset($post[$v]) or $post[$v] = '';
										}
										if(isset($post['islink'])) unset($post['islink']);
										if($myCollect['spider_status']) $post['status'] = $myCollect['spider_status'];
										get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
										$post['save_remotepic'] = $MOD['save_remotepic'];
										
										if($do->pass($post)) {
										if($myCollect['modid'] == 5|| $myCollect['modid'] == 7 )
										        {$do->addcaiji($post);}else{
												$do->add($post);}
												
												
												//$housename=$post['housename'];
												// $letter = GetPinyin($post['housename'],1);
												 
												//$db->query("INSERT INTO aijiacms_newhouse (title,letter)    VALUES ('$housename','$letter')");
												if($IFD) fields_update($post_fields, $table, $do->itemid, 'itemid', $IFD);
												$collectresult = true;
												echo('&nbsp;&nbsp;<font color="green">信息发布成功</font>');
										} else {
												if($myCollect['spider_errlog']) file_put_contents('admin/config/spider/'.date('Ymd-His-').mt_rand(10, 99).'.txt', $do->errmsg);
												echo("&nbsp;&nbsp;".$do->errmsg);
										}
								}
						} else {
								echo('&nbsp;&nbsp;未接收到数据');
						}
				}
		}
		else
		{
				echo "&nbsp;&nbsp;".date("H:i:s")." - ";
				echo sprintf( "信息标题匹配失败，可能是对方网页格式变动导致采集规则错误！<br />&nbsp;&nbsp;URL：<a href=\"%s\" target=\"_blank\">%s</a><br />", $url, $url );
		}
}
print str_repeat(" ", 4096);
ob_flush( );
flush( );
if($collectresult && $myCollect['collectuser'] && $myCollect['urluser']!='' && $post['uid']!='' && $thisidsarykey=='') {
		echo('<BR>&nbsp;&nbsp;采集会员信息：');
		print str_repeat(" ", 4096);
		ob_flush( );
		flush( );
		$aid = $post['uid'];
		$personinfo = array();
		$personarr = array('username','company','catid','areaid','telephone','fax','mail','address','postcode','truename','msn','qq','ali','skype','mobile');
		foreach($personarr as $v) 
		{
				$personinfo[$v] = $post[$v];
		}
		$personinfo['mail'] = $post['email'];
		$sitecollectarrfile = $myCollect['urluser'];
		include 'site_'.$myCollect['urluser'].'.php';
		if($myCollect['apiname'] != '')
		{
				include( $myCollect['apiname'].".php" );
		}
		else
		{
				include( "api_user.php" );
		}
		if ( file_exists( AJ_ROOT."/admin/config/cache/sitecollectarr_".$sitecollectarrfile.".php" ) )
		{
				include( AJ_ROOT."/admin/config/cache/sitecollectarr_".$sitecollectarrfile.".php" );
		}
		else
		{
				$ruleCollectArr = array();
		}
		$ruleCollectArr[] = $aid;
		my_writearr( "sitecollectarr_".$sitecollectarrfile,$ruleCollectArr );
		$sitecollectarrfile = '';
}
else
{
		echo "<hr />";
}
//关联离线采集信息和作者
if(!empty($res) && !empty($resuser))
{
		$rcd = array();
		$art = new myArt($txtdb);
		$rcd = $art->getHead($res);
		if($rcd['id'])
		{
				$rcd['huid'] = $resuser;
				$art->update_Head($res,$rcd);
		}
		$res = 0;
}

?>
