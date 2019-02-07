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
		console.log( this )
		if ( $( this ).hasClass( 'open' ) ) {
			$( this ).removeClass( 'open' );
			$( '.menu-logo-toggle' ).removeClass( 'open' );
		} else {
			$( '.menu-logo-toggle' ).addClass( 'open' );
			$( this ).addClass( 'open' ); 
		}
	});
});
