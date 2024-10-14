<?php
/**
 * CoachifyDashboardPlugins class
 *
 * @package Coachify
 */

defined( 'ABSPATH' ) || exit;

class CoachifyDashboardPlugins {

    /**
     * Default Config variable
     *
     * @var array
     */
	protected $config = [];

	public function __construct() {
		$this->load_config();
	}

	public function get_config() {
		return $this->config;
	}

	protected function load_config() {
		$this->config = [
			'elementor' => [
				'type' => 'web',
				'title' => __('Elementor', 'coachify'),
				'description' => __( 'Elementor is one of the most advanced frontend drag & drop page builders to help you create pixel-perfect websites in less time.', 'coachify' ),
			],

			'woocommerce' => [
				'type' => 'web',
				'title' => __('WooCommerce', 'coachify'),
				'description' => __( 'WooCommerce is the world\'s most popular eCommerce plugin that helps you to create an online store easily.', 'coachify' ),
			],

			'mega-elements-addons-for-elementor' => [
				'type' => 'web',
				'title' => __('Mega Elements - Addons for Elementor', 'coachify'),
				'description' => __( 'Addons for Elementor: Mega Elements is a powerful and advanced Elementor add-ons plugin that offers several Elementor widgets to build a beautiful website.', 'coachify' ),
			],

			'seo-by-rank-math' => [
				'type' => 'web',
				'title' => __('Rank Math SEO', 'coachify'),
				'description' => __( 'Rank Math SEO is one of the most popular and powerful SEO plugins with tons of features to make your site SEO optimized and rank higher on search engines.', 'coachify' ),
			]
		];
	}

	public function get_plugins() {
		
		if (isset($this->config)) {
			return $this->config;
		}

		return [];
	}

    public function get_plugins_api($slug) {
		static $api = []; // Cache received responses.

		if (! isset($api[$slug])) {
			if ( ! function_exists( 'plugins_api' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			}

			require_once get_template_directory() . '/inc/getting-started/Coachify_WP_Upgrader_Skin.php';

			$response = plugins_api(
				'plugin_information',
				[
					'slug' => $slug,
					'fields' => [
						'sections' => false,
					],
				]
			);

			$api[$slug] = false;

			if (is_wp_error($response)) {
				wp_die(esc_html($this->strings['oops']));
			} else {
				$api[$slug] = $response;
			}
		}

		return $api[$slug];
	}

    /**
     * Wrapper around the core WP get_plugins function,
     * making sure it's actually available.
     *
     * @param string $plugin_folder
     * @link https://github.com/WordPress/WordPress/blob/ba92ed7615dec870a363bc99d6668faedfa77415/wp-admin/includes/plugin.php#L2254
     * @return void
     */
	public function get_installed_plugins($plugin_folder = '') {
		wp_cache_delete('plugins', 'plugins');

		if (! function_exists('get_plugins')) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		return get_plugins($plugin_folder);
	}

     /**
     * Checks whether the plugins are installed or not
     *
     * @param [type] $slug
     * @return boolean
     */
    public function is_plugin_installed( $slug ) {
		$installed_plugins = $this->get_installed_plugins();
		foreach ($installed_plugins as $plugin => $data) {
			$parts = explode('/', $plugin);
			$plugin_first_part = $parts[0];

			if (strtolower($slug) === strtolower($plugin_first_part)) {
				return $plugin;
			}
		}

		return false;
	}

    /**
     * Checks the capability of plugins
     *
     * @param string $capability
     * @return boolean
     */
    public function can($capability = 'install_plugins') {
		if (is_multisite()) {
			// Only network admin can change files that affects the entire network.
			$can = current_user_can_for_blog(get_current_blog_id(), $capability);
		} else {
			$can = current_user_can($capability);
		}

		if ($can) {
			// Also you can use this method to get the capability.
			$can = $capability;
		}

		return $can;
	}

     /**
     * Requires the headers
     *
     * @return void
     */
    protected function require_wp_headers() {
		
		require_once ABSPATH . 'wp-admin/includes/file.php';

		if (! class_exists('Plugin_Upgrader', false)) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}

		if (! class_exists('Coachify_WP_Upgrader_Skin', false)) {
			require_once get_template_directory() . '/inc/getting-started/Coachify_WP_Upgrader_Skin.php';
		}
	}

    /**
     * Prepares the install for query
     *
     * @param [type] $plugin
     * @return void
     */
    public function prepare_install($plugin) {
		if (! $this->can()) {
			return false;
		}

		$avaible_plugins = $this->get_plugins();

		if (! array_key_exists($plugin, $avaible_plugins)) {
			return $this->download_and_install($plugin);
		}

		$plugin_info = $avaible_plugins[ $plugin ];

		if ( 'web' === $plugin_info['type'] ) {
			return $this->download_and_install( $plugin );
		}
	}
    
    public function has_direct_access( $context = null ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		WP_Filesystem();

		/**
         * Global variable $wp_filesystem
         */
		global $wp_filesystem;

		if ( $wp_filesystem ) {
			if ( is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->get_error_code() ) {
				return false;
			} else {
				return $wp_filesystem->method === 'direct';
			}
		}

		if ( get_filesystem_method( [], $context ) === 'direct' ) {
			ob_start();

			{
				$creds = request_filesystem_credentials( admin_url(), '', false, $context, null );
			}

			ob_end_clean();

			if ( WP_Filesystem( $creds ) ) {
				return true;
			}
		}

		return false;
	}

    public function is_plugin_active( $plugin ) {
		if ( ! function_exists( 'activate_plugin' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		return is_plugin_active( $plugin );
	}

    public function plugin_activation( $plugin ) {
		$full_name = $this->is_plugin_installed( $plugin );

		if ( $full_name ) {
			if ( ! $this->is_plugin_active( $full_name ) ) {
				return activate_plugin( $full_name, '', false, true );
			}
		}

		return new WP_Error();
	}

    public function plugin_deactivation( $plugin ) {
		$full_name = $this->is_plugin_installed( $plugin );

		if ( $full_name ) {
			if ( is_plugin_active( $full_name ) ) {
				return deactivate_plugins( $full_name );
			}
		}

		return new WP_Error();
	}

    public function uninstall_plugin( $plugin ) {
		$this->init_filesystem();
		$full_name = $this->is_plugin_installed( $plugin );

		if ( $full_name ) {
			if ( ! is_plugin_active( $full_name ) ) {
				return delete_plugins( [ $full_name ] );
			}
		}

		return new WP_Error();
	}

    /**
     * Download and installs the plugin function
     *
     * @param [type] $slug
     * @return void
     */
    public function download_and_install( $slug ) {

		$this->require_wp_headers();

		if ($this->is_plugin_installed($slug)) {
			return true;
		}

		$api = $this->get_plugins_api($slug);

		if (! isset($api->download_link)) {
			return true;
		}

		// Prep variables for Plugin_Installer_Skin class.
		$source = $api->download_link;

		if (! $source) {
			return false;
		}
		
		$skin = new Coachify_WP_Upgrader_Skin();

		// Create a new instance of Plugin_Upgrader.
		$upgrader = new Plugin_Upgrader($skin);

		$upgrader->install($source);
	}

    

    /**
     * Init Filesystem
     *
     * @return void
     */
	public function init_filesystem() {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		WP_Filesystem();
	}


}