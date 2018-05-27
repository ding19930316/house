/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
function Mshow(i) {
	if(i == 'detail') {
		Dd('t_detail').className = 'mall_tab_2';
		Dd('t_comment').className = 'mall_tab_1';
		Dd('t_order').className = 'mall_tab_1';
		Ds('c_detail');
		Dh('c_comment');
		Dh('c_order');
	} else if(i == 'comment') {
		Dd('t_detail').className = 'mall_tab_1';
		Dd('t_comment').className = 'mall_tab_2';
		Dd('t_order').className = 'mall_tab_1';
		Dh('c_detail');
		Ds('c_comment');
		Dh('c_order');
		load_comment(0);
	} else if(i == 'order') {
		Dd('t_detail').className = 'mall_tab_1';
		Dd('t_comment').className = 'mall_tab_1';
		Dd('t_order').className = 'mall_tab_2';
		Dh('c_detail');
		Dh('c_comment');
		Ds('c_order');
		load_order(0);
	}
	$("html, body").animate({scrollTop:$('.mall_tab').offset().top-40}, 200);
}
function load_comment(p) {
	if(n_c == 0) {
		Dd('c_comment').innerHTML = '<div class="comment_no">'+m_l.no_comment+'</div>';
		return;
	}
	if(p == 0 && Dd('c_comment').innerHTML != c_c) return;
	makeRequest('action=comment&itemid='+mallid+'&page='+p, mallurl+'api.php', '_load_comment');
}
function _load_comment() {
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		Dd('c_comment').innerHTML= xmlHttp.responseText;
	}
}
function load_order(p) {
	if(n_o == 0) {
		Dd('c_order').innerHTML = '<div class="order_no">'+m_l.no_order+'</div>';
		return;
	}
	if(p == 0 && Dd('c_order').innerHTML != c_o) return;
	makeRequest('action=order&itemid='+mallid+'&page='+p, mallurl+'api.php', '_load_order');

}
function _load_order() {
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		Dd('c_order').innerHTML= xmlHttp.responseText;
	}
}
function addE(i) {
	$('#p'+i+' li').mouseover(function() {
		if(this.className == 'nv_1') this.className = 'nv_3';
	});
	$('#p'+i+' li').mouseout(function() {
		if(this.className == 'nv_3') this.className = 'nv_1';
	});
	$('#p'+i+' li').click(function() {
		$('#p'+i+' li')[s_s[i]].className = 'nv_1';
		this.className = 'nv_2';
		s_s[i] = $(this).index();
	});
}
function BuyNow() {
	Go(mallurl+'buy.php?itemid='+mallid+'&s1='+s_s[1]+'&s2='+s_s[2]+'&s3='+s_s[3]);
}
function AddCart() {
	makeRequest('action=ajax&itemid='+mallid+'&s1='+s_s[1]+'&s2='+s_s[2]+'&s3='+s_s[3], mallurl+'cart.php', '_AddCart');
}
function _AddCart() {
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		if(xmlHttp.responseText == -3) {alert(m_l.no_goods);return;}
		if(xmlHttp.responseText == -4) {alert(m_l.no_self);return;}
		var cart_num = substr_count(get_cookie('cart'), ',');
		$('#aijiacms_cart').html(cart_num ? '<strong>'+cart_num+'</strong>' : '0');
		$('#cart_num').html(cart_num);
		$('#cart_tip').show();
	}
}