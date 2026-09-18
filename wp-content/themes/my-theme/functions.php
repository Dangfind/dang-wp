<?php

function dang_news_assets()
{

    wp_enqueue_style(
        'header-style',
        get_template_directory_uri() . '/css/header.css',
        array(),
        '1.0'
    );
}

add_action('wp_enqueue_scripts', 'dang_news_assets');
