<?php
/**
 * Coachify Dynamic Styles
 * 
 * @package Coachify
*/
/**
 * Add Dynamic value to the root variable
 *
 * @return void
 */
function coachify_dynamic_root_css(){
    
    $typo_defaults   = coachify_get_typography_defaults();
	$defaults        = coachify_get_color_defaults();
	$site_defaults   = coachify_get_site_defaults();
	$button_defaults = coachify_get_button_defaults();
	$general_defaults = coachify_get_general_defaults();
    
	$primary_font   = wp_parse_args( get_theme_mod( 'primary_font' ), $typo_defaults['primary_font'] );
	$sitetitle      = wp_parse_args( get_theme_mod( 'site_title' ), $typo_defaults['site_title'] );
	$button         = wp_parse_args( get_theme_mod( 'button' ), $typo_defaults['button'] );
    $heading_one    = wp_parse_args( get_theme_mod( 'heading_one' ), $typo_defaults['heading_one'] );
	$heading_two    = wp_parse_args( get_theme_mod( 'heading_two' ), $typo_defaults['heading_two'] );
	$heading_three  = wp_parse_args( get_theme_mod( 'heading_three' ), $typo_defaults['heading_three'] );
	$heading_four   = wp_parse_args( get_theme_mod( 'heading_four' ), $typo_defaults['heading_four'] );
	$heading_five   = wp_parse_args( get_theme_mod( 'heading_five' ), $typo_defaults['heading_five'] );
	$heading_six    = wp_parse_args( get_theme_mod( 'heading_six' ), $typo_defaults['heading_six'] );
	$accent_font    = wp_parse_args( get_theme_mod( 'accent_font' ), $typo_defaults['accent_font'] );

    //Primary Font variables
    $primarydesktopFontSize = isset(  $primary_font['desktop']['font_size'] ) ? $primary_font['desktop']['font_size'] : $typo_defaults['primary_font']['desktop']['font_size'];
    $primarydesktopSpacing  = isset(  $primary_font['desktop']['letter_spacing'] ) ? $primary_font['desktop']['letter_spacing'] : $typo_defaults['primary_font']['desktop']['letter_spacing'];
    $primarydesktopHeight   = isset(  $primary_font['desktop']['line_height'] ) ? $primary_font['desktop']['line_height'] : $typo_defaults['primary_font']['desktop']['line_height'];
    $primarytabletFontSize  = isset(  $primary_font['tablet']['font_size'] ) ? $primary_font['tablet']['font_size'] : $typo_defaults['primary_font']['tablet']['font_size'];
    $primarytabletSpacing   = isset(  $primary_font['tablet']['letter_spacing'] ) ? $primary_font['tablet']['letter_spacing'] : $typo_defaults['primary_font']['tablet']['letter_spacing'];
    $primarytabletHeight    = isset(  $primary_font['tablet']['line_height'] ) ? $primary_font['tablet']['line_height'] : $typo_defaults['primary_font']['tablet']['line_height'];
    $primarymobileFontSize  = isset(  $primary_font['mobile']['font_size'] ) ? $primary_font['mobile']['font_size'] : $typo_defaults['primary_font']['mobile']['font_size'];
    $primarymobileSpacing   = isset(  $primary_font['mobile']['letter_spacing'] ) ? $primary_font['mobile']['letter_spacing'] : $typo_defaults['primary_font']['mobile']['letter_spacing'];
    $primarymobileHeight    = isset(  $primary_font['mobile']['line_height'] ) ? $primary_font['mobile']['line_height'] : $typo_defaults['primary_font']['mobile']['line_height'];

    //Site Title variables
    $sitedesktopFontSize = isset(  $sitetitle['desktop']['font_size'] ) ? $sitetitle['desktop']['font_size'] : $typo_defaults['site_title']['desktop']['font_size'];
    $sitedesktopSpacing  = isset(  $sitetitle['desktop']['letter_spacing'] ) ? $sitetitle['desktop']['letter_spacing'] : $typo_defaults['site_title']['desktop']['letter_spacing'];
    $sitedesktopHeight   = isset(  $sitetitle['desktop']['line_height'] ) ? $sitetitle['desktop']['line_height'] : $typo_defaults['site_title']['desktop']['line_height'];
    $sitetabletFontSize  = isset(  $sitetitle['tablet']['font_size'] ) ? $sitetitle['tablet']['font_size'] : $typo_defaults['site_title']['tablet']['font_size'];
    $sitetabletSpacing   = isset(  $sitetitle['tablet']['letter_spacing'] ) ? $sitetitle['tablet']['letter_spacing'] : $typo_defaults['site_title']['tablet']['letter_spacing'];
    $sitetabletHeight    = isset(  $sitetitle['tablet']['line_height'] ) ? $sitetitle['tablet']['line_height'] : $typo_defaults['site_title']['tablet']['line_height'];
    $sitemobileFontSize  = isset(  $sitetitle['mobile']['font_size'] ) ? $sitetitle['mobile']['font_size'] : $typo_defaults['site_title']['mobile']['font_size'];
    $sitemobileSpacing   = isset(  $sitetitle['mobile']['letter_spacing'] ) ? $sitetitle['mobile']['letter_spacing'] : $typo_defaults['site_title']['mobile']['letter_spacing'];
    $sitemobileHeight    = isset(  $sitetitle['mobile']['line_height'] ) ? $sitetitle['mobile']['line_height'] : $typo_defaults['site_title']['mobile']['line_height'];
    
    //Button variables
    $btndesktopFontSize = isset(  $button['desktop']['font_size'] ) ? $button['desktop']['font_size'] : $typo_defaults['button']['desktop']['font_size'];
    $btndesktopSpacing  = isset(  $button['desktop']['letter_spacing'] ) ? $button['desktop']['letter_spacing'] : $typo_defaults['button']['desktop']['letter_spacing'];
    $btndesktopHeight   = isset(  $button['desktop']['line_height'] ) ? $button['desktop']['line_height'] : $typo_defaults['button']['desktop']['line_height'];
    $btntabletFontSize  = isset(  $button['tablet']['font_size'] ) ? $button['tablet']['font_size'] : $typo_defaults['button']['tablet']['font_size'];
    $btntabletSpacing   = isset(  $button['tablet']['letter_spacing'] ) ? $button['tablet']['letter_spacing'] : $typo_defaults['button']['tablet']['letter_spacing'];
    $btntabletHeight    = isset(  $button['tablet']['line_height'] ) ? $button['tablet']['line_height'] : $typo_defaults['button']['tablet']['line_height'];
    $btnmobileFontSize  = isset(  $button['mobile']['font_size'] ) ? $button['mobile']['font_size'] : $typo_defaults['button']['mobile']['font_size'];
    $btnmobileSpacing   = isset(  $button['mobile']['letter_spacing'] ) ? $button['mobile']['letter_spacing'] : $typo_defaults['button']['mobile']['letter_spacing'];
    $btnmobileHeight    = isset(  $button['mobile']['line_height'] ) ? $button['mobile']['line_height'] : $typo_defaults['button']['mobile']['line_height'];

    //Heading 1 variables
    $h1desktopFontSize = isset(  $heading_one['desktop']['font_size'] ) ? $heading_one['desktop']['font_size'] : $typo_defaults['heading_one']['desktop']['font_size'];
    $h1desktopSpacing  = isset(  $heading_one['desktop']['letter_spacing'] ) ? $heading_one['desktop']['letter_spacing'] : $typo_defaults['heading_one']['desktop']['letter_spacing'];
    $h1desktopHeight   = isset(  $heading_one['desktop']['line_height'] ) ? $heading_one['desktop']['line_height'] : $typo_defaults['heading_one']['desktop']['line_height'];
    $h1tabletFontSize  = isset(  $heading_one['tablet']['font_size'] ) ? $heading_one['tablet']['font_size'] : $typo_defaults['heading_one']['tablet']['font_size'];
    $h1tabletSpacing   = isset(  $heading_one['tablet']['letter_spacing'] ) ? $heading_one['tablet']['letter_spacing'] : $typo_defaults['heading_one']['tablet']['letter_spacing'];
    $h1tabletHeight    = isset(  $heading_one['tablet']['line_height'] ) ? $heading_one['tablet']['line_height'] : $typo_defaults['heading_one']['tablet']['line_height'];
    $h1mobileFontSize  = isset(  $heading_one['mobile']['font_size'] ) ? $heading_one['mobile']['font_size'] : $typo_defaults['heading_one']['mobile']['font_size'];
    $h1mobileSpacing   = isset(  $heading_one['mobile']['letter_spacing'] ) ? $heading_one['mobile']['letter_spacing'] : $typo_defaults['heading_one']['mobile']['letter_spacing'];
    $h1mobileHeight    = isset(  $heading_one['mobile']['line_height'] ) ? $heading_one['mobile']['line_height'] : $typo_defaults['heading_one']['mobile']['line_height'];
    
    //Heading 2 variables
    $h2desktopFontSize = isset(  $heading_two['desktop']['font_size'] ) ? $heading_two['desktop']['font_size'] : $typo_defaults['heading_two']['desktop']['font_size'];
    $h2desktopSpacing  = isset(  $heading_two['desktop']['letter_spacing'] ) ? $heading_two['desktop']['letter_spacing'] : $typo_defaults['heading_two']['desktop']['letter_spacing'];
    $h2desktopHeight   = isset(  $heading_two['desktop']['line_height'] ) ? $heading_two['desktop']['line_height'] : $typo_defaults['heading_two']['desktop']['line_height'];
    $h2tabletFontSize  = isset(  $heading_two['tablet']['font_size'] ) ? $heading_two['tablet']['font_size'] : $typo_defaults['heading_two']['tablet']['font_size'];
    $h2tabletSpacing   = isset(  $heading_two['tablet']['letter_spacing'] ) ? $heading_two['tablet']['letter_spacing'] : $typo_defaults['heading_two']['tablet']['letter_spacing'];
    $h2tabletHeight    = isset(  $heading_two['tablet']['line_height'] ) ? $heading_two['tablet']['line_height'] : $typo_defaults['heading_two']['tablet']['line_height'];
    $h2mobileFontSize  = isset(  $heading_two['mobile']['font_size'] ) ? $heading_two['mobile']['font_size'] : $typo_defaults['heading_two']['mobile']['font_size'];
    $h2mobileSpacing   = isset(  $heading_two['mobile']['letter_spacing'] ) ? $heading_two['mobile']['letter_spacing'] : $typo_defaults['heading_two']['mobile']['letter_spacing'];
    $h2mobileHeight    = isset(  $heading_two['mobile']['line_height'] ) ? $heading_two['mobile']['line_height'] : $typo_defaults['heading_two']['mobile']['line_height'];
    
    //Heading 3 variables
    $h3desktopFontSize = isset(  $heading_three['desktop']['font_size'] ) ? $heading_three['desktop']['font_size'] : $typo_defaults['heading_three']['desktop']['font_size'];
    $h3desktopSpacing  = isset(  $heading_three['desktop']['letter_spacing'] ) ? $heading_three['desktop']['letter_spacing'] : $typo_defaults['heading_three']['desktop']['letter_spacing'];
    $h3desktopHeight   = isset(  $heading_three['desktop']['line_height'] ) ? $heading_three['desktop']['line_height'] : $typo_defaults['heading_three']['desktop']['line_height'];
    $h3tabletFontSize  = isset(  $heading_three['tablet']['font_size'] ) ? $heading_three['tablet']['font_size'] : $typo_defaults['heading_three']['tablet']['font_size'];
    $h3tabletSpacing   = isset(  $heading_three['tablet']['letter_spacing'] ) ? $heading_three['tablet']['letter_spacing'] : $typo_defaults['heading_three']['tablet']['letter_spacing'];
    $h3tabletHeight    = isset(  $heading_three['tablet']['line_height'] ) ? $heading_three['tablet']['line_height'] : $typo_defaults['heading_three']['tablet']['line_height'];
    $h3mobileFontSize  = isset(  $heading_three['mobile']['font_size'] ) ? $heading_three['mobile']['font_size'] : $typo_defaults['heading_three']['mobile']['font_size'];
    $h3mobileSpacing   = isset(  $heading_three['mobile']['letter_spacing'] ) ? $heading_three['mobile']['letter_spacing'] : $typo_defaults['heading_three']['mobile']['letter_spacing'];
    $h3mobileHeight    = isset(  $heading_three['mobile']['line_height'] ) ? $heading_three['mobile']['line_height'] : $typo_defaults['heading_three']['mobile']['line_height'];
    
    //Heading 4 variables
    $h4desktopFontSize = isset(  $heading_four['desktop']['font_size'] ) ? $heading_four['desktop']['font_size'] : $typo_defaults['heading_four']['desktop']['font_size'];
    $h4desktopSpacing  = isset(  $heading_four['desktop']['letter_spacing'] ) ? $heading_four['desktop']['letter_spacing'] : $typo_defaults['heading_four']['desktop']['letter_spacing'];
    $h4desktopHeight   = isset(  $heading_four['desktop']['line_height'] ) ? $heading_four['desktop']['line_height'] : $typo_defaults['heading_four']['desktop']['line_height'];
    $h4tabletFontSize  = isset(  $heading_four['tablet']['font_size'] ) ? $heading_four['tablet']['font_size'] : $typo_defaults['heading_four']['tablet']['font_size'];
    $h4tabletSpacing   = isset(  $heading_four['tablet']['letter_spacing'] ) ? $heading_four['tablet']['letter_spacing'] : $typo_defaults['heading_four']['tablet']['letter_spacing'];
    $h4tabletHeight    = isset(  $heading_four['tablet']['line_height'] ) ? $heading_four['tablet']['line_height'] : $typo_defaults['heading_four']['tablet']['line_height'];
    $h4mobileFontSize  = isset(  $heading_four['mobile']['font_size'] ) ? $heading_four['mobile']['font_size'] : $typo_defaults['heading_four']['mobile']['font_size'];
    $h4mobileSpacing   = isset(  $heading_four['mobile']['letter_spacing'] ) ? $heading_four['mobile']['letter_spacing'] : $typo_defaults['heading_four']['mobile']['letter_spacing'];
    $h4mobileHeight    = isset(  $heading_four['mobile']['line_height'] ) ? $heading_four['mobile']['line_height'] : $typo_defaults['heading_four']['mobile']['line_height'];
    
    //Heading 5 variables
    $h5desktopFontSize = isset(  $heading_five['desktop']['font_size'] ) ? $heading_five['desktop']['font_size'] : $typo_defaults['heading_five']['desktop']['font_size'];
    $h5desktopSpacing  = isset(  $heading_five['desktop']['letter_spacing'] ) ? $heading_five['desktop']['letter_spacing'] : $typo_defaults['heading_five']['desktop']['letter_spacing'];
    $h5desktopHeight   = isset(  $heading_five['desktop']['line_height'] ) ? $heading_five['desktop']['line_height'] : $typo_defaults['heading_five']['desktop']['line_height'];
    $h5tabletFontSize  = isset(  $heading_five['tablet']['font_size'] ) ? $heading_five['tablet']['font_size'] : $typo_defaults['heading_five']['tablet']['font_size'];
    $h5tabletSpacing   = isset(  $heading_five['tablet']['letter_spacing'] ) ? $heading_five['tablet']['letter_spacing'] : $typo_defaults['heading_five']['tablet']['letter_spacing'];
    $h5tabletHeight    = isset(  $heading_five['tablet']['line_height'] ) ? $heading_five['tablet']['line_height'] : $typo_defaults['heading_five']['tablet']['line_height'];
    $h5mobileFontSize  = isset(  $heading_five['mobile']['font_size'] ) ? $heading_five['mobile']['font_size'] : $typo_defaults['heading_five']['mobile']['font_size'];
    $h5mobileSpacing   = isset(  $heading_five['mobile']['letter_spacing'] ) ? $heading_five['mobile']['letter_spacing'] : $typo_defaults['heading_five']['mobile']['letter_spacing'];
    $h5mobileHeight    = isset(  $heading_five['mobile']['line_height'] ) ? $heading_five['mobile']['line_height'] : $typo_defaults['heading_five']['mobile']['line_height'];
    
    //Heading 6 variables
    $h6desktopFontSize = isset(  $heading_six['desktop']['font_size'] ) ? $heading_six['desktop']['font_size'] : $typo_defaults['heading_six']['desktop']['font_size'];
    $h6desktopSpacing  = isset(  $heading_six['desktop']['letter_spacing'] ) ? $heading_six['desktop']['letter_spacing'] : $typo_defaults['heading_six']['desktop']['letter_spacing'];
    $h6desktopHeight   = isset(  $heading_six['desktop']['line_height'] ) ? $heading_six['desktop']['line_height'] : $typo_defaults['heading_six']['desktop']['line_height'];
    $h6tabletFontSize  = isset(  $heading_six['tablet']['font_size'] ) ? $heading_six['tablet']['font_size'] : $typo_defaults['heading_six']['tablet']['font_size'];
    $h6tabletSpacing   = isset(  $heading_six['tablet']['letter_spacing'] ) ? $heading_six['tablet']['letter_spacing'] : $typo_defaults['heading_six']['tablet']['letter_spacing'];
    $h6tabletHeight    = isset(  $heading_six['tablet']['line_height'] ) ? $heading_six['tablet']['line_height'] : $typo_defaults['heading_six']['tablet']['line_height'];
    $h6mobileFontSize  = isset(  $heading_six['mobile']['font_size'] ) ? $heading_six['mobile']['font_size'] : $typo_defaults['heading_six']['mobile']['font_size'];
    $h6mobileSpacing   = isset(  $heading_six['mobile']['letter_spacing'] ) ? $heading_six['mobile']['letter_spacing'] : $typo_defaults['heading_six']['mobile']['letter_spacing'];
    $h6mobileHeight    = isset(  $heading_six['mobile']['line_height'] ) ? $heading_six['mobile']['line_height'] : $typo_defaults['heading_six']['mobile']['line_height'];

    //Accent Font variables
    $accentdesktopFontSize = isset(  $accent_font['desktop']['font_size'] ) ? $accent_font['desktop']['font_size'] : $typo_defaults['accent_font']['desktop']['font_size'];
    $accentdesktopSpacing  = isset(  $accent_font['desktop']['letter_spacing'] ) ? $accent_font['desktop']['letter_spacing'] : $typo_defaults['accent_font']['desktop']['letter_spacing'];
    $accentdesktopHeight   = isset(  $accent_font['desktop']['line_height'] ) ? $accent_font['desktop']['line_height'] : $typo_defaults['accent_font']['desktop']['line_height'];
    $accenttabletFontSize  = isset(  $accent_font['tablet']['font_size'] ) ? $accent_font['tablet']['font_size'] : $typo_defaults['accent_font']['tablet']['font_size'];
    $accenttabletSpacing   = isset(  $accent_font['tablet']['letter_spacing'] ) ? $accent_font['tablet']['letter_spacing'] : $typo_defaults['accent_font']['tablet']['letter_spacing'];
    $accenttabletHeight    = isset(  $accent_font['tablet']['line_height'] ) ? $accent_font['tablet']['line_height'] : $typo_defaults['accent_font']['tablet']['line_height'];
    $accentmobileFontSize  = isset(  $accent_font['mobile']['font_size'] ) ? $accent_font['mobile']['font_size'] : $typo_defaults['accent_font']['mobile']['font_size'];
    $accentmobileSpacing   = isset(  $accent_font['mobile']['letter_spacing'] ) ? $accent_font['mobile']['letter_spacing'] : $typo_defaults['accent_font']['mobile']['letter_spacing'];
    $accentmobileHeight    = isset(  $accent_font['mobile']['line_height'] ) ? $accent_font['mobile']['line_height'] : $typo_defaults['accent_font']['mobile']['line_height'];

    $primary_font_family       = coachify_get_font_family( $primary_font );
    $sitetitle_font_family     = coachify_get_font_family( $sitetitle );
    $btn_font_family           = coachify_get_font_family( $button );
    $heading_one_font_family   = coachify_get_font_family( $heading_one );
    $heading_two_font_family   = coachify_get_font_family( $heading_two );
    $heading_three_font_family = coachify_get_font_family( $heading_three );
    $heading_four_font_family  = coachify_get_font_family( $heading_four );
    $heading_five_font_family  = coachify_get_font_family( $heading_five );
    $heading_six_font_family   = coachify_get_font_family( $heading_six );
    $accent_font_family        = coachify_get_font_family( $accent_font );

    $siteFontFamily = $sitetitle_font_family === '"Default Family"' ? 'inherit' : $sitetitle_font_family;
    $btnFontFamily  = $btn_font_family === '"Default Family"' ? 'inherit' : $btn_font_family;
    $h1FontFamily   = $heading_one_font_family === '"Default Family"' ? 'inherit' : $heading_one_font_family;
    $h2FontFamily   = $heading_two_font_family === '"Default Family"' ? 'inherit' : $heading_two_font_family;
    $h3FontFamily   = $heading_three_font_family === '"Default Family"' ? 'inherit' : $heading_three_font_family;
    $h4FontFamily   = $heading_four_font_family === '"Default Family"' ? 'inherit' : $heading_four_font_family;
    $h5FontFamily   = $heading_five_font_family === '"Default Family"' ? 'inherit' : $heading_five_font_family;
    $h6FontFamily   = $heading_six_font_family === '"Default Family"' ? 'inherit' : $heading_six_font_family;
    $accFontFamily  = $accent_font_family === '"Default Family"' ? 'inherit' : $accent_font_family;

    $logo_width        = get_theme_mod( 'logo_width', $site_defaults['logo_width'] );
	$tablet_logo_width = get_theme_mod( 'tablet_logo_width', $site_defaults['tablet_logo_width'] );
	$mobile_logo_width = get_theme_mod( 'mobile_logo_width', $site_defaults['mobile_logo_width'] );

    $container_width        = get_theme_mod( 'container_width', $general_defaults['container_width'] );
	$tablet_container_width = get_theme_mod( 'tablet_container_width', $general_defaults['tablet_container_width'] );
	$mobile_container_width = get_theme_mod( 'mobile_container_width', $general_defaults['mobile_container_width'] );

    $fullwidth_centered        = get_theme_mod( 'fullwidth_centered', $general_defaults['fullwidth_centered']);
    $tablet_fullwidth_centered = get_theme_mod( 'tablet_fullwidth_centered', $general_defaults['tablet_fullwidth_centered']);
    $mobile_fullwidth_centered = get_theme_mod( 'mobile_fullwidth_centered', $general_defaults['mobile_fullwidth_centered']);

    $sidebar_width        = get_theme_mod( 'sidebar_width', $general_defaults['sidebar_width']);

    $widgets_spacing        = get_theme_mod( 'widgets_spacing', $general_defaults['widgets_spacing']);
    $tablet_widgets_spacing = get_theme_mod( 'tablet_widgets_spacing', $general_defaults['tablet_widgets_spacing']);
    $mobile_widgets_spacing = get_theme_mod( 'mobile_widgets_spacing', $general_defaults['mobile_widgets_spacing']);

    $foot_top_spacing        = get_theme_mod( 'foot_top_spacing', $general_defaults['foot_top_spacing']);
    $tablet_foot_top_spacing = get_theme_mod( 'tablet_foot_top_spacing', $general_defaults['tablet_foot_top_spacing']);
    $mobile_foot_top_spacing = get_theme_mod( 'mobile_foot_top_spacing', $general_defaults['mobile_foot_top_spacing']);

    $scroll_top_size        = get_theme_mod( 'scroll_top_size', $general_defaults['scroll_top_size']);
    $tablet_scroll_top_size = get_theme_mod( 'tablet_scroll_top_size', $general_defaults['tablet_scroll_top_size']);
    $mobile_scroll_top_size = get_theme_mod( 'mobile_scroll_top_size', $general_defaults['mobile_scroll_top_size']);

    $button_roundness = get_theme_mod( 'button_roundness', $button_defaults['button_roundness'] );
	$button_padding   = get_theme_mod( 'button_padding', $button_defaults['button_padding'] );

    $btnRoundTop    = isset(  $button_roundness['top'] ) ? $button_roundness['top'] : $button_defaults['button_roundness']['top'];
    $btnRoundRight  = isset(  $button_roundness['right'] ) ? $button_roundness['right'] : $button_defaults['button_roundness']['right'];
    $btnRoundLeft   = isset(  $button_roundness['left'] ) ? $button_roundness['left'] : $button_defaults['button_roundness']['left'];
    $btnRoundBottom = isset(  $button_roundness['bottom'] ) ? $button_roundness['bottom'] : $button_defaults['button_roundness']['bottom'];

    $btnPaddingTop    = isset(  $button_padding['top'] ) ? $button_padding['top'] : $button_defaults['button_padding']['top'];
    $btnPaddingRight  = isset(  $button_padding['right'] ) ? $button_padding['right'] : $button_defaults['button_padding']['right'];
    $btnPaddingLeft   = isset(  $button_padding['left'] ) ? $button_padding['left'] : $button_defaults['button_padding']['left'];
    $btnPaddingBottom = isset(  $button_padding['bottom'] ) ? $button_padding['bottom'] : $button_defaults['button_padding']['bottom'];

    $blog_feat_img_radius = get_theme_mod( 'blog_img_radius', $general_defaults['blog_img_radius'] );
    $blogImgRadTop        = isset(  $blog_feat_img_radius['top'] ) ? $blog_feat_img_radius['top'] : $general_defaults['blog_img_radius']['top'];
    $blogImgRadRight      = isset(  $blog_feat_img_radius['right'] ) ? $blog_feat_img_radius['right'] : $general_defaults['blog_img_radius']['right'];
    $blogImgRadLeft       = isset(  $blog_feat_img_radius['left'] ) ? $blog_feat_img_radius['left'] : $general_defaults['blog_img_radius']['left'];
    $blogImgRadBottom     = isset(  $blog_feat_img_radius['bottom'] ) ? $blog_feat_img_radius['bottom'] : $general_defaults['blog_img_radius']['bottom'];

    $single_feat_img_radius = get_theme_mod( 'single_img_radius', $general_defaults['single_img_radius'] );
    $singleImgRadTop        = isset(  $single_feat_img_radius['top'] ) ? $single_feat_img_radius['top'] : $general_defaults['single_img_radius']['top'];
    $singleImgRadRight      = isset(  $single_feat_img_radius['right'] ) ? $single_feat_img_radius['right'] : $general_defaults['single_img_radius']['right'];
    $singleImgRadLeft       = isset(  $single_feat_img_radius['left'] ) ? $single_feat_img_radius['left'] : $general_defaults['single_img_radius']['left'];
    $singleImgRadBottom     = isset(  $single_feat_img_radius['bottom'] ) ? $single_feat_img_radius['bottom'] : $general_defaults['single_img_radius']['bottom'];

    $related_img_radius = get_theme_mod( 'related_img_radius', $general_defaults['related_img_radius'] );
    $rltdImgRadTop      = isset(  $related_img_radius['top'] ) ? $related_img_radius['top'] : $general_defaults['related_img_radius']['top'];
    $rltdImgRadRight    = isset(  $related_img_radius['right'] ) ? $related_img_radius['right'] : $general_defaults['related_img_radius']['right'];
    $rltdImgRadLeft     = isset(  $related_img_radius['left'] ) ? $related_img_radius['left'] : $general_defaults['related_img_radius']['left'];
    $rltdImgRadBottom   = isset(  $related_img_radius['bottom'] ) ? $related_img_radius['bottom'] : $general_defaults['related_img_radius']['bottom'];

    // HEADER BUTTON
    $header_button_roundness = get_theme_mod( 'header_button_roundness', $button_defaults['header_button_roundness'] );
    $header_button_padding   = get_theme_mod( 'header_button_padding', $button_defaults['header_button_padding'] );
    $header_btn_text_color   = get_theme_mod( 'header_btn_text_color', $defaults['header_btn_text_color'] );
    $header_btn_bg_color     = get_theme_mod( 'header_btn_bg_color', $defaults['header_btn_bg_color'] );
    $header_btn_border_color = get_theme_mod( 'header_btn_border_color', $defaults['header_btn_border_color'] );
    
    $hdrBtnRoundTop    = isset(  $header_button_roundness['top'] ) ? $header_button_roundness['top'] : $button_defaults['header_button_roundness']['top'];
    $hdrBtnRoundRight  = isset(  $header_button_roundness['right'] ) ? $header_button_roundness['right'] : $button_defaults['header_button_roundness']['right'];
    $hdrBtnRoundLeft   = isset(  $header_button_roundness['left'] ) ? $header_button_roundness['left'] : $button_defaults['header_button_roundness']['left'];
    $hdrBtnRoundBottom = isset(  $header_button_roundness['bottom'] ) ? $header_button_roundness['bottom'] : $button_defaults['header_button_roundness']['bottom'];

    $hdrBtnPaddingTop    = isset(  $header_button_padding['top'] ) ? $header_button_padding['top'] : $button_defaults['header_button_padding']['top'];
    $hdrBtnPaddingRight  = isset(  $header_button_padding['right'] ) ? $header_button_padding['right'] : $button_defaults['header_button_padding']['right'];
    $hdrBtnPaddingLeft   = isset(  $header_button_padding['left'] ) ? $header_button_padding['left'] : $button_defaults['header_button_padding']['left'];
    $hdrBtnPaddingBottom = isset(  $header_button_padding['bottom'] ) ? $header_button_padding['bottom'] : $button_defaults['header_button_padding']['bottom'];

    //COLOR VARIABLES

    $primary_color          = get_theme_mod( 'primary_color', $defaults['primary_color'] );
    $rgb                    = coachify_hex2rgb( coachify_sanitize_rgba( $primary_color ) );
    $secondary_color        = get_theme_mod( 'secondary_color', $defaults['secondary_color'] );
    $rgb2                   = coachify_hex2rgb( coachify_sanitize_rgba( $secondary_color ) );
    $body_font_color        = get_theme_mod( 'body_font_color', $defaults['body_font_color'] );
    $rgb4                   = coachify_hex2rgb( coachify_sanitize_rgba( $body_font_color ) );
    $heading_color          = get_theme_mod( 'heading_color', $defaults['heading_color'] );
    $rgb5                   = coachify_hex2rgb( coachify_sanitize_rgba( $heading_color ) );
    $background_color       = get_theme_mod( 'site_bg_color', $defaults['site_bg_color'] );
    $rgb6                   = coachify_hex2rgb( coachify_sanitize_rgba( $background_color ) );
    $primary_accent_color   = get_theme_mod( 'primary_accent_color', $defaults['primary_accent_color'] );
    $secondary_accent_color = get_theme_mod( 'secondary_accent_color', $defaults['secondary_accent_color'] );
    $tertiary_accent_color  = get_theme_mod( 'tertiary_accent_color', $defaults['tertiary_accent_color'] );

    // Header Nav
    $header_width_custom   = get_theme_mod( 'header_width_custom', $general_defaults['header_width_custom'] );
    $header_nav_spacing    = get_theme_mod( 'header_items_spacing', $general_defaults['header_items_spacing'] );
    $header_dropdown_width = get_theme_mod( 'header_dropdown_width', $general_defaults['header_dropdown_width'] );

    //Button Color
	$btn_text_color             = get_theme_mod( 'btn_text_color_initial', $defaults['btn_text_color_initial'] );
	$btn_bg_color               = get_theme_mod( 'btn_bg_color_initial', $defaults['btn_bg_color_initial'] );
	$btn_text_hover_color       = get_theme_mod( 'btn_text_color_hover', $defaults['btn_text_color_hover'] );
	$btn_bg_hover_color         = get_theme_mod( 'btn_bg_color_hover', $defaults['btn_bg_color_hover'] );
	$def_btn_border_color       = get_theme_mod( 'btn_border_color_initial', $defaults['btn_border_color_initial'] );
	$def_btn_border_hover_color = get_theme_mod( 'btn_border_color_hover', $defaults['btn_border_color_hover'] );

    $btn_border_color       = $def_btn_border_color === '' ? 'inherit' : coachify_sanitize_rgba($def_btn_border_color);
    $btn_border_hover_color = $def_btn_border_hover_color === '' ? 'inherit' : coachify_sanitize_rgba($def_btn_border_hover_color);

    //Footer Color
    $foot_text_color      = get_theme_mod( 'foot_text_color', $defaults['foot_text_color'] );
    $foot_bg_color        = get_theme_mod( 'foot_bg_color', $defaults['foot_bg_color'] );
    $widget_heading_color = get_theme_mod( 'foot_widget_heading_color', $defaults['foot_widget_heading_color'] );

    //Footer Copyright
    $foot_copyright_text_color = get_theme_mod( 'foot_copyright_text_color', $defaults['foot_copyright_text_color'] );
    $foot_copyright_bg_color   = get_theme_mod( 'foot_copyright_bg_color', $defaults['foot_copyright_bg_color'] );

    //404 Page
    $posts_per_row 	   = get_theme_mod( 'posts_per_row_404', $general_defaults['posts_per_row_404'] );

    $css = ' 
        :root{ 
            --g-primary-color         : ' . coachify_sanitize_rgba( $primary_color ) . ';
            --g-primary-color-rgb     : ' . $rgb[0] . ',  ' . $rgb[1] .',  ' . $rgb[2] . ';
            --g-secondary-color       : ' . coachify_sanitize_rgba( $secondary_color ) . ';
            --g-secondary-color-rgb   : ' . $rgb2[0] . ', ' . $rgb2[1] .', ' . $rgb2[2] . ';
            --g-font-color            : ' . coachify_sanitize_rgba( $body_font_color ) . ';
            --g-font-color-rgb        : ' . $rgb4[0] . ', ' . $rgb4[1] .', ' . $rgb4[2] . ';
            --g-heading-color         : ' . coachify_sanitize_rgba( $heading_color ) . ';
            --g-heading-color-rgb     : ' . $rgb5[0] . ', ' . $rgb5[1] .', ' . $rgb5[2] . ';
            --g-background-color      : ' . coachify_sanitize_rgba( $background_color ) . ';
            --g-background-color-rgb  : ' . $rgb6[0] . ', ' . $rgb6[1] .', ' . $rgb6[2] . ';
            --g-primary-accent-color  : ' . coachify_sanitize_rgba( $primary_accent_color ) . ';
            --g-secondary-accent-color: ' . coachify_sanitize_rgba( $secondary_accent_color ) . ';
            --g-tertiary-accent-color : ' . coachify_sanitize_rgba( $tertiary_accent_color ) . ';

            --g-primary-font:' .  wp_kses_post( $primary_font_family ) . ';     
            --g-primary-font-weight:' .  esc_html( $primary_font['weight'] ) . ';
            --g-primary-font-transform:' .  esc_html( $primary_font['transform'] ) . ';

            --g-secondary-font:' . wp_kses_post( $h1FontFamily ) . ';
            --g-secondary-font-weight:' . esc_html( $heading_one['weight'] ) . ';

            --g-accent-font:' . wp_kses_post( $accFontFamily ) . ';     
            --g-accent-font-weight:' . esc_html( $accent_font['weight'] ) . ';
            --g-accent-font-transform:' . esc_html( $accent_font['transform'] ) . ';
    
            --btn-text-initial-color:' . coachify_sanitize_rgba( $btn_text_color ) . ';
            --btn-text-hover-color:' . coachify_sanitize_rgba( $btn_text_hover_color ) . ';
            --btn-bg-initial-color:' . coachify_sanitize_rgba( $btn_bg_color ) . ';
            --btn-bg-hover-color:' . coachify_sanitize_rgba( $btn_bg_hover_color ) . ';
            --btn-border-initial-color:' . $btn_border_color . ';
            --btn-border-hover-color:' . $btn_border_hover_color . ';
    
            --btn-font-family:' . wp_kses_post( $btnFontFamily ) . ';     
            --btn-font-weight:' . esc_html( $button['weight'] ) . ';
            --btn-font-transform:' . esc_html( $button['transform'] ) . ';
            --btn-roundness-top:' . absint( $btnRoundTop ) . 'px;
            --btn-roundness-right:' . absint( $btnRoundRight ) . 'px;
            --btn-roundness-bottom:' . absint( $btnRoundBottom ) . 'px;
            --btn-roundness-left:' . absint( $btnRoundLeft ) . 'px;
            --btn-padding-top:' . absint( $btnPaddingTop ) . 'px;
            --btn-padding-right:' . absint( $btnPaddingRight ) . 'px;
            --btn-padding-bottom:' . absint( $btnPaddingBottom ) . 'px;
            --btn-padding-left:' . absint( $btnPaddingLeft ) . 'px;
        }
        
        .site-branding .site-title{
            font-family   :' . wp_kses_post( $siteFontFamily ) . ';
            font-weight   :' . esc_html( $sitetitle['weight'] ) . ';
            text-transform:' . esc_html( $sitetitle['transform'] ) . ';
        }
        
        .site-header .custom-logo,
        .site-footer .custom-logo{
            width :' . absint( $logo_width ) . 'px;
        }
        
        .site-header .c-custom{
            --coachy-custom-header-width:' . absint( $header_width_custom ) . 'px;
        }
        
        .main-navigation, .secondary-nav #secondary-menu{
            --coachy-nav-padding:' . absint( $header_nav_spacing ) . 'px;
            --coachy-sub-menu-width:' . absint( $header_dropdown_width ) . 'px;
        }
    
        .site-header {
            --header-btn-roundness-top   :' . absint( $hdrBtnRoundTop ) . 'px;
            --header-btn-roundness-right :' . absint( $hdrBtnRoundRight ) . 'px;
            --header-btn-roundness-bottom:' . absint( $hdrBtnRoundBottom ) . 'px;
            --header-btn-roundness-left  :' . absint( $hdrBtnRoundLeft ) . 'px;
            --header-btn-padding-top     :' . absint( $hdrBtnPaddingTop ) . 'px;
            --header-btn-padding-right   :' . absint( $hdrBtnPaddingRight ) . 'px;
            --header-btn-padding-bottom  :' . absint( $hdrBtnPaddingBottom ) . 'px;
            --header-btn-padding-left    :' . absint( $hdrBtnPaddingLeft ) . 'px;
            --header-btn-text-color      :' . coachify_sanitize_rgba( $header_btn_text_color ) . ';
            --header-btn-bg-color        :' . coachify_sanitize_rgba( $header_btn_bg_color ) . ';
            --header-btn-border-color    :' . coachify_sanitize_rgba( $header_btn_border_color ) . ';
        }
    
        .blog .content-area .post-thumbnail, 
        .archive .content-area .post-thumbnail, 
        .search .content-area .post-thumbnail{
            --img-radius-top:' . absint( $blogImgRadTop) . 'px;
            --img-radius-right:' . absint( $blogImgRadRight ) . 'px;
            --img-radius-bottom:' . absint( $blogImgRadBottom ) . 'px;
            --img-radius-left:' . absint( $blogImgRadLeft ) . 'px;
        }
    
        .single-post .post-thumbnail.single-post-img img.wp-post-image{
            --img-radius-top:' . absint( $singleImgRadTop ) . 'px;
            --img-radius-right:' . absint( $singleImgRadRight ) . 'px;
            --img-radius-bottom:' . absint( $singleImgRadBottom ) . 'px;
            --img-radius-left:' . absint( $singleImgRadLeft ) . 'px;
        }
    
        .error404 .related-posts .post-thumbnail img.wp-post-image,
        .single-post .related-posts .post-thumbnail img.wp-post-image{
            --rltd-radius-top:' . absint( $rltdImgRadTop ) . 'px;
            --rltd-radius-right:' . absint( $rltdImgRadRight ) . 'px;
            --rltd-radius-bottom:' . absint( $rltdImgRadBottom ) . 'px;
            --rltd-radius-left:' . absint( $rltdImgRadLeft ) . 'px;
        }
    
        .error404 .page-grid{
            --coachy-posts-row:' . absint( $posts_per_row ) . ';
        }
    
        .site-footer{
            --foot-text-color   :' . coachify_sanitize_rgba( $foot_text_color ) . ';
            --foot-bg-color     :' . coachify_sanitize_rgba( $foot_bg_color ) . ';
            --widget-title-color:' . coachify_sanitize_rgba( $widget_heading_color ) . ';
        }
    
        .site-footer .footer-b{
            --foot-copyright-text-color   :' . coachify_sanitize_rgba( $foot_copyright_text_color ) . ';
            --foot-copyright-bg-color     :' . coachify_sanitize_rgba( $foot_copyright_bg_color ) . ';
        }
    
        .elementor-page h1,
        h1{
            font-family:' . wp_kses_post( $h1FontFamily ) . ';
            text-transform:' . esc_html( $heading_one['transform'] ) . ';      
            font-weight:' . esc_html( $heading_one['weight'] ) . ';
        }
    
        .elementor-page h2,
        h2{
            font-family:' . wp_kses_post( $h2FontFamily ) . ';
            text-transform:' . esc_html( $heading_two['transform'] ) . ';      
            font-weight:' . esc_html( $heading_two['weight'] ) . ';
        }
    
        .elementor-page h3,
        h3{
            font-family:' . wp_kses_post( $h3FontFamily ) . ';
            text-transform:' . esc_html( $heading_three['transform'] ) . ';      
            font-weight:' . esc_html( $heading_three['weight'] ) . ';
        }
    
        .elementor-page h4,
        h4{
            font-family:' . wp_kses_post( $h4FontFamily ) . ';
            text-transform:' . esc_html( $heading_four['transform'] ) . ';      
            font-weight:' . esc_html( $heading_four['weight'] ) . ';
        }
    
        .elementor-page h5,
        h5{
            font-family:' . wp_kses_post( $h5FontFamily ) . ';
            text-transform:' . esc_html( $heading_five['transform'] ) . ';      
            font-weight:' . esc_html( $heading_five['weight'] ) . ';
        }
        
        .elementor-page h6,
        h6{
            font-family:' . wp_kses_post( $h6FontFamily ) . ';
            text-transform:' . esc_html( $heading_six['transform'] ) . ';      
            font-weight:' . esc_html( $heading_six['weight'] ) . ';
        }

        @media (min-width: 1024px){
            :root{
                --g-primary-font-size   : ' . absint( $primarydesktopFontSize ) . 'px;
                --g-primary-font-height : ' . floatval( $primarydesktopHeight ) . 'em;
                --g-primary-font-spacing: ' . absint( $primarydesktopSpacing ) . 'px;
    
                --g-secondary-font-height : ' . floatval( $h1desktopHeight ) . 'em;
                --g-secondary-font-spacing: ' . absint( $h1desktopSpacing ) . 'px;
    
                --g-accent-font-size   : ' . absint( $accentdesktopFontSize ) . 'px;
                --g-accent-font-height : ' . floatval( $accentdesktopHeight ) . 'em;
                --g-accent-font-spacing: ' . absint( $accentdesktopSpacing ) . 'px;
    
                --container-width  : ' . absint($container_width) . 'px;
                --centered-maxwidth: ' . absint($fullwidth_centered) . 'px;
    
                --btn-font-size   : ' . absint( $btndesktopFontSize ) . 'px;
                --btn-font-height : ' . floatval( $btndesktopHeight ) . 'em;
                --btn-font-spacing: ' . absint( $btndesktopSpacing ) . 'px;
    
                --widget-spacing: ' . absint($widgets_spacing) . 'px;
            }
            
            .site-footer{
                --foot-top-spacing: ' . absint($foot_top_spacing) . 'px;
            }

            .site-header .site-branding .site-title,
            .site-footer .site-branding .site-title {
                font-size     : ' . absint( $sitedesktopFontSize ) . 'px;
                line-height   : ' . floatval( $sitedesktopHeight ) . 'em;
                letter-spacing: ' . absint( $sitedesktopSpacing ) . 'px;
            }
    
            .page-grid{
                --sidebar-width: ' . absint($sidebar_width) . '%;
            }
    
            .back-to-top{
                --scroll-to-top-size: ' . absint($scroll_top_size) . 'px;
            }
            .elementor-page h1,
            h1{
                font-size   : ' . floatval( $h1desktopFontSize ) . 'px;
                line-height   : ' . floatval( $h1desktopHeight ) . 'em;
                letter-spacing: ' . absint( $h1desktopSpacing ) . 'px;
            }
    
            .elementor-page h2,
            h2{
                font-size   : ' . floatval( $h2desktopFontSize ) . 'px;
                line-height   : ' . floatval( $h2desktopHeight ) . 'em;
                letter-spacing: ' . absint( $h2desktopSpacing ) . 'px;
            }
    
            .elementor-page h3,
            h3{
                font-size   : ' . floatval( $h3desktopFontSize ) . 'px;
                line-height   : ' . floatval( $h3desktopHeight ) . 'em;
                letter-spacing: ' . absint( $h3desktopSpacing ) . 'px;
            }
    
            .elementor-page h4,
            h4{
                font-size   : ' . floatval( $h4desktopFontSize ) . 'px;
                line-height   : ' . floatval( $h4desktopHeight ) . 'em;
                letter-spacing: ' . absint( $h4desktopSpacing ) . 'px;
            }
    
            .elementor-page h5,
            h5{
                font-size   : ' . floatval( $h5desktopFontSize ) . 'px;
                line-height   : ' . floatval( $h5desktopHeight ) . 'em;
                letter-spacing: ' . absint( $h5desktopSpacing ) . 'px;
            }
    
            .elementor-page h6,
            h6{
                font-size   : ' . floatval( $h6desktopFontSize ) . 'px;
                line-height   : ' . floatval( $h6desktopHeight ) . 'em;
                letter-spacing: ' . absint( $h6desktopSpacing ) . 'px;
            }
        }

        @media (min-width: 767px) and (max-width: 1024px){
            :root{
                --g-primary-font-size:' . absint( $primarytabletFontSize ) . 'px;
                --g-primary-font-height:' . floatval( $primarytabletHeight ) . 'em;
                --g-primary-font-spacing:' . absint( $primarytabletSpacing ) . 'px;
    
                --g-secondary-font-height :' . floatval( $h1tabletHeight ) . 'em;
                --g-secondary-font-spacing:' . absint( $h1tabletSpacing ) . 'px;
    
                --g-accent-font-size:' . absint( $accenttabletFontSize ) . 'px;
                --g-accent-font-height:' . floatval( $accenttabletHeight ) . 'em;
                --g-accent-font-spacing:' . absint( $accenttabletSpacing ) . 'px;
    
                --container-width  :' . absint($tablet_container_width) . 'px;
                --centered-maxwidth:' . absint($tablet_fullwidth_centered) . 'px;
    
                --btn-font-size   :' . absint( $btntabletFontSize ) . 'px;
                --btn-font-height :' . floatval( $btntabletHeight ) . 'em;
                --btn-font-spacing:' . absint( $btntabletSpacing ) . 'px;
    
                --widget-spacing:' . absint($tablet_widgets_spacing) . 'px;
            }
    
            .site-footer{
                --foot-top-spacing: ' . absint($tablet_foot_top_spacing) . 'px;
            }

            .site-branding .site-title {
                font-size   :' . absint( $sitetabletFontSize ) . 'px;
                line-height   :' . floatval( $sitetabletHeight ) . 'em;
                letter-spacing:' . absint( $sitetabletSpacing ) . 'px;
            }
    
            .site-branding .custom-logo-link img{
                width:' . absint( $tablet_logo_width ) . 'px;
            }
    
            .page-grid{
                --sidebar-width: 100%;
            }
    
            .back-to-top{
                --scroll-to-top-size:' . absint($tablet_scroll_top_size) . 'px;
            }
    
            .elementor-page h1,
            h1{
                font-size   :' . floatval( $h1tabletFontSize ) . 'px;
                line-height   :' . floatval( $h1tabletHeight ) . 'em;
                letter-spacing:' . absint( $h1tabletSpacing ) . 'px;
            }
    
            .elementor-page h2,
            h2{
                font-size   :' . floatval( $h2tabletFontSize ) . 'px;
                line-height   :' . floatval( $h2tabletHeight ) . 'em;
                letter-spacing:' . absint( $h2tabletSpacing ) . 'px;
            }
    
            .elementor-page h3,
            h3{
                font-size   :' . floatval( $h3tabletFontSize ) . 'px;
                line-height   :' . floatval( $h3tabletHeight ) . 'em;
                letter-spacing:' . absint( $h3tabletSpacing ) . 'px;
            }
    
            .elementor-page h4,
            h4{
                font-size   :' . floatval( $h4tabletFontSize ) . 'px;
                line-height   :' . floatval( $h4tabletHeight ) . 'em;
                letter-spacing:' . absint( $h4tabletSpacing ) . 'px;
            }
    
            .elementor-page h5,
            h5{
                font-size   :' . floatval( $h5tabletFontSize ) . 'px;
                line-height   :' . floatval( $h5tabletHeight ) . 'em;
                letter-spacing:' . absint( $h5tabletSpacing ) . 'px;
            }
    
            .elementor-page h6,
            h6{
                font-size   :' . floatval( $h6tabletFontSize ) . 'px;
                line-height   :' . floatval( $h6tabletHeight ) . 'em;
                letter-spacing:' . absint( $h6tabletSpacing ) . 'px;
            }
        }
    
        @media (max-width: 767px){
            :root{
                --g-primary-font-size:' . absint( $primarymobileFontSize ) . 'px;
                --g-primary-font-height:' . floatval( $primarymobileHeight ) . 'em;
                --g-primary-font-spacing:' . absint( $primarymobileSpacing ) . 'px;
    
                --g-secondary-font-height :' . floatval( $h1mobileHeight ) . 'em;
                --g-secondary-font-spacing:' . absint( $h1mobileSpacing ) . 'px;
    
                --g-accent-font-size:' . absint( $accentmobileFontSize ) . 'px;
                --g-accent-font-height:' . floatval( $accentmobileHeight ) . 'em;
                --g-accent-font-spacing:' . absint( $accentmobileSpacing ) . 'px;
    
                --container-width  :' . absint($mobile_container_width) . 'px;
                --centered-maxwidth:' . absint($mobile_fullwidth_centered) . 'px;
    
                --btn-font-size   :' . absint( $btnmobileFontSize ) . 'px;
                --btn-font-height :' . floatval( $btnmobileHeight ) . 'em;
                --btn-font-spacing:' . absint( $btnmobileSpacing ) . 'px;
    
                --widget-spacing:' . absint($mobile_widgets_spacing) . 'px;
            }
    
            .site-footer{
                --foot-top-spacing: ' . absint($mobile_foot_top_spacing) . 'px;
            }

            .site-branding .site-title{
                font-size   :' . absint( $sitemobileFontSize ) . 'px;
                line-height   :' . floatval( $sitemobileHeight ) . 'em;
                letter-spacing:' . absint( $sitemobileSpacing ) . 'px;
            }
    
            .site-branding .custom-logo-link img{
                width:' . absint( $mobile_logo_width ) . 'px;
            }
    
            .back-to-top{
                --scroll-to-top-size:' . absint($mobile_scroll_top_size) . 'px;
            }
    
            .elementor-page h1,
            h1{
                font-size   :' . floatval( $h1mobileFontSize ) . 'px;
                line-height   :' . floatval( $h1mobileHeight ) . 'em;
                letter-spacing:' . absint( $h1mobileSpacing ) . 'px;
            }
    
            .elementor-page h2,
            h2{
                font-size   :' . floatval( $h2mobileFontSize ) . 'px;
                line-height   :' . floatval( $h2mobileHeight ) . 'em;
                letter-spacing:' . absint( $h2mobileSpacing ) . 'px;
            }
    
            .elementor-page h3,
            h3{
                font-size   :' . floatval( $h3mobileFontSize ) . 'px;
                line-height   :' . floatval( $h3mobileHeight ) . 'em;
                letter-spacing:' . absint( $h3mobileSpacing ) . 'px;
            }
    
            .elementor-page h4,
            h4{
                font-size   :' . floatval( $h4mobileFontSize ) . 'px;
                line-height   :' . floatval( $h4mobileHeight ) . 'em;
                letter-spacing:' . absint( $h4mobileSpacing ) . 'px;
            }
    
            .elementor-page h5,
            h5{
                font-size   :' . floatval( $h5mobileFontSize ) . 'px;
                line-height   :' . floatval( $h5mobileHeight ) . 'em;
                letter-spacing:' . absint( $h5mobileSpacing ) . 'px;
            }
    
            .elementor-page h6,
            h6{
                font-size   :' . floatval( $h6mobileFontSize ) . 'px;
                line-height   :' . floatval( $h6mobileHeight ) . 'em;
                letter-spacing:' . absint( $h6mobileSpacing ) . 'px;
            }
        }
        :root {
            --e-global-color-primary_color         : ' . coachify_sanitize_rgba( $primary_color ) . ';
            --e-global-color-secondary_color       : ' . coachify_sanitize_rgba( $secondary_color ) . ';
            --e-global-color-body_font_color       : ' . coachify_sanitize_rgba( $body_font_color ) . ';
            --e-global-color-heading_color         : ' . coachify_sanitize_rgba( $heading_color ) . ';
            --e-global-color-primary_accent_color  : ' . coachify_sanitize_rgba( $primary_accent_color ) . ';
            --e-global-color-secondary_accent_color: ' . coachify_sanitize_rgba( $secondary_accent_color ) . ';
            --e-global-color-tertiary_accent_color : ' . coachify_sanitize_rgba( $tertiary_accent_color ) . ';
        }
    ';

    return $css;   
}

/**
 * Add Dynamic SVG
 *
 * @return void
 */
function coachify_dynamic_other_css(){
    echo "<style id='coachify-dynamic-css' type='text/css' media='all'>"; ?>
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='9.736' height='6.204' viewBox='0 0 9.736 6.204'%3E%3Cpath id='Path_26478' data-name='Path 26478' d='M5,0,0,4.164,5,8.328' transform='translate(0.704 5.704) rotate(-90)' fill='none' stroke='%23808080' stroke-linecap='round' stroke-linejoin='round' stroke-width='1'/%3E%3C/svg%3E%0A");
        }
        .comments-area :is(.comment-list, ol) .comment.bypostauthor > .comment-body .comment-meta .comment-author::after {
            background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" width="17.96" height="17.96" viewBox="0 0 17.96 17.96"><g transform="translate(-584 -10824)"><rect width="17.96" height="17.96" rx="8.98" transform="translate(584 10824)" fill="%2300ab0b"/><path d="M5058.939,3595.743l2.417,2.418,5.32-5.32" transform="translate(-4469.439 7237.66)" fill="none" stroke="%23fff" stroke-linecap="round" stroke-width="2"/></g></svg>');
        }
        .navigation.pagination .nav-links :is(.prev, .next)::after, .navigation.pagination .nav-links :is(.prev, .next)::before {
            background-image: url("data:image/svg+xml,%3Csvg width='9' height='13' viewBox='0 0 9 13' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0.839844 1.79037L5.41984 6.38037L0.839844 10.9704L2.24984 12.3804L8.24984 6.38037L2.24984 0.380371L0.839844 1.79037Z' fill='%230D173B'/%3E%3C/svg%3E");
        }
        .navigation.pagination .nav-links :is(.prev, .next):hover::after, .navigation.pagination .nav-links :is(.prev, .next):hover::before {
            background-image: url("data:image/svg+xml,%3Csvg width='9' height='13' viewBox='0 0 9 13' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0.839844 1.79037L5.41984 6.38037L0.839844 10.9704L2.24984 12.3804L8.24984 6.38037L2.24984 0.380371L0.839844 1.79037Z' fill='%23ffffff'/%3E%3C/svg%3E");
        }
        :is(.header-search-wrap, .error-404-search, .widget) .search-submit,
        .wp-block-search__button {
            background-image: url("data:image/svg+xml,%3Csvg width='25' height='24' viewBox='0 0 25 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.5 16L22.5 22' stroke='white' stroke-width='2' stroke-miterlimit='10' stroke-linecap='round'/%3E%3Cpath d='M10.0006 18.0011C14.4191 18.0011 18.0011 14.4191 18.0011 10.0006C18.0011 5.58197 14.4191 2 10.0006 2C5.58197 2 2 5.58197 2 10.0006C2 14.4191 5.58197 18.0011 10.0006 18.0011Z' stroke='white' stroke-width='2' stroke-miterlimit='10' stroke-linecap='round'/%3E%3C/svg%3E%0A");
        }
        .search :is(.page-header) .search-submit {
            background-image: url("data:image/svg+xml,%3Csvg width='25' height='24' viewBox='0 0 25 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.5 16L22.5 22' stroke='white' stroke-width='2' stroke-miterlimit='10' stroke-linecap='round'/%3E%3Cpath d='M10.0006 18.0011C14.4191 18.0011 18.0011 14.4191 18.0011 10.0006C18.0011 5.58197 14.4191 2 10.0006 2C5.58197 2 2 5.58197 2 10.0006C2 14.4191 5.58197 18.0011 10.0006 18.0011Z' stroke='white' stroke-width='2' stroke-miterlimit='10' stroke-linecap='round'/%3E%3C/svg%3E%0A");
        }
        blockquote::before {
            -webkit-mask-image: url("data:image/svg+xml,%3Csvg width='72' height='54' viewBox='0 0 72 54' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.32 54C11.2 54 7.168 52.1684 4.224 48.5053C1.408 44.7158 0 39.7895 0 33.7263C0 26.5263 1.856 19.9579 5.568 14.0211C9.408 8.08422 15.104 3.41053 22.656 0L32.64 8.14737C27.392 9.91579 22.976 12.5684 19.392 16.1053C15.808 19.5158 13.44 23.3684 12.288 27.6632L13.248 28.0421C14.272 27.0316 16.064 26.5263 18.624 26.5263C21.824 26.5263 24.64 27.7263 27.072 30.1263C29.632 32.4 30.912 35.6211 30.912 39.7895C30.912 43.8316 29.504 47.2421 26.688 50.0211C23.872 52.6737 20.416 54 16.32 54ZM55.68 54C50.56 54 46.528 52.1684 43.584 48.5053C40.768 44.7158 39.36 39.7895 39.36 33.7263C39.36 26.5263 41.216 19.9579 44.928 14.0211C48.768 8.08422 54.464 3.41053 62.016 0L72 8.14737C66.752 9.91579 62.336 12.5684 58.752 16.1053C55.168 19.5158 52.8 23.3684 51.648 27.6632L52.608 28.0421C53.632 27.0316 55.424 26.5263 57.984 26.5263C61.184 26.5263 64 27.7263 66.432 30.1263C68.992 32.4 70.272 35.6211 70.272 39.7895C70.272 43.8316 68.864 47.2421 66.048 50.0211C63.232 52.6737 59.776 54 55.68 54Z' fill='%23FDEFEF'/%3E%3C/svg%3E%0A");
            mask-image: url("data:image/svg+xml,%3Csvg width='72' height='54' viewBox='0 0 72 54' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.32 54C11.2 54 7.168 52.1684 4.224 48.5053C1.408 44.7158 0 39.7895 0 33.7263C0 26.5263 1.856 19.9579 5.568 14.0211C9.408 8.08422 15.104 3.41053 22.656 0L32.64 8.14737C27.392 9.91579 22.976 12.5684 19.392 16.1053C15.808 19.5158 13.44 23.3684 12.288 27.6632L13.248 28.0421C14.272 27.0316 16.064 26.5263 18.624 26.5263C21.824 26.5263 24.64 27.7263 27.072 30.1263C29.632 32.4 30.912 35.6211 30.912 39.7895C30.912 43.8316 29.504 47.2421 26.688 50.0211C23.872 52.6737 20.416 54 16.32 54ZM55.68 54C50.56 54 46.528 52.1684 43.584 48.5053C40.768 44.7158 39.36 39.7895 39.36 33.7263C39.36 26.5263 41.216 19.9579 44.928 14.0211C48.768 8.08422 54.464 3.41053 62.016 0L72 8.14737C66.752 9.91579 62.336 12.5684 58.752 16.1053C55.168 19.5158 52.8 23.3684 51.648 27.6632L52.608 28.0421C53.632 27.0316 55.424 26.5263 57.984 26.5263C61.184 26.5263 64 27.7263 66.432 30.1263C68.992 32.4 70.272 35.6211 70.272 39.7895C70.272 43.8316 68.864 47.2421 66.048 50.0211C63.232 52.6737 59.776 54 55.68 54Z' fill='%23FDEFEF'/%3E%3C/svg%3E%0A");
        }
        .btn-tertiary::after {
            mask-image: url("data:image/svg+xml,%3Csvg width='21' height='9' viewBox='0 0 21 9' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cline y1='4.38086' x2='19.5' y2='4.38086' stroke='%23E75387'/%3E%3Cpath d='M15.75 0.880859C15.75 3.38086 19.75 4.63086 19.75 4.63086C19.75 4.63086 15.75 5.88086 15.75 8.38086' stroke='%23E75387' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
            -webkit-mask-image: url("data:image/svg+xml,%3Csvg width='21' height='9' viewBox='0 0 21 9' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cline y1='4.38086' x2='19.5' y2='4.38086' stroke='%23E75387'/%3E%3Cpath d='M15.75 0.880859C15.75 3.38086 19.75 4.63086 19.75 4.63086C19.75 4.63086 15.75 5.88086 15.75 8.38086' stroke='%23E75387' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
        }

    <?php echo "</style>";
}
add_action( 'wp_head', 'coachify_dynamic_other_css', 99 );


/**
 * convert hex to rgb
 * @link https://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/
function coachify_hex2rgb($hex) {
    if($hex[0] === '#' ){
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    } else {
        $hex = str_replace("rgba(", "", $hex);
        $hex = str_replace(")", "", $hex);
        $rgb = explode(",", $hex );
        $opacity = array_pop($rgb); //removing opacity value from rgba

        return $rgb;
    }
}

/**
 * convert rgba to hex
 * @param string $string Hex color code
 * @link https://gist.github.com/clemblanco/adb73dae3dc5308553f9/
 * @return string
 */
function coachify_rgba2hex($string) {
    if ( $string[0] === '#') {
        return strtolower($string);
    } else {
        $rgba  = array();
        $regex = '#\((([^()]+|(?R))*)\)#';
        if (preg_match_all($regex, $string ,$matches)) {
            $rgba = explode(',', implode(' ', $matches[1]));
        } else {
            $rgba = explode(',', $string);
        }
        
        $rr = dechex($rgba['0']);
        $gg = dechex($rgba['1']);
        $bb = dechex($rgba['2']);
        $aa = '';
        
        if (array_key_exists('3', $rgba)) {
            $aa = dechex($rgba['3'] * 255);
        }
        
        return strtolower("#$aa$rr$gg$bb");
    }
}

/**
 *  Convert '#' to '%23'
 *
 * @param string $color_code Hex color code
 * @return string
 */
function coachify_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}

if ( ! function_exists( 'coachify_gutenberg_inline_style' ) ) : 
/**
 * Gutenberg Dynamic Style
 * @return void
 * 
 */
function coachify_gutenberg_inline_style(){
    $typo_defaults   = coachify_get_typography_defaults();
    $defaults        = coachify_get_color_defaults();
    $button_defaults = coachify_get_button_defaults();
	$general_defaults = coachify_get_general_defaults();
    
    $primary_font   = wp_parse_args( get_theme_mod( 'primary_font' ), $typo_defaults['primary_font'] );
    $button         = wp_parse_args( get_theme_mod( 'button' ), $typo_defaults['button'] );
    $heading_one    = wp_parse_args( get_theme_mod( 'heading_one' ), $typo_defaults['heading_one'] );
	$heading_two    = wp_parse_args( get_theme_mod( 'heading_two' ), $typo_defaults['heading_two'] );
	$heading_three  = wp_parse_args( get_theme_mod( 'heading_three' ), $typo_defaults['heading_three'] );
	$heading_four   = wp_parse_args( get_theme_mod( 'heading_four' ), $typo_defaults['heading_four'] );
	$heading_five   = wp_parse_args( get_theme_mod( 'heading_five' ), $typo_defaults['heading_five'] );
	$heading_six    = wp_parse_args( get_theme_mod( 'heading_six' ), $typo_defaults['heading_six'] );
	$accent_font    = wp_parse_args( get_theme_mod( 'accent_font' ), $typo_defaults['accent_font'] );

    //Primary Font variables
    $primarydesktopFontSize = isset(  $primary_font['desktop']['font_size'] ) ? $primary_font['desktop']['font_size'] : $typo_defaults['primary_font']['desktop']['font_size'];
    $primarydesktopSpacing  = isset(  $primary_font['desktop']['letter_spacing'] ) ? $primary_font['desktop']['letter_spacing'] : $typo_defaults['primary_font']['desktop']['letter_spacing'];
    $primarydesktopHeight   = isset(  $primary_font['desktop']['line_height'] ) ? $primary_font['desktop']['line_height'] : $typo_defaults['primary_font']['desktop']['line_height'];
    $primarytabletFontSize  = isset(  $primary_font['tablet']['font_size'] ) ? $primary_font['tablet']['font_size'] : $typo_defaults['primary_font']['tablet']['font_size'];
    $primarytabletSpacing   = isset(  $primary_font['tablet']['letter_spacing'] ) ? $primary_font['tablet']['letter_spacing'] : $typo_defaults['primary_font']['tablet']['letter_spacing'];
    $primarytabletHeight    = isset(  $primary_font['tablet']['line_height'] ) ? $primary_font['tablet']['line_height'] : $typo_defaults['primary_font']['tablet']['line_height'];
    $primarymobileFontSize  = isset(  $primary_font['mobile']['font_size'] ) ? $primary_font['mobile']['font_size'] : $typo_defaults['primary_font']['mobile']['font_size'];
    $primarymobileSpacing   = isset(  $primary_font['mobile']['letter_spacing'] ) ? $primary_font['mobile']['letter_spacing'] : $typo_defaults['primary_font']['mobile']['letter_spacing'];
    $primarymobileHeight    = isset(  $primary_font['mobile']['line_height'] ) ? $primary_font['mobile']['line_height'] : $typo_defaults['primary_font']['mobile']['line_height'];

    //Button variables
    $btndesktopFontSize = isset(  $button['desktop']['font_size'] ) ? $button['desktop']['font_size'] : $typo_defaults['button']['desktop']['font_size'];
    $btndesktopSpacing  = isset(  $button['desktop']['letter_spacing'] ) ? $button['desktop']['letter_spacing'] : $typo_defaults['button']['desktop']['letter_spacing'];
    $btndesktopHeight   = isset(  $button['desktop']['line_height'] ) ? $button['desktop']['line_height'] : $typo_defaults['button']['desktop']['line_height'];
    $btntabletFontSize  = isset(  $button['tablet']['font_size'] ) ? $button['tablet']['font_size'] : $typo_defaults['button']['tablet']['font_size'];
    $btntabletSpacing   = isset(  $button['tablet']['letter_spacing'] ) ? $button['tablet']['letter_spacing'] : $typo_defaults['button']['tablet']['letter_spacing'];
    $btntabletHeight    = isset(  $button['tablet']['line_height'] ) ? $button['tablet']['line_height'] : $typo_defaults['button']['tablet']['line_height'];
    $btnmobileFontSize  = isset(  $button['mobile']['font_size'] ) ? $button['mobile']['font_size'] : $typo_defaults['button']['mobile']['font_size'];
    $btnmobileSpacing   = isset(  $button['mobile']['letter_spacing'] ) ? $button['mobile']['letter_spacing'] : $typo_defaults['button']['mobile']['letter_spacing'];
    $btnmobileHeight    = isset(  $button['mobile']['line_height'] ) ? $button['mobile']['line_height'] : $typo_defaults['button']['mobile']['line_height'];

    //Heading 1 variables
    $h1desktopFontSize = isset(  $heading_one['desktop']['font_size'] ) ? $heading_one['desktop']['font_size'] : $typo_defaults['heading_one']['desktop']['font_size'];
    $h1desktopSpacing  = isset(  $heading_one['desktop']['letter_spacing'] ) ? $heading_one['desktop']['letter_spacing'] : $typo_defaults['heading_one']['desktop']['letter_spacing'];
    $h1desktopHeight   = isset(  $heading_one['desktop']['line_height'] ) ? $heading_one['desktop']['line_height'] : $typo_defaults['heading_one']['desktop']['line_height'];
    $h1tabletFontSize  = isset(  $heading_one['tablet']['font_size'] ) ? $heading_one['tablet']['font_size'] : $typo_defaults['heading_one']['tablet']['font_size'];
    $h1tabletSpacing   = isset(  $heading_one['tablet']['letter_spacing'] ) ? $heading_one['tablet']['letter_spacing'] : $typo_defaults['heading_one']['tablet']['letter_spacing'];
    $h1tabletHeight    = isset(  $heading_one['tablet']['line_height'] ) ? $heading_one['tablet']['line_height'] : $typo_defaults['heading_one']['tablet']['line_height'];
    $h1mobileFontSize  = isset(  $heading_one['mobile']['font_size'] ) ? $heading_one['mobile']['font_size'] : $typo_defaults['heading_one']['mobile']['font_size'];
    $h1mobileSpacing   = isset(  $heading_one['mobile']['letter_spacing'] ) ? $heading_one['mobile']['letter_spacing'] : $typo_defaults['heading_one']['mobile']['letter_spacing'];
    $h1mobileHeight    = isset(  $heading_one['mobile']['line_height'] ) ? $heading_one['mobile']['line_height'] : $typo_defaults['heading_one']['mobile']['line_height'];
    
    //Heading 2 variables
    $h2desktopFontSize = isset(  $heading_two['desktop']['font_size'] ) ? $heading_two['desktop']['font_size'] : $typo_defaults['heading_two']['desktop']['font_size'];
    $h2desktopSpacing  = isset(  $heading_two['desktop']['letter_spacing'] ) ? $heading_two['desktop']['letter_spacing'] : $typo_defaults['heading_two']['desktop']['letter_spacing'];
    $h2desktopHeight   = isset(  $heading_two['desktop']['line_height'] ) ? $heading_two['desktop']['line_height'] : $typo_defaults['heading_two']['desktop']['line_height'];
    $h2tabletFontSize  = isset(  $heading_two['tablet']['font_size'] ) ? $heading_two['tablet']['font_size'] : $typo_defaults['heading_two']['tablet']['font_size'];
    $h2tabletSpacing   = isset(  $heading_two['tablet']['letter_spacing'] ) ? $heading_two['tablet']['letter_spacing'] : $typo_defaults['heading_two']['tablet']['letter_spacing'];
    $h2tabletHeight    = isset(  $heading_two['tablet']['line_height'] ) ? $heading_two['tablet']['line_height'] : $typo_defaults['heading_two']['tablet']['line_height'];
    $h2mobileFontSize  = isset(  $heading_two['mobile']['font_size'] ) ? $heading_two['mobile']['font_size'] : $typo_defaults['heading_two']['mobile']['font_size'];
    $h2mobileSpacing   = isset(  $heading_two['mobile']['letter_spacing'] ) ? $heading_two['mobile']['letter_spacing'] : $typo_defaults['heading_two']['mobile']['letter_spacing'];
    $h2mobileHeight    = isset(  $heading_two['mobile']['line_height'] ) ? $heading_two['mobile']['line_height'] : $typo_defaults['heading_two']['mobile']['line_height'];
    
    //Heading 3 variables
    $h3desktopFontSize = isset(  $heading_three['desktop']['font_size'] ) ? $heading_three['desktop']['font_size'] : $typo_defaults['heading_three']['desktop']['font_size'];
    $h3desktopSpacing  = isset(  $heading_three['desktop']['letter_spacing'] ) ? $heading_three['desktop']['letter_spacing'] : $typo_defaults['heading_three']['desktop']['letter_spacing'];
    $h3desktopHeight   = isset(  $heading_three['desktop']['line_height'] ) ? $heading_three['desktop']['line_height'] : $typo_defaults['heading_three']['desktop']['line_height'];
    $h3tabletFontSize  = isset(  $heading_three['tablet']['font_size'] ) ? $heading_three['tablet']['font_size'] : $typo_defaults['heading_three']['tablet']['font_size'];
    $h3tabletSpacing   = isset(  $heading_three['tablet']['letter_spacing'] ) ? $heading_three['tablet']['letter_spacing'] : $typo_defaults['heading_three']['tablet']['letter_spacing'];
    $h3tabletHeight    = isset(  $heading_three['tablet']['line_height'] ) ? $heading_three['tablet']['line_height'] : $typo_defaults['heading_three']['tablet']['line_height'];
    $h3mobileFontSize  = isset(  $heading_three['mobile']['font_size'] ) ? $heading_three['mobile']['font_size'] : $typo_defaults['heading_three']['mobile']['font_size'];
    $h3mobileSpacing   = isset(  $heading_three['mobile']['letter_spacing'] ) ? $heading_three['mobile']['letter_spacing'] : $typo_defaults['heading_three']['mobile']['letter_spacing'];
    $h3mobileHeight    = isset(  $heading_three['mobile']['line_height'] ) ? $heading_three['mobile']['line_height'] : $typo_defaults['heading_three']['mobile']['line_height'];
    
    //Heading 4 variables
    $h4desktopFontSize = isset(  $heading_four['desktop']['font_size'] ) ? $heading_four['desktop']['font_size'] : $typo_defaults['heading_four']['desktop']['font_size'];
    $h4desktopSpacing  = isset(  $heading_four['desktop']['letter_spacing'] ) ? $heading_four['desktop']['letter_spacing'] : $typo_defaults['heading_four']['desktop']['letter_spacing'];
    $h4desktopHeight   = isset(  $heading_four['desktop']['line_height'] ) ? $heading_four['desktop']['line_height'] : $typo_defaults['heading_four']['desktop']['line_height'];
    $h4tabletFontSize  = isset(  $heading_four['tablet']['font_size'] ) ? $heading_four['tablet']['font_size'] : $typo_defaults['heading_four']['tablet']['font_size'];
    $h4tabletSpacing   = isset(  $heading_four['tablet']['letter_spacing'] ) ? $heading_four['tablet']['letter_spacing'] : $typo_defaults['heading_four']['tablet']['letter_spacing'];
    $h4tabletHeight    = isset(  $heading_four['tablet']['line_height'] ) ? $heading_four['tablet']['line_height'] : $typo_defaults['heading_four']['tablet']['line_height'];
    $h4mobileFontSize  = isset(  $heading_four['mobile']['font_size'] ) ? $heading_four['mobile']['font_size'] : $typo_defaults['heading_four']['mobile']['font_size'];
    $h4mobileSpacing   = isset(  $heading_four['mobile']['letter_spacing'] ) ? $heading_four['mobile']['letter_spacing'] : $typo_defaults['heading_four']['mobile']['letter_spacing'];
    $h4mobileHeight    = isset(  $heading_four['mobile']['line_height'] ) ? $heading_four['mobile']['line_height'] : $typo_defaults['heading_four']['mobile']['line_height'];
    
    //Heading 5 variables
    $h5desktopFontSize = isset(  $heading_five['desktop']['font_size'] ) ? $heading_five['desktop']['font_size'] : $typo_defaults['heading_five']['desktop']['font_size'];
    $h5desktopSpacing  = isset(  $heading_five['desktop']['letter_spacing'] ) ? $heading_five['desktop']['letter_spacing'] : $typo_defaults['heading_five']['desktop']['letter_spacing'];
    $h5desktopHeight   = isset(  $heading_five['desktop']['line_height'] ) ? $heading_five['desktop']['line_height'] : $typo_defaults['heading_five']['desktop']['line_height'];
    $h5tabletFontSize  = isset(  $heading_five['tablet']['font_size'] ) ? $heading_five['tablet']['font_size'] : $typo_defaults['heading_five']['tablet']['font_size'];
    $h5tabletSpacing   = isset(  $heading_five['tablet']['letter_spacing'] ) ? $heading_five['tablet']['letter_spacing'] : $typo_defaults['heading_five']['tablet']['letter_spacing'];
    $h5tabletHeight    = isset(  $heading_five['tablet']['line_height'] ) ? $heading_five['tablet']['line_height'] : $typo_defaults['heading_five']['tablet']['line_height'];
    $h5mobileFontSize  = isset(  $heading_five['mobile']['font_size'] ) ? $heading_five['mobile']['font_size'] : $typo_defaults['heading_five']['mobile']['font_size'];
    $h5mobileSpacing   = isset(  $heading_five['mobile']['letter_spacing'] ) ? $heading_five['mobile']['letter_spacing'] : $typo_defaults['heading_five']['mobile']['letter_spacing'];
    $h5mobileHeight    = isset(  $heading_five['mobile']['line_height'] ) ? $heading_five['mobile']['line_height'] : $typo_defaults['heading_five']['mobile']['line_height'];
    
    //Heading 6 variables
    $h6desktopFontSize = isset(  $heading_six['desktop']['font_size'] ) ? $heading_six['desktop']['font_size'] : $typo_defaults['heading_six']['desktop']['font_size'];
    $h6desktopSpacing  = isset(  $heading_six['desktop']['letter_spacing'] ) ? $heading_six['desktop']['letter_spacing'] : $typo_defaults['heading_six']['desktop']['letter_spacing'];
    $h6desktopHeight   = isset(  $heading_six['desktop']['line_height'] ) ? $heading_six['desktop']['line_height'] : $typo_defaults['heading_six']['desktop']['line_height'];
    $h6tabletFontSize  = isset(  $heading_six['tablet']['font_size'] ) ? $heading_six['tablet']['font_size'] : $typo_defaults['heading_six']['tablet']['font_size'];
    $h6tabletSpacing   = isset(  $heading_six['tablet']['letter_spacing'] ) ? $heading_six['tablet']['letter_spacing'] : $typo_defaults['heading_six']['tablet']['letter_spacing'];
    $h6tabletHeight    = isset(  $heading_six['tablet']['line_height'] ) ? $heading_six['tablet']['line_height'] : $typo_defaults['heading_six']['tablet']['line_height'];
    $h6mobileFontSize  = isset(  $heading_six['mobile']['font_size'] ) ? $heading_six['mobile']['font_size'] : $typo_defaults['heading_six']['mobile']['font_size'];
    $h6mobileSpacing   = isset(  $heading_six['mobile']['letter_spacing'] ) ? $heading_six['mobile']['letter_spacing'] : $typo_defaults['heading_six']['mobile']['letter_spacing'];
    $h6mobileHeight    = isset(  $heading_six['mobile']['line_height'] ) ? $heading_six['mobile']['line_height'] : $typo_defaults['heading_six']['mobile']['line_height'];

    //Accent Font variables
    $accentdesktopFontSize = isset(  $accent_font['desktop']['font_size'] ) ? $accent_font['desktop']['font_size'] : $typo_defaults['accent_font']['desktop']['font_size'];
    $accentdesktopSpacing  = isset(  $accent_font['desktop']['letter_spacing'] ) ? $accent_font['desktop']['letter_spacing'] : $typo_defaults['accent_font']['desktop']['letter_spacing'];
    $accentdesktopHeight   = isset(  $accent_font['desktop']['line_height'] ) ? $accent_font['desktop']['line_height'] : $typo_defaults['accent_font']['desktop']['line_height'];
    $accenttabletFontSize  = isset(  $accent_font['tablet']['font_size'] ) ? $accent_font['tablet']['font_size'] : $typo_defaults['accent_font']['tablet']['font_size'];
    $accenttabletSpacing   = isset(  $accent_font['tablet']['letter_spacing'] ) ? $accent_font['tablet']['letter_spacing'] : $typo_defaults['accent_font']['tablet']['letter_spacing'];
    $accenttabletHeight    = isset(  $accent_font['tablet']['line_height'] ) ? $accent_font['tablet']['line_height'] : $typo_defaults['accent_font']['tablet']['line_height'];
    $accentmobileFontSize  = isset(  $accent_font['mobile']['font_size'] ) ? $accent_font['mobile']['font_size'] : $typo_defaults['accent_font']['mobile']['font_size'];
    $accentmobileSpacing   = isset(  $accent_font['mobile']['letter_spacing'] ) ? $accent_font['mobile']['letter_spacing'] : $typo_defaults['accent_font']['mobile']['letter_spacing'];
    $accentmobileHeight    = isset(  $accent_font['mobile']['line_height'] ) ? $accent_font['mobile']['line_height'] : $typo_defaults['accent_font']['mobile']['line_height'];
 
    $primary_font_family       = coachify_get_font_family( $primary_font );
    $btn_font_family           = coachify_get_font_family( $button );
    $heading_one_font_family   = coachify_get_font_family( $heading_one );
    $heading_two_font_family   = coachify_get_font_family( $heading_two );
    $heading_three_font_family = coachify_get_font_family( $heading_three );
    $heading_four_font_family  = coachify_get_font_family( $heading_four );
    $heading_five_font_family  = coachify_get_font_family( $heading_five );
    $heading_six_font_family   = coachify_get_font_family( $heading_six );
    $accent_font_family        = coachify_get_font_family( $accent_font );

    $btnFontFamily  = $btn_font_family === '"Default Family"' ? 'inherit' : $btn_font_family;
    $h1FontFamily   = $heading_one_font_family === '"Default Family"' ? 'inherit' : $heading_one_font_family;
    $h2FontFamily   = $heading_two_font_family === '"Default Family"' ? 'inherit' : $heading_two_font_family;
    $h3FontFamily   = $heading_three_font_family === '"Default Family"' ? 'inherit' : $heading_three_font_family;
    $h4FontFamily   = $heading_four_font_family === '"Default Family"' ? 'inherit' : $heading_four_font_family;
    $h5FontFamily   = $heading_five_font_family === '"Default Family"' ? 'inherit' : $heading_five_font_family;
    $h6FontFamily   = $heading_six_font_family === '"Default Family"' ? 'inherit' : $heading_six_font_family;
    $accFontFamily  = $accent_font_family === '"Default Family"' ? 'inherit' : $accent_font_family;

    $primary_color          = get_theme_mod( 'primary_color', $defaults['primary_color'] );
    $rgb                    = coachify_hex2rgb( coachify_sanitize_rgba( $primary_color ) );
    $secondary_color        = get_theme_mod( 'secondary_color', $defaults['secondary_color'] );
    $rgb2                   = coachify_hex2rgb( coachify_sanitize_rgba( $secondary_color ) );
    $body_font_color        = get_theme_mod( 'body_font_color', $defaults['body_font_color'] );
    $rgb4                   = coachify_hex2rgb( coachify_sanitize_rgba( $body_font_color ) );
    $heading_color          = get_theme_mod( 'heading_color', $defaults['heading_color'] );
    $rgb5                   = coachify_hex2rgb( coachify_sanitize_rgba( $heading_color ) );
    $background_color       = get_theme_mod( 'site_bg_color', $defaults['site_bg_color'] );
    $rgb6                   = coachify_hex2rgb( coachify_sanitize_rgba( $background_color ) );
    $primary_accent_color   = get_theme_mod( 'primary_accent_color', $defaults['primary_accent_color'] );
    $secondary_accent_color = get_theme_mod( 'secondary_accent_color', $defaults['secondary_accent_color'] );
    $tertiary_accent_color  = get_theme_mod( 'tertiary_accent_color', $defaults['tertiary_accent_color'] );
    $button_roundness       = get_theme_mod( 'button_roundness', $button_defaults['button_roundness'] );
    $button_padding         = get_theme_mod( 'button_padding', $button_defaults['button_padding'] );

    $btnRoundTop    = isset(  $button_roundness['top'] ) ? $button_roundness['top'] : $button_defaults['button_roundness']['top'];
    $btnRoundRight  = isset(  $button_roundness['right'] ) ? $button_roundness['right'] : $button_defaults['button_roundness']['right'];
    $btnRoundLeft   = isset(  $button_roundness['left'] ) ? $button_roundness['left'] : $button_defaults['button_roundness']['left'];
    $btnRoundBottom = isset(  $button_roundness['bottom'] ) ? $button_roundness['bottom'] : $button_defaults['button_roundness']['bottom'];

    $btnPaddingTop    = isset(  $button_padding['top'] ) ? $button_padding['top'] : $button_defaults['button_padding']['top'];
    $btnPaddingRight  = isset(  $button_padding['right'] ) ? $button_padding['right'] : $button_defaults['button_padding']['right'];
    $btnPaddingLeft   = isset(  $button_padding['left'] ) ? $button_padding['left'] : $button_defaults['button_padding']['left'];
    $btnPaddingBottom = isset(  $button_padding['bottom'] ) ? $button_padding['bottom'] : $button_defaults['button_padding']['bottom'];

    //Button Color
    $btn_text_color             = get_theme_mod( 'btn_text_color_initial', $defaults['btn_text_color_initial'] );
    $btn_bg_color               = get_theme_mod( 'btn_bg_color_initial', $defaults['btn_bg_color_initial'] );
    $btn_text_hover_color       = get_theme_mod( 'btn_text_color_hover', $defaults['btn_text_color_hover'] );
    $btn_bg_hover_color         = get_theme_mod( 'btn_bg_color_hover', $defaults['btn_bg_color_hover'] );
    $def_btn_border_color       = get_theme_mod( 'btn_border_color_initial', $defaults['btn_border_color_initial'] );
    $def_btn_border_hover_color = get_theme_mod( 'btn_border_color_hover', $defaults['btn_border_color_hover'] );

    $btn_border_color       = $def_btn_border_color === '' ? 'inherit' : coachify_sanitize_rgba($def_btn_border_color);
    $btn_border_hover_color = $def_btn_border_hover_color === '' ? 'inherit' : coachify_sanitize_rgba($def_btn_border_hover_color);

    $container_width        = get_theme_mod( 'container_width', $general_defaults['container_width'] );
	$tablet_container_width = get_theme_mod( 'tablet_container_width', $general_defaults['tablet_container_width'] );
	$mobile_container_width = get_theme_mod( 'mobile_container_width', $general_defaults['mobile_container_width'] );

    $custom_css = ':root .block-editor-page {
        --g-primary-color         : ' . coachify_sanitize_rgba( $primary_color ) . ';
        --g-primary-color-rgb     : ' . $rgb[0] . ',  ' . $rgb[1] .',  ' . $rgb[2] . ';
        --g-secondary-color       : ' . coachify_sanitize_rgba( $secondary_color ) . ';
        --g-secondary-color-rgb   : ' . $rgb2[0] . ', ' . $rgb2[1] .', ' . $rgb2[2] . ';
        --g-font-color            : ' . coachify_sanitize_rgba( $body_font_color ) . ';
        --g-font-color-rgb        : ' . $rgb4[0] . ', ' . $rgb4[1] .', ' . $rgb4[2] . ';
        --g-heading-color         : ' . coachify_sanitize_rgba( $heading_color ) . ';
        --g-heading-color-rgb     : ' . $rgb5[0] . ', ' . $rgb5[1] .', ' . $rgb5[2] . ';
        --g-background-color      : ' . coachify_sanitize_rgba( $background_color ) . ';
        --g-background-color-rgb  : ' . $rgb6[0] . ', ' . $rgb6[1] .', ' . $rgb6[2] . ';
        --g-primary-accent-color  : ' . coachify_sanitize_rgba( $primary_accent_color ) . ';
        --g-secondary-accent-color: ' . coachify_sanitize_rgba( $secondary_accent_color ) . ';
        --g-tertiary-accent-color : ' . coachify_sanitize_rgba( $tertiary_accent_color ) . ';

        --btn-text-initial-color  : ' . coachify_sanitize_rgba( $btn_text_color ) . ';
        --btn-text-hover-color    : ' . coachify_sanitize_rgba( $btn_text_hover_color ) . ';
        --btn-bg-initial-color    : ' . coachify_sanitize_rgba( $btn_bg_color ) . ';
        --btn-bg-hover-color      : ' . coachify_sanitize_rgba( $btn_bg_hover_color ) . ';
        --btn-border-initial-color: ' . $btn_border_color . ';
        --btn-border-hover-color  : ' . $btn_border_hover_color . ';

        --g-primary-font   : ' . wp_kses_post( $primary_font_family ) . ';
        --g-primary-font-weight   : ' . esc_html( $primary_font['weight'] ) . ';
        --g-primary-font-transform: ' . esc_html( $primary_font['transform'] ) . ';

        --g-secondary-font   : ' . wp_kses_post( $h1FontFamily ) . ';
        --g-secondary-font-weight   : ' . esc_html( $heading_one['weight'] ) . ';

        --g-accent-font   : ' . wp_kses_post( $accFontFamily ) . ';
        --g-accent-font-weight   : ' . esc_html( $accent_font['weight'] ) . ';
        --g-accent-font-transform: ' . esc_html( $accent_font['transform'] ) . ';

        --btn-font-family     : ' . wp_kses_post( $btnFontFamily ) . ';
        --btn-font-weight     : ' . esc_html( $button['weight'] ) . ';
        --btn-font-transform  : ' . esc_html( $button['transform'] ) . ';
        --btn-roundness-top   : ' . absint( $btnRoundTop ) . 'px;
        --btn-roundness-right : ' . absint( $btnRoundRight ) . 'px;
        --btn-roundness-bottom: ' . absint( $btnRoundBottom) . 'px;
        --btn-roundness-left  : ' . absint( $btnRoundLeft ) . 'px;
        --btn-padding-top     : ' . absint( $btnPaddingTop ) . 'px;
        --btn-padding-right   : ' . absint( $btnPaddingRight ) . 'px;
        --btn-padding-bottom  : ' . absint( $btnPaddingBottom ) . 'px;
        --btn-padding-left    : ' . absint( $btnPaddingLeft ) . 'px;
    }
    .block-editor-page .editor-styles-wrapper h1{
        font-family :' . wp_kses_post( $h1FontFamily ) . '; 
        text-transform:' . esc_html( $heading_one['transform'] ) . ';       
        font-weight:' . esc_html( $heading_one['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h2{
        font-family :' . wp_kses_post( $h2FontFamily ) . '; 
        text-transform:' . esc_html( $heading_two['transform'] ) . ';       
        font-weight:' . esc_html( $heading_two['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h3{
        font-family :' . wp_kses_post( $h3FontFamily ) . '; 
        text-transform:' . esc_html( $heading_three['transform'] ) . ';       
        font-weight:' . esc_html( $heading_three['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h4{
        font-family :' . wp_kses_post( $h4FontFamily ) . '; 
        text-transform:' . esc_html( $heading_four['transform'] ) . ';       
        font-weight:' . esc_html( $heading_four['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h5{
        font-family :' . wp_kses_post( $h5FontFamily ) . '; 
        text-transform:' . esc_html( $heading_five['transform'] ) . ';       
        font-weight:' . esc_html( $heading_five['weight'] ) . '; 
    }
    .block-editor-page .editor-styles-wrapper h6{
        font-family :' . wp_kses_post( $h6FontFamily ) . '; 
        text-transform:' . esc_html( $heading_six['transform'] ) . ';       
        font-weight:' . esc_html( $heading_six['weight'] ) . '; 
    }
    @media (min-width: 1024px){
        :root .block-editor-page .editor-styles-wrapper{
            --g-primary-font-size   : ' . absint( $primarydesktopFontSize ) . 'px;
            --g-primary-font-height : ' . floatval( $primarydesktopHeight ) . 'em;
            --g-primary-font-spacing: ' . absint( $primarydesktopSpacing ) . 'px;
            
            --g-secondary-font-spacing: ' . absint( $h1desktopSpacing ) . 'px;            
            --g-secondary-font-height: ' . floatval( $h1desktopHeight ) . 'em;

            --g-accent-font-size   : ' . absint( $accentdesktopFontSize ) . 'px;
            --g-accent-font-height : ' . floatval( $accentdesktopHeight ) . 'em;
            --g-accent-font-spacing: ' . absint( $accentdesktopSpacing ) . 'px;

            --container-width  :' . absint($container_width) . 'px;

            --btn-font-size   : ' . absint( $btndesktopFontSize ) . 'px;
            --btn-font-height : ' . floatval( $btndesktopHeight ) . 'em;
            --btn-font-spacing: ' . absint( $btndesktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h1{
            font-size   : ' . floatval( $h1desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h1desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h1desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h2{
            font-size   : ' . floatval( $h2desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h2desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h2desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h3{
            font-size   : ' . floatval( $h3desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h3desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h3desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h4{
            font-size   : ' . floatval( $h4desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h4desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h4desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h5{
            font-size   : ' . floatval( $h5desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h5desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h5desktopSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h6{
            font-size   : ' . floatval( $h6desktopFontSize ) . 'px;
            line-height   : ' . floatval( $h6desktopHeight ) . 'em;
            letter-spacing: ' . absint( $h6desktopSpacing ) . 'px;
        }
    }
    @media (min-width: 767px) and (max-width: 1024px){
        :root .block-editor-page .editor-styles-wrapper{
            --g-primary-font-size   : ' . absint( $primarytabletFontSize ) . 'px;
            --g-primary-font-height : ' . floatval( $primarytabletHeight ) . 'em;
            --g-primary-font-spacing: ' . absint( $primarytabletSpacing ) . 'px;

            --g-secondary-font-spacing: ' . absint( $h1tabletSpacing ) . 'px;            
            --g-secondary-font-height: ' . floatval( $h1tabletHeight ) . 'em;

            --g-accent-font-size   : ' . absint( $accenttabletFontSize ) . 'px;
            --g-accent-font-height : ' . floatval( $accenttabletHeight ) . 'em;
            --g-accent-font-spacing: ' . absint( $accenttabletSpacing ) . 'px;

            --container-width  :' . absint($tablet_container_width) . 'px;

            --btn-font-size   : ' . absint( $btntabletFontSize ) . 'px;
            --btn-font-height : ' . floatval( $btntabletHeight ) . 'em;
            --btn-font-spacing: ' . absint( $btntabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h1{
            font-size   : ' . floatval( $h1tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h1tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h1tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h2{
            font-size   : ' . floatval( $h2tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h2tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h2tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h3{
            font-size   : ' . floatval( $h3tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h3tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h3tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h4{
            font-size   : ' . floatval( $h4tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h4tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h4tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h5{
            font-size   : ' . floatval( $h5tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h5tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h5tabletSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h6{
            font-size   : ' . floatval( $h6tabletFontSize ) . 'px;
            line-height   : ' . floatval( $h6tabletHeight ) . 'em;
            letter-spacing: ' . absint( $h6tabletSpacing ) . 'px;
        }
    }
    @media (max-width: 767px){
        :root .block-editor-page .editor-styles-wrapper{
            --g-primary-font-size   : ' . absint( $primarymobileFontSize ) . 'px;
            --g-primary-font-height : ' . floatval( $primarymobileHeight ) . 'em;
            --g-primary-font-spacing: ' . absint( $primarymobileSpacing ) . 'px;
            
            --g-secondary-font-spacing: ' . absint( $h1mobileSpacing ) . 'px;            
            --g-secondary-font-height: ' . floatval( $h1mobileHeight ) . 'em;

            --g-accent-font-size   : ' . absint( $accentmobileFontSize ) . 'px;
            --g-accent-font-height : ' . floatval( $accentmobileHeight ) . 'em;
            --g-accent-font-spacing: ' . absint( $accentmobileSpacing ) . 'px;

            --container-width  : ' . absint($mobile_container_width) . 'px;

            --btn-font-size   : ' . absint( $btnmobileFontSize ) . 'px;
            --btn-font-height : ' . floatval( $btnmobileHeight ) . 'em;
            --btn-font-spacing: ' . absint( $btnmobileSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h1{
            font-size   : ' . floatval( $h1mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h1mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h1mobileSpacing ) . 'px;
        }
        .block-editor-page .editor-styles-wrapper h2{
            font-size   : ' . floatval( $h2mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h2mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h2mobileSpacing ) . 'px;
        }
        .block-editor-page h3{
            font-size   : ' . floatval( $h3mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h3mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h3mobileSpacing ) . 'px;
        }
        .block-editor-page h4{
            font-size   : ' . floatval( $h4mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h4mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h4mobileSpacing ) . 'px;
        }
        .block-editor-page h5{
            font-size   : ' . floatval( $h5mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h5mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h5mobileSpacing ) . 'px;
        }
        .block-editor-page h6{
            font-size   : ' . floatval( $h6mobileFontSize ) . 'px;
            line-height   : ' . floatval( $h6mobileHeight ) . 'em;
            letter-spacing: ' . absint( $h6mobileSpacing ) . 'px;
        }
    }';

    return $custom_css;
}
endif;


if ( ! function_exists( 'coachify_minify_css' ) ) :
/**
 * CSS Minification
 *
 * @param string $css
 * @return void
 */
function coachify_minify_css( $css ) {
    return preg_replace( '/\s+/', ' ', $css );
}
endif;


add_action( 'wp_enqueue_scripts', 'coachify_enqueue_dynamic_css', 50 );
/**
 * Enqueue our dynamic CSS.
 *
 * @since 1.0.0
 */
function coachify_enqueue_dynamic_css() {
	if ( ! get_option( 'coachify_dynamic_css', false ) || is_customize_preview() || apply_filters( 'coachify_dynamic_css_skip_cache', false ) ) {
		$css = coachify_dynamic_root_css();
	} else {
		$css = get_option( 'coachify_dynamic_css' ) . '/* End cached CSS */';
	}

	wp_add_inline_style( 'coachify-style', wp_strip_all_tags( $css ) );
}

add_action( 'init', 'coachify_set_dynamic_css_cache' );
/**
 * Sets our dynamic CSS cache if it doesn't exist.
 *
 * If the theme version changed, bust the cache.
 *
 * @since 1.0.0
 */
function coachify_set_dynamic_css_cache() {
	if ( apply_filters( 'coachify_dynamic_css_skip_cache', false ) ) {
		return;
	}

	$cached_css = get_option( 'coachify_dynamic_css', false );
	$cached_version = get_option( 'coachify_dynamic_css_cached_version', '' );

	if ( ! $cached_css || COACHIFY_THEME_VERSION !== $cached_version ) {
		$css = coachify_dynamic_root_css();

		update_option( 'coachify_dynamic_css', wp_strip_all_tags( $css ) );
		update_option( 'coachify_dynamic_css_cached_version', esc_html( COACHIFY_THEME_VERSION ) );
	}
}

add_action( 'customize_save_after', 'coachify_update_dynamic_css_cache' );

/**
 * Update our CSS cache when done importing contents from Demo Importer Plus.
 *
 * @since 1.0.0
 */
add_action( 'wp_ajax_demo-importer-plus-import-end', function(){
    
    $css = coachify_dynamic_root_css();
    update_option( 'coachify_dynamic_css', wp_strip_all_tags( $css ) );
} );

/**
 * Update our CSS cache when done saving Customizer options.
 *
 * @since 1.0.0
 */
function coachify_update_dynamic_css_cache() {
	if ( apply_filters( 'coachify_dynamic_css_skip_cache', false ) ) {
		return;
	}

	$css = coachify_dynamic_root_css();
	update_option( 'coachify_dynamic_css', wp_strip_all_tags( $css ) );
}