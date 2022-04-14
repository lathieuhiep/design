<?php
$image = get_theme_mod('design_opt_rule_image', '');
$content = get_theme_mod('design_opt_rule_content', '');
$contact = get_theme_mod('design_opt_rule_contact', '');
?>

<div class="element-rule">
    <div class="element-rule__thumbnail">
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>

    <div class="element-rule__content">
        <div class="top">
            <?php echo wpautop( $content ); ?>
        </div>

        <div class="bottom">
            <?php echo wpautop( $contact ); ?>
        </div>
    </div>
</div>
