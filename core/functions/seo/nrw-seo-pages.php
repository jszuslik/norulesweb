<?php
define('NRW_SEO_NONCE', 'nrw_seo_nonce');
class NrwSeoPage {

    /**
     * Start up
     */
    public function __construct() {
        $options = get_option('seo_admin_options');
        isset( $options['enable_on_posts_id']) ? $is_nrw_page_seo_enabled = esc_attr( $options['enable_on_posts_id'] ) : $is_nrw_page_seo_enabled = '';
        if($is_nrw_page_seo_enabled == '1'){
            add_action('add_meta_boxes', array( $this,'nrw_seo_page' ) );
            add_action('save_post', array($this,'nrw_seo_page_save') );
        }
    }

    public function nrw_seo_page() {
        add_meta_box( 'seo_meta', __( 'SEO Page Settings', NRW_TEXT_DOMAIN), array($this, 'nrw_seo_page_callback'), array( 'page', 'post', 'product'));
    }

    public function nrw_seo_page_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), NRW_SEO_NONCE );
        $nrw_seo_stored_meta = get_post_meta( $post->ID );
        $field_array = array(
            array(
                'type' => 'text',
                'name' => 'nrw_seo_title',
                'id' => 'nrw_seo_title',
                'meta_id' => $nrw_seo_stored_meta,
                'label' => 'SEO Title',
                'description' => 'SEO Title'
            ),
            array(
                'type' => 'textarea',
                'name' => 'nrw_seo_description',
                'id' => 'nrw_seo_description',
                'meta_id' => $nrw_seo_stored_meta,
                'label' => 'SEO Description',
                'description' => 'SEO Description'
            ),
            array(
                'type' => 'textarea',
                'name' => 'nrw_seo_structured_data',
                'id' => 'nrw_seo_structured_data',
                'meta_id' => $nrw_seo_stored_meta,
                'label' => 'Structured Data',
                'description' => 'Enter JSON format of sturctured data'
            )
        );
        NrwSeoFunctions::do_meta_fields($field_array);
    }

    public function nrw_seo_page_save( $post_id ) {

        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[NRW_SEO_NONCE] ) && wp_verify_nonce( $_POST[NRW_SEO_NONCE], basename(__FILE__) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }
        if (isset($_POST['nrw_seo_title'])) {
            update_post_meta( $post_id, 'nrw_seo_title', sanitize_text_field($_POST['nrw_seo_title'] ) );
        }
        if (isset($_POST['nrw_seo_description'])) {
            update_post_meta( $post_id, 'nrw_seo_description', sanitize_text_field($_POST['nrw_seo_description'] ) );
        }
        if (isset($_POST['nrw_seo_structured_data'])) {
            update_post_meta( $post_id, 'nrw_seo_structured_data', sanitize_text_field($_POST['nrw_seo_structured_data'] ) );
        }

    }

}
if( is_admin() )
    $seo_page = new NrwSeoPage();