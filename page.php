<?php
/**
 * Standard page template
 *
 * @package InnerPride
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

        <section class="page-hero">
            <div class="container-narrow">
                <h1 class="page-hero-title"><?php the_title(); ?></h1>
            </div>
        </section>

        <section class="page-content-wrapper">
            <div class="container-narrow">
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'legal-article' ); ?>>
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
