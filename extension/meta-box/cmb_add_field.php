<?php
// render numbers
add_action( 'cmb2_render_text_number', 'design_cmb_render_text_number', 10, 5 );
function design_cmb_render_text_number( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
    echo $field_type_object->input( array( 'class' => 'regular-text', 'type' => 'number' ) );
}

// sanitize the field
add_filter( 'cmb2_sanitize_text_number', 'design_cmb2_sanitize_text_number', 10, 2 );
function design_cmb2_sanitize_text_number( $null, $new ) {
    return preg_replace( "/[^0-9]/", "", $new );
}