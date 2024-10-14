/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	/**
	 * Theme Customizer enhancements for a better user experience.
	 *
	 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
	 * 
	 * It controls the pseudo code as well
	 */
	function coachify_colors_live_update(thememod, selector, property, rgb, accent = undefined) {

		wp.customize(thememod, function (value) {
			value.bind(function (newval) {
				var color = '';
				
				if ( newval[0] === '#') {
					color = newval;
				} else { //change rgba to hex
					const rgba = newval.replace(/^rgba?\(|\s+|\)$/g, '').split(',');
					color = `#${((1 << 24) + (parseInt(rgba[0]) << 16) + (parseInt(rgba[1]) << 8) + parseInt(rgba[2])).toString(16).slice(1)}`;
				}
				
				//get rgb values
				var rgbVal = color.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i
								,(m, r, g, b) => '#' + r + r + g + g + b + b)
					.substring(1).match(/.{2}/g)
					.map(x => parseInt(x, 16))
					.toString()
				
				if (jQuery('style#' + thememod + property).length) {
					jQuery('style#' + thememod + property).html(selector + '{' + property + ':' + newval + ';}');
					if (rgb !== undefined ){
						jQuery('style#' + thememod + property + '-rgb').html(selector + '{' + rgb + ':' + rgbVal + ';}');
					} 
					if (accent !== undefined ){
						jQuery('style#' + thememod + property + '-accent').html(selector + '{' + accent + ':' + newval + ';}');
					} 
				} else {
					jQuery('head').append('<style id="' + thememod + property + '">' + selector + '{' + property + ':' + newval + '}</style>');
					setTimeout(function () {
						jQuery('style#' + thememod + property).not(':last').remove();
					}, 1000);
					if (rgb !== undefined ){
						jQuery('head').append('<style id="' + thememod + property + '-rgb">' + selector + '{' + rgb + ':' + rgbVal + '}</style>');
						setTimeout(function () {
							jQuery('style#' + thememod + property +'-rgb').not(':last').remove();
						}, 1000);
					} 
					if (accent !== undefined ){
						jQuery('head').append('<style id="' + thememod + property + '-accent">' + selector + '{' + accent + ':' + newval + '}</style>');
						setTimeout(function () {
							jQuery('style#' + thememod + property +'-accent').not(':last').remove();
						}, 1000);
					} 
				}
			});
		});
	}

	//Coachify partial refresh for slider customizer settings
	function coachify_slider_live_update(settings, responsive, selector, property, unit) {
		settings = typeof settings !== 'undefined' ? settings : '';
		
		var media = 'desktop' === responsive ? coachify_view_port.desktop
					: 'tablet' === responsive ? coachify_view_port.tablet
					: 'mobile' === responsive ? coachify_view_port.mobile
					: undefined;

		// Check if media query
		var media_query = typeof media !== 'undefined' ? ' media="' + media + '"' : '';

		wp.customize(settings, function (value) {	
			value.bind(function (newval) {
				// Get our unit if applicable
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="chfy_' + settings + '" ' + media_query + '>' + selector + '{' + property + ':' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#chfy_' + settings).not(':last').remove();
				}, 500);

			});
		});
	}

	// Coachify Font Family Update
	function coachify_typo_update_font_family_css(control, selector, cssProperty = 'font-family' ) {
		wp.customize(control, function (value) {
			value.bind(function (value, oldValue) {

				var link = '';

				var fontName = value.split(",")[0];
				fontName = fontName.replace(/'/g, '');

				if (value === 'System Stack') {
					value = coachify_view_port.systemfonts;
				}

				// Remove <style> first!
				control = control.replace('[', '-');
				control = control.replace(']', '');

				jQuery('style#' + control + '-' + cssProperty).remove();

				var fontName = fontName.split(' ').join('+');

				jQuery('link#' + control).remove();
				link = '<link id="' + control + '" href="https://fonts.googleapis.com/css?family=' + fontName + '"  rel="stylesheet">';

				// Concat and append new <style> and <link>.
				jQuery('head').append(
					'<style id="' + control + '-' + cssProperty + '">'
					+ selector + '	{ ' + cssProperty + ': ' + value + ' }'
					+ '</style>'
					+ link
				);
			});
		});
	}

	//Coachify Font Weight and others update 
	function coachify_typography_live_update(id, responsive, selector, property, unit, settings) {
		settings = typeof settings !== 'undefined' ? settings : '';
		
		var media = 'desktop' === responsive ? coachify_view_port.desktop
					: 'tablet' === responsive ? coachify_view_port.tablet
					: 'mobile' === responsive ? coachify_view_port.mobile
					: undefined;

		// Check if media query
		var media_query = typeof media !== 'undefined' ? ' media="' + media + '"' : '';

		var responsive_id = '' !== responsive ? `[${responsive}]` : ''; //Responsive should be empty for Font Weight and Text Transform
		wp.customize(settings + responsive_id + '[' + id + ']', function (value) {	
			value.bind(function (newval) {
				// Get our unit if applicable
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="' + responsive + id + settings + '" ' + settings + media_query + '>' + selector + '{' + property + ':' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#' + responsive + id + settings).not(':last').remove();
				}, 500);

			});
		});
	}

	//Coachify partial refresh for spacing customizer settings
	function coachify_spacing_live_update(settings, responsive, selector, property, unit) {
		settings = typeof settings !== 'undefined' ? settings : '';
		
		var media = 'desktop' === responsive ? coachify_view_port.desktop
					: 'tablet' === responsive ? coachify_view_port.tablet
					: 'mobile' === responsive ? coachify_view_port.mobile
					: undefined;

		// Check if media query
		var media_query = typeof media !== 'undefined' ? ' media="' + media + '"' : '';

		wp.customize(settings + '[top]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="chfy_' + settings + 'top" ' + media_query + '>' + selector + '{' + property + '-top:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#chfy_' + settings + 'top').not(':last').remove();
				}, 500);
			})
		});

		wp.customize(settings + '[right]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="chfy_' + settings + 'right" ' + media_query + '>' + selector + '{' + property + '-right:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#chfy_' + settings + 'right').not(':last').remove();
				}, 500);
			})
		});

		wp.customize(settings + '[bottom]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="chfy_' + settings + 'bottom" ' + media_query + '>' + selector + '{' + property + '-bottom:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#chfy_' + settings + 'bottom').not(':last').remove();
				}, 500);
			})
		});

		wp.customize(settings + '[left]', function (value) {	
			value.bind(function (newval) {
				unit = typeof unit !== 'undefined' ? unit : '';
				jQuery('head').append('<style id="chfy_' + settings + 'left" ' + media_query + '>' + selector + '{' + property + '-left:' + newval + unit + ';}' + '</style>');
				setTimeout(function () {
					jQuery('style#chfy_' + settings + 'left').not(':last').remove();
				}, 500);
			})
		});
	}

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	wp.customize('hide_title', function (value) {
		value.bind(function (to) {
			if (to) {
				$('.site-title').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
			} else {
				$('.site-title').css({
					clip: 'auto',
					position: 'relative',
				});
			}
		});
	});

	wp.customize('hide_tagline', function (value) {
		value.bind(function (to) {
			if (to) {
				$('.site-description').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
			} else {
				$('.site-description').css({
					clip: 'auto',
					position: 'relative',
				});
			}
		});
	});
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	/*********** 
	Theme Colors
	************/
	coachify_colors_live_update( 'site_title_color', '.site-branding .site-title a', 'color', undefined );
	coachify_colors_live_update( 'site_tagline_color', '.site-branding .site-description', 'color', undefined );
	coachify_colors_live_update( 'primary_color', ':root', '--g-primary-color', '--g-primary-color-rgb', '--e-global-color-primary_color' );
	coachify_colors_live_update( 'secondary_color', ':root', '--g-secondary-color', '--g-secondary-color-rgb', '--e-global-color-secondary_color' );
	coachify_colors_live_update( 'body_font_color', ':root', '--g-font-color', '--g-font-color-rgb', '--e-global-color-body_font_color' );
	coachify_colors_live_update( 'heading_color', ':root', '--g-heading-color', '--g-heading-color-rgb', '--e-global-color-heading_color');
	coachify_colors_live_update( 'primary_accent_color', ':root','--g-primary-accent-color', '--e-global-color-primary_accent_color', undefined );
	coachify_colors_live_update( 'secondary_accent_color', ':root','--g-secondary-accent-color', ' --e-global-color-secondary_accent_color', undefined );
	coachify_colors_live_update( 'tertiary_accent_color', ':root','--g-tertiary-accent-color', '--e-global-color-tertiary_accent_color', undefined );
	coachify_colors_live_update( 'site_bg_color', ':root', '--g-background-color', '--g-background-color-rgb' );

	/**
	 * Global Button Colors
	 */
	coachify_colors_live_update( 'btn_text_color_initial', ':root', '--btn-text-initial-color', undefined );
	coachify_colors_live_update( 'btn_text_color_hover', ':root', '--btn-text-hover-color', undefined );
	coachify_colors_live_update( 'btn_bg_color_initial', ':root', '--btn-bg-initial-color', undefined );
	coachify_colors_live_update( 'btn_bg_color_hover', ':root', '--btn-bg-hover-color', undefined );
	coachify_colors_live_update( 'btn_border_color_initial', ':root', '--btn-border-initial-color', undefined );
	coachify_colors_live_update( 'btn_border_color_hover', ':root', '--btn-border-hover-color', undefined );

	/**
	 * Header Button Color
	 */
	coachify_colors_live_update( 'header_btn_text_color', '.site-header .header-main', '--header-btn-text-color', undefined );
	coachify_colors_live_update( 'header_btn_bg_color', '.site-header .header-main', '--header-btn-bg-color', undefined );
	coachify_colors_live_update( 'header_btn_border_color', '.site-header .header-main', '--header-btn-border-color', undefined );

	coachify_spacing_live_update('header_button_roundness', '', '.site-header .header-main', '--header-btn-roundness', 'px' );
	coachify_spacing_live_update('header_button_padding', '', '.site-header .header-main', '--header-btn-padding', 'px' );
	
	//Image Radius
	coachify_spacing_live_update('blog_img_radius', '', '.blog .content-area .post-thumbnail, .search .content-area .post-thumbnail, .archive .content-area .post-thumbnail', '--img-radius', 'px' );
	coachify_spacing_live_update('single_img_radius', '', '.single-post .post-thumbnail.single-post-img img.wp-post-image', '--img-radius', 'px' );
	coachify_spacing_live_update('related_img_radius', '', '.error404 .related-posts .post-thumbnail img.wp-post-image, .single-post .related-posts .post-thumbnail img.wp-post-image', '--rltd-radius', 'px' );

	/**
	 * Footer Color
	*/
	coachify_colors_live_update( 'foot_text_color', '.site-footer', '--foot-text-color', undefined );
	coachify_colors_live_update( 'foot_bg_color', '.site-footer', '--foot-bg-color', undefined );
	coachify_colors_live_update( 'foot_widget_heading_color', '.site-footer', '--widget-title-color', undefined );
	
	coachify_colors_live_update( 'foot_copyright_text_color', '.site-footer .footer-b', '--foot-copyright-text-color', undefined );
	coachify_colors_live_update( 'foot_copyright_bg_color', '.site-footer .footer-b', '--foot-copyright-bg-color', undefined );	

	/**********************
	Typography Font Family
	***********************/
	/**
	 * Site Title Font Family
	 */
	coachify_typo_update_font_family_css('site_title[family]','.site-branding .site-title a');
	/**
	  * Primary Font Family
	  */
	coachify_typo_update_font_family_css('primary_font[family]', ':root', '--g-primary-font');
	/**
	  * Accent Font Family
	  */
	coachify_typo_update_font_family_css('accent_font[family]', ':root', '--g-accent-font');
	/**
	 * Button Font Family
	 */
	coachify_typo_update_font_family_css('button[family]', ':root', '--btn-font-family');
	/**
	 * Heading One Family
	 */
	coachify_typo_update_font_family_css('heading_one[family]', 'h1');
	/**
	 * Heading Two Family
	 */
	coachify_typo_update_font_family_css('heading_two[family]', 'h2');
	/**
	 * Heading Three Family
	 */
	coachify_typo_update_font_family_css('heading_three[family]', 'h3');
	/**
	 * Heading Four Family
	 */
	coachify_typo_update_font_family_css('heading_four[family]', 'h4');
	/**
	 * Heading Five Family
	 */
	coachify_typo_update_font_family_css('heading_five[family]', 'h5');
	/**
	 * Heading Six Family
	 */
	coachify_typo_update_font_family_css('heading_six[family]', 'h6');
	

	/**********************************
		Typography Font Weight
	***********************************/
	/**
	 * Site Title Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', '.site-branding .site-title a', 'font-weight', '', 'site_title' );
	/**
	 * Primary Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', ':root', '--g-primary-font-weight', '', 'primary_font' );
	/**
	 * Accent Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', ':root', '--g-accent-font-weight', '', 'accent_font' );
	/**
	 * Button Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', ':root', '--btn-font-weight', '', 'button' );
	/**
	 * Heading One Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', 'h1', 'font-weight', '', 'heading_one' );
	/**
	 * Heading Two Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', 'h2', 'font-weight', '', 'heading_two' );
	/**
	 * Heading Three Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', 'h3', 'font-weight', '', 'heading_three' );
	/**
	 * Heading Four Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', 'h4', 'font-weight', '', 'heading_four' );
	/**
	 * Heading Five Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', 'h5', 'font-weight', '', 'heading_five' );
	/**
	 * Heading Six Font Weight 
	*/
	coachify_typography_live_update( 'weight', '', 'h6', 'font-weight', '', 'heading_six' );


	/**********************************
		Typography Text Transform
	***********************************/
	/**
	 * Site Title Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', '.site-branding .site-title a', 'text-transform', '', 'site_title' );
	/**
	 * Primary Font Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', ':root', '--g-primary-font-transform', '', 'primary_font' );
	/**
	 * Accent Font Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', ':root', '--g-accent-font-transform', '', 'accent_font' );
	/**
	 * Btton Font Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', ':root', '--btn-font-transform', '', 'button' );
	/**
	 * Heading One Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', 'h1', 'text-transform', '', 'heading_one' );
	/**
	 * Heading Two Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', 'h2', 'text-transform', '', 'heading_two' );
	/**
	 * Heading Three Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', 'h3', 'text-transform', '', 'heading_three' );
	/**
	 * Heading Four Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', 'h4', 'text-transform', '', 'heading_four' );
	/**
	 * Heading Five Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', 'h5', 'text-transform', '', 'heading_five' );
	/**
	 * Heading Six Text Transform 
	*/
	coachify_typography_live_update( 'transform', '', 'h6', 'text-transform', '', 'heading_six' );


	/**********************************
			Typography Font Size
	***********************************/

	/**
	 * Site Title Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', '.site-header .site-branding .site-title a', 'font-size', 'px', 'site_title' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', '.mobile-header .site-branding .site-title a', 'font-size', 'px', 'site_title' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', '.mobile-header .site-branding .site-title a', 'font-size', 'px', 'site_title' );

	/**
	 * Primary Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', ':root', '--g-primary-font-size', 'px', 'primary_font' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', ':root', '--g-primary-font-size', 'px', 'primary_font' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', ':root', '--g-primary-font-size', 'px', 'primary_font' );

	/**
	 * Accent Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', ':root', '--g-accent-font-size', 'px', 'accent_font' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', ':root', '--g-accent-font-size', 'px', 'accent_font' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', ':root', '--g-accent-font-size', 'px', 'accent_font' );

	/**
	 * Button Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', ':root', '--btn-font-size', 'px', 'button' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', ':root', '--btn-font-size', 'px', 'button' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', ':root', '--btn-font-size', 'px', 'button' );

	/**
	 * Heading One Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', 'h1', 'font-size', 'px', 'heading_one' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', 'h1', 'font-size', 'px', 'heading_one' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', 'h1', 'font-size', 'px', 'heading_one' );

	/**
	 * Heading Two Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', 'h2', 'font-size', 'px', 'heading_two' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', 'h2', 'font-size', 'px', 'heading_two' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', 'h2', 'font-size', 'px', 'heading_two' );

	/**
	 * Heading Three Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', 'h3', 'font-size', 'px', 'heading_three' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', 'h3', 'font-size', 'px', 'heading_three' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', 'h3', 'font-size', 'px', 'heading_three' );

	/**
	 * Heading Four Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', 'h4', 'font-size', 'px', 'heading_four' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', 'h4', 'font-size', 'px', 'heading_four' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', 'h4', 'font-size', 'px', 'heading_four' );

	/**
	 * Heading Five Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', 'h5', 'font-size', 'px', 'heading_five' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', 'h5', 'font-size', 'px', 'heading_five' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', 'h5', 'font-size', 'px', 'heading_five' );

	/**
	 * Heading Six Font Size 
	*/
	//Desktop
	coachify_typography_live_update( 'font_size', 'desktop', 'h6', 'font-size', 'px', 'heading_six' );
	//Tablet
	coachify_typography_live_update( 'font_size', 'tablet', 'h6', 'font-size', 'px', 'heading_six' );
	//Mobile
	coachify_typography_live_update( 'font_size', 'mobile', 'h6', 'font-size', 'px', 'heading_six' );


	/**********************************
			Typography Line Height
	***********************************/

	/**
	 * Site Title Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', '.site-header .site-branding .site-title a', 'line-height', 'em', 'site_title' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', '.mobile-header .site-branding .site-title a', 'line-height', 'em', 'site_title' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', '.mobile-header .site-branding .site-title a', 'line-height', 'em', 'site_title' );
	
	/**
	 * Primary Font Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', ':root', '--g-primary-font-height', 'em', 'primary_font' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', ':root', '--g-primary-font-height', 'em', 'primary_font' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', ':root', '--g-primary-font-height', 'em', 'primary_font' );
	
	/**
	 * Accent Font Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', ':root', '--g-accent-font-height', 'em', 'accent_font' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', ':root', '--g-accent-font-height', 'em', 'accent_font' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', ':root', '--g-accent-font-height', 'em', 'accent_font' );
	
	/**
	 * Button Font Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', ':root', '--btn-font-height', 'em', 'button' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', ':root', '--btn-font-height', 'em', 'button' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', ':root', '--btn-font-height', 'em', 'button' );

	/**
	 * Heading One Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', 'h1', 'line-height', 'em', 'heading_one' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', 'h1', 'line-height', 'em', 'heading_one' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', 'h1', 'line-height', 'em', 'heading_one' );
	
	/**
	 * Heading Two Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', 'h2', 'line-height', 'em', 'heading_two' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', 'h2', 'line-height', 'em', 'heading_two' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', 'h2', 'line-height', 'em', 'heading_two' );
	
	/**
	 * Heading Three Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', 'h3', 'line-height', 'em', 'heading_three' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', 'h3', 'line-height', 'em', 'heading_three' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', 'h3', 'line-height', 'em', 'heading_three' );
	/**
	 * Heading Four Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', 'h4', 'line-height', 'em', 'heading_four' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', 'h4', 'line-height', 'em', 'heading_four' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', 'h4', 'line-height', 'em', 'heading_four' );
	
	/**
	 * Heading Five Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', 'h5', 'line-height', 'em', 'heading_five' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', 'h5', 'line-height', 'em', 'heading_five' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', 'h5', 'line-height', 'em', 'heading_five' );
	
	/**
	 * Heading Six Line Height 
	*/
	//Desktop
	coachify_typography_live_update( 'line_height', 'desktop', 'h6', 'line-height', 'em', 'heading_six' );
	//Tablet
	coachify_typography_live_update( 'line_height', 'tablet', 'h6', 'line-height', 'em', 'heading_six' );
	//Mobile
	coachify_typography_live_update( 'line_height', 'mobile', 'h6', 'line-height', 'em', 'heading_six' );


	/**********************************
		Typography Letter Spacing
	***********************************/

	/**
	 * Site Title Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', '.site-header .site-branding .site-title a', 'letter-spacing', 'px', 'site_title' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', '.mobile-header .site-branding .site-title a', 'letter-spacing', 'px', 'site_title' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', '.mobile-header .site-branding .site-title a', 'letter-spacing', 'px', 'site_title' );
	
	/**
	 * Primary Font Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', ':root', '--g-primary-font-spacing', 'px', 'primary_font' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', ':root', '--g-primary-font-spacing', 'px', 'primary_font' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', ':root', '--g-primary-font-spacing', 'px', 'primary_font' );
	
	/**
	 * Accent Font Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', ':root', '--g-accent-font-spacing', 'px', 'accent_font' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', ':root', '--g-accent-font-spacing', 'px', 'accent_font' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', ':root', '--g-accent-font-spacing', 'px', 'accent_font' );
	
	/**
	 * Button Font Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', ':root', '--btn-font-spacing', 'px', 'button' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', ':root', '--btn-font-spacing', 'px', 'button' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', ':root', '--btn-font-spacing', 'px', 'button' );

	/**
	 * Heading One Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', 'h1', 'letter-spacing', 'px', 'heading_one' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', 'h1', 'letter-spacing', 'px', 'heading_one' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', 'h1', 'letter-spacing', 'px', 'heading_one' );
	
	/**
	 * Heading Two Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', 'h2', 'letter-spacing', 'px', 'heading_two' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', 'h2', 'letter-spacing', 'px', 'heading_two' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', 'h2', 'letter-spacing', 'px', 'heading_two' );
	
	/**
	 * Heading Three Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', 'h3', 'letter-spacing', 'px', 'heading_three' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', 'h3', 'letter-spacing', 'px', 'heading_three' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', 'h3', 'letter-spacing', 'px', 'heading_three' );
	/**
	 * Heading Four Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', 'h4', 'letter-spacing', 'px', 'heading_four' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', 'h4', 'letter-spacing', 'px', 'heading_four' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', 'h4', 'letter-spacing', 'px', 'heading_four' );
	
	/**
	 * Heading Five Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', 'h5', 'letter-spacing', 'px', 'heading_five' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', 'h5', 'letter-spacing', 'px', 'heading_five' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', 'h5', 'letter-spacing', 'px', 'heading_five' );
	
	/**
	 * Heading Six Letter Spacing 
	*/
	//Desktop
	coachify_typography_live_update( 'letter_spacing', 'desktop', 'h6', 'letter-spacing', 'px', 'heading_six' );
	//Tablet
	coachify_typography_live_update( 'letter_spacing', 'tablet', 'h6', 'letter-spacing', 'px', 'heading_six' );
	//Mobile
	coachify_typography_live_update( 'letter_spacing', 'mobile', 'h6', 'letter-spacing', 'px', 'heading_six' );

	/************************ 
	Navigation Menu Settings
	 ************************/
	//Desktop - Menu items spacing
	coachify_slider_live_update('header_items_spacing', 'desktop', '.main-navigation #primary-menu', '--coachy-nav-padding', 'px');
	//Desktop - Header dropdown width
	coachify_slider_live_update('header_dropdown_width', 'desktop', '.main-navigation #primary-menu', '--coachy-sub-menu-width', undefined, 'px');
	
	//Desktop - Stretch menu
	wp.customize( 'header_strech_menu',function( value ){
		value.bind( function( newval ){
			var siteMenu = jQuery("#masthead [data-stretch]");
			$.each(siteMenu, function(index, value) {
				console.log(value)
				if(newval === true){
					$(value).attr('data-stretch', 'yes')
				} else {
					$(value).attr('data-stretch', 'no')
				}
			});
		});
	} );

	//Header Width Layout
	wp.customize( 'header_width_layout',function( value ){
		value.bind( function( newval ){
			var container = jQuery("#masthead .container")
			$.each(container, function(index, value) {
				if (newval === "boxed"){
					$(value).removeClass("c-full")
					$(value).removeClass("c-custom")
				} else if(newval === "fullwidth"){
					$(value).addClass("c-full")
					$(value).removeClass("c-custom")
				} else if(newval === "custom" ){
					$(value).addClass("c-custom")
					$(value).removeClass("c-full")
				}
			});
		} );
	} );

	/**************
	Logo Width
	***************/
	//Desktop
	coachify_slider_live_update( 'logo_width', 'desktop', '.site-header .custom-logo', 'width', 'px' );
	//Tablet
	coachify_slider_live_update( 'tablet_logo_width', 'tablet', '.site-branding .custom-logo-link img', 'width', 'px' );
	//Mobile
	coachify_slider_live_update( 'mobile_logo_width', 'mobile', '.site-branding .custom-logo-link img', 'width','px' );


	/****************** 
	Container Width
	*******************/
	//Desktop
	coachify_slider_live_update('container_width', 'desktop', ':root', '--container-width', 'px');
	//Tablet
	coachify_slider_live_update('tablet_container_width', 'tablet', ':root', '--container-width', 'px');
	//mobile
	coachify_slider_live_update('mobile_container_width', 'mobile', ':root', '--container-width', 'px');


	/************************
	Fullwidth Centered Width
	*************************/
	//Desktop
	coachify_slider_live_update('fullwidth_centered', 'desktop', ':root', '--centered-maxwidth', 'px')
	//Tablet
	coachify_slider_live_update('tablet_fullwidth_centered', 'tablet', ':root', '--centered-maxwidth', 'px')
	//Mobile
	coachify_slider_live_update('mobile_fullwidth_centered', 'mobile', ':root', '--centered-maxwidth', 'px')


	/**********************************
		Sidebar Width
	***********************************/
	//Desktop
	coachify_slider_live_update('sidebar_width', 'desktop', '.page-grid', '--sidebar-width', '%');


	/**********************************
		Sidebar Widget Spacing
	***********************************/
	//Desktop
	coachify_slider_live_update('widgets_spacing', 'desktop', ':root', '--widget-spacing', 'px');
	//Tablet
	coachify_slider_live_update('tablet_widgets_spacing', 'tablet', ':root', '--widget-spacing', 'px');
	//Mobile
	coachify_slider_live_update('mobile_widgets_spacing', 'mobile', ':root', '--widget-spacing', 'px');

	/**********************************
		Footer Top Spacing
	***********************************/
	//Desktop
	coachify_slider_live_update('foot_top_spacing', 'desktop', '.site-footer', '--foot-top-spacing', 'px');
	//Tablet
	coachify_slider_live_update('tablet_foot_top_spacing', 'tablet', '.site-footer', '--foot-top-spacing', 'px');
	//Mobile
	coachify_slider_live_update('mobile_foot_top_spacing', 'mobile', '.site-footer', '--foot-top-spacing', 'px');

	/**********************************
		Scroll to top icon size
	***********************************/
	//Desktop
	coachify_slider_live_update('scroll_top_size', 'desktop', '.back-to-top', '--scroll-to-top-size', 'px');
	//Tablet
	coachify_slider_live_update('tablet_scroll_top_size', 'tablet', '.back-to-top', '--scroll-to-top-size', 'px');
	//Mobile
	coachify_slider_live_update('mobile_scroll_top_size', 'mobile', '.back-to-top', '--scroll-to-top-size', 'px');


	/**************************** 
		Global Button Settings
	*****************************/
	//Button Roundness
	coachify_spacing_live_update('button_roundness', '', ':root', '--btn-roundness', 'px' );
	//Button Padding
	coachify_spacing_live_update('button_padding', '', ':root', '--btn-padding', 'px' );


	/**********************************
		Breadcrumb separator icon
	***********************************/
	wp.customize( 'separator_icon',function( value ){
		value.bind( function( newval ){
			var icon = newval === 'three' ? coachify_view_port.breadcrumb_sep_three
				: newval === 'two' ? coachify_view_port.breadcrumb_sep_two
				: coachify_view_port.breadcrumb_sep_one;		
			var separator = jQuery("#crumbs span.separator")
			$.each(separator, function(index, value) {
				$(value).html(icon)		
			})
		} );
	} );

	/**************************** 
		Alignment Settings
	*****************************/
	//Blog Page Title Alignment
	wp.customize( 'blog_alignment',function( value ){
		value.bind( function( newval ){
			var pageTitle = jQuery(".page-header")
			pageTitle.attr('data-alignment', `${newval}`)
		} );
	} );

	//Archive Title Alignment
	wp.customize( 'archivetitle_alignment',function( value ){
		value.bind( function( newval ){
			var pageTitle = jQuery(".page-header")
			pageTitle.attr('data-alignment', `${newval}`)
		} );
	} );

	//Single Page Title Alignment
	wp.customize( 'pagetitle_alignment',function( value ){
		value.bind( function( newval ){
			var pageTitle = jQuery(".page .entry-header")
			pageTitle.attr('data-alignment', `${newval}`)
		} );
	} );
} )( jQuery );
