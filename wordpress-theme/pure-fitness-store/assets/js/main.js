/**
 * Pure Fitness Store — theme scripts.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var toggle = document.querySelector( '.menu-toggle' );
		var nav = document.getElementById( 'site-navigation' );

		if ( toggle && nav ) {
			toggle.addEventListener( 'click', function () {
				var isOpen = nav.classList.toggle( 'is-open' );
				toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
				document.body.classList.toggle( 'menu-open', isOpen );
			} );

			document.addEventListener( 'keydown', function ( event ) {
				if ( 'Escape' === event.key && nav.classList.contains( 'is-open' ) ) {
					nav.classList.remove( 'is-open' );
					toggle.setAttribute( 'aria-expanded', 'false' );
					document.body.classList.remove( 'menu-open' );
					toggle.focus();
				}
			} );

			document.addEventListener( 'click', function ( event ) {
				if (
					nav.classList.contains( 'is-open' ) &&
					! nav.contains( event.target ) &&
					! toggle.contains( event.target )
				) {
					nav.classList.remove( 'is-open' );
					toggle.setAttribute( 'aria-expanded', 'false' );
					document.body.classList.remove( 'menu-open' );
				}
			} );
		}

		// Add a subtle shadow to the sticky header once the page is scrolled.
		var header = document.getElementById( 'masthead' );
		if ( header ) {
			var onScroll = function () {
				header.classList.toggle( 'is-scrolled', window.scrollY > 10 );
			};
			window.addEventListener( 'scroll', onScroll, { passive: true } );
			onScroll();
		}
	} );
} )();
