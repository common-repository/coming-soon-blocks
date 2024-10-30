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

	$blockID = uniqid('block__');

	/**
	 * Typography
	 */
	$bodyTypo = json_decode($attributes['bodyTypo']);
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $bodyTypo, 'body__typography' ) );
	Utils\page_fonts( 'add', $bodyTypo );

	$titleTypo = json_decode( $attributes['titleTypo'] );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $titleTypo, 'title__typography' ) );
	Utils\page_fonts( 'add', $titleTypo );

	$subtitleTypo = json_decode( $attributes['subtitleTypo'] );
	Utils\page_css( 'add', Utils\compile_block_css( $blockID, $subtitleTypo, 'subtitle__typography' ) );
	Utils\page_fonts( 'add', $subtitleTypo );

	/**
	 * Output
	 */
	ob_start();
	?>
	<main data-blockid="<?php echo $blockID; ?>" data-block="pixelthrone/comingsoon--temp-01">

		<div class="content__container" style="color:<?php echo esc_attr($attributes['textColor']); ?>">
			<div class="brand__wrapper">
				<img style="max-width: <?php echo esc_attr($attributes['logoMaxWidth']) ?>px"
				     class="-<?php echo esc_attr($attributes['logoAlign']) ?>-align"
				     src="<?php echo esc_url($attributes['logoURL']) ?>"
				>
			</div>

			<div class="title__wrapper">
				<?php echo ! empty($attributes['titleText']) ? '<h1 class="-title__typography">'.$attributes['titleText'].'<h1>' : ''; ?>
			</div>

			<div class="subtitle__wrapper">
				<?php echo ! empty($attributes['subTitleText']) ? '<h2 class="-subtitle__typography">'.Utils\esc_allowed_html($attributes['subTitleText']).'</h2>' : ''; ?>
			</div>

			<div class="description__wrapper -body__typography">
				<?php echo ! empty($attributes['descriptionText']) ? '<p>'.Utils\esc_allowed_html($attributes['descriptionText']).'</p>' : ''; ?>
				<p class="copyright"><?php echo Utils\esc_allowed_html( $attributes['copyrightText'] ) ?></p>
			</div>

			<?php if( ! empty($attributes['networks']) && $attributes['networks'] !== '[]' ): ?>
			<div class="social__wrapper">
				<?php Utils\component('social-icons', ['networks'=> $attributes['networks']]) ?>
			</div>
			<?php endif; ?>

		</div>

		<?php Utils\component('block-background-overlayer', ['overlayColor'=> $attributes['overlayColor'], 'overlayOpacity' => $attributes['overlayOpacity'] ]) ?>
		<?php Utils\component('block-background', ['background'=> $attributes['background'] ]) ?>
	</main>
<?php
	return ob_get_clean();
};
