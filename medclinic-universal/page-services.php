<?php
/**
 * Template Name: Services & Treatments Directory
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
            <span class="clinic-section-kicker">Clinical Specialties &amp; Care</span>
            <h1 class="clinic-page-title">Treatments &amp; Medical Services</h1>
            <p class="clinic-page-subtitle">
                Individualized clinical pathways designed with evidence-based medicine, sterile equipment, and patient comfort.
            </p>
        </div>
    </div>

    <div class="clinic-container clinic-section">
        <div class="clinic-services-grid">
            
            <!-- Service 1 -->
            <article class="clinic-service-card">
                <div class="clinic-service-card__icon">
                    <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/physician-icon.svg'); ?>" alt="Consultation" width="32" height="32">
                </div>
                <h3 class="clinic-service-card__title">General Medical Consultation</h3>
                <p class="clinic-service-card__text">
                    In-depth clinical diagnostic review, physical examination, symptom triage, and customized medical care planning.
                </p>
                <div class="clinic-service-card__footer">
                    <span class="clinic-service-card__time">Duration: 25 - 40 Mins</span>
                    <a href="<?php echo esc_url(home_url('/services/medical-consultation/')); ?>" class="clinic-text-link">Explore Treatment &rarr;</a>
                </div>
            </article>

            <!-- Service 2 -->
            <article class="clinic-service-card">
                <div class="clinic-service-card__icon">
                    <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/dental-icon.svg'); ?>" alt="Preventive Care" width="32" height="32">
                </div>
                <h3 class="clinic-service-card__title">Preventive Health Screenings</h3>
                <p class="clinic-service-card__text">
                    Comprehensive annual health checks, vital telemetry, and early risk identification for long-term physiological wellness.
                </p>
                <div class="clinic-service-card__footer">
                    <span class="clinic-service-card__time">Duration: 30 - 60 Mins</span>
                    <a href="<?php echo esc_url(home_url('/services/preventive-health/')); ?>" class="clinic-text-link">Explore Treatment &rarr;</a>
                </div>
            </article>

            <!-- Service 3 -->
            <article class="clinic-service-card">
                <div class="clinic-service-card__icon">
                    <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/derma-icon.svg'); ?>" alt="Specialist Care" width="32" height="32">
                </div>
                <h3 class="clinic-service-card__title">Targeted Specialist Therapies</h3>
                <p class="clinic-service-card__text">
                    Focused clinical management for dermatological, musculoskeletal, dental, or gynaecological indications.
                </p>
                <div class="clinic-service-card__footer">
                    <span class="clinic-service-card__time">Duration: 30 - 45 Mins</span>
                    <a href="<?php echo esc_url(home_url('/services/specialist-care/')); ?>" class="clinic-text-link">Explore Treatment &rarr;</a>
                </div>
            </article>

            <!-- Service 4 -->
            <article class="clinic-service-card">
                <div class="clinic-service-card__icon">
                    <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/physio-icon.svg'); ?>" alt="Chronic Care" width="32" height="32">
                </div>
                <h3 class="clinic-service-card__title">Chronic Condition Care</h3>
                <p class="clinic-service-card__text">
                    Ongoing therapeutic management, periodic marker monitoring, and medication titration for chronic stability.
                </p>
                <div class="clinic-service-card__footer">
                    <span class="clinic-service-card__time">Duration: 20 - 30 Mins</span>
                    <a href="<?php echo esc_url(home_url('/services/chronic-care/')); ?>" class="clinic-text-link">Explore Treatment &rarr;</a>
                </div>
            </article>

        </div>

        <div class="clinic-cta-card clinic-mt-8 clinic-text-center">
            <h3>Need Guidance on Which Service to Choose?</h3>
            <p class="clinic-mb-4">Our front desk team is happy to guide you to the right specialist.</p>
            <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary">
                <span>Book a General Assessment</span>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
