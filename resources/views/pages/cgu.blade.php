<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conditions Générales d'Utilisation DR-PHARMA.">
    <title>Conditions Générales d'Utilisation — DR-PHARMA</title>
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

        /* TOC */
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
            <h1>Conditions Générales d'Utilisation</h1>
            <p>Les règles qui régissent l'utilisation de la plateforme DR-PHARMA.</p>
            <div class="date">Dernière mise à jour : {{ date('d/m/Y') }}</div>
        </div>
    </section>

    <section class="legal-content">
        <div class="container">

            <div class="toc">
                <h4>Sommaire</h4>
                <ol>
                    <li><a href="#objet">Objet</a></li>
                    <li><a href="#definitions">Définitions</a></li>
                    <li><a href="#inscription">Inscription et compte</a></li>
                    <li><a href="#services">Services proposés</a></li>
                    <li><a href="#commandes">Commandes et livraisons</a></li>
                    <li><a href="#paiements">Paiements</a></li>
                    <li><a href="#obligations">Obligations de l'utilisateur</a></li>
                    <li><a href="#responsabilite">Responsabilité</a></li>
                    <li><a href="#propriete">Propriété intellectuelle</a></li>
                    <li><a href="#resiliation">Résiliation</a></li>
                    <li><a href="#litiges">Litiges</a></li>
                    <li><a href="#cgu-contact">Contact</a></li>
                </ol>
            </div>

            <h2 id="objet">1. Objet</h2>
            <p>Les présentes Conditions Générales d'Utilisation (ci-après « CGU ») ont pour objet de définir les modalités et conditions dans lesquelles la société DR-PHARMA met à disposition ses services via ses applications mobiles (Patient, Pharmacien, Coursier) et son site web <a href="https://drlpharma.com">drlpharma.com</a>.</p>
            <p>L'utilisation de la plateforme implique l'acceptation pleine et entière des présentes CGU.</p>

            <h2 id="definitions">2. Définitions</h2>
            <ul>
                <li><strong>Plateforme</strong> — l'ensemble des applications mobiles et du site web DR-PHARMA</li>
                <li><strong>Utilisateur / Patient</strong> — toute personne physique utilisant l'application Patient pour commander des médicaments</li>
                <li><strong>Pharmacie partenaire</strong> — officine de pharmacie inscrite et validée sur la plateforme</li>
                <li><strong>Coursier</strong> — livreur indépendant inscrit et validé sur la plateforme</li>
                <li><strong>Commande</strong> — demande d'achat de médicaments passée par un utilisateur via l'application</li>
            </ul>

            <h2 id="inscription">3. Inscription et compte</h2>
            <h3>3.1 Conditions d'inscription</h3>
            <p>L'inscription est ouverte à toute personne physique majeure (18 ans) résidant en Côte d'Ivoire. L'utilisateur s'engage à fournir des informations exactes et à jour.</p>
            <h3>3.2 Vérification</h3>
            <p>Un numéro de téléphone valide est requis pour la vérification par code OTP. DR-PHARMA se réserve le droit de demander des justificatifs d'identité complémentaires.</p>
            <h3>3.3 Sécurité du compte</h3>
            <p>L'utilisateur est responsable de la confidentialité de ses identifiants. Toute activité réalisée depuis son compte est réputée effectuée par lui. En cas d'utilisation non autorisée, l'utilisateur doit contacter immédiatement notre support.</p>

            <h2 id="services">4. Services proposés</h2>
            <p>DR-PHARMA propose une plateforme de mise en relation entre :</p>
            <ul>
                <li>Les <strong>patients</strong> souhaitant commander des médicaments</li>
                <li>Les <strong>pharmacies partenaires</strong> détenant les médicaments</li>
                <li>Les <strong>coursiers</strong> assurant la livraison</li>
            </ul>
            <p>DR-PHARMA agit en tant qu'intermédiaire technologique. Les médicaments sont vendus et délivrés par les pharmacies partenaires, sous leur responsabilité pharmaceutique.</p>

            <h2 id="commandes">5. Commandes et livraisons</h2>
            <h3>5.1 Passation de commande</h3>
            <p>L'utilisateur peut commander des médicaments en les recherchant par nom ou en envoyant une photo de son ordonnance. Certains médicaments nécessitent obligatoirement une ordonnance valide.</p>
            <h3>5.2 Confirmation</h3>
            <p>La commande est confirmée une fois acceptée par la pharmacie partenaire et le paiement validé. L'utilisateur reçoit une confirmation par notification.</p>
            <h3>5.3 Livraison</h3>
            <p>La livraison est effectuée par un coursier indépendant. Le délai estimé est de 45 minutes en moyenne mais peut varier selon les conditions. DR-PHARMA ne peut garantir un délai exact.</p>
            <h3>5.4 Annulation</h3>
            <p>L'annulation est possible tant que la pharmacie n'a pas commencé la préparation de la commande. Au-delà, des frais d'annulation peuvent s'appliquer.</p>

            <h2 id="paiements">6. Paiements</h2>
            <h3>6.1 Moyens de paiement</h3>
            <p>Les moyens de paiement acceptés sont : Orange Money, MTN Mobile Money, Moov Money, Wave, cartes bancaires (Visa/Mastercard) et paiement à la livraison.</p>
            <h3>6.2 Prix</h3>
            <p>Les prix des médicaments sont fixés par les pharmacies partenaires conformément à la réglementation en vigueur. Des frais de livraison et de service peuvent s'appliquer et sont clairement affichés avant validation de la commande.</p>
            <h3>6.3 Remboursements</h3>
            <p>En cas de problème avéré (produit non conforme, erreur de commande), un remboursement peut être effectué sous 24 à 48 heures après validation par notre service client.</p>

            <h2 id="obligations">7. Obligations de l'utilisateur</h2>
            <p>L'utilisateur s'engage à :</p>
            <ul>
                <li>Utiliser la plateforme de manière loyale et conforme à son objet</li>
                <li>Fournir des informations exactes, notamment l'adresse de livraison</li>
                <li>Ne pas envoyer de fausses ordonnances</li>
                <li>Ne pas utiliser la plateforme à des fins illégales</li>
                <li>Respecter les coursiers et le personnel des pharmacies</li>
                <li>Être disponible pour réceptionner sa commande à l'adresse indiquée</li>
            </ul>

            <h2 id="responsabilite">8. Responsabilité</h2>
            <p>DR-PHARMA s'efforce d'assurer le bon fonctionnement de la plateforme mais ne peut être tenu responsable :</p>
            <ul>
                <li>Des interruptions temporaires de service (maintenance, panne)</li>
                <li>De l'indisponibilité d'un médicament en pharmacie</li>
                <li>Des retards de livraison liés à des circonstances extérieures (trafic, météo)</li>
                <li>De l'utilisation inappropriée de médicaments par l'utilisateur</li>
            </ul>
            <p>La responsabilité pharmaceutique (conformité des médicaments, conseil) incombe aux pharmacies partenaires.</p>

            <h2 id="propriete">9. Propriété intellectuelle</h2>
            <p>L'ensemble des éléments de la plateforme (design, logo, code, contenu) est la propriété exclusive de DR-PHARMA et est protégé par le droit de la propriété intellectuelle. Toute reproduction ou utilisation non autorisée est interdite.</p>

            <h2 id="resiliation">10. Résiliation</h2>
            <p>L'utilisateur peut supprimer son compte à tout moment depuis l'application ou en contactant le support. DR-PHARMA se réserve le droit de suspendre ou supprimer un compte en cas de violation des présentes CGU, sans préavis ni indemnité.</p>

            <h2 id="litiges">11. Litiges</h2>
            <p>Les présentes CGU sont régies par le droit ivoirien. En cas de litige, les parties s'engagent à rechercher une solution amiable. À défaut, les tribunaux d'Abidjan seront seuls compétents.</p>

            <h2 id="cgu-contact">12. Contact</h2>
            <p>Pour toute question relative aux présentes CGU :</p>
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
