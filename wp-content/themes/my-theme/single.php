<?php get_header(); ?>

<div class="container py-5">

    <?php while (have_posts()) : the_post(); ?>

        <div class="row">

            <!-- Bài viết -->
            <main class="col-md-8">

                <h1><?php the_title(); ?></h1>

                <p>POST ID: <?php echo get_the_ID(); ?></p>

                <?php the_content(); ?>

            </main>


            <!-- Comment -->
            <aside class="col-md-4">

                <?php comments_template(); ?>

            </aside>

        </div>

    <?php endwhile; ?>

</div>

<?php get_footer(); ?>