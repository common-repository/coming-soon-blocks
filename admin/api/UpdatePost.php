<?php
/**
 * Unlock Coming Soon Page
 *
 * @package coming-soon-blocks
 * @version 1.3.1
 * @author  Helder Vilela from Pixelthrone
 * @license GPL-3.0
 */

namespace Pixelthrone\ComingSoon_Blocks\Api;

use Pixelthrone\ComingSoon_Blocks\Utils;
use Pixelthrone\ComingSoon_Blocks\Plugin;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;
use WP_Error;

class UpdatePost {

	/**
	 * Endpoint namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'v1/coming-soon-blocks';

	/**
	 * Route base.
	 *
	 * @var string
	 */
	protected $rest_endpoint = 'update-post';

	public
	function __construct() {

		add_action( 'rest_api_init', function () {

			/**
			 * Update Post
			 *
			 * @since    1.0.0
			 * @access   public
			 * @endpoint /wp-json/v1/coming-soon-blocks/update-post/:id (POST)
			 *
			 * @return object
			 */
			register_rest_route( $this->namespace, '/' . $this->rest_endpoint . '/(?P<id>\d+)', [
				'methods'  => WP_REST_Server::CREATABLE,
				'callback' => [ $this, 'callback' ],
			] );

		} );

	}

	/**
	 * Get cart.
	 *
	 * @access public
	 * @since  1.0.0
	 *
	 * @param  array $data
	 *
	 * @return WP_REST_Response
	 */
	public
	function callback( WP_REST_Request $request ) {

		if ( ! current_user_can( 'manage_options' ) ) {
			return new WP_Error( 'manage-options', esc_html__( 'User has no permissions to edit the page.', 'coming-soon-blocks' ), [ 'status' => 403 ] );
		}

		$id               = $request->get_param( 'id' );
		$selected_page_id = Plugin::get_option( 'selected_page_id' );

		$id = ( $id === (int) $selected_page_id ) ? null : $id;
		Plugin::update_option( 'selected_page_id', null, $id );

		$response = [
			'code'              => 'updated',
			'$id' => $id,
			'$selected_page_id' => $selected_page_id,
			'data'              => [
				'status' => 200,
			],
			'message'           => esc_html__( 'Page updated.', 'coming-soon-blocks' )
		];

		return new WP_REST_Response( $response, 200 );

	}

}

new UpdatePost();


