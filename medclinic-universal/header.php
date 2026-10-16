<?php
/**
 * Header Template for MedClinic Universal
 *
 * @package MedClinic_Universal
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content"><?php esc_html_e('Skip to medical content', 'medclinic-universal'); ?></a>

<?php if (clinic_get_option('enable_ticker', true)) : 
    $ticker_messages = clinic_get_ticker_messages();
?>
    <!-- Slim Announcement / News Ticker Strip -->
    <aside class="clinic-ticker" aria-label="<?php esc_attr_e('Clinic Announcements', 'medclinic-universal'); ?>">
        <div class="clinic-ticker__inner">
            <span class="clinic-ticker__badge">
                <span class="clinic-ticker__dot" aria-hidden="true"></span>
                <span><?php esc_html_e('Notice', 'medclinic-universal'); ?></span>
            </span>
            <div class="clinic-ticker__viewport">
                <div class="clinic-ticker__track">
                    <div class="clinic-ticker__group">
                        <?php foreach ($ticker_messages as $msg) : ?>
                            <span class="clinic-ticker__item"><?php echo esc_html($msg); ?></span>
                            <span class="clinic-ticker__sep" aria-hidden="true">&bull;</span>
                        <?php endforeach; ?>
                    </div>
                    <div class="clinic-ticker__group" aria-hidden="true">
                        <?php foreach ($ticker_messages as $msg) : ?>
                            <span class="clinic-ticker__item"><?php echo esc_html($msg); ?></span>
                            <span class="clinic-ticker__sep" aria-hidden="true">&bull;</span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </aside>
<?php endif; ?>

<!-- Main Clean Header & Navigation -->
<header id="site-header" class="clinic-header" role="banner">
    <div class="clinic-container clinic-header__inner">
        <div class="clinic-header__brand">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="clinic-logo-link" rel="home">
                    <span class="clinic-logo-icon" aria-hidden="true">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                    </span>
                    <span class="clinic-logo-text">
                        <span class="clinic-name"><?php echo esc_html(clinic_get_option('clinic_name', '[CLINIC NAME]')); ?></span>
                        <span class="clinic-tagline"><?php echo esc_html(clinic_get_option('specialty', 'Doctor & Clinic Website Demo')); ?></span>
                    </span>
                </a>
            <?php endif; ?>
        </div>

        <nav id="site-navigation" class="clinic-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'medclinic-universal'); ?>">
            <?php if (has_nav_menu('primary-nav')) : ?>
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary-nav',
                    'menu_class'     => 'clinic-nav__menu',
                    'container'      => false,
                    'depth'          => 2,
                    'fallback_cb'    => false
                ]);
                ?>
            <?php else : ?>
                <ul class="clinic-nav__menu">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="is-active"><?php esc_html_e('Home', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About Clinic', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/doctors/')); ?>"><?php esc_html_e('Doctors', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Services', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Patient FAQs', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Location & Contact', 'medclinic-universal'); ?></a></li>
                </ul>
            <?php endif; ?>
        </nav>

        <div class="clinic-header__actions">
            <a href="tel:<?php echo esc_attr(clinic_get_option('phone_raw', '+15552345678')); ?>" class="clinic-header__phone d-none-tablet" title="<?php esc_attr_e('Call Clinic', 'medclinic-universal'); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <span><?php echo esc_html(clinic_get_option('phone', '+1 (555) 234-5678')); ?></span>
            </a>
            
            <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary clinic-header__cta-btn" aria-label="<?php esc_attr_e('Request Appointment', 'medclinic-universal'); ?>">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <span class="cta-text-full"><?php esc_html_e('Book Appointment', 'medclinic-universal'); ?></span>
                <span class="cta-text-short"><?php esc_html_e('Book', 'medclinic-universal'); ?></span>
            </a>

            <!-- Mobile Hamburger Button -->
            <button class="clinic-nav-toggle" id="clinic-nav-toggle" aria-expanded="false" aria-controls="clinic-mobile-drawer" aria-label="<?php esc_attr_e('Toggle navigation menu', 'medclinic-universal'); ?>">
                <span class="clinic-nav-toggle__bar"></span>
                <span class="clinic-nav-toggle__bar"></span>
                <span class="clinic-nav-toggle__bar"></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="clinic-mobile-drawer" class="clinic-mobile-drawer" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="clinic-mobile-drawer__overlay" id="clinic-drawer-overlay"></div>
    <div class="clinic-mobile-drawer__content">
        <div class="clinic-mobile-drawer__header">
            <span class="clinic-name"><?php echo esc_html(clinic_get_option('clinic_name', '[CLINIC NAME]')); ?></span>
            <button class="clinic-mobile-drawer__close" id="clinic-drawer-close" aria-label="<?php esc_attr_e('Close menu', 'medclinic-universal'); ?>">&times;</button>
        </div>
        <div class="clinic-mobile-drawer__body">
            <ul class="clinic-mobile-nav">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'medclinic-universal'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About Clinic', 'medclinic-universal'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/doctors/')); ?>"><?php esc_html_e('Our Doctors', 'medclinic-universal'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Services & Treatments', 'medclinic-universal'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Patient FAQs', 'medclinic-universal'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Location & Timings', 'medclinic-universal'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy & Patient Rights', 'medclinic-universal'); ?></a></li>
            </ul>

            <div class="clinic-mobile-drawer__actions">
                <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary clinic-btn--full">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span><?php echo esc_html(clinic_get_option('cta_button_text', 'Request Appointment')); ?></span>
                </a>
                <a href="tel:<?php echo esc_attr(clinic_get_option('phone_raw', '+15552345678')); ?>" class="clinic-btn clinic-btn--outline clinic-btn--full">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>Call: <?php echo esc_html(clinic_get_option('phone', '+1 (555) 234-5678')); ?></span>
                </a>
                <a href="https://wa.me/<?php echo esc_attr(clinic_get_option('whatsapp_raw', '15552345678')); ?>" target="_blank" rel="noopener noreferrer" class="clinic-btn clinic-btn--whatsapp clinic-btn--full">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</div>
