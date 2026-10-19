<?php
/**
 * Main template file (Archive / Fallback)
 *
 * @package InnerPride
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container-narrow">
            <h1 class="page-hero-title"><?php single_post_title(); ?></h1>
        </div>
    </section>

    <section class="page-content-wrapper">
        <div class="container-narrow">
            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'legal-article' ); ?> style="margin-bottom: 2rem;">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="page-hero-meta" style="margin-bottom: 1rem;"><?php echo get_the_date(); ?></p>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-sm" style="margin-top: 1rem;">Read More &rarr;</a>
                    </article>
                <?php endwhile; ?>

                <div class="pagination" style="text-align: center; margin-top: 2rem;">
                    <?php the_posts_pagination(); ?>
                </div>

            <?php else : ?>
                <article class="legal-article">
                    <h2>No Posts Found</h2>
                    <p>There are no posts published yet. Explore our <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a> to view our apps and academy programs.</p>
                </article>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_footer();
