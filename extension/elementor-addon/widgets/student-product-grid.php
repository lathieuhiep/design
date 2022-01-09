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
		return esc_html__( 'Student Product Grid', 'design' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	protected function register_controls() {

		// Content query
		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Query', 'design' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'limit',
			[
				'label'   => esc_html__( 'Number of Courses', 'design' ),
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
				'label'   => esc_html__( 'Order By', 'design' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'id',
				'options' => [
					'id'    => esc_html__( 'ID', 'design' ),
					'title' => esc_html__( 'Title', 'design' ),
					'date'  => esc_html__( 'Date', 'design' ),
					'rand'  => esc_html__( 'Random', 'design' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', 'design' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'design' ),
					'DESC' => esc_html__( 'Descending', 'design' ),
				],
			]
		);

		$this->end_controls_section();

		// Content query
		$this->start_controls_section(
			'section_link',
			[
				'label' => esc_html__( 'Link', 'design' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_link',
			[
				'label'         =>  esc_html__( 'Text', 'design' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Xem thêm sản phẩm khác', 'design' ),
				'label_block'   =>  true
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'design' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'design' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->end_controls_section();

		// Content layout
		$this->start_controls_section(
			'content_layout',
			[
				'label' => esc_html__( 'Layout Settings', 'design' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'column_number',
			[
				'label'   => esc_html__( 'Column', 'design' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 4,
				'options' => [
					1 => esc_html__( '1 Column', 'design' ),
					2 => esc_html__( '2 Column', 'design' ),
					3 => esc_html__( '3 Column', 'design' ),
					4 => esc_html__( '4 Column', 'design' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings      = $this->get_settings_for_display();
		$limit_post    = $settings['limit'];
		$order_by_post = $settings['order_by'];
		$order_post    = $settings['order'];

		// Query
		$args = array(
			'post_type'      => 'student_product',
			'posts_per_page' => $limit_post,
			'orderby'        => $order_by_post,
			'order'          => $order_post,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :

			?>

            <div class="element-student-product-grid">
                <div class="row row-cols-<?php echo esc_attr( $settings['column_number'] ); ?> custom-row">
					<?php
					while ( $query->have_posts() ):
						$query->the_post();

						design_item_student_product ();

                    endwhile;
					wp_reset_postdata();
                    ?>
                </div>

                <?php
                if ( ! empty( $settings['link']['url'] ) ) :
	                $this->add_link_attributes( 'link', $settings['link'] );
                ?>
                <div class="btn-link">
                    <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                        <?php echo esc_html( $settings['text_link'] ); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>

		<?php

		endif;
	}

}