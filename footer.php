<?php
/**
 * Footer template for Inner Pride Taekwondo Theme
 *
 * @package InnerPride
 */

$app1_link = get_theme_mod( 'app1_play_store_url', '#' );
$app2_link = get_theme_mod( 'app2_play_store_url', '#' );
$academy_email = get_theme_mod( 'academy_email', 'admin@iptaekwondo.in' );
$academy_phone = get_theme_mod( 'academy_phone', '+91 7309595831' );
$clean_phone   = preg_replace( '/[^0-9]/', '', $academy_phone );
$privacy_page_id = get_option( 'wp_page_for_privacy_policy' );
$privacy_url = $privacy_page_id ? get_permalink( $privacy_page_id ) : home_url( '/#privacy' );
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Col 1: About Inner Pride -->
            <div class="footer-col footer-about">
                <h4>Inner Pride Taekwondo</h4>
                <p>Empowering students and martial arts practitioners through disciplined physical training, sports excellence, and purpose-built digital apps for dojangs worldwide.</p>
                <div style="margin-top: 1rem;">
                    <span class="badge badge-dark">🥋 Traditional Discipline • Modern Tech</span>
                </div>
            </div>

            <!-- Col 2: Academy Programs -->
            <div class="footer-col">
                <h4>Training Programs</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/#programs' ) ); ?>">Kids Martial Arts (4-12 yrs)</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#programs' ) ); ?>">Teens & Adult Fitness</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#programs' ) ); ?>">Olympic Sparring (Kyorugi)</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#schedule' ) ); ?>">Batch Schedule & Timings</a></li>
                    <li><a href="<?php echo esc_url( get_template_directory_uri() . '/coach-portfolio.html' ); ?>" target="_blank" style="color: var(--accent-red); font-weight: 600;">🏫 School Tie-Up Portfolio</a></li>
                </ul>
            </div>

            <!-- Col 3: Tech Wing (Shef Tech) -->
            <div class="footer-col">
                <h4>Shef Tech (Apps Wing)</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/apps/' ) ); ?>">Shef Tech Mobile Apps</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/apps/#app-attendance' ) ); ?>">My Dojang Attendance App</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/apps/#app-scoring' ) ); ?>">Taekwondo Scoring Mini App</a></li>
                    <li><a href="<?php echo esc_url( $privacy_url ); ?>">Apps Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Col 4: Support & Contact -->
            <div class="footer-col">
                <h4>Support & Contact</h4>
                <ul class="footer-links">
                    <li><a href="mailto:<?php echo esc_attr( $academy_email ); ?>"><?php echo esc_html( $academy_email ); ?></a></li>
                    <li><a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $academy_phone ) ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $academy_phone ); ?> (WhatsApp)</a></li>
                    <li><a href="https://www.instagram.com/ip_taekwondo/" target="_blank" rel="noopener">Follow @ip_taekwondo</a></li>
                    <li><span style="color: var(--text-muted); font-size: 0.92rem;"><?php echo esc_html( get_theme_mod( 'academy_address', 'DAV College Ground, Meerapur, Prayagraj' ) ); ?></span></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo get_bloginfo( 'name' ) ? esc_html( get_bloginfo( 'name' ) ) : 'Inner Pride Taekwondo Academy'; ?>. All rights reserved.</p>
            <p>Designed with clean code for speed, elegance, and mobile readiness.</p>
        </div>
    </div>
</footer>

<!-- Floating Sticky Bottom Bar for Mobile Devices -->
<div class="mobile-sticky-bottom-bar">
    <a href="#trialBookingModal" class="mobile-bar-btn mobile-bar-whatsapp open-trial-modal">
        <svg viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.861.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.072.043.419-.101.824z"/></svg>
        <span>Free Trial</span>
    </a>
    <a href="tel:+<?php echo esc_attr( $clean_phone ); ?>" class="mobile-bar-btn mobile-bar-call">
        <svg viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
        <span>Call Coach</span>
    </a>
</div>

<!-- INTERACTIVE BOOK FREE TRIAL MODAL -->
<div class="trial-modal-backdrop" id="trialBookingModal" role="dialog" aria-modal="true" aria-labelledby="trialModalTitle">
    <div class="trial-modal-box">
        <div class="trial-modal-header">
            <h3 id="trialModalTitle">🥋 Book a Free Trial Class</h3>
            <p>Experience Olympic-style Taekwondo at DAV College Ground, Meerapur</p>
            <button class="trial-modal-close-btn" id="trialModalCloseBtn" aria-label="Close modal">&times;</button>
        </div>
        <div class="trial-modal-body">
            <form id="trialBookingForm">
                <div class="trial-form-group">
                    <label for="trialParentName">Parent / Guardian Name *</label>
                    <input type="text" id="trialParentName" class="trial-form-input" placeholder="e.g., Rajesh Kumar" required>
                </div>
                <div class="trial-form-row">
                    <div class="trial-form-group">
                        <label for="trialStudentName">Student's Name *</label>
                        <input type="text" id="trialStudentName" class="trial-form-input" placeholder="e.g., Aarav Kumar" required>
                    </div>
                    <div class="trial-form-group">
                        <label for="trialStudentAge">Student Age *</label>
                        <input type="number" id="trialStudentAge" class="trial-form-input" placeholder="e.g., 8" min="4" max="50" required>
                    </div>
                </div>
                <div class="trial-form-group">
                    <label for="trialBatch">Preferred Training Batch *</label>
                    <select id="trialBatch" class="trial-form-select" required>
                        <option value="Junior Kids Batch (Ages 4-12) • 5:00 PM - 6:30 PM">Junior Kids Batch (Ages 4-12) • 5:00 PM - 6:30 PM</option>
                        <option value="Teens & Adult Batch (Ages 13+) • 6:30 PM - 8:00 PM">Teens & Adult Batch (Ages 13+) • 6:30 PM - 8:00 PM</option>
                        <option value="Morning Fitness Batch • 6:00 AM - 7:30 AM">Morning Fitness Batch • 6:00 AM - 7:30 AM</option>
                        <option value="Girls & Women Self-Defense Batch">Girls & Women Self-Defense Batch</option>
                    </select>
                </div>
                <div class="trial-form-group">
                    <label for="trialPhone">WhatsApp / Mobile Number *</label>
                    <input type="tel" id="trialPhone" class="trial-form-input" placeholder="e.g., +91 98765 43210" required>
                </div>
                <button type="submit" class="trial-form-submit-btn">
                    <span>Confirm Free Trial on WhatsApp</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.861.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.072.043.419-.101.824z"/></svg>
                </button>
                <p class="trial-form-note">🔒 Zero commitment. 100% Free 1-Day Trial. We never spam.</p>
            </form>
        </div>
    </div>
</div>

<!-- FULLSCREEN GALLERY LIGHTBOX MODAL -->
<div class="gallery-lightbox-modal" id="galleryLightboxModal" role="dialog" aria-modal="true">
    <button class="lightbox-close-btn" id="lightboxCloseBtn" aria-label="Close Lightbox">&times;</button>
    <button class="lightbox-nav-btn lightbox-prev-btn" id="lightboxPrevBtn" aria-label="Previous Photo">&#8249;</button>
    <button class="lightbox-nav-btn lightbox-next-btn" id="lightboxNextBtn" aria-label="Next Photo">&#8250;</button>
    <div class="lightbox-content-wrap">
        <img src="" alt="Enlarged Gallery Photo" class="lightbox-img" id="lightboxImg">
        <div class="lightbox-caption-bar">
            <p class="lightbox-caption-text" id="lightboxCaption"></p>
            <span class="lightbox-counter" id="lightboxCounter">1 / 8</span>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
