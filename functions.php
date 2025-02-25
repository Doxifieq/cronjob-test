<?php

function mvh_get_status_code_color($status_code) {
    $status = mvh_check_status_code($status_code);

    if (is_null($status)) {
        return "yellow";

    } elseif ($status == true) {
        return 'green';
    }

    return "red";
}

function mvh_get_last_downtime() {
    return "0d 0h 0m 0s";
}

function mvh_check_status_code($status_code) {
    switch ($status_code) {
        case '200':
            return true;

        case NULL:
        case '0':
        case '404':
        case '408':
        case '500':
        case '501':
        case '502':
        case '503':
        case '504':
            return false;

        default:
            break;
    }
}

function mvh_enqueue_styles() {
    wp_enqueue_style('mvh-style', '/wp-content/themes/cronjob-test/style.css?dev=' . time());
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_styles');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');