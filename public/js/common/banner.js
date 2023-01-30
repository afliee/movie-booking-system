$(document).ready(function () {
    $('.white-space').css("margin-top",$('.navbar').height() + 40 + 'px');
    $(window).on('scroll', function (e) {
        if (window.scrollY > 100) {
            console.log('scrolled');
            let navbar = $('.navbar')
            navbar.addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    })
});