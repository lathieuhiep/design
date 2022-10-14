<?php
$content = get_post_meta( get_the_ID(), 'design_cmb_course_time_tuition_content', true );
?>

<div class="info-list">
    <h4 class="info-list__title">
        <?php esc_html_e('Thời gian học và thông tin học phí', Text_Domain); ?>
    </h4>

    <div class="info-list__content content-border">
        <?php echo wp_kses_post( $content ); ?>
    </div>
</div>