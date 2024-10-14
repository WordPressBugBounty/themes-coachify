<?php
/**
 * Social Media Settings
 *
 * @package Coachify
*/
if ( ! function_exists( 'coachify_customize_register_social_network' ) ) : 

function coachify_customize_register_social_network( $wp_customize ){

    $defaults = coachify_get_general_defaults();

    /** Social Media */
    $wp_customize->add_section( 
        'social_network_section',
        array(
            'priority' => 31,
            'title'    => __( 'Social Media', 'coachify' ),
        ) 
    );

    $wp_customize->add_setting(
        'social_network_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
            $wp_customize,
            'social_network_text',
            array(
                'section'     => 'social_network_section',
                'label'       => 'Social Media Accounts',
                'description' => __( 'Add the links to your social media accounts and display them across your site.', 'coachify' ),
            )
        )
    );

    /** Facebook */
    $wp_customize->add_setting(
        'chfy_facebook',
        array(
            'default'           => $defaults['chfy_facebook'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_facebook',
        array(
            'section'         => 'social_network_section',
            'label'           => __( 'Facebook', 'coachify' ),
            'type'            => 'text'
        )
	);

    /** Twitter */
    $wp_customize->add_setting(
        'chfy_twitter',
        array(
            'default'           => $defaults['chfy_twitter'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_twitter',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Twitter', 'coachify' ),
        )
	);

     /** Instagram */
     $wp_customize->add_setting(
        'chfy_instagram',
        array(
            'default'           => $defaults['chfy_instagram'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_instagram',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Instagram', 'coachify' ),
        )
	);

    /** Pinterest */
    $wp_customize->add_setting(
        'chfy_pinterest',
        array(
            'default'           => $defaults['chfy_pinterest'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_pinterest',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Pinterest', 'coachify' ),
        )
	);

    /** YouTube  */
    $wp_customize->add_setting(
        'chfy_youtube',
        array(
            'default'           => $defaults['chfy_youtube'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_youtube',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'YouTube', 'coachify' ),
        )
	);

    /** TikTok  */
    $wp_customize->add_setting(
        'chfy_tiktok',
        array(
            'default'           => $defaults['chfy_tiktok'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_tiktok',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'TikTok', 'coachify' ),
        )
	);

    /** Linkedin */
    $wp_customize->add_setting(
        'chfy_linkedin',
        array(
            'default'           => $defaults['chfy_linkedin'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_linkedin',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Linkedin', 'coachify' ),
        )
	);

    /** Whatsapp */
    $wp_customize->add_setting(
        'chfy_whatsapp',
        array(
            'default'           => $defaults['chfy_whatsapp'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_whatsapp',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Whatsapp', 'coachify' ),
        )
	);

    /** Viber */
    $wp_customize->add_setting(
        'chfy_viber',
        array(
            'default'           => $defaults['chfy_viber'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_viber',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Viber', 'coachify' ),
        )
	);

    /** Telegram */
    $wp_customize->add_setting(
        'chfy_telegram',
        array(
            'default'           => $defaults['chfy_telegram'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_telegram',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'Telegram', 'coachify' ),
        )
	);

     /** Ok */
     $wp_customize->add_setting(
        'chfy_ok',
        array(
            'default'           => $defaults['chfy_ok'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_ok',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'OK', 'coachify' ),
        )
	);

     /** Telegram */
     $wp_customize->add_setting(
        'chfy_vk',
        array(
            'default'           => $defaults['chfy_vk'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'chfy_vk',
        array(
            'type'            => 'text',
            'section'         => 'social_network_section',
            'label'           => __( 'VK', 'coachify' ),
        )
	);

}
endif;
add_action( 'customize_register', 'coachify_customize_register_social_network' );