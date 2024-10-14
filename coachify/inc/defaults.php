<?php
/**
 * Customizer Settings Defaults 
 * 
 * @package Coachify
 */

if( ! function_exists( 'coachify_get_site_defaults' ) ) :
/**
 * Site Defaults
 * 
 * @return array
 */
function coachify_get_site_defaults(){

    $defaults = array(
        'hide_title'        => false,
        'hide_tagline'      => true,
        'logo_width'        => '150',
        'tablet_logo_width' => '150',
        'mobile_logo_width' => '150',
    );

    return apply_filters( 'coachify_site_options_defaults', $defaults );
}
endif;

if( ! function_exists( 'coachify_get_typography_defaults' ) ) :
/**
 * Typography Defaults
 * 
 * @return array
 */
function coachify_get_typography_defaults(){
    $defaults = array(   
        'primary_font' => array(
            'family'         => 'System Stack',
            'variants'       => '',
            'category'       => '',
            'weight'         => '400',
            'transform'      => 'none',
            'desktop' => array(
                'font_size'      => 18,
                'line_height'    => 1.56,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 18,
                'line_height'    => 1.56,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 18,
                'line_height'    => 1.56,
                'letter_spacing' => 0,
            )
        ),
        'site_title' => array(
            'family'    => 'Default Family',
            'variants'  => '',
            'category'  => '',
            'weight'    => 'bold',
            'transform' => 'none',
            'desktop' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0
            ),
            'tablet' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            )
        ),
        'button' => array(
            'family'         => 'Default Family',
            'variants'       => '',
            'category'       => '',
            'weight'         => '400',
            'transform'      => 'none',
            'desktop' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'heading_one' => array(
            'family'      => 'System Stack',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 48,
                'line_height'    => 1.17,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 40,
                'line_height'    => 1.17,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 36,
                'line_height'    => 1.17,
                'letter_spacing' => 0,
            )
        ),
        'heading_two' => array(
            'family'      => 'System Stack',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 40,
                'line_height'    => 1.2,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 32,
                'line_height'    => 1.2,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 30,
                'line_height'    => 1.2,
                'letter_spacing' => 0,
            )
        ),
        'heading_three' => array(
            'family'      => 'System Stack',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 32,
                'line_height'    => 1.2,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 26,
                'line_height'    => 1.2,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 24,
                'line_height'    => 1.2,
                'letter_spacing' => 0,
            )
        ),
        'heading_four' => array(
            'family'      => 'System Stack',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 24,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 22,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            )
        ),
        'heading_five' => array(
            'family'      => 'System Stack',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 24,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 22,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 20,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'heading_six' => array(
            'family'      => 'System Stack',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 18,
                'line_height'    => 1.23,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 18,
                'line_height'    => 1.23,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 18,
                'line_height'    => 1.23,
                'letter_spacing' => 0,
            )
        ),
        'accent_font' => array(
            'family'         => 'Default Family',
            'variants'       => '',
            'category'       => '',
            'weight'         => '400',
            'transform'      => 'none',
            'desktop' => array(
                'font_size'      => 18,
                'line_height'    => 1.56,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 18,
                'line_height'    => 1.56,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 18,
                'line_height'    => 1.56,
                'letter_spacing' => 0,
            )
        )
    );

    return apply_filters( 'coachify_typography_options_defaults', $defaults ); 
}
endif;

if( ! function_exists( 'coachify_get_color_defaults' ) ) :
/**
 * Color Defaults
 * 
 * @return array
 */
function coachify_get_color_defaults(){
    $defaults = array(
        'primary_color'              => '#E75387',
        'secondary_color'            => '#407977',
        'body_font_color'            => '#3D4562',
        'heading_color'              => '#0D173B',
        'primary_accent_color'       => 'rgba(231, 83, 135, 0.2)',
        'secondary_accent_color'     => 'rgba(64, 121, 119, 0.2)',
        'tertiary_accent_color'      => '#FEFCF8',
        'site_bg_color'              => '#FFFFFF',
        'site_title_color'           => '#000000',
        'site_tagline_color'         => '#333333',
        'btn_text_color_initial'     => '#FFFFFF',
        'btn_text_color_hover'       => '#FFFFFF',
        'btn_bg_color_initial'       => '#E75387',
        'btn_bg_color_hover'         => '#407977',
        'btn_border_color_initial'   => '',
        'btn_border_color_hover'     => '',
        'header_btn_text_color'      => '#FFFFFF',
        'header_btn_bg_color'        => '#E75387',
        'header_btn_border_color'    => '#E75387',
        'foot_text_color'            => 'rgb(0,0,0)',
        'foot_bg_color'              => '#ffffff',
        'foot_widget_heading_color'  => '#000000',
        'foot_copyright_text_color'  => '#3D4562',
        'foot_copyright_bg_color'    => '#EEEEEE',
    );
    return apply_filters( 'coachify_color_options_defaults', $defaults );
}
endif;

if( ! function_exists( 'coachify_get_button_defaults' ) ) :
/**
 * Button Defaults
 * 
 * @return array
 */
function coachify_get_button_defaults(){

    $defaults = array(
        'button_roundness' => array(
            'top'    => 0,
            'right'  => 0,
            'bottom' => 0,
            'left'   => 0,
        ),
        'button_padding'   => array(
            'top'    => 16,
            'right'  => 32,
            'bottom' => 16,
            'left'   => 32,
        ),
        'header_button_roundness' => array(
            'top'    => 100,
            'right'  => 100,
            'bottom' => 100,
            'left'   => 100,
        ),
        'header_button_padding'   => array(
            'top'    => 14,
            'right'  => 20,
            'bottom' => 14,
            'left'   => 20,
        )
    );

    return apply_filters( 'coachify_button_options_defaults', $defaults );
}
endif;

if( ! function_exists( 'coachify_get_general_defaults' ) ) :
/**
 * General Defaults
 * 
 * @return array
 */
function coachify_get_general_defaults(){

    $defaults = array(
        'container_width'           => 1170,
        'tablet_container_width'    => 992,
        'mobile_container_width'    => 420,
        'fullwidth_centered'        => 780,
        'tablet_fullwidth_centered' => 780,
        'mobile_fullwidth_centered' => 780,
        'sidebar_width'             => 30,
        'widgets_spacing'           => 32,
        'tablet_widgets_spacing'    => 32,
        'mobile_widgets_spacing'    => 20,
        'foot_top_spacing'          => 56,
        'tablet_foot_top_spacing'   => 56,
        'mobile_foot_top_spacing'   => 56,
        'ed_last_widget_sticky'     => false,
        'ed_scroll_top'             => true,
        'scroll_top_size'           => 20,
        'tablet_scroll_top_size'    => 20,
        'mobile_scroll_top_size'    => 20,
        'ed_localgoogle_fonts'      => false,
        'ed_preload_local_fonts'    => false,
        'page_sidebar_layout'       => 'right-sidebar',
        'post_sidebar_layout'       => 'right-sidebar',
        'layout_style'              => 'no-sidebar',
        'ed_header_search'          => false,
        'ed_woo_cart'               => false,
        'header_width_layout'       => 'boxed',
        'header_width_custom'       => '1170',
        'header_items_spacing'      => 40,
        'header_strech_menu'        => false,
        'header_dropdown_width'     => 200,
        'header_button_label'       => '',
        'header_button_url'         => '',
        'header_phone'              => '',
        'header_email'              => '',
        'ed_social_links'           => false,
        'ed_social_links_new_tab'   => true,
        'social_media_order'        => array( 'chfy_facebook', 'chfy_twitter', 'chfy_instagram'),
        'chfy_facebook'             => '#',
        'chfy_twitter'              => '#',
        'chfy_instagram'            => '#',
        'chfy_pinterest'            => '',
        'chfy_youtube'              => '',
        'chfy_tiktok'               => '',
        'chfy_linkedin'             => '',
        'chfy_whatsapp'             => '',
        'chfy_viber'                => '',
        'chfy_telegram'             => '',
        'chfy_ok'                   => '',
        'chfy_vk'                   => '',
        'error_image'               => esc_url( get_template_directory_uri() . '/assets/images/error-404.jpg' ),
		'ed_latest_post'            => true,
		'no_of_posts_404'           => 3,
		'posts_per_row_404'         => 3,
        'footer_copyright'          => '',
        'ed_breadcrumb'             => true,
        'home_text'                 => __( 'Home', 'coachify' ),
        'separator_icon'            => 'one',
        'ed_post_update_date'       => true,
        'ed_instagram'              => false,
        'ed_home_only_instagram'    => false,
        'instagram_shortcode'       => '[instagram-feed]',
        'ed_blog_title'             => true,
        'ed_blog_desc'              => false,
        'blog_alignment'            => 'left',
        'blog_crop_image'           => true,
        'blog_content'              => 'excerpt',
        'excerpt_length'            => 20,
        'read_more_text'            => __( 'Read More', 'coachify' ),
        'blog_meta_order'           => array( 'author', 'date' ),
        'ed_post_featured_image'    => true,
        'post_crop_image'           => true,
        'post_meta_order'           => array( 'date', 'reading-time' ),
        'read_words_per_minute'     => 200,
        'ed_post_tags'              => true,
        'ed_post_category'          => true,
        'ed_post_pagination'        => true,
        'ed_author'                 => true,
        'author_title'              => __( 'About Author', 'coachify' ),
        'ed_related'                => true,
        'related_post_title'        => __( 'You may also like...', 'coachify' ),
        'no_of_posts_rp'            => 3,
        'ed_post_comments'          => true,
        'single_comment_form'       => 'below',
        'toggle_comments'           => 'end-post',
        'ed_page_title'             => true,
        'pagetitle_alignment'       => 'left',
        'ed_page_featured_image'    => true,
        'ed_page_comments'          => false,
        'ed_archive_title'          => true,
        'ed_archive_desc'           => true,
        'archivetitle_alignment'    => 'left',
        'ed_archive_post_count'     => true,
        'ed_prefix_archive'         => true,
        'header_bg_img'             => '',
        'blog_img_radius' => array(
            'top'    => 15,
            'right'  => 15,
            'bottom' => 15,
            'left'   => 15,
        ),
        'single_img_radius' => array(
            'top'    => 15,
            'right'  => 15,
            'bottom' => 15,
            'left'   => 15,
        ),
        'related_img_radius' => array(
            'top'    => 15,
            'right'  => 15,
            'bottom' => 15,
            'left'   => 15,
        ),
    );
    return apply_filters( 'coachify_general_defaults', $defaults );
}
endif;