@extends('layout')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 text-primary" style="color: #e5a50a !important;">
                <i class="bi bi-shield-lock me-2"></i>Vérification de Sécurité
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

        .alert-danger {
            background-color: #ffebee;
            border-color: #ffcdd2;
            color: #c62828;
        }
        .alert-danger .alert-heading { color: #b71c1c; }
        .alert-danger i { color: #f44336; }

        /* Form elements */
        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: #1a5fb4;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 18px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
            color: #2d3748;
        }

        .form-control:focus {
            border-color: #1a5fb4;
            box-shadow: 0 0 0 4px rgba(26, 95, 180, 0.15);
            background: white;
            outline: none;
        }

        /* Buttons */
        .btn-warning {
            background: linear-gradient(135deg, #e5a50a 0%, #d48806 100%);
            border: none;
            border-radius: 14px;
            padding: 12px 25px;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 25px rgba(229, 165, 10, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-warning::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-warning:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(229, 165, 10, 0.4);
            background: linear-gradient(135deg, #d48806 0%, #e5a50a 100%);
            color: white;
        }

        .btn-warning:hover::before {
            left: 100%;
        }

        .btn-outline-secondary {
            border-color: #64748b;
            color: #64748b;
            background-color: transparent;
            border-radius: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 10px 20px;
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

        /* Modal Styling */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #1a5fb4 0%, #26a269 100%);
            color: white;
            border-bottom: none;
            padding: 20px 25px;
        }

        .modal-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: white;
            letter-spacing: 0.5px;
        }

        .modal-header .btn-close {
            filter: invert(1); /* Make close button white */
        }

        .modal-body {
            padding: 30px 25px;
        }

        .modal-footer {
            border-top: 1px solid #e2e8f0;
            padding: 15px 25px;
        }
    </style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-warning fade-in-up" style="animation-delay: 0.1s;">
            <div class="card-header">
                <h5 class="m-0 fw-bold text-center">
                    <i class="bi bi-shield-check me-2"></i>Authentification à Deux Facteurs
                </h5>
            </div>

            <div class="card-body py-4">
                <div class="text-center mb-4 fade-in-up" style="animation-delay: 0.2s;">
                    <i class="bi bi-phone main-icon-animated"></i>
                    <h4 class="text-warning">Vérification Requise</h4>
                    <p class="text-muted">
                        Pour accéder à l'administration, veuillez saisir le code de vérification
                        généré par votre application d'authentification.
                    </p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show fade-in-up" role="alert" style="animation-delay: 0.3s;">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.2fa.verify') }}" class="fade-in-up" style="animation-delay: 0.4s;">
                    @csrf

                    <div class="mb-4">
                        <label for="code" class="form-label">
                            <i class="bi bi-key me-1"></i>Code de vérification à 6 chiffres
                        </label>
                        <input type="text"
                               class="form-control form-control-lg text-center @error('code') is-invalid @enderror"
                               id="code"
                               name="code"
                               placeholder="000000"
                               maxlength="6"
                               pattern="[0-9]{6}"
                               required
                               autofocus>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">
                            Ouvrez votre application d'authentification (Google Authenticator, Authy, etc.)
                            et entrez le code à 6 chiffres affiché.
                        </small>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="bi bi-shield-check me-2"></i>Vérifier et Continuer
                        </button>
                    </div>
                </form>

                <hr class="my-4 fade-in-up" style="animation-delay: 0.5s;">

                <div class="text-center fade-in-up" style="animation-delay: 0.6s;">
                    <p class="text-muted small mb-2">
                        Vous avez perdu votre appareil d'authentification ?
                    </p>
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#recoveryModal">
                        <i class="bi bi-key me-1"></i>Utiliser un code de récupération
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Codes de Récupération -->
<div class="modal fade" id="recoveryModal" tabindex="-1" aria-labelledby="recoveryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recoveryModalLabel">Utiliser un Code de Récupération</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.2fa.verify') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="recovery_code" class="form-label">
                            <i class="bi bi-journal-text me-1"></i>Entrez un code de récupération
                        </label>
                        <input type="text" class="form-control" id="recovery_code" name="recovery_code" required placeholder="XXXX-XXXX-XXXX">
                        <small class="text-muted">
                            Utilisez l'un des codes de récupération que vous avez sauvegardés.
                        </small>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-circle me-2"></i>Utiliser ce code
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const codeInput = document.getElementById('code');

    // Auto-soumettre quand 6 chiffres saisis
    if (codeInput) {
        codeInput.addEventListener('input', function() {
            if (this.value.length === 6) {
                this.form.submit();
            }
        });

        // Focus automatique
        codeInput.focus();
    }

    // Add fade-in-up animation to all direct children of content section
    document.querySelectorAll('.fade-in-up').forEach((element, index) => {
        element.style.animationDelay = `${index * 0.1}s`;
        element.classList.add('animated'); // Trigger animation
    });
});
</script>
@endpush
