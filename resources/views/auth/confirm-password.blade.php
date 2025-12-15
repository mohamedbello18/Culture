@extends('layouts.app')

@section('title', 'Confirmer le Mot de Passe - Culture Benin')

@push('styles')
    <style>
        /* General styling for auth pages to match app layout */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%); /* Consistent with app body */
            color: #1a1a2e; /* Dark text for contrast */
        }

        /* Wrapper for the confirm password form to center it and provide background */
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

        /* Confirm password container card */
        .auth-container {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15); /* Stronger shadow */
            overflow: hidden;
            max-width: 520px;
            width: 100%;
            position: relative;
            z-index: 1; /* Ensure it's above the background animation */
            padding: 40px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e2e8f0;
        }

        .auth-container:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
        }

        .auth-icon {
            font-size: 4rem;
            color: #1a5fb4; /* Primary color */
            margin-bottom: 20px;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .auth-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 15px;
        }

        .auth-text {
            font-size: 1rem;
            color: #64748b;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
            animation: slideInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }

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
            width: 100%;
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

        .invalid-feedback {
            font-size: 0.85rem;
            color: #dc3545;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
            text-align: left;
        }

        .btn-auth-submit {
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
            width: 100%;
            margin-top: 20px;
            animation: slideInUp 0.6s ease forwards;
            animation-delay: 0.2s;
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

        @media (max-width: 576px) {
            .auth-container {
                padding: 30px 20px;
            }
            .auth-icon {
                font-size: 3rem;
            }
            .auth-title {
                font-size: 1.8rem;
            }
            .auth-text {
                font-size: 0.9rem;
            }
            .btn-auth-submit {
                padding: 12px 20px;
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="auth-page-wrapper">
        <div class="auth-container">
            <i class="bi bi-shield-lock auth-icon"></i>
            <h1 class="auth-title">Confirmer Votre Mot de Passe</h1>

            <div class="auth-text">
                Ceci est une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i>Mot de Passe
                    </label>
                    <div class="position-relative">
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" />
                        <i class="bi bi-eye password-toggle" id="togglePassword"></i>
                        <i class="bi bi-key input-icon"></i>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn-auth-submit">
                    <i class="bi bi-check-circle"></i>Confirmer
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for the auth container
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
