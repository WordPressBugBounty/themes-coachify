<?php
/**
 * AJAX Functions.
 *
 * @package Coachify
 */
defined( 'ABSPATH' ) || exit;

class CoachifyAjaxFunctions {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialization.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init() {
		// Initialize hooks.
		$this->init_hooks();

		// Allow 3rd party to remove hooks.
		do_action( 'coachify_ajaxfunctions_unhook', $this );
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_hooks() {
		
		// AJAX for theme changelog query
		add_action( 'wp_ajax_coachify_get_latest_changelog', array( $this, 'get_latest_changelog' ) );

		// AJAX for Plugin Status
		add_action( 'wp_ajax_chfy_get_plugins_status', array( $this, 'get_plugins_status' ) );

		// AJAX for Plugin Download
		add_action( 'wp_ajax_chfy_get_plugin_download', array( $this, 'get_plugin_download' ) );

		// AJAX for Plugin Activate
		add_action( 'wp_ajax_chfy_get_plugin_activate', array( $this, 'get_plugin_activate' ) );

		// AJAX for Plugin Deactivate
		add_action( 'wp_ajax_chfy_get_plugin_deactivate', array( $this, 'get_plugin_deactivate' ) );

		// AJAX for Plugin Delete
		add_action( 'wp_ajax_chfy_get_plugin_delete', array( $this, 'get_plugin_delete' ) );

		//Starter Site Ajax Call
		add_action( 'wp_ajax_chfy_get_install_starter', array( $this, 'get_install_starter' ) );
	}

	/**
	 * Get Latest Changelog
	 *
	 * @return void
	 */
	public function get_latest_changelog() {
		$theme_changelog = null;
		$access_type = get_filesystem_method();

		if ($access_type === 'direct') {
			$creds = request_filesystem_credentials(
				site_url() . '/wp-admin/',
				'', false, false,
				[]
			);

			if (WP_Filesystem($creds)) {
				global $wp_filesystem;

				$theme_changelog = $wp_filesystem->get_contents(
					get_template_directory() . '/changelog.txt'
				);
			}
		}

		wp_send_json_success([
			'changelog' => apply_filters(
				'coachify_changelogs_list',
				[
					[
						'title'     => __('Theme', 'coachify'),
						'changelog' => $theme_changelog,
					]
				]
			)
		]);
	}

	/**
	 * Get Plugin Status
	 *
	 * @return void
	 */
	public function get_plugins_status() {
		if ( ! check_ajax_referer( 'chfy-ajax-verification', 'security', false ) ) {
			wp_send_json_error( __( 'Security Error, Please reload the page.', 'coachify' ) );
		}

		$this->check_capability( 'edit_plugins' );
		$result = [];
		// Is not installed.
		$status = 'uninstalled';

		$manager = new CoachifyDashboardPlugins();
		$plugin_manager_config = $manager->get_config();
		$plugins = $plugin_manager_config;

		foreach ( array_keys( $plugins ) as $plugin ) {
			$installed_path = $manager->is_plugin_installed( $plugin );

			if (! $installed_path) {
				$status = 'uninstalled'; // Plugin is not installed.
			} else {
				if ( is_plugin_active( $installed_path ) ) {
					$status = 'activated'; // Plugin is active.
				} else {
					$status = 'deactivated'; // Plugin is installed but inactive.
				}
			}

			$result[] = array(
				'name' => $plugin,
				'status' => $status,
			);
		}

		wp_send_json_success( $result );
	}

	/**
	 * Get Plugin Download
	 *
	 * @return void
	 */
	public function get_plugin_download() {
		if ( ! check_ajax_referer( 'chfy-ajax-verification', 'security', false ) ) {
			wp_send_json_error( __( 'Security Error, Please reload the page.', 'coachify' ) );
		}

		$this->check_capability( 'install_plugins' );
		$plugin = $this->get_plugin_from_request();
		
		$manager = new CoachifyDashboardPlugins();

		$install = $manager->prepare_install( $plugin );

		if ( $install ) {
			wp_send_json_success();
		}

		wp_send_json_error();
	}

	/**
	 * Get Plugin Activate
	 *
	 * @return void
	 */
	public function get_plugin_activate() {
		if ( ! check_ajax_referer( 'chfy-ajax-verification', 'security', false ) ) {
			wp_send_json_error( __( 'Security Error, Please reload the page.', 'coachify' ) );
		}

		$this->check_capability( 'edit_plugins' );
		$plugin = $this->get_plugin_from_request();

		$manager = new CoachifyDashboardPlugins();
		$result = $manager->plugin_activation( $plugin );

		if ( is_wp_error( $result ) ) {
			wp_send_json_error( $result );
		}

		wp_send_json_success();
	}

	/**
	 * Get Plugin Deactivate
	 *
	 * @return void
	 */
	public function get_plugin_deactivate() {
		if ( ! check_ajax_referer( 'chfy-ajax-verification', 'security', false ) ) {
			wp_send_json_error( __( 'Security Error, Please reload the page.', 'coachify' ) );
		}

		$this->check_capability( 'edit_plugins' );
		$plugin = $this->get_plugin_from_request();

		$manager = new CoachifyDashboardPlugins();
		$result = $manager->plugin_deactivation( $plugin );

		if ( is_wp_error( $result ) ) {
			wp_send_json_error( $result );
		}

		wp_send_json_success();
	}

	/**
	 * Get Plugin Delete
	 *
	 * @return void
	 */
	public function get_plugin_delete() {
		if ( ! check_ajax_referer( 'chfy-ajax-verification', 'security', false ) ) {
			wp_send_json_error( __( 'Security Error, Please reload the page.', 'coachify' ) );
		}

		$this->check_capability( 'delete_plugins' );
		$plugin = $this->get_plugin_from_request();

		$manager = new CoachifyDashboardPlugins();
		$result = $manager->uninstall_plugin( $plugin );

		if ( is_wp_error( $result ) ) {
			wp_send_json_error( $result );
		}

		wp_send_json_success();
	}

	/**
	 * AJAX callback to install a plugin.
	 */
	function get_install_starter() {
		if ( ! check_ajax_referer( 'chfy-ajax-verification', 'security', false ) ) {
			wp_send_json_error( __( 'Security Error, Please reload the page.', 'coachify' ) );
		}
		if ( ! current_user_can( 'install_plugins' ) ) {
			wp_send_json_error( __( 'Security Error, Need higher Permissions to install plugin.', 'coachify' ) );
		}
		// Get selected file index or set it to 0.
		$status = empty( $_POST['status'] ) ? 'install' : sanitize_text_field( $_POST['status'] );
		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}
		if ( ! class_exists( 'WP_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}
		$install = true;
		if ( 'install' === $status ) {
			$api = plugins_api(
				'plugin_information',
				array(
					'slug' => 'demo-importer-plus',
					'fields' => array(
						'short_description' => false,
						'sections' => false,
						'requires' => false,
						'rating' => false,
						'ratings' => false,
						'downloaded' => false,
						'last_updated' => false,
						'added' => false,
						'tags' => false,
						'compatibility' => false,
						'homepage' => false,
						'donate_link' => false,
					),
				)
			);
			if ( ! is_wp_error( $api ) ) {

				// Use AJAX upgrader skin instead of plugin installer skin.
				// ref: function wp_ajax_install_plugin().
				$upgrader = new \Plugin_Upgrader( new \WP_Ajax_Upgrader_Skin() );

				$installed = $upgrader->install( $api->download_link );
				if ( $installed ) {
					$activate = activate_plugin( 'demo-importer-plus/demo-importer-plus.php', '', false, true );
					if ( is_wp_error( $activate ) ) {
						$install = false;
					}
				} else {
					$install = false;
				}
			} else {
				$install = false;
			}
		} elseif ( 'activate' === $status ) {
			$activate = activate_plugin( 'demo-importer-plus/demo-importer-plus.php', '', false, true );
			if ( is_wp_error( $activate ) ) {
				$install = false;
			}
		}

		if ( false === $install ) {
			wp_send_json_error( __( 'Error, plugin could not be installed, please install manually.', 'coachify' ) );
		} else {
			wp_send_json_success();
		}
	}

	/**
	 * Get Plugin Capability
	 *
	 * @return void
	 */
	public function check_capability( $cap = 'install_plugins' ) {
		$manager = new CoachifyDashboardPlugins();
		if ( ! $manager->can( $cap ) ) {
			wp_send_json_error();
		}

		return true;
	}

	/**
	 * Get Plugin Request
	 *
	 * @return void
	 */
	public function get_plugin_from_request() {
		if ( ! isset( $_POST['plugin'] ) ) {
			wp_send_json_error();
		}

		return sanitize_text_field(wp_unslash($_POST['plugin']));
	}

}

new CoachifyAjaxFunctions();
