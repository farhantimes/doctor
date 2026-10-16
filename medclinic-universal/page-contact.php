<?php
/**
 * Template Name: Contact & Clinic Location
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name     = clinic_get_option('clinic_name', '[CLINIC NAME]');
$specialty       = clinic_get_option('specialty', 'Medical Clinic');
$address         = clinic_get_option('address', 'Suite 400, Medical Arts Pavilion');
$city_state_zip  = clinic_get_option('city_state_zip', 'Healthcare Blvd, MC 90210');
$phone           = clinic_get_option('phone', '+1 (555) 234-5678');
$phone_raw       = clinic_get_option('phone_raw', '+15552345678');
$whatsapp        = clinic_get_option('whatsapp', '+1 (555) 234-5678');
$whatsapp_raw    = clinic_get_option('whatsapp_raw', '15552345678');
$email           = clinic_get_option('email', 'care@clinicdemocare.org');
$opening_hours   = clinic_get_option('opening_hours', 'Mon - Fri: 8:00 AM - 6:30 PM | Sat: 9:00 AM - 2:00 PM');
$sunday_hours    = clinic_get_option('sunday_hours', 'Sunday: Urgent / On-Call Only');
$emergency_guid  = clinic_get_option('emergency_guidance', 'If you are experiencing a life-threatening medical emergency, chest pain, severe shortness of breath or trauma, immediately call 911 or visit your nearest emergency room.');
?>

<main id="main-content" class="clinic-page clinic-page--contact" role="main">
    <div class="clinic-page-header">
        <div class="clinic-container clinic-text-center">
            <span class="clinic-section-kicker">Patient Assistance Desk</span>
            <h1 class="clinic-page-title">Contact &amp; Clinic Location</h1>
            <p class="clinic-page-subtitle">
                We are conveniently located with ample on-site patient parking and full wheelchair accessibility.
            </p>
        </div>
    </div>

    <!-- Emergency Guidance Advisory Alert -->
    <div class="clinic-container clinic-mt-6">
        <aside class="clinic-emergency-banner" role="alert">
            <div class="clinic-emergency-banner__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <div class="clinic-emergency-banner__body">
                <strong>Emergency Medical Notice:</strong>
                <p><?php echo esc_html($emergency_guid); ?></p>
            </div>
        </aside>
    </div>

    <div class="clinic-container clinic-section">
        <div class="clinic-contact-grid">
            
            <!-- Left: Contact Details Cards -->
            <div class="clinic-contact-info-col">
                <div class="clinic-card clinic-contact-card">
                    <div class="clinic-contact-item">
                        <div class="clinic-contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <h4>Clinic Location</h4>
                            <p class="clinic-text-body"><?php echo esc_html($clinic_name); ?></p>
                            <p class="clinic-text-muted"><?php echo esc_html($address); ?><br><?php echo esc_html($city_state_zip); ?></p>
                            <p class="clinic-text-sm clinic-mt-1 clinic-text-primary">
                                <strong>Parking & Accessibility:</strong> Dedicated patient parking in rear; wheelchair ramp at Main North entrance.
                            </p>
                        </div>
                    </div>

                    <div class="clinic-contact-item">
                        <div class="clinic-contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div>
                            <h4>Consultation Timings</h4>
                            <p class="clinic-text-body"><?php echo esc_html($opening_hours); ?></p>
                            <p class="clinic-text-muted"><?php echo esc_html($sunday_hours); ?></p>
                            <small>Prior appointment strongly recommended.</small>
                        </div>
                    </div>

                    <div class="clinic-contact-item">
                        <div class="clinic-contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <h4>Direct Phone Inquiries</h4>
                            <p><a href="tel:<?php echo esc_attr($phone_raw); ?>" class="clinic-link-strong"><?php echo esc_html($phone); ?></a></p>
                            <small>Receptionist assistance available during open clinic hours.</small>
                        </div>
                    </div>

                    <div class="clinic-contact-item">
                        <div class="clinic-contact-icon clinic-contact-icon--whatsapp">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        </div>
                        <div>
                            <h4>WhatsApp Messaging Desk</h4>
                            <p><a href="https://wa.me/<?php echo esc_attr($whatsapp_raw); ?>" target="_blank" rel="noopener noreferrer" class="clinic-link-strong"><?php echo esc_html($whatsapp); ?></a></p>
                            <small>Quick replies for scheduling questions & location directions.</small>
                        </div>
                    </div>

                    <div class="clinic-contact-item">
                        <div class="clinic-contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <h4>Administrative Email</h4>
                            <p><a href="mailto:<?php echo esc_attr($email); ?>" class="clinic-link-strong"><?php echo esc_html($email); ?></a></p>
                            <small>For administrative records and official inquiries.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive Map & Fast Navigation Actions -->
            <div class="clinic-contact-map-col">
                <div class="clinic-card clinic-map-wrapper">
                    <div class="clinic-map-placeholder clinic-map-placeholder--tall">
                        <div class="clinic-map-pin">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        </div>
                        <div class="clinic-map-info-box">
                            <h3><?php echo esc_html($clinic_name); ?></h3>
                            <p><?php echo esc_html($address); ?></p>
                            <p><?php echo esc_html($city_state_zip); ?></p>
                            <a href="https://maps.google.com/?q=<?php echo urlencode($address . ' ' . $city_state_zip); ?>" target="_blank" rel="noopener noreferrer" class="clinic-btn clinic-btn--primary clinic-btn--sm clinic-mt-3">
                                <span>Get Directions in Google Maps &rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="clinic-cta-card clinic-mt-4">
                    <h3>Need an Appointment?</h3>
                    <p class="clinic-mb-3">Request a consultation online with your preferred doctor in under 2 minutes.</p>
                    <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary clinic-btn--full">
                        <span>Go to Appointment Request Flow &rarr;</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
get_footer();
