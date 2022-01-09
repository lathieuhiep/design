<?php

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Addon_Student_Product_Detail extends Widget_Base {

	public function get_categories(): array {
		return array( 'design_widgets' );
	}

	public function get_name(): string {
		return 'design-student-product-detail';
	}

	public function get_title(): string {
		return esc_html__( 'Student Product Detail', 'design' );
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_script_depends() {
		return ['design-elementor-custom'];
	}

	protected function _register_controls() {

		// Section image gallery
		$this->start_controls_section(
			'section_gallery',
			[
				'label' => esc_html__( 'Gallery', 'design' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'design' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->end_controls_section();

		// Section carousel options
		$this->start_controls_section(
			'section_carousel_options',
			[
				'label' => esc_html__( 'Additional Options', 'design' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'loop',
			[
				'type'         => Controls_Manager::SWITCHER,
				'label'        => esc_html__( 'Loop Slider ?', 'design' ),
				'label_off'    => esc_html__( 'No', 'design' ),
				'label_on'     => esc_html__( 'Yes', 'design' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => esc_html__( 'Autoplay?', 'design' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_off'    => esc_html__( 'No', 'design' ),
				'label_on'     => esc_html__( 'Yes', 'design' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_control(
			'nav',
			[
				'label'        => esc_html__( 'Nav Slider', 'design' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'design' ),
				'label_off'    => esc_html__( 'No', 'design' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'dots',
			[
				'label'        => esc_html__( 'Dots Slider', 'design' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'design' ),
				'label_off'    => esc_html__( 'No', 'design' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'margin_item',
			[
				'label'   => esc_html__( 'Space Between Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'min_width_1200',
			[
				'label'     => esc_html__( 'Min Width 1200px', 'design' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'item',
			[
				'label'   => esc_html__( 'Number of Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'min_width_992',
			[
				'label'     => esc_html__( 'Min Width 992px', 'design' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'item_992',
			[
				'label'   => esc_html__( 'Number of Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'min_width_768',
			[
				'label'     => esc_html__( 'Min Width 768px', 'design' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'item_768',
			[
				'label'   => esc_html__( 'Number of Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'min_width_568',
			[
				'label'     => esc_html__( 'Min Width 568px', 'design' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'item_568',
			[
				'label'   => esc_html__( 'Number of Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'margin_item_568',
			[
				'label'   => esc_html__( 'Space Between Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'max_width_567',
			[
				'label'     => esc_html__( 'Max Width 567px', 'design' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'item_567',
			[
				'label'   => esc_html__( 'Number of Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'margin_item_567',
			[
				'label'   => esc_html__( 'Space Between Item', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$data_settings_owl = [
			'loop'       => ( 'yes' === $settings['loop'] ),
			'nav'        => ( 'yes' === $settings['nav'] ),
			'dots'       => ( 'yes' === $settings['dots'] ),
			'margin'     => $settings['margin_item'],
			'autoplay'   => ( 'yes' === $settings['autoplay'] ),
			'responsive' => [
				'0' => array(
					'items'  => $settings['item_567'],
					'margin' => $settings['margin_item_567']
				),

				'576' => array(
					'items'  => $settings['item_568'],
					'margin' => $settings['margin_item_568']
				),

				'768' => array(
					'items' => $settings['item_768']
				),

				'992' => array(
					'items' => $settings['item_992']
				),

				'1200' => array(
					'items' => $settings['item']
				),
			],
		];

		if ( $settings['gallery'] ) :
			$name_course = rwmb_meta( 'design_meta_box_student_product_name_course' );
			$link_course = rwmb_meta( 'design_meta_box_student_product_select_course' );

			$prev_post = get_previous_post();
			$next_post = get_next_post();
    ?>

        <div class="element-student-product-detail">
            <div class="product-featured-image">
                <div class="scrollbar-inner">
                    <img src="<?php echo esc_url( $settings['gallery'][0]['url'] ) ?>" alt="product">
                </div>

                <div class="student-info d-flex align-items-end justify-content-between">
                    <?php if ( is_singular('student_product') ) : ?>

                        <div class="name">
                            <strong>
			                    <?php esc_html_e('Học viên', 'design'); ?>
                            </strong>

                            <h4 class="name__student">
			                    <?php the_title(); ?>
                            </h4>
                        </div>

                        <div class="course">
                            <a href="<?php echo esc_url( get_post_permalink( $link_course ) ); ?>">
			                    <?php esc_html_e('Học Khóa ', 'design'); echo esc_html( $name_course ); ?>
                            </a>
                        </div>

                    <?php else: ?>

                        <div class="name">
                            <strong>
			                    <?php esc_html_e('Sản Phẩm', 'design'); ?>
                            </strong>

                            <h4 class="name__student">
			                    <?php the_title(); ?>
                            </h4>
                        </div>

                    <?php endif; ?>

                </div>
            </div>

            <div class="product-gallery">
                <div class="product-gallery__slider">
                    <?php
                    if( $prev_post ) :
	                    $prev_title = strip_tags( str_replace('"', '', $prev_post->post_title) );
                    ?>

                    <a class="link-post prev-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ) ?>" title="<?php echo esc_attr( $prev_title ); ?>">
                        <i class="fas fa-long-arrow-alt-left"></i>

                        <span>
                            <?php
                            if ( is_singular('student_product') ) :
	                            esc_html_e( 'Xem bài học viên trước', 'design' );
                            else:
	                            esc_html_e( 'Xem Sản phẩm trước', 'design' );
                            endif;
                            ?>
                        </span>
                    </a>

                    <?php endif; ?>

                    <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ); ?>'>
                        <?php foreach ( $settings['gallery'] as $item ) : ?>

                            <div class="item item-student" data-src="<?php echo esc_url($item['url']); ?>">
                               <?php echo wp_get_attachment_image( $item['id'], 'thumbnail' ); ?>
                            </div>

                        <?php endforeach; ?>
                    </div>

	                <?php
	                if( $next_post ) :
		                $next_title = strip_tags( str_replace('"', '', $next_post->post_title) );
                    ?>

                        <a class="link-post next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ) ?>" title="<?php echo esc_attr( $next_title ); ?>">
                            <i class="fas fa-long-arrow-alt-right"></i>

                            <span>
                                <?php
                                if ( is_singular('student_product') ) :
                                    esc_html_e( 'Xem bài học viên kế tiếp', 'design' );
                                else:
                                    esc_html_e( 'Xem Sản phẩm kế tiếp', 'design' );
                                endif;
                                ?>
                            </span>
                        </a>

	                <?php endif; ?>
                </div>
            </div>
        </div>

    <?php
		endif;
    }

}