<?php get_header();
$businesso_option=theme_default_data(); 
$post_options = wp_parse_args(  get_option( 'businesso_option', array() ), $businesso_option );
if($post_options['post_slider_enabled'] == 1 ) {
get_template_part('blog','postslider'); } ?>
<div class="clearfix"></div>
<?php asiathemes_breadcrumbs(); ?>
<section class="blog-section">
  <div class="container">
     <div class="row">
	    <div class="col-md-9">
		  <div class="row blog-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	    <div class="blog-page-section">
		 <?php
		if($post_options['blog_banner_enabled'] == 1 ) { 
		 get_template_part('blog','slider'); }
					if(have_posts()) :
					while(have_posts()) :
							the_post();
						get_template_part( 'template-parts/content', get_post_format() );
 endwhile; endif; ?>			
	</div>             
 </div>       
			   
			<div class="blog-pagination wow fadeInLeft" data-wow-duration="2s">	   
			  <?php echo paginate_links( 
				array( 
                'show_all' => true,
                'prev_text' => '<<', 
                'next_text' => '>>', )); ?>
			</div> 			
		</div>
		<?php get_sidebar();?> 	
	 </div>
  </div>
</section>
<div class="clearfix"></div>
<?php get_footer(); ?>