<?php         while ( have_posts() ) : the_post(); endwhile;


$args = array(
    'post_type' => 'photo',
    'posts_per_page' => -1,
);

$photo_posts = new WP_Query($args);

$photos = array();

if ($photo_posts->have_posts()) {
    while ($photo_posts->have_posts()) {
        $photo_posts->the_post();

        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $reference = get_field('reference');
        $categories = get_the_terms(get_the_ID(), 'categorie');

        $photos[] = array(
            'image' => $image_url,
            'reference' => $reference,
            'categories' => $categories,
        );
    }
    wp_reset_postdata();
}
?>

<div class="lightbox">
    <div class="lightbox-close"><i class="fa-solid fa-xmark"></i></div>
    <h3 class="lightbox-next">Suivante <i class="fa-solid fa-arrow-right-long"></i></h3>
    <h3 class="lightbox-prev"><i class="fa-solid fa-arrow-left-long"></i> Précédente</h3>
    <div class="lightbox-container">
        <img src="" class="lightbox-image" />
        <div id="photos-data" data-photos="<?php echo esc_attr(json_encode($photos)); ?>"></div>
    </div>
    <div class="lightbox-photo-info">
        <p class="lightbox-reference"></p>
        <p class="lightbox-categories"></p>
    </div>
</div>