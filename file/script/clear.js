/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
var _sbt = false; var _frm = _frm ? _frm : 'dform';
function sbt() {_sbt = true;}
try {if(document.attachEvent) Dd(_frm).attachEvent("onsubmit", sbt); else Dd(_frm).addEventListener("submit", sbt, false);} catch(e) {}
$(window).unload(function(){
    if(!_sbt) makeRequest('action=clear', AJPath);
});