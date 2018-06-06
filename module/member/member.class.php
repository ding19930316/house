<?php
defined('IN_AIJIACMS') or exit('Access Denied');
class member {
	var $userid;
	var $username;
	var $companyid;
	var $db;
	var $table_member;
	var $table_company;
	var $table_company_data;
	var $errmsg = errmsg;

    function member() {
		global $db;
		$this->table_member = $db->pre.'member';
		$this->table_company = $db->pre.'company';
		$this->table_company_data = $db->pre.'company_data';
		$this->db = &$db;
    }

	function is_username($username) {
		global $MOD, $L;
		if(!check_name($username)) return $this->_($L['member_username_match']);
		$MOD['minusername'] or $MOD['minusername'] = 4;
		$MOD['maxusername'] or $MOD['maxusername'] = 20;
		if(strlen($username) < $MOD['minusername'] || strlen($username) > $MOD['maxusername']) return $this->_(lang($L['member_username_len'], array($MOD['minusername'], $MOD['maxusername'])));
		if($MOD['banusername'] && !$this->userid) {
			$tmp = explode('|', $MOD['banusername']);
			foreach($tmp as $v) {
				if($MOD['banmodeu']) {
					if($username == $v) return $this->_($L['member_username_ban']);
				} else {
					if(strpos($username, $v) !== false) return $this->_($L['member_username_ban']);
				}
			}
		}
		if($this->username_exists($username)) return $this->_($L['member_username_reg']);
		return true;
	}

	function is_company($company) {
		global $MOD, $L;
		$company = trim($company);
		if($MOD['bancompany'] && !$this->userid) {
			$tmp = explode('|', $MOD['bancompany']);
			foreach($tmp as $v) {
				if($MOD['banmodec']) {
					if($company == $v) return $this->_($L['member_company_ban']);
				} else {
					if(strpos($company, $v) !== false) return $this->_($L['member_company_ban']);
				}
			}
		}
		return true;
	}

	function is_email($email) {
		global $MOD, $L;
		$email = trim($email);
		if(!is_email($email)) return $this->_($L['member_email_null']);
		if($MOD['banemail']) {
			$domain = substr(strstr($email, '@'), 1);
			$tmp = explode('|', $MOD['banemail']);
			foreach($tmp as $v) {
				if($domain == $v) return $this->_($L['member_email_ban']);
			}
		}
		return true;
	}

	function is_passport($passport) {
		global $MOD, $L;
		$MOD['minusername'] or $MOD['minusername'] = 4;
		$MOD['maxusername'] or $MOD['maxusername'] = 20;
		if(strlen($passport) < $MOD['minusername'] || strlen($passport) > $MOD['maxusername']) return $this->_(lang($L['member_passport_len'], array($MOD['minusername'], $MOD['maxusername'])));
		$badwords = array("$","\\",'&',' ',"'",'"','/','*',',','<','>',"\r","\t","\n","#");
		foreach($badwords as $v) {
			if(strpos($passport, $v) !== false) return $this->_($L['member_passport_char']);
		}
		if($MOD['banusername'] && !$this->userid) {
			$tmp = explode('|', $MOD['banusername']);
			foreach($tmp as $v) {
				if($MOD['banmodeu']) {
					if($passport == $v) return $this->_($L['member_passport_ban']);
				} else {
					if(strpos($passport, $v) !== false) return $this->_($L['member_passport_ban']);
				}
			}
		}
		if($this->passport_exists($passport)) return $this->_($L['member_passport_reg']);
		return true;
	}

	function is_password($password, $cpassword) {
		global $MOD, $L;
		if(!$password) return $this->_($L['member_password_null']);
		if($password != $cpassword) return $this->_($L['member_password_match']);
		if(!$MOD['minpassword']) $MOD['minpassword'] = 6;
		if(!$MOD['maxpassword']) $MOD['maxpassword'] = 20;
		if(strlen($password) < $MOD['minpassword'] || strlen($password) > $MOD['maxpassword']) return $this->_(lang($L['member_password_len'], array($MOD['minpassword'], $MOD['maxpassword'])));
		return true;
	}

	function is_payword($password, $cpassword) {
		global $MOD, $L;
		if(!$password) return $this->_($L['member_payword_null']);
		if($password != $cpassword) return $this->_($L['member_payword_match']);
		if(!$MOD['minpassword']) $MOD['minpassword'] = 6;
		if(!$MOD['maxpassword']) $MOD['maxpassword'] = 20;
		if(strlen($password) < $MOD['minpassword'] || strlen($password) > $MOD['maxpassword']) return $this->_(lang($L['member_payword_len'], array($MOD['minpassword'], $MOD['maxpassword'])));
		return true;
	}

		function is_clean($string) {
		$chars = array("\\", "'",'"','/','<','>',"\r","\t","\n");
		foreach($chars as $v) {
			if(strpos($string, $v) !== false) return false;
		}
		return true;
	}

	function is_member($member) {
		global $L, $AREA;
		if(!is_array($member)) return false;
		if(!$this->is_passport($member['passport'])) return false;
		if(!$member['groupid']) return $this->_($L['member_groupid_null']);
		if(strlen($member['truename']) < 2 || !$this->is_clean($member['truename'])) return $this->_($L['member_truename_null']);
		if(!$this->is_email(trim($member['email']))) return false;
		if($this->email_exists(trim($member['email']))) return $this->_($L['member_email_reg']);
		$areaid = intval($member['areaid']);
		if(!$areaid || !$this->db->get_one("SELECT areaid FROM {$this->db->pre}area WHERE areaid=$areaid")) return $this->_($L['member_areaid_null']);
		$groupid = $this->userid ? $member['groupid'] : $member['regid'];
		// if($groupid > 5&&$_POST['post']['rlcompany'] == "") {
		if($_POST['post']['rlcompany'] == "") {//这里是验证公司信息的
			if(strlen($member['company']) < 2) return $this->_($L['member_company_null']);
			if(preg_match("/[0-9]+/", $member['company']) || !$this->is_clean($member['company'])) return $this->_($L['member_company_bad']);
			if($this->company_exists($member['company'])) return $this->_($L['member_company_reg']);
			//if(strlen($member['type']) < 2) return $this->_($L['member_type_null']);
			if(strlen($member['telephone']) < 6) return $this->_($L['member_telephone_null']);
		}
		if($this->userid) {
			if($member['password'] && !$this->is_password($member['password'], $member['cpassword'])) return false;
			if($member['payword'] && !$this->is_payword($member['payword'], $member['cpayword'])) return false;
			if($member['groupid'] > 5) {
				//if(strlen($member['regyear']) != 4 || !is_numeric($member['regyear'])) return $this->_($L['member_regyear_null']);
				if(empty($member['address'])) return $this->_($L['member_address_null']);
				if(word_count($member['introduce']) < 5) return $this->_($L['member_introduce_null']);
				//if(!$member['business']) return $this->_($L['member_business_null']);
				//if(strlen($member['catid']) < 2) return $this->_($L['member_catid_null']);
			}
		} else {
			if(!$this->is_username($member['username'])) return false;
			if($member['groupid'] > 5 && !$this->is_company($member['company'])) return false;
			if(!$this->is_password($member['password'], $member['cpassword'])) return false;
		}
		// print_r("111");exit;
		return true;
	}
function set_company($post){
	// company
	// telephone
	// type
	//areaid
	//address
	//code
	//rigister_time注册时间
	//owner//法人代表
	//comemail公司邮箱
	//register_mon注册资本
	//intruce经营范围
	//website公司主页
	$member = array();
	$member['company'] = isset($post['company']) ? trim($post['company']) : '';
	$member['comemail'] = isset($post['comemail']) ? trim($post['comemail']) : '';
	$member['telephone'] = isset($post['telephone']) ? trim($post['telephone']) : '';
	$member['type'] = isset($post['type']) ? trim($post['type']) : '';
	$member['areaid'] = isset($post['areaid']) ? trim($post['areaid']) : '';
	$member['comaddress'] = isset($post['comaddress']) ? trim($post['comaddress']) : '';
	$member['code'] = isset($post['code']) ? trim($post['code']) : '';
	$member['rigister_time'] = isset($post['rigister_time']) ? trim($post['rigister_time']) : '';
	$member['owner'] = isset($post['code']) ? trim($post['owner']) : '';
	$member['register_mon'] = isset($post['register_mon']) ? trim($post['register_mon']) : '';
	$member['intruce'] = isset($post['intruce']) ? trim($post['intruce']) : '';
	$member['website'] = isset($post['website']) ? trim($post['website']) : '';
	$member['keyword'] = $post['company'].','.$post['comaddress'].','.$post['owner'];
	return $member;
}
function set_member($member) {
		global $MOD;
		$member['companyid'] = $this->companyid;
		$member['company'] = $member['company']?$member['company']:$member['rlcompany'];
		// print_r($member['companyid']);exit;
	    $member['email'] = trim($member['email']);
		$member['mail'] = isset($member['mail']) ? trim($member['mail']) : '';
		is_email($member['mail']) or $member['mail'] = '';
		$member['msn'] = isset($member['msn']) ? trim($member['msn']) : '';
		is_email($member['msn']) or $member['msn'] = '';
		$member['qq'] = isset($member['qq']) ? trim($member['qq']) : '';
		is_numeric($member['qq']) or $member['qq'] = '';
		$member['ali'] = isset($member['ali']) ? trim($member['ali']) : '';
		if(!$this->is_clean($member['ali'])) $member['ali'] = '';
		$member['skype'] = isset($member['skype']) ? trim($member['skype']) : '';
		if(!$this->is_clean($member['skype'])) $member['skype'] = '';
		$member['address'] = isset($member['address']) ? trim($member['address']) : '';
		if(!$this->is_clean($member['address'])) $member['address'] = '';
		$member['postcode'] = isset($member['postcode']) ? trim($member['postcode']) : '';
		is_numeric($member['postcode']) or $member['postcode'] = '';
		$member['mode'] = (isset($member['mode']) && is_array($member['mode']) && $member['mode']) ? implode(',', $member['mode']) : '';
		$member['keyword'] = $member['company'].','.$member['address'].','.$member['truename'].','.$member['comaddress'].','.$member['owner'];
		$member['homepage'] = isset($member['homepage']) ? fix_link($member['homepage']) : '';
		$member['capital'] = isset($member['capital']) ? dround($member['capital']) : '';
		$member['sound'] = intval($member['sound']);
		// $member['letter'] = GetPinyin($member['company']);
		if($this->userid) {
			// $member['keyword'] = $member['company'].strip_tags(area_pos($member['areaid'], ',')).','.$member['business'].','.$member['sell'].','.$member['buy'].','.$member['mode'];
			clear_upload($member['thumb'].$member['introduce'], $this->userid);
			$new = $member['introduce'];
			if($member['thumb']) $new .= '<img src="'.$member['thumb'].'">';
			$content_table = content_table(4, $this->userid, is_file(AJ_CACHE.'/4.part'), $this->table_company_data);
			$r = $this->db->get_one("SELECT content FROM {$content_table} WHERE userid=$this->userid");
			$old = $r['content'];
			$r = $this->get_one();
			if($r['thumb']) $old .= '<img src="'.$r['thumb'].'">';
			delete_diff($new, $old);
		} else {
			if($member['thumb']) clear_upload($member['thumb'].$member['introduce']);
		}
		$member['content'] = $member['introduce'];
		$member['introduce'] = addslashes(get_intro($member['content'], $MOD['introduce_length']));
		if(!defined('AJ_ADMIN')) {
			$content = $member['content'];
			unset($member['content']);
			$member = dhtmlspecialchars($member);
			$member['content'] = dsafe($content);
		}
		if($MOD['introduce_clear'] || $MOD['introduce_save']) {
			$member['content'] = stripslashes($member['content']);
			$member['content'] = save_local($member['content']);
			if($MOD['introduce_clear']) $member['content'] = clear_link($member['content']);
			if($MOD['introduce_save']) $member['content'] = save_remote($member['content']);
			$member['content'] = addslashes($member['content']);
		}
		if($member['catid']) {
			$catids = explode(',', substr($member['catid'], 1, -1));
			$cids = '';
			foreach($catids as $catid) {
				$C = get_cat($catid);
				if($C) {
					$catid = $C['parentid'] ? $C['arrparentid'].','.$catid : $catid;
					$cids .= $catid.',';
				}
			}
			$cids = array_unique(explode(',', substr(str_replace(',0,', ',', ','.$cids), 1, -1)));
			$member['catids'] = ','.implode(',', $cids).',';
		}
		return $member;
	}

	function email_exists($email) {
		$condition = "email='$email'";
		if($this->userid) $condition .= " AND userid!=$this->userid";
		return $this->db->get_one("SELECT userid FROM {$this->table_member} WHERE $condition");
	}

	function mobile_exists($mobile) {
		$condition = "mobile='$mobile'";
		if($this->userid) $condition .= " AND userid!=$this->userid";
		return $this->db->get_one("SELECT userid FROM {$this->table_member} WHERE $condition");
	}

	function username_exists($username) {
		return $this->db->get_one("SELECT userid FROM {$this->table_member} WHERE username='$username'");
	}

	function company_exists($company) {
		$condition = "company='$company'";
		// if($this->userid) $condition .= " AND userid!=$this->userid";
		// if($this->userid) $condition;
		return $this->db->get_one("SELECT userid FROM {$this->table_company} WHERE $condition");
	}

	function passport_exists($passport) {
		$condition = "passport='$passport'";
		if($this->userid) $condition .= " AND userid!=$this->userid";
		return $this->db->get_one("SELECT userid FROM {$this->table_member} WHERE $condition");
	}

	function add($member) {
																// print_r("111");exit;
		global $AJ, $AJ_TIME, $AJ_IP, $MOD, $L;
		if(!$this->is_member($member)) return false;
		// print_r("111");exit;

		// $member = $this->set_member($member);
		// $company = $this->set_company($member);
		// print_r($company);exit;
		// $member['linkurl'] = userurl($member['username']);
		// $member['password'] = $member['payword'] = md5(md5($member['password']));
		// $member['sound'] = 1;
		$member_fields = array('username','company','passport', 'password','payword','email','sound','gender','truename','mobile','msn','qq','ali','skype','department','career','groupid','regid','areaid','edittime','inviter','companyid','keyword');
		$company_fields = array('username','groupid','company','type','catid','catids','areaid', 'mode','capital','regunit','size','regyear','sell','buy','business','telephone','fax','mail','comaddress','postcode','code','homepage','introduce','rigister_time','website','intruce','register_mon','comemail','owner','thumb','keyword','linkurl','letter');
		$member_sqlk = $member_sqlv = $company_sqlk = $company_sqlv = '';
		//
		// $member_fields = array('username','company','passport', 'password','payword','email','sound','gender','truename','mobile','msn','qq','ali','skype','department','career','groupid','regid','areaid','edittime','inviter','companyid');
		// $company_fields = array('username','groupid','company','type','catid','catids','areaid', 'mode','capital','regunit','size','regyear','sell','buy','business','telephone','fax','mail','address','postcode','code','homepage','introduce','rigister_time','website','intruce','register_mon','comemail','owner','thumb','keyword','linkurl','letter');
		// $member_sqlk = $member_sqlv = $company_sqlk = $company_sqlv = '';

		//插入公司信息
		if(!$this->companyid){
			$company = $this->set_company($member);
			foreach($company as $k=>$v) {
				if(in_array($k, $company_fields)) {$company_sqlk .= ','.$k; $company_sqlv .= ",'$v'";}
			}
			$company_sqlk = substr($company_sqlk, 1);
			$company_sqlv = substr($company_sqlv, 1);
			$this->db->query("INSERT INTO {$this->table_company} ($company_sqlk) VALUES ($company_sqlv)");
			$this->companyid = $this->company_exists($member['company'])['userid'];
		}else{
			$membermore  = $this->db->get_one("select * from {$this->table_company} where userid = $this->companyid");
			$member = array_merge($membermore,$member);
			// print_r($member);exit;
		}
		//插入公司信息end

		//插入member信息
		$member = $this->set_member($member);
		$member['linkurl'] = userurl($member['username']);
		$member['password'] = $member['payword'] = md5(md5($member['password']));
		$member['sound'] = 1;
		foreach($member as $k=>$v) {
			if(in_array($k, $member_fields)) {$member_sqlk .= ','.$k; $member_sqlv .= ",'$v'";}
		}
		$member_sqlk = substr($member_sqlk, 1);
		$member_sqlv = substr($member_sqlv, 1);
		// print_r("INSERT INTO {$this->table_member} ($member_sqlk,regip,regtime,loginip,logintime)  VALUES ($member_sqlv,'$AJ_IP','$AJ_TIME','$AJ_IP','$AJ_TIME')");exit;
		$this->db->query("INSERT INTO {$this->table_member} ($member_sqlk,regip,regtime,loginip,logintime)  VALUES ($member_sqlv,'$AJ_IP','$AJ_TIME','$AJ_IP','$AJ_TIME')");
		// print_r("select max(userid) as userid from {$this->table_member}");exit;
		$rs = $this->db->query("select max(userid) as userid from {$this->table_member}");
		$this->userid = $member['userid'] = $this->db->fetch_array($rs)['userid'];
		//插入member信息end

		if(!$this->userid) return 0;
		// $member['userid'] = $this->userid;
		// $this->username = $member['username'];
		// $content_table = content_table(4, $this->userid, is_file(AJ_CACHE.'/4.part'), $this->table_company_data);
	  //   $this->db->query("INSERT INTO {$content_table} (userid, content) VALUES ('$this->userid', '$member[content]')");
		// if($MOD['credit_register'] > 0) {
		// 	credit_add($this->username, $MOD['credit_register']);
		// 	credit_record($this->username, $MOD['credit_register'], 'system', $L['member_record_reg'], $AJ_IP);
		// }
		//
		// if($MOD['money_register'] > 0) {
		// 	money_add($this->username, $MOD['money_register']);
		// 	money_record($this->username, $MOD['money_register'], $L['in_site'], 'system', $L['member_record_reg'], $AJ_IP);
		// }
		// if($MOD['sms_register'] > 0) {
		// 	sms_add($this->username, $MOD['sms_register']);
		// 	sms_record($this->username, $MOD['sms_register'], 'system', $L['member_record_reg'], $AJ_IP);
		// }
		return $this->userid;
	}

	function edit($member)	{
		// print_r(111);exit;

		// if(!$this->is_member($member)) return false;
		// print_r(111);exit;

		$member = $this->set_member($member);
		$r = $this->get_one();
		$member['linkurl'] = userurl($r['username'], '', $member['domain']);
		$member_fields = array('username','passport', 'password','payword','email','sound','gender','truename','mobile','msn','qq','ali','skype','department','career','regid','areaid','edittime','inviter','keyword','address');
		if(!$member['password']){
			$member_fields = array('username','passport','payword','email','sound','gender','truename','mobile','msn','qq','ali','skype','department','career','regid','areaid','edittime','inviter','keyword','address');
			}
		$company_fields = array('username','type','catid','catids','areaid', 'mode','capital','regunit','size','regyear','sell','buy','business','telephone','fax','mail','comaddress','postcode','code','introduce','rigister_time','website','intruce','register_mon','comemail','owner','thumb','keyword','linkurl','letter');
		$member_sql = $company_sql = '';
		foreach($member as $k=>$v) {
			if(in_array($k, $member_fields)) $member_sql .= ",$k='$v'";
			if(in_array($k, $company_fields)) $company_sql .= ",$k='$v'";
		}
		if($member['password']) {
			$password = md5(md5($member['password']));
			$member_sql .= ",password='$password'";
		}
		if($member['payword']) {
			$payword = md5(md5($member['payword']));
			$member_sql .= ",payword='$payword'";
		}
        $member_sql = substr($member_sql, 1);
        $company_sql = substr($company_sql, 1);
	    $this->db->query("UPDATE {$this->table_member} SET $member_sql WHERE userid=$this->userid");
			$this->companyid = $this->db->get_one("select companyid from {$this->table_member} WHERE userid=$this->userid")['companyid'];
	    $this->db->query("UPDATE {$this->table_company} SET $company_sql WHERE userid=$this->companyid");
		$content_table = content_table(4, $this->userid, is_file(AJ_CACHE.'/4.part'), $this->table_company_data);
	    $this->db->query("UPDATE {$content_table} SET content='$member[content]' WHERE userid=$this->userid");
		$member['userid'] = $this->userid;
		$member['vip'] = $r['vip'];
		userclean($member['username']);
		return true;
	}

	function get_one($username = '') {
		$condition = $username ? "m.username='$username'" : "m.userid='$this->userid'";
        return $this->db->get_one("SELECT * FROM {$this->table_member} m,{$this->table_company} c WHERE m.userid=c.userid AND $condition");
	}

	function get_one_c($username = '') {
		$condition = $username ? "m.username='$username'" : "m.userid='$this->userid'";
		// print_r("SELECT * FROM {$this->table_member} m,{$this->table_company} c WHERE m.companyid=c.userid AND $condition");exit;
				return $this->db->get_one("SELECT * FROM {$this->table_member} m,{$this->table_company} c WHERE m.companyid=c.userid AND $condition");
	}



	function get_list($condition, $order = 'userid DESC') {
				// print_r("SELECT * FROM {$this->table_member} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");exit;
		global $pages, $page, $pagesize, $offset, $sum;
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $this->db->get_one("SELECT COUNT(*) AS num FROM {$this->table_member} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);
		$members = array();
		$result = $this->db->query("SELECT * FROM {$this->table_member} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $this->db->fetch_array($result)) {
			$r['logindate'] = timetodate($r['logintime'], 5);
			$r['regdate'] = timetodate($r['regtime'], 5);
			$members[] = $r;
		}
		return $members;
	}

	function login($login_username, $login_password, $login_cookietime = 0, $admin = false) {
		global $AJ_TIME, $AJ_IP, $MOD, $MODULE, $L;
		if(!check_name($login_username)) return $this->_($L['member_login_username_bad']);
		if(!$MOD || !isset($MOD['login_times'])) $MOD = cache_read('module-2.php');
		$login_lock = ($MOD['login_times'] && $MOD['lock_hour']) ? true : false;
		$LOCK = array();
		if($login_lock) {
			$LOCK = cache_read($AJ_IP.'.php', 'ban');
			if($LOCK) {
				if($AJ_TIME - $LOCK['time'] < $MOD['lock_hour']*3600) {
					if($LOCK['times'] >= $MOD['login_times']) return $this->_(lang($L['member_login_ban'], array($MOD['login_times'], $MOD['login_times'])));
				} else {
					$LOCK = array();
					cache_delete($AJ_IP.'.php', 'ban');
				}
			}
		}
		$user = userinfo($login_username, 0);
		if(!$user) {
			$this->lock($login_lock, $LOCK, $AJ_IP, $AJ_TIME);
			return $this->_($L['member_login_not_member']);
		}
						// print_r("1111");exit;
		if(!$admin) {
			if($user['password'] != (is_md5($login_password) ? md5($login_password) : md5(md5($login_password)))) {
				$this->lock($login_lock, $LOCK, $AJ_IP, $AJ_TIME);
				return $this->_($L['member_login_password_bad']);
			}
		}
		if($user['groupid'] == 2) return $this->_($L['member_login_member_ban']);
		$userid = $user['userid'];

		if(isset($MODULE[16])) {
			$cart = get_cookie('cart');
			if($cart) $this->cart($cart, $userid, $AJ_TIME);
		}

		if($MOD['credit_login'] > 0 && timetodate($AJ_TIME, 3) != timetodate($user['logintime'], 3)) {
			credit_add($login_username, $MOD['credit_login']);
			credit_record($login_username, $MOD['credit_login'], 'system', $L['member_record_login'], $AJ_IP);
		}
		$cookietime = $AJ_TIME + ($login_cookietime ? intval($login_cookietime) : 86400*7);
		$auth = encrypt($user['userid']."\t".$user['username']."\t".$user['groupid']."\t".$user['password']."\t".$user['admin']);
    set_cookie('auth', $auth, $cookietime);
		set_cookie('userid', $user['userid'], $cookietime);
		set_cookie('username', $user['username'], $AJ_TIME + 86400*365);
		$this->db->query("UPDATE {$this->table_member} SET loginip='$AJ_IP',logintime=$AJ_TIME,logintimes=logintimes+1 WHERE userid=$userid");
		return $user;
	}

	function cart($cart, $userid, $time) {//SYNC
		$t = $this->db->get_one("SELECT data FROM {$this->db->pre}mall_cart WHERE userid=$userid");
		$cart2 = $t ? $t['data'] : '';
		$cart1 = $cart;
		if($cart1 != $cart2) {
			$a1 = $cart1 ? explode(',', substr($cart1, 1)) : array();
			$a2 = $cart2 ? explode(',', substr($cart2, 1)) : array();
			$a3 = implode(',', array_unique(array_merge($a1, $a2)));
			if($a3) {
				$cart = ','.$a3;
				set_cookie('cart', $cart, $time + 30*86400);
				$this->db->query("REPLACE INTO {$this->db->pre}mall_cart (userid,data,edittime) VALUES ('$userid', '".addslashes($cart)."', '$time')");
			}
		}
	}

	function lock($login_lock, $LOCK, $AJ_IP, $AJ_TIME) {
		if($login_lock && $AJ_IP) {
			$LOCK['time'] = $AJ_TIME;
			$LOCK['times'] = isset($LOCK['times']) ? $LOCK['times']+1 : 1;
			cache_write($AJ_IP.'.php', $LOCK, 'ban');
		}
	}

	function logout() {
		global $_userid;
		$this->db->query("DELETE FROM {$this->db->pre}online WHERE userid=$_userid");
		set_cookie('auth', '');
		set_cookie('userid', '');
		return true;
	}

	function delete($userid) {
		global $dc, $AJ_PRE, $CFG, $MODULE, $L;
		if(!$userid) return false;
		if(is_array($userid)) {
			if(in_array(1, $userid) || in_array($CFG['founderid'], $userid)) return $this->_($L['member_founder_del']);
			$userids = implode(',', $userid);
		} else {
			if($userid == 1 || $userid == $CFG['founderid']) return $this->_($L['member_founder_del']);
			$userids = intval($userid);
		}
		$result = $this->db->query("SELECT username,userid FROM {$this->table_member} WHERE userid IN ($userids)");
		while($r = $this->db->fetch_array($result)) {
			$userid = $r['userid'];
			$username = $r['username'];
			if(!$userid || !$username) continue;
			$content_table = content_table(4, $userid, is_file(AJ_CACHE.'/4.part'), $this->table_company_data);
			$content_table = str_replace($AJ_PRE, '', $content_table);
			foreach(array('alert', 'ask', 'comment', 'honor', 'finance_card', 'finance_cash', 'finance_charge', 'finance_credit', 'finance_pay', 'finance_record', 'finance_sms', 'guestbook', 'job_talent', 'link', 'admin_log', 'login', 'mail_list', 'spread', 'upgrade', 'know_answer', 'know_vote', 'validate', 'news', 'page', 'address', 'oauth', 'vote_record', 'gift_order', 'poll_record') as $v) {
				$this->deluser($v, $username, true);
			}
			foreach(array('news', 'resume') as $v) {
				$this->deluser($v, $username, true, true);
			}
			foreach($MODULE as $m) {
				if($m['islink'] || $m['moduleid'] < 5) continue;
				if(in_array($m['module'], array('article', 'newhouse', 'buy', 'sale', 'info', 'photo', 'rent', 'video'))) {
					$this->deluser($m['module'].'_'.$m['moduleid'], $username, true, true, $m['moduleid']);
				} else {
					$this->deluser($m['module'], $username, true, true, $m['moduleid']);
				}
			}
			$this->db->query("DELETE FROM {$AJ_PRE}group_order WHERE seller='$username'");
			//$this->db->query("DELETE FROM {$AJ_PRE}job_apply WHERE apply_username='$username'");
			$this->db->query("DELETE FROM {$AJ_PRE}message WHERE fromuser='$username'");
			$this->db->query("DELETE FROM {$AJ_PRE}message WHERE touser='$username'");
			$this->db->query("DELETE FROM {$AJ_PRE}mall_order WHERE seller='$username'");
			$this->db->query("DELETE FROM {$AJ_PRE}mall_comment WHERE seller='$username'");
			$this->db->query("DELETE FROM {$AJ_PRE}mall_cart WHERE userid='$userid'");
			$this->db->query("DELETE FROM {$AJ_PRE}type WHERE item='friend-".$userid."'");
			$this->db->query("DELETE FROM {$AJ_PRE}type WHERE item='favorite-".$userid."'");
			$this->db->query("DELETE FROM {$AJ_PRE}type WHERE item='product-".$userid."'");
			$this->db->query("DELETE FROM {$AJ_PRE}type WHERE item='news-".$userid."'");
			//$this->db->query("DELETE FROM {$AJ_PRE}type WHERE item='mall-".$userid."'");
			foreach(array('member', 'company', $content_table, 'company_setting', 'admin', 'favorite', 'friend') as $v) {
				$this->deluser($v, $userid, false);
			}
			userclean($username);
			$this->delupload($username, $userid);
		}
		return true;
	}

	function deluser($table, $user, $name = true, $data = false, $moduleid = 0) {
		global $AJ_PRE, $MODULE;
		if(!$user) return;
		$fields = $name ? 'username' : 'userid';
		if($data) {
			$result = $this->db->query("SELECT * FROM {$AJ_PRE}{$table} WHERE `$fields`='$user'");
			while($r = $this->db->fetch_array($result)) {
				$itemid = $r['itemid'];
				$this->db->query("DELETE FROM {$AJ_PRE}{$table} WHERE itemid='$itemid'");
				$table_data = strpos($table, '_') === false ? $table.'_data' : str_replace('_', '_data_', $table);
				$table_data = $AJ_PRE.$table_data;
				if($moduleid) $table_data = content_table($moduleid, $itemid, is_file(AJ_CACHE.'/'.$moduleid.'.part'), $table_data);
				$this->db->query("DELETE FROM {$table_data} WHERE itemid='$itemid'");
				if($MODULE[$moduleid]['module'] == 'sale') $this->db->query("DELETE FROM {$this->db->pre}sale_search_{$moduleid} WHERE itemid=$itemid");
				if($moduleid && $r['linkurl'] && strpos($r['linkurl'], '://') === false && strpos($r['linkurl'], '.php') === false && strpos($r['linkurl'], 'show-') === false) {
					$html = AJ_ROOT.'/'.$MODULE[$moduleid]['moduledir'].'/'.$r['linkurl'];
					if(is_file($html)) file_del($html);
				}
			}
		} else {
			$this->db->query("DELETE FROM {$AJ_PRE}{$table} WHERE `$fields`='$user'");
		}
	}

	function delupload($username, $userid) {
			if(!$userid || !$username) return;
		$result = $this->db->query("SELECT fileurl FROM {$this->db->pre}upload_".($userid%10)." WHERE username='$username'");
		while($r = $this->db->fetch_array($result)) {
			 delete_upload($r['fileurl'], $userid);
		}
	}

	function rename($cusername, $nusername) {
		global $AJ_PRE, $MODULE, $L;
		$cusername = trim($cusername);
		$nusername = trim($nusername);
		if(!$this->username_exists($cusername)) return $this->_($L['member_rename_not_member']);
		if(!$this->is_username($nusername)) return false;
		$tables = array('alert', 'ask', 'comment', 'honor', 'finance_card', 'finance_cash', 'finance_charge', 'finance_pay', 'finance_record', 'finance_sms', 'guestbook', 'link', 'admin_log', 'login', 'mail_list', 'spread', 'news',  'upgrade',  'news', 'page', 'address', 'oauth', 'vote_record', 'gift_order', 'poll_record', 'member', 'company','article_8','buy_16','rent_7','newhouse_6','sale_5','info_13','photo_12','video_14','group');

		foreach($tables as $table) {
			$this->db->query("UPDATE {$AJ_PRE}{$table} SET username='$nusername' WHERE username='$cusername'");
		}
		//$this->db->query("UPDATE {$AJ_PRE}mall_order SET buyer='$nusername' WHERE buyer='$cusername'");
		//$this->db->query("UPDATE {$AJ_PRE}mall_order SET seller='$nusername' WHERE seller='$cusername'");
		$this->db->query("UPDATE {$AJ_PRE}group_order SET buyer='$nusername' WHERE buyer='$cusername'");
		$this->db->query("UPDATE {$AJ_PRE}group_order SET seller='$nusername' WHERE seller='$cusername'");
		//$this->db->query("UPDATE {$AJ_PRE}job_apply SET apply_username='$nusername' WHERE apply_username='$cusername'");
		$this->db->query("UPDATE {$AJ_PRE}message SET fromuser='$nusername' WHERE fromuser='$cusername'");
		$this->db->query("UPDATE {$AJ_PRE}message SET touser='$nusername' WHERE touser='$cusername'");
		userclean($cusername);
		return true;
	}

	function move($userid, $groupid) {
		global $CFG, $L;
		if(is_array($userid)) {
			foreach($userid as $v) { $this->move($v, $groupid); }
		} else {
			$userid = intval($userid);
			if($userid == 1 || $userid == $CFG['founderid']) return $this->_($L['member_founder_move']);
			$this->userid = $userid;
			$user = $this->get_one();
			if($user) {
				$this->db->query("UPDATE {$this->table_member} SET groupid='$groupid' WHERE userid=$userid");
				$this->db->query("UPDATE {$this->table_company} SET groupid='$groupid' WHERE userid=$userid");
				userclean($user['username']);
			}

		}
		return true;
	}

	function check($userid) {
		if(is_array($userid)) {
			foreach($userid as $v) { $this->check($v); }
		} else {
			$this->userid = $userid;
			$user = $this->get_one();
			if($user) {
				$groupid = $user['regid'] ? $user['regid'] : 6;
				$this->db->query("UPDATE {$this->table_member} SET groupid=$groupid WHERE userid=$userid");
				$this->db->query("UPDATE {$this->table_company} SET groupid=$groupid WHERE userid=$userid");
				userclean($user['username']);
			}
			return true;
		}
	}

	function login_log($username, $password, $admin = 0, $message = '') {
		global $AJ_PRE, $AJ_TIME, $AJ_IP, $L;
		$password = is_md5($password) ? md5($password) : md5(md5($password));
		$agent = addslashes(strip_sql($_SERVER['HTTP_USER_AGENT']));
		$message or $message = $L['member_login_ok'];
		if($message == $L['member_login_ok']) cache_delete($AJ_IP.'.php', 'ban');
		$this->db->query("INSERT INTO {$AJ_PRE}login (username,password,admin,loginip,logintime,message,agent) VALUES ('$username','$password','$admin','$AJ_IP','$AJ_TIME','$message','$agent')");
	}

	function _($e) {
		$this->errmsg = $e;
		return false;
	}
}

?>
