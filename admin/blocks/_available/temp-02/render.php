<?php
use Pixelthrone\ComingSoon_Blocks\Utils;

/**
 * @param $attributes
 * @param $content
 *
 * @return false|string
 */
return function( $attributes, $content ) {

	// Not render on backend
	if( is_admin() ) {
		return null;
	}

	$attributes = (object) $attributes;

	$blockID = uniqid('block__');
	$attributes->logo = json_decode( $attributes->logo );
	$attributes->overlay = json_decode( $attributes->overlay );

	/**
	 * Body CSS
	 */
	$bodyTypo = json_decode($attributes->bodyTypo);
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $bodyTypo, 'body__typography' ) );
	Utils\page_fonts( 'add', $bodyTypo );

	/**
	 * Output
	 */
	ob_start();
	?>
	<main data-blockid="<?php echo $blockID; ?>" data-block="pixelthrone/comingsoon--temp-02">

		<div class="brand__wrapper" style="color:<?php echo esc_attr($attributes->textColor); ?>">
			<img style="max-width: <?php echo esc_attr($attributes->logoMaxWidth) ?>px"
			     src="<?php echo esc_url($attributes->logo->url) ?>"
			>
			<?php
			if ( ! empty( $attributes->additionalText ) ) {
				echo '<span class="-body__typography additional-text__wrapper"><p>' . Utils\esc_allowed_html( $attributes->additionalText ) . '</p></span>';
			}
			?>
		</div>

		<?php if( ! empty($attributes->copyrightText) ): ?>
		<div class="copyright__wrapper" style="color:<?php echo esc_attr($attributes->textColor); ?>">
			<p class="-body__typography"><?php echo Utils\esc_allowed_html( $attributes->copyrightText ) ?></p>
		</div>
		<?php endif; ?>

		<?php Utils\component('block-background-overlayer', ['overlayColor'=> $attributes->overlay->color, 'overlayOpacity' => $attributes->overlay->opacity ]) ?>
		<?php Utils\component('block-background', ['background'=> $attributes->background ]) ?>
	</main>
<?php
	return ob_get_clean();
};
