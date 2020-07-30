<?php if( !function_exists('consultx_breadcrumbs') ): function consultx_breadcrumbs() { ?>
    <section class="section-padding banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-box">
                            <h3 class="title"><?php esc_html(the_title('')); ?></h3>
                            <?php if (!empty(get_theme_mod('consultx_show_breadcrumb_info'))) { ?>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'consultx' ); ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php esc_html(the_title('')); ?> </li>
                                    </ol>
                                </nav>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php } endif;   