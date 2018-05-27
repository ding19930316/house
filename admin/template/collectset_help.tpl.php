<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<style>
.tb .t1{text-align:center;}
.tb .t2{text-align:left;padding-left:20px;}
.tb span{color:red;}
</style>
<div class="tt">常见错误</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td width="200" class="t1">Invalid Request</td>
<td class="t2">1.检查是否按照安装说明修改了根目录的admin.php文件</td>
</tr>
<tr>
<td width="200" class="t1">空白界面</td>
<td class="t2">1.首次安装请检查admin/config/collectsite.default.php是否改为collectsite.php<BR>2..检查是否缺少文件</td>
</tr>
<tr>
<td width="200" class="t1">房源名称为空</td>
<td class="t2">可能你采集的房源小于3个字符，AJ系统默认小于3字符提示错误</td>
</tr>
</table>
<div class="tt">添加规则说明</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td width="200" class="t1"><span>*</span> 采集器名称</td>
<td class="t2">可以重复，但为了区分，不建议重复，一般为网站名称。例：爱房网</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"><span>*</span> 网站地址</td>
<td class="t2">要采集网站网址。例：http://chengdu.aifang.com </td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"><span>*</span> 采集器标识</td>
<td class="t2">不能重复，一般为所采集站点的域名简写，以和其他规则区分。例：aifang</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">数据采集入库接口</td>
<td class="t2">可针对不同规则调用不同采集入库接口，除非特殊需要，一般不需要填写，默认为空，使用系统api接口</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">代理服务器地址</td>
<td class="t2">主要针对有的网站可能会封你的采集IP，此时特使用代理IP，不使用代理服务器请留空</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">身份验证模式</td>
<td class="t2">采集时验证身份使用<BR>
1. 创始人 验证是否为创始人，需要登录<BR>
2. 验证密钥 如果设置为验证密钥，则必须设置 入库密钥[推荐]<BR>
3. 验证IP 如果设置为验证IP，则必须设置 允许的IP<BR>
4. 关闭接口
</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">数据入库模式</td>
<td class="t2">
1.	数据入库模式为“系统类库”时，系统调用内置的类文件入库，自动抛弃多余字段<BR>
2.	“数据自定义”模式，系统根据发送的数据构造SQL语句入库，不对发送的字段进行处理，字段名和数据表内一致<BR>
强烈建议使用“系统类库” 模式，否则会有许多错误
</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">信息发布状态</td>
<td class="t2">信息采集入库的状态，默认“通过”</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">错误日志</td>
<td class="t2">开启后，如果采集出错，会写入日志文件，日志文件位置：admin/config/spider/</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">发送REFERER</td>
<td class="t2">用于突破防采集设置 ，默认选“否”,不知道怎么用，选“是”先突破下再说</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">对方网页编码</td>
<td class="t2">（自动检测 GB2312  UTF8  BIG5）默认“自动检测” 编码与本站不同将自动尝试转换</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">标题不允许重复</td>
<td class="t2">开启后，对于已存在的信息标题将不再采集，启用此项将轻微加重数据库的负载</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">详细内容是否格式化</td>
<td class="t2">格式化内容将去除内容的HTML标签（指采集信息的详细内容，非指所有采集标签内容），如果采集到内容有排版格式，格式化后将不存在，一般不用格式化</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">信息发布人入库</td>
<td class="t2">启用发布人入库，采集信息同时会采集信息发布人信息，否则只记录发布人用户名，如果采集不到发布人信息，将使用当前登陆用户作为发布人。开启此项将加重数据库的负载，开启此项需在采集规则列表里添加采集标签uid，以替换会员内容页URL地址的变量<{infoid}>，uid为空时使用username值
</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">发布人规则名称</td>
<td class="t2">启用信息发布人入库，需选择一个会员采集规则</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"><span>*</span> 内容页URL地址</td>
<td class="t2">要采集的内容页URL，例：http://chengdu.aifang.com/loupan/canshu-<{infoid}>.html，<{infoid}>是要替换的序号变量</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"><span>*</span> 采集规则列表</td>
<td class="t2">具体要采集的内容标签规则，每个规则必须换行，书写格式为“标签名=”。例：title=&lt;input type='hidden' name='title' value="(.*)"，就是一个标题采集规则。<br>每个模块都有许多标签，但不是每个标签都要采集</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">多页采集规则</td>
<td class="t2">此处不是指内容的分页采集，而是指要采集的标签可能不是在同一页面，例如：会员信息的采集，联系信息和公司信息在不同页面，需要使用多页采集。<BR>
多页规则书写格式：pageurl=采集页URL（URL格式和上面内容页URL格式一样，可使用内容页URL的变量<{infoid}>，或这上面采集规则列表里已采集的变量，并以<{、}>括起，例：<{username}>，username必须是上面已经采集到的变量），下面是具体规则，然后换行书写具体规则，格式和采集规则列表格式一样<BR>多页采集会减慢采集速度，不建议使用
</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">内容分页采集模式</td>
<td class="t2">
“不分页”：默认为不分页，选择此模式，即时填写了分页规则也不采集分页<BR>
“分页列表”：此模式先采集所有分页URL列表，再按列表采集分页内容<BR>
“下一页”：在采集完当前页内容后再采集下一分页URL，循环直到分页结束，如果规则错误可能引发死循环，不建议使用
</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">内容分页规则</td>
<td class="t2">
“分页列表”：可填写标签cont_listarea,cont_listurl，cont_listurl为所有的分页URL<BR>
“下一页”：可填写标签cont_listarea,cont_nextpage，cont_nextpage为下一页URL，如果规则错误可能引发死循环，不建议使用<BR>
其中，cont_listarea为选填项，不是必须填写
</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">替换过滤列表</td>
<td class="t2">采集处理完标签值后进行替换，格式“要替换值@@替换值”，无“@@”则过滤符合内容，多项替换用“##”间隔，最新版本已经支持正则。例：content=&lt;a.+?&gt;##&lt;script&gt;.+?&lt;/script&gt;，过滤内容中所有A标签和script标签</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">默认常量列表</td>
<td class="t2">当采集标签值为空或没有采集此标签时，使用设置的默认值代替</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"></td>
<td class="t2"></td>
</tr>
</table>
<div class="tt">列表规则说明</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td width="200" class="t1"><span>*</span> 采集规则名称</td>
<td class="t2">可随便填写，主要是为了区分</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">默认分类</td>
<td class="t2">此处可设置一个列表规则的默认分类，如果此处设置了默认分类，则优先使用此处默认值，而不使用内容规则的默认值</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">默认地区</td>
<td class="t2">此处可设置一个列表规则的默认地区，如果此处设置了默认地区，则优先使用此处默认值，而不使用内容规则的默认值</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"><span>*</span> 列表页面URL</td>
<td class="t2">
目标网站列表页地址，采集内容页的序号，用来替换内容规则页面中的内容URL规则的<{infoid}>，如果列表页只有一页，可直接填写列表页URL地址，如果为多页，请用<{pageid}>代替页码<br>
如果你要使用按会员列表模式采集会员信息，同时采集会员发布的信息列表，此处需要使用<{compuserid}>代替会员ID，例：http://chengdu.aifang.com/loupan/jinjiang/s?m=1&p=<{pageid}>&p1=904
</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">列表区域识别规则</td>
<td class="t2">用来提取内容页URL列表区域</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"><span>*</span> 信息序号采集规则</td>
<td class="t2">提取内容页的<{infoid}>序号</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">下一页的页码采集规则</td>
<td class="t2">如果要采集多页列表，此处填写要采集的下一页URL的页码，而不是整个URL。这里留空表示没有第二页，填入 ++ 则表示页面序号是加1方式递增的，否则输入页码的采集规则。</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">起始页页码</td>
<td class="t2">如果要采集多页列表，此处可设置要采集列表页的起始页，可不填写，默认为空时列表页从第一页采集</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1">最多采集页数</td>
<td class="t2">填0或留空表示不限制采集页数</td>
</tr>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td class="t1"></td>
<td class="t2"></td>
</tr>
</table>
<div class="tt">批量采集说明</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td width="200" class="t1">按会员列表采集信息列表</td>
<td class="t2">在批量采集里，当选择采集会员采集规则时，会有一个“公司信息列表采集URL”，此处默认留空，如果填写URL，表示在采集会员信息时，会采集会员公司页面里的信息列表，需要先添加对应信息列表规则，然后进入列表规则管理界面，复制独立采集URL填至此处，例： “http://localhost/admin.php?file=collectbatch&action=collect&moduleid=5&siteid=2&auth=123456&collectname=1&startpageid=起始页序号&maxpagenum=最多采集页数”</td>
</tr>
</table>
<div class="tt">数据管理说明</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td width="200" class="t1">采集数据管理</td>
<td class="t2">当采集选择离线模式时，采集到的诗句不入库，会保存在TXT文件里，在数据管理里可以导入数据，数据导入后会自动删除<br>
采集的数据也可以备份、恢复和删除，因为数据是文本形式保存，所以删除信息仅仅是删除信息的一个标识，在前台不再显示，而内容还是存在的，随着采集数据越来越多，文本文件也越来越大，建议定时清空所有数据，此时才是真正删除所有采集内容<BR>
缺点：因为离线数据是保存在文本文件里，所以有时难免会出错，比如信息丢失或信息混淆<BR>
优点：离线采集模式，会加快采集速度，而且导入数据时可以选择分类、地区和发布时间，发布信息更自由，并且采集到的离线数据，可以打包传到任何AIJIACMS系统进行发布，打包目录admin/config/data/
</td>
</tr>
<tr>
<td width="200" class="t1">EXCEL导入</td>
<td class="t2">最新版本支持从EXCEL表里导入数据，并且EXCEL表支持多个工作表导入，要注意的是，一个EXCEL表必须是同一个模块的数据，而且在导入时，必须选择相应的模块，否则会出错<BR>
EXCEL表数据的表格格式也很简单，每个工作表的第一行必须是模块的标签，比如title、content等，第二行开始是具体数据
</td>
</tr>
</table>
<div class="tt">常用标签说明</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="200">标签名</th>
<th>标签说明</th>
</tr>
<?php foreach($names as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><?php echo  $k;?></td>
<td><?php echo $v;?></td>
</tr>
<?php }?>
</table>
<script type="text/javascript">Menuon(3);</script>
</body>
</html>