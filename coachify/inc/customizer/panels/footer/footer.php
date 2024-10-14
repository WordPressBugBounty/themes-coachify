<?php
/**
 * Coachify Footer Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_footer' ) ) : 

function coachify_customize_register_footer( $wp_customize ) {
    $colorDefaults = coachify_get_color_defaults();
    $defaults      = coachify_get_general_defaults();

    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Copyright', 'coachify' ),
            'priority'   => 35,
            'panel' => 'main_footer_settings',
        )
    );
    
    $wp_customize->add_setting(
        'footer_copyright_tabs_settings',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Customizer_Tabs_Control(
            $wp_customize, 'footer_copyright_tabs_settings', array(
                'section' => 'footer_settings',
                'tabs'    => array(
                    'general' => array(
                        'nicename' => esc_html__( 'General', 'coachify' ),
                        'controls' => array(
                            'footer_copyright',
                            'ed_author_link',
                            'ed_wp_link',
                        ),
                    ),
                    'design' => array(
                        'nicename' => esc_html__( 'Design', 'coachify' ),
                        'controls' => array(
                            'foot_copyright_text_color',
                            'foot_copyright_bg_color',
                        ),
                    )
                ),
            )
        )
    );

    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => $defaults['footer_copyright'],
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'   => __( 'Footer Copyright Text', 'coachify' ),
            'section' => 'footer_settings',
            'type'    => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector' => '.site-info .copyright',
        'render_callback' => 'coachify_get_footer_copyright',
    ) );

    /** Text Color*/
    $wp_customize->add_setting(
        'foot_copyright_text_color', 
        array(
            'default'           =>  $colorDefaults['foot_copyright_text_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_copyright_text_color', 
            array(
                'label'       => __( 'Text Color', 'coachify' ),
                'section'     => 'footer_settings',
            )
        )
    );


    /** Footer Copyright Background Color*/
    $wp_customize->add_setting(
        'foot_copyright_bg_color', 
        array(
            'default'           =>  $colorDefaults['foot_copyright_bg_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_copyright_bg_color', 
            array(
                'label'       => __( 'Background Color', 'coachify' ),
                'section'     => 'footer_settings',
            )
        )
    );
}
endif;
add_action( 'customize_register', 'coachify_customize_register_footer' );