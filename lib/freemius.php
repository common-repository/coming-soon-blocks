<?php

/**
 * Helper function for easy freemius access.
 *
 * @package   Coming Soon Blocks
 * @author    Helder Vilela from Pixelthrone
 * @link      htts://pixelthrone.com
 * @license   GPL-3.0
 */

if ( !function_exists( 'csblocks_fs' ) ) {
    // Create a helper function for easy SDK access.
    function csblocks_fs()
    {
        global  $csblocks_fs ;
        
        if ( !isset( $csblocks_fs ) ) {
            // Activate multisite network integration.
            if ( !defined( 'WP_FS__PRODUCT_2893_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_2893_MULTISITE', true );
            }
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $csblocks_fs = fs_dynamic_init( array(
                'id'             => '2893',
                'slug'           => 'coming-soon-blocks',
                'type'           => 'plugin',
                'public_key'     => 'pk_b43d7d97999bfe621ba14d6a8647c',
                'is_premium'     => false,
                'premium_suffix' => '(PRO)',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => array(
                'days'               => 7,
                'is_require_payment' => true,
            ),
                'menu'           => array(
                'slug'       => 'coming-soon-blocks',
                'first-path' => 'admin.php?page=coming-soon-blocks',
            ),
                'is_live'        => true,
            ) );
        }
        
        return $csblocks_fs;
    }
    
    // Init Freemius.
    csblocks_fs();
    // Signal that SDK was initiated.
    do_action( 'csblocks_fs_loaded' );
    // Core overrides.
    csblocks_fs()->override_i18n( array(
        'symbol_arrow-left'  => '',
        'symbol_arrow-right' => '',
    ) );
}
