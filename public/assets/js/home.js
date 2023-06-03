$(document).ready(function() {
    $('.product-details').mouseenter(function() {
        $(this).find('.layer').stop().slideDown();
    });

    $('.product-details').mouseleave(function() {
        $(this).find('.layer').stop().slideUp();
    });
});