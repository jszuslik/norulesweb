<?php
define('NRW_LIBS_URI', get_template_directory_uri() . '/libs/');
define('NRW_CORE_PATH', get_template_directory() . '/core/');
define('NRW_CORE_URI', get_template_directory_uri() . '/core/');
define('NRW_ASSETS_URI', get_template_directory_uri() . '/assets/');
define('NRW_FUNCTIONS_URI', NRW_CORE_URI . '/functions/');
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

// Register & Enqueue Styles and Scripts
add_action('wp_enqueue_scripts', 'nrw_load_scripts');
function nrw_load_scripts() {

    //CSS
    wp_enqueue_style('nrw_bootstrap', NRW_LIBS_URI . 'bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('nrw_font-awesome', NRW_LIBS_URI . 'font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('nrw_chosen-min', NRW_LIBS_URI . 'chosen/chosen.min.css');
    wp_enqueue_style('nrw_owl-carousel', NRW_LIBS_URI . 'owl/owl.carousel.css');
    wp_enqueue_style('nrw_commerce', NRW_ASSETS_URI . 'css/woocommerce.css');
    wp_enqueue_style('nrw_theme_style', get_stylesheet_directory_uri() . '/style.css');

    //JS
    wp_enqueue_script('nrw_fitvids', NRW_LIBS_URI . 'fitvids/fitvids.js', array('jquery'), false, true);
    wp_enqueue_script('nrw_owl-carousel', NRW_LIBS_URI . 'owl/owl.carousel.min.js', array(), false, true);
    wp_enqueue_script('nrw_masonry', NRW_LIBS_URI . 'masonry/masonry.min.js', array(), false, true);
    wp_enqueue_script('nrw_chosen', NRW_LIBS_URI . 'chosen/chosen.jquery.min.js', array(), false, true);
    wp_enqueue_script('nrw_scripts', NRW_ASSETS_URI . 'js/nrw-scripts.js', array(), false, true);

    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
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