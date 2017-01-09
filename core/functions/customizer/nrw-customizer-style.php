<?php
// Customizer - Add CSS --------------------------------------------------------------------------------------------
add_action( 'wp_head', 'nrw_customizer_css' );
function nrw_customizer_css() {
    ?>
<style type="text/css">
<?php if ( get_theme_mod('nrw_accent_color') ) : ?>
a {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
a:hover, a:focus {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
input[type="submit"]:hover{
    background-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
#nav-wrapper .azmenu .current-menu-item > a,
#nav-wrapper .azmenu a:hover {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
#nav-wrapper .sub-menu a:hover {
  color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.slider .owl-controls .owl-dot.active {
    background-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.slider .owl-nav > div:hover{
	background-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.post-cats > a {
  color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.post a:hover {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.post .post-meta .socials li a:hover{
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.post .link-more {
  border-bottom: 1px solid <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.post .link-more:hover{
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.widget-title {
  border: 1px solid <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.widget a:hover {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.latest-post .post-item-text h4 a:hover{
	color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.latest-post .post-item-text .post-meta:hover {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.single-post-footer .social-share a:hover, .social-widget > a:hover {
    background-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.widget_categories ul li a:hover{
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>
}
.social-footer a:hover {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.social-footer a:hover > i {
    border-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.nrw-pagination .page-numbers:hover, .nrw-pagination .page-numbers.current {
    background-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.topbar-menu li a:hover, .topbar .social a:hover {
    color:<?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.mini-shoping-cart-wraper > a:hover,
div.mini-shoping-cart-wraper.show-cart .mini-shoping-cart-wraper > a{
	color: <?php echo get_theme_mod('nrw_accent_color'); ?>
}
.mini-shoping-cart-wraper > a:hover .cart-number-items,
.mini-shoping-cart-wraper.show-cart > a .cart-number-items{
	border-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.mini-shoping-cart-wraper .product_list_widget li .widget-cart-title-product > a:hover{
	color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.mini-shoping-cart-wraper .widget_shopping_cart_content .button:hover,
.mini-shoping-cart-wraper .widget_shopping_cart_content .button:focus{
	background: <?php echo get_theme_mod('nrw_accent_color'); ?>;
	border-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.products div.product h3 > a:hover,
.products div.product h3 > a:focus{
	color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.products div.product a.button.product_type_simple:hover,
.products div.product a.button.product_type_variable:hover,
.products div.product a.button.add_to_cart_button:hover,
.products div.product a.button.product_type_simple.added:hover,
.products div.product a.button.product_type_simple:hover{
    background: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.products div.product .added_to_cart.wc-forward:hover{
    background: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.widget_price_filter .ui-slider-horizontal .ui-slider-range {
    background: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.widget_price_filter .price_slider_amount button:hover{
	background: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.star-rating span {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.woocommerce .widget_shopping_cart_content .button:hover {
    background-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
#review_form  #commentform .stars > span a:hover::before, #review_form  #commentform .stars > span a.active::before {
  color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
.widget.widget_product_tag_cloud a:hover {
    color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
    border-color: <?php echo get_theme_mod('nrw_accent_color'); ?>;
}
<?php endif; ?>

<?php if ( get_theme_mod('nrw_custom_css') ) : ?>
    <?php echo get_theme_mod('nrw_custom_css'); ?>
<?php endif; ?>
</style>
    <?php
}