<?php
get_header();

$contact_from = get_theme_mod('design_opt_course_select_contact', '');
?>

<div class="site-single-course">
    <div class="element-has-background">
        <?php get_template_part('template-parts/breadcrumbs/inc','breadcrumbs'); ?>

        <div class="container">
            <?php get_template_part('template-parts/course/inc','nav-image'); ?>

            <div class="content-info">
                <?php
                if ( have_posts() ) :
                    while (have_posts()) : the_post();
                ?>
                    <h1 class="title-post text-center">
                        <?php the_title() ?>
                    </h1>

                    <p class="sub-text text-center">
                        <?php esc_html_e('Cam kết “Học xong làm được việc”.', 'design'); ?>
                    </p>

                    <div class="info-list">
                        <h4 class="info-list__title">
                            <?php esc_html_e('Giới thiệu về khoá học', 'design'); ?>
                        </h4>

                        <div class="info-list__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php
                    endwhile;
                endif;

                get_template_part('template-parts/course/inc','participants');
                get_template_part('template-parts/course/inc','lesson');
                get_template_part('template-parts/course/inc','time-tuition');
                ?>

                <div class="element-btn-modal-form">
                    <div class="btn-box text-center">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#register-course">
                            <span><?php esc_html_e('Đăng kí học ngay', 'design'); ?></span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/course/inc','detail'); ?>

    <div class="element-has-background element-section">
        <div class="container">
            <?php get_template_part('template-parts/course/inc','student-products'); ?>

            <div class="divider-separator"></div>

            <?php get_template_part('template-parts/option/inc','testimonial'); ?>

            <div class="element-btn-modal-form mt-5">
                <div class="btn-box text-center">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#register-course">
                        <span><?php esc_html_e('Đăng kí học ngay', 'design'); ?></span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
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
                    <p>
                        Hoặc liên hệ với Hotline
                        <br>
                        <a href="tel:0911321300">0911 321 300</a>
                        <span style="color: #ff4f41">/</span>
                        <a href="tel:0975458209">0975 458 209</a>
                        <br>
                        để được tư vấn khóa học phù hợp với bạn
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php
get_footer();