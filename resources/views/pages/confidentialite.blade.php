<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Politique de confidentialité DR-PHARMA — Protection de vos données personnelles.">
    <title>Politique de confidentialité — DR-PHARMA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif; color: #1f2937; background: #fff; line-height: 1.6; -webkit-font-smoothing: antialiased; }
        a { text-decoration: none; color: inherit; }
        :root {
            --brand-50: #ecfdf5; --brand-100: #d1fae5; --brand-200: #a7f3d0;
            --brand-500: #10b981; --brand-600: #059669; --brand-700: #047857; --brand-900: #064e3b;
            --gray-50: #f9fafb; --gray-100: #f3f4f6; --gray-200: #e5e7eb; --gray-400: #9ca3af; --gray-500: #6b7280; --gray-600: #4b5563; --gray-700: #374151; --gray-800: #1f2937; --gray-900: #111827;
        }
        .container { width: 100%; max-width: 800px; margin: 0 auto; padding: 0 20px; }

        /* Navbar */
        .navbar { background: #fff; border-bottom: 1px solid var(--gray-200); position: sticky; top: 0; z-index: 50; }
        .navbar-inner { display: flex; align-items: center; justify-content: space-between; height: 72px; max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .navbar-logo { display: flex; align-items: center; gap: 12px; }
        .navbar-logo-icon { width: 40px; height: 40px; background: var(--brand-600); border-radius: 12px; display: flex; align-items: center; justify-content: center; }
        .navbar-logo-icon svg { width: 22px; height: 22px; color: #fff; }
        .navbar-brand { font-size: 18px; font-weight: 800; }
        .navbar-brand span:first-child { color: var(--brand-700); }
        .navbar-brand span:last-child { color: var(--gray-700); }
        .back-link { font-size: 14px; font-weight: 600; color: var(--brand-600); display: flex; align-items: center; gap: 6px; }
        .back-link:hover { color: var(--brand-700); }
        .back-link svg { width: 16px; height: 16px; }

        /* Hero */
        .page-hero { background: linear-gradient(135deg, var(--brand-50), var(--brand-100)); padding: 64px 0 48px; text-align: center; }
        .page-hero h1 { font-size: clamp(28px, 5vw, 42px); font-weight: 900; color: var(--gray-900); margin-bottom: 12px; }
        .page-hero p { font-size: 18px; color: var(--gray-500); max-width: 560px; margin: 0 auto; }
        .page-hero .date { font-size: 14px; color: var(--gray-400); margin-top: 12px; }

        /* Content */
        .legal-content { padding: 64px 0 96px; }
        .legal-content h2 { font-size: 22px; font-weight: 800; color: var(--gray-900); margin: 40px 0 16px; padding-bottom: 8px; border-bottom: 2px solid var(--brand-100); }
        .legal-content h2:first-child { margin-top: 0; }
        .legal-content h3 { font-size: 17px; font-weight: 700; color: var(--gray-800); margin: 24px 0 8px; }
        .legal-content p { color: var(--gray-600); margin-bottom: 16px; line-height: 1.8; font-size: 15px; }
        .legal-content ul { margin: 8px 0 16px 24px; list-style: disc; }
        .legal-content ul li { color: var(--gray-600); margin-bottom: 6px; font-size: 15px; line-height: 1.7; }
        .legal-content a { color: var(--brand-600); font-weight: 600; }
        .legal-content a:hover { text-decoration: underline; }

        /* Sidebar TOC */
        .toc { background: var(--gray-50); border: 1px solid var(--gray-100); border-radius: 16px; padding: 24px; margin-bottom: 40px; }
        .toc h4 { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: var(--gray-400); margin-bottom: 12px; }
        .toc ol { list-style: decimal; margin-left: 20px; }
        .toc li { margin-bottom: 6px; }
        .toc a { font-size: 14px; color: var(--brand-600); font-weight: 500; }
        .toc a:hover { text-decoration: underline; }

        /* Footer */
        .footer-mini { text-align: center; padding: 32px 0; border-top: 1px solid var(--gray-100); font-size: 13px; color: var(--gray-400); }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <a href="/" class="navbar-logo">
                <div class="navbar-logo-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M12 9v6"/><circle cx="12" cy="12" r="8" stroke-linecap="round"/></svg>
                </div>
                <div class="navbar-brand"><span>DR-</span><span>PHARMA</span></div>
            </a>
            <a href="/" class="back-link">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Retour
            </a>
        </div>
    </nav>

    <section class="page-hero">
        <div class="container">
            <h1>Politique de confidentialité</h1>
            <p>Comment nous protégeons et utilisons vos données personnelles.</p>
            <div class="date">Dernière mise à jour : {{ date('d/m/Y') }}</div>
        </div>
    </section>

    <section class="legal-content">
        <div class="container">

            <div class="toc">
                <h4>Sommaire</h4>
                <ol>
                    <li><a href="#collecte">Données collectées</a></li>
                    <li><a href="#utilisation">Utilisation des données</a></li>
                    <li><a href="#partage">Partage des données</a></li>
                    <li><a href="#securite">Sécurité</a></li>
                    <li><a href="#conservation">Durée de conservation</a></li>
                    <li><a href="#droits">Vos droits</a></li>
                    <li><a href="#cookies">Cookies</a></li>
                    <li><a href="#modifications">Modifications</a></li>
                    <li><a href="#contact-section">Contact</a></li>
                </ol>
            </div>

            <h2 id="collecte">1. Données collectées</h2>
            <p>Dans le cadre de l'utilisation de la plateforme DR-PHARMA (applications mobiles et site web), nous collectons les données suivantes :</p>
            <h3>Données d'identité</h3>
            <ul>
                <li>Nom et prénom</li>
                <li>Numéro de téléphone</li>
                <li>Adresse email</li>
                <li>Photo de profil (optionnelle)</li>
            </ul>
            <h3>Données de localisation</h3>
            <ul>
                <li>Adresse de livraison</li>
                <li>Géolocalisation en temps réel (uniquement pendant l'utilisation active de l'application, avec votre consentement)</li>
            </ul>
            <h3>Données de santé</h3>
            <ul>
                <li>Photos d'ordonnances médicales envoyées via l'application</li>
                <li>Historique des commandes de médicaments</li>
            </ul>
            <h3>Données de paiement</h3>
            <ul>
                <li>Numéro de téléphone Mobile Money</li>
                <li>Historique des transactions (montants, dates)</li>
            </ul>
            <p>Nous ne conservons jamais vos données de carte bancaire complètes. Celles-ci sont traitées par nos prestataires de paiement certifiés (CinetPay).</p>

            <h2 id="utilisation">2. Utilisation des données</h2>
            <p>Vos données personnelles sont utilisées pour :</p>
            <ul>
                <li>Créer et gérer votre compte utilisateur</li>
                <li>Traiter et livrer vos commandes de médicaments</li>
                <li>Permettre le suivi GPS de la livraison</li>
                <li>Traiter les paiements et les remboursements</li>
                <li>Vous envoyer des notifications sur l'état de vos commandes</li>
                <li>Améliorer nos services et l'expérience utilisateur</li>
                <li>Assurer la sécurité de la plateforme</li>
                <li>Répondre à vos demandes de support</li>
            </ul>

            <h2 id="partage">3. Partage des données</h2>
            <p>Nous ne vendons jamais vos données personnelles. Vos informations peuvent être partagées avec :</p>
            <ul>
                <li><strong>Les pharmacies partenaires</strong> — pour le traitement de votre commande (nom, adresse de livraison, ordonnance)</li>
                <li><strong>Les coursiers</strong> — pour la livraison (nom, adresse de livraison, numéro de téléphone)</li>
                <li><strong>Les prestataires de paiement</strong> — pour le traitement sécurisé des transactions</li>
                <li><strong>Les autorités compétentes</strong> — en cas d'obligation légale</li>
            </ul>

            <h2 id="securite">4. Sécurité</h2>
            <p>Nous mettons en œuvre des mesures techniques et organisationnelles pour protéger vos données :</p>
            <ul>
                <li>Chiffrement de toutes les communications (HTTPS/TLS)</li>
                <li>Chiffrement des données sensibles stockées</li>
                <li>Authentification sécurisée avec token et vérification OTP</li>
                <li>Accès restreint aux données personnelles au sein de notre équipe</li>
                <li>Audits de sécurité réguliers</li>
            </ul>

            <h2 id="conservation">5. Durée de conservation</h2>
            <p>Vos données sont conservées pendant la durée de votre utilisation du service, puis :</p>
            <ul>
                <li><strong>Données de compte</strong> — supprimées sous 30 jours après demande de suppression</li>
                <li><strong>Données de commande</strong> — conservées 5 ans (obligation comptable)</li>
                <li><strong>Ordonnances</strong> — supprimées 1 an après la commande</li>
                <li><strong>Données de géolocalisation</strong> — supprimées 30 jours après la livraison</li>
            </ul>

            <h2 id="droits">6. Vos droits</h2>
            <p>Conformément à la loi ivoirienne relative à la protection des données personnelles, vous disposez des droits suivants :</p>
            <ul>
                <li><strong>Droit d'accès</strong> — consulter les données que nous détenons sur vous</li>
                <li><strong>Droit de rectification</strong> — corriger vos informations personnelles</li>
                <li><strong>Droit de suppression</strong> — demander l'effacement de vos données</li>
                <li><strong>Droit d'opposition</strong> — vous opposer à certains traitements</li>
                <li><strong>Droit à la portabilité</strong> — recevoir vos données dans un format standard</li>
            </ul>
            <p>Pour exercer ces droits, contactez-nous à <a href="mailto:contact@drlpharma.com">contact@drlpharma.com</a>.</p>

            <h2 id="cookies">7. Cookies</h2>
            <p>Notre site web utilise des cookies essentiels au fonctionnement du service. Nous n'utilisons pas de cookies publicitaires. Les cookies techniques permettent :</p>
            <ul>
                <li>Le maintien de votre session de navigation</li>
                <li>La mémorisation de vos préférences</li>
                <li>La sécurité du site</li>
            </ul>

            <h2 id="modifications">8. Modifications</h2>
            <p>Nous pouvons mettre à jour cette politique de confidentialité. En cas de modification significative, vous serez informé par notification dans l'application ou par email. La date de dernière mise à jour est indiquée en haut de cette page.</p>

            <h2 id="contact-section">9. Contact</h2>
            <p>Pour toute question relative à la protection de vos données personnelles :</p>
            <ul>
                <li>Email : <a href="mailto:contact@drlpharma.com">contact@drlpharma.com</a></li>
                <li>Téléphone : +225 07 79 00 00 00</li>
                <li>Adresse : Abidjan, Côte d'Ivoire</li>
            </ul>

        </div>
    </section>

    <footer class="footer-mini">
        <div class="container">© {{ date('Y') }} DR-PHARMA. Tous droits réservés.</div>
    </footer>
</body>
</html>
