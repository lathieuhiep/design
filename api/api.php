<?php
// Get Menu
require get_parent_theme_file_path( '/api/menu.php' );

// api options components
require get_parent_theme_file_path( '/api/components/banner.php' );
require get_parent_theme_file_path( '/api/components/abouts.php' );
require get_parent_theme_file_path( '/api/components/science-participants.php' );

// api query post type
require get_parent_theme_file_path( '/api/post-type/course.php' );
require get_parent_theme_file_path( '/api/post-type/testimonial.php' );
require get_parent_theme_file_path( '/api/post-type/student-product.php' );