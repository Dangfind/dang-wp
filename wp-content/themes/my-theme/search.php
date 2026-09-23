<?php get_header(); ?>

<div class="container py-5">

    <!-- =========================
         FORM SEARCH
    ========================== -->

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 col-lg-8">

            <form
                class="card shadow-sm"
                method="get"
                action="<?php echo esc_url(home_url('/')); ?>">

                <div class="card-body">

                    <!-- Từ khóa -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Từ khóa
                        </label>

                        <input
                            class="form-control form-control-lg"
                            type="search"
                            name="s"
                            value="<?php echo esc_attr(get_search_query()); ?>"
                            placeholder="Nhập từ khóa...">

                    </div>


                    <div class="row">

                        <!-- Category -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Danh mục
                            </label>

                            <select
                                name="cat"
                                class="form-select">

                                <option value="">
                                    Tất cả danh mục
                                </option>

                                <?php

                                $categories = get_categories([
                                    'hide_empty' => false
                                ]);

                                $current_category = isset($_GET['cat'])
                                    ? absint($_GET['cat'])
                                    : 0;

                                foreach ($categories as $category) :

                                ?>

                                    <option
                                        value="<?php echo esc_attr($category->term_id); ?>"
                                        <?php selected(
                                            $current_category,
                                            $category->term_id
                                        ); ?>>

                                        <?php echo esc_html($category->name); ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- Sort -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Sắp xếp
                            </label>

                            <?php

                            $current_sort = isset($_GET['sort'])
                                ? sanitize_text_field(
                                    wp_unslash($_GET['sort'])
                                )
                                : 'newest';

                            ?>

                            <select
                                name="sort"
                                class="form-select">

                                <option
                                    value="newest"
                                    <?php selected(
                                        $current_sort,
                                        'newest'
                                    ); ?>>
                                    Mới nhất
                                </option>

                                <option
                                    value="oldest"
                                    <?php selected(
                                        $current_sort,
                                        'oldest'
                                    ); ?>>
                                    Cũ nhất
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- Button -->
                    <div class="text-end">

                        <button
                            class="btn btn-success px-4"
                            type="submit">
                            🔍 Tìm kiếm
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    <!-- =========================
         KẾT QUẢ NẰM BÊN DƯỚI FORM
    ========================== -->

    <?php if (is_search()) : ?>

        <div class="mt-5">

            <h3 class="mb-4">

                Kết quả tìm kiếm

                <?php if (get_search_query()) : ?>

                    cho:
                    <strong>
                        "<?php echo esc_html(get_search_query()); ?>"
                    </strong>

                <?php endif; ?>

            </h3>


            <?php if (have_posts()) : ?>

                <div class="row">

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">

                            <div class="card h-100 shadow-sm">

                                <!-- Ảnh -->
                                <?php if (has_post_thumbnail()) : ?>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_post_thumbnail(
                                            'medium',
                                            [
                                                'class' => 'card-img-top',
                                                'style' => 'height:220px; object-fit:cover;'
                                            ]
                                        ); ?>

                                    </a>

                                <?php endif; ?>


                                <div class="card-body">

                                    <!-- Tiêu đề -->
                                    <h5 class="card-title">

                                        <a
                                            href="<?php the_permalink(); ?>"
                                            class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>

                                    </h5>


                                    <!-- Ngày -->
                                    <p class="text-muted small">

                                        📅
                                        <?php echo esc_html(
                                            get_the_date('d/m/Y')
                                        ); ?>

                                    </p>


                                    <!-- Category -->
                                    <p>

                                        <?php

                                        $categories = get_the_category();

                                        foreach ($categories as $category) {

                                            echo '<span class="badge bg-secondary me-1">';
                                            echo esc_html($category->name);
                                            echo '</span>';
                                        }

                                        ?>

                                    </p>


                                    <!-- Nội dung -->
                                    <p class="card-text">

                                        <?php echo esc_html(
                                            wp_trim_words(
                                                get_the_excerpt(),
                                                20,
                                                '...'
                                            )
                                        ); ?>

                                    </p>


                                    <!-- Xem -->
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


                <!-- Pagination -->

                <div class="mt-4">

                    <?php

                    the_posts_pagination([
                        'mid_size'  => 2,
                        'prev_text' => '← Trước',
                        'next_text' => 'Sau →',
                    ]);

                    ?>

                </div>


            <?php else : ?>

                <div class="alert alert-warning">

                    Không tìm thấy bài viết nào.

                </div>

            <?php endif; ?>

        </div>

    <?php endif; ?>

</div>


<?php get_footer(); ?>