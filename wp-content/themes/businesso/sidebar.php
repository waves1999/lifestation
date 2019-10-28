<div class="col-md-3 widget-area">
	<div class="sm-right-sidebar wow fadeInUp" data-wow-duration="2s">
		<?php if ( is_active_sidebar( 'sidebar-data' ) )
				{ dynamic_sidebar( 'sidebar-data' );	} else  { 
						$args = array(
						'before_widget' => '<div class="sm-right-sidebar wow fadeInUp" data-wow-duration="3s">',
						'after_widget' => '</div>',
						'before_title' => '<div class="sm-widget-title"><h3>',
						'after_title' => '</h3></div><div class="sm-sidebar-widget wow fadeInUp" data-wow-duration="3s">
						<ul class="post-content">',	);
						
						the_widget('WP_Widget_Search', 'title=Search', $args);
						the_widget('WP_Widget_Calendar', 'title=Calendar', $args);
						the_widget('WP_Widget_Archives', null, $args);
						the_widget('WP_Widget_Recent_Posts', null, $args);
						the_widget('WP_Widget_Categories', null, $args);
						the_widget('WP_Widget_Tag_Cloud', null, $args);
						 }

				if ( is_active_sidebar( 'woocommerce-sidebar' ) )
				{ dynamic_sidebar( 'woocommerce-sidebar' );	}

						 ?>
	</div>
</div> 