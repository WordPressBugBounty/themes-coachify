<?php
/**
 * Active Callback
 * 
 * @package Coachify
*/

if( ! function_exists( 'coachify_scroll_to_top_ac' ) ) :
/**
 * Active Callback for Scroll to top button
*/
function coachify_scroll_to_top_ac($control){
    $ed_scroll_top = $control->manager->get_setting( 'ed_scroll_top' )->value();
    
    if ( $ed_scroll_top ) return true;
    
    return false;
}
endif;

if( ! function_exists( 'coachify_header_width_ac' ) ) :
/**
 * Active Callback for Scroll to top button
*/
function coachify_header_width_ac($control){
    $ed_header_width = $control->manager->get_setting( 'header_width_layout' )->value();
    
    if ( $ed_header_width == 'custom' ) return true;
    
    return false;
}
endif;


if( ! function_exists( 'coachify_performance_fonts' ) ) :
/**
*Fonts Performance Active Callback 
*/
function coachify_performance_fonts( $control ){
    $ed_google_fonts_locally  = $control->manager->get_setting( 'ed_localgoogle_fonts' )->value();
    $control_id               = $control->id;
    
    if ( $control_id == 'ed_preload_local_fonts' && $ed_google_fonts_locally === true ) return true;
    if ( $control_id == 'flush_google_fonts' && $ed_google_fonts_locally === true) return true;

    return false;
}
endif;

if( ! function_exists( 'coachify_seo_breadcrumb_ac' ) ) :
/**
* Breadcrumb Active Callback 
*/
function coachify_seo_breadcrumb_ac( $control ){
    $control_id  = $control->id;
    $ed_breadcrumb = $control->manager->get_setting( 'ed_breadcrumb' )->value();

    if( $control_id == 'home_text' && $ed_breadcrumb == true) return true;
    if( $control_id == 'separator_icon' && $ed_breadcrumb == true) return true;

    return false;
}
endif;

if( ! function_exists( 'coachify_read_words_per_min_ac' ) ) :
/**
* Blog page read words per minute callback 
*/
function coachify_read_words_per_min_ac( $control ){
    $control_id      = $control->id;
    $blog_meta_order = $control->manager->get_setting( 'blog_meta_order' )->value();

    if( $control_id == 'read_words_per_minute' && in_array( 'reading-time', $blog_meta_order ) ) return true;

    return false;
}
endif;

if( ! function_exists( 'coachify_single_post_ac' ) ) :
/**
 * Active Callback for single post image settings
*/
function coachify_single_post_ac( $control ){
    
    $ed_feat_img = $control->manager->get_setting( 'ed_post_featured_image' )->value();
    $control_id  = $control->id;

    if ( $control_id == 'post_crop_image' && $ed_feat_img ) return true;
    if ( $control_id == 'single_img_radius' && $ed_feat_img ) return true;

    return false;
}
endif;

if( ! function_exists( 'coachify_related_post_ac' ) ) :
/**
 * Active Callback for related posts
*/
function coachify_related_post_ac( $control ){
    
    $ed_related_post = $control->manager->get_setting( 'ed_related' )->value();
    $control_id      = $control->id;

    if ( $control_id == 'related_post_title' && $ed_related_post ) return true;
    if ( $control_id == 'no_of_posts_rp' && $ed_related_post ) return true;
}
endif;

if( ! function_exists( 'coachify_post_comment_ac' ) ) :
/**
 * Active Callback for comment toggle
*/
function coachify_post_comment_ac( $control ){
    $ed_comment = $control->manager->get_setting( 'ed_post_comments' )->value();
    $control_id = $control->id;

    if ( $control_id == 'toggle_comments' && $ed_comment == true ) return true;
    if ( $control_id == 'single_comment_form' && $ed_comment == true ) return true;
    
    return false;
}
endif;

if( ! function_exists( 'coachify_author_section_ac' ) ) :
/**
 * Active Callback for author box
*/
function coachify_author_section_ac( $control ){
    $ed_author = $control->manager->get_setting( 'ed_author' )->value();
    $control_id = $control->id;

    if ( $control_id == 'author_title' && $ed_author == true ) return true;
    
    return false;
}
endif;

if( ! function_exists( 'coachify_social_media_ac' ) ) :
/**
 * Active Callback for social media
*/
function coachify_social_media_ac( $control ){
    $ed_social_media = $control->manager->get_setting( 'ed_social_links' )->value();
    $control_id = $control->id;

    if ( $control_id == 'ed_social_links_new_tab' && $ed_social_media == true ) return true;
    if ( $control_id == 'social_media_order' && $ed_social_media == true ) return true;
    if ( $control_id == 'header_social_media_text' && $ed_social_media == true ) return true;
    
    return false;
}
endif;

if ( ! function_exists( 'coachify_error_ac' ) ) : 
/**
 * Active Callback for 404 page
*/
function coachify_error_ac( $control ){
    $ed_latest_post = $control->manager->get_setting( 'ed_latest_post' )->value();
    $control_id     = $control->id;

    if ( $control_id == 'no_of_posts_404' && $ed_latest_post ) return true;
    if ( $control_id == 'posts_per_row_404' && $ed_latest_post ) return true;

    return false;
}
endif;

if ( ! function_exists( 'coachify_instagram_ac' ) ) : 
/**
 * Active Callback for Instagram Section
 *
 * @param [type] $control
 * @return void
 */
function coachify_instagram_ac( $control ){
    $ed_instagram = $control->manager->get_setting( 'ed_instagram' )->value();
    $control_id     = $control->id;

    if ( $control_id == 'instagram_shortcode' && $ed_instagram ) return true;
    if ( $control_id == 'ed_home_only_instagram' && $ed_instagram ) return true;
    if ( $control_id == 'instagram_text' && $ed_instagram ) return true;

    return false;
}
endif;