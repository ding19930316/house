<?php defined('IN_AIJIACMS') or exit('Access Denied');?> <ul id="hlist" class="hlist xq_list">
 <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
 <li>
                                <a href="<?php echo $t['linkurl'];?>" class="hl_img" target="_blank" title="<?php echo $t['alt'];?>">
                                    <img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>">
                                </a>
                                <div>
                                    <h3><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></h3>
                                    <p><?php echo area_pos($t['areaid'], '');?><?php echo $t['address'];?></p>
                                    <p><a href="<?php echo $t['linkurl'];?>" target="_blank">小区概括</a><i>|</i><a href="<?php echo $t['linkurl'];?>price.html" target="_blank">价格走势</a><i>|</i><a href="<?php echo $t['linkurl'];?>sale.html" target="_blank">小区房源</a><i>|</i><a href="<?php echo $t['linkurl'];?>map.html" target="_blank">地图交通</a></p>
                                    <p class="num_house"><span>二手房：</span><strong><?php echo get_sale($t['itemid']);?></strong><span class="first">租房：</span><strong><?php echo get_rent($t['itemid']);?></strong></p>
                                                                            <span class="price_1">售价：<?php if(get_avg_price($t['itemid'])) { ?><b><?php echo get_avg_price($t['itemid']);?></b>元/㎡<?php } else { ?><b>待定</b><?php } ?>
</span>
                                                                                    <span class="price_2">同比上月：                                                <b class="down"><?php if($t['avg_price']>$t['avg_priceb'] and $t['percent_change']<>0) { ?><b class="up"><?php echo $t['percent_change'];?>%</b><?php } else if($t['avg_price']< $t['avg_priceb']) { ?><b class="down"><?php echo $t['percent_change'];?>%</b><?php } else { ?><b>→</b><?php } ?>
</b>
                                                                                            </span>
                                                                            
                                                                    </div>
                            </li>
<?php } } ?>
</ul>
<?php if($showpage && $pages) { ?><div class="pagination"><?php echo $pages;?></div><?php } ?>
