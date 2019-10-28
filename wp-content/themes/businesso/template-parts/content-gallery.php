<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="blog-area home-gallery-col wow fadeInUp" data-wow-duration="2s">
	<div class="blog-post-img">

		<?php if ( ! is_single() ) :
			if ( get_post_gallery() ) :
				echo '<div>';
					echo get_post_gallery();
				echo '</div>';
			endif;

		endif;

		if ( is_single() || ! get_post_gallery() ) :
			the_content();
		endif; ?>

	</div>
	<div class="blog-post-detail">
		<div class="col-md-9">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
			 &nbsp;&nbsp;<a href="#"><i class="fa fa-tag"></i><?php the_tags('', ', '); ?></a>
			 &nbsp;<a href="#"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></</a>
			 &nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-eye"></i><?php echo businesso_get_post_views(get_the_ID()); ?></a>
		</div>
		<div class="blog-post-date">
			<span class="date"><?php echo get_the_date('j'); ?><small><?php echo get_the_date('M'); ?></small></span>
		</div>		
	</div>
	<div class="clear"></div>
	<div class="blog-post-title">
		<div class="blog-post-title-wrapper">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php wp_link_pages( array( 'before' => '<div class="blog-pagination animate" data-anim-type="fadeInLeft">' . __( 'Pages:', 'businesso' ), 'after' => '</div>' ) ); ?>
			<div class="btn-left-area">
			  <a href="<?php the_permalink(); ?>" class="main-btn btn-more btn-left wow fadeInUp" data-wow-duration="2s"><?php _e('More','businesso');?></a>
		    </div>
		</div>
	</div>
</div>
</article>