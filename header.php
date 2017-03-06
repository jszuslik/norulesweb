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
        <?php
            $social_links = array();
            if(get_theme_mod('nrw_facebook')) :
                $social_links['nrw_facebook'] = array (
                        'icon' => 'ti-facebook',
                        'name' => 'Facebook'
                );
            endif;
            if(get_theme_mod('nrw_twitter')) :
                $social_links['nrw_twitter'] = array (
                    'icon' => 'ti-twitter',
                    'name' => 'Twitter'
                );
            endif;
            if(get_theme_mod('nrw_instagram')) :
                $social_links['nrw_instagram'] = array (
                    'icon' => 'ti-instagram',
                    'name' => 'Instagram'
                );
            endif;
            if(get_theme_mod('nrw_pinterest')) :
                $social_links['nrw_pinterest'] = array (
                    'icon' => 'ti-pinterest',
                    'name' => 'Pinterest'
                );
            endif;
            if(get_theme_mod('nrw_bloglovin')) :
                $social_links['nrw_bloglovin'] = array (
                    'icon' => 'ti-heart',
                    'name' => 'Bloglovin\''
                );
            endif;
            if(get_theme_mod('nrw_google')) :
                $social_links['nrw_google'] = array (
                    'icon' => 'ti-google',
                    'name' => 'Google+'
                );
            endif;
            if(get_theme_mod('nrw_tumblr')) :
                $social_links['nrw_tumblr'] = array (
                    'icon' => 'ti-tumblr',
                    'name' => 'Tumblr'
                );
            endif;
            if(get_theme_mod('nrw_youtube')) :
                $social_links['nrw_youtube'] = array (
                    'icon' => 'ti-youtube',
                    'name' => 'YouTube'
                );
            endif;
            if(get_theme_mod('nrw_dribbble')) :
                $social_links['nrw_dribbble'] = array (
                    'icon' => 'ti-dribbble',
                    'name' => 'Dribbble'
                );
            endif;
            if(get_theme_mod('nrw_soundcloud')) :
                $social_links['nrw_soundcloud'] = array (
                    'icon' => 'ti-soundcloud',
                    'name' => 'SoundCloud'
                );
            endif;
            if(get_theme_mod('nrw_linkedin')) :
                $social_links['nrw_linkedin'] = array (
                    'icon' => 'ti-linkedin',
                    'name' => 'LinkedIn'
                );
            endif;
        ?>
        <ul class="list-inline s-header__action s-header__action--rb">
            <?php foreach($social_links as $key => $value) : ?>
                <li class="s-header__action-item">
                    <a class="s-header__action-link" href="<?php echo esc_url( get_theme_mod($key) ); ?>" target="_blank">
                        <i class="g-padding-r-5--xs <?php echo $value['icon']; ?>"></i>
                        <span class="g-display-none--xs g-display-inline-block--sm"><?php echo $value['name']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
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