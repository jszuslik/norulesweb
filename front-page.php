<?php
get_header();
if ( get_theme_mod('nrw_featured_slider') ) {
    get_template_part('template-parts/featured', 'slider');
}

if ( get_theme_mod('nrw_promobox_show') ) {
    get_template_part('template-parts/funnel', 'boxes');
}

$nrw_blog_config = nrw_blog_config();
?>
    <div class="row">
        <div class="col-md-<?php echo esc_attr( $nrw_blog_config['column'] ); ?> col-sm-<?php echo esc_attr( $nrw_blog_config['column_sm'] ); ?>">
            <?php
            if ( $nrw_blog_config['layout'] == '2col_grid' ) {
                get_template_part('loop', '2col-grid');
            } elseif ( $nrw_blog_config['layout'] == '3col_grid' ) {
                get_template_part('loop', '3col-grid');
            } else {
                get_template_part('loop', 'standard');
            }
            ?>
        </div>
        <?php if ( !$nrw_blog_config['disable_sidebar'] ) : ?>
            <div class="col-md-3 col-sm-4 sidebar"><?php get_sidebar(); ?></div>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>