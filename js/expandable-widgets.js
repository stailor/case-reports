$(document).ready(function(){
// CODE TO TOGGLE EXPANDABLE WIDGETS

    $(window).resize(function() {
        if ($(window).width() < 768) {
            $(".expandable-widget section").hide();
            $(".collapse").hide();
            $(".expand").show();

            $(".expand").click(function(){
                // $(this).closest(".expandable-widget").find("section")show();
                $(".expandable-widget section").show();
                $(".collapse").toggle();
                $(".expand").toggle();
                
            }),
            $(".collapse").click(function(){
                $(".expandable-widget section").hide();
                // $(this).closest(".expandable-widget").find("section")hide();
                $(".collapse").toggle();
                $(".expand").toggle();
            });
        }
    });
});