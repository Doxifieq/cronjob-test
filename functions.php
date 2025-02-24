<?php

function mvh_get_status_code_color($status_code) {
    switch ($status_code) { // break; not needed since it returns a value every case
        case "200":
            return "green";

        case NULL:
        case "0":
        case "404":
        case "408":
        case "500":
        case "501":
        case "502":
        case "503":
        case "504":
            return "red";

        default:
            return "yellow";
    }
}

function mvh_enqueue_styles() {
    wp_enqueue_style('mvh-style', '/wp-content/themes/cronjob-test/style.css?dev=' . time());
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_styles');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');