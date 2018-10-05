// http://blog.themearmada.com/off-canvas-slide-menu-for-bootstrap/

$(document).ready(function(){												

// CODE TO TOGGLE EXPANDABLE WIDGETS

    // $(".expandable-widget section").hide();
    // $(".collapse").hide();
    // $(".expand").show();

    // $('.expand').click(function(){
    //     $(".collapse").toggle();
    //     $(".expand").toggle();
    //     $(".expandable-widget section").slideDown();
        
    // }),
    // $('.collapse').click(function(){
    //     $(".collapse").toggle();
    //     $(".expand").toggle();
    //     $(".expandable-widget section").slideUp();
    // });

//Navigation Menu Slider

     $('#nav-expander').on('click',function(e){
           e.preventDefault();
           $('body').toggleClass('nav-expanded');
       });
       $('#nav-close').on('click',function(e){
           e.preventDefault();
           $('body').removeClass('nav-expanded');
       });

       // Initialize navgoco with default options
     $(".main-menu").navgoco({
         caret: '<span class="caret"></span>',
         accordion: false,
         openClass: 'open',
         save: true,
         cookie: {
             name: 'navgoco',
             expires: false,
             path: '/'
         },
         slide: {
             duration: 300,
             easing: 'swing'
         }
     });

   });