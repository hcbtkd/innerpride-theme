# Inner Pride Taekwondo Theme — Developer & Reusability Guide
**Theme Name:** Inner Pride Taekwondo Theme  
**Version:** 1.0.3  
**Compatibility:** WordPress 5.8+ to 6.7+, PHP 7.4 to 8.3+  
**Design Philosophy:** Clean, Ultra-Fast Vanilla CSS & JS, Zero Heavy Frameworks, Mobile-First, SEO & Performance Optimized.

---

## 📁 File Structure Overview

| File / Folder | Purpose |
|---|---|
| `style.css` | Primary stylesheet with CSS Variables, Design Tokens, and responsive breakpoints. |
| `functions.php` | Enqueues styles/scripts, enables custom logo, theme supports, and version constants. |
| `header.php` | Semantic header, navigation drawer with touch-friendly `[✕]` close button, branding, and hamburger toggle. |
| `front-page.php` | Complete high-conversion home page (Hero, About, Coach Portfolio, Belt Progression Stepper, Wall of Fame / Medals, Programs, Reviews Carousel, FAQs, Map, Trial Modal). |
| `footer.php` | Footer links, WhatsApp/Phone floating bottom bar, copyright, and Book Free Trial modal dialog. |
| `page-coach-portfolio.php` | Dedicated institutional school sports tie-up dossier for physical education & self-defense curriculum. |
| `coach-portfolio.html` | Standalone static HTML version of the coach dossier (fast loading & embeddable). |
| `assets/js/main.js` | Zero-dependency interactive logic (Mobile drawer, Belt stepper, Gallery filters/lightbox, Testimonials carousel, FAQs). |
| `assets/images/` | Optimized WebP/JPG academy photos, medals, coach dossier, training badges, and logo. |
| `customizer-additional-css.css` | Ready-to-paste Additional CSS rules for instant live Customizer deployment. |

---

## 🎨 How to Reuse This Theme for Another Client / Academy / Business

If you want to adapt this theme for another client (e.g. Karate Dojang, Fitness Gym, Boxing Club, Dance Academy, Sports School):

### 1. Change Brand Name & Identity
- In `functions.php`:
  - Update `INNERPRIDE_VERSION` to bust cache when updating.
- In `header.php`:
  - Replace `'Inner Pride'` text with the new business name.
  - Upload the new client's logo via **WP Admin ➔ Appearance ➔ Customize ➔ Site Identity ➔ Logo**.
  - The CSS automatically caps the logo cleanly at `max-height: 52px; width: auto; max-width: 220px;`.

### 2. Change Colors & Theme Palette (`style.css`)
All colors are centralized in `:root` tokens at lines 18–50 of `style.css`:
```css
:root {
  --primary: #0f172a;           /* Main dark text / button color */
  --accent-red: #e11d48;        /* Main highlight / CTA color */
  --accent-red-hover: #be123c;
  --accent-blue: #2563eb;       /* Secondary highlight */
  --bg-primary: #ffffff;
  --bg-secondary: #f8fafc;
}
```
Simply change `--accent-red` to whatever primary color the new client wants (e.g., Orange, Emerald Green, Gold, Purple).

### 3. Change Contact, WhatsApp & Phone
- In `footer.php` lines 10–12:
  ```php
  $academy_email = get_theme_mod( 'academy_email', 'client@domain.com' );
  $academy_phone = get_theme_mod( 'academy_phone', '+91 9876543210' );
  ```
- In `front-page.php`: Search for `7309595831` and replace with the new client's WhatsApp number.

### 4. Head Coach / Founder Credentials
- In `front-page.php` (Coach Section):
  - Replace Coach Name, Degrees (e.g., M.P.Ed, B.P.Ed, B.P.E.S), Belt rank, and championship list.
  - Replace `coach-haseeb.png` with the new instructor's photo in `assets/images/`.

### 5. Training Programs & Batches
- In `front-page.php` (Programs & Schedule Section):
  - Adjust batch timings, age brackets (Kids, Teens, Adults), and days (Mon–Sat).

---

## 📦 How to Rebuild the Installable WordPress ZIP

Whenever you make changes to the files, run this single command in PowerShell from the scratch directory:

```powershell
powershell -ExecutionPolicy Bypass -File "C:\Users\Asus\.gemini\antigravity-ide\scratch\build_clean_zip.ps1"
```

This will automatically create:
`C:\Users\Asus\.gemini\antigravity-ide\scratch\innerpride-theme.zip` (clean WordPress package with proper forward slashes `/` ready for any Linux/Hostinger server).

---

## 🚀 How to Upload to Any WordPress Site

1. Log in to WordPress Admin (`yourdomain.com/wp-admin`).
2. Navigate to **Appearance ➔ Themes ➔ Add New Theme ➔ Upload Theme**.
3. Select `innerpride-theme.zip` and click **Install Now**.
4. Click **Activate** (or **Replace active with uploaded** if updating).
5. Open **Appearance ➔ Customize ➔ Additional CSS**, paste the contents of `customizer-additional-css.css`, and click **Publish**.
6. Purge cache via **Performance ➔ Purge All Caches**.
