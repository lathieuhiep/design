<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Addon_Course_Grid extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-post-grid';
	}

	public function get_title() {
		return esc_html__( 'Courses Grid', 'design' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	protected function register_controls() {

		// Content query
		$this->start_controls_section(
			'content_query',
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
					'DESC' => esc_html__( 'Descending', 'design' ),
					'ASC'  => esc_html__( 'Ascending', 'design' ),
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
			'post_type'      => 'design_course',
			'posts_per_page' => $limit_post,
			'orderby'        => $order_by_post,
			'order'          => $order_post,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :

			?>

            <div class="element-course-grid">
                <div class="row row-cols-<?php echo esc_attr( $settings['column_number'] ); ?>">
					<?php
					while ( $query->have_posts() ):
						$query->the_post();

						$study_time = rwmb_meta( 'design_meta_box_course_study_time' );
						$study_form = rwmb_meta( 'design_meta_box_course_study_form' );
						$number_lessons = rwmb_meta( 'design_meta_box_course_number_lessons' );
						$tuition = rwmb_meta( 'design_meta_box_course_tuition' );

						?>

                        <div class="col">
                            <div class="item">
                                <div class="item__thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail( 'large' ); ?>
                                    </a>
                                </div>

                                <h2 class="item__title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_title(); ?>
                                    </a>
                                </h2>

                                <ul class="item__info">
                                    <li>
                                        <strong><?php esc_html_e( 'Thời gian học' ); ?>:</strong>
                                        <span><?php echo esc_html( $study_time ); ?></span>
                                    </li>

                                    <li>
                                        <strong><?php esc_html_e( 'Hình thức' ); ?>:</strong>
                                        <span><?php echo esc_html( $study_form ); ?></span>
                                    </li>

                                    <li>
                                        <strong><?php esc_html_e( 'Số buổi trong tuần' ); ?>:</strong>
                                        <span><?php echo esc_html( $number_lessons ); ?></span>
                                    </li>

                                    <li>
                                        <strong><?php esc_html_e( 'Học phí' ); ?>:</strong>

                                        <?php if ( $tuition ) : ?>
                                        <span class="price">
                                            <?php echo esc_html( number_format( $tuition, 0, '', '.' ) ); ?>&nbsp;vnd
                                        </span>
                                        <?php endif; ?>
                                    </li>
                                </ul>

                                <a class="item__link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		                            <?php esc_html_e('Xem chi tiết', 'design'); ?>
                                </a>
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