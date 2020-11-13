!(function ($) {
    "use strict";
    $('.cool-link, #mobile-nav a, .scrollto').on('click', function () {
        // $('a[href*="#"]')
        //     // Remove links that don't actually link to anything
        //     .not('[href="#"]')
        //     .not('[href="#0"]')
        //     .click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function () {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    //$target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        //$target.focus(); // Set focus again
                    };
                });
            }
        }
    });

    // Buy tickets select the ticket type on click
    $('#buy-ticket-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var ticketType = button.data('ticket-type');
        var modal = $(this);
        modal.find('#ticket-type').val(ticketType);
    })

    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.navbar-nav, #mobile-nav');

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop() + 200;
        console.log(cur_pos);
        nav_sections.each(function () {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();


            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find('li').removeClass('active');
                }
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }
            if (cur_pos < 300) {

                $(".about").removeClass('active');
                $(".speakers").removeClass('active');
                $(".schedule").removeClass('active');
                $(".registration").removeClass('active');
                $(".FAQ").removeClass('active');
                $(".home").addClass('active');
            }
        });
    });
})(jQuery);

let navbar = $(".navbar");

$(window).scroll(function () {
    // get the complete hight of window
    let oTop = $("#speakers").offset().top - window.innerHeight;
    if ($(window).scrollTop() > oTop) {
        navbar.addClass("fixed-top");
    } else {
        navbar.removeClass("fixed-top");
    }
});
