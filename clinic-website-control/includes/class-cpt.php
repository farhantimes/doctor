<?php
/**
 * Custom Post Types for Doctors, Services, and Appointment Requests
 *
 * @package Clinic_Website_Control
 */

if (!defined('ABSPATH')) {
    exit;
}

class CWC_CPT {

    public function __construct() {
        add_action('init', [$this, 'register_cpts']);
        add_action('init', [$this, 'register_taxonomies']);
        add_action('add_meta_boxes', [$this, 'register_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_boxes']);
    }

    public function register_cpts() {
        // 1. Doctors / Medical Staff CPT
        register_post_type('doctor', [
            'labels' => [
                'name'               => __('Doctors & Staff', 'clinic-website-control'),
                'singular_name'      => __('Doctor', 'clinic-website-control'),
                'add_new'            => __('Add Doctor', 'clinic-website-control'),
                'add_new_item'       => __('Add New Doctor Profile', 'clinic-website-control'),
                'edit_item'          => __('Edit Doctor Profile', 'clinic-website-control'),
                'view_item'          => __('View Doctor Profile', 'clinic-website-control'),
                'search_items'       => __('Search Doctors', 'clinic-website-control'),
                'not_found'          => __('No doctors found', 'clinic-website-control'),
                'all_items'          => __('All Doctors', 'clinic-website-control'),
            ],
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => ['slug' => 'doctors'],
            'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
            'menu_icon'     => 'dashicons-businessman',
            'show_in_rest'  => true,
        ]);

        // 2. Services / Treatments CPT
        register_post_type('service', [
            'labels' => [
                'name'               => __('Services & Treatments', 'clinic-website-control'),
                'singular_name'      => __('Service', 'clinic-website-control'),
                'add_new'            => __('Add Service', 'clinic-website-control'),
                'add_new_item'       => __('Add New Treatment', 'clinic-website-control'),
                'edit_item'          => __('Edit Treatment', 'clinic-website-control'),
                'view_item'          => __('View Treatment', 'clinic-website-control'),
                'search_items'       => __('Search Treatments', 'clinic-website-control'),
                'not_found'          => __('No treatments found', 'clinic-website-control'),
                'all_items'          => __('All Services', 'clinic-website-control'),
            ],
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => ['slug' => 'services'],
            'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
            'menu_icon'     => 'dashicons-heart',
            'show_in_rest'  => true,
        ]);

        // 3. Appointment Requests CPT (Private administrative log)
        register_post_type('appointment_request', [
            'labels' => [
                'name'               => __('Appointment Requests', 'clinic-website-control'),
                'singular_name'      => __('Appointment Request', 'clinic-website-control'),
                'all_items'          => __('All Requests', 'clinic-website-control'),
                'edit_item'          => __('Review Request', 'clinic-website-control'),
            ],
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => 'clinic-control',
            'capability_type'    => 'post',
            'capabilities'       => ['create_posts' => false],
            'map_meta_cap'       => true,
            'supports'           => ['title'],
            'menu_icon'          => 'dashicons-calendar-alt',
        ]);
    }

    public function register_taxonomies() {
        register_taxonomy('medical_specialty', ['doctor', 'service'], [
            'labels' => [
                'name'          => __('Medical Specialties', 'clinic-website-control'),
                'singular_name' => __('Specialty', 'clinic-website-control'),
            ],
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => ['slug' => 'specialty'],
        ]);
    }

    public function register_meta_boxes() {
        // Doctor Meta Box
        add_meta_box(
            'cwc_doctor_meta',
            __('Doctor Qualifications & Credentials', 'clinic-website-control'),
            [$this, 'render_doctor_meta_box'],
            'doctor',
            'normal',
            'high'
        );

        // Service Meta Box
        add_meta_box(
            'cwc_service_meta',
            __('Treatment Details & Workflow', 'clinic-website-control'),
            [$this, 'render_service_meta_box'],
            'service',
            'normal',
            'high'
        );
    }

    public function render_doctor_meta_box($post) {
        wp_nonce_field('cwc_doctor_meta_nonce', 'cwc_doctor_meta_nonce_field');
        $qual    = get_post_meta($post->ID, '_clinic_doctor_qual', true);
        $reg     = get_post_meta($post->ID, '_clinic_doctor_reg', true);
        $spec    = get_post_meta($post->ID, '_clinic_doctor_spec', true);
        $exp     = get_post_meta($post->ID, '_clinic_doctor_exp', true);
        $lang    = get_post_meta($post->ID, '_clinic_doctor_lang', true);
        $timings = get_post_meta($post->ID, '_clinic_doctor_timings', true);
        ?>
        <table class="form-table">
            <tr>
                <th><label for="clinic_doctor_spec">Medical Specialty</label></th>
                <td><input type="text" id="clinic_doctor_spec" name="clinic_doctor_spec" value="<?php echo esc_attr($spec); ?>" class="regular-text" placeholder="e.g. Senior Consultant Physician"></td>
            </tr>
            <tr>
                <th><label for="clinic_doctor_qual">Qualifications</label></th>
                <td><input type="text" id="clinic_doctor_qual" name="clinic_doctor_qual" value="<?php echo esc_attr($qual); ?>" class="regular-text" placeholder="e.g. MBBS, MD (Internal Medicine), FACP"></td>
            </tr>
            <tr>
                <th><label for="clinic_doctor_reg">Verified Registration No.</label></th>
                <td><input type="text" id="clinic_doctor_reg" name="clinic_doctor_reg" value="<?php echo esc_attr($reg); ?>" class="regular-text" placeholder="e.g. Reg. No. MC-849204 (State Medical Council)"></td>
            </tr>
            <tr>
                <th><label for="clinic_doctor_exp">Experience</label></th>
                <td><input type="text" id="clinic_doctor_exp" name="clinic_doctor_exp" value="<?php echo esc_attr($exp); ?>" class="regular-text" placeholder="e.g. 16+ Years Clinical Practice"></td>
            </tr>
            <tr>
                <th><label for="clinic_doctor_lang">Languages Spoken</label></th>
                <td><input type="text" id="clinic_doctor_lang" name="clinic_doctor_lang" value="<?php echo esc_attr($lang); ?>" class="regular-text" placeholder="e.g. English, Spanish"></td>
            </tr>
            <tr>
                <th><label for="clinic_doctor_timings">Consultation Hours</label></th>
                <td><input type="text" id="clinic_doctor_timings" name="clinic_doctor_timings" value="<?php echo esc_attr($timings); ?>" class="regular-text" placeholder="e.g. Mon - Fri: 9:00 AM - 5:00 PM"></td>
            </tr>
        </table>
        <?php
    }

    public function render_service_meta_box($post) {
        wp_nonce_field('cwc_service_meta_nonce', 'cwc_service_meta_nonce_field');
        $duration = get_post_meta($post->ID, '_clinic_service_duration', true);
        $audience = get_post_meta($post->ID, '_clinic_service_audience', true);
        ?>
        <table class="form-table">
            <tr>
                <th><label for="clinic_service_duration">Typical Duration</label></th>
                <td><input type="text" id="clinic_service_duration" name="clinic_service_duration" value="<?php echo esc_attr($duration); ?>" class="regular-text" placeholder="e.g. 25 - 40 Mins"></td>
            </tr>
            <tr>
                <th><label for="clinic_service_audience">Who This Treatment Is For</label></th>
                <td><textarea id="clinic_service_audience" name="clinic_service_audience" rows="3" class="large-text" placeholder="Describe patient symptoms or conditions this treatment addresses..."><?php echo esc_textarea($audience); ?></textarea></td>
            </tr>
        </table>
        <?php
    }

    public function save_meta_boxes($post_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

        // Save Doctor Meta
        if (isset($_POST['cwc_doctor_meta_nonce_field']) && wp_verify_nonce($_POST['cwc_doctor_meta_nonce_field'], 'cwc_doctor_meta_nonce')) {
            $fields = [
                '_clinic_doctor_spec'    => 'clinic_doctor_spec',
                '_clinic_doctor_qual'    => 'clinic_doctor_qual',
                '_clinic_doctor_reg'     => 'clinic_doctor_reg',
                '_clinic_doctor_exp'     => 'clinic_doctor_exp',
                '_clinic_doctor_lang'    => 'clinic_doctor_lang',
                '_clinic_doctor_timings' => 'clinic_doctor_timings',
            ];
            foreach ($fields as $meta_key => $post_key) {
                if (isset($_POST[$post_key])) {
                    update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$post_key]));
                }
            }
        }

        // Save Service Meta
        if (isset($_POST['cwc_service_meta_nonce_field']) && wp_verify_nonce($_POST['cwc_service_meta_nonce_field'], 'cwc_service_meta_nonce')) {
            if (isset($_POST['clinic_service_duration'])) {
                update_post_meta($post_id, '_clinic_service_duration', sanitize_text_field($_POST['clinic_service_duration']));
            }
            if (isset($_POST['clinic_service_audience'])) {
                update_post_meta($post_id, '_clinic_service_audience', sanitize_textarea_field($_POST['clinic_service_audience']));
            }
        }
    }
}
