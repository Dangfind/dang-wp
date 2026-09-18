<?php get_header(); ?>

<main class="search-page">

    <h1>
        Results for "<?php echo esc_html(get_search_query()); ?>"
    </h1>

    <hr>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <article>
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <p>
                    <?php the_excerpt(); ?>
                </p>
            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>
            Sorry, but nothing matched your search terms.
            Please try again with some different keywords.
        </p>

        <form action="<?php echo esc_url(home_url('/')); ?>" method="get">

            <label>Search...</label>

            <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>">

            <button type="submit">
                Search
            </button>

        </form>

    <?php endif; ?>

</main>

<?php get_footer(); ?>