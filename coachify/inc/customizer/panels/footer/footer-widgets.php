<?php
/**
 * Coachify Footer Widgets Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_footer_widgets' ) ) : 

function coachify_customize_register_footer_widgets( $wp_customize ) {
    $colorDefaults = coachify_get_color_defaults();
    $defaults      = coachify_get_general_defaults();

    $wp_customize->add_section(
        'footer_widgets_settings',
        array(
            'title'      => __( 'Footer Widgets', 'coachify' ),
            'priority'   => 30,
            'panel' => 'main_footer_settings',
        )
    );
    
    $wp_customize->add_setting(
        'footer_tabs_settings',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Customizer_Tabs_Control(
            $wp_customize, 'footer_tabs_settings', array(
                'section' => 'footer_widgets_settings',
                'tabs'    => array(
                    'general' => array(
                        'nicename' => esc_html__( 'General', 'coachify' ),
                        'controls' => array(
                            'coachify_widget_layouts',
                            'footer_widget_texts',
                        ),
                    ),
                    'design' => array(
                        'nicename' => esc_html__( 'Design', 'coachify' ),
                        'controls' => array(
                            'foot_top_spacing',
                            'foot_text_color',
                            'foot_widget_heading_color',
                            'foot_bg_color',
                        ),
                    )
                ),
            )
        )
    );

    /** Widget Layout */
    $wp_customize->add_setting( 
        'coachify_widget_layouts', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'coachify_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Coachify_Radio_Image_Control(
            $wp_customize,
            'coachify_widget_layouts',
            array(
                'section'	  => 'footer_widgets_settings',
                'label'		  => __( 'Layouts', 'coachify' ),
                'description' => __( 'Choose the footer layouts for your site.', 'coachify' ),
                'svg'         => true,
                'choices'	  => array(
                    'one'    => array(
                        'label' => __( 'Layout One', 'coachify' ),
                        'path'  => '<svg width="150" height="59" viewBox="0 0 150 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_667_12627)">
                        <rect width="150" height="59" fill="white"/>
                        <mask id="mask0_667_12627" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="-1" width="150" height="60">
                        <path d="M150 -0.0703125H0V59.0006H150V-0.0703125Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_667_12627)">
                        <path d="M36.6667 7H9.33333C8.59695 7 8 7.28376 8 7.6338V51.3662C8 51.7162 8.59695 52 9.33333 52H36.6667C37.403 52 38 51.7162 38 51.3662V7.6338C38 7.28376 37.403 7 36.6667 7Z" fill="#EBEBEB"/>
                        <path d="M71.6667 7H44.3333C43.597 7 43 7.28376 43 7.6338V51.3662C43 51.7162 43.597 52 44.3333 52H71.6667C72.403 52 73 51.7162 73 51.3662V7.6338C73 7.28376 72.403 7 71.6667 7Z" fill="#EBEBEB"/>
                        <path d="M106.667 7H79.3333C78.597 7 78 7.28376 78 7.6338V51.3662C78 51.7162 78.597 52 79.3333 52H106.667C107.403 52 108 51.7162 108 51.3662V7.6338C108 7.28376 107.403 7 106.667 7Z" fill="#EBEBEB"/>
                        <path d="M141.667 7H114.333C113.597 7 113 7.28376 113 7.6338V51.3662C113 51.7162 113.597 52 114.333 52H141.667C142.403 52 143 51.7162 143 51.3662V7.6338C143 7.28376 142.403 7 141.667 7Z" fill="#EBEBEB"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_667_12627">
                        <rect width="150" height="59" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>'
                    ),
                    'two' => array(
                        'label' => __( 'Layout Two', 'coachify' ),
                        'path'  => '<svg width="150" height="59" viewBox="0 0 150 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_667_12665)">
                        <rect width="150" height="59" fill="white"/>
                        <mask id="mask0_667_12665" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="-1" width="150" height="60">
                        <path d="M150 -0.0703125H0V59.0006H150V-0.0703125Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_667_12665)">
                        <path d="M50 7H9C7.89543 7 7 7.28376 7 7.6338V51.3662C7 51.7162 7.89543 52 9 52H50C51.1046 52 52 51.7162 52 51.3662V7.6338C52 7.28376 51.1046 7 50 7Z" fill="#EBEBEB"/>
                        <path d="M80.8889 7H58.1111C57.4975 7 57 7.28376 57 7.6338V51.3662C57 51.7162 57.4975 52 58.1111 52H80.8889C81.5025 52 82 51.7162 82 51.3662V7.6338C82 7.28376 81.5025 7 80.8889 7Z" fill="#EBEBEB"/>
                        <path d="M110.889 7H88.1111C87.4975 7 87 7.28376 87 7.6338V51.3662C87 51.7162 87.4975 52 88.1111 52H110.889C111.503 52 112 51.7162 112 51.3662V7.6338C112 7.28376 111.503 7 110.889 7Z" fill="#EBEBEB"/>
                        <path d="M140.889 7H118.111C117.497 7 117 7.28376 117 7.6338V51.3662C117 51.7162 117.497 52 118.111 52H140.889C141.503 52 142 51.7162 142 51.3662V7.6338C142 7.28376 141.503 7 140.889 7Z" fill="#EBEBEB"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_667_12665">
                        <rect width="150" height="59" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>'
                    ),
                    'three' => array(
                        'label' => __( 'Layout Three', 'coachify' ),
                        'path'  => '<svg width="150" height="59" viewBox="0 0 150 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_667_12696)">
                        <rect width="150" height="59" fill="white"/>
                        <mask id="mask0_667_12696" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="-1" width="150" height="60">
                        <path d="M150 -0.0703125H0V59.0006H150V-0.0703125Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_667_12696)">
                        <path d="M30.8889 7H8.11111C7.49746 7 7 7.28376 7 7.6338V51.3662C7 51.7162 7.49746 52 8.11111 52H30.8889C31.5025 52 32 51.7162 32 51.3662V7.6338C32 7.28376 31.5025 7 30.8889 7Z" fill="#EBEBEB"/>
                        <path d="M60.8889 7H38.1111C37.4975 7 37 7.28376 37 7.6338V51.3662C37 51.7162 37.4975 52 38.1111 52H60.8889C61.5025 52 62 51.7162 62 51.3662V7.6338C62 7.28376 61.5025 7 60.8889 7Z" fill="#EBEBEB"/>
                        <path d="M90.8889 7H68.1111C67.4975 7 67 7.28376 67 7.6338V51.3662C67 51.7162 67.4975 52 68.1111 52H90.8889C91.5025 52 92 51.7162 92 51.3662V7.6338C92 7.28376 91.5025 7 90.8889 7Z" fill="#EBEBEB"/>
                        <path d="M140 7H99C97.8954 7 97 7.28376 97 7.6338V51.3662C97 51.7162 97.8954 52 99 52H140C141.105 52 142 51.7162 142 51.3662V7.6338C142 7.28376 141.105 7 140 7Z" fill="#EBEBEB"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_667_12696">
                        <rect width="150" height="59" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>'
                    ),
                    'four'  => array(
                        'label' => __( 'Layout Four', 'coachify' ),
                        'path'  => '<svg width="150" height="59" viewBox="0 0 150 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_667_12682)">
                        <rect width="150" height="59" fill="white"/>
                        <mask id="mask0_667_12682" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="-1" width="150" height="60">
                        <path d="M150 -0.0703125H0V59.0006H150V-0.0703125Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_667_12682)">
                        <path d="M35.6667 7H8.33333C7.59695 7 7 7.28376 7 7.6338V51.3662C7 51.7162 7.59695 52 8.33333 52H35.6667C36.403 52 37 51.7162 37 51.3662V7.6338C37 7.28376 36.403 7 35.6667 7Z" fill="#EBEBEB"/>
                        <path d="M106.022 7H44.9778C43.3332 7 42 7.28376 42 7.6338V51.3662C42 51.7162 43.3332 52 44.9778 52H106.022C107.667 52 109 51.7162 109 51.3662V7.6338C109 7.28376 107.667 7 106.022 7Z" fill="#EBEBEB"/>
                        <path d="M142.667 7H115.333C114.597 7 114 7.28376 114 7.6338V51.3662C114 51.7162 114.597 52 115.333 52H142.667C143.403 52 144 51.7162 144 51.3662V7.6338C144 7.28376 143.403 7 142.667 7Z" fill="#EBEBEB"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_667_12682">
                        <rect width="150" height="59" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                        '
                    ),
                )
            )
        )
    );

    $wp_customize->add_setting(
        'footer_widget_texts',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
            $wp_customize,
            'footer_widget_texts',
            array(
                'section'     => 'footer_widgets_settings',
                /* translators: %1$s: Link to Footer customizer setting*/
                'description' => sprintf( __( '%1$sClick here%2$s to add widget to the footer.', 'coachify' ), '<span class="text-inner-link footer_widget_texts">', '</span>' ),
                'priority'    => 60,
            )
        )
    );

    /**Footer top spacing*/
    $wp_customize->add_setting(
        'foot_top_spacing',
        array(
            'default'           => $defaults['foot_top_spacing'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'tablet_foot_top_spacing',
        array(
            'default'           => $defaults['tablet_foot_top_spacing'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'mobile_foot_top_spacing',
        array(
            'default'           => $defaults['mobile_foot_top_spacing'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'foot_top_spacing',
            array(
                'label'       => __( 'Top Spacing', 'coachify' ),
                'description' => __( 'Add the spacing above the footer area.', 'coachify' ),
                'section'     => 'footer_widgets_settings',
                'settings'    => array(
                        'desktop' => 'foot_top_spacing',
                        'tablet'  => 'tablet_foot_top_spacing',
                        'mobile'  => 'mobile_foot_top_spacing'
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'tablet' => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'mobile' => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
            )
        )
    );

    /** Text Color*/
    $wp_customize->add_setting(
        'foot_text_color', 
        array(
            'default'           =>  $colorDefaults['foot_text_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_text_color', 
            array(
                'label'       => __( 'Text Color', 'coachify' ),
                'section'     => 'footer_widgets_settings',
            )
        )
    );

    /** Footer Widget Title Color*/
    $wp_customize->add_setting(
        'foot_widget_heading_color', 
        array(
            'default'           =>  $colorDefaults['foot_widget_heading_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_widget_heading_color', 
            array(
                'label'       => __( 'Widget Title Color', 'coachify' ),
                'section'     => 'footer_widgets_settings',
            )
        )
    );

    /** Footer Background Color*/
    $wp_customize->add_setting(
        'foot_bg_color', 
        array(
            'default'           =>  $colorDefaults['foot_bg_color'],
            'sanitize_callback' => 'coachify_sanitize_rgba',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new Coachify_Alpha_Color_Customize_Control( 
            $wp_customize, 
            'foot_bg_color', 
            array(
                'label'       => __( 'Background Color', 'coachify' ),
                'section'     => 'footer_widgets_settings',
            )
        )
    );
}
endif;
add_action( 'customize_register', 'coachify_customize_register_footer_widgets' );