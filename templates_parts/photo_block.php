<div class="photo-container">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large'); ?>
        <?php endif; ?>
    </a>
</div>