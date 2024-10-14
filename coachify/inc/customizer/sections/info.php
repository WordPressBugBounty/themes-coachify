<?php
/**
 * Coachify Theme
 *
 * @package Coachify
 */
if( class_exists( 'WP_Customize_Section' ) ) :
/**
 * Adding Go to Pro Section in Customizer
 * https://github.com/justintadlock/trt-customizer-pro
 */
class Coachify_Customize_Section_Pro extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'coachify-pro-section';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url($this->pro_url);

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{{ data.pro_url }}}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}
endif;

if ( ! function_exists( 'coachify_page_sections_pro' ) ) : 
/**
 * Add Pro Button
*/
function coachify_page_sections_pro( $manager ) {
	if( ! coachify_pro_is_activated() ){
		// Register custom section types.
		$manager->register_section_type( 'Coachify_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Coachify_Customize_Section_Pro(
				$manager,
				'coachify_page_view_pro',
				array(
					'priority' => 3, 
					'pro_text' => esc_html__( 'VIEW PRO VERSION', 'coachify' ),
					'pro_url'  => esc_url('https://wpcoachify.com/pricing/?utm_source=coachify&utm_medium=customizer&utm_campaign=upgrade_to_pro')
				)
			)
		);
	}
}
endif;
add_action( 'customize_register', 'coachify_page_sections_pro' );