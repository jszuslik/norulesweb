<?php
class NrwSeoSettingsPage {
    /**
     * Holds the values to be used in field callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct() {
        add_action('admin_menu', array( $this,'nrw_add_seo_admin_page' ) );
        add_action( 'admin_init', array( $this, 'register_seo_admin_settings' ) );
    }

    /**
     * Add options page
     */
    public function nrw_add_seo_admin_page() {
        add_menu_page(
            'NRW SEO',
            'NRW SEO',
            'manage_options',
            'nrw-seo-menu',
            array( $this, 'nrw_add_seo_admin_options')
        );
    }

    /**
     * Options page callback
     */
    public function nrw_add_seo_admin_options() {
        // Set Class property
        $this->options = get_option( 'seo_admin_options' );
        ?>
        <div class="wrap">
            <h1>NRW SEO Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'seo_admin_group' );
                do_settings_sections( 'seo-setting-admin' );
                // do_settings_sections( 'seo-google-admin');
                submit_button();
            ?>
            </form>
        </div>
    <?php
    }

    /**
     * Register add settings
     */
    public function register_seo_admin_settings() {
        register_setting(
            'seo_admin_group',
            'seo_admin_options',
            array( $this, 'sanitize' )
        );
        add_settings_section(
            'enable_posts_id',
            'Enable SEO on Posts and Pages',
            array( $this, 'print_section_info' ),
            'seo-setting-admin'
        );
        add_settings_field(
            'enable_on_posts_id',
            'Enable on Posts',
            array( $this, 'enable_on_posts_id_callback'),
            'seo-setting-admin',
            'enable_posts_id'
        );
        add_settings_section(
            'google_analytics_id',
            'Google Analytics',
            array($this, 'google_analytics_section_info'),
            'seo-setting-admin'
        );
        add_settings_field(
            'add_google_analytics',
            'Google Analytics ID',
            array( $this, 'add_analytics_id_callback'),
            'seo-setting-admin',
            'google_analytics_id'
        );
        add_settings_section(
            'meta_geo_section',
            'Geo Location Settings',
            array($this, 'geo_location_section_info'),
            'seo-setting-admin'
        );
        add_settings_field(
            'add_geo_meta_region',
            'Geo Region',
            array( $this, 'add_geo_region_meta_tag'),
            'seo-setting-admin',
            'meta_geo_section'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ) {
        $new_input = array();
        if( isset( $input['enable_on_posts_id'] ) )
            $new_input['enable_on_posts_id'] = absint( $input['enable_on_posts_id'] );

        if( isset( $input['add_google_analytics'] ) )
            $new_input['add_google_analytics'] = sanitize_text_field( $input['add_google_analytics'] );

        if( isset( $input['add_geo_meta_region'] ) )
            $new_input['add_geo_meta_region'] = sanitize_text_field( $input['add_geo_meta_region'] );

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info() {
        print 'Enter your settings below:';
    }

    public function google_analytics_section_info() {
        print 'Enter your Google analytics ID';
    }

    public function geo_location_section_info() {
        echo 'Get data from the geo location generator at <a href="http://www.geo-tag.de/generator/en.html" target="_blank">http://www.geo-tag.de/generator/en.html</a>';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function enable_on_posts_id_callback() {
        if(!isset($this->options['enable_on_posts_id'])) {
            $this->options['enable_on_posts_id'] = 0;
        }
        $value = $this->options['enable_on_posts_id'];
        printf(
            '<input type="radio" name="seo_admin_options[enable_on_posts_id]" value="1" ' . checked('1', $value, false) . '/>Yes</br>
            <input type="radio" name="seo_admin_options[enable_on_posts_id]" value="0" ' . checked('0', $value, false) . ' />No'
        );
    }

    public function add_analytics_id_callback() {
        printf(
            '<input type="text" id="google_analytics" name="seo_admin_options[add_google_analytics]" value="%s" />',
            isset( $this->options['add_google_analytics'] ) ? esc_attr( $this->options['add_google_analytics']) : ''
        );
    }

    public function add_geo_region_meta_tag() {
        printf(
            '<input type="text" id="add_geo_meta_region" name="seo_admin_options[add_geo_meta_region]" value="%s" />',
            isset( $this->options['add_geo_meta_region'] ) ? esc_attr( $this->options['add_geo_meta_region']) : ''
        );
    }
}
if( is_admin() )
    $my_settings_page = new NrwSeoSettingsPage();

