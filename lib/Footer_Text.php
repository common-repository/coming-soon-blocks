<?php
/**
 * Modifies the "Thank you" text displayed in the admin footer
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */
namespace Pixelthrone\ComingSoon_Blocks\Lib;
use Pixelthrone\ComingSoon_Blocks\Plugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Generates a link.
 */
class Footer_Text {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ) );
	}

	/**
	 * Admin footer text.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $footer_text The content that will be printed.
	 *
	 * @return string The content that will be printed.
	 */
	public function admin_footer_text( $footer_text ) {
		global $pagenow, $post_type;
		$screen = get_current_screen();

		if ( $screen->base !== 'toplevel_page_coming-soon-blocks' && $screen->post_type !== 'edit' ) {
			return $footer_text;
		}

		$style = 'style="text-decoration: none; color: #f4d500; letter-spacing: 1px; margin: 0 3px; vertical-align: middle;"';

		$footer_text = sprintf(
			/* translators: 1: Block Architect, 2: Link to plugin review */
			__( 'Enjoying %1$s? Please leave a %2$s rating — we appreciate your support!', 'block-gallery' ),
			'<strong>'.Plugin::get_settings('plugin', 'name').'</strong>',
			'<a href="' . esc_url( Plugin::get_settings('plugin', 'wp_review_url') ) . '" '.$style.' target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
		);

		return $footer_text;
	}
}

new Footer_Text();
