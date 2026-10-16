<?php
/**
 * Single Doctor Profile Template
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name  = clinic_get_option('clinic_name', '[CLINIC NAME]');
$doctor_name  = get_the_title() ? get_the_title() : clinic_get_option('doctor_name', 'Dr. Jonathan Miller, MD');
$doctor_qual  = get_post_meta(get_the_ID(), '_clinic_doctor_qual', true) ?: clinic_get_option('doctor_qualifications', 'MBBS, MD (Internal Medicine), FACP');
$doctor_reg   = get_post_meta(get_the_ID(), '_clinic_doctor_reg', true) ?: clinic_get_option('doctor_registration', 'Reg. No. MC-849204');
$doctor_spec  = get_post_meta(get_the_ID(), '_clinic_doctor_spec', true) ?: clinic_get_option('doctor_specialty', 'Senior Consultant Physician');
$doctor_exp   = get_post_meta(get_the_ID(), '_clinic_doctor_exp', true) ?: clinic_get_option('doctor_experience', '16+ Years Clinical Practice');
$doctor_lang  = get_post_meta(get_the_ID(), '_clinic_doctor_lang', true) ?: clinic_get_option('doctor_languages', 'English, Spanish');
$doctor_timings = get_post_meta(get_the_ID(), '_clinic_doctor_timings', true) ?: 'Mon - Fri: 9:00 AM - 5:00 PM';
$hero_img     = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : clinic_get_option('hero_image', MEDCLINIC_URI . '/assets/images/doctor-hero.png');
?>

<main id="main-content" class="clinic-page clinic-page--doctor-profile" role="main">
    <div class="clinic-container clinic-py-6">
        <nav class="clinic-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> &gt;
            <a href="<?php echo esc_url(home_url('/doctors/')); ?>">Doctors</a> &gt;
            <span aria-current="page"><?php echo esc_html($doctor_name); ?></span>
        </nav>

        <div class="clinic-doctor-single-layout">
            <aside class="clinic-doctor-single-sidebar">
                <div class="clinic-doctor-single-img-card">
                    <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($doctor_name); ?>" width="1448" height="1086" class="clinic-rounded-card">
                </div>
                
                <div class="clinic-card clinic-mt-4">
                    <h4>Consultation Summary</h4>
                    <p class="clinic-text-sm clinic-mb-2"><strong>Location:</strong> <?php echo esc_html(clinic_get_option('address')); ?></p>
                    <p class="clinic-text-sm clinic-mb-2"><strong>Hours:</strong> <?php echo esc_html($doctor_timings); ?></p>
                    <p class="clinic-text-sm clinic-mb-4"><strong>Languages:</strong> <?php echo esc_html($doctor_lang); ?></p>
                    <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary clinic-btn--full">
                        <span>Book Visit with Doctor</span>
                    </a>
                </div>
            </aside>

            <article class="clinic-doctor-single-main">
                <span class="clinic-specialty-pill"><?php echo esc_html($doctor_spec); ?></span>
                <h1 class="clinic-page-title clinic-mb-2"><?php echo esc_html($doctor_name); ?></h1>
                <p class="clinic-doctor-qual clinic-mb-2"><?php echo esc_html($doctor_qual); ?></p>
                <p class="clinic-doctor-reg clinic-mb-4">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>Verified Council Registration: <strong><?php echo esc_html($doctor_reg); ?></strong></span>
                </p>

                <hr class="clinic-divider">

                <h3>Professional Biography</h3>
                <div class="clinic-body-text clinic-mb-6">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; else : ?>
                        <p><?php echo esc_html(clinic_get_option('doctor_bio')); ?></p>
                        <p>Dr. Miller works in close collaboration with the clinic's allied health professionals and nursing teams to deliver multidisciplinary care. Clinical investigations are pursued with precision and transparent dialogue, ensuring that each patient is fully informed at every juncture of their health journey.</p>
                    <?php endif; ?>
                </div>

                <h3>Clinical Focus Areas</h3>
                <div class="clinic-focus-grid clinic-mb-6">
                    <div class="clinic-focus-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Comprehensive Diagnostic Evaluations</span>
                    </div>
                    <div class="clinic-focus-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Cardiovascular &amp; Metabolic Health</span>
                    </div>
                    <div class="clinic-focus-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Preventive Medical Screenings</span>
                    </div>
                    <div class="clinic-focus-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Chronic Illness Follow-Up &amp; Tele-reviews</span>
                    </div>
                </div>

                <div class="clinic-cta-card clinic-mt-6">
                    <h3>Schedule a Consultation</h3>
                    <p>Appointments are scheduled to allow thorough, unhurried assessment.</p>
                    <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary">
                        <span>Request an Appointment &rarr;</span>
                    </a>
                </div>
            </article>
        </div>
    </div>
</main>

<?php
get_footer();
