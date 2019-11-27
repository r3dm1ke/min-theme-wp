/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Footer
	wp.customize('min_footer_copyright', function (value) {
        value.bind(function(to) {
            $('#footer_copyright').text(to);
        })
    });

    wp.customize('min_footer_subtitle', function (value) {
        value.bind(function(to) {
            $('#footer_subtitle').text(to);
        })
    });

    wp.customize('min_footer_custom_html', function (value) {
        value.bind(function(to) {
            $('#footer_custom_html').text(to);
        })
    });

    // Cookie banner
	wp.customize('min_cookie_banner_text', function (value) {
		value.bind(function (to) {
			$('#cookie-banner-text').text(to);
		})
	});

	wp.customize('min_cookie_banner_button_text', function (value) {
		value.bind(function (to) {
			$('#cookie-banner-button').text(to);
		})
	});

	wp.customize('min_cookie_banner_learn_more_text', function (value) {
		value.bind( function (to) {
			$('#cookie-banner-link').text(to);
		})
	});

	wp.customize('min_cookie_banner_learn_more_link', function (value) {
		value.bind( function (to) {
			$('#cookie-banner-link').attr('href', to);
		})
	});

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
