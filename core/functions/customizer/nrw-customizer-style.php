<?php
// Customizer - Add CSS --------------------------------------------------------------------------------------------
add_action( 'wp_head', 'nrw_customizer_css' );
function nrw_customizer_css() {
    ?>
<style type="text/css">
<?php if ( get_theme_mod('nrw_primary_accent_color') ) : ?>
    a,
    .tagline h3 {
        color: <?php echo get_theme_mod('nrw_primary_accent_color'); ?>;
    }
    a:hover, a:focus {
        color: <?php echo get_theme_mod('nrw_primary_accent_color'); ?>;
    }
    input[type="submit"]:hover {
        background-color: <?php echo get_theme_mod('nrw_primary_accent_color'); ?>;
    }
<?php endif; ?>

<?php if ( get_theme_mod('nrw_secondary_accent_color') ) : ?>
    .active {
        background-color: <?php echo get_theme_mod('nrw_secondary_accent_color'); ?>;
    }
<?php endif; ?>

<?php if ( get_theme_mod('nrw_primary_content_color') ) : ?>
    #main-content p {
        color: <?php echo get_theme_mod('nrw_primary_content_color'); ?>
    }

<?php endif; ?>

<?php if ( get_theme_mod('nrw_header_background_color') ) : ?>

    .navbar-toggle .icon-bar {
        background-color: <?php echo get_theme_mod('nrw_header_background_color'); ?>;
    }

    .level-1 .current_page_item a,
    .level-1 .current-page-ancestor a {
        color: <?php echo get_theme_mod('nrw_header_background_color'); ?>;
    }

<?php endif; ?>

<?php if ( get_theme_mod('nrw_header_accent_color') ) : ?>
    .level-1 .current_page_item a,
    .level-1 .current-page-ancestor a {
        background: <?php echo get_theme_mod('nrw_header_accent_color'); ?>;
    }
    <?php endif; ?>

<?php if ( get_theme_mod('nrw_header_menu_color') ) : ?>
    .navbar-brand h1,
    .social a,
    #menu-primary a,
    .navbar h6,
    .breadcrumb > .active,
    .level-1 .current_page_item .sub-menu li:hover a,
    .level-1 .current-page-ancestor .sub-menu li:hover a,
    .level-1 .current-menu-parent .sub-menu li:hover a {
        color:  <?php echo get_theme_mod('nrw_header_menu_color'); ?>;
    }
    .navbar-toggle {
        background-color: <?php echo get_theme_mod('nrw_header_menu_color'); ?>;;
        border-color: <?php echo get_theme_mod('nrw_header_menu_color'); ?>;
    }
    .menu-item {
        border-color: <?php echo get_theme_mod('nrw_header_menu_color'); ?>;
    }
    .header-rule {
        border-top-color: <?php echo get_theme_mod('nrw_header_menu_color'); ?>;
    }
<?php endif; ?>
<?php if ( get_theme_mod('nrw_footer_background_color') ) : ?>
footer,
.request-button a {
    background-color: <?php echo get_theme_mod('nrw_footer_background_color'); ?>;
}
.request-button a:hover {
    border-color: <?php echo get_theme_mod('nrw_footer_background_color'); ?>;
}
#main-content h3,
.request-button a:hover {
    color: <?php echo get_theme_mod('nrw_footer_background_color'); ?>;
}
<?php endif; ?>

<?php if ( get_theme_mod('nrw_footer_font_color') ) : ?>
footer,
footer a,
.request-button a {
    color: <?php echo get_theme_mod('nrw_footer_font_color'); ?>;
}
.request-button a:hover {
    background-color: <?php echo get_theme_mod('nrw_footer_font_color'); ?>;
}
<?php endif; ?>

<?php if ( get_theme_mod('nrw_custom_css') ) : ?>
    <?php echo get_theme_mod('nrw_custom_css'); ?>
<?php endif; ?>
</style>
    <?php
}