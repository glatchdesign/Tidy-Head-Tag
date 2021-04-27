<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @package    Tidy_Head_Tag
 * @subpackage Tidy_Head_Tag/includes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The core plugin class.
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
	 * @access   private
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