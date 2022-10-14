<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Design_Elementor_Addon_Button_Modal_Form extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'button-modal-form';
	}

	public function get_title() {
		return esc_html__( 'Button Modal Form', Text_Domain );
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
				'label' => esc_html__( 'Button', Text_Domain ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', Text_Domain ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'ĐĂNG KÍ HỌC NGAY', Text_Domain ),
				'placeholder' => esc_html__( 'Type your title here', Text_Domain ),
			]
		);

		$this->add_control(
			'show_modal',
			[
				'label'         =>  esc_html__('Show Modal', Text_Domain),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', Text_Domain),
				'label_off'     =>  esc_html__('No', Text_Domain),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

        $this->add_control(
			'multimodal',
			[
				'label'         =>  esc_html__('Multimodal', Text_Domain),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', Text_Domain),
				'label_off'     =>  esc_html__('No', Text_Domain),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
				'conditions' => [
					'terms' => [
						[
							'name' => 'show_modal',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__( 'Enter your shortcode', Text_Domain ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => '[contact-form-7 id="123" title="Sign up for school"]',
				'conditions' => [
					'terms' => [
						[
							'name' => 'show_modal',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'show_note',
			[
				'label'         =>  esc_html__('Show Note', Text_Domain),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', Text_Domain),
				'label_off'     =>  esc_html__('No', Text_Domain),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->add_control(
			'note',
			[
				'label' => esc_html__( 'Note', Text_Domain ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
				'default' => esc_html__( 'Tất cả các lịch học đều được học vào buổi tối', Text_Domain ),
				'placeholder' => esc_html__( 'Type your note here', Text_Domain ),
			]
		);

		$this->end_controls_section();

		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', Text_Domain ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'align',
			[
				'label'     =>  esc_html__( 'Alignment', Text_Domain ),
				'type'      =>  Controls_Manager::CHOOSE,
				'options'   =>  [
					'left'  =>  [
						'title' =>  esc_html__( 'Left', Text_Domain ),
						'icon'  =>  'eicon-text-align-left',
					],

					'center' => [
						'title' =>  esc_html__( 'Center', Text_Domain ),
						'icon'  =>  'eicon-text-align-center',
					],

					'right' => [
						'title' =>  esc_html__( 'Right', Text_Domain ),
						'icon'  =>  'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .element-btn-modal-form .btn-box' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        $id_modal = 'btn-modal-form';

        if ( $settings['show_modal'] && $settings['multimodal'] ) :
	        $id_int = substr( $this->get_id_int(), 0, 3 );
	        $id_modal = 'btn-modal-form-' . $id_int;
        endif;

	?>

		<div class="element-btn-modal-form">
            <div class="btn-box">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr( $id_modal ); ?>">
		            <?php echo esc_html( $settings['text'] ); ?>
                    <i class="fas fa-arrow-right"></i>
                </button>

		        <?php if ( $settings['show_note'] ) : ?>
                    <div class="note">
                    <span class="note__label">
                        <?php esc_html_e('Lưu ý:', Text_Domain); ?>
                    </span>

                        <span class="note__text">
                        <?php echo esc_html( $settings['note'] ); ?>
                    </span>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ( $settings['show_modal'] ) :?>

            <div class="modal fade modal-theme" id="<?php echo esc_attr( $id_modal ); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-header__left">
                                <h5 class="modal-title">
		                            <?php echo esc_html( $settings['text'] ); ?>
                                </h5>

                                <?php if ( $settings['note'] ) : ?>

                                    <div class="note">
                                        <span class="note__label">
                                            <?php esc_html_e('Lưu ý:', Text_Domain); ?>
                                        </span>

                                        <span class="note__text">
                                            <?php echo esc_html( $settings['note'] ); ?>
                                        </span>
                                    </div>

                                <?php endif; ?>
                            </div>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
							<?php echo do_shortcode( shortcode_unautop( $settings['shortcode'] ) ); ?>
                        </div>

                        <div class="modal-footer">
                            <?php design_content_modal_contact_footer(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif; ?>
		</div>
	<?php
    }

}