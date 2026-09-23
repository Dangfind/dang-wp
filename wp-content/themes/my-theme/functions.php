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


/*
|--------------------------------------------------------------------------
| Theme setup
|--------------------------------------------------------------------------
*/

function my_theme_setup()
{
    register_nav_menus([
        'primary' => 'Main Menu'
    ]);

    // Cho phép Featured Image
    add_theme_support('post-thumbnails');
}

add_action(
    'after_setup_theme',
    'my_theme_setup'
);


/*
|--------------------------------------------------------------------------
| Search Filter
|--------------------------------------------------------------------------
*/

function my_search_filter($query)
{
    // Chỉ xử lý query chính ngoài trang Admin
    if (
        !is_admin() &&
        $query->is_main_query() &&
        $query->is_search()
    ) {

        /*
        |--------------------------------------------------------------------------
        | Sort
        |--------------------------------------------------------------------------
        */

        if (!empty($_GET['sort'])) {

            $sort = sanitize_text_field(
                wp_unslash($_GET['sort'])
            );

            // Cũ nhất
            if ($sort === 'oldest') {

                $query->set('orderby', 'date');
                $query->set('order', 'ASC');
            }
            // Mới nhất
            else {

                $query->set('orderby', 'date');
                $query->set('order', 'DESC');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Số bài viết mỗi trang
        |--------------------------------------------------------------------------
        */

        $query->set(
            'posts_per_page',
            6
        );
    }
}

add_action(
    'pre_get_posts',
    'my_search_filter'
);
