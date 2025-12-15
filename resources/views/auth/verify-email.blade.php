@extends('layouts.app')

@section('title', 'Vérification Email - Culture Benin')

@push('styles')
    <style>
        /* General styling for auth pages to match app layout */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%); /* Consistent with app body */
            color: #1a1a2e; /* Dark text for contrast */
        }

        /* Wrapper for the verify email form to center it and provide background */
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

        /* Verify email container card */
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
            animation: bounceIn 0.8s ease-out;
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.1); opacity: 1; }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
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

        .form-actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-resend, .btn-logout {
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
            position: relative;
            overflow: hidden;
            text-decoration: none; /* Ensure logout button is styled as a button */
        }

        .btn-resend {
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%); /* Primary gradient */
        }

        .btn-resend:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(26, 95, 180, 0.4);
            background: linear-gradient(135deg, #1e3a8a 0%, #1a5fb4 100%);
        }

        .btn-logout {
            background: #edf2f7;
            color: #64748b;
            border: 1px solid #e2e8f0;
            box-shadow: none;
        }

        .btn-logout:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            background: #e2e8f0;
            color: #1a1a2e;
        }

        .btn-resend::before, .btn-logout::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-resend:hover::before, .btn-logout:hover::before {
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
            .btn-resend, .btn-logout {
                padding: 12px 20px;
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="auth-page-wrapper">
        <div class="auth-container">
            <i class="bi bi-envelope-check auth-icon"></i>
            <h1 class="auth-title">Vérifiez Votre Adresse Email</h1>

            <div class="auth-text">
                Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons un autre avec plaisir.
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill"></i>
                    Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.
                </div>
            @endif

            <div class="form-actions">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn-resend">
                        <i class="bi bi-arrow-clockwise"></i>Renvoyer l'e-mail de vérification
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="bi bi-box-arrow-right"></i>Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
