<?php
/**
 * Header Social Media Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_header_social_media' ) ) : 

function coachify_customize_register_header_social_media( $wp_customize ) {    
    
    $defaults = coachify_get_general_defaults();

    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'coachify' ),
            'priority' => 20,
            'panel'    => 'main_header_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => $defaults['ed_social_links'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_social_links',
			array(
				'section'     => 'social_media_settings',
				'label'	      => __( 'Show Social Media', 'coachify' )
			)
		)
	);
    
    $wp_customize->add_setting( 
        'ed_social_links_new_tab', 
        array(
            'default'           => $defaults['ed_social_links_new_tab'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_social_links_new_tab',
			array(
				'section'         => 'social_media_settings',
				'label'           => __( 'Open in a new tab', 'coachify' ),
				'active_callback' => 'coachify_social_media_ac'
			)
		)
	);

    $wp_customize->add_setting(
		'social_media_order', 
		array(
			'default'           => $defaults['social_media_order'], 
			'sanitize_callback' => 'coachify_sanitize_sortable',
		)
	);

	$wp_customize->add_control(
		new Coachify_Sortable_Control(
			$wp_customize,
			'social_media_order',
			array(
				'section'     => 'social_media_settings',
				'label'       => __( 'Social Media', 'coachify' ),
				'choices'     => array(
                    'chfy_facebook'  => __( 'Facebook', 'coachify'),
                    'chfy_twitter'   => __( 'Twitter', 'coachify'),
                    'chfy_instagram' => __( 'Instagram', 'coachify'),
                    'chfy_pinterest' => __( 'Pinterest', 'coachify'),
                    'chfy_youtube'   => __( 'YouTube', 'coachify'),
                    'chfy_tiktok'    => __( 'TikTok', 'coachify'),
                    'chfy_linkedin'  => __( 'LinkedIn', 'coachify'),
                    'chfy_whatsapp'  => __( 'WhatsApp', 'coachify'),
                    'chfy_viber'     => __( 'Viber', 'coachify'),
                    'chfy_telegram'  => __( 'Telegram', 'coachify'),
                    'chfy_ok'        => __( 'OK', 'coachify'),
                    'chfy_vk'        => __( 'VK', 'coachify')
                ),
                'active_callback' => 'coachify_social_media_ac'
			)
		)
    );

    $wp_customize->add_setting(
        'header_social_media_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
            $wp_customize,
            'header_social_media_text',
            array(
                'section'         => 'social_media_settings',
                /* translators: %1$s: Link to Social Media customizer setting*/ 
                'description'     => sprintf(__( 'You can add links to your social media profiles %1$s here. %2$s', 'coachify' ), '<span class="text-inner-link social_media_text">', '</span>'),
                'active_callback' => 'coachify_social_media_ac'
            )
        )
    );

    /** Social Media Settings Ends */
}
endif;
add_action( 'customize_register', 'coachify_customize_register_header_social_media' );