<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Design_Elementor_Addon_Button_Modal_Form extends \Elementor\Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'button-modal-form';
	}

	public function get_title() {
		return esc_html__( 'Button Modal Form', 'design' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_script_depends() {
		return ['design-elementor-custom'];
	}

	protected function register_controls() {

        // button section
		$this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'design' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'design' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'ĐĂNG KÍ HỌC NGAY', 'design' ),
				'placeholder' => esc_html__( 'Type your title here', 'design' ),
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__( 'Enter your shortcode', 'design' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => '[contact-form-7 id="123" title="Sign up for school"]',
			]
		);

		$this->add_control(
			'note',
			[
				'label' => esc_html__( 'Note', 'design' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
				'default' => esc_html__( 'Tất cả các lịch học đều được học vào buổi tối', 'design' ),
				'placeholder' => esc_html__( 'Type your note here', 'design' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'design' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'design' ),
				'placeholder' => esc_html__( 'Type your description here', 'design' ),
			]
		);

		$this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();
		$id_int = substr( $this->get_id_int(), 0, 3 );
	?>

		<div class="element-btn-modal-form">
			<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#btn-modal-form-<?php echo esc_attr( $id_int ); ?>">
				<?php echo esc_html( $settings['text'] ); ?>
                <i class="fas fa-arrow-right"></i>
			</button>

            <div class="note">
                <span class="note__label">
                    <?php esc_html_e('Lưu ý:', 'design'); ?>
                </span>

                <span class="note__text">
                    <?php echo esc_html( $settings['note'] ); ?>
                </span>
            </div>

            <div class="modal fade" id="btn-modal-form-<?php echo esc_attr( $id_int ); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-header__left">
                                <h5 class="modal-title">
		                            <?php echo esc_html( $settings['text'] ); ?>
                                </h5>

                                <div class="note">
                                    <span class="note__label">
                                        <?php esc_html_e('Lưu ý:', 'design'); ?>
                                    </span>

                                    <span class="note__text">
                                        <?php echo esc_html( $settings['note'] ); ?>
                                    </span>
                                </div>
                            </div>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
							<?php echo do_shortcode( shortcode_unautop( $settings['shortcode'] ) ); ?>
                        </div>

                        <div class="modal-footer">
	                        <?php echo wp_kses_post( $settings['description'] ); ?>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	<?php
    }

}