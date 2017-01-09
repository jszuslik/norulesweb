<?php
function nrw_sanitize_default( $value ) {
	return $value;
}

/** nrw - Customizer - Add Settings */
function nrw_register_theme_customizer( $wp_customize )
{
	/** Add Sections -----------------------------------------------------------------------------------------------------------*/
    $wp_customize->add_section( 'nrw_new_section_header', array(
   		'title' => 'Logo upload',
   		'description' => null,
        'priority' => 1
	) );
    $wp_customize->add_section( 'nrw_new_section_blog_layout', array(
   		'title' => 'Blog Settings',
   		'description' => null,
        'priority' => 2
	) );    
    $wp_customize->add_section( 'nrw_new_section_featured' , array(
		'title' => 'Featured Area Settings',
		'description' => '',
        'priority' => 3
	) );
    $wp_customize->add_section( 'nrw_new_section_promobox', array(
   		'title' => 'Promo Boxes',
   		'description' => null,
        'priority' => 4
	) );
    $wp_customize->add_section( 'nrw_new_section_company_info', array(
        'title' => 'Company Contact Information',
        'description' => null,
        'priority' => 5
    ));
    $wp_customize->add_section( 'nrw_new_section_social_media', array(
   		'title' => 'Social Media Settings',
   		'description' => 'Enter your social media URL. Icons will not show if left blank.',
        'priority' => 6
	) );
    $wp_customize->add_section( 'nrw_new_section_footer', array(
   		'title' => 'Footer Settings',
   		'description'  => '',
        'priority' => 7
	) );
    $wp_customize->add_section( 'nrw_new_section_color_accent', array(
   		'title'        => 'Colors: Accent',
   		'description'  => ''
	) );
    $wp_customize->add_section( 'nrw_new_section_custom_css', array(
   		'title'        => 'Custom CSS',
   		'description'  => 'Add your custom CSS which will overwrite the theme CSS'
	) );

    /** Add Settings ------------------------------------------------------------------------------------------------------------*/
    
    /** Blog layout settings */
    $wp_customize->add_setting( 'nrw_blog_layout', array(
        'default' => 'standard',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_archive_layout', array(
        'default' => 'standard',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_hompage_disable_sidebar', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_archive_disable_sidebar', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_single_post_disable_sidebar', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
  	$wp_customize->add_setting( 'nrw_disable_archive_title', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );

  	$wp_customize->add_setting( 'nrw_display_featured_image_single', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_standard_posts_per_page', array(
        'default' => '4',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_2col_grid_posts_per_page', array(
        'default' => '10',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_3col_grid_posts_per_page', array(
        'default' => '9',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_woo_posts_per_page', array(
        'default' => '12',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    /** PromoBox */
    $wp_customize->add_setting( 'nrw_promobox_show', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_one_title', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_one_link', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_one_image', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_two_title', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_two_link', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_two_image', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_three_title', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_three_link', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    $wp_customize->add_setting( 'nrw_promobox_three_image', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );

    // Company Info
    $wp_customize->add_setting( 'nrw_company_info_name', array(
        'default' => '',
        'sanatize_callback' => 'nrw_sanatize_default'
    ) );
    
    // Featured area
	$wp_customize->add_setting( 'nrw_featured_slider', array(
        'default' => false,
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
	$wp_customize->add_setting( 'nrw_featured_cat', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
	$wp_customize->add_setting( 'nrw_featured_id', array(
        'default' => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
	$wp_customize->add_setting( 'nrw_featured_slider_slides', array(
        'default' => '5',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    // Header and Logo
    $wp_customize->add_setting( 'nrw_logo', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_logo_footer', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    // Social media settings
    $wp_customize->add_setting( 'nrw_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_pinterest', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_tumblr', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_bloglovin', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_tumblr', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_google', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_dribbble', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_soundcloud', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );    
    $wp_customize->add_setting( 'nrw_vimeo', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    // Accent
    $wp_customize->add_setting( 'nrw_accent_color', array(
        'default'           => '#f37e7e',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );    
    // Footer
    $wp_customize->add_setting( 'nrw_footer_disable_social', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_footer_copyright', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    $wp_customize->add_setting( 'nrw_logo_footer', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    // Custom CSS
	$wp_customize->add_setting( 'nrw_custom_css', array(
        'default'           => '',
        'sanitize_callback' => 'nrw_sanitize_default'
    ) );
    
    /** Add Constrol ------------------------------------------------------------------------------------------------------------*/
    // Logo
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upload_logo',
			array(
				'label'      => 'Upload logo top',
				'section'    => 'nrw_new_section_header',
				'settings'   => 'nrw_logo',
				'priority'	 => 1
			)
		)
	);
    
    /** PromoBox */
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_promobox_show',
			array(
				'label'      => 'Show Promobox',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_show',
				'type'		 => 'checkbox'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_promobox_one_title',
			array(
				'label'      => 'Box 1 # Title',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_one_title',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_promobox_one_link',
			array(
				'label'      => 'Box 1 # URL',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_one_link',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'nrw_promobox_one_image',
			array(
				'label'      => 'Box 1 # Image',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_one_image'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_promobox_two_title',
			array(
				'label'      => 'Box 2 # Title',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_two_title',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_promobox_two_link',
			array(
				'label'      => 'Box 2 # URL',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_two_link',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'nrw_promobox_two_image',
			array(
				'label'      => 'Box 2 # Image',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_two_image'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_promobox_three_title',
			array(
				'label'      => 'Box 3 # Title',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_three_title',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_promobox_three_link',
			array(
				'label'      => 'Box 3 # URL',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_three_link',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'nrw_promobox_three_image',
			array(
				'label'      => 'Box 3 # Image',
				'section'    => 'nrw_new_section_promobox',
				'settings'   => 'nrw_promobox_three_image'
			)
		)
	);

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'nrw_company_info_name',
            array(
                'label' => 'Company Name',
                'section' => 'nrw_new_section_company_info',
                'settings' => 'nrw_company_info_name',
                'type' => 'text'
            )
        )
    );
    
    // Blog layout
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_blog_layout',
			array(
				'label'          => 'Homepage Layout',
				'section'        => 'nrw_new_section_blog_layout',
				'settings'       => 'nrw_blog_layout',
				'type'           => 'radio',
				'choices'        => array(
					'standard' => 'Standard Layout',
					'2col_grid' => '2 Col Grid',
                    '3col_grid' => '3 Col Grid'
				)
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_archive_layout',
			array(
				'label'          => 'Archive Layout',
				'section'        => 'nrw_new_section_blog_layout',
				'settings'       => 'nrw_archive_layout',
				'type'           => 'radio',
				'choices'        => array(
					'standard' => 'Standard Layout',
					'2col_grid' => '2 Col Grid',
                    '3col_grid' => '3 Col Grid'
				)
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_hompage_disable_sidebar',
			array(
				'label'      => 'Hide sidebar on HOMEPAGE',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_hompage_disable_sidebar',
				'type'		 => 'checkbox'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_archive_disable_sidebar',
			array(
				'label'      => 'Hide sidebar on ARCHIVE',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_archive_disable_sidebar',
				'type'		 => 'checkbox'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_single_post_disable_sidebar',
			array(
				'label'      => 'Hide sidebar on SINGLE POST',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_single_post_disable_sidebar',
				'type'		 => 'checkbox'
			)
		)
	);
  $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_disable_archive_title',
			array(
				'label'      => 'Hide archive title?',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_disable_archive_title',
				'type'		 => 'checkbox'
			)
		)
	);  
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_standard_posts_per_page',
			array(
				'label'      => 'Standard layout # Posts per page',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_standard_posts_per_page',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_2col_grid_posts_per_page',
			array(
				'label'      => '2 Col Grid # Posts per page',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_2col_grid_posts_per_page',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_3col_grid_posts_per_page',
			array(
				'label'      => '3 Col Grid # Posts per page',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_3col_grid_posts_per_page',
				'type'		 => 'text'
			)
		)
	);
    
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'nrw_woo_posts_per_page',
			array(
				'label'      => 'Woocommerce # Posts per page',
				'section'    => 'nrw_new_section_blog_layout',
				'settings'   => 'nrw_woo_posts_per_page',
				'type'		 => 'text'
			)
		)
	);
    // Featured area
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_slider',
			array(
				'label'      => 'Enable Featured Slider',
				'section'    => 'nrw_new_section_featured',
				'settings'   => 'nrw_featured_slider',
				'type'		 => 'checkbox',
				'priority'	 => 2
			)
		)
	);
    
	$wp_customize->add_control(
		new WP_Customize_Category_Control(
			$wp_customize,
			'featured_cat',
			array(
				'label'    => 'Select Featured Category',
				'settings' => 'nrw_featured_cat',
				'section'  => 'nrw_new_section_featured',
				'priority'	 => 3
			)
		)
	);	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_id',
			array(
				'label'      => 'Select featured post/page IDs',
				'section'    => 'nrw_new_section_featured',
				'settings'   => 'nrw_featured_id',
				'type'		 => 'text',
				'priority'	 => 4
			)
		)
	);
	
	$wp_customize->add_control(
		new Customize_Number_Control(
			$wp_customize,
			'featured_slider_slides',
			array(
				'label'      => 'Amount of Slides',
				'section'    => 'nrw_new_section_featured',
				'settings'   => 'nrw_featured_slider_slides',
				'type'		 => 'number',
				'priority'	 => 5
			)
		)
	);
    // Social Media
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook',
			array(
				'label'      => 'Facebook',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_facebook',
				'type'		 => 'text',
				'priority'	 => 1
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'twitter',
			array(
				'label'      => 'Twitter',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_twitter',
				'type'		 => 'text',
				'priority'	 => 2
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram',
			array(
				'label'      => 'Instagram',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_instagram',
				'type'		 => 'text',
				'priority'	 => 3
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'pinterest',
			array(
				'label'      => 'Pinterest',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_pinterest',
				'type'		 => 'text',
				'priority'	 => 4
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bloglovin',
			array(
				'label'      => 'Bloglovin',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_bloglovin',
				'type'		 => 'text',
				'priority'	 => 5
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'google',
			array(
				'label'      => 'Google Plus',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_google',
				'type'		 => 'text',
				'priority'	 => 6
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'tumblr',
			array(
				'label'      => 'Tumblr',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_tumblr',
				'type'		 => 'text',
				'priority'	 => 7
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'youtube',
			array(
				'label'      => 'Youtube',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_youtube',
				'type'		 => 'text',
				'priority'	 => 8
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dribbble',
			array(
				'label'      => 'Dribbble',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_dribbble',
				'type'		 => 'text',
				'priority'	 => 9
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'soundcloud',
			array(
				'label'      => 'Soundcloud',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_soundcloud',
				'type'		 => 'text',
				'priority'	 => 10
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'vimeo',
			array(
				'label'      => 'Vimeo',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_vimeo',
				'type'		 => 'text',
				'priority'	 => 11
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'linkedin',
			array(
				'label'      => 'Linkedin (Use full URL to your Linkedin profile)',
				'section'    => 'nrw_new_section_social_media',
				'settings'   => 'nrw_linkedin',
				'type'		 => 'text',
				'priority'	 => 12
			)
		)
	);
	// Accent
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent_color',
			array(
				'label'      => 'Accent Color',
				'section'    => 'nrw_new_section_color_accent',
				'settings'   => 'nrw_accent_color',
				'priority'	 => 1
			)
		)
	);
    // Footer
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_copyright',
			array(
				'label'      => 'Footer copyright text',
				'section'    => 'nrw_new_section_footer',
				'settings'   => 'nrw_footer_copyright',
				'type'		 => 'text',
				'priority'	 => 2
			)
		)
	);
    // Custom CSS
	$wp_customize->add_control(
		new Customize_CustomCss_Control(
			$wp_customize,
			'custom_css',
			array(
				'label'      => 'Custom CSS',
				'section'    => 'nrw_new_section_custom_css',
				'settings'   => 'nrw_custom_css',
				'type'		 => 'custom_css',
				'priority'	 => 1
			)
		)
	);
    
    // Remove Sections
	// $wp_customize->remove_section( 'title_tagline');
	// $wp_customize->remove_section( 'nav');
	// $wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');
}
add_action( 'customize_register', 'nrw_register_theme_customizer' );