<?php
  set_time_limit(0);
  ini_set('memory_limit','256M');
  require '../common.inc.php';
  $table = 'aijiacms_company';//要插入的数据表
  //初始化要导入的表头
  $table_head = array(
    'company',//0
    'code',//3
    'type',//5
    'rigister_time',//6
    'owner',//4
    'email',//9
    'register_mon',//7
    'intruce',//10
    'website',//11
    'telephone',//12
    'address'//8
  );
  //匹配区域id
  $areaids = array(
    '6' => '崇安',
    '9' => '南长',
    '10' => '北塘',
    '11' => '滨湖',
    '12' => '锡山',
    '13' => '惠山',
    '14' => '新区',
    '15' => '江阴',
    '16' => '宜兴'
  );
  //自动识别编码
  function array_iconv($data, $output = 'utf-8') {
    $encode_arr = array('UTF-8','ASCII','GBK','GB2312','BIG5','JIS','eucjp-win','sjis-win','EUC-JP');
    $encoded = mb_detect_encoding($data, $encode_arr);
    if (!is_array($data)) {
      return mb_convert_encoding($data, $output, $encoded);
    }
    else {
      foreach ($data as $key=>$val) {
        $key = array_iconv($key, $output);
        if(is_array($val)) {
          $data[$key] = array_iconv($val, $output);
        } else {
        $data[$key] = mb_convert_encoding($data, $output, $encoded);
        }
      }
    return $data;
    }
  }
  //lines 读取行数，offset 开始读取行数，$encode 是否转gbk到utf8
  function csv_get_lines($csvfile, $lines, $offset = 0,$encode = false) {
   if(!$fp = fopen($csvfile, 'r')) {
      return false;
   }
   $i = $j = 0;
      while (false !== ($line = fgets($fp))) {
          if($i++ < $offset) {
              continue;
          }
          break;
      }
      $data = array();
      while(($j++ < $lines) && !feof($fp)) {
        $fp_from = fgetcsv($fp);
        if($encode){
          foreach ($fp_from as $k => $v) {
            $fp_from[$k] = array_iconv($v);
          }
        }
        $data[] = $fp_from;
      }
      fclose($fp);
   return $data;
  }

  //获取区域id
  function get_areaid($address,$areaids)
  {
    foreach ($areaids as $k => $v) {
      if(strpos($address,$v)!==false)
        return $k;
    }
    return 0;
  }
  $data = csv_get_lines('./2.csv',99999,0,true);
  foreach ($data as $k => $v) {
    $keyword = $v[8].','.$v[0].','.$v[4];
    $areaid = get_areaid($v[8],$areaids);
    // print_r("insert into $table (company,code,type,rigister_time,owner,email,register_mon,intruce,website,telephone,address,keyword,areaid) VALUES ('{$v[0]}','{$v[3]}','{$v[5]}','{$v[6]}','{$v[4]}','{$v[9]}','{$v[7]}','{$v[10]}','{$v[11]}','{$v[12]}','{$v[8]}','{$keyword}','{$areaid}')");exit;
    $db->query("insert into $table (company,code,type,rigister_time,owner,email,register_mon,intruce,website,telephone,address,keyword,areaid) VALUES ('{$v[0]}','{$v[3]}','{$v[5]}','{$v[6]}','{$v[4]}','{$v[9]}','{$v[7]}','{$v[10]}','{$v[11]}','{$v[12]}','{$v[8]}','{$keyword}','{$areaid}')");
  }
  // print_r($data);exit;
  //   print_r('111');exit;
  // $a1 = file_get_content('./1.csv');
  // print_r('111');exit;

















?>
