<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'DR PHARMA — La plateforme santé digitale N°1 en Côte d\'Ivoire.')">
    <title>@yield('title', 'DR PHARMA')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ============================================ */
        /* RESET & BASE                                 */
        /* ============================================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; -webkit-text-size-adjust: 100%; }
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #1f2937; background: #fff; overflow-x: hidden; line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }
        img { max-width: 100%; display: block; }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        button { border: none; background: none; cursor: pointer; font: inherit; }

        /* ============================================ */
        /* VARIABLES                                    */
        /* ============================================ */
        :root {
            --brand-50: #ecfdf5; --brand-100: #d1fae5; --brand-200: #a7f3d0;
            --brand-300: #6ee7b7; --brand-400: #34d399; --brand-500: #10b981;
            --brand-600: #059669; --brand-700: #047857; --brand-800: #065f46;
            --brand-900: #064e3b; --brand-950: #022c22;
            --gray-50: #f9fafb; --gray-100: #f3f4f6; --gray-200: #e5e7eb;
            --gray-300: #d1d5db; --gray-400: #9ca3af; --gray-500: #6b7280;
            --gray-600: #4b5563; --gray-700: #374151; --gray-800: #1f2937;
            --gray-900: #111827; --gray-950: #030712;
            --radius-lg: 12px; --radius-xl: 16px; --radius-2xl: 20px;
            --radius-3xl: 24px; --radius-full: 9999px;
            --shadow-sm: 0 1px 2px rgba(0,0,0,.05);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -2px rgba(0,0,0,.1);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,.1), 0 4px 6px -4px rgba(0,0,0,.1);
            --shadow-xl: 0 20px 25px -5px rgba(0,0,0,.1), 0 8px 10px -6px rgba(0,0,0,.1);
        }

        /* ============================================ */
        /* UTILITY                                      */
        /* ============================================ */
        .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        @media(min-width:640px) { .container { padding: 0 24px; } }
        @media(min-width:1024px) { .container { padding: 0 32px; } }

        .btn {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 14px 28px; border-radius: var(--radius-2xl);
            font-weight: 700; font-size: 15px; transition: all .3s ease;
            cursor: pointer; border: none;
        }
        .btn-primary {
            background: var(--brand-600); color: #fff;
            box-shadow: 0 8px 20px rgba(5,150,105,.25);
        }
        .btn-primary:hover {
            background: var(--brand-700); transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(5,150,105,.35);
        }

        /* ============================================ */
        /* SCROLLBAR                                    */
        /* ============================================ */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--gray-100); }
        ::-webkit-scrollbar-thumb { background: var(--brand-600); border-radius: 3px; }

        /* ============================================ */
        /* NAVBAR                                       */
        /* ============================================ */
        .navbar {
            position: fixed; top: 0; width: 100%; z-index: 100;
            background: rgba(255,255,255,.95); backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0,0,0,.06);
            transition: all .4s ease;
        }
        .navbar-inner {
            display: flex; align-items: center; justify-content: space-between; height: 80px;
        }
        .navbar-logo { display: flex; align-items: center; gap: 12px; }
        .navbar-logo-icon {
            width: 44px; height: 44px; background: var(--brand-600);
            border-radius: var(--radius-xl); display: flex; align-items: center;
            justify-content: center; box-shadow: 0 4px 14px rgba(5,150,105,.3);
            transition: transform .3s;
        }
        .navbar-logo:hover .navbar-logo-icon { transform: scale(1.1); }
        .navbar-logo-icon svg { width: 24px; height: 24px; color: #fff; }
        .navbar-brand { font-size: 20px; font-weight: 800; letter-spacing: -.02em; }
        .navbar-brand span:first-child { color: var(--brand-700); }
        .navbar-brand span:nth-child(2) { color: var(--gray-400); }
        .navbar-brand span:last-child { color: var(--gray-700); }

        .nav-links { display: none; align-items: center; gap: 4px; }
        .nav-link {
            padding: 8px 16px; font-size: 14px; font-weight: 500;
            color: var(--gray-600); border-radius: 8px; transition: all .2s;
        }
        .nav-link:hover { color: var(--brand-600); background: var(--brand-50); }
        .nav-link.active { color: var(--brand-600); background: var(--brand-50); font-weight: 600; }
        .nav-cta { display: none; }
        .nav-cta .btn { padding: 10px 24px; font-size: 14px; }
        @media(min-width:768px) {
            .nav-links, .nav-cta { display: flex; align-items: center; }
            .hamburger { display: none !important; }
        }

        /* Hamburger */
        .hamburger {
            width: 40px; height: 40px; display: flex; flex-direction: column;
            align-items: center; justify-content: center; gap: 5px;
            border-radius: 8px; transition: background .2s;
        }
        .hamburger:hover { background: var(--gray-100); }
        .hamburger span {
            display: block; height: 2px; background: var(--gray-700);
            border-radius: 2px; transition: all .3s ease;
        }
        .hamburger span:nth-child(1) { width: 24px; }
        .hamburger span:nth-child(2) { width: 24px; }
        .hamburger span:nth-child(3) { width: 16px; }
        .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(4px, 5px); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { width: 24px; transform: rotate(-45deg) translate(4px, -5px); }

        /* Mobile menu */
        .mobile-menu {
            position: fixed; inset: 80px 0 0 0;
            background: rgba(255,255,255,.97); backdrop-filter: blur(20px);
            z-index: 90; display: flex; flex-direction: column;
            align-items: center; padding: 40px 24px;
            transform: translateX(100%); transition: transform .35s ease;
        }
        .mobile-menu.open { transform: translateX(0); }
        .mobile-menu a {
            width: 100%; text-align: center; padding: 18px 0; font-size: 18px;
            font-weight: 500; color: var(--gray-700);
            border-bottom: 1px solid var(--gray-100); transition: color .2s;
        }
        .mobile-menu a:hover { color: var(--brand-600); }
        .mobile-menu .btn {
            margin-top: 24px; width: 100%; justify-content: center; font-size: 18px;
        }
        @media(min-width:768px) { .mobile-menu { display: none; } }

        /* ============================================ */
        /* PAGE HERO                                    */
        /* ============================================ */
        .page-hero {
            background: linear-gradient(135deg, var(--brand-50), var(--brand-100));
            padding: 140px 0 60px; text-align: center;
        }
        .page-hero h1 {
            font-size: clamp(28px, 5vw, 42px); font-weight: 900;
            color: var(--gray-900); margin-bottom: 12px;
        }
        .page-hero p {
            font-size: 18px; color: var(--gray-500);
            max-width: 560px; margin: 0 auto;
        }

        /* ============================================ */
        /* FOOTER                                       */
        /* ============================================ */
        .footer {
            background: var(--gray-950); color: var(--gray-400); padding: 80px 0 32px;
        }
        .footer-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 48px; margin-bottom: 64px;
        }
        @media(min-width:768px) {
            .footer-grid { grid-template-columns: 2fr 1fr 1fr 1fr; }
        }
        .footer-brand { grid-column: 1 / -1; }
        @media(min-width:768px) { .footer-brand { grid-column: auto; } }
        .footer-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 24px; }
        .footer-logo-icon {
            width: 40px; height: 40px; background: var(--brand-600);
            border-radius: var(--radius-xl); display: flex; align-items: center;
            justify-content: center;
        }
        .footer-logo-icon svg { width: 20px; height: 20px; color: #fff; }
        .footer-logo span { font-size: 18px; font-weight: 700; color: #fff; }
        .footer-brand > p { font-size: 14px; line-height: 1.7; margin-bottom: 24px; }

        .social-links { display: flex; gap: 12px; }
        .social-link {
            width: 40px; height: 40px; background: var(--gray-800);
            border-radius: var(--radius-xl); display: flex; align-items: center;
            justify-content: center; transition: background .2s;
        }
        .social-link:hover { background: var(--brand-600); }
        .social-link svg { width: 20px; height: 20px; fill: currentColor; color: var(--gray-400); }
        .social-link:hover svg { color: #fff; }

        .footer-col h4 {
            font-size: 13px; font-weight: 700; color: #fff;
            text-transform: uppercase; letter-spacing: .05em; margin-bottom: 24px;
        }
        .footer-col ul { display: flex; flex-direction: column; gap: 12px; }
        .footer-col a { font-size: 14px; transition: color .2s; }
        .footer-col a:hover { color: var(--brand-400); }

        .footer-contact {
            border-top: 1px solid rgba(255,255,255,.08); padding-top: 32px;
            margin-bottom: 32px; display: flex; flex-wrap: wrap;
            justify-content: center; gap: 24px; font-size: 14px;
        }
        .footer-contact a, .footer-contact span {
            display: flex; align-items: center; gap: 8px; transition: color .2s;
        }
        .footer-contact a:hover { color: var(--brand-400); }
        .footer-contact svg { width: 16px; height: 16px; }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.08); padding-top: 32px;
            text-align: center; font-size: 12px; color: var(--gray-500);
        }

        /* ============================================ */
        /* PAGE-SPECIFIC STYLES                         */
        /* ============================================ */
        @yield('styles')
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="navbar-inner">
                <a href="/" class="navbar-logo">
                    <div class="navbar-logo-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M12 9v6" />
                            <circle cx="12" cy="12" r="8" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="navbar-brand"><span>DR</span><span>-</span><span>PHARMA</span></div>
                </a>

                <div class="nav-links">
                    <a href="/aide" class="nav-link @yield('nav_aide')">Centre d'aide</a>
                    <a href="/contact" class="nav-link @yield('nav_contact')">Contact</a>
                    <a href="/confidentialite" class="nav-link @yield('nav_confidentialite')">Confidentialité</a>
                    <a href="/cgu" class="nav-link @yield('nav_cgu')">CGU</a>
                </div>

                <div class="nav-cta">
                    <a href="/" class="btn btn-primary">Accueil</a>
                </div>

                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        <div class="mobile-menu" id="mobile-menu">
            <a href="/aide" class="mobile-link">Centre d'aide</a>
            <a href="/contact" class="mobile-link">Contact</a>
            <a href="/confidentialite" class="mobile-link">Confidentialité</a>
            <a href="/cgu" class="mobile-link">CGU</a>
            <a href="/" class="btn btn-primary">Accueil</a>
        </div>
    </nav>

    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <div class="footer-logo-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M12 9v6" />
                                <circle cx="12" cy="12" r="8" stroke-linecap="round" />
                            </svg>
                        </div>
                        <span>DR-PHARMA</span>
                    </div>
                    <p>La plateforme santé digitale N°1 en Côte d'Ivoire. Connecter les patients, pharmaciens et coursiers.</p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook"><svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                        <a href="#" class="social-link" aria-label="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
                        <a href="#" class="social-link" aria-label="X"><svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
                        <a href="#" class="social-link" aria-label="LinkedIn"><svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Produits</h4>
                    <ul>
                        <li><a href="#">App Patient</a></li>
                        <li><a href="#">App Pharmacien</a></li>
                        <li><a href="#">App Coursier</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Entreprise</h4>
                    <ul>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Carrières</a></li>
                        <li><a href="#">Presse</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="/aide">Centre d'aide</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/confidentialite">Confidentialité</a></li>
                        <li><a href="/cgu">CGU</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-contact">
                <a href="mailto:contact@drlpharma.com">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    contact@drlpharma.com
                </a>
                <a href="tel:+2250701159572">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    +225 07 01 159 572
                </a>
                <a href="tel:+2252722367192">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    +225 27 22 367 192
                </a>
                <span>
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Abidjan, Côte d'Ivoire
                </span>
            </div>

            <div class="footer-bottom">
                © {{ date('Y') }} DR-PHARMA — DRL NEGOCE SARL. Tous droits réservés. Fait en Côte d'Ivoire
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu
            var hamburger = document.getElementById('hamburger');
            var mobileMenu = document.getElementById('mobile-menu');
            if (hamburger && mobileMenu) {
                hamburger.addEventListener('click', function() {
                    hamburger.classList.toggle('open');
                    mobileMenu.classList.toggle('open');
                    document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
                });
                document.querySelectorAll('.mobile-link').forEach(function(link) {
                    link.addEventListener('click', function() {
                        hamburger.classList.remove('open');
                        mobileMenu.classList.remove('open');
                        document.body.style.overflow = '';
                    });
                });
            }
        });
    </script>
    @yield('scripts')
</body>

</html>
