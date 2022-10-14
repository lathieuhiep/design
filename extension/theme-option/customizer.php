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
		'title'    => esc_html__( 'Theme Options', Text_Domain ),
	]
);

/*
 * Section General
 * */
new Section(
	'design_opt_section_general',
	[
		'title'    => esc_html__( 'General', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Favicon
new Image(
	[
		'settings' => 'design_opt_favicon',
		'label'    => esc_html__( 'Upload Image Favicon', Text_Domain ),
		'section'  => 'design_opt_section_general',
		'default'  => '',
	]
);

// Field Upload Logo
new Image(
	[
		'settings' => 'design_opt_image_logo',
		'label'    => esc_html__( 'Upload Image Logo', Text_Domain ),
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
		'label'           => esc_html__( 'Set width / height Logo', Text_Domain ),
		'description'     => esc_html__( 'width: 100px, height: 100px', Text_Domain ),
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
		'label'    => esc_html__( 'Show Loading', Text_Domain ),
		'section'  => 'design_opt_section_general',
		'default'  => 'off',
		'choices'  => [
			'on'  => esc_html__( 'Show', Text_Domain ),
			'off' => esc_html__( 'Hide', Text_Domain ),
		],
	]
);

// Field upload image loading
new Image(
	[
		'settings'        => 'design_opt_image_loading',
		'label'           => esc_html__( 'Upload Image Loading', Text_Domain ),
		'section'         => 'design_opt_section_general',
		'description'     => esc_html__( 'Upload image .gif', Text_Domain ),
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
		'label'    => esc_html__( 'Show Back To Top', Text_Domain ),
		'section'  => 'design_opt_section_general',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Show', Text_Domain ),
			'off' => esc_html__( 'Hide', Text_Domain ),
		],
	]
);

// Field content modal footer contact
new Editor(
    [
        'settings'    => 'design_opt_content_modal_footer_contact',
        'label'       => esc_html__( 'Content Modal Footer Contact', Text_Domain ),
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
        'title'    => esc_html__( 'Header', Text_Domain ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field Text Alert Header
new Text(
    [
        'settings' => 'design_opt_alert_text',
        'label'    => esc_html__( 'Alert', Text_Domain ),
        'section'  => 'design_opt_section_header',
        'default'  => esc_html__( 'Giảm 5% khi đăng ký học 2 người  -  Giảm 5% khi đăng ký 2 khóa học', Text_Domain ),
        'priority' => 10,
    ]
);

// Field Support
new Select(
    [
        'settings'    => 'design_opt_support',
        'label'       => esc_html__( 'Support', Text_Domain ),
        'section'     => 'design_opt_section_header',
        'default'     => '',
        'placeholder' => esc_html__( 'Choose an option', Text_Domain ),
        'choices'     => design_get_form_cf7(),
    ]
);

/*
 * Section Menu
 * */
new Section(
	'design_opt_section_menu',
	[
		'title'    => esc_html__( 'Menu', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Show Sticky Menu
new Radio_Buttonset(
	[
		'settings' => 'design_opt_sticky_menu',
		'label'    => esc_html__( 'Sticky menu', Text_Domain ),
		'section'  => 'design_opt_section_menu',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Yes', Text_Domain ),
			'off' => esc_html__( 'No', Text_Domain ),
		],
	]
);

/*
 * Section Contact Us
 * */
new Section(
	'design_opt_section_contact_us',
	[
		'title'    => esc_html__( 'Contact us', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Show Contact Us
new Radio_Buttonset(
	[
		'settings' => 'design_opt_show_contact_us',
		'label'    => esc_html__( 'Show Contact Us', Text_Domain ),
		'section'  => 'design_opt_section_contact_us',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', Text_Domain ),
			'hide' => esc_html__( 'Hide', Text_Domain ),
		],
	]
);

// Field Link FanPage
new URL(
    [
        'settings' => 'design_opt_contact_us_fanpage',
        'label'    => esc_html__( 'Link Fanpage', Text_Domain ),
        'section'  => 'design_opt_section_contact_us',
        'default'  => 'https://www.facebook.com/khoahocuxui',
    ]
);

// Field Phone Contact
new Repeater(
    [
        'settings' => 'design_opt_contact_us_phone',
        'label'    => esc_html__( 'Phone', Text_Domain ),
        'section'  => 'design_opt_section_contact_us',
        'row_label'    => [
            'type'  => 'field',
            'value' => esc_html__( 'phone', Text_Domain ),
            'field' => 'text',
        ],
        'default'  => [
            [
                'text'   => esc_html__( 'Phone 1', Text_Domain ),
                'phone'    => '0911321300',
            ],

            [
                'text'   => esc_html__( 'Phone 2', Text_Domain ),
                'phone'    => '0975458209',
            ],
        ],
        'fields'   => [
            'text'   => [
                'type'        => 'text',
                'label'       => esc_html__( 'Text', Text_Domain ),
                'default'     => '',
            ],

            'phone'    => [
                'type'        => 'text',
                'label'       => esc_html__( 'Phone', Text_Domain ),
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
        'title'    => esc_html__( 'Rule', Text_Domain ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field Upload Image
new Image(
    [
        'settings' => 'design_opt_rule_image',
        'label'    => esc_html__( 'Upload Image', Text_Domain ),
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
        'label'       => esc_html__( 'Content', Text_Domain ),
        'section'     => 'design_opt_section_rule',
        'default'     => '',
    ]
);

// Field Contact
new Editor(
    [
        'settings'    => 'design_opt_rule_contact',
        'label'       => esc_html__( 'Contact', Text_Domain ),
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
        'title'    => esc_html__( 'Chat', Text_Domain ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field chat zalo
new Text(
    [
        'settings' => 'design_opt_chat_zalo',
        'label'    => esc_html__( 'Phone Zalo', Text_Domain ),
        'section'  => 'design_opt_chat',
        'default'  => esc_html__( '0911321300' ),
    ]
);

// Field Api Chat Facebook
new Code(
    [
        'settings'    => 'design_opt_chat_facebook',
        'label'       => esc_html__( 'Api Chat Facebook', Text_Domain ),
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
        'title'       => esc_html__( 'Testimonial', Text_Domain ),
        'panel'       => 'design_opt_panel',
        'priority'    => 10,
    ]
);

// Field Testimonial List
new Repeater(
    [
        'settings'  => 'design_opt_section_testimonial_list',
        'label'     => esc_html__( 'Create Testimonial', Text_Domain ),
        'section'   => 'design_opt_section_testimonial',
        'row_label' => array(
            'type'  => 'field',
            'value' => esc_html__( 'testimonial', Text_Domain ),
            'field' => 'name',
        ),
        'default'   => design_default_customizer_repeater('testimonial'),
        'fields'    => [
            'name'  => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', Text_Domain ),
                'default'     => '',
            ],

            'course'  => [
                'type'        => 'text',
                'label'       => esc_html__( 'Course', Text_Domain ),
                'default'     => '',
            ],

            'avatar'       => [
                'type'    => 'image',
                'label'   => esc_html__( 'Avatar', Text_Domain ),
                'default' => '',
                'choices' => [
                    'save_as' => 'id',
                ],
            ],

            'description' => [
                'type'    => 'textarea',
                'label'   => esc_html__( 'Comment', Text_Domain ),
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
		'title'       => esc_html__( 'Blog Post', Text_Domain ),
		'panel'       => 'design_opt_panel',
		'description' => esc_html__( 'Use for archive, index, page search', Text_Domain ),
		'priority'    => 10,
	]
);

// Field Sidebar Blog Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_sidebar_blog_post',
		'label'    => esc_html__( 'Blog Sidebar', Text_Domain ),
		'section'  => 'design_opt_section_blog_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', Text_Domain ),
			'left'  => esc_html__( 'Left', Text_Domain ),
			'right' => esc_html__( 'Right', Text_Domain ),
		],
	]
);

// Field Blog Per Row
new Radio_Buttonset(
	[
		'settings' => 'design_opt_per_row_blog_post',
		'label'    => esc_html__( 'Blog Per Row', Text_Domain ),
		'section'  => 'design_opt_section_blog_post',
		'default'  => '3',
		'choices'  => [
			'2' => esc_html__( '2 Column', Text_Domain ),
			'3' => esc_html__( '3 Column', Text_Domain ),
			'4' => esc_html__( '4 Column', Text_Domain ),
		],
	]
);

/*
 * Section Single Post
 * */
new Section(
	'design_opt_section_single_post',
	[
		'title'    => esc_html__( 'Single Post', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Single Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_sidebar_single_post',
		'label'    => esc_html__( 'Single Sidebar', Text_Domain ),
		'section'  => 'design_opt_section_single_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', Text_Domain ),
			'left'  => esc_html__( 'Left', Text_Domain ),
			'right' => esc_html__( 'Right', Text_Domain ),
		],
	]
);

// Field Show Share Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_share_single_post',
		'label'    => esc_html__( 'Show Share Post', Text_Domain ),
		'section'  => 'design_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', Text_Domain ),
			'hide' => esc_html__( 'Hide', Text_Domain ),
		],
	]
);

// Field Show Related Post
new Radio_Buttonset(
	[
		'settings' => 'design_opt_related_single_post',
		'label'    => esc_html__( 'Show Related Post', Text_Domain ),
		'section'  => 'design_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', Text_Domain ),
			'hide' => esc_html__( 'Hide', Text_Domain ),
		],
	]
);

// Field Show Related Post Limit
new Slider(
	[
		'settings' => 'design_opt_related_limit_single_post',
		'label'    => esc_html__( 'Related Post Limit', Text_Domain ),
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
        'title'    => esc_html__( 'Course', Text_Domain ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field course select contact form
new Select(
    [
        'settings'    => 'design_opt_course_select_contact',
        'label'       => esc_html__( 'Select Contact Form', Text_Domain ),
        'section'     => 'design_opt_course',
        'default'     => '',
        'choices'     => design_get_form_cf7(),
    ]
);

// Field Course Rule
new Editor(
    [
        'settings'    => 'design_opt_course_rule_editor',
        'label'       => esc_html__( 'Note', Text_Domain ),
        'section'     => 'design_opt_course',
        'default'     => '',
    ]
);

new Code(
    [
        'settings'    => 'design_opt_course_bank_account_1',
        'label'       => esc_html__( 'Bank 1', Text_Domain ),
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
        'label'       => esc_html__( 'Bank 2', Text_Domain ),
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
        'title'    => esc_html__( 'Single Student Product', Text_Domain ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field select contact form
new Select(
    [
        'settings'    => 'design_opt_single_student_product_contact',
        'label'       => esc_html__( 'Select Contact Form', Text_Domain ),
        'section'     => 'design_opt_single_student_product',
        'default'     => '',
        'choices'     => design_get_form_cf7(),
    ]
);

/*
 * Section Single My Product
 * */
new Section(
    'design_opt_single_my_product',
    [
        'title'    => esc_html__( 'Single My Product', Text_Domain ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field select contact form
new Select(
    [
        'settings'    => 'design_opt_single_my_product_contact',
        'label'       => esc_html__( 'Select Contact Form', Text_Domain ),
        'section'     => 'design_opt_single_my_product',
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
        'title'    => esc_html__( 'Single Service', Text_Domain ),
        'panel'    => 'design_opt_panel',
        'priority' => 10,
    ]
);

// Field select contact form
new Select(
    [
        'settings'    => 'design_opt_service_single_select_contact',
        'label'       => esc_html__( 'Select Contact Form', Text_Domain ),
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
		'title'    => esc_html__( 'Social Network', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Social List
new Repeater(
	[
		'settings'  => 'design_opt_social_list',
		'label'     => esc_html__( 'Create Social Links', Text_Domain ),
		'section'   => 'design_opt_section_social_network',
		'tooltip'   => esc_html__( 'Use Font Awesome Free 6', Text_Domain ),
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__( 'Social link', Text_Domain ),
			'field' => 'title',
		),
		'default'   => [
			[
				'title'  => esc_html__( 'Facebook', Text_Domain ),
				'icon'   => 'fab fa-facebook-f',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Youtube', Text_Domain ),
				'icon'   => 'fab fa-youtube',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Twitter', Text_Domain ),
				'icon'   => 'fab fa-twitter',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Instagram', Text_Domain ),
				'icon'   => 'fab fa-instagram',
				'url'    => '#',
				'target' => '_blank',
			],
		],
		'fields'    => [
			'title'  => [
				'type'        => 'text',
				'label'       => esc_html__( 'Title', Text_Domain ),
				'description' => esc_html__( 'Ex: Facebook', Text_Domain ),
				'default'     => '',
			],
			'icon'   => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Name', Text_Domain ),
				'description' => esc_html__( 'Font Awesome icons. Ex: fab fa-facebook-f', Text_Domain ) . ' <a href="https://fontawesome.com/search" target="_blank"><strong>' . esc_html__( 'View All', Text_Domain ) . ' </strong></a>',
				'default'     => '',
			),
			'url'    => [
				'type'    => 'url',
				'label'   => esc_html__( 'Link URL', Text_Domain ),
				'default' => '#',
			],
			'target' => [
				'type'    => 'select',
				'label'   => esc_html__( 'Link Target', Text_Domain ),
				'default' => '_blank',
				'choices' => [
					'_blank' => esc_html__( 'New Window', Text_Domain ),
					'_self'  => esc_html__( 'Same Frame', Text_Domain ),
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
		'title'    => esc_html__( 'Footer', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Footer
new Select(
	[
		'settings'    => 'design_opt_column_footer',
		'label'       => esc_html__( 'Number of Footer Columns', Text_Domain ),
		'section'     => 'design_opt_section_footer',
		'default'     => 'column-4',
		'placeholder' => esc_html__( 'Choose an option', Text_Domain ),
		'choices'     => [
			'column-0' => esc_html__( 'Hide Column', Text_Domain ),
			'column-1' => esc_html__( '1', Text_Domain ),
			'column-2' => esc_html__( '2', Text_Domain ),
			'column-3' => esc_html__( '3', Text_Domain ),
			'column-4' => esc_html__( '4', Text_Domain ),
		],
	]
);

// Field Footer Width Column 1
new Slider(
	[
		'settings'        => 'design_opt_column_width_footer_1',
		'label'           => esc_html__( 'Column width 1', Text_Domain ),
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
		'label'           => esc_html__( 'Column width 2', Text_Domain ),
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
		'label'           => esc_html__( 'Column width 3', Text_Domain ),
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
		'label'           => esc_html__( 'Column width 4', Text_Domain ),
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
		'title'    => esc_html__( 'Copyright', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Show copyright
new Radio_Buttonset(
	[
		'settings' => 'design_opt_show_copyright',
		'label'    => esc_html__( 'Show Copyright', Text_Domain ),
		'section'  => 'design_opt_section_copyright',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', Text_Domain ),
			'hide' => esc_html__( 'Hide', Text_Domain ),
		],
	]
);

// Field Content Copyright
new Editor(
	[
		'settings' => 'design_opt_content_copyright',
		'label'    => esc_html__( 'Content', Text_Domain ),
		'section'  => 'design_opt_section_copyright',
		'default'  => esc_html__( 'Copyright &amp; DiepLK', Text_Domain ),
	]
);

/*
 * Section Typography
 * */
new Section(
	'design_opt_section_typography',
	[
		'title'    => esc_html__( 'Typography', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Typography
new Typography(
	[
		'settings'  => 'design_opt_typography',
		'label'     => esc_html__( 'Body', Text_Domain ),
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
		'title'    => esc_html__( '404 Options', Text_Domain ),
		'panel'    => 'design_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Image 404
new Image(
	[
		'settings' => 'design_opt_image_404',
		'label'    => esc_html__( 'Upload Image', Text_Domain ),
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
		'label'    => esc_html__( 'Title', Text_Domain ),
		'section'  => 'design_opt_section_404',
		'default'  => esc_html__( 'Awww...Do Not Cry', Text_Domain ),
	]
);

// Field Content 404
new Editor(
	[
		'settings' => 'design_opt_content_404',
		'label'    => esc_html__( 'Content', Text_Domain ),
		'section'  => 'design_opt_section_404',
		'default'  => esc_html__( 'It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', Text_Domain ),
	]
);