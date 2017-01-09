<?php
if ( function_exists('nrw_require_file') ) {

    // Load Classes
    nrw_require_file( NRW_CORE_CLASSES . 'class-tgm-plugin-activation.php' );
    nrw_require_file( NRW_CORE_CLASSES . 'wp_bootstrap_navwalker.php' );
    nrw_require_file( NRW_CORE_CLASSES . 'like-post/nrw-like-post.php' );

    // Load Functions
    nrw_require_file( NRW_CORE_FUNCTIONS . 'customizer/nrw-custom-control.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'customizer/nrw-customizer-settings.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'customizer/nrw-customizer-style.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'nrw-resize-image.php' );

    // Load Widgets
    nrw_require_file( NRW_CORE_WIDGETS . 'nrw-about-widget.php' );
    nrw_require_file( NRW_CORE_WIDGETS . 'nrw-latest-posts-widget.php' );
    nrw_require_file( NRW_CORE_WIDGETS . 'nrw-categories-images.php' );

}