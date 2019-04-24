<?php
/**
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package coletivo
 */

get_header(); ?>
<div id="content" class="container">
	<?php $current_date = date('Y-m-d');?>
	<?php $query = new WP_Query( 
		array(
			'post_type' 		=> 'el_events',
			'posts_per_page'	=> -1,
			'orderby'			=> 'meta_value',
			'meta_key'			=> 'startdate',
			'meta_compare'		=> '>=',
			'meta_value'		=> $current_date,
			'order'				=> 'ASC'
		)
	);
	?>
	<?php if ( $query->have_posts() ) : ?>
		<h1 class="the-title">
			<?php _e( 'Agenda - Proximos eventos', 'csem-theme' );?>
		</h1><!-- .the-title -->
			<div class="col-md-12 agenda-container">
				<?php while( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'section-parts/each-agenda' ); ?>
				<?php endwhile;?>
			</div><!-- .col-md-12 agenda-container -->
	<?php endif;?>
	<?php $query = new WP_Query( 
		array(
			'post_type' 		=> 'el_events',
			'posts_per_page'	=> -1,
			'orderby'			=> 'meta_value',
			'meta_key'			=> 'startdate',
			'meta_compare'		=> '<',
			'meta_value'		=> $current_date,
			'order'				=> 'ASC'
		)
	);
	?>
	<?php if ( $query->have_posts() ) : ?>
		<h1 class="the-title">
			<?php _e( 'Agenda - Eventos Anteriores', 'csem-theme' );?>
		</h1><!-- .the-title -->
			<div class="col-md-12 agenda-container">
				<?php while( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'section-parts/each-agenda' ); ?>
				<?php endwhile;?>
			</div><!-- .col-md-12 agenda-container -->
	<?php endif;?>

</div><!-- #content -->

<?php get_footer();