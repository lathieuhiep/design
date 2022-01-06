<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Addon_Breadcrumb extends Widget_Base {

	public function get_categories(): array {
		return array( 'design_widgets' );
	}

	public function get_name(): string {
		return 'design-breadcrumb';
	}

	public function get_title(): string {
		return esc_html__( 'Breadcrumb', 'design' );
	}

	public function get_icon() {
		return 'eicon-product-breadcrumbs';
	}

	protected function _register_controls() {

		// style breadcrumbs
		$this->start_controls_section(
			'style',
			[
				'label' => esc_html__( 'Breadcrumbs', 'design' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'breadcrumbs_color',
			[
				'label'     => __( 'Color', 'design' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-breadcrumbs .breadcrumbs-col, .element-breadcrumbs .breadcrumbs-col span a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		if ( function_exists( 'bcn_display' ) ) :
			?>

            <div class="element-breadcrumbs breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <div class="breadcrumbs-col">
					<?php bcn_display(); ?>
                </div>
            </div>

		<?php
		endif;
	}

}