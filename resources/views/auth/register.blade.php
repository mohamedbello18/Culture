@extends('layouts.app')

@section('title', 'Inscription - Culture Benin')

@push('styles')
    <style>
        /* General styling for auth pages to match app layout */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%); /* Consistent with app body */
            color: #1a1a2e; /* Dark text for contrast */
        }

        /* Wrapper for the register form to center it and provide background */
        .auth-page-wrapper {
            min-height: 100vh; /* Full viewport height */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px; /* Some padding for smaller screens */
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); /* Light gradient background */
            position: relative;
            overflow: hidden;
        }

        .auth-page-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 10% 90%, rgba(26, 95, 180, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 90% 10%, rgba(38, 162, 105, 0.08) 0%, transparent 50%);
            animation: backgroundPulse 15s ease-in-out infinite alternate;
        }

        @keyframes backgroundPulse {
            0% { transform: scale(1); opacity: 0.8; }
            100% { transform: scale(1.1); opacity: 1; }
        }

        /* Register container card */
        .auth-container {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15); /* Stronger shadow */
            overflow: hidden;
            max-width: 580px; /* Slightly larger for register form */
            width: 100%;
            position: relative;
            z-index: 1; /* Ensure it's above the background animation */
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e2e8f0;
        }

        .auth-container:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
        }

        /* Header section of the register card */
        .auth-header {
            background: linear-gradient(135deg, #1a5fb4 0%, #26a269 100%); /* Blue-green gradient */
            padding: 40px 30px 30px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            border-bottom: 4px solid #e5a50a; /* Accent color line */
        }

        .auth-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.15)"/></svg>');
            background-size: cover;
            opacity: 0.8;
        }

        /* Logo styling */
        .logo-container {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent white */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.4s ease;
            padding: 5px;
            border: 2px solid rgba(255, 255, 255, 0.4);
            position: relative;
            z-index: 1;
        }

        .logo-container:hover {
            transform: scale(1.1) rotate(10deg);
        }

        .logo-container img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 50%;
            background: white;
            padding: 2px;
        }

        .auth-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .auth-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        /* Body section of the register card */
        .auth-body {
            padding: 40px 30px;
        }

        /* Form group animations */
        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
            animation: slideInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.15s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .form-group:nth-child(4) { animation-delay: 0.25s; }
        .form-group:nth-child(5) { animation-delay: 0.3s; }
        .form-group:nth-child(6) { animation-delay: 0.35s; }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            font-weight: 600;
            color: #4a5568; /* Darker label color */
            margin-bottom: 8px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: #1a5fb4; /* Primary color for icons */
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
            height: 52px;
            color: #2d3748;
        }

        .form-control:focus {
            border-color: #1a5fb4;
            box-shadow: 0 0 0 4px rgba(26, 95, 180, 0.15);
            background: white;
            outline: none;
        }

        .input-icon {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0; /* Lighter gray for input icons */
            z-index: 5;
        }

        .password-toggle {
            position: absolute;
            right: 45px; /* Adjust position for toggle icon */
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            cursor: pointer;
            z-index: 5;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #1a5fb4;
        }

        /* Error messages */
        .invalid-feedback {
            font-size: 0.85rem;
            color: #dc3545;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .alert-danger {
            background-color: #ffe6e6;
            color: #b91c1c;
            border: 1px solid #ffb3b3;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            animation: fadeIn 0.5s ease;
        }

        .alert-danger i {
            font-size: 1.2rem;
            color: #dc2626;
        }

        /* Form actions (buttons) */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
            gap: 15px;
            animation: slideInUp 0.6s ease forwards;
            animation-delay: 0.4s;
            opacity: 0;
            transform: translateY(20px);
        }

        .btn-login-link {
            background: #edf2f7;
            color: #1a5fb4;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            flex: 1;
            white-space: nowrap;
        }

        .btn-login-link:hover {
            background: #e2e8f0;
            color: #26a269;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .btn-register-submit {
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%); /* Primary gradient */
            border: none;
            border-radius: 14px;
            padding: 15px 25px;
            font-weight: 700;
            font-size: 1.1rem;
            color: white;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(26, 95, 180, 0.3);
            flex: 2;
            position: relative;
            overflow: hidden;
        }

        .btn-register-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-register-submit:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(26, 95, 180, 0.4);
            background: linear-gradient(135deg, #1e3a8a 0%, #1a5fb4 100%);
        }

        .btn-register-submit:hover::before {
            left: 100%;
        }

        /* Footer section of the register card */
        .auth-footer {
            text-align: center;
            padding: 20px 30px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            animation: slideInUp 0.6s ease forwards;
            animation-delay: 0.5s;
            opacity: 0;
            transform: translateY(20px);
        }

        .back-to-home-link {
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 8px;
            background: #edf2f7;
            border: 1px solid #e2e8f0;
        }

        .back-to-home-link:hover {
            color: #1a5fb4;
            background: #e2e8f0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .auth-container {
                max-width: 95%;
            }
            .auth-header {
                padding: 30px 20px 25px;
            }
            .auth-title {
                font-size: 1.8rem;
            }
            .auth-body {
                padding: 30px 20px;
            }
            .form-actions {
                flex-direction: column;
                gap: 10px;
            }
            .btn-login-link, .btn-register-submit {
                width: 100%;
                flex: none;
            }
            .back-to-home-link {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .auth-title {
                font-size: 1.6rem;
            }
            .form-group .row > div {
                margin-bottom: 1.5rem; /* Add spacing between first/last name on small screens */
            }
            .form-group .row > div:last-child {
                margin-bottom: 0;
            }
        }
    </style>
@endpush

@section('content')
    <div class="auth-page-wrapper">
        <div class="auth-container">
            <div class="auth-header">
                <div class="logo-container">
                    <img src="{{ asset('adminlte/img/logo-culture-benin.png') }}" alt="Culture Benin Logo">
                </div>
                <h1 class="auth-title">Inscription</h1>
                <p class="auth-subtitle">Créez votre compte Culture Benin</p>
            </div>

            <div class="auth-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle"></i>
                            Veuillez corriger les erreurs ci-dessous.
                            <ul class="mb-0 mt-2 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prenom" class="form-label">
                                    <i class="bi bi-person"></i>Prénom
                                </label>
                                <div class="position-relative">
                                    <input type="text"
                                        id="prenom"
                                        class="form-control @error('prenom') is-invalid @enderror"
                                        name="prenom"
                                        value="{{ old('prenom') }}"
                                        placeholder="Votre prénom"
                                        required
                                        autofocus
                                        autocomplete="given-name">
                                </div>
                                @error('prenom')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom" class="form-label">
                                    <i class="bi bi-person"></i>Nom
                                </label>
                                <div class="position-relative">
                                    <input type="text"
                                        id="nom"
                                        class="form-control @error('nom') is-invalid @enderror"
                                        name="nom"
                                        value="{{ old('nom') }}"
                                        placeholder="Votre nom"
                                        required
                                        autocomplete="family-name">
                                </div>
                                @error('nom')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope"></i>Adresse email
                        </label>
                        <div class="position-relative">
                            <input type="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="votre.email@example.com"
                                required
                                autocomplete="email">
                            <i class="bi bi-envelope input-icon"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-2">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock"></i>Mot de passe
                        </label>
                        <div class="position-relative">
                            <input type="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Créez un mot de passe sécurisé"
                                required
                                autocomplete="new-password">
                            <i class="bi bi-eye password-toggle" id="togglePassword"></i>
                            <i class="bi bi-key input-icon"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block mt-2">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <i class="bi bi-lock-fill"></i>Confirmer le mot de passe
                        </label>
                        <div class="position-relative">
                            <input type="password"
                                id="password_confirmation"
                                class="form-control"
                                name="password_confirmation"
                                placeholder="Confirmez votre mot de passe"
                                required
                                autocomplete="new-password">
                            <i class="bi bi-eye password-toggle" id="togglePasswordConfirmation"></i>
                            <i class="bi bi-shield-check input-icon"></i>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block mt-2">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('login') }}" class="btn-login-link">
                            <i class="bi bi-arrow-left"></i>Déjà inscrit ?
                        </a>

                        <button type="submit" class="btn-register-submit">
                            <i class="bi bi-person-plus"></i>Créer le compte
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-footer">
                <a href="{{ url('/') }}" class="back-to-home-link">
                    <i class="bi bi-arrow-left-circle"></i>Retour à l'accueil public
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for the register container
            const authContainer = document.querySelector('.auth-container');
            if (authContainer) {
                authContainer.style.opacity = '0';
                authContainer.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    authContainer.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                    authContainer.style.opacity = '1';
                    authContainer.style.transform = 'translateY(0)';
                }, 100);
            }

            // Toggle password visibility
            const togglePassword = document.querySelector('#togglePassword');
            const passwordInput = document.querySelector('#password');
            const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
            const passwordConfirmationInput = document.querySelector('#password_confirmation');

            function setupPasswordToggle(toggleEl, inputEl) {
                if (toggleEl && inputEl) {
                    toggleEl.addEventListener('click', function() {
                        const type = inputEl.getAttribute('type') === 'password' ? 'text' : 'password';
                        inputEl.setAttribute('type', type);
                        this.classList.toggle('bi-eye');
                        this.classList.toggle('bi-eye-slash');
                    });
                }
            }

            setupPasswordToggle(togglePassword, passwordInput);
            setupPasswordToggle(togglePasswordConfirmation, passwordConfirmationInput);
        });
    </script>
@endpush
