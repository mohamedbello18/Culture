@extends('layouts.app')

@section('title', 'Contact - Benin Culture')

@push('styles')
    <style>
        /* ===== COMPLETELY NEW CONTACT PAGE DESIGN ===== */
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }

        .contact-page {
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
            min-height: calc(100vh - 180px);
            padding-top: 40px;
            padding-bottom: 80px;
            position: relative;
            overflow: hidden;
        }

        .contact-page::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background: linear-gradient(135deg, rgba(38, 162, 105, 0.05) 0%, transparent 100%);
            z-index: 0;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        /* Hero Section - Redesigned */
        .contact-hero {
            background: linear-gradient(135deg,
            rgba(26, 95, 180, 0.95) 0%,
            rgba(30, 58, 138, 0.9) 100%);
            border-radius: 24px;
            padding: 5rem 4rem;
            margin-bottom: 4rem;
            color: white;
            position: relative;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 20px 50px rgba(26, 95, 180, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 80%, rgba(229, 165, 10, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(38, 162, 105, 0.2) 0%, transparent 50%);
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% {
                transform: scale(1);
                opacity: 0.8;
            }
            50% {
                transform: scale(1.1);
                opacity: 1;
            }
        }

        .contact-icon {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            margin: 0 auto 2.5rem;
            border: 2px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: float 6s ease-in-out infinite;
            color: #ffffff;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }
            50% {
                transform: translateY(-15px) rotate(5deg);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            }
        }

        .contact-hero h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 1.2rem;
            line-height: 1.1;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #ffffff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .contact-hero p {
            font-size: 1.3rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.7;
            font-weight: 400;
            color: #e2e8f0;
        }

        /* Layout principal - New Grid */
        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin-bottom: 4rem;
        }

        /* Section Contact Info - New Design */
        .contact-info {
            background: #ffffff;
            border-radius: 24px;
            padding: 3.5rem;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .contact-info:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .contact-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #1a5fb4, #26a269, #e5a50a);
            border-radius: 24px 24px 0 0;
        }

        .info-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 2.5rem;
            position: relative;
            padding-bottom: 1.2rem;
            letter-spacing: -0.5px;
        }

        .info-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 70px;
            height: 5px;
            background: linear-gradient(90deg, #1a5fb4, #26a269);
            border-radius: 3px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1.8rem;
            margin-bottom: 2.5rem;
            padding-bottom: 2.5rem;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateX(10px);
            border-bottom-color: #1a5fb4;
        }

        .contact-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .contact-icon-item {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(26, 95, 180, 0.25);
            transition: all 0.3s ease;
        }

        .contact-item:hover .contact-icon-item {
            transform: rotate(15deg) scale(1.1);
            background: linear-gradient(135deg, #26a269 0%, #1e7e34 100%);
        }

        .contact-details h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.6rem;
            color: #1a1a2e;
            letter-spacing: -0.3px;
        }

        .contact-details p {
            color: #64748b;
            line-height: 1.7;
            margin: 0;
            font-weight: 400;
        }

        /* Réseaux sociaux - Redesign */
        .social-contact {
            margin-top: 3rem;
            padding-top: 2.5rem;
            border-top: 1px solid #f1f5f9;
        }

        .social-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.8rem;
            color: #1a1a2e;
            letter-spacing: 0.5px;
        }

        .social-links-contact {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
        }

        .social-link-contact {
            width: 55px;
            height: 55px;
            background: #f8fafc;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a5fb4;
            font-size: 1.4rem;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .social-link-contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s;
        }

        .social-link-contact:hover {
            background: #1a5fb4;
            color: white;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 15px 30px rgba(26, 95, 180, 0.3);
            border-color: #1a5fb4;
        }

        .social-link-contact:hover::before {
            left: 100%;
        }

        .social-link-contact:nth-child(2):hover { background: #1da1f2; border-color: #1da1f2; }
        .social-link-contact:nth-child(3):hover { background: #e1306c; border-color: #e1306c; }
        .social-link-contact:nth-child(4):hover { background: #0077b5; border-color: #0077b5; }
        .social-link-contact:nth-child(5):hover { background: #ff0000; border-color: #ff0000; }

        /* Section Formulaire - New Design */
        .contact-form-section {
            background: #ffffff;
            border-radius: 24px;
            padding: 3.5rem;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .contact-form-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .contact-form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #e5a50a, #d48806);
            border-radius: 24px 24px 0 0;
        }

        .form-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 2.5rem;
            position: relative;
            padding-bottom: 1.2rem;
            letter-spacing: -0.5px;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 70px;
            height: 5px;
            background: linear-gradient(90deg, #e5a50a, #d48806);
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: #1a1a2e;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .form-control {
            width: 100%;
            padding: 1.2rem 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            font-size: 1rem;
            background: #f8fafc;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            color: #1a1a2e;
        }

        .form-control:focus {
            border-color: #1a5fb4;
            box-shadow: 0 0 0 4px rgba(26, 95, 180, 0.15);
            background: #ffffff;
            outline: none;
            transform: translateY(-2px);
        }

        textarea.form-control {
            min-height: 180px;
            resize: vertical;
            line-height: 1.6;
        }

        .btn-submit {
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%);
            color: white;
            border: none;
            padding: 1.3rem 3rem;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            margin-top: 1rem;
            box-shadow: 0 8px 25px rgba(26, 95, 180, 0.25);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-submit:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(26, 95, 180, 0.35);
            background: linear-gradient(135deg, #1e3a8a 0%, #1a5fb4 100%);
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Map Section - Redesigned */
        .map-section {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 4rem;
            border: 1px solid #e2e8f0;
            transition: all 0.4s ease;
        }

        .map-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .map-header {
            background: linear-gradient(135deg, #26a269 0%, #1e7e34 100%);
            color: white;
            padding: 1.8rem 2.5rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .map-header h3 {
            margin: 0;
            font-weight: 800;
            font-family: 'Montserrat', sans-serif;
            font-size: 1.4rem;
            letter-spacing: 0.5px;
        }

        .map-header i {
            font-size: 1.8rem;
            color: rgba(255, 255, 255, 0.9);
        }

        #contactMap {
            width: 100%;
            height: 450px;
            background: #f8fafc;
        }

        /* FAQ Section - Redesigned */
        .faq-section {
            background: #ffffff;
            border-radius: 24px;
            padding: 3.5rem;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            transition: all 0.4s ease;
        }

        .faq-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .faq-item {
            margin-bottom: 1.8rem;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 1.8rem;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-bottom-color: #1a5fb4;
        }

        .faq-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .faq-question {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 1rem 1.2rem;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid transparent;
        }

        .faq-question:hover {
            color: #1a5fb4;
            background: rgba(26, 95, 180, 0.05);
            border-color: #e2e8f0;
            transform: translateX(5px);
        }

        .faq-question i {
            color: #1a5fb4;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .faq-answer {
            color: #64748b;
            line-height: 1.7;
            margin: 0;
            display: none;
            padding: 1.5rem 1.2rem;
            background: #f8fafc;
            border-radius: 12px;
            margin-top: 0.5rem;
            border-left: 4px solid #26a269;
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .faq-answer.show {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .contact-content {
                gap: 3rem;
            }

            .contact-hero {
                padding: 4rem 3rem;
            }

            .contact-info, .contact-form-section {
                padding: 3rem;
            }
        }

        @media (max-width: 992px) {
            .contact-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .contact-hero h1 {
                font-size: 2.8rem;
            }

            .contact-icon {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .contact-container {
                padding: 0 1.5rem;
            }

            .contact-hero {
                padding: 3rem 2rem;
                margin-bottom: 3rem;
            }

            .contact-hero h1 {
                font-size: 2.2rem;
            }

            .contact-hero p {
                font-size: 1.1rem;
            }

            .contact-info, .contact-form-section, .faq-section {
                padding: 2.5rem;
            }

            .info-title, .form-title {
                font-size: 1.8rem;
            }

            .contact-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .contact-icon-item {
                margin-bottom: 1rem;
            }

            #contactMap {
                height: 350px;
            }

            .btn-submit {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .contact-hero {
                padding: 2.5rem 1.5rem;
            }

            .contact-hero h1 {
                font-size: 1.9rem;
            }

            .contact-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
                margin-bottom: 2rem;
            }

            .contact-info, .contact-form-section, .faq-section {
                padding: 2rem;
            }

            .info-title, .form-title {
                font-size: 1.6rem;
            }

            .contact-icon-item {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .faq-question {
                font-size: 1.1rem;
                padding: 0.8rem 1rem;
            }

            .map-header {
                padding: 1.5rem;
            }

            .social-link-contact {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
            }
        }

        /* Loading Animation for Form */
        .form-loading {
            position: relative;
            pointer-events: none;
        }

        .form-loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a5fb4;
            font-weight: 600;
        }

        /* Success/Error Messages */
        .form-message {
            padding: 1.5rem;
            border-radius: 14px;
            margin-top: 2rem;
            font-weight: 500;
            display: none;
            animation: slideIn 0.4s ease;
        }

        .form-message.success {
            background: rgba(38, 162, 105, 0.1);
            color: #26a269;
            border: 2px solid rgba(38, 162, 105, 0.2);
            display: block;
        }

        .form-message.error {
            background: rgba(220, 38, 38, 0.1);
            color: #dc2626;
            border: 2px solid rgba(220, 38, 38, 0.2);
            display: block;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
    <div class="contact-page" id="contact">
        <div class="contact-container">
            <!-- Hero Section -->
            <div class="contact-hero">
                <div class="contact-icon">
                    <i class="bi bi-chat-square-dots"></i>
                </div>
                <h1>Contactez Notre Équipe</h1>
                <p>
                    Une question, une suggestion ou une collaboration ?
                    Notre équipe dédiée au patrimoine culturel béninois est à votre écoute
                    pour répondre à toutes vos demandes et suggestions.
                </p>
            </div>

            <!-- Contact Content -->
            <div class="contact-content">
                <!-- Informations de contact -->
                <div class="contact-info">
                    <h2 class="info-title">Nos Coordonnées</h2>

                    <div class="contact-item">
                        <div class="contact-icon-item">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Adresse principale</h3>
                            <p>
                                Siège administratif<br>
                                Cotonou, République du Bénin<br>
                                Zone culturelle centrale
                            </p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon-item">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Contact téléphonique</h3>
                            <p>
                                +229 40 63 10 61<br>
                                Lundi - Vendredi: 8h - 18h<br>
                                Samedi: 9h - 13h
                            </p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon-item">
                            <i class="bi bi-envelope-paper"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Adresse électronique</h3>
                            <p>
                                contact@beninculture.bj<br>
                                support@beninculture.bj<br>
                                Réponse sous 24-48 heures
                            </p>
                        </div>
                    </div>

                    <!-- Réseaux sociaux -->
                    <div class="social-contact">
                        <h3 class="social-title">Suivez nos activités</h3>
                        <div class="social-links-contact">
                            <a href="#" class="social-link-contact">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="social-link-contact">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <a href="#" class="social-link-contact">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="social-link-contact">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="social-link-contact">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de contact -->
                <div class="contact-form-section">
                    <h2 class="form-title">Envoyez-nous un message</h2>

                    <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="form-label">Nom complet *</label>
                            <input type="text" id="name" name="name" class="form-control" required
                                   placeholder="Votre nom et prénom complet">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email *</label>
                            <input type="email" id="email" name="email" class="form-control" required
                                   placeholder="votre.adresse@email.com">
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">Sujet du message *</label>
                            <input type="text" id="subject" name="subject" class="form-control" required
                                   placeholder="Objet de votre message">
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Votre message *</label>
                            <textarea id="message" name="message" class="form-control" required
                                      placeholder="Décrivez votre demande en détail..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="category" class="form-label">Type de demande</label>
                            <select id="category" name="category" class="form-control">
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="general">Demande générale</option>
                                <option value="partnership">Proposition de partenariat</option>
                                <option value="contribution">Contribution au contenu</option>
                                <option value="technical">Support technique</option>
                                <option value="media">Demande média/presse</option>
                                <option value="other">Autre demande</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-submit" id="submitBtn">
                            <i class="bi bi-send"></i> Envoyer le message
                        </button>

                        <div id="formMessage" class="form-message"></div>
                    </form>
                </div>
            </div>

            <!-- Map Section -->
            <div class="map-section">
                <div class="map-header">
                    <i class="bi bi-geo-alt-fill"></i>
                    <h3>Notre localisation géographique</h3>
                </div>
                <div id="contactMap"></div>
            </div>

            <!-- FAQ Section -->
            <div class="faq-section">
                <h2 class="info-title">Questions fréquemment posées</h2>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <i class="bi bi-question-circle-fill"></i>
                        Comment puis-je contribuer au contenu de Benin Culture ?
                    </div>
                    <p class="faq-answer">
                        Nous accueillons avec enthousiasme les contributions à notre plateforme.
                        Vous pouvez soumettre du contenu en créant un compte utilisateur,
                        puis en utilisant notre interface de soumission. Tous les contenus
                        sont examinés par notre équipe de modération avant publication pour
                        assurer la qualité et l'exactitude des informations.
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <i class="bi bi-question-circle-fill"></i>
                        Puis-je utiliser vos contenus pour mes recherches académiques ?
                    </div>
                    <p class="faq-answer">
                        Absolument ! Tous nos contenus sont disponibles gratuitement pour
                        la recherche académique, l'éducation et l'usage personnel. Nous vous
                        demandons simplement de citer "Benin Culture" comme source dans vos
                        travaux. Pour les utilisations commerciales, veuillez nous contacter
                        pour obtenir les autorisations nécessaires.
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <i class="bi bi-question-circle-fill"></i>
                        Comment devenir partenaire officiel ?
                    </div>
                    <p class="faq-answer">
                        Nous collaborons avec des institutions, organisations et entreprises
                        qui partagent notre mission de préservation du patrimoine culturel.
                        Pour discuter d'un partenariat, veuillez nous contacter via le formulaire
                        en sélectionnant "Proposition de partenariat". Notre équipe vous
                        recontactera pour planifier une réunion de discussion.
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <i class="bi bi-question-circle-fill"></i>
                        La plateforme est-elle accessible sur mobile ?
                    </div>
                    <p class="faq-answer">
                        Oui, Benin Culture est entièrement responsive et optimisée pour
                        tous les appareils : smartphones, tablettes et ordinateurs de bureau.
                        Nous recommandons d'utiliser les dernières versions des navigateurs
                        pour une expérience optimale. Une application mobile est également
                        en développement.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Toggle Function
            function toggleFaq(element) {
                const answer = element.nextElementSibling;
                const isVisible = answer.classList.contains('show');

                // Close all other FAQs
                document.querySelectorAll('.faq-answer.show').forEach(el => {
                    if (el !== answer) {
                        el.classList.remove('show');
                        const question = el.previousElementSibling;
                        const icon = question.querySelector('i');
                        icon.className = 'bi bi-question-circle-fill';
                        question.style.background = '#f8fafc';
                    }
                });

                // Toggle current FAQ
                if (isVisible) {
                    answer.classList.remove('show');
                    const icon = element.querySelector('i');
                    icon.className = 'bi bi-question-circle-fill';
                    element.style.background = '#f8fafc';
                } else {
                    answer.classList.add('show');
                    const icon = element.querySelector('i');
                    icon.className = 'bi bi-chevron-up';
                    element.style.background = 'rgba(26, 95, 180, 0.05)';
                }
            }

            // Initialize FAQ click handlers
            document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', function() {
                    toggleFaq(this);
                });
            });

            // Open first FAQ by default
            const firstFaq = document.querySelector('.faq-question');
            if (firstFaq) {
                toggleFaq(firstFaq);
            }

            // Form handling with improved validation
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const formMessage = document.getElementById('formMessage');

            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Get form values
                    const name = document.getElementById('name').value.trim();
                    const email = document.getElementById('email').value.trim();
                    const subject = document.getElementById('subject').value.trim();
                    const message = document.getElementById('message').value.trim();
                    const category = document.getElementById('category').value;

                    // Validation
                    if (!name || !email || !subject || !message) {
                        showFormMessage('Veuillez remplir tous les champs obligatoires (*)', 'error');
                        return;
                    }

                    // Email validation
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        showFormMessage('Veuillez entrer une adresse email valide', 'error');
                        return;
                    }

                    // Disable button and show loading
                    submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Envoi en cours...';
                    submitBtn.disabled = true;
                    contactForm.classList.add('form-loading');

                    // Simulate API call
                    setTimeout(() => {
                        // Show success message
                        showFormMessage('Message envoyé avec succès ! Notre équipe vous répondra dans les plus brefs délais.', 'success');

                        // Reset form
                        contactForm.reset();

                        // Re-enable button
                        submitBtn.innerHTML = '<i class="bi bi-send"></i> Message envoyé !';
                        submitBtn.style.background = 'linear-gradient(135deg, #26a269 0%, #1e7e34 100%)';

                        // Reset button after 3 seconds
                        setTimeout(() => {
                            submitBtn.innerHTML = '<i class="bi bi-send"></i> Envoyer le message';
                            submitBtn.disabled = false;
                            submitBtn.style.background = 'linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%)';
                            contactForm.classList.remove('form-loading');
                            formMessage.style.display = 'none';
                        }, 3000);
                    }, 2000);
                });
            }

            // Helper function to show form messages
            function showFormMessage(message, type) {
                formMessage.textContent = message;
                formMessage.className = 'form-message ' + type;
                formMessage.style.display = 'block';

                // Auto-hide message after 5 seconds
                if (type === 'success') {
                    setTimeout(() => {
                        formMessage.style.display = 'none';
                    }, 5000);
                }
            }

            // Interactive map implementation
            const mapContainer = document.getElementById('contactMap');
            if (mapContainer) {
                // Create an interactive map interface
                mapContainer.innerHTML = `
                <div style="width: 100%; height: 100%; background: #f8fafc; display: flex; flex-direction: column; align-items: center; justify-content: center; color: #64748b; padding: 2rem; text-align: center;">
                    <div style="margin-bottom: 2rem;">
                        <i class="bi bi-geo-alt-fill" style="font-size: 4rem; color: #1a5fb4; margin-bottom: 1rem;"></i>
                        <h3 style="color: #1a1a2e; font-family: 'Montserrat', sans-serif; font-weight: 700; margin-bottom: 0.5rem;">Cotonou, Bénin</h3>
                        <p style="max-width: 400px; line-height: 1.6;">
                            Siège administratif de Benin Culture<br>
                            Centre de préservation du patrimoine national
                        </p>
                    </div>

                    <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; margin-top: 2rem;">
                        <button onclick="openMapService('google')" style="background: linear-gradient(135deg, #1a5fb4, #1e3a8a); color: white; border: none; padding: 1rem 2rem; border-radius: 12px; cursor: pointer; font-weight: 600; display: flex; align-items: center; gap: 0.8rem; transition: all 0.3s ease;">
                            <i class="bi bi-google"></i> Google Maps
                        </button>
                        <button onclick="openMapService('osm')" style="background: linear-gradient(135deg, #26a269, #1e7e34); color: white; border: none; padding: 1rem 2rem; border-radius: 12px; cursor: pointer; font-weight: 600; display: flex; align-items: center; gap: 0.8rem; transition: all 0.3s ease;">
                            <i class="bi bi-globe2"></i> OpenStreetMap
                        </button>
                        <button onclick="openMapService('apple')" style="background: linear-gradient(135deg, #000000, #333333); color: white; border: none; padding: 1rem 2rem; border-radius: 12px; cursor: pointer; font-weight: 600; display: flex; align-items: center; gap: 0.8rem; transition: all 0.3s ease;">
                            <i class="bi bi-apple"></i> Apple Maps
                        </button>
                    </div>

                    <div style="margin-top: 3rem; padding: 1.5rem; background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; max-width: 400px;">
                        <h4 style="color: #1a1a2e; font-weight: 600; margin-bottom: 1rem;">Informations d'accès</h4>
                        <ul style="text-align: left; color: #64748b; line-height: 1.6; margin: 0; padding-left: 1.2rem;">
                            <li>Parking gratuit disponible</li>
                            <li>Accès handicapé</li>
                            <li>Ouvert du lundi au vendredi</li>
                            <li>Visites sur rendez-vous</li>
                        </ul>
                    </div>
                </div>
            `;
            }

            // Add hover effects to all interactive elements
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                    this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
        });

        // Functions to open map services
        function openMapService(service) {
            const baseCoords = '6.3723,2.3543'; // Cotonou coordinates

            switch(service) {
                case 'google':
                    window.open(`https://www.google.com/maps/search/?api=1&query=${baseCoords}`, '_blank');
                    break;
                case 'osm':
                    window.open(`https://www.openstreetmap.org/search?query=${baseCoords}`, '_blank');
                    break;
                case 'apple':
                    window.open(`https://maps.apple.com/?q=${baseCoords}`, '_blank');
                    break;
            }
        }
    </script>
@endpush
