<?php

function mvh_enqueue_styles() {
    wp_enqueue_style('mvh-style', __FILE__ . './style.css');
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_styles');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');