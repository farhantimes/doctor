<?php
/**
 * MedClinic Universal Theme Functions
 *
 * @package MedClinic_Universal
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('MEDCLINIC_VERSION', '1.0.0');
define('MEDCLINIC_DIR', get_template_directory());
define('MEDCLINIC_URI', get_template_directory_uri());

/**
 * Safe Helper to retrieve clinic configuration options
 */
function clinic_get_option($key, $default = '') {
    // If companion plugin is active, it saves in 'clinic_website_options'
    $options = get_option('clinic_website_options', []);
    if (is_array($options) && isset($options[$key]) && $options[$key] !== '') {
        return $options[$key];
    }
    
    // Theme defaults
    $defaults = [
        'clinic_name'           => '[CLINIC NAME]',
        'clinic_tagline'        => 'Doctor & Clinic Website Demo',
        'specialty'             => 'General Medicine & Family Clinic',
        'specialty_slug'        => 'general',
        'primary_color'         => '#0d9488', // Medical Teal
        'primary_dark'          => '#0f766e',
        'secondary_color'       => '#0f172a', // Deep Slate Navy
        'accent_color'          => '#0284c7', // Sky Medical Blue
        'bg_color'              => '#ffffff',
        'bg_alt_color'          => '#f8fafc',
        'text_color'            => '#1e293b',
        'phone'                 => '+1 (555) 234-5678',
        'phone_raw'             => '+15552345678',
        'whatsapp'              => '+1 (555) 234-5678',
        'whatsapp_raw'          => '15552345678',
        'email'                 => 'care@clinicdemocare.org',
        'address'               => 'Suite 400, Medical Arts Pavilion, Healthcare Blvd',
        'city_state_zip'        => 'Medical City, MC 90210',
        'opening_hours'         => 'Mon - Fri: 8:00 AM - 6:30 PM | Sat: 9:00 AM - 2:00 PM',
        'sunday_hours'          => 'Sunday: Emergency / On-Call Only',
        'demo_mode'             => true,
        'demo_badge_text'       => 'Website Concept Demo',
        'emergency_guidance'    => 'If you are experiencing a life-threatening medical emergency, chest pain, severe shortness of breath or trauma, immediately call 911 or visit your nearest emergency room.',
        'doctor_name'           => 'Dr. Jonathan Miller, MD',
        'doctor_qualifications' => 'MBBS, MD (Internal Medicine), FACP',
        'doctor_registration'   => 'Reg. No. MC-849204 (State Medical Council)',
        'doctor_specialty'      => 'Senior Consultant Physician',
        'doctor_experience'     => '16+ Years Clinical Practice',
        'doctor_languages'      => 'English, Spanish',
        'doctor_bio'            => 'Dedicated to holistic, evidence-based patient healthcare with a focus on comprehensive preventive medicine, chronic illness management, and patient-centered diagnostic consultations.',
        'hero_heading'          => 'Advanced, Compassionate Healthcare for You & Your Family',
        'hero_subheading'       => 'Experience personalized medical consultations, minimal wait times, state-of-the-art diagnostic facilities, and dedicated physician care designed around your comfort.',
        'hero_image'            => MEDCLINIC_URI . '/assets/images/doctor-hero.png',
        'reception_image'       => MEDCLINIC_URI . '/assets/images/clinic-reception.png',
        'consultation_image'    => MEDCLINIC_URI . '/assets/images/clinic-consultation.png',
        'cta_button_text'       => 'Request an Appointment',
        'cta_secondary_text'    => 'View All Treatments',
        'enable_ticker'         => true,
        'ticker_messages'       => "Appointment requests are welcome.\nView our clinic hours.\nContact the clinic for appointment assistance.\nExplore our medical services."
    ];
    
    return isset($defaults[$key]) ? $defaults[$key] : $default;
}

/**
 * Check if demo mode is enabled
 */
function clinic_is_demo_mode() {
    return (bool) clinic_get_option('demo_mode', true);
}

/**
 * Get ticker messages as clean array
 */
function clinic_get_ticker_messages() {
    $raw = clinic_get_option('ticker_messages', '');
    if (empty($raw)) {
        return [
            'Appointment requests are welcome.',
            'View our clinic hours: ' . clinic_get_option('opening_hours', 'Mon - Fri: 8:00 AM - 6:30 PM'),
            'Contact the clinic for appointment assistance: ' . clinic_get_option('phone', '+1 (555) 234-5678'),
            'Explore our comprehensive medical services.'
        ];
    }
    $lines = array_filter(array_map('trim', explode("\n", $raw)));
    return !empty($lines) ? $lines : [
        'Appointment requests are welcome.',
        'View our clinic hours.',
        'Contact the clinic for appointment assistance.',
        'Explore our medical services.'
    ];
}

/**
 * Setup Theme
 */
function medclinic_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Title tag support
    add_theme_support('title-tag');

    // Post thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 600, true);
    add_image_size('clinic-card', 600, 400, true);
    add_image_size('clinic-doctor', 600, 750, true);
    add_image_size('clinic-hero', 1440, 900, true);

    // Register Menus
    register_nav_menus([
        'primary-nav'   => __('Primary Header Navigation', 'medclinic-universal'),
        'mobile-nav'    => __('Mobile Navigation Drawer', 'medclinic-universal'),
        'footer-links'  => __('Footer Quick Links', 'medclinic-universal'),
        'footer-legal'  => __('Footer Legal & Policies', 'medclinic-universal')
    ]);

    // HTML5 markup support
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);

    // Custom logo
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 260,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Gutenberg wide alignment
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'medclinic_setup');

/**
 * Enqueue scripts and styles
 */
function medclinic_scripts() {
    // Google Fonts: Outfit (Headings) + Plus Jakarta Sans (Body)
    wp_enqueue_style(
        'medclinic-google-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // Main style
    wp_enqueue_style('medclinic-style', get_stylesheet_uri(), [], MEDCLINIC_VERSION);

    // Theme Module Styles
    wp_enqueue_style('medclinic-main', MEDCLINIC_URI . '/assets/css/main.css', ['medclinic-style'], MEDCLINIC_VERSION);
    wp_enqueue_style('medclinic-header-footer', MEDCLINIC_URI . '/assets/css/header-footer.css', ['medclinic-main'], MEDCLINIC_VERSION);
    wp_enqueue_style('medclinic-homepage', MEDCLINIC_URI . '/assets/css/homepage.css', ['medclinic-main'], MEDCLINIC_VERSION);
    wp_enqueue_style('medclinic-appointment', MEDCLINIC_URI . '/assets/css/appointment-form.css', ['medclinic-main'], MEDCLINIC_VERSION);
    wp_enqueue_style('medclinic-responsive', MEDCLINIC_URI . '/assets/css/responsive.css', ['medclinic-main'], MEDCLINIC_VERSION);

    // Dynamic CSS Injection for centralized branding colors
    $primary    = esc_attr(clinic_get_option('primary_color', '#0d9488'));
    $primary_dk = esc_attr(clinic_get_option('primary_dark', '#0f766e'));
    $secondary  = esc_attr(clinic_get_option('secondary_color', '#0f172a'));
    $accent     = esc_attr(clinic_get_option('accent_color', '#0284c7'));
    $bg_color   = esc_attr(clinic_get_option('bg_color', '#ffffff'));
    $bg_alt     = esc_attr(clinic_get_option('bg_alt_color', '#f8fafc'));
    $text_color = esc_attr(clinic_get_option('text_color', '#1e293b'));

    $custom_css = "
        :root {
            --clinic-primary: {$primary};
            --clinic-primary-dark: {$primary_dk};
            --clinic-secondary: {$secondary};
            --clinic-accent: {$accent};
            --clinic-bg: {$bg_color};
            --clinic-bg-alt: {$bg_alt};
            --clinic-text: {$text_color};
        }
    ";
    wp_add_inline_style('medclinic-main', $custom_css);

    // Theme JavaScript
    wp_enqueue_script(
        'medclinic-main-js',
        MEDCLINIC_URI . '/assets/js/clinic-main.js',
        [],
        MEDCLINIC_VERSION,
        true
    );

    wp_localize_script('medclinic-main-js', 'clinicData', [
        'ajaxUrl'      => admin_url('admin-ajax.php'),
        'nonce'        => wp_create_nonce('clinic_appointment_nonce'),
        'isDemo'       => clinic_is_demo_mode(),
        'whatsappRaw'  => esc_attr(clinic_get_option('whatsapp_raw', '15552345678')),
        'clinicName'   => esc_attr(clinic_get_option('clinic_name', '[CLINIC NAME]')),
        'phoneRaw'     => esc_attr(clinic_get_option('phone_raw', '+15552345678'))
    ]);
}
add_action('wp_enqueue_scripts', 'medclinic_scripts');

/**
 * Register Gutenberg Block Pattern Categories
 */
function medclinic_register_pattern_categories() {
    register_block_pattern_category('clinic-hero', [
        'label' => __('Clinic Hero Banners', 'medclinic-universal')
    ]);
    register_block_pattern_category('clinic-services', [
        'label' => __('Clinic Services & Treatments', 'medclinic-universal')
    ]);
    register_block_pattern_category('clinic-doctors', [
        'label' => __('Doctor Profiles & Staff', 'medclinic-universal')
    ]);
    register_block_pattern_category('clinic-trust', [
        'label' => __('Why Choose Us & Facilities', 'medclinic-universal')
    ]);
    register_block_pattern_category('clinic-appointment', [
        'label' => __('Appointment Request CTAs', 'medclinic-universal')
    ]);
}
add_action('init', 'medclinic_register_pattern_categories');

/**
 * Output Schema.org JSON-LD in head
 */
function medclinic_output_schema() {
    $clinic_name = esc_attr(clinic_get_option('clinic_name', '[CLINIC NAME]'));
    $specialty   = esc_attr(clinic_get_option('specialty', 'General Medicine'));
    $phone       = esc_attr(clinic_get_option('phone', '+1 (555) 234-5678'));
    $address     = esc_attr(clinic_get_option('address', 'Medical Arts Pavilion'));
    $city_state  = esc_attr(clinic_get_option('city_state_zip', 'Medical City, MC 90210'));
    $url         = esc_url(home_url('/'));
    $hours       = esc_attr(clinic_get_option('opening_hours', 'Mon-Fri 08:00-18:30'));

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'MedicalBusiness',
        'name'     => $clinic_name,
        'medicalSpecialty' => $specialty,
        'url'      => $url,
        'telephone'=> $phone,
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => $address,
            'addressLocality' => $city_state
        ],
        'openingHours' => $hours
    ];

    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'medclinic_output_schema', 20);
