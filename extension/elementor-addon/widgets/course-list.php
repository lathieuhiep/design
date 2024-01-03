<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Design_Elementor_Addon_Course_List extends Widget_Base {
	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-post-list';
	}

	public function get_title() {
		return esc_html__( 'Courses List', 'design' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'design' ),
					'DESC' => esc_html__( 'Descending', 'design' ),
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
        <div class="element-course-list element-course-style">
            <div class="element-course-list__warp">
                <?php
                while ( $query->have_posts() ):
                    $query->the_post();

                    $study_time = get_post_meta( get_the_ID(),'design_meta_box_course_study_time', true );
                    $study_form = get_post_meta(  get_the_ID(),'design_meta_box_course_study_form', true );
                    $number_lessons = get_post_meta(  get_the_ID(),'design_meta_box_course_number_lessons', true );
                    $tuition = get_post_meta(  get_the_ID(),'design_meta_box_course_tuition', true );
                ?>

                    <div class="item">
                        <div class="item__thumbnail">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        </div>

                        <div class="content">
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