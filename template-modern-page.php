<?php
/**
 * Template Name: Modern Page
 *
 * A cleaner page template with breadcrumbs, title, and optional featured image.
 */

get_header();

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'large', true );
$thumb_url = $thumb_url_array[0];
?>

<div class="page-wrapper modern-page-template">
    <div class="page-inner-wrapper">

        <!-- Main -->
        <main role="main" id="post-main">

            <div class="grid-x grid-padding-x">

                <div class="modern-page-content cell large-10 large-offset-1">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'type-page' ); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

                            <header class="article-header">

                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="page-hero-image" style="background-image: url('<?php echo esc_url( $thumb_url ) ?>');"></div>
                                <?php endif; ?>

                                <h1 class="entry-title page-title" itemprop="headline"><?php the_title(); ?></h1>

                            </header>

                            <section class="entry-content page-entry-content" itemprop="text">
                                <?php the_content(); ?>
                            </section>

                            <?php if ( wp_link_pages( array( 'echo' => 0 ) ) ) : ?>
                            <footer class="article-footer">
                                <?php wp_link_pages(); ?>
                            </footer>
                            <?php endif; ?>

                        </article>

                    <?php endwhile; else : ?>

                        <?php get_template_part( 'parts/content', 'missing' ); ?>

                    <?php endif; ?>

                </div>

            </div>

        </main>

    </div>
</div>

<?php get_footer(); ?>
