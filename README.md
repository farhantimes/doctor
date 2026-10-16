# Universal Doctor & Clinic Website Demo System

> 🌐 **Live Interactive Demo:** [https://farhantimes.github.io/doctor/](https://farhantimes.github.io/doctor/)

A premium, fully responsive, reusable WordPress website system built for medical doctors, dental surgeons, dermatologists, physiotherapists, gynaecologists, and multi-speciality healthcare clinics.

Built with **WordPress, PHP, Gutenberg block patterns, `theme.json`, and centralized branding controls**, this system allows presenting tailored, high-converting digital experiences to prospective healthcare clients without rebuilding the website from scratch for every specialty.

---

## Deliverables & Package Structure

```
├── medclinic-universal/             # Core Block-Ready WordPress Theme
├── clinic-website-control/          # Companion Administration & Rebranding Plugin
├── preview/                         # Zero-Dependency Standalone Interactive Preview Portal
│   ├── index.html                   # Interactive Demo Homepage (All 14 Sections)
│   ├── admin.html                   # WordPress Admin Simulator & Rebrand Engine
│   ├── doctor.html                  # Lead Doctor Profile Template
│   ├── service.html                 # Treatment & Service Procedure Template
│   ├── appointment.html             # Patient Scheduling & Appointment Request Flow
│   ├── contact.html                 # Contact, Location, Timings & Emergency Guidance
│   ├── about.html                   # Clinical Mission & Hygiene Standards
│   ├── faq.html                     # Categorized Patient FAQs Accordion
│   ├── privacy-policy.html          # Medical Privacy & Patient Confidentiality
│   ├── server.js                    # Node.js Static Server & Simulated AJAX Endpoint
│   └── assets/                      # CSS, JS, SVG Icons & Medical Photography
├── medclinic-universal.zip          # Installable Theme ZIP (WP Admin → Appearance → Themes)
├── clinic-website-control.zip       # Installable Plugin ZIP (WP Admin → Plugins → Add New)
├── README.md                        # Complete Architecture & Setup Documentation
└── REBRANDING-GUIDE.md              # 60-Second 1-Click Rebranding Workflow Guide
```

---

## 1. Specialty Presets

The system includes 6 pre-configured, medically verified specialty presets ready for instant demonstration:

| Specialty Preset | Demo Clinic Name | Color Palette | Key Clinical Services |
| :--- | :--- | :--- | :--- |
| **Dental Clinic / Studio** | Apex Dental Studio & Implant Centre | Sky Cyan (`#0284c7`), Teal (`#0d9488`), Navy (`#0f172a`) | Dental consultation, ultrasonic oral hygiene, fillings, root canals, zirconia crowns, orthodontics |
| **Dermatology & Skin Clinic** | DermaCare Skin & Aesthetic Clinic | Rose Plum (`#881337`), Onyx (`#18181b`), Teal (`#0d9488`) | Clinical skin consultation, acne assessment, eczema/psoriasis care, trichoscopy, cryotherapy, laser review |
| **General Physician / MBBS** | CareWell Family & Medical Clinic | Medical Teal (`#0d9488`), Slate Navy (`#0f172a`), Sky Blue (`#0284c7`) | Comprehensive medical consultation, annual health screening, acute triage, chronic care (hypertension, diabetes) |
| **Physiotherapy & Rehab** | ActiveLife Physiotherapy & Rehab Centre | Forest Emerald (`#047857`), Slate (`#111827`), Teal (`#0d9488`) | Musculoskeletal assessment, spine/lumbar core rehab, joint replacement recovery, sports injury triage, dry needling |
| **Gynaecology & Women's Health** | Blossom Women's Health & Gynaecology | Warm Coral Rose (`#be123c`), Midnight (`#1e1b4b`), Teal (`#0d9488`) | Well-woman checkups, prenatal care, menstrual/PCOS care, pelvic ultrasound, menopausal wellness |
| **Multi-Speciality Health Centre** | MetroCare Multi-Speciality Health Centre | Royal Sapphire (`#1e40af`), Deep Slate (`#0f172a`), Teal (`#0d9488`) | Integrated departments (Medicine, Dentistry, Derma, Ortho, Cardiology) & in-clinic diagnostic laboratory |

---

## 2. Integrated Medical Photography Assets

The theme and preview incorporate 3 high-resolution clinical photography assets located directly in the workspace:

1. **`Friendly Doctor in a Modern Clinic.png`** (`assets/images/doctor-hero.png`)
   - High-impact portrait of an attending doctor in clinical attire with stethoscope. Featured on Hero Banner and Doctor Profile pages.
2. **`Modern Clinic Reception and Consultation Room.png`** (`assets/images/clinic-reception.png`)
   - Clean, welcoming clinical reception lounge, reception desk, and consultation suite. Featured in Facilities Showcase and About pages.
3. **`Warm Consultation in a Modern Clinic.png`** (`assets/images/clinic-consultation.png`)
   - Doctor-patient consultation highlighting unhurried, attentive diagnostic evaluation. Featured in Clinical Introduction and Treatment pages.

---

## 3. Standard WordPress Installation

### Step 1: Install the Theme
1. In your WordPress admin dashboard, navigate to **Appearance &rarr; Themes &rarr; Add New &rarr; Upload Theme**.
2. Select `medclinic-universal.zip` and click **Install Now**.
3. Once uploaded, click **Activate**.

### Step 2: Install the Companion Plugin
1. Navigate to **Plugins &rarr; Add New &rarr; Upload Plugin**.
2. Select `clinic-website-control.zip` and click **Install Now**.
3. Click **Activate Plugin**.

### Step 3: Access Centralized Clinic Control
- A new menu item appears in the WordPress Admin sidebar: **Clinic Control**.
- Navigate to **Clinic Control &rarr; Rebrand Demo** to select any specialty preset in 1 click or customize credentials.

---

## 4. Standalone Interactive Preview Server

To test, demonstrate to prospects, or preview changes locally without a live PHP/MySQL host:

```bash
# Navigate to the workspace directory
cd /Users/farhan/Downloads/doctor

# Start the local preview server
node preview/server.js
```

Open your browser to:
- **Live Demo Website:** [http://localhost:3000/](http://localhost:3000/)
- **Clinic Website Control Admin:** [http://localhost:3000/admin.html](http://localhost:3000/admin.html)
- **Appointment Request Flow:** [http://localhost:3000/appointment.html](http://localhost:3000/appointment.html)

---

## 5. Key Features & Architectural Modules

### Centralized Branding & Design Tokens
- Colors, logos, clinic titles, doctor credentials, and contact details are stored in structured WordPress options (`clinic_website_options`).
- Injected as dynamic CSS custom properties (`--clinic-primary`, `--clinic-secondary`, `--clinic-accent`) into `<head>`.
- Changing the primary color in admin updates buttons, icons, pills, hover states, and active links throughout the site simultaneously.

### Modular 14-Section Homepage
1. Announcement Top Bar (Optional)
2. Sticky Header with Medical Logo, Nav, and Emergency Guidance
3. Hero Section with Trust Metrics & Doctor Photography
4. Clinic Introduction & Practice Values
5. Specialty & Services Treatment Grid
6. Lead Doctor Spotlight with Verified Registration Details
7. Clinical Excellence Pillars (Hospital-Grade Sterilization, Minimal Wait, Transparent Fees, Board-Certified Clinicians)
8. Clinic Facilities & Interior Gallery
9. Doctor-Patient Consultation Feature
10. Patient Experiences & Reviews (Watermarked in Demo Mode)
11. Frequently Asked Questions Accordion
12. Location, Operating Hours & Interactive Map Frame
13. Emergency Medical Advisory Alert Strip
14. Multi-Column Footer with Timings, Medical Notice & Mobile Sticky Action Bar

### Appointment Request Flow (Not Confirmed Booking)
- Collects: Patient Name, Phone Number, Preferred Doctor, Preferred Date, Preferred Time Window, Consultation Type, Short Administrative Note, and Consent Checkbox.
- Built-in nonce verification, server-side sanitization, and honeypot anti-spam protection.
- Dispatches notification email to the clinic coordinator.
- Generates formatted WhatsApp click-to-chat deep-link (`wa.me`) with prefilled appointment details for instant mobile communication.
- Clearly flags submissions as **requests** to prevent patient confusion with confirmed hospital bookings.

### Demo Disclosure Mode
- Displays a discrete, professional "Website Concept Demo" banner at the top of the website.
- Flags placeholder testimonials and sample registration details with transparent notices.
- Easily toggled off in WordPress Admin under **Clinic Control &rarr; General Settings &rarr; Demo Disclosure Mode** when handing over to a live clinic client.

### Schema.org Structured Data
- Automated JSON-LD structured data output in `<head>`.
- Generates `MedicalBusiness`, `Dentist`, `Physician`, or `MedicalClinic` schema matching the selected specialty.
- Includes verified address, telephone, hours of operation, and doctor affiliations for rich local search indexing.

---

## 6. Production Launch Checklist

When onboarding a real, operating medical client:
- [ ] Turn off **Demo Disclosure Mode** under `Clinic Control → Demo Disclosure Mode`.
- [ ] Upload the client's high-resolution clinic logo via `Appearance → Customize → Site Identity`.
- [ ] Verify attending doctor medical degrees and state medical council registration numbers.
- [ ] Verify clinical services and ensure no unsupported medical guarantees or non-offered therapies are listed.
- [ ] Configure `notification_email` to receive appointment requests.
- [ ] Test the WhatsApp number with country code on mobile devices.
- [ ] Ensure local emergency room guidance is clearly visible on contact templates.
- [ ] Review and customize the Privacy Policy with the clinic's designated data officer.
