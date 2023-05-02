<?php

/**
 * Template Name: Flexible Sections
 *
 * Prepared for Carbon Fields framework only.
 *
 * @see Page with Flexible Sections tempate -> Fields -> Page Sections.
 *
 * @package WordPress
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
				switch( $section['_type'] ){
					case 'hero_section':
						get_template_part( 'includes/sections/hero_section/hero_section', null, [ 'section' => $section ] );
						break;

					case 'bullets_section':
						get_template_part( 'includes/sections/bullets_section/bullets_section', null, [ 'section' => $section ] );
						break;

					case 'image_text_section':
						get_template_part( 'includes/sections/image_text_section/image_text_section', null, [ 'section' => $section ] );
						break;

					case 'text_image_section':
						get_template_part( 'includes/sections/text_image_section/text_image_section', null, [ 'section' => $section ] );
						break;

					case 'partners_section':
						get_template_part( 'includes/sections/partners_section/partners_section', null, [ 'section' => $section ] );
						break;

					default:
						esc_html_e( 'Template not found.', THEME_NAME );
				}
			}
		}
		?>
	</main>

<?php
get_footer();

