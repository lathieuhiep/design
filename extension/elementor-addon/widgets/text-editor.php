<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Design_Elementor_Text_Editor extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-text-editor';
	}

	public function get_title() {
		return esc_html__( 'Design Text Editor', 'design' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	protected function register_controls() {

		// Section Editor
		$this->start_controls_section(
			'section_editor',
			[
				'label' => esc_html__( 'Text Editor', 'design' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_editor',
			[
				'label' => '',
				'type'  => Controls_Manager::WYSIWYG,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

    ?>

        <div class="element-text-editor">
	        <?php echo wp_kses_post( $settings['text_editor'] ); ?>
        </div>

    <?php

	}

	protected function content_template() {

    ?>
        <div class="element-text-editor">
            {{{ settings.text_editor }}}
        </div>

    <?php
	}

}