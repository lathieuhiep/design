<?php
get_header();

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

    <div class="site-single-course site-single-my-product">
        <div class="element-section pt-2 pb-5">
            <div class="container custom-container">
                <?php get_template_part('template-parts/student-product/inc','gallery'); ?>
            </div>
        </div>

        <div class="element-has-background element-section">
            <div class="container">
                <?php get_template_part('template-parts/course/inc','student-products'); ?>
            </div>
        </div>

        <div class="element-section">
            <div class="container">
                <?php get_template_part( 'template-parts/option/inc', 'rule' ); ?>
            </div>
        </div>
    </div>

<?php
get_footer();