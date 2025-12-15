@extends('layout')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 text-primary" style="color: #1a5fb4 !important;">
                <i class="bi bi-shield-lock me-2"></i>Authentification à Deux Facteurs
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

        .alert-success {
            background-color: #e8f5e9;
            border-color: #c8e6c9;
            color: #2e7d32;
        }
        .alert-success .alert-heading { color: #1b5e20; }
        .alert-success i { color: #4caf50; }

        .alert-danger {
            background-color: #ffebee;
            border-color: #ffcdd2;
            color: #c62828;
        }
        .alert-danger .alert-heading { color: #b71c1c; }
        .alert-danger i { color: #f44336; }

        .alert .btn-close {
            font-size: 0.8rem;
            padding: 0.5rem;
        }

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

        .input-group .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .input-group .btn-outline-secondary {
            border-color: #e2e8f0;
            color: #64748b;
            background-color: #edf2f7;
        }

        .input-group .btn-outline-secondary:hover {
            background-color: #dbe3ed;
            color: #1a5fb4;
            border-color: #1a5fb4;
        }

        .input-group .btn-success {
            background-color: #26a269;
            border-color: #26a269;
            color: white;
        }

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

        .btn-outline-warning {
            border-color: #e5a50a;
            color: #e5a50a;
            background-color: transparent;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-warning:hover {
            background-color: #e5a50a;
            color: white;
            box-shadow: 0 4px 15px rgba(229, 165, 10, 0.3);
            transform: translateY(-2px);
        }

        .btn-outline-danger {
            border-color: #dc2626;
            color: #dc2626;
            background-color: transparent;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-danger:hover {
            background-color: #dc2626;
            color: white;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
            transform: translateY(-2px);
        }

        /* QR Code and secret key styling */
        .qr-code-container {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .font-monospace {
            font-family: 'JetBrains Mono', 'Fira Code', monospace !important;
            background-color: #e9ecef;
            border-color: #d1d7e0;
            color: #343a40;
            padding: 10px 15px;
            border-radius: 8px;
        }

        /* App recommendations */
        .app-recommendation-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .app-recommendation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .app-recommendation-card i {
            font-size: 3.5rem;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #1a5fb4, #26a269);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .app-recommendation-card h6 {
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 5px;
        }

        .app-recommendation-card small {
            color: #64748b;
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
        <div class="card shadow fade-in-up" style="animation-delay: 0.1s;">
            <div class="card-header">
                <h5 class="m-0 fw-bold">
                    <i class="bi bi-phone me-2"></i>Configuration de l'Authentification à Deux Facteurs
                </h5>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(!$user->two_factor_confirmed_at)
                    <!-- Étape 1 : Configuration avec QR Code -->
                    <div class="alert alert-info fade-in-up" style="animation-delay: 0.2s;">
                        <h6 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Configuration requise</h6>
                        <p class="mb-0">
                            Scannez le QR Code ci-dessous avec votre application d'authentification (Google Authenticator, Authy, etc.)
                        </p>
                    </div>

                    <div class="text-center mb-4 fade-in-up" style="animation-delay: 0.3s;">
                        @if($qrCode)
                            <div class="qr-code-container">
                                <img src="{{ $qrCode }}" alt="QR Code pour l'authentification à deux facteurs" class="img-fluid rounded" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>

                    <div class="mb-4 fade-in-up" style="animation-delay: 0.4s;">
                        <label for="secretKey" class="form-label">
                            <i class="bi bi-key me-1"></i>Code secret (manuel) :
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control font-monospace" value="{{ $user->two_factor_secret ?? 'Génération...' }}" readonly id="secretKey">
                            <button class="btn btn-outline-secondary" type="button" onclick="copySecretKey()">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                        <small class="text-muted">Utilisez ce code si vous ne pouvez pas scanner le QR Code</small>
                    </div>

                    <!-- Formulaire de confirmation -->
                    <form method="POST" action="{{ route('admin.2fa.confirm') }}" class="fade-in-up" style="animation-delay: 0.5s;">
                        @csrf

                        <div class="mb-3">
                            <label for="code" class="form-label">
                                <i class="bi bi-shield-fill-check me-1"></i>Entrez le code de vérification
                            </label>
                            <input type="text"
                                   class="form-control form-control-lg text-center @error('code') is-invalid @enderror"
                                   id="code"
                                   name="code"
                                   placeholder="000000"
                                   maxlength="6"
                                   required>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">
                                Entrez le code à 6 chiffres généré par votre application d'authentification
                            </small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-shield-check me-2"></i>Activer l'Authentification à Deux Facteurs
                            </button>
                        </div>
                    </form>

                @else
                    <!-- Étape 2 : 2FA déjà activée -->
                    <div class="alert alert-success fade-in-up" style="animation-delay: 0.2s;">
                        <h6 class="alert-heading"><i class="bi bi-shield-check me-2"></i>Authentification à deux facteurs activée</h6>
                        <p class="mb-0">
                            Votre compte est maintenant protégé par l'authentification à deux facteurs.
                        </p>
                    </div>

                    <!-- Codes de récupération -->
                    <div class="mb-4 fade-in-up" style="animation-delay: 0.3s;">
                        <h6 class="fw-bold text-danger">
                            <i class="bi bi-exclamation-triangle me-1"></i>Codes de Récupération
                        </h6>
                        <p class="text-muted">
                            Conservez ces codes de récupération en lieu sûr. Ils vous permettront d'accéder à votre compte si vous perdez votre appareil d'authentification.
                        </p>

                        @if($user->two_factor_recovery_codes)
                            <div class="bg-light p-3 rounded-3 border mb-3">
                                <div class="row">
                                    @foreach(json_decode($user->two_factor_recovery_codes) as $code)
                                        <div class="col-md-6 mb-2">
                                            <code class="font-monospace">{{ $code }}</code>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.2fa.generate-codes') }}" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning">
                                <i class="bi bi-arrow-repeat me-1"></i>Générer de nouveaux codes
                            </button>
                        </form>
                    </div>

                    <!-- Désactivation -->
                    <div class="border-top pt-3 fade-in-up" style="animation-delay: 0.4s;">
                        <h6 class="fw-bold text-muted">Désactivation</h6>
                        <p class="text-muted small">
                            Vous pouvez désactiver l'authentification à deux facteurs si nécessaire.
                        </p>
                        <form method="POST" action="{{ route('admin.2fa.destroy') }}" onsubmit="return confirm('Êtes-vous sûr de vouloir désactiver l\\'authentification à deux facteurs ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-shield-x me-1"></i>Désactiver la 2FA
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <!-- Information sur les applications d'authentification -->
        <div class="card shadow mt-4 fade-in-up" style="animation-delay: 0.6s;">
            <div class="card-header">
                <h6 class="m-0 fw-bold">
                    <i class="bi bi-question-circle me-2"></i>Applications Recommandées
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <div class="app-recommendation-card">
                            <i class="bi bi-phone"></i>
                            <h6>Google Authenticator</h6>
                            <small class="text-muted">Disponible sur iOS et Android</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="app-recommendation-card">
                            <i class="bi bi-shield-check"></i>
                            <h6>Authy</h6>
                            <small class="text-muted">Multi-appareils, sauvegarde cloud</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="app-recommendation-card">
                            <i class="bi bi-microsoft"></i>
                            <h6>Microsoft Authenticator</h6>
                            <small class="text-muted">Intégration Microsoft</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function copySecretKey() {
    const secretKey = document.getElementById('secretKey');
    secretKey.select();
    secretKey.setSelectionRange(0, 99999);
    document.execCommand('copy');

    const button = event.target;
    const originalIcon = button.querySelector('i').className;
    const originalText = button.innerHTML;

    button.innerHTML = '<i class="bi bi-check-lg"></i> Copié!';
    button.classList.remove('btn-outline-secondary');
    button.classList.add('btn-success');
    button.style.width = button.offsetWidth + 'px'; // Fix width to prevent jump

    setTimeout(() => {
        button.innerHTML = originalText;
        button.classList.remove('btn-success');
        button.classList.add('btn-outline-secondary');
        button.style.width = ''; // Remove fixed width
    }, 2000);
}

// Auto-focus sur le champ code
document.addEventListener('DOMContentLoaded', function() {
    const codeInput = document.getElementById('code');
    if (codeInput && !{{ $user->two_factor_confirmed_at ? 'true' : 'false' }}) {
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
