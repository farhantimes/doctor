<?php
/**
 * Footer Template for MedClinic Universal
 *
 * @package MedClinic_Universal
 */
?>
<footer id="site-footer" class="clinic-footer" role="contentinfo">
    <div class="clinic-container clinic-footer__top">
        <div class="clinic-footer__grid">
            <!-- Column 1: Clinic Identity & Mission -->
            <div class="clinic-footer__col clinic-footer__col--brand">
                <div class="clinic-footer__logo">
                    <span class="clinic-logo-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
                    </span>
                    <span class="clinic-name"><?php echo esc_html(clinic_get_option('clinic_name', '[CLINIC NAME]')); ?></span>
                </div>
                <p class="clinic-footer__desc">
                    <?php echo esc_html(clinic_get_option('specialty', 'Doctor & Clinic Practice')); ?> providing evidence-based medical consultations, modern diagnostic standards, and personalized patient care with compassionate excellence.
                </p>
                <div class="clinic-footer__accreditation">
                    <span class="clinic-pill-tag">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        <span>Verified Medical Facility Standards</span>
                    </span>
                </div>
                <?php if (clinic_is_demo_mode()) : ?>
                    <div class="clinic-footer__demo-note">
                        <small><strong>Note:</strong> <?php echo esc_html(clinic_get_option('demo_badge_text', 'Website Concept Demo')); ?>. For demonstration and prospective client review.</small>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="clinic-footer__col">
                <h4 class="clinic-footer__heading"><?php esc_html_e('Practice & Care', 'medclinic-universal'); ?></h4>
                <ul class="clinic-footer__links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About Our Clinic', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/doctors/')); ?>"><?php esc_html_e('Medical Doctors', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Services & Treatments', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Frequently Asked Questions', 'medclinic-universal'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/appointment/')); ?>"><?php esc_html_e('Request Appointment', 'medclinic-universal'); ?></a></li>
                </ul>
            </div>

            <!-- Column 3: Clinical Timings -->
            <div class="clinic-footer__col">
                <h4 class="clinic-footer__heading"><?php esc_html_e('Consultation Timings', 'medclinic-universal'); ?></h4>
                <div class="clinic-timings-card">
                    <div class="clinic-timings-row">
                        <span class="clinic-timings-day">Monday - Friday</span>
                        <span class="clinic-timings-hours">8:00 AM - 6:30 PM</span>
                    </div>
                    <div class="clinic-timings-row">
                        <span class="clinic-timings-day">Saturday</span>
                        <span class="clinic-timings-hours">9:00 AM - 2:00 PM</span>
                    </div>
                    <div class="clinic-timings-row clinic-timings-row--muted">
                        <span class="clinic-timings-day">Sunday</span>
                        <span class="clinic-timings-hours">Emergency / On-Call</span>
                    </div>
                </div>
                <p class="clinic-footer__note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <span>Prior appointment recommended for thorough consultation. Walk-ins prioritized by triage acuity.</span>
                </p>
            </div>

            <!-- Column 4: Location & Direct Contact -->
            <div class="clinic-footer__col">
                <h4 class="clinic-footer__heading"><?php esc_html_e('Clinic Location', 'medclinic-universal'); ?></h4>
                <address class="clinic-footer__address">
                    <p class="clinic-address-text">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>
                            <?php echo esc_html(clinic_get_option('address', 'Suite 400, Medical Arts Pavilion')); ?><br>
                            <?php echo esc_html(clinic_get_option('city_state_zip', 'Healthcare Blvd, MC 90210')); ?>
                        </span>
                    </p>
                    <p class="clinic-footer__contact-line">
                        <a href="tel:<?php echo esc_attr(clinic_get_option('phone_raw', '+15552345678')); ?>">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span><?php echo esc_html(clinic_get_option('phone', '+1 (555) 234-5678')); ?></span>
                        </a>
                    </p>
                    <p class="clinic-footer__contact-line">
                        <a href="mailto:<?php echo esc_attr(clinic_get_option('email', 'care@clinicdemocare.org')); ?>">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <span><?php echo esc_html(clinic_get_option('email', 'care@clinicdemocare.org')); ?></span>
                        </a>
                    </p>
                </address>
                <div class="clinic-footer__directions-link">
                    <a href="https://maps.google.com/?q=<?php echo urlencode(clinic_get_option('address') . ' ' . clinic_get_option('city_state_zip')); ?>" target="_blank" rel="noopener noreferrer" class="clinic-btn clinic-btn--sm clinic-btn--ghost">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
                        <span>Get Directions on Map &rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Medical & Legal Disclaimer Strip -->
    <div class="clinic-footer__disclaimer">
        <div class="clinic-container">
            <p>
                <strong>Medical Notice & Patient Advisory:</strong> The medical, health and clinical information presented on this website is strictly for general informational and educational purposes. It does not constitute medical diagnosis, personalized treatment advice, or formal clinical care. Always consult directly with our certified healthcare practitioners or your primary physician regarding medical conditions or symptoms. In case of emergency, immediately contact your local emergency response or hospital.
            </p>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="clinic-footer__bottom">
        <div class="clinic-container clinic-footer__bottom-inner">
            <p class="clinic-footer__copy">
                &copy; <?php echo esc_html(date('Y')); ?> <?php echo esc_html(clinic_get_option('clinic_name', '[CLINIC NAME]')); ?>. All Rights Reserved.
            </p>
            <div class="clinic-footer__legal-links">
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy & Patient Rights', 'medclinic-universal'); ?></a>
                <span class="clinic-divider">&bull;</span>
                <a href="<?php echo esc_url(home_url('/terms/')); ?>"><?php esc_html_e('Terms & Clinical Consent', 'medclinic-universal'); ?></a>
                <span class="clinic-divider">&bull;</span>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Patient FAQs', 'medclinic-universal'); ?></a>
            </div>
        </div>
    </div>
</footer>

<!-- Floating Mobile Action Bar (Sticky Call, WhatsApp, Book) -->
<div class="clinic-mobile-bar" aria-label="<?php esc_attr_e('Quick Mobile Actions', 'medclinic-universal'); ?>">
    <a href="tel:<?php echo esc_attr(clinic_get_option('phone_raw', '+15552345678')); ?>" class="clinic-mobile-bar__btn clinic-mobile-bar__btn--call">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span>Call</span>
    </a>
    <a href="https://wa.me/<?php echo esc_attr(clinic_get_option('whatsapp_raw', '15552345678')); ?>?text=<?php echo urlencode('Hello, I would like to request an appointment at ' . clinic_get_option('clinic_name', '[CLINIC NAME]')); ?>" target="_blank" rel="noopener noreferrer" class="clinic-mobile-bar__btn clinic-mobile-bar__btn--whatsapp">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        <span>WhatsApp</span>
    </a>
    <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-mobile-bar__btn clinic-mobile-bar__btn--book">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <span>Book Visit</span>
    </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
