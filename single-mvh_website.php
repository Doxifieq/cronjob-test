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

                        echo '<h1 class="title">Uptime history for ' . get_the_title() . '</h1>';
                    }
                }
            ?>

            <div class="history-cards">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();

                            $post_meta = get_post_meta(get_the_ID());
                            $website_url = get_field('website');

                            foreach ($post_meta as $key => $value) {
                                if (str_contains($key, 'status_code_')) {
                                    $time = substr($key, 12);
                                    
                                    echo '
                                        <div class="history-card">
                                            <h3>' . date('Y-m-d H:i:s', $time) . '</h3>
                                            <p class="muted">' . $website_url . '</p>
                                        </div>
                                    ';
                                }
                            }
                        }
                    }
                ?>

                <!-- <div class="history-card">
                    <h3>time</h3>
                    <p class="muted">text</p>
                </div> -->
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>