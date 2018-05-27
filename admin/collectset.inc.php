<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include 'config/version.php';
require 'config/collectsite.php';
require 'config/collectfunction.php';
$menus = array (
    array('添加规则', '?file='.$file.'&action=add'),
    array('规则管理', '?file='.$file),
    array('规则导入', '?file='.$file.'&action=import'),
    array('帮助说明', '?file='.$file.'&action=help'),
);
$this_forward = '?file='.$file;
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
switch($action) {
	case 'export':
		if($exportid=='') msg('采集器不能为空');
		$rulefile = AJ_ROOT."/admin/config/site_".$Collectsite[$exportid]['config'].".php";
		if ( !file_exists( $rulefile ) ) msg('采集器配置文件不存在');
		include $rulefile;
		$exportarr = array();
		$exportarr[] = $Collectsite[$exportid];
		$exportarr[] = $myCollect;
		if($exportarr){
		}else{
				msg('采集器配置为空');
		}
		exportfile($exportarr, 'robot_'.$Collectsite[$exportid]['name'].'_'.AJ_CHARSET);
	break;
	case 'import':
		if($submit) 
		{
				//导入采集器的表单提交处理
				//替换采集器中的注释问份
				$importdata = preg_replace("/(#.*\s+)*/", '', $importtext);
				//对采集器编码时行base64解码处理并进行反序列化操作转为可用的数组变量
				$thevalue = unserialize(base64_decode($importdata));
				//反序列化后，如果结果不是数组，或版本号为空，则报出”机器人配置信息不正确“
				if(!is_array($thevalue) || empty($thevalue['version'])) msg('采集器配置信息不正确');
				//对不同版本的采集机器为验证
				if($ignoreversion && strip_tags($thevalue['version']) != strip_tags(MYAJ_VERSION)) msg('采集器版本不正确');
				//采集器名称为空，则对将当前的时间戳做为采集器文件名
				if(empty($thevalue[0]['name'])) $thevalue[0]['name'] = $AJ_TIME;
				//销毁采集器记录的版本号
				unset($thevalue['version']);
				$rulefile = AJ_ROOT."/admin/config/site_".$thevalue[0]['config'].".php";
				//已存在同标识采集器配置文件
				if ( file_exists( $rulefile ) ) msg('已存在采集器配置文件: site_'.$thevalue[0]['config'].'.php');
				$newCollect = $thevalue[1];
				$configstr = "<?php\n".my_extractvars( "myCollect", $newCollect )."\n?>";	
				my_writefile( AJ_ROOT."/admin/config/site_".$thevalue[0]['config'].".php", $configstr );
				$siteid = -1;
				$maxid = 0;
				if ( !isset( $Collectsite ) && !is_array( $Collectsite ) )
				{
						$Collectsite = array( );
				}
				else
				{
						reset( &$Collectsite );
				}
				while ( list( $k, $v ) = each( &$Collectsite ) )
				{
						if ( $maxid < $k )
						{
								$maxid = $k;
						}
						if ( $v['config'] != $thevalue[0]['config'] )
						{
								continue;
						}
						$siteid = $k;
						break;
				}
				++$maxid;
				if ( 0 <= $siteid )
				{
						$Collectsite[$siteid] = $thevalue[0];
				}
				else
				{
						$Collectsite[$maxid] = $thevalue[0];
				}
				my_setconfigs( "collectsite", "Collectsite", $Collectsite );
				msg('采集器配置导入成功', $this_forward, 3);
		}
		else
		{
				include tpl('collectset_import');
		}
	break;
	case 'ajax':
		$temptag = '';
		if($mid==2)
		{
				$company_fields = array('username','groupid','company','type','catid','catids','areaid','mode','capital','regunit','size','regyear','sell','buy','business','telephone','fax','mail','address','postcode','homepage','introduce','thumb','keyword','linkurl','passport', 'password','cpassword','payword','email','gender','truename','mobile','msn','qq','ali','skype','department','career','regid','edittime','inviter','content');
				foreach($company_fields as $v) {
						$temptag .= $v."=\n";
				}
		}
		else
		{
				$module = $MODULE[$mid]['module'];
				require AJ_ROOT.'/module/'.$module.'/'.$module.'.class.php';
				$do = new $module($mid);
				foreach($do->fields as $v) {
						$temptag .= $v."=\n";
				}	
				$temptag .= "content=\nuid=\npostcode=\nfax=\n";
		}
		echo $temptag;exit;
	break;
	case 'clearurl':
		if($arrname=='')
		{
				echo '采集器不能为空';exit;
		}
		$temparrtxt = "<?php\n\$ruleCollectArr = array()\n?>";
		$temp = AJ_ROOT."/admin/config/sitecollectarr_".$arrname.".php";
		if ( !file_exists( $temp ) )
		{
				echo '该采集器网址库文件不存在';exit;
		}
		if(my_writefile( $temp, &$temparrtxt ))
		{
				echo '清空网址库成功';exit;
		}
		else
		{
				echo '清空网址库失败';exit;
		}
	break;
	case 'add':
		if($submit) {
			$errtext = "";
			if ( empty( $modid ) )
			{
					$errtext .= "请选择需要添加规则的模块<br />";
			}
			elseif ( empty( $config ) )
			{
					$errtext .= "采集器标识不能为空<br />";
			}
			elseif ( file_exists( AJ_ROOT."/admin/config/site_".$config.".php" ) )
			{
					$errtext .= "已存在同名采集器配置文件<br />";
			}
			if ( !empty( $errtext ) )
			{
					msg($errtext, $this_forward, 3);
			}
			$newCollect = array( );
			$newCollect['sitename'] = $sitename;
			$newCollect['siteurl'] = $siteurl;
			$newCollect['modid'] = $modid;
			$newCollect['modid'] = $modid;
			$newCollect['apiname'] = $apiname;
			$newCollect['proxy_port'] = $proxy_port;
			$newCollect['verify_mode'] = $verify_mode;
			$newCollect['spider_auth'] = $spider_auth;
			$newCollect['spider_ip'] = $spider_ip;
			$newCollect['spider_mode'] = $spider_mode;
			$newCollect['spider_status'] = $spider_status;
			$newCollect['spider_errlog'] = $spider_errlog;
			$newCollect['referer'] = $referer;
			$newCollect['pagecharset'] = $pagecharset;
			$newCollect['titlerepeat'] = $titlerepeat;
			$newCollect['formatcontent'] = $formatcontent;
			$newCollect['collectuser'] = $collectuser;
			$newCollect['urluser'] = $urluser;
			$newCollect['urlinfo'] = $urlinfo;
			$newCollect['contpagemode'] = $contpagemode;
			$newCollect['rule'] = my_textarea2arr( my_stripslashes($_REQUEST['content']) );	
			$newCollect['pagerule'] = my_textarea2pagerule( my_stripslashes($_REQUEST['pagerule']) );
			$newCollect['contpage'] = my_textarea2arr( my_stripslashes($_REQUEST['contpage']) );
			$newCollect['replacelist'] = my_textarea2arr( my_stripslashes($_REQUEST['replacelist']) );
			$newCollect['defaultvalue'] = my_textarea2arr( my_stripslashes($_REQUEST['defaultvalue']) );
			$configstr = "<?php\n".my_extractvars( "myCollect", $newCollect )."\n?>";	
			my_writefile( AJ_ROOT."/admin/config/site_".$config.".php", $configstr );
			$siteid = -1;
			$maxid = 0;
			if ( !isset( $Collectsite ) && !is_array( $Collectsite ) )
			{
				$Collectsite = array( );
			}
			else
			{
				reset( &$Collectsite );
			}
			while ( list( $k, $v ) = each( &$Collectsite ) )
			{
				if ( $maxid < $k )
				{
					$maxid = $k;
				}
				if ( $v['config'] != $config )
				{
					continue;
				}
				$siteid = $k;
				break;
			}
			++$maxid;
			if ( 0 <= $siteid )
			{
				$Collectsite[$siteid] = array(
						"name" => $sitename,
						"config" => $config,
						"url" => $siteurl,
						"modid" => $modid,
						"verify_mode" => $verify_mode,
						"spider_auth" => $spider_auth,
						"spider_ip" => $spider_ip
				);
			}
			else
			{
				$Collectsite[$maxid] = array(
						"name" => $sitename,
						"config" => $config,
						"url" => $siteurl,
						"modid" => $modid,
						"verify_mode" => $verify_mode,
						"spider_auth" => $spider_auth,
						"spider_ip" => $spider_ip
				);
			}
			my_setconfigs( "collectsite", "Collectsite", $Collectsite );
			msg('采集器规则添加成功', $this_forward, 3);
		} else {
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
				include tpl('collectset_add');
		}	
	break;
	case 'edit':
		if ( empty( $config ) || !file_exists( AJ_ROOT."/admin/config/site_".$config.".php" ) )
		{
				msg('该采集器规则配置文件不存在');
		}
		include_once( AJ_ROOT."/admin/config/site_".$config.".php" );
		if($submit) {
			$errtext = "";
			if ( empty( $modid ) )
			{
					$errtext .= "请选择需要添加规则的模块<br />";
			}
			elseif ( empty( $config ) )
			{
					$errtext .= "采集器标识不能为空<br />";
			}
			if ( !empty( $errtext ) )
			{
					msg($errtext, $this_forward, 3);
			}
			$editCollect = array( );
			$editCollect['sitename'] = $sitename;
			$editCollect['siteurl'] = $siteurl;
			$editCollect['modid'] = $modid;
			$editCollect['apiname'] = $apiname;
			$editCollect['proxy_host'] = $proxy_host;
			$editCollect['proxy_port'] = $proxy_port;
			$editCollect['verify_mode'] = $verify_mode;
			$editCollect['spider_auth'] = $spider_auth;
			$editCollect['spider_ip'] = $spider_ip;
			$editCollect['spider_mode'] = $spider_mode;
			$editCollect['spider_status'] = $spider_status;
			$editCollect['spider_errlog'] = $spider_errlog;
			$editCollect['referer'] = $referer;
			$editCollect['pagecharset'] = $pagecharset;
			$editCollect['titlerepeat'] = $titlerepeat;
			$editCollect['formatcontent'] = $formatcontent;
			$editCollect['collectuser'] = $collectuser;
			$editCollect['urluser'] = $urluser;
			$editCollect['urlinfo'] = $urlinfo;
			$editCollect['contpagemode'] = $contpagemode;
			$editCollect['rule'] = my_textarea2arr( my_stripslashes($_REQUEST['content']) );	
			$editCollect['pagerule'] = my_textarea2pagerule( my_stripslashes($_REQUEST['pagerule']) );
			$editCollect['contpage'] = my_textarea2arr( my_stripslashes($_REQUEST['contpage']) );
			$editCollect['replacelist'] = my_textarea2arr( my_stripslashes($_REQUEST['replacelist']) );
			$editCollect['defaultvalue'] = my_textarea2arr( my_stripslashes($_REQUEST['defaultvalue']) );
			$editCollect['listcollect'] = $myCollect['listcollect'];
			$configstr = "<?php\n".my_extractvars( "myCollect", $editCollect )."\n?>";
			my_writefile( AJ_ROOT."/admin/config/site_".$config.".php", $configstr );
			$siteid = -1;
			while ( list( $k, $v ) = each( &$Collectsite ) )
			{
				if ( $v['config'] != $config )
				{
					continue;
				}
				$siteid = $k;
				break;
			}
			if ( 0 <= $siteid )
			{
				$Collectsite[$siteid] = array(
						"name" => $sitename,
						"config" => $config,
						"url" => $siteurl,
						"modid" => $modid,
						"verify_mode" => $verify_mode,
						"spider_auth" => $spider_auth,
						"spider_ip" => $spider_ip
				);
			}
			else
			{
				$Collectsite[] = array(
						"name" => $sitename,
						"config" => $config,
						"url" => $siteurl,
						"modid" => $modid,
						"verify_mode" => $verify_mode,
						"spider_auth" => $spider_auth,
						"spider_ip" => $spider_ip
				);
			}
			my_setconfigs( "collectsite", "Collectsite", $Collectsite );
			msg('修改采集器成功', $this_forward, 3);
		} else {
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
				$content = my_arr2textarea( $myCollect['rule'] );
				$pagerule = my_pagerule2textarea( $myCollect['pagerule'] );
				$contpage = my_arr2textarea( $myCollect['contpage'] );
				$replacelist = my_arr2textarea( $myCollect['replacelist'] );
				$defaultvalue = my_arr2textarea( $myCollect['defaultvalue'] );
				include tpl('collectset_edit');
		}
	break;
	case 'copy':
		if($copyid=='') msg('复制采集器不能为空');
		$rulefile = AJ_ROOT."/admin/config/site_".$Collectsite[$copyid]['config'].".php";
		if ( !file_exists( $rulefile ) ) msg('采集器配置文件不存在');
		include $rulefile;
		if($submit) {
			$errtext = "";
			if ( empty( $modid ) )
			{
					$errtext .= "请选择需要添加规则的模块<br />";
			}
			else if ( empty( $config ) )
			{
					$errtext .= "采集器标识不能为空<br />";
			}
			elseif ( file_exists( AJ_ROOT."/admin/config/site_".$config.".php" ) )
			{
					$errtext .= "已存在同名采集器配置文件<br />";
			}
			if ( !empty( $errtext ) )
			{
					msg($errtext, $this_forward, 3);
			}
			$copyCollect = array( );
			$copyCollect['sitename'] = $sitename;
			$copyCollect['siteurl'] = $siteurl;
			$copyCollect['modid'] = $modid;
			$copyCollect['apiname'] = $apiname;
			$copyCollect['proxy_host'] = $proxy_host;
			$copyCollect['proxy_port'] = $proxy_port;
			$copyCollect['verify_mode'] = $verify_mode;
			$copyCollect['spider_auth'] = $spider_auth;
			$copyCollect['spider_ip'] = $spider_ip;
			$copyCollect['spider_mode'] = $spider_mode;
			$copyCollect['spider_status'] = $spider_status;
			$copyCollect['spider_errlog'] = $spider_errlog;
			$copyCollect['referer'] = $referer;
			$copyCollect['pagecharset'] = $pagecharset;
			$copyCollect['titlerepeat'] = $titlerepeat;
			$copyCollect['formatcontent'] = $formatcontent;
			$copyCollect['collectuser'] = $collectuser;
			$copyCollect['urluser'] = $urluser;
			$copyCollect['urlinfo'] = $urlinfo;
			$copyCollect['contpagemode'] = $contpagemode;
			$copyCollect['rule'] = my_textarea2arr( my_stripslashes($_REQUEST['content']) );	
			$copyCollect['pagerule'] = my_textarea2pagerule( my_stripslashes($_REQUEST['pagerule']) );
			$copyCollect['contpage'] = my_textarea2arr( my_stripslashes($_REQUEST['contpage']) );
			$copyCollect['replacelist'] = my_textarea2arr( my_stripslashes($_REQUEST['replacelist']) );
			$copyCollect['defaultvalue'] = my_textarea2arr( my_stripslashes($_REQUEST['defaultvalue']) );
			$copyCollect['listcollect'] = $myCollect['listcollect'];
			$configstr = "<?php\n".my_extractvars( "myCollect", $copyCollect )."\n?>";
			my_writefile( AJ_ROOT."/admin/config/site_".$config.".php", $configstr );
			$siteid = -1;
			$maxid = 0;
			if ( !isset( $Collectsite ) && !is_array( $Collectsite ) )
			{
				$Collectsite = array( );
			}
			else
			{
				reset( &$Collectsite );
			}
			while ( list( $k, $v ) = each( &$Collectsite ) )
			{
				if ( $maxid < $k )
				{
					$maxid = $k;
				}
				if ( $v['config'] != $config )
				{
					continue;
				}
				$siteid = $k;
				break;
			}
			++$maxid;
			if ( 0 <= $siteid )
			{
				$Collectsite[$siteid] = array(
						"name" => $sitename,
						"config" => $config,
						"url" => $siteurl,
						"modid" => $modid,
						"verify_mode" => $verify_mode,
						"spider_auth" => $spider_auth,
						"spider_ip" => $spider_ip
				);
			}
			else
			{
				$Collectsite[$maxid] = array(
						"name" => $sitename,
						"config" => $config,
						"url" => $siteurl,
						"modid" => $modid,
						"verify_mode" => $verify_mode,
						"spider_auth" => $spider_auth,
						"spider_ip" => $spider_ip
				);
			}
			my_setconfigs( "collectsite", "Collectsite", $Collectsite );
			msg('采集器复制成功', $this_forward, 3);
		} else {
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
				$content = my_arr2textarea( $myCollect['rule'] );
				$pagerule = my_pagerule2textarea( $myCollect['pagerule'] );
				$contpage = my_arr2textarea( $myCollect['contpage'] );
				$replacelist = my_arr2textarea( $myCollect['replacelist'] );
				$defaultvalue = my_arr2textarea( $myCollect['defaultvalue'] );
				include tpl('collectset_copy');
		}
	break;
	case 'del':
		if(!empty($config))
		{
			foreach ( $Collectsite as $k => $v )
			{
				if ( $v['config'] != $config )
				{
						continue;
				}
				unset( $Collectsite[$k] );	
				my_setconfigs( "collectsite", "Collectsite", $Collectsite );
				if ( file_exists( AJ_ROOT."/admin/config/site_".$config.".php" ) )
				{
						unlink( AJ_ROOT."/admin/config/site_".$config.".php" );
				}
				break;
			}
		}
		msg('采集器删除成功', $this_forward, 3);
	break;
	case 'help':
			include AJ_ROOT."/admin/config/tagname.php";
			include tpl('collectset_help');
	break;
	default:
			$sysmodules = get_modules();
			$modules = array();
			$result = $db->query("SELECT * FROM {$AJ_PRE}module ORDER BY listorder ASC,moduleid DESC");
			while($r = $db->fetch_array($result)) {
					if($r['moduleid'] < 5 && $r['moduleid'] != 2) continue;
					$r['installdate'] = timetodate($r['installtime'], 3);
					$r['modulename'] = isset($sysmodules[$r['module']]) ? $sysmodules[$r['module']]['name'] : '外链';
					if(!$r['disabled']) {
							$modules[$r['moduleid']] = $r['modulename'];
					}
			}
			include tpl('collectset');
	break;
}
?>