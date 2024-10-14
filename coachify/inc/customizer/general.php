<?php
/**
 * Coachify General Settings
 *
 * @package Coachify
 */
if( ! function_exists( 'coachify_customize_register_general' ) ) :

function coachify_customize_register_general( $wp_customize ) {
	
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 6,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General', 'coachify' ),
            'description' => __( 'Customize Container, Sidebar, Button and Scroll to Top.', 'coachify' ),
        ) 
    );

}
endif;
add_action( 'customize_register', 'coachify_customize_register_general' );