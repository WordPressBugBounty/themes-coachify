<?php
/**
 * Coachify Footer Panel
 *
 * @package Coachify
 */
if( ! function_exists( 'coachify_customize_register_main_footer' ) ) :

function coachify_customize_register_main_footer( $wp_customize ) {
	
    /** General Settings */
    $wp_customize->add_panel(
        'main_footer_settings',
        array(
            'title'       => __( 'Footer', 'coachify' ),
            'priority'    => 20,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Customizer footer settings from here.', 'coachify' ),
        )
    );
}
endif;
add_action( 'customize_register', 'coachify_customize_register_main_footer' );