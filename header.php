<?php

/**
 * Header default template.
 *
 * @package WordPress
 * @subpackage critick
 */

global $page, $paged;
$site_description = get_bloginfo( 'description', 'display' );
?>

<!doctype html>
<html class="no-js" <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta content="" name="description" />
	<meta content="" name="keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta content="telephone=no" name="format-detection" />
	<meta name="HandheldFriendly" content="true" />

	<title>
		<?php
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		if( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";

		if( $paged > 1 || $page > 1 ) echo ' | ' . sprintf( __( 'Page %s', 'critick' ), max( $paged, $page ) );
		?>
	</title>

	<!-- FAVICON -->
	<!-- /FAVICON -->

	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<?php wp_body_open() ?>

	<div class="wrapper">
		<header class="header">
			<?php
			wp_nav_menu( [
				'theme_location'	=> 'header_menu',
				'container'			=> 'nav',
				'container_class'	=> 'header-nav'
			] );
			?>
		</header>

