<?php get_header(); ?>
<!--------/Header--------------->
<div class="clearfix"></div>
<!-- Page Title Section -->
<?php asiathemes_breadcrumbs(); ?>
<!-- /Page Title Section -->
<!---------Blog-Section------------------------------>
<section class="blog-section">
  <div class="container">
     <div class="row">
	 <!---------Blog Area------------->
	    <div class="col-md-9">
		 <div class="blog-page-section bg-gery">
		  <div class="blog-area wow fadeInUp" data-wow-duration="2s">
				<div class="blog-post-img">
				<?php the_post();
				$default_arg =array('class' => 'img-responsive');
						if(has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('',$default_arg); ?>
					</a>
						<?php } ?>
				</div>
				<div class="blog-post-detail">
				   <div class="col-md-9">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
						&nbsp;&nbsp; <a href="#"><i class="fa fa-tag"></i><?php the_tags('', ', '); ?></a>
						&nbsp;&nbsp;<a href="#"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a>
						<?php businesso_set_post_views(get_the_ID()); ?>
			 &nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-eye"></i><?php echo businesso_get_post_views(get_the_ID()); ?>
						
					</div>	
				<div class="blog-post-date"><span class="date"><?php echo get_the_date('j'); ?><small><?php echo get_the_date('M'); ?></small></span>
					</div>		
				</div>
				<div class="clear"></div>
				   <div class="blog-post-title">
					<div class="blog-post-title-wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="blog-pagination wow fadeInLeft" data-wow-duration="2s">' . __( 'Pages:', 'businesso' ), 'after' => '</div>' ) );

							asiathemes_content_nav('nav-below'); ?>
					   
					</div>
				</div>	
             </div>
			 
		<!----comment Section-------->
			<?php comments_template( '', true );?>
			</div>
			 </div>		 
  <!-----Right Sidebar------------>
		<?php get_sidebar(); ?>
			
		 </div>
  </div>	
</section>

<div class="clearfix"></div>
<?php get_footer(); ?>	
</div><!-- /Close of wrapper -->  
</body>
</html>