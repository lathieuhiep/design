<?php
const apiNamespace = 'wp/v2';

// Get Menu
require get_parent_theme_file_path( '/api/menu.php' );

// api query post type
require get_parent_theme_file_path( '/api/post-type/course.php' );
require get_parent_theme_file_path( '/api/post-type/testimonial.php' );
require get_parent_theme_file_path( '/api/post-type/student-product.php' );