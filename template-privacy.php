<?php
/**
 * Template Name: Apps Privacy Policy & Legal
 * Description: Dedicated Privacy Policy template for Google Play Store and App Store compliance.
 *
 * @package InnerPride
 */

get_header();

$academy_email = get_theme_mod( 'academy_email', 'admin@iptaekwondo.in' );
$academy_phone = get_theme_mod( 'academy_phone', '+91 7309595831' );
$academy_address = get_theme_mod( 'academy_address', 'DAV College Ground, Meerapur, Prayagraj' );
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container-narrow">
            <span class="badge badge-red" style="margin-bottom: 0.75rem;">GOOGLE PLAY & REGULATORY COMPLIANCE</span>
            <h1 class="page-hero-title">Privacy Policy & Data Safety</h1>
            <p class="page-hero-meta">Last Updated: October 2026 • Inner Pride Taekwondo Academy</p>
        </div>
    </section>

    <section class="page-content-wrapper">
        <div class="container-narrow">

            <!-- Policy Navigation Tabs -->
            <div class="legal-tabs" role="tablist">
                <button class="legal-tab-btn active" data-tab="all-policy">All Applications Overview</button>
                <button class="legal-tab-btn" data-tab="attendance-policy">My Dojang Attendance App</button>
                <button class="legal-tab-btn" data-tab="scoring-policy">Taekwondo Scoring Mini App</button>
            </div>

            <article class="legal-article">

                <!-- OVERVIEW TAB CONTENT -->
                <div id="all-policy" class="policy-block active">
                    <h2>1. Overview & Developer Identity</h2>
                    <p>
                        This Privacy Policy describes the policies and practices of <strong>Shef Tech</strong> ("Developer", "we", "us", or "our") and our partnership with <strong>Inner Pride Taekwondo Academy</strong> regarding the collection, use, and disclosure of information when you download, install, and use our mobile applications, including:
                    </p>
                    <ul>
                        <li><strong>My Dojang Attendance App</strong> (Developed by Shef Tech)</li>
                        <li><strong>Taekwondo Scoring Mini App</strong> (Developed by Shef Tech)</li>
                    </ul>
                    <p>
                        Shef Tech is committed to protecting your digital privacy. Our applications are built with privacy-first and offline-first principles. We do not sell your personal data to any third parties.
                    </p>

                    <h2>2. Core Privacy Commitments</h2>
                    <ul>
                        <li><strong>No Data Brokering:</strong> We never sell, rent, or trade student or athlete information to advertisers or brokers.</li>
                        <li><strong>Minimal Data Collection:</strong> Our apps only collect the minimum information required to operate core features (such as attendance marking or match timing).</li>
                        <li><strong>On-Device / Secure Storage:</strong> Attendance records and match histories are stored locally on your device or securely transmitted only when backup features are explicitly enabled.</li>
                    </ul>

                    <h2>3. Children's Privacy (COPPA Compliance)</h2>
                    <p>
                        Inner Pride Taekwondo Academy provides martial arts training and tools for students of all ages, including children under 13. When <em>My Dojang Attendance App</em> is used to track student attendance for junior classes, student names and attendance marks are entered and managed solely by the dojang instructor or academy administrator. We do not knowingly collect personal contact information directly from children under 13.
                    </p>

                    <h2>4. Data Retention and Deletion Requests</h2>
                    <p>
                        Users have the right to request deletion of any data associated with them. Since our apps store data locally on your device, uninstalling the application or clearing the application data in Android/iOS settings permanently deletes all stored records.
                    </p>
                    <p>
                        If you have submitted data to our online servers or need assistance deleting your records, please email us directly at:
                        <a href="mailto:<?php echo esc_attr( $academy_email ); ?>"><strong><?php echo esc_html( $academy_email ); ?></strong></a> with the subject line <em>"Data Deletion Request"</em>.
                    </p>
                </div>

                <!-- ATTENDANCE APP TAB CONTENT -->
                <div id="attendance-policy" class="policy-block">
                    <span class="badge badge-blue" style="margin-bottom: 0.75rem;">SPECIFIC TO THIS APP</span>
                    <h2>My Dojang Attendance App - Privacy Policy</h2>
                    <p>
                        <em>My Dojang Attendance App</em> is designed to assist Taekwondo masters, coaches, and academy managers in tracking student class attendance, batch schedules, and belt progression.
                    </p>

                    <h3>A. Information We Process</h3>
                    <ul>
                        <li><strong>Student Profiles:</strong> Student full name, roll/ID number, belt rank, batch timing, and attendance logs. This information is input directly by the coach/instructor.</li>
                        <li><strong>Camera Permission (Optional):</strong> If QR-code or barcode attendance scanning is enabled, camera permission is requested solely for scanning attendance cards on the fly. No video or photos are saved or uploaded.</li>
                        <li><strong>Storage / Files Permission (Optional):</strong> Required only if you choose to export attendance reports to Excel / CSV or PDF on your device storage.</li>
                    </ul>

                    <h3>B. How Information is Used</h3>
                    <p>
                        The collected information is used strictly to calculate attendance percentages, track student belt grading eligibility, and generate batch rosters for your academy.
                    </p>

                    <h3>C. Third-Party Services</h3>
                    <p>
                        The core app does not use third-party analytics SDKs, trackers, or behavioral advertising. If crash reporting is enabled via Google Play Services, it collects standard anonymized device diagnostic logs to help fix bugs.
                    </p>
                </div>

                <!-- SCORING APP TAB CONTENT -->
                <div id="scoring-policy" class="policy-block">
                    <span class="badge badge-red" style="margin-bottom: 0.75rem;">SPECIFIC TO THIS APP</span>
                    <h2>Taekwondo Scoring Mini App - Privacy Policy</h2>
                    <p>
                        <em>Taekwondo Scoring Mini App</em> is a digital scoreboard and match management utility designed for World Taekwondo sparring (Kyorugi) and tournament referees.
                    </p>

                    <h3>A. Information Handled</h3>
                    <ul>
                        <li><strong>Match Scores & Timers:</strong> Hong (Red) and Chung (Blue) athlete point tallies, Gam-jeom penalty counts, round duration, and bout history.</li>
                        <li><strong>No Personal Identity Required:</strong> You do not need to register an account, sign in, or provide any personal details (such as email, phone number, or government ID) to use the app.</li>
                    </ul>

                    <h3>B. Permissions Required</h3>
                    <ul>
                        <li><strong>Wake Lock / Keep Screen On:</strong> Keeps your screen awake during live matches so the timer and scores do not turn off mid-bout.</li>
                        <li><strong>Audio / Haptic Feedback:</strong> Used to trigger buzzer sounds and tactile vibrations when match timers expire.</li>
                    </ul>

                    <h3>C. Advertising & Analytics</h3>
                    <p>
                        The application does not run invasive trackers. No personal user data is collected, sold, or shared with third parties.
                    </p>
                </div>

                <hr style="border: none; border-top: 1px solid var(--border-light); margin: 2.5rem 0 1.5rem;">

                <h2>Contact Information</h2>
                <p>
                    If you have questions, feedback, or legal inquiries regarding this Privacy Policy or our mobile applications, please contact:
                </p>
                <p>
                    <strong>Inner Pride Taekwondo Academy</strong><br>
                    Location: <?php echo esc_html( $academy_address ); ?><br>
                    Phone / WhatsApp: <?php echo esc_html( $academy_phone ); ?><br>
                    Email: <a href="mailto:<?php echo esc_attr( $academy_email ); ?>"><?php echo esc_html( $academy_email ); ?></a><br>
                    Website: <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_url( home_url( '/' ) ); ?></a>
                </p>

            </article>

        </div>
    </section>

</main>

<?php
get_footer();
