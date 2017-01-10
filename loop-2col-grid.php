<div class="az-blog-grid az-blog-grid2columns">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            $sticky_class = ( is_sticky() ) ? 'is_sticky' : null;
            $pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
        <article <?php post_class("post {$sticky_class}"); ?>>
            <div class="post-wrapper">
                <?php get_template_part('template-parts/post', 'format'); ?>
                <div class="post-content">
                    <p class="post-cats"><?php the_category(", "); ?></p>                   
                    <?php if ( get_the_title() ) : ?>
                    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php endif; ?>
                    <div class="post-meta">
                        <a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ); ?> "><?php the_time(get_option('date_format')); ?></a>
        				<a class="social-icon" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                        <a class="social-icon" target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo nrw_url_encode( get_the_title() ); ?>%20-%20<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
                        <a class="social-icon" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($pin_image); ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
                        <a class="social-icon" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></i></a>
                    </div>
                    <div class="post-except">
                        <?php nrw_the_excerpt_max_charlength(300); ?>
                    </div>
                    <p class="readmore">
                        <a href="<?php the_permalink(); ?>" class="link-more"><?php echo esc_html__('Continue Reading', NRW_TEXT_DOMAIN); ?></a>
                    </p>
                </div>
            </div>
        </article><?php
        endwhile;
    else:
        get_template_part('template-parts/post', 'none');
    endif;
    ?>
</div>
<?php nrw_pagination(); ?>