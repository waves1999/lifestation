<?php get_header(); 
asiathemes_breadcrumbs(); ?> 
 <!-----Blog Section------>
<section class="blog-section">
  <div class="container">
     <div class="row">
<div class="col-md-9">				
			<?php if ( have_posts() ) :  
				while(have_posts()) :
					the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				 endwhile; 
				 else : ?>
				<h2 class="wow fadeInUp" data-wow-duration="2s"><?php _e( "Ooops!!... Post Not Found", 'businesso' ); ?></h2>
			<div class="">
			<p><?php
			_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'businesso' ); ?>
			</p>
			<?php get_search_form(); ?>
			</div><!-- .blog_con_mn -->
			<?php endif; ?>
				<!--/.blog-item-->
			
		</div><!--/.col-sm-8-->
	
<!--------Sidebar-------------->
<?php get_sidebar(); ?>  
<!-------/Sidebar--------------->		
	</div>
</div>
</section>   
    
<!-------------Footer------------>
<?php get_footer(); ?>
<!--/copyright-->

</div> <!-- /main-wrapper -->