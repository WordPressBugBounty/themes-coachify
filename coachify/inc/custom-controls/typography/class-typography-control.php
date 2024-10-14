<?php
/**
 * The typography Customizer control.
 *
 * @package Coachify
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Coachify_Typography_Customize_Control' ) ) {
	/**
	 * Create the typography elements control.
	 *
	 * @since 2.0
	 */
	class Coachify_Typography_Customize_Control extends WP_Customize_Control {

		public $type = 'coachify-typography';
		public $group;
		public $collapsed = true;

		public function enqueue() {
			wp_enqueue_script( 'coachify-typography-selectWoo', trailingslashit( get_template_directory_uri() ) . 'inc/custom-controls/typography/selectWoo.min.js', array( 'customize-controls', 'jquery' ), COACHIFY_THEME_VERSION, true );
			wp_enqueue_style( 'coachify-typography-selectWoo', trailingslashit( get_template_directory_uri() ) . 'inc/custom-controls/typography/selectWoo.min.css', array(), COACHIFY_THEME_VERSION );

			wp_enqueue_script( 'coachify-typography-customizer', trailingslashit( get_template_directory_uri() ) . 'inc/custom-controls/typography/typography-customizer.js', array( 'customize-controls', 'coachify-typography-selectWoo' ), COACHIFY_THEME_VERSION, true );
			wp_enqueue_style( 'coachify-typography-customizer', trailingslashit( get_template_directory_uri() ) . 'inc/custom-controls/typography/typography-customizer.css', array(), COACHIFY_THEME_VERSION );
		}

		public function to_json() {
			parent::to_json();

			$this->json['default_fonts_title'] = __( 'System fonts', 'coachify' );
			$this->json['custom_fonts_title']  = __( 'Custom fonts', 'coachify' );
			$this->json['google_fonts_title']  = __( 'Google fonts', 'coachify' );
			$this->json['default_fonts']       = coachify_typography_default_fonts();
			$this->json['custom_fonts']        = coachify_typography_custom_fonts();
			$this->json['family_title']        = esc_html__( 'Font Family', 'coachify' );
			$this->json['weight_title']        = esc_html__( 'Font Weight', 'coachify' );
			$this->json['transform_title']     = esc_html__( 'Transform', 'coachify' );
			$this->json['category_title']      = '';
			$this->json['variant_title']       = esc_html__( 'Variants', 'coachify' );
			$this->json['group']               = $this->group;
			$this->json['collapsed']           = $this->collapsed;

			foreach ( $this->settings as $setting_key => $setting_id ) {
				$this->json[ $setting_key ] = array(
					'link'  => $this->get_link( $setting_key ),
					'value' => $this->value( $setting_key ),
					'default' => isset( $setting_id->default ) ? $setting_id->default : '',
					'id' => isset( $setting_id->id ) ? $setting_id->id : ''
				);

				if ( 'weight' === $setting_key ) {
					$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();
				}

				if ( 'transform' === $setting_key ) {
					$this->json[ $setting_key ]['choices'] = $this->get_font_transform_choices();
				}
			}
		}

		public function content_template() {
			?>
			<div class="typo-coachy-wrapper <# if ( ! data.collapsed ) { #>is-active<# } #><# if ( data.group ) { #>_{{ data.group }}<# } #>">
				<# if ( '' !== data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>
				<# if ( 'undefined' !== typeof ( data.family ) ) { #>
					<div class="coachify-font-family">
						<label>
							<# if ( '' !== data.family_title ) { #>
								<p class="description">{{ data.family_title }}</p>
							<# } #>
							<select {{{ data.family.link }}} data-category="{{{ data.category.id }}}" data-variants="{{{ data.variant.id }}}" style="width:100%;">
								<optgroup label="{{ data.default_fonts_title }}">
									<# for ( var key in data.default_fonts ) { #>
										<# var name = data.default_fonts[ key ].split(',')[0]; #>
										<option value="{{ data.default_fonts[ key ] }}"  <# if ( data.default_fonts[ key ] === data.family.value ) { #>selected="selected"<# } #>>{{ name }}</option>
									<# } #>
								</optgroup>
								<# if ( data.custom_fonts !== undefined || data.custom_fonts.length > 0 ){ #>
									<optgroup label="{{ data.custom_fonts_title }}">
										<# for ( var key in data.custom_fonts ) { #>
											<# var name = data.custom_fonts[ key ].split(',')[0]; #>
											<option value="{{ data.custom_fonts[ key ] }}"  <# if ( data.custom_fonts[ key ] === data.family.value ) { #>selected="selected"<# } #>>{{ name }}</option>
										<# } #>
									</optgroup>
								<#	} #>
								<optgroup label="{{ data.google_fonts_title }}">
									<# for ( var key in coachifyTypography.googleFonts ) { #>
										<option value="{{ coachifyTypography.googleFonts[ key ].name }}"  <# if ( coachifyTypography.googleFonts[ key ].name === data.family.value ) { #>selected="selected"<# } #>>{{ coachifyTypography.googleFonts[ key ].name }}</option>
									<# } #>
								</optgroup>
							</select>
						</label>
					</div>
				<# } #>

				<# if ( 'undefined' !== typeof ( data.variant ) ) { #>
					<#
					var id = data.family.value.split(' ').join('_').toLowerCase();
					var font_data = coachifyTypography.googleFonts[id];
					var variants = '';
					if ( typeof font_data !== 'undefined' ) {
						variants = font_data.variants;
					}

					if ( null === data.variant.value ) {
						data.variant.value = data.variant.default;
					}
					#>
					<div id={{{ data.variant.id }}} class="coachify-font-variant" data-saved-value="{{ data.variant.value }}">
						<label>
							<# if ( '' !== data.variant_title ) { #>
								<p class="description">{{ data.variant_title }}</p>
							<# } #>

							<select name="{{{ data.variant.id }}}" multiple class="typography-multi-select" style="width:100%;" {{{ data.variant.link }}}>
								<# _.each( variants, function( label, choice ) { #>
									<option value="{{ label }}">{{ label }}</option>
								<# } ) #>
							</select>			
						</label>
					</div>
				<# } #>

				<# if ( 'undefined' !== typeof ( data.category ) ) { #>
					<div class="coachify-font-category">
						<label>
							<# if ( '' !== data.category_title ) { #>
								<p class="description">{{ data.category_title }}</p>
							<# } #>
								<input name="{{{ data.category.id }}}" type="hidden" {{{ data.category.link }}} value="{{{ data.category.value }}}" class="gp-hidden-input" />
						</label>
					</div>
				<# } #>

				<div class="coachify-weight-transform-wrapper">
					<# if ( 'undefined' !== typeof ( data.weight ) ) { #>
						<div class="coachify-font-weight">
							<label>
								<# if ( '' !== data.weight_title ) { #>
									<p class="description">{{ data.weight_title }}</p>
								<# } #>
								<select {{{ data.weight.link }}}>

									<# _.each( data.weight.choices, function( label, choice ) { #>

										<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

									<# } ) #>

								</select>
							</label>
						</div>
					<# } #>

					<# if ( 'undefined' !== typeof ( data.transform ) ) { #>
						<div class="coachify-font-transform">
							<label>
								<# if ( '' !== data.transform_title ) { #>
									<p class="description">{{ data.transform_title }}</p>
								<# } #>
								<select {{{ data.transform.link }}}>

									<# _.each( data.transform.choices, function( label, choice ) { #>

										<option value="{{ choice }}" <# if ( choice === data.transform.value ) { #> selected="selected" <# } #>>{{ label }}</option>

									<# } ) #>

								</select>
							</label>
						</div>
					<# } #>
				</div>
			</div>
			<?php
		}

		public function get_font_weight_choices() {
			return array(
				'normal' => esc_html( 'Normal' ),
				'bold' => esc_html( 'Bold' ),
				'100' => esc_html( '100' ),
				'200' => esc_html( '200' ),
				'300' => esc_html( '300' ),
				'400' => esc_html( '400' ),
				'500' => esc_html( '500' ),
				'600' => esc_html( '600' ),
				'700' => esc_html( '700' ),
				'800' => esc_html( '800' ),
				'900' => esc_html( '900' ),
			);
		}

		public function get_font_transform_choices() {
			return array(
				'none' => esc_html( 'None' ),
				'capitalize' => esc_html( 'Capitalize' ),
				'uppercase' => esc_html( 'Uppercase' ),
				'lowercase' => esc_html( 'Lowercase' ),
			);
		}
	}
}