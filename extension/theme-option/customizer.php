<?php
/*
 * Customize
 * */

use Kirki\Field\Code;
use Kirki\Field\Dimensions;
use Kirki\Field\Editor;
use Kirki\Field\Image;
use Kirki\Field\Radio_Buttonset;
use Kirki\Field\Repeater;
use Kirki\Field\Select;
use Kirki\Field\Slider;
use Kirki\Field\Text;
use Kirki\Field\Typography;
use Kirki\Field\URL;
use Kirki\Panel;
use Kirki\Section;

// Panel Theme Options
new Panel(
	'design_opt_panel',
	[
		'priority' => 10,
		'title'    => esc_html__( 'Theme Options', 'design' ),
	]
);

/*
 * Section General
 * */
new Section(
	'design_opt_section_general',
	[
		'title'    => esc_html__( 'General', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Favicon
new Image(
	[
		'settings' => 'design_opt_favicon',
		'label'    => esc_html__( 'Upload Image Favicon', 'design' ),
		'section'  => 'design_opt_section_general',
		'default'  => '',
	]
);

// Field Upload Logo
new Image(
	[
		'settings' => 'design_opt_image_logo',
		'label'    => esc_html__( 'Upload Image Logo', 'design' ),
		'section'  => 'design_opt_section_general',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Set Width Height Logo
new Dimensions(
	[
		'settings'        => 'design_opt_size_logo',
		'label'           => esc_html__( 'Set width / height Logo', 'design' ),
		'description'     => esc_html__( 'width: 100px, height: 100px', 'design' ),
		'section'         => 'design_opt_section_general',
		'default'         => [
			'width'  => '',
			'height' => '',
		],
		'output'          => array(
			array(
				'element' => '.site-logo img'
			),
		),
		'active_callback' => [
			[
				'setting'  => 'design_opt_image_logo',
				'operator' => '!=',
				'value'    => '',
			]
		],
	]
);

// Field show loading
new Radio_Buttonset(
	[
		'settings' => 'design_opt_show_loading',
		'label'    => esc_html__( 'Show Loading', 'design' ),
		'section'  => 'design_opt_section_general',
		'default'  => 'off',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'design' ),
			'off' => esc_html__( 'Hide', 'design' ),
		],
	]
);

// Field upload image loading
new Image(
	[
		'settings'        => 'design_opt_image_loading',
		'label'           => esc_html__( 'Upload Image Loading', 'design' ),
		'section'         => 'design_opt_section_general',
		'description'     => esc_html__( 'Upload image .gif', 'design' ),
		'default'         => '',
		'active_callback' => [
			[
				'setting'  => 'design_opt_show_loading',
				'operator' => '===',
				'value'    => 'on',
			]
		]
	]
);

// Field show back to top
new Radio_Buttonset(
	[
		'settings' => 'design_opt_back_to_top',
		'label'    => esc_html__( 'Show Back To Top', 'design' ),
		'section'  => 'design_opt_section_general',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'design' ),
			'off' => esc_html__( 'Hide', 'design' ),
		],
	]
);

// Field content modal footer contact
new Editor(
    [
        'settings'    => 'design_opt_content_modal_footer_contact',
        'label'       => esc_html__( 'Content Modal Footer Contact', 'design' ),
        'section'     => 'design_opt_section_general',
        'default'     => '',
    ]
);

/*
 * Section Header
 * */
new Section(
    'design_opt_section_header',
    [
        'title'    => esc_html__( 'Header', 'design' ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field Text Alert Header
new Text(
    [
        'settings' => 'design_opt_alert_text',
        'label'    => esc_html__( 'Alert', 'design' ),
        'section'  => 'design_opt_section_header',
        'default'  => esc_html__( 'Giảm 5% khi đăng ký học 2 người  -  Giảm 5% khi đăng ký 2 khóa học', 'design' ),
        'priority' => 10,
    ]
);

// Field Support
new Select(
    [
        'settings'    => 'design_opt_support',
        'label'       => esc_html__( 'Support', 'design' ),
        'section'     => 'design_opt_section_header',
        'default'     => '',
        'placeholder' => esc_html__( 'Choose an option', 'design' ),
        'choices'     => design_get_form_cf7(),
    ]
);

/*
 * Section Menu
 * */
new Section(
	'design_opt_section_menu',
	[
		'title'    => esc_html__( 'Menu', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Show Sticky Menu
new Radio_Buttonset(
	[
		'settings' => 'design_opt_sticky_menu',
		'label'    => esc_html__( 'Sticky menu', 'design' ),
		'section'  => 'design_opt_section_menu',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Yes', 'design' ),
			'off' => esc_html__( 'No', 'design' ),
		],
	]
);

/*
 * Section Contact Us
 * */
new Section(
	'design_opt_section_contact_us',
	[
		'title'    => esc_html__( 'Contact us', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Show Contact Us
new Radio_Buttonset(
	[
		'settings' => 'design_opt_show_contact_us',
		'label'    => esc_html__( 'Show Contact Us', 'design' ),
		'section'  => 'design_opt_section_contact_us',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'design' ),
			'hide' => esc_html__( 'Hide', 'design' ),
		],
	]
);

// Field Link FanPage
new URL(
    [
        'settings' => 'design_opt_contact_us_fanpage',
        'label'    => esc_html__( 'Link Fanpage', 'design' ),
        'section'  => 'design_opt_section_contact_us',
        'default'  => 'https://www.facebook.com/khoahocuxui',
    ]
);

// Field Phone Contact
new Repeater(
    [
        'settings' => 'design_opt_contact_us_phone',
        'label'    => esc_html__( 'Phone', 'design' ),
        'section'  => 'design_opt_section_contact_us',
        'row_label'    => [
            'type'  => 'field',
            'value' => esc_html__( 'phone', 'design' ),
            'field' => 'text',
        ],
        'default'  => [
            [
                'text'   => esc_html__( 'Phone 1', 'design' ),
                'phone'    => '0911321300',
            ],

            [
                'text'   => esc_html__( 'Phone 2', 'design' ),
                'phone'    => '0975458209',
            ],
        ],
        'fields'   => [
            'text'   => [
                'type'        => 'text',
                'label'       => esc_html__( 'Text', 'design' ),
                'default'     => '',
            ],

            'phone'    => [
                'type'        => 'text',
                'label'       => esc_html__( 'Phone', 'design' ),
                'default'     => '',
            ],
        ],
    ]
);

/*
 * Section Rule
 * */
new Section(
    'design_opt_section_rule',
    [
        'title'    => esc_html__( 'Rule', 'design' ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field Upload Image
new Image(
    [
        'settings' => 'design_opt_rule_image',
        'label'    => esc_html__( 'Upload Image', 'design' ),
        'section'  => 'design_opt_section_rule',
        'default'  => '',
        'choices'  => [
            'save_as' => 'id',
        ],
    ]
);

// Field Content
new Editor(
    [
        'settings'    => 'design_opt_rule_content',
        'label'       => esc_html__( 'Content', 'design' ),
        'section'     => 'design_opt_section_rule',
        'default'     => '',
    ]
);

// Field Contact
new Editor(
    [
        'settings'    => 'design_opt_rule_contact',
        'label'       => esc_html__( 'Contact', 'design' ),
        'section'     => 'design_opt_section_rule',
        'default'     => '',
    ]
);

/*
 * Section Chat
 * */
new Section(
    'design_opt_chat',
    [
        'title'    => esc_html__( 'Chat', 'design' ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field chat zalo
new Text(
    [
        'settings' => 'design_opt_chat_zalo',
        'label'    => esc_html__( 'Phone Zalo', 'design' ),
        'section'  => 'design_opt_chat',
        'default'  => esc_html__( '0911321300' ),
    ]
);

// Field Api Chat Facebook
new Code(
    [
        'settings'    => 'design_opt_chat_facebook',
        'label'       => esc_html__( 'Api Chat Facebook', 'design' ),
        'section'     => 'design_opt_chat',
        'default'     => '',
        'choices'     => [
            'language' => 'JS',
        ],
    ]
);

/*
 * Section Testimonial
 * */
new Section(
    'design_opt_section_testimonial',
    [
        'title'       => esc_html__( 'Testimonial', 'design' ),
        'panel'       => 'design_opt_panel',
        'priority'    => 10,
    ]
);

// Field Testimonial List
new Repeater(
    [
        'settings'  => 'design_opt_section_testimonial_list',
        'label'     => esc_html__( 'Create Testimonial', 'design' ),
        'section'   => 'design_opt_section_testimonial',
        'row_label' => array(
            'type'  => 'field',
            'value' => esc_html__( 'testimonial', 'design' ),
            'field' => 'name',
        ),
        'default'   => design_default_customizer_repeater('testimonial'),
        'fields'    => [
            'name'  => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', 'design' ),
                'default'     => '',
            ],

            'course'  => [
                'type'        => 'text',
                'label'       => esc_html__( 'Course', 'design' ),
                'default'     => '',
            ],

            'avatar'       => [
                'type'    => 'image',
                'label'   => esc_html__( 'Avatar', 'design' ),
                'default' => '',
                'choices' => [
                    'save_as' => 'id',
                ],
            ],

            'description' => [
                'type'    => 'textarea',
                'label'   => esc_html__( 'Comment', 'design' ),
                'default' => '',
            ],
        ],
    ]
);


/*
 * Section Blog Post
 * */
new Section(
	'design_opt_section_blog_post',
	[
		'title'       => esc_html__( 'Blog Post', 'design' ),
		'panel'       => 'design_opt_panel',
		'description' => esc_html__( 'Use for archive, index, page search', 'design' ),
		'priority'    => 10,
	]
);

// Field Sidebar Blog Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_sidebar_blog_post',
		'label'    => esc_html__( 'Blog Sidebar', 'design' ),
		'section'  => 'design_opt_section_blog_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'design' ),
			'left'  => esc_html__( 'Left', 'design' ),
			'right' => esc_html__( 'Right', 'design' ),
		],
	]
);

// Field Blog Per Row
new Radio_Buttonset(
	[
		'settings' => 'design_opt_per_row_blog_post',
		'label'    => esc_html__( 'Blog Per Row', 'design' ),
		'section'  => 'design_opt_section_blog_post',
		'default'  => '3',
		'choices'  => [
			'2' => esc_html__( '2 Column', 'design' ),
			'3' => esc_html__( '3 Column', 'design' ),
			'4' => esc_html__( '4 Column', 'design' ),
		],
	]
);

/*
 * Section Single Post
 * */
new Section(
	'design_opt_section_single_post',
	[
		'title'    => esc_html__( 'Single Post', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Single Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_sidebar_single_post',
		'label'    => esc_html__( 'Single Sidebar', 'design' ),
		'section'  => 'design_opt_section_single_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'design' ),
			'left'  => esc_html__( 'Left', 'design' ),
			'right' => esc_html__( 'Right', 'design' ),
		],
	]
);

// Field Show Share Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_share_single_post',
		'label'    => esc_html__( 'Show Share Post', 'design' ),
		'section'  => 'design_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'design' ),
			'hide' => esc_html__( 'Hide', 'design' ),
		],
	]
);

// Field Show Related Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_related_single_post',
		'label'    => esc_html__( 'Show Related Post', 'design' ),
		'section'  => 'design_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'design' ),
			'hide' => esc_html__( 'Hide', 'design' ),
		],
	]
);

// Field Show Related Post Limit
new Slider(
	[
		'settings' => 'design_opt_related_limit_single_post',
		'label'    => esc_html__( 'Related Post Limit', 'design' ),
		'section'  => 'design_opt_section_single_post',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		],
	]
);

/*
 * Section Course
 * */
new Section(
    'design_opt_course',
    [
        'title'    => esc_html__( 'Course', 'design' ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field course select contact form
new Select(
    [
        'settings'    => 'design_opt_course_select_contact',
        'label'       => esc_html__( 'Select Contact Form', 'design' ),
        'section'     => 'design_opt_course',
        'default'     => '',
        'choices'     => design_get_form_cf7(),
    ]
);

// Field Course Rule
new Editor(
    [
        'settings'    => 'design_opt_course_rule_editor',
        'label'       => esc_html__( 'Note', 'design' ),
        'section'     => 'design_opt_course',
        'default'     => '',
    ]
);

new Code(
    [
        'settings'    => 'design_opt_course_bank_account_1',
        'label'       => esc_html__( 'Bank 1', 'design' ),
        'section'     => 'design_opt_course',
        'default'     => '',
        'choices'     => [
            'language' => 'HTML',
        ],
    ]
);

new Code(
    [
        'settings'    => 'design_opt_course_bank_account_2',
        'label'       => esc_html__( 'Bank 2', 'design' ),
        'section'     => 'design_opt_course',
        'default'     => '',
        'choices'     => [
            'language' => 'HTML',
        ],
    ]
);

/*
 * Section Single Student Product
 * */
new Section(
    'design_opt_single_student_product',
    [
        'title'    => esc_html__( 'Single Student Product', 'design' ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field select contact form
new Select(
    [
        'settings'    => 'design_opt_single_student_product_contact',
        'label'       => esc_html__( 'Select Contact Form', 'design' ),
        'section'     => 'design_opt_single_student_product',
        'default'     => '',
        'choices'     => design_get_form_cf7(),
    ]
);

/*
 * Section Single Service
 * */
new Section(
    'design_opt_service_single',
    [
        'title'    => esc_html__( 'Single Service', 'design' ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field select contact form
new Select(
    [
        'settings'    => 'design_opt_service_single_select_contact',
        'label'       => esc_html__( 'Select Contact Form', 'design' ),
        'section'     => 'design_opt_service_single',
        'default'     => '',
        'choices'     => design_get_form_cf7(),
    ]
);

/*
 * Section Social Network
 * */
new Section(
	'design_opt_section_social_network',
	[
		'title'    => esc_html__( 'Social Network', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Social List
new Repeater(
	[
		'settings'  => 'design_opt_social_list',
		'label'     => esc_html__( 'Create Social Links', 'design' ),
		'section'   => 'design_opt_section_social_network',
		'tooltip'   => esc_html__( 'Use Font Awesome Free 6', 'design' ),
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__( 'Social link', 'design' ),
			'field' => 'title',
		),
		'default'   => [
			[
				'title'  => esc_html__( 'Facebook', 'design' ),
				'icon'   => 'fab fa-facebook-f',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Youtube', 'design' ),
				'icon'   => 'fab fa-youtube',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Twitter', 'design' ),
				'icon'   => 'fab fa-twitter',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Instagram', 'design' ),
				'icon'   => 'fab fa-instagram',
				'url'    => '#',
				'target' => '_blank',
			],
		],
		'fields'    => [
			'title'  => [
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'design' ),
				'description' => esc_html__( 'Ex: Facebook', 'design' ),
				'default'     => '',
			],
			'icon'   => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Name', 'design' ),
				'description' => esc_html__( 'Font Awesome icons. Ex: fab fa-facebook-f', 'design' ) . ' <a href="https://fontawesome.com/search" target="_blank"><strong>' . esc_html__( 'View All', 'design' ) . ' </strong></a>',
				'default'     => '',
			),
			'url'    => [
				'type'    => 'url',
				'label'   => esc_html__( 'Link URL', 'design' ),
				'default' => '#',
			],
			'target' => [
				'type'    => 'select',
				'label'   => esc_html__( 'Link Target', 'design' ),
				'default' => '_blank',
				'choices' => [
					'_blank' => esc_html__( 'New Window', 'design' ),
					'_self'  => esc_html__( 'Same Frame', 'design' ),
				],
			],
		],
	]
);

/*
 * Section Footer
 * */
new Section(
	'design_opt_section_footer',
	[
		'title'    => esc_html__( 'Footer', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Footer
new Select(
	[
		'settings'    => 'design_opt_column_footer',
		'label'       => esc_html__( 'Number of Footer Columns', 'design' ),
		'section'     => 'design_opt_section_footer',
		'default'     => 'column-4',
		'placeholder' => esc_html__( 'Choose an option', 'design' ),
		'choices'     => [
			'column-0' => esc_html__( 'Hide Column', 'design' ),
			'column-1' => esc_html__( '1', 'design' ),
			'column-2' => esc_html__( '2', 'design' ),
			'column-3' => esc_html__( '3', 'design' ),
			'column-4' => esc_html__( '4', 'design' ),
		],
	]
);

// Field Footer Width Column 1
new Slider(
	[
		'settings'        => 'design_opt_column_width_footer_1',
		'label'           => esc_html__( 'Column width 1', 'design' ),
		'section'         => 'design_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			]
		]
	]
);

// Field Footer Width Column 2
new Slider(
	[
		'settings'        => 'design_opt_column_width_footer_2',
		'label'           => esc_html__( 'Column width 2', 'design' ),
		'section'         => 'design_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			]
		]
	]
);

// Field Footer Width Column 3
new Slider(
	[
		'settings'        => 'design_opt_column_width_footer_3',
		'label'           => esc_html__( 'Column width 3', 'design' ),
		'section'         => 'design_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			]
		]
	]
);

// Field Footer Width Column 4
new Slider(
	[
		'settings'        => 'design_opt_column_width_footer_4',
		'label'           => esc_html__( 'Column width 4', 'design' ),
		'section'         => 'design_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			],
			[
				'setting'  => 'design_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-3',
			]
		]
	]
);

/*
 * Section Copyright
 * */
new Section(
	'design_opt_section_copyright',
	[
		'title'    => esc_html__( 'Copyright', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Show copyright
new Radio_Buttonset(
	[
		'settings' => 'design_opt_show_copyright',
		'label'    => esc_html__( 'Show Copyright', 'design' ),
		'section'  => 'design_opt_section_copyright',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'design' ),
			'hide' => esc_html__( 'Hide', 'design' ),
		],
	]
);

// Field Content Copyright
new Editor(
	[
		'settings' => 'design_opt_content_copyright',
		'label'    => esc_html__( 'Content', 'design' ),
		'section'  => 'design_opt_section_copyright',
		'default'  => esc_html__( 'Copyright &amp; DiepLK', 'design' ),
	]
);

/*
 * Section Typography
 * */
new Section(
	'design_opt_section_typography',
	[
		'title'    => esc_html__( 'Typography', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Typography
new Typography(
	[
		'settings'  => 'design_opt_typography',
		'label'     => esc_html__( 'Body', 'design' ),
		'section'   => 'design_opt_section_typography',
		'transport' => 'auto',
		'default'   => [
			'font-family'    => '',
			'variant'        => '',
			'font-style'     => '',
			'color'          => '',
			'font-size'      => '',
			'line-height'    => '',
			'letter-spacing' => '',
		],
		'output'    => [
			[
				'element' => 'body',
			],
		],
	]
);

/*
 * Section 404
 * */
new Section(
	'design_opt_section_404',
	[
		'title'    => esc_html__( '404 Options', 'design' ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Image 404
new Image(
	[
		'settings' => 'design_opt_image_404',
		'label'    => esc_html__( 'Upload Image', 'design' ),
		'section'  => 'design_opt_section_404',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Title 404
new Text(
	[
		'settings' => 'design_opt_title_404',
		'label'    => esc_html__( 'Title', 'design' ),
		'section'  => 'design_opt_section_404',
		'default'  => esc_html__( 'Awww...Do Not Cry', 'design' ),
	]
);

// Field Content 404
new Editor(
	[
		'settings' => 'design_opt_content_404',
		'label'    => esc_html__( 'Content', 'design' ),
		'section'  => 'design_opt_section_404',
		'default'  => esc_html__( 'It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', 'design' ),
	]
);