<?php 
defined('IN_AIJIACMS') or exit('Access Denied');
class address {
	var $itemid;
	var $db;
	var $table;
	var $fields;
	var $errmsg = errmsg;

    function address() {
		global $db;
		$this->table = $db->pre.'address';
		$this->db = &$db;
		$this->fields = array('address','postcode','truename','telephone','mobile','username','addtime','editor','edittime','listorder','note');
    }

	function pass($post) {
		global $L;
		if(!is_array($post)) return false;
		if(!$post['address']) return $this->_($L['pass_address']);
		if(!$post['postcode']) return $this->_($L['pass_postcode']);
		if(!$post['truename']) return $this->_($L['pass_truename']);
		if(!$post['mobile']) return $this->_($L['pass_mobile']);
		return true;
	}

	function set($post) {
		global $AJ_TIME, $_username;
		if(isset($post['areaid'])) $post['address'] = area_pos($post['areaid'], '').$post['address'];
		$post['edittime'] = $AJ_TIME;
		$post['editor'] = $_username;
		$post['listorder'] = intval($post['listorder']);
		if($this->itemid) {
			//$post['editor'] = $_username;
		} else {
			$post['addtime'] = $AJ_TIME;
		}
		$post = dhtmlspecialchars($post);		
		return array_map("trim", $post);
	}

	function get_one($condition = '') {
        return $this->db->get_one("SELECT * FROM {$this->table} WHERE itemid=$this->itemid $condition");
	}

	function get_list($condition, $order = 'listorder ASC,itemid ASC') {
		global $MOD, $pages, $page, $pagesize, $offset, $sum;
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $this->db->get_one("SELECT COUNT(*) AS num FROM {$this->table} WHERE $condition");
			$items = $r['num'];
		}
		$pages = pages($items, $page, $pagesize);
		$lists = array();
		$result = $this->db->query("SELECT * FROM {$this->table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $this->db->fetch_array($result)) {
			$r['adddate'] = timetodate($r['addtime'], 5);
			$r['editdate'] = timetodate($r['edittime'], 5);
			$lists[] = $r;
		}
		return $lists;
	}

	function add($post) {
		global $MOD, $L;
		$post = $this->set($post);
		$sqlk = $sqlv = '';
		foreach($post as $k=>$v) {
			if(in_array($k, $this->fields)) { $sqlk .= ','.$k; $sqlv .= ",'$v'"; }
		}
        $sqlk = substr($sqlk, 1);
        $sqlv = substr($sqlv, 1);
		$this->db->query("INSERT INTO {$this->table} ($sqlk) VALUES ($sqlv)");
		$this->itemid = $this->db->insert_id();		
		return $this->itemid;
	}

	function edit($post) {
		$post = $this->set($post);
		$sql = '';
		foreach($post as $k=>$v) {
			if(in_array($k, $this->fields)) $sql .= ",$k='$v'";
		}
        $sql = substr($sql, 1);
	    $this->db->query("UPDATE {$this->table} SET $sql WHERE itemid=$this->itemid");
		return true;
	}

	function delete($itemid, $all = true) {
		global $MOD, $L;
		if(is_array($itemid)) {
			foreach($itemid as $v) { $this->delete($v); }
		} else {
			$this->itemid = $itemid;
			$this->db->query("DELETE FROM {$this->table} WHERE itemid=$itemid");
		}
	}

	function _($e) {
		$this->errmsg = $e;
		return false;
	}
}
?>