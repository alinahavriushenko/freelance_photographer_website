<?php get_header() ?>

<!-- hero -->
<!-- <div>
    <img src='/wp-content/uploads/2023/11/nathalie-11-scaled.jpeg' />

</div> -->

<?php
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 8,
);

$custom_photos_query = new WP_Query($args);

if ($custom_photos_query->have_posts()) {
    while ($custom_photos_query->have_posts()) {
        $custom_photos_query->the_post();
        get_template_part('templates_parts/photo_block');
    }
    wp_reset_postdata(); ?>
<div class="load-more-btn-container">
    <button id="load-more-btn" data-page="1">Load More</button>
</div> <?php
} else {
    echo 'Aucune photo trouvée.';
}
?>


<?php get_footer() ?>