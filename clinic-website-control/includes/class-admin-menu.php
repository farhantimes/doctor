<?php
/**
 * Admin Menu & Settings Interface for Clinic Website Control
 *
 * @package Clinic_Website_Control
 */

if (!defined('ABSPATH')) {
    exit;
}

class CWC_Admin_Menu {

    public function __construct() {
        add_action('admin_menu', [$this, 'register_admin_pages']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function register_admin_pages() {
        // Top-Level Menu
        add_menu_page(
            __('Clinic Website Control', 'clinic-website-control'),
            __('Clinic Control', 'clinic-website-control'),
            'manage_options',
            'clinic-control',
            [$this, 'render_main_settings_page'],
            'dashicons-shield-alt',
            3
        );

        // Submenu 1: Main Settings / Identity
        add_submenu_page(
            'clinic-control',
            __('Clinic Website Settings', 'clinic-website-control'),
            __('General Settings', 'clinic-website-control'),
            'manage_options',
            'clinic-control',
            [$this, 'render_main_settings_page']
        );

        // Submenu 2: 1-Click Rebrand & Specialty Switcher
        add_submenu_page(
            'clinic-control',
            __('1-Click Rebrand & Specialty Presets', 'clinic-website-control'),
            __('Rebrand Demo', 'clinic-website-control'),
            'manage_options',
            'clinic-rebrand',
            [$this, 'render_rebranding_page']
        );
    }

    public function register_settings() {
        register_setting('clinic_website_group', 'clinic_website_options', [
            'sanitize_callback' => [$this, 'sanitize_options']
        ]);
    }

    public function sanitize_options($input) {
        $existing = get_option('clinic_website_options', []);
        if (!is_array($existing)) {
            $existing = [];
        }

        $clean = $existing;
        if (!is_array($input)) return $clean;

        foreach ($input as $key => $val) {
            if (in_array($key, ['hero_subheading', 'doctor_bio', 'emergency_guidance', 'admin_message_template', 'ticker_messages'])) {
                $clean[$key] = sanitize_textarea_field($val);
            } elseif (in_array($key, ['demo_mode', 'enable_ticker'])) {
                $clean[$key] = !empty($val) ? 1 : 0;
            } elseif (strpos($key, 'color') !== false) {
                $clean[$key] = sanitize_hex_color($val) ?: $val;
            } else {
                $clean[$key] = sanitize_text_field($val);
            }
        }
        return $clean;
    }

    public function render_main_settings_page() {
        if (!current_user_can('manage_options')) return;

        $options = get_option('clinic_website_options', []);
        $active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'identity';
        ?>
        <div class="wrap cwc-admin-wrap">
            <h1>
                <span class="dashicons dashicons-shield-alt" style="font-size:32px;width:32px;height:32px;color:#0d9488;"></span>
                <?php esc_html_e('Clinic Website Control Center', 'clinic-website-control'); ?>
            </h1>
            <p class="description">
                Centralized branding, doctor credentials, clinical specialty, and design tokens. Changes propagate instantly across all pages and templates.
            </p>

            <?php settings_errors(); ?>

            <!-- Navigation Tabs -->
            <h2 class="nav-tab-wrapper">
                <a href="?page=clinic-control&tab=identity" class="nav-tab <?php echo $active_tab === 'identity' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('1. Business Identity', 'clinic-website-control'); ?>
                </a>
                <a href="?page=clinic-control&tab=brand" class="nav-tab <?php echo $active_tab === 'brand' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('2. Brand Design & Colors', 'clinic-website-control'); ?>
                </a>
                <a href="?page=clinic-control&tab=homepage" class="nav-tab <?php echo $active_tab === 'homepage' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('3. Homepage Content', 'clinic-website-control'); ?>
                </a>
                <a href="?page=clinic-control&tab=doctor" class="nav-tab <?php echo $active_tab === 'doctor' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('4. Doctor Credentials', 'clinic-website-control'); ?>
                </a>
                <a href="?page=clinic-control&tab=appointments" class="nav-tab <?php echo $active_tab === 'appointments' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('5. Appointment Desk', 'clinic-website-control'); ?>
                </a>
                <a href="?page=clinic-control&tab=demo" class="nav-tab <?php echo $active_tab === 'demo' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('6. Demo Disclosure Mode', 'clinic-website-control'); ?>
                </a>
            </h2>

            <form action="options.php" method="post" class="cwc-admin-form">
                <?php settings_fields('clinic_website_group'); ?>

                <?php if ($active_tab === 'identity') : ?>
                    <!-- TAB 1: BUSINESS IDENTITY -->
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="clinic_name">Clinic / Practice Name</label></th>
                            <td>
                                <input type="text" id="clinic_name" name="clinic_website_options[clinic_name]" value="<?php echo esc_attr(clinic_get_option('clinic_name')); ?>" class="regular-text" required>
                                <p class="description">Central name displayed across header, footer, booking forms, and meta tags.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="specialty">Medical Specialty Subtitle</label></th>
                            <td>
                                <input type="text" id="specialty" name="clinic_website_options[specialty]" value="<?php echo esc_attr(clinic_get_option('specialty')); ?>" class="regular-text">
                                <p class="description">e.g. Dental Studio, Dermatology & Laser, General Medicine & Family Care, Physiotherapy.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="phone">Public Contact Phone</label></th>
                            <td>
                                <input type="text" id="phone" name="clinic_website_options[phone]" value="<?php echo esc_attr(clinic_get_option('phone')); ?>" class="regular-text">
                                <p class="description">Displayed on header and contact sections.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="phone_raw">Direct Dial Digits (tel:)</label></th>
                            <td>
                                <input type="text" id="phone_raw" name="clinic_website_options[phone_raw]" value="<?php echo esc_attr(clinic_get_option('phone_raw')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="whatsapp_raw">WhatsApp Number (with country code)</label></th>
                            <td>
                                <input type="text" id="whatsapp_raw" name="clinic_website_options[whatsapp_raw]" value="<?php echo esc_attr(clinic_get_option('whatsapp_raw')); ?>" class="regular-text">
                                <p class="description">e.g. 15552345678 (no '+' or dashes) for instant mobile click-to-chat integration.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="email">Clinic Administrative Email</label></th>
                            <td>
                                <input type="email" id="email" name="clinic_website_options[email]" value="<?php echo esc_attr(clinic_get_option('email')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="address">Street Address</label></th>
                            <td>
                                <input type="text" id="address" name="clinic_website_options[address]" value="<?php echo esc_attr(clinic_get_option('address')); ?>" class="large-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="city_state_zip">City, State & Postal Code</label></th>
                            <td>
                                <input type="text" id="city_state_zip" name="clinic_website_options[city_state_zip]" value="<?php echo esc_attr(clinic_get_option('city_state_zip')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="opening_hours">Consultation Hours</label></th>
                            <td>
                                <input type="text" id="opening_hours" name="clinic_website_options[opening_hours]" value="<?php echo esc_attr(clinic_get_option('opening_hours')); ?>" class="large-text">
                            </td>
                        </tr>
                    </table>

                <?php elseif ($active_tab === 'brand') : ?>
                    <!-- TAB 2: BRAND DESIGN & COLORS -->
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="primary_color">Primary Brand Accent Color</label></th>
                            <td>
                                <input type="color" id="primary_color" name="clinic_website_options[primary_color]" value="<?php echo esc_attr(clinic_get_option('primary_color', '#0d9488')); ?>">
                                <span class="cwc-color-code"><?php echo esc_html(clinic_get_option('primary_color', '#0d9488')); ?></span>
                                <p class="description">Used for primary buttons, active navigation, badges, and icon highlights.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="secondary_color">Secondary Dark Text & Header Color</label></th>
                            <td>
                                <input type="color" id="secondary_color" name="clinic_website_options[secondary_color]" value="<?php echo esc_attr(clinic_get_option('secondary_color', '#0f172a')); ?>">
                                <span class="cwc-color-code"><?php echo esc_html(clinic_get_option('secondary_color', '#0f172a')); ?></span>
                                <p class="description">Used for headings, top bars, and deep contrast elements.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="accent_color">Subtle Accent / Sky Blue</label></th>
                            <td>
                                <input type="color" id="accent_color" name="clinic_website_options[accent_color]" value="<?php echo esc_attr(clinic_get_option('accent_color', '#0284c7')); ?>">
                                <span class="cwc-color-code"><?php echo esc_html(clinic_get_option('accent_color', '#0284c7')); ?></span>
                            </td>
                        </tr>
                    </table>

                <?php elseif ($active_tab === 'homepage') : ?>
                    <!-- TAB 3: HOMEPAGE CONTENT -->
                    <table class="form-table">
                        <tr>
                            <th scope="row">Announcement Ticker</th>
                            <td>
                                <label>
                                    <input type="checkbox" name="clinic_website_options[enable_ticker]" value="1" <?php checked(clinic_get_option('enable_ticker', true), true); ?>>
                                    <strong>Enable Top Announcement Ticker</strong>
                                </label>
                                <p class="description">Displays a slim, controlled marquee announcement ticker at the very top of all pages.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="ticker_messages">Ticker Messages (One per line)</label></th>
                            <td>
                                <textarea id="ticker_messages" name="clinic_website_options[ticker_messages]" rows="4" class="large-text" placeholder="Appointment requests are welcome.&#10;View our clinic hours.&#10;Contact the clinic for appointment assistance.&#10;Explore our medical services."><?php echo esc_textarea(clinic_get_option('ticker_messages', "Appointment requests are welcome.\nView our clinic hours.\nContact the clinic for appointment assistance.\nExplore our medical services.")); ?></textarea>
                                <p class="description">Enter each announcement message on a new line. Messages cycle continuously in a controlled marquee across the top of the site.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="hero_heading">Hero Main Heading</label></th>
                            <td>
                                <input type="text" id="hero_heading" name="clinic_website_options[hero_heading]" value="<?php echo esc_attr(clinic_get_option('hero_heading')); ?>" class="large-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="hero_subheading">Hero Supporting Text</label></th>
                            <td>
                                <textarea id="hero_subheading" name="clinic_website_options[hero_subheading]" rows="4" class="large-text"><?php echo esc_textarea(clinic_get_option('hero_subheading')); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="cta_button_text">Primary CTA Button Label</label></th>
                            <td>
                                <input type="text" id="cta_button_text" name="clinic_website_options[cta_button_text]" value="<?php echo esc_attr(clinic_get_option('cta_button_text', 'Request an Appointment')); ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>

                <?php elseif ($active_tab === 'doctor') : ?>
                    <!-- TAB 4: DOCTOR CREDENTIALS -->
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="doctor_name">Attending Doctor Name</label></th>
                            <td>
                                <input type="text" id="doctor_name" name="clinic_website_options[doctor_name]" value="<?php echo esc_attr(clinic_get_option('doctor_name')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="doctor_specialty">Doctor Specialty Title</label></th>
                            <td>
                                <input type="text" id="doctor_specialty" name="clinic_website_options[doctor_specialty]" value="<?php echo esc_attr(clinic_get_option('doctor_specialty')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="doctor_qualifications">Academic Qualifications</label></th>
                            <td>
                                <input type="text" id="doctor_qualifications" name="clinic_website_options[doctor_qualifications]" value="<?php echo esc_attr(clinic_get_option('doctor_qualifications')); ?>" class="regular-text">
                                <p class="description">e.g. MBBS, MD, BDS, MDS, MS (Ortho), BPT, MPT, FRCOG.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="doctor_registration">Verified Medical Registration</label></th>
                            <td>
                                <input type="text" id="doctor_registration" name="clinic_website_options[doctor_registration]" value="<?php echo esc_attr(clinic_get_option('doctor_registration')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="doctor_experience">Clinical Experience</label></th>
                            <td>
                                <input type="text" id="doctor_experience" name="clinic_website_options[doctor_experience]" value="<?php echo esc_attr(clinic_get_option('doctor_experience')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="doctor_bio">Doctor Biography</label></th>
                            <td>
                                <textarea id="doctor_bio" name="clinic_website_options[doctor_bio]" rows="4" class="large-text"><?php echo esc_textarea(clinic_get_option('doctor_bio')); ?></textarea>
                            </td>
                        </tr>
                    </table>

                <?php elseif ($active_tab === 'appointments') : ?>
                    <!-- TAB 5: APPOINTMENT DESK -->
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="notification_email">Notification Dispatch Email</label></th>
                            <td>
                                <input type="email" id="notification_email" name="clinic_website_options[notification_email]" value="<?php echo esc_attr(clinic_get_option('notification_email', clinic_get_option('email'))); ?>" class="regular-text">
                                <p class="description">Receives instant alerts whenever an appointment request is submitted.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="emergency_guidance">Emergency Medical Advisory Text</label></th>
                            <td>
                                <textarea id="emergency_guidance" name="clinic_website_options[emergency_guidance]" rows="3" class="large-text"><?php echo esc_textarea(clinic_get_option('emergency_guidance')); ?></textarea>
                            </td>
                        </tr>
                    </table>

                <?php elseif ($active_tab === 'demo') : ?>
                    <!-- TAB 6: DEMO DISCLOSURE MODE -->
                    <table class="form-table">
                        <tr>
                            <th scope="row">Demo Mode Status</th>
                            <td>
                                <label>
                                    <input type="checkbox" name="clinic_website_options[demo_mode]" value="1" <?php checked(clinic_is_demo_mode(), true); ?>>
                                    <strong>Enable Demo Disclosure Mode</strong>
                                </label>
                                <p class="description">Displays a subtle "Website Concept Demo" banner and adds transparency notices on placeholder doctor credentials &amp; testimonials. Turn off when launching for a live client!</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="demo_badge_text">Demo Badge Label</label></th>
                            <td>
                                <input type="text" id="demo_badge_text" name="clinic_website_options[demo_badge_text]" value="<?php echo esc_attr(clinic_get_option('demo_badge_text', 'Website Concept Demo')); ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                <?php endif; ?>

                <?php submit_button(__('Save Clinic Configuration', 'clinic-website-control'), 'primary'); ?>
            </form>
        </div>
        <?php
    }

    public function render_rebranding_page() {
        // Rendered by CWC_Rebranding_Engine
        do_action('cwc_render_rebranding_page');
    }
}
