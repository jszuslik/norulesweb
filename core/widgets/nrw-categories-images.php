<?php
class Nrw_Categories_Images extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'nrw_categories_widget',
            'description' => esc_html__('Categories Images Widget', NRW_TEXT_DOMAIN)
        );

        parent::__construct( 'nrw_categories_images', 'NRW: Categories Images Widget', $widget_ops );
    }

    public function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        echo wp_kses_post($before_widget);
        $title          = ( empty($instance['title']) || !isset($instance['title']) ) ? 'Categories' : $instance['title'];
        $limit          = ( !isset($instance['limit']) || (int)$instance['limit'] < 1 ) ? 3 : (int)$instance['limit'];
        $hide_empty     = isset( $instance['hide_empty'] ) ? '1' : '0';
        $parent         = isset( $instance['parent'] ) ? 0 : '';
        $order          = isset( $instance['order'] ) ? $instance['order'] : 'ASC';
        $orderby        = isset( $instance['orderby'] ) ? $instance['orderby'] : 'name';

        $args = array(
            'orderby'     => $orderby,
            'order'       => $order,
            'parent'      => $parent,
            'number'      => $limit,
            'hide_empty'  => $hide_empty
        );

        $categories = get_categories($args);

        if ( !empty($categories) ) : ?>
            <h4 class="widget-title"><?php echo esc_attr($title); ?></h4>
            <div class="nrw-widget-content nrw-categories-image">
            <ul>
                <?php foreach ($categories as $cat) :
                    ?>
                    <?php if ( function_exists('z_taxonomy_image_url') ) : ?>
                    <li class="category-item">
                        <figure><img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" alt=""/></figure>
                        <div class="over-bg"><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo esc_attr($cat->name); ?></a></div>
                    </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            </div><?php
        endif;
        echo wp_kses_post($after_widget);
    }

    public function update( $new_instance, $old_instance ) {
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    public function form( $instance ) {
        $title              = empty($instance['title']) ? esc_html__('Categories', NRW_TEXT_DOMAIN) : $instance['title'];
        $categories_style   = ( empty($instance['categories_style']) || !isset($instance['categories_style']) ) ? 'Normal' : $instance['categories_style'];
        $limit              = ( !isset($instance['limit']) || (int)$instance['limit'] < 1 ) ? 3 : (int)$instance['limit'];
        $hide_empty         = isset( $instance['hide_empty'] ) ? true : false;
        $parent             = isset( $instance['parent'] ) ? '0' : '';
        $order              = isset( $instance['order'] ) ? $instance['order'] : 'ASC';
        $orderby            = isset( $instance['orderby'] ) ? $instance['orderby'] : 'name';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name( 'title' )); ?>"><?php esc_html_e( 'Title:', NRW_TEXT_DOMAIN ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name( 'limit' )); ?>"><?php esc_html_e( 'Limit:', NRW_TEXT_DOMAIN ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'limit' )); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name( 'hide_empty' )); ?>"><?php esc_html_e( 'Hide Empty', NRW_TEXT_DOMAIN ); ?></label>
            <input class="widefat" <?php if ( 1 == $hide_empty ) : ?>checked=""<?php endif; ?> id="<?php echo esc_attr($this->get_field_id( 'hide_empty' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'hide_empty' )); ?>" type="checkbox" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name( 'parent' )); ?>"><?php esc_html_e( 'Parent', NRW_TEXT_DOMAIN ); ?></label>
            <input class="widefat" <?php if ( '0' == $parent ) : ?>checked=""<?php endif; ?> id="<?php echo esc_attr($this->get_field_id( 'parent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'parent' )); ?>" type="checkbox" />
            <i>Get only top level categories</i>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>"><?php esc_html_e( 'Order By', NRW_TEXT_DOMAIN ); ?></label>
            <select class='widefat' id="<?php echo esc_attr($this->get_field_id('orderby')); ?>" name="<?php echo esc_attr($this->get_field_name('orderby')); ?>">
                <option value='term_id'<?php echo ($orderby == 'term_id') ? 'selected' : ''; ?>><?php esc_html_e('ID', NRW_TEXT_DOMAIN); ?></option>
                <option value='name'<?php echo ($orderby == 'name') ? 'selected' : ''; ?>><?php esc_html_e('Name', NRW_TEXT_DOMAIN); ?></option>
                <option value='count'<?php echo ($orderby == 'count') ? 'selected' : ''; ?>><?php esc_html_e('Count', NRW_TEXT_DOMAIN); ?></option>
            </select>
            <i><?php esc_html_e('Sort categories alphabetically, by unique Category ID, or by the count of posts in that Category', NRW_TEXT_DOMAIN); ?></i>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name( 'order' )); ?>"><?php esc_html_e( 'Order', NRW_TEXT_DOMAIN ); ?></label>
            <select class='widefat' id="<?php echo esc_attr($this->get_field_id('order')); ?>" name="<?php echo esc_attr($this->get_field_name('order')); ?>">
                <option value='ASC'<?php echo ($order == 'ASC') ? ' selected="selected"' : ''; ?>><?php esc_html_e('ASC', NRW_TEXT_DOMAIN); ?></option>
                <option value='DESC'<?php echo ($order == 'DESC') ? ' selected="selected"' : ''; ?>><?php esc_html_e('DESC', NRW_TEXT_DOMAIN); ?></option>
            </select>
            <i><?php esc_html_e('Sort order for categories (either ascending or descending). The default is ascending', NRW_TEXT_DOMAIN); ?></i>
        </p>
        <?php
    }
}

function nrw_categories_images_widget_init() {
    register_widget( 'Nrw_Categories_Images' );
}
add_action( 'widgets_init', 'nrw_categories_images_widget_init' );