</div>
<?php wp_footer(); ?>

<?php
$options = get_option('seo_admin_options');
$ga_code = $options['add_google_analytics'];
insert_google_analytics_code($ga_code);
?>

</body>
</html>