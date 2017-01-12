<?php
class NrwSeoFunctions {

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



}