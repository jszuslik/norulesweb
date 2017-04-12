<?php
/**
 * Adds meta fields to page editing screens
 */
define('NRW_PAGE_NONCE', 'nrw_page_nonce');
class NrwPageMeta {

    public function __construct() {
        add_action('add_meta_boxes', array( $this, 'nrw_page_meta' ) );
        add_action('save_post', array( $this, 'nrw_save_page_meta' ) );
        add_action('admin_print_styles', array( $this, 'nrw_meta_image_enqueue'));
    }

    public function nrw_page_meta() {
        add_meta_box( 'nrw_page_meta', __( 'Funnel Settings', NRW_TEXT_DOMAIN), array($this, 'nrw_page_meta_callback'), array('page', 'post', 'product'));
    }

    public function nrw_page_meta_callback( $post ) {
        wp_nonce_field(basename(__FILE__), NRW_PAGE_NONCE);
        $nrw_stored_page_meta = get_post_meta($post->ID);
        $field_array = array(
            array(
                'type' => 'text',
                'name' => 'nrw_page_btn',
                'id' => 'nrw_page_btn',
                'meta_id' => $nrw_stored_page_meta,
                'label' => __('Button Text', NRW_TEXT_DOMAIN),
                'description' => ''
            ),
            array(
                'type' => 'image',
                'name' => 'nrw_meta_image',
                'id' => 'nrw_meta_image',
                'meta_id' => $nrw_stored_page_meta,
                'label' => __('Meta Image', NRW_TEXT_DOMAIN),
                'description' => 'This image displays on the parents page'
            )
        );
        $this->do_meta_fields($field_array);
    }

    public function do_meta_fields($field_array) {
        $fields = '';
        foreach($field_array as $field) {
            $meta_fields = $field['meta_id'];
            $value = null;
            $type = $field['type'];
            $name = $field['name'];
            $id = $field['id'];
            $label = $field['label'];
            if(isset($meta_fields[$name]))
                $value = $meta_fields[$name];
            $description = $field['description'];
            switch($type){
                case 'text':
                    $fields .= '<div>';
                    $fields .= '<label>' . $label . '</label>';
                    $fields .= '<p><input type="' . $type . '" name="' . $name . '" id="' . $id . '" value="' . $value[0] . '" style="width: 100%" /></p>';
                    $fields .= '</div>';
                    break;
                case 'textarea':
                    $fields .= '<div>';
                    $fields .= '<label>' . $label . '</br><small>' . $description . '</small></label>';
                    $fields .= '<p><textarea name="' . $name . '" id="' . $id . '" rows="4" style="width:100%">' . $value[0] . '</textarea></p>';
                    $fields .= '</div>';
                    break;
                case 'image':
                    $fields .= '<div>';
                    $fields .= '<label>' . $label . '</label>';
                    $fields .= '<p><input type="text" name="' . $name . '" id="' . $id . '" value="' . $value[0] . '" style="width: 100%" /></p>';
                    $fields .= '<p><input type="button" id="nrw_image_btn" class="button" value="'. __( 'Choose or Upload an Image', NRW_TEXT_DOMAIN) .'"/></p>';
                    $fields .= '</div>';
            }
        }
        echo $fields;
    }

    public function nrw_save_page_meta( $post_id ) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[NRW_PAGE_NONCE] ) && wp_verify_nonce( $_POST[NRW_PAGE_NONCE], basename(__FILE__) ) ) ? 'true' : 'false';
        // Exits script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }
        if (isset($_POST['nrw_page_btn'])) {
            update_post_meta( $post_id, 'nrw_page_btn', sanitize_text_field($_POST['nrw_page_btn'] ) );
        }
        if (isset($_POST['nrw_meta_image'])) {
            update_post_meta( $post_id, 'nrw_meta_image', sanitize_text_field($_POST['nrw_meta_image'] ) );
        }
    }

    function nrw_meta_image_enqueue(){
        wp_enqueue_media();

        // Registers and enqueues the required javascript.
        wp_register_script( 'nrw-meta-box-image', get_template_directory_uri() . '/admin/js/admin-meta.js', array( 'jquery' ) );
        wp_localize_script( 'nrw-meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', NRW_TEXT_DOMAIN ),
                'button' => __( 'Use this image', NRW_TEXT_DOMAIN ),
            )
        );
        wp_enqueue_script( 'nrw-meta-box-image' );
    }

}
if( is_admin() )
    $page_meta = new NrwPageMeta();