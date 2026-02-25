@extends('layouts.page')

@section('title', 'Contact — DR PHARMA')
@section('meta_description', 'Contactez l\'équipe DR PHARMA. Une question, un partenariat ou besoin d\'aide ? Nous vous répondons rapidement.')
@section('nav_contact', 'active')

@section('styles')
        .content { padding: 64px 0 96px; }
        .content .container { max-width: 900px; }

        .contact-cards {
            display: grid; grid-template-columns: 1fr; gap: 20px; margin-bottom: 48px;
        }
        @media(min-width:768px) { .contact-cards { grid-template-columns: repeat(3, 1fr); } }

        .contact-card {
            background: #fff; border: 1px solid var(--gray-100);
            border-radius: 20px; padding: 32px 24px; text-align: center;
            transition: box-shadow .3s, transform .3s;
        }
        .contact-card:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,.08); transform: translateY(-4px);
        }
        .contact-icon {
            width: 56px; height: 56px; background: var(--brand-50);
            border-radius: 16px; display: flex; align-items: center;
            justify-content: center; margin: 0 auto 16px;
        }
        .contact-icon svg { width: 24px; height: 24px; color: var(--brand-600); }
        .contact-card h3 { font-size: 16px; font-weight: 700; color: var(--gray-900); margin-bottom: 4px; }
        .contact-card p { font-size: 13px; color: var(--gray-400); margin-bottom: 8px; }
        .card-link {
            display: block; font-size: 15px; font-weight: 600;
            color: var(--brand-600); transition: color .2s; margin-top: 4px;
        }
        .card-link:hover { color: var(--brand-700); }

        .form-section {
            background: var(--gray-50); border-radius: 24px; padding: 48px 32px;
        }
        .form-section h2 {
            font-size: 24px; font-weight: 800; color: var(--gray-900);
            margin-bottom: 8px; text-align: center;
        }
        .form-section > p {
            text-align: center; color: var(--gray-500);
            font-size: 15px; margin-bottom: 32px;
        }
        .form-grid {
            display: grid; grid-template-columns: 1fr; gap: 20px;
        }
        @media(min-width:640px) { .form-grid { grid-template-columns: 1fr 1fr; } }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group label {
            font-size: 13px; font-weight: 600; color: var(--gray-700);
        }
        .form-group input, .form-group select, .form-group textarea {
            padding: 12px 16px; border: 2px solid var(--gray-200);
            border-radius: 12px; font-family: inherit; font-size: 15px;
            color: var(--gray-800); background: #fff; transition: border-color .2s;
            outline: none;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: var(--brand-500);
        }
        .form-group textarea { min-height: 120px; resize: vertical; }
        .form-submit { grid-column: 1 / -1; text-align: center; padding-top: 8px; }
        .btn-submit {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 36px; background: var(--brand-600); color: #fff;
            border: none; border-radius: 14px; font-size: 16px; font-weight: 700;
            font-family: inherit; cursor: pointer; transition: background .2s, transform .2s;
        }
        .btn-submit:hover { background: var(--brand-700); transform: translateY(-2px); }
        .btn-submit svg { width: 18px; height: 18px; }

        .form-success {
            display: none; text-align: center; padding: 48px 24px;
        }
        .form-success.show { display: block; }
        .check-icon {
            width: 64px; height: 64px; background: var(--brand-100);
            border-radius: 50%; display: flex; align-items: center;
            justify-content: center; margin: 0 auto 16px;
        }
        .check-icon svg { width: 32px; height: 32px; color: var(--brand-600); }
        .form-success h3 {
            font-size: 20px; font-weight: 800; color: var(--gray-900); margin-bottom: 8px;
        }
        .form-success p { color: var(--gray-500); }
@endsection

@section('content')
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3>Email</h3>
                    <p>Réponse sous 24h</p>
                    <a href="mailto:contact@drlpharma.com" class="card-link">contact@drlpharma.com</a>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3>Adresse</h3>
                    <p>Siège social</p>
                    <span class="card-link" style="cursor:default;">Abidjan, Côte d'Ivoire</span>
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
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
@endsection

@section('scripts')
    <script>
        function submitForm(e) {
            e.preventDefault();
            document.getElementById('contactForm').style.display = 'none';
            document.getElementById('formSuccess').classList.add('show');
            return false;
        }
    </script>
@endsection
