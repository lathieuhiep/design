<?php
$content = get_post_meta( get_the_ID(), 'design_cmb_course_participants_content', true );
?>

<div class="info-list">
    <h4 class="info-list__title">
        <?php esc_html_e('Đối tượng tham gia khoá học', 'design'); ?>
    </h4>

    <div class="info-list__content content-border">
        <?php echo wp_kses_post( $content ); ?>
    </div>
</div>