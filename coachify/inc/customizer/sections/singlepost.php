<?php
/**
 * Coachify Single Post Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_singlepost_settings' ) ) : 

function coachify_customize_register_singlepost_settings( $wp_customize ) {
    $defaults      = coachify_get_general_defaults();

    $wp_customize->add_section(
        'singlepost_settings',
        array(
            'title'      => __( 'Single Post', 'coachify' ),
            'priority'   => 55,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'single_post_image_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
			$wp_customize,
			'single_post_image_text',
			array(
				'section' => 'singlepost_settings',
				'label'   => sprintf(__( '%1$sImage Settings%2$s', 'coachify' ), '<span class="chfy-customizer-title">', '</span>'),
			)
		)
    );

    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_post_featured_image', 
        array(
            'default'           => $defaults['ed_post_featured_image'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_post_featured_image',
			array(
				'section'     => 'singlepost_settings',
				'label'	      => __( 'Show Featured Image', 'coachify' )
			)
		)
	);
    
    /** Crop Feature Image */
    $wp_customize->add_setting(
        'post_crop_image',
        array(
            'default'           => $defaults['post_crop_image'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'post_crop_image',
			array(
				'section'         => 'singlepost_settings',
				'label'           => __( 'Crop Featured Image', 'coachify' ),
				'description'     => __( 'This setting crops the featured image to recommended size. If set to false, it displays the image exactly as uploaded.', 'coachify' ),
				'active_callback' => 'coachify_single_post_ac'
            )
		)
	);

    /** Image Radius */    
    $wp_customize->add_setting(
        'single_img_radius[top]',
        array(
            'default'           => $defaults['single_img_radius']['top'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'single_img_radius[right]',
        array(
            'default'           => $defaults['single_img_radius']['right'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'single_img_radius[bottom]',
        array(
            'default'           => $defaults['single_img_radius']['bottom'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'single_img_radius[left]',
        array(
            'default'           => $defaults['single_img_radius']['left'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );   

    $wp_customize->add_control(
        new Coachify_Spacing_Control(
            $wp_customize,
            'single_img_radius',
            array(
                'type'     => 'coachify-spacing',
                'label'    => __( 'Border Radius', 'coachify' ),
                'section'  => 'singlepost_settings',
                'settings' => array(
                    'desktop_top'    => 'single_img_radius[top]',
                    'desktop_right'  => 'single_img_radius[right]',
                    'desktop_bottom' => 'single_img_radius[bottom]',
                    'desktop_left'   => 'single_img_radius[left]',
                ),
                'element'  => 'button',
				'active_callback' => 'coachify_single_post_ac'
            )
        )
    );

    /** Meta Order */
    $wp_customize->add_setting(
		'post_meta_order', 
		array(
			'default'           => $defaults['post_meta_order'], 
			'sanitize_callback' => 'coachify_sanitize_sortable',
		)
	);

	$wp_customize->add_control(
		new Coachify_Sortable_Control(
			$wp_customize,
			'post_meta_order',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Post Meta Settings', 'coachify' ),
				'choices' => array(
                    'author'       => __( 'Author', 'coachify' ),
                    'date'         => __( 'Date', 'coachify' ),
                    'comment'      => __( 'Comment', 'coachify' ),
                    'reading-time' => __( 'Reading Time', 'coachify' )
                ),
			)
		)
    );

    $wp_customize->add_setting( 
        'read_words_per_minute', 
        array(
            'default'           => $defaults['read_words_per_minute'],
            'sanitize_callback' => 'coachify_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Coachify_Range_Slider_Control( 
            $wp_customize,
            'read_words_per_minute',
            array(
                'label'       => __( 'Read Words Per Minute', 'coachify' ),
                'section'     => 'singlepost_settings',
                'description' => __( 'Blog Posts Content Words Reading Speed Per Minute.', 'coachify' ),
                'settings'      => array(
                    'desktop'   => 'read_words_per_minute'
                ),
                'choices'     => array(
                    'desktop' => array(
                        'min'   => 100,
                        'max'   => 1000,
                        'step'  => 10,
                        'edit'  => true,
                        'unit'  => ''
                    )
                    ),                 
                'active_callback' => 'coachify_read_words_per_min_ac'
            )
        )
    );
    
    /** Show Post Category */
    $wp_customize->add_setting( 
        'ed_post_category', 
        array(
            'default'           => $defaults['ed_post_category'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control(
			$wp_customize,
			'ed_post_category',
			array(
				'section'	  => 'singlepost_settings',
				'label'       => __( 'Show Category', 'coachify' )
			)
		)
	);

    /** Post Tags */
    $wp_customize->add_setting(
        'ed_post_tags',
        array(
            'default'           => $defaults['ed_post_tags'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_post_tags',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Show Post Tags', 'coachify' ),
			)
		)
	);

    /** Show Post Pagination */
    $wp_customize->add_setting( 
        'ed_post_pagination', 
        array(
            'default'           => $defaults['ed_post_pagination'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control(
			$wp_customize,
			'ed_post_pagination',
			array(
				'section'	  => 'singlepost_settings',
				'label'       => __( 'Show Pagination', 'coachify' )
			)
		)
	);
    
    /** Show Author Section */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => $defaults['ed_author'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'singlepost_settings',
				'label'	      => __( 'Show Author Box', 'coachify' )
			)
		)
	);
    
    /** Author Section title */
    $wp_customize->add_setting(
        'author_title',
        array(
            'default'           => $defaults['author_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );

    $wp_customize->add_control(
        'author_title',
        array(
            'type'            => 'text',
            'section'         => 'singlepost_settings',
            'label'           => __( 'Author Section Title', 'coachify' ),
            'active_callback' => 'coachify_author_section_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'author_title', array(
        'selector' => '.author-section .sub-title',
        'render_callback' => 'coachify_get_author_title',
    ) );

    /** Note */
    $wp_customize->add_setting(
        'related_post_title_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
			$wp_customize,
			'related_post_title_text',
			array(
				'section' => 'singlepost_settings',
				'label'   => sprintf(__( '%1$sRelated Post Settings%2$s', 'coachify' ), '<span class="chfy-customizer-title">', '</span>'),
			)
		)
    );

    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => $defaults['ed_related'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'singlepost_settings',
				'label'	      => __( 'Show Related Posts', 'coachify' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => $defaults['related_post_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'singlepost_settings',
            'label'           => __( 'Related Posts Section Title', 'coachify' ),
            'active_callback' => 'coachify_related_post_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.single-post .related-posts .title',
        'render_callback' => 'coachify_get_related_title',
    ) );

    /** Image Radius */    
    $wp_customize->add_setting(
        'related_img_radius[top]',
        array(
            'default'           => $defaults['related_img_radius']['top'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'related_img_radius[right]',
        array(
            'default'           => $defaults['related_img_radius']['right'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'related_img_radius[bottom]',
        array(
            'default'           => $defaults['related_img_radius']['bottom'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'related_img_radius[left]',
        array(
            'default'           => $defaults['related_img_radius']['left'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );   

    $wp_customize->add_control(
        new Coachify_Spacing_Control(
            $wp_customize,
            'related_img_radius',
            array(
                'type'     => 'coachify-spacing',
                'label'    => __( 'Image Border Radius', 'coachify' ),
                'section'  => 'singlepost_settings',
                'settings' => array(
                    'desktop_top'    => 'related_img_radius[top]',
                    'desktop_right'  => 'related_img_radius[right]',
                    'desktop_bottom' => 'related_img_radius[bottom]',
                    'desktop_left'   => 'related_img_radius[left]',
                ),
                'element'  => 'button',
            )
        )
    );

    /** Number of Posts */
    $wp_customize->add_setting(
        'no_of_posts_rp',
        array(
            'default'           => $defaults['no_of_posts_rp'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'no_of_posts_rp',
            array(
                'label'           => __( 'Number of Posts', 'coachify' ),
                'section'         => 'singlepost_settings',
                'active_callback' => 'coachify_related_post_ac',
                'settings'        => array(  'desktop' => 'no_of_posts_rp' ),
                'choices'         => array(
                    'desktop' => array(
                        'min'  => 3,
                        'max'  => 9,
                        'step' => 3,
                        'edit' => false,
                        'unit' => '',
                    ),
                ),
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'comment_title_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Coachify_Note_Control( 
            $wp_customize,
            'comment_title_text',
            array(
                'section' => 'singlepost_settings',
                'label'   => sprintf(__( '%1$sComment Settings%2$s', 'coachify' ), '<span class="chfy-customizer-title">', '</span>'),
            )
        )
    );

    $wp_customize->add_setting(
        'ed_post_comments',
        array(
            'default'           => $defaults['ed_post_comments'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_post_comments',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Show Comments', 'coachify' ),
			)
		)
	);

    /** Comment Form */    
    $wp_customize->add_setting( 
        'single_comment_form', 
        array(
            'default'           => $defaults['single_comment_form'],
            'sanitize_callback' => 'coachify_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Radio_Buttonset_Control(
			$wp_customize,
			'single_comment_form',
			array(
				'section' => 'singlepost_settings',
				'label'   => __( 'Comment Form', 'coachify' ),
				'choices' => array(
					'above' => __( 'Above', 'coachify' ),
					'below' => __( 'Below', 'coachify' ),
				),
                'description'     => __( 'Move the comment form above or below the comments.', 'coachify' ),
                'active_callback' => 'coachify_post_comment_ac'
			)
		)
	);

    /** Comments Below Post Content */
    $wp_customize->add_setting(
        'toggle_comments',
        array(
            'default'           => $defaults['toggle_comments'],
            'sanitize_callback' => 'coachify_sanitize_radio',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Radio_Buttonset_Control(
			$wp_customize,
			'toggle_comments',
			array(
				'section'	  => 'singlepost_settings',
				'label'       => __( 'Comment Location', 'coachify' ),
				'choices'	  => array(
					'below-post' => __( 'Below Post', 'coachify' ),
					'end-post'   => __( 'At End', 'coachify' ),
				),
				'active_callback' => 'coachify_post_comment_ac'
			)
		)
	);
    /** Posts(Blog) & Pages Settings Ends */
}
endif;
add_action( 'customize_register', 'coachify_customize_register_singlepost_settings' );