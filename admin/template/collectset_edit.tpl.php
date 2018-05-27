<?php
defined('IN_AIJIACMS') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">编辑采集规则</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" id="action" value="edit" />
<input type="hidden" name="config" id="config" value="<?php echo $config;?>" />
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">采集器标识</td>
<td><?php echo $config;?></td>
</tr>
<tr>
<td class="tl">选择模块</td>
<td>
	<select name="modid" id="modid">
	<option value="0">选择模块</option>
	<?php foreach($modules as $k=>$v) {?>
	<option value="<?php echo $v['moduleid'];?>"<?php if($myCollect['modid']==$v['moduleid']) echo ' selected="selected"';?>><?php echo $v['modulename'];?></option>
	<?php }?> 
	</select> 
	<span id="dmodid" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">采集器名称</td>
<td><input name="sitename" type="text" id="sitename" size="30" value="<?php echo $myCollect['sitename'];?>" /> <?php tips('采集器名称，可任意填写');?> <span id="dsitename" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">网站地址</td>
<td><input name="siteurl" type="text" id="siteurl" size="30" value="<?php echo $myCollect['siteurl'];?>" /> <?php tips('目标网站网址');?> <span id="dsiteurl" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">数据采集入库接口</td>
<td><input name="apiname" type="text" id="apiname" size="30" value="<?php echo $myCollect['apiname'];?>" /> <?php tips('可自定义数据采集入库接口，比如知道模块，接口文件上传至admin/config/目录，默认为空时，会员模块调用API_user接口文件，其他模块调用API通用接口文件');?> </td>
</tr>
<tr>
<td class="tl">代理服务器地址</td>
<td><input name="proxy_host" type="text" id="proxy_host" size="30" value="<?php echo $myCollect['proxy_host'];?>" /> <?php tips('不使用代理服务器请留空');?></td>
</tr>
<tr>
<td class="tl">代理服务器端口</td>
<td><input name="proxy_port" type="text" id="proxy_port" size="30" value="<?php echo $myCollect['proxy_port'];?>" /> </td>
</tr>
<tr>
<td class="tl">身份验证模式</td>
<td>
	<input type="radio" class="radio" name="verify_mode" value="1"<?php if($myCollect['verify_mode']==1) echo ' checked="checked"';?> />创始人   
	<input type="radio" class="radio" name="verify_mode" value="2"<?php if($myCollect['verify_mode']==2) echo ' checked="checked"';?> />验证密钥  
	<input type="radio" class="radio" name="verify_mode" value="3"<?php if($myCollect['verify_mode']==3) echo ' checked="checked"';?> />验证IP 
	<input type="radio" class="radio" name="verify_mode" value="4"<?php if($myCollect['verify_mode']==4) echo ' checked="checked"';?> />关闭
	<?php tips('身份验证模式：<BR>1 验证是否为创始人，需要登录<BR>2 验证密钥，如果设置为2，则必须设置 入库密钥[推荐]<BR>3 验证IP，如果设置为3，则必须设置 允许的IP<BR>4 关闭接口');?></span> 
</td>
</tr>
<tr>
<td class="tl">入库密钥</td>
<td><input name="spider_auth" type="text" id="spider_auth" size="30" value="<?php echo $myCollect['spider_auth'];?>" /> <?php tips('入库密钥 最少6位，身份验证模式为 2 时有用');?> <span id="dsitename" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">允许的IP</td>
<td><input name="spider_ip" type="text" id="spider_ip" size="30" value="<?php echo $myCollect['spider_ip'];?>" /> <?php tips('允许的IP，身份验证模式为 3 时有用');?> <span id="dsitename" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">数据入库模式</td>
<td>
	
	<input type="radio" class="radio" name="spider_mode" value="1"<?php if($myCollect['spider_mode']==1) echo ' checked="checked"';?> />数据自定义  
	<input type="radio" class="radio" name="spider_mode" value="0"<?php if($myCollect['spider_mode']==0) echo ' checked="checked"';?> />系统类库
	<?php tips('数据入库模式为“系统类库”时系统调用内置的类文件入库，自动抛弃多余字段<BR>数据入库模式为“数据自定义”时，系统根据发送的数据构造SQL语句入库，不对发送的字段进行处理，字段名和数据表内一致，例如发送&title=测试标题&catid=分类ID，则构造(title, catid) VALUES (\'测试标题\', \'分类ID\') 的插入语句');?>
</td>
</tr>
<tr>
<td class="tl">信息发布状态</td>
<td>
	<input type="radio" class="radio" name="spider_status" value="0"<?php if($myCollect['spider_status']==0) echo ' checked="checked"';?> />软件发送  
	<input type="radio" class="radio" name="spider_status" value="2"<?php if($myCollect['spider_status']==2) echo ' checked="checked"';?> />待审核 
	<input type="radio" class="radio" name="spider_status" value="3"<?php if($myCollect['spider_status']==3) echo ' checked="checked"';?> />通过    
	<?php tips('发送HTTP_REFERER标志，用于突破防采集设置');?>
</td>
</tr>
<tr>
<td class="tl">错误日志</td>
<td>
	<input type="radio" class="radio" name="spider_errlog" value="1"<?php if($myCollect['spider_errlog']==1) echo ' checked="checked"';?> />开启   
	<input type="radio" class="radio" name="spider_errlog" value="0"<?php if($myCollect['spider_errlog']==0) echo ' checked="checked"';?> />关闭  
	<?php tips('开启后系统将记录错误日志至admin/config/spider/目录,以便调试（spider目录需要可写入）');?>
</td>
</tr>
<tr>
<td class="tl">发送REFERER</td>
<td>
	<input type="radio" class="radio" name="referer" value="1"<?php if($myCollect['referer']==1) echo ' checked="checked"';?> />是   
	<input type="radio" class="radio" name="referer" value="0"<?php if($myCollect['referer']==0) echo ' checked="checked"';?> />否  
	<?php tips('发送HTTP_REFERER标志，用于突破防采集设置');?>
</td>
</tr>
<tr>
<td class="tl">对方网页编码</td>
<td>
<select class="select" size="1" name="pagecharset" id="pagecharset">
<option value="auto"<?php if($myCollect['pagecharset']=='auto') echo ' selected="selected"';?>>自动检测</option>
<option value="gbk"<?php if($myCollect['pagecharset']=='gbk') echo ' selected="selected"';?>>GB2312</option>
<option value="utf8"<?php if($myCollect['pagecharset']=='utf8') echo ' selected="selected"';?>>UTF8</option>
<option value="big5"<?php if($myCollect['pagecharset']=='big5') echo ' selected="selected"';?>>BIG5</option>
</select>
<?php tips('编码与本站不同将自动尝试转换');?>
</td>
</tr>
<tr>
<td class="tl">允许标题重复</td>
<td>
	<input type="radio" class="radio" name="titlerepeat" value="1"<?php if($myCollect['titlerepeat']==1) echo ' checked="checked"';?> />不允许重复   
	<input type="radio" class="radio" name="titlerepeat" value="0"<?php if($myCollect['titlerepeat']==0) echo ' checked="checked"';?> />允许重复  
	<?php tips('启用此项信息标题不允许重复将加重数据库的负载');?>
</td>
</tr>
<tr>
<td class="tl">详细内容是否格式化</td>
<td>
	<input type="radio" class="radio" name="formatcontent" value="1"<?php if($myCollect['formatcontent']==1) echo ' checked="checked"';?> />格式化
	<input type="radio" class="radio" name="formatcontent" value="0"<?php if($myCollect['formatcontent']==0) echo ' checked="checked"';?> />不格式化
	<?php tips('格式化内容将去除内容的HTML标签（指采集信息的详细内容，非指所有采集标签内容）');?>
</td>
</tr>
<tr>
<td class="tl">信息发布人入库</td>
<td>
	<input type="radio" class="radio" name="collectuser" value="1"<?php if($myCollect['collectuser']==1) echo ' checked="checked"';?> />发布人入库
	<input type="radio" class="radio" name="collectuser" value="0"<?php if($myCollect['collectuser']==0) echo ' checked="checked"';?> />发布人不入库
	<?php tips('启用发布人入库，采集到发布人信息则存入数据库，否则只记录发布人用户名，如果采集不到发布人信息，将使用当前登陆用户作为发布人。开启此项将加重数据库的负载，开启此项需采集标签uid，以替换会员内容页URL地址的变量<{infoid}>，uid为空时使用username值');?>
</td>
</tr>
<tr>
<td class="tl">发布人规则名称</td>
<td>
<select class="select" size="1" name="urluser" id="urluser">
	<option value="" selected="selected">选择会员规则</option>
<?php foreach($Collectsite as $k=>$v) {if($v['modid']==2) {?>
	<option value="<?php echo $v['config'];?>"<?php if($myCollect['urluser']==$v['config']) echo ' selected="selected"';?>><?php echo $v['name'];?></option>
<?php }}?>
</select>
<?php tips('调用会员采集规则，必须先添加会员规则，此处填写会员规则的英文标识名');?>  <span id="durluser" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">内容页URL地址</td>
<td><input name="urlinfo" type="text" id="urlinfo" size="60" value="<?php echo $myCollect['urlinfo'];?>" /> <?php tips('信息序号变量：<{infoid}>');?> <span id="durlinfo" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">采集规则列表</td>
<td><textarea class="textarea" name="content" id="content" rows="5" cols="60"><?php echo $content?></textarea> <?php tips('=号后面具体规则，无需用引号');?><BR><span id="dcontent" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">多页采集规则</td>
<td><textarea class="textarea" name="pagerule" id="pagerule" rows="5" cols="60"><?php echo $pagerule?></textarea></textarea> <?php tips('非内容分页，主要针对采集标签分布于多页的情况，例如详细内容不在内容页面，公司介绍和联系方式不在同一页面<BR>抓取多页面会影响采集速度，尽量避免使用<BR>多页规则使用pageurl=表示采集页URL，下面是具体规则，可使用内容页URL的变量<{infoid}>，或者采集规则列表中已采集变量');?>  </td>
</tr>
<tr>
<td class="tl">内容分页采集模式</td>
<td>
	<input type="radio" class="radio" name="contpagemode" value="0"<?php if($myCollect['contpagemode']==0) echo ' checked="checked"';?> />不分页
	<input type="radio" class="radio" name="contpagemode" value="1"<?php if($myCollect['contpagemode']==1) echo ' checked="checked"';?> />分页列表
	<input type="radio" class="radio" name="contpagemode" value="2"<?php if($myCollect['contpagemode']==2) echo ' checked="checked"';?> />下一页
	<?php tips('“不分页”：默认为不分页，选择此模式，即时填写了分页规则也不采集分页<BR>“分页列表”：此模式先采集所有分页URL列表，再按列表采集分页内容，可填写标签cont_listarea,cont_listurl<br>“下一页”：在采集完当前页内容后再采集下一分页URL，循环直到分页结束，可填写标签cont_listarea,cont_nextpage，如果规则错误可能引发死循环，不建议使用');?>
</td>
</tr>
<tr>
<td class="tl">内容分页规则</td>
<td><textarea class="textarea" name="contpage" id="contpage" rows="5" cols="60"><?php echo $contpage?></textarea>  </td>
</tr>
<tr>
<td class="tl">替换过滤列表</td>
<td><textarea class="textarea" name="replacelist" id="replacelist" rows="5" cols="60"><?php echo $replacelist?></textarea> <?php tips('采集处理完标签值后进行替换，格式“要替换值@@替换值”，无“@@”则过滤符合内容，多项替换用“##”间隔，支持正则');?>  </td>
</tr>
<tr>
<td class="tl">默认常量列表</td>
<td><textarea class="textarea" name="defaultvalue" id="defaultvalue" rows="5" cols="60"><?php echo $defaultvalue?></textarea> <?php tips('采集标签值为空时，使用当前默认值代替');?> </td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'modid';
	l = $(f).value;
	if(l == 0) {
		Dmsg('请选择一个模块', f);
		return false;
	}
	f = 'sitename';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写采集器名称', f);
		return false;
	}
	f = 'siteurl';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写网站地址', f);
		return false;
	}
	f = 'config';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写采集器标识', f);
		return false;
	}
	f = 'urlinfo';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写内容页URL地址', f);
		return false;
	}
	f = 'content';
	l = $(f).value;
	if(l == '') {
		Dmsg('请填写采集规则', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>