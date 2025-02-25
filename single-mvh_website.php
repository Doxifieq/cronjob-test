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

                        echo '<h1 class="title">Downtime history for ' . get_the_title() . '</h1>';
                    }
                }
            ?>

            <div class="history-stats-grid">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();

                            $post_meta = get_post_meta(get_the_ID());

                            $status_code_meta = get_post_meta(get_the_ID(), 'status_code', true);
                            $status_code = empty($status_code_meta) ? '0' : $status_code_meta;

                            $last_downtime = mvh_check_status_code($status_code) ? mvh_get_last_downtime($post_meta) : '0d 0h 0m 0s';
                            $status = mvh_check_status_code($status_code) ? 'Up' : 'Down';

                            echo '
                                <div class="history-stats status">
                                    <p>Current status</p>
                                    <h3>' . $status . '</h3>
                                    <p class="muted">Currently up for ' . $last_downtime() . '</p>
                                </div>
                            ';
                        }
                    }
                ?>

                <div class="history-stats check">
                    <p>Check every</p>
                    <h3>5 minutes</h3>
                    <p class="muted">Checking in 0d 0h 0m 0s</p>
                </div>

                <div class="history-stats last24">
                    <p>Last 24 hours</p>
                    <h3>100.00%</h3>
                    <p class="muted">0 incidents</p>
                </div>

                <div class="history-stats big">
                    <div>
                        <p>Last 7 days</p>
                        <h3>100.00%</h3>
                        <p class="muted">0 incidents</p>
                    </div>

                    <div>
                        <p>Last 30 days</p>
                        <h3>100.00%</h3>
                        <p class="muted">0 incidents</p>
                    </div>

                    <div>
                        <p>Last 365 days</p>
                        <h3>100.00%</h3>
                        <p class="muted">0 incidents</p>
                    </div>

                    <div>
                        <p>placeholder</p>
                        <h3>placeholder</h3>
                        <p class="muted">placeholder</p>
                    </div>
                </div>
            </div>

            <div class="history-cards">
                <?php
                    $incidents = 0;

                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();

                            $post_meta = get_post_meta(get_the_ID());

                            $status_code_meta = get_post_meta(get_the_ID(), 'status_code', true);
                            $status_code = empty($status_code_meta) ? "0" : $status_code_meta;

                            $website_url = get_field('website');

                            foreach (array_reverse($post_meta, true) /* reverse to get newest first */ as $key => $value) {
                                if (str_contains($key, 'status_code_')) {
                                    $time = substr($key, 12);
                                    $incidents++;
                                    
                                    echo '
                                        <div class="history-card">
                                            <h3 class="history-time">' . date('Y-m-d H:i:s', $time) . '</h3>

                                            <p><span class="dot ' . mvh_get_status_code_color($value[0]) . '"></span>Status Code: ' . $value[0] . '</p>

                                            <a class="muted" href="' . $website_url . '">' . $website_url . '</a>
                                        </div>
                                    ';
                                }
                            }
                        }
                    }

                    if ($incidents == 0) echo '<h3>No incidents.</h3>';
                ?>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>

<!-- DELETE FROM `wp_cj_postmeta` WHERE `meta_key` LIKE 'status_code_%' -->