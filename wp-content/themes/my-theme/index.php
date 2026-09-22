<?php get_header(); ?>

<main class="container py-5">

    <h1 class="mb-4">
        <?php the_title(); ?>
    </h1>

    <div class="mb-5">
        <?php the_content(); ?>
    </div>

</main>

<?php get_footer(); ?>