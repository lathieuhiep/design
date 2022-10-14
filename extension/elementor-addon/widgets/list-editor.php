<?php

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Design_Elementor_List_Editor extends Widget_Base {

	public function get_categories() {
		return array( 'design_widgets' );
	}

	public function get_name() {
		return 'design-list-editor';
	}

	public function get_title() {
		return esc_html__( 'Design List Editor', Text_Domain );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	protected function register_controls() {

		// Section Editor
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', Text_Domain ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'column_number',
			[
				'label'     =>  esc_html__( 'Column', Text_Domain ),
				'type'      =>  Controls_Manager::SELECT,
				'default'   =>  3,
				'options'   =>  [
					1   =>  esc_html__( '1 Column', Text_Domain ),
					2   =>  esc_html__( '2 Column', Text_Domain ),
					3   =>  esc_html__( '3 Column', Text_Domain ),
					4   =>  esc_html__( '4 Column', Text_Domain ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'basictheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'basictheme' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => esc_html__( 'Content', 'basictheme' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Content' , 'basictheme' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'basictheme' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'basictheme' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'basictheme' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'basictheme' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'basictheme' ),
					],
					[
						'list_title' => esc_html__( 'Title #3', 'basictheme' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'basictheme' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$column_number = $settings['column_number'];
		$list = $settings['list'];
		?>

		<div class="element-list-editor">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-<?php echo esc_attr( $column_number ); ?> custom-row">
				<?php foreach ( $list as $item ) : ?>

				<div class="col custom-col">
					<div class="item">
						<h3 class="item__title">
							<?php echo esc_html( $item['list_title'] ); ?>
						</h3>

						<?php
						if ( $item['list_content'] ) :
							$content_arr = explode("\n", $item['list_content']);
						?>
							<div class="item__content">
								<ul>
									<?php foreach ( $content_arr as $item_content ) : ?>
									<li>
										<?php echo esc_html( $item_content ); ?>
									</li>
									<?php endforeach; ?>
								</ul>

							</div>
						<?php endif; ?>

					</div>
				</div>

				<?php endforeach; ?>
			</div>
		</div>

		<?php

	}

}