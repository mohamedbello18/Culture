@extends('layouts.app')

@section('title', 'Connexion - Culture Benin')

@push('styles')
    <style>
        /* General styling for auth pages to match app layout */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%); /* Consistent with app body */
            color: #1a1a2e; /* Dark text for contrast */
        }

        /* Wrapper for the login form to center it and provide background */
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

        /* Login container card */
        .auth-container {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15); /* Stronger shadow */
            overflow: hidden;
            max-width: 480px; /* Slightly larger for better aesthetics */
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

        /* Header section of the login card */
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

        /* Body section of the login card */
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
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }

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

        /* Checkbox and forgot password link */
        .auth-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            animation: slideInUp 0.6s ease forwards;
            animation-delay: 0.4s;
            opacity: 0;
            transform: translateY(20px);
        }

        .form-check-input:checked {
            background-color: #1a5fb4;
            border-color: #1a5fb4;
        }

        .remember-me-label {
            font-size: 0.9rem;
            color: #64748b;
            font-weight: 500;
        }

        .forgot-link {
            color: #1a5fb4;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .forgot-link:hover {
            color: #26a269; /* Secondary color on hover */
            text-decoration: underline;
        }

        /* Submit button */
        .btn-auth-submit {
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%); /* Primary gradient */
            border: none;
            border-radius: 14px;
            padding: 15px 25px;
            font-weight: 700;
            font-size: 1.1rem;
            color: white;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(26, 95, 180, 0.3);
            animation: slideInUp 0.6s ease forwards;
            animation-delay: 0.5s;
            opacity: 0;
            transform: translateY(20px);
            position: relative;
            overflow: hidden;
        }

        .btn-auth-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-auth-submit:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(26, 95, 180, 0.4);
            background: linear-gradient(135deg, #1e3a8a 0%, #1a5fb4 100%);
        }

        .btn-auth-submit:hover::before {
            left: 100%;
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

        .alert-success {
            background-color: #e6ffed;
            color: #1a5e3a;
            border: 1px solid #b3e6c9;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeIn 0.5s ease;
        }

        .alert-success i {
            font-size: 1.2rem;
            color: #28a745;
        }

        /* Footer section of the login card */
        .auth-footer {
            text-align: center;
            padding: 20px 30px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            animation: slideInUp 0.6s ease forwards;
            animation-delay: 0.6s;
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
        @media (max-width: 576px) {
            .auth-container {
                border-radius: 16px;
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
            .auth-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .btn-auth-submit {
                font-size: 1rem;
                padding: 12px 20px;
            }
            .back-to-home-link {
                font-size: 0.85rem;
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
                <h1 class="auth-title">Connexion</h1>
                <p class="auth-subtitle">Accédez à votre compte Culture Benin</p>
            </div>

            <div class="auth-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill"></i>{{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope"></i>Adresse Email
                        </label>
                        <div class="position-relative">
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="votre.email@example.com"
                                required
                                autofocus
                                autocomplete="email">
                            <i class="bi bi-person input-icon"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-2">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock"></i>Mot de Passe
                        </label>
                        <div class="position-relative">
                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Votre mot de passe"
                                required
                                autocomplete="current-password">
                            <i class="bi bi-eye password-toggle" id="togglePassword"></i>
                            <i class="bi bi-key input-icon"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block mt-2">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="auth-options">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label remember-me-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                <i class="bi bi-question-circle"></i>Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn-auth-submit">
                        <i class="bi bi-box-arrow-in-right"></i>Se Connecter
                    </button>

                    @if ($errors->any() && !($errors->has('email') || $errors->has('password')))
                        <div class="alert alert-danger mt-4">
                            <i class="bi bi-exclamation-triangle"></i>
                            Identifiants incorrects. Veuillez réessayer.
                        </div>
                    @endif
                </form>
            </div>

            <div class="auth-footer">
                <a href="{{ route('register') }}" class="back-to-home-link">
                    <i class="bi bi-person-plus"></i>Pas encore de compte ? S'inscrire
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for the login container
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

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.classList.toggle('bi-eye');
                    this.classList.toggle('bi-eye-slash');
                });
            }
        });
    </script>
@endpush
