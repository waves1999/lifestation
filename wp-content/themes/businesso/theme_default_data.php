<?php 
function theme_default_data()
  	{
	return $businesso_option=array(
	
	// Fron-page
	'front_page_enabled' => 1,
	//Header Settings
	'header_info_phone' =>get_theme_mod('header_info_phone',__('(2)245 23 68','businesso')),
	'header_info_mail'=> get_theme_mod('header_info_mail',__('asiathemes[at]gmail[dot]com','businesso')),
	'slider_image_one1'=> ASIATHEMES_TEMPLATE_DIR_URI.'/images/bg-1.jpg',
	//header logo setting
	'upload_image_logo'=> '',
	'upload_image_favicon' => get_template_directory_uri().'/images/favicon.png',
	'text_title' => '' ,
	'height' => '50',
	'width' => '250',

	//Default page layout
	'businesso_sidebar_layout_option' => get_theme_mod('businesso_sidebar_layout_option',__('default-sidebar','businesso')),
		
	//Layout Settingd	
	'layout_setting_data' =>'Wide',
	// Theme Color Scheme
	'theme_color_scheme_options' => 'default.css',
	//Slider settings
	'blog_banner_enabled' => 0,
	'home_banner_enabled' => 1,
	'slider_transition_delay' => 3000,
	'slider_image_one' => get_template_directory_uri().'/images/slide/slide1.png',
	'slider_image_title_one' => get_theme_mod('slider_image_title_one',__('Slider Title One','businesso')),
	'slider_image_description_one' => get_theme_mod('slider_image_description_one',__('Slider one description.','businesso')),
		
	'slider_two_image' => get_template_directory_uri().'/images/slide/slide2.png',
	'slider_image_title_two' => get_theme_mod('slider_image_title_two',__('Slider Title Two','businesso')),
	'slider_image_description_two' => get_theme_mod('slider_image_description_two',__('Slider two description.','businesso')),
		
	'slider_image_three' => get_template_directory_uri().'/images/slide/slide3.png',
	'slider_image_title_three' => get_theme_mod('slider_image_title_three',__('Slider Title Three','businesso')),
	'slider_image_description_three' => get_theme_mod('slider_image_description_three',__('Slider three description.','businesso')),
	'slider_button_text' => get_theme_mod('slider_button_text',__('More Details!','businesso')),
	'slider_image_link' => '#',
	'slider_button_tab' => 1,
	
	//Project Portfolio Section
	'enable_home_portfolio' => 1,
	'portfolio_title_one' => get_theme_mod('portfolio_title_one',__('Recent Works','businesso')),
	'upload_image_one' => get_template_directory_uri().'/images/gallery/1.png',
	'portfolio_image_one_title' => get_theme_mod('portfolio_image_one_title',__('Gallery one title','businesso')),
	'portfolio_image_one_description' => get_theme_mod('portfolio_image_one_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
	'portfolio_image_one_link' => '#',
	'portfolio_new_tab' => 1,
	'upload_image_two' => get_template_directory_uri() .'/images/gallery/2.png',
	'portfolio_image_two_title' => get_theme_mod('portfolio_image_two_title',__('Gallery two title','businesso')),
	'portfolio_image_two_description' => get_theme_mod('portfolio_image_two_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
	'portfolio_image_two_link' => '#',
	'portfolio_two_new_tab' => 1,
	'upload_image_three' => get_template_directory_uri() .'/images/gallery/3.png',
	'portfolio_image_three_title' => get_theme_mod('portfolio_image_three_title',__('Gallery three title','businesso')),
	'portfolio_image_three_description' => get_theme_mod('portfolio_image_three_description',__('Duis autem vel eum iriure dolor in hendrerit in vulputate.','businesso')),
	'portfolio_image_three_link' => '#',
	'portfolio_three_new_tab' => 1,
	
	//Post slider settings
	'page_meta_enabled' => 0,
	'page_sidebar_enabled' => 0,
	//Post slider settings
	'post_slider_enabled'=>1,
	'home_blog_slider_post_count' => 4,
	//Home Latest Blog Post
	'home_blog_enabled' => 1,
	'blog_heading_title' => get_theme_mod('blog_title_one',__('Latest News','businesso')),
	'post_display_count' => 4,
	
	// Latest Feature Container
		
		'header_bottom_border'=>'4',
		'header_layout_color'=>'#060c17',
		'header_menu_active_color'=>'#a0ce4e',
		'header_menu_hover_color'=>'#a0ce4e',
		'header_menu_border_color'=>'#a0ce4e',
		'header_collout_btn'=>1,
	
// Fooetr Customization
	'footer_customization_text' => get_theme_mod('footer_customization_text',__('@ 2016 Businesso Theme Powered by WordPress Developed by ','businesso')),
	'footer_customization_frim_name' => get_theme_mod('footer_customization_frim_name',__('ASIATHEMES','businesso')),
	'footer_customization_frim_url' => get_theme_mod('footer_customization_frim_url',__('https://asiathemes.com/','businesso')),
	'footer_link_new_tab' => 1,
	);
  	}
  ?>