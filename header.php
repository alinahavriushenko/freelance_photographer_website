<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>

</head>

<body>
    <header>
        <nav>
            <?php

    if ( function_exists( 'the_custom_logo' ) ) {
	the_custom_logo();
}

wp_nav_menu([
    'theme_location' => 'main-menu',
    'container' => false,
   'menu_class' => 'navbar'
]);
?>
        </nav>
    </header>