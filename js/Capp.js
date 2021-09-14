$(function () {

    'use strict';
// slider hight 

 var   winH = $(window).height(),

		navH = $('.navbar').outerHeight(true),
		navU = $('.upper').outerHeight(true),
		navUU = $('.upper-top').outerHeight(true);
		
     $('.slide, .item ,img').height(winH - (navH + navU + navUU)); 

     $(window).resize(function(){ 

      $('.slide, .item ,img').height(winH - (navH + navU + navUU)); 

    }); 

    //add asterix on required field

	$('input').each(function(){

		if($(this).attr('required')==='required'){

			$(this).after('<span class="asterisk">*</span>');
		}
	});

    
//hide placeholder on form focus


	$('[placeholder]').focus(function(){

		$(this).attr('data-text', $(this).attr('placeholder'));
		$(this).attr('placeholder', '');

	}).blur(function(){

		$(this).attr('placeholder',$(this).attr('data-text'));
	});
  }); 

$('li > a').click(function(){
	$(this).parent().addClass('active').siblings().removeClass('active')	
})