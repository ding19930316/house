<?php defined('IN_AIJIACMS') or exit('Access Denied');?><ul id="hlist" class="hlist">
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
    <li>
                            <a href="<?php echo $t['linkurl'];?>" class="hl_img" target="_blank" title="<?php echo $t['alt'];?>">
                                  <u class=" <?php if($t['ishot']) { ?> hl_u2<?php } ?>
"></u>                
                                <img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>">
                            </a>
                            <div>
                                <h3><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?> <?php if($t['istop']) { ?><u class="ding"></u> <?php } ?>
</a></h3>
                                <p><a href="<?php echo $MODULE['18']['linkurl'];?><?php echo $t['houseid'];?>/" target="_blank" ><?php echo $t['housename'];?></a> <?php echo area_pos($t['areaid'], '');?><?php echo $t['address'];?></p>
                                                             <?php if($t['fyts']) { ?>   <p>
                                                                           <?php $ts=explode(",",$t['fyts']);?>
                    <?php if(is_array($ts)) { foreach($ts as $ks => $vs) { ?>
                     <span class="ts" style="background:#<?php echo rand(0,255);?>;"><?php echo $vs;?></span>
                    <?php } } ?>  </p><?php } ?>
                                                                <p><?php if($t['room']) { ?><?php echo $t['room'];?>室<?php } ?>
<?php if($t['hall']) { ?><?php echo $t['hall'];?>厅<?php } ?>
<?php if($t['toilet']) { ?><?php echo $t['toilet'];?>卫<?php } ?>
<i>|</i><?php echo $t['houseearm'];?>平米<i>|</i>：<?php echo floor($t['price']*10000/$t['houseearm']);?>元/㎡<i>|</i><?php echo $t['floor1'];?>/<?php echo $t['floor2'];?>层<i>|</i><?php echo getbox_diaoval('fix','checkbox',$t['fix'],'sale_5');?><i>|</i>朝向<?php echo getbox_diaoval('toward','checkbox',$t['toward'],'sale_5');?><i>|</i>房龄<?php echo $t['houseyear'];?>年                                </p>
                                <p class="gray9"><a href="<?php echo userurl($t['username'], '');?>"  target="_blank" title="<?php echo $t['truename'];?>" class="gray9"><?php echo $t['truename'];?></a><?php echo timetodate($t['edittime'], $datetype);?>更新</p>
                                <span class="price"><b><?php if($t['price']) { ?><?php echo $t['price'];?></b>万元<?php } else { ?>面议</b><?php } ?>
</span>
 <a href="javascript:" class="hlist_db" data-val="<?php echo $t['itemid'];?>" data-url="<?php echo $t['linkurl'];?>" data-name="<?php echo dsubstr($t['alt'], 12, $suffix = '..');?>">比比看</a>
                           

                               
                            </div>
                        </li>
<?php } } ?>
</ul>
<?php if($showpage && $pages) { ?><div class="pagination"><?php echo $pages;?></div><?php } ?>
