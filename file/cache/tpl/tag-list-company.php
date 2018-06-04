<?php defined('IN_AIJIACMS') or exit('Access Denied');?>  <ul id="hlist" class="hlist xq_list broker_li">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <?php
    switch ($t['modtype']) {
      case 'aijiacms_company':
        $url = $CFG['url']."index.php?homepage=".$t['company'];
        break;
      case 'aijiacms_rent_7':
        $url = $CFG['url']."/rent/show-".$t['id'].".html";
        break;
      case 'aijiacms_newhouse_6':
        $url = "house/show.php/itemid-".$t['id'].'/';
        break;
      case 'aijiacms_member':
          $url = $CFG['url']."index.php?homepage=".$t['company']."&member=".$t['id'];
          break;
      case 'aijiacms_sale_5':
        $url = $CFG['url']."/sale/show-".$t['id'].".html";
          break;
    }
    $url_company = $CFG['url']."index.php?homepage=".$t['company'];
  ?>
       <li>
          <a href="<?php echo $url?>" target="_blank" class="hl_img broker_img" title="<?php echo $t['company'];?>">
              <img src="<?php echo useravatar($t['username'], 'large');?>" alt="<?php echo $t['company'];?>">
          </a>
          <div>
              <!-- <h3><a href="<?php echo userurl($t['username'], '');?>" target="_blank"><?php echo userinfos($t['username']);?></a>&nbsp;<?php if($t['vcompany']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_company.gif" width="16" height="16" align="absmiddle" title="通过工商认证"/><?php } ?>
</h3> -->
              <h3><a href="<?php echo $url?>" target="_blank"><?php echo $t['title'];?></a></h3>
              <p>所属公司：<a href="<?php echo $url_company?>" target="_blank"><?php echo $t['company'];?></a></p>
              <p>区域：<?php echo area_pos($t['areaid'], '');?></p>
              <!-- <p class="num_house">房源：<a href="<?php echo userurl($t['username'], '');?>" target="_blank">售(<?php echo get_num('sale_5',$t['username']);?>)</a> <a href="<?php echo userurl($t['username'], '');?>" target="_blank">租(<?php echo get_num('rent_7',$t['username']);?>)</a></p> -->
              <p>电话：<?php echo $t['telephone'];?></p>
              <p>地址：<?php echo $t['address'];?></p>
              <!-- <a class="in_dianpu">地址<p><?php echo $t['address'];?></p></a> -->
          </div>
        </li>
 <?php } } ?>
 </ul>
<?php if($showpage && $pages) { ?> <div class="pagination"><?php echo $pages;?></div><?php } ?>
