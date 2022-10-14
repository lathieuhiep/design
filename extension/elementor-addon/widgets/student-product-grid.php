<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Addon_Student_Product_Grid extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-student-product-grid';
	}

	public function get_title() {
		return esc_html__( 'Student Product Grid', Text_Domain );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_script_depends() {
		return ['load-product'];
	}

	protected function register_controls() {

		// Content query
		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Query', Text_Domain ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'custom_post_type',
			[
				'label'   => esc_html__( 'Select Custom Post Type', Text_Domain ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'student_product',
				'options' => [
					'student_product'  => esc_html__( 'Student Product', Text_Domain ),
					'my_product' => esc_html__( 'My Product', Text_Domain ),
				],
			]
		);

		$this->add_control(
			'limit',
			[
				'label'   => esc_html__( 'Number of Courses', Text_Domain ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'   => esc_html__( 'Order By', Text_Domain ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'id',
				'options' => [
					'id'    => esc_html__( 'ID', Text_Domain ),
					'title' => esc_html__( 'Title', Text_Domain ),
					'date'  => esc_html__( 'Date', Text_Domain ),
					'rand'  => esc_html__( 'Random', Text_Domain ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', Text_Domain ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', Text_Domain ),
					'DESC' => esc_html__( 'Descending', Text_Domain ),
				],
			]
		);

		$this->end_controls_section();

		// Content query
		$this->start_controls_section(
			'section_link',
			[
				'label' => esc_html__( 'Link', Text_Domain ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'user_ajax',
			[
				'label'         =>  esc_html__('User Ajax', Text_Domain),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', Text_Domain),
				'label_off'     =>  esc_html__('No', Text_Domain),
				'return_value'  =>  'yes',
				'default'       =>  'no',
			]
		);

		$this->add_control(
			'text_link',
			[
				'label'         =>  esc_html__( 'Text', Text_Domain ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Xem thêm sản phẩm khác', Text_Domain ),
				'label_block'   =>  true
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', Text_Domain ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', Text_Domain ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'user_ajax',
							'value' => '',
						],
					],
				],
			]
		);

		$this->end_controls_section();

		// Content layout
		$this->start_controls_section(
			'content_layout',
			[
				'label' => esc_html__( 'Layout Settings', Text_Domain ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'column_number',
			[
				'label'   => esc_html__( 'Column', Text_Domain ),
				'type'    => Controls_Manager::SELECT,
				'default' => 4,
				'options' => [
					1 => esc_html__( '1 Column', Text_Domain ),
					2 => esc_html__( '2 Column', Text_Domain ),
					3 => esc_html__( '3 Column', Text_Domain ),
					4 => esc_html__( '4 Column', Text_Domain ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings      = $this->get_settings_for_display();
		$post_type     = $settings['custom_post_type'];
		$limit_post    = $settings['limit'];
		$order_by_post = $settings['order_by'];
		$order_post    = $settings['order'];

		$setting_args = [
            'post_type' => $post_type,
			'limit' => $limit_post,
			'orderby' => $order_by_post,
			'order' => $order_post,
		];

		// Query
		$args = array(
			'post_type'      => $post_type,
			'posts_per_page' => $limit_post,
			'orderby'        => $order_by_post,
			'order'          => $order_post,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :

			?>

            <div class="element-student-product-grid">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-<?php echo esc_attr( $settings['column_number'] ); ?> custom-row">
					<?php
					while ( $query->have_posts() ):
						$query->the_post();

						design_item_student_product( $post_type );

                    endwhile;
					wp_reset_postdata();
                    ?>
                </div>


                <div class="btn-link">
	                <?php
	                if ( ! empty( $settings['link']['url'] ) ) :
		                $this->add_link_attributes( 'link', $settings['link'] );
                    ?>

                        <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                            <?php echo esc_html( $settings['text_link'] ); ?>
                        </a>

                    <?php else: ?>

                        <div class="spinner-box">
                            <div class="spinner-border text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <a href="#" class="load-my-product" data-settings='<?php echo wp_json_encode( $setting_args ); ?>'>
                            <?php echo esc_html( $settings['text_link'] ); ?>
                        </a>

                    <?php endif; ?>
                </div>

            </div>

		<?php

		endif;
	}

}