<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package consultx
 */
get_header(); ?>
	<section class="section-padding banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-box">
                    	<?php if ( have_posts() ) : ?>
		                    <h3 class="title">
		                        <?php 
		                            /* translators: %s: search term */
		                            printf( esc_html__( 'Search Results for: %s', 'consultx' ), '<span>' . get_search_query() . '</span>' );
		                        ?>
		                    </h3>
		                <?php else : ?>
		                    <h3 class="title">
		                        <?php
		                            /* translators: %s: nothing found term */
		                            printf( esc_html__( 'Nothing Found for: %s', 'consultx' ), '<span>' . get_search_query() . '</span>' ); 
		                        ?>
		                    </h3>
		                <?php endif; ?>                    	
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="section-padding" id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                	<div class="blog-detail-area"> 
						<?php
						if ( have_posts() ) :							
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'content', 'search' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'content', 'none' );

						endif;
							?>

					</div><!-- #main -->
				</div>
				<div class="col-md-4 col-xs-12">
            		<?php get_sidebar(); ?>
            	</div>
			</div>
		</div>
	</section><!-- #primary -->
	<!-- #row -->
<?php
get_footer();