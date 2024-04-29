<?php

/**
 * Template Name: Flexible Sections
 *
 * Prepared for Carbon Fields framework only.
 *
 * @see        Page with Flexible Sections tempate -> Fields -> Page Sections.
 *
 * @package    WordPress
 * @subpackage critick
 */

get_header();

$sections = carbon_get_the_post_meta( 'page_sections' );
?>

	<main class="main">
		<?php
		while( have_posts() ){
			the_post();

			foreach( $sections as $section ){
				$type = $section['_type'];
				get_template_part( "includes/sections/$type/$type", null, [ 'section' => $section ] );
			}
		}
		?>
	</main>

<?php
get_footer();

