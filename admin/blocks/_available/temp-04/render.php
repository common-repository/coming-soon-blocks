<?php

use Pixelthrone\ComingSoon_Blocks\Utils;

/**
 * @param $attributes
 * @param $content
 *
 * @return false|string
 */
return function ( $attributes, $content ) {

	// Not render on backend
	if ( is_admin() ) {
		return null;
	}

	$attributes = (object) $attributes;

	$blockID             = uniqid( 'block__' );
	$attributes->logo    = json_decode( $attributes->logo );
	$attributes->overlay = json_decode( $attributes->overlay );

	/**
	 * Body CSS
	 */
	$titleTypo = json_decode( $attributes->titleTypo );
	Utils\page_fonts( 'add', $titleTypo );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $titleTypo, 'title__typography' ) );

	$subtitleTypo = json_decode( $attributes->subtitleTypo );
	Utils\page_fonts( 'add', $subtitleTypo );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $subtitleTypo, 'subtitle__typography' ) );

	$bodyTypo = json_decode( $attributes->bodyTypo );
	Utils\page_fonts( 'add', $bodyTypo );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $bodyTypo, 'body__typography' ) );

	/**
	 * Output
	 */
	ob_start();
	?>
	<main data-blockid="<?php echo $blockID; ?>"
	      data-block="pixelthrone/comingsoon--temp-04"
	      style="color:<?php echo esc_attr($attributes->textColor) ?>;">

		<div class="top-content__wrapper"></div>

		<div class="middle-content__wrapper" style="color:max-width:<?php echo esc_attr($attributes->contentMaxWidth) ?>px;">
			<img style="max-width: <?php echo esc_attr( $attributes->logoMaxWidth ) ?>px"
			     src="<?php echo esc_url( $attributes->logo->url ) ?>">
			<?php
			if ( ! empty( $attributes->subtitleText ) ) {
				echo '<h3 class="-subtitle__typography">' . Utils\esc_allowed_html( $attributes->subtitleText ) . '</h3>';
			}
			if ( ! empty( $attributes->titleText ) ) {
				echo '<h1 class="-title__typography">' . Utils\esc_allowed_html( $attributes->titleText ) . '</h1>';
			}
			if ( ! empty( $attributes->additionalText ) ) {
				echo '<span class="-body__typography additional-text__wrapper"><p>' . Utils\esc_allowed_html( $attributes->additionalText ) . '</p></span>';
			}
			?>
		</div>

		<div class="bottom-content__wrapper">
			<?php
			if ( ! empty( $attributes->networksText ) ) {
				echo '<h3 class="-subtitle__typography">' . Utils\esc_allowed_html( $attributes->networksText ) . '</h3>';
			}
			?>
			<?php if ( ! empty( $attributes->networks ) && $attributes->networks !== '[]' ): ?>
				<div class="social__wrapper">
					<?php Utils\component( 'social-icons', [ 'networks' => $attributes->networks ] ) ?>
				</div>
			<?php endif; ?>
			<?php
			if ( ! empty( $attributes->copyrightText ) ) {
				echo '<p class="-body__typography">' . Utils\esc_allowed_html( $attributes->copyrightText ) . '</p>';
			}
			?>
		</div>

		<?php Utils\component( 'block-background-overlayer', [ 'overlayColor' => $attributes->overlay->color, 'overlayOpacity' => $attributes->overlay->opacity ] ) ?>
		<?php Utils\component( 'block-background', [ 'background' => $attributes->background ] ) ?>
	</main>
	<?php
	return ob_get_clean();
};
