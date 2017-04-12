<?php
define('NRW_CORE_ADMIN', get_template_directory() . '/admin/');
define('NRW_LIBS_URI', get_template_directory_uri() . '/libs/');
define('NRW_CORE_PATH', get_template_directory() . '/core/');
define('NRW_CORE_URI', get_template_directory_uri() . '/core/');
define('NRW_ASSETS_URI', get_template_directory_uri() . '/assets/');
define('NRW_FUNCTIONS_URI', NRW_CORE_URI . '/functions/');
define('NRW_CLASSES_URI', NRW_CORE_URI . 'classes/');
define('NRW_CORE_CLASSES', NRW_CORE_PATH . 'classes/');
define('NRW_CORE_FUNCTIONS', NRW_CORE_PATH . 'functions/');
define('NRW_CORE_WIDGETS', NRW_CORE_PATH . 'widgets/');
define('NRW_TEXT_DOMAIN', 'nrw');



// Set content width
if (!isset( $content_width ) ) { $content_width = 1170; }

// Theme setup
add_action('after_setup_theme', 'nrw_setup');
function nrw_setup() {
    load_theme_textdomain( NRW_TEXT_DOMAIN, get_template_directory() . '/languages' );
    add_theme_support('woocommerce');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_image_size(NRW_TEXT_DOMAIN . '-fullwidth', 1170, 0, true);
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', NRW_TEXT_DOMAIN),
            'topbar'  => esc_html__('Topbar Menu', NRW_TEXT_DOMAIN)
        )
    );
    add_theme_support('post-formats', array('video', 'audio', 'gallery'));
}



function nrw_require_file( $path ) {
    if ( file_exists($path) ) {
        require $path;
    }
}

// Require core files
nrw_require_file( get_template_directory() . '/core/init.php' );

// Include the TGM_Plugin_Activation class
add_action('tgmpa_register', 'nrw_register_required_plugins');

function nrw_register_required_plugins() {
    $plugins = array(
        // Install from external source or directory
        array(
            'name'     				=> esc_html__('', NRW_TEXT_DOMAIN),
            'slug'     				=> '',
            'source' 			    => esc_url(''),
            'force_activation' 		=> false,
            'required' 				=> false,
            'force_deactivation' 	=> false,
            'version' 				=> ''
        ),
        array(
            'name'     				=> 'WooCommerce',
            'slug'     				=> 'woocommerce',
            'source'   				=> 'https://downloads.wordpress.org/plugin/woocommerce.2.6.1.zip',
            'required' 				=> true,
            'version' 				=> '2.6.1',
            'force_activation' 		=> false,
            'force_deactivation' 	=> false,
            'external_url' 			=> ''
        ),
        // Install from WordPress.org
        array(
            'name'     				=> '',
            'slug'     				=> '',
            'required' 				=> false,
            'force_activation' 		=> false,
            'force_deactivation' 	=> false,
            'external_url' 			=> ''
        )
    );
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to out
    );
    tgmpa($plugins, $config);
}

/**
 * Blog layout settings
 */
function nrw_blog_config()
{
    if ( is_home() || is_front_page() )
    {
        $nrw_blog_layout       = get_theme_mod('nrw_blog_layout', 'standard');
        $nrw_disable_sidebar   = get_theme_mod('nrw_hompage_disable_sidebar');

        if ( isset($_REQUEST['layout']) && trim($_REQUEST['layout']) != '' ) {
            $nrw_blog_layout = trim($_REQUEST['layout']);
        }
    }
    elseif ( is_single() )
    {
        $nrw_disable_sidebar   = get_theme_mod('nrw_single_post_disable_sidebar');
        $nrw_blog_layout       = null;
    }
    else
    {
        $nrw_blog_layout       = get_theme_mod('nrw_archive_layout', 'standard');
        $nrw_disable_sidebar   = get_theme_mod('nrw_archive_disable_sidebar');
    }

    if ( isset($_REQUEST['sidebar']) && trim($_REQUEST['sidebar']) == 'no' ) {
        $nrw_disable_sidebar = true;
    }

    if ( $nrw_blog_layout == '3col_grid' ) $nrw_disable_sidebar = true;

    if ( $nrw_disable_sidebar ) {
        $nrw_blog_column = 12;
        $nrw_blog_column_sm  = 12;
    } else {
        $nrw_blog_column  = 9;
        $nrw_blog_column_sm = 8;
    }

    $nrw_blog = array();
    $nrw_blog['layout']            = $nrw_blog_layout;
    $nrw_blog['disable_sidebar']   = $nrw_disable_sidebar;
    $nrw_blog['column']            = $nrw_blog_column;
    $nrw_blog['column_sm']         = $nrw_blog_column_sm;


    return $nrw_blog;
}
function nrw_url_encode($title) {
    $title = html_entity_decode($title);
    $title = urlencode_deep($title);
    return $title;
}
/** Pagination */
function nrw_pagination() {
    global $wp_query;
    if ( (int)$wp_query->found_posts > (int)get_option('posts_per_page') ) : ?>
        <div class="natalie-pagination"><?php
            $args = array(
                'prev_text' => '<span class="fa fa-angle-left"></span>',
                'next_text' => '<span class="fa fa-angle-right"></span>'
            );
            the_posts_pagination($args);
            ?>
        </div>
        <?php
    endif;
}


// Custom excerpt max charlength
function nrw_the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '&nbsp;...';
    } else {
        echo $excerpt;
    }
}

function p($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
function get_page_id_by_slug($slug){
    global $wpdb;
    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'AND post_type = 'page'");
    return $id;
}



function nrw_get_ata_id_from_image_url( $attachment_url = ''  ) {
    global $wpdb;
    $attachment_id = false;

    // If there is no url, return.
    if ( '' == $attachment_url )
        return;

    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();

    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

    }

    return $attachment_id;
}


function nrw_logo() {
    if (get_theme_mod('nrw_logo')):
        $lght_logo_id = get_theme_mod('nrw_lght_logo');
        $lght_logo_id = nrw_get_ata_id_from_image_url($lght_logo_id);
        $lght_image = wp_get_attachment_image_src( $lght_logo_id , 'thumbnail' );

        $drk_logo_id = get_theme_mod('nrw_drk_logo');
        $drk_logo_id = nrw_get_ata_id_from_image_url($drk_logo_id);
        $drk_image = wp_get_attachment_image_src( $drk_logo_id , 'thumbnail' );

        $brand = '<a class="s-header__logo-link" href="/">';
        $brand .= '<img class="s-header__logo-img s-header__logo-img-default" src="' . $lght_image[0] . '"/>';
        $brand .= '<img class="s-header__logo-img s-header__logo-img-shrink" src="' . $drk_image[0] . '"/>';
        $brand .= '</a>';

        echo $brand;
    else:
        echo '<a class="navbar-brand" href="/"><h1></h1></a>';
    endif;
}
add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 3 );
function special_nav_class( $classes, $item, $args ) {
    if ( 'primary' === $args->theme_location ) {
        unset($classes);
        $classes[] = 's-header__nav-menu-item';
    }

    return $classes;
}
function nrw_print_child_info($id) {
    $data_options = array(
            array('250','1000'),
            array('750','1500'),
            array('1250','2000')
    );
    $args = array(
        'sort_order' => 'desc',
        'child_of' => get_the_id()
    );
    $pages = get_pages($args);
    $page_count = 0;
    foreach ($pages as $page) :
//        p($page);
        if($page_count % 2 == 0) :
                if($page_count >= 2) : ?>
                    <hr class="colored-rule-right" data-<?php echo $data_options[$page_count - 1][0]; ?>="transform: scaleX(1)" data-<?php echo $data_options[$page_count - 1][1]; ?>="transform: scaleX(2500)">
                <?php endif;
                nrw_left_side_service_display($page);
            else :
                if($page_count >= 1) : ?>
                    <hr class="colored-rule-left" data-<?php echo $data_options[$page_count - 1][0]; ?>="transform: scaleX(1)" data-<?php echo $data_options[$page_count - 1][1]; ?>="transform: scaleX(2500)">
                <?php endif;
                nrw_right_side_service_display($page);
    endif; $page_count++; endforeach;

}
function nrw_left_side_service_display($page) { ?>
    <div class="g-promo-section">
        <div class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="row">
                <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">
                        <?php echo get_the_title($page->post_parent); ?>
                    </p>
                    <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                        <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md"><?php echo $page->post_title; ?></h2>
                    </div>
                    <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                        <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md"></h2>
                    </div>
                    <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".5s">
                        <div>
                            <a href="<?php the_permalink($page->ID); ?>" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs"><?php echo get_post_meta($page->ID, 'nrw_page_btn', true); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <?php echo $page->post_content; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-3 g-promo-section__img-right--lg g-bg-position--center g-height-100-percent--md" style="background: url('<?php echo get_post_meta($page->ID, 'nrw_meta_image', true);?>') no-repeat; padding: 0; opacity: 0.9">
            <div class="overlay-grid" style="position: relative; top: 0; width: 100%; height: 100%; background: url('http://newsite.norulesweb.com/wp-content/uploads/2017/04/bright-squares.png')"></div>
            <!--        <img class="img-responsive" src="wp-content/uploads/2017/04/web_design_ux_970x970.jpg" alt="Image">-->
        </div>
    </div>
<?php }
function nrw_right_side_service_display($page) { ?>
    <div class="g-promo-section">
        <div class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="row">
                <div class="col-md-4 col-md-offset-3">
                    <?php echo $page->post_content; ?>
                </div>
                <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg col-md-offset-1">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs"><?php echo get_the_title($page->post_parent); ?></p>
                    <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".1s">
                        <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md"><?php echo $page->post_title; ?></h2>
                    </div>
                    <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".3s">
                        <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md"></h2>
                    </div>
                    <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".5s">
                        <div>
                            <a href="<?php the_permalink($page->ID); ?>" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs"><?php echo get_post_meta($page->ID, 'nrw_page_btn', true); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 g-promo-section__img-left--lg g-bg-position--center g-height-100-percent--md" style="background: url('<?php echo get_post_meta($page->ID, 'nrw_meta_image', true);?>') no-repeat; padding: 0; opacity: 0.9">
            <div class="overlay-grid" style="position: relative; top: 0; width: 100%; height: 100%; background: url('http://newsite.norulesweb.com/wp-content/uploads/2017/04/bright-squares.png')"></div>
            <!--        <img class="img-responsive" src="wp-content/uploads/2017/04/web_design_ux_970x970.jpg" alt="Image">-->
        </div>
    </div>
<?php }
