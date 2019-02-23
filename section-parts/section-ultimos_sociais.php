<?php
$coletivo_ultimos_sociais_id       = coletivo_get_theme_mod( 'coletivo_ultimos_sociais_id', esc_html__('ultimos-sociais', 'coletivo') );
$coletivo_ultimos_sociais_disable  = coletivo_get_theme_mod( 'coletivo_ultimos_sociais_disable' ) == 1 ? true : false ;
?>
<section id="<?php echo esc_attr( $coletivo_ultimos_sociais_id );?>" <?php do_action('coletivo_section_atts', 'ultimos_sociais'); ?> class="<?php echo esc_attr(apply_filters('coletivo_section_class', 'section-ultimos-sociais section-padding onepage-section', 'ultimos_sociais')); ?>">
    <div class="content">
        <div class="container">
            <?php do_action('coletivo_section_before_inner', 'ultimos_sociais'); ?>
                <div class="section-title-area">
                </div>
                <div class="content-socials col-md-4" id="facebook-content">
                </div><!-- #facebook-content.content-socials col-md-4 -->
                <div class="content-socials col-md-4" id="youtube-content">
                </div><!-- #youtube-content.content-socials col-md-4 -->

            </div>
    </div>
    <?php do_action('coletivo_section_after_inner', 'ultimos_sociais'); ?>
</section>
