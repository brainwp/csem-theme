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
	/**
	 *
	 * Dois itens da seção fazer-parte seguir o mesmo tamanho (altura)
	 *
	*/
	var set_fazer_parte_dynamic_styles = function() {
		if ( $( window ).width() < 900 ) {
			return;
		}
		var $content_1 = $( '.section-fazer-parte .fazer-parte-content-1' );
		var $content_2 = $( '.section-fazer-parte .fazer-parte-content-2' );
		if ( $content_1.outerHeight() > $content_2.outerHeight() ) {
			var height = $content_1.outerHeight();
			$( '.section-fazer-parte .fazer-parte-content-2' ).css( 'min-height', height + 'px' );
		}
		if ( $content_2.outerHeight() > $content_1.outerHeight() ) {
			var height = $content_2.outerHeight();
			$( '.section-fazer-parte .fazer-parte-content-1' ).css( 'min-height', height + 'px' );
		}
		console.log( $( '.section-fazer-parte .fazer-parte-content-1 img' ).width() );
		console.log( $( '.section-fazer-parte .fazer-parte-content-1 .section-title' ).width() );
		var content_1_img_width = $( '.section-fazer-parte .fazer-parte-content-1 img' ).outerWidth( false ) - $( '.section-fazer-parte .fazer-parte-content-1 .section-title' ).outerWidth( false );
		$( '.section-fazer-parte .fazer-parte-content-1 .section-title' ).css( 'margin-left', content_1_img_width + 'px');

	}
	if ( 0 != $( '.section-fazer-parte').length ) {
		set_fazer_parte_dynamic_styles();
		$( window ).on( 'resize', function(){
			set_fazer_parte_dynamic_styles();
		});
	}

});
