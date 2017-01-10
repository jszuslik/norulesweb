
<?php
$featured_cat = get_theme_mod( 'nrw_featured_cat' );
$get_featured_posts = get_theme_mod('nrw_featured_id');
$number = get_theme_mod( 'nrw_featured_slider_slides' );

if($get_featured_posts) {
    $featured_posts = explode(',', $get_featured_posts);
    $args = array( 'showposts' => $number, 'post_type' => array('post', 'page', 'product'), 'post__in' => $featured_posts, 'orderby' => 'post__in' );
} else {
    $args = array( 'cat' => $featured_cat, 'showposts' => $number );
}
?>
<?php $feat_query = new WP_Query( $args ); ?>
<?php if ($feat_query->have_posts()) : ?>
    <div class="featured-area">
        <div class="slider">
            <?php while ($feat_query->have_posts()) :
                $feat_query->the_post();
                $image_featured = nrw_resize_image( get_post_thumbnail_id($post->ID) , wp_get_attachment_thumb_url(), 1170, 600, true, true );
                $image_featured = $image_featured['url'];
                $pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
                ?>
                <div class="slide-item post" style="background-image: url(<?php echo esc_url($image_featured); ?>);">
                    <div class="slide-item-text">
                        <div class="post-text-inner">
                            <p class="post-cats"><?php the_category(', '); ?></p>
                            <h4 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>