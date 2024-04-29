<?php

/**
 * Theme custom functions.
 * Please place all your custom functions declarations inside this file.
 *
 * @package    WordPress
 * @subpackage critick
 */

/**
 * Remove auto paragraph wrap in Contact Form 7.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

add_filter( 'wp_check_filetype_and_ext', function( $data, $file, $filename, $mimes ){
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];

}, 10, 4 );

add_filter( 'upload_mimes', 'crit_cc_mime_types' );
function crit_cc_mime_types( $mimes ): array
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_action( 'admin_head', 'crit_fix_svg' );
function crit_fix_svg(): void
{
	echo '<style>
		.attachment-266x266, .thumbnail img {
		     width: 100% !important;
		     height: auto !important
		}
    </style>';
}

add_action( 'wp_head', 'crit_js_vars_for_frontend' );
/**
 * JS variables for frontend, such as AJAX URL.
 */
function crit_js_vars_for_frontend(): void {
	$variables = [ 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ];
	echo '<script type="text/javascript">window.wpData = ' . json_encode( $variables ) . ';</script>';
}

