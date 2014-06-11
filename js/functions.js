/*==============================================================================*/

$(document).ready(function() {
    $('.banner').unslider({
        speed: 1000, //  The speed to animate each slide (in milliseconds)
        delay: 7000, //  The delay between slide animations (in milliseconds)
        complete: function() {}, //  A function that gets called after every slide animation
        keys: true, //  Enable keyboard (left, right) arrow shortcuts
        dots: true, //  Display dot navigation
        fluid: false //  Support responsive design. May break non-responsive designs
    });
    /*rolar*/
    $(window).scroll(function() {
        var top = $(window).scrollTop();
        if (top > 80) {

            $(".header").addClass('header2');
            $(".header2").removeClass('header');
            $(".logo").addClass('logo2');
            $(".logo2").removeClass('logo');
            $(".fone-menu").addClass('fone-menu2');
            $(".fone-menu2").removeClass('fone-menu');
            $(".menu").addClass('menu2');
            $(".menu2").removeClass('menu');
            $(".slider").css("padding-top", "120px");
        } else {
            $(".header2").addClass('header');
            $(".header").removeClass('header2');
            $(".logo2").addClass('logo');
            $(".logo").removeClass('logo2');
            $(".fone-menu2").addClass('fone-menu');
            $(".fone-menu").removeClass('fone-menu2');
            $(".menu2").addClass('menu');
            $(".menu").removeClass('menu2');
            $(".slider").css("padding-top", "0px");

        }
    });

});