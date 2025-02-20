<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="wrapper">
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        $website_url = get_field('website');

                        echo '
                        <h1 class="title">Uptime history for ' . get_the_title() . '</h1>
                        <p class="muted">' . $website_url . '</p>
                        ';
                    }
                }
            ?>

            <div class="history">
                <h3>01-01-2025 00:00</h3>
                <p class="muted">muted text</p>
            </div>

            <div class="history">
                <h3>01-01-2025 00:00</h3>
                <p class="muted">muted text</p>
            </div>

            <div class="history">
                <h3>01-01-2025 00:00</h3>
                <p class="muted">muted text</p>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>