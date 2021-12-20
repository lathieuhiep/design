<div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="site-page-content">
            <?php
            the_content();
            design_link_page();
            ?>
        </div>
    <?php
        design_comment_form();
    endwhile;
    ?>
</div>