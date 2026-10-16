<?php
/**
 * Schema.org Medical Entity JSON-LD Generator
 *
 * @package Clinic_Website_Control
 */

if (!defined('ABSPATH')) {
    exit;
}

class CWC_Schema {

    public function __construct() {
        add_action('wp_head', [$this, 'output_structured_data'], 15);
    }

    public function output_structured_data() {
        $clinic_name    = clinic_get_option('clinic_name', '[CLINIC NAME]');
        $specialty      = clinic_get_option('specialty', 'Medical Clinic');
        $specialty_slug = clinic_get_option('specialty_slug', 'general');
        $phone          = clinic_get_option('phone', '+1 (555) 234-5678');
        $address        = clinic_get_option('address', 'Medical Arts Pavilion');
        $city_state     = clinic_get_option('city_state_zip', 'Medical City, MC 90210');
        $url            = home_url('/');
        $hours          = clinic_get_option('opening_hours', 'Mon - Fri: 8:00 AM - 6:30 PM');

        // Map specialty slug to Schema.org type
        $schema_type = 'MedicalBusiness';
        if ($specialty_slug === 'dental') {
            $schema_type = 'Dentist';
        } elseif ($specialty_slug === 'physician') {
            $schema_type = 'Physician';
        } elseif ($specialty_slug === 'dermatology') {
            $schema_type = 'MedicalClinic';
        }

        $schema = [
            '@context'         => 'https://schema.org',
            '@type'            => $schema_type,
            'name'             => $clinic_name,
            'medicalSpecialty' => $specialty,
            'url'              => esc_url($url),
            'telephone'        => $phone,
            'address'          => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $address,
                'addressLocality' => $city_state
            ],
            'openingHours'     => $hours,
            'isAcceptingNewPatients' => true
        ];

        // If on single doctor page, add Physician entity
        if (is_singular('doctor')) {
            $schema['employee'] = [
                '@type'             => 'Physician',
                'name'              => get_the_title(),
                'medicalSpecialty'  => get_post_meta(get_the_ID(), '_clinic_doctor_spec', true) ?: $specialty,
                'knowsLanguage'     => get_post_meta(get_the_ID(), '_clinic_doctor_lang', true) ?: 'English'
            ];
        }

        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}
