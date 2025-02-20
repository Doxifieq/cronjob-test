<?php

function mvh_get_status_code_color($status_code) {
    switch ($status_code) { // break; not needed since it returns a value every case
        case "200":
            return "green";

        case NULL:
        case "0":
            return "red";

        default:
            return "yellow";
    }
}

function mvh_get_most_recent_status_code($post_meta) {
    foreach ($post_meta as $meta_key) {
        echo $meta_key;
    }

    return "0";
}

function mvh_enqueue_styles() {
    wp_enqueue_style('mvh-style', '/wp-content/themes/cronjob-test/style.css?dev=' . time());
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_styles');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');