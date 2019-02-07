/**
 *
 * Funções da página inicial
 *
*/
jQuery(document).ready(function($) {
	if ( 0 === $( 'body.home').length ) {
		return;
	}
	/**
	 *
	 * Checa se o elemento esta visivel no scroll
	 *
	*/
	$( 'a[href="#proxima"]' ).on( 'click', function( e) {
		var $el_next_section = $( this ).parent().parent().parent().next( 'section' );
		$( 'html, body' ).animate({
        	scrollTop: $el_next_section.offset().top
        }, 700); 
	});
});
