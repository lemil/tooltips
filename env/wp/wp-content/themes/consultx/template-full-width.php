<?php
/** 
 * The Template Name: Full Width Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package consultx
 */

get_header(); 
if ( !is_front_page() && !is_home() ) {
consultx_breadcrumbs(); 
} ?>

<!-- service section -->
    <section class="section-padding" id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-detail-area">             
                        <?php while( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                            <?php
                                wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'consultx' ),
                                'after'  => '</div>',
                                ) );
                            ?>
                            <?php
                                //If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>
                        <?php endwhile; ?>    
                    </div>
                </div> 
            </div>
        </div><!-- .container --> 
    </section><!-- section-->   
<?php get_footer(); ?>