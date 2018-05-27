/*
	[AIJIACMS HOUSE System] Copyright (c) 2008-2013 AIJIACMS.COM
	This is NOT a freeware, use is subject to license.txt
*/
function guest_log(id) {
	if($('#'+id)[0]) {
		v = get_cookie('guest_'+id);
		if(safe_input(v) && !$('#'+id).val()) $('#'+id).val(v);
		$('#'+id).blur(function(){
			v = $('#'+id).val();
			if(safe_input(v)) set_cookie('guest_'+id, v);
		});
	}
}
function safe_input(v) {
	var a = ['%', '"', "'", '}', ']', '>', '#', ';', ','];
	for(var i in a) {
		if(v.indexOf(a[i]) != -1) return false;
	}	
	return true;
}
var guest_ids = ['company', 'truename', 'telephone', 'mobile', 'email', 'address', 'qq', 'ali', 'msn', 'skype'];
for(var i in guest_ids) {
	guest_log(guest_ids[i]);
}
if($('#load_area_1')[0] && parseInt($('#areaid_1').val()) == 0) {
	v = get_cookie('guest_areaid');
	if(v) load_area(v, 1);
	$('#load_area_1').mouseout(function(){
		v = parseInt($('#areaid_1').val());
		if(v > 0) set_cookie('guest_areaid', v);
	});
}