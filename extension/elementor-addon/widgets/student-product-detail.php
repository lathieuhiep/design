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

	public function get_style_depends() {
		return ['owl.carousel'];
	}

	public function get_script_depends() {
		return ['owl.carousel', 'design-elementor-custom'];
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

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$data_settings_owl = [
			'loop'       => ( 'yes' === $settings['loop'] ),
			'nav'        => ( 'yes' === $settings['nav'] ),
			'dots'       => ( 'yes' === $settings['dots'] ),
			'margin'     => 10,
			'autoplay'   => ( 'yes' === $settings['autoplay'] ),
			'responsive' => [
				'0' => array(
					'items'  => 2,
				),

				'768' => array(
					'items' => 3
				),

				'1200' => array(
					'items' => 4
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

                <div class="student-info d-sm-flex align-items-sm-end justify-content-sm-between">
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
                    <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ); ?>'>
                        <?php foreach ( $settings['gallery'] as $item ) : ?>

                            <div class="item item-student" data-src="<?php echo esc_url($item['url']); ?>">
                               <?php echo wp_get_attachment_image( $item['id'], 'medium' ); ?>
                            </div>

                        <?php endforeach; ?>
                    </div>

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

	                <?php
                    endif;

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