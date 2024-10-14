<?php
/**
 * Title Setting
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_titleofcustomizer_section' ) ) : 

function coachify_customize_register_titleofcustomizer_section( $wp_customize ) {

    $wp_customize->add_section(
		new Coachify_Group_Title(
			$wp_customize,
			'core',
            array(
                'title'    => __( 'Core', 'coachify' ),
                'priority' => 99,
            )
		)
	);

	$wp_customize->add_section(
		new Coachify_Group_Title(
			$wp_customize,
			'general',
            array(
                'title' => __( 'General Settings', 'coachify' ),
				'priority' => 5,
            )
		)
	);

	$wp_customize->add_section(
		new Coachify_Group_Title(
			$wp_customize,
			'posts',
            array(
                'title' => __( 'Posts and Pages', 'coachify' ),
				'priority' => 45,
            )
		)
	);

	if( coachify_pro_is_activated() ){
		$wp_customize->add_section(
			new Coachify_Group_Title(
				$wp_customize,
				'misc_settings',
				array(
					'title' => __( 'Additional Settings', 'coachify' ),
					'priority' => 70,
				)
			)
		);
	}

}
endif;
add_action( 'customize_register', 'coachify_customize_register_titleofcustomizer_section' );