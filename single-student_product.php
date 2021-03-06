<?php
get_header();

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );

$contact_from = get_theme_mod('design_opt_single_student_product_contact', '');
?>

    <div class="site-single-course site-single-my-product">
        <div class="element-section pt-2 pb-5">
            <div class="container custom-container">
                <?php
                get_template_part('template-parts/student-product/inc','gallery');

                if ( $contact_from ) :
                ?>

                    <div class="element-btn-modal-form mt-5">
                        <div class="btn-box text-center">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#register-course">
                                <span><?php esc_html_e('Đăng kí học ngay', 'design'); ?></span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                <?php endif; ?>
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

<?php if ( $contact_from ) :?>

    <div class="modal fade modal-theme modal-course" id="register-course" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header__left">
                        <h5 class="modal-title">
                            <?php esc_html_e('Đăng kí học ngay', 'design'); ?>
                        </h5>

                        <div class="note">
                            <span class="note__label"><?php esc_html_e('Lưu ý:', 'design'); ?></span>

                            <span class="note__text"><?php esc_html_e('Tất cả các lịch học đều được học vào buổi tối', 'design'); ?></span>
                        </div>
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

<?php
endif;

get_footer();