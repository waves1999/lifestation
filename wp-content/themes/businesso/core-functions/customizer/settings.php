<?php
$my_theme = wp_get_theme();
if($my_theme->get( 'Name' ) == 'businesso'){
add_action( 'customize_register', 'business_pride_settings' );
function business_pride_settings( $wp_customize ) {
	wp_enqueue_style('businesso-customizr', ASIATHEMES_TEMPLATE_DIR_URI .'/assets/css/customizr.css');
	
	$wp_customize->remove_control('header_textcolor');

	/* Header Section */
	$wp_customize->add_panel( 'businesso_container', array(
		'priority'       => 2,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Color Settings', 'businesso'),
	) );
	
	$wp_customize->add_section( 'theme_container' , array(
		'title'      => __('Container Settings', 'businesso'),
		'panel'  => 'businesso_container',
		
	) );
	
	// Header Settig  Layout
	$wp_customize->add_section( 'theme_header_layput' , array(
		'title'      => __('Header Color Setting', 'businesso'),
		'panel'  => 'businesso_container',
		
	) );		
	
	// add color picker setting
	$wp_customize->add_setting( 
		'businesso_option[header_layout_color]', array(
			'default' => __('#060c17','businesso'),
            'type' => 'option', 
            'capability' =>  'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
		// add color picker control
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'businesso_option[header_layout_color]', array(
			'label' => 'Header Background Color',
			'section' => 'theme_header_layput',
			'settings' => 'businesso_option[header_layout_color]',
		) ) );
		
		// Menu Active Color
		$wp_customize->add_setting( 
		'businesso_option[header_menu_active_color]', array(
			'default' => __('#a0ce4e','businesso'),
            'type' => 'option', 
            'capability' =>  'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'businesso_option[header_menu_active_color]', array(
			'label' => 'Menu Active Color',
			'section' => 'theme_header_layput',
			'settings' => 'businesso_option[header_menu_active_color]',
		) ) );
		
		// Menu Hover Color
		$wp_customize->add_setting( 
		'businesso_option[header_menu_hover_color]', array(
			'default' => __('#a0ce4e','businesso'),
            'type' => 'option', 
            'capability' =>  'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'businesso_option[header_menu_hover_color]', array(
			'label' => 'Menu Hover Color',
			'section' => 'theme_header_layput',
			'settings' => 'businesso_option[header_menu_hover_color]',
		) ) );
		
		//Header Menu Menu Border Color
		$wp_customize->add_setting( 
		'businesso_option[header_menu_border_color]', array(
			'default' => __('#a0ce4e','businesso'),
            'type' => 'option', 
            'capability' =>  'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'businesso_option[header_menu_border_color]', array(
			'label' => 'Menu Header Border Color',
			'section' => 'theme_header_layput',
			'settings' => 'businesso_option[header_menu_border_color]',
		) ) );
} 
}
