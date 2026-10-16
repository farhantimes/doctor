<?php
/**
 * Template Name: About The Clinic
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name   = clinic_get_option('clinic_name', '[CLINIC NAME]');
$specialty     = clinic_get_option('specialty', 'Medical Practice');
$reception_img = clinic_get_option('reception_image', MEDCLINIC_URI . '/assets/images/clinic-reception.png');
$consult_img   = clinic_get_option('consultation_image', MEDCLINIC_URI . '/assets/images/clinic-consultation.png');
$doctor_name   = clinic_get_option('doctor_name', 'Dr. Jonathan Miller, MD');
?>

<main id="main-content" class="clinic-page clinic-page--about" role="main">
    <div class="clinic-page-header">
        <div class="clinic-container clinic-text-center">
            <span class="clinic-section-kicker">About Our Practice</span>
            <h1 class="clinic-page-title">Dedicated to Exemplary Patient Care</h1>
            <p class="clinic-page-subtitle">
                A modern healthcare environment focused on scientific rigor, patient comfort, and respectful consultation.
            </p>
        </div>
    </div>

    <div class="clinic-container clinic-section">
        <div class="clinic-intro-grid">
            <div class="clinic-intro-content">
                <span class="clinic-section-kicker">Our Medical Mission</span>
                <h2>Healthcare Grounded in Ethics, Clarity &amp; Compassion</h2>
                <p class="clinic-body-text">
                    Founded with a commitment to evidence-based healthcare, <strong><?php echo esc_html($clinic_name); ?></strong> provides patient-centered consultations across <?php echo esc_html($specialty); ?>.
                </p>
                <p class="clinic-body-text">
                    We believe the most effective medical care occurs when patients feel heard, respected, and fully informed about every diagnosis and procedural step. We avoid commercialized medical pressure, ensuring every clinical decision is strictly driven by the patient's individual physiological health requirements.
                </p>
                <div class="clinic-pillars-mini-grid clinic-mt-4">
                    <div class="clinic-pillar-mini">
                        <strong>Autoclave Sterilization</strong>
                        <p class="clinic-text-sm">Rigorous infection-control standards exceeding statutory guidelines.</p>
                    </div>
                    <div class="clinic-pillar-mini">
                        <strong>Unhurried Consultations</strong>
                        <p class="clinic-text-sm">Ample time reserved for questions, diagnostics, and patient dialogue.</p>
                    </div>
                </div>
            </div>
            <div class="clinic-intro-media">
                <img src="<?php echo esc_url($reception_img); ?>" alt="Modern Clinic Reception and Consultation Lounge" class="clinic-rounded-card clinic-shadow-lg" width="1448" height="1086">
            </div>
        </div>

        <div class="clinic-section clinic-mt-8">
            <div class="clinic-text-center clinic-mb-6">
                <span class="clinic-section-kicker">Clinical Standards</span>
                <h2 class="clinic-section-title">Our Four Patient Commitments</h2>
            </div>
            <div class="clinic-pillars-grid">
                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3>Patient Safety First</h3>
                    <p>Continuous room sanitization, air filtration, and non-toxic medical grade sterilization.</p>
                </div>
                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <h3>Transparent Treatment Costs</h3>
                    <p>Clear, itemized fee schedules communicated before any investigation or procedural intervention.</p>
                </div>
                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                    </div>
                    <h3>Evidence-Based Diagnosis</h3>
                    <p>Treatments validated by modern medical research, avoiding unverified therapeutic fads.</p>
                </div>
                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    </div>
                    <h3>Respect for Your Time</h3>
                    <p>Disciplined diary management to avoid extended waiting periods in clinic lounges.</p>
                </div>
            </div>
        </div>

        <div class="clinic-cta-card clinic-mt-8 clinic-text-center">
            <h3>Visit Our Clinic or Consult a Specialist</h3>
            <p class="clinic-mb-4">Experience personalized medical consultations tailored to your individual health journey.</p>
            <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary">
                <span>Request an Appointment &rarr;</span>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
