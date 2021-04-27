<?php
/**
 * Fired during plugin deactivation.
 *
 * @package Tidy_Head_Tag
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 */
class Tidy_Head_Tag_Deactivater {

	/**
	 * Constructor.
	 */
	public function __construct() {}

	/**
	 * Function for the plugin deactivated.
	 */
	public static function deactivate() {
		foreach ( Tidy_Head_Tag_Data::DB_NAME as $db_name_key => $db_name_value ) {
			if ( isset( $db_name_value ) ) {
				delete_option( $db_name_value );
			}
		}
	}
}
