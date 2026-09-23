<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 col-lg-8">

            <form
                class="card shadow-sm"
                method="get"
                action="<?php echo esc_url(home_url('/')); ?>">

                <!-- Đánh dấu đã thực hiện tìm kiếm -->
                <input
                    type="hidden"
                    name="do_search"
                    value="1">


                <div class="card-body">

                    <!-- =========================
                         TỪ KHÓA
                    ========================== -->

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Từ khóa
                        </label>

                        <input
                            class="form-control form-control-lg"
                            type="search"
                            name="s"
                            value="<?php
                                    echo isset($_GET['s'])
                                        ? esc_attr(
                                            sanitize_text_field(
                                                wp_unslash($_GET['s'])
                                            )
                                        )
                                        : '';
                                    ?>"
                            placeholder="Nhập từ khóa...">

                    </div>


                    <div class="row">

                        <!-- =========================
                             DANH MỤC
                        ========================== -->

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
                                        value="<?php echo esc_attr(
                                                    $category->term_id
                                                ); ?>"
                                        <?php selected(
                                            $current_category,
                                            $category->term_id
                                        ); ?>>

                                        <?php echo esc_html(
                                            $category->name
                                        ); ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- =========================
                             SẮP XẾP
                        ========================== -->

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


                    <!-- =========================
                         BUTTON
                    ========================== -->

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

</div>