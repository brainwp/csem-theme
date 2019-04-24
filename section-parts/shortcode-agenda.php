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
				'meta_value_num'	=> 'startdate',
				'order'				=> 'ASC'
			)
		);
	?>
	<?php if ( $query->have_posts() ) : ?>
		<?php while( $query->have_posts() ) : $query->the_post(); ?>
		<div class="col-md-4 each-agenda">
			<?php $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );?>
			<div class="the-thumb" style="background-image:url('<?php echo esc_url( $thumb_url );?>">
				<a href="<?php the_permalink();?>">
					<h3 class="the-title">
						<?php the_title();?>
					</h3><!-- .the-title -->
					<?php if ( $meta = get_post_meta( get_the_ID(), 'startdate', true ) ) : ?>
						<?php $date = new DateTime( $meta );?>
						<h4 class="the-date"><?php echo $date->format( 'd/m');?></h4><!-- .the-date -->
					<?php endif;?>
				</a>
			</div><!-- .the-thumb -->
			<h4 class="the-time">
				<?php if ( $meta = get_post_meta( get_the_ID(), 'starttime', true ) ) : ?>
					<?php printf( __( 'A partir das %shrs', 'csem-theme' ), $meta );?>
				<?php endif;?>
			</h4><!-- .the-time -->
		</div><!-- .col-md-4 each-agenda -->
		<?php endwhile;?>
	<?php endif;?>
</div><!-- .col-md-12 agenda-container -->
<div class="col-md-12 agenda-btn-container">
	<a href="<?php echo get_post_type_archive_link( 'el_events');?>" class="btn btn-theme-primary btn-lg">
		<?php _e( 'VEJA MAIS', 'csem-theme' );?>
	</a>
</div><!-- .col-md-12 agenda-btn-container -->