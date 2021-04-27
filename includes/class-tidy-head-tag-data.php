<?php
/**
 * The file that defines database name.
 *
 * @package Tidy_Head_Tag
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Data class.
 */
class Tidy_Head_Tag_Data {
	/**
	 * Nonce.
	 */
	const NONCE_ACTION = 'tht_nonce_action';
	const NONCE_NAME   = 'tht_nonce_name';

	/**
	 * The name of the DB to use.
	 */
	const DB_NAME = array(
		'generator'        => 'tht_generator',
		'edituri'          => 'tht_edituri',
		'wlwmanifest'      => 'tht_wlwmanifest',
		'emoji'            => 'tht_emoji',
		'shortlink'        => 'tht_shortlink',
		'feed_links'       => 'tht_feed_links',
		'restapi'          => 'tht_restapi',
		'feed_links_extra' => 'tht_feed_links_extra',
		'oembed'           => 'tht_oembed',
		'rel_link'         => 'tht_rel_link',
	);

	/**
	 * Constructor.
	 */
	public function __construct() {}
}
