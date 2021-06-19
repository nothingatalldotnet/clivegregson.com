<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	//$my_theme = wp_get_theme();
	$config = array(
		'remote_api_url' => 'https://premiumcoding.com/', // Site where EDD is hosted
		'item_name' => 'Baltazar', // Name of theme
		'theme_slug' => 'baltazar', // Theme slug
		'version' => wp_get_theme()->get( 'Version' ), // The current version of this theme
		'author' => 'PremiumCoding', // The author of this theme
		'download_id' => '', // Optional, used for generating a license renewal link
		'renew_url' => '' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'baltazar' ),
		'enter-key' => __( 'Enter your theme license key.', 'baltazar' ),
		'license-key' => __( 'License Key', 'baltazar' ),
		'license-action' => __( 'License Action', 'baltazar' ),
		'deactivate-license' => __( 'Deactivate License', 'baltazar' ),
		'activate-license' => __( 'Activate License', 'baltazar' ),
		'status-unknown' => __( 'License status is unknown.', 'baltazar' ),
		'renew' => __( 'Renew?', 'baltazar' ),
		'unlimited' => __( 'unlimited', 'baltazar' ),
		'license-key-is-active' => __( 'License key is active.', 'baltazar' ),
		'expires%s' => __( 'Expires %s.', 'baltazar' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'baltazar' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'baltazar' ),
		'license-key-expired' => __( 'License key has expired. You will not receive updates and you can no longer use support. We recommend you to update the licence so your theme will be up to date in the future.', 'baltazar' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'baltazar' ),
		'license-is-inactive' => __( 'License is inactive.', 'baltazar' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'baltazar' ),
		'site-is-inactive' => __( 'Site is inactive.', 'baltazar' ),
		'license-status-unknown' => __( 'License status is unknown.', 'baltazar' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'baltazar' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'baltazar' )
	)

);