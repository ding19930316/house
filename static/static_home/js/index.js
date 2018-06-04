/* @authors wangll_ren*/
var selecteType = "sale";
var placeHolder = $("#search").attr('placeholder');
$(function(){

//最后一个列表没有margin-right
	
//	noMarR(".houdongwei li");
	noMarR(".xqpc-list li");
	noMarR(".ind-yhf .house-list li");
	noMarR(".goufang li");
	noMarR(".jinnang li");
	noMarR(".xiaoqu li");
	noMarR(".ind-hwzy .house-list li");
	noMarR(".xinf-list li");

	function noMarR(ListSelName){

		$(ListSelName).last().addClass("no-margin-r");
	}
//图标链接
//	$(".link-list a").hover(
//
//		function(){
//		
//			$(this).children(".link-icon").addClass("rotateIn").removeClass("rotateOut");
//		},
//		function(){
//			
//			$(this).children(".link-icon").addClass("rotateOut").removeClass("rotateIn");
//		}
//	);

//选项卡

	tabCon(".search-tab span",null,"cur");
	tabCon(".tab-tit li",".tab-con","cur");

	function tabCon(tabNme,tabCon,classN){
		$(tabNme).click(function(){
//			console.log(placeHolder);
            //全局变量记录搜索类型
			if($(this).attr("id")=='xiaoqu'){
				placeHolder =  $("#search").attr('placeholder');
				$("#search").attr('placeholder','请输入区域、商圈、小区');
			}else{
				$("#search").attr('placeholder',placeHolder);
			}
            $("#searchType").val($(this).attr("id"));

			$("#search").val("");
			var iIndex = $(this).index();
			$(this).addClass(classN);
			$(this).siblings().removeClass(classN);
			$(tabCon).eq(iIndex).addClass("show").removeClass("hide");
			$(tabCon).eq(iIndex).siblings().removeClass("show").addClass("hide");
		});	
	}

//图片滚动

	var slideNum = $(".houdongwei li").length;
	if(slideNum > 3)
	{
		jQuery(".slide-box").slide({
			titCell:".slide-tit",
			mainCell:".slide-con ul",
			autoPage:true,
			effect:"leftLoop",
			vis:3,
			delayTime:700,
			autoPlay:true
		});
	}else{
		jQuery(".slide-box").slide({
			titCell:".slide-tit",
			mainCell:".slide-con ul",
			autoPage:false,
			effect:"leftLoop",
			vis:3,
			delayTime:700
		});
		$(".slide-tit").hide();
	}
	
	setTimeout(function(){
    	$(".slide-box").removeClass("hide");
    	$(".houdongwei-box").removeClass("slide-load");
    },100);
 //、、、新房图片滚动
	var xslideNum = $(".xinf-list li").length;
	if(xslideNum > 4)
	{
		jQuery(".ind-xinf").slide({
	      mainCell:".xin_con ul",
//	      titCell:".xin_slide-tit",//焦点图下面的点点
	      autoPage:true,
	      effect:"leftLoop",
	      autoPlay:true,
	      vis:4,
	//      pnLoop:false,
	      trigger:"click"
	  });
	}else{
		jQuery(".ind-xinf").slide({
//			titCell:".xin_slide-tit", //焦点图下面的点点
			mainCell:".xin_con ul",
			autoPage:false,
			effect:"leftLoop",
			vis:4,
//			delayTime:700
		});
		$(".xin_slide-tit,.xin_jiao .prev,.xin_jiao .next").hide();
	}  
//省略号

    ellipsis(".tab-con .info a","26");
    ellipsis(".gf-con","50");

	function ellipsis(textName,num){
		 
		$(textName).each(function(){
		 
			if($(this).text().length>num){
								
				var text=$(this).text().substring(0,num)+"...";
					
				$(this).text(text);
			}
		});

	}
    /*首页搜索联想热门搜索*/
    $("#search").focus(function(){

    });/**/
    //输入内容触发联想
    /*
    * showHint("搜索框id","请求的url","回调时所写入的文本框ID");
    * */
     showHint("search","","txtHint");
});