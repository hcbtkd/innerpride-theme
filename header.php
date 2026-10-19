<?php
/**
 * Header template for Inner Pride Taekwondo Theme
 *
 * @package InnerPride
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/academy-logo.png' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <!-- Backdrop Overlay for Mobile Drawer -->
    <div class="nav-overlay" id="nav-overlay"></div>

    <div class="container header-container">
        <!-- Site Branding / Logo -->
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                $default_logo = get_template_directory_uri() . '/assets/images/academy-logo.png';
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="default-brand-link" rel="home">
                    <div class="site-logo-wrap">
                        <img src="<?php echo esc_url( $default_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="site-logo-img">
                    </div>
                    <div class="site-branding-text">
                        <span class="site-title-name"><?php echo get_bloginfo( 'name' ) ? esc_html( get_bloginfo( 'name' ) ) : 'Inner Pride'; ?></span>
                        <span class="site-title-tagline">Taekwondo Academy</span>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>

        <!-- Navigation Drawer (Desktop & Mobile Slide-in) -->
        <nav class="site-nav" id="site-nav" aria-label="<?php esc_attr_e( 'Main Menu', 'innerpride' ); ?>">
            <!-- Mobile Drawer Header -->
            <div class="mobile-drawer-header">
                <div style="display: flex; align-items: center; gap: 0.65rem;">
                    <div class="site-logo-wrap" style="width: 32px; height: 32px; border-radius: 8px;">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/academy-logo.png' ); ?>" alt="Inner Pride Logo" style="width: 22px; height: 22px; object-fit: contain;">
                    </div>
                    <span style="font-family: var(--font-heading); font-weight: 800; font-size: 1rem;">Inner Pride</span>
                </div>
                <button class="drawer-close-btn" id="drawer-close-btn" type="button" aria-label="Close menu" onclick="const n=document.getElementById('site-nav'),o=document.getElementById('nav-overlay');if(n)n.classList.remove('is-open');if(o)o.classList.remove('is-active');document.body.classList.remove('nav-drawer-open');document.body.style.overflow='';" ontouchend="const n=document.getElementById('site-nav'),o=document.getElementById('nav-overlay');if(n)n.classList.remove('is-open');if(o)o.classList.remove('is-active');document.body.classList.remove('nav-drawer-open');document.body.style.overflow='';">&times;</button>
            </div>

            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu',
                    'fallback_cb'    => 'innerpride_default_menu',
                ) );
            } else {
                innerpride_default_menu();
            }
            ?>

            <!-- Mobile Drawer Footer Actions -->
            <div class="drawer-footer-actions">
                <a href="#trialBookingModal" class="btn btn-red open-trial-modal" style="width: 100%; font-size: 0.9rem;">
                    <span>🥋 Book Free Trial Class</span>
                </a>
                <a href="<?php echo esc_url( get_template_directory_uri() . '/coach-portfolio.html' ); ?>" target="_blank" class="btn btn-secondary" style="width: 100%; font-size: 0.9rem;">
                    <span>🏫 School Tie-Up Portfolio</span>
                </a>
            </div>
        </nav>

        <!-- Right Side Header Actions -->
        <div class="header-actions">
            <a href="#trialBookingModal" class="btn btn-red btn-sm open-trial-modal">
                <span>Book Free Trial</span>
                <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
            
            <!-- Mobile Menu Toggle Button -->
            <button class="menu-toggle-btn" id="menu-toggle-btn" aria-label="<?php esc_attr_e( 'Toggle navigation', 'innerpride' ); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>
</header>
