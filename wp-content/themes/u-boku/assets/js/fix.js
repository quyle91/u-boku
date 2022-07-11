$(function(){
	/*** back top *****/
	$(document).on('click','a[href="#backTop"]', function(){
		$('body,html').animate({scrollTop: 0}, 800);
		return false;
	});
});
$(function(){
	/*blog auto height*/	
	if($(document).width()>768){
		set_height(".wrapMain .lstNew-title");
		set_height(".sectionNews .lstNew-title");
		//set_height(".sectionArea .lstNew-title");
		set_height(".sectionExp .lstNew-title");
		set_height(".sectionFa .lstNew-title");
		set_height(".sectionCate .lstNew-title");
		set_height(".sectionCamp .lstNew-title");
	}
	function set_height(selector){
		if($(selector).length){
			let need_height = 0;
			$(selector).each(function(){
				need_height = Math.max(need_height,$(this).height());
			});
			$(selector).height(need_height);
			$(selector).addClass('fixedheight');
		}
	}
});