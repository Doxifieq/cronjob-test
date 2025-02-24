<?php

function mvh_get_uptime($post_meta) {
    $highest_time = time();

    foreach ($post_meta as $key => $value) {
        if (str_contains($key, 'status_code_')) {
            $time = substr($key, 12); //this is stupid but im also stupid and this works

            if ($time > $highest_time) $highest_time = $time;
        }
    }

    return date('Y-m-d H:i:s', $highest_time - time());
}

function mvh_get_status_code_color($status_code) {
    $status = mvh_check_status_code($status_code);

    if ($status == true) {
        return "green";

    } elseif ($status == false) {
        return "red";

    } else {
        return "yellow";
    }
}

function mvh_check_status_code($status_code) {
    switch ($status_code) { //break not needed since it always returns a value
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
            return NULL;
    }
}

function mvh_enqueue_styles() {
    wp_enqueue_style('mvh-style', '/wp-content/themes/cronjob-test/style.css?dev=' . time());
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_styles');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');