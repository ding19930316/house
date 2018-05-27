/*
	[aijiacms house system] Copyright (c) 2008-2013 aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
var isGecko = navigator.userAgent.indexOf('WebKit') != -1;
function Dd(i) {return document.getElementById(i);}
function Ds(i) {Dd(i).style.display = '';}
function Dh(i) {Dd(i).style.display = 'none';}
function Go(u) {window.location.href = u;}
function ext(v) {return v.substring(v.lastIndexOf('.')+1, v.length);}
function lang(s, a) {for(var i = 0; i < a.length; i++) {s = s.replace('{V'+i+'}', a[i]);} return s;}
function View(s) {window.open(EXPath+'view.php?img='+s);}
function check_kw() {if(Dd('kw').value == L['keyword_value'] || Dd('kw').value.length<2) {alert(L['keyword_message']); Dd('kw').focus(); return false;}}
function Df(url, etc) {document.write('<iframe src="'+url+'" scrolling="no" frameborder="0" '+etc+'></iframe>');}
function show_date() {
	var dt_day = dt_month = dt_weekday = '';
	var dt_week = [L['Sunday'], L['Monday'], L['Tuesday'], L['Wednesday'], L['Thursday'], L['Friday'], L['Saturday']];
	dt_today = new Date();
	dt_weekday = dt_today.getDay();
	dt_month = dt_today.getMonth()+1;
	dt_day = dt_today.getDate();
	document.write(lang(L['show_date'], [dt_month, dt_day, dt_week[dt_weekday]]));
}
function ImgZoom(i, m) {
	var m = m ? m : 550; var w = i.width;
	if(w < m) return;
	var h = i.height;
	i.title = L['click_open'];
	i.onclick = function (e) {window.open(ETPath+'view.php?img='+i.src);}
	i.height = parseInt(h*m/w);
	i.width = m;
}
document.onkeydown = function(e) {
	var k = typeof e == 'undefined' ? event.keyCode : e.keyCode;
	if(k == 37) {
		try{if(Dd('aijiacms_previous').value && typeof document.activeElement.name == 'undefined')Go(Dd('aijiacms_previous').value);}catch(e){}
	} else if(k == 39) {
		try{if(Dd('aijiacms_next').value && typeof document.activeElement.name == 'undefined')Go(Dd('aijiacms_next').value);}catch(e){}
	}
}