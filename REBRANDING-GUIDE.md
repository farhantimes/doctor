# One-Click Rebranding Workflow Guide

How to adapt the **Universal Doctor & Clinic Website Demo System** for a prospective medical client in under 60 seconds.

---

## The Workflow Overview

When meeting with a prospective medical client (e.g. a dentist, dermatologist, general physician, physiotherapist, or multi-speciality clinic director), you can rebrand the entire website in **one central place**.

No code edits, database replacements, or template modifications are needed.

```
┌──────────────────────────────────────────────┐
│  WordPress Admin → Clinic Control            │
│  Select Specialty Preset or Custom Rebrand   │
└──────────────────────┬───────────────────────┘
                       │
                       ▼
┌──────────────────────────────────────────────┐
│  Automatic Global Site Propagation:          │
│  • Brand Logo & Site Title                   │
│  • Primary, Secondary & Accent Colors        │
│  • Doctor Name, Qualifications & Reg. No.    │
│  • Treatment Services & Duration Badges      │
│  • Phone, WhatsApp & Email Deep-Links        │
│  • Address, Operating Hours & Google Maps    │
│  • Schema.org JSON-LD Medical Entity         │
└──────────────────────────────────────────────┘
```

---

## Method 1: Instant Specialty Presets (1 Click)

If your prospect belongs to one of the 6 core medical specialties, use the pre-built preset library:

1. In WordPress Admin, navigate to **Clinic Control &rarr; Rebrand Demo**.
2. Locate the target specialty card:
   - 🦷 **Dental Clinic**: *Apex Dental Studio & Implant Centre* (Ocean Blue `#0284c7`)
   - ✨ **Dermatology & Skin**: *DermaCare Skin & Aesthetic Clinic* (Rose Plum `#881337`)
   - 🩺 **General Physician / MBBS**: *CareWell Family & Medical Clinic* (Medical Teal `#0d9488`)
   - 🏃 **Physiotherapy & Rehab**: *ActiveLife Physiotherapy & Sports Injury* (Forest Emerald `#047857`)
   - 🌸 **Gynaecology & Women's Health**: *Blossom Women's Health Clinic* (Warm Coral Rose `#be123c`)
   - 🏥 **Multi-Speciality Clinic**: *MetroCare Multi-Speciality Health Centre* (Sapphire Blue `#1e40af`)
3. Click the blue **Apply Preset** button on the card.
4. Confirm the prompt.
5. The entire website immediately transforms with the new brand name, color tokens, doctor credentials, and specialty treatments.

---

## Method 2: Custom Clinic Rebranding (Under 60 Seconds)

If you have specific details from your prospect (e.g., their clinic name, doctor name, and brand color):

1. Navigate to **Clinic Control &rarr; Rebrand Demo &rarr; Option 2: Custom Clinic Rebrand**.
2. Enter the prospect's details:
   - **Clinic Name:** e.g. *Beacon Dental & Facial Aesthetics*
   - **Medical Specialty:** e.g. *Restorative Dentistry & Smile Design*
   - **Doctor Name:** e.g. *Dr. Marcus Vance, DDS*
   - **Qualifications:** e.g. *BDS, MSc (Aesthetic Dentistry)*
   - **Phone & WhatsApp:** e.g. `+1 (555) 890-1234` / `15558901234`
   - **Primary Brand Color:** Select via the color picker (or enter HEX)
   - **Address:** Enter their clinic location
3. Click **Apply Custom Rebrand Now**.
4. The system validates the inputs, creates an automatic backup of the previous configuration, and applies the rebrand site-wide.

---

## What Gets Automatically Updated?

| Website Component | Automatic Transformation |
| :--- | :--- |
| **Header Brand** | Updates logo text, clinic title, and specialty subtitle |
| **Design System** | Changes `--clinic-primary` and `--clinic-secondary` CSS variables in `<head>` |
| **Hero Section** | Updates specialty badge, headline, and doctor credentials card |
| **Doctor Profile** | Updates name, degree, registration number, languages, and biography |
| **Services Grid** | Dynamically adapts treatment titles, procedures, and duration pills |
| **Appointment Form** | Prefills doctor selection, clinic notification email, and WhatsApp message |
| **Contact & Location**| Updates phone, WhatsApp, email, street address, and Google Maps pin |
| **Structured Data** | Regenerates Schema.org JSON-LD matching the new specialty and clinic entity |

---

## Safety & Backup Safeguards

- **No Blind Text Replacement:** Rebranding uses structured WordPress options rather than raw SQL search-and-replace, preventing database corruption.
- **Automatic Configuration Backup:** Every time a preset or custom rebrand is applied, the previous configuration is saved. Click **Undo / Restore Previous Backup** at any time to revert.
- **JSON Export / Import:** Click **Export Current Config as JSON** to save client configurations as local JSON files. You can build a library of prospect presets and load them before client meetings.

---

## Transitioning From Demo to Production Launch

When the prospective client approves the website and you are ready to launch their live portal:

1. Navigate to **Clinic Control &rarr; General Settings &rarr; Tab 6: Demo Disclosure Mode**.
2. Uncheck **Enable Demo Disclosure Mode**.
3. Click **Save Clinic Configuration**.
4. The "Website Concept Demo" banner and placeholder disclaimer notices will be removed, transitioning the website into full production mode.
