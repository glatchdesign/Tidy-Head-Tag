<?php
/**
 * The file that defines add of admin menu, admin menu creation and function.
 *
 * @package Tidy_Head_Tag
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Menu class.
 */
class Tidy_Head_Tag_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( 'Tidy_Head_Tag_Admin', 'add_options_page' ) );
	}

	/**
	 * Add options page.
	 */
	public function add_options_page() {
		add_submenu_page(
			'options-general.php',
			'Tidy Head Tag',
			__( 'Tidy Head Tag', 'tidy-head-tag' ),
			'administrator',
			'tidy-head-tag',
			array( 'Tidy_Head_Tag_Admin', 'options_page' )
		);
	}

	/**
	 * Create options page contents.
	 */
	public function options_page() {

		if ( ! empty( $_POST && check_admin_referer( Tidy_Head_Tag_Data::NONCE_ACTION, Tidy_Head_Tag_Data::NONCE_NAME ) ) ) {
			self::update_options();
			?>
			<div class="updated fade"><p><strong><?php esc_html_e( 'Options saved.', 'tidy-head-tag' ); ?></strong></p></div>
			<?php
		}
		?>
		<div class="wrap">
			<h2><?php esc_html_e( 'Tidy Head Tag Options', 'tidy-head-tag' ); ?></h2>
			<form action="" method="post">
				<ul>
					<li><label><input type="checkbox" name="tht_generator" id="tht_generator" value="1" <?php checked( get_option( 'tht_generator' ), 1 ); ?> /><?php esc_html_e( 'Remove meta generator tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_edituri" id="tht_edituri" value="1" <?php checked( get_option( 'tht_edituri' ), 1 ); ?> /><?php esc_html_e( 'Remove link EditURI tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_wlwmanifest" id="tht_wlwmanifest" value="1" <?php checked( get_option( 'tht_wlwmanifest' ), 1 ); ?> /><?php esc_html_e( 'Remove link wlwmanifest tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_shortlink" id="tht_shortlink" value="1" <?php checked( get_option( 'tht_shortlink' ), 1 ); ?> /><?php esc_html_e( 'Remove link shortlink tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_emoji" id="tht_emoji" value="1" <?php checked( get_option( 'tht_emoji' ), 1 ); ?> /><?php esc_html_e( 'Remove Emoji scripts and styles', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_feed_links" id="tht_feed_links" value="1" <?php checked( get_option( 'tht_feed_links' ), 1 ); ?> /><?php esc_html_e( 'Remove link RSS feed tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_feed_links_extra" id="tht_feed_links_extra" value="1" <?php checked( get_option( 'tht_feed_links_extra' ), 1 ); ?> /><?php esc_html_e( 'Remove link comment feed tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_restapi" id="tht_restapi" value="1" <?php checked( get_option( 'tht_restapi' ), 1 ); ?> /><?php esc_html_e( 'Remove link REST API tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_oembed" id="tht_oembed" value="1" <?php checked( get_option( 'tht_oembed' ), 1 ); ?> /><?php esc_html_e( 'Remove link oEmbed tag', 'tidy-head-tag' ); ?></label></li>
					<li><label><input type="checkbox" name="tht_rel_link" id="tht_rel_link" value="1" <?php checked( get_option( 'tht_rel_link' ), 1 ); ?> /><?php esc_html_e( 'Remove link rel=prev/next tag', 'tidy-head-tag' ); ?></label></li>
				</ul>
				<p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
				<?php wp_nonce_field( Tidy_Head_Tag_Data::NONCE_ACTION, Tidy_Head_Tag_Data::NONCE_NAME ); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * Define options page functions.
	 */
	public function update_options() {
		foreach ( Tidy_Head_Tag_Data::DB_NAME as $db_name_key => $db_name_value ) {
			if (
				isset( $_POST[ $db_name_value ] )
				&& isset( $_POST[ Tidy_Head_Tag_Data::NONCE_NAME ] )
				&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ Tidy_Head_Tag_Data::NONCE_NAME ] ) ), Tidy_Head_Tag_Data::NONCE_ACTION )
			) {
				$value = stripslashes(
					sanitize_text_field( wp_unslash( $_POST[ $db_name_value ] ) )
				);
				update_option( $db_name_value, $value );
			} else {
				update_option( $db_name_value, 0 );
			}
		}
	}
}
