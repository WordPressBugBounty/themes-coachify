<?php
/**
 * Coachify Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Coachify
 */
if ( ! function_exists('coachify_widgets_init') ) :

function coachify_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'coachify' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'coachify' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'coachify' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'coachify' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'coachify' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'coachify' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'coachify' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'coachify' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'coachify' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'coachify' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
            'name'          => esc_html( $sidebar['name'] ),
            'id'            => esc_attr( $sidebar['id'] ),
            'description'   => esc_html( $sidebar['description'] ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title" itemprop="name">',
            'after_title'   => '</h2>',
        ) );
    }
}
endif;
add_action( 'widgets_init', 'coachify_widgets_init' );