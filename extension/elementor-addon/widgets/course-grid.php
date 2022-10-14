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
		return esc_html__( 'Courses Grid', Text_Domain );
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
				'default' => 4,
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
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-<?php echo esc_attr( $settings['column_number'] ); ?>">
					<?php
					while ( $query->have_posts() ):
						$query->the_post();

						$study_time = get_post_meta( get_the_ID(),'design_meta_box_course_study_time', true );
						$study_form = get_post_meta(  get_the_ID(),'design_meta_box_course_study_form', true );
						$number_lessons = get_post_meta(  get_the_ID(),'design_meta_box_course_number_lessons', true );
						$tuition = get_post_meta(  get_the_ID(),'design_meta_box_course_tuition', true );
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
		                            <?php esc_html_e('Xem chi tiết', Text_Domain); ?>
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