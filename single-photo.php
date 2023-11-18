<?php get_header(); ?>

<div class="single-photo">

    <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'templates_parts/photo_block' );

        endwhile;
        ?>

    <div class="photo-more">
        <div class="button-container">
            <p>Cette photo vous intéresse?</p>
            <a href="#contact" id="contact-button" class="btn">Contact</a>
        </div>
        <div class="photo-navigation">
            <div class="prev-thumbnail">
                <?php $prev_post = get_previous_post();
                if (!empty($prev_post)) { $prev_thumbnail = get_the_post_thumbnail($prev_post->ID, array(80, 70));};
                echo $prev_thumbnail; ?>
            </div>
            <div class="next-thumbnail">
                <?php  $next_post = get_next_post();
                if (!empty($next_post)) { $next_thumbnail = get_the_post_thumbnail($next_post->ID, array(80, 70));};
                echo $next_thumbnail; ?>
            </div>

            <div>
                <?php previous_post_link('%link', '<img src="' . get_template_directory_uri() . '/assets/images/Precedente.png" class="prev-post" />'); ?>
                <?php next_post_link('%link', '<img src="' . get_template_directory_uri() . '/assets/images/Suivante.png"  class="next-post"/>'); ?>
            </div>
        </div>
    </div>
    <div>
        <h3>Vous aimerez aussi</h3>
        <div class="similar-photos-container">
            <?php
$categories = get_the_terms(get_the_ID(), 'categorie');
if (!empty($categories)) {
    $category_name = $categories[0]->name;

    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'categorie',
                'field'    => 'name',
                'terms'    => $category_name,
            ),
        ),
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 2,
    );

    $related_posts = new WP_Query($args);

        while ($related_posts->have_posts()) {
            $related_posts->the_post();
            echo get_the_post_thumbnail(get_the_ID(), 'large');
        }

    }

    wp_reset_postdata();

?>
        </div>
        <div>
            <a href="#" id="more-photos" class="btn">Toutes les photos</a>
        </div>


    </div>

</div>

<?php get_footer();