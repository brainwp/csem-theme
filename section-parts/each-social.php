<?php
/**
 * Conteúdo de cada uma das redes (ultimos-posts)
 */
global $load_last_post_social_networks;
if ( ! isset( $load_last_post_social_networks->image ) ) {
	wp_die( 'Falta imagem' );
}
if ( ! $_REQUEST[ 'network' ] ) {
	wp_die( 'Falta param network' );
}
$link = '#';
if ( 'facebook' === $_REQUEST[ 'network'] ) {
	$link = coletivo_get_theme_mod( 'coletivo_ultimos_sociais_fb_url' );
	$slug = str_replace( array( 'https://', 'http://', 'www.', 'facebook.com', 'fb.com', '/'), '', $link );
	$slug = '@' . $slug;
}
if ( 'instagram' === $_REQUEST[ 'network'] ) {
	$link = coletivo_get_theme_mod( 'coletivo_ultimos_sociais_instagram_url' );
	$slug = str_replace( array( 'https://', 'http://', 'www.', 'instagram.com', '/'), '', $link );
	$slug = '@' . $slug;
}
if ( 'youtube' === $_REQUEST[ 'network'] ) {
	$link = coletivo_get_theme_mod( 'coletivo_ultimos_sociais_yt_url' );
	$slug = str_replace( array( 'https://', 'http://', 'www.', 'youtube.com', '/user/'), '', $link );
	$slug = '/' . $slug;
}

?>
<div class="each-social wow slideInUp">
	<a href="<?php echo esc_url( $link );?>" target="_blank">
		<span class="icon"></span>
		<img src="<?php echo esc_url( $load_last_post_social_networks->image );?>" alt="<?php _e( 'Link para a página no Facebook', 'csem-theme');?>" />
		<span class="social-icon"></span>
	</a>
	<a href="<?php echo esc_url( $link );?>" class="slug-link" target="_blank">
		<?php echo $slug;?>
	</a>
</div><!-- .each-social -->
