<?php
/**
 * Coachify BlogPage Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_blogpage_settings' ) ) : 

function coachify_customize_register_blogpage_settings( $wp_customize ) {
    $defaults      = coachify_get_general_defaults();

    $wp_customize->add_section(
        'blogpage_settings',
        array(
            'title'      => __( 'Blog Page', 'coachify' ),
            'priority'   => 50,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'blogpage_title_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
			$wp_customize,
			'blogpage_title_text',
			array(
				'section' => 'blogpage_settings',
				'label'   => sprintf(__( '%1$sPage Title%2$s', 'coachify' ), '<span class="chfy-customizer-title">', '</span>'),
			)
		)
    );

    /** Page Title */
    $wp_customize->add_setting(
        'ed_blog_title',
        array(
            'default'           => $defaults['ed_blog_title'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_blog_title',
			array(
				'section' => 'blogpage_settings',
				'label'   => __( 'Show Title', 'coachify' ),
			)
		)
	);

    /** Blog Page description */
    $wp_customize->add_setting(
        'ed_blog_desc',
        array(
            'default'           => $defaults['ed_blog_desc'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_blog_desc',
			array(
				'section' => 'blogpage_settings',
				'label'   => __( 'Show Description', 'coachify' )
			)
		)
	);

    /** Page title alignment */
    $wp_customize->add_setting( 
        'blog_alignment', 
        array(
            'default'           => $defaults['blog_alignment'],
            'sanitize_callback' => 'coachify_sanitize_radio',
            'transport'         => 'postMessage'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Radio_Buttonset_Control(
			$wp_customize,
			'blog_alignment',
			array(
				'section'	  => 'blogpage_settings',
				'label'       => __( 'Horizontal Alignment', 'coachify' ),
				'choices'	  => array(
					'left'   => __( 'Left', 'coachify' ),
					'center' => __( 'Center', 'coachify' ),
					'right'  => __( 'Right', 'coachify' ),
				),
			)
		)
	);

    /** Note */
    $wp_customize->add_setting(
        'blog_post_image_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
			$wp_customize,
			'blog_post_image_text',
			array(
				'section' => 'blogpage_settings',
				'label'   => sprintf(__( '%1$sImage Settings%2$s', 'coachify' ), '<span class="chfy-customizer-title">', '</span>'),
			)
		)
    );

    /** Crop Feature Image */
    $wp_customize->add_setting(
        'blog_crop_image',
        array(
            'default'           => $defaults['blog_crop_image'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'blog_crop_image',
			array(
				'section'     => 'blogpage_settings',
				'label'       => __( 'Crop Featured Image', 'coachify' ),
				'description' => __( 'This setting crops the featured image to recommended size. If set to false, it displays the image exactly as uploaded.', 'coachify' )
            )
		)
	);

    /** Image Radius */    
    $wp_customize->add_setting(
        'blog_img_radius[top]',
        array(
            'default'           => $defaults['blog_img_radius']['top'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'blog_img_radius[right]',
        array(
            'default'           => $defaults['blog_img_radius']['right'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'blog_img_radius[bottom]',
        array(
            'default'           => $defaults['blog_img_radius']['bottom'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'blog_img_radius[left]',
        array(
            'default'           => $defaults['blog_img_radius']['left'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );   

    $wp_customize->add_control(
        new Coachify_Spacing_Control(
            $wp_customize,
            'blog_img_radius',
            array(
                'type'     => 'coachify-spacing',
                'label'    => __( 'Border Radius', 'coachify' ),
                'section'  => 'blogpage_settings',
                'settings' => array(
                    'desktop_top'    => 'blog_img_radius[top]',
                    'desktop_right'  => 'blog_img_radius[right]',
                    'desktop_bottom' => 'blog_img_radius[bottom]',
                    'desktop_left'   => 'blog_img_radius[left]',
                ),
                'element'  => 'button',
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'blogpage_post_set_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
			$wp_customize,
			'blogpage_post_set_text',
			array(
				'section' => 'blogpage_settings',
				'label'   => sprintf(__( '%1$sPosts Settings%2$s', 'coachify' ), '<span class="chfy-customizer-title">', '</span>'),
			)
		)
    );

    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'blog_content', 
        array(
            'default'           => $defaults['blog_content'],
            'sanitize_callback' => 'coachify_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Radio_Buttonset_Control( 
			$wp_customize,
			'blog_content',
			array(
				'section'     => 'blogpage_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'coachify' ),
                'choices'	  => array(
					'excerpt' => __( 'Excerpt', 'coachify' ),
					'content' => __( 'Full Content', 'coachify' )
				),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => $defaults['excerpt_length'],
            'sanitize_callback' => 'coachify_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Range_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'blogpage_settings',
				'label'		  => __( 'Excerpt Length', 'coachify' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'coachify' ),
                'settings'      => array(
                    'desktop' => 'excerpt_length',
                ),
                'choices'	  => array(
                    'desktop' => array(
                        'min' 	=> 10,
                        'max' 	=> 100,
                        'step'	=> 5,
                        'edit'  => true,
                        'unit'  => ''
                    )
				)                 
			)
		)
	);
    
    /** Meta Order */
    $wp_customize->add_setting(
		'blog_meta_order', 
		array(
			'default'           => $defaults['blog_meta_order'], 
			'sanitize_callback' => 'coachify_sanitize_sortable',
		)
	);

	$wp_customize->add_control(
		new Coachify_Sortable_Control(
			$wp_customize,
			'blog_meta_order',
			array(
				'section' => 'blogpage_settings',
				'label'   => __( 'Meta Order', 'coachify' ),
				'choices' => array(
                    'author'       => __( 'Author', 'coachify' ),
                    'date'         => __( 'Date', 'coachify' ),
                    'comment'      => __( 'Comment', 'coachify' ),
                    'reading-time' => __( 'Reading Time', 'coachify' )
                ),
			)
		)
    );

    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => $defaults['read_more_text'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );

    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'blogpage_settings',
            'label'   => __( 'Read More Label', 'coachify' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-tertiary',
        'render_callback' => 'coachify_get_read_more',
    ) );
}
endif;
add_action( 'customize_register', 'coachify_customize_register_blogpage_settings' );