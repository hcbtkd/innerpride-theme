<?php
/**
 * Template Name: Shef Tech - Apps Showcase
 * Description: Dedicated page template for Shef Tech mobile apps, software solutions, and Play Store downloads.
 *
 * @package InnerPride
 */

get_header();

$app1_link = get_theme_mod( 'app1_play_store_url', '#' );
$app2_link = get_theme_mod( 'app2_play_store_url', '#' );
$privacy_page_id = get_option( 'wp_page_for_privacy_policy' );
$privacy_url = $privacy_page_id ? get_permalink( $privacy_page_id ) : home_url( '/privacy-policy/' );

$attendance_img = get_template_directory_uri() . '/assets/images/app-attendance.jpg';
$scoring_img    = get_template_directory_uri() . '/assets/images/app-scoring.jpg';
?>

<main id="primary" class="site-main">

    <!-- HERO SECTION: Shef Tech -->
    <section class="page-hero" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-secondary) 100%); padding: 5rem 0 4rem;">
        <div class="container-narrow">
            <span class="badge badge-dark" style="margin-bottom: 1rem;">💻 SHEF TECH INNOVATIONS</span>
            <h1 class="page-hero-title">Mobile Apps by Shef Tech</h1>
            <p class="page-hero-meta" style="font-size: 1.15rem; color: var(--text-secondary); max-width: 650px; margin: 0 auto 1.5rem;">
                Crafting intuitive, high-performance software and mobile solutions for martial arts academies, coaches, and sports organizations.
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <span class="badge badge-blue">✓ Android Apps</span>
                <span class="badge badge-red">✓ 100% Privacy Focused</span>
                <span class="badge badge-dark">✓ Offline-Ready</span>
            </div>
        </div>
    </section>

    <!-- APPS SHOWCASE SECTION -->
    <section class="apps-section" id="apps" style="padding: 5rem 0;">
        <div class="container">

            <!-- APP 1: My Dojang Attendance App -->
            <article class="app-card-featured" id="app-attendance">
                <div class="app-content">
                    <div class="app-meta-badge">
                        <span class="badge badge-blue">STUDENT & DOJANG MANAGEMENT</span>
                    </div>
                    <h2 class="app-title">My Dojang Attendance App</h2>
                    <p class="app-summary">
                        Developed by <strong>Shef Tech</strong> for coaches and martial arts masters. Replace clumsy paper registers with fast, digital student attendance tracking, belt promotion eligibility logs, and batch analytics.
                    </p>

                    <ul class="feature-checklist">
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>One-Tap Student Check-in</span>
                        </li>
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Belt & Grade Progression</span>
                        </li>
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Batch & Timetable Tracking</span>
                        </li>
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Excel / CSV Report Export</span>
                        </li>
                    </ul>

                    <div class="app-actions">
                        <a href="<?php echo esc_url( $app1_link ); ?>" class="btn btn-primary" target="_blank" rel="noopener">
                            <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3.609 1.814L13.792 12 3.61 22.186a2.38 2.38 0 0 1-.61-.914c-.16-.44-.24-.91-.24-1.392V4.12c0-.482.08-.952.24-1.392.146-.35.358-.66.61-.914zm11.604 11.608l2.257 2.257-11.44 6.605 9.183-8.862zm2.257-2.844l-2.257 2.257-9.183-8.862 11.44 6.605zm1.42 1.42l3.438 1.986c.92.531.92 1.401 0 1.932l-3.438 1.986-2.18-2.18 2.18-2.18z"/>
                            </svg>
                            <span>Get on Google Play</span>
                        </a>
                        <a href="<?php echo esc_url( $privacy_url ); ?>#attendance-policy" class="btn btn-secondary">
                            <span>Privacy Policy</span>
                        </a>
                    </div>
                </div>

                <div class="app-mockup">
                    <img src="<?php echo esc_url( $attendance_img ); ?>" alt="My Dojang Attendance App Interface Mockup" class="mockup-frame" loading="lazy">
                </div>
            </article>

            <!-- APP 2: Taekwondo Scoring Mini App -->
            <article class="app-card-featured reversed" id="app-scoring">
                <div class="app-content">
                    <div class="app-meta-badge">
                        <span class="badge badge-red">KYORUGI & MATCH SCOREBOARD</span>
                    </div>
                    <h2 class="app-title">Taekwondo Scoring Mini App</h2>
                    <p class="app-summary">
                        Engineered by <strong>Shef Tech</strong> to turn any Android phone or tablet into an instant, high-visibility World Taekwondo tournament scoreboard.
                    </p>

                    <ul class="feature-checklist">
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Hong & Chung Point Controls</span>
                        </li>
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Gam-jeom Penalty Counter</span>
                        </li>
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Configurable Round Timers</span>
                        </li>
                        <li class="feature-check-item">
                            <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>High Contrast Match Display</span>
                        </li>
                    </ul>

                    <div class="app-actions">
                        <a href="<?php echo esc_url( $app2_link ); ?>" class="btn btn-primary" target="_blank" rel="noopener">
                            <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3.609 1.814L13.792 12 3.61 22.186a2.38 2.38 0 0 1-.61-.914c-.16-.44-.24-.91-.24-1.392V4.12c0-.482.08-.952.24-1.392.146-.35.358-.66.61-.914zm11.604 11.608l2.257 2.257-11.44 6.605 9.183-8.862zm2.257-2.844l-2.257 2.257-9.183-8.862 11.44 6.605zm1.42 1.42l3.438 1.986c.92.531.92 1.401 0 1.932l-3.438 1.986-2.18-2.18 2.18-2.18z"/>
                            </svg>
                            <span>Get on Google Play</span>
                        </a>
                        <a href="<?php echo esc_url( $privacy_url ); ?>#scoring-policy" class="btn btn-secondary">
                            <span>Privacy Policy</span>
                        </a>
                    </div>
                </div>

                <div class="app-mockup">
                    <img src="<?php echo esc_url( $scoring_img ); ?>" alt="Taekwondo Scoring Mini App Interface Mockup" class="mockup-frame" loading="lazy">
                </div>
            </article>

        </div>
    </section>

    <!-- SHEF TECH SERVICES CALLOUT -->
    <section style="padding: 4.5rem 0; background: var(--bg-secondary); border-top: 1px solid var(--border-light);">
        <div class="container-narrow" style="text-align: center;">
            <span class="badge badge-dark" style="margin-bottom: 1rem;">CUSTOM SOFTWARE & WEB SERVICES</span>
            <h2 style="font-size: 2rem; margin-bottom: 1rem;">Need a Custom App or Website for Your Academy?</h2>
            <p style="font-size: 1.05rem; color: var(--text-secondary); margin-bottom: 2rem;">
                Shef Tech provides full-stack web and mobile application engineering services. Get in touch to discuss your digital projects.
            </p>
            <a href="mailto:admin@iptaekwondo.in?subject=Inquiry%20for%20Shef%20Tech%20Development" class="btn btn-primary">
                <span>Contact Shef Tech Developers</span>
            </a>
        </div>
    </section>

</main>

<?php
get_footer();
