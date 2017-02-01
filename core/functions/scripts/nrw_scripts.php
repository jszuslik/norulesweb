<?php
// Register & Enqueue Styles and Scripts
add_action('wp_enqueue_scripts', 'nrw_load_scripts');
function nrw_load_scripts() {

    //FONTS
    wp_enqueue_style('nrw_google_fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700');

    //CSS
    wp_enqueue_style('nrw_bootstrap', NRW_LIBS_URI . 'bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('nrw_font-awesome', NRW_LIBS_URI . 'font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('nrw_animate', NRW_ASSETS_URI . 'css/animate.css');
    wp_enqueue_style('nrw_themify', NRW_LIBS_URI . 'themify/themify.css');
    wp_enqueue_style('nrw_scrollbar', NRW_LIBS_URI . 'scrollbar/scrollbar.min.css');
    wp_enqueue_style('nrw_magnific', NRW_LIBS_URI . 'magnific-popup/magnific-popup.css');
    wp_enqueue_style('nrw_swiper', NRW_LIBS_URI . 'swiper/swiper.min.css');
    wp_enqueue_style('nrw_cubeportfolio', NRW_LIBS_URI . 'cubeportfolio/css/cubeportfolio.min.css');


    wp_enqueue_style('nrw_global_css', NRW_ASSETS_URI . 'css/global/global.css', array(), '0.0.3');
    wp_enqueue_style('nrw_theme_style', NRW_ASSETS_URI . 'css/style.min.css', array(), '0.0.4');

    wp_enqueue_style('nrw_dnu_style', get_stylesheet_directory_uri() . '/style.css', array(), '0.0.3');

    //JS
    wp_enqueue_script('nrw_bootstrap_scripts', NRW_LIBS_URI . 'bootstrap/js/bootstrap.min.js', array('jquery'), false, true);
    // wp_enqueue_script('nrw_smoothscroll_scripts', NRW_LIBS_URI . 'jquery.smooth-scroll.min.js', array(), false, true);
    wp_enqueue_script('nrw_backtotop_scripts', NRW_LIBS_URI . 'jquery.back-to-top.min.js', array(), false, true);
    wp_enqueue_script('nrw_scrollbar_scripts', NRW_LIBS_URI . 'scrollbar/jquery.scrollbar.min.js', array(), false, true);
    wp_enqueue_script('nrw_magnific_scripts', NRW_LIBS_URI . 'magnific-popup/jquery.magnific-popup.min.js', array(), false, true);
    wp_enqueue_script('nrw_swiper_scripts', NRW_LIBS_URI . 'swiper/swiper.jquery.min.js', array(), false, true);
    wp_enqueue_script('nrw_waypoint_scripts', NRW_LIBS_URI . 'waypoint.min.js', array(), false, true);
    wp_enqueue_script('nrw_counterup_scripts', NRW_LIBS_URI . 'counterup.min.js', array(), false, true);
    wp_enqueue_script('nrw_cuberportfolio_scripts', NRW_LIBS_URI . 'cubeportfolio/js/jquery.cubeportfolio.min.js', array(), false, true);
    wp_enqueue_script('nrw_parallax_scripts', NRW_LIBS_URI . 'jquery.parallax.min.js', array(), false, true);
    wp_enqueue_script('nrw_googlemap_scripts', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U', array(), false, true);
    wp_enqueue_script('nrw_wow_scripts', NRW_LIBS_URI . 'jquery.wow.min.js', array(), false, true);

    wp_enqueue_script('nrw_global_scripts', NRW_ASSETS_URI . 'js/global.min.js', array(), false, true);
    wp_enqueue_script('nrw_sticky_scripts', NRW_ASSETS_URI . 'js/components/header-sticky.min.js', array(), false, true);
    wp_enqueue_script('nrw_scrollbar_scripts', NRW_ASSETS_URI . 'js/components/scrollbar.min.js', array(), false, true);
    wp_enqueue_script('nrw_magnific_scripts', NRW_ASSETS_URI . 'js/components/magnific-popup.min.js', array(), false, true);
    wp_enqueue_script('nrw_swiper_scripts', NRW_ASSETS_URI . 'js/components/swiper.min.js', array(), false, true);
    wp_enqueue_script('nrw_counter_scripts', NRW_ASSETS_URI . 'js/components/counter.min.js', array(), false, true);
    wp_enqueue_script('nrw_portfolio_scripts', NRW_ASSETS_URI . 'js/components/portfolio-3-col.min.js', array(), false, true);
    wp_enqueue_script('nrw_parallax_scripts', NRW_ASSETS_URI . 'js/components/parallax.min.js', array(), false, true);
    wp_enqueue_script('nrw_googlemap_scripts', NRW_ASSETS_URI . 'js/components/google-map.min.js', array(), false, true);
    wp_enqueue_script('nrw_wow_comp_scripts', NRW_ASSETS_URI . 'js/components/wow.min.js', array(), false, true);
    wp_enqueue_script('nrw_scripts', NRW_ASSETS_URI . 'js/nrw-scripts.js', array(), false, true);

    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}