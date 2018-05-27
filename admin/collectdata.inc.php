<?php
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT."/admin/config/collectsite.php";
include AJ_ROOT."/admin/config/myart.php";
if(empty($modid)) $modid = 6;
function get_modules() {
	$moduledirs = glob(AJ_ROOT.'/module/*');
	$sysmodules = array();
	foreach($moduledirs as $k=>$v) {
		if(is_file($v.'/admin/config.inc.php')) {
			include $v.'/admin/config.inc.php';
			$sysmodules[$MCFG['module']] = $MCFG;
		}
	}
	return $sysmodules;
}
$sysmodules = get_modules();
$modules = $_modules = array();
$result = $db->query("SELECT * FROM {$AJ_PRE}module ORDER BY listorder ASC,moduleid DESC");
while($r = $db->fetch_array($result)) {
		if($r['moduleid'] < 5 && $r['moduleid'] != 2) continue;
		$r['installdate'] = timetodate($r['installtime'], 3);
		$r['modulename'] = isset($sysmodules[$r['module']]) ? $sysmodules[$r['module']]['name'] : '外链';
		if($r['disabled']) {
				$_modules[] = $r;
		} else {
				$modules[] = $r;
		}
}
$menus = array();
$m = $n = 0;
foreach($modules as $k => $v)
{
		$menus[] = array($v['modulename'],'?file='.$file.'&modid='.$v['moduleid']);
		if($v['moduleid']==$modid) $m = $n;
		$n++;
}
$menus[] = array('EXCEL导入','?file='.$file.'&action=excel');
if($action=='excel' || $action=='excelimport') $m = $n;
$this_forward = '?file='.$file;

switch($action) {
	case 'excel':
			include tpl('collectdata_excel');
	break;
	case 'excelimport':
			require_once AJ_ROOT.'/module/'.$module.'/'.$module.'.class.php';
			require AJ_ROOT.'/include/module.func.php';
			//数据表设置
			if(in_array($module, array('article', 'info'))) {
					$table = $AJ_PRE.$module.'_'.$moduleid;
					$table_data = $AJ_PRE.$module.'_data_'.$moduleid;
			} else {
					$table = $AJ_PRE.$module;
					$table_data = $AJ_PRE.$module.'_data';
			}
			//读取自定义字段设置
			$IFD = cache_read('fields-'.substr($table, strlen($AJ_PRE)).'.php');
			$MFD = cache_read('fields-member.php');
			$CFD = cache_read('fields-company.php');
			if($IFD || $MFD || $CFD) require AJ_ROOT.'/include/fields.func.php';

			/**
			* $_FILES数组说明
			* array(n) {
			*   ["表单文件框名称"] => array(5) {
			*       ["name"]        => 提交文件名称
			*       ["type"]        => 提交文件类型 Excel为"application/vnd.ms-excel"
			*       ["tmp_name"]    => 临时文件名称
			*       ["error"]       => 错误(0成功1文件太大超过upload_max_filesize2文件太大超过MAX_FILE3上传不完整4没有上传文件)
			*       ["size"]        => 文件大小(单位:KB)
			*   }
			* }
			*/
			$return=array(0,'');
			/**
			* 判断是否提交
			* is_uploaded_file(文件名称)用于确定指定的文件是否使用POST方法上传,防止非法提交,通常和move_upload_file一起使用保存上传文件到指定的路径
			*/
			if(!isset($_FILES) || !is_uploaded_file($_FILES['excel']['tmp_name']))
			{
					$return=array(1,'提交不合法');
			}
			//处理
			if(0 == $return[0])
			{
					require AJ_ROOT."/admin/config/excel/excel.php";
					$excel=new ExcelParser($_FILES['excel']['tmp_name']);
					$return=$excel->main();
			}
			include tpl('header');
			show_menu($menus);
			echo '<div class="tt">导入EXCEL数据</div><script type="text/javascript">Menuon('.$m.');</script>';
			//输出处理
			if(!is_array($return[1])) msg('提取EXCEL数据错误');
			//echo $moduleid;print_r($return[1]);
			//按工作表扫描
			foreach($return[1] as $sheet)
			{
					//工作表数据不是数组或数组个数小于2表示数据信息不足，跳过
					if(!is_array($sheet) || count($sheet)<2) continue;
					$key = array();
					$rows = 0;
					//扫描数据行
					foreach($sheet as $val)
					{
							$post = array();
							if($rows==0)
							{
									//第一行为标签名
									foreach($val as $k => $v)
									{
											$key[$k] = $v;
									}
							}
							elseif($rows>0)
							{
									//从第二行开始扫描字段值
									foreach($val as $k => $v)
									{
											$post[$key[$k]] = $v;
									}

									//开始入库
									if(isset($post['username'])) $_username = $post['username'];
									$do = new $module($moduleid);
									foreach($do->fields as $v) {
											isset($post[$v]) or $post[$v] = '';
									}
									if(isset($post['islink'])) unset($post['islink']);
									$post['status'] = 3;
									
									get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
									$post['save_remotepic'] = $MOD['save_remotepic'];
									if($modid==2)
									{
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
											//入库
											if($do->add($post)) {
													if($MFD) fields_update($post_fields, $do->tb_member, $do->userid, 'userid', $MFD);
													if($CFD) fields_update($post_fields, $do->tb_company, $do->userid, 'userid', $CFD);
													echo('&nbsp;&nbsp;<font color="green">公司 '.$post['company'].' 导入成功</font>');
											} else {
													echo("&nbsp;&nbsp;".$do->errmsg);
											}
									}
									else
									{
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
											//入库
											if($do->pass($post)) {
													$do->add($post);
													if($IFD) fields_update($post_fields, $table, $do->itemid, 'itemid', $IFD);
													echo('&nbsp;&nbsp;<font color="green">信息 '.$post['title'].' 导入发布成功</font>');
											} else {
													echo("&nbsp;&nbsp;".$do->errmsg);
											}
									}
									echo "<hr />";
									print str_repeat(" ", 4096);
									ob_flush( );
									flush( );
							}
							$rows++;
					}
			}
			msg('导入EXCEL完成',$this_forward.'&action=excel',3);
	break;
	case 'dataimport':
			if(empty($item) && empty($op)) msg('请选择要导入的信息');
			require_once AJ_ROOT.'/module/'.$module.'/'.$module.'.class.php';
			require AJ_ROOT.'/include/module.func.php';
			//数据表设置
			if(in_array($module, array('article', 'info'))) {
					$table = $AJ_PRE.$module.'_'.$moduleid;
					$table_data = $AJ_PRE.$module.'_data_'.$moduleid;
			} else {
					$table = $AJ_PRE.$module;
					$table_data = $AJ_PRE.$module.'_data';
			}
			//读取自定义字段设置
			$IFD = cache_read('fields-'.substr($table, strlen($AJ_PRE)).'.php');
			$MFD = cache_read('fields-member.php');
			$CFD = cache_read('fields-company.php');
			if($IFD || $MFD || $CFD) require AJ_ROOT.'/include/fields.func.php';

			include tpl('header');
			show_menu($menus);
			echo '<div class="tt">导入数据</div><script type="text/javascript">Menuon('.$m.');</script>';
			$importusercache = AJ_ROOT."/admin/config/cache/importusercache.php";
			//从关联会员缓存里提取关联会员信息
			if($op == 'relateduser')
			{
					if ( !file_exists( $importusercache ) ) msg('关联会员数组缓存不存在');
					include_once( $importusercache );
					if(empty($importuser) || !is_array($importuser)) msg('关联会员数组不存在');
					$item = array();
					$art = new TxtDB('module_'.$modid.'_h');
					foreach($importuser as $val)
					{
							$res[$i] = $art->selectByRid($val);
							if(!$res[$i]['id']) break;
							$par = explode('[!]',$res[$i]['content']);
							if (!$par[6] || $par[4]) continue;
							$item[] = $res[$i]['id'].'|'.$par[6];
					}
					$art->close();
					@unlink($importusercache);
					echo '&nbsp;&nbsp;开始导入关联会员信息：<BR><BR>';
			}
			$txt = new TxtDB('module_'.$modid.'_t');
			$dbhead = $dbuser = array();
			foreach($item as $val)
			{
					$post = $cont = array();
					$arrid = explode('|',$val);
					if(!empty($arrid[0])) $dbhead[] = $arrid[0];
					if(!empty($arrid[2])) $dbuser[] = $arrid[2];
					if(!empty($arrid[1])) 
					{
							//从文本数据库提取内容
							$cont = $txt->select($arrid[1]);
							if (!$cont['id']) continue;
							$post = myallExplode('[!]',$cont['content']);
							if($modid==2) unset($post['tag']);
							if(!empty($newcatid)) $post['catid'] = $newcatid;
							if(!empty($newareaid)) $post['areaid'] = $newareaid;
							if(!empty($newtime)) $post['addtime'] = $newtime;
							//print_r($post);exit;

							//开始入库
							if(isset($post['username'])) $_username = $post['username'];
							$do = new $module($moduleid);
							foreach($do->fields as $v) {
									isset($post[$v]) or $post[$v] = '';
							}
							if(isset($post['islink'])) unset($post['islink']);
							$post['status'] = 3;
							get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
							$post['save_remotepic'] = $MOD['save_remotepic'];
							if($modid==2)
							{
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
									//入库
									if($do->add($post)) {
											if($MFD) fields_update($post_fields, $do->tb_member, $do->userid, 'userid', $MFD);
											if($CFD) fields_update($post_fields, $do->tb_company, $do->userid, 'userid', $CFD);
											echo('&nbsp;&nbsp;<font color="green">公司 '.$post['company'].' 导入成功</font>');
									} else {
											echo("&nbsp;&nbsp;".$do->errmsg);
									}
							}
							else
							{
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
									//入库
									if($do->pass($post)) {
											$do->add($post);
											if($IFD) fields_update($post_fields, $table, $do->itemid, 'itemid', $IFD);
											echo('&nbsp;&nbsp;<font color="green">信息 '.$post['title'].' 导入发布成功</font>');
									} else {
											echo("&nbsp;&nbsp;".$do->errmsg);
									}
							}
							echo "<hr />";
							print str_repeat(" ", 4096);
							ob_flush( );
							flush( );
					}
			}
			$txt->close();
			//从文本数据库里删除已导入数据
			$art = new myArt('module_'.$modid);
			foreach($dbhead as $val)
			{
					if(!empty($val)) $art->delArt($val);
			}
			$art = new TxtDB('module_'.$modid.'_h');
			$cnts = $art->rcdCnt;
			$art->close();
			//如果数据库记录为空，清空数据库
			if($cnts==0)
			{
					@unlink('admin/config/data/module_'.$modid.'_h/module_'.$modid.'_h.tdb');
					@unlink('admin/config/data/module_'.$modid.'_h/module_'.$modid.'_h.indx');
					@unlink('admin/config/data/module_'.$modid.'_h/module_'.$modid.'_h.lft');
					@unlink('admin/config/data/module_'.$modid.'_t/module_'.$modid.'_t.tdb');
					@unlink('admin/config/data/module_'.$modid.'_t/module_'.$modid.'_t.indx');
					@unlink('admin/config/data/module_'.$modid.'_t/module_'.$modid.'_t.lft');
			}
			//如果设置导入关联会员，将关联会员数组写入缓存并跳转
			if($relateduser && !empty($dbuser))
			{
					file_put_contents($importusercache,"<?php\n\r".'$importuser='.var_export($dbuser, TRUE)."\n\r?>");//写入缓存  
					$importuserurl = "?file=".$file."&action=dataimport&op=relateduser&moduleid=2&modid=2&newcatid=".$newcatid."&newareaid=".$newareaid."&newtime=".urlencode($newtime);
					//echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL='.$importuserurl.'"></HEAD><BODY></BODY></HTML>';exit;
					$showinfo = "信息导入完成，开始导入关联会员信息";
					msg($showinfo, $importuserurl, 1);
			}
			msg('数据导入成功', $this_forward.'&modid='.$modid, 3);
	break;
	case 'backup':
			$head = new TxtDB('module_'.$modid.'_h');
			$head->backup();
			$head->close();
			$txt = new TxtDB('module_'.$modid.'_t');
			$txt->backup();
			$txt->close();
			msg('备份数据成功', $this_forward.'&modid='.$modid, 3);
	break;
	case 'recover':
			$head = new TxtDB('module_'.$modid.'_h');
			$head->recover();
			$head->close();
			$txt = new TxtDB('module_'.$modid.'_t');
			$txt->recover();
			$txt->close();
			msg('恢复数据成功', $this_forward.'&modid='.$modid, 3);
	break;
	case 'deldb':
			@unlink('admin/config/data/module_'.$modid.'_h/module_'.$modid.'_h.tdb');
			@unlink('admin/config/data/module_'.$modid.'_h/module_'.$modid.'_h.indx');
			@unlink('admin/config/data/module_'.$modid.'_h/module_'.$modid.'_h.lft');
			@unlink('admin/config/data/module_'.$modid.'_t/module_'.$modid.'_t.tdb');
			@unlink('admin/config/data/module_'.$modid.'_t/module_'.$modid.'_t.indx');
			@unlink('admin/config/data/module_'.$modid.'_t/module_'.$modid.'_t.lft');
			msg('清除所有数据成功', $this_forward.'&modid='.$modid, 3);
	break;
	case 'delete':
			$item or msg('请选择要删除信息');
			$art = new myArt('module_'.$modid);
			foreach($item as $val)
			{
					$arrid = explode('|',$val);
					if(!empty($arrid[0])) $art->delArt($arrid[0]);
			}
			msg('删除成功', $this_forward.'&modid='.$modid, 3);
	break;
	case 'show':
			include AJ_ROOT."/admin/config/tagname.php";
			$art = new TxtDB('module_'.$modid.'_t');
			$res = $art->select($tid);
			$art->close();
			if (!$res['id']) return;
			$info = myallExplode('[!]',$res['content']);
			if($modid==2) unset($info['tag']);
			include tpl('collectdata_show');
	break;
	default:
			$pcnt = 40;	//每页显示条数
			$art = new TxtDB('module_'.$modid.'_h');
			$cnts = $art->rcdCnt;
			$pages = (int)(($cnts+$pcnt-1)/$pcnt);
			if($page>$pages) $page=$pages;
			if($page<1) $page=1;
			if($pages<1) $pages=1;
			$sid = $cnts-($page-1)*$pcnt;
			$res = array();
			$info = array();
			for($i=0;$i<$pcnt;$i++)
			{
  					if($sid<1) break;
					$res[$i] = $art->selectByRid($sid);
					if(!$res[$i]['id']) break;
					$sid--;
					$par = explode('[!]',$res[$i]['content']);
					if (!$par[6] || $par[4]) continue;
					$info[$i]['title'] = $par[0];
					$info[$i]['robotid'] = $par[1];
					$info[$i]['listid'] = $par[2];
					$info[$i]['listname'] = $par[3];
					$info[$i]['ispub'] = $par[4];
					$info[$i]['robottime'] = $par[5];
					$info[$i]['tid'] = $par[6];
					$info[$i]['huid'] = $par[7];
					$info[$i]['sid'] = $res[$i]['id'];
			}
			$art->close();
			include tpl('collectdata');
	break;
}
?>