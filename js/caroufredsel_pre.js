// JavaScript Document

jQuery(function($) {
    $('#foo2').carouFredSel({
        prev: '#prev2',
        next: '#next2',
        items: 1,
		circular: true,
		fx: 'fade',
		auto: {
			delay: 6000,
		},
		scroll		: {
			pauseOnHover: "immediate",
			fx: "directscroll",
			easing: "swing",
			duration: 1200,
		}
    });
});