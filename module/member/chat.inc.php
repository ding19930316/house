<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
require AJ_ROOT.'/module/'.$module.'/common.inc.php';
$chatid = (isset($chatid) && is_md5($chatid)) ? $chatid : '';
$chatuser = $_username ? $_username : $AJ_IP;
$table = $AJ_PRE.'chat';
$MOD['chat_poll'] = intval($MOD['chat_poll']);
function get_chat_id($f, $t) {
	global $AJ_TIME;
	if(!check_name($f)) {
		$chat_browerid = get_cookie('chat_browerid');
		if(!preg_match("/^[a-z0-9]{6}$/i", $chat_browerid)) {
			$chat_browerid = random(6);
			set_cookie('chat_browerid', $chat_browerid, $AJ_TIME + 365*86400);
		}
		$f = md5($f.'|'.$chat_browerid.$_SERVER['HTTP_USER_AGENT']);
	}
	return md5(strcmp($f, $t) > 0 ? $f.'|'.$t : $t.'|'.$f);
}
function get_chat_file($chatid) {
	return AJ_ROOT.'/file/chat/'.substr($chatid, 0, 2).'/'.$chatid.'.php';
}
switch($action) {
	case 'send':
		$chatid or exit('0');
		$word or exit('0');
		if($MOD['chat_maxlen'] && strlen($word) > $MOD['chat_maxlen']*3) exit('0');
		$word = convert($word, 'UTF-8', AJ_CHARSET);
		$chat = $db->get_one("SELECT * FROM {$table} WHERE chatid='$chatid'");
		if($chat) {
			if($chat['touser'] == $_username) {
				$db->query("UPDATE {$table} SET fgettime=$AJ_TIME WHERE chatid='$chatid'");
			} else if($chat['fromuser'] == $chatuser) {
				$db->query("UPDATE {$table} SET tgettime=$AJ_TIME WHERE chatid='$chatid'");
				if($chat['tgettime'] == 0) $db->query("UPDATE {$AJ_PRE}member SET chat=chat+1 WHERE username='$chat[touser]'");
			} else {
				exit('0');
			}
		} else {
			exit('0');
		}
		$filename = get_chat_file($chatid);
		if(is_file($filename)) {
			//控制记录体积为500K
			if(filesize($filename) > 500*1024) file_put($filename, '<?php exit;?>');
		} else {
			file_put($filename, '<?php exit;?>');
		}
		$word = stripslashes(trim($word));
		$word = strip_tags($word);
		$word = dsafe($word);
		$word = nl2br($word);
		$word = strip_nr($word);
		$word = str_replace('|', ' ', $word);
		if($MOD['chat_file'] && $MG['upload']) {
			require AJ_ROOT.'/include/post.func.php';
			clear_upload($word);
		}
		$font_s = $font_s ? intval($font_s) : 0;
		$font_c = $font_c ? intval($font_c) : 0;
		$font_b = $font_b ? 1 : 0;
		$font_i = $font_i ? 1 : 0;
		$font_u = $font_u ? 1 : 0;
		$css = '';
		if($font_s) $css .= ' s'.$font_s;
		if($font_c) $css .= ' c'.$font_c;
		if($font_b) $css .= ' fb';
		if($font_i) $css .= ' fi';
		if($font_u) $css .= ' fu';
		if($css) $word = '<span class="'.trim($css).'">'.$word.'</span>';
		if($word && $fp = fopen($filename, 'a')) {
			fwrite($fp, $AJ_TIME.'|'.$chatuser.'|'.$word."\n");
			fclose($fp);
			exit('1');
		}
		exit('0');
	break;
	case 'load':
		$chatid or exit;
		$filename = get_chat_file($chatid);
		$chat = $db->get_one("SELECT * FROM {$table} WHERE chatid='$chatid'");
		if($chat) {
			$chat['status'] = 3;
			if($chat['touser'] == $_username) {//接收人
				$db->query("UPDATE {$table} SET treadtime=$AJ_TIME WHERE chatid='$chatid'");
				if($AJ_TIME - $chat['freadtime'] > $MOD['chat_poll']*3 && $AJ_TIME - $chat['freadtime'] < $MOD['chat_poll']*6) $chat['status'] = 0;//发起人断开
			} else if($chat['fromuser'] == $chatuser) {//发起人
				$db->query("UPDATE {$table} SET freadtime=$AJ_TIME WHERE chatid='$chatid'");
				if($AJ_TIME - $chat['treadtime'] > $MOD['chat_poll']*3 && $AJ_TIME - $chat['treadtime'] < $MOD['chat_poll']*6) $chat['status'] = 0;//接收人断开
			} else {
				exit('0');
			}
		} else {
			$chat['status'] = 0;
		}
		$chatlast = $_chatlast = intval($chatlast);
		$first = isset($first) ? intval($first) : 0;
		$i = $j = 0;
		$chat_lastuser = '';
		$chat_repeat = 0;
		$josn = '';
		if($chatlast < @filemtime($filename)) {
			$data = file_get($filename);
			if($data) {
				$data = trim(substr($data, 13));
				if($data) {
					$date1 = '';
					$data = explode("\n", $data);
					foreach($data as $d) {
						list($time, $name, $word) = explode("|", $d);
						if($chatuser == $name) { $chat_repeat++; } else {$chat_repeat = 0;}
						$chat_lastuser = $name;
						if($time > $chatlast && $word) {
							$chatlast = $time;
							$date2 = timetodate($time, 'Y-m-d');
							$time = timetodate($time, 'H:i:s');
							if($date2 == $date1 || !$first) {
								$date = '';
							} else {
								$date = $date1 = $date2;
							}
							if($MOD['chat_url'] || $MOD['chat_img']) {
								if(preg_match_all("/([http|https]+)\:\/\/([a-z0-9\/\-\_\.\,\?\&\#\=\%\+\;]{4,})/i", $word, $m)) {
									foreach($m[0] as $u) {
										if($MOD['chat_img'] && preg_match("/^(jpg|jpeg|gif|png|bmp)$/i", file_ext($u)) && !preg_match("/([\?\&\=]{1,})/i", $u)) {
											$word = str_replace($u, '<img src="'.$u.'" onload="if(this.width>320)this.width=320;" onclick="window.open(this.src);"/>', $word);
										} else if($MOD['chat_url']) {
											$word = str_replace($u, '<a href="'.$u.'" target="_blank">'.$u.'</a>', $word);
										}
									}
								}
							}
							if(preg_match_all("/\:([0-9]{3,})\)/i", $word, $m)) {
								foreach($m[0] as $u) {
									$f = 'face/'.substr($u, 1, -1).'.gif';
									if(is_file(AJ_ROOT.'/'.$MOD['moduledir'].'/'.$f)) $word = str_replace($u, '<img src="'.$f.'"/>', $word);
								}
							}
							$word = str_replace('"', '\"', $word);
							$self = $chatuser == $name ? 1 : 0;
							if($self) {
								$name = '我';
							} else {
								check_name($name) or $name = '游客';
								$j++;
							}
							$josn .= ($i ? ',' : '').'{time:"'.$time.'",date:"'.$date.'",name:"'.$name.'",word:"'.$word.'",self:"'.$self.'"}';
							$i = 1;
						}
					}
					if($_chatlast == 0) $j = 0;
				}
			}
		}
		#if($chat_lastuser == $chatuser && $chat_repeat > 4) $chat['status'] = 1;
		$josn = '{chat_status:"'.$chat['status'].'",chat_msg:['.$josn.'],chat_new:"'.$j.'",chat_last:"'.$chatlast.'"}';
		exit($josn);
	break;
	case 'del':
		login();
		$chatid or exit;
		$chat = $db->get_one("SELECT * FROM {$AJ_PRE}chat WHERE chatid='$chatid'");
		if($chat && ($chat['touser'] == $_username || ($chat['fromuser'] == $chatuser))) {
			$db->query("DELETE FROM {$AJ_PRE}chat WHERE chatid='$chatid'");
		}
		dmsg('删除成功', 'chat.php');
	break;
	case 'black':
		login();
		if(!is_ip($username) && !check_name($username)) message('未指定屏蔽对象');
		$black = $db->get_one("SELECT black FROM {$AJ_PRE}member WHERE userid=$_userid");
		$black = $black['black'];
		if($black) {
			$tmp = explode(' ', trim($black));
			if(in_array($username, $tmp)) {
				//
			} else {
				$black = $black.' '.$username;
			}
		} else {
			$black = $username;
		}
		$db->query("UPDATE {$AJ_PRE}member SET black='$black' WHERE userid=$_userid");
		$chatid = get_chat_id($_username, $username);
		$db->query("DELETE FROM {$table} WHERE chatid='$chatid'");
		dmsg('屏蔽成功', 'message.php?action=setting');
	break;
	case 'down':
		if($data) {
			$data = stripslashes(dsafe($data));
			$css = file_get('image/chat.css');
			$css = str_replace('#chat{width:auto;height:286px;overflow:auto;', '#chat{width:700px;margin:auto;', $css);
			$css = str_replace("url('", "url('".$MOD['linkurl']."image/", $css);
			$data = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html;charset='.AJ_CHARSET.'"/><title>聊天记录</title><style type="text/css">'.$css.'</style><base href="'.$MOD['linkurl'].'"/></head><body><div id="chat">'.$data.'</div></body></html>';
			file_down('', 'chat_'.timetodate($AJ_TIME, 'Y-m-d-H-i').'.html', $data);
		}
		exit;
	break;
	case 'contact':
		check_name($touser) or dalert('不能与自己对话', 'goback');
		$go = '?touser='.$touser.'&mid='.$mid.'&itemid='.$itemid.'&forward='.$forward;
		if($_username) dheader($go);
		$filename = get_chat_file(get_chat_id($chatuser, $touser));
		if(is_file($filename)) dheader($go);
		require AJ_ROOT.'/include/post.func.php';
		strlen($truename) > 2 or dalert('请填写联系人', 'goback');
		is_telephone($telephone) or dalert('请填写联系电话', 'goback');
		$truename = htmlspecialchars($truename);
		$word = '您好，我是'.$truename.'，电话:'.$telephone;
		if(is_email($email)) $word .= '，电子邮箱:'.$email;
		if(is_qq($qq)) $word .= '，QQ:'.$qq;
		file_put($filename, '<?php exit;?>');
		if($fp = fopen($filename, 'a')) {
			fwrite($fp, $AJ_TIME.'|'.$chatuser.'|'.$word."\n");
			fclose($fp);
		}
		$db->query("UPDATE {$AJ_PRE}member SET chat=chat+1 WHERE username='$touser'");
		dheader($go);
	break;
	default:
		if(isset($touser) && check_name($touser)) {
			if($touser == $_username) dalert('不能与自己对话', 'chat.php');
			if(!$MG['chat']) {
				login();
				dalert('您所在的会员组没有权限发起对话', 'grade.php');
			}
			$user = userinfo($touser);
			$user or dalert('会员不存在', 'chat.php');
			if($user['black']) {
				$black = explode(' ', $user['black']);
				if(in_array($chatuser, $black)) dalert('对方拒绝与您对话', 'chat.php');
				if(!$_username && in_array('Guest', $black)) dalert('对方拒绝与您对话', 'chat.php');
			}
			$chat_fromuser = $chatuser;
			$chat_touser = $touser;
			$chat_id = $chatid = get_chat_id($chat_fromuser, $chat_touser);
			$online = online($user['userid']);
			$user['type'] = 'member';
			$type = 1;
			if(!$_userid && !is_file(get_chat_file($chatid))) $type = 4;
			$head_title = '与【'.$user['company'].'】对话中';
			$chat = $db->get_one("SELECT * FROM {$table} WHERE chatid='$chatid'");
			$chat_status = 3;
			if($chat) {
				//对话已经存在
				if($chat['touser'] == $_username) {//当前为接收人
					if($AJ_TIME - $chat['freadtime'] > $MOD['chat_poll']*3) {//发起对话人已经断开
						$db->query("UPDATE {$table} SET fromuser='$chat_fromuser',touser='$chat_touser',tgettime=0 WHERE chatid='$chatid'");
					} else {//发起人在线
						dheader('?chatid='.$chatid);
					}
					//
				} else {//当前为发起人
					if($AJ_TIME - $chat['treadtime'] > $MOD['chat_poll']*3) {//接收人已经断开
						$db->query("UPDATE {$table} SET tgettime=0 WHERE chatid='$chatid'");
					} else {//接收人在线
						//
					}
				}
			} else {
				$forward = addslashes(htmlspecialchars(strip_sql($forward)));
				if(strpos($forward, $MOD['linkurl']) !== false) $forward = '';
				//创建一个新对话
				$db->query("INSERT INTO {$table} (chatid,fromuser,touser,tgettime,forward) VALUES ('$chat_id','$chat_fromuser','$chat_touser','0','$forward')");
			}
		} else if(isset($chatid) && is_md5($chatid)) {
			$chat = $db->get_one("SELECT * FROM {$table} WHERE chatid='$chatid'");
			if($chat && $chat['touser'] == $_username) {
				$chat_id = $chatid;
				$chat_status = 3;
				if(check_name($chat['fromuser'])) {
					if($AJ_TIME - $chat['freadtime'] > $MOD['chat_poll']*3) {//发起对话人已经断开
						$db->query("UPDATE {$table} SET tgettime=0 WHERE chatid='$chatid'");
						dheader('chat.php?touser='.$chat['fromuser']);
					}
					$user = userinfo($chat['fromuser']);
					$online = online($user['userid']);
					$user['type'] = 'member';
				} else {
					$user = array();
					$user['type'] = 'guest';
					$user['ip'] = $chat['fromuser'];
					$user['area'] = ip2area($chat['fromuser']);
					if($AJ_TIME - $chat['freadtime'] > $MOD['chat_poll']*3) {//发起人是游客，并且已经断开，只能查看记录
						$time = $AJ_TIME - $MOD['chat_poll']*4;
						$db->query("UPDATE {$table} SET freadtime='$time' WHERE chatid='$chatid'");
					}
				}
				$head_title = '与'.($user['type'] == 'guest' ? '【游客】' : $chat['fromuser']).'对话中';
			} else {
				dheader('chat.php');
			}
			$type = 2;
		} else {
			$F = $T = array();
			$tab = isset($tab) ? intval($tab) : -1;
			if($_username) {
				$chats = $i = 0;
				//收到的对话
				$result = $db->query("SELECT * FROM {$table} WHERE touser='$_username' ORDER BY tgettime DESC LIMIT 50");
				while($r = $db->fetch_array($result)) {
					if($i > 50) {
						$db->query("DELETE FROM {$AJ_PRE}chat WHERE chatid='$r[chatid]'");
						continue;
					}
					if(check_name($r['fromuser'])) {
						$m = userinfo($r['fromuser']);
						$r['linkurl'] = $m['linkurl'];
						$r['from'] = $m['company'];
						$r['truename'] = $m['truename'];
						$r['online'] = online($m['userid']);
					} else {
						$r['linkurl'] = '';
						$r['from'] = ip2area($r['fromuser']);
						$r['truename'] = '<span class="f_gray">游客</span>';
						$r['online'] = 1;
					}
					$r['gettime'] = $r['tgettime'] ? timetodate($r['tgettime'], 5) : '--';
					$r['new'] = 0;
					if($r['tgettime'] > $r['treadtime']) {
						$r['new'] = 1;
						$chats++;
					}
					if($AJ_TIME - $r['freadtime'] > $MOD['chat_poll']*3) {
						$r['line'] = '<span class="f_gray"></span>';//等待中
					} else {
						$r['line'] = '<span class="f_blue">对话中</span>';
					}
					$i++;
					$T[] = $r;
				}
				if($chats != $_chat) {
					$_chat = $chats;
					$db->query("UPDATE {$AJ_PRE}member SET chat=$chats WHERE userid=$_userid");
				}
			}
			//发起的对话
			$result = $db->query("SELECT * FROM {$table} WHERE fromuser='$chatuser' ORDER BY fgettime DESC LIMIT 50");
			while($r = $db->fetch_array($result)) {
				if($AJ_TIME - $r['treadtime'] > $MOD['chat_poll']*3) {
					$r['line'] = '<span class="f_gray"></span>';//等待中
				} else {
					$r['line'] = '<span class="f_blue">对话中</span>';
				}
				$r['gettime'] = $r['fgettime'] ? timetodate($r['fgettime'], 5) : '';
				$m = userinfo($r['touser']);
				$r['linkurl'] = $m['linkurl'];
				$r['online'] = online($m['userid']);
				$r['from'] = $m['company'];
				$r['truename'] = $m['truename'];
				$F[] = $r;
			}
			$head_title = '在线对话';
			$type = 3;
		}
		if($type < 3) {
			$faces = array();
			$face = glob('face/*.gif');
			if($face) {
				foreach($face as $k=>$v) {
					$faces[$k] = basename($v, '.gif');
				}
			}
			$chat_poll = $MOD['chat_poll']*1000;
		}
	break;
}
include template('chat', $module);
?>