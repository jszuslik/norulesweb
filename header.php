<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
        <div class="topbar">
            <div class="container">
                <?php
                wp_nav_menu( array (
                    'container'         => false,
                    'theme_location'    => 'topbar',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'depth'             => 2,
                    'walker'            => new wp_bootstrap_navwalker(),
                    'menu_class'        => 'topbar-menu pull-left'
                ) );
                ?>
                <div class="social pull-right">
                    <?php if(get_theme_mod('nrw_facebook')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_facebook') ); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_twitter')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_twitter') ); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_instagram')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_instagram') ); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_pinterest')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_pinterest') ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_bloglovin')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_bloglovin') ); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_google')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_google') ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_tumblr')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_tumblr') ); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_youtube')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_youtube') ); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_dribbble')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_dribbble') ); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_soundcloud')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_soundcloud') ); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_vimeo')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_vimeo') ); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
                    <?php if(get_theme_mod('nrw_linkedin')) : ?><a href="<?php echo esc_url( get_theme_mod('nrw_linkedin') ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-defualt">
        <div class="container">
            <div class="navbar-header">
<!--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
<!--                <!-- PUT IN LOGO CODE HERE -->
                <?php nrw_logo(); ?>
            </div>
            <nav class="nav">
                <input type="checkbox" class="nav__cb" id="menu-cb"/>
            <?php
            wp_nav_menu( array (
                    'menu' => 'primary',
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'nav__content',
                    'menu_class' => 'nav__items',
                    'before' => '<span class="nav__item-text">',
                    'after' => '</span>',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker())
            );
            ?>
                <label class="nav__btn" for="menu-cb"></label>
            </nav>
        </div>
    </div>
    <div class="container">