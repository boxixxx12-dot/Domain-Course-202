<?php

// Basic details
$fullName    = "Raevin Isabelo Racho";
$course      = "2nd Year Bachelor of Science in Information Technology (BSIT)";
$profilePhoto = "photo.jpg"; // Save your photo in the same folder as index.php

// Short biography / About Me
$biography = "I am a second-year Information Technology student who enjoys learning new things and developing my skills. Outside academics, I enjoy working out at the gym and doing freelance work, particularly buying and selling clothing online. I am someone who learns quickly, adapts to different situations, and enjoys finding practical solutions to challenges.";

// Educational background (array of statements)
$education = [
    "Currently a second-year Bachelor of Science in Information Technology student.",
    "An achiever student who values education, personal development, and continuous learning."
];

// Skills (array of name => description pairs)
$skills = [
    "Fast Learner"     => "Able to understand and adapt to new concepts, tasks, and responsibilities quickly.",
    "Critical Thinking" => "Capable of analyzing different situations and identifying practical solutions to problems.",
    "Problem-Solving"  => "Able to approach challenges logically and find appropriate solutions."
];

// Hobbies and interests (simple list)
$hobbies = [
    "Listening to Music",
    "Working Out at the Gym",
    "Fitness and Personal Development",
    "Freelancing",
    "Online Clothing Buying and Selling"
];

// Contact information
$phone = "09270215689";
$email = "boxixx12@gmail.com";

// Navigation links (label => section id)
$navLinks = [
    "About"     => "about",
    "Education" => "education",
    "Skills"    => "skills",
    "Hobbies"   => "hobbies",
    "Contact"   => "contact"
];

// Extra values used by the page
$currentYear = date("Y");                 // Used in the footer copyright
$photoExists = file_exists($profilePhoto); // Checks whether profile.jpg is in the folder

// Initials shown only if the photo file is missing (e.g. "RIR")
$initials = "";
foreach (explode(" ", $fullName) as $namePart) {
    $initials .= strtoupper(substr($namePart, 0, 1));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($fullName); ?> | Student Portfolio</title>

    <style>
        /* ======================================================
           CSS SECTION 1: COLOR AND FONT VARIABLES
           Change colors here to restyle the whole website.
           ====================================================== */
        :root {
            --bg:          #15181f;   /* page background (deep slate) */
            --bg-soft:     #1b1f28;   /* alternate section background */
            --card:        #222733;   /* card background */
            --card-hover:  #282e3c;   /* card background on hover */
            --border:      #343b4b;   /* thin card borders */
            --text:        #eceae4;   /* main text */
            --text-muted:  #a6abb8;   /* secondary text */
            --accent:      #e3b25d;   /* gold accent */
            --accent-dark: #15181f;   /* text color on accent buttons */

            --font-heading: Georgia, "Times New Roman", serif;
            --font-body:    "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* ======================================================
           CSS SECTION 2: BASE / RESET STYLES
           ====================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;   /* smooth scrolling for nav links */
            scroll-padding-top: 80px;  /* keeps headings visible below the sticky header */
        }

        body {
            font-family: var(--font-body);
            background: var(--bg);
            color: var(--text);
            line-height: 1.7;
            font-size: 1rem;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        ul {
            list-style: none;
        }

        /* Visible keyboard focus for accessibility */
        a:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 3px;
        }

        /* Reusable centered container */
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ======================================================
           CSS SECTION 3: HEADER AND NAVIGATION
           ====================================================== */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(21, 24, 31, 0.95);
            border-bottom: 1px solid var(--border);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px 24px;
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .logo {
            font-family: var(--font-heading);
            font-size: 1.25rem;
            font-weight: bold;
            letter-spacing: 0.3px;
        }

        .main-nav ul {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .main-nav a {
            display: block;
            padding: 6px 14px;
            border-radius: 6px;
            color: var(--text-muted);
            font-size: 0.95rem;
            transition: color 0.2s ease, background 0.2s ease;
        }

        /* Hover effect: navigation links */
        .main-nav a:hover {
            color: var(--accent);
            background: var(--card);
        }

        /* ======================================================
           CSS SECTION 4: HERO (PROFILE PHOTO + NAME)
           ====================================================== */
        .hero {
            padding: 80px 0 72px;
        }

        .hero-inner {
            display: flex;
            align-items: center;
            gap: 56px;
        }

        /* Circular profile photo container */
        .photo-frame {
            flex-shrink: 0;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            padding: 6px;
            border: 3px solid var(--accent);
            transition: transform 0.3s ease;
        }

        /* Hover effect: photo */
        .photo-frame:hover {
            transform: scale(1.03);
        }

        .photo-frame img,
        .photo-fallback {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;          /* crops the photo neatly to fill the circle */
            object-position: center top; /* keeps the face near the top in view */
            display: block;
        }

        /* Shown only when profile.jpg is missing */
        .photo-fallback {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--card);
            color: var(--accent);
            font-family: var(--font-heading);
            font-size: 3.5rem;
        }

        .hero-text h1 {
            font-family: var(--font-heading);
            font-size: 3rem;
            line-height: 1.15;
            margin-bottom: 12px;
        }

        .hero-course {
            color: var(--accent);
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .hero-tagline {
            color: var(--text-muted);
            max-width: 52ch;
            margin-bottom: 28px;
        }

        /* ======================================================
           CSS SECTION 5: BUTTONS
           ====================================================== */
        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 11px 24px;
            border-radius: 8px;
            font-weight: 600;
            border: 2px solid var(--accent);
            transition: transform 0.2s ease, background 0.2s ease, color 0.2s ease;
        }

        .btn-primary {
            background: var(--accent);
            color: var(--accent-dark);
        }

        .btn-outline {
            color: var(--accent);
        }

        /* Hover effect: buttons */
        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-primary:hover {
            background: #efc678;
        }

        .btn-outline:hover {
            background: var(--accent);
            color: var(--accent-dark);
        }

        /* ======================================================
           CSS SECTION 6: CONTENT SECTIONS AND CARDS
           ====================================================== */
        .section {
            padding: 72px 0;
        }

        .section.alt {
            background: var(--bg-soft);
        }

        .section-title {
            font-family: var(--font-heading);
            font-size: 2rem;
            margin-bottom: 32px;
            padding-left: 16px;
            border-left: 4px solid var(--accent);
        }

        /* Card-style layout */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 28px;
            transition: transform 0.25s ease, border-color 0.25s ease, background 0.25s ease;
        }

        /* Hover effect: cards */
        .card:hover {
            transform: translateY(-5px);
            border-color: var(--accent);
            background: var(--card-hover);
        }

        .card h3 {
            font-family: var(--font-heading);
            font-size: 1.2rem;
            margin-bottom: 8px;
            color: var(--accent);
        }

        .card p {
            color: var(--text-muted);
        }

        /* Grid used for skills and hobbies cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        /* Education list */
        .education-list {
            display: grid;
            gap: 16px;
        }

        .education-list .card {
            border-left: 4px solid var(--accent);
        }

        .education-list .card p {
            color: var(--text);
        }

        /* Hobby cards are simpler: just a title */
        .hobby-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px 24px;
        }

        .hobby-card::before {
            content: "";
            flex-shrink: 0;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--accent);
        }

        .hobby-card span {
            font-weight: 600;
        }

        /* ======================================================
           CSS SECTION 7: CONTACT
           ====================================================== */
        .contact-card {
            display: block;
        }

        .contact-label {
            display: block;
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 4px;
        }

        .contact-value {
            font-size: 1.2rem;
            font-weight: 600;
            word-break: break-all;
        }

        /* ======================================================
           CSS SECTION 8: FOOTER
           ====================================================== */
        .site-footer {
            background: var(--bg);
            border-top: 1px solid var(--border);
            padding: 32px 0;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .site-footer strong {
            color: var(--text);
        }

        /* ======================================================
           CSS SECTION 9: RESPONSIVE DESIGN (MEDIA QUERIES)
           ====================================================== */

        /* Tablet: screens 850px wide and smaller */
        @media (max-width: 850px) {
            .hero {
                padding: 56px 0 48px;
            }

            .hero-inner {
                flex-direction: column;
                text-align: center;
                gap: 32px;
            }

            .hero-tagline {
                margin-left: auto;
                margin-right: auto;
            }

            .button-group {
                justify-content: center;
            }

            .hero-text h1 {
                font-size: 2.4rem;
            }
        }

        /* Mobile: screens 600px wide and smaller */
        @media (max-width: 600px) {
            .header-inner {
                justify-content: center;
                text-align: center;
            }

            .main-nav ul {
                justify-content: center;
            }

            .photo-frame {
                width: 210px;
                height: 210px;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .section {
                padding: 52px 0;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .card {
                padding: 22px;
            }
        }

        /* Respect users who prefer less motion */
        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body>

    <!-- ======================================================
         HEADER: website identity + navigation links
         ====================================================== -->
    <header class="site-header">
        <div class="container header-inner">
            <a href="#home" class="logo"><?php echo htmlspecialchars($fullName); ?></a>

            <nav class="main-nav" aria-label="Main navigation">
                <ul>
                    <?php // Build each navigation link from the $navLinks array ?>
                    <?php foreach ($navLinks as $label => $sectionId): ?>
                        <li><a href="#<?php echo $sectionId; ?>"><?php echo $label; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <!-- ==================================================
             SECTIONS 1 & 2: PROFILE PHOTO AND FULL NAME
             ================================================== -->
        <section id="home" class="hero">
            <div class="container hero-inner">

                <!-- Profile photo (shows initials if profile.jpg is missing) -->
                <div class="photo-frame">
                    <?php if ($profilePhoto): ?>
                        <img src="<?php echo htmlspecialchars($profilePhoto); ?>"
                             alt="Profile photo of <?php echo htmlspecialchars($fullName); ?>">
                    <?php else: ?>
                        <div class="photo-fallback"><?php echo $initials; ?></div>
                    <?php endif; ?>
                </div>

                <!-- Full name and course -->
                <div class="hero-text">
                    <h1><?php echo htmlspecialchars($fullName); ?></h1>
                    <p class="hero-course"><?php echo htmlspecialchars($course); ?></p>
                    <p class="hero-tagline">Student portfolio: who I am, what I study, and how to reach me.</p>

                    <div class="button-group">
                        <a href="#about" class="btn btn-primary">About Me</a>
                        <a href="#contact" class="btn btn-outline">Contact Me</a>
                    </div>
                </div>

            </div>
        </section>

        <!-- ==================================================
             SECTION 3: SHORT BIOGRAPHY / ABOUT ME
             ================================================== -->
        <section id="about" class="section alt">
            <div class="container">
                <h2 class="section-title">About Me</h2>
                <article class="card">
                    <p><?php echo htmlspecialchars($biography); ?></p>
                </article>
            </div>
        </section>

        <!-- ==================================================
             SECTION 4: EDUCATIONAL BACKGROUND
             ================================================== -->
        <section id="education" class="section">
            <div class="container">
                <h2 class="section-title">Educational Background</h2>
                <div class="education-list">
                    <?php // Loop through the $education array and show one card per item ?>
                    <?php foreach ($education as $item): ?>
                        <article class="card">
                            <p><?php echo htmlspecialchars($item); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ==================================================
             SECTION 5: SKILLS
             ================================================== -->
        <section id="skills" class="section alt">
            <div class="container">
                <h2 class="section-title">Skills</h2>
                <div class="card-grid">
                    <?php // Loop through $skills: $skillName is the key, $skillDescription is the value ?>
                    <?php foreach ($skills as $skillName => $skillDescription): ?>
                        <article class="card">
                            <h3><?php echo htmlspecialchars($skillName); ?></h3>
                            <p><?php echo htmlspecialchars($skillDescription); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ==================================================
             SECTION 6: HOBBIES AND INTERESTS
             ================================================== -->
        <section id="hobbies" class="section">
            <div class="container">
                <h2 class="section-title">Hobbies and Interests</h2>
                <div class="card-grid">
                    <?php // Loop through the $hobbies array ?>
                    <?php foreach ($hobbies as $hobby): ?>
                        <article class="card hobby-card">
                            <span><?php echo htmlspecialchars($hobby); ?></span>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ==================================================
             SECTION 7: CONTACT INFORMATION
             ================================================== -->
        <section id="contact" class="section alt">
            <div class="container">
                <h2 class="section-title">Contact Information</h2>
                <div class="card-grid">

                    <!-- Clickable telephone link -->
                    <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="card contact-card">
                        <span class="contact-label">Phone Number</span>
                        <span class="contact-value"><?php echo htmlspecialchars($phone); ?></span>
                    </a>

                    <!-- Clickable email link -->
                    <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="card contact-card">
                        <span class="contact-label">Gmail</span>
                        <span class="contact-value"><?php echo htmlspecialchars($email); ?></span>
                    </a>

                </div>
            </div>
        </section>

    </main>

    <!-- ======================================================
         FOOTER: name, course, and copyright
         ====================================================== -->
    <footer class="site-footer">
        <div class="container">
            <p><strong><?php echo htmlspecialchars($fullName); ?></strong></p>
            <p><?php echo htmlspecialchars($course); ?></p>
            <p>&copy; <?php echo $currentYear; ?> <?php echo htmlspecialchars($fullName); ?>. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
