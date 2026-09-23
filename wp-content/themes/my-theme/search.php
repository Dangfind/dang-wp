<?php get_header(); ?>


<div class="container py-5">


    <!-- ==================================================
         SEARCH FORM
    =================================================== -->

    <?php get_template_part('search-form'); ?>


    <?php

    /*
     * Chỉ chạy phần Search Result
     * khi người dùng đã bấm nút Tìm kiếm.
     */

    $do_search = isset($_GET['do_search']);


    if ($do_search) :


        /* ==================================================
           LẤY DỮ LIỆU TỪ URL
        ================================================== */

        // Từ khóa

        $keyword = isset($_GET['s'])
            ? sanitize_text_field(
                wp_unslash($_GET['s'])
            )
            : '';


        // Danh mục

        $category = isset($_GET['cat'])
            ? absint($_GET['cat'])
            : 0;


        // Sắp xếp

        $sort = isset($_GET['sort'])
            ? sanitize_text_field(
                wp_unslash($_GET['sort'])
            )
            : 'newest';


        /* ==================================================
           XÁC ĐỊNH THỨ TỰ
        ================================================== */

        $order = 'DESC';


        if ($sort === 'oldest') {

            $order = 'ASC';
        }


        /* ==================================================
           QUERY BÀI VIẾT
        ================================================== */

        $paged = max(
            1,
            get_query_var('paged')
        );


        $search_query = new WP_Query([

            'post_type' => 'post',

            'post_status' => 'publish',

            // Từ khóa
            's' => $keyword,

            // Danh mục
            'cat' => $category,

            // Số bài / trang
            'posts_per_page' => 6,

            // Trang hiện tại
            'paged' => $paged,

            // Sắp xếp
            'orderby' => 'date',

            'order' => $order,

        ]);

    ?>


        <!-- ==================================================
             SEARCH RESULT
        =================================================== -->

        <div class="mt-5">


            <!-- =========================
                 TITLE
            ========================== -->

            <h3 class="mb-4">

                Kết quả tìm kiếm

                <?php if ($keyword) : ?>

                    cho:

                    <strong>
                        "<?php echo esc_html($keyword); ?>"
                    </strong>

                <?php endif; ?>

            </h3>


            <!-- ==================================================
                 2 CỘT
            =================================================== -->

            <div class="row">


                <!-- ==================================================
                     MODULE 13
                     SEARCH RESULT
                =================================================== -->

                <div class="col-12 col-md-8">


                    <?php if ($search_query->have_posts()) : ?>


                        <div class="row">


                            <?php

                            while (
                                $search_query->have_posts()
                            ) :

                                $search_query->the_post();

                            ?>


                                <!-- =========================
                                     MỘT BÀI VIẾT
                                ========================== -->

                                <div class="col-12 col-md-6 mb-4">


                                    <div class="card h-100 shadow-sm">


                                        <!-- =========================
                                             ẢNH
                                        ========================== -->

                                        <?php if (
                                            has_post_thumbnail()
                                        ) : ?>

                                            <a
                                                href="<?php the_permalink(); ?>">

                                                <?php

                                                the_post_thumbnail(
                                                    'medium',
                                                    [
                                                        'class' =>
                                                        'card-img-top',

                                                        'style' =>
                                                        'height:220px; object-fit:cover;'
                                                    ]
                                                );

                                                ?>

                                            </a>

                                        <?php endif; ?>


                                        <!-- =========================
                                             CONTENT
                                        ========================== -->

                                        <div class="card-body">


                                            <!-- TITLE -->

                                            <h5 class="card-title">

                                                <a
                                                    href="<?php the_permalink(); ?>"
                                                    class="text-decoration-none text-dark">

                                                    <?php the_title(); ?>

                                                </a>

                                            </h5>


                                            <!-- DATE -->

                                            <p class="text-muted small mb-2">

                                                📅

                                                <?php echo esc_html(
                                                    get_the_date(
                                                        'd/m/Y'
                                                    )
                                                ); ?>

                                            </p>


                                            <!-- CATEGORY -->

                                            <div class="mb-2">

                                                <?php

                                                $post_categories =
                                                    get_the_category();


                                                foreach (
                                                    $post_categories
                                                    as $post_category
                                                ) :

                                                ?>

                                                    <span
                                                        class="badge bg-secondary me-1">

                                                        <?php echo esc_html(
                                                            $post_category->name
                                                        ); ?>

                                                    </span>

                                                <?php endforeach; ?>

                                            </div>


                                            <!-- EXCERPT -->

                                            <p class="card-text">

                                                <?php echo esc_html(
                                                    wp_trim_words(
                                                        get_the_excerpt(),
                                                        20,
                                                        '...'
                                                    )
                                                ); ?>

                                            </p>


                                            <!-- BUTTON -->

                                            <a
                                                href="<?php the_permalink(); ?>"
                                                class="btn btn-primary">

                                                Xem bài viết

                                            </a>


                                        </div>

                                    </div>


                                </div>


                            <?php endwhile; ?>


                        </div>


                        <!-- ==================================================
                             PAGINATION
                        =================================================== -->

                        <?php if (
                            $search_query->max_num_pages > 1
                        ) : ?>

                            <div class="mt-4">

                                <?php

                                echo paginate_links([

                                    'base' => add_query_arg(
                                        'paged',
                                        '%#%'
                                    ),

                                    'format' => '',

                                    'current' => $paged,

                                    'total' =>
                                    $search_query->max_num_pages,

                                    'prev_text' =>
                                    '← Trước',

                                    'next_text' =>
                                    'Sau →',

                                    'type' =>
                                    'list',

                                ]);

                                ?>

                            </div>

                        <?php endif; ?>


                    <?php else : ?>


                        <!-- ==================================================
                             KHÔNG CÓ KẾT QUẢ
                        =================================================== -->

                        <div class="alert alert-warning">

                            <h5 class="alert-heading">

                                Không tìm thấy bài viết

                            </h5>

                            <p class="mb-0">

                                Không có bài viết nào
                                phù hợp với điều kiện tìm kiếm.

                            </p>

                        </div>


                    <?php endif; ?>


                </div>


                <!-- ==================================================
                     MODULE 14
                     COMMENT
                =================================================== -->

                <div class="col-12 col-md-4">


                    <div class="ps-md-3">


                        <h4 class="mb-3">
                            Bình luận
                        </h4>


                        <?php

                        get_template_part(
                            'comment-view'
                        );

                        ?>


                    </div>


                </div>


            </div>


        </div>


        <?php

        /*
         * Reset Query
         */

        wp_reset_postdata();

        ?>


    <?php endif; ?>


</div>


<?php get_footer(); ?>