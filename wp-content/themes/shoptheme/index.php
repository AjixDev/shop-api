<?php
get_header();
?>
<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php echo get_template_part('content'); ?>
    <?php endwhile;
    endif; ?>
</div>