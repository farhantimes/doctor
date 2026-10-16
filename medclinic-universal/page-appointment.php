<?php
/**
 * Template Name: Appointment Booking Request
 * Template for MedClinic Universal
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name  = clinic_get_option('clinic_name', '[CLINIC NAME]');
$doctor_name  = clinic_get_option('doctor_name', 'Dr. Jonathan Miller, MD');
$phone        = clinic_get_option('phone', '+1 (555) 234-5678');
$phone_raw    = clinic_get_option('phone_raw', '+15552345678');
$whatsapp_raw = clinic_get_option('whatsapp_raw', '15552345678');
?>

<main id="main-content" class="clinic-page clinic-page--appointment" role="main">
    <div class="clinic-page-header">
        <div class="clinic-container clinic-text-center">
            <span class="clinic-section-kicker">Patient Scheduling</span>
            <h1 class="clinic-page-title">Request a Consultation Appointment</h1>
            <p class="clinic-page-subtitle">
                Fill out the confidential form below. Our clinic coordinator will review your preferred slot and confirm your booking via phone call or WhatsApp.
            </p>
        </div>
    </div>

    <div class="clinic-container clinic-appointment-container">
        <div class="clinic-appointment-layout">
            
            <!-- Left Column: The Appointment Form -->
            <div class="clinic-appointment-form-card">
                <div class="clinic-appointment-form-card__header">
                    <h3>Appointment Request Form</h3>
                    <p class="clinic-text-muted">
                        Please provide basic contact and scheduling preferences. No sensitive medical records are required at this stage.
                    </p>
                </div>

                <form id="clinic-appointment-form" class="clinic-form" novalidate>
                    <input type="hidden" name="action" value="submit_appointment_request">
                    <input type="hidden" name="clinic_nonce" value="<?php echo esc_attr(wp_create_nonce('clinic_appointment_nonce')); ?>">
                    
                    <!-- Honeypot anti-spam field -->
                    <div style="display:none;" aria-hidden="true">
                        <label for="clinic_hp_check">Leave this field blank</label>
                        <input type="text" id="clinic_hp_check" name="clinic_hp_check" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="clinic-form-grid">
                        <!-- Patient Full Name -->
                        <div class="clinic-form-group">
                            <label for="patient_name" class="clinic-label">Patient Full Name <span class="clinic-required">*</span></label>
                            <input type="text" id="patient_name" name="patient_name" class="clinic-input" placeholder="e.g. Eleanor Vance" required>
                            <span class="clinic-error-msg" id="patient_name_error"></span>
                        </div>

                        <!-- Phone Number -->
                        <div class="clinic-form-group">
                            <label for="patient_phone" class="clinic-label">Contact Phone Number <span class="clinic-required">*</span></label>
                            <input type="tel" id="patient_phone" name="patient_phone" class="clinic-input" placeholder="e.g. +1 (555) 019-2834" required>
                            <span class="clinic-error-msg" id="patient_phone_error"></span>
                        </div>
                    </div>

                    <div class="clinic-form-grid">
                        <!-- Preferred Doctor -->
                        <div class="clinic-form-group">
                            <label for="preferred_doctor" class="clinic-label">Preferred Doctor / Clinician</label>
                            <select id="preferred_doctor" name="preferred_doctor" class="clinic-select">
                                <option value="<?php echo esc_attr($doctor_name); ?>"><?php echo esc_html($doctor_name); ?> (Attending Physician)</option>
                                <option value="First Available Doctor">First Available Consulting Specialist</option>
                            </select>
                        </div>

                        <!-- Consultation Type -->
                        <div class="clinic-form-group">
                            <label for="appointment_type" class="clinic-label">Consultation Type</label>
                            <select id="appointment_type" name="appointment_type" class="clinic-select">
                                <option value="In-Clinic General Consultation">In-Clinic Comprehensive Consultation</option>
                                <option value="Preventive Health Checkup">Preventive Health Checkup</option>
                                <option value="Follow-Up Review">Follow-Up Review</option>
                                <option value="Specialist Procedural Assessment">Specialist Procedural Assessment</option>
                            </select>
                        </div>
                    </div>

                    <div class="clinic-form-grid">
                        <!-- Preferred Date -->
                        <div class="clinic-form-group">
                            <label for="preferred_date" class="clinic-label">Preferred Date <span class="clinic-required">*</span></label>
                            <input type="date" id="preferred_date" name="preferred_date" class="clinic-input" min="<?php echo esc_attr(date('Y-m-d')); ?>" required>
                            <span class="clinic-error-msg" id="preferred_date_error"></span>
                        </div>

                        <!-- Preferred Time Window -->
                        <div class="clinic-form-group">
                            <label for="preferred_time" class="clinic-label">Preferred Time Window <span class="clinic-required">*</span></label>
                            <select id="preferred_time" name="preferred_time" class="clinic-select" required>
                                <option value="">Select Time Window</option>
                                <option value="Morning (9:00 AM - 12:00 PM)">Morning (9:00 AM - 12:00 PM)</option>
                                <option value="Afternoon (12:00 PM - 3:00 PM)">Afternoon (12:00 PM - 3:00 PM)</option>
                                <option value="Evening (3:00 PM - 6:00 PM)">Evening (3:00 PM - 6:00 PM)</option>
                            </select>
                            <span class="clinic-error-msg" id="preferred_time_error"></span>
                        </div>
                    </div>

                    <!-- Short Administrative Message -->
                    <div class="clinic-form-group">
                        <label for="admin_message" class="clinic-label">Short Administrative Note (Optional)</label>
                        <textarea id="admin_message" name="admin_message" rows="3" class="clinic-textarea" placeholder="Brief non-confidential note (e.g. 'First time patient', 'Need assistance with stairs'). Please do not submit extensive personal medical histories here."></textarea>
                    </div>

                    <!-- Consent and Privacy Notice Checkbox -->
                    <div class="clinic-form-group clinic-form-group--checkbox">
                        <label class="clinic-checkbox-label">
                            <input type="checkbox" id="patient_consent" name="patient_consent" value="1" required>
                            <span>
                                I understand that this form is an <strong>appointment request</strong> and not a guaranteed booking until confirmed by clinic reception. I agree to the <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" target="_blank">Patient Privacy Policy</a>. <span class="clinic-required">*</span>
                            </span>
                        </label>
                        <span class="clinic-error-msg" id="patient_consent_error"></span>
                    </div>

                    <!-- Form Status / Alert Container -->
                    <div id="clinic-form-status" class="clinic-form-status" style="display:none;" role="alert"></div>

                    <!-- Submit Button -->
                    <div class="clinic-form-actions">
                        <button type="submit" id="clinic-submit-btn" class="clinic-btn clinic-btn--primary clinic-btn--lg clinic-btn--full">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Submit Appointment Request</span>
                        </button>
                    </div>

                    <p class="clinic-form-security-note">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <span>Encrypted SSL Transmission &bull; Confidential Data Handling &bull; HIPAA Conscious Standards</span>
                    </p>
                </form>
            </div>

            <!-- Right Column: Clinic Booking Information & Fast Actions -->
            <div class="clinic-appointment-sidebar">
                <div class="clinic-sidebar-card">
                    <h4 class="clinic-sidebar-card__title">How Your Booking Works</h4>
                    <ol class="clinic-steps-list">
                        <li>
                            <span class="clinic-step-num">1</span>
                            <div>
                                <strong>Request Submission</strong>
                                <p>Select your preferred specialist and scheduling window.</p>
                            </div>
                        </li>
                        <li>
                            <span class="clinic-step-num">2</span>
                            <div>
                                <strong>Coordinator Verification</strong>
                                <p>Our reception reviews doctor availability and diary capacity.</p>
                            </div>
                        </li>
                        <li>
                            <span class="clinic-step-num">3</span>
                            <div>
                                <strong>Prompt Confirmation</strong>
                                <p>You receive confirmation via phone or WhatsApp with visit preparation guidelines.</p>
                            </div>
                        </li>
                    </ol>
                </div>

                <div class="clinic-sidebar-card clinic-sidebar-card--whatsapp">
                    <h4>Prefer Instant Scheduling?</h4>
                    <p>Message our appointment desk directly on WhatsApp for real-time coordinator response.</p>
                    <a href="https://wa.me/<?php echo esc_attr($whatsapp_raw); ?>?text=<?php echo urlencode('Hello, I would like to check available consultation slots today at ' . $clinic_name); ?>" target="_blank" rel="noopener noreferrer" class="clinic-btn clinic-btn--whatsapp clinic-btn--full">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        <span>WhatsApp Quick Booking</span>
                    </a>
                </div>

                <div class="clinic-sidebar-card clinic-sidebar-card--hours">
                    <h4>Clinic Operating Hours</h4>
                    <p class="clinic-mb-2"><strong>Monday - Friday:</strong> 8:00 AM - 6:30 PM</p>
                    <p class="clinic-mb-2"><strong>Saturday:</strong> 9:00 AM - 2:00 PM</p>
                    <p class="clinic-text-muted"><strong>Sunday:</strong> Urgent / On-Call Care Only</p>
                    <hr class="clinic-divider">
                    <p class="clinic-text-sm">
                        For immediate assistance during clinic hours, call: <a href="tel:<?php echo esc_attr($phone_raw); ?>"><strong><?php echo esc_html($phone); ?></strong></a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</main>

<!-- Confirmation Modal (Displayed on successful request) -->
<div id="clinic-confirmation-modal" class="clinic-modal" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="clinic-modal__backdrop"></div>
    <div class="clinic-modal__dialog">
        <div class="clinic-modal__icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h3 class="clinic-modal__title">Appointment Request Received</h3>
        <p class="clinic-modal__message" id="clinic-modal-message">
            Thank you! Your appointment request has been transmitted to our clinic coordinator.
        </p>
        <div class="clinic-modal__summary" id="clinic-modal-summary"></div>
        <div class="clinic-modal__actions">
            <a href="#" id="clinic-modal-whatsapp-btn" target="_blank" rel="noopener noreferrer" class="clinic-btn clinic-btn--whatsapp clinic-btn--full">
                <span>Confirm Instantly via WhatsApp &rarr;</span>
            </a>
            <button type="button" id="clinic-modal-close" class="clinic-btn clinic-btn--ghost clinic-btn--full">
                <span>Done / Return to Website</span>
            </button>
        </div>
    </div>
</div>

<?php
get_footer();
