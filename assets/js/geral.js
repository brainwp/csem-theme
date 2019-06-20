/**
 *
 * Funções gerais
 *
*/
jQuery(document).ready(function($) {
	/**
	 *
	 * Exibe o menu no clique
	 *
	*/
	var csem_menu_open = false;
	$( '.csem-open-menu' ).on( 'click', function( e ) {
		e.preventDefault();
		if ( $( this ).hasClass( 'open' ) ) {
			$( this ).removeClass( 'open' );
			$( '.menu-logo-toggle' ).removeClass( 'open' );
			csem_menu_open = false;
		} else {
			$( 'html, body' ).animate({
        		scrollTop: 0
        	}, 800, function(){
        		$( '.menu-logo-toggle' ).addClass( 'open' );
				$( '.csem-open-menu' ).addClass( 'open' );
				setTimeout(function(){ csem_menu_open = true }, 540 );
        	}); 
		}
	});
	$( window ).load( function() {
		$( '.menu-logo-toggle' ).css( 'min-height', $( document ).height() + 'px' );
	});
	$( window ).scroll( function() {
		if ( ! csem_menu_open ) {
			return;
		}
		var $menu_el = $( '.coletivo-menu' );
		console.log( $menu_el.length );
		console.log( 'menu scroll:', $menu_el.offset() );
		console.log( 'scroll geral:' + $( window ).scrollTop() );
		if ( $( window ).scrollTop() > $menu_el.offset().top * 1.7 ) {
			$( '.csem-open-menu' ).removeClass( 'open' );
			$( '.menu-logo-toggle' ).removeClass( 'open' );
			csem_menu_open = false;
		}
	});
});
