jQuery(document).ready(function() {
	AOS.init({
		disable: 'mobile',
		startEvent: 'load',
		easing: 'ease-in-sine',
		delay: 100,
		duration: 500
	});

	var logo = jQuery( 'body.home .wrap-logo' );
	if ( jQuery( logo ).length ) {
		var height = window.innerHeight;
		var result = height * 0.5 - ( 160 * 0.5 );
		
		jQuery( logo ).css( 'padding-top', result );
		jQuery( logo ).css( 'padding-bottom', result );
		jQuery( 'body.home #content' ).css( 'margin-top', height );
	}
		
});