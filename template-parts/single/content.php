<?php
/**
 * Single post content.
 *
 * @package    WordPress
 * @subpackage critick
 */

// If this is NOT single post page - do nothing.
if ( ! is_singular( 'post' ) ) {
	return;
}
?>

<article class="post-single post-<?php echo esc_attr( get_the_ID() ) ?>">
	<h1 class="post-single-title">
		<?php the_title() ?>
	</h1>

	<?php the_content() ?>
</article><!-- .post-single -->

