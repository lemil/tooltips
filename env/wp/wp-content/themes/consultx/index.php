<?php
/**
 * The main template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package consultx
 */

get_header(); ?>
	<section class="section-padding banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-box">
                        <h3 class="title"><?php echo esc_html(single_post_title('')); ?></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'consultx' ); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html(the_title('')); ?> </li>
                            </ol>
                        </nav>
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

							if ( is_home() && ! is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );

							endwhile; ?>
								<?php the_posts_pagination(
	                              array(
	                                    'prev_text' =>esc_html__('&laquo;','consultx'),
	                                    'next_text' =>esc_html__('&raquo;','consultx')
	                                	)
	                                ); 
	                            ?> 							
						<?php
						else :

							get_template_part( 'content', 'none' );

						endif;
						?>
				</div>
			</div><!-- #main -->
			<div class="col-md-4 col-xs-12">
            	<?php get_sidebar(); ?>
            </div>
		</div><!-- #primary -->
	</div><!--#row-->
</section>
<?php
get_footer();