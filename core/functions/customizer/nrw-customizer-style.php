<?php
// Customizer - Add CSS --------------------------------------------------------------------------------------------
add_action( 'wp_head', 'nrw_customizer_css' );
function nrw_customizer_css() {
    ?>
<style type="text/css">
<?php if ( get_theme_mod('nrw_accent_color') ) : ?>

<?php endif; ?>

<?php if ( get_theme_mod('nrw_custom_css') ) : ?>
    <?php echo get_theme_mod('nrw_custom_css'); ?>
<?php endif; ?>
</style>
    <?php
}