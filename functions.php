<?php
/**
 * functions.php
 *
 */
 /*
 * Adiciona arquivos JS
 *
 */
function csem_theme_scripts() {
	// Enfileira o script
	wp_enqueue_script( 'csem-theme-home', get_stylesheet_directory_uri() . '/assets/js/home.js', array( 'jquery'), '1.0', true );
	wp_enqueue_script( 'csem-theme-geral', get_stylesheet_directory_uri() . '/assets/js/geral.js', array( 'jquery'), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'csem_theme_scripts' );

/**
 *
 * Sobrepoe a função padrão do tema pai "coletivo_site_header"
 *
 */
function coletivo_site_header() {
	?>
	  	<header id="masthead" class="site-header" role="banner">
	  			<a href="#" class="csem-open-menu">
	  				<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icon-menu.png" class="open">
	  				<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icon-close-menu.png" class="closed">
	  			</a>
        </header><!-- #masthead -->
        <nav class="menu-logo-toggle" >
          			<div class="site-branding">
                		<?php
                		coletivo_site_logo();
                		?>
               		</div>
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <ul class="coletivo-menu">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s')); ?>
                        </ul>
                    </nav>
                    <!-- #site-navigation -->
        </nav>

    <?php
}