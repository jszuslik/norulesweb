<?php
/**
 * Theme: norulesweb
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package norulesweb
 */
?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php
    $title_words = preg_split('/\s+/', get_the_title());
    $word_count = 0;
    $h1_string = '';
    $h2_string = '';
    foreach ($title_words as $title_word) :
        if($word_count == 0) :
            $h1_string .= '<h1 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">';
            $h1_string .= $title_word;
            $h1_string .= '</h1>';
        elseif(end($title_words) == $title_word) :
            $h2_string .= $title_word;
        else :
            $h2_string .= $title_word . ' ';
        endif;
        $word_count++;
    endforeach;
    ?>
    <!--========== PROMO BLOCK ==========-->
    <section style="background: url('http://newsite.norulesweb.com/wp-content/uploads/2017/04/milwaukee_bw_1920x1080.jpg') 25% 100% no-repeat fixed;">
        <div class="overlay-grid" style="position: relative; top: 0; width: 100%; height: 100%; background: rgba(0,0,0, 0.8);">
            <div class="container g-position--overlay g-text-center--xs">
                <div class="g-padding-y-50--xs g-margin-t-100--xs g-margin-b-100--xs">
                    <?php echo $h1_string; ?>
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white"><?php echo $h2_string; ?></h2>
                </div>
            </div>
        </div>
    </section>
    <div class="g-hor-divider__dashed--sky-light">
        <div class="container g-padding-y-80--xs g-padding-y-80--sm">
            <div class="row">
                <div class="col-md-9 g-margin-t-0--xs g-margin-t-70--lg g-margin-b-60--xs g-margin-b-0--lg">
                    <div class="g-margin-b-40--xs">
                        <a href="<?php echo get_permalink($post->post_parent); ?>">
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs"><?php echo get_the_title($post->post_parent); ?></p>
                        </a>
                        <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-30--xs"><?php the_title(); ?></h2>
                        <?php echo get_the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
