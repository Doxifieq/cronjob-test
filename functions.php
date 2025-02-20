<?php

function mvh_get_status_code_color($status_code) {
    if ($status_code == "200") {
        return "green";
    } elseif ($status_code == NULL) {
        return "red";
    }

    return "yellow";
}

function mvh_enqueue_styles() {
    wp_enqueue_style('mvh-style', '/wp-content/themes/cronjob-test/style.css?dev=' . time());
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_styles');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');