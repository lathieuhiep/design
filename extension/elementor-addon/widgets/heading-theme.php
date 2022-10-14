<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Design_Elementor_Heading_Theme extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-heading-theme';
	}

	public function get_title() {
		return esc_html__( 'Heading Theme', Text_Domain );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	protected function register_controls() {

		// Section heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => esc_html__( 'Heading', Text_Domain ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'         =>  esc_html__( 'Heading', Text_Domain ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Heading Theme', Text_Domain ),
				'label_block'   =>  true
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<div class="element-heading-theme">
			<h4 class="heading">
				<?php echo esc_html( $settings['heading'] ); ?>
			</h4>
		</div>

		<?php

	}

	protected function content_template() {

		?>
		<div class="element-heading-theme">
			<h4 class="heading">
				{{{ settings.heading }}}
			</h4>
		</div>

		<?php
	}

}