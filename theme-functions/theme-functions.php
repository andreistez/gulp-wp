<?php

/**
 * Theme custom functions.
 * Please place all your custom functions declarations inside this file.
 *
 * @package    WordPress
 * @subpackage critick
 */

/**
 * Clean incoming value from trash.
 *
 * @param mixed $value Some value to clean.
 * @return    string
 */
function crit_clean( $value ): string
{
	$value = wp_unslash( $value );
	$value = trim( $value );
	$value = stripslashes( $value );
	$value = strip_tags( $value );

	return htmlspecialchars( $value );
}

/**
 * Output formatted data for debugging & testing.
 *
 * @param $data
 * @return void
 */
function crit_prettify_data( $data ): void
{
	echo '<pre>', print_r( $data, 1 ), '</pre>';
}

