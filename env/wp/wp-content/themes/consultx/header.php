<?php
/**
 * The header. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consultx
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( ! function_exists( 'wp_body_open' ) ) {
function wp_body_open() {
		do_action( 'wp_body_open' );
}
} ?>
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'consultx' ); ?></a>
 <!-- to top btn  -->

    <!-- to top btn  ends -->
    <div class="wrapper">
        <!-- preloader  -->
        <div class="preloader">
            <div class="indicator">
                <svg width="16px" height="12px">
                    <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                </svg>
                <span><?php esc_html_e('Loading ...','consultx'); ?></span>
            </div>
        </div>
        <!-- preloader ends -->
        <header>
            <?php if(get_theme_mod('consultx_show_header_contact_info')){ ?>
            <!-- header strip -->
            <div class="header-strip">
                <div class="container">
                    <div class="row">
                    <?php if (!empty(get_theme_mod('consultx_header_contactno'))) { ?>
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <div class="con">
                                <i class="fa fa-phone"></i>
                                <h5>
                                    <?php esc_html_e('Call Us','consultx'); ?>
                                    <span><?php echo esc_html(get_theme_mod('consultx_header_contactno','consultx'));  ?></span>
                                </h5>
                            </div>
                        </div>
                        <?php } if (!empty(get_theme_mod('consultx_header_email'))) { ?>
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <div class="con">
                                <i class="fa fa-envelope-o"></i>
                                <h5>
                                    <?php esc_html_e('Email To','consultx'); ?>
                                    <span><?php echo esc_html(get_theme_mod('consultx_header_email','consultx'));  ?></span>
                                </h5>
                            </div>
                        </div>
                    <?php } if (!empty(get_theme_mod('consultx_header_officehrs'))) { ?>
                        <div class="col-xs-6 col-md-4 col-lg-3">
                            <div class="con border-none">
                                <i class="fa fa-clock-o"></i>
                                <h5>
                                    <?php esc_html_e('Office Hrs','consultx'); ?>
                                    <span><?php echo esc_html(get_theme_mod('consultx_header_officehrs','consultx'));  ?></span>
                                </h5>
                            </div>
                        </div>
                    <?php } if (!empty(get_theme_mod('consultx_quote_button'))) { ?>
                        <div class="col-xs-6 col-md-2 col-lg-3">
                            <div class="btn-holder">
                                <a href="<?php echo esc_url(get_theme_mod('consultx_quote_button_url','consultx')); ?>" class="btn-quote"><?php echo esc_html(get_theme_mod('consultx_quote_button','consultx'));  ?></a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <!-- header strip ends-->
            <?php } ?>
            <!-- menubar  -->
            <div class="menu-outer menu-outer-three">
                <div class="menubar">
                    <div class="container">
                        <nav class="navbar">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#consultx-navbar" aria-expanded="false">
                                    <span class="sr-only"><?php esc_html__("Toggle navigation",'consultx'); ?></span>
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                 
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand-two">
                                        <?php the_custom_logo(); ?>
                                    </a>
                                    <?php
                                     
                                    if ( is_front_page() && is_home() ) {
                                ?>
                                    
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand-two">
                                    <span><?php echo esc_html(bloginfo( 'name' )); ?></span>
                                </a></h1>
                                    
                                <?php 
                                } else {
                                ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(bloginfo( 'name' )); ?></a></p>
                                <?php
                                }

                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) {
                                    ?>
                                    <p class="site-description"><?php echo esc_html( $description ); ?></p>
                                    <?php
                                }   
                            
                                 ?>


                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse nav navbar-nav navbar-right" id="menu">
                                <nav id="site-navigation" class="main-navigation" role="navigation">
                                <?php
                                if ( has_nav_menu('primary')) {
                                wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_id'        => 'primary-menu',
                                    ) );
                            }
                                else
                                    { ?>
                                        <ul class="navigation">
                                            <li class="menu-item">
                                                <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php echo esc_html__('Add a menu','consultx'); ?></a>
                                            </li>
                                        </ul>
                            <?php } ?>
                            </nav>
                            </div>


                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                </div>
            </div>
           <?php consultx_logo_style() ?>
            <!-- menubar ends -->
        </header>

