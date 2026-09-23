<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 col-lg-8">

            <form
                class="card card-sm"
                method="get"
                action="<?php echo esc_url(home_url('/')); ?>">

                <div class="card-body">

                    <!-- Keyword -->
                    <div class="mb-3">
                        <label class="form-label">Từ khóa</label>

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

                            <label class="form-label">Danh mục</label>

                            <select name="cat" class="form-select">

                                <option value="">Tất cả danh mục</option>

                                <?php
                                $categories = get_categories();

                                foreach ($categories as $category) :
                                ?>

                                    <option
                                        value="<?php echo esc_attr($category->term_id); ?>"
                                        <?php selected(
                                            get_query_var('cat'),
                                            $category->term_id
                                        ); ?>>

                                        <?php echo esc_html($category->name); ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- Sort -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">Sắp xếp</label>

                            <select name="sort" class="form-select">

                                <option value="newest"
                                    <?php selected($_GET['sort'] ?? '', 'newest'); ?>>
                                    Mới nhất
                                </option>

                                <option value="oldest"
                                    <?php selected($_GET['sort'] ?? '', 'oldest'); ?>>
                                    Cũ nhất
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- Button -->
                    <div class="text-end">

                        <button
                            class="btn btn-success"
                            type="submit">

                            <i class="fas fa-search"></i>
                            Tìm kiếm

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>