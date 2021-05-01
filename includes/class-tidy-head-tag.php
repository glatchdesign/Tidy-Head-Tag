<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since   1.0.0
 * @package Tidy_Head_Tag
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The core plugin class.
 *
 * @since 1.0.0
 */
class Tidy_Head_Tag {
	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->load_dependencies();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since    1.0.0
	 */
	private function load_dependencies() {
		/**
		 * Include files.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-tidy-head-tag-data.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-tidy-head-tag-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-tidy-head-tag-front.php';

		new Tidy_Head_Tag_Admin();
		new Tidy_Head_Tag_Front();
	}
}
