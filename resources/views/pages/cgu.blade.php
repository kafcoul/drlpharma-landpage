<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conditions Générales d'Utilisation de l'application DR PHARMA — DRL NEGOCE SARL.">
    <title>Conditions Générales d'Utilisation — DR PHARMA</title>
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
            <h1>Conditions Générales d'Utilisation</h1>
            <p>Application DR PHARMA</p>
        </div>
    </section>

    <section class="legal-content">
        <div class="container">

            <div class="toc">
                <h4>Sommaire</h4>
                <ol>
                    <li><a href="#informations">Informations légales</a></li>
                    <li><a href="#objet">Objet de l'application</a></li>
                    <li><a href="#acceptation">Acceptation des conditions</a></li>
                    <li><a href="#acces">Conditions d'accès</a></li>
                    <li><a href="#compte">Création et gestion du compte</a></li>
                    <li><a href="#commande">Commande de médicaments</a></li>
                    <li><a href="#livraison">Livraison</a></li>
                    <li><a href="#prix">Prix et paiement</a></li>
                    <li><a href="#responsabilites">Responsabilités et avertissement médical</a></li>
                    <li><a href="#suspension">Suspension ou suppression de compte</a></li>
                    <li><a href="#disponibilite">Disponibilité du service</a></li>
                    <li><a href="#modification">Modification des conditions</a></li>
                    <li><a href="#droit">Droit applicable et juridiction</a></li>
                </ol>
            </div>

            <h2 id="informations">1. Informations légales</h2>
            <p>L'application DR PHARMA est éditée par :</p>
            <div class="info-card">
                <p><strong>Raison sociale :</strong> DRL NEGOCE SARL</p>
                <p><strong>Forme juridique :</strong> Société à Responsabilité Limitée (SARL)</p>
                <p><strong>RCCM :</strong> CI-ABJ-03-2018-B13-33505</p>
                <p><strong>Siège social :</strong> Abidjan, Koumassi Remblais – République de Côte d'Ivoire</p>
                <p><strong>Email de contact :</strong> <a href="mailto:contact@drlpharma.com">contact@drlpharma.com</a>
                </p>
            </div>

            <h2 id="objet">2. Objet de l'application</h2>
            <p>DR PHARMA est une application mobile permettant aux utilisateurs de :</p>
            <ul>
                <li>commander des médicaments depuis leur domicile,</li>
                <li>auprès de pharmacies partenaires légalement agréées à Abidjan,</li>
                <li>et de se faire livrer par des livreurs partenaires.</li>
            </ul>
            <p>DRL NEGOCE SARL agit exclusivement en tant qu'intermédiaire technologique et ne vend pas directement de
                médicaments.</p>

            <h2 id="acceptation">3. Acceptation des conditions</h2>
            <p>Toute utilisation de l'application implique l'acceptation pleine et entière des présentes Conditions
                Générales d'Utilisation.</p>
            <p>En cas de désaccord, l'utilisateur doit cesser immédiatement l'utilisation de l'application.</p>

            <h2 id="acces">4. Conditions d'accès</h2>
            <p>L'application est accessible :</p>
            <ul>
                <li>aux personnes âgées d'au moins 18 ans,</li>
                <li>disposant de la capacité juridique,</li>
                <li>résidant en République de Côte d'Ivoire.</li>
            </ul>
            <p>La création d'un compte utilisateur est nécessaire pour accéder aux services.</p>

            <h2 id="compte">5. Création et gestion du compte</h2>
            <p>L'utilisateur s'engage à :</p>
            <ul>
                <li>fournir des informations exactes, complètes et à jour,</li>
                <li>préserver la confidentialité de ses identifiants,</li>
                <li>informer DR PHARMA de toute utilisation non autorisée.</li>
            </ul>
            <p>L'utilisateur est seul responsable de l'utilisation de son compte.</p>

            <h2 id="commande">6. Commande de médicaments</h2>
            <ul>
                <li>Les médicaments proposés proviennent exclusivement de pharmacies partenaires agréées.</li>
                <li>Certains médicaments sont délivrés uniquement sur présentation d'une ordonnance médicale valide.
                </li>
                <li>DRL NEGOCE SARL se réserve le droit de refuser toute commande non conforme à la réglementation
                    pharmaceutique en vigueur.</li>
            </ul>

            <h2 id="livraison">7. Livraison</h2>
            <ul>
                <li>La livraison est assurée par des livreurs partenaires indépendants.</li>
                <li>Les délais indiqués sont estimatifs et peuvent varier selon la disponibilité, la circulation ou des
                    cas de force majeure.</li>
                <li>DRL NEGOCE SARL ne peut être tenue responsable des retards indépendants de sa volonté.</li>
            </ul>

            <h2 id="prix">8. Prix et paiement</h2>
            <ul>
                <li>Les prix des médicaments sont fixés par les pharmacies partenaires.</li>
                <li>Les frais de livraison sont clairement indiqués avant validation de la commande.</li>
                <li>Le paiement est effectué via les moyens proposés sur l'application.</li>
            </ul>

            <h2 id="responsabilites">9. Responsabilités et avertissement médical</h2>
            <ul>
                <li>DR PHARMA ne fournit aucun conseil médical.</li>
                <li>DRL NEGOCE SARL ne peut être tenue responsable d'une mauvaise utilisation des médicaments ou de
                    l'automédication.</li>
                <li>L'utilisateur est invité à consulter un professionnel de santé avant toute prise de médicament.</li>
            </ul>

            <h2 id="suspension">10. Suspension ou suppression de compte</h2>
            <p>DRL NEGOCE SARL se réserve le droit de suspendre ou supprimer un compte en cas :</p>
            <ul>
                <li>de violation des présentes CGU,</li>
                <li>de fraude ou tentative de fraude,</li>
                <li>de comportement contraire aux lois en vigueur.</li>
            </ul>

            <h2 id="disponibilite">11. Disponibilité du service</h2>
            <p>DR PHARMA peut être temporairement indisponible pour maintenance, mise à jour ou en cas de problème
                technique.</p>
            <p>Aucune indemnisation ne pourra être exigée à ce titre.</p>

            <h2 id="modification">12. Modification des conditions</h2>
            <p>DRL NEGOCE SARL se réserve le droit de modifier les présentes CGU à tout moment.</p>
            <p>Les utilisateurs seront informés via l'application.</p>

            <h2 id="droit">13. Droit applicable et juridiction</h2>
            <p>Les présentes CGU sont régies par les lois en vigueur en République de Côte d'Ivoire.</p>
            <p>Tout litige relève des juridictions compétentes ivoiriennes.</p>

        </div>
    </section>

    <footer class="footer-mini">
        <div class="container">© {{ date('Y') }} DR PHARMA — DRL NEGOCE SARL. Tous droits réservés.</div>
    </footer>
</body>

</html>
