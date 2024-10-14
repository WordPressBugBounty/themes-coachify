<?php
/**
 * Getting Started Page.
 *
 * @package Coachify
 */

require get_template_directory() . '/inc/getting-started/CoachifyDashboardPlugins.php';

require get_template_directory() . '/inc/getting-started/ajax-functions.php';

if( ! function_exists( 'coachify_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function coachify_getting_started_menu(){	
	add_theme_page(
		__( 'Coachify', 'coachify' ),
		__( 'Coachify', 'coachify' ),
		'manage_options',
		'coachify-getting-started',
		'coachify_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'coachify_getting_started_menu' );

if( ! function_exists( 'coachify_active_plugin_check' ) ) :
/**
 * Active Plugin Check
 *
 * @param string $plugin_base_name is plugin folder/filename.php.
 */
function coachify_active_plugin_check( $plugin_base_name ) {

	$active_plugins = (array) get_option( 'active_plugins', array() );

	if ( is_multisite() ) {
		$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
	}

	return in_array( $plugin_base_name, $active_plugins, true ) || array_key_exists( $plugin_base_name, $active_plugins );
}
endif;

if( ! function_exists( 'coachify_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function coachify_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_coachify-getting-started' != $hook ) return;

    $manager      = new CoachifyDashboardPlugins();
    $free_plugins = $manager->get_config();
	$installed_plugins 	= get_plugins();
    $data_action  = '';
    $button_label = esc_html__( 'Browse Coachify Starter Templates', 'coachify' );

    if ( ! defined( 'DEMO_IMPORTER_PLUS_VER' ) ) {
        if ( ! isset( $installed_plugins['demo-importer-plus/demo-importer-plus.php'] ) ) {
            $button_label = esc_html__( 'Install Coachify Starter Templates', 'coachify' );
            $data_action  = 'install';
        } elseif ( ! coachify_active_plugin_check( 'demo-importer-plus/demo-importer-plus.php' ) ) {
            $button_label = esc_html__( 'Activate Coachify Starter Templates', 'coachify' );
            $data_action  = 'activate';
        }
    }

	$localize = array(
        'ajaxUrl'              => admin_url( 'admin-ajax.php' ),
        'proActivated'         => coachify_pro_is_activated(),
        'ActivatingText'       => __( 'Activating', 'coachify' ),
        'DeactivatingText'     => __( 'Deactivating', 'coachify' ),
        'PluginActivateText'   => __( 'Activate', 'coachify' ),
        'PluginDeactivateText' => __( 'Deactivate', 'coachify' ),
        'SettingsText'         => __( 'Settings', 'coachify' ),
        'BrowseTemplates'      => __( 'Browse Starter Templates', 'coachify' ),
        'ThemeVersion'         => COACHIFY_THEME_VERSION,
        'ThemeName'            => COACHIFY_THEME_NAME,
        'pluginName'           => $free_plugins,
        'customizeURL'         => admin_url('/customize.php?autofocus'),
        'adminURL'             => admin_url(),
		'ajax_nonce' 	   	   => wp_create_nonce( 'chfy-ajax-verification' ),
        'status'           	   => $data_action,
		'starterLabel' 	       => $button_label,
		'starterURL' 	   	   => esc_url( admin_url( 'themes.php?page=demo-importer-plus' ) ),
		'starterTemplates' 	   => defined( 'DEMO_IMPORTER_PLUS_VER' ),
    );

    wp_enqueue_style(
        'coachify-dashboard',
        get_template_directory_uri() . '/dist/dashboard.css',
        [],
        COACHIFY_THEME_VERSION
    );

    $dependencies_file_path = get_template_directory() . '/dist/dashboard/dashboard.asset.php';
	if ( file_exists( $dependencies_file_path ) ) {
        $dashboard_assets = require $dependencies_file_path;
        $js_dependencies = ( ! empty( $dashboard_assets['dependencies'] ) ) ? $dashboard_assets['dependencies'] : [];
        $version         = ( ! empty( $dashboard_assets['version'] ) ) ? $dashboard_assets['version'] : COACHIFY_THEME_VERSION;
        wp_enqueue_script(
            'coachify-dashboard',
            get_template_directory_uri() . '/dist/dashboard/dashboard.js',
            $js_dependencies,
            $version,
            true
        );

        // Add Translation support for Dashboard 
        wp_set_script_translations( 'coachify-dashboard', 'coachify' );

        wp_localize_script( 'coachify-dashboard', 'coachify_dashboard', $localize);
    }

    $components_dependencies    = get_template_directory() . '/dist/options/options.asset.php';
	if ( file_exists( $components_dependencies ) ) {
        $components_assets = require $components_dependencies;
        $components_js_dependencies = ( ! empty( $components_assets['dependencies'] ) ) ? $components_assets['dependencies'] : [];
        $com_version                = ( ! empty( $components_assets['version'] ) ) ? $components_assets['version'] : COACHIFY_THEME_VERSION;
        wp_enqueue_script(
            'coachify-components',
            get_template_directory_uri() . '/dist/options/options.js',
            $components_js_dependencies,
            $com_version,
            true
        );
    }
}
endif;
add_action( 'admin_enqueue_scripts', 'coachify_getting_started_admin_scripts' );

if( ! function_exists( 'coachify_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function coachify_getting_started_page(){ ?>
	<div id="coachify-dashboard"></div>
	<?php
}
endif;