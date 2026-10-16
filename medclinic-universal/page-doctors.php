<?php
/**
 * Template Name: Doctors Directory
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name  = clinic_get_option('clinic_name', '[CLINIC NAME]');
$specialty    = clinic_get_option('specialty', 'Medical Practice');
$doctor_name  = clinic_get_option('doctor_name', 'Dr. Jonathan Miller, MD');
$doctor_qual  = clinic_get_option('doctor_qualifications', 'MBBS, MD (Internal Medicine), FACP');
$doctor_reg   = clinic_get_option('doctor_registration', 'Reg. No. MC-849204');
$doctor_spec  = clinic_get_option('doctor_specialty', 'Senior Consultant Physician');
$doctor_exp   = clinic_get_option('doctor_experience', '16+ Years Clinical Practice');
$doctor_lang  = clinic_get_option('doctor_languages', 'English, Spanish');
$doctor_bio   = clinic_get_option('doctor_bio', 'Dedicated to holistic, evidence-based patient healthcare with a focus on comprehensive preventive medicine, chronic illness management, and patient-centered diagnostic consultations.');
$hero_img     = clinic_get_option('hero_image', MEDCLINIC_URI . '/assets/images/doctor-hero.png');
?>

<main id="main-content" class="clinic-page" role="main">
    <div class="clinic-page-header">
        <div class="clinic-container clinic-text-center">
            <span class="clinic-section-kicker">Clinical Faculty &amp; Specialists</span>
            <h1 class="clinic-page-title">Meet Our Medical Practitioners</h1>
            <p class="clinic-page-subtitle">
                Board-certified specialists dedicated to transparent, respectful, and evidence-grounded healthcare.
            </p>
        </div>
    </div>

    <div class="clinic-container clinic-section">
        <div class="clinic-doctors-grid">
            
            <!-- Lead Doctor Card -->
            <article class="clinic-doctor-card clinic-doctor-card--featured">
                <div class="clinic-doctor-card__media">
                    <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($doctor_name); ?>" width="1448" height="1086" loading="lazy">
                    <span class="clinic-doctor-card__badge">Lead Clinician</span>
                </div>
                <div class="clinic-doctor-card__body">
                    <div class="clinic-doctor-card__header">
                        <span class="clinic-specialty-pill"><?php echo esc_html($doctor_spec); ?></span>
                        <h2 class="clinic-doctor-card__name"><?php echo esc_html($doctor_name); ?></h2>
                        <p class="clinic-doctor-card__qual"><?php echo esc_html($doctor_qual); ?></p>
                        <p class="clinic-doctor-card__reg">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            <span><?php echo esc_html($doctor_reg); ?></span>
                        </p>
                    </div>

                    <div class="clinic-doctor-card__specs">
                        <div class="clinic-spec-item">
                            <span class="clinic-spec-label">Clinical Experience</span>
                            <span class="clinic-spec-val"><?php echo esc_html($doctor_exp); ?></span>
                        </div>
                        <div class="clinic-spec-item">
                            <span class="clinic-spec-label">Languages</span>
                            <span class="clinic-spec-val"><?php echo esc_html($doctor_lang); ?></span>
                        </div>
                        <div class="clinic-spec-item">
                            <span class="clinic-spec-label">Consultation Hours</span>
                            <span class="clinic-spec-val">Mon - Fri: 9:00 AM - 5:00 PM</span>
                        </div>
                    </div>

                    <p class="clinic-doctor-card__bio">
                        <?php echo esc_html($doctor_bio); ?>
                    </p>

                    <div class="clinic-doctor-card__actions">
                        <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <span>Request Appointment</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="clinic-btn clinic-btn--ghost">
                            <span>Inquire via Desk &rarr;</span>
                        </a>
                    </div>
                </div>
            </article>

        </div>
    </div>
</main>

<?php
get_footer();
