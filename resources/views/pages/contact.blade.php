<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contactez l'équipe DR-PHARMA — Nous sommes là pour vous aider.">
    <title>Contact — DR-PHARMA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1f2937;
            background: #fff;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        :root {
            --brand-50: #ecfdf5;
            --brand-100: #d1fae5;
            --brand-200: #a7f3d0;
            --brand-400: #34d399;
            --brand-500: #10b981;
            --brand-600: #059669;
            --brand-700: #047857;
            --brand-800: #065f46;
            --brand-900: #064e3b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --red-500: #ef4444;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar */
        .navbar {
            background: #fff;
            border-bottom: 1px solid var(--gray-200);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-logo-icon {
            width: 40px;
            height: 40px;
            background: var(--brand-600);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-logo-icon svg {
            width: 22px;
            height: 22px;
            color: #fff;
        }

        .navbar-brand {
            font-size: 18px;
            font-weight: 800;
        }

        .navbar-brand span:first-child {
            color: var(--brand-700);
        }

        .navbar-brand span:last-child {
            color: var(--gray-700);
        }

        .back-link {
            font-size: 14px;
            font-weight: 600;
            color: var(--brand-600);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .back-link:hover {
            color: var(--brand-700);
        }

        .back-link svg {
            width: 16px;
            height: 16px;
        }

        /* Hero */
        .page-hero {
            background: linear-gradient(135deg, var(--brand-50), var(--brand-100));
            padding: 64px 0 48px;
            text-align: center;
        }

        .page-hero h1 {
            font-size: clamp(28px, 5vw, 42px);
            font-weight: 900;
            color: var(--gray-900);
            margin-bottom: 12px;
        }

        .page-hero p {
            font-size: 18px;
            color: var(--gray-500);
            max-width: 560px;
            margin: 0 auto;
        }

        /* Content */
        .content {
            padding: 64px 0 96px;
        }

        /* Contact cards */
        .contact-cards {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            margin-bottom: 48px;
        }

        @media(min-width:768px) {
            .contact-cards {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .contact-card {
            background: var(--gray-50);
            border: 1px solid var(--gray-100);
            border-radius: 20px;
            padding: 32px;
            text-align: center;
            transition: transform .3s, box-shadow .3s;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .08);
        }

        .contact-icon {
            width: 56px;
            height: 56px;
            background: var(--brand-100);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .contact-icon svg {
            width: 28px;
            height: 28px;
            color: var(--brand-600);
        }

        .contact-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .contact-card p {
            font-size: 14px;
            color: var(--gray-500);
            margin-bottom: 12px;
        }

        .contact-card a.card-link {
            font-size: 15px;
            font-weight: 600;
            color: var(--brand-600);
        }

        .contact-card a.card-link:hover {
            color: var(--brand-700);
        }

        /* Form */
        .form-section {
            background: var(--gray-50);
            border-radius: 24px;
            padding: 48px 40px;
            border: 1px solid var(--gray-100);
        }

        .form-section h2 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .form-section>p {
            color: var(--gray-500);
            margin-bottom: 32px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media(min-width:640px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-700);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 14px 16px;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition: border-color .2s;
            background: #fff;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--brand-500);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 140px;
        }

        .form-submit {
            grid-column: 1 / -1;
            margin-top: 8px;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: var(--brand-600);
            color: #fff;
            border: none;
            border-radius: 16px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all .3s;
        }

        .btn-submit:hover {
            background: var(--brand-700);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(5, 150, 105, .25);
        }

        .btn-submit svg {
            width: 20px;
            height: 20px;
        }

        /* Success */
        .form-success {
            display: none;
            text-align: center;
            padding: 40px 0;
        }

        .form-success.show {
            display: block;
        }

        .form-success .check-icon {
            width: 64px;
            height: 64px;
            background: var(--brand-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .form-success .check-icon svg {
            width: 32px;
            height: 32px;
            color: var(--brand-600);
        }

        .form-success h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-success p {
            color: var(--gray-500);
        }

        /* Footer */
        .footer-mini {
            text-align: center;
            padding: 32px 0;
            border-top: 1px solid var(--gray-100);
            font-size: 13px;
            color: var(--gray-400);
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <a href="/" class="navbar-logo">
                <div class="navbar-logo-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M12 9v6" />
                        <circle cx="12" cy="12" r="8" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="navbar-brand"><span>DR-</span><span>PHARMA</span></div>
            </a>
            <a href="/" class="back-link">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Retour
            </a>
        </div>
    </nav>

    <section class="page-hero">
        <div class="container">
            <h1>Contactez-nous</h1>
            <p>Une question, un partenariat ou besoin d'aide ? Notre équipe vous répond rapidement.</p>
        </div>
    </section>

    <section class="content">
        <div class="container">

            <div class="contact-cards">
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3>Email</h3>
                    <p>Réponse sous 24h</p>
                    <a href="mailto:contact@drlpharma.com" class="card-link">contact@drlpharma.com</a>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3>Téléphone</h3>
                    <p>Lun - Ven, 8h - 18h</p>
                    <a href="tel:+2250701159572" class="card-link">+225 07 01 159 572</a>
                    <a href="tel:+2252722367192" class="card-link">+225 27 22 367 192</a>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3>Adresse</h3>
                    <p>Siège social</p>
                    <span class="card-link" style="font-size:15px;font-weight:600;color:var(--brand-600);">Abidjan, Côte
                        d'Ivoire</span>
                </div>
            </div>

            <div class="form-section" id="contact-form-section">
                <h2>Envoyez-nous un message</h2>
                <p>Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>

                <form id="contactForm" class="form-grid" onsubmit="return submitForm(event)">
                    <div class="form-group">
                        <label for="name">Nom complet *</label>
                        <input type="text" id="name" name="name" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone" placeholder="+225 XX XX XX XX XX">
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Choisir un sujet</option>
                            <option value="question">Question générale</option>
                            <option value="commande">Problème de commande</option>
                            <option value="paiement">Problème de paiement</option>
                            <option value="partenariat">Devenir partenaire (Pharmacie)</option>
                            <option value="coursier">Devenir coursier</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div class="form-group full">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" placeholder="Décrivez votre demande en détail…" required></textarea>
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn-submit">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Envoyer le message
                        </button>
                    </div>
                </form>

                <div class="form-success" id="formSuccess">
                    <div class="check-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3>Message envoyé !</h3>
                    <p>Merci de nous avoir contacté. Nous vous répondrons dans les plus brefs délais.</p>
                </div>
            </div>

        </div>
    </section>

    <footer class="footer-mini">
        <div class="container">© {{ date('Y') }} DR-PHARMA. Tous droits réservés.</div>
    </footer>

    <script>
        function submitForm(e) {
            e.preventDefault();
            // Pour l'instant, affiche le message de succès
            document.getElementById('contactForm').style.display = 'none';
            document.getElementById('formSuccess').classList.add('show');
            return false;
        }
    </script>
</body>

</html>
