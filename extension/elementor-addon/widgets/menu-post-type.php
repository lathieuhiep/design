<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Menu_Post_Type extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-menu-post-type';
	}

	public function get_title() {
		return esc_html__( 'Menu Post Type', 'design' );
	}

	public function get_icon() {
		return 'eicon-menu-bar';
	}

	protected function register_controls() {

		// Section query
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
				'label'   => esc_html__( 'Limit', 'design' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
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
				'default' => 'ASC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'design' ),
					'DESC' => esc_html__( 'Descending', 'design' ),
				],
			]
		);

		$this->end_controls_section();

		// Section layout
		$this->start_controls_section(
			'section_layout',
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
			'post_type'      => 'design_course',
			'posts_per_page' => $limit_post,
			'orderby'        => $order_by_post,
			'order'          => $order_post,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
			global $post;
			$post_id = $post->ID;
		?>

			<div class="element-menu-post-type">
				<div class="row row-cols-2 row-cols-sm-2 row-cols-md-<?php echo esc_attr( $settings['column_number'] ); ?>">
					<?php
					while ( $query->have_posts() ):
						$query->the_post();

					$id_post_type = get_the_ID();
					?>

						<div class="col">
							<div class="item <?php echo esc_attr( $post_id == $id_post_type ? 'active' : '' ) ?>">
								<div class="item__thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail( 'medium' ); ?>
									</a>
								</div>

								<h2 class="item__title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
							</div>
						</div>

					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>

		<?php

		endif;
	}

}