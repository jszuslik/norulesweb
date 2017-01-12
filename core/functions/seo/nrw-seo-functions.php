<?php
class NrwSeoFunctions {

add_action( 'wp_footer', 'add_google_analytics_to_footer', 40 );

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

    public function add_google_analytics_to_footer() {
        $options = get_option('seo_admin_options');
        $ga_code = $options['add_google_analytics'];
        insert_google_analytics_code($ga_code);
    }

}