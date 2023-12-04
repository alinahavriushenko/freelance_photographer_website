<?php 
$categories=get_the_terms(get_the_ID(), 'categorie');

?>
<div class="photo-container">
    <?php if (has_post_thumbnail()) : ?>
    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
        alt="<?php the_title_attribute(); ?>">
    <?php endif; ?>
    <div class="overlay">
        <a href="<?php the_permalink(); ?>"><i class="fa-solid fa-eye" id="icon-more"></i></a>
        <div class="icon-bg lightbox-trigger" id="icon-fullscreen"
            data-image="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
            data-title="<?php echo esc_attr(get_the_title()); ?>">
            <i class="fa-solid fa-expand"></i>
        </div>
        <div class="photo-info-hover">
            <h3><?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){
	foreach ( $categories as $categorie ) {
		echo $categorie->name;}
} ?></h3>
            <h3><?php the_title(); ?></h3>
        </div>

    </div>
</div>