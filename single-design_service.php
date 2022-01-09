<?php
get_header();

global $design_options;

$shortcode_contact_form = $design_options['design_opt_service_single_select_contact'];

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

	<div class="site-single-course">
        <div class="container">
            <div class="entry-content">
	            <?php
	            while ( have_posts() ) :
		            the_post() ;

		            the_content();
		            design_link_page();

	            endwhile;
	            ?>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#get-quote">
                <?php esc_html_e('Đăng ký Nhận báo giá ngay', 'design'); ?>
            </button>
        </div>
	</div>

    <!-- Modal -->
    <div class="modal fade modal-theme" id="get-quote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
	                    <?php esc_html_e('Đăng ký Nhận báo giá', 'design'); ?>
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php echo do_shortcode('[contact-form-7 id="'. $shortcode_contact_form .'"]'); ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();