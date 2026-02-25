<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Politique de Confidentialité de l'application DR PHARMA — DRL NEGOCE SARL.">
    <title>Politique de Confidentialité — DR PHARMA</title>
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
            --brand-500: #10b981;
            --brand-600: #059669;
            --brand-700: #047857;
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
        }

        .container {
            width: 100%;
            max-width: 800px;
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
        .legal-content {
            padding: 64px 0 96px;
        }

        .legal-content h2 {
            font-size: 22px;
            font-weight: 800;
            color: var(--gray-900);
            margin: 40px 0 16px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--brand-100);
        }

        .legal-content h2:first-child {
            margin-top: 0;
        }

        .legal-content p {
            color: var(--gray-600);
            margin-bottom: 16px;
            line-height: 1.8;
            font-size: 15px;
        }

        .legal-content ul {
            margin: 8px 0 16px 24px;
            list-style: disc;
        }

        .legal-content ul li {
            color: var(--gray-600);
            margin-bottom: 6px;
            font-size: 15px;
            line-height: 1.7;
        }

        .legal-content strong {
            color: var(--gray-800);
        }

        .legal-content a {
            color: var(--brand-600);
            font-weight: 600;
        }

        .legal-content a:hover {
            text-decoration: underline;
        }

        /* Info card */
        .info-card {
            background: var(--gray-50);
            border: 1px solid var(--gray-100);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 16px;
        }

        .info-card p {
            margin-bottom: 4px;
            font-size: 14px;
        }

        /* TOC */
        .toc {
            background: var(--gray-50);
            border: 1px solid var(--gray-100);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 40px;
        }

        .toc h4 {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: var(--gray-400);
            margin-bottom: 12px;
        }

        .toc ol {
            list-style: decimal;
            margin-left: 20px;
        }

        .toc li {
            margin-bottom: 6px;
        }

        .toc a {
            font-size: 14px;
            color: var(--brand-600);
            font-weight: 500;
        }

        .toc a:hover {
            text-decoration: underline;
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
            <h1>Politique de Confidentialité</h1>
            <p>Application DR PHARMA</p>
        </div>
    </section>

    <section class="legal-content">
        <div class="container">

            <div class="toc">
                <h4>Sommaire</h4>
                <ol>
                    <li><a href="#introduction">Introduction</a></li>
                    <li><a href="#collecte">Données collectées</a></li>
                    <li><a href="#utilisation">Utilisation des données</a></li>
                    <li><a href="#partage">Partage des données</a></li>
                    <li><a href="#stockage">Stockage et sécurité</a></li>
                    <li><a href="#droits">Droits des utilisateurs</a></li>
                    <li><a href="#cookies">Cookies et technologies similaires</a></li>
                    <li><a href="#modification">Modification de la politique</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ol>
            </div>

            <h2 id="introduction">1. Introduction</h2>
            <p>DRL NEGOCE SARL, société éditrice de l'application DR PHARMA, s'engage à protéger la vie privée de ses
                utilisateurs.</p>
            <p>La présente Politique de Confidentialité décrit les pratiques relatives à la collecte, l'utilisation et
                la protection des données personnelles.</p>

            <h2 id="collecte">2. Données collectées</h2>
            <p>Dans le cadre de l'utilisation de l'application, les données suivantes peuvent être collectées :</p>
            <ul>
                <li>Nom et prénom</li>
                <li>Numéro de téléphone</li>
                <li>Adresse email</li>
                <li>Adresse de livraison</li>
                <li>Données de localisation (géolocalisation)</li>
                <li>Historique des commandes</li>
                <li>Informations de paiement</li>
            </ul>

            <h2 id="utilisation">3. Utilisation des données</h2>
            <p>Les données sont utilisées pour les finalités suivantes :</p>
            <ul>
                <li>Gestion des commandes et des livraisons</li>
                <li>Communication avec l'utilisateur (suivi de commande, notifications)</li>
                <li>Amélioration des services de l'application</li>
                <li>Prévention de la fraude et sécurité du service</li>
            </ul>

            <h2 id="partage">4. Partage des données</h2>
            <p>Les données personnelles peuvent être partagées avec :</p>
            <ul>
                <li>Les pharmacies partenaires (pour la préparation des commandes)</li>
                <li>Les livreurs partenaires (pour la gestion de la livraison)</li>
                <li>Les prestataires techniques (hébergement, services de paiement)</li>
            </ul>
            <p>Aucune donnée personnelle n'est vendue à des tiers à des fins commerciales.</p>

            <h2 id="stockage">5. Stockage et sécurité</h2>
            <p>DRL NEGOCE SARL met en œuvre les mesures techniques et organisationnelles appropriées pour garantir la
                sécurité et la confidentialité des données collectées.</p>
            <p>Les données sont hébergées sur des serveurs sécurisés et accessibles uniquement au personnel autorisé.
            </p>

            <h2 id="droits">6. Droits des utilisateurs</h2>
            <p>Conformément à la réglementation applicable, chaque utilisateur dispose des droits suivants :</p>
            <ul>
                <li>Droit d'accès à ses données personnelles</li>
                <li>Droit de rectification en cas d'erreur</li>
                <li>Droit de suppression de son compte et de ses données</li>
                <li>Droit d'opposition au traitement de ses données</li>
            </ul>
            <p>Pour exercer ces droits, l'utilisateur peut contacter DRL NEGOCE SARL à l'adresse ci-dessous.</p>
            <p>L'utilisateur peut également saisir l'ARTCI (Autorité de Régulation des Télécommunications/TIC de Côte
                d'Ivoire) en cas de litige relatif à la gestion de ses données personnelles.</p>

            <h2 id="cookies">7. Cookies et technologies similaires</h2>
            <p>L'application peut utiliser des cookies ou technologies similaires pour :</p>
            <ul>
                <li>améliorer l'expérience utilisateur,</li>
                <li>mesurer l'audience,</li>
                <li>proposer un service personnalisé.</li>
            </ul>
            <p>L'utilisateur peut gérer ses préférences depuis les paramètres de son appareil.</p>

            <h2 id="modification">8. Modification de la politique</h2>
            <p>DRL NEGOCE SARL se réserve le droit de modifier la présente Politique de Confidentialité à tout moment.
            </p>
            <p>Les utilisateurs seront informés de toute mise à jour via l'application.</p>

            <h2 id="contact">9. Contact</h2>
            <p>Pour toute question relative à la protection de vos données personnelles, vous pouvez nous contacter :
            </p>
            <div class="info-card">
                <p><strong>Adresse :</strong> COCODY ANGRE terminus 81/82, en face de la banque UBA</p>
                <p><strong>Email :</strong> <a href="mailto:contact@drlpharma.com">contact@drlpharma.com</a></p>
            </div>

        </div>
    </section>

    <footer class="footer-mini">
        <div class="container">© {{ date('Y') }} DR PHARMA — DRL NEGOCE SARL. Tous droits réservés.</div>
    </footer>
</body>

</html>
