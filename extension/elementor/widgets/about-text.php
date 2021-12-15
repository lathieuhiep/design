<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class getDesign_widget_about_text extends Widget_Base {

    public function get_categories() {
        return array( 'getDesign_widgets' );
    }

    public function get_name() {
        return 'getdesign-about-text';
    }

    public function get_title() {
        return esc_html__( 'About Text', 'getdesign' );
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    protected function _register_controls() {

        // Content heading
        $this->start_controls_section(
            'content_heading',
            [
                'label' => __( 'Heading', 'getdesign' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'getdesign' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Heading About Text', 'getdesign' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

        // Content description
        $this->start_controls_section(
            'content_description',
            [
                'label' => __( 'description', 'getdesign' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     =>  esc_html__( 'Description', 'getdesign' ),
                'type'      =>  Controls_Manager::WYSIWYG,
                'default'   =>  esc_html__( 'Default description', 'getdesign' ),
            ]
        );

        $this->end_controls_section();

        // Style Heading
        $this->start_controls_section(
            'style_heading',
            [
                'label' => esc_html__( 'Heading', 'getdesign' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'align',
            [
                'label'     =>  esc_html__( 'Alignment Title', 'getdesign' ),
                'type'      =>  Controls_Manager::CHOOSE,
                'options'   =>  [
                    'left'  =>  [
                        'title' =>  esc_html__( 'Left', 'getdesign' ),
                        'icon'  =>  'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' =>  esc_html__( 'Center', 'getdesign' ),
                        'icon'  =>  'eicon-text-align-center',
                    ],

                    'right' => [
                        'title' =>  esc_html__( 'Right', 'getdesign' ),
                        'icon'  =>  'eicon-text-align-right',
                    ],

                    'justify'=> [
                        'title' =>  esc_html__( 'Justified', 'getdesign' ),
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
                'label'     =>  __( 'Color', 'getdesign' ),
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
                'label' => __( 'Typography', 'getdesign' ),
                'selector' => '{{WRAPPER}} .element-about-text__title',
            ]
        );

        $this->end_controls_section();

        // Style Heading
        $this->start_controls_section(
            'style_description',
            [
                'label' => esc_html__( 'Description', 'getdesign' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     =>  __( 'Color', 'getdesign' ),
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
                'label' => __( 'Typography', 'getdesign' ),
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

Plugin::instance()->widgets_manager->register_widget_type( new getDesign_widget_about_text );