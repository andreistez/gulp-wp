const ajaxUrl = window.wpData.ajaxUrl

/**
 * Custom AJAX request.
 *
 * @param	{Object}	formData	Data for fetch body.
 * @returns	{Array}					Response data array.
 */
export const critAjaxRequest = async formData => {
	let response = await fetch( ajaxUrl, {
		method: 'post',
		body: formData
	} )

	return await response.json()
}

/**
 * Scroll document to specific element.
 *
 * @param {String|Object}	elementSelector		DOM element selector to scroll to.
 * @param {Boolean}			ignoreHeaderHeight	Ignore site header height or not.
 * @param {Boolean}			scrollTop			Scroll to the top of the document.
 */
export const scrollToElem = ( elementSelector, ignoreHeaderHeight = false, scrollTop = false ) => {
	let element, offset

	switch( typeof elementSelector ){
		case 'string':
			element = document.querySelector( elementSelector )

			if( element )
				offset = scrollTop ? element.getBoundingClientRect().top : element.getBoundingClientRect().top + window.scrollY
			break

		case 'object':
			if( elementSelector )
				offset = scrollTop ? elementSelector.getBoundingClientRect().top : elementSelector.getBoundingClientRect().top + window.scrollY
			break

		default:
			offset = elementSelector
			break
	}

	if( ! offset ) return

	// If we need to check for header height.
	if( ! ignoreHeaderHeight )
		offset -= document.querySelector( '.header' ).clientHeight

	window.scroll( {
		top: offset,
		behavior: 'smooth'
	} )
}