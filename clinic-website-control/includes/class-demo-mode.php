<?php
/**
 * Demo Mode & Compliance Disclosures
 *
 * @package Clinic_Website_Control
 */

if (!defined('ABSPATH')) {
    exit;
}

class CWC_Demo_Mode {

    public function __construct() {
        add_filter('body_class', [$this, 'filter_body_class']);
    }

    public function filter_body_class($classes) {
        if (clinic_is_demo_mode()) {
            $classes[] = 'clinic-demo-mode-active';
        } else {
            $classes[] = 'clinic-production-mode';
        }
        return $classes;
    }
}
