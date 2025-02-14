jQuery(document).ready(function ($) {

    if (jQuery('.header-top-toggle').length > 0) {
        $('.header-top-toggle a').on('click', function (e) {
            // console.log('clickeed');
            e.preventDefault();
            $(this).toggleClass('open');
            $(this).closest('.container').find('.row').toggleClass('mbl-hide');
        });
    }

    if ($('.offcanvas-sidenav').length) {
        $('.offcanvas-toggle, .offcanvas-sidenav .close-btn').on('click', function () {
            if ($('body').hasClass('offcanvas-enabled')) {
                $('body').removeClass('offcanvas-enabled');
                $('.offcanvas-menu-wrapper a.offcanvas-toggle').focus();
            } else {
                $('body').addClass('offcanvas-enabled');
                $('.offcanvas-sidenav button.close-btn').focus();
            }
        });


        $('.offcanvas-sidenav').on('keydown', function (e) {

            if ($('body').hasClass('offcanvas-enabled')) {
                var focusableEls = $('.offcanvas-sidenav a, .offcanvas-sidenav button, .offcanvas-sidenav input, .offcanvas-sidenav select, .offcanvas-sidenav textarea');
                var firstFocusableEl = focusableEls[0];
                var lastFocusableEl = focusableEls[focusableEls.length - 1];
                var KEYCODE_TAB = 9;
                if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                    if (e.shiftKey) /* shift + tab */ {
                        if (document.activeElement === firstFocusableEl) {
                            lastFocusableEl.focus();
                            e.preventDefault();
                        }
                    } else /* tab */ {
                        if (document.activeElement === lastFocusableEl) {
                            firstFocusableEl.focus();
                            e.preventDefault();
                        }
                    }
                }
            }
        });
    }

    $('.offcanvas-toggle').on('click', function () {
        $(this).toggleClass('expand');
    })

    $('.offcanvas-sidenav .close-btn').on('click', function () {
        $('.offcanvas-toggle').removeClass('expand');
    })

    /*
 ** ### Back to top function
 */

    if ($('.go-to-top').length) {
        var scrollTrigger = $('body').position(); // px
        goToTop = function () {

            var scrollTop = $(window).scrollTop();
            if (scrollTop > 150) {
                $('.footer-go-to-top').addClass('show');
            } else {
                $('.footer-go-to-top').removeClass('show');
            }
        };
        goToTop();
        $(window).on('scroll', function () {
            goToTop();
        });
        $('.go-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: scrollTrigger.top
            }, 700);
        });
    }


    /****
        * Search Dialoge JS
        */
    if ($('.search-section').length) {
        var searchDialoge_section = $('.search-section'),
            searchToggle_button = $('.search-toggle'),
            searchField_input = $('.search-section .search-field'),
            searchClose_button = $('.close-btn');

        searchToggle_button.click(function () {
            searchDialoge_section.toggleClass('ct-search-access');
            setTimeout(function () {
                searchField_input.focus();
            }, 100)

            $('.search-section').on('keydown', function (e) {
                if ($('.search-section').hasClass('ct-search-access')) {
                    var focusableEls = $('.search-section .close-btn,.search-section .search-field,.search-section .search-submit');
                    var firstFocusableEl = focusableEls[0];
                    var lastFocusableEl = focusableEls[focusableEls.length - 1];
                    var KEYCODE_TAB = 9;
                    if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                        if (e.shiftKey) /* shift + tab */ {
                            if (document.activeElement === firstFocusableEl) {
                                lastFocusableEl.focus();
                                e.preventDefault();
                            }
                        } else /* tab */ {
                            if (document.activeElement === lastFocusableEl) {
                                firstFocusableEl.focus();
                                e.preventDefault();
                            }
                        }
                    }
                }
            });

            searchClose_button.click(function () {
                searchDialoge_section.removeClass('ct-search-access');
                var width = $(window).width();
                if (width < 768) {
                    $('.overlay-search-wrapper.mbl-show .search-toggle').focus();
                } else {
                    $('.overlay-search-wrapper.mbl-hide .search-toggle').focus();
                }
            });
        });

    }

    //sticky sidebar
    var at_body = $("body");
    var at_window = $(window);

    if (at_body.hasClass('ct-sticky-sidebar')) {
        $('#secondary, #primary').theiaStickySidebar();

    }


    var width = $(window).width();
    if (width < 992) {
        $('.main-navigation').on('keydown', function (e) {
            if ($('.main-navigation').hasClass('toggled')) {
                var focusableEls = $('.main-navigation a[href]:not([disabled]), .main-navigation button');
                var firstFocusableEl = focusableEls[0];
                var lastFocusableEl = focusableEls[focusableEls.length - 1];
                var KEYCODE_TAB = 9;
                if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                    if (e.shiftKey) /* shift + tab */ {
                        if (document.activeElement === firstFocusableEl) {
                            lastFocusableEl.focus();
                            e.preventDefault();
                        }
                    }
                    else /* tab */ {
                        if (document.activeElement === lastFocusableEl) {
                            firstFocusableEl.focus();
                            e.preventDefault();
                        }
                    }
                }
            }
        });
    }

    function offCanvaMenu() {
        $('#primary-menu').addClass('off_canva_nav');
        $('#primary-menu > li:first-child').addClass('focus');
        $('#primary-menu > li:first-child a').focus();
    }

    MenuToggleBtn_button = $('#masthead .menu-toggle');
    MenuToggleBtn_button.click(function () {
        offCanvaMenu();


    });

    jQuery('#primary-menu .close_nav').click(function () {

        jQuery('.main-navigation').removeClass('toggled');
        $('#primary-menu').removeClass('off_canva_nav');
        $('.menu-toggle').focus();
    });
});

jQuery(window).load(function ($) {
    if (jQuery('.ct-masonry').length > 0) {
        var $container = jQuery('.ct-masonry');
        // initialize
        $container.masonry({
            itemSelector: '.ct-masonry>article',
            columnWidth: '.ct-masonry>article',
            percentPosition: true
        });
    }
});
