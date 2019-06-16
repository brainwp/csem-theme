<?php
$coletivo_fazerparte_id       = coletivo_get_theme_mod( 'coletivo_fazer-parte_id', esc_html__('fazer-parte', 'coletivo') );
$coletivo_fazerparte_disable  = coletivo_get_theme_mod( 'coletivo_fazer-parte_disable' ) == 1 ? true : false ;
$coletivo_fazerparte_more_text_1 = coletivo_get_theme_mod( 'coletivo_fazer-parte_more_text_1', esc_html__('Discover', 'coletivo') );
$coletivo_fazerparte_more_text_2 = coletivo_get_theme_mod( 'coletivo_fazer-parte_more_text_2', esc_html__('Discover', 'coletivo') );
$coletivo_fazerparte_desc     = coletivo_get_theme_mod( 'coletivo_fazer-parte_desc');
if ( coletivo_is_selective_refresh() ) {
    $coletivo_fazerparte_disable = false;
}?>
<section style="<?php echo esc_attr( $style );?>" id="<?php echo esc_attr( $coletivo_fazerparte_id );?>" <?php do_action('coletivo_section_atts', 'fazer-parte'); ?> class="<?php echo esc_attr(apply_filters('coletivo_section_class', 'section-fazer-parte section-padding onepage-section', 'fazer-parte')); ?>">
<?php if ( coletivo_get_theme_mod( 'coletivo_fazer-parte_content_1' ) && coletivo_get_theme_mod( 'coletivo_fazer-parte_content_1' ) ) : ?>
<div class="content"> 
	            <div class="container">
	                <?php do_action('coletivo_section_before_inner', 'fazer-parte'); ?>
                            <div class="section-title-area fazer-parte-content-1">
                                <?php
                                    $post_id = coletivo_get_theme_mod( 'coletivo_fazer-parte_content_1' );
                                    global $post;
                                    $post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
                                    $post = get_post( $post_id );
                                    setup_postdata( $post );
                                ?>
                                <div class="the-thumb">
                                    <?php the_post_thumbnail( 'large' );?>
                                    <h2 class="section-title"><?php the_title(); ?></h2>
                                </div><!-- .the-thumb -->
                                <div class="section-desc">
                                    <?php the_excerpt();?>
                                </div>
                                <br />
                                <?php if ( $coletivo_fazerparte_more_text_1 != '' ) : ?>
		                          <a id="fazerparte" class="btn btn-theme-primary btn-lg" href="<?php echo esc_url( get_permalink()) ;?>">
									   <?php echo esc_html( $coletivo_fazerparte_more_text_1 ); ?>
                                    </a>
                                <?php endif;?>
		                    </div>
                            <div class="section-title-area fazer-parte-content-2">
                                <?php
                                    $post_id = coletivo_get_theme_mod( 'coletivo_fazer-parte_content_2' );
                                    global $post;
                                    $post_id = apply_filters( 'wpml_object_id', $post_id, 'page', true );
                                    $post = get_post( $post_id );
                                    setup_postdata( $post );
                                ?>
                                <div class="the-thumb">
                                    <h2 class="section-title"><?php the_title(); ?></h2>
                                    <?php the_post_thumbnail( 'large' );?>
                                    <h2 class="section-title-buttom"><?php the_title(); ?></h2>
                                </div><!-- .the-thumb -->
                                <div class="section-desc">
                                    <?php the_excerpt();?>
                                </div>

                                <br />
                                <?php if ( $coletivo_fazerparte_more_text_2 != '' ) : ?>
                                  <a class="btn btn-theme-primary btn-lg" href="<?php echo esc_url( get_permalink()) ;?>">
                                       <?php echo esc_html( $coletivo_fazerparte_more_text_2 ); ?>
                                    </a>
                                <?php endif;?>
                            </div>

                            <?php
                        wp_reset_postdata();
                    ?>
            </div>
        </div>
    <?php endif; ?>
            <?php do_action('coletivo_section_after_inner', 'fazerparte'); ?>
        </section>