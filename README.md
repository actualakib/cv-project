# 🚀 AutoCV Builder — Free Online Resume & CV Maker

<div align="center">

[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-22c55e?style=flat-square)](LICENSE)

**Build a polished, ATS-optimised CV in under 5 minutes — free, no sign-up needed.**

[Report Bug](https://github.com/yourusername/autocv-builder/issues) · [Request Feature](https://github.com/yourusername/autocv-builder/issues) · [Live Demo](http://www.project-cv.infinityfreeapp.com/)

</div>

---

## 📖 About

**AutoCV Builder** is an open-source, browser-based **resume and CV builder** built with vanilla HTML, CSS, JavaScript, and a lightweight PHP backend. Users fill in a form, instantly see their CV rendered in a chosen template, and download it as a PDF or Word document — all without creating an account.

> Keywords: `cv builder` · `resume builder` · `free cv template` · `ats resume` · `html resume` · `php cv generator` · `automated cv` · `professional resume maker` · `free resume download` · `cv builder no signup`

---

## ✨ 20 Unique Features

| # | Feature | Details |
|---|---------|---------|
| 1 | **Two Free CV Templates** | Classic ATS Format and Modern Canva Style — both production-ready |
| 2 | **Premium Template (Executive Pro)** | Locked behind a demo payment modal; easily integrated with a real gateway |
| 3 | **Instant PDF Export** | High-quality A4 PDF generated via `html2pdf.js` with 2× canvas scale |
| 4 | **Word (.doc) Export** | CV HTML is wrapped in Office XML and downloaded as a `.doc` file |
| 5 | **Profile Photo Upload** | JPEG/PNG upload with 5MB limit; image previewed before CV generation |
| 6 | **Live Word-Limit Enforcement** | Each textarea truncates input in real time to its declared word cap |
| 7 | **Client-Side Form Validation** | Required fields highlighted red with inline error messages before proceeding |
| 8 | **Dynamic Skill Fields** | Add up to 8 individual skill inputs; each capped at 25 words |
| 9 | **Dynamic Reference Fields** | Add up to 2 references; each rendered in its own block on the CV |
| 10 | **Optional-Fields Warning Modal** | Warns users if Social, Extra Curricular, or References are left blank |
| 11 | **WhatsApp Share Button** | Opens WhatsApp with a pre-filled message containing name, job title, and page URL |
| 12 | **Twitter / X Share Button** | Opens Twitter composer with auto-generated text and job-related hashtags |
| 13 | **Google Jobs Integration** | Search bar sends query directly to Google's job listing results page |
| 14 | **Save CV Data to File (PHP)** | "Save Data" POSTs all CV fields to PHP; each submission creates a unique `.txt` file |
| 15 | **Individual Feedback Files (PHP)** | Each feedback submission saved as its own timestamped `.txt` file — nothing appended |
| 16 | **Unique Filenames per Submission** | Files named with `FirstName + timestamp + random ID` — no overwrites, ever |
| 17 | **Auto-Created Sub-folders** | `cv_submissions/` and `feedback_submissions/` are created automatically by PHP if missing |
| 18 | **Zero Database Required** | Entire stack runs on flat files; no MySQL or SQLite setup needed |
| 19 | **No Account / Sign-Up** | Users go from blank page to finished CV with zero authentication friction |
| 20 | **Single-File Frontend** | All views, templates, modals, and logic live in one `index.html` — easy to deploy anywhere |

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Markup | HTML5 |
| Styling | Tailwind CSS (CDN) + custom `style.css` |
| Logic | Vanilla JavaScript (no frameworks) |
| Icons | Font Awesome 6 |
| PDF | html2pdf.js |
| Backend | PHP 7.4+ (optional) |
| Storage | Plain `.txt` files |

---

## 🚀 Getting Started

### Run Without PHP (Static Mode)
All CV building, PDF export, and Word export work by simply opening `index.html` in any browser. No server needed.

```bash
# Clone the repo
git clone https://github.com/yourusername/autocv-builder.git

# Open directly
open autocv-builder/index.html
```

### Run With PHP (Full Features)
Required only for "Save Data" and "Send Feedback" buttons.

**1. Install XAMPP / WAMP / Laragon**

**2. Copy the project into your server root**
```bash
# XAMPP (Linux/Mac)
cp -r autocv-builder /opt/lampp/htdocs/

# WAMP (Windows)
xcopy autocv-builder C:\wamp64\www\ /E /I
```

**3. Start Apache and visit:**
```
http://localhost/autocv-builder/
```

---

## 📁 Project Structure

```
autocv-builder/
│
├── index.html               # Entire app: all views, templates, and JS logic
├── style.css                # ~60 lines of custom CSS (Tailwind handles the rest)
├── submit_cv.php            # Saves CV data → cv_submissions/cv_Name_timestamp.txt
├── submit_feedback.php      # Saves feedback → feedback_submissions/feedback_timestamp.txt
│
├── cv_submissions/          # Auto-created. One .txt file per "Save Data" click.
└── feedback_submissions/    # Auto-created. One .txt file per feedback submission.
```

---

## 📋 How the PHP Backend Works

**`submit_cv.php`**
Receives a JSON POST from `saveToDatabase()` in the frontend. Sanitises all fields with `strip_tags` + `htmlspecialchars`, then writes a formatted plain-text file to `cv_submissions/`. The filename includes the user's first name, date-time, and a short random ID — guaranteeing uniqueness.

**`submit_feedback.php`**
Same pattern. Receives a JSON POST from `submitFeedback()`, sanitises the text, and writes a new file to `feedback_submissions/`. Every submission is independent.

---

## 🐛 FAQ

**"Save Data" gives an error.**
→ XAMPP/WAMP Apache must be running. Both PHP files must be in the same folder as `index.html`.

**PDF is blank or cut off.**
→ Scroll to the top of the page before clicking Download PDF. `html2pdf` captures the current scroll position.

**Can I add my own template?**
→ Yes. Duplicate a `render-template-*` block in `index.html`, give it a new ID (`render-template-3`), add the card to the templates view, and extend `renderCV()` with the new prefix.

---

## 🤝 Contributing

```bash
git checkout -b feature/my-feature
git commit -m "feat: describe what you added"
git push origin feature/my-feature
# Open a Pull Request
```

---

## 📄 License

MIT — free to use, modify, and distribute. See [LICENSE](LICENSE).
@actualakib
---

<div align="center">
Made with ❤️ · Give it a ⭐!
</div>
