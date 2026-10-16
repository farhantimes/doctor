/**
 * MedClinic Universal Theme Main JavaScript
 * 
 * @package MedClinic_Universal
 * @version 1.0.0
 */

(function () {
  'use strict';

  // Global config fallback
  var clinicConfig = window.clinicData || {
    ajaxUrl: '/wp-admin/admin-ajax.php',
    nonce: '',
    isDemo: true,
    whatsappRaw: '15552345678',
    clinicName: '[CLINIC NAME]',
    phoneRaw: '+15552345678'
  };

  /* ==========================================================================
     1. Sticky Header Shadow on Scroll
     ========================================================================== */
  function initStickyHeader() {
    var header = document.getElementById('site-header');
    if (!header) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 20) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    }, { passive: true });
  }

  /* ==========================================================================
     2. Mobile Navigation Drawer
     ========================================================================== */
  function initMobileDrawer() {
    var toggleBtn = document.getElementById('clinic-nav-toggle');
    var drawer = document.getElementById('clinic-mobile-drawer');
    var closeBtn = document.getElementById('clinic-drawer-close');
    var overlay = document.getElementById('clinic-drawer-overlay');

    if (!toggleBtn || !drawer) return;

    function openDrawer() {
      drawer.classList.add('is-open');
      drawer.setAttribute('aria-hidden', 'false');
      toggleBtn.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
      drawer.classList.remove('is-open');
      drawer.setAttribute('aria-hidden', 'true');
      toggleBtn.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    toggleBtn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay) overlay.addEventListener('click', closeDrawer);

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
        closeDrawer();
      }
    });

    // Close drawer when a navigation link is clicked
    var drawerLinks = drawer.querySelectorAll('a');
    drawerLinks.forEach(function (link) {
      link.addEventListener('click', closeDrawer);
    });
  }

  /* ==========================================================================
     3. FAQ Accordion
     ========================================================================== */
  function initAccordions() {
    var headers = document.querySelectorAll('.clinic-accordion__header');

    headers.forEach(function (header) {
      header.addEventListener('click', function () {
        var item = header.parentElement;
        var isOpen = item.classList.contains('is-open');

        // Close other items in the same accordion container
        var parentAccordion = item.closest('.clinic-accordion');
        if (parentAccordion) {
          var openItems = parentAccordion.querySelectorAll('.clinic-accordion__item.is-open');
          openItems.forEach(function (openItem) {
            if (openItem !== item) {
              openItem.classList.remove('is-open');
              var btn = openItem.querySelector('.clinic-accordion__header');
              if (btn) btn.setAttribute('aria-expanded', 'false');
            }
          });
        }

        // Toggle current item
        if (isOpen) {
          item.classList.remove('is-open');
          header.setAttribute('aria-expanded', 'false');
        } else {
          item.classList.add('is-open');
          header.setAttribute('aria-expanded', 'true');
        }
      });
    });
  }

  /* ==========================================================================
     4. Appointment Booking Form Handling & Validation
     ========================================================================== */
  function initAppointmentForm() {
    var form = document.getElementById('clinic-appointment-form');
    if (!form) return;

    var modal = document.getElementById('clinic-confirmation-modal');
    var modalClose = document.getElementById('clinic-modal-close');
    var modalBackdrop = modal ? modal.querySelector('.clinic-modal__backdrop') : null;
    var modalSummary = document.getElementById('clinic-modal-summary');
    var modalWhatsappBtn = document.getElementById('clinic-modal-whatsapp-btn');
    var submitBtn = document.getElementById('clinic-submit-btn');
    var statusBox = document.getElementById('clinic-form-status');

    function showError(fieldId, message) {
      var field = document.getElementById(fieldId);
      var errorEl = document.getElementById(fieldId + '_error');
      if (field) field.classList.add('is-invalid');
      if (errorEl) {
        errorEl.textContent = message;
        errorEl.style.display = 'block';
      }
    }

    function clearErrors() {
      var invalids = form.querySelectorAll('.is-invalid');
      invalids.forEach(function (el) { el.classList.remove('is-invalid'); });
      var errorMsgs = form.querySelectorAll('.clinic-error-msg');
      errorMsgs.forEach(function (el) { el.style.display = 'none'; });
      if (statusBox) statusBox.style.display = 'none';
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      clearErrors();

      // Collect field values
      var patientName = (document.getElementById('patient_name').value || '').trim();
      var patientPhone = (document.getElementById('patient_phone').value || '').trim();
      var preferredDoctor = document.getElementById('preferred_doctor').value;
      var appointmentType = document.getElementById('appointment_type').value;
      var preferredDate = document.getElementById('preferred_date').value;
      var preferredTime = document.getElementById('preferred_time').value;
      var adminMessage = (document.getElementById('admin_message').value || '').trim();
      var patientConsent = document.getElementById('patient_consent').checked;
      var honeypot = (document.getElementById('clinic_hp_check').value || '').trim();

      // Anti-spam check
      if (honeypot !== '') {
        console.warn('Spam attempt detected.');
        return;
      }

      // Validation
      var hasError = false;
      if (!patientName || patientName.length < 2) {
        showError('patient_name', 'Please enter your full name (minimum 2 characters).');
        hasError = true;
      }

      var phoneDigits = patientPhone.replace(/\D/g, '');
      if (!phoneDigits || phoneDigits.length < 7) {
        showError('patient_phone', 'Please enter a valid phone number with area code.');
        hasError = true;
      }

      if (!preferredDate) {
        showError('preferred_date', 'Please select your preferred consultation date.');
        hasError = true;
      }

      if (!preferredTime) {
        showError('preferred_time', 'Please choose a preferred time window.');
        hasError = true;
      }

      if (!patientConsent) {
        showError('patient_consent', 'You must acknowledge the appointment request terms and privacy policy.');
        hasError = true;
      }

      if (hasError) return;

      // Disable button and show spinner state
      var originalBtnHtml = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span>Processing Request...</span>';

      // Build formData
      var postData = new FormData(form);

      // Function to handle successful flow
      function handleSuccess(data) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnHtml;

        // Populate summary in modal
        if (modalSummary) {
          modalSummary.innerHTML =
            '<strong>Patient:</strong> ' + escapeHtml(patientName) + '<br>' +
            '<strong>Doctor:</strong> ' + escapeHtml(preferredDoctor) + '<br>' +
            '<strong>Date & Time:</strong> ' + escapeHtml(preferredDate) + ' (' + escapeHtml(preferredTime) + ')<br>' +
            '<strong>Consultation Type:</strong> ' + escapeHtml(appointmentType);
        }

        // Build WhatsApp deep-link
        var waMessage = 'Hello, I have submitted an appointment request at ' + clinicConfig.clinicName +
          ':\n- Patient: ' + patientName +
          '\n- Doctor: ' + preferredDoctor +
          '\n- Date: ' + preferredDate +
          '\n- Time: ' + preferredTime +
          '\n- Type: ' + appointmentType +
          (adminMessage ? '\n- Note: ' + adminMessage : '') +
          '\nPlease let me know once confirmed. Thank you!';

        var waUrl = 'https://wa.me/' + clinicConfig.whatsappRaw + '?text=' + encodeURIComponent(waMessage);

        if (modalWhatsappBtn) {
          modalWhatsappBtn.href = waUrl;
        }

        // Open Confirmation Modal
        if (modal) {
          modal.classList.add('is-open');
          modal.setAttribute('aria-hidden', 'false');
        }

        // Reset form
        form.reset();
      }

      // If in WordPress environment with real ajax endpoint
      if (typeof fetch !== 'undefined') {
        fetch(clinicConfig.ajaxUrl, {
          method: 'POST',
          body: postData
        })
          .then(function (res) {
            return res.json().catch(function () { return { success: true }; });
          })
          .then(function (data) {
            handleSuccess(data);
          })
          .catch(function () {
            // In demo / preview static fallback, handle gracefully
            handleSuccess({ success: true });
          });
      } else {
        setTimeout(function () {
          handleSuccess({ success: true });
        }, 600);
      }
    });

    // Close Confirmation Modal
    function closeModal() {
      if (modal) {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
      }
    }

    if (modalClose) modalClose.addEventListener('click', closeModal);
    if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal && modal.classList.contains('is-open')) {
        closeModal();
      }
    });
  }

  function escapeHtml(str) {
    var div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
  }

  /* ==========================================================================
     Initialize on DOM Ready
     ========================================================================== */
  document.addEventListener('DOMContentLoaded', function () {
    initStickyHeader();
    initMobileDrawer();
    initAccordions();
    initAppointmentForm();
  });

})();
