<?php

function my_theme_enqueue_styles()
{
    // Bootstrap
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        array(),
        '5.3.3'
    );

    // Main style.css
    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri(),
        array('bootstrap'),
        '1.0'
    );

    // Header CSS
    wp_enqueue_style(
        'header-style',
        get_template_directory_uri() . '/css/header.css',
        array('bootstrap'),
        '1.0'
    );

    // Search CSS
    wp_enqueue_style(
        'search-style',
        get_template_directory_uri() . '/css/search.css',
        array('bootstrap'),
        '1.0'
    );
}

add_action(
    'wp_enqueue_scripts',
    'my_theme_enqueue_styles'
);


function my_theme_setup()
{
    register_nav_menus([
        'primary' => 'Main Menu'
    ]);
}

add_action(
    'after_setup_theme',
    'my_theme_setup'
);