$(function(){
	//
	$(window).resize(function(){
		var wW = $(window).width();
		if(wW <= 991){
		}
		else {
			$(".searchSp").css("display","none");
		}
	}).trigger("resize");
	//
	$("body").on('click','.btnNav .btn-menu', function(){
		$(".navFix").show();
		$("body").css("overflow", "hidden");
	});
	$("body").on('click','.navFix .btn-closeNav', function(){
		$(".navFix").hide();
		$("body").css("overflow", "inherit");
	});
	//
	$("body").on('click','.btnSearch .btn-search', function(){
		$(".searchSp").slideToggle();
	});
	
});
$(function(){
	/*** back top *****/
	$(document).on('click','.backTop', function(){
		$('body,html').animate({scrollTop: 0}, 800);
	});
});

