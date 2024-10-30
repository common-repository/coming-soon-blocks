<?php

/**
 * Main class to manage frontend view.
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */
namespace Pixelthrone\ComingSoon_Blocks\Frontend;

use  Pixelthrone\ComingSoon_Blocks\Utils ;
use  Pixelthrone\ComingSoon_Blocks\Plugin ;
use  WP_Error ;
// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Frontend Class
 *
 * @since 1.0.0
 */
class Init
{
    /**
     * Coming soon status.
     *
     * @var string $status
     */
    private  $status ;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        // Only run on frontend
        if ( is_admin() ) {
            return;
        }
        // Check if plugin is active
        if ( Plugin::is_active() ) {
            add_action( 'template_redirect', [ $this, 'template_redirect' ] );
        }
    }
    
    /**
     * Build page.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string.
     */
    public function template_redirect()
    {
        $pageSettings = Plugin::get_frontend_settings();
        // Check if page exist
        $post = get_post( $pageSettings->selected_page_id );
        /**
         * Verify if the page has the correct status.
         *
         * @since 1.0.0
         */
        if ( !$post || $post->post_status !== 'publish' ) {
            return false;
        }
        /**
         * Exit if a custom login page.
         *
         * @since 1.0.0
         */
        if ( preg_match( "/login|admin|dashboard|account/i", $_SERVER['REQUEST_URI'] ) > 0 ) {
            return false;
        }
        /**
         * Check if user is logged in and roles.
         *
         * @since 1.0.0
         */
        if ( $pageSettings->settings->loginBypass && is_user_logged_in() ) {
            if ( current_user_can( 'activate_plugins' ) ) {
                return false;
            }
        }
        /**
         * Redirect Mode.
         *
         * @since 1.0.0
         */
        if ( $pageSettings->settings->redirectMode ) {
            if ( !empty($pageSettings->settings->redirectUrl) ) {
                wp_redirect( $pageSettings->settings->redirectUrl, 301 );
            }
        }
        /**
         * Change the page header.
         *
         * @since 1.0.0
         */
        if ( $pageSettings->seo->serviceUnavailable ) {
            $this->set_maintenance_headers();
        }
        /**
         * Page plugins cache.
         *
         * @since 1.0.0
         */
        if ( $pageSettings->seo->noCache ) {
            $this->disable_caching();
        }
        include_once Plugin::get_plugin_dir() . '/frontend/template.php';
        exit;
    }
    
    /**
     * Add maintenance headers.
     *
     * @since 1.0.0
     * @access public
     *
     * @return void.
     */
    public function set_maintenance_headers()
    {
        header( 'HTTP/1.1 503 Service Temporarily Unavailable' );
        header( 'Status: 503 Service Temporarily Unavailable' );
        header( 'Retry-After: 86400' );
        // retry in a day
    }
    
    /**
     * Disable caching plugins.
     * - W3 Total Cache
     * - WP Super Cache
     * - ZenCache (Previously QuickCache)
     *
     * @since 1.0.0
     * @access public
     *
     * @return string.
     */
    public function disable_caching()
    {
        
        if ( apply_filters( 'pixelthrone/coming-soon-blocks/disable_caching', true ) ) {
            $define = function ( $name, $value ) {
                if ( !defined( $name ) ) {
                    define( $name, $value );
                }
            };
            $define( 'DONOTCACHEPAGE', true );
            $define( 'DONOTCDN', true );
            $define( 'DONOTCACHEDB', true );
            $define( 'DONOTMINIFY', true );
            $define( 'DONOTCACHEOBJECT', true );
            nocache_headers();
        }
    
    }
    
    /**
     * Add maintenance headers.
     *
     * @since 1.0.0
     * @access public
     *
     * @return void.
     */
    public function only_allow_logged_in_rest_access( $access )
    {
        if ( !is_user_logged_in() ) {
            return new WP_Error( 'rest_cannot_access', __( 'Only authenticated users can access the REST API.', 'coming-soon-blocks' ), [
                'status' => rest_authorization_required_code(),
            ] );
        }
        return $access;
    }

}
if ( Plugin::has_gutenberg() && !is_admin() ) {
    new Init();
}