<?php
/**
 * Coachify Custom Control
 * 
 * @package Coachify
*/

if( ! function_exists( 'coachify_register_custom_controls' ) ) :
/**
 * Register Custom Controls
 * @return void
*/
function coachify_register_custom_controls( $wp_customize ){    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    require_once get_template_directory() . '/inc/custom-controls/typography/class-typography-control.php';
    require_once get_template_directory() . '/inc/custom-controls/coloralpha/class-color-alpha-control.php';
    require_once get_template_directory() . '/inc/custom-controls/group/class-group-control.php';    
    require_once get_template_directory() . '/inc/custom-controls/range/class-range-control.php';
    require_once get_template_directory() . '/inc/custom-controls/grouptitle/class-group-title.php';
    require_once get_template_directory() . '/inc/custom-controls/spacing/class-spacing-control.php';
    require_once get_template_directory() . '/inc/custom-controls/tabs/class-customizer-tabs-control.php';
    require_once get_template_directory() . '/inc/custom-controls/sortable/class-sortable-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radiobtn/class-radio-buttonset-control.php';
    
    // Register the control type.
    $wp_customize->register_control_type( 'Coachify_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Coachify_Toggle_Control' );
    $wp_customize->register_control_type( 'Coachify_Typography_Customize_Control' );
    $wp_customize->register_control_type( 'Coachify_Alpha_Color_Customize_Control' ); 
    $wp_customize->register_control_type( 'Coachify_Group_Control' );
    $wp_customize->register_control_type( 'Coachify_Range_Slider_Control' );
    $wp_customize->register_control_type( 'Coachify_Spacing_Control' );
    $wp_customize->register_control_type( 'Coachify_Sortable_Control' ); 
    $wp_customize->register_control_type( 'Coachify_Radio_Buttonset_Control' );

}
endif;
add_action( 'customize_register', 'coachify_register_custom_controls' );