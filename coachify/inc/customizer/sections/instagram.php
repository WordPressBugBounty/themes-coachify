<?php
/**
 * Instagram Settings
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_general_instagram' ) ) : 

function coachify_customize_register_general_instagram( $wp_customize ) {
    $defaults = coachify_get_general_defaults();

    /** Instagram Settings */
    $wp_customize->add_section(
        'instagram_settings',
        array(
            'title'    => __( 'Instagram Settings', 'coachify' ),
            'priority' => 40,
        )
    );
    
   
    /** Enable Instagram Section */
    $wp_customize->add_setting( 
        'ed_instagram', 
        array(
            'default'           => $defaults['ed_instagram'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Coachify_Toggle_Control( 
            $wp_customize,
            'ed_instagram',
            array(
                'section'     => 'instagram_settings',
                'label'	      => __( 'Instagram Section', 'coachify' ),
                'description' => __( 'Enable to show Instagram Section throughout your site.', 'coachify' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'instagram_shortcode', 
        array(
            'default'           => $defaults['instagram_shortcode'],
            'sanitize_callback' => 'sanitize_text_field'
        ) 
    );
    
    $wp_customize->add_control(
        'instagram_shortcode',
        array(
            'section'         => 'instagram_settings',
            'label'           => __( 'Shortcode', 'coachify' ),
            'type'            => 'text',
            'description'     => __( 'Add shortcode for your instagram profile below:', 'coachify' ),
            'active_callback' => 'coachify_instagram_ac'
        )
    );
    
    $wp_customize->add_setting( 
        'ed_home_only_instagram', 
        array(
            'default'           => $defaults['ed_home_only_instagram'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Coachify_Toggle_Control( 
            $wp_customize,
            'ed_home_only_instagram',
            array(
                'section'         => 'instagram_settings',
                'label'           => __( 'Instagram on Homepage', 'coachify' ),
                'description'     => __( 'Show Instagram Section only on Homepage', 'coachify' ),
                'active_callback' => 'coachify_instagram_ac'
            )
        )
    );

    if( coachify_is_btif_activated() ){
        /** Note */
        $wp_customize->add_setting(
            'instagram_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Coachify_Note_Control( 
                $wp_customize,
                'instagram_text',
                array(
                    'section'         => 'instagram_settings',
                    /* translators: %1$s: Link to BlossomThemes Social Feed plugin admin page*/ 
                    'description'     => sprintf( __( 'You can change the setting BlossomThemes Social Feed %1$sfrom here%2$s.', 'coachify' ), '<a href="' . esc_url( admin_url( 'admin.php?page=class-blossomthemes-instagram-feed-admin.php' ) ) . '" target="_blank">', '</a>' ),
                    'active_callback' => 'coachify_instagram_ac'
                )
            )
        );        
    }
    
}
endif;
add_action( 'customize_register', 'coachify_customize_register_general_instagram' );