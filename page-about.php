<?php
/**
 * Theme: norulesweb
 *
 * The template for displaying full width pages.
 *
 * Template Name: About Page (no sidebar)
 *
 * @package norulesweb
 */
?>
<?php get_header(); ?>
<!--========== PROMO BLOCK ==========-->
<section style="background: url('http://newsite.norulesweb.com/wp-content/uploads/2017/04/milwaukee_bw_1920x1080.jpg') 25% 100% no-repeat fixed;">
    <div class="overlay-grid" style="position: relative; top: 0; width: 100%; height: 100%; background: rgba(0,0,0, 0.8);">
        <div class="container g-position--overlay g-text-center--xs">
            <div class="g-padding-y-50--xs g-margin-t-100--xs g-margin-b-100--xs">
                <h1 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">About</h1>
                <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">No Rules Web</h2>
            </div>
        </div>
    </div>
</section>
<!--========== END PROMO BLOCK ==========-->
<?php get_template_part('template-parts/frontpage/frontpage', 'about'); ?>
<?php get_template_part('template-parts/about/about', 'services'); ?>

<?php get_footer(); ?>
