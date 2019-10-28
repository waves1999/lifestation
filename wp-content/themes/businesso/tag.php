<?php get_header(); ?>	
<!--------/Header--------------->
<div class="clearfix"></div>
<!-- Page Title Section -->
<?php asiathemes_breadcrumbs(); ?>
<!-- /Page Title Section -->
<!----Blog-Section----->
<section class="blog-section">
  <div class="container">
     <div class="row">
	 <!----Blog Area---->
	    <div class="col-md-9">
		 <?php if(have_posts()) :
					while(have_posts()) :
							the_post();
						get_template_part( 'template-parts/content', get_post_format() );
 endwhile; endif; ?>
		 
		<div class="blog-pagination wow fadeInLeft" data-wow-duration="2s">	   
			  <?php echo paginate_links( 
        array( 
                'show_all' => true,
                'prev_text' => '<<', 
                'next_text' => '>>',
                )
        ); ?> </div> 			
		</div>
		<!-----Right Sidebar----->
		<?php get_sidebar();?> 	
	 </div>
  </div>
</section>

<div class="clearfix"></div>
<!-----Footer----->
<?php get_footer(); ?>