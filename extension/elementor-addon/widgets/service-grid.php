<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Addon_Service_Grid extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-service-grid';
	}

	public function get_title() {
		return esc_html__( 'Service Grid', Text_Domain );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	protected function register_controls() {

		// Section query
		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Query', Text_Domain ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'limit',
			[
				'label'   => esc_html__( 'Limit', Text_Domain ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
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
				'default' => 'ASC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', Text_Domain ),
					'DESC' => esc_html__( 'Descending', Text_Domain ),
				],
			]
		);

		$this->end_controls_section();

		// Section layout
		$this->start_controls_section(
			'section_layout',
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
				'default' => 3,
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
		$limit_post    = $settings['limit'];
		$order_by_post = $settings['order_by'];
		$order_post    = $settings['order'];

		// Query
		$args = array(
			'post_type'      => 'design_service',
			'posts_per_page' => $limit_post,
			'orderby'        => $order_by_post,
			'order'          => $order_post,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :

			?>

            <div class="element-service-grid">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-<?php echo esc_attr( $settings['column_number'] ); ?>">
					<?php
					while ( $query->have_posts() ):
						$query->the_post();
                    ?>

                        <div class="col">
                            <div class="item">
                                <div class="item__thumbnail">
	                                <?php the_post_thumbnail( 'large' ); ?>
                                </div>

                                <h2 class="item__title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_title(); ?>
                                    </a>
                                </h2>

                                <div class="item__excerpt">
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="item__action">
                                    <a class="link-box" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		                                <?php esc_html_e('Xem chi tiết', Text_Domain); ?>
                                    </a>
                                </div>
                            </div>
                        </div>

					<?php endwhile;
					wp_reset_postdata(); ?>
                </div>
            </div>

		<?php

		endif;
	}

}