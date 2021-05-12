<?php
/**
 * Plugin Name: Tidy Head Tag
 * Plugin URI: https://github.com/glatchdesign/Tidy-Head-Tag
 * Description: Organize the head tags that WordPress automatically outputs.
 * Author: Glatch
 * Version: 1.3.0
 * Author URI: https://glatchdesign.com
 * License: GPL2 or later
 * Text Dmain: tidy-head-tag
 * Domain Path: /languages
 *
 * @package Tidy_Head_Tag
 */

/**
 * Tidy Head Tag is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tidy Head Tag. If not, see http://www.gnu.org/licenses/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TIDY_HEAD_TAG_VERSION', '1.3.0' );

/**
 *  Include core plugin class file.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-tidy-head-tag.php';

/**
 * Begins execution of the plugin.
 *
 * @since 1.0.0
 */
function run_tidy_head_tag() {
	new Tidy_Head_Tag();
}
run_tidy_head_tag();
