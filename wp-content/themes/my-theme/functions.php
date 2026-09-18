<?php

function dang_news_assets()
{
    wp_enqueue_style(
        'header-style',
        get_template_directory_uri() . '/css/header.css',
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'search-style',
        get_template_directory_uri() . '/css/search.css',
        array(),
        '1.0'
    );
}

function my_theme_enqueue_styles()
{
    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'dang_news_assets');
