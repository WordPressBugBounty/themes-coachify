<?php
/**
 * Header Header Button Settings
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_header_button' ) ) : 

function coachify_customize_register_header_button( $wp_customize ) { 
    $btnDefault    = coachify_get_button_defaults();
    $colorDefaults = coachify_get_color_defaults();
    $defaults      = coachify_get_general_defaults();
    /** Header Settings */
    $wp_customize->add_section(
        'header_button_settings',
        array(
            'title'    => __( 'Header Button', 'coachify' ),
            'priority' => 25,
            'panel'    => 'main_header_settings',
        )
    );

    $wp_customize->add_setting(
        'header_button_tabs_settings',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Customizer_Tabs_Control(
            $wp_customize, 'header_button_tabs_settings', array(
                'section' => 'header_button_settings',
                'tabs'    => array(
                    'general' => array(
                        'nicename' => esc_html__( 'General', 'coachify' ),
                        'controls' => array(
                            'header_button_label',
                            'header_button_url',
                            'header_button_new_tab',
                            'ed_header_btn_sticky',
                        ),
                    ),
                    'design' => array(
                        'nicename' => esc_html__( 'Design', 'coachify' ),
                        'controls' => array(
                            'header_button_roundness',
                            'header_button_padding',
                            'header_btn_text_color',
                            'header_btn_bg_color',
                            'header_btn_border_color',
                        ),
                    )
                ),
            )
        )
    );

    /** Enable Header Search */
    $wp_customize->add_setting( 
        'ed_header_button', 
        array(
            'default'           => '',
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_header_button',
			array(
				'section'     => 'header_button_settings',
				'label'	      => __( 'Show Button', 'coachify' ),
			)
		)
	);

    $wp_customize->add_setting(
        'header_button_label',
        array(
            'default'           => $defaults['header_button_label'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'header_button_label',
        array(
            'label'         => __( 'Button', 'coachify' ),
            'section'       => 'header_button_settings',
            'type'          => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'header_button_label', array(
        'selector'        => '.nav-wrap .button-wrap .btn-readmore',
        'render_callback' => ('coachify_header_button_label' ),
    ) );

    $wp_customize->add_setting(
        'header_button_url',
        array(
            'default'           => $defaults['header_button_url'],
            'sanitize_callback' => 'esc_url_raw', 
        )
    );
    
    $wp_customize->add_control(
        'header_button_url',
        array(
            'label'     => __( 'Button Link ', 'coachify' ),
            'section'   => 'header_button_settings',
            'type'      => 'url',
        )
    );

    /** Open header header button in a new tab */
    $wp_customize->add_setting( 
        'header_button_new_tab', 
        array(
            'default'           => false,
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Coachify_Toggle_Control( 
            $wp_customize,
            'header_button_new_tab',
            array(
                'section'     => 'header_button_settings',
                'label'	      => __( 'Open in new tab', 'coachify' ),
                'description' => __( 'Enable to open the link in a new tab.', 'coachify' ),
            )
        )
    );

    /** Button Roundness */    
    $wp_customize->add_setting(
        'header_button_roundness[top]',
        array(
            'default'           => $btnDefault['header_button_roundness']['top'],            
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'header_button_roundness[right]',
        array(
            'default'           => $btnDefault['header_button_roundness']['right'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'header_button_roundness[bottom]',
        array(
            'default'           => $btnDefault['header_button_roundness']['bottom'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'header_button_roundness[left]',
        array(
            'default'           => $btnDefault['header_button_roundness']['left'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );   

    $wp_customize->add_control(
        new Coachify_Spacing_Control(
            $wp_customize,
            'header_button_roundness',
            array(
                'type'     => 'coachify-spacing',
                'label'    => __( 'Button Roundness', 'coachify' ),
                'section'  => 'header_button_settings',
                'settings' => array(
                    'desktop_top'    => 'header_button_roundness[top]',
                    'desktop_right'  => 'header_button_roundness[right]',
                    'desktop_bottom' => 'header_button_roundness[bottom]',
                    'desktop_left'   => 'header_button_roundness[left]',
                ),
                'element'  => 'button',
            )
        )
    );

     /** Header Button Padding */

    $wp_customize->add_setting(
        'header_button_padding[top]',
        array(
            'default'           => $btnDefault['header_button_padding']['top'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'header_button_padding[right]',
        array(
            'default'           => $btnDefault['header_button_padding']['right'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'header_button_padding[bottom]',
        array(
            'default'           => $btnDefault['header_button_padding']['bottom'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'header_button_padding[left]',
        array(
            'default'           => $btnDefault['header_button_padding']['left'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );   

    $wp_customize->add_control(
        new Coachify_Spacing_Control(
            $wp_customize,
            'header_button_padding',
            array(
                'type'     => 'coachify-spacing',
                'label'    => esc_html__( 'Button Padding', 'coachify' ),
                'section'  => 'header_button_settings',
                'settings' => array(
                    'desktop_top'    => 'header_button_padding[top]',
                    'desktop_right'  => 'header_button_padding[right]',
                    'desktop_bottom' => 'header_button_padding[bottom]',
                    'desktop_left'   => 'header_button_padding[left]',
                ),
                'element'  => 'button',
            )
        )
    );

    $wp_customize->add_setting(
        'header_btn_text_color',
        array(
            'default'           => $colorDefaults['header_btn_text_color'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'coachify_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Coachify_Alpha_Color_Customize_Control(
            $wp_customize,
            'header_btn_text_color',
            array(
                'label'   => __( 'Text Color', 'coachify' ),
                'section' => 'header_button_settings',
            )
        )
    );

    $wp_customize->add_setting(
        'header_btn_bg_color',
        array(
            'default'           => $colorDefaults['header_btn_bg_color'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'coachify_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Coachify_Alpha_Color_Customize_Control(
            $wp_customize,
            'header_btn_bg_color',
            array(
                'label'   => __( 'Background', 'coachify' ),
                'section' => 'header_button_settings',
            )
        )
    );

    $wp_customize->add_setting(
        'header_btn_border_color',
        array(
            'default'           => $colorDefaults['header_btn_border_color'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'coachify_sanitize_rgba',
        )
    );

    $wp_customize->add_control(
        new Coachify_Alpha_Color_Customize_Control(
            $wp_customize,
            'header_btn_border_color',
            array(
                'label'   => __( 'Border Color', 'coachify' ),
                'section' => 'header_button_settings',
            )
        )
    );

    /** Header Button Settings Ends */
}
endif;
add_action( 'customize_register', 'coachify_customize_register_header_button' );