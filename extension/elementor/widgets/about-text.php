<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class design_widget_about_text extends Widget_Base {

    public function get_categories() {
        return array( 'design_widgets' );
    }

    public function get_name() {
        return 'design-about-text';
    }

    public function get_title() {
        return esc_html__( 'About Text', 'design' );
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    protected function _register_controls() {

        // Content heading
        $this->start_controls_section(
            'content_heading',
            [
                'label' => __( 'Heading', 'design' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'design' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Heading About Text', 'design' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

        // Content description
        $this->start_controls_section(
            'content_description',
            [
                'label' => __( 'description', 'design' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     =>  esc_html__( 'Description', 'design' ),
                'type'      =>  Controls_Manager::WYSIWYG,
                'default'   =>  esc_html__( 'Default description', 'design' ),
            ]
        );

        $this->end_controls_section();

        // Style Heading
        $this->start_controls_section(
            'style_heading',
            [
                'label' => esc_html__( 'Heading', 'design' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'align',
            [
                'label'     =>  esc_html__( 'Alignment Title', 'design' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'design' ),
                        'icon'  =>  'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' =>  esc_html__( 'Center', 'design' ),
                        'icon'  =>  'eicon-text-align-center',
                    ],

                    'right' => [
                        'title' =>  esc_html__( 'Right', 'design' ),
                        'icon'  =>  'eicon-text-align-right',
                    ],

                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'design' ),
                        'icon'  =>  'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .element-about-text' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     =>  __( 'Color', 'design' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-about-text__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __( 'Typography', 'design' ),
                'selector' => '{{WRAPPER}} .element-about-text__title',
            ]
        );

        $this->end_controls_section();

        // Style Heading
        $this->start_controls_section(
            'style_description',
            [
                'label' => esc_html__( 'Description', 'design' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     =>  __( 'Color', 'design' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-about-text__description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Typography', 'design' ),
                'selector' => '{{WRAPPER}} .element-about-text__description',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <div class="element-about-text">
            <h2 class="element-about-text__title">
                <?php echo wp_kses_post( $settings['heading'] ); ?>
            </h2>

            <?php if ( !empty( $settings['description'] ) ) : ?>

                <div class="element-about-text__description">
                    <?php echo wp_kses_post( $settings['description'] ); ?>
                </div>

            <?php endif; ?>
        </div>

        <?php

    }

    protected function _content_template() {

        ?>
        <div class="element-about-text">
            <h2 class="element-about-text__title">
                {{{ settings.heading }}}
            </h2>

            <# if ( '' !== settings.description ) {#>

            <div class="element-about-text__description">
                {{{ settings.description }}}
            </div>

            <# } #>
        </div>

        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new design_widget_about_text );