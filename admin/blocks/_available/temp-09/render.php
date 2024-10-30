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
	// Typography
	$titleTypo = json_decode( $attributes->titleTypo );
	Utils\page_fonts( 'add', $titleTypo );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $titleTypo, 'title__typography' ) );

	$copyrightTypo = json_decode( $attributes->copyrightTypo );
	Utils\page_fonts( 'add', $copyrightTypo );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $copyrightTypo, 'copyright__typography' ) );

	$bodyTypo = json_decode( $attributes->bodyTypo );
	Utils\page_fonts( 'add', $bodyTypo );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $bodyTypo, 'body__typography' ) );

	// Colors
	Utils\page_css( 'add', "main[data-blockid=\"{$blockID}\"] { color: {$attributes->bodyTextColor}; }" );
	Utils\page_css( 'add', "main[data-blockid=\"{$blockID}\"] h1 { color: {$attributes->titleTextColor}; }" );
	Utils\page_css( 'add', "main[data-blockid=\"{$blockID}\"] .content__wrapper { background-color: {$attributes->blockBgColor}; }" );

	/**
	 * Output
	 */
	ob_start();
	?>
	<main data-blockid="<?php echo $blockID; ?>"
	      data-block="pixelthrone/comingsoon--temp-09"
	      style="color:<?php echo esc_attr($attributes->bodyTextColor) ?>;">

		<div class="the-content -body__typography">

			<!-- Content -->
			<div class="intro-text" style="max-width: <?php echo esc_attr( $attributes->contentMaxWidth ) ?>px">
				<?php if( $attributes->addLogo ): ?>
					<div class="page-brand">
						<img style="max-width: <?php echo esc_attr( $attributes->logoMaxWidth ) ?>px"
						     src="<?php echo esc_url( $attributes->logo->url ) ?>">
					</div>
				<?php endif; ?>

				<?php
					if ( ! empty( $attributes->titleText ) ) {
						echo '<h1 class="-title__typography">' . Utils\esc_allowed_html( $attributes->titleText ) . '</h1>';
					}
					if ( ! empty( $attributes->descriptionText ) ) {
						echo '<p>' . Utils\esc_allowed_html( $attributes->descriptionText ) . '</p>';
					}
				?>
			</div>

			<!-- Footer -->
			<div class="the-footer">
				<div class="copy-text -copyright__typography">
				<?php
					if ( ! empty( $attributes->copyrightText ) ) {
						echo '<p>' . Utils\esc_allowed_html( $attributes->copyrightText ) . '</p>';
					}
				?>
				</div>
				<div class="social-links">
				<?php
					if ( ! empty( $attributes->networks ) && $attributes->networks !== '[]' ) {
						echo '<div class="social__wrapper">';
						Utils\component( 'social-icons', [ 'networks' => $attributes->networks ] );
						echo '</div>';
					}
				?>
				</div>
			</div>
		</div>

		<?php Utils\component( 'block-background-overlayer', [ 'overlayColor' => $attributes->overlay->color, 'overlayOpacity' => $attributes->overlay->opacity ] ) ?>
		<?php Utils\component( 'block-background', [ 'background' => $attributes->background ] ) ?>
	</main>
	<?php
	return ob_get_clean();
};



