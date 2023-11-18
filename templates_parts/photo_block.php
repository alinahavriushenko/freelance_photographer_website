<?php 

$type=get_field('type');
$reference=get_field('reference');
$categories=get_the_terms(get_the_ID(), 'categorie');
$formats=get_the_terms(get_the_ID(),'format');


?>
<article class="photo-block">
    <div class="photo-info">
        <h2><?php the_title(); ?></h2>
        <p>Référence: <?= $reference ?></p>
        <p>Catégorie: <?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){
	foreach ( $categories as $categorie ) {
		echo $categorie->name;}
} ?></p>
        <p>Format: <?php if ( ! empty( $formats ) && ! is_wp_error( $formats ) ){
	foreach ( $formats as $format ) {
		echo $format->name;}
}?></p>
        <p>Type : <?= $type ?> </p>
        <p>Année: <?php echo get_the_date('Y'); ?></p>

    </div>
    <div class="photo">
        <?php echo the_post_thumbnail( 'large' ); ?>
    </div>
</article>