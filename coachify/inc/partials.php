<?php
/**
 * Coachify Customizer Partials
 *
 * @package Coachify
 */

if( ! function_exists( 'coachify_customize_partial_blogname' ) ) :
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function coachify_customize_partial_blogname() {
	bloginfo( 'name' );
}
endif;

if( ! function_exists( 'coachify_customize_partial_blogdescription' ) ) :
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function coachify_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
endif;


if( ! function_exists( 'coachify_header_phone_partial' ) ) :
/**
 * Header Phone
*/
function coachify_header_phone_partial(){    
    $defaults = coachify_get_general_defaults();
    $phone    = get_theme_mod( 'header_phone', $defaults['header_phone'] );
    if( $phone ){ ?>
        <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="coachy-header-phone">
            <?php echo esc_html( $phone ); ?>
        </a>
    <?php
    }
}
endif;

if( ! function_exists( 'coachify_header_email' ) ) :
/**
 * Header Email
*/
function coachify_header_email(){
    $defaults    = coachify_get_general_defaults();
    $email = get_theme_mod( 'header_email', $defaults['header_email'] );
    
    return $email;
}
endif;

if( ! function_exists( 'coachify_header_button_label' ) ) :
/**
 * Header Button
*/
function coachify_header_button_label(){
    $defaults    = coachify_get_general_defaults();
    $phone_label = get_theme_mod( 'header_button_label', $defaults['header_button_label'] );
    
    return $phone_label;
}
endif;

if ( ! function_exists( 'coachify_get_home_text' ) ) :
/**
 * Breadcrumb Home Text
 */
function coachify_get_home_text() {
    $defaults = coachify_get_general_defaults();
    return esc_html( get_theme_mod( 'home_text', $defaults['home_text'] ) );
}
endif;

if( ! function_exists( 'coachify_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function coachify_get_read_more(){
    $defaults = coachify_get_general_defaults();
    return esc_html( get_theme_mod( 'read_more_text', $defaults['read_more_text'] ) );    
}
endif;

if( ! function_exists( 'coachify_get_author_title' ) ) :
/**
 * Display blog readmore button
*/
function coachify_get_author_title(){
    $defaults = coachify_get_general_defaults();
    return esc_html( get_theme_mod( 'author_title', $defaults['author_title'] ) );
}
endif;

if( ! function_exists( 'coachify_get_related_title' ) ) :
/**
 * Display blog readmore button
*/
function coachify_get_related_title(){
    $defaults = coachify_get_general_defaults();
    return esc_html( get_theme_mod( 'related_post_title', $defaults['related_post_title']) );
}
endif;

if( ! function_exists( 'coachify_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function coachify_get_footer_copyright(){
    $defaults  = coachify_get_general_defaults();
    $copyright = get_theme_mod( 'footer_copyright', $defaults['footer_copyright'] );
    echo '<span class="copyright">';
    if( $copyright ){
        if( coachify_pro_is_activated() ){
            echo wp_kses_post( coachify_apply_theme_shortcode( $copyright ) );
        } else {
            echo wp_kses_post( $copyright );
        }
    }else{
        esc_html_e( '&copy; Copyright ', 'coachify' );
        echo date_i18n( esc_html__( 'Y', 'coachify' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'coachify' );
    }
    echo '</span>'; 
}
endif;