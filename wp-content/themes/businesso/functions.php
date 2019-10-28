<?php
/*
	*Theme Name	: Businesso
	*Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('ASIATHEMES_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('ASIATHEMES_TEMPLATE_DIR',get_template_directory());
	define('ASIATHEMES_THEME_FUNCTIONS_PATH',ASIATHEMES_TEMPLATE_DIR.'/core-functions');
	define('ASIATHEMES_THEME_OPTIONS_PATH' , ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel');
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/menu/asiathemes_nav_walker.php' ); // for Custom Menus		
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' );
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/comment-section/comment-function.php' ); //for comments sections
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/widgets/register-sidebar.php' ); //for widget register
	
	//Customizer
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/customizer/settings.php');
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/metabox/metabox-page-post-sidebar.php'); // For New Feature
	require_once('asia_breadcrumbs.php');

add_action( 'after_setup_theme', 'asiathemes_setup' ); 	
		function asiathemes_setup()
		{	// Load text domain for translation-ready
			load_theme_textdomain( 'businesso', ASIATHEMES_THEME_FUNCTIONS_PATH . '/lang' );
			add_theme_support( 'title-tag' );
			
			$header_args = array(
				 'flex-height' => true,
				 'height' => 100,
				 'flex-width' => true,
				 'width' => 1200,
				 'admin-head-callback' => 'mytheme_admin_header_style',
				 );
				 
			add_theme_support( 'custom-header', $header_args );
			// This theme uses wp_nav_menu() in one location.
			add_theme_support('post-thumbnails');
			// This theme uses wp_nav_menu() in one location.
			register_nav_menu( 'primary', __( 'Primary Menu', 'businesso' ) );
			// Woocommerce support
			add_theme_support( 'woocommerce');
			add_theme_support( 'automatic-feed-links');
			
			/*
			 * Enable support for Post Formats.
			 *
			 * See: https://codex.wordpress.org/Post_Formats
			 */
			add_theme_support( 'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			) );

			/* Custom Background */
			$defaults = array(
		    'default-image' => get_template_directory_uri().'/images/background/background.jpg',
		    'default-preset' => 'default',
		    'default-position-x' => 'left',
		    'default-position-y' => 'top',
		    'default-size' => 'auto',
		    'default-repeat' => 'no-repeat',
		    'default-attachment' => 'no scroll',
		    'default-color' => '',
		    'wp-head-callback' => '_custom_background_cb',
		    'admin-head-callback' => '',
		    'admin-preview-callback' => '',
		);
add_theme_support( 'custom-background', $defaults );

			//Default Data
			if ( ! isset( $content_width ) ) $content_width = 900;
			require_once('theme_default_data.php');
			$businesso_option=theme_default_data(); 
			
			require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/option-panel/businesso-option-setting.php' ); // for Option Panel
			
}	

if (!function_exists('businesso_admin_css_enqueue_new_post')) :
	function businesso_admin_css_enqueue_new_post($hook)
	{
		if ('post-new.php' != $hook) {
			return;
		}
		wp_enqueue_style('businesso-admin', get_template_directory_uri() . '/css/admin.css', array(), '2.0.0');
	}
	add_action('admin_enqueue_scripts', 'businesso_admin_css_enqueue_new_post');
endif;



if (!function_exists('businesso_admin_css_enqueue')) :
	function businesso_admin_css_enqueue($hook)
	{
		if ('post.php' != $hook) {
			return;
		}
		wp_enqueue_style('businesso-admin', get_template_directory_uri() . '/css/admin.css', array(), '2.0.0');

	}
	add_action('admin_enqueue_scripts', 'businesso_admin_css_enqueue');
endif;


/*for sidebar options**/

function businesso_names( $classes ) {
	// add 'class-name' to the $classes array
	$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'businesso_sidebar_layout', true) );
	if (is_singular() && $sidebardesignlayout != "default-sidebar")
	{
		$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'businesso_sidebar_layout', true) );

	} else
	{
		$businesso_options=theme_default_data(); 
		$layout_setting = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_options );
		$sidebardesignlayout = esc_attr($layout_setting['businesso_sidebar_layout_option'] );
	}

	$classes[] = $sidebardesignlayout;
	return $classes;

}
add_filter( 'body_class', 'businesso_names' );
			require('template-tags.php');
?>