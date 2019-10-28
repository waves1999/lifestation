<?php
// theme sub header breadcrumb functions
function curPageURL() {
	$pageURL = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

if( !function_exists('asiathemes_breadcrumbs') ):
	function asiathemes_breadcrumbs() { 
			
		global $post;
		$homeLink = home_url();
	?>
		<!-- Page Title Section -->
		<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row" id="trapezoid">
				 <div class="col-md-6">
						   <?php if (is_home() || is_front_page()) :
									echo '<h1 class="pagetitle white wow fadeInLeft" data-wow-duration="2s">'.__('Home','businesso').'</h1>';
								else:
									businesso_archive_title();
								endif;
						   ?>
						</div>
						<div class="col-md-6">
							<?php
								echo '<ul class="top-breadcrumb wow fadeInRight" data-wow-duration="2s">';
								
								 if (is_home() || is_front_page()) :
								    echo '<li><a href="'.$homeLink.'">'.__('Home','businesso').'</a></li>';
									echo '<li class="active"><a href="'.$homeLink.'">'.get_bloginfo( 'name' ).'</a></li>';
								 else:
									echo '<li><a href="'.$homeLink.'">'.__('Home','businesso').'</a></li>';
									// Blog Category
									if ( is_category() ) {
										echo '<li class="active"><a href="'. curPageURL() .'">' . __('Archive category','businesso').' "' . single_cat_title('', false) . '"</a></li>';

									// Blog Day
									} elseif ( is_day() ) {
										echo '<li class="active"><a href="'. get_year_link(get_the_time('Y')) . '">'. get_the_time('Y') .'</a>';
										echo '<li class="active"><a href="'. get_month_link(get_the_time('Y'),get_the_time('m')) .'">'. get_the_time('F') .'</a>';
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time('d') .'</a></li>';

									// Blog Month
									} elseif ( is_month() ) {
										echo '<li class="active"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>';
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time('F') .'</a></li>';

									// Blog Year
									} elseif ( is_year() ) {
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time('Y') .'</a></li>';

									// Single Post
									} /*elseif ( is_single() && !is_attachment() ) {
										
										// Custom post type
										if ( get_post_type() != 'post' ) {
											$cat = get_the_category(); 
											$cat = $cat[0];
											echo '<li>';
												echo get_category_parents($cat, TRUE, '');
											echo '</li>';
											echo '<li class="active"><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
										} } */  
										elseif ( is_page() && $post->post_parent ) {
										$parent_id  = $post->post_parent;
										$breadcrumbs = array();
										while ($parent_id) {
											$page = get_page($parent_id);
											$breadcrumbs[] = '<li class="active"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
											$parent_id  = $page->post_parent;
										}
										$breadcrumbs = array_reverse($breadcrumbs);
										foreach ($breadcrumbs as $crumb) echo $crumb;
										
										echo '<li class="active"><a href="' . curPageURL() . '">'. get_the_title() .'</a></li>';

									
									}
									elseif( is_search() )
									{
										echo '<li class="active"><a href="' . curPageURL() . '">'. get_search_query() .'</a></li>';
									}
									elseif( is_404() )
									{
										echo '<li class="active"><a href="' . curPageURL() . '">404 Error</a></li>';
									}
									else { 
										// Default
										echo '<li class="active"><a href="' . curPageURL() . '">'. get_the_title() .'</a></li>';
									}
								endif;
								
								echo '</ul>'
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-seperate"></div>
		<!-- /Page Title Section -->

		<div class="clearfix"></div>
	<?php }
endif
?>