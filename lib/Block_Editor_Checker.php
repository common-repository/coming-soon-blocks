<?php
/**
 * Validate WordPress minimum version and if block editor is active.
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */
namespace Pixelthrone\ComingSoon_Blocks\Lib;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Notice Class
 *
 * @since 1.1.0
 */
class Block_Editor_Checker {

	/**
	 * Default editor for all users.
	 *
	 * @since 1.1.0
	 * @return string
	 */
	private $defaultEditor = '';

	/**
	 * Allow users to switch editors.
	 *
	 * @since 1.1.0
	 * @return string
	 */
	private $allowSwitch = '';

	/**
	 * Setup the activation class.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return boolean
	 */
	public
	function __construct() {
		$this->defaultEditor = get_option('classic-editor-replace');
		$this->allowSwitch = get_option('classic-editor-allow-users');

		/**
		 * Check for block editor.
		 */
		if( version_compare(get_bloginfo('version'),'5', '<')  ) {
			add_action( 'admin_notices', [$this, 'wp5_notice']);
			return false;
		}

		/**
		 * Check for block editor.
		 */
		if( $this->defaultEditor === 'classic' && $this->allowSwitch === 'disallow' ) {
			add_action( 'admin_notices', [$this, 'block_editor_notice']);
			return false;
		}

		return true;
	}

	/**
	 * Display notice if Gutenberg is not installed or activated.
	 *
	 * @access public
	 * @since 1.1.0
	 */
	public function block_editor_notice() {
		$url = admin_url('options-writing.php');
	?>
		<div class="notice notice-warning" style="border-left: 4px solid #ffb900;">
			<h2 class="title" style="margin-bottom: 0;"><?php esc_html_e( 'Some changes are required.', 'coming-soon-blocks' ); ?></h2>
			<p><?php printf( esc_html__( 'In order to use the %sComing Soon Blocks%s plugin it is required that %sthese options%s have the following settings:', 'coming-soon-blocks' ), '<strong>','</strong>', '<a href="'.$url.'" class="button">', '</a>' );  ?></p>
			<ul>
				<li><?php printf( esc_html__( '— Allow users to switch editors : %sYes %s', 'coming-soon-blocks' ), '<strong>', '</strong>' );  ?></li>
			</ul>
		</div>
	<?php
	}

	/**
	 * Display notice if Gutenberg is not installed or activated for wordpress 5
	 *
	 * @access public
	 * @since 1.1.0
	 */
	public
	function wp5_notice() {
	?>
		<div class="notice notice-warning">
			<h4 style="margin-bottom: 5px;"><?php esc_html_e( 'The Coming Soon Blocks plugin cannot be used with your current WordPress version. Please update to the latest version.', 'coming-soon-blocks' ); ?></h4>
			<p><?php esc_html_e( 'Thank you for understanding.', 'coming-soon-blocks' ); ?></p>
		</div>
	<?php
	}

	/**
	 * Display notice if Gutenberg is not installed or activated for wordpress 5
	 *
	 * @since 1.1.0
	 * @access public
	 * @return boolean
	 */
	public
	function is_good_to_go() {
		if( version_compare(get_bloginfo('version'),'5', '<') || $this->defaultEditor === 'classic' && $this->allowSwitch === 'disallow' ) {
			return false;
		} else {
			return true;
		}
	}
}