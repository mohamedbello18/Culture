@extends('layout')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 text-primary" style="color: #e5a50a !important;">
                <i class="bi bi-shield-exclamation me-2"></i>Sécurité Requise
            </h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="bi bi-house-fill me-1"></i>Tableau de Bord
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* General card styling for consistency with dashboard */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-bottom: 2px solid #e2e8f0;
            padding: 20px 25px;
            border-radius: 16px 16px 0 0 !important;
        }

        .card-header h5, .card-header h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #1a1a2e;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }

        .card-header h5 i, .card-header h6 i {
            background: linear-gradient(135deg, #1a5fb4, #26a269);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-right: 12px;
            font-size: 1.3rem;
        }

        /* Specific card header for warning */
        .card.border-warning .card-header {
            background: linear-gradient(135deg, #e5a50a 0%, #d48806 100%);
            color: white;
            border-bottom: none;
        }
        .card.border-warning .card-header h5 {
            color: white;
        }
        .card.border-warning .card-header h5 i {
            -webkit-background-clip: unset;
            -webkit-text-fill-color: unset;
            background-clip: unset;
            color: white;
        }

        /* Alerts styling */
        .alert {
            border-radius: 12px;
            border: 1px solid transparent;
            padding: 15px 20px;
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .alert-info {
            background-color: #e0f7fa;
            border-color: #b2ebf2;
            color: #006064;
        }
        .alert-info .alert-heading { color: #004d40; }
        .alert-info i { color: #00bcd4; }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%);
            border: none;
            border-radius: 14px;
            padding: 12px 25px;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 25px rgba(26, 95, 180, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(26, 95, 180, 0.4);
            background: linear-gradient(135deg, #1e3a8a 0%, #1a5fb4 100%);
            color: white;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-outline-secondary {
            border-color: #64748b;
            color: #64748b;
            background-color: transparent;
            border-radius: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 12px 25px;
        }

        .btn-outline-secondary:hover {
            background-color: #64748b;
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
            transform: translateY(-2px);
        }

        /* Main icon styling */
        .main-icon-animated {
            font-size: 6rem;
            color: #e5a50a; /* Warning color */
            margin-bottom: 25px;
            animation: pulse-warning 2s infinite alternate;
            text-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        @keyframes pulse-warning {
            0% { transform: scale(1); opacity: 0.8; }
            100% { transform: scale(1.05); opacity: 1; }
        }

        /* Animations */
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-warning fade-in-up" style="animation-delay: 0.1s;">
            <div class="card-header">
                <h5 class="m-0 fw-bold">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Authentification à Deux Facteurs Obligatoire
                </h5>
            </div>

            <div class="card-body text-center py-5">
                <i class="bi bi-shield-lock main-icon-animated"></i>

                <h3 class="text-warning mb-3 fade-in-up" style="animation-delay: 0.2s;">Sécurité Renforcée Requise</h3>

                <p class="lead mb-4 fade-in-up" style="animation-delay: 0.3s;">
                    Pour accéder à l'administration, vous devez activer l'authentification à deux facteurs (2FA)
                    pour protéger votre compte et les données sensibles.
                </p>

                <div class="alert alert-info text-start mb-4 fade-in-up" style="animation-delay: 0.4s;">
                    <h6 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Pourquoi la 2FA est obligatoire ?</h6>
                    <ul class="mb-0 ps-3">
                        <li>Protection contre les accès non autorisés</li>
                        <li>Sécurisation des données culturelles sensibles</li>
                        <li>Conformité aux standards de sécurité</li>
                    </ul>
                </div>

                <div class="d-grid gap-3 col-md-6 mx-auto fade-in-up" style="animation-delay: 0.5s;">
                    <a href="{{ route('admin.2fa.show') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-shield-check me-2"></i>Activer la 2FA Maintenant
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-box-arrow-left me-2"></i>Se Déconnecter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
