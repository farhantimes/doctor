<?php
/**
 * Template Name: Patient FAQs
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name = clinic_get_option('clinic_name', '[CLINIC NAME]');
$specialty   = clinic_get_option('specialty', 'Medical Practice');
?>

<main id="main-content" class="clinic-page" role="main">
    <div class="clinic-page-header">
        <div class="clinic-container clinic-text-center">
            <span class="clinic-section-kicker">Patient Resources</span>
            <h1 class="clinic-page-title">Frequently Asked Questions</h1>
            <p class="clinic-page-subtitle">
                Clear answers regarding our appointment workflow, consultation protocols, clinical hygiene, and billing policies.
            </p>
        </div>
    </div>

    <div class="clinic-container clinic-container--narrow clinic-section">
        <div class="clinic-accordion" id="clinic-full-faqs">
            
            <h3 class="clinic-faq-category">Appointment &amp; Scheduling</h3>
            
            <div class="clinic-accordion__item">
                <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="page-faq-1" id="pfaq-1">
                    <span class="clinic-accordion__title">How do I request an appointment online?</span>
                    <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="clinic-accordion__content" id="page-faq-1" role="region" aria-labelledby="pfaq-1">
                    <p>
                        Navigate to our <a href="<?php echo esc_url(home_url('/appointment/')); ?>">Appointment Request Page</a>, select your preferred date, time window, and preferred specialist. Once submitted, our reception coordinator reviews clinical capacity and reaches out via phone or WhatsApp to finalize your booking.
                    </p>
                </div>
            </div>

            <div class="clinic-accordion__item">
                <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="page-faq-2" id="pfaq-2">
                    <span class="clinic-accordion__title">What happens if I need to reschedule or cancel?</span>
                    <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="clinic-accordion__content" id="page-faq-2" role="region" aria-labelledby="pfaq-2">
                    <p>
                        We kindly ask for at least 24 hours notice to cancel or reschedule appointments so that allocated time can be offered to waiting patients. Simply call or WhatsApp our front desk.
                    </p>
                </div>
            </div>

            <h3 class="clinic-faq-category clinic-mt-6">Clinical Care &amp; Consultations</h3>

            <div class="clinic-accordion__item">
                <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="page-faq-3" id="pfaq-3">
                    <span class="clinic-accordion__title">How long does a typical initial consultation take?</span>
                    <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="clinic-accordion__content" id="page-faq-3" role="region" aria-labelledby="pfaq-3">
                    <p>
                        An initial comprehensive consultation typically lasts 25 to 45 minutes depending on clinical complexity. Follow-up reviews average 15 to 25 minutes.
                    </p>
                </div>
            </div>

            <div class="clinic-accordion__item">
                <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="page-faq-4" id="pfaq-4">
                    <span class="clinic-accordion__title">Are patient consultations private and confidential?</span>
                    <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="clinic-accordion__content" id="page-faq-4" role="region" aria-labelledby="pfaq-4">
                    <p>
                        Yes. All consultations take place in acoustically insulated private rooms. All medical records and diagnostic correspondence are strictly protected in compliance with healthcare privacy legislation and HIPAA standards.
                    </p>
                </div>
            </div>

            <h3 class="clinic-faq-category clinic-mt-6">Hygiene &amp; Safety</h3>

            <div class="clinic-accordion__item">
                <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="page-faq-5" id="pfaq-5">
                    <span class="clinic-accordion__title">What measures are taken to prevent cross-contamination?</span>
                    <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="clinic-accordion__content" id="page-faq-5" role="region" aria-labelledby="pfaq-5">
                    <p>
                        We use Class-B autoclave sterilization for all reusable medical instruments, packaged in sealed surgical pouches with sterilization indicators. Non-reusable consumables are discarded after a single use. Examination suites are sanitized after each patient.
                    </p>
                </div>
            </div>

        </div>

        <div class="clinic-cta-card clinic-mt-8 clinic-text-center">
            <h3>Have a Specific Question?</h3>
            <p class="clinic-mb-3">Our patient care desk is available to answer any questions.</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="clinic-btn clinic-btn--primary">
                <span>Contact Our Front Desk</span>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
