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
	$( '.csem-open-menu' ).on( 'click', function( e ) {
		e.preventDefault();
		if ( $( this ).hasClass( 'open' ) ) {
			$( this ).removeClass( 'open' );
			$( '.menu-logo-toggle' ).removeClass( 'open' );
		} else {
			$( 'html, body' ).animate({
        		scrollTop: 0
        	}, 800); 
			$( '.menu-logo-toggle' ).addClass( 'open' );
			$( this ).addClass( 'open' ); 
		}
	});
	$( window ).load( function() {
		$( '.menu-logo-toggle' ).css( 'min-height', $( document ).height() + 'px' );
	});
});
