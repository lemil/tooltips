<?php
/**
 * The template for displaying archive pages
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
                        <h3 class="title"><?php echo esc_html(the_archive_title('')); ?></h3>
                        <?php if (!empty(get_theme_mod('consultx_show_breadcrumb_info'))) { ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'consultx' ); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html(the_title('')); ?> </li>
                            </ol>
                        </nav>
                    <?php } ?>
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
						if ( have_posts() ) {						
							while ( have_posts() ) {
								the_post();
								get_template_part( 'content', get_post_format() );
							}
							the_posts_navigation();
						} else {
							get_template_part( 'content', 'none' );
						}
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