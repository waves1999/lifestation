<?php
add_action( 'customize_register', 'asiathemes_header_customizer' );
function asiathemes_header_customizer( $wp_customize ) {
wp_enqueue_style('businesso-customizr', ASIATHEMES_TEMPLATE_DIR_URI .'/css/customizr.css');
$wp_customize->remove_control('header_textcolor');

/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Options Settings', 'businesso'),
	) );
	
   	$wp_customize->add_section( 'header_front_data' , array(
		'title'      => __('Custom Header Settings', 'businesso'),
		'panel'  => 'header_options',
		'priority'   => 20,
   	) );
	
	$wp_customize->add_setting(
    'businesso_option[front_page_enabled]',
    array(
        'default' => 1 ,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'businesso_option[front_page_enabled]',
    array(
        'label' => __('Front Page Enable/Disable','businesso'),
        'section' => 'header_front_data',
        'type' => 'checkbox',
    )
	);

	function businesso_sanitize_select( $input, $setting ) {

	  // Ensure input is a slug.
	  $input = sanitize_key( $input );

	  // Get list of choices from the control associated with the setting.
	  $choices = $setting->manager->get_control( $setting->id )->choices;

	  // If the input is a valid key, return it; otherwise, return the default.
	  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	/* Page layout option */

	$wp_customize->add_section(
    'businesso_default_sidebar_layout_option',
    array(
        'title' => esc_html__('Default Sidebar Layout Option', 'businesso'),
        'panel' => 'header_options',
        'priority' => 6,
    	)
	);

	/**
	 * Sidebar Option
	 */
	$wp_customize->add_setting(
	    'businesso_option[businesso_sidebar_layout_option]',
	    array(
	        'default' => 'default-sidebar',
	        'sanitize_callback' => 'businesso_sanitize_select',
	    )
	);

	$wp_customize->add_control('businesso_option[businesso_sidebar_layout_option]',
	    array(
	        'label' => esc_html__('Default Sidebar Layout', 'businesso'),
	        'description' => esc_html__('Home/front page does not have sidebar. Inner pages like blog, archive single page/post Sidebar Layout. However single page/post sidebar can be overridden.', 'businesso'),
	        'section' => 'businesso_default_sidebar_layout_option',
	        'type' => 'select',
	        'choices' => array(
	        	'default-sidebar' => esc_html__('Default Sidebar', 'businesso'),
            	'right-sidebar' => esc_html__('Right Sidebar', 'businesso'),
            	'left-sidebar' => esc_html__('Left Sidebar', 'businesso'),
            	'no-sidebar' => esc_html__('No Sidebar', 'businesso'),

	        ),
	        'priority' => 10
	    )
	);

	$wp_customize->add_setting(
	'businesso_option[header_info_phone]', array(
        'default'        => __('(2)245 23 68','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('businesso_option[header_info_phone]', array(
        'label'   => __('Header Phone :', 'businesso'),
        'section' => 'header_front_data',
        'type'    => 'text',
    ));
	$wp_customize->add_setting('businesso_option[header_info_mail]'
		, array(
        'default'        => __('asiathemes.com','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[header_info_mail]', array(
        'label'   => __('Header Mail :', 'businesso'),
        'section' => 'header_front_data',
        'type'    => 'text',
    ));
	
	$wp_customize->add_setting(
		'businesso_option[slider_image_one1]'
		, array(
        'default'        => get_template_directory_uri().'/images/bg-1.jpg',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[slider_image_one1]',
			   array(
				   'label'          => __( 'Upload Title Strip bg Image', 'businesso' ),
				   'section'        => 'header_front_data',
				   //'priority'   => 150,
			   )
		   )
	);
	
	//Header logo setting
	$wp_customize->add_section( 'header_logo' , array(
		'title'      => __('Header Logo setting', 'businesso'),
		'panel'  => 'header_options',
		'priority' => 21,
   	) );
	$wp_customize->add_setting(
		'businesso_option[upload_image_logo]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[upload_image_logo]',
			   array(
				   'label'          => __( 'Upload a 250x50 for Logo Image', 'businesso' ),
				   'section'        => 'header_logo',
			   )
		   )
	);
	
	//Enable/Disable logo text
	$wp_customize->add_setting(
    'businesso_option[text_title]',array(
	'default'    => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'businesso_option[text_title]',
    array(
        'type' => 'checkbox',
        'label' => __('Enable/Disabe Logo','businesso'),
        'section' => 'header_logo',
		'priority' => 10,
    )
	);
	
	
	//Logo width
	
	$wp_customize->add_setting(
    'businesso_option[width]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 200,
	'type' => 'option',
	
	));

	$wp_customize->add_control(
    'businesso_option[width]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Width','businesso'),
        'section' => 'header_logo',
    )
	);
	
	//Logo Height
	$wp_customize->add_setting(
    'businesso_option[height]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 50,
	'type'=>'option',
	
	));

	$wp_customize->add_control(
    'businesso_option[height]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo Height','businesso'),
        'section' => 'header_logo',
    )
	);
	
	
	
	//Text logo
	$wp_customize->add_setting(
	'businesso_option[enable_header_logo_text]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' =>'option',
	'priority' => 2,
	
	));

	$wp_customize->add_control(
    'businesso_option[enable_header_logo_text]',
    array(
        'type' => 'checkbox',
        'label' => __('Show Logo text','businesso'),
        'section' => 'header_logo',
    )
	);
	
	
	// Blog Slider Setting Section
	
	$wp_customize->add_section(
        'blog_slider_section_settings',
        array(
            'title' => __('Blog Slider Settings','businesso'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 35,
			) );
	
	//Hide slider
	
	$wp_customize->add_setting(
    'businesso_option[blog_banner_enabled]',
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'businesso_option[blog_banner_enabled]',
    array(
        'label' => __('Hide blog slider','businesso'),
        'section' => 'blog_slider_section_settings',
        'type' => 'checkbox',
    )
	);
	
	
	// Slider Setting Section
	
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => __('Featured Slider Settings','businesso'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 35,
			) );
	
	//Hide slider
	
	$wp_customize->add_setting(
    'businesso_option[home_banner_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'businesso_option[home_banner_enabled]',
    array(
        'label' => __('Hide Home slider','businesso'),
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
    )
	);
	 
	 
	//Slider Image one setting
	
	$wp_customize->add_setting(
		'businesso_option[slider_image_one]'
		, array(
        'default'        => get_template_directory_uri().'/images/slide/slide1.png',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[slider_image_one]',
			   array(
				   'label'          => __( 'Upload Slider Image One', 'businesso' ),
				   'section'        => 'slider_section_settings',
				   'priority'   => 150,
			   )
		   )
	);
	$wp_customize->add_setting('businesso_option[slider_image_title_one]'
		, array(
        'default'        => __('Slider Title One','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[slider_image_title_one]', array(
        'label'   => __('Slider Image Title one :', 'businesso'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 151,
    ));
	$wp_customize->add_setting('businesso_option[slider_image_description_one]'
		, array(
        'default'        => __('Slider one description.','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[slider_image_description_one]', array(
        'label'   => __('Slider Image  Description One:', 'businesso'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 152,
    ));
	
//Slider Image two setting
	
	$wp_customize->add_setting(
		'businesso_option[slider_two_image]'
		, array(
        'default'        => get_template_directory_uri().'/images/slide/slide2.png',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[slider_two_image]',
			   array(
				   'label'          => __( 'Upload Slider Image Two', 'businesso' ),
				   'section'        => 'slider_section_settings',
				   'priority'   => 155,
			   )
		   )
	);
	$wp_customize->add_setting('businesso_option[slider_image_title_two]'
		, array(
        'default'        => __('Slider Title Two','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[slider_image_title_two]', array(
        'label'   => __('Slider Image Title Two', 'businesso'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 156,
    ));
	$wp_customize->add_setting('businesso_option[slider_image_description_two]'
		, array(
        'default'        => __('Slider two description.','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[slider_image_description_two]', array(
        'label'   => __('Slider Image two Description :', 'businesso'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 157,
    ));
	
//Slider Image three setting
	
	$wp_customize->add_setting(
		'businesso_option[slider_image_three]'
		, array(
        'default'        => get_template_directory_uri().'/images/slide/slide3.png',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[slider_image_three]',
			   array(
				   'label'          => __( 'Upload Slider Image Three', 'businesso' ),
				   'section'        => 'slider_section_settings',
				   'priority'   => 160,
			   )
		   )
	);
	$wp_customize->add_setting('businesso_option[slider_image_title_three]'
		, array(
        'default'        => __('Slider Three Title','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[slider_image_title_three]', array(
        'label'   => __('Slider Image Title Three', 'businesso'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 161,
    ));
	$wp_customize->add_setting('businesso_option[slider_image_description_three]'
		, array(
        'default'        => 'Slider two description.',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[slider_image_description_three]', array(
        'label'   => __('Slider Image three Description', 'businesso'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 162,
    ));
	
	$wp_customize->add_setting(
    'businesso_option[slider_button_text]',
    array(
        'default' => __('More Details!','businesso'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'businesso_option[slider_button_text]',array(
    'label'   => __('Slider Button Text','businesso'),
    'section' => 'slider_section_settings',
	 'type' => 'text',
	 'priority'   => 163,
	 )  );
		
	$wp_customize->add_setting('businesso_option[slider_image_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[slider_image_link]', array(
        'label'   => __('Slider Button Link', 'businesso'),
        'section' => 'slider_section_settings',
        'type'    => 'text',
		'priority'   => 164,
    ));
	$wp_customize->add_setting(
	'businesso_option[slider_button_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'businesso_option[slider_button_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open New tab/window','businesso'),
        'section' => 'slider_section_settings',
		'priority'   => 165,
    )
);
	
	class WP_slider_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
		<a href="<?php echo esc_url( __('https://asiathemes.com', 'businesso'));?>" target="_blank" class="button" id="review_pro"><?php _e( 'Add more Slides take the Pro','businesso' ); ?></a>
	 
	<div>
    <?php
    }
}
//Pro Portfolio section
$wp_customize->add_setting(
     'businesso_option[slider_pro]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_slider_Customize_Control( $wp_customize, 'businesso_option[slider_pro]', array(	
		'label' => __('Discover businesso Pro','businesso'),
        'section' => 'slider_section_settings',
		'setting' => 'businesso_option[slider_pro]',
		'priority'   => 166,
    ))
);

//Slider Animation duration

	$wp_customize->add_setting(
    'businesso_option[slider_transition_delay]',
    array(
        'default' => __('3000','businesso'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'businesso_option[slider_transition_delay]',
    array(
        'type' => 'text',
        'label' => __('Input slide Duration','businesso'),
        'section' => 'slider_section_settings',
		'priority'   => 168,
		
		));	
	// Home Portfolio Section Setting
	
	$wp_customize->add_section( 'home_portfolio' , array(
		'title'      => __('Home Portfolio Settings', 'businesso'),
		'panel'  => 'header_options',
		'priority'   => 37,
   	) );
	
	
	//Enable/Disable Portfolio Section
	$wp_customize->add_setting(
    'businesso_option[enable_home_portfolio]',array(
	'default'    => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'businesso_option[enable_home_portfolio]',
    array(
        'type' => 'checkbox',
        'label' => __('Enable/Disabe Home Portfolio','businesso'),
        'section' => 'home_portfolio',
		'priority'   => 100,
    )
	);
	
	$wp_customize->add_setting(
	'businesso_option[portfolio_title_one]', array(
        'default'        => __('Recent Works','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('businesso_option[portfolio_title_one]', array(
        'label'   => __('Portfolio Title One :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 140,
    ));
		
	//portfolio Image one setting
	
	$wp_customize->add_setting(
		'businesso_option[upload_image_one]'
		, array(
        'default'        => get_template_directory_uri().'/images/gallery/1.png',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[upload_image_one]',
			   array(
				   'label'          => __( 'Upload Portfolio Image One', 'businesso' ),
				   'section'        => 'home_portfolio',
				   'priority'   => 150,
			   )
		   )
	);
	$wp_customize->add_setting('businesso_option[portfolio_image_one_title]'
		, array(
        'default'        => __('Gallery one title','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_one_title]', array(
        'label'   => __('Portfolio Image One Title :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 151,
    ));
	$wp_customize->add_setting('businesso_option[portfolio_image_one_description]'
		, array(
        'default'        => __('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_one_description]', array(
        'label'   => __('Portfolio Image One Description :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 152,
    ));
		
	$wp_customize->add_setting('businesso_option[portfolio_image_one_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_one_link]', array(
        'label'   => __('Portfolio Image One URL :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 153,
    ));
	$wp_customize->add_setting(
	'businesso_option[portfolio_new_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'businesso_option[portfolio_new_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','businesso'),
        'section' => 'home_portfolio',
		'priority'   => 154,
    )
);

//portfolio Image two setting
	
	$wp_customize->add_setting(
		'businesso_option[upload_image_two]'
		, array(
        'default'        => get_template_directory_uri().'/images/gallery/2.png',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[upload_image_two]',
			   array(
				   'label'          => __( 'Upload Portfolio Image Two', 'businesso' ),
				   'section'        => 'home_portfolio',
				   'priority'   => 155,
			   )
		   )
	);
	$wp_customize->add_setting('businesso_option[portfolio_image_two_title]'
		, array(
        'default'        => __('Gallery two title','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_two_title]', array(
        'label'   => __('Portfolio Image Two Title :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 156,
    ));
	$wp_customize->add_setting('businesso_option[portfolio_image_two_description]'
		, array(
        'default'        => __('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_two_description]', array(
        'label'   => __('Portfolio Image two Description :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 157,
    ));
		
	$wp_customize->add_setting('businesso_option[portfolio_image_two_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_two_link]', array(
        'label'   => __('Portfolio Image Two URL :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 158,
    ));
	$wp_customize->add_setting(
	'businesso_option[portfolio_two_new_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'businesso_option[portfolio_two_new_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','businesso'),
        'section' => 'home_portfolio',
		'priority'   => 159,
    )
);

//portfolio Image three setting
	
	$wp_customize->add_setting(
		'businesso_option[upload_image_three]'
		, array(
        'default'        => get_template_directory_uri().'/images/gallery/3.png',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'businesso_option[upload_image_three]',
			   array(
				   'label'          => __( 'Upload Portfolio Image Three', 'businesso' ),
				   'section'        => 'home_portfolio',
				   'priority'   => 160,
			   )
		   )
	);
	$wp_customize->add_setting('businesso_option[portfolio_image_three_title]'
		, array(
        'default'        => 'Gallery three title',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_three_title]', array(
        'label'   => __('Portfolio Image Three Title :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 161,
    ));
	$wp_customize->add_setting('businesso_option[portfolio_image_three_description]'
		, array(
        'default'        => __('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_three_description]', array(
        'label'   => __('Portfolio Image three Description :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 162,
    ));
		
	$wp_customize->add_setting('businesso_option[portfolio_image_three_link]'
		, array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'businesso_option[portfolio_image_three_link]', array(
        'label'   => __('Portfolio Image Three URL :', 'businesso'),
        'section' => 'home_portfolio',
        'type'    => 'text',
		'priority'   => 163,
    ));
	$wp_customize->add_setting(
	'businesso_option[portfolio_three_new_tab]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'businesso_option[portfolio_three_new_tab]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','businesso'),
        'section' => 'home_portfolio',
		'priority'   => 164,
    )
);
	
	class WP_portfolio_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
		<a href="<?php echo esc_url( __('https://asiathemes.com', 'businesso'));?>" target="_blank" class="button" id="review_pro"><?php _e( 'Add more portfolio take the Pro','businesso' ); ?></a>
	 
	<div>
    <?php
    }
}
//Pro Portfolio section
$wp_customize->add_setting(
     'businesso_option[portfolio_pro]',
    array(
        //'default' => __('','businesso'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_portfolio_Customize_Control( $wp_customize, 'businesso_option[portfolio_pro]', array(	
		'label' => __('Discover businesso Pro','businesso'),
        'section' => 'home_portfolio',
		'setting' => 'businesso_option[portfolio_pro]',
		'priority'   => 165,
    ))
);
	
	// Home Blog Posts Section Setting
	
	$wp_customize->add_section(
        'news_section_settings',
        array(
            'title' => __('Home Latest Blog Posts Settings','businesso'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 38,
			)
    );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'businesso_option[home_blog_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'businesso_option[home_blog_enabled]',
    array(
        'label' => __('Hide Home Blog Posts Section','businesso'),
        'section' => 'news_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage News
	$wp_customize->add_setting(
    'businesso_option[blog_heading_title]',
    array(
        'default' => __('Latest News','businesso'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'businesso_option[blog_heading_title]',array(
    'label'   => __('Latest Blog Posts Section Heading title','businesso'),
    'section' => 'news_section_settings',
	 'type' => 'text',)  );
	
	//Select number of latest news on front page
	
	$wp_customize->add_setting(
    'businesso_option[post_display_count]',
    array(
		'type' => 'option',
        'default' => __('4','businesso'),
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'businesso_option[post_display_count]',
    array(
        'type' => 'select',
        'label' => __('Select Number of Post','businesso'),
        'section' => 'news_section_settings',
		 'choices' => array('2'=>__('2', 'businesso'), '4'=>__('4', 'businesso'), '6' => __('6','businesso'), '8' => __('8','businesso'),'10'=> __('10','businesso'), '12'=> __('12','businesso'),'14'=> __('14','businesso'), '16' =>__('16','businesso')),
		));
	
	function businesso_prefix_sanitize_layout( $news ) {
    if ( ! in_array( $news, array( 1,'category_news' ) ) )    
    return $news;
}
	
	//Blog post Slider Setting Section
	
	$wp_customize->add_section(
        'post_slider_section_settings',
        array(
            'title' => __('Home Blog Post Slider Settings','businesso'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 39,
			) );
	
	//Hide slider
	
	$wp_customize->add_setting(
    'businesso_option[post_slider_enabled]',
    array(
        'default' => 1,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'businesso_option[post_slider_enabled]',
    array(
        'label' => __('Hide Blog slider','businesso'),
        'section' => 'post_slider_section_settings',
        'type' => 'checkbox',
    )
	);
	//Select number of latest news on front page
	
	$wp_customize->add_setting(
    'businesso_option[home_blog_slider_post_count]',
    array(
		'type' => 'option',
        'default' => 4,
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'businesso_option[home_blog_slider_post_count]',
    array(
        'type' => 'select',
        'label' => __('Select Number of Post','businesso'),
        'section' => 'post_slider_section_settings',
		 'choices' => array('2'=>__('2', 'businesso'), '4'=>__('4', 'businesso'), '6' => __('6','businesso'), '8' => __('8','businesso'),'10'=> __('10','businesso'), '12'=> __('12','businesso'),'14'=> __('14','businesso'), '16' =>__('16','businesso')),
		));
	
	function businesso_prefix_sanitize_layout_blog( $news ) {
    if ( ! in_array( $news, array( 1,'category_news' ) ) )    
    return $news;
}
	//Page sidebar & Meta Setting Section
	
	$wp_customize->add_section('page_met_sidebar_settings',
        array(
            'title' => __('Page Sidebar & Meta Settings','businesso'),
            'description' => '',
			'panel'  => 'header_options',
			'priority' => 40,
			) );
	
	//Enable/Disable Page Meta
	
	$wp_customize->add_setting(
    'businesso_option[page_meta_enabled]',
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'businesso_option[page_meta_enabled]',
    array(
        'label' => __('Enable/Disable Page Meta','businesso'),
        'section' => 'page_met_sidebar_settings',
        'type' => 'checkbox',
    )
	);
	
	// Enable/Disable Page Sidebar
	
	$wp_customize->add_setting(
    'businesso_option[page_sidebar_enabled]',
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'businesso_option[page_sidebar_enabled]',
    array(
        'label' => __('Enable/Disable Page Sidebar','businesso'),
        'section' => 'page_met_sidebar_settings',
        'type' => 'checkbox',
    )
	);
	
	// Footer Copyright Option Settings
	$wp_customize->add_section( 'footer_copyright_setting' , array(
		'title'      => __('Footer Customization', 'businesso'),
		'panel'  => 'header_options',
		'priority' => 41,
   	) );
	$wp_customize->add_setting(
	'businesso_option[footer_customization_text]'
		, array(
        'default'        => __('@ 2016 Businesso Theme Powered by WordPress Developed by ','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'businesso_option[footer_customization_text]', array(
        'label'   => __('Footer Customization Text', 'businesso'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting(
	'businesso_option[footer_customization_frim_name]'
		, array(
        'default'        => __('ASIATHEMES','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'businesso_option[footer_customization_frim_name]', array(
        'label'   => __('Footer Customization Firm Name', 'businesso'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));

    $wp_customize->add_setting(
	'businesso_option[footer_customization_frim_url]'
		, array(
        'default'        => __('https://asiathemes.com/','businesso'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'businesso_option[footer_customization_frim_url]', array(
        'label'   => __('Footer Customization Firm URL', 'businesso'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting(
    'businesso_option[footer_link_new_tab]',
    array(
        'default' => 1 ,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'businesso_option[footer_link_new_tab]',
    array(
        'label' => __('Footer link open in new tab enable/disable','businesso'),
        'section' => 'footer_copyright_setting',
        'type' => 'checkbox',
    )
	);
	
	//Theme Layout Settings
	$wp_customize->add_section( 'layou_setting' , array(
		'title'      => __('Layout setting', 'businesso'),
		'panel'  => 'header_options',
		'priority' => 43,
   	) );
	$wp_customize->add_setting(
    'businesso_option[layout_setting_data]',array(
	 'default' => __('Wide','businesso'),
	 'type' => 'option',
	 	'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(
    'businesso_option[layout_setting_data]',
	 array(
        'type' => 'select',
        'label' => 'Layout Setting',
        'section' => 'layou_setting',
        'choices' => array('wide'=>__('Wide', 'businesso'), 'boxed'=>__('Boxed', 'businesso')),
		)
	);	
	
	
	// Theme Color Scheme 
	$wp_customize->add_section( 'color_scheme' , array(
		'title'      => __('Theme Color Scheme', 'businesso'),
		'panel'  => 'header_options',
		'priority' => 45,
   	) );
	$wp_customize->add_setting(
    'businesso_option[theme_color_scheme_options]',
    array(
        'default' => __('Default Css', 'businesso'),
		'type' => 'option',
		'sanitize_callback' => 'businesso_sanitize_select',
		
    ));

	$wp_customize->add_control(
    'businesso_option[theme_color_scheme_options]',
    array(
        'type' => 'select',
        'label' => __('Theme Colors Scheme Setting','businesso'),
        'section' => 'color_scheme',
		 'choices' => array('default.css'=>__('Default Css', 'businesso'),'magenta-pink.css'=>__('Magenta-pink Css', 'businesso'),'purple.css'=>__('Purple Css', 'businesso')),
		 //'priority'   => 167,
		));
	
	$wp_customize->add_section( 'businesso_pro' , array(
				'title'      	=> __( 'Upgrade to businesso Premium', 'businesso' ),
				'priority'   	=> 999,
				'panel'=>'header_options',
			) );

			$wp_customize->add_setting( 'businesso_pro', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_businesso_Control( $wp_customize, 'businesso_pro', array(
				'label'    => __( 'businesso Premium', 'businesso' ),
				'section'  => 'businesso_pro',
				'settings' => 'businesso_pro',
				'priority' => 1,
			) ) );
} 
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'businesso_Customize_Misc_Control' ) ) :
class businesso_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_businesso_Control' ) ) :
class More_businesso_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/businessodetail/" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to businesso Premium','businesso'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="businesso_img_responsive " src="<?php echo ASIATHEMES_TEMPLATE_DIR_URI .'/images/businesso.jpg'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'businesso Premium - Features','businesso'); ?></h3>
					<ul style="padding-top:20px">
						<li class="businesso-content" style="color:#b2cc02"> <div class="dashicons dashicons-yes"></div> <?php _e('One Year Free Support ','businesso'); ?> </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('2 Types of awesome theme variations-> 1. Light Variation, 2. Dark Variation.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Animation Enable/Disable Facility in theme.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design.','businesso'); ?> </li>						
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 17 Page Templates.','businesso'); ?> </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('3 Types of Beautiful Home page Layout Templates.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('6 Types of Portfolio Templates.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('masonry gallery Portfolio Templates.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('7 Types of Beautiful Blog Templates.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('2 Types of Services Templates.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('2 Types of Contact-us Templates.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Beautiful Team Templates with awesome design.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('8 types Themes Colors Scheme.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('8 Patterns Background.','businesso'); ?>   </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible.','businesso'); ?>   </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background.','businesso'); ?>  </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Taxonomy Tab effect.','businesso'); ?> </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready.','businesso'); ?> </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode.','businesso'); ?>  </li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Shortcode coming soon in next updation.','businesso'); ?></li>
						<li class="businesso-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Google Fonts.','businesso'); ?>  </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/businessodetail/" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to businesso Premium','businesso'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying With businesso', 'businesso' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'businesso' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/businesso?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;