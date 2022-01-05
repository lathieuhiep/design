<?php

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Design_Elementor_Addon_Carousel_Images extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-carousel-images';
	}

	public function get_title() {
		return esc_html__( 'Carousel Images', 'design' );
	}

	public function get_icon() {
		return 'eicon-slider-album';
	}

	public function get_script_depends() {
		return ['design-elementor-custom'];
	}

	protected function _register_controls() {

		// Section carousel images
		$this->start_controls_section(
			'section_carousel_images',
			[
				'label' => __( 'Carousel Images', 'design' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Name', 'design' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Student #1' , 'design' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_image',
			[
				'label' => esc_html__( 'Choose Image', 'design' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_link',
			[
				'label' => esc_html__( 'Link', 'design' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'design' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'List', 'design' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Student #1', 'design' ),
					],
					[
						'list_title' => __( 'Student #2', 'design' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// Content additional options
		$this->start_controls_section(
			'content_additional_options',
			[
				'label' => __( 'Options', 'design' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'loop',
			[
				'type'          =>  Controls_Manager::SWITCHER,
				'label'         =>  esc_html__('Loop Slider ?', 'design'),
				'label_off'     =>  esc_html__('No', 'design'),
				'label_on'      =>  esc_html__('Yes', 'design'),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'         =>  esc_html__('Autoplay?', 'design'),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_off'     =>  esc_html__('No', 'design'),
				'label_on'      =>  esc_html__('Yes', 'design'),
				'return_value'  =>  'yes',
				'default'       =>  'no',
			]
		);

		$this->add_control(
			'nav',
			[
				'label'         =>  esc_html__('Nav Slider', 'design'),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', 'design'),
				'label_off'     =>  esc_html__('No', 'design'),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->add_control(
			'dots',
			[
				'label'         =>  esc_html__('Dots Slider', 'design'),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', 'design'),
				'label_off'     =>  esc_html__('No', 'design'),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->end_controls_section();

		// Section style
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'design' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => esc_html__( 'Dots Color', 'design' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-carousel-images .owl-carousel .owl-dots .owl-dot span' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'dots',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'dots_color_hover',
			[
				'label' => esc_html__( 'Dots Color Hover', 'design' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-carousel-images .owl-carousel .owl-dots .owl-dot.active span, {{WRAPPER}} .element-carousel-images .owl-carousel .owl-dots .owl-dot:hover span' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'dots',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$data_settings_owl = [
			'loop' => ('yes' === $settings['loop']),
			'nav' => ('yes' === $settings['nav']),
			'dots' => ('yes' === $settings['dots']),
			'margin' => $settings['margin_item'],
			'autoplay' => ('yes' === $settings['autoplay']),
			'items' => 1
		];
		?>

        <div class="element-carousel-images">
            <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
				<?php
				foreach ( $settings['list'] as $index => $item ) :
					$image_id = $item['list_image']['id'];
					$url = $item['list_link']['url'];

                ?>

                    <div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
	                    <?php
                        echo wp_get_attachment_image( $image_id, 'full' );

	                    if ( $url ) :
	                        $link_key = 'link_' . $index;
	                        $this->add_link_attributes( $link_key, $item['list_link'] );
                        ?>

                            <a class="item__link" <?php echo $this->get_render_attribute_string( $link_key ); ?>></a>

						<?php endif; ?>
                    </div>

				<?php endforeach; ?>
            </div>
        </div>

		<?php
	}
}