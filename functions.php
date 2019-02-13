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
	wp_enqueue_script( 'csem-theme-geral', get_stylesheet_directory_uri() . '/assets/js/geral.js', array( 'jquery'), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'csem_theme_scripts' );

/**
 *
 * Sobrepoe a função padrão do tema pai "coletivo_site_header"
 *
 */
function coletivo_site_header() {
	?>
	  	<header id="masthead" class="site-header" role="banner">
	  			<a href="#" class="csem-open-menu">
	  				<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icon-menu.png" class="open">
	  				<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icon-close-menu.png" class="closed">
	  			</a>
        </header><!-- #masthead -->
        <nav class="menu-logo-toggle" >
          			<div class="site-branding">
                		<?php
                		coletivo_site_logo();
                		?>
               		</div>
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <ul class="coletivo-menu">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s')); ?>
                        </ul>
                    </nav>
                    <!-- #site-navigation -->
        </nav>

    <?php
}

/**
 * Adiciona seções ao tema coletivo
 */
function csem_coletivo_customizer_sections( $sections ) {
	return $sections .= ',fazer-parte';
}
add_filter( 'coletivo_sections_order_default_value', 'csem_coletivo_customizer_sections' );
function csem_coletivo_customize_after_register( $wp_customize ) {
	$pages  =  get_pages();
	$option_pages = array();
	$option_pages[0] = __( 'Select page', 'coletivo' );
	foreach( $pages as $p ){
		$option_pages[ $p->ID ] = $p->post_title;
	}
	
	/*------------------------------------------------------------------------*/
    /*  Section: Fazer Parte
    /*------------------------------------------------------------------------*/

    $wp_customize->add_panel( 'coletivo_fazer-parte',
		array(
			'priority'    => coletivo_get_customizer_priority( 'coletivo_fazer-parte' ),
			'title'           => esc_html__( 'Section: Fazer Parte', 'coletivo' ),
			'description'     => '',
			'active_callback' => 'coletivo_showon_frontpage'
		)
	);
	$wp_customize->add_section( 'coletivo_fazer-parte_settings',
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'coletivo' ),
			'description' => '',
			'panel'       => 'coletivo_fazer-parte',
		)
	);
	// Show Content
	$wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_disable'),
		array(
			'sanitize_callback' => 'coletivo_sanitize_checkbox',
			'default'           => '',
		)
	);
	$wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_disable'),
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__('Hide this section?', 'coletivo'),
			'section'     => 'coletivo_fazer-parte_settings',
			'description' => esc_html__('Check this box to hide this section.', 'coletivo'),
		)
	);
	// Title
    $wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_title'),
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => '',
        )
    );
    $wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_title'),
        array(
            'label' 		=> esc_html__('Title section in customizer', 'coletivo'),
            'section' 		=> 'coletivo_fazer-parte_settings',
            'description'   => esc_html__( 'This title is only showed in customizer', 'coletivo'),
        )
    );

	// Section ID
	$wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_id'),
		array(
			'sanitize_callback' => 'coletivo_sanitize_text',
			'default'           => esc_html__('fazer-parte', 'coletivo'),
		)
	);
	$wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_id'),
		array(
			'label' 		=> esc_html__('Section ID:', 'coletivo'),
			'section' 		=> 'coletivo_fazer-parte_settings',
			'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'coletivo' )
		)
	);
	$wp_customize->add_section( 'coletivo_fazer-parte_content' ,
		array(
			'priority'    => 6,
			'title'       => esc_html__( 'Section Content', 'coletivo' ),
			'panel'       => 'coletivo_fazer-parte',
		)
	);
	// Select Page
	$wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_content_1'),
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_content_1'),
			array(
				'label' 		=> esc_html__('Featured Page', 'coletivo'),
				'section'       => 'coletivo_fazer-parte_content',
				'description' => esc_html__( 'You need to select a Featured Image for a background in full size.', 'coletivo' ),
				'type'     => 'select',
				'choices' => $option_pages,
				'fields'    => array(
					'options' => $option_pages
					)
		) );
    // Featured page content source
    $wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_content_source_1'),
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => 'content',
        )
    );
    $wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_content_source_1'),
        array(
            'label' 		=> esc_html__('Content source', 'coletivo'),
            'section' 		=> 'coletivo_fazer-parte_content',
            'type'          => 'select',
            'choices'       => array(
                'content' => esc_html__( 'Full Page Content', 'coletivo' ),
                'excerpt' => esc_html__( 'Page Excerpt', 'coletivo' ),
            ),
        )
    );
    // More Button
	$wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_more_text_1'),
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__('Discover', 'coletivo'),
		)
	);
	$wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_more_text_1'),
		array(
			'label'     	=> esc_html__('Featured Page Button Text', 'coletivo'),
			'section'       => 'coletivo_fazer-parte_content',
			'description'   => '',
		)
	);

	$wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_content_2'),
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_content_2'),
			array(
				'label' 		=> esc_html__('Featured Page', 'coletivo'),
				'section'       => 'coletivo_fazer-parte_content',
				'description' => esc_html__( 'You need to select a Featured Image for a background in full size.', 'coletivo' ),
				'type'     => 'select',
				'choices' => $option_pages,
				'fields'    => array(
					'options' => $option_pages
					)
		) );
    // Featured page content source
    $wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_content_source_2'),
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => 'content',
        )
    );
    $wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_content_source_2'),
        array(
            'label' 		=> esc_html__('Content source', 'coletivo'),
            'section' 		=> 'coletivo_fazer-parte_content',
            'type'          => 'select',
            'choices'       => array(
                'content' => esc_html__( 'Full Page Content', 'coletivo' ),
                'excerpt' => esc_html__( 'Page Excerpt', 'coletivo' ),
            ),
        )
    );
    // More Button
	$wp_customize->add_setting( coletivo_add_settings('coletivo_fazer-parte_more_text_2'),
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__('Discover', 'coletivo'),
		)
	);
	$wp_customize->add_control( coletivo_add_settings('coletivo_fazer-parte_more_text_2'),
		array(
			'label'     	=> esc_html__('Featured Page Button Text', 'coletivo'),
			'section'       => 'coletivo_fazer-parte_content',
			'description'   => '',
		)
	);


    /*------------------------------------------------------------------------*/
    /*  End of Section Featured Page
    /*------------------------------------------------------------------------*/

}
add_action( 'coletivo_customize_after_register', 'csem_coletivo_customize_after_register', 10, 1 );