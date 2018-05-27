/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
if(aijiacms_oauth) {
	Ds('weibo_sync');
	if(aijiacms_oauth.indexOf('sina') != -1) {
		$('#weibo_show').append('<input type="hidden" name="post[sync_sina]" value="0" id="sync_sina_inp"/>');
		$('#weibo_show').append('<img src="'+DTPath+'file/image/sync_sina.gif" id="sync_sina_img" onclick="sync_site(\'sina\');" class="c_p" title="'+L['sync_sina']+'"/>&nbsp;&nbsp;');
		if(!get_cookie('sina_token')) Dd('send').src = DTPath+'api/oauth/sina/connect.php';
		if(get_cookie('sina_token') && get_cookie('sina_sync')) {
			Dd('sync_sina_inp').value = 1;
			Dd('sync_sina_img').src = DTPath+'file/image/sync_sina_on.gif';
		}
	}
	if(aijiacms_oauth.indexOf('qq') != -1) {
		$('#weibo_show').append('<input type="hidden" name="post[sync_qq]" value="0" id="sync_qq_inp"/>');
		$('#weibo_show').append('<img src="'+DTPath+'file/image/sync_qq.gif" id="sync_qq_img" onclick="sync_site(\'qq\');" class="c_p" title="'+L['sync_qq']+'"/>&nbsp;&nbsp;');
		if(get_cookie('qq_token') && get_cookie('qq_sync')) {
			Dd('sync_qq_inp').value = 1;
			Dd('sync_qq_img').src = DTPath+'file/image/sync_qq_on.gif';
		}
		$('#weibo_show').append('<input type="hidden" name="post[sync_qzone]" value="0" id="sync_qzone_inp"/>');
		$('#weibo_show').append('<img src="'+DTPath+'file/image/sync_qzone.gif" id="sync_qzone_img" onclick="sync_site(\'qzone\');" class="c_p" title="'+L['sync_qzone']+'"/>&nbsp;&nbsp;');
		if(get_cookie('qq_token') && get_cookie('qzone_sync')) {
			Dd('sync_qzone_inp').value = 1;
			Dd('sync_qzone_img').src = DTPath+'file/image/sync_qzone_on.gif';
		}
	}
}

function sync_site(n) {
	var c = n == 'qzone' ? 'qq' : n
	if(Dd('sync_'+n+'_inp').value == 1) {
		Dd('sync_'+n+'_inp').value = 0;
		Dd('sync_'+n+'_img').src = DTPath+'file/image/sync_'+n+'.gif';
		set_cookie(n+'_sync', '');
	} else {
		if(!get_cookie(c+'_token')) {
			if(confirm(L['sync_login_'+c])) {
				window.open(DTPath+'api/oauth/'+c+'/connect.php');
			}
			return;
		}
		Dd('sync_'+n+'_inp').value = 1;
		Dd('sync_'+n+'_img').src = DTPath+'file/image/sync_'+n+'_on.gif';
		set_cookie(n+'_sync', 1);
	}
}