<?php
/**
 * Core class.
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */

namespace Pixelthrone\ComingSoon_Blocks;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Core class
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Plugin Path.
	 *
	 * @var array $settings
	 */
	private static $settings;

	/**
	 * Plugin Dir.
	 *
	 * @var string $PLUGIN_DIR
	 */
	private static $PLUGIN_DIR;

	/**
	 * Plugin URL.
	 *
	 * @var string $PLUGIN_URL
	 */
	private static $PLUGIN_URL;

	/**
	 * Plugin File.
	 *
	 * @var string $PLUGIN_FILE
	 */
	private static $PLUGIN_FILE;

	/**
	 * Plugin Base.
	 *
	 * @var string $PLUGIN_BASE
	 */
	private static $PLUGIN_BASE;

	/**
	 * Plugin slug.
	 *
	 * @var string $PLUGIN_SLUG
	 */
	private static $PLUGIN_SLUG;

	/**
	 * Plugin version.
	 *
	 * @var string $PLUGIN_VERSION
	 */
	private static $PLUGIN_VERSION;

	/**
	 * Gutenberg check.
	 *
	 * @var boolean $has_gutenberg
	 */
	private static $has_gutenberg = true;

	/**
	 * Classic Editor check.
	 *
	 * @var boolean $has_classic_editor
	 */
	private static $has_classic_editor = false;

	/**
	 * Meta key names.
	 *
	 * @var array $meta_key
	 */
	private static $meta_key;

	/**
	 * Page css style.
	 *
	 * @var array $page_CSS
	 */
	public static $page_CSS;

	/**
	 * Google fonts to load.
	 *
	 * @var array $google_fonts
	 */
	public static $google_fonts;

	/**
	 * Constructor.
	 */
	public
	function __construct() {
		static::$PLUGIN_DIR = str_replace( "/lib", "", untrailingslashit( plugin_dir_path( __FILE__ ) ) );
		static::$PLUGIN_URL = str_replace( "/lib", "", untrailingslashit( plugin_dir_url( __FILE__ ) ) );
		static::$settings   = include( static::$PLUGIN_DIR . '/admin/config.settings.php' );

		static::$PLUGIN_FILE    = plugin_dir_url( __FILE__ );
		static::$PLUGIN_BASE    = plugin_basename( __FILE__ );
		static::$PLUGIN_SLUG    = static::$settings['plugin']['slug'];
		static::$PLUGIN_VERSION = static::$settings['plugin']['version'];
		static::$meta_key       = static::$settings['meta_keys'];

		// Check if the Gutenberg plugin exists and is got to use
		if ( ! function_exists( 'register_block_type' ) || function_exists( 'classic_editor_init_actions' ) ) {
			static::$has_gutenberg = false;
		}
	}

	/**
	 * Get plugin directory.
	 *
	 * @return string.
	 */
	public static
	function get_plugin_dir( $dir = '' ) {
		return static::$PLUGIN_DIR . $dir;
	}

	/**
	 * Get plugin url.
	 *
	 * @return string.
	 */
	public static
	function get_plugin_url( $dir = '' ) {
		return static::$PLUGIN_URL . $dir;
	}

	/**
	 * Get CDN url.
	 *
	 * @param string $file
	 * @param string $folder
	 *
	 * @return string.
	 */
	public static
	function get_cdn_url( $file, $folder = 'media' ) {
		return static::$settings['cdn'][ $folder ] . $file;
	}

	/**
	 * Get plugin settings.
	 *
	 * @param string $first
	 * @param string $second
	 * @param string $third
	 *
	 * @return array.
	 */
	public static
	function get_settings( $first = null, $second = null, $third = null ) {
		if ( $first ) {
			if ( ! empty( $first ) && ! empty( $second ) && ! empty( $third ) ) {
				return static::$settings[ $first ][ $second ][ $third ];
			}
			if ( ! empty( $first ) && ! empty( $second ) ) {
				return static::$settings[ $first ][ $second ];
			}
			if ( ! empty( $first ) ) {
				return static::$settings[ $first ];
			}
		} else {
			return static::$settings;
		}
	}

	/**
	 * Get plugin slug
	 *
	 * @return string
	 */
	public static
	function get_slug() {
		return static::$PLUGIN_SLUG;
	}

	/**
	 * Get plugin version
	 *
	 * @return string
	 */
	public static
	function get_version() {
		return static::$PLUGIN_VERSION;
	}

	/**
	 * Check if gutenberg exist
	 *
	 * @return string
	 */
	public static
	function has_gutenberg() {
		return static::$has_gutenberg;
	}

	/**
	 * Check if plugin is pro version
	 *
	 * @return string
	 */
	public static
	function is_pro() {
		return static::$is_pro;
	}

	/**
	 * Get Meta Keys
	 *
	 * @return string
	 */
	public static
	function get_meta_key_name( $name ) {
		return isset( static::$meta_key[ $name ] ) ? static::$meta_key[ $name ] : null;
	}

	/**
	 * Get site options & post meta
	 *
	 * @return string
	 */
	public static
	function get_option( $name, $post_id = null, $decode = false ) {
		switch ( $name ) {
			case 'selected_page_id':
				return get_option( static::$meta_key['selected_page_id'], null );
			break;
			case 'settings':
				$r = get_post_meta( $post_id, static::$meta_key['settings'], true );

				return ! $decode ? $r : json_decode( $r );
			break;
			case 'seo':
				$r = get_post_meta( $post_id, static::$meta_key['seo'], true );

				return ! $decode ? $r : json_decode( $r );
			break;
			case 'lookandfeel':
				$r = get_post_meta( $post_id, static::$meta_key['lookandfeel'], true );

				return ! $decode ? $r : json_decode( $r );
			break;
		}
	}

	/**
	 * Get site options & post meta
	 *
	 * @return void
	 */
	public static
	function update_option( $name, $post_id, $value ) {
		switch ( $name ) {
			case 'selected_page_id':
				update_option( static::$meta_key['selected_page_id'], $value );
			break;
			case 'settings':
				$value = json_decode( $value );
				update_post_meta( $post_id, static::$meta_key['settings'], $value );
			break;
			case 'seo':
				$value = json_decode( $value );
				update_post_meta( $post_id, static::$meta_key['seo'], $value );
			break;
			case 'lookandfeel':
				$value = json_decode( $value );
				update_post_meta( $post_id, static::$meta_key['lookandfeel'], $value );
			break;
		}
	}

	/**
	 * Check if coming soon is activated
	 *
	 * @return int
	 */
	public static
	function is_active() {
		return get_option( 'comingsoonblocks_selected_page_id', null ) ? true : false;
	}

	/**
	 * Get frontend settings
	 *
	 * @return object
	 */
	public static
	function get_frontend_settings() {
		$selected_page_id = static::get_option( 'selected_page_id' );

		return (object) [
			'baseURL'          => static::get_plugin_url(),
			'selected_page_id' => $selected_page_id,
			'settings'         => static::get_option( 'settings', $selected_page_id, false ),
			'seo'              => static::get_option( 'seo', $selected_page_id, false ),
			'lookandfeel'      => static::get_option( 'lookandfeel', $selected_page_id, false ),
		];
	}

	/**
	 * Get script data.
	 *
	 * @return array
	 */
	public static
	function get_script_data() {
		$selected_page_id = static::get_option( 'selected_page_id' );
		$seo              = static::get_option( 'seo', get_the_ID() );
		$lookandfeel      = static::get_option( 'lookandfeel', get_the_ID() );
		$settings         = static::get_option( 'settings', get_the_ID() );

		if ( ! empty( $settings ) ) {
			$settings->status = ( (int) $selected_page_id === get_the_ID() ) ? true : false;
		}

		return [
			'baseURL'     => static::get_plugin_url(),
			'time_format' => get_option( 'time_format' ),
			'settings'    => $settings,
			'seo'         => $seo,
			'lookandfeel' => $lookandfeel,
			'license'       => static::get_license_data(),
		];
	}

	/**
	 * Get all pages created
	 *
	 * @return array
	 */
	public static
	function get_all_pages( $post_status = [ 'publish', 'draft' ] ) {

		$filter = function ( $post ) {
			return [
				'id'          => $post->ID,
				'title'       => $post->post_title,
				'status'      => $post->post_status,
				'date'        => get_the_date( '', $post->ID ),
				'edit_link'   => get_edit_post_link( $post->ID ),
				'delete_link' => get_delete_post_link( $post->ID )
			];
		};

		$getPages = get_posts( [
			                       'numberposts' => 500,
			                       'post_status' => $post_status,
			                       'post_type'   => static::$PLUGIN_SLUG,
			                       'fields'      => 'id'
		                       ] );

		$pages = array_map( $filter, $getPages );

		return $pages;
	}

	/**
	 * Check if active page exist
	 *
	 * @return void
	 */
	public static
	function check_if_active_page_exist() {
		$selected_page_id = static::get_option( 'selected_page_id' );
		if ( $selected_page_id ) {
			$post = get_post( $selected_page_id );
			if ( $post === null ) {
				static::update_option( 'selected_page_id', null, null );
			}
		}
	}

	/**
	 * Get license data
	 *
	 * @return array
	 */
	public static
	function get_license_data() {
		$license = [
			'plan'       => csblocks_fs()->get_plan_name() === "PLAN_NAME" ? 'Free' : csblocks_fs()->get_plan_name(),
			'is_premium' => csblocks_fs()->can_use_premium_code(),
			'is_trial'   => csblocks_fs()->is_trial(),
			'is_free'    => csblocks_fs()->is_not_paying(),
		];

		return $license;
	}

	/**
	 * Get dashboard data
	 *
	 * @return array
	 */
	public static
	function get_dashboard_data() {
		$DATA = [
			'all_pages'     => static::get_all_pages(),
			'selected_page' => static::get_option( 'selected_page_id' ),
			'new_post_link' => get_admin_url( null, 'post-new.php?post_type=' . static::$PLUGIN_SLUG ),
			'license'       => static::get_license_data(),
		];

		return $DATA;
	}
}

new Plugin();
