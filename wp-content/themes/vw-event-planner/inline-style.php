<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_event_planner_first_color = get_theme_mod('vw_event_planner_first_color');

	$custom_css = '';

	if($vw_event_planner_first_color != false){
		$custom_css .='.book-now a:hover, #header .nav ul.sub-menu li a:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #slider .view-more:hover, .footer .tagcloud a:hover, .sidebar .custom-social-icons i:hover, .footer .custom-social-icons i:hover, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{';
			$custom_css .='background-color: '.esc_html($vw_event_planner_first_color).';';
		$custom_css .='}';
	}
	if($vw_event_planner_first_color != false){
		$custom_css .='#header .nav ul li a:hover, #slider .view-more, p.site-description, .serv-box i:hover, .footer li a:hover, .post-main-box:hover h3, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title{';
			$custom_css .='color: '.esc_html($vw_event_planner_first_color).';';
		$custom_css .='}';
	}
	if($vw_event_planner_first_color != false){
		$custom_css .='.post-info hr{';
			$custom_css .='border-top-color: '.esc_html($vw_event_planner_first_color).';';
		$custom_css .='}';
	}
	if($vw_event_planner_first_color != false){
		$custom_css .='.post-main-box, .sidebar .widget{
		box-shadow: 0px 15px 10px -15px '.esc_html($vw_event_planner_first_color).';
		}';
	}
	if($vw_event_planner_first_color != false){
		$custom_css .='.serv-box{
		background: linear-gradient(to bottom,'.esc_html($vw_event_planner_first_color).' 30%, transparent 80%);
		}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_event_planner_second_color = get_theme_mod('vw_event_planner_second_color');

	if($vw_event_planner_second_color != false){
		$custom_css .='.book-now a, #header .nav ul.sub-menu li a, .sidebar .custom-social-icons i, .footer .custom-social-icons i, .sidebar .tagcloud a:hover, .pagination .current, .pagination a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$custom_css .='background-color: '.esc_html($vw_event_planner_second_color).';';
		$custom_css .='}';
	}
	if($vw_event_planner_second_color != false){
		$custom_css .='a, .custom-social-icons i:hover, .logo h1 a, .search-box i, #header .nav ul li a, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, #serv-section h3, h1, h2, h3, h4, h5, h6, .post-navigation a, .sidebar h3, .sidebar caption, h2.woocommerce-loop-product__title, .woocommerce div.product .product_title, .woocommerce-message::before, .post-main-box h3{';
			$custom_css .='color: '.esc_html($vw_event_planner_second_color).';';
		$custom_css .='}';
	}
	if($vw_event_planner_second_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($vw_event_planner_second_color).';';
		$custom_css .='}';
	}
	if($vw_event_planner_second_color != false){
		$custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_html($vw_event_planner_second_color).';
		}';
	}
	if($vw_event_planner_second_color != false || $vw_event_planner_first_color != false){
		$custom_css .='.home-page-header, input[type="submit"], .scrollup i, .footer-2, .view-more, #comments input[type="submit"], #slider{
		background: linear-gradient(to right, '.esc_html($vw_event_planner_second_color).', '.esc_html($vw_event_planner_first_color).');
		}';
	}
	if($vw_event_planner_second_color != false || $vw_event_planner_first_color != false){
		$custom_css .='.serv-box:hover{
		background: linear-gradient(to bottom, '.esc_html($vw_event_planner_second_color).', '.esc_html($vw_event_planner_first_color).');
		}';
	}
	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_event_planner_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='#slider .carousel-caption{';
			$custom_css .='top: 55%;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='#slider .carousel-caption{';
			$custom_css .='top: 55%;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_event_planner_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_event_planner_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:22%; right:22%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}