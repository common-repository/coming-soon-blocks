<?php
/**
 * Social widget component.
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */
if( empty($networks)) {
	return;
}

$networks = json_decode( $networks );
?>
<div data-component="social-icons">
	<?php
		foreach( $networks as $network ):
			if( ! empty($network->url) ):
	?>
			<a href="<?php echo esc_url($network->url); ?>" target="_blank" class="-icon -<?php echo esc_attr($network->icon); ?>"><i class="socicon-<?php echo esc_attr($network->icon); ?>"></i></a>
	<?php
			endif;
		endforeach;
	?>
</div>
