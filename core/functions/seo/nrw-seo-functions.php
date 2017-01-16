<?php
class NrwSeoFunctions {


    public function __construct() {
        add_action( 'wp_footer', array($this, 'add_settings_to_footer'), 40 );
        add_action( 'wp_head', array($this, 'add_settings_to_header'), 5);
    }

    public static function do_meta_fields($field_array) {
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
            }
        }
        echo $fields;
    }

    public function insert_google_analytics_code($code) {
        printf('<script>
                (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,"script","https://www.google-analytics.com/analytics.js","ga");

                ga("create", "'.$code.'", "auto");
                ga("send", "pageview");

           </script>'
        );
    }

    public function insert_geo_location_meta($title, $region, $city, $longitude, $latitude) {
        printf(
            '<meta name="DC.title" content="'.$title.'" />
             <meta name="geo.region" content="'.$region.'" />
             <meta name="geo.placename" content="'.$city.'" />
             <meta name="geo.position" content="'.$longitude.';'.$latitude.'" />
             <meta name="ICBM" content="'.$longitude.', '.$latitude.'" />'
        );
    }

    public function add_settings_to_footer() {
        $options = get_option('seo_admin_options');
        $ga_code = $options['add_google_analytics'];
        $this->insert_google_analytics_code($ga_code);
    }

    public function add_settings_to_header() {
        $title = get_bloginfo();
        $options = get_option('seo_admin_options');
        $region = $options['add_geo_meta_region'];
        $city = $options['add_geo_meta_city'];
        $longitude = $options['add_geo_meta_longitude'];
        $latitude = $options['add_geo_meta_latitude'];
        $this->insert_geo_location_meta($title, $region, $city, $longitude, $latitude);
    }

}
$nrw_seo_functions = new NrwSeoFunctions();