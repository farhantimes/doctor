<?php
/**
 * Appointment Request Handler (AJAX & Backend Logging)
 *
 * @package Clinic_Website_Control
 */

if (!defined('ABSPATH')) {
    exit;
}

class CWC_Appointment_Handler {

    public function __construct() {
        add_action('wp_ajax_submit_appointment_request', [$this, 'handle_appointment_submission']);
        add_action('wp_ajax_nopriv_submit_appointment_request', [$this, 'handle_appointment_submission']);
    }

    public function handle_appointment_submission() {
        // 1. Verify Nonce
        if (!isset($_POST['clinic_nonce']) || !wp_verify_nonce($_POST['clinic_nonce'], 'clinic_appointment_nonce')) {
            wp_send_json_error(['message' => __('Security verification failed. Please refresh the page and try again.', 'clinic-website-control')]);
        }

        // 2. Anti-spam Honeypot Check
        if (!empty($_POST['clinic_hp_check'])) {
            // Silently discard spam bots
            wp_send_json_success(['message' => __('Appointment request received.', 'clinic-website-control')]);
        }

        // 3. Sanitize inputs
        $patient_name     = sanitize_text_field($_POST['patient_name'] ?? '');
        $patient_phone    = sanitize_text_field($_POST['patient_phone'] ?? '');
        $preferred_doctor = sanitize_text_field($_POST['preferred_doctor'] ?? '');
        $appointment_type = sanitize_text_field($_POST['appointment_type'] ?? '');
        $preferred_date   = sanitize_text_field($_POST['preferred_date'] ?? '');
        $preferred_time   = sanitize_text_field($_POST['preferred_time'] ?? '');
        $admin_message    = sanitize_textarea_field($_POST['admin_message'] ?? '');
        $consent          = !empty($_POST['patient_consent']) ? 1 : 0;

        // Validation
        if (strlen($patient_name) < 2) {
            wp_send_json_error(['message' => __('Please enter your full name.', 'clinic-website-control')]);
        }

        $digits_only = preg_replace('/\D/', '', $patient_phone);
        if (strlen($digits_only) < 7) {
            wp_send_json_error(['message' => __('Please provide a valid phone number with area code.', 'clinic-website-control')]);
        }

        if (empty($preferred_date) || empty($preferred_time)) {
            wp_send_json_error(['message' => __('Please select both a preferred date and time window.', 'clinic-website-control')]);
        }

        if (!$consent) {
            wp_send_json_error(['message' => __('You must acknowledge the appointment request terms.', 'clinic-website-control')]);
        }

        // 4. Record as private post in 'appointment_request' CPT
        $post_title = sprintf('Request: %s (%s) - %s', $patient_name, $preferred_date, $preferred_time);
        $post_id = wp_insert_post([
            'post_type'    => 'appointment_request',
            'post_status'  => 'publish',
            'post_title'   => $post_title,
            'post_content' => $admin_message,
        ]);

        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_cwc_patient_name', $patient_name);
            update_post_meta($post_id, '_cwc_patient_phone', $patient_phone);
            update_post_meta($post_id, '_cwc_preferred_doctor', $preferred_doctor);
            update_post_meta($post_id, '_cwc_appointment_type', $appointment_type);
            update_post_meta($post_id, '_cwc_preferred_date', $preferred_date);
            update_post_meta($post_id, '_cwc_preferred_time', $preferred_time);
            update_post_meta($post_id, '_cwc_consent_given', 1);
            update_post_meta($post_id, '_cwc_request_status', 'Pending Reception Confirmation');
            update_post_meta($post_id, '_cwc_submission_ip', sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'));
        }

        // 5. Send Notification Email to Clinic Admin
        $clinic_email = clinic_get_option('notification_email', clinic_get_option('email', get_option('admin_email')));
        $clinic_name  = clinic_get_option('clinic_name', '[CLINIC NAME]');
        
        $email_subject = sprintf('[%s] New Appointment Request: %s', $clinic_name, $patient_name);
        $email_body = sprintf(
            "New Appointment Request Received:\n\n" .
            "Patient Name: %s\n" .
            "Phone: %s\n" .
            "Preferred Doctor: %s\n" .
            "Consultation Type: %s\n" .
            "Preferred Date: %s\n" .
            "Time Window: %s\n" .
            "Administrative Note: %s\n\n" .
            "Action Required: Please review clinic diary and reach out to the patient to confirm.\n\n" .
            "Review in WordPress Admin: %s\n",
            $patient_name,
            $patient_phone,
            $preferred_doctor,
            $appointment_type,
            $preferred_date,
            $preferred_time,
            $admin_message ?: 'None',
            admin_url('edit.php?post_type=appointment_request')
        );

        @wp_mail($clinic_email, $email_subject, $email_body);

        // 6. Build WhatsApp Direct Confirmation Link
        $whatsapp_raw = clinic_get_option('whatsapp_raw', '15552345678');
        $wa_msg = sprintf(
            "Hello, I have submitted an appointment request at %s:\n- Patient: %s\n- Doctor: %s\n- Date: %s\n- Time: %s\n- Type: %s\nPlease let me know once confirmed. Thank you!",
            $clinic_name,
            $patient_name,
            $preferred_doctor,
            $preferred_date,
            $preferred_time,
            $appointment_type
        );
        $whatsapp_url = 'https://wa.me/' . $whatsapp_raw . '?text=' . urlencode($wa_msg);

        // 7. Return JSON response
        wp_send_json_success([
            'message'      => __('Your appointment request has been transmitted to our clinic coordinator. We will reach out shortly to confirm your slot.', 'clinic-website-control'),
            'patient_name' => $patient_name,
            'doctor'       => $preferred_doctor,
            'date'         => $preferred_date,
            'time'         => $preferred_time,
            'type'         => $appointment_type,
            'whatsapp_url' => $whatsapp_url,
        ]);
    }
}
