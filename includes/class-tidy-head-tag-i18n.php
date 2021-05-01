<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since   1.2.0
 * @package Tidy_Head_Tag
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since 1.2.0
 */
// @codingStandardsIgnoreStart
class Tidy_Head_Tag_i18n {
// @codingStandardsIgnoreEnd

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since 1.2.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tidy-head-tag',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}
