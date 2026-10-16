<?php
/**
 * Plugin Name: Clinic Website Control
 * Plugin URI: https://example.com/clinic-website-control
 * Description: Centralized clinic management, 6 medical specialty presets, 1-click demo rebranding engine, custom post types for doctors & treatments, appointment request flow, and Schema.org generation for medical practices.
 * Version: 1.0.0
 * Author: Universal Medical Systems
 * Author URI: https://example.com/
 * Text Domain: clinic-website-control
 * License: GPLv2 or later
 */

if (!defined('ABSPATH')) {
    exit;
}

define('CWC_VERSION', '1.0.0');
define('CWC_DIR', plugin_dir_path(__FILE__));
define('CWC_URI', plugin_dir_url(__FILE__));

// Require Core Subsystems
require_once CWC_DIR . 'includes/class-cpt.php';
require_once CWC_DIR . 'includes/class-admin-menu.php';
require_once CWC_DIR . 'includes/class-rebranding-engine.php';
require_once CWC_DIR . 'includes/class-appointment-handler.php';
require_once CWC_DIR . 'includes/class-schema.php';
require_once CWC_DIR . 'includes/class-demo-mode.php';

/**
 * Initialize Clinic Website Control Plugin
 */
function cwc_init() {
    new CWC_CPT();
    new CWC_Admin_Menu();
    new CWC_Rebranding_Engine();
    new CWC_Appointment_Handler();
    new CWC_Schema();
    new CWC_Demo_Mode();
}
add_action('plugins_loaded', 'cwc_init');

/**
 * Enqueue Admin Scripts & Styles
 */
function cwc_admin_assets($hook) {
    if (strpos($hook, 'clinic-control') === false && strpos($hook, 'clinic-rebrand') === false) {
        return;
    }

    wp_enqueue_style('cwc-admin-style', CWC_URI . 'assets/css/admin.css', [], CWC_VERSION);
    wp_enqueue_script('cwc-admin-script', CWC_URI . 'assets/js/admin.js', ['jquery'], CWC_VERSION, true);

    wp_localize_script('cwc-admin-script', 'cwcAdminData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('cwc_admin_nonce')
    ]);
}
add_action('admin_enqueue_scripts', 'cwc_admin_assets');
