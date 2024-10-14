<?php
/**
 * Helper functions for elementor widgets
 * 
 * @package Coachify
 */

if( ! function_exists( 'coachify_add_theme_colors' ) ) :
/**
 * Coachify Theme Colors
 *
 * @param [type] $response
 * @param [type] $handler
 * @param [type] $request
 * @return void
 */
function coachify_add_theme_colors( $response, $handler, $request ){

    $defaults               = coachify_get_color_defaults();
    $primary_color          = get_theme_mod( 'primary_color', $defaults['primary_color'] );
    $secondary_color        = get_theme_mod( 'secondary_color', $defaults['secondary_color'] );
    $body_font_color        = get_theme_mod( 'body_font_color', $defaults['body_font_color'] );
    $heading_color          = get_theme_mod( 'heading_color', $defaults['heading_color'] );
    $primary_accent_color   = get_theme_mod( 'primary_accent_color', $defaults['primary_accent_color'] );
    $secondary_accent_color = get_theme_mod( 'secondary_accent_color', $defaults['secondary_accent_color'] );
    $tertiary_accent_color  = get_theme_mod( 'tertiary_accent_color', $defaults['tertiary_accent_color'] );
    $route                  = $request->get_route();

    if ( '/elementor/v1/globals' != $route ) {
        return $response;
    }

    $data = $response->get_data();
    
    $data['colors']['primary_color'] = array(
        'id'    => 'primary_color',
        'title' => __( 'Primary Color', 'coachify' ),
        'value' => $primary_color,
    );

    $data['colors']['secondary_color'] = array(
        'id'    => 'secondary_color',
        'title' => __( 'Secondary Color', 'coachify' ),
        'value' => $secondary_color,
    );

    $data['colors']['body_font_color'] = array(
        'id'    => 'body_font_color',
        'title' => __( 'Font Color', 'coachify' ),
        'value' => $body_font_color,
    );

    $data['colors']['heading_color'] = array(
        'id'    => 'heading_color',
        'title' => __( 'Heading Color', 'coachify' ),
        'value' => $heading_color,
    );

    $data['colors']['primary_accent_color'] = array(
        'id'    => 'primary_accent_color',
        'title' => __( 'Primary Accent', 'coachify' ),
        'value' => $primary_accent_color,
    );

    $data['colors']['secondary_accent_color'] = array(
        'id'    => 'secondary_accent_color',
        'title' => __( 'Secondary Accent', 'coachify' ),
        'value' => $secondary_accent_color,
    );

    $data['colors']['tertiary_accent_color'] = array(
        'id'    => 'tertiary_accent_color',
        'title' => __( 'Tertiary Accent', 'coachify' ),
        'value' => $tertiary_accent_color,
    );

    $response->set_data( $data );

    return $response;
}
endif;
add_action( 'rest_request_after_callbacks', 'coachify_add_theme_colors', 999, 3 );
    
if( ! function_exists( 'coachify_display_global_colors_elementor' ) ) :
    /**
     * Displays frontend Elementor colors function
     *
     * @param [type] $response
     * @param [type] $handler
     * @param [type] $request
     * @return void
     */
    function coachify_display_global_colors_elementor( $response, $handler, $request ) {
        
        $defaults               = coachify_get_color_defaults();
        $primary_color          = get_theme_mod( 'primary_color', $defaults['primary_color'] );
        $secondary_color        = get_theme_mod( 'secondary_color', $defaults['secondary_color'] );
        $body_font_color        = get_theme_mod( 'body_font_color', $defaults['body_font_color'] );
        $heading_color          = get_theme_mod( 'heading_color', $defaults['heading_color'] );
        $primary_accent_color   = get_theme_mod( 'primary_accent_color', $defaults['primary_accent_color'] );
        $secondary_accent_color = get_theme_mod( 'secondary_accent_color', $defaults['secondary_accent_color'] );
        $tertiary_accent_color  = get_theme_mod( 'tertiary_accent_color', $defaults['tertiary_accent_color'] );

        $route = $request->get_route();
    
        if ( 0 !== strpos( $route, '/elementor/v1/globals' ) ) {
            return $response;
        }
    
        $slug_map = array();
    
        $slug_map['primary_color']          = 0;
        $slug_map['secondary_color']        = 1;
        $slug_map['body_font_color']        = 2;
        $slug_map['heading_color']          = 3;
        $slug_map['primary_accent_color']   = 4;
        $slug_map['secondary_accent_color'] = 5;
        $slug_map['tertiary_accent_color']  = 6;
        
        $rest_id = substr( $route, strrpos( $route, '/' ) + 1 );
    
        if ( ! in_array( $rest_id, array_keys( $slug_map ), true ) ) {
            return $response;
        }

        $response = rest_ensure_response(
            array(
                'id'    => 'primary_color',
                'title' => 'primary_color',
                'value' => $primary_color,
            ),

            array(
                'id'    => 'secondary_color',
                'title' => 'secondary_color',
                'value' => $secondary_color,
            ),

            array(
                'id'    => 'body_font_color',
                'title' => 'body_font_color',
                'value' => $body_font_color,
            ),

            array(
                'id'    => 'heading_color',
                'title' => 'heading_color',
                'value' => $heading_color,
            ),

            array(
                'id'    => 'primary_accent_color',
                'title' => 'primary_accent_color',
                'value' => $primary_accent_color,
            ),

            array(
                'id'    => 'secondary_accent_color',
                'title' => 'secondary_accent_color',
                'value' => $secondary_accent_color,
            ),

            array(
                'id'    => 'tertiary_accent_color',
                'title' => 'tertiary_accent_color',
                'value' => $tertiary_accent_color,
            )
            
        );
        return $response;
    }
endif;
add_action( 'rest_request_after_callbacks', 'coachify_display_global_colors_elementor', 999, 3 );

if( coachify_is_elementor_activated() ){
    
    /** Disable Default Colours and Default Fonts of elementor on Theme Activation*/
    $fresh     = get_option( 'coachify_flag' );
    if( ! $fresh ){
        update_option('elementor_disable_color_schemes', 'yes');
        update_option('elementor_disable_typography_schemes', 'yes');
        update_option( 'coachify_flag', true ); 
        update_option( 'elementor_experiment-container', 'active' ); 
    }

    $gridContainer = get_option( 'coachify_flag_grid_container' );
    if( ! $gridContainer ){
        update_option( 'elementor_experiment-container_grid', 'active' ); 
    }
}