<?php
get_header();

$getDesign_check_elementor =   get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

$getDesign_class_elementor =   '';

if ( $getDesign_check_elementor ) :
    $getDesign_class_elementor =   ' site-container-elementor';
endif;
?>

    <main class="site-container<?php echo esc_attr( $getDesign_class_elementor ); ?>">
        <?php
        if ( $getDesign_check_elementor ) :
            get_template_part('template-parts/page/content','page-elementor');
        else:
            get_template_part('template-parts/page/content','page');
        endif;
        ?>
    </main>

<?php 

get_footer();