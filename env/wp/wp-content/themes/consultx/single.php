<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package consultx
 */

get_header(); consultx_breadcrumbs(); ?>
<!-- service section -->
<section class="section-padding" id="aboutus">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="blog-detail-area"> 
				<?php if ( has_post_thumbnail() ) { ?>	                                               	
						<div class="featured-pic">
							<?php the_post_thumbnail(); ?>
						</div>
				<?php } 
					while ( have_posts() ) :
						the_post();

						get_template_part( 'content', 'single' );

						the_post_navigation(); ?>
						<div class="comment-section">
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
						</div>
				<?php
					endwhile; // End of the loop.
				?>
			</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();