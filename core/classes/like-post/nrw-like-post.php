<?php
class Nrw_Like_Post {

    function __construct()   {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_ajax_nrw-like-post', array($this, 'ajax'));
        add_action('wp_ajax_nopriv_nrw-like-post', array($this, 'ajax'));
    }

    function enqueue_scripts() {
        wp_enqueue_script( 'nrw-like-post', NRW_CORE_CLASSES . 'like-post/js/nrw-like-post.js', 'jquery', '1.0', true );
        wp_localize_script( 'nrw-like-post', 'NrwLike', array(
            'ajaxurl' => admin_url('admin-ajax.php')
        ));
    }

    function ajax($post_id) {

        //update
        if( isset($_POST['likes_id']) ) {
            $post_id = str_replace('nrw-like-post-', '', $_POST['likes_id']);
            echo $this->like_post($post_id, 'update');
        }

        //get
        else {
            $post_id = str_replace('nrw-like-post-', '', $_POST['likes_id']);
            echo $this->like_post($post_id, 'get');
        }

        exit;
    }


    function like_post($post_id, $action = 'get')
    {
        if(!is_numeric($post_id)) return;

        switch($action) {

            case 'get':
                $love_count = get_post_meta($post_id, '_nrw_like_post', true);
                if( !$love_count ){
                    $love_count = 0;
                    add_post_meta($post_id, '_nrw_like_post', $love_count, true);
                }
                if ( (int)$love_count < 1 ) {
                    $love_count = null;
                }
                return '<span class="nrw-like-post-count">'. $love_count .'</span>';
                break;

            case 'update':
                $love_count = get_post_meta($post_id, '_nrw_like_post', true);
                if( isset($_COOKIE['nrw_like_post_'. $post_id]) ) return $love_count;

                $love_count++;
                update_post_meta($post_id, '_nrw_like_post', $love_count);
                setcookie('nrw_like_post_'. $post_id, $post_id, time()*20, '/');

                if ( (int)$love_count < 1 ) {
                    $love_count = null;
                }

                return '<span class="nrw-like-post-count">'. $love_count .'</span>';
                break;

        }
    }


    function add_love() {
        global $post;

        $output = $this->like_post($post->ID);

        $class = 'nrw-like-post';
        $title = esc_html__('Like this', NRW_TEXT_DOMAIN);
        if( isset($_COOKIE['nrw_like_post_'. $post->ID]) ){
            $class = 'nrw-like-post liked';
            $title = esc_html__('You already liked this!', NRW_TEXT_DOMAIN);
        }

        return '<span class="porotfolio-wish"><a href="#" class="'. $class .'" id="nrw-like-post-'. $post->ID .'" title="'. esc_attr($title) .'"><i class="fa fa-heart-o"></i> '.$output.'</a></span>';
    }

}


global $nrw_like_post;
$nrw_like_post = new Nrw_Like_Post();
