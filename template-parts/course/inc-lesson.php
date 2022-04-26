<?php
$content_first = get_post_meta( get_the_ID(), 'design_cmb_course_lesson_first', true );
$content_last = get_post_meta( get_the_ID(), 'design_cmb_course_lesson_last', true );
?>

<div class="info-list">
    <h4 class="info-list__title">
        <?php esc_html_e('Khung kiến thức bài giảng', 'design'); ?>
    </h4>

    <div class="info-list__content content-border content-lesson">
        <div class="item-content">
            <?php echo wp_kses_post( $content_first ); ?>
        </div>

        <div class="item-content">
            <?php echo wp_kses_post( $content_last ); ?>
        </div>
    </div>
</div>