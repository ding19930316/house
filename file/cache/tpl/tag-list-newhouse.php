<?php defined('IN_AIJIACMS') or exit('Access Denied');?><div class="xf_sh_list_b">
<ul class="list">
               <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?> 
      
                            <li class="cf <?php if($t['level']) { ?>tg<?php } else { ?> pt<?php } ?>
">
 <?php if($t['level']) { ?><div class="icon">推荐</div><?php } ?>
      
                                                            <div class="thumb fl">
                                    <div class="img"><a href="<?php echo $t['linkurl'];?>"  title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" width="160" height="120"></a>
</div>
                                    <div class="text">
                                        <h3><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a><i class="selstag<?php echo $t['typeid'];?>"></i></h3>
                                        <p>地址：[<?php echo area_pos($t['areaid'], '');?>] <?php echo dsubstr($t['address'], 42, '...');?><a href="<?php echo $t['linkurl'];?>peitao.html" class="loc xxicon icon-6" target="_blank">查看地图</a></p>
                                        <p>类型：<?php echo search_cats($t['catid'], '6');?>&nbsp;&nbsp;</p>                                        <div class="other tag cf">
                                      <?php if($t['lpts']) { ?><?php echo getbox_val('lpts','checkbox',$t['lpts'],'newhouse_6');?><?php } ?>
                                </div>
                                    </div>
                                                                        
                                                                    </div>
                                <div class="detail fr">
                                    <div class="jg"><?php if($t['price']) { ?><?php echo $t['price'];?><span>元/平米</span><?php } else { ?>待定<?php } ?>
</div>
                                   
                                    <div class="tel"><i></i><?php echo $t['telephone'];?></div>
                                    <div class="other">
                                        <a href="<?php echo $t['linkurl'];?>wenfang.html" class="wd" target="_blank"><i></i>问答</a>
                                        <a href="<?php echo $t['linkurl'];?>dianping.html" class="pl" target="_blank"><i></i>评论</a>

                                        <a href="javascript:void(0);" class="db" data-val="<?php echo $t['itemid'];?>"  data-url="<?php echo $t['linkurl'];?>" data-name="<?php echo $t['alt'];?>"><i></i>对比</a>
                                    </div>
                                </div>
                            </li><?php } } ?>
</ul>
</div>

<div class="pagination"><?php echo $pages;?></div>

