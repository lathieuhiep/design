<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Addon_CourseDetailContent extends Widget_Base {

	public function get_categories(): array {
		return array( 'design_widgets' );
	}

	public function get_name(): string {
		return 'design-course-detail-content';
	}

	public function get_title(): string {
		return esc_html__( 'Course Detail Content', 'design' );
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_script_depends() {
		return ['design-elementor-custom'];
	}

	protected function _register_controls() {

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
		$opt_rule = get_theme_mod('design_opt_course_rule_editor', '');
		$opt_bank_1 = get_theme_mod('design_opt_course_bank_account_1', '');
		$opt_bank_2 = get_theme_mod('design_opt_course_bank_account_2', '');

		$settings = $this->get_settings_for_display();
    ?>

        <div class="element-course-detail-content">
            <div class="content-box">
                <div class="content-box__editor">
	                <?php echo wp_kses_post( $settings['text_editor'] ); ?>
                </div>

                <div class="content-box__note">
                    <div class="opt-rule">
                        <h4>
                            <?php esc_html_e('Lưu ý:', 'design'); ?>
                        </h4>

	                    <?php echo wp_kses_post( $opt_rule ); ?>
                    </div>

                    <div class="opt-bank">
                        <h5 class="opt-bank__title">
                            <?php esc_html_e('Thông tin tài khoản:', 'design'); ?>
                        </h5>

                        <div class="opt-bank__list">
                            <div class="row row-cols-2">
                                <div class="col">
	                                <?php echo wp_kses_post( $opt_bank_1 ); ?>
                                </div>

                                <div class="col">
		                            <?php echo wp_kses_post( $opt_bank_2 ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="read-more-content">
                <p>
			        <span><?php esc_html_e('Xem thêm bài viết', 'design'); ?></span>
                    <i class="fas fa-angle-down"></i>
                </p>
            </div>
        </div>

    <?php
	}

}