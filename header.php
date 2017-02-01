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
<!--========== HEADER ==========-->
<header class="navbar-fixed-top s-header js__header-sticky js__header-overlay">
    <!-- Navbar -->
    <div class="s-header__navbar">
        <div class="s-header__container">
            <div class="s-header__navbar-row">
                <div class="s-header__navbar-row-col">
                    <!-- Logo -->
                    <div class="s-header__logo">
                        <?php nrw_logo(); ?>
                    </div>
                    <!-- End Logo -->
                </div>
                <div class="s-header__navbar-row-col">
                    <!-- Trigger -->
                    <a href="javascript:void(0);" class="s-header__trigger js__trigger">
                        <span class="s-header__trigger-icon"></span>
                        <svg x="0rem" y="0rem" width="3.125rem" height="3.125rem" viewbox="0 0 54 54">
                            <circle fill="transparent" stroke="#fff" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
                        </svg>
                    </a>
                    <!-- End Trigger -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar -->

    <!-- Overlay -->
    <div class="s-header-bg-overlay js__bg-overlay">
        <!-- Nav -->
        <nav class="s-header__nav js__scrollbar">
            <div class="container-fluid">
                <?php
                wp_nav_menu( array (
                        'menu' => 'primary',
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => null,
                        'container_class' => '',
                        'menu_class' => 'list-unstyled s-header__nav-menu',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker())
                );
                ?>
                <!-- End Menu List -->

                <!-- Menu List -->
<!--                <ul class="list-unstyled s-header__nav-menu">-->
<!--                    <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="about.html">About</a></li>-->
<!--                    <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="team.html">Team</a></li>-->
<!--                    <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="services.html">Services</a></li>-->
<!--                    <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="events.html">Events</a></li>-->
<!--                    <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="faq.html">FAQ</a></li>-->
<!--                    <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="contacts.html">Contacts</a></li>-->
<!--                </ul>-->
                <!-- End Menu List -->
            </div>
        </nav>
        <!-- End Nav -->

        <!-- Action -->
<!--        <ul class="list-inline s-header__action s-header__action--lb">-->
<!--            <li class="s-header__action-item"><a class="s-header__action-link -is-active" href="#">En</a></li>-->
<!--            <li class="s-header__action-item"><a class="s-header__action-link" href="#">Fr</a></li>-->
<!--        </ul>-->
        <!-- End Action -->

        <!-- Action -->
        <ul class="list-inline s-header__action s-header__action--rb">
            <?php if(get_theme_mod('nrw_facebook')) : ?>
            <li class="s-header__action-item">
                <a class="s-header__action-link" href="<?php echo esc_url( get_theme_mod('nrw_facebook') ); ?>" target="_blank">
                    <i class="g-padding-r-5--xs ti-facebook"></i>
                    <span class="g-display-none--xs g-display-inline-block--sm">Facebook</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_theme_mod('nrw_twitter')) : ?>
            <li class="s-header__action-item">
                <a class="s-header__action-link" href="<?php echo esc_url( get_theme_mod('nrw_twitter') ); ?>" target="_blank">
                    <i class="g-padding-r-5--xs ti-twitter"></i>
                    <span class="g-display-none--xs g-display-inline-block--sm">Twitter</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_theme_mod('nrw_instagram')) : ?>
            <li class="s-header__action-item">
                <a class="s-header__action-link" href="<?php echo esc_url( get_theme_mod('nrw_instagram') ); ?>" target="_blank">
                    <i class="g-padding-r-5--xs ti-instagram"></i>
                    <span class="g-display-none--xs g-display-inline-block--sm">Instagram</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_theme_mod('nrw_pinterest')) : ?>
                <li class="s-header__action-item">
                    <a class="s-header__action-link" href="<?php echo esc_url( get_theme_mod('nrw_pinterest') ); ?>" target="_blank">
                        <i class="g-padding-r-5--xs ti-pinterest"></i>
                        <span class="g-display-none--xs g-display-inline-block--sm">Pinterest</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <!-- End Action -->
    </div>
    <!-- End Overlay -->
</header>
<!--========== END HEADER ==========-->

<!--    <div id="wrapper">-->
<!--        <div class="topbar">-->
<!--            <div class="container">-->
<!--                --><?php
//                wp_nav_menu( array (
//                    'container'         => false,
//                    'theme_location'    => 'topbar',
//                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
//                    'depth'             => 2,
//                    'walker'            => new wp_bootstrap_navwalker(),
//                    'menu_class'        => 'topbar-menu pull-left'
//                ) );
//                ?>
<!--                <div class="social pull-right">-->
<!--                    --><?php //if(get_theme_mod('nrw_facebook')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_facebook') ); ?><!--" target="_blank"><i class="fa fa-facebook"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_twitter')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_twitter') ); ?><!--" target="_blank"><i class="fa fa-twitter"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_instagram')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_instagram') ); ?><!--" target="_blank"><i class="fa fa-instagram"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_pinterest')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_pinterest') ); ?><!--" target="_blank"><i class="fa fa-pinterest"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_bloglovin')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_bloglovin') ); ?><!--" target="_blank"><i class="fa fa-heart"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_google')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_google') ); ?><!--" target="_blank"><i class="fa fa-google-plus"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_tumblr')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_tumblr') ); ?><!--" target="_blank"><i class="fa fa-tumblr"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_youtube')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_youtube') ); ?><!--" target="_blank"><i class="fa fa-youtube-play"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_dribbble')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_dribbble') ); ?><!--" target="_blank"><i class="fa fa-dribbble"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_soundcloud')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_soundcloud') ); ?><!--" target="_blank"><i class="fa fa-soundcloud"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_vimeo')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_vimeo') ); ?><!--" target="_blank"><i class="fa fa-vimeo-square"></i></a>--><?php //endif; ?>
<!--                    --><?php //if(get_theme_mod('nrw_linkedin')) : ?><!--<a href="--><?php //echo esc_url( get_theme_mod('nrw_linkedin') ); ?><!--" target="_blank"><i class="fa fa-linkedin"></i></a>--><?php //endif; ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="navbar navbar-defualt">-->
<!--        <div class="container">-->
<!--            <div class="navbar-header">-->
<!--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
<!---->
<!--            </div>-->
<!--                --><?php
//                wp_nav_menu( array (
//                        'menu' => 'primary',
//                        'theme_location' => 'primary',
//                        'depth' => 2,
//                        'container' => 'div',
//                        'container_class' => 'navbar-collapse collapse navbar-responsive-collapse',
//                        'container_id' => 'mobile-collapse',
//                        'menu_class' => 'nav navbar-nav',
//                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
//                        'walker' => new wp_bootstrap_navwalker())
//                );
//                ?>
<!--        </div>-->
<!--    </div>-->