<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <h1>asdasdasdewr</h1>

        <ul>
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        echo '
                            <li>
                                <h3>' . get_the_title() . '</h3>
                                <p>Status code: ' . get_post_meta(get_the_ID(), 'status_code', true) . '</p>
                            </li>
                        ';
                    }
                }
            ?>
        </ul>

        <?php wp_footer(); ?>
    </body>
</html>