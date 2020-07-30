<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consultx
 */

?>
			</div><!-- #contennt -->
		</div><!-- .row -->
	
	<div class="last">
        <!-- form section ends -->
        <footer class="footer section-padding">
            <div class="container">
				<?php if(get_theme_mod('consultx_show_header_contact_info_footer')){ ?>
                <div class="contact-bar">                	
                    <div class="row">
					<?php 
					 if (!empty(get_theme_mod('consultx_header_contactno'))) { ?>
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <div class="con bdr-right">
                                <i class="fa fa-phone">
                                </i>
                                 <h5><?php esc_html_e('Call Us','consultx'); ?></h5>
                                 <p><?php echo esc_html(get_theme_mod('consultx_header_contactno','consultx'));  ?></p>
                            </div>
                        </div>
                        <?php }
                    	 if (!empty(get_theme_mod('consultx_header_email'))) { ?>
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <div class="con bdr-right">
                                <i class="fa fa-envelope-o">
                                </i>                                   
                                <h5><?php esc_html_e('Email To','consultx'); ?></h5>
                                 <p><?php echo esc_html(get_theme_mod('consultx_header_email','consultx'));  ?></p>
                            </div>
                        </div>
                    	<?php }  
						if (!empty(get_theme_mod('consultx_header_officehrs'))) { ?>
                        <div class="col-xs-6 col-md-4 col-lg-3">
                            <div class="con">
                                <i class="fa fa-clock-o"></i>
                                <h5><?php esc_html_e('Office Hrs','consultx'); ?></h5>
                                <p><?php echo esc_html(get_theme_mod('consultx_header_officehrs','consultx'));  ?></p>
                            </div>
                        </div>
                    	<?php }
						 if (!empty(get_theme_mod('consultx_quote_button'))) { ?>
                        <div class="col-xs-6 col-md-2 col-lg-3">
                            <div class="btn-holder">
                                <a href="<?php echo esc_url(get_theme_mod('consultx_quote_button_url','consultx')); ?>" class="btn-quote"><?php echo esc_html(get_theme_mod('consultx_quote_button','consultx'));  ?></a>
                            </div>
                        </div>
                         <?php } ?>
                    </div>
                </div>
				<?php } ?>
                <div class="row footer-main">
                	<?php if ( is_active_sidebar( 'consultx-footer-sidebar-1' ) ) { ?>
                    <div class="col-md-4 ">
                        <div class="padd bdr-right">
                            <?php dynamic_sidebar( 'consultx-footer-sidebar-1' ); ?>
                            
                        </div>
                    </div>
                	<?php } if ( is_active_sidebar( 'consultx-footer-sidebar-2' ) ) { ?>
                    <div class="col-md-4">
                        <div class="padd bdr-right">
                            <?php dynamic_sidebar( 'consultx-footer-sidebar-2' ); ?>
                        </div>
                    </div>
                	<?php } if ( is_active_sidebar( 'consultx-footer-sidebar-3' ) ) { ?>
                    <div class="col-md-4">
                        <div class="padd">
                            <?php dynamic_sidebar( 'consultx-footer-sidebar-3' ); ?>
                        </div>
                    </div>
                	<?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer ends  -->
        <!-- copyright  -->
        <div class="copyright text-center">
            <div class="container">

                <p><?php echo esc_html(bloginfo('name')); ?> <?php echo esc_html__('|','consultx'); ?><?php /* translators: %s: footer text */ ?>
                    <a href="<?php  echo esc_url( __( 'https://wordpress.org/', 'consultx' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'consultx' ), esc_html__('WordPress','consultx') ); ?></a>
					
                </p>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>
</div><!-- .container -->
</body>
</html>