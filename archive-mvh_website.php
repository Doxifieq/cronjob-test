<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <div class="wrapper">
            <h1 class="title">Status for websites</h1>

            <div class="cards">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();

                            $status_code_meta = get_post_meta(get_the_ID(), 'status_code', true);
                            $status_code = empty($status_code_meta) ? "0" : $status_code_meta;

                            echo '
                                <div class="card">
                                    <h3 class="site">' . get_the_title() . '</h3>
                                    <p class="url">' . get_field('website') . '</p>

                                    <p class="status"><span class="dot ' . mvh_get_status_code_color($status_code) . '"></span>Status Code: ' . $status_code . '</p>
                                </div>
                            ';
                        }
                    }
                ?>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>