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

	$bodyTypo = json_decode( $attributes->bodyTypo );
	Utils\page_fonts( 'add', $bodyTypo );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $bodyTypo, 'body__typography' ) );

	/**
	 * Output
	 */
	ob_start();
	?>
	<main data-blockid="<?php echo $blockID; ?>"
	      data-block="pixelthrone/comingsoon--temp-06"
	      style="color:<?php echo esc_attr($attributes->bodyTextColor) ?>;">

		<div class="top-content__wrapper"></div>

		<div class="middle-content__wrapper" >
			<div style="max-width:<?php echo esc_attr($attributes->contentMaxWidth) ?>px;">

				<?php
					if( ! $attributes->logoWithMask ) {
						echo '<img style="max-width: '.esc_attr( $attributes->logoMaxWidth ).'px" src="'.esc_url( $attributes->logo->url ).'">';
					} else {
						echo '<span class="image-add-mask" style="width: '.esc_attr( $attributes->logoMaxWidth ).'px; height: '.esc_attr( $attributes->logoMaxWidth ).'px; background-image: url('.esc_url( $attributes->logo->url ).')"></span>';
					}
				?>


				<?php
					if ( ! empty( $attributes->titleText ) ) {
						echo '<h1 style="color: '.esc_attr($attributes->titleTextColor).';" class="-title__typography">'.Utils\esc_allowed_html( $attributes->titleText ).'</h1>';
					}
					if ( ! empty( $attributes->subtitleText ) ) {
						echo '<p class="-body__typography">'.Utils\esc_allowed_html( $attributes->subtitleText ).'</p>';
					}
				?>
				<?php if ( ! empty( $attributes->networks ) && $attributes->networks !== '[]' ): ?>
					<div class="social__wrapper">
						<?php Utils\component( 'social-icons', [ 'networks' => $attributes->networks ] ) ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="bottom-content__wrapper -body__typography">
			<?php
				if ( ! empty( $attributes->copyrightText ) ) {
					echo '<p class="copyright_wrapper">' . Utils\esc_allowed_html( $attributes->copyrightText ) . '</p>';
				}
			?>
		</div>

		<?php Utils\component( 'block-background-overlayer', [ 'overlayColor' => $attributes->overlay->color, 'overlayOpacity' => $attributes->overlay->opacity ] ) ?>
		<?php Utils\component( 'block-background', [ 'background' => $attributes->background ] ) ?>
	</main>
	<?php
	return ob_get_clean();
};
