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

                        $post_meta = get_post_meta(get_the_ID());
                        $website_url = get_field('website');

                        echo '<h1 class="title">Uptime history for ' . get_the_title() . '</h1>';

                        foreach ($post_meta as $key => $value) {
                            var_dump($key);
                            var_dump($value);

                            if (str_contains('status_code_', $value[0])) {
                                $date = date('Y-m-d H:i:s', $value[0]);

                                echo '
                                    <div class="history">
                                        <h3>' . $date . '</h3>
                                        <p class="muted">' . $website_url . '</p>
                                    </div>
                                ';
                            }
                        }
                    }
                }
            ?>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>