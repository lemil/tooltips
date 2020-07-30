<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package consultx
 */

get_header(); 


if ( !is_front_page() && !is_home() ) {

consultx_breadcrumbs(); ?>

	<!-- service section -->

        <section class="section-padding" id="aboutus">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    	<div class="blog-detail-area"> 
                    	<?php if ( has_post_thumbnail() ) { ?>     	
							<div class="featured-pic page-content-space">
								<?php the_post_thumbnail(); ?>
							</div>
                        <?php } 
							while ( have_posts() ) :
								the_post();
								get_template_part( 'content', 'page' );
								the_post_navigation(); ?>
								<div class="comment-section">
								<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
								</div>
						<?php endwhile; // End of the loop.	?>
                    </div>
                	</div>
                    <div class="col-md-4 col-xs-12">
                    	<?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php
get_footer();
?>