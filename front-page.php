<?php
get_header();
?>
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <?php get_template_part('template-parts/frontpage/frontpage', 'cta'); ?>

    <?php endwhile; endif; ?>

    <?php get_template_part('template-parts/frontpage/frontpage', 'about'); ?>

    <?php get_template_part('template-parts/frontpage/frontpage', 'services'); ?>

<!--    --><?php //get_template_part('template-parts/frontpage/frontpage', 'parallax1'); ?>

    <?php get_template_part('template-parts/frontpage/frontpage', 'join'); ?>

<!--    --><?php //get_template_part('template-parts/frontpage/frontpage', 'subscribe'); ?>


<?php get_footer(); ?>