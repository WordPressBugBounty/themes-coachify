<?php
/**
 * Coachify Header Panel
 *
 * @package Coachify
 */
if( ! function_exists( 'coachify_customize_register_main_header' ) ) :

function coachify_customize_register_main_header( $wp_customize ) {
	
    /** General Settings */
    $wp_customize->add_panel(
        'main_header_settings',
        array(
            'title'       => __( 'Main Header', 'coachify' ),
            'priority'    => 15,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Customizer header settings from here.', 'coachify' ),
        )
    );
}
endif;
add_action( 'customize_register', 'coachify_customize_register_main_header' );