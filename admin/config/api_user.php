<?php


      
if ( !defined( "AJ_ROOT" ) || $myCollect['modid'] != 2 )
{
		exit;
}
@ini_set('max_execution_time', 2000);	
$CATEGORY = cache_read('category-'.$myCollect['modid'].'.php');

$aid = my_textstr( $aid );
$urluser = str_replace( "<{infoid}>", $aid, $myCollect['urlinfo'] );
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


$source = my_urlcontents( $urluser, $colary );
if ( empty( $source ) )
{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;".date("H:i:s")." - ";
		echo sprintf( "读取对方内容页面失败，可能是对方无法访问或者本服务器禁止远程读取网页！<br />&nbsp;&nbsp;&nbsp;&nbsp;URL: <a href=\"%s\" target=\"_blank\">%s</a>", $urluser, $urluser );
}	
else
{
		$pregstr = $matchvar = '';
		$pregstr = my_collectstoe($myCollect['rule']['truename']);
		$matchvar = my_cmatchone( $pregstr, $source );
		if ( !empty( $matchvar ) )
		{
				$table = $AJ_PRE.$membermodule;
				$table_data = $AJ_PRE.$membermodule.'_data';
				$userrepeat = 0;
				$condition = "truename='".trim($matchvar)."'";
				$userrepeat = $db->count($table,$condition);
				if($userrepeat>0)
				{
						$collectrepeat = true;
						echo "&nbsp;&nbsp;用户名已存在";
				}
				else
				{
						$info = array( );
						$userdo = new $membermodule($myCollect['modid']);
						$fieldsarr = array('username','groupid','company','type','catid','catids','areaid','mode','capital','regunit','size','regyear','sell','buy','business','telephone','fax','mail','address','postcode','homepage','introduce','thumb','keyword','linkurl','passport', 'password','cpassword','payword','email','gender','truename','mobile','msn','qq','ali','skype','department','career','regid','edittime','inviter','content');


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
												else
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


						//替换操作
						foreach($myCollect['replacelist'] as $k => $v) 
						{
								if( !empty($info[$k]) && !empty($v) )
								{
										//$v = my_echorule( $v, 'backslash' );
										$info[$k] = my_replace($v,$info[$k]);
								}
						}


						//分类处理
						$findcat = false;
						if( empty($info['catid']) && $compcatname!='' ) $info['catid'] = $compcatname;
						if( !empty($info['catid']) )
						{
								foreach($CATEGORY as $k=>$v) {
										if($info['catid']==$v['catname'])
										{
												$info['catid'] = $v['catid'];
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
								$rsmessagearr = getrobotmessage($info['content'], $urluser);
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


						//继承调用接口的联系方式
						foreach($personarr as $v) 
						{
								if( empty($info[$v]) && !empty($personinfo[$v]) )	$info[$v] = $personinfo[$v];
						}


						//默认值设置
						if($memberpage_default_catid>0) $myCollect['defaultvalue']['catid'] = $memberpage_default_catid;
						if($memberpage_default_areaid>0) $myCollect['defaultvalue']['areaid'] = $memberpage_default_areaid;
						foreach($myCollect['defaultvalue'] as $k => $v) 
						{
								if( empty($info[$k]) && !empty($v) )
								{
										$v = my_echorule( $v, 'backslash' );
										$info[$k] = $v;
								}
						}
                        $info['username'] = c($info['username']);
						 
						if(empty($info['passport'])) $info['passport'] = c($info['username']);
						if(empty($info['email'])) $info['email'] = c($info['username']).'@qq.com';
						if(empty($info['content'])) $info['content'] = $info['introduce'];
						if(empty($info['introduce'])) $info['introduce'] = $info['content'];
						if(empty($info['payword'])) $info['payword'] = $info['password'];
						if(empty($info['cpassword'])) $info['cpassword'] = $info['password'];

						//打印测试数据
						if(!empty($collecttest))
						{
								echo '&nbsp;&nbsp;<textarea style="width:90%;" rows="40">'.my_arr2textarea( $info ).'</textarea>';exit;
						}

						//数据入库
						$post = array();
						if($info) {
								$post = $info;unset($post['tag']);
								$post['thumb']=$post['touxiang'];
								if($post['thumb']!='')	$post['thumb'] = my_savethumb($post['thumb'],$urluser);
								if($myCollect['spider_mode']!=2) {
										if(isset($post['username'])) $_username = $post['username'];
										//提取自定义字段
										$post_fields = array();
										if($MFD || $CFD)
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
												if($MFD) fields_check($post_fields, $MFD);
												if($CFD) fields_check($post_fields, $CFD);
										}
								}
								if($myCollect['spider_mode']==2) {
										$rcduser = array();
										$rcduser['title'] = $post['company'];
										$rcduser['robotid'] = (isset($sitecollectarrfile)) ? $sitecollectarrfile : $siteid;
										$rcduser['listid'] = (isset($sitecollectarrfile) || !isset($collectname)) ? '-' : $collectname;
										$rcduser['listname'] = (isset($sitecollectarrfile) || !isset($collectname)) ? '-' : $myCollect['listcollect'][$collectname]['title'];
										$rcduser['ispub'] = 0;
										$txtdbuser = 'module_'.$myCollect['modid'];
										$artuser = new myArt($txtdbuser);
    									$resuser = $artuser->newArt($post,$rcduser);
										if ($resuser) {
												$collectresult = true;
												echo '&nbsp;&nbsp;<font color="green">会员离线采集成功</font>';
										}
										else echo '&nbsp;&nbsp;会员离线采集失败';
								} elseif($myCollect['spider_mode']==1) {
										//密码加密
										$post['password'] = md5(md5($post['password']));
										$post['payword'] = md5(md5($post['payword']));
										get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
										$table_member = $AJ_PRE.'member';
										$table_company = $AJ_PRE.'company';
										$table_company_data = $AJ_PRE.'company_data';
										$mfs = cache_read($table_member.'.php');
										if(!$mfs) {
												$mfs = array();
												$result = $db->query("SHOW COLUMNS FROM `$table_member`");
												while($r = $db->fetch_array($result)) {
														$mfs[] = $r['Field'];
												}
												cache_write($table_member.'.php', $mfs);
										}
										$cfs = cache_read($table_company.'.php');
										if(!$cfs) {
												$cfs = array();
												$result = $db->query("SHOW COLUMNS FROM `$table_company`");
												while($r = $db->fetch_array($result)) {
														$cfs[] = $r['Field'];
												}
												cache_write($table_company.'.php', $cfs);
										}
										$sqlk = $sqlv = '';
										foreach($post as $k=>$v) {
												if(!in_array($k, $mfs)) continue;
												$sqlk .= ','.$k; $sqlv .= ",'$v'";
										}
										if(!$sqlk) {
												echo('&nbsp;&nbsp;无效数据');
										} else {
												$sqlk = substr($sqlk, 1);
												$sqlv = substr($sqlv, 1);
												$db->query("INSERT INTO {$table_member} ($sqlk) VALUES ($sqlv)");
												$userid = $db->insert_id();
												$post['userid'] = $userid;
												$sqlk = $sqlv = '';
												isset($post['addtime']) or $post['addtime'] = $AJ_TIME;
												$post['adddate'] = date("Y-m-d", $post['addtime']);
												isset($post['edittime']) or $post['edittime'] = $AJ_TIME;
												$post['editdate'] = date("Y-m-d", $post['edittime']);
												foreach($post as $k=>$v) {
														if(!in_array($k, $cfs)) continue;
														$sqlk .= ','.$k; $sqlv .= ",'$v'";
												}
												$sqlk = substr($sqlk, 1);
												$sqlv = substr($sqlv, 1);
												$db->query("INSERT INTO {$table_company} ($sqlk) VALUES ($sqlv)");
												$content = $post['content'];
												$content_table = content_table(4, $userid, is_file(AJ_CACHE.'/4.part'), $table_company_data);
												$db->query("INSERT INTO {$content_table} (userid,content)  VALUES ('$userid', '$content')");
												if($MFD) fields_update($post_fields, $table_member, $userid, 'userid', $MFD);
												if($CFD) fields_update($post_fields, $table_company, $userid, 'userid', $CFD);
												$collectresult = true;
												echo('&nbsp;&nbsp;<font color="green">会员采集入库成功</font>');
										}
								} else {
										foreach($userdo->fields as $v) {
												isset($post[$v]) or $post[$v] = '';
										}
										if(isset($post['islink'])) unset($post['islink']);
										if($myCollect['spider_status']) $post['status'] = $myCollect['spider_status'];
										get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
										$post['save_remotepic'] = $MOD['save_remotepic'];
										if($userdo->add($post)) {
												if($MFD) fields_update($post_fields, $userdo->tb_member, $userdo->userid, 'userid', $MFD);
												if($CFD) fields_update($post_fields, $userdo->tb_company, $userdo->userid, 'userid', $CFD);
												$collectresult = true;
												echo('&nbsp;&nbsp;<font color="green">会员采集入库成功</font>');
										} else {
												if($myCollect['spider_errlog']) file_put_contents('admin/config/spider/'.date('Ymd-His-').mt_rand(10, 99).'.txt', $userdo->errmsg);
												echo("&nbsp;&nbsp;".$userdo->errmsg);
										}
								}
						} else {
								echo('&nbsp;&nbsp;未接收到数据');
						}
				}
		}
		else
		{
				echo "&nbsp;&nbsp;&nbsp;&nbsp;".date("H:i:s")." - ";
				echo sprintf( "用户名匹配失败，可能是对方网页格式变动导致采集规则错误！<br />&nbsp;&nbsp;&nbsp;&nbsp;URL：<a href=\"%s\" target=\"_blank\">%s</a><br />", $urluser, $urluser );
		}
}
echo "<hr />";
print str_repeat(" ", 4096);
ob_flush( );
flush( );
if($compinfolist['listurl']!='') {
		$ruleCollectArr[] = $ruleCollectid;
		my_writearr( "sitecollectarr_".$Collectsite[$siteid]['config'],$ruleCollectArr );
		echo('<BR>&nbsp;&nbsp;开始公司信息列表采集：');
		print str_repeat(" ", 4096);
		ob_flush( );
		flush( );
		$compinfolisturl = $compinfolist['listurl'].'&compuserid='.$aid.'&thisidsarykey='.$idsarykey.'&resuser='.$resuser;
		echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$compinfolisturl.'"></HEAD><BODY></BODY></HTML>';exit;
}
?>
