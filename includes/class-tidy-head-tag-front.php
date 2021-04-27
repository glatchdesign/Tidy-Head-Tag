<?php
/**
 * Define front-end output in a file.
 *
 * @package Tidy_Head_Tag
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Front-end class.
 */
class Tidy_Head_Tag_Front {
	/**
	 * Constructor.
	 */
	public function __construct() {
		self::update_output_head_tag();
	}

	/**
	 * Update the output head tag.
	 */
	public function update_output_head_tag() {
		if ( '1' === get_option( 'tht_generator' ) ) {
			remove_action( 'wp_head', 'wp_generator' );
		}

		if ( '1' === get_option( 'tht_edituri' ) ) {
			remove_action( 'wp_head', 'rsd_link' );
		}

		if ( '1' === get_option( 'tht_wlwmanifest' ) ) {
			remove_action( 'wp_head', 'wlwmanifest_link' );
		}

		if ( '1' === get_option( 'tht_shortlink' ) ) {
			remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		}

		if ( '1' === get_option( 'tht_emoji' ) ) {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		}

		if ( '1' === get_option( 'tht_feed_links' ) ) {
			remove_action( 'wp_head', 'feed_links', 2 );
		}

		if ( '1' === get_option( 'tht_feed_links_extra' ) ) {
			remove_action( 'wp_head', 'feed_links_extra', 3 );
		}

		if ( '1' === get_option( 'tht_restapi' ) ) {
			remove_action( 'wp_head', 'rest_output_link_wp_head' );
		}

		if ( '1' === get_option( 'tht_oembed' ) ) {
			remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		}

		if ( '1' === get_option( 'tht_rel_link' ) ) {
			remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
		}
	}
}
