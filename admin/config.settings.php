<?php
/**
 * plugin config file.
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Pixelthrone\ComingSoon_Blocks\Plugin;

$icon = Plugin::is_active() ? 'dashicons-lock' : 'dashicons-unlock';
$cdnURL = 'https://cdn.pixelthrone.com/';

$configArray = [
	/**
	 * Plugin.
	 */
	'plugin'    => [
		'slug'      => 'coming-soon-blocks',
		'name'      => 'Coming Soon Blocks',
		'version'   => '1.3.1',
		'PluginURI' => 'https://pixelthrone.com/coming-soon-blocks',
		'wp_org_url' => 'https://wordpress.org/support/plugin/coming-soon-blocks',
		'wp_review_url' => 'https://wordpress.org/support/plugin/coming-soon-blocks/reviews/',
	],
	/**
	 * Meta keys.
	 */
	'meta_keys' => [
		'seo'              => 'comingsoonblocks_seo',
		'settings'         => 'comingsoonblocks_settings',
		'lookandfeel'      => 'comingsoonblocks_lookandfeel',
		'selected_page_id' => 'comingsoonblocks_selected_page_id',
	],
	/**
	 * Cdn.
	 */
	'cdn'    => [
		'media' => $cdnURL.'media/coming-soon-blocks/',
		'notices' => $cdnURL.'notices/coming-soon-blocks/',
	],
	/**
	 * 3rd-Party plugins.
	 */
	'3party'    => [
		'gutenberg' => [
			'slug' => 'gutenberg',
			'name' => 'gutenberg',
			'base' => 'gutenberg/gutenberg.php',
		]
	],
	/**
	 * Admin Menu.
	 */
	'admin_button' => [
		'page_title' => esc_html__( 'Coming Soon', 'coming-soon-blocks' ),
		'menu_title' => esc_html__( 'Coming Soon', 'coming-soon-blocks' ),
		'capability' => 'manage_options',
		'menu_slug' => '',
		'function' => '',
		'icon_url' => $icon,
		'position' => 22,
	],
	/**
	 * Post Type.
	 */
	'post_type' => [
		'menu_icon'           => $icon,
		'label'               => esc_html__( 'Coming Soon', 'coming-soon-blocks' ),
		'labels'              => [
			'name'               => esc_html__( 'Coming Soon', 'coming-soon-blocks' ),
			'singular_name'      => esc_html__( 'Page', 'coming-soon-blocks' ),
			'menu_name'          => esc_html__( 'Coming Soon', 'coming-soon-blocks' ),
			'parent_item_colon'  => esc_html__( 'Page', 'coming-soon-blocks' ),
			'all_items'          => esc_html__( 'All Pages', 'coming-soon-blocks' ),
			'view_item'          => esc_html__( 'View Pages', 'coming-soon-blocks' ),
			'add_new_item'       => esc_html__( 'Add new', 'coming-soon-blocks' ),
			'add_new'            => esc_html__( 'Add new', 'coming-soon-blocks' ),
			'edit_item'          => esc_html__( 'Edit Pages', 'coming-soon-blocks' ),
			'update_item'        => esc_html__( 'Update', 'coming-soon-blocks' ),
			'search_items'       => esc_html__( 'Search pages', 'coming-soon-blocks' ),
			'not_found'          => esc_html__( 'No pages found', 'coming-soon-blocks' ),
			'not_found_in_trash' => esc_html__( 'No pages found in Trash', 'coming-soon-blocks' ),
		],
		'supports'            => [ 'title', 'revisions', 'editor' ],
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => false,
		'can_export'          => true,
		'has_archive'         => true,
		'show_in_rest'        => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_menu' => 'coming-soon-blocks'
	],
	/**
	 * toolbar.
	 */
	'toolbar'   => [
		[
			'id'    => 'pt_comingsoonblocks_toolbar_group',
			'title' => '<i class="dashicons-before '.$icon.'"></i>',
			'href'  => get_admin_url( null, 'edit.php?post_type=coming-soon-blocks' ),
			'meta'  => [ 'class' => '' ],
			'parent' => 'top-secondary',
		],
		[
			'id'     => 'pt_comingsoonblocks_toolbar_add-new',
			'title'  => sprintf( esc_html__( '%s Add Coming soon', 'coming-soon-blocks' ), '<i class="dashicons-before dashicons-plus"></i>' ),
			'href'   => get_admin_url( null, 'post-new.php?post_type=coming-soon-blocks' ),
			'parent' => 'pt_comingsoonblocks_toolbar_group'
		],
		[
			'id'     => 'pt_comingsoonblocks_toolbar_settings',
			'title'  => sprintf( esc_html__( '%s Settings', 'coming-soon-blocks' ), '<i class="dashicons-before dashicons-admin-generic"></i>' ),
			'href'   => get_admin_url( null, 'edit.php?post_type=coming-soon-blocks' ),
			'parent' => 'pt_comingsoonblocks_toolbar_group'
		],
	]
];

if( ! csblocks_fs()->is_network_active() || csblocks_fs()->is_delegated_connection() ) {
	$configArray['toolbar'][] = [
		'id'     => 'pt_comingsoonblocks_toolbar_contact-us',
		'title'  => esc_html__( 'Contact Us', 'coming-soon-blocks' ),
		'href'   => csblocks_fs()->contact_url(),
		'parent' => 'pt_comingsoonblocks_toolbar_group',
	];
	$configArray['toolbar'][] = [
		'id'     => 'pt_comingsoonblocks_toolbar_support-forum',
		'title'  => esc_html__( 'Support Forum', 'coming-soon-blocks' ),
		'href'   => csblocks_fs()->get_support_forum_url(),
		'parent' => 'pt_comingsoonblocks_toolbar_group',
		'meta'  => [ 'target' => '_blank' ]
	];
	$configArray['toolbar'][] = [
		'id'     => 'pt_comingsoonblocks_toolbar_upgrade',
		'title'  => csblocks_fs()->is_free_plan() ? esc_html__( 'Upgrade', 'coming-soon-blocks' ) : esc_html__( 'Pricing', 'coming-soon-blocks' ),
		'href'   => csblocks_fs()->pricing_url(),
		'parent' => 'pt_comingsoonblocks_toolbar_group',
	];
}


return $configArray;
