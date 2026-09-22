<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <link
        rel="stylesheet"
        href="<?php echo esc_url(
            get_template_directory_uri() . '/css/header.css'
        ); ?>"
    >

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<header class="site-header">

    <div class="header-container">


        <!-- Logo -->
        <div class="header-logo">
            Group C
        </div>


        <!-- Home -->
        <a
            class="header-home"
            href="<?php echo esc_url(home_url('/')); ?>"
        >
            Home
        </a>


        <!-- Search -->
        <div class="header-search">

            <form
                action="<?php echo esc_url(home_url('/')); ?>"
                method="get"
            >

                <input
                    type="search"
                    name="s"
                    placeholder="Search"
                    value="<?php echo esc_attr(get_search_query()); ?>"
                >

                <button type="submit">
                    Submit
                </button>

            </form>

        </div>


        <!-- Main menu -->
        <nav class="main-menu">

            <?php

            /*
             * Lấy Page "Thể thao"
             */
            $parent_page = get_page_by_path('the-thao');

            if ($parent_page) :

                /*
                 * Lấy các Page con của "Thể thao"
                 */
                $child_pages = get_pages([
                    'child_of'    => $parent_page->ID,
                    'sort_column' => 'menu_order,post_title',
                    'sort_order'  => 'ASC'
                ]);

                foreach ($child_pages as $page) :

            ?>

                    <a
                        href="<?php echo esc_url(
                            get_permalink($page->ID)
                        ); ?>"
                    >
                        <?php echo esc_html($page->post_title); ?>
                    </a>

            <?php

                endforeach;

            endif;

            ?>

        </nav>


        <!-- Right menu -->
        <div class="header-actions">


            <!-- Menu -->
            <div class="header-action menu-action">

                <span class="dots">
                    •••
                </span>

                <small>
                    Menu
                </small>

            </div>


            <!-- Search -->
            <div class="header-action">

                <span class="search-icon"></span>

                <small>
                    Search
                </small>

            </div>


            <!-- Account -->
            <div class="header-account">

                <button
                    class="account-button"
                    type="button"
                >

                    <span class="account-icon">
                        <span></span>
                    </span>

                    <span class="account-text">

                        <span>
                            Account
                        </span>

                        <span class="arrow">
                            ▼
                        </span>

                    </span>

                </button>


                <!-- Account dropdown -->
                <div class="account-dropdown">

                    <?php if (is_user_logged_in()) : ?>

                        <a
                            href="<?php echo esc_url(
                                admin_url('profile.php')
                            ); ?>"
                        >
                            My Account
                        </a>

                        <a
                            href="<?php echo esc_url(
                                wp_logout_url(home_url('/'))
                            ); ?>"
                        >
                            Logout
                        </a>

                    <?php else : ?>

                        <a
                            href="<?php echo esc_url(
                                wp_login_url()
                            ); ?>"
                        >
                            Login
                        </a>

                        <?php if (get_option('users_can_register')) : ?>

                            <a
                                href="<?php echo esc_url(
                                    wp_registration_url()
                                ); ?>"
                            >
                                Register
                            </a>

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>


        </div>

    </div>

</header>