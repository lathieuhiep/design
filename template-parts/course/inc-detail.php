<?php
$opt_rule = get_theme_mod('design_opt_course_rule_editor', '');
$opt_bank_1 = get_theme_mod('design_opt_course_bank_account_1', '');
$opt_bank_2 = get_theme_mod('design_opt_course_bank_account_2', '');

$content = get_post_meta( get_the_ID(), 'design_cmb_course_detail_content', true );
?>

<div class="element-not-background">
    <div class="container">
        <div class="element-course-detail-content">
            <div class="content-box">
                <div class="content-box__editor">
                    <?php echo wpautop( $content ); ?>
                </div>

                <div class="content-box__note">
                    <div class="opt-rule">
                        <h4>
                            <?php esc_html_e('Lưu ý:', Text_Domain); ?>
                        </h4>

                        <?php echo wp_kses_post( $opt_rule ); ?>
                    </div>

                    <div class="opt-bank">
                        <h5 class="opt-bank__title">
                            <?php esc_html_e('Thông tin tài khoản:', Text_Domain); ?>
                        </h5>

                        <div class="opt-bank__list">
                            <div class="row row-cols-2">
                                <div class="col">
                                    <?php echo wp_kses_post( $opt_bank_1 ); ?>
                                </div>

                                <div class="col">
                                    <?php echo wp_kses_post( $opt_bank_2 ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="read-more-content">
                <p class="show-full-content">
                    <span><?php esc_html_e('Xem thêm bài viết', Text_Domain); ?></span>
                    <i class="fas fa-angle-down"></i>
                </p>
            </div>
        </div>
    </div>
</div>

