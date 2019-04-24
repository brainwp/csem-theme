<?php
/**
 * 
 * Shortcode agenda ( Functiona em conjunto com o plugin event-list )
 *
 */
?>
<div class="col-md-12 agenda-container">
	<?php $query = new WP_Query( 
			array(
				'post_type' 		=> 'el_events',
				'posts_per_page'	=> 3,
				'orderby'			=> 'meta_value',
				'meta_key'			=> 'startdate',
				'order'				=> 'ASC'
			)
		);
	?>
	<?php if ( $query->have_posts() ) : ?>
		<?php while( $query->have_posts() ) : $query->the_post(); ?>
			<?php get_template_part( 'section-parts/each-agenda' ); ?>
		<?php endwhile;?>
	<?php endif;?>
</div><!-- .col-md-12 agenda-container -->
<div class="col-md-12 agenda-btn-container">
	<a href="<?php echo get_post_type_archive_link( 'el_events');?>" class="btn btn-theme-primary btn-lg">
		<?php _e( 'VEJA MAIS', 'csem-theme' );?>
	</a>
</div><!-- .col-md-12 agenda-btn-container -->