<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package consultx
 */

get_header(); ?>
<section class="section-padding banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-box">
                        <h3 class="title"><?php echo esc_html__('Page Not Found','consultx'); ?></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'consultx' ); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html__('Page Not Found','consultx'); ?> </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="error-section-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-box">
                	<h1><?php echo esc_html__( '404', 'consultx' ); ?></h1>
                    <h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'consultx' ); ?></h3>
                    <p><?php esc_html_e( 'Sorry, but the page you are looking for does not exist', 'consultx' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="error-btn"><?php echo esc_html__( 'Back To Home', 'consultx' ); ?></a> 
          
                </div>
            </div>
        </div>
    </div>
</section>
	
<?php
get_footer();