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

            <div class="archive-cards">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();

                            $status_code_meta = get_post_meta(get_the_ID(), 'status_code', true);
                            $status_code = empty($status_code_meta) ? "0" : $status_code_meta;

                            $website_url = get_field('website');

                            echo '
                                <div class="archive-card">
                                    <h3 class="archive-site">' . get_the_title() . '</h3>
                                    <a class="muted" href="' . $website_url . '">' . $website_url . '</a>
                                    
                                    <p><span class="dot ' . mvh_get_status_code_color($status_code) . '"></span>Status Code: ' . $status_code . '</p>
                                    
                                    <a class="muted" href="' . get_the_permalink() . '">View</a>
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

<!-- php -f public_html/cronjob/cron/script.php >> public_html/cronjob/cron/log.txt &2>1 -->