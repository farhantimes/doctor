<?php
/**
 * Template Name: Privacy Policy & Patient Rights
 *
 * @package MedClinic_Universal
 */

get_header();

$clinic_name = clinic_get_option('clinic_name', '[CLINIC NAME]');
$email       = clinic_get_option('email', 'care@clinicdemocare.org');
$phone       = clinic_get_option('phone', '+1 (555) 234-5678');
?>

<main id="main-content" class="clinic-page" role="main">
    <div class="clinic-page-header">
        <div class="clinic-container clinic-text-center">
            <span class="clinic-section-kicker">Patient Rights &amp; Legal Standards</span>
            <h1 class="clinic-page-title">Privacy Policy &amp; Confidentiality</h1>
            <p class="clinic-page-subtitle">
                How we protect your personal information, consultation records, and digital communications.
            </p>
        </div>
    </div>

    <div class="clinic-container clinic-container--narrow clinic-section">
        <article class="clinic-card clinic-p-6">
            <h3>1. Commitment to Patient Confidentiality</h3>
            <p>
                At <strong><?php echo esc_html($clinic_name); ?></strong>, safeguarding your health information and personal identity is central to our clinical ethics. This policy explains how we collect, store, and process patient contact data and appointment requests through this website.
            </p>

            <h3 class="clinic-mt-4">2. Information Collected via Website Forms</h3>
            <p>When you submit an appointment request on our website, we only collect the minimum information necessary to coordinate your booking:</p>
            <ul class="clinic-feature-checklist">
                <li><span>Full Name</span></li>
                <li><span>Contact Phone Number</span></li>
                <li><span>Preferred Consulting Doctor or Department</span></li>
                <li><span>Preferred Date and Time Window</span></li>
                <li><span>Non-confidential administrative note</span></li>
            </ul>
            <p class="clinic-mt-2">
                <strong>We do not collect sensitive clinical health histories, detailed diagnoses, or financial account credentials through basic public website forms.</strong> Comprehensive clinical records are gathered in-person during formal clinical consultations.
            </p>

            <h3 class="clinic-mt-4">3. Use of Information</h3>
            <p>Your submitted contact information is used exclusively to:</p>
            <ul class="clinic-feature-checklist">
                <li><span>Confirm, reschedule, or communicate regarding your requested consultation</span></li>
                <li><span>Provide visit instructions and directions to our medical center</span></li>
                <li><span>Comply with statutory clinical record-keeping obligations</span></li>
            </ul>
            <p class="clinic-mt-2">
                We never sell, rent, or lease patient contact details to commercial third parties or advertisers.
            </p>

            <h3 class="clinic-mt-4">4. WhatsApp and Electronic Communications</h3>
            <p>
                If you elect to interact with our reception via WhatsApp or email, communications are conducted solely for administrative appointment scheduling and service guidance. Urgent medical advice or emergency triage cannot be guaranteed over instant messaging.
            </p>

            <h3 class="clinic-mt-4">5. Contacting the Privacy Officer</h3>
            <p>
                If you have questions regarding this privacy notice or wish to update your recorded contact details, please reach out directly:
            </p>
            <p class="clinic-mt-2">
                <strong>Privacy Officer:</strong> <?php echo esc_html($clinic_name); ?><br>
                Email: <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a><br>
                Phone: <?php echo esc_html($phone); ?>
            </p>
        </article>
    </div>
</main>

<?php
get_footer();
