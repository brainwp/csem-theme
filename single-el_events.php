<?php
/**
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package coletivo
 */

get_header(); ?>	
<?php while( have_posts() ) : the_post(); ?>
<div id="content" class="container">
	<h1 class="the-title">
		<?php the_title();?>
	</h1><!-- .the-title -->
		<div class="col-md-12 agenda-container">
			<?php get_template_part( 'section-parts/each-agenda' ); ?>
		</div><!-- .col-md-12 agenda-container -->
</div><!-- #content -->
</div><!-- #page -->
<div class="hfeed site">
<div class="container" id="the-content">
	<h3>
		<?php _e( 'SOBRE O EVENTO: ', 'csem-theme' );?>
	</h3>
	<?php the_content();?>
</div><!-- #the-content.container -->
<?php endwhile;?>
<?php get_footer();