<?php
/**
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * Template name: Cursos CSEM
 * 
 * @package coletivo
 */
get_header(); 
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => get_the_ID(),
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
);
$query = new WP_Query( $args );
?>
<div id="fullpage">
<?php while( have_posts() ) : the_post(); ?>
	<?php $style = '';?>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php $image = get_the_post_thumbnail_url( get_the_ID(), 'large' );?>
		<?php $style = sprintf( 'background-image:url(%s);', $image );?>
	<?php endif;?>
	<section class="section section-type-metodo" style="<?php echo $style;?>">
		<div class="container">
			<h3 class="section-title col-md-1">
				<?php the_title();?>
			</h3><!-- .section-title col-md-2 -->
			<div class="col-md-10 pull-right content">
				<div class="content-itself">
					<?php the_content();?>
				</div><!-- .content-itself -->
			</div><!-- .col-md-10 pull-right content -->
		</div><!-- .container -->
	</section><!-- .section-type-metodo -->
<?php endwhile;?> 
<?php if ( $query->have_posts() ) : ?>
	<?php while( $query->have_posts() ) : $query->the_post(); ?>
		<section class="section section-type-curso">
			<div class="col-md-6">
			<?php $style = '';?>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php $imagecursos = the_post_thumbnail('full');?>
			<?php $style = sprintf( 'background-image:url(%s);', $imagecursos );?>
		<?php endif;?>
			</div>
			<div class="container">
				<div class="col-md-6">
					<h3 class="section-title col-md-12">
					<?php the_title();?>
					</h3><!-- .section-title -->
					<div class="col-md-12 pull-right content">
					<div class="content-itself">
						<?php the_content();?>
					</div><!-- .content-itself -->
					</div>
				</div><!-- .col-md-6 pull-right content -->
			</div>
		</section><!-- .section-type-metodo -->
	<?php endwhile;?>
<?php endif;?>
</div><!-- #fullpage -->
<?php get_footer();

