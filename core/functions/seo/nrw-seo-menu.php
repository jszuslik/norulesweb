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
        // register_setting('seo_admin_settings_group', 'google_analytics');
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ) {
        $new_input = array();
        if( isset( $input[enable_on_posts_id] ) )
            $new_input['enable_on_posts_id'] = absint( $input['enable_on_posts_id'] );

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function enable_on_posts_id_callback() {
        printf(
            '<input type="checkbox" id="enable_on_posts_id" name="seo_admin_options[enable_on_posts_id]" value="true" />',
            isset( $this->options['enable_on_posts_id'] ) ? esc_attr( $this->options['enable_on_posts_id']) : ''
        );
    }
}
if( is_admin() )
    $my_settings_page = new NrwSeoSettingsPage();