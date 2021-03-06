<?php
get_header();

$contact_from = get_theme_mod('design_opt_service_single_select_contact', '');

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

	<div class="site-single-course site-single-service">
        <div class="element-section-box pt-2 pb-5">
            <div class="container">
                <div class="box">
                    <div class="box__content">
                        <?php
                        while ( have_posts() ) : the_post() ;
                            the_content();
                        endwhile;
                        ?>
                    </div>

                    <?php if ( $contact_from ) : ?>
                        <div class="element-btn-modal-form mt-5">
                            <div class="btn-box">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#register-course">
                                    <span><?php esc_html_e('Đăng kí nhận báo giá', 'design'); ?></span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="element-has-background element-section">
            <div class="container">
                <?php get_template_part( 'template-parts/inc', 'products'); ?>
            </div>
        </div>
	</div>

<?php if ( $contact_from ) :?>

    <div class="modal fade modal-theme modal-course" id="register-course" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header__left">
                        <h5 class="modal-title">
                            <?php esc_html_e('Đăng kí nhận báo giá', 'design'); ?>
                        </h5>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php echo do_shortcode( '[contact-form-7 id="'.$contact_from.'"]' ); ?>
                </div>

                <div class="modal-footer">
                    <?php design_content_modal_contact_footer(); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php
get_footer();