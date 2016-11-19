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
    $('.fancybox').fancybox();

    //http://stackoverflow.com/questions/20911124/jquery-fancybox-on-gallery-loaded-by-ajax-issues-with-grouping

});
