<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package VW Event Planner
 */

get_header(); ?>

<div class="container">
    <div class="middle-align">
    <?php
        $theme_lay = get_theme_mod( 'vw_event_planner_theme_options','Right Sidebar');
        if($theme_lay == 'Left Sidebar'){ ?>
            <div class="row m-0">
                <div class="col-lg-4 col-md-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                <div id="our-services" class="services col-lg-8 col-md-8">
                    <h1 class="entry-title"><?php /* translators: %s: search term */
                    printf( esc_html__( 'Results For: %s','vw-event-planner'), esc_html( get_search_query() ) ); ?></h1> 
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                      
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content',get_post_format()); 
                      
                        endwhile;

                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-event-planner' ),
                                'next_text'          => __( 'Next page', 'vw-event-planner' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-event-planner' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php }else if($theme_lay == 'Right Sidebar'){ ?>
            <div class="row m-0">
                <div id="our-services" class="services col-lg-8 col-md-8"> 
                    <h1 class="entry-title"><?php /* translators: %s: search term */
                    printf( esc_html__( 'Results For: %s','vw-event-planner'), esc_html( get_search_query() ) ); ?></h1>
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                      
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content',get_post_format()); 
                      
                        endwhile;

                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-event-planner' ),
                                'next_text'          => __( 'Next page', 'vw-event-planner' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-event-planner' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
            </div>
        <?php }else if($theme_lay == 'One Column'){ ?>
            <div id="our-services" class="services">
                <h1 class="entry-title"><?php /* translators: %s: search term */
                    printf( esc_html__( 'Results For: %s','vw-event-planner'), esc_html( get_search_query() ) ); ?></h1> 
                <?php if ( have_posts() ) :
                /* Start the Loop */
                  
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content',get_post_format()); 
                  
                    endwhile;

                    else :

                        get_template_part( 'no-results' ); 

                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'vw-event-planner' ),
                            'next_text'          => __( 'Next page', 'vw-event-planner' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-event-planner' ) . ' </span>',
                        ) );
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php }else if($theme_lay == 'Three Columns'){ ?>
            <div class="row m-0">
                <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                <div id="our-services" class="services col-lg-6 col-md-6">
                    <h1 class="entry-title"><?php /* translators: %s: search term */
                    printf( esc_html__( 'Results For: %s','vw-event-planner'), esc_html( get_search_query() ) ); ?></h1> 
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                      
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content',get_post_format()); 
                      
                        endwhile;

                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-event-planner' ),
                                'next_text'          => __( 'Next page', 'vw-event-planner' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-event-planner' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
            </div>
        <?php }else if($theme_lay == 'Four Columns'){ ?>
            <div class="row m-0">
                <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                <div id="our-services" class="services col-lg-3 col-md-3">
                    <h1 class="entry-title"><?php /* translators: %s: search term */
                    printf( esc_html__( 'Results For: %s','vw-event-planner'), esc_html( get_search_query() ) ); ?></h1> 
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                      
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content',get_post_format()); 
                      
                        endwhile;

                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-event-planner' ),
                                'next_text'          => __( 'Next page', 'vw-event-planner' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-event-planner' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
                <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
            </div>
        <?php }else if($theme_lay == 'Grid Layout'){ ?>
            <div class="row m-0">
                <div id="our-services" class="services col-lg-9 col-md-9">
                    <h1 class="entry-title"><?php /* translators: %s: search term */
                    printf( esc_html__( 'Results For: %s','vw-event-planner'), esc_html( get_search_query() ) ); ?></h1> 
                    <div class="row m-0">
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/grid-layout' ); 
                          
                            endwhile;

                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                    </div>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-event-planner' ),
                                'next_text'          => __( 'Next page', 'vw-event-planner' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-event-planner' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
            </div>
        <?php }else{ ?>
           <div class="row m-0">
                <div id="our-services" class="services col-lg-8 col-md-8"> 
                    <h1 class="entry-title"><?php /* translators: %s: search term */
                    printf( esc_html__( 'Results For: %s','vw-event-planner'), esc_html( get_search_query() ) ); ?></h1>
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                      
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content',get_post_format()); 
                      
                        endwhile;

                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-event-planner' ),
                                'next_text'          => __( 'Next page', 'vw-event-planner' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-event-planner' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
            </div>
        <?php } ?>
    <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>