<?php
/**
 * Inner Pride Taekwondo Theme functions and definitions
 *
 * @package InnerPride
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'INNERPRIDE_VERSION', '1.0.3' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function innerpride_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 90,
        'width'       => 280,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Switch default core markup for search form, comment form, etc. to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'innerpride' ),
        'footer'  => esc_html__( 'Footer Menu', 'innerpride' ),
    ) );
}
add_action( 'after_setup_theme', 'innerpride_setup' );

/**
 * Enqueue scripts and styles.
 */
function innerpride_scripts() {
    // Google Fonts: Plus Jakarta Sans & Outfit
    wp_enqueue_style(
        'innerpride-google-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme Stylesheet
    wp_enqueue_style(
        'innerpride-style',
        get_stylesheet_uri(),
        array('innerpride-google-fonts'),
        INNERPRIDE_VERSION
    );

    // Theme JavaScript
    wp_enqueue_script(
        'innerpride-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        INNERPRIDE_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'innerpride_scripts' );

/**
 * Fallback menu if no WordPress menu is assigned yet
 */
function innerpride_default_menu() {
    echo '<ul class="primary-menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#about' ) ) . '">About</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#coach' ) ) . '">Coach</a></li>';
    echo '<li><a href="' . esc_url( get_template_directory_uri() . '/coach-portfolio.html' ) . '" target="_blank" style="color: var(--accent-red); font-weight: 700;">🏫 School Portfolio</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#achievements' ) ) . '">Achievements</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#programs' ) ) . '">Programs</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#schedule' ) ) . '">Schedule</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#gallery' ) ) . '">Gallery</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#contact' ) ) . '">Contact</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/apps/' ) ) . '" style="color: var(--text-secondary); font-weight: 600;">Shef Tech</a></li>';
    echo '</ul>';
}

/**
 * Customizer settings for Apps and Academy details
 */
function innerpride_customize_register( $wp_customize ) {
    // Panel or Section for App Settings
    $wp_customize->add_section( 'innerpride_apps_section', array(
        'title'       => __( 'Inner Pride Apps & Links', 'innerpride' ),
        'priority'    => 30,
        'description' => __( 'Manage links and information for your mobile applications.', 'innerpride' ),
    ) );

    // App 1: My Dojang Attendance
    $wp_customize->add_setting( 'app1_play_store_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'app1_play_store_url', array(
        'label'    => __( 'My Dojang Attendance - Play Store URL', 'innerpride' ),
        'section'  => 'innerpride_apps_section',
        'type'     => 'url',
    ) );

    // App 2: Taekwondo Scoring Mini
    $wp_customize->add_setting( 'app2_play_store_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'app2_play_store_url', array(
        'label'    => __( 'Taekwondo Scoring Mini - Play Store URL', 'innerpride' ),
        'section'  => 'innerpride_apps_section',
        'type'     => 'url',
    ) );

    // Academy Contact Settings
    $wp_customize->add_section( 'innerpride_contact_section', array(
        'title'    => __( 'Academy Contact & Support', 'innerpride' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'academy_email', array(
        'default'           => 'admin@iptaekwondo.in',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'academy_email', array(
        'label'    => __( 'Support Email Address', 'innerpride' ),
        'section'  => 'innerpride_contact_section',
        'type'     => 'email',
    ) );

    $wp_customize->add_setting( 'academy_phone', array(
        'default'           => '+91 7309595831',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'academy_phone', array(
        'label'    => __( 'Phone / WhatsApp', 'innerpride' ),
        'section'  => 'innerpride_contact_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'academy_address', array(
        'default'           => 'DAV College Ground, Meerapur, Prayagraj, Uttar Pradesh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'academy_address', array(
        'label'    => __( 'Academy Address', 'innerpride' ),
        'section'  => 'innerpride_contact_section',
        'type'     => 'text',
    ) );

    // -------------------------------------------------------------
    // Coach Profile, Medals & Gallery Media Uploads (No-Code updates)
    // -------------------------------------------------------------
    $wp_customize->add_section( 'innerpride_media_section', array(
        'title'       => __( 'Inner Pride - Coach Photos & Wall of Fame', 'innerpride' ),
        'priority'    => 40,
        'description' => __( 'Upload your latest tournament medals, coach photos, and dojang pictures directly from your computer or phone.', 'innerpride' ),
    ) );

    // Coach Photo
    $wp_customize->add_setting( 'coach_photo', array(
        'default'           => get_template_directory_uri() . '/assets/images/coach-haseeb.png',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'coach_photo', array(
        'label'       => __( 'Coach Haseeb Photo', 'innerpride' ),
        'section'     => 'innerpride_media_section',
        'settings'    => 'coach_photo',
        'description' => __( 'Upload transparent PNG or photo in Dobok uniform.', 'innerpride' ),
    ) ) );

    // Coach CV / PDF
    $wp_customize->add_setting( 'coach_cv_pdf', array(
        'default'           => get_template_directory_uri() . '/assets/coach-profile-haseeb-ahmad.pdf',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'coach_cv_pdf', array(
        'label'       => __( 'Coach CV / School Proposal PDF', 'innerpride' ),
        'section'     => 'innerpride_media_section',
        'settings'    => 'coach_cv_pdf',
        'description' => __( 'Upload your updated resume or school demo proposal PDF.', 'innerpride' ),
    ) ) );

    // Star Athlete Spotlight: Avika Kilam CBSE Gold
    $wp_customize->add_setting( 'avika_cbse_gold', array(
        'default'           => get_template_directory_uri() . '/assets/images/avika-kilam-spotlight.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avika_cbse_gold', array(
        'label'       => __( 'Star Athlete Spotlight (Avika Kilam - CBSE East Zone Gold)', 'innerpride' ),
        'section'     => 'innerpride_media_section',
        'settings'    => 'avika_cbse_gold',
        'description' => __( 'Featured champion banner photo on Wall of Fame.', 'innerpride' ),
    ) ) );

    // BHU Varanasi Tournament Champions
    $wp_customize->add_setting( 'bhu_champions', array(
        'default'           => get_template_directory_uri() . '/assets/images/bhu-varanasi-champions.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhu_champions', array(
        'label'       => __( 'BHU Varanasi Champions (Wall of Fame Card 1)', 'innerpride' ),
        'section'     => 'innerpride_media_section',
        'settings'    => 'bhu_champions',
        'description' => __( 'Photo of student champions on stage at BHU Varanasi tournament.', 'innerpride' ),
    ) ) );

    // Student Medalists Photo
    $wp_customize->add_setting( 'student_medalists', array(
        'default'           => get_template_directory_uri() . '/assets/images/student-medalists.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'student_medalists', array(
        'label'       => __( 'District Champions Photo (Wall of Fame Card 2)', 'innerpride' ),
        'section'     => 'innerpride_media_section',
        'settings'    => 'student_medalists',
        'description' => __( 'Photo of students at District Taekwondo Championship.', 'innerpride' ),
    ) ) );

    // Taqwa Islamic School Squad
    $wp_customize->add_setting( 'taqwa_medalists', array(
        'default'           => get_template_directory_uri() . '/assets/images/taqwa-school-medalists.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'taqwa_medalists', array(
        'label'       => __( 'Taqwa School Medalists (Wall of Fame Card 3)', 'innerpride' ),
        'section'     => 'innerpride_media_section',
        'settings'    => 'taqwa_medalists',
        'description' => __( 'Photo of student champions in hijab Dobok on tournament mat.', 'innerpride' ),
    ) ) );

    // Student Parents & Champions Photo
    $wp_customize->add_setting( 'student_parents', array(
        'default'           => get_template_directory_uri() . '/assets/images/student-parents-champions.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'student_parents', array(
        'label'       => __( 'Proud Parents & Athletes Photo (Wall of Fame Card 4)', 'innerpride' ),
        'section'     => 'innerpride_media_section',
        'settings'    => 'student_parents',
        'description' => __( 'Photo of students celebrating achievements with their parents.', 'innerpride' ),
    ) ) );

    // Gallery Photo 1
    $wp_customize->add_setting( 'training_1', array(
        'default'           => get_template_directory_uri() . '/assets/images/training-1.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'training_1', array(
        'label'    => __( 'Gallery Photo 1 (Training)', 'innerpride' ),
        'section'  => 'innerpride_media_section',
        'settings' => 'training_1',
    ) ) );

    // Gallery Photo 2
    $wp_customize->add_setting( 'training_2', array(
        'default'           => get_template_directory_uri() . '/assets/images/training-2.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'training_2', array(
        'label'    => __( 'Gallery Photo 2 (Banner / Academy)', 'innerpride' ),
        'section'  => 'innerpride_media_section',
        'settings' => 'training_2',
    ) ) );

    // Gallery Photo 3
    $wp_customize->add_setting( 'training_3', array(
        'default'           => get_template_directory_uri() . '/assets/images/training-3.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'training_3', array(
        'label'    => __( 'Gallery Photo 3 (Sparring / Drills)', 'innerpride' ),
        'section'  => 'innerpride_media_section',
        'settings' => 'training_3',
    ) ) );
}
add_action( 'customize_register', 'innerpride_customize_register' );

/**
 * Ensure front-page.php is always served on the homepage,
 * even if a legacy static page (like an old Elementor canvas/fullwidth page) was previously assigned.
 */
function innerpride_force_front_page_template( $template ) {
    if ( is_front_page() || is_home() ) {
        $front_page = get_template_directory() . '/front-page.php';
        if ( file_exists( $front_page ) ) {
            return $front_page;
        }
    }
    return $template;
}
add_filter( 'template_include', 'innerpride_force_front_page_template', 9999 );
