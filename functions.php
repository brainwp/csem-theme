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
}
add_action( 'wp_enqueue_scripts', 'csem_theme_scripts' );