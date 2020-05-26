		<div class="col-md-4 each-agenda wow fadeInUp">
			<?php $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );?>
			<div class="the-thumb" style="background-image:url('<?php echo esc_url( $thumb_url );?>">
				<a href="<?php the_permalink();?>">
					<h3 class="the-title">
						<?php if ( ! is_singular( 'el_events' ) ) : ?>
							<?php the_title();?>
						<?php endif;?>
					</h3><!-- .the-title -->
					<?php if ( $meta = get_post_meta( get_the_ID(), 'startdate', true ) ) : ?>
						<?php $date = new DateTime( $meta );?>
						<h4 class="the-date"><?php echo $date->format( 'd/m');?></h4><!-- .the-date -->
					<?php endif;?>
				</a>
			</div><!-- .the-thumb -->
			<h4 class="the-time">
				<?php if ( $meta = get_post_meta( get_the_ID(), 'starttime', true ) ) { ?>
					<?php printf( __( 'A partir das %shrs', 'csem-theme' ), $meta ); ?>
				<?php } else { ( $metafalse = get_post_meta( get_the_ID(), 'starttime', false ) ); ?>
					<?php printf( __( 'Horario a definir', 'csem-theme' ), $metafalse ); ?>
				<?php }; ?>
			</h4><!-- .the-time -->
		</div><!-- .col-md-4 each-agenda -->
