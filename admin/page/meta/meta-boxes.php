<?php
/**
 * Adds meta fields to page editing screens
 */
define('NRW_PAGE_NONCE', 'nrw_page_nonce');
class NrwPageMeta {

    public function __construct() {
        global $pagenow;
        if($pagenow == 'post.php') {
            add_action('add_meta_boxes', array( $this, 'nrw_home_page_meta' ) );
            add_action('add_meta_boxes', array( $this, 'nrw_page_meta' ) );
            add_action('save_post', array( $this, 'nrw_save_page_meta' ) );
            add_action('admin_print_styles', array( $this, 'nrw_meta_image_enqueue'));
        }
        $this->hp_meta_groups = array(
	        array(
		        'name' => __('Funnel Images', NRW_TEXT_DOMAIN),
		        'fields' => array(
			        array(
				        'type' => 'image',
				        'name' => 'nrw_meta_image_1',
				        'id' => 'nrw_meta_image_1',
				        'btn_id' => 'nrw_image_btn_1',
				        'label' => __('Image 1', NRW_TEXT_DOMAIN),
				        'description' => 'This image displays on the left of the three image grid'
			        ),
			        array(
				        'type' => 'image',
				        'name' => 'nrw_meta_image_2',
				        'id' => 'nrw_meta_image_2',
				        'btn_id' => 'nrw_image_btn_2',
				        'label' => __('Image 2', NRW_TEXT_DOMAIN),
				        'description' => 'This image displays on the top right of the three image grid'
			        ),array(
				        'type' => 'image',
				        'name' => 'nrw_meta_image_3',
				        'id' => 'nrw_meta_image_3',
				        'btn_id' => 'nrw_image_btn_3',
				        'label' => __('Image 3', NRW_TEXT_DOMAIN),
				        'description' => 'This image displays on the bottom right of the three image grid'
			        )
		        )
	        ),
	        array(
		        'name' => __('Funnel Heading', NRW_TEXT_DOMAIN),
		        'fields' => array(
			        array(
				        'type' => 'text',
				        'name' => 'nrw_page_heading',
				        'id' => 'nrw_page_heading',
				        'label' => __('Funnel Heading', NRW_TEXT_DOMAIN),
				        'description' => ''
			        )
		        )
	        )
        );
    }

    public function nrw_home_page_meta() {
        global $post;
        if($post->post_name == 'home') {
            add_meta_box( 'nrw_home_page_meta', __( 'Funnel Settings', NRW_TEXT_DOMAIN), array($this, 'nrw_home_page_meta_callback'), array('page'));
        }
    }

    public function nrw_page_meta() {
        global $post;
        if($post->post_name != 'home') {
            add_meta_box('nrw_page_meta', __('Funnel Settings', NRW_TEXT_DOMAIN), array($this, 'nrw_page_meta_callback'), array('page'));
        }
    }
    
    private $prefix = 'nrw_';
    
    private $hp_meta_groups = '';

    public function nrw_home_page_meta_callback( $post ) {
        wp_nonce_field(basename(__FILE__), NRW_PAGE_NONCE);
        $nrw_stored_page_meta = get_post_meta($post->ID);
        
        $this->do_meta_fields($this->hp_meta_groups, $nrw_stored_page_meta);
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
        $this->do_meta_fields($field_array, $post->ID);
    }

    public function do_meta_fields($field_array, $nrw_stored_page_meta) {
        $fields = '';
        foreach($field_array as $field_group) {
	        $fields .= '<h2>' . $field_group['name'] . '</h2>';
	        foreach($field_group['fields'] as $field) {
		        $value = null;
		        $type = $field['type'];
		        $name = $field['name'];
		        $id = $field['id'];
		        $label = $field['label'];
		        $btn_id = null;
		        if(isset($field['btn_id']))
			        $btn_id = $field['btn_id'];
		        $value = $nrw_stored_page_meta[$id];
		        // p($value);
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
				        $fields .= '<label>' . $label . '</label><br><small>' . $description . '</small>';
				        $fields .= '<input type="text" name="' . $name . '" id="' . $id . '" value="' . $value[0] . '" style="width: 100%" /><br>';
				        $fields .= '<input type="button" id="' . $btn_id . '" class="button nrw_button" value="'. __( 'Choose or Upload an Image', NRW_TEXT_DOMAIN) .'"/></p>';
				        $fields .= '</div>';
		        }
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
	    foreach($this->hp_meta_groups as $field_group) {
		    foreach($field_group['fields'] as $field) {
			    if (isset($_POST[$field['id']])) {
				    update_post_meta( $post_id, $field['id'], sanitize_text_field($_POST[$field['id']] ) );
			    }
		    }
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