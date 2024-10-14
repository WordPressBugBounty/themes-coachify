<?php
/**
 * 404 Page
 *
 * @param obj $wp_customize
 * @return void
 */
function coachify_customize_register_404($wp_customize){
    $defaults = coachify_get_general_defaults();

    /** 404 section */
    $wp_customize->add_section( 
        '404_page_settings',
        array(
            'priority' => 60,
            'title'    => __( '404 Page', 'coachify' ),
            'panel'    => 'general_settings'
        ) 
    );

    /** 404 Image */
    $wp_customize->add_setting(
        'error_image',
        array(
            'default'           => $defaults['error_image'],
            'sanitize_callback' => 'coachify_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'error_image',
            array(
                'label'   => __( '404 Image', 'coachify' ),
                'section' => '404_page_settings',
            )
        )
    );

    $wp_customize->add_setting(
        'ed_latest_post',
        array(
            'default'           => $defaults['ed_latest_post'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        new Coachify_Toggle_Control( 
            $wp_customize,
            'ed_latest_post',
            array(
                'section' => '404_page_settings',
                'label'   => __( 'Show Posts', 'coachify' ),
            )
        )
    );

    /** Number of Posts */
    $wp_customize->add_setting(
        'no_of_posts_404',
        array(
            'default'           => $defaults['no_of_posts_404'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'no_of_posts_404',
            array(
                'label'   => __( 'Number of posts', 'coachify' ),
                'section' => '404_page_settings',
                'settings' => array(
                    'desktop' => 'no_of_posts_404',
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 2,
                        'max'  => 12,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
                'active_callback' => 'coachify_error_ac'
            )
        )
    );

    /** Posts Per Row */
    $wp_customize->add_setting(
        'posts_per_row_404',
        array(
            'default'           => $defaults['posts_per_row_404'],
            'sanitize_callback' => 'coachify_sanitize_number_absint',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'posts_per_row_404',
            array(
                'label'   => __( 'Posts per row', 'coachify' ),
                'section' => '404_page_settings',
                'settings' => array(
                    'desktop' => 'posts_per_row_404',
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 2,
                        'max'  => 4,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
                'active_callback' => 'coachify_error_ac'
            )
        )
    );
}
add_action('customize_register', 'coachify_customize_register_404');