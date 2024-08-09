<?php
/**
 * Image component layout.
 *
 * @package    WordPress
 * @subpackage critick
 */

if ( ! $data = $args['data'] ?? null ) {
	return;
}

$is_lazy = isset( $data['lazy'] ) && $data['lazy'];

// Simple img tag.
if ( empty( $data['breakpoints'] ) ) {
	if ( $is_lazy ) {
		$srcset = isset( $data['url_2x'] ) ? ' data-srcset="' .
		                                     esc_url( $data['url'] ) .
		                                     ' 1x, ' .
		                                     esc_url( $data['url_2x'] ) .
		                                     ' 2x"' : '';
		?>
		<img
			class="js-lazy" data-src="<?php echo esc_url( $data['url'] ) ?>"
			<?php echo $srcset ?>
			width="<?php echo esc_attr( $data['width'] ) ?>" height="<?php echo esc_attr( $data['height'] ) ?>"
			alt="<?php echo esc_attr( $data['alt'] ) ?>"
		>
		<?php
	} else {
		$srcset = isset( $data['url_2x'] ) ? ' srcset="' .
		                                     esc_url( $data['url'] ) .
		                                     ' 1x, ' .
		                                     esc_url( $data['url_2x'] ) .
		                                     ' 2x"' : '';
		?>
		<img
			src="<?php echo esc_url( $data['url'] ) ?>"
			<?php echo $srcset ?>
			width="<?php echo esc_attr( $data['width'] ) ?>" height="<?php echo esc_attr( $data['height'] ) ?>"
			alt="<?php echo esc_attr( $data['alt'] ) ?>"
		>
		<?php
	}
} else {	// Picture tag with several breakpoints.
	?>
	<picture>
		<?php
		if ( $is_lazy ) {
			foreach ( $data['breakpoints'] as $key => $breakpoint ) {
				if ( $key === 0 ) {
					$media = '(min-width:' . $breakpoint['breakpoint'] . 'px)';
				} elseif ( $key === count( $data['breakpoints'] ) - 1 ) {
					$media = '(max-width:' . ( $data['breakpoints'][ $key - 1 ]['breakpoint'] - 1 ) . 'px)';
				} else {
					$media = '(max-width: ' .
					         ( $data['breakpoints'][ $key - 1 ]['breakpoint'] - 1 ) .
					         'px) and (min-width: ' .
					         $breakpoint['breakpoint'] .
					         'px)';
				}
				?>
				<source
					media="<?php echo $media ?>"
					data-srcset="<?php echo esc_url( $breakpoint['url'] ), ' 1x, ', esc_url( $breakpoint['url_2x'] ), ' 2x' ?>"
				>
				<?php
			}
			?>
			<img
				class="js-lazy" data-src="<?php echo esc_url( $data['url'] ) ?>"
				width="<?php echo esc_attr( $data['width'] ) ?>" height="<?php echo esc_attr( $data['height'] ) ?>"
				alt="<?php echo esc_attr( $data['alt'] ) ?>"
			>
			<?php
		} else {
			foreach ( $data['breakpoints'] as $key => $breakpoint ) {
				if ( $key === 0 ) {
					$media = '(min-width:' . $breakpoint['breakpoint'] . 'px)';
				} elseif ( $key === count( $data['breakpoints'] ) - 1 ) {
					$media = '(max-width:' . ( $data['breakpoints'][ $key - 1 ]['breakpoint'] - 1 ) . 'px)';
				} else {
					$media = '(max-width: ' .
					         ( $data['breakpoints'][ $key - 1 ]['breakpoint'] - 1 ) .
					         'px) and (min-width: ' .
					         $breakpoint['breakpoint'] .
					         'px)';
				}
				?>
				<source
					media="<?php echo $media ?>"
					srcset="<?php echo esc_url( $breakpoint['url'] ), ' 1x, ', esc_url( $breakpoint['url_2x'] ), ' 2x' ?>"
				>
				<?php
			}
			?>
			<img
				src="<?php echo esc_url( $data['url'] ) ?>" width="<?php echo esc_attr( $data['width'] ) ?>"
				height="<?php echo esc_attr( $data['height'] ) ?>" alt="<?php echo esc_attr( $data['alt'] ) ?>"
			>
			<?php
		}
		?>
	</picture>
	<?php
}

