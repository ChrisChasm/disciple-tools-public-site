<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>

<div class="post-not-found">

    <?php if ( is_search() ) : ?>

        <header class="article-header">
            <h3><?php _e( 'Sorry, No Results.', 'zume' );?></h3>
        </header>

        <section class="entry-content">
            <p><?php _e( 'Try your search again.', 'zume' );?></p>
        </section>

        <section class="search">
            <p><?php get_search_form(); ?></p>
        </section> <!-- end search section -->

        <footer class="article-footer">
            <p><?php _e( 'This is the error message in the parts/content-missing.php template.', 'zume' ); ?></p>
        </footer>

    <?php else : ?>

        <header class="article-header">
            <h3><?php _e( 'Oops, Post Not Found!', 'zume' ); ?></h3>
        </header>

        <section class="entry-content">
            <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'zume' ); ?></p>
        </section>

        <section class="search">
            <p><?php get_search_form(); ?></p>
        </section> <!-- end search section -->

        <footer class="article-footer">

        </footer>

    <?php endif; ?>

</div>
