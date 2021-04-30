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
			<p><?php esc_html_e( 'Check the tags you want to remove.', 'tidy-head-tag' ); ?></p>
			<form action="" method="post">
				<table class="form-table">
					<tr>
						<td>
							<label><input type="checkbox" name="tht_generator" id="tht_generator" value="1" <?php checked( get_option( 'tht_generator' ), 1 ); ?> /><b><?php esc_html_e( 'meta generator tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the version of WordPress you are using.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_edituri" id="tht_edituri" value="1" <?php checked( get_option( 'tht_edituri' ), 1 ); ?> /><b><?php esc_html_e( 'link EditURI tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the link to the Really Simple Discovery (RSD) service endpoint.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_wlwmanifest" id="tht_wlwmanifest" value="1" <?php checked( get_option( 'tht_wlwmanifest' ), 1 ); ?> /><b><?php esc_html_e( 'link wlwmanifest tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the tags required when posting to WordPress using Windows Live Writer.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_shortlink" id="tht_shortlink" value="1" <?php checked( get_option( 'tht_shortlink' ), 1 ); ?> /><b><?php esc_html_e( 'link shortlink tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display short link for each WordPress page.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_emoji" id="tht_emoji" value="1" <?php checked( get_option( 'tht_emoji' ), 1 ); ?> /><b><?php esc_html_e( 'Emoji scripts and styles', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display CSS and JavaScript required when using emoji.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_feed_links" id="tht_feed_links" value="1" <?php checked( get_option( 'tht_feed_links' ), 1 ); ?> /><b><?php esc_html_e( 'link RSS feed tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the URL of the RSS feed.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_feed_links_extra" id="tht_feed_links_extra" value="1" <?php checked( get_option( 'tht_feed_links_extra' ), 1 ); ?> /><b><?php esc_html_e( 'link comment feed tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the links to the extra feeds such as category feeds.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_restapi" id="tht_restapi" value="1" <?php checked( get_option( 'tht_restapi' ), 1 ); ?> /><b><?php esc_html_e( 'link REST API tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the tags required when using the REST API.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_oembed" id="tht_oembed" value="1" <?php checked( get_option( 'tht_oembed' ), 1 ); ?> /><b><?php esc_html_e( 'link oEmbed tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the tags required when you want to embed external content such as YouTube or Twitter.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label><input type="checkbox" name="tht_rel_link" id="tht_rel_link" value="1" <?php checked( get_option( 'tht_rel_link' ), 1 ); ?> /><b><?php esc_html_e( 'link rel=prev/next tag', 'tidy-head-tag' ); ?></b></label>
							<p><?php esc_html_e( 'Display the post relational links to Previous and Next.', 'tidy-head-tag' ); ?></p>
						</td>
					</tr>
				</table>
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
