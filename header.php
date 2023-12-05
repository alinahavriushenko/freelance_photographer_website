<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathalie Mota Photograph Event</title>
    <meta name="description"
        content="Photographe professionnelle spécialisée dans l'événementiel, Nathalie Mota capture l'essence unique de chaque occasion. Découvrez son portfolio d'images saisissantes.">


    <?php wp_head() ?>

</head>

<body>
    <header>
        <nav>
            <?php

    if ( function_exists( 'the_custom_logo' ) ) {
	the_custom_logo();
} ?>
            <div class="navbar">
                <?php wp_nav_menu([
    'theme_location' => 'main-menu',
    'container' => false,
   'menu_class' => 'navbar'
]);
?>
            </div>
            <button class="mobile-menu-trigger"><i class="fa-solid fa-bars"></i></button>

        </nav>


        <div class="mobile-menu">
            <?php
                wp_nav_menu([
                    'theme_location' => 'mobile-menu',
                    'container' => false,
                    'menu_class' => 'mobile-navbar'
                ]);
                ?>
        </div>
    </header>