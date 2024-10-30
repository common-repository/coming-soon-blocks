<?php
/**
 * Init gutenberg blocks.
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */

namespace Pixelthrone\ComingSoon_Blocks\Dashboard;

use Pixelthrone\ComingSoon_Blocks\Plugin;
use Pixelthrone\ComingSoon_Blocks\Utils;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main dashboard class
 *
 * @since 1.0.0
 */
class Init {
	/**
	 * Plugin url.
	 *
	 * @var string $plugin_url
	 */
	private $url;

	/**
	 * Plugin slug.
	 *
	 * @var string $slug
	 */
	private $slug;

	/**
	 * Plugin slug.
	 *
	 * @var string $slug
	 */
	private $version;

	/**
	 * Plugin settings.
	 *
	 * @var string $settings
	 */
	private $settings;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public
	function __construct() {
		$this->slug    = Plugin::get_slug();
		$this->url     = Plugin::get_plugin_url();
		$this->version = Plugin::get_version();
		$this->settings = Plugin::get_settings();

		// Disable yoast seo on custom post type
		add_action('add_meta_boxes', function() {
			remove_meta_box('wpseo_meta', $this->slug, 'normal');
		}, 100);


		// Load Scripts
		add_action( 'admin_enqueue_scripts', [ $this, 'load_dashboard_assets' ] );

		// Global options
		add_action( 'init', [ $this, 'init' ], 100 );

		// Left menu options
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}

	/**
	 * Init backend & frontend code.
	 *
	 * @access public
	 */
	public
	function init() {
		/**
		 * Register post type.
		 */
		register_post_type( $this->slug, $this->settings['post_type'] );

		/**
		 * Enqueue global assets.
		 */
		wp_enqueue_style( $this->slug . '-global', $this->url . '/public/dist/global.bundle.css', [], $this->version );
	}

	/**
	 * Register a custom menu page.
	 *
	 * @access public
	 */
	public
	function admin_menu() {
		global $submenu;

		/**
		 * Add Admin menu
		 */
		$arg = $this->settings['admin_button'];
		$arg['menu_slug'] = $this->slug;
		$arg['function'] = [$this, 'dashboard_template'];

		add_menu_page( $arg['page_title'], $arg['menu_title'], $arg['capability'], $arg['menu_slug'], $arg['function'], $arg['icon_url'], $arg['position'] );
		unset( $submenu['coming-soon-blocks'] );
	}

	/**
	 * Admin dashboard template.
	 *
	 * @access public
	 */
	public
	function dashboard_template() {
		if ( current_user_can( 'manage_options' ) )  {
			include_once( Plugin::get_plugin_dir().'/admin/dashboard/template.php' );
		}
	}

	/**
	 * Enqueue dashboard assets.
	 *
	 * @access public
	 */
	public
	function load_dashboard_assets() {

		$screen = get_current_screen();
		if( $screen->base !== 'toplevel_page_coming-soon-blocks' ) return;

		wp_enqueue_style( 'wp-components' );
		wp_enqueue_style( 'wp-editor' );
		wp_enqueue_style( $this->slug . '-dashboard', $this->url . '/public/dist/dashboard.bundle.css', [
			'wp-components',
			'wp-editor',
		], $this->version );

		wp_enqueue_script( 'wp-components' );
		wp_enqueue_script( 'wp-i18n' );
		wp_enqueue_script( 'wp-api' );
		wp_enqueue_script( $this->slug . '-dashboard', $this->url . '/public/dist/dashboard.bundle.js', [
			'wp-i18n',
			'wp-components',
			'wp-api',
		], $this->version, true );

		$this->localization();
	}

	/**
	 * Enqueue Jed-formatted localization data.
	 *
	 * @access public
	 */
	public
	function localization() {
		/**
		 * Check if active page exist.
		 *
		 * @since   1.1.0
		 */
		Plugin::check_if_active_page_exist();

		/**
		 * Share page data with javascript.
		 *
		 * @since   1.0.0
		 */
		$ptPlugin = Plugin::get_dashboard_data();
		$ptPlugin = json_encode( $ptPlugin );
		$content = [
			'const csblocks_dashboard=' . $ptPlugin . ';'
		];

		wp_script_add_data( $this->slug . '-dashboard', 'data', implode( $content, ' ' ) );
		wp_set_script_translations( $this->slug . '-dashboard', 'coming-soon-blocks' );
	}


}

new Init();

