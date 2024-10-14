<?php
/**
 * Coachify Colors Settings
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_colors' ) ) : 

function coachify_customize_register_colors( $wp_customize ) {
    
    $defaults = coachify_get_color_defaults();

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           =>  $defaults['primary_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'    => __( 'Primary Color', 'coachify' ),
                'section'  => 'colors',
            )
        )
    );

    /** Secondary Color*/
    $wp_customize->add_setting( 
        'secondary_color', 
        array(
            'default'           =>  $defaults['secondary_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'secondary_color', 
            array(
                'label'    => __( 'Secondary Color', 'coachify' ),
                'section'  => 'colors',
            )
        )
    );

    /** Body Font Color*/
    $wp_customize->add_setting( 
        'body_font_color', 
        array(
            'default'           =>  $defaults['body_font_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'body_font_color', 
            array(
                'label'       => __( 'Font', 'coachify' ),
                'section'     => 'colors',
            )
        )
    );

    /** Heading Color*/
    $wp_customize->add_setting( 
        'heading_color', 
        array(
            'default'           =>  $defaults['heading_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'heading_color', 
            array(
                'label'       => __( 'Heading', 'coachify' ),
                'section'     => 'colors',
            )
        )
    );

    /** Primary Accent Color*/
    $wp_customize->add_setting( 
        'primary_accent_color', 
        array(
            'default'           => $defaults['primary_accent_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'primary_accent_color', 
            array(
                'label'    => __( 'Primary Accent Color', 'coachify' ),
                'section'  => 'colors'
            )
        )
    );

    /** Secondary Accent Color*/
    $wp_customize->add_setting( 
        'secondary_accent_color', 
        array(
            'default'           =>  $defaults['secondary_accent_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'secondary_accent_color', 
            array(
                'label'    => __( 'Secondary Accent Color', 'coachify' ),
                'section'  => 'colors',
            )
        )
    );

    /** Tertiary Accent Color*/
    $wp_customize->add_setting( 
        'tertiary_accent_color', 
        array(
            'default'           =>  $defaults['tertiary_accent_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'tertiary_accent_color', 
            array(
                'label'    => __( 'Tertiary Accent Color', 'coachify' ),
                'section'  => 'colors',
            )
        )
    );

    /** Site Background Color*/
    $wp_customize->add_setting( 
        'site_bg_color', 
        array(
            'default'           =>  $defaults['site_bg_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'site_bg_color', 
            array(
                'label'       => __( 'Site Background', 'coachify' ),
                'section'     => 'colors',
            )
        )
    );

    $wp_customize->add_setting(
        'buttons_color_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
            $wp_customize,
            'buttons_color_text',
            array(
                'section'         => 'colors',
                /* translators: %1$s: Link to Button Color customizer setting*/ 
                'description'     => sprintf(__( 'You can change button colors from %1$s here. %2$s', 'coachify' ), '<span class="text-inner-link buttons_color_text">', '</span>'),
            )
        )
    );

    $wp_customize->get_section( 'colors' )->priority   = 7;
    $wp_customize->remove_control( 'background_color' ); //Remove site background color
}
endif;
add_action( 'customize_register', 'coachify_customize_register_colors' );