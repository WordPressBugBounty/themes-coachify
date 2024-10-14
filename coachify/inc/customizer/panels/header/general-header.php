<?php
/**
 * Header Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_header_general_settings' ) ) : 

function coachify_customize_register_header_general_settings( $wp_customize ) {    
    $defaults = coachify_get_general_defaults();

    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'General', 'coachify' ),
            'priority' => 10,
            'panel'    => 'main_header_settings',
        )
    );
    
    /*Header width layouts*/
    $wp_customize->add_setting( 
        'header_width_layout', 
        array(
            'default'           => $defaults['header_width_layout'],
            'sanitize_callback' => 'coachify_sanitize_radio',
        ) 
    );
    
    $wp_customize->add_control(
        new Coachify_Radio_Buttonset_Control(
            $wp_customize,
            'header_width_layout',
            array(
                'section' => 'header_settings',
                'label'   => __( 'Header Width', 'coachify' ),
                'choices' => array(
                    'boxed'     => __( 'Boxed', 'coachify' ),
                    'fullwidth' => __( 'Fullwidth', 'coachify' ),
                    'custom'    => __( 'Custom', 'coachify' ),
                ),
            )
        )
    );

    $wp_customize->add_setting(
        'header_width_custom',
        array(
            'default'           => $defaults['header_width_custom'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'header_width_custom',
            array(
                'label'    => __( 'Custom Header Width', 'coachify' ),
                'section'  => 'header_settings',
                'settings' => array(
                    'desktop' => 'header_width_custom',
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 1,
                        'max'  => 1500,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
                'active_callback' => 'coachify_header_width_ac',
            )
        )
    );

    /** Enable Header Search */
    $wp_customize->add_setting( 
        'ed_header_search', 
        array(
            'default'           => $defaults['ed_header_search'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'     => 'header_settings',
				'label'	      => __( 'Header Search', 'coachify' ),
			)
		)
	);
    
    if( coachify_is_woocommerce_activated() ){
        
        /** Enable WooCommerce Cart */
        $wp_customize->add_setting( 
            'ed_woo_cart', 
            array(
                'default'           => $defaults['ed_woo_cart'],
                'sanitize_callback' => 'coachify_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Coachify_Toggle_Control( 
                $wp_customize,
                'ed_woo_cart',
                array(
                    'section' => 'header_settings',
                    'label'   => __( 'Show Cart', 'coachify' ),
                )
            )
        );
    } 

    /** Note */
    $wp_customize->add_setting(
        'navigation_menu_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
            $wp_customize,
            'navigation_menu_text',
            array(
                'section' => 'header_settings',
                'label'   => sprintf(__( '%1$sNavigation Menu Settings%2$s', 'coachify' ), '<span class="chfy-customizer-title">', '</span>'),
            )
        )
    );

    /** Items Spacing */
    $wp_customize->add_setting(
        'header_items_spacing',
        array(
            'default'           => $defaults['header_items_spacing'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'header_items_spacing',
            array(
                'label'    => __( 'Items Spacing', 'coachify' ),
                'section'  => 'header_settings',
                'settings' => array(
                    'desktop' => 'header_items_spacing',
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 0,
                        'max'  => 1150,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                )
            )
        )
    );

    /** Header Strech Menu */
    $wp_customize->add_setting(
        'header_strech_menu',
        array(
            'default'           => $defaults['header_strech_menu'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Toggle_Control( 
            $wp_customize,
            'header_strech_menu',
            array(
                'section' => 'header_settings',
                'label'   => __( 'Stretch Menu', 'coachify' )
            )
        )
    );

    /** Dropdown Width */
    $wp_customize->add_setting(
        'header_dropdown_width',
        array(
            'default'           => $defaults['header_dropdown_width'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'header_dropdown_width',
            array(
                'label'    => __( 'Dropdown Width', 'coachify' ),
                'section'  => 'header_settings',
                'settings' => array(
                    'desktop' => 'header_dropdown_width',
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 0,
                        'max'  => 350,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
            )
        )
    );

    // /** Header Settings Ends */
}
endif;
add_action( 'customize_register', 'coachify_customize_register_header_general_settings' );