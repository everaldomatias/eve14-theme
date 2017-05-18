jQuery(document).ready(function($) {

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Fancybox
    $('body').on('click', 'a.fancybox', function(e) {
	    // previne a ação padrao: no caso de um link, previne que ele abra o link pelo navegador
	    e.preventDefault();

	    // adiciona o icone loading...
	   	$('<div id="fancybox-loading"><div></div></div>').appendTo('html');

	    // cria os dados para o AJAX
	    var data = {
			 action: 'graffiti_gallery',
			 post_id: $( this ).attr( 'data-id' )
		};
	    // xecuta o ajax
		$.get( ajax_object.ajax_url, data, function(response) {
	        $images = JSON.parse(response);
	        $.fancybox( $images, {type: 'image'});
		});
	});

	// Window load event used just in case window height is dependant upon images
	$(window).bind("load", function() { 
       
       var $contato = $( "body.grid .contato" )
           positionContato()

        function positionContato() {
        	screenSize = $(window).height();
        	body = $( document.body );
        	wrapper = $( "#wrapper" );
        	bodySize = wrapper.height();
        	contatoSize = $contato.height();
           	scrollSize = bodySize - contatoSize*2;

           	wrapper.css({
           		'padding-bottom': contatoSize
           	})

        	if ( $(window).scrollTop() > scrollSize ) {
        		$contato.css({
        			opacity: 1
        		})
        	} else {
        		$contato.css({
        			opacity: 0
        		})
        	};
        }
           
       $( window )
        	.scroll( positionContato )
            .resize( positionContato )
              
	});

});
