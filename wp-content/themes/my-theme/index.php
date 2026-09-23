<?php get_header(); ?>

<main>

    <!-- =========================
         SEARCH FORM
    ========================== -->

    <?php get_template_part('search-form'); ?>


    <!-- =========================
         COMMENT MODULE 14
    ========================== -->

    <div class="container py-5">

        <div class="row">

            <!-- Để trống bên trái -->

            <div class="col-md-8">
            </div>


            <!-- COMMENT BÊN PHẢI -->

            <div class="col-12 col-md-4">

                <?php get_template_part('comment-view'); ?>

            </div>

        </div>

    </div>

</main>

<?php get_footer(); ?>