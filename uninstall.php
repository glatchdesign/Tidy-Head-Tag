<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package Tidy_Head_Tag
 */

/**
 * If uninstall.php is not called by WordPress, die
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

foreach ( Tidy_Head_Tag_Data::DB_NAME as $db_name_key => $db_name_value ) {
	if ( isset( $db_name_value ) ) {
		delete_option( $db_name_value );
	}
}
