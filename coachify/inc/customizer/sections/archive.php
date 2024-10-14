<?php
/**
 * Coachify Archive Page Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_archive_settings' ) ) : 

function coachify_customize_register_archive_settings( $wp_customize ) {
    $defaults      = coachify_get_general_defaults();

    $wp_customize->add_section(
        'archivepage_settings',
        array(
            'title'      => __( 'Archive', 'coachify' ),
            'priority'   => 65,
        )
    );

    /** Archive Header Image */
    $wp_customize->add_setting(
        'header_bg_img',
        array(
            'default'           => $defaults['header_bg_img'],
            'sanitize_callback' => 'coachify_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'header_bg_img',
            array(
                'label'   => __( 'Header Background Image', 'coachify' ),
                'section' => 'archivepage_settings',
                'flex_width'  => true,
                'flex_height' => true,
                'width'       => 1920,
                'height'      => 350
            )
        )
    );

    /** Page Title */
    $wp_customize->add_setting(
        'ed_archive_title',
        array(
            'default'           => $defaults['ed_archive_title'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_archive_title',
			array(
				'section' => 'archivepage_settings',
				'label'   => __( 'Page Title', 'coachify' ),
			)
		)
	);

    /** Blog Page description */
    $wp_customize->add_setting(
        'ed_archive_desc',
        array(
            'default'           => $defaults['ed_archive_desc'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_archive_desc',
			array(
				'section' => 'archivepage_settings',
				'label'   => __( 'Show Description', 'coachify' )
			)
		)
	);

    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => $defaults['ed_prefix_archive'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'archivepage_settings',
				'label'	      => __( 'Hide Archive Prefix', 'coachify' )
			)
		)
	);

    /** Show counts */
    $wp_customize->add_setting( 
        'ed_archive_post_count', 
        array(
            'default'           => $defaults['ed_archive_post_count'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Coachify_Toggle_Control( 
            $wp_customize,
            'ed_archive_post_count',
            array(
                'section'     => 'archivepage_settings',
                'label'	      => __( 'Show Counts', 'coachify' )
            )
        )
    );

    /** Page title alignment */
    $wp_customize->add_setting( 
        'archivetitle_alignment', 
        array(
            'default'           => $defaults['archivetitle_alignment'],
            'sanitize_callback' => 'coachify_sanitize_radio',
            'transport'         => 'postMessage'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Radio_Buttonset_Control(
			$wp_customize,
			'archivetitle_alignment',
			array(
				'section'	  => 'archivepage_settings',
				'label'       => __( 'Title Alignment', 'coachify' ),
				'choices'	  => array(
					'left'   => __( 'Left', 'coachify' ),
					'center' => __( 'Center', 'coachify' ),
					'right'  => __( 'Right', 'coachify' ),
				),
			)
		)
	);
}
endif;
add_action( 'customize_register', 'coachify_customize_register_archive_settings' );