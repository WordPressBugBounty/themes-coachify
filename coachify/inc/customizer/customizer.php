<?php
/**
 * Coachify Theme Customizer
 *
 * @package Coachify
 */

/**
 * Requiring customizer panels & sections
*/
$coachify_sections     = array(  'info', 'layout', 'site', 'appearance', 'title', 'colors', 'social-network', 'seo', 'instagram', 'blogpage', 'singlepage','archive', 'singlepost' );
$coachify_panels       = array( 'general', 'header', 'footer' );
$coachify_sub_sections = array(
    'general' => array( 'container', 'sidebar', 'scroll-to-top', 'button', 'error' ),
	'header'  => array( 'general-header', 'header-contact', 'social-media', 'header-button' ),
	'footer'  => array( 'footer', 'footer-widgets' ),
);
foreach( $coachify_panels as $p ){
    require get_template_directory() . '/inc/customizer/' . $p . '.php';
}

foreach( $coachify_sub_sections as $key => $sections ){
    foreach( $sections as $section ){        
        require get_template_directory() . '/inc/customizer/panels/' . $key . '/' . $section . '.php';
    }
}

foreach( $coachify_sections as $section ){
    require get_template_directory() . '/inc/customizer/sections/' . $section . '.php';
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
*/
require get_template_directory() . '/inc/customizer/active-callback.php';

if( ! function_exists( 'coachify_customize_preview_js' ) ) :
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function coachify_customize_preview_js() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build    = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'coachify-customizer', get_template_directory_uri() . '/inc/js' . $build . '/customizer' . $suffix .'.js', array( 'customize-preview' ), COACHIFY_THEME_VERSION, true );

	wp_localize_script(
		'coachify-customizer',
		'coachify_view_port',
		array(
			'mobile'               => coachify_get_media_query( 'mobile' ),
			'tablet'               => coachify_get_media_query( 'tablet' ),
			'desktop'              => coachify_get_media_query( 'desktop' ),
			'googlefonts'          => apply_filters( 'coachify_typography_customize_list', coachify_get_all_google_fonts() ),
			'systemfonts'          => apply_filters( 'coachify_typography_system_stack', '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ),
			'breadcrumb_sep_one'   => coachify_breadcrumb_icons_list('one'),
			'breadcrumb_sep_two'   => coachify_breadcrumb_icons_list('two'),
			'breadcrumb_sep_three' => coachify_breadcrumb_icons_list('three'),
		)
	);
}
endif;
add_action( 'customize_preview_init', 'coachify_customize_preview_js' );

if( ! function_exists( 'coachify_get_media_query' ) ) :
/**
 * Get the requested media query.
 *
 * @param string $name Name of the media query.
 */
function coachify_get_media_query( $name ) {

	// If the theme function doesn't exist, build our own queries.
	$desktop     = apply_filters( 'coachify_desktop_media_query', '(min-width:1024px)' );
	$tablet      = apply_filters( 'coachify_tablet_media_query', '(min-width: 720px) and (max-width: 1024px)' );
	$mobile      = apply_filters( 'coachify_mobile_media_query', '(max-width:719px)' );

	$queries = apply_filters(
		'coachify_media_queries',
		array(
			'desktop'     => $desktop,
			'tablet'      => $tablet,
			'mobile'      => $mobile,
		)
	);

	return $queries[ $name ];
}
endif;

if( ! function_exists( 'coachify_customize_script' ) ) :

function coachify_customize_script(){

	// Use minified libraries if SCRIPT_DEBUG is false
    $build    = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style( 'coachify-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), COACHIFY_THEME_VERSION );
	wp_enqueue_script( 'coachify-customize', get_template_directory_uri() . '/inc/js' . $build  . '/customize' . $suffix .'.js', array( 'jquery', 'customize-controls' ), COACHIFY_THEME_VERSION, true );

	wp_localize_script( 'coachify-customize', 'coachify_cdata',
		array(
			'nonce'                 => wp_create_nonce( 'coachify-local-fonts-flush' ),
			'ajax_url'              => admin_url( 'admin-ajax.php' ),
			'flushit'               => __( 'Successfully Flushed!','coachify' ),
			'customizer_reset_nonce' => wp_create_nonce('chfy-customizer-reset'),
		)
	);

	wp_localize_script( 'coachify-typography-customizer', 'coachify_customize',
		array(
			'nonce' => wp_create_nonce( 'coachify_customize_nonce' )
		)
	);

	wp_localize_script(
		'coachify-typography-customizer',
		'coachifyTypography',
		array(
			'googleFonts' => apply_filters( 'coachify_typography_customize_list', coachify_get_all_google_fonts() )
		)
	);

	wp_localize_script( 'coachify-typography-customizer', 'typography_defaults', coachify_typography_default_fonts() );
}
endif;
add_action( 'customize_controls_enqueue_scripts', 'coachify_customize_script' );

/**
 * Functions that removes default section in wp
 *
 * @param [type] $wp_customize
 * @return void
 */
function coachify_removing_default_sections( $wp_customize ){
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
}
add_action( 'customize_register','coachify_removing_default_sections' );