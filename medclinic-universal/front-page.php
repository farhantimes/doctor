<?php
/**
 * Front Page Template for MedClinic Universal Theme
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name     = clinic_get_option('clinic_name', '[CLINIC NAME]');
$specialty       = clinic_get_option('specialty', 'Doctor & Clinic Practice');
$doctor_name     = clinic_get_option('doctor_name', 'Dr. Jonathan Miller, MD');
$doctor_qual     = clinic_get_option('doctor_qualifications', 'MBBS, MD (Internal Medicine), FACP');
$doctor_reg      = clinic_get_option('doctor_registration', 'Reg. No. MC-849204');
$doctor_spec     = clinic_get_option('doctor_specialty', 'Senior Consultant Physician');
$doctor_exp      = clinic_get_option('doctor_experience', '16+ Years Clinical Practice');
$doctor_lang     = clinic_get_option('doctor_languages', 'English, Spanish');
$doctor_bio      = clinic_get_option('doctor_bio', 'Dedicated to holistic, evidence-based patient healthcare with a focus on comprehensive preventive medicine, chronic illness management, and patient-centered diagnostic consultations.');
$phone           = clinic_get_option('phone', '+1 (555) 234-5678');
$phone_raw       = clinic_get_option('phone_raw', '+15552345678');
$whatsapp_raw    = clinic_get_option('whatsapp_raw', '15552345678');
$hero_img        = clinic_get_option('hero_image', MEDCLINIC_URI . '/assets/images/doctor-hero.png');
$reception_img   = clinic_get_option('reception_image', MEDCLINIC_URI . '/assets/images/clinic-reception.png');
$consult_img     = clinic_get_option('consultation_image', MEDCLINIC_URI . '/assets/images/clinic-consultation.png');
$is_demo         = clinic_is_demo_mode();
?>

<main id="main-content" class="clinic-homepage" role="main">

    <!-- ========================================================
         SECTION 1: HERO SECTION
         ======================================================== -->
    <?php if (clinic_get_option('show_hero', true)) : ?>
    <section class="clinic-hero" aria-label="<?php esc_attr_e('Clinic Introduction', 'medclinic-universal'); ?>">
        <div class="clinic-container clinic-hero__inner">
            <div class="clinic-hero__content">
                <div class="clinic-badge clinic-badge--soft">
                    <span class="clinic-pulse-dot" aria-hidden="true"></span>
                    <span><?php echo esc_html($specialty); ?></span>
                </div>
                
                <h1 class="clinic-hero__title">
                    <?php echo esc_html(clinic_get_option('hero_heading', 'Advanced, Compassionate Healthcare for You & Your Family')); ?>
                </h1>
                
                <p class="clinic-hero__lead">
                    <?php echo esc_html(clinic_get_option('hero_subheading', 'Experience personalized medical consultations, minimal wait times, state-of-the-art diagnostic facilities, and dedicated physician care designed around your comfort.')); ?>
                </p>

                <div class="clinic-hero__actions">
                    <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary clinic-btn--lg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <span><?php echo esc_html(clinic_get_option('cta_button_text', 'Request an Appointment')); ?></span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="clinic-btn clinic-btn--ghost clinic-btn--lg">
                        <span><?php echo esc_html(clinic_get_option('cta_secondary_text', 'View All Treatments &rarr;')); ?></span>
                    </a>
                </div>

                <!-- Trust Metrics / Clinic Highlights -->
                <div class="clinic-hero__trust">
                    <div class="clinic-trust-item">
                        <span class="clinic-trust-item__num">15+</span>
                        <span class="clinic-trust-item__label">Years Medical Experience</span>
                    </div>
                    <div class="clinic-trust-item__divider"></div>
                    <div class="clinic-trust-item">
                        <span class="clinic-trust-item__num">10k+</span>
                        <span class="clinic-trust-item__label">Patients Consulted</span>
                    </div>
                    <div class="clinic-trust-item__divider"></div>
                    <div class="clinic-trust-item">
                        <span class="clinic-trust-item__num">100%</span>
                        <span class="clinic-trust-item__label">Sterilized & Certified</span>
                    </div>
                </div>
            </div>

            <div class="clinic-hero__media">
                <div class="clinic-hero__image-wrapper">
                    <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($doctor_name . ' at ' . $clinic_name); ?>" class="clinic-hero__img" width="1448" height="1086" loading="eager" fetchpriority="high">
                    <div class="clinic-hero__float-card clinic-hero__float-card--doctor">
                        <div class="clinic-doctor-avatar">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div>
                            <strong><?php echo esc_html($doctor_name); ?></strong>
                            <span><?php echo esc_html($doctor_spec); ?></span>
                        </div>
                    </div>
                    <div class="clinic-hero__float-card clinic-hero__float-card--status">
                        <span class="clinic-status-indicator"></span>
                        <div>
                            <strong>Accepting New Patients</strong>
                            <small>Consultations by Appointment</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 2: CLINIC INTRODUCTION & PRACTICE VALUES
         ======================================================== -->
    <?php if (clinic_get_option('show_about', true)) : ?>
    <section class="clinic-section clinic-section--intro">
        <div class="clinic-container">
            <div class="clinic-intro-grid">
                <div class="clinic-intro-content">
                    <span class="clinic-section-kicker">About Our Practice</span>
                    <h2 class="clinic-section-title">Patient-First Medical Care Grounded in Science & Compassion</h2>
                    <p class="clinic-body-text">
                        At <strong><?php echo esc_html($clinic_name); ?></strong>, we believe every patient deserves thorough, unhurried attention. Our clinic combines evidence-based diagnostic protocols with a calm, welcoming environment where you can discuss your health concerns in total confidence.
                    </p>
                    <p class="clinic-body-text">
                        Whether you are visiting for routine preventive checkups, specialist consultation, or ongoing health management, our dedicated medical team is committed to delivering clear clinical guidance, transparent treatment pathways, and dignified patient care.
                    </p>
                    <ul class="clinic-feature-checklist">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Modern diagnostic equipment and sterile clinical rooms</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Transparent consultation fees with zero hidden procedural charges</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Prompt appointment scheduling with minimized waiting room times</span>
                        </li>
                    </ul>
                </div>
                <div class="clinic-intro-media">
                    <img src="<?php echo esc_url($consult_img); ?>" alt="Doctor consultation with patient" class="clinic-rounded-card clinic-shadow-lg" width="1672" height="941" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 3: SPECIALITY AND SERVICES GRID
         ======================================================== -->
    <?php if (clinic_get_option('show_services', true)) : ?>
    <section class="clinic-section clinic-section--alt" id="services">
        <div class="clinic-container">
            <div class="clinic-section-header clinic-text-center">
                <span class="clinic-section-kicker"><?php echo esc_html($specialty); ?></span>
                <h2 class="clinic-section-title">Comprehensive Medical Services & Treatments</h2>
                <p class="clinic-section-subtitle">
                    Evidence-based clinical treatments delivered with verified medical hygiene, advanced clinical technology, and compassionate patient care.
                </p>
            </div>

            <div class="clinic-services-grid">
                <!-- Service 1 -->
                <article class="clinic-service-card">
                    <div class="clinic-service-card__icon">
                        <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/physician-icon.svg'); ?>" alt="Consultation" width="32" height="32">
                    </div>
                    <h3 class="clinic-service-card__title">Comprehensive Medical Consultation</h3>
                    <p class="clinic-service-card__text">
                        In-depth diagnostic assessment, medical history review, systemic physical examination, and individualized treatment planning for acute or ongoing health concerns.
                    </p>
                    <div class="clinic-service-card__footer">
                        <span class="clinic-service-card__time">Duration: 25 - 40 Mins</span>
                        <a href="<?php echo esc_url(home_url('/services/medical-consultation/')); ?>" class="clinic-text-link">Learn More &rarr;</a>
                    </div>
                </article>

                <!-- Service 2 -->
                <article class="clinic-service-card">
                    <div class="clinic-service-card__icon">
                        <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/dental-icon.svg'); ?>" alt="Preventive Care" width="32" height="32">
                    </div>
                    <h3 class="clinic-service-card__title">Preventive Health & Diagnostic Screenings</h3>
                    <p class="clinic-service-card__text">
                        Targeted screening packages, annual wellness reviews, routine lab evaluations, and preventive risk assessments designed to catch health issues before symptoms emerge.
                    </p>
                    <div class="clinic-service-card__footer">
                        <span class="clinic-service-card__time">Duration: 30 - 60 Mins</span>
                        <a href="<?php echo esc_url(home_url('/services/preventive-health/')); ?>" class="clinic-text-link">Learn More &rarr;</a>
                    </div>
                </article>

                <!-- Service 3 -->
                <article class="clinic-service-card">
                    <div class="clinic-service-card__icon">
                        <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/derma-icon.svg'); ?>" alt="Specialist Assessment" width="32" height="32">
                    </div>
                    <h3 class="clinic-service-card__title">Targeted Specialist Assessment & Therapy</h3>
                    <p class="clinic-service-card__text">
                        Advanced clinical care tailored to your specific condition, including procedural evaluations, targeted therapeutic interventions, and structured recovery plans.
                    </p>
                    <div class="clinic-service-card__footer">
                        <span class="clinic-service-card__time">Duration: 30 - 45 Mins</span>
                        <a href="<?php echo esc_url(home_url('/services/specialist-care/')); ?>" class="clinic-text-link">Learn More &rarr;</a>
                    </div>
                </article>

                <!-- Service 4 -->
                <article class="clinic-service-card">
                    <div class="clinic-service-card__icon">
                        <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/physio-icon.svg'); ?>" alt="Chronic Care" width="32" height="32">
                    </div>
                    <h3 class="clinic-service-card__title">Chronic Condition Care & Follow-Up</h3>
                    <p class="clinic-service-card__text">
                        Long-term management plans, medication reviews, and periodic health metric tracking to help maintain optimal physical stability and quality of life.
                    </p>
                    <div class="clinic-service-card__footer">
                        <span class="clinic-service-card__time">Duration: 20 - 30 Mins</span>
                        <a href="<?php echo esc_url(home_url('/services/chronic-care/')); ?>" class="clinic-text-link">Learn More &rarr;</a>
                    </div>
                </article>

                <!-- Service 5 -->
                <article class="clinic-service-card">
                    <div class="clinic-service-card__icon">
                        <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/gynae-icon.svg'); ?>" alt="Family Care" width="32" height="32">
                    </div>
                    <h3 class="clinic-service-card__title">Family Wellness & Lifestyle Guidance</h3>
                    <p class="clinic-service-card__text">
                        Nutritional advice, cardiovascular wellness checks, and preventative lifestyle coaching designed to keep your family active, energized, and medically resilient.
                    </p>
                    <div class="clinic-service-card__footer">
                        <span class="clinic-service-card__time">Duration: 30 Mins</span>
                        <a href="<?php echo esc_url(home_url('/services/wellness/')); ?>" class="clinic-text-link">Learn More &rarr;</a>
                    </div>
                </article>

                <!-- Service 6 -->
                <article class="clinic-service-card">
                    <div class="clinic-service-card__icon">
                        <img src="<?php echo esc_url(MEDCLINIC_URI . '/assets/images/multispec-icon.svg'); ?>" alt="Diagnostic Lab" width="32" height="32">
                    </div>
                    <h3 class="clinic-service-card__title">Diagnostic Pathology & In-Clinic Testing</h3>
                    <p class="clinic-service-card__text">
                        Fast-turnaround point-of-care laboratory tests, vital telemetry, and partner imaging reviews to ensure immediate clarity for all treatment decisions.
                    </p>
                    <div class="clinic-service-card__footer">
                        <span class="clinic-service-card__time">Duration: 15 - 20 Mins</span>
                        <a href="<?php echo esc_url(home_url('/services/diagnostics/')); ?>" class="clinic-text-link">Learn More &rarr;</a>
                    </div>
                </article>
            </div>

            <div class="clinic-text-center clinic-mt-6">
                <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span>Schedule a Treatment Consultation</span>
                </a>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 4: MEET THE DOCTOR / MEDICAL STAFF
         ======================================================== -->
    <?php if (clinic_get_option('show_doctors', true)) : ?>
    <section class="clinic-section" id="doctors">
        <div class="clinic-container">
            <div class="clinic-section-header clinic-text-center">
                <span class="clinic-section-kicker">Physician Leadership</span>
                <h2 class="clinic-section-title">Meet Your Attending Doctor</h2>
                <p class="clinic-section-subtitle">
                    Qualified, credentialed, and focused on transparent, respectful doctor-patient relationships.
                </p>
            </div>

            <div class="clinic-doctor-profile-card">
                <div class="clinic-doctor-profile-card__image-col">
                    <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($doctor_name); ?>" class="clinic-doctor-profile-card__img" width="1448" height="1086" loading="lazy">
                    <div class="clinic-doctor-profile-card__reg-tag">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        <span><?php echo esc_html($doctor_reg); ?></span>
                    </div>
                </div>

                <div class="clinic-doctor-profile-card__content-col">
                    <div class="clinic-doctor-header">
                        <h3 class="clinic-doctor-name"><?php echo esc_html($doctor_name); ?></h3>
                        <p class="clinic-doctor-spec"><?php echo esc_html($doctor_spec); ?></p>
                        <p class="clinic-doctor-qual"><?php echo esc_html($doctor_qual); ?></p>
                    </div>

                    <div class="clinic-doctor-meta-grid">
                        <div class="clinic-doctor-meta-item">
                            <span class="clinic-doctor-meta-label">Experience</span>
                            <span class="clinic-doctor-meta-val"><?php echo esc_html($doctor_exp); ?></span>
                        </div>
                        <div class="clinic-doctor-meta-item">
                            <span class="clinic-doctor-meta-label">Languages Spoken</span>
                            <span class="clinic-doctor-meta-val"><?php echo esc_html($doctor_lang); ?></span>
                        </div>
                        <div class="clinic-doctor-meta-item">
                            <span class="clinic-doctor-meta-label">Consultation Timings</span>
                            <span class="clinic-doctor-meta-val">Mon - Fri: 9 AM - 5 PM</span>
                        </div>
                    </div>

                    <p class="clinic-doctor-bio">
                        <?php echo esc_html($doctor_bio); ?>
                    </p>

                    <div class="clinic-doctor-actions">
                        <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--primary">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <span>Book Consultation with <?php echo esc_html($doctor_name); ?></span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/doctors/')); ?>" class="clinic-btn clinic-btn--ghost">
                            <span>View Full Credentials &rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 5: WHY PATIENTS CHOOSE THIS CLINIC
         ======================================================== -->
    <?php if (clinic_get_option('show_why_us', true)) : ?>
    <section class="clinic-section clinic-section--alt">
        <div class="clinic-container">
            <div class="clinic-section-header clinic-text-center">
                <span class="clinic-section-kicker">Clinical Excellence</span>
                <h2 class="clinic-section-title">Why Patients Entrust Their Health to Us</h2>
                <p class="clinic-section-subtitle">
                    Setting the benchmark in medical safety, unhurried consultations, and patient-centered treatment ethics.
                </p>
            </div>

            <div class="clinic-pillars-grid">
                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3 class="clinic-pillar-card__title">Hospital-Grade Sterilization</h3>
                    <p class="clinic-pillar-card__text">
                        Stringent multi-tier autoclaving, disposable medical consumables, and daily sanitization protocols ensure total protection against infection.
                    </p>
                </div>

                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <h3 class="clinic-pillar-card__title">Minimal Wait Times</h3>
                    <p class="clinic-pillar-card__text">
                        Our structured appointment system is optimized so you spend your time consulting directly with your doctor rather than waiting in crowded reception halls.
                    </p>
                </div>

                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <h3 class="clinic-pillar-card__title">Transparent Dialogue</h3>
                    <p class="clinic-pillar-card__text">
                        Every diagnosis and prescription is clearly explained. You receive transparent consultation fees with zero unwarranted medical tests.
                    </p>
                </div>

                <div class="clinic-pillar-card">
                    <div class="clinic-pillar-card__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <h3 class="clinic-pillar-card__title">Board-Certified Clinicians</h3>
                    <p class="clinic-pillar-card__text">
                        Every attending doctor holds verified medical degrees, registered council affiliations, and active memberships in professional clinical bodies.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 6: CLINIC FACILITIES & GALLERY SHOWCASE
         ======================================================== -->
    <?php if (clinic_get_option('show_gallery', true)) : ?>
    <section class="clinic-section">
        <div class="clinic-container">
            <div class="clinic-section-header clinic-text-center">
                <span class="clinic-section-kicker">Clinical Environment</span>
                <h2 class="clinic-section-title">Designed for Modern Comfort & Hygiene</h2>
                <p class="clinic-section-subtitle">
                    Take a preview inside our welcoming reception and equipped consultation suites.
                </p>
            </div>

            <div class="clinic-facilities-grid">
                <div class="clinic-facility-card">
                    <div class="clinic-facility-card__media">
                        <img src="<?php echo esc_url($reception_img); ?>" alt="Modern clinic reception and clean consultation room" width="1448" height="1086" loading="lazy">
                    </div>
                    <div class="clinic-facility-card__caption">
                        <h3 class="clinic-facility-card__title">Main Reception &amp; Patient Lounge</h3>
                        <p class="clinic-facility-card__desc">Spacious, HEPA-filtered reception lounge designed for patient comfort and minimal wait times.</p>
                    </div>
                </div>

                <div class="clinic-facility-card">
                    <div class="clinic-facility-card__media">
                        <img src="<?php echo esc_url($consult_img); ?>" alt="Private Doctor Consultation Room" width="1672" height="941" loading="lazy">
                    </div>
                    <div class="clinic-facility-card__caption">
                        <h3 class="clinic-facility-card__title">Private Clinical Consultation Suites</h3>
                        <p class="clinic-facility-card__desc">Acoustically insulated doctor consultation suites equipped with modern clinical diagnostic instruments.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 7: APPOINTMENT REQUEST CTA BANNER
         ======================================================== -->
    <section class="clinic-cta-banner">
        <div class="clinic-container clinic-cta-banner__inner">
            <div class="clinic-cta-banner__content">
                <span class="clinic-badge clinic-badge--white">Convenient Booking</span>
                <h2 class="clinic-cta-banner__title">Ready to Discuss Your Health With a Specialist?</h2>
                <p class="clinic-cta-banner__text">
                    Select your preferred date and time online. Our clinic coordinators will confirm your consultation request promptly via phone or WhatsApp.
                </p>
            </div>
            <div class="clinic-cta-banner__actions">
                <a href="<?php echo esc_url(home_url('/appointment/')); ?>" class="clinic-btn clinic-btn--white clinic-btn--lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span>Request Appointment Online</span>
                </a>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp_raw); ?>" target="_blank" rel="noopener noreferrer" class="clinic-btn clinic-btn--whatsapp-banner clinic-btn--lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                    <span>WhatsApp Inquiry Desk</span>
                </a>
            </div>
        </div>
    </section>


    <!-- ========================================================
         SECTION 8: PATIENT EXPERIENCES / REVIEWS
         ======================================================== -->
    <?php if (clinic_get_option('show_testimonials', true)) : ?>
    <section class="clinic-section clinic-section--alt">
        <div class="clinic-container">
            <div class="clinic-section-header clinic-text-center">
                <span class="clinic-section-kicker">Patient Experiences</span>
                <h2 class="clinic-section-title">What Our Patients Say</h2>
                <?php if ($is_demo) : ?>
                    <p class="clinic-demo-disclaimer-note">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        <span>Demo Mode: The following are illustrative sample feedback entries for website layout evaluation. Replace with genuine patient testimonials upon client launch.</span>
                    </p>
                <?php else : ?>
                    <p class="clinic-section-subtitle">Read feedback from patients who have visited our clinic.</p>
                <?php endif; ?>
            </div>

            <div class="clinic-reviews-grid">
                <article class="clinic-review-card">
                    <div class="clinic-review-card__stars" aria-label="5 stars rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <blockquote class="clinic-review-card__quote">
                        "The doctor was extremely thorough and patient. He explained every aspect of my treatment plan in simple terms without any pressure or rush. The clinic is spotless and calm."
                    </blockquote>
                    <div class="clinic-review-card__author">
                        <strong>Marcus T.</strong>
                        <span>Routine Consultation Patient</span>
                    </div>
                </article>

                <article class="clinic-review-card">
                    <div class="clinic-review-card__stars" aria-label="5 stars rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <blockquote class="clinic-review-card__quote">
                        "Booking an appointment was quick, and I was seen within ten minutes of arriving. Truly professional staff, modern consultation equipment, and clear post-visit guidance."
                    </blockquote>
                    <div class="clinic-review-card__author">
                        <strong>Sarah W.</strong>
                        <span>Preventive Health Assessment</span>
                    </div>
                </article>

                <article class="clinic-review-card">
                    <div class="clinic-review-card__stars" aria-label="5 stars rating">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                    </div>
                    <blockquote class="clinic-review-card__quote">
                        "I appreciated the transparent consultation fees and the practical medical advice. It is rare to find a clinic that balances medical precision with genuine human empathy."
                    </blockquote>
                    <div class="clinic-review-card__author">
                        <strong>Elena R.</strong>
                        <span>Chronic Care Follow-Up</span>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 9: FREQUENTLY ASKED QUESTIONS (ACCORDION)
         ======================================================== -->
    <?php if (clinic_get_option('show_faqs', true)) : ?>
    <section class="clinic-section" id="faqs">
        <div class="clinic-container clinic-container--narrow">
            <div class="clinic-section-header clinic-text-center">
                <span class="clinic-section-kicker">Patient Help Center</span>
                <h2 class="clinic-section-title">Frequently Asked Questions</h2>
                <p class="clinic-section-subtitle">
                    Find quick answers regarding our booking procedure, consultation standards, and clinic policies.
                </p>
            </div>

            <div class="clinic-accordion" id="clinic-faq-accordion">
                <!-- FAQ 1 -->
                <div class="clinic-accordion__item">
                    <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="faq-ans-1" id="faq-btn-1">
                        <span class="clinic-accordion__title">How does the online appointment request process work?</span>
                        <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </button>
                    <div class="clinic-accordion__content" id="faq-ans-1" role="region" aria-labelledby="faq-btn-1">
                        <p>
                            Submitting an appointment online constitutes a consultation request. Our clinic reception team reviews available slots, verifies doctor availability, and sends a formal confirmation via phone call or WhatsApp within clinic operating hours.
                        </p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="clinic-accordion__item">
                    <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="faq-ans-2" id="faq-btn-2">
                        <span class="clinic-accordion__title">What documents should I bring to my initial consultation?</span>
                        <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </button>
                    <div class="clinic-accordion__content" id="faq-ans-2" role="region" aria-labelledby="faq-btn-2">
                        <p>
                            Please bring any relevant prior medical records, recent diagnostic or blood test reports, your current list of prescribed medications, and a valid photo ID.
                        </p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="clinic-accordion__item">
                    <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="faq-ans-3" id="faq-btn-3">
                        <span class="clinic-accordion__title">Do you accept walk-in patients without a prior booking?</span>
                        <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </button>
                    <div class="clinic-accordion__content" id="faq-ans-3" role="region" aria-labelledby="faq-btn-3">
                        <p>
                            While scheduled appointments are given priority to ensure zero waiting, we accommodate walk-ins subject to doctor availability and clinical urgency.
                        </p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="clinic-accordion__item">
                    <button class="clinic-accordion__header" type="button" aria-expanded="false" aria-controls="faq-ans-4" id="faq-btn-4">
                        <span class="clinic-accordion__title">What safety and hygiene protocols are practiced?</span>
                        <span class="clinic-accordion__icon-wrap" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </button>
                    <div class="clinic-accordion__content" id="faq-ans-4" role="region" aria-labelledby="faq-btn-4">
                        <p>
                            We follow strict multi-stage autoclave sterilization for instruments, use single-use sterile examination supplies, maintain HEPA-filtered clean consultation rooms, and execute continuous disinfection cycles between patient visits.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <!-- ========================================================
         SECTION 10: CLINIC LOCATION & TIMINGS CARD
         ======================================================== -->
    <section class="clinic-section clinic-section--alt" id="location-timings">
        <div class="clinic-container">
            <div class="clinic-location-card">
                <div class="clinic-location-card__info">
                    <span class="clinic-section-kicker">Find Our Clinic</span>
                    <h2 class="clinic-section-title">Visit Our Clinic</h2>
                    
                    <div class="clinic-location-details">
                        <div class="clinic-detail-item">
                            <div class="clinic-detail-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div class="clinic-detail-content">
                                <strong>Clinic Address</strong>
                                <p><?php echo esc_html(clinic_get_option('address')); ?><br><?php echo esc_html(clinic_get_option('city_state_zip')); ?></p>
                            </div>
                        </div>

                        <div class="clinic-detail-item">
                            <div class="clinic-detail-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div class="clinic-detail-content">
                                <strong>Consultation Hours</strong>
                                <p><?php echo esc_html(clinic_get_option('opening_hours')); ?><?php if (clinic_get_option('sunday_hours')) : ?> | <?php echo esc_html(clinic_get_option('sunday_hours')); ?><?php endif; ?></p>
                            </div>
                        </div>

                        <div class="clinic-detail-item">
                            <div class="clinic-detail-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <div class="clinic-detail-content">
                                <strong>Phone Number</strong>
                                <p><a href="tel:<?php echo esc_attr($phone_raw); ?>"><?php echo esc_html($phone); ?></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="clinic-location-actions">
                        <a href="https://maps.google.com/?q=<?php echo urlencode(clinic_get_option('address') . ' ' . clinic_get_option('city_state_zip')); ?>" target="_blank" rel="noopener noreferrer" class="clinic-btn clinic-btn--primary">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
                            <span>Get Directions</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="clinic-btn clinic-btn--ghost">
                            <span>Contact Clinic</span>
                        </a>
                    </div>
                </div>

                <?php 
                $map_query = urlencode(clinic_get_option('address') . ' ' . clinic_get_option('city_state_zip'));
                $map_url = 'https://maps.google.com/?q=' . $map_query;
                ?>
                <a href="<?php echo esc_url($map_url); ?>" target="_blank" rel="noopener noreferrer" class="clinic-location-card__map-preview" title="Open Clinic Location in Google Maps">
                    <div class="clinic-map-vector-bg" aria-hidden="true"></div>
                    <div class="clinic-map-radar" aria-hidden="true"></div>
                    <div class="clinic-map-card-chip">
                        <div class="clinic-map-pin-icon" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <h3 class="clinic-map-card-chip__title"><?php echo esc_html($clinic_name); ?></h3>
                        <p class="clinic-map-card-chip__address">
                            <?php echo esc_html(clinic_get_option('address')); ?><br>
                            <?php echo esc_html(clinic_get_option('city_state_zip')); ?>
                        </p>
                        <span class="clinic-map-card-chip__badge">
                            <span>Open in Google Maps</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
