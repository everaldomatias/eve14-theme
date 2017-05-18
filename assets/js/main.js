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
	   	$('<div id="fancybox-loading"><div></div></div>').appendTo('body');

	    // cria os dados para o AJAX
	    var data = {
			 action: 'graffiti_gallery',
			 post_id: $( this ).attr( 'data-id' )
		};
	    // executa o ajax
		$.get( ajax_object.ajax_url, data, function(response) {
	        $images = JSON.parse(response);
	        $.fancybox( $images, {type: 'image'});
		});
	});

    //http://stackoverflow.com/questions/20911124/jquery-fancybox-on-gallery-loaded-by-ajax-issues-with-grouping

});
