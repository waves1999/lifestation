<?php

$businesso_options=theme_default_data(); 
        $header_setting = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_options );
		$header_layout_color 			= $header_setting['header_layout_color'];
		$header_menu_active_color 		= $header_setting['header_menu_active_color'];
		$header_menu_hover_color	 	= $header_setting['header_menu_hover_color'];
		$header_menu_border_color	 	= $header_setting['header_menu_border_color'];
 ?>
 <style>
	
.header-section {
  background-color: <?php echo $header_layout_color ?>;
}
<!-- /*---Menu Font color and typogrpy-----*/  -->
.navbar-default .navbar-nav > li > a {
    color: #333333 !important;
    font-family: 'OpenSansRegular';
    font-size: 16px;
}
<!-- /*------Menu hover and Active --------*/  -->
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus { 
    background-color:<?php echo $header_menu_active_color ?> !important;
    border-right: 1px solid <?php echo $header_menu_active_color ?> !important;
    color: #fff!important;
}

.btn-info{

    background-color:<?php echo $header_menu_active_color ?> !important;
    border-right: 1px solid <?php echo $header_menu_active_color ?> !important;
    color: #fff!important;
}
<!-- /*------Active Menu Color --------*/  -->
.navbar-default .navbar-nav > li.current_page_item > a {
    background-color:<?php echo $header_menu_active_color ?>;
    border-right: 1px solid <?php echo $header_menu_active_color ?>;
    color: #fff!important;
}
<!-- /*------Menu hover and Active --------*/  -->
.navbar-default .navbar-nav > li > a:hover {
    background-color:<?php echo esc_url($header_menu_hover_color) ?>;
    border-right: 1px solid <?php echo esc_url($header_menu_hover_color) ?>;
    color: #fff!important;
}

.page-title-section
{
	background: url('<?php  echo esc_url($header_setting['slider_image_one1']); ?>') no-repeat fixed 0 0 / cover rgba(0,0,0,0);
	height: 100%;
	margin: 0;
	overflow: hidden;
	padding: 0;
	MAX-width: 100%;
}

.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover {
	background-color:<?php echo esc_url($header_menu_hover_color) ?>;
}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
	background-color: <?php echo esc_url($header_menu_hover_color) ?>!important;
    color: #fff!important;
}

.navbar {    border: 2px solid <?php echo esc_url($header_menu_border_color) ?> !important;}
</style>	