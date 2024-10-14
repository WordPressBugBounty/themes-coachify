<?php
/**
 * Group title
 *
 * @package Coachify
 */
class Coachify_Group_Title extends WP_Customize_Section {
	/**
	 * Type of this section.
	 *
	 * @var string
	 */
	public $type = 'coachify-group-title';

	/**
	 * Special categorization for the section.
	 *
	 * @var string
	 */
	public $kind = 'default';
	

	/**
	 * Output
	 */
	public function render() {
		$description = $this->description;
		?>
		<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="accordion-section coachify-group-title">
			<h3><?php echo esc_html( $this->title ); ?></h3>
			<?php if ( ! empty( $description ) ) { ?>
				<span class="description"><?php echo esc_html( $description ); ?></span>
			<?php } ?>
		</li>
		<?php
	}
}
