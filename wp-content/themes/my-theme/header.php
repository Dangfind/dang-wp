<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header class="site-header">

        <!-- Logo -->
        <div class="header-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                Group C
            </a>
        </div>

        <!-- Home -->
        <a class="header-home" href="<?php echo esc_url(home_url('/')); ?>">
            Home
        </a>

        <!-- Search -->
        <div class="header-search">
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <input type="search" name="s" placeholder="Search">

                <button type="submit">
                    Submit
                </button>
            </form>
        </div>

        <!-- Main menu -->
        <nav class="main-menu">

            <?php

            $parent = get_category_by_slug('the-thao');


            $categories = get_categories([
                'hide_empty' => false,
                'parent' => $parent->term_id
            ]);


            foreach ($categories as $category) :

            ?>

                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">

                    <?php echo esc_html($category->name); ?>

                </a>

            <?php endforeach; ?>

        </nav>

        <!-- Right menu -->
        <div class="header-actions">

            <!-- Menu -->
            <div class="header-action menu-action">
                <span class="dots">•••</span>
                <small>Menu</small>
            </div>

            <!-- Search -->
            <div class="header-action">
                <span class="search-icon"></span>
                <small>Search</small>
            </div>

            <!-- Account -->
            <div class="header-account">

                <button class="account-button" type="button">
                    <span class="account-icon">
                        <span></span>
                    </span>

                    <span class="account-text">
                        <span>Account</span>
                        <span class="arrow">▼</span>
                    </span>
                </button>

                <!-- Dropdown -->
                <div class="account-dropdown">

                    <?php if (is_user_logged_in()) : ?>

                        <a href="<?php echo esc_url(admin_url('profile.php')); ?>">
                            My Account
                        </a>

                        <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>">
                            Logout
                        </a>

                    <?php else : ?>

                        <a href="<?php echo esc_url(wp_login_url()); ?>">
                            Login
                        </a>

                        <a href="<?php echo esc_url(wp_registration_url()); ?>">
                            Register
                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </header>