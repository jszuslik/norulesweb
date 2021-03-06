<?php
if ( function_exists('nrw_require_file') ) {

    // Load Classes
    nrw_require_file( NRW_CORE_CLASSES . 'class-tgm-plugin-activation.php' );
    nrw_require_file( NRW_CORE_CLASSES . 'wp_bootstrap_navwalker.php' );
    nrw_require_file( NRW_CORE_CLASSES . 'like-post/nrw-like-post.php' );

    // Load Functions
    nrw_require_file( NRW_CORE_FUNCTIONS . 'scripts/nrw_scripts.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'customizer/nrw-custom-control.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'customizer/nrw-customizer-settings.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'customizer/nrw-customizer-style.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'nrw-resize-image.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'seo/nrw-seo-menu.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'seo/nrw-seo-pages.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'seo/nrw-seo-functions.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'seo/nrw-seo-meta-object.php' );
    nrw_require_file( NRW_CORE_FUNCTIONS . 'seo/nrw-seo-adding-functions.php' );
    nrw_require_file( NRW_CORE_ADMIN . 'page/meta/meta-boxes.php' );
	nrw_require_file( NRW_CORE_ADMIN . 'customizer/theme-options/nrw-theme-options-settings.php' );

    // Load Widgets
    nrw_require_file( NRW_CORE_WIDGETS . 'nrw-about-widget.php' );
    nrw_require_file( NRW_CORE_WIDGETS . 'nrw-latest-posts-widget.php' );
    nrw_require_file( NRW_CORE_WIDGETS . 'nrw-categories-images.php' );

}