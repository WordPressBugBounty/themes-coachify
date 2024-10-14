<?php
/**
 * Coachify Single Page Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_singlepage_settings' ) ) : 

function coachify_customize_register_singlepage_settings( $wp_customize ) {
    $defaults      = coachify_get_general_defaults();

    $wp_customize->add_section(
        'singlepage_settings',
        array(
            'title'      => __( 'Page', 'coachify' ),
            'priority'   => 60,
        )
    );

    /** Page Title */
    $wp_customize->add_setting(
        'ed_page_title',
        array(
            'default'           => $defaults['ed_page_title'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_page_title',
			array(
				'section' => 'singlepage_settings',
				'label'   => __( 'Page Title', 'coachify' ),
			)
		)
	);

    /** Page title alignment */
    $wp_customize->add_setting( 
        'pagetitle_alignment', 
        array(
            'default'           => $defaults['pagetitle_alignment'],
            'sanitize_callback' => 'coachify_sanitize_radio',
            'transport'         => 'postMessage'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Radio_Buttonset_Control(
			$wp_customize,
			'pagetitle_alignment',
			array(
				'section'	  => 'singlepage_settings',
				'label'       => __( 'Title Alignment', 'coachify' ),
				'choices'	  => array(
					'left'   => __( 'Left', 'coachify' ),
					'center' => __( 'Center', 'coachify' ),
					'right'  => __( 'Right', 'coachify' ),
				),
			)
		)
	);

    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_page_featured_image', 
        array(
            'default'           => $defaults['ed_page_featured_image'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_page_featured_image',
			array(
				'section'     => 'singlepage_settings',
				'label'	      => __( 'Show Featured Image', 'coachify' )
			)
		)
	);

    $wp_customize->add_setting(
        'ed_page_comments',
        array(
            'default'           => $defaults['ed_page_comments'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_page_comments',
			array(
				'section' => 'singlepage_settings',
				'label'   => __( 'Show Comments', 'coachify' ),
			)
		)
	);
}
endif;
add_action( 'customize_register', 'coachify_customize_register_singlepage_settings' );