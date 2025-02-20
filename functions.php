<?php

function mvh_enqueue_styles() {
    wp_enqueue_style('style', 'style.css');
}

add_action('wp_enqueue_scripts', 'mvh_enqueue_style');

add_theme_support('automatic-feed-links');
add_theme_support('title-tag');