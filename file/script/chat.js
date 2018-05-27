/*
	[Aijiacms house System] Copyright (c) 2008-2013 Aijiacms.COM
	This is NOT a freeware, use is subject to license.txt
*/
Dd('word').focus();var chat_link=chat_time=chat_new_msg=0;var chat_word='';var chat_interval;
function unixtime(){return Math.round(new Date().getTime()/1000);}
function ec_set(i){if(i==1){Dd('ec1').className='ec';Dd('ec2').className='';Dd('chat_s').title=chat_lang.ec1;}else{Dd('ec1').className='';Dd('ec2').className='ec';Dd('chat_s').title=chat_lang.ec2;}chat_ec=i;set_cookie('chat_ec', i);Dh('ec');}
var chat_ec=get_cookie('chat_ec');chat_ec=chat_ec==1?1:2;ec_set(chat_ec);
function chat_send(){
	if(chat_status!=3){
		if(chat_status==0) chat_tip('对方已经离开了对话');
		return;
	}
	var l=Dd('word').value.length;
	if(Dd('word').value == chat_lang.tip || l<1){chat_tip('对话内容不能为空，请输入');Dd('word').focus();return;}
	if(l>chat_maxlen){chat_tip('最多输入'+chat_maxlen+'字，当前已输入'+l+'字');Dd('word').focus();return;}
	if(chat_mintime&&(unixtime()-chat_time<chat_mintime)){chat_tip('您的发言过快，请稍后再发');return;}
	chat_time=unixtime();chat_word=Dd('word').value;Dd('word').value='';
	var p='action=send';
	p+='&chatid='+chat_id;
	p+='&font_s='+Dd('font_s').value;
	p+='&font_c='+Dd('font_c').value;
	p+='&font_b='+(Dd('tool_font_b').className=='tool_a' ? 0 : 1);
	p+='&font_i='+(Dd('tool_font_i').className=='tool_a' ? 0 : 1);
	p+='&font_u='+(Dd('tool_font_u').className=='tool_a' ? 0 : 1);
	p+='&word='+encodeURIComponent(chat_word);
	chat_link=1;makeRequest(p, '?', '_chat_send');
}
function _chat_send(){
	if(xmlHttp.readyState==4&&xmlHttp.status==200){
		chat_link=0;
		if(xmlHttp.responseText=='0'){
			Dd('word').value=chat_word;
			chat_tip('发送失败，请重试');
		}else{
			Dd('word').value='';
			chat_load();
		}
	}
}
function chat_load(d){
	chat_link=1;
	makeRequest('action=load&chatlast='+chat_last+'&chatid='+chat_id+'&first='+(d ? 1 : 0), '?', '_chat_load');
}
function _chat_load(){
	if(xmlHttp.readyState==4&&xmlHttp.status==200){
		chat_link=0;
		if(xmlHttp.responseText){
			eval("var chat_json="+xmlHttp.responseText);
			chat_last=chat_json.chat_last;
			chat_msg=chat_json.chat_msg;
			chat_status = chat_json.chat_status;
			msglen=chat_msg.length;
			for(var i=0;i<msglen;i++){
				chat_into((chat_msg[i].date ? '<p class="dt"><span>'+chat_msg[i].date+'</span></p>' : '')+'<span class="u'+chat_msg[i].self+'">'+chat_msg[i].name+'</span><span class="t'+chat_msg[i].self+'">'+chat_msg[i].time+'</span><br/><p class="w'+chat_msg[i].self+'">'+chat_msg[i].word+'</p>');
			}
			chat_new(chat_json.chat_new);
			if(chat_status==0){chat_sys('对方离开了对话');clearInterval(chat_interval);}
		}
	}
}
function chat_into(msg){
	var o=document.createElement("div");
	o.innerHTML=msg;Dd('chat').appendChild(o);
	Dd('chat').scrollTop=Dd('chat').scrollHeight;
}
function chat_log(){
	Dd('chat').innerHTML='';
	chat_last=0;
	chat_load(1);
}
function chat_save(){
	Dd('down_data').value=Dd('chat').innerHTML;
	Dd('down').submit();
}
function chat_off(){
	if(confirm('确定要中断聊天吗？')){
		window.close();
	}
}
function chat_key(e){
	if(!e){e=window.event;}
	if(e.keyCode==13){
		if(chat_ec==1){
			if(e.ctrlKey){
				Dd('word').value=Dd('word').value+"\n";
				if(isIE){
					var r =Dd('word').createTextRange();
					r.moveStart('character', Dd('word').value.length);
					r.moveEnd("character", 0);
					r.collapse(true);
					r.select();
				}
			}else{
				chat_send();
				return false;
			}
		}else{
			if(e.ctrlKey) chat_send();
		}
	}
}
function chat_tip(msg){
	Ds('tip');
	Dd('tip').innerHTML=msg;
	Dd('sd').innerHTML=sound('chat_tip');
	window.setTimeout("Dh('tip');",5000);
}
function chat_sys(msg){
	chat_into('<span class="sys">[系统提示]'+msg+'</span>');
}
var chat_title_i=0;
var title_interval;
function chat_new(num){
	if(num>0){
		Dd('sd').innerHTML=sound('chat_msg');
		chat_new_msg=num;
		if(chat_title_i==0){
			title_interval=setInterval('new_tip()',1000);
		}
	}
}
function new_tip(){
	chat_title_i++;
	if(chat_title_i>5){
		new_tip_stop();
		return;
	}
	if(chat_title_i%2==0){
		document.title='【新消息('+chat_new_msg+')】'+chat_title;
	}else{
		document.title=chat_title;
	}
}
function new_tip_stop(){
	try{
		clearInterval(title_interval);
		chat_title_i=0;
		document.title=chat_title;
	}catch(e){}
}
function font_show(){
	if(Dd('font').style.display!='none'){
		font_hide();
		return;
	}
	Ds('font');
	Dd('tool_font').className='tool_b';
}
function font_hide(){
	Dh('font');
	Dd('tool_font').className='tool_a';
}
function font_init(){
	var s='';
	if(Dd('font_s').value){s+=' s'+Dd('font_s').value;}
	if(Dd('font_c').value){s+=' c'+Dd('font_c').value;}
	if(Dd('tool_font_b').className=='tool_b'){s+=' fb';}
	if(Dd('tool_font_i').className=='tool_b'){s+=' fi';}
	if(Dd('tool_font_u').className=='tool_b'){s+=' fu';}
	if(s){Dd('word').className=s;}
}
function face_show(){
	if(Dd('face').style.display!='none'){
		face_hide();
		return;
	}
	Ds('face');
	Dd('tool_face').className='tool_b';
}
function face_hide(){
	Dh('face');
	Dd('tool_face').className='tool_a';
}
function face_into(s){
	if(Dd('word').value==chat_lang.tip){Dd('word').value='';}
	Dd('word').value+=':'+s+')';
	face_hide();
	Dd('word').focus();
}
if(isGecko){
	window.onbeforeunload=function(){
		chat_link=1;
		makeRequest('action=unload&chatid='+chat_id, '?');
	}
}else{
	window.onunload=function(){
		chat_link=1;
		makeRequest('action=unload&chatid='+chat_id, '?');
	}
}
chat_interval=setInterval('chat_load()',chat_poll);
chat_log();