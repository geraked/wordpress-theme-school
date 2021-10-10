(function ($) {

    //header
    wp.customize('header_bg_color', function (value) {
        value.bind(function (newval) {
            $('header').css('background-color', newval);
        });
    });

    wp.customize('header_border_color', function (value) {
        value.bind(function (newval) {
            $('header').css('border-color', newval);
        });
    });

    wp.customize('header_text_color', function (value) {
        value.bind(function (newval) {
            $('header').css('color', newval);
        });
    });

    // body
    wp.customize('body_bg_color', function (value) {
        value.bind(function (newval) {
            $('body').css('background-color', newval);
        });
    });

    //navigation
    wp.customize('nav_bg_color', function (value) {
        value.bind(function (newval) {
            $('.navbar-default').css('background-color', newval);
        });
    });

    wp.customize('nav_border_color', function (value) {
        value.bind(function (newval) {
            $('.navbar-default').css('border-color', newval);
        });
    });

    wp.customize('nav_border_color', function (value) {
        value.bind(function (newval) {
            $('.navbar-default .navbar-toggle').css('border-color', newval);
        });
    });

    wp.customize('nav_border_color', function (value) {
        value.bind(function (newval) {
            $('.navbar-default .navbar-collapse,.navbar-default .navbar-form').css('border-color', newval);
        });
    });

    wp.customize('nav_text_color', function (value) {
        value.bind(function (newval) {
            $('.navbar-default .navbar-nav>li>a').css('color', newval);
        });
    });

    //sidebar
    wp.customize('block_title_bg_color', function (value) {
        value.bind(function (newval) {
            $('.panel-default>.panel-heading').css('background-color', newval);
        });
    });

    wp.customize('block_title_text_color', function (value) {
        value.bind(function (newval) {
            $('.panel-default>.panel-heading, .sidebar .panel.login .panel-heading .nav-tabs li:not(.active) a').css('color', newval);
        });
    });

    wp.customize('block_icon_bg_color', function (value) {
        value.bind(function (newval) {
            $('.sidebar .panel.box .panel-heading i').css('background-color', newval);
        });
    });

    wp.customize('block_icon_color', function (value) {
        value.bind(function (newval) {
            $('.sidebar .panel.box .panel-heading i').css('color', newval);
        });
    });

    wp.customize('block_border_color', function (value) {
        value.bind(function (newval) {
            $('.panel-default, .single-post').css('border-color', newval);
        });
    });

    wp.customize('block_border_color', function (value) {
        value.bind(function (newval) {
            $('.panel-default>.panel-heading').css('border-color', newval);
        });
    });

    wp.customize('block_border_color', function (value) {
        value.bind(function (newval) {
            $('.sidebar .well').css('border-color', newval);
        });
    })

    wp.customize('block_title_bg_color', function (value) {
        value.bind(function (newval) {
            $('.sidebar .well').css('background-color', newval);
        });
    });

    wp.customize('block_title_text_color', function (value) {
        value.bind(function (newval) {
            $('.sidebar .well').css('color', newval);
        });
    });

    //posts
    wp.customize('post_title_color', function (value) {
        value.bind(function (newval) {
            $('.home-post p a, .single-post a, .single-post > h3, .home-post > h3 a, .page-header').css('color', newval);
        });
    });

    wp.customize('post_text_color', function (value) {
        value.bind(function (newval) {
            $('.home-post p, .single-post p, .single-post li, .single-post .single-post-content').css('color', newval);
        });
    });

    wp.customize('post_more_text_color', function (value) {
        value.bind(function (newval) {
            $('.home-post .btn-primary').css('color', newval);
        });
    });

    wp.customize('post_more_bg_color', function (value) {
        value.bind(function (newval) {
            $('.home-post .btn-primary').css('background', newval);
        });
    });

    wp.customize('post_hr_color', function (value) {
        value.bind(function (newval) {
            $('hr').css('border-color', newval);
        });
    });

    //footer
    wp.customize('top_footer_bg_color', function (value) {
        value.bind(function (newval) {
            $('footer').css('background-color', newval);
        });
    });

    wp.customize('bottom_footer_bg_color', function (value) {
        value.bind(function (newval) {
            $('footer #bottom-footer').css('background-color', newval);
        });
    });

    wp.customize('bottom_footer_bg_color', function (value) {
        value.bind(function (newval) {
            $('footer #bottom-footer').css('border-color', newval);
        });
    });

    wp.customize('top_footer_text_color', function (value) {
        value.bind(function (newval) {
            $('footer #top-footer').css('color', newval);
        });
    });

    wp.customize('top_footer_text_color', function (value) {
        value.bind(function (newval) {
            $('footer #top-footer h4').css('border-color', newval);
        });
    });

    wp.customize('top_footer_text_color', function (value) {
        value.bind(function (newval) {
            $('footer #top-footer, footer #top-footer .foot-visit li, footer #top-footer .foot-comment li a, footer #top-footer .foot-archive li a, footer #top-footer .foot-other li a').css('color', newval);
        });
    });

    wp.customize('bottom_footer_text_color', function (value) {
        value.bind(function (newval) {
            $('footer #bottom-footer').css('color', newval);
        });
    });

})(jQuery);