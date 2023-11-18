    <footer>
        <?php
    wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'navbar-nav mr-auto'
    ])
    ?>
        <p>TOUS DROITS RÉSERVÉS</p>
    </footer>
    <?php wp_footer() ?>
    <?php get_template_part('templates_parts/contact'); ?>

    </body>

    </html>