
<?php
$name_string = '';
$latitude = '';
$longitude = '';
$address = '';
$map_string = '';
if(get_theme_mod('nrw_company_info_name_1')) :
    $name_1 = get_theme_mod('nrw_company_info_name_1');
    $name_1_str = str_replace(array(',','.'), '', $name_1);
    $name_string .= str_replace(' ', '+', $name_1_str);
endif;
if(get_theme_mod('nrw_company_info_name_2')) :
    $name_2 = get_theme_mod('nrw_company_info_name_2');
    $name_2_str = str_replace(array(',','.'), '', $name_2);
    $name_string .= '+' . str_replace(' ', '+', $name_2_str);
endif;
if(get_theme_mod('nrw_company_info_name_3')) :
    $name_3 = get_theme_mod('nrw_company_info_name_3');
endif;
if(get_theme_mod('nrw_company_info_address_1')) :
    $address .= get_theme_mod('nrw_company_info_address_1');
endif;
if(get_theme_mod('nrw_company_info_address_2')) :
    $address .= ' - ' . get_theme_mod('nrw_company_info_address_2');
endif;
if(get_theme_mod('nrw_company_info_city')) :
    $address .= ' ' . get_theme_mod('nrw_company_info_city');
endif;
if(get_theme_mod('nrw_company_info_state')) :
    $address .= ', ' . get_theme_mod('nrw_company_info_state');
endif;
if(get_theme_mod('nrw_company_info_zip')) :
    $address .= ' ' . get_theme_mod('nrw_company_info_zip');
endif;
if(get_theme_mod('nrw_company_info_latitude')) :
    $latitude .= ' ' . get_theme_mod('nrw_company_info_latitude');
endif;
if(get_theme_mod('nrw_company_info_longitude')) :
    $longitude .= ' ' . get_theme_mod('nrw_company_info_longitude');
endif;
if(strlen($name_string) > 0 && strlen($latitude) > 0 && strlen($longitude) && strlen($address) > 0) :
    $map_string .= '<a href="';
    $map_string .= 'https://www.google.com/maps/place/';
    $map_string .= $name_string;
    $map_string .= '@/';
    $map_string .= $latitude;
    $map_string .= ',';
    $map_string .= $longitude;
    $map_string .= ',17z/data=!3m1!4b1!4m5!3m4!1s0x8805cce29e40d253:0xf8c41501001e6e7a!8m2!3d';
    $map_string .= $latitude;
    $map_string .= '!4d';
    $map_string .= $longitude;
    $map_string .= '" target="_blank"><i class="fa fa-map-marker"></i>';
    $map_string .= $address;
    $map_string .= '</a>';
endif;
?>


<footer>
    <div class="container">
        <div class="logo-wrapper">
            <h2><?php if($name_1) { echo $name_1; } ?><?php if($name_2) { echo '<br><span>' . $name_2 . '</span>'; } ?></h2>
            <?php if($name_3) { echo '<h6>' . $name_3 . '</h6>'; } ?>
        </div>
        <div class="footer-contact">
            <?php if(get_theme_mod('nrw_company_info_phone')) : ?>
                <?php
                $ph_number_unsan = get_theme_mod('nrw_company_info_phone');
                $ph_number_print = preg_replace('#\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})#', '\1.\2.\3', $ph_number_unsan);
                $ph_number_link = preg_replace('#\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})#', '\1\2\3', $ph_number_unsan);
                ?>
                <a href="tel:+1<?php echo $ph_number_link; ?>" target="_blank"><i class="fa fa-phone"></i><span><?php echo $ph_number_print; ?></span></a>
            <?php endif; ?>
            <?php
            if(strlen($map_string) > 0) :
                echo $map_string;
            endif;
            ?>
        </div>
        <div class="bottom">
            <div class="copyright">
                &copy; <?php echo date("Y"); ?> <?php if(get_theme_mod('nrw_footer_copyright'))  : echo get_theme_mod('nrw_footer_copyright'); endif; ?>
            </div>
            <div class="footer-logos pull-right">
                <?php if(get_theme_mod('nrw_footer_logo_1')) : ?>
                    <?php $img_id_1 = nrw_get_ata_id_from_image_url(get_theme_mod('nrw_footer_logo_1')); ?>
                    <?php echo wp_get_attachment_image($img_id_1, 'full', '', ['class' => 'img-responsive']); ?>
                    <?php $img_id_2 = nrw_get_ata_id_from_image_url(get_theme_mod('nrw_footer_logo_2')); ?>
                    <?php echo wp_get_attachment_image($img_id_2, 'full', '', ['class' => 'img-responsive']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>

<?php

?>

</body>
</html>