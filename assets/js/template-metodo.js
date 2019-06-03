/**
 *
 * Funções gerais
 *
*/
jQuery(document).ready(function($) {
	// pagina do metodo
	var csem_load_metodo = function() {
		if ( $( '.section-type-metodo' ).length > 0 ) {
			console.log( $( window ).height() );
			$( '.section-type-metodo' ).each( function(){
				var bigger = false;
				console.log( 'ahoy2' );
				var $title = $( this ).find( 'h3.section-title' );
				console.log( $title.html() );
				var $content = $( this ).find( '.content' );
				var padding = parseInt( $title.height(), 10 ) / 4;
				if ( $( window ).height() <= 680 && $content.height() >= 500 ) {
					var padding = 45;
					$content.addClass( 'bigger' );
					var bigger = true;
				}
				$content.css( 'padding-top', padding + 'px' );
				var padding_title = $( window ).height() - $title.height();
				console.log( $( window ).height(), $title.height() );
				$title.css( 'padding-top', padding_title + 'px' );
			} );
		}
	}
	$( window ).load( function(){
		//csem_load_metodo();
		$('#fullpage').fullpage({
			//options here
			autoScrolling:true,
			scrollHorizontally: true,
			navigation: true,
			sectionSelector: '.section',
			scrollOverflow: true
		});
	});
});
