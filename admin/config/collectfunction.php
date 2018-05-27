<?php
function my_setconfigs( $_obfuscate_configname = "", $_obfuscate_configarr, &$_obfuscate_array )
{
		if ( 0 < strlen( $_obfuscate_configname ) && 0 < strlen( $_obfuscate_configarr ) )
		{
				$_obfuscate_temp = AJ_ROOT.'/admin/config';
				if ( !file_exists( $_obfuscate_temp ) )
				{
						@mkdir( $_obfuscate_temp, 511 );
				}
				@chmod( $_obfuscate_temp, 511 );
												
				$_obfuscate_temp .= "/".$_obfuscate_configname.".php";
				if ( file_exists( $_obfuscate_temp ) )
				{
						@chmod( $_obfuscate_temp, 511 );
				}
				$_obfuscate_arrtemp = "<?php\n".my_extractvars( $_obfuscate_configarr, &$_obfuscate_array )."\n?>";
				return my_writefile( $_obfuscate_temp, &$_obfuscate_arrtemp );
		}
		return false;
}
function my_extractvars( $_obfuscate_newarr, &$_obfuscate_oldarr )
{
		$_obfuscate_temparrtxt = "";
		if ( is_array( $_obfuscate_oldarr ) )
		{
				foreach ( $_obfuscate_oldarr as $_obfuscate_key => $_obfuscate_val )
				{
						if ( is_array( $_obfuscate_val ) )
						{
								$_obfuscate_temparrtxt .= my_extractvars( $_obfuscate_newarr."['".my_setslashes($_obfuscate_key, "\"")."']", $_obfuscate_oldarr[$_obfuscate_key] );
						}
						else
						{
								$_obfuscate_temparrtxt .= "\$".$_obfuscate_newarr."['".my_setslashes($_obfuscate_key, "\"")."'] = \"".my_setreplace($_obfuscate_val,"\"")."\";\n";
						}
				}
				return $_obfuscate_temparrtxt;
		}
		$_obfuscate_temparrtxt .= "\$".$_obfuscate_newarr." =\"".my_setreplace($_obfuscate_oldarr,"\"")."\";\n";
		return $_obfuscate_temparrtxt;
}
function my_setreplace( $_obfuscate_val, $_obfuscate_replace = "" )
{
		if ( $_obfuscate_replace == "\"" )
		{
				return str_replace( array( "\\\\", "\"" ), array( "\\\\\\\\", "\\\"" ), $_obfuscate_val );
		}
		if ( $_obfuscate_replace == "'" )
		{
				return str_replace( array( "\\\\", "'" ), array( "\\\\\\\\", "\\'" ), $_obfuscate_val );
		}
		return $_obfuscate_val;
}
function my_setslashes( $_obfuscate_val, $_obfuscate_replace = "" )
{
		if ( $_obfuscate_replace == "\"" )
		{
				return str_replace( array( "\\", "'" ), array( "\\\\", "\\'" ), $_obfuscate_val );
		}
		if ( $_obfuscate_replace == "'" )
		{
				return str_replace( array( "\\", "\"" ), array( "\\\\", "\\\"" ), $_obfuscate_val );
		}
		return addslashes( $_obfuscate_val );
}
function my_writefile( $_obfuscate_filename, &$_obfuscate_filestring, $_obfuscate_filemode = "wb" )
{
		$_obfuscate_tempfile = @fopen( $_obfuscate_filename, $_obfuscate_filemode );
		if ( !$_obfuscate_tempfile )
		{
				return false;
		}
		@flock( $_obfuscate_tempfile, LOCK_EX );
		$_obfuscate_result = @fwrite( $_obfuscate_tempfile, $_obfuscate_filestring );
		@flock( $_obfuscate_tempfile, LOCK_UN );
		@fclose( $_obfuscate_tempfile );
		@chmod( $_obfuscate_filename, 511 );
		return $_obfuscate_result;
}
function my_writearr( $_obfuscate_filename, $_obfuscate_arr, $_obfuscate_filemode = "wb" )
{
		$_obfuscate_temparrtxt = "";
		$_obfuscate_temp = AJ_ROOT."/admin/config/cache/".$_obfuscate_filename.".php";
		if ( is_array( $_obfuscate_arr ) )
		{
				foreach ( $_obfuscate_arr as $_obfuscate_val )
				{
						$_obfuscate_temparrtxt .= "'".str_replace("'", "\'", $_obfuscate_val)."',";
				}
		}
		$_obfuscate_temparrtxt = "<?php\n\$ruleCollectArr = array(".substr($_obfuscate_temparrtxt,0,strlen($_obfuscate_temparrtxt)-1).")\n?>";
		return my_writefile( $_obfuscate_temp, &$_obfuscate_temparrtxt );
}
function my_urlcontents( $url, $params = array( ) )
{
		$ret = "";
		$count = 0;
		if ( is_numeric( $params ) )
		{
				$params = array(
						"repeat" => $params
				);
		}
		if ( !isset( $params['repeat'] ) || !is_numeric( $params['repeat'] ) )
		{
				$params['repeat'] = 1;
		}
		if ( !isset( $params['delay'] ) )
		{
				$params['delay'] = 0;
		}
		if ( !isset( $params['charset'] ) )
		{
				$params['charset'] = "auto";
		}
		while ( empty( $ret ) && $count < $params['repeat'] )
		{
				++$count;
				if ( 1 < $count && 0 < $params['delay'] )
				{
						sleep( $params['delay'] );
				}
				if ( (!empty( $params['proxy_host'] ) && !empty( $params['proxy_port'] )) || !empty( $params['referer'] ) )
				{			
						include_once "Snoopy.class.php"; 
						$snoopy = new Snoopy; 
						if ( !empty( $params['useragent'] ) )
						{
								$snoopy->agent = $params['useragent']; 
						}
						if ( !empty( $params['referer'] ) && substr( $params['referer'], 0, 4 ) == "http" )
						{
								$snoopy->referer = $params['referer']; 
						}
						if ( !empty( $params['proxy_host'] ) && !empty( $params['proxy_port'] ) )
						{
								$snoopy->proxy_host = $params['proxy_host']; 
								$snoopy->proxy_port = $params['proxy_host']; 
						}
						$snoopy->fetch($url);
						$ret = $snoopy->results;
						unset( $snoopy );
				}
				else
				{
						$ret = @file_get_contents( $url );
				}
		}
		if ( !empty( $ret ) && in_array( $params['charset'], array( "auto", "gb2312", "gbk", "gb", "big5", "utf8", "utf-8" ) ) )
		{
				if ( $params['charset'] == "auto" )
				{
						preg_match( "/\\<meta[^\\<\\>]*content[\\s]*=[\\s]*('|\")?[^\\/;]*\\/[^\\/;]*;[\\s]*charset[\\s]*=[\\s]*(gb2312|gbk|big5|utf-8)('|\")?[^\\<\\>]*\\>/is", $ret, $matches );
						if ( !empty( $matches[2] ) )
						{
								$pagecherset = strtolower( trim( $matches[2] ) );
						}
						else
						{
								$pagecherset = strtolower( AJ_CHARSET );
						}
				}
				else
				{
						$pagecherset = $params['charset'];
				}
				$defaultcharset = strtolower( AJ_CHARSET );
				$charsetary = array( "gb2312" => "GB2312", "gbk" => "GBK", "gb" => "GBK", "big5" => "BIG5", "utf-8" => "UTF-8", "utf8" => "UTF-8" );
				if ( $pagecherset != $defaultcharset && isset( $charsetary[$pagecherset], $charsetary[$defaultcharset] ) )
				{
						if ( function_exists( 'encodeconvert' ) )
						{
								$ret = encodeconvert( $charsetary[$pagecherset], $ret );
						}
				}
		}
		return $ret;
}
function encodeconvert($encode, $content, $to=0) 
{
		if($to) {
				$in_charset = strtoupper(AJ_CHARSET);
				$out_charset = strtoupper($encode);
		} else {
				$in_charset = strtoupper($encode);
				$out_charset = strtoupper(AJ_CHARSET);
		}
		if(!empty($encode) && $in_charset != $out_charset) {
				if (function_exists('iconv') && (@$outstr = iconv("$in_charset//IGNORE", "$out_charset//IGNORE", $content))) {
						$content = $outstr;
				} elseif (function_exists('mb_convert_encoding') && (@$outstr = mb_convert_encoding($content, $out_charset, $in_charset))) {
						$content = $outstr;
				}
		}
		return $content;
}
function my_collectstoe( $_obfuscate_pregstr )
{
		//$_obfuscate_pregstr = my_echorule( trim( $_obfuscate_pregstr ), 'backslash' );
		if ( empty( $_obfuscate_pregstr ) )
		{
				return false;
		}
		elseif ( 0 < strlen( $_obfuscate_pregstr ) && substr( $_obfuscate_pregstr, 0, 1 ) != "/" )
		{
				$_obfuscate_pregstr = "/".str_replace( "/", "\/", $_obfuscate_pregstr )."/isU";
		}
		return $_obfuscate_pregstr;
}
function my_cmatchone( $_obfuscate_pregstr, $_obfuscate_source )
{
		$_obfuscate_matchvar = array( );
		preg_match( $_obfuscate_pregstr, $_obfuscate_source, $_obfuscate_matchvar );
		if ( !is_array( $_obfuscate_matchvar ) && count( $_obfuscate_matchvar ) == 0 )
		{
				return false;
		}
		return $_obfuscate_matchvar[count( $_obfuscate_matchvar ) - 1];
}
function my_cmatchall( $_obfuscate_pregstr, $_obfuscate_source, $_obfuscate_pregsort = 0 )
{
		$_obfuscate_matchvar = array( );
		if ( $_obfuscate_pregsort == PREG_OFFSET_CAPTURE )
		{
				preg_match_all( $_obfuscate_pregstr, $_obfuscate_source, $_obfuscate_matchvar, PREG_OFFSET_CAPTURE + PREG_SET_ORDER );
		}
		else
		{
				preg_match_all( $_obfuscate_pregstr, $_obfuscate_source, $_obfuscate_matchvar, PREG_SET_ORDER );
		}
		if ( !is_array( $_obfuscate_matchvar ) && count( $_obfuscate_matchvar ) == 0 )
		{
				return false;
		}
		$_obfuscate_arr = array( );
		foreach ( $_obfuscate_matchvar as $_obfuscate_val )
		{
				if ( is_array( $_obfuscate_val ) )
				{
						$_obfuscate_arr[] = $_obfuscate_val[count( $_obfuscate_val ) - 1];
				}
				else
				{
						$_obfuscate_arr[] = $_obfuscate_val;
				}
		}
		return $_obfuscate_arr;
}
function my_replace( $replacelist, $info )
{
		$arrtemp = '';
		$arrtemp = explode('##', $replacelist);
		foreach( $arrtemp as $val )
		{
				if( !empty($val) )
				{
						$retxt = '';
						$retxt = explode('@@', $val);
						$info = preg_replace("/($retxt[0])/s", $retxt[1], $info);
						//$info = str_replace($retxt[0], $retxt[1], $info);
				}
		}
		return $info;
}
function my_sortreplace( $_obfuscate_string, $_obfuscate_pregarr, $_obfuscate_sort = 0)
{
		if ( !is_array( $_obfuscate_pregarr ) && count( $_obfuscate_pregarr ) == 0 )
		{
				return false;
		}
		$pregarr_key = array_keys( $_obfuscate_pregarr );
    	$pregarr_value = array_values( $_obfuscate_pregarr );
		if ( $_obfuscate_sort == 0 )
		{
    			$_obfuscate_string = str_replace( $pregarr_key, $pregarr_value, $_obfuscate_string );
		}
		else
		{
    			$_obfuscate_string = str_replace( $pregarr_value, $pregarr_key, $_obfuscate_string );	
		}
    	return $_obfuscate_string;
}
function my_textstr( $_obfuscate_val, $_obfuscate_other = false )
{
		if ( $_obfuscate_other )
		{
			$_obfuscate_pregstr = array( "/<img[^\\<\\>]+src=['\"]?([^\\<\\>'\"\\s]*)['\"]?/is", "/<a[^\\<\\>]+href=['\"]?([^\\<\\>'\"\\s]*)['\"]?/is", "/on[a-z]+[\\s]*=[\\s]*\"[^\"]*\"/is", "/on[a-z]+[\\s]*=[\\s]*'[^']*'/is" );
			$_obfuscate_replacestr = array( "\\1<br>\\0", "\\1<br>\\0", "", "" );
			$_obfuscate_val = preg_replace( $_obfuscate_pregstr, $_obfuscate_replacestr, $_obfuscate_val );
		}
		$_obfuscate_pregstr = array( "/([\r\n])[\\s]+/", "/\\<br[^\\>]*\\>/i", "/\\<[\\s]*\\/p[\\s]*\\>/i", "/\\<[\\s]*p[\\s]*\\>/i", "/\\<script[^\\>]*\\>.*\\<\\/script\\>/is", "/\\<[\\/\\!]*[^\\<\\>]*\\>/is", "/&(quot|#34);/i", "/&(amp|#38);/i", "/&(lt|#60);/i", "/&(gt|#62);/i", "/&(nbsp|#160);/i", "/&#(\\d+);/", "/&([a-z]+);/i" );
		$_obfuscate_replacestr = array( " ", "\r\n", "", "\r\n\r\n", "", "", "\"", "&", "<", ">", " ", "-", "" );
		$_obfuscate_val = preg_replace( $_obfuscate_pregstr, $_obfuscate_replacestr, $_obfuscate_val );
		$_obfuscate_val = strip_tags( $_obfuscate_val );
		return $_obfuscate_val;
}
function my_textarea2arr( $_obfuscate_val )
{
		$arrtemp = explode("\n",$_obfuscate_val);
		$temparr = array();
		foreach($arrtemp as $k => $v)
		{
				if(!empty($v))
				{
						$arr_v = explode('=', $v, 2);
						if(count($arr_v) == 2)
						{
								$key = trim($arr_v[0]);
								$val = trim($arr_v[1]);
								$temparr[$key] = $val;
						}
				}
		}
		return $temparr;
}
function my_arr2textarea( $_obfuscate_arrval )
{
		if( !is_array($_obfuscate_arrval) )  return $_obfuscate_arrval;
		$temp = '';
		foreach($_obfuscate_arrval as $k => $v)
		{
				$temp .= $k.'='.my_echorule( $v, 'textarea' )."\n";
		}
		return $temp;
}
function my_textarea2pagerule( $_obfuscate_val )
{
		$arrtemp = explode("\n",$_obfuscate_val);
		$temparr = array();
		$i = 0;
		foreach($arrtemp as $k => $v)
		{
				if(!empty($v))
				{
						$arr_v = explode('=', $v, 2);
						if(count($arr_v) == 2)
						{
								$key = trim($arr_v[0]);
								$val = trim($arr_v[1]);
								if($key == 'pageurl') $i++;
								$temparr[$i][$key] = $val;
						}
				}
		}
		return $temparr;
}
function my_pagerule2textarea( $_obfuscate_arrval )
{
		if( !is_array($_obfuscate_arrval) )  return $_obfuscate_arrval;
		$temp = '';
		foreach($_obfuscate_arrval as $key => $val)
		{
				foreach($val as $k => $v)
				{
						$temp .= $k.'='.my_echorule( $v, 'textarea' )."\n";
				}
		}
		return $temp;
}
function my_echorule( $_obfuscate_val, $ruletype )
{
		if( empty($_obfuscate_val) )  return $_obfuscate_val;
		if($ruletype=='input')
		{
				$_obfuscate_val = str_replace('&','&amp;',$_obfuscate_val);
				$_obfuscate_val = str_replace('"','&quot;',$_obfuscate_val);
		}
		elseif($ruletype=='textarea')
		{
				$_obfuscate_val = str_replace('&','&amp;',$_obfuscate_val);
		}
		elseif($ruletype=='backslash')
		{
				$_obfuscate_val = str_replace("\\\\","\\",$_obfuscate_val);
		}
		elseif($ruletype=='replace')
		{
				$_obfuscate_val = str_replace("/","\/",$_obfuscate_val);
		}
		return $_obfuscate_val;
}
function getrobotmessage($sourcehtml, $referurl, $robotlevel=1) {
	$searchcursory = array(
		"/\<(script|style|textarea)[^\>]*?\>.*?\<\/(\\1)\>/si",
		"/\<!*(--|doctype|html|head|meta|link|body)[^\>]*?\>/si",
		"/<\/(html|head|meta|link|body)\>/si",
		"/([\r\n])\s+/",
		"/\<(table|div)[^\>]*?\>/si",
		"/\<\/(table|div)\>/si"
	);
	$replacecursory = array(
		"",
		"",
		"",
		 "\\1",
		"\n\n###table div explode###\n\n",
		"\n\n###table div explode###\n\n"
	);
	$searchaborative = array(
		"/\<(iframe)[^\>]*?\>.*?\<\/(\\1)\>/si",
		"/\<[\/\!]*?[^\<\>]*?\>/si",
		"/\t/",
		"/[\r\n]+/",
		"/(^[\r\n]|[\r\n]$)+/",
		"/&(quot|#34);/i",
		"/&(amp|#38);/i",
		"/&(lt|#60);/i",
		"/&(gt|#62);/i",
		"/&(nbsp|#160|\t);/i",
		"/&(iexcl|#161);/i",
		"/&(cent|#162);/i",
		"/&(pound|#163);/i",
		"/&(copy|#169);/i",
		"/&#(\d+);/e"
	);
	$replaceaborative = array(
		"",
		"",
		"",
		"\n",
		"",
		"\"",
		"&",
		"<",
		">",
		" ",
		chr(161),
		chr(162),
		chr(163),
		chr(169),
		"chr(\\1)"
	);
	$arrayrobotmeg = array();
	$sourcetext = replaceimageurl($referurl, preg_replace($searchcursory, $replacecursory, $sourcehtml));

	$arraysource = explode("\n\n###table div explode###\n\n", $sourcetext);
	$arraycell = array();
	foreach($arraysource as $value) {
		$cell = array(
			'code'	=>	$value,
			'text'	=>	preg_replace("/[\n\r\s]*?/is", "", preg_replace ($searchaborative, $replaceaborative, $value)),
			'pr'	=>	0,
			'title'	=>	'',
			'process'	=>''
		);
		if($cell['text'] != '') {
			if($robotlevel == 2) {
				$arraycell[] = getpr($cell, $searchaborative, $replaceaborative);
			} else {
				$arraycell[] = $cell;
			}
		}
	}

	$arraysubject = $arraymessage = array();
	$leachsubject = $leachmessage = '';
	foreach($arraycell as $value) {
		if($value['title'] == 'title') {
			$arraysubject[] = $value;
		} elseif($value['pr'] >= 0) {
			$arraymessage[] = $value['code'];
		}
	}

	$pr = '';
	foreach($arraysubject as $value) {
		if($pr < $value['pr'] || empty($pr)) {
			$leachsubject = $value['text'];
		}
		$pr = $value['pr'];
	}
	$leachmessage = preg_replace("/\<(p|br)[^\>]*?\>/si", "\n", implode("\n", $arraymessage));
	$arraymessage = explode("\n", preg_replace($searchaborative, $replaceaborative, $leachmessage));
	$leachmessage = '';
	foreach($arraymessage as $value) {
		if(trim($value) != '') {
			$leachmessage .= "<p>" . trim($value) . "</p>\n";
		}
	}

	$arrayrobotmeg['leachsubject'] = $leachsubject;
	$arrayrobotmeg['leachmessage'] = $leachmessage;
	return $arrayrobotmeg;
}
function replaceimageurl($referurl, $subject) {
	preg_match_all("/<img.+src=('|\"|)?(.*)(\\1)([\s].*)?>/ismUe", $subject, $temp, PREG_SET_ORDER);

	$offset = '';
	$url = $imagereplace = array();
	$posturl = parse_url($referurl);
	if(is_array($temp) && !empty($temp)) {
		foreach($temp as $tempvalue) {
			$url = parse_url(str_replace('\"', '', $tempvalue[2]));
			$imagereplace['oldimageurl'][] = $tempvalue[0];
			if(isset($url['host']) && !empty($url['host'])){
				$imagereplace['newimageurl'][] = '&lt;img src="' . str_replace('\"', '', $tempvalue[2]) . '"&gt;';
			} else {
				$offset = strpos($tempvalue[2], '/');
				if(!is_bool($offset) && $offset == 0){
					$imagereplace['newimageurl'][] = '&lt;img src="' . $posturl['scheme'] . '://' . $posturl['host'] . str_replace('\"', '', $tempvalue[2]) . '"&gt;';
				} else {
					$imagereplace['newimageurl'][] = '&lt;img src="' . substr($referurl, 0, strrpos($referurl, '/')) . '/' . str_replace('\"', '', $tempvalue[2]) . '"&gt;';
				}
			}
		}
	}

	return str_replace($imagereplace['oldimageurl'], $imagereplace['newimageurl'], $subject);
}
function sarray_unique($array) {
	$newarray = array();
	if(!empty($array) && is_array($array)) {
		$array = array_unique($array);
		foreach ($array as $value) {
			$newarray[] = $value;
		}
	}
	return $newarray;
}
function my_savethumb($picurl,$url) {
			global $AJ_TIME, $AJ;
			$tempfile = '';
			$picurl = my_prefixurl($picurl,$url);
			$uploaddir = 'file/upload/'.timetodate($AJ_TIME, $AJ['uploaddir']).'/';
			is_dir(AJ_ROOT.'/'.$uploaddir) or dir_create(AJ_ROOT.'/'.$uploaddir);
			$picname = date('H-i-s', $AJ_TIME).'-'.rand(10, 99);
			$imagetype = strrchr( $picurl, "." );
			$tempfile = '/'.$uploaddir.$picname.$imagetype;
			GrabImage($picurl,AJ_ROOT.$tempfile );
			return AJ_URL.$tempfile;
}
function my_prefixurl($ourl,$url) {
			$temp = '';
			$posturl = parse_url($url);
			$myurl = parse_url($ourl);
			if(!empty($myurl['host'])){
					$temp = $ourl;
			} else {
					$offset = strpos($ourl, '/');
					if(!is_bool($offset) && $offset == 0){
							$temp = $posturl['scheme'].'://'.$posturl['host'].$ourl;
					} else {
							$temp = substr($url, 0, strrpos($url, '/')).'/'.$ourl;
					}
			}
			return $temp;
}
function GrabImage($url,$filename="") 
{ 
	if($url==""):return false;endif; 
	if($filename=="") { 
		$ext=strrchr($url,"."); 
		if($ext!=".gif" && $ext!=".jpg"):return false;endif; 
		$filename=date("dMYHis").$ext; 
	} 
	ob_start(); 
	readfile($url); 
	$img = ob_get_contents(); 
	ob_end_clean(); 
	$size = strlen($img); 
	$fp2=@fopen($filename, "a"); 
	fwrite($fp2,$img); 
	fclose($fp2); 
	return $filename; 
} 
function exportfile($array, $filename) {
	global $AJ_TIME, $AJ;
	$array['version'] = strip_tags(MYAJ_VERSION);
	$time = date('Y-m-d H:m:s', $AJ_TIME);
	$exporttext = "# ".MYAJ_NAME." Robot\r\n".
	"# Version: ".MYAJ_NAME." ".MYAJ_VERSION."\r\n".
	"# Time: $time\r\n".
	"# From: $AJ[sitename] (".AJ_URL.")\r\n".
	"#\r\n".
	"# This file was BASE64 encoded\r\n".
	"#\r\n".
	"# 采集器技术支持QQ: ".MYAJ_QQ."\r\n".
	"# --------------------------------------------------------\r\n\r\n\r\n".
	wordwrap(base64_encode(serialize($array)), 50, "\r\n", 1);
	
	//obclean();
	$ua = $_SERVER["HTTP_USER_AGENT"];
	$encoded_filename = urlencode($filename);
	$encoded_filename = str_replace("+", "%20", $encoded_filename);
	header('Content-Encoding: none');
	header('Content-Type: '.(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
	if (preg_match("/MSIE/", $ua)) {  
		header('Content-Disposition: attachment; filename="'. $encoded_filename .'.txt"');
	} else if (preg_match("/Firefox/", $ua)) {  
		header('Content-Disposition: attachment; filename*="utf8\'\''. $filename .'.txt"');
	} else {  
		header('Content-Disposition: attachment; filename="'. $filename .'.txt"');
	}
	//header('Content-Disposition: attachment; filename="'.$filename.'.txt"');
	//header('Content-Length: '.strlen($exporttext));
	header('Pragma: no-cache');
	header('Expires: 0');

	echo $exporttext;
	exit;
}
function saddslashes($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = saddslashes($val);
		}
	} else {
		$string = str_replace('"','\"',$string);
	}
	return $string;
}
function my_stripslashes($string) {
    if( get_magic_quotes_gpc() == true )  $string = stripslashes($string);
    return $string;
}
?>