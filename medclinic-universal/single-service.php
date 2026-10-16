<?php
/**
 * Single Service & Treatment Template
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name   = clinic_get_option('clinic_name', '[CLINIC NAME]');
$doctor_name   = clinic_get_option('doctor_name', 'Dr. Jonathan Miller, MD');
$doctor_spec   = clinic_get_option('doctor_specialty', 'Senior Consultant Physician');
$service_title = get_the_title() ? get_the_title() : 'Comprehensive Medical Consultation';
$hero_img      = clinic_get_option('consultation_image', MEDCLINIC_URI . '/assets/images/clinic-consultation.png');
?>

<main id="main-content" class="clinic-page clinic-page--service-detail" role="main">
    <div class="clinic-container clinic-py-6">
        <nav class="clinic-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> &gt;
            <a href="<?php echo esc_url(home_url('/services/')); ?>">Services</a> &gt;
            <span aria-current="page"><?php echo esc_html($service_title); ?></span>
        </nav>

        <div class="clinic-service-detail-layout">
            <!-- Main Content Area -->
            <article class="clinic-service-detail-main">
                <span class="clinic-specialty-pill">Verified Medical Service</span>
                <h1 class="clinic-page-title clinic-mb-3"><?php echo esc_html($service_title); ?></h1>
                
                <p class="clinic-service-lead">
                    An evidence-based clinical evaluation designed to assess symptoms, review medical background, identify underlying physiological factors, and formulate a personalized recovery plan.
                </p>

                <div class="clinic-service-hero-media clinic-mb-6">
                    <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($service_title); ?>" class="clinic-rounded-card clinic-shadow-md" width="1672" height="941">
                </div>

                <!-- Section: Who This Service Is For -->
                <div class="clinic-content-block">
                    <h3>Who This Service Is For</h3>
                    <p>This clinical service is appropriate for patients who are experiencing:</p>
                    <ul class="clinic-feature-checklist">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Persistent, new, or unaddressed medical symptoms requiring professional diagnosis</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Patients seeking a thorough second opinion on laboratory or imaging findings</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Individuals requiring structured follow-up care and medication management</span>
                        </li>
                    </ul>
                </div>

                <!-- Section: Clinical Explanation -->
                <div class="clinic-content-block">
                    <h3>Clinical Overview & Approach</h3>
                    <p>
                        Our practice adheres to international clinical guidelines. We prioritize non-invasive initial evaluations, clear communication, and collaborative decision-making. No patient is subjected to redundant tests or aggressive therapies without clear diagnostic justification.
                    </p>
                </div>

                <!-- Section: Step-by-Step Consultation & Treatment Process -->
                <div class="clinic-content-block">
                    <h3>Treatment &amp; Consultation Process</h3>
                    <div class="clinic-process-timeline">
                        <div class="clinic-timeline-step">
                            <span class="clinic-step-badge">Phase 1</span>
                            <h4>Initial Clinical Intake & History</h4>
                            <p>Discussion of your symptoms, previous medical history, familial factors, and lifestyle considerations in a private, confidential setting.</p>
                        </div>
                        <div class="clinic-timeline-step">
                            <span class="clinic-step-badge">Phase 2</span>
                            <h4>Diagnostic Examination</h4>
                            <p>System-specific physical examination using certified clinical instruments and vital telemetry tracking.</p>
                        </div>
                        <div class="clinic-timeline-step">
                            <span class="clinic-step-badge">Phase 3</span>
                            <h4>Findings Review & Treatment Strategy</h4>
                            <p>Transparent explanation of all findings, discussion of therapeutic options, and issuance of individualized prescriptions or therapy regimens.</p>
                        </div>
                        <div class="clinic-timeline-step">
                            <span class="clinic-step-badge">Phase 4</span>
                            <h4>Recovery Tracking & Scheduled Review</h4>
                            <p>Coordination of follow-up reviews to monitor therapeutic efficacy, adjust dosages, or order supportive investigations as indicated.</p>
                        </div>
                    </div>
                </div>

                <!-- Section: Service FAQs -->
                <div class="clinic-content-block">
                    <h3>Frequently Asked Questions</h3>
                    <div class="clinic-accordion">
                        <div class="clinic-accordion__item">
                            <button class="clinic-accordion__header" aria-expanded="false">
                                <span>Do I need to fast before this consultation?</span>
                                <svg class="clinic-accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                            </button>
                            <div class="clinic-accordion__content">
                                <p>Standard clinical consultations do not require fasting unless fasting blood glucose or lipid profiling has been specifically requested in advance.</p>
                            </div>
                        </div>
                        <div class="clinic-accordion__item">
                            <button class="clinic-accordion__header" aria-expanded="false">
                                <span>How long does the consultation take?</span>
                                <svg class="clinic-accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                            </button>
                            <div class="clinic-accordion__content">
                                <p>Most comprehensive assessments range from 25 to 45 minutes, ensuring ample time for questions and unhurried clinical examination.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Sidebar: Attending Doctor & Appointment Trigger -->
            <aside class="clinic-service-detail-sidebar">
                <div class="clinic-sidebar-card">
                    <h4>Attending Clinician</h4>
                    <div class="clinic-sidebar-doctor">
                        <img src="<?php echo esc_url(clinic_get_option('hero_image', MEDCLINIC_URI . '/assets/images/doctor-hero.png')); ?>" alt="<?php echo esc_attr($doctor_name); ?>" width="1448" height="1086" class="clinic-rounded-card">
                        <h4 class="clinic-mt-3"><?php echo esc_html($doctor_name); ?></h4>
                        <p class="clinic-text-sm clinic-text-muted"><?php echo esc_html($doctor_spec); ?></p>
                        <a href="<?php echo esc_url(home_url('/doctors/')); ?>" class="clinic-text-link clinic-text-sm">View Doctor Credentials &rarr;</a>
                    </div>
                </div>

                <div class="clinic-sidebar-card clinic-sidebar-card--cta">
                    <h4>Book This Service</h4>
                    <p class="clinic-text-sm">Request your preferred consultation slot online with minimal waiting time.</p>
                    <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary clinic-btn--full">
                        <span>Request Appointment</span>
                    </a>
                    <a href="tel:<?php echo esc_attr(clinic_get_option('phone_raw')); ?>" class="clinic-btn clinic-btn--outline clinic-btn--full clinic-mt-2">
                        <span>Call: <?php echo esc_html(clinic_get_option('phone')); ?></span>
                    </a>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php
get_footer();
