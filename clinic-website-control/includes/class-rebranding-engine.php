<?php
/**
 * 1-Click Rebranding & Specialty Presets Engine
 *
 * @package Clinic_Website_Control
 */

if (!defined('ABSPATH')) {
    exit;
}

class CWC_Rebranding_Engine {

    public function __construct() {
        add_action('cwc_render_rebranding_page', [$this, 'render_page']);
        add_action('admin_post_cwc_apply_preset', [$this, 'handle_apply_preset']);
        add_action('admin_post_cwc_custom_rebrand', [$this, 'handle_custom_rebrand']);
        add_action('admin_post_cwc_export_config', [$this, 'handle_export_config']);
        add_action('admin_post_cwc_import_config', [$this, 'handle_import_config']);
        add_action('admin_post_cwc_restore_backup', [$this, 'handle_restore_backup']);
    }

    /**
     * Pre-defined Medical Specialty Presets
     */
    public static function get_presets() {
        return [
            'dental' => [
                'name'            => 'Dental Clinic / Studio',
                'clinic_name'     => 'Apex Dental Studio & Implant Centre',
                'specialty'       => 'Comprehensive Dentistry & Orthodontics',
                'specialty_slug'  => 'dental',
                'primary_color'   => '#0284c7', // Sky Blue
                'primary_dark'    => '#0369a1',
                'secondary_color' => '#0f172a', // Deep Slate
                'accent_color'    => '#0d9488', // Teal
                'doctor_name'     => 'Dr. Sarah Lin, DDS',
                'doctor_spec'     => 'Lead Dental Surgeon & Orthodontist',
                'doctor_qual'     => 'BDS, MDS (Orthodontics & Dentofacial Orthopaedics)',
                'doctor_reg'      => 'Dental Council Reg. No. DC-58291',
                'doctor_exp'      => '14+ Years Clinical Practice',
                'doctor_lang'     => 'English, Mandarin',
                'doctor_bio'      => 'Specializing in painless restorative dentistry, precision digital smile design, corrective orthodontics, and preventative oral health care for adult and pediatric patients.',
                'hero_heading'    => 'Gentle, Advanced Dental Care for Confident, Healthy Smiles',
                'hero_subheading' => 'Experience anxiety-free dental consultations, precision digital imaging, painless preventative care, and modern restorative dentistry in a welcoming clinic.',
                'phone'           => '+1 (555) 345-6789',
                'phone_raw'       => '+15553456789',
                'whatsapp_raw'    => '15553456789',
                'address'         => 'Suite 210, Dental Arts Plaza, Smiles Blvd',
                'city_state_zip'  => 'Metro City, MC 90212',
                'opening_hours'   => 'Mon - Sat: 8:30 AM - 6:00 PM',
                'services'        => [
                    'General Dental Consultation & Digital X-Ray',
                    'Ultrasonic Oral Hygiene & Deep Cleaning',
                    'Biocompatible Composite Dental Fillings',
                    'Precision Rotary Root Canal Therapy',
                    'Zirconia Crowns, Bridges & Veneers',
                    'Clear Aligners & Orthodontic Assessments'
                ]
            ],

            'dermatology' => [
                'name'            => 'Dermatology & Skin Clinic',
                'clinic_name'     => 'DermaCare Skin & Aesthetic Clinic',
                'specialty'       => 'Clinical Dermatology & Laser Therapy',
                'specialty_slug'  => 'dermatology',
                'primary_color'   => '#881337', // Refined Rose Plum
                'primary_dark'    => '#4c0519',
                'secondary_color' => '#18181b', // Deep Onyx
                'accent_color'    => '#0d9488', // Medical Teal
                'doctor_name'     => 'Dr. Alisha Patel, MD',
                'doctor_spec'     => 'Consultant Dermatologist & Venereologist',
                'doctor_qual'     => 'MBBS, MD (Dermatology, Venereology & Leprosy), FAAD',
                'doctor_reg'      => 'Medical Council Reg. No. DERM-74829',
                'doctor_exp'      => '15+ Years Clinical Practice',
                'doctor_lang'     => 'English, Hindi, Gujarati',
                'doctor_bio'      => 'Dedicated to clinical dermatology, chronic inflammatory skin conditions, scientific acne therapies, scalp assessment, and evidence-grounded non-surgical skin wellness.',
                'hero_heading'    => 'Science-Led Clinical Dermatology & Skin Wellness',
                'hero_subheading' => 'Expert physician care for acne, eczema, psoriasis, hair loss, and specialized skin condition assessments using proven clinical protocols.',
                'phone'           => '+1 (555) 456-7890',
                'phone_raw'       => '+15554567890',
                'whatsapp_raw'    => '15554567890',
                'address'         => 'Level 3, Derma Tower, Wellness Avenue',
                'city_state_zip'  => 'Medical City, MC 90214',
                'opening_hours'   => 'Mon - Fri: 9:00 AM - 6:30 PM | Sat: 9:00 AM - 3:00 PM',
                'services'        => [
                    'Comprehensive Clinical Skin Consultation',
                    'Medical Acne Assessment & Therapeutic Protocols',
                    'Eczema, Psoriasis & Dermatitis Management',
                    'Trichoscopy & Hair Loss Evaluation',
                    'Cryotherapy & Diagnostic Skin Biopsies',
                    'Laser Skin Resurfacing & Pigment Review'
                ]
            ],

            'physician' => [
                'name'            => 'General Physician / MBBS Family Clinic',
                'clinic_name'     => 'CareWell Family & Medical Clinic',
                'specialty'       => 'General Medicine & Family Health Care',
                'specialty_slug'  => 'general',
                'primary_color'   => '#0d9488', // Medical Teal
                'primary_dark'    => '#0f766e',
                'secondary_color' => '#0f172a', // Deep Slate
                'accent_color'    => '#0284c7', // Sky Blue
                'doctor_name'     => 'Dr. Jonathan Miller, MD',
                'doctor_spec'     => 'Senior Consultant Physician',
                'doctor_qual'     => 'MBBS, MD (Internal Medicine), FACP',
                'doctor_reg'      => 'State Medical Council Reg. No. MC-849204',
                'doctor_exp'      => '16+ Years Clinical Practice',
                'doctor_lang'     => 'English, Spanish',
                'doctor_bio'      => 'Dedicated to holistic, evidence-based patient healthcare with a focus on comprehensive preventive medicine, chronic illness management, and patient-centered diagnostic consultations.',
                'hero_heading'    => 'Advanced, Compassionate Healthcare for You & Your Family',
                'hero_subheading' => 'Experience personalized medical consultations, minimal wait times, state-of-the-art diagnostic facilities, and dedicated physician care designed around your comfort.',
                'phone'           => '+1 (555) 234-5678',
                'phone_raw'       => '+15552345678',
                'whatsapp_raw'    => '15552345678',
                'address'         => 'Suite 400, Medical Arts Pavilion, Healthcare Blvd',
                'city_state_zip'  => 'Medical City, MC 90210',
                'opening_hours'   => 'Mon - Fri: 8:00 AM - 6:30 PM | Sat: 9:00 AM - 2:00 PM',
                'services'        => [
                    'Comprehensive Medical Consultation',
                    'Preventive Annual Health Screenings',
                    'Acute Illness Evaluation & Rapid Triage',
                    'Chronic Condition Care (Hypertension, Diabetes)',
                    'Preventive Cardiovascular Risk Profiling',
                    'Point-of-Care Laboratory Testing'
                ]
            ],

            'physiotherapy' => [
                'name'            => 'Physiotherapy & Rehabilitation Clinic',
                'clinic_name'     => 'ActiveLife Physiotherapy & Rehab Centre',
                'specialty'       => 'Musculoskeletal Physiotherapy & Sports Rehab',
                'specialty_slug'  => 'physiotherapy',
                'primary_color'   => '#047857', // Forest Emerald
                'primary_dark'    => '#065f46',
                'secondary_color' => '#111827', // Slate Dark
                'accent_color'    => '#0d9488', // Teal
                'doctor_name'     => 'Dr. David Evans, DPT',
                'doctor_spec'     => 'Chief Physical Therapist & Sports Rehab Specialist',
                'doctor_qual'     => 'BPT, MPT (Musculoskeletal & Sports), Cert. MDT',
                'doctor_reg'      => 'Physiotherapy Council Reg. No. PT-39201',
                'doctor_exp'      => '13+ Years Clinical Practice',
                'doctor_lang'     => 'English',
                'doctor_bio'      => 'Expertise in post-operative orthopedic recovery, spinal rehabilitation, sports injury biomechanics, ergonomic assessments, and active kinetic restoration.',
                'hero_heading'    => 'Restore Movement, Relieve Pain & Reclaim Active Living',
                'hero_subheading' => 'Targeted physical therapy, individualized kinetic rehabilitation, and evidence-grounded treatment plans for pain-free mobility.',
                'phone'           => '+1 (555) 567-8901',
                'phone_raw'       => '+15555678901',
                'whatsapp_raw'    => '15555678901',
                'address'         => 'Building 4, Kinetic Sports Park, Mobility Road',
                'city_state_zip'  => 'Healthfield, HF 90216',
                'opening_hours'   => 'Mon - Fri: 7:30 AM - 7:00 PM | Sat: 8:00 AM - 2:00 PM',
                'services'        => [
                    'Musculoskeletal & Biomechanical Assessment',
                    'Spine, Neck & Lumbar Core Rehabilitation',
                    'Post-Surgical Joint Replacement Recovery',
                    'Sports Injury Rehab & Return-to-Play Triage',
                    'Therapeutic Dry Needling & Manual Therapy',
                    'Ergonomic Postural Coaching'
                ]
            ],

            'gynaecology' => [
                'name'            => "Gynaecology & Women's Health Clinic",
                'clinic_name'     => "Blossom Women's Health & Gynaecology Clinic",
                'specialty'       => "Obstetrics, Gynaecology & Women's Wellness",
                'specialty_slug'  => 'gynaecology',
                'primary_color'   => '#be123c', // Warm Coral Rose
                'primary_dark'    => '#881337',
                'secondary_color' => '#1e1b4b', // Deep Midnight Indigo
                'accent_color'    => '#0d9488', // Teal
                'doctor_name'     => 'Dr. Maya Sengupta, MD',
                'doctor_spec'     => "Senior Consultant Gynaecologist & Obstetrician",
                'doctor_qual'     => 'MBBS, MD (Obs & Gynae), DNB, MRCOG (UK)',
                'doctor_reg'      => 'Medical Council Reg. No. GYN-99214',
                'doctor_exp'      => '18+ Years Clinical Practice',
                'doctor_lang'     => 'English, Bengali, Hindi',
                'doctor_bio'      => 'Providing empathetic, comprehensive clinical care across all stages of women’s health: preventive well-woman screenings, prenatal guidance, menstrual disorders, and menopausal health.',
                'hero_heading'    => "Empathetic, Expert Healthcare for Every Stage of Womanhood",
                'hero_subheading' => "Safe, confidential consultations in a comfortable clinical sanctuary tailored to your individual health and wellness priorities.",
                'phone'           => '+1 (555) 678-9012',
                'phone_raw'       => '+15556789012',
                'whatsapp_raw'    => '15556789012',
                'address'         => 'Suite 500, Blossom Medical Pavilion, Maternal Way',
                'city_state_zip'  => 'Harmony City, HC 90218',
                'opening_hours'   => 'Mon - Fri: 8:30 AM - 5:30 PM | Sat: 9:00 AM - 1:00 PM',
                'services'        => [
                    'Annual Well-Woman Preventive Health Check',
                    'Pre-Conception & Prenatal Clinical Guidance',
                    'Menstrual Health & Polycystic Ovary (PCOS) Care',
                    'Pelvic Diagnostic Ultrasound & Screenings',
                    'Perimenopause & Menopausal Wellness Plans',
                    'Minimally Invasive Gynaecological Assessment'
                ]
            ],

            'multispeciality' => [
                'name'            => 'Multi-Speciality Health Centre',
                'clinic_name'     => 'MetroCare Multi-Speciality Health Centre',
                'specialty'       => 'Integrated Multispeciality Polyclinic & Diagnostics',
                'specialty_slug'  => 'multispeciality',
                'primary_color'   => '#1e40af', // Royal Sapphire Blue
                'primary_dark'    => '#1e3a8a',
                'secondary_color' => '#0f172a', // Deep Slate
                'accent_color'    => '#0d9488', // Teal
                'doctor_name'     => 'Dr. Jonathan Miller & Specialist Board',
                'doctor_spec'     => 'Multidisciplinary Clinical Director',
                'doctor_qual'     => 'MBBS, MD (Medicine), FACP, Board of Specialists',
                'doctor_reg'      => 'Hospital Accreditation Reg. No. HOSP-40192',
                'doctor_exp'      => '25+ Years Combined Clinical Leadership',
                'doctor_lang'     => 'English, Spanish, Multiple Languages',
                'doctor_bio'      => 'A cohesive multi-department medical center bringing together internal medicine, cardiology, dermatology, dental surgery, orthopedics, and digital diagnostics under one roof.',
                'hero_heading'    => 'Comprehensive Multi-Speciality Medicine Under One Roof',
                'hero_subheading' => 'From primary physician consultations to dedicated specialist departments and in-house laboratory diagnostics, experience seamless clinical coordination.',
                'phone'           => '+1 (555) 789-0123',
                'phone_raw'       => '+15557890123',
                'whatsapp_raw'    => '15557890123',
                'address'         => 'MetroCare Medical Campus, 100 Health Sciences Way',
                'city_state_zip'  => 'Central Metro, CM 90220',
                'opening_hours'   => 'Mon - Sat: 8:00 AM - 8:00 PM | Sun: 9:00 AM - 1:00 PM',
                'services'        => [
                    'General Medicine & Family Health Department',
                    'Dental Sciences & Smile Rehabilitation',
                    'Clinical Dermatology & Skin Diagnostics',
                    'Orthopedics, Physical Rehab & Joint Care',
                    'Cardiology Wellness & Telemetric ECG',
                    'On-Site Clinical Laboratory & Imaging'
                ]
            ]
        ];
    }

    /**
     * Render 1-Click Rebrand & Specialty Switcher Page
     */
    public function render_page() {
        if (!current_user_can('manage_options')) return;

        $presets = self::get_presets();
        $current_options = get_option('clinic_website_options', []);
        $has_backup = !empty(get_option('clinic_website_backup_options'));
        ?>
        <div class="wrap cwc-rebrand-wrap">
            <h1>
                <span class="dashicons dashicons-update-alt" style="font-size:32px;width:32px;height:32px;color:#0d9488;"></span>
                <?php esc_html_e('1-Click Rebrand & Specialty Switcher', 'clinic-website-control'); ?>
            </h1>
            <p class="description">
                Prepare demo websites for any prospective medical client in seconds. Switch between 6 clinical specialties or enter custom brand specifications. Everything updates globally without touching source code.
            </p>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'success') : ?>
                <div class="notice notice-success is-dismissible">
                    <p><strong>Success!</strong> Website rebrand successfully applied. The entire demo website, design tokens, doctor credentials, and services have been updated.</p>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'restored') : ?>
                <div class="notice notice-info is-dismissible">
                    <p><strong>Configuration Restored!</strong> The previous clinic settings backup has been restored.</p>
                </div>
            <?php endif; ?>

            <!-- Backup & Restore Actions -->
            <div class="cwc-backup-bar">
                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" style="display:inline-block;">
                    <?php wp_nonce_field('cwc_export_nonce', 'cwc_nonce'); ?>
                    <input type="hidden" name="action" value="cwc_export_config">
                    <button type="submit" class="button button-secondary">
                        <span class="dashicons dashicons-download" style="vertical-align:middle;"></span>
                        <?php esc_html_e('Export Current Config as JSON', 'clinic-website-control'); ?>
                    </button>
                </form>

                <?php if ($has_backup) : ?>
                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" style="display:inline-block;margin-left:10px;">
                        <?php wp_nonce_field('cwc_restore_nonce', 'cwc_nonce'); ?>
                        <input type="hidden" name="action" value="cwc_restore_backup">
                        <button type="submit" class="button button-link-delete" onclick="return confirm('Restore the previous configuration backup?');">
                            <?php esc_html_e('Undo / Restore Previous Backup', 'clinic-website-control'); ?>
                        </button>
                    </form>
                <?php endif; ?>
            </div>

            <!-- SECTION A: 6 SPECIALTY PRESETS (ONE-CLICK SWITCH) -->
            <h2 class="cwc-section-title"><?php esc_html_e('Option 1: Switch to a Ready-Made Specialty Preset', 'clinic-website-control'); ?></h2>
            <div class="cwc-presets-grid">
                <?php foreach ($presets as $key => $preset) : ?>
                    <div class="cwc-preset-card">
                        <div class="cwc-preset-card__header" style="border-top-color: <?php echo esc_attr($preset['primary_color']); ?>;">
                            <div class="cwc-preset-color-badge" style="background-color: <?php echo esc_attr($preset['primary_color']); ?>;"></div>
                            <h3><?php echo esc_html($preset['name']); ?></h3>
                            <span class="cwc-preset-badge"><?php echo esc_html($preset['specialty']); ?></span>
                        </div>
                        <div class="cwc-preset-card__body">
                            <p><strong>Demo Clinic:</strong> <?php echo esc_html($preset['clinic_name']); ?></p>
                            <p><strong>Lead Doctor:</strong> <?php echo esc_html($preset['doctor_name']); ?></p>
                            <p><strong>Doctor Qualifications:</strong> <?php echo esc_html($preset['doctor_qual']); ?></p>
                            <p><strong>Sample Services:</strong></p>
                            <ul class="cwc-preset-services">
                                <?php foreach (array_slice($preset['services'], 0, 3) as $s) : ?>
                                    <li>&bull; <?php echo esc_html($s); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="cwc-preset-card__footer">
                            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                                <?php wp_nonce_field('cwc_preset_nonce', 'cwc_nonce'); ?>
                                <input type="hidden" name="action" value="cwc_apply_preset">
                                <input type="hidden" name="preset_key" value="<?php echo esc_attr($key); ?>">
                                <button type="submit" class="button button-primary button-large" onclick="return confirm('Apply the <?php echo esc_attr($preset['name']); ?> preset now? (A backup of current settings will be preserved)');">
                                    Apply <?php echo esc_html($preset['name']); ?>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- SECTION B: CUSTOM 1-CLICK REBRANDING WORKFLOW -->
            <hr style="margin: 40px 0;">
            <h2 class="cwc-section-title"><?php esc_html_e('Option 2: Create Custom Clinic Rebrand', 'clinic-website-control'); ?></h2>
            <p>Enter the prospect clinic’s details below. Upon saving, all headers, footers, appointment CTAs, color tokens, and contact links will automatically align.</p>

            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="cwc-custom-rebrand-form">
                <?php wp_nonce_field('cwc_custom_rebrand_nonce', 'cwc_nonce'); ?>
                <input type="hidden" name="action" value="cwc_custom_rebrand">

                <table class="form-table">
                    <tr>
                        <th><label for="reb_clinic_name">New Clinic Name <span class="required">*</span></label></th>
                        <td><input type="text" id="reb_clinic_name" name="reb_clinic_name" class="regular-text" required placeholder="e.g. Apex Dental Studio"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_specialty">Medical Specialty <span class="required">*</span></label></th>
                        <td><input type="text" id="reb_specialty" name="reb_specialty" class="regular-text" required placeholder="e.g. Dentistry & Orthodontics"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_doctor_name">Lead Doctor Name</label></th>
                        <td><input type="text" id="reb_doctor_name" name="reb_doctor_name" class="regular-text" placeholder="e.g. Dr. Sarah Lin, DDS"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_doctor_qual">Qualifications</label></th>
                        <td><input type="text" id="reb_doctor_qual" name="reb_doctor_qual" class="regular-text" placeholder="e.g. BDS, MDS (Orthodontics)"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_doctor_reg">Verified Registration Details</label></th>
                        <td><input type="text" id="reb_doctor_reg" name="reb_doctor_reg" class="regular-text" placeholder="e.g. Reg. No. DC-58291"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_phone">Phone Number</label></th>
                        <td><input type="text" id="reb_phone" name="reb_phone" class="regular-text" placeholder="e.g. +1 (555) 345-6789"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_whatsapp">WhatsApp Number (digits only)</label></th>
                        <td><input type="text" id="reb_whatsapp" name="reb_whatsapp" class="regular-text" placeholder="e.g. 15553456789"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_address">Clinic Address</label></th>
                        <td><input type="text" id="reb_address" name="reb_address" class="large-text" placeholder="e.g. Suite 210, Healthcare Plaza"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_primary_color">Primary Brand Accent Color</label></th>
                        <td><input type="color" id="reb_primary_color" name="reb_primary_color" value="#0d9488"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_secondary_color">Secondary Dark Text Color</label></th>
                        <td><input type="color" id="reb_secondary_color" name="reb_secondary_color" value="#0f172a"></td>
                    </tr>
                    <tr>
                        <th><label for="reb_demo_disclosure">Demo Disclosure Label</label></th>
                        <td><input type="text" id="reb_demo_disclosure" name="reb_demo_disclosure" value="Website Concept Demo" class="regular-text"></td>
                    </tr>
                </table>

                <p class="submit">
                    <button type="submit" class="button button-primary button-hero" onclick="return confirm('Apply this custom rebrand across the entire website?');">
                        <?php esc_html_e('Apply Custom Rebrand Now &rarr;', 'clinic-website-control'); ?>
                    </button>
                </p>
            </form>
        </div>
        <?php
    }

    /**
     * Handler: Apply Preset
     */
    public function handle_apply_preset() {
        if (!current_user_can('manage_options')) wp_die('Unauthorized');
        check_admin_referer('cwc_preset_nonce', 'cwc_nonce');

        $preset_key = isset($_POST['preset_key']) ? sanitize_text_field($_POST['preset_key']) : '';
        $presets = self::get_presets();

        if (!isset($presets[$preset_key])) {
            wp_die('Invalid preset selected');
        }

        // 1. Preserve backup of current options
        $current = get_option('clinic_website_options', []);
        update_option('clinic_website_backup_options', $current);

        // 2. Prepare new option set
        $p = $presets[$preset_key];
        $new_options = array_merge($current, [
            'clinic_name'           => $p['clinic_name'],
            'specialty'             => $p['specialty'],
            'specialty_slug'        => $p['specialty_slug'],
            'primary_color'         => $p['primary_color'],
            'primary_dark'          => $p['primary_dark'],
            'secondary_color'       => $p['secondary_color'],
            'accent_color'          => $p['accent_color'],
            'doctor_name'           => $p['doctor_name'],
            'doctor_specialty'      => $p['doctor_spec'],
            'doctor_qualifications' => $p['doctor_qual'],
            'doctor_registration'   => $p['doctor_reg'],
            'doctor_experience'     => $p['doctor_exp'],
            'doctor_languages'      => $p['doctor_lang'],
            'doctor_bio'            => $p['doctor_bio'],
            'hero_heading'          => $p['hero_heading'],
            'hero_subheading'       => $p['hero_subheading'],
            'phone'                 => $p['phone'],
            'phone_raw'             => $p['phone_raw'],
            'whatsapp_raw'          => $p['whatsapp_raw'],
            'address'               => $p['address'],
            'city_state_zip'        => $p['city_state_zip'],
            'opening_hours'         => $p['opening_hours']
        ]);

        update_option('clinic_website_options', $new_options);

        // 3. Update WordPress Site Title and Tagline safely
        update_option('blogname', $p['clinic_name']);
        update_option('blogdescription', $p['specialty'] . ' - Doctor & Clinic Website Demo');

        wp_redirect(admin_url('admin.php?page=clinic-rebrand&status=success'));
        exit;
    }

    /**
     * Handler: Custom Rebrand
     */
    public function handle_custom_rebrand() {
        if (!current_user_can('manage_options')) wp_die('Unauthorized');
        check_admin_referer('cwc_custom_rebrand_nonce', 'cwc_nonce');

        $name = sanitize_text_field($_POST['reb_clinic_name']);
        $spec = sanitize_text_field($_POST['reb_specialty']);

        if (empty($name)) wp_die('Clinic Name is required');

        // Preserve backup
        $current = get_option('clinic_website_options', []);
        update_option('clinic_website_backup_options', $current);

        $new_options = array_merge($current, [
            'clinic_name'           => $name,
            'specialty'             => $spec,
            'doctor_name'           => sanitize_text_field($_POST['reb_doctor_name'] ?: $current['doctor_name']),
            'doctor_qualifications' => sanitize_text_field($_POST['reb_doctor_qual'] ?: $current['doctor_qualifications']),
            'doctor_registration'   => sanitize_text_field($_POST['reb_doctor_reg'] ?: $current['doctor_registration']),
            'phone'                 => sanitize_text_field($_POST['reb_phone'] ?: $current['phone']),
            'phone_raw'             => sanitize_text_field(preg_replace('/[^0-9+]/', '', $_POST['reb_phone'] ?: $current['phone_raw'])),
            'whatsapp_raw'          => sanitize_text_field(preg_replace('/[^0-9]/', '', $_POST['reb_whatsapp'] ?: $current['whatsapp_raw'])),
            'address'               => sanitize_text_field($_POST['reb_address'] ?: $current['address']),
            'primary_color'         => sanitize_hex_color($_POST['reb_primary_color']) ?: '#0d9488',
            'secondary_color'       => sanitize_hex_color($_POST['reb_secondary_color']) ?: '#0f172a',
            'demo_badge_text'       => sanitize_text_field($_POST['reb_demo_disclosure'] ?: 'Website Concept Demo')
        ]);

        update_option('clinic_website_options', $new_options);
        update_option('blogname', $name);
        update_option('blogdescription', $spec);

        wp_redirect(admin_url('admin.php?page=clinic-rebrand&status=success'));
        exit;
    }

    /**
     * Handler: Restore Backup
     */
    public function handle_restore_backup() {
        if (!current_user_can('manage_options')) wp_die('Unauthorized');
        check_admin_referer('cwc_restore_nonce', 'cwc_nonce');

        $backup = get_option('clinic_website_backup_options');
        if (!empty($backup) && is_array($backup)) {
            update_option('clinic_website_options', $backup);
            delete_option('clinic_website_backup_options');
            wp_redirect(admin_url('admin.php?page=clinic-rebrand&status=restored'));
            exit;
        }

        wp_redirect(admin_url('admin.php?page=clinic-rebrand'));
        exit;
    }

    /**
     * Handler: Export Config as JSON
     */
    public function handle_export_config() {
        if (!current_user_can('manage_options')) wp_die('Unauthorized');
        check_admin_referer('cwc_export_nonce', 'cwc_nonce');

        $options = get_option('clinic_website_options', []);
        $filename = 'clinic-config-' . sanitize_title($options['clinic_name'] ?: 'demo') . '-' . date('Y-m-d') . '.json';

        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        echo json_encode($options, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    /**
     * Handler: Import Config from JSON
     */
    public function handle_import_config() {
        if (!current_user_can('manage_options')) wp_die('Unauthorized');
        check_admin_referer('cwc_import_nonce', 'cwc_nonce');

        if (!empty($_FILES['cwc_import_file']['tmp_name'])) {
            $json = file_get_contents($_FILES['cwc_import_file']['tmp_name']);
            $data = json_decode($json, true);
            if (is_array($data)) {
                $current = get_option('clinic_website_options', []);
                update_option('clinic_website_backup_options', $current);
                update_option('clinic_website_options', $data);
                wp_redirect(admin_url('admin.php?page=clinic-rebrand&status=success'));
                exit;
            }
        }

        wp_redirect(admin_url('admin.php?page=clinic-rebrand&status=error'));
        exit;
    }
}
