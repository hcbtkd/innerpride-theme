<?php
/**
 * Single post template
 *
 * @package InnerPride
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

        <section class="page-hero">
            <div class="container-narrow">
                <span class="badge badge-red" style="margin-bottom: 0.75rem;">ACADEMY NEWS & UPDATES</span>
                <h1 class="page-hero-title"><?php the_title(); ?></h1>
                <p class="page-hero-meta">Published on <?php echo get_the_date(); ?> by <?php the_author(); ?></p>
            </div>
        </section>

        <section class="page-content-wrapper">
            <div class="container-narrow">
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'legal-article' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div style="margin-bottom: 2rem; border-radius: 12px; overflow: hidden;">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'innerpride' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </article>
            </div>
        </section>

    <?php endwhile; ?>

</main>

<?php
get_footer();
