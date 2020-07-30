<?php
/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'consultx_customize_search_form' ) ) :

	function consultx_customize_search_form() {

		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="search-box">
				<h3 class="sidebar-search-title">' . _x( 'Search', 'label', 'consultx' ) . '</h3>
				<div class="input-group stylish-input-group">
					<input type="text" class="form-control"  placeholder="' . esc_attr_x( 'Type to search here...', 'placeholder', 'consultx' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'consultx' ) . '" />
					<span class="input-group-addon">
						 <button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						  </button>  
					</span>
				 </div>
			 </div>
		 </form>';

		return $form;

	}
	
	endif;

add_filter( 'get_search_form', 'consultx_customize_search_form', 15 );



$consultx_page_home = esc_html(__( '4 Home Pages', 'consultx' ));
$consultx_page_home_details = esc_html(__('Theme supports 4 types of Home Pages including dark mode with - slider, projects, services, features, tesimonial team, about. so more', 'consultx' ));
$consultx_page_layout = esc_html(__( '2 Header Preset', 'consultx' ));
$consultx_page_layout_details = esc_html(__('Theme offers 2 tytpes of header navgiation preset so you can change and select your header design', 'consultx' ));
$consultx_unlimited_color = esc_html(__( 'Unlimited Color Scheme', 'consultx' ));
$consultx_unlimited_color_details = esc_html(__( 'Theme support Unlimited Color Option that mean you can design your website with any color.', 'consultx' ));
$consultx_custom_contact = esc_html(__( 'Contact Form 7', 'consultx' ));
$consultx_custom_contact_details = esc_html(__( 'Consultx Pro support contact form 7 that mean you can easily add your contact form with theme design ', 'consultx' ));
$consultx_portfolio = esc_html(__( 'Projects Page', 'consultx' ));
$consultx_portfolio_details = esc_html(__( 'Theme have 6 types of Projctes deslin presets with you can use 2, 3, or 4 Columns with masonry layouts!', 'consultx' ));
$consultx_typography = esc_html(__( 'Typography', 'consultx' ));
$consultx_typography_details = esc_html(__('Theme loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!', 'consultx' ));
$consultx_slider = esc_html(__( 'Unlimitd Image Slides', 'consultx' ));
$consultx_slider_details = esc_html(__('Theme includes Flex slider . You can add unlimited slides on your home page', 'consultx' ));
$consultx_pricing = esc_html(__( 'Team Page', 'consultx' ));
$consultx_pricing_details = esc_html(__('You can add unlimited team members with team deatil page and also display their social profiles ', 'consultx' ));
$consultx_retina_ready = esc_html(__( 'Mega Menu', 'consultx' ));
$consultx_retina_ready_details = esc_html(__( 'Theme is integrated with mega menu. so you can add mega menu on your webiste', 'consultx' ));
$consultx_icons = esc_html(__( 'Consultx Icons', 'consultx' ));
$consultx_icons_details = esc_html(__( ' Choose from over 2500+ icons are fully integrated into the theme and theme aslo has 40+ cocnstrsuction icons for you. ', 'consultx' ));
$consultx_support = esc_html(__( 'Excellent Support', 'consultx' ));
$consultx_support_details = esc_html(__( 'We truly care about our customers and themes performance. We assure you that you will get the best after sale support like never before!', 'consultx' ));
$consultx_responsive_layout = esc_html(__( 'Responsive Layout', 'consultx' ));
$consultx_responsive_layout_details = esc_html( __('Theme is fully responsive and can adapt to any screen size. Resize your browser window to view it!', 'consultx' ));
$consultx_testimonials = esc_html( __( '100+ elements', 'consultx' ));
$consultx_testimonials_details = esc_html( __( 'Display your website beautiful and clear with our theme 100+ elements  ', 'consultx' ));
$consultx_social_media = esc_html( __( 'Social Media', 'consultx' ));
$consultx_social_media_details = esc_html( __( 'Want your users to stay in touch? No problem, Theme has Social Media icons all throughout the theme!', 'consultx' ));
$consultx_google_map = esc_html( __( 'Add Timeline', 'consultx' ));
$consultx_google_map_details = esc_html( __('This Theme includes Timeline shortcode, So you can easily display your company history to your visitors or  your clients', 'consultx' ));
$consultx_customization = esc_html( __( 'Customization', 'consultx' ));
$consultx_customization_details = esc_html( __('With advanced theme options, page options & extensive docs, its never been easier to customize a theme!', 'consultx' ));
$consultx_demo_content = esc_html( __( 'Demo content', 'consultx' ));
$consultx_demo_content_details = esc_html( __('Theme includes single click demo content. You can quickly setup the site like our demo and get started easily!', 'consultx' ));
$consultx_improvement = esc_html( __( 'Improvement', 'consultx' ));
$consultx_improvement_details = esc_html( __('We love our theme and customers. We are committed to improve and add new features to Theme!', 'consultx' ));

$consultx_view_demo = esc_html( __( 'View Demo', 'consultx'));
$consultx_upgrade_to_pro = esc_html( __( 'Upgrade To Pro', 'consultx' ));

$consultx_why_upgrade = <<< FEATURES

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-cog"></i></div>
	<h3>$consultx_page_home</h3>
	<p>$consultx_page_home_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th-large"></i></div>
	<h3>$consultx_page_layout</h3>
	<p>$consultx_page_layout_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th"></i></div>
	<h3>$consultx_unlimited_color</h3>
	<p>$consultx_unlimited_color_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-envelope"></i></div>
	<h3>$consultx_custom_contact</h3>
	<p>$consultx_custom_contact_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-list-alt"></i></div>
	<h3>$consultx_portfolio</h3>
	<p>$consultx_portfolio_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-font"></i></div>
	<h3>$consultx_typography</h3>
	<p>$consultx_typography_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3>$consultx_slider</h3>
	<p>$consultx_slider_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-user"></i></div>
	<h3>$consultx_pricing</h3>
	<p>$consultx_pricing_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3>$consultx_retina_ready</h3>
	<p>$consultx_retina_ready_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-dashboard"></i></div>
	<h3>$consultx_icons</h3>
	<p>$consultx_icons_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3>$consultx_support</h3>
	<p>$consultx_support_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-desktop"></i></div>
	<h3>$consultx_responsive_layout</h3>
	<p>$consultx_responsive_layout_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-rocket"></i></div>
	<h3>$consultx_testimonials</h3>
	<p>$consultx_testimonials_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-skype"></i></div>
	<h3>$consultx_social_media</h3>
	<p>$consultx_social_media_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-map-marker"></i></div>
	<h3>$consultx_google_map</h3>
	<p>$consultx_google_map_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-edit"></i></div>
	<h3>$consultx_customization</h3>
	<p>$consultx_customization_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-check"></i></div>
	<h3>$consultx_demo_content</h3>
	<p>$consultx_demo_content_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-signal"></i></div>
	<h3>$consultx_improvement</h3>
	<p>$consultx_improvement_details</p>
</div>
FEATURES;

function consultx_theme_page() {
	$title = esc_html(__('Consultx Theme','consultx'));
	add_theme_page( 
		esc_html(__( 'Upgrade To Consultx Pro','consultx')),
		$title.'', 
		'edit_theme_options',
		'consultx_upgrade',
		'consultx_display_upgrade'
	);
}

add_action('admin_menu','consultx_theme_page');


function consultx_display_upgrade() {
  $theme_data = wp_get_theme('consultx'); 
    
    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    } 
     
    $pro_theme_url = 'https://rozertemplates.com/consultx-premium-wordpress-theme/';
    $pro_theme_demo = 'https://rozertemplates.com/consultx-pro';
    $doc_url  = 'http://rozertemplates.com/help/consultx-documentation/documentation.html';
    $support_url = 'https://wordpress.org/support/theme/consultx';   
    $rating_url = 'https://wordpress.org/support/theme/consultx/reviews/?filter=5';   
    
    $current_action_link =  admin_url( 'themes.php?page=consultx_upgrade&tab=pro_features' ); ?>
    <style>
	.about-wrap .about-text {
		margin: 0em 0px 0em 0  !important;;
		margin-bottom: 25px !important;
		min-height: 60px;
		color: #555d66;
	}
	.about-wrap {		
		max-width: 1200px;	
	}
	</style>
	<div class="consultx-zone-wrapper about-wrap">
        <h1><?php printf(esc_html__('Welcome to %1$s - Version %2$s', 'consultx'), $theme_data->Name ,$theme_data->Version ); ?></h1><?php
       	printf( __('<div class="about-text"> Consultx is business consulting wordpress theme. Theme has responsive design made with bootstrap, High Defination layout with retina ready. Consultx WordPress theme ideal for a cooperate business website or perfect solutions for corporate, consulting,  agency, law firms, finance, law travel, wedding planners, recipes, sport/medical shops, startups, online agencies, portfolios, freelancers, E-commerce.Consultx comes with full screen slider, high quality Home Page including gallery or portfolio section, service section,  recent post section & client logo section.  Theme is Search engine optimized(SEO) google search friendly, Cross browser compatible And compatible with all major plugins.', 'consultx') ); ?>
       <p class="upgrade-btn"><a class="upgrade" href="<?php echo esc_url($pro_theme_url); ?>" target="_blank"><?php printf( __( 'Upgrade To %1s Pro - $39', 'consultx'), $theme_data->Name ); ?></a></p>

	   <h2 class="nav-tab-wrapper">
	        <a href="?page=consultx_upgrade" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
<a href="?page=consultx_upgrade&tab=pro_features" class="nav-tab<?php echo $tab == 'pro_features' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'PRO Features', 'consultx' );  ?></a>
            <a href="?page=consultx_upgrade&tab=free_vs_pro" class="nav-tab<?php echo $tab == 'free_vs_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free VS PRO', 'consultx' ); ?></a>
	        <?php do_action( 'consultx_admin_more_tabs' ); ?>
	    </h2>      

        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Customizer', 'consultx' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'consultx'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'consultx'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Documentation', 'consultx' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'consultx'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url($doc_url); ?>" target="_blank" class="button button-secondary"><?php esc_html_e(' Documentation', 'consultx'); ?></a>
                            </p>
                            <?php do_action( 'consultx_dashboard_theme_links' ); ?>
                        </div>  
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'consultx' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through Genex free support ticket system.', 'consultx'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($support_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Create a support ticket', 'consultx'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
						 <div class="theme_link">
                            <h3><?php esc_html_e( 'Please Rate Us', 'consultx' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('We need your help to expand or and portoflio so please rate us on wordpress ', 'consultx'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($rating_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Rate This Theme', 'consultx'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
                       
                    </div>  
                    <div class="theme_info_right">
                        <?php echo sprintf ( '<img src="'. get_template_directory_uri() .'/screenshot.png" alt="%1$s" />',__('Theme screenshot','consultx') ); ?>
                    </div>
                </div> 
            </div>
        <?php } ?>
	
        <?php if ( $tab == 'pro_features' ) { ?>
            <div class="pro-features-tab info-tab-content"><?php
			    global $consultx_why_upgrade; ?>
				<div class="wrap clearfix">
				    <?php echo $consultx_why_upgrade; ?>
				</div>
			</div><?php   
		} ?>  

       <!-- Free VS PRO tab -->
        <?php if ( $tab == 'free_vs_pro' ) { ?>
            <div class="free-vs-pro-tab info-tab-content">
	            <div id="free_pro">
	                <table class="free-pro-table">
		                <thead>
			                <tr>
			                    <th></th>  
			                    <th><?php echo esc_html($theme_data->Name); ?> Lite</th>
			                    <th><?php echo esc_html($theme_data->Name); ?> PRO</th>
			                </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td><h3><?php _e('Responsive Design', 'consultx'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                        <td><h3><?php _e('Support', 'consultx'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>		                    
		                    <tr>
		                        <td><h3><?php _e('Custom Logo Option', 'consultx'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                         <td><h3><?php _e('Social Links', 'consultx'); ?></h3></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('Unlimited color option', 'consultx'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('3 Home page', 'consultx'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	 <td><h3><?php _e('Header Presets', 'consultx'); ?></h3></td>
		                    	 <td class="only-pro"><?php _e('1', 'consultx'); ?></td>
		                    	 <td class="only-lite"><?php _e('4', 'consultx'); ?></td>
		                    </tr>	
		                     <tr>
		                    	 <td><h3><?php _e('Pre Defined Page Templates', 'consultx');?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('6 Portfolio Presets', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Team With Detail Page', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Redux Theme Option Panel', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr> 
							<tr>
		                    	<td><h3><?php _e('Boxed Layout', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Sticky Header Option', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Contact Form 7', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('15+ Shortcodes', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Google Fonts', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Consultx Icons Inbuilt', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Multiple Service Layouts', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	<td><h3><?php _e('Team Page', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Multiple Blog Layouts', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Page Animation', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Premium Priority Support', 'consultx');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    
		                    <tr class="ti-about-page-text-center">
		                        <td><a href="<?php echo esc_url($pro_theme_demo); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( '%1s Pro Demo', 'consultx'), $theme_data->Name ); ?></a></td>
		                    	<td colspan="2"><a href="<?php echo esc_url($pro_theme_url); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( 'Upgrade To %1s Pro', 'consultx'), $theme_data->Name ); ?></a></td>
		                    </tr>
		                </tbody>
	                </table>			    
				</div>
			</div><?php 
		} ?>

    </div><?php
} ?>