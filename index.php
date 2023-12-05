<?php get_header() ?>

<div class="hero">
    <?php

// Get the base URL for uploads directory and construct the hero image URL

$upload_dir = wp_upload_dir();
$image_url = $upload_dir['baseurl'] . '/2023/11/nathalie-11-scaled.jpeg';
?>

    <!-- Display the hero section -->

    <img src="<?php echo get_template_directory_uri(); ?> /assets/images/hero-header.png" class="hero-title"
        alt="photographe event" />
    <img src="<?php echo esc_url($image_url); ?>" class="hero-image" alt="hero image" />
</div>

<!-- Photo filters -->

<div class="photo-filters">
    <div class="taxonomies">
        <form class="filter">
            <select id="categories-select">
                <option value="">Catégories</option>
            </select>
        </form>
        <form class="filter">
            <select id="formats-select">
                <option value="">Formats</option>
            </select>
        </form>
    </div>

    <form class="filter">
        <select id="sort-by-date-select">
            <option value="">Trier par</option>
            <option value="DESC">Plus récentes</option>
            <option value="ASC">Plus anciennes</option>
        </select>
    </form>
</div>

<div class="all-photos" id="photo-gallery">
</div>

<div class="load-more-btn-container">
    <button id="load-more-btn" class="btn" data-page="1">Charger plus</button>
</div>

<?php get_footer() ?>