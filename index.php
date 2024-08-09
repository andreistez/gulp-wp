<?php
/**
 * Index page default template.
 *
 * @package    WordPress
 * @subpackage critick
 */

get_header();
?>

	<main class="main">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				echo get_the_permalink();
				the_post_thumbnail();
				the_title();

				if ( has_excerpt() ) {
					the_excerpt();
				}

				echo esc_html( get_the_date( 'F j, Y' ) );
			}
		} else {
			esc_html_e( 'Posts not found.', 'critick' );
		}

		if ( get_next_posts_link() ) {
			next_posts_link( '' );
		}
		?>
	</main>

<?php
get_footer();

