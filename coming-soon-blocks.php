<?php
/**
 * Plugin Name: Coming Soon Blocks
 * Plugin URI: https://pixelthrone.com/coming-soon-blocks
 * Description: Create an coming soon page for your startups easily and fast while your website is not built.
 * Author: Helder Vilela from Pixelthrone
 * Author URI: https://heldervilela.com
 * Tags: gutenberg, editor, block, layout, coming Soon, under Construction, maintenance
 * Version: 1.3.1
 * Text Domain: coming-soon-blocks
 * Domain Path: languages
 * Tested up to: 5.1
 *
 * Coming Soon Blocks is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Coming Soon Blocks. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package   coming-soon-blocks
 * @author    Helder Vilela from Pixelthrone
 * @license   GPL-3.0
 */

namespace Pixelthrone\ComingSoon_Blocks;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load freemius.
 *
 * @since 1.0.0
 */
if ( function_exists( '\csblocks_fs' ) ) {
	\csblocks_fs()->set_basename( false, __FILE__ );
	return;
}

require_once( plugin_dir_path( __FILE__ ) . '/lib/freemius.php' );
require_once( plugin_dir_path( __FILE__ ) . '/lib/Block_Editor_Checker.php' );

/**
 * Initialize Class.
 *
 * @since 1.0.0
 */
final
class Initialize {
	/**
	 * Global Files to include.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	private $global_files = [
		'lib/Plugin.php',
		'lib/Utils.php',
		'lib/Footer_Text.php',
		'admin/dashboard/Init.php',
		'admin/Toolbar.php',
		'admin/blocks/Init.php',
		'admin/api/UnlockPage.php',
		'admin/api/UpdatePost.php',
		'frontend/init.php',
	];

	/**
	 * Admin Files to include.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	private $admin_files = [];

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public
	function __construct() {

		/**
		 * Validate WordPress minimum version and if block editor is active.
		 */
		$checker = new \Pixelthrone\ComingSoon_Blocks\Lib\Block_Editor_Checker();
		if( ! $checker->is_good_to_go() ) {
			return null;
		} else {

			/**
			 * Add a check for our plugin before redirecting.
			 */
			register_activation_hook( __FILE__, function () {
				add_option( 'pt_comingsoonblocks_do_activation_redirect', true );
			} );

			/**
			 * Initialize after plugins loaded
			 */
			add_action( 'plugins_loaded', [ $this, 'plugins_loaded' ] );

			/**
			 * Global Initialize
			 */
			add_action( 'init', [ $this, 'init' ] );
			add_action( 'after_setup_theme', [ $this, 'after_setup_theme' ] );

		}
	}

	/**
	 * Called once any activated plugins have been loaded
	 *
	 * @return void
	 */
	public
	function plugins_loaded() {
		$this->autoload();
	}

	/**
	 * Fires after WordPress has finished loading
	 *
	 * @return void
	 */
	public
	function init() {
		/**
		 * Loads the plugin language files
		 */
		load_plugin_textdomain( 'coming-soon-blocks', false, dirname( plugin_basename( plugin_dir_path( __FILE__ ) ) ) . '/languages/' );
	}

	/**
	 * This hook is called during each page load, after the theme is initialized
	 *
	 * @return void
	 */
	public
	function after_setup_theme() {
		/**
		 * Loads the plugin language files
		 */
		add_image_size( 'csblocks_bg_image', 2304, 1536 );
	}

	/**
	 * Include required files.
	 *
	 * @access private
	 * @since  1.0.0
	 * @return void
	 */
	private
	function autoload() {

		// Global
		foreach ( $this->global_files as $file ) {
			require_once( plugin_dir_path( __FILE__ ) . $file );
		}

		// Admin only
		if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			foreach ( $this->admin_files as $file ) {
				require_once( plugin_dir_path( __FILE__ ) . $file );
			}
		}

	}

	/**
	 * Throw error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	public
	function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'coming-soon-blocks' ), '1.0' );
	}

	/**
	 * Disable unserializing of the class.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return void
	 */
	public
	function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'coming-soon-blocks' ), '1.0' );
	}
}

/**
 * Init plugin.
 *
 * @since  1.0.0
 */
new Initialize();
