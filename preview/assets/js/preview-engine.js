/**
 * Interactive Preview & Specialty Presets Engine
 * Powers the standalone live demonstration portal
 */

(function () {
  'use strict';

  var PRESETS = {
    physician: {
      key: 'physician',
      name: 'General Physician / MBBS',
      clinic_name: 'CareWell Family & Medical Clinic',
      specialty: 'General Medicine & Family Health Care',
      primary_color: '#0d9488',
      primary_dark: '#0f766e',
      secondary_color: '#0f172a',
      accent_color: '#0284c7',
      doctor_name: 'Dr. Jonathan Miller, MD',
      doctor_spec: 'Senior Consultant Physician',
      doctor_qual: 'MBBS, MD (Internal Medicine), FACP',
      doctor_reg: 'State Medical Council Reg. No. MC-849204',
      doctor_exp: '16+ Years Clinical Practice',
      doctor_lang: 'English, Spanish',
      doctor_bio: 'Dedicated to holistic, evidence-based patient healthcare with a focus on comprehensive preventive medicine, chronic illness management, and patient-centered diagnostic consultations.',
      hero_heading: 'Advanced, Compassionate Healthcare for You & Your Family',
      hero_subheading: 'Experience personalized medical consultations, minimal wait times, state-of-the-art diagnostic facilities, and dedicated physician care designed around your comfort.',
      phone: '+1 (555) 234-5678',
      phone_raw: '+15552345678',
      whatsapp: '+1 (555) 234-5678',
      whatsapp_raw: '15552345678',
      email: 'care@carewellclinic.org',
      address: 'Suite 400, Medical Arts Pavilion, Healthcare Blvd',
      city_state_zip: 'Medical City, MC 90210',
      opening_hours: 'Mon - Fri: 8:00 AM - 6:30 PM | Sat: 9:00 AM - 2:00 PM',
      services: [
        { title: 'Comprehensive Medical Consultation', time: '25 - 40 Mins', icon: 'physician-icon.svg', desc: 'In-depth diagnostic review, medical history assessment, physical check, and tailored treatment plans.' },
        { title: 'Preventive Annual Health Screenings', time: '30 - 60 Mins', icon: 'dental-icon.svg', desc: 'Targeted wellness reviews, routine lab evaluations, and preventive risk profiling.' },
        { title: 'Targeted Specialist Assessment & Therapy', time: '30 - 45 Mins', icon: 'derma-icon.svg', desc: 'Advanced clinical care tailored to your specific condition and systemic symptoms.' },
        { title: 'Chronic Condition Care (Hypertension, Diabetes)', time: '20 - 30 Mins', icon: 'physio-icon.svg', desc: 'Long-term management plans, medication reviews, and periodic health metric tracking.' },
        { title: 'Family Wellness & Lifestyle Guidance', time: '30 Mins', icon: 'gynae-icon.svg', desc: 'Nutritional advice, cardiovascular wellness checks, and preventative lifestyle coaching.' },
        { title: 'Diagnostic Pathology & In-Clinic Testing', time: '15 - 20 Mins', icon: 'multispec-icon.svg', desc: 'Fast-turnaround point-of-care laboratory tests, vital telemetry, and partner imaging reviews.' }
      ]
    },

    dental: {
      key: 'dental',
      name: 'Dental Clinic / Studio',
      clinic_name: 'Apex Dental Studio & Implant Centre',
      specialty: 'Comprehensive Dentistry & Orthodontics',
      primary_color: '#0284c7',
      primary_dark: '#0369a1',
      secondary_color: '#0f172a',
      accent_color: '#0d9488',
      doctor_name: 'Dr. Sarah Lin, DDS',
      doctor_spec: 'Lead Dental Surgeon & Orthodontist',
      doctor_qual: 'BDS, MDS (Orthodontics & Dentofacial Orthopaedics)',
      doctor_reg: 'Dental Council Reg. No. DC-58291',
      doctor_exp: '14+ Years Clinical Practice',
      doctor_lang: 'English, Mandarin',
      doctor_bio: 'Specializing in painless restorative dentistry, precision digital smile design, corrective orthodontics, and preventative oral health care for adult and pediatric patients.',
      hero_heading: 'Gentle, Advanced Dental Care for Confident, Healthy Smiles',
      hero_subheading: 'Experience anxiety-free dental consultations, precision digital imaging, painless preventative care, and modern restorative dentistry in a welcoming clinic.',
      phone: '+1 (555) 345-6789',
      phone_raw: '+15553456789',
      whatsapp: '+1 (555) 345-6789',
      whatsapp_raw: '15553456789',
      email: 'smile@apexdentalstudio.com',
      address: 'Suite 210, Dental Arts Plaza, Smiles Blvd',
      city_state_zip: 'Metro City, MC 90212',
      opening_hours: 'Mon - Sat: 8:30 AM - 6:00 PM',
      services: [
        { title: 'General Dental Consultation & Digital X-Ray', time: '30 Mins', icon: 'dental-icon.svg', desc: 'Detailed intraoral examination, low-radiation digital radiography, and personalized oral health plans.' },
        { title: 'Ultrasonic Oral Hygiene & Deep Cleaning', time: '40 Mins', icon: 'dental-icon.svg', desc: 'Gentle plaque and calculus removal, stain polishing, and preventative gum inflammation therapies.' },
        { title: 'Biocompatible Composite Dental Fillings', time: '30 - 45 Mins', icon: 'dental-icon.svg', desc: 'Tooth-colored aesthetic restorative resins seamlessly matched to your natural dental enamel.' },
        { title: 'Precision Rotary Root Canal Therapy', time: '45 - 60 Mins', icon: 'dental-icon.svg', desc: 'Painless, motorized endodontic treatment designed to save infected or structurally compromised teeth.' },
        { title: 'Zirconia Crowns, Bridges & Veneers', time: '40 Mins', icon: 'dental-icon.svg', desc: 'Custom CAD/CAM fabricated ceramic prosthetics restoring optimal bite strength and smile aesthetics.' },
        { title: 'Clear Aligners & Orthodontic Assessments', time: '30 Mins', icon: 'dental-icon.svg', desc: 'Discreet malocclusion correction and custom clear aligner planning for adults and teens.' }
      ]
    },

    dermatology: {
      key: 'dermatology',
      name: 'Dermatology & Skin Clinic',
      clinic_name: 'DermaCare Skin & Aesthetic Clinic',
      specialty: 'Clinical Dermatology & Laser Therapy',
      primary_color: '#881337',
      primary_dark: '#4c0519',
      secondary_color: '#18181b',
      accent_color: '#0d9488',
      doctor_name: 'Dr. Alisha Patel, MD',
      doctor_spec: 'Consultant Dermatologist & Venereologist',
      doctor_qual: 'MBBS, MD (Dermatology, Venereology & Leprosy), FAAD',
      doctor_reg: 'Medical Council Reg. No. DERM-74829',
      doctor_exp: '15+ Years Clinical Practice',
      doctor_lang: 'English, Hindi, Gujarati',
      doctor_bio: 'Dedicated to clinical dermatology, chronic inflammatory skin conditions, scientific acne therapies, scalp assessment, and evidence-grounded non-surgical skin wellness.',
      hero_heading: 'Science-Led Clinical Dermatology & Skin Wellness',
      hero_subheading: 'Expert physician care for acne, eczema, psoriasis, hair loss, and specialized skin condition assessments using proven clinical protocols.',
      phone: '+1 (555) 456-7890',
      phone_raw: '+15554567890',
      whatsapp: '+1 (555) 456-7890',
      whatsapp_raw: '15554567890',
      email: 'care@dermacareclinic.org',
      address: 'Level 3, Derma Tower, Wellness Avenue',
      city_state_zip: 'Medical City, MC 90214',
      opening_hours: 'Mon - Fri: 9:00 AM - 6:30 PM | Sat: 9:00 AM - 3:00 PM',
      services: [
        { title: 'Comprehensive Clinical Skin Consultation', time: '30 Mins', icon: 'derma-icon.svg', desc: 'Full-body dermoscopy, skin barrier assessment, and diagnostic evaluation of rashes or lesions.' },
        { title: 'Medical Acne Assessment & Protocols', time: '30 - 45 Mins', icon: 'derma-icon.svg', desc: 'Targeted hormonal, topical, and oral medication regimens combined with comedone extraction.' },
        { title: 'Eczema, Psoriasis & Dermatitis Management', time: '30 Mins', icon: 'derma-icon.svg', desc: 'Non-steroidal skin barrier repair therapies and systemic immunomodulatory treatment pathways.' },
        { title: 'Trichoscopy & Hair Loss Evaluation', time: '35 Mins', icon: 'derma-icon.svg', desc: 'High-magnification scalp imaging to differentiate alopecia subtypes and prescribe targeted regrowth plans.' },
        { title: 'Cryotherapy & Diagnostic Skin Biopsies', time: '20 - 30 Mins', icon: 'derma-icon.svg', desc: 'Safe in-office removal of benign lesions and histopathological examination of suspicious marks.' },
        { title: 'Laser Skin Resurfacing & Pigment Review', time: '40 Mins', icon: 'derma-icon.svg', desc: 'Targeted wavelength treatments for post-acne pigmentation, melasma, and skin rejuvenation.' }
      ]
    },

    physiotherapy: {
      key: 'physiotherapy',
      name: 'Physiotherapy & Rehab Clinic',
      clinic_name: 'ActiveLife Physiotherapy & Rehab Centre',
      specialty: 'Musculoskeletal Physiotherapy & Sports Rehab',
      primary_color: '#047857',
      primary_dark: '#065f46',
      secondary_color: '#111827',
      accent_color: '#0d9488',
      doctor_name: 'Dr. David Evans, DPT',
      doctor_spec: 'Chief Physical Therapist & Sports Rehab Specialist',
      doctor_qual: 'BPT, MPT (Musculoskeletal & Sports), Cert. MDT',
      doctor_reg: 'Physiotherapy Council Reg. No. PT-39201',
      doctor_exp: '13+ Years Clinical Practice',
      doctor_lang: 'English',
      doctor_bio: 'Expertise in post-operative orthopedic recovery, spinal rehabilitation, sports injury biomechanics, ergonomic assessments, and active kinetic restoration.',
      hero_heading: 'Restore Movement, Relieve Pain & Reclaim Active Living',
      hero_subheading: 'Targeted physical therapy, individualized kinetic rehabilitation, and evidence-grounded treatment plans for pain-free mobility.',
      phone: '+1 (555) 567-8901',
      phone_raw: '+15555678901',
      whatsapp: '+1 (555) 567-8901',
      whatsapp_raw: '15555678901',
      email: 'rehab@activelifephysio.org',
      address: 'Building 4, Kinetic Sports Park, Mobility Road',
      city_state_zip: 'Healthfield, HF 90216',
      opening_hours: 'Mon - Fri: 7:30 AM - 7:00 PM | Sat: 8:00 AM - 2:00 PM',
      services: [
        { title: 'Musculoskeletal & Biomechanical Assessment', time: '45 Mins', icon: 'physio-icon.svg', desc: 'Comprehensive kinetic chain examination, joint range measurement, and strength profiling.' },
        { title: 'Spine, Neck & Lumbar Core Rehabilitation', time: '40 Mins', icon: 'physio-icon.svg', desc: 'MDT-certified mechanical diagnosis and progressive decompression exercise protocols.' },
        { title: 'Post-Surgical Joint Replacement Recovery', time: '45 Mins', icon: 'physio-icon.svg', desc: 'Staged mobility restoration and gait training following hip, knee, or shoulder procedures.' },
        { title: 'Sports Injury Rehab & Return-to-Play Triage', time: '40 Mins', icon: 'physio-icon.svg', desc: 'Ligamentous rehab (ACL, meniscus), eccentric tendon loading, and functional agility drills.' },
        { title: 'Therapeutic Dry Needling & Manual Therapy', time: '30 Mins', icon: 'physio-icon.svg', desc: 'Myofascial trigger point deactivation, joint mobilization, and soft-tissue release.' },
        { title: 'Ergonomic & Postural Workstation Coaching', time: '30 Mins', icon: 'physio-icon.svg', desc: 'Custom workstation adjustments and corrective kinetic routines preventing repetitive strain.' }
      ]
    },

    gynaecology: {
      key: 'gynaecology',
      name: "Gynaecology & Women's Health Clinic",
      clinic_name: "Blossom Women's Health & Gynaecology Clinic",
      specialty: "Obstetrics, Gynaecology & Women's Wellness",
      primary_color: '#be123c',
      primary_dark: '#881337',
      secondary_color: '#1e1b4b',
      accent_color: '#0d9488',
      doctor_name: 'Dr. Maya Sengupta, MD',
      doctor_spec: "Senior Consultant Gynaecologist & Obstetrician",
      doctor_qual: 'MBBS, MD (Obs & Gynae), DNB, MRCOG (UK)',
      doctor_reg: 'Medical Council Reg. No. GYN-99214',
      doctor_exp: '18+ Years Clinical Practice',
      doctor_lang: 'English, Bengali, Hindi',
      doctor_bio: 'Providing empathetic, comprehensive clinical care across all stages of women’s health: preventive well-woman screenings, prenatal guidance, menstrual disorders, and menopausal health.',
      hero_heading: "Empathetic, Expert Healthcare for Every Stage of Womanhood",
      hero_subheading: "Safe, confidential consultations in a comfortable clinical sanctuary tailored to your individual health and wellness priorities.",
      phone: '+1 (555) 678-9012',
      phone_raw: '+15556789012',
      whatsapp: '+1 (555) 678-9012',
      whatsapp_raw: '15556789012',
      email: 'care@blossomwomenshealth.org',
      address: 'Suite 500, Blossom Medical Pavilion, Maternal Way',
      city_state_zip: 'Harmony City, HC 90218',
      opening_hours: 'Mon - Fri: 8:30 AM - 5:30 PM | Sat: 9:00 AM - 1:00 PM',
      services: [
        { title: 'Annual Well-Woman Preventive Health Check', time: '40 Mins', icon: 'gynae-icon.svg', desc: 'Cervical Pap smear screenings, clinical breast examination, and hormonal wellness reviews.' },
        { title: 'Pre-Conception & Prenatal Clinical Guidance', time: '35 Mins', icon: 'gynae-icon.svg', desc: 'Nutritional optimization, early fetal wellness tracking, and trimester milestone consultations.' },
        { title: 'Menstrual Health & Polycystic Ovary (PCOS) Care', time: '30 Mins', icon: 'gynae-icon.svg', desc: 'Holistic hormonal assessments, cycle regulation, and metabolic lifestyle strategies.' },
        { title: 'Pelvic Diagnostic Ultrasound & Screenings', time: '30 Mins', icon: 'gynae-icon.svg', desc: 'High-resolution transabdominal and transvaginal sonography for uterine and ovarian evaluation.' },
        { title: 'Perimenopause & Menopausal Wellness Plans', time: '35 Mins', icon: 'gynae-icon.svg', desc: 'Evidence-based symptom relief, bone density risk guidance, and individualized HRT reviews.' },
        { title: 'Minimally Invasive Gynaecological Assessment', time: '30 Mins', icon: 'gynae-icon.svg', desc: 'Clinical evaluation of fibroids, endometriosis, and benign pelvic symptoms.' }
      ]
    },

    multispeciality: {
      key: 'multispeciality',
      name: 'Multi-Speciality Health Centre',
      clinic_name: 'MetroCare Multi-Speciality Health Centre',
      specialty: 'Integrated Multispeciality Polyclinic & Diagnostics',
      primary_color: '#1e40af',
      primary_dark: '#1e3a8a',
      secondary_color: '#0f172a',
      accent_color: '#0d9488',
      doctor_name: 'Dr. Jonathan Miller & Specialist Board',
      doctor_spec: 'Multidisciplinary Clinical Director',
      doctor_qual: 'MBBS, MD (Medicine), FACP, Board of Specialists',
      doctor_reg: 'Hospital Accreditation Reg. No. HOSP-40192',
      doctor_exp: '25+ Years Combined Clinical Leadership',
      doctor_lang: 'English, Spanish, Multiple Languages',
      doctor_bio: 'A cohesive multi-department medical center bringing together internal medicine, cardiology, dermatology, dental surgery, orthopedics, and digital diagnostics under one roof.',
      hero_heading: 'Comprehensive Multi-Speciality Medicine Under One Roof',
      hero_subheading: 'From primary physician consultations to dedicated specialist departments and in-house laboratory diagnostics, experience seamless clinical coordination.',
      phone: '+1 (555) 789-0123',
      phone_raw: '+15557890123',
      whatsapp: '+1 (555) 789-0123',
      whatsapp_raw: '15557890123',
      email: 'info@metrocarehealth.org',
      address: 'MetroCare Medical Campus, 100 Health Sciences Way',
      city_state_zip: 'Central Metro, CM 90220',
      opening_hours: 'Mon - Sat: 8:00 AM - 8:00 PM | Sun: 9:00 AM - 1:00 PM',
      services: [
        { title: 'General Medicine & Family Health Department', time: '30 Mins', icon: 'physician-icon.svg', desc: 'Primary physician consultations and triage for acute and systemic illnesses.' },
        { title: 'Dental Sciences & Smile Rehabilitation', time: '40 Mins', icon: 'dental-icon.svg', desc: 'General oral health checks, restorations, and digital orthodontics.' },
        { title: 'Clinical Dermatology & Skin Diagnostics', time: '30 Mins', icon: 'derma-icon.svg', desc: 'Acne management, eczema care, and dermatoscopic skin lesion examinations.' },
        { title: 'Orthopedics, Physical Rehab & Joint Care', time: '45 Mins', icon: 'physio-icon.svg', desc: 'Joint mobility reviews, sports rehabilitation, and physical therapy suites.' },
        { title: 'Cardiology Wellness & Telemetric ECG', time: '30 Mins', icon: 'physician-icon.svg', desc: 'Resting ECG telemetry, lipid risk analysis, and blood pressure monitoring.' },
        { title: 'On-Site Clinical Laboratory & Imaging', time: '20 Mins', icon: 'multispec-icon.svg', desc: 'Complete blood counts, metabolic panels, and rapid diagnostic reporting.' }
      ]
    }
  };

  // Get current active config from localStorage or default
  function getCurrentConfig() {
    var stored = localStorage.getItem('medclinic_config');
    if (stored) {
      try {
        return JSON.parse(stored);
      } catch (e) {
        // Fallback
      }
    }
    return PRESETS.physician;
  }

  // Save config
  function saveConfig(cfg) {
    localStorage.setItem('medclinic_config', JSON.stringify(cfg));
  }

  // Apply colors and variables to document
  function applyToDOM(cfg) {
    // 1. Color Tokens
    var root = document.documentElement;
    root.style.setProperty('--clinic-primary', cfg.primary_color);
    root.style.setProperty('--clinic-primary-dark', cfg.primary_dark || cfg.primary_color);
    root.style.setProperty('--clinic-secondary', cfg.secondary_color);
    root.style.setProperty('--clinic-accent', cfg.accent_color);

    // 2. Text Replacements on elements with [data-clinic-var]
    var elements = document.querySelectorAll('[data-clinic-var]');
    elements.forEach(function (el) {
      var key = el.getAttribute('data-clinic-var');
      if (cfg[key] !== undefined) {
        el.textContent = cfg[key];
      }
    });

    // 3. Links Replacements (tel & whatsapp)
    var phoneLinks = document.querySelectorAll('a[href^="tel:"]');
    phoneLinks.forEach(function (a) {
      a.href = 'tel:' + (cfg.phone_raw || '+15552345678');
    });

    var waLinks = document.querySelectorAll('a[href*="wa.me"]');
    waLinks.forEach(function (a) {
      var currentUrl = new URL(a.href);
      var text = currentUrl.searchParams.get('text') || '';
      a.href = 'https://wa.me/' + (cfg.whatsapp_raw || '15552345678') + (text ? '?text=' + encodeURIComponent(text) : '');
    });

    // Update window.clinicData
    if (window.clinicData) {
      window.clinicData.clinicName = cfg.clinic_name;
      window.clinicData.whatsappRaw = cfg.whatsapp_raw;
      window.clinicData.phoneRaw = cfg.phone_raw;
    }
  }

  // Render the Floating Demo Control Bar
  function renderDemoControls() {
    var bar = document.createElement('div');
    bar.id = 'clinic-demo-controls-bar';
    bar.className = 'clinic-demo-controls-bar';

    var cfg = getCurrentConfig();

    bar.innerHTML =
      '<div class="cbar-inner">' +
        '<div class="cbar-left">' +
          '<label for="cbar-preset-select" class="cbar-tag"><span class="cbar-tag-full">Demo Preset:</span><span class="cbar-tag-short">Preset:</span></label>' +
          '<select id="cbar-preset-select" class="cbar-select" aria-label="Select Medical Specialty Preset">' +
            '<option value="physician"' + (cfg.key === 'physician' ? ' selected' : '') + '>🩺 Physician / MBBS</option>' +
            '<option value="dental"' + (cfg.key === 'dental' ? ' selected' : '') + '>🦷 Dental Clinic</option>' +
            '<option value="dermatology"' + (cfg.key === 'dermatology' ? ' selected' : '') + '>✨ Dermatology</option>' +
            '<option value="physiotherapy"' + (cfg.key === 'physiotherapy' ? ' selected' : '') + '>🏃 Physiotherapy</option>' +
            '<option value="gynaecology"' + (cfg.key === 'gynaecology' ? ' selected' : '') + '>🌸 Women\'s Health</option>' +
            '<option value="multispeciality"' + (cfg.key === 'multispeciality' ? ' selected' : '') + '>🏥 Multi-Speciality</option>' +
          '</select>' +
        '</div>' +

        '<div class="cbar-center">' +
          '<span class="cbar-viewports-label">Test Viewport:</span>' +
          '<button type="button" class="cbar-vbtn" data-width="1920" title="1920px Desktop">1920</button>' +
          '<button type="button" class="cbar-vbtn" data-width="1440" title="1440px Desktop">1440</button>' +
          '<button type="button" class="cbar-vbtn" data-width="1024" title="1024px Tablet">1024</button>' +
          '<button type="button" class="cbar-vbtn" data-width="768" title="768px Tablet Portrait">768</button>' +
          '<button type="button" class="cbar-vbtn" data-width="430" title="430px iPhone 16 Pro Max">430</button>' +
          '<button type="button" class="cbar-vbtn" data-width="390" title="390px iPhone 14/15">390</button>' +
          '<button type="button" class="cbar-vbtn" data-width="360" title="360px Compact Android">360</button>' +
          '<button type="button" class="cbar-vbtn cbar-vbtn--reset is-active" data-width="100%" title="Reset to 100% Full Width">Full</button>' +
        '</div>' +

        '<div class="cbar-right">' +
          '<a href="admin.html" class="cbar-admin-link" title="Open Clinic Control Panel">' +
            '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>' +
            '<span class="cbar-admin-text-full">Clinic Website Control</span>' +
            '<span class="cbar-admin-text-short">Admin</span>' +
          '</a>' +
        '</div>' +
      '</div>';

    document.body.insertBefore(bar, document.body.firstChild);

    // Preset Select Event
    var select = document.getElementById('cbar-preset-select');
    if (select) {
      select.addEventListener('change', function () {
        var key = select.value;
        if (PRESETS[key]) {
          saveConfig(PRESETS[key]);
          applyToDOM(PRESETS[key]);
          location.reload();
        }
      });
    }

    // Viewport Resizing Event
    var vbtns = bar.querySelectorAll('.cbar-vbtn');
    vbtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        vbtns.forEach(function (b) { b.classList.remove('is-active'); });
        btn.classList.add('is-active');
        var width = btn.getAttribute('data-width');
        var rootWrapper = document.getElementById('clinic-preview-wrapper') || document.body;
        if (width === '100%') {
          rootWrapper.style.maxWidth = '';
          rootWrapper.style.margin = '';
          rootWrapper.style.boxShadow = '';
          rootWrapper.style.border = '';
        } else {
          rootWrapper.style.maxWidth = width + 'px';
          rootWrapper.style.margin = '0 auto';
          rootWrapper.style.boxShadow = '0 0 40px rgba(0, 0, 0, 0.25)';
          rootWrapper.style.border = '1px solid #cbd5e1';
        }
      });
    });
  }

  // Inject styles for the demo control bar
  function injectDemoStyles() {
    var style = document.createElement('style');
    style.textContent =
      '.clinic-demo-controls-bar { position: relative; z-index: 99999; background: #0f172a; color: #ffffff; border-bottom: 2px solid #0d9488; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 11px; line-height: 1.2; padding: 4px 12px; width: 100%; box-sizing: border-box; }' +
      '.cbar-inner { display: flex; align-items: center; justify-content: space-between; gap: 8px; max-width: 1360px; margin: 0 auto; width: 100%; box-sizing: border-box; }' +
      '.cbar-left { display: flex; align-items: center; gap: 6px; flex: 1; min-width: 0; }' +
      '.cbar-center { display: flex; align-items: center; gap: 4px; flex-shrink: 0; }' +
      '.cbar-right { display: flex; align-items: center; gap: 6px; flex-shrink: 0; }' +
      '.cbar-tag { font-weight: 700; color: #5eead4; text-transform: uppercase; font-size: 10px; letter-spacing: 0.04em; white-space: nowrap; flex-shrink: 0; }' +
      '.cbar-tag-short { display: none; }' +
      '.cbar-select { background: #1e293b; color: #ffffff; border: 1px solid #334155; border-radius: 4px; padding: 3px 6px; font-size: 11px; cursor: pointer; outline: none; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: nowrap; flex-shrink: 1; }' +
      '.cbar-select:focus { border-color: #0d9488; }' +
      '.cbar-viewports-label { font-size: 10px; color: #94a3b8; font-weight: 600; text-transform: uppercase; margin-right: 2px; }' +
      '.cbar-vbtn { background: #1e293b; color: #cbd5e1; border: 1px solid #334155; border-radius: 4px; padding: 2px 5px; font-size: 10px; font-weight: 600; cursor: pointer; transition: all 0.2s; }' +
      '.cbar-vbtn:hover, .cbar-vbtn.is-active { background: #0d9488; color: #ffffff; border-color: #0d9488; }' +
      '.cbar-vbtn--reset { background: #334155; color: #f8fafc; }' +
      '.cbar-admin-link { display: inline-flex; align-items: center; gap: 4px; background: #0d9488; color: #ffffff; text-decoration: none; font-weight: 700; padding: 3px 8px; border-radius: 4px; font-size: 11px; transition: background 0.2s; white-space: nowrap; }' +
      '.cbar-admin-link:hover { background: #0f766e; color: #ffffff; }' +
      '.cbar-admin-text-short { display: none; }' +
      '@media (min-width: 901px) { .clinic-demo-controls-bar { position: sticky; top: 0; } }' +
      '@media (max-width: 900px) { .cbar-center { display: none; } }' +
      '@media (max-width: 600px) { .clinic-demo-controls-bar { padding: 3px 8px; } .cbar-tag-full { display: none; } .cbar-tag-short { display: inline; } .cbar-admin-text-full { display: none; } .cbar-admin-text-short { display: inline; } .cbar-select { max-width: 150px; font-size: 11px; padding: 2px 4px; } .cbar-admin-link { padding: 2px 6px; font-size: 10px; } }' +
      '@media (max-width: 360px) { .cbar-select { max-width: 130px; font-size: 10px; } }';
    document.head.appendChild(style);
  }

  // Init
  document.addEventListener('DOMContentLoaded', function () {
    injectDemoStyles();
    var cfg = getCurrentConfig();
    applyToDOM(cfg);
    renderDemoControls();
  });

  // Export to window for admin page use
  window.ClinicPreviewEngine = {
    presets: PRESETS,
    get: getCurrentConfig,
    save: function (cfg) {
      saveConfig(cfg);
      applyToDOM(cfg);
    },
    reset: function () {
      saveConfig(PRESETS.physician);
      applyToDOM(PRESETS.physician);
    }
  };

})();
