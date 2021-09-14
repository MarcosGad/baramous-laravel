$(function () {

    'use strict';
    // slider hight 
    
    var   winH = 500,
    
      
      navU = $('.upper').outerHeight(true),
      navUU = $('.upper-top').outerHeight(true);
      
     $('.slide, .item ,img').height(winH - (navU + navUU)); 
    
     $(window).resize(function(){ 
    
      $('.slide, .item ,img').height(winH - (navU + navUU)); 
    
    }); 
          });