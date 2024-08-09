import LazyLoad from 'vanilla-lazyload'

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	new LazyLoad( { elements_selector: '.js-lazy' } );
} )