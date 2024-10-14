<?php
/**
 * Header Contact Settings
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_header_contact' ) ) : 

function coachify_customize_register_header_contact( $wp_customize ) {    
    $defaults = coachify_get_general_defaults();
    /** Header Settings */
    $wp_customize->add_section(
        'header_contact_settings',
        array(
            'title'    => __( 'Contact Settings', 'coachify' ),
            'priority' => 15,
            'panel'    => 'main_header_settings',
        )
    );

    /** Phone */
    $wp_customize->add_setting(
        'header_phone',
        array(
            'default'           => $defaults['header_phone'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'header_phone',
        array(
            'type'    => 'text',
            'section' => 'header_contact_settings',
            'label'   => __( 'Phone Number', 'coachify' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'header_phone', array(
        'selector'        => '.contact-info .phone',
        'render_callback' => 'coachify_header_phone_partial',
    ) );

    /** Email */
    $wp_customize->add_setting(
        'header_email',
        array(
            'default'           => $defaults['header_email'],
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'header_email',
        array(
            'type'    => 'text',
            'section' => 'header_contact_settings',
            'label'   => __( 'Email Address', 'coachify' )
        )
    );

    $wp_customize->selective_refresh->add_partial( 'header_email', array(
        'selector'        => '.contact-info .email',
        'render_callback' => 'coachify_header_email',
    ) );
    
    /** Header Contact Settings Ends */
}
endif;
add_action( 'customize_register', 'coachify_customize_register_header_contact' );