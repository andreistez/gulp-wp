<?php

/**
 * Theme custom functions.
 * Please place all your custom functions declarations inside this file.
 *
 * @package WordPress
 * @subpackage critick
 */

/**
 * Prevent jQuery scripts from loading on the front-end.
 */
add_action( 'wp_default_scripts', 'critick_remove_jq_migrate' );
function critick_remove_jq_migrate( $scripts ){
	if( ! is_admin() ) $scripts->remove( 'jquery' );
}

