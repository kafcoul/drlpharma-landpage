<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Centre d'aide DR-PHARMA — Trouvez des réponses à vos questions.">
    <title>Centre d'aide — DR-PHARMA</title>
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
            --brand-400: #34d399; --brand-500: #10b981; --brand-600: #059669; --brand-700: #047857; --brand-800: #065f46; --brand-900: #064e3b;
            --gray-50: #f9fafb; --gray-100: #f3f4f6; --gray-200: #e5e7eb; --gray-400: #9ca3af; --gray-500: #6b7280; --gray-600: #4b5563; --gray-700: #374151; --gray-800: #1f2937; --gray-900: #111827;
        }
        .container { width: 100%; max-width: 900px; margin: 0 auto; padding: 0 20px; }

        /* Navbar */
        .navbar { background: #fff; border-bottom: 1px solid var(--gray-200); padding: 0; position: sticky; top: 0; z-index: 50; }
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

        /* Content */
        .content { padding: 64px 0 96px; }

        /* Search */
        .search-box { max-width: 500px; margin: 32px auto 48px; position: relative; }
        .search-box input { width: 100%; padding: 16px 20px 16px 48px; border: 2px solid var(--gray-200); border-radius: 16px; font-size: 16px; font-family: inherit; outline: none; transition: border-color .2s; }
        .search-box input:focus { border-color: var(--brand-500); }
        .search-box svg { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; color: var(--gray-400); }

        /* FAQ */
        .faq-section { margin-bottom: 48px; }
        .faq-section h2 { font-size: 22px; font-weight: 700; color: var(--gray-900); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid var(--brand-100); }
        .faq-item { background: var(--gray-50); border-radius: 16px; margin-bottom: 12px; overflow: hidden; border: 1px solid var(--gray-100); }
        .faq-q { width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 20px 24px; font-weight: 600; font-size: 16px; color: var(--gray-800); cursor: pointer; background: none; border: none; font-family: inherit; text-align: left; }
        .faq-q:hover { background: var(--brand-50); }
        .faq-q svg { width: 20px; height: 20px; color: var(--gray-400); flex-shrink: 0; transition: transform .3s; }
        .faq-a { max-height: 0; overflow: hidden; padding: 0 24px; color: var(--gray-600); line-height: 1.7; font-size: 15px; transition: max-height .4s ease, padding .4s ease; }
        .faq-a.open { max-height: 300px; padding: 0 24px 20px; }

        /* Contact card */
        .help-contact { background: var(--brand-900); color: #fff; border-radius: 20px; padding: 40px; text-align: center; margin-top: 48px; }
        .help-contact h3 { font-size: 22px; font-weight: 700; margin-bottom: 8px; }
        .help-contact p { color: var(--brand-200); margin-bottom: 24px; }
        .help-contact a { display: inline-flex; align-items: center; gap: 8px; background: var(--brand-600); color: #fff; padding: 14px 28px; border-radius: 16px; font-weight: 700; font-size: 15px; transition: background .2s; }
        .help-contact a:hover { background: var(--brand-700); }

        /* Footer mini */
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
            <h1>Centre d'aide</h1>
            <p>Trouvez rapidement des réponses à vos questions sur DR-PHARMA.</p>
        </div>
    </section>

    <section class="content">
        <div class="container">

            <div class="search-box">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="M21 21l-4.35-4.35"/></svg>
                <input type="text" id="search" placeholder="Rechercher une question…" oninput="filterFAQ(this.value)">
            </div>

            <div class="faq-section" data-section>
                <h2>🛒 Commandes & Livraisons</h2>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Comment passer une commande ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Téléchargez l'application DR-PHARMA Patient, créez un compte puis recherchez votre médicament par nom ou envoyez une photo de votre ordonnance. Ajoutez au panier, choisissez votre mode de paiement et validez.</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Quel est le délai de livraison ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">En moyenne, votre commande est livrée en moins de 45 minutes dans les zones couvertes d'Abidjan. Le temps peut varier selon la distance et la disponibilité des coursiers.</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Comment suivre ma livraison ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Une fois votre commande confirmée, vous pouvez suivre votre coursier en temps réel sur la carte directement dans l'application.</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Puis-je annuler une commande ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Oui, tant que la pharmacie n'a pas encore préparé votre commande. Rendez-vous dans "Mes commandes" et appuyez sur "Annuler".</div>
                </div>
            </div>

            <div class="faq-section" data-section>
                <h2>💳 Paiements</h2>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Quels moyens de paiement sont acceptés ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Nous acceptons Orange Money, MTN Mobile Money, Moov Money, Wave, les cartes bancaires (Visa/Mastercard) et le paiement à la livraison (cash).</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Mon paiement a échoué, que faire ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Vérifiez que votre solde est suffisant et que vous avez une bonne connexion internet. Si le problème persiste, essayez un autre moyen de paiement ou contactez notre support.</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Comment obtenir un remboursement ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">En cas de problème avec votre commande, contactez notre support. Les remboursements sont traités sous 24 à 48 heures sur votre moyen de paiement d'origine.</div>
                </div>
            </div>

            <div class="faq-section" data-section>
                <h2>👤 Compte & Sécurité</h2>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Comment créer un compte ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Téléchargez l'application, appuyez sur "S'inscrire" et suivez les étapes. Vous aurez besoin d'un numéro de téléphone valide pour la vérification par OTP.</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">J'ai oublié mon mot de passe, comment le réinitialiser ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Sur l'écran de connexion, appuyez sur "Mot de passe oublié ?" et suivez les instructions pour recevoir un code de réinitialisation par SMS.</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Mes données sont-elles sécurisées ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Oui. Toutes les communications sont chiffrées (HTTPS/TLS). Vos données personnelles et médicales sont protégées conformément à notre politique de confidentialité.</div>
                </div>
            </div>

            <div class="faq-section" data-section>
                <h2>💊 Pharmaciens & Coursiers</h2>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Comment devenir pharmacie partenaire ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Contactez-nous via le formulaire de contact ou par email. Un membre de notre équipe vous accompagnera dans l'inscription et la configuration de votre officine sur la plateforme.</div>
                </div>
                <div class="faq-item" data-faq>
                    <button class="faq-q" onclick="toggleFaq(this)">Comment devenir coursier DR-PHARMA ? <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg></button>
                    <div class="faq-a">Téléchargez l'application DR-PHARMA Coursier et complétez votre inscription avec vos documents (CNI, permis). Votre candidature sera examinée sous 48h.</div>
                </div>
            </div>

            <div class="help-contact">
                <h3>Besoin d'aide supplémentaire ?</h3>
                <p>Notre équipe support est disponible pour vous aider.</p>
                <a href="/contact">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Contactez-nous
                </a>
            </div>

        </div>
    </section>

    <footer class="footer-mini">
        <div class="container">© {{ date('Y') }} DR-PHARMA. Tous droits réservés.</div>
    </footer>

    <script>
        function toggleFaq(btn) {
            var answer = btn.nextElementSibling;
            var chevron = btn.querySelector('svg');
            var isOpen = answer.classList.contains('open');
            document.querySelectorAll('.faq-a').forEach(function(a) { a.classList.remove('open'); });
            document.querySelectorAll('.faq-q svg').forEach(function(c) { c.style.transform = ''; });
            if (!isOpen) { answer.classList.add('open'); chevron.style.transform = 'rotate(180deg)'; }
        }
        function filterFAQ(query) {
            var q = query.toLowerCase();
            document.querySelectorAll('[data-faq]').forEach(function(item) {
                var text = item.textContent.toLowerCase();
                item.style.display = text.includes(q) ? '' : 'none';
            });
            document.querySelectorAll('[data-section]').forEach(function(section) {
                var visible = section.querySelectorAll('[data-faq]:not([style*="display: none"])');
                section.style.display = visible.length ? '' : 'none';
            });
        }
    </script>
</body>
</html>
