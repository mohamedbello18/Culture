@extends('layout')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 text-primary" style="color: #1a5fb4 !important;">
                <i class="bi bi-speedometer2 me-2"></i>Tableau de Bord Administratif
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
        /* Styles personnalisés pour le dashboard - Nouveau design */
        body {
            font-family: 'Inter', sans-serif;
        }

        .stat-card {
            border: none;
            border-radius: 16px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
            z-index: 1;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            z-index: 2;
        }

        .stat-card-primary::before { background: linear-gradient(90deg, #1a5fb4, #1e3a8a); }
        .stat-card-success::before { background: linear-gradient(90deg, #26a269, #1e7e34); }
        .stat-card-warning::before { background: linear-gradient(90deg, #e5a50a, #d48806); }
        .stat-card-danger::before { background: linear-gradient(90deg, #dc2626, #b91c1c); }
        .stat-card-info::before { background: linear-gradient(90deg, #0891b2, #0e7490); }
        .stat-card-secondary::before { background: linear-gradient(90deg, #6b7280, #4b5563); }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15) !important;
        }

        .stat-icon {
            width: 65px;
            height: 65px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.15) rotate(8deg);
        }

        .stat-number {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.4rem;
            font-weight: 800;
            background: linear-gradient(45deg, #1a1a2e, #16213e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-trend {
            font-size: 0.85rem;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .activity-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .activity-item {
            padding: 18px;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
            margin-bottom: 12px; /* Increased from 6px */
            border-radius: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .activity-list {
            padding-bottom: 1rem; /* Added padding to the bottom */
        }

        .activity-item:hover {
            background-color: #edf5ff;
            transform: translateX(8px);
            border-left-color: #1a5fb4;
            box-shadow: 0 4px 12px rgba(26, 95, 180, 0.1);
        }

        .activity-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .quick-action-card {
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .quick-action-btn {
            border: none;
            border-radius: 12px;
            padding: 22px;
            transition: all 0.4s ease;
            background: white;
            text-align: left;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            border: 2px solid transparent;
        }

        .quick-action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-color: #1a5fb4;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }

        .welcome-card {
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #1a5fb4 0%, #26a269 100%);
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(26, 95, 180, 0.3);
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            top: -50%;
            left: -50%;
            animation: pulse 8s infinite alternate;
        }

        @keyframes pulse {
            0% { transform: scale(1) rotate(0deg); }
            100% { transform: scale(1.2) rotate(180deg); }
        }

        .welcome-icon {
            font-size: 4rem;
            opacity: 0.9;
            margin-bottom: 25px;
            animation: float 4s ease-in-out infinite;
            text-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33% { transform: translateY(-15px) rotate(5deg); }
            66% { transform: translateY(-8px) rotate(-5deg); }
        }

        .stats-list-item {
            padding: 16px 0;
            border-bottom: 1px solid #f1f3f4;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 2px 0;
        }

        .stats-list-item:hover {
            background-color: #f8f9fa;
            padding-left: 12px;
            transform: scale(1.02);
        }

        .stats-list-item:last-child {
            border-bottom: none;
        }

        .stats-badge {
            min-width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .quick-link-btn {
            border-radius: 12px;
            padding: 14px 24px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            text-align: left;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .quick-link-btn:hover {
            border-color: #1a5fb4;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            transform: translateX(8px) translateY(-2px);
            box-shadow: 0 8px 20px rgba(26, 95, 180, 0.15);
        }

        /* Animations d'entrée améliorées */
        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Nouveau design pour les en-têtes */
        .card-header-custom {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-bottom: 2px solid #e2e8f0;
            padding: 20px 25px;
            border-radius: 16px 16px 0 0 !important;
        }

        .card-header-custom h5 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #1a1a2e;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }

        .card-header-custom h5 i {
            background: linear-gradient(135deg, #1a5fb4, #26a269);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-right: 12px;
            font-size: 1.3rem;
        }

        /* Badge personnalisé */
        .badge-custom {
            padding: 6px 14px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        /* Boutons d'action */
        .action-btn {
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .action-btn-primary {
            background: linear-gradient(135deg, #1a5fb4, #1e3a8a);
            color: white;
        }

        .action-btn-primary:hover {
            background: linear-gradient(135deg, #1e3a8a, #1a5fb4);
            color: white;
            border-color: #1a5fb4;
        }

        .action-btn-success {
            background: linear-gradient(135deg, #26a269, #1e7e34);
            color: white;
        }

        .action-btn-success:hover {
            background: linear-gradient(135deg, #1e7e34, #26a269);
            color: white;
            border-color: #26a269;
        }

        .action-btn-warning {
            background: linear-gradient(135deg, #e5a50a, #d48806);
            color: white;
        }

        .action-btn-warning:hover {
            background: linear-gradient(135deg, #d48806, #e5a50a);
            color: white;
            border-color: #e5a50a;
        }

        .action-btn-info {
            background: linear-gradient(135deg, #0891b2, #0e7490);
            color: white;
        }

        .action-btn-info:hover {
            background: linear-gradient(135deg, #0e7490, #0891b2);
            color: white;
            border-color: #0891b2;
        }

        /* Effet de brillance sur les cartes */
        .shimmer-card {
            position: relative;
            overflow: hidden;
        }

        .shimmer-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.1) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(30deg);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) rotate(30deg); }
            100% { transform: translateX(100%) rotate(30deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .stat-number {
                font-size: 2rem;
            }

            .stat-icon {
                width: 55px;
                height: 55px;
                font-size: 22px;
            }

            .welcome-icon {
                font-size: 3rem;
            }

            .quick-action-btn {
                padding: 18px;
            }

            .activity-item {
                padding: 14px;
            }
        }

        @media (max-width: 576px) {
            .stat-number {
                font-size: 1.8rem;
            }

            .welcome-icon {
                font-size: 2.5rem;
            }

            .card-header-custom {
                padding: 15px 20px;
            }
        }
    </style>
@endsection

@section('content')
    @php
        // Statistiques dynamiques
        $stats = [
            'langues' => \App\Models\Langue::count(),
            'contenus' => \App\Models\Contenu::count(),
            'medias' => \App\Models\Media::count(),
            'users' => \App\Models\User::count(),
            'regions' => \App\Models\Region::count(),
            'commentaires' => \App\Models\Commentaire::count(),
        ];

        // Activités récentes mélangées - SEULEMENT 4 DERNIÈRES
        $activitesRecentes = collect();

        // Langues récentes (sans relation user)
        $languesRecentes = \App\Models\Langue::orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function($langue) {
                return [
                    'type' => 'langue',
                    'icone' => 'bi-translate',
                    'couleur' => 'primary',
                    'description' => 'Nouvelle langue ajoutée : ' . $langue->nom_langue,
                    'date' => $langue->created_at,
                    'auteur' => 'Système'
                ];
            });

        // Contenus récents (sans relation user)
        $contenusRecents = \App\Models\Contenu::orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function($contenu) {
                return [
                    'type' => 'contenu',
                    'icone' => 'bi-file-earmark-text',
                    'couleur' => 'success',
                    'description' => 'Nouveau contenu : ' . Str::limit($contenu->titre, 40),
                    'date' => $contenu->created_at,
                    'auteur' => 'Système'
                ];
            });

        // Médias récents (sans relation user)
        $mediasRecents = \App\Models\Media::orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function($media) {
                return [
                    'type' => 'media',
                    'icone' => 'bi-image',
                    'couleur' => 'warning',
                    'description' => 'Média uploadé : ' . Str::limit($media->description, 30),
                    'date' => $media->created_at,
                    'auteur' => 'Système'
                ];
            });

        // Utilisateurs récents
        $usersRecents = \App\Models\User::orderBy('created_at', 'desc')
            ->take(2)
            ->get()
            ->map(function($user) {
                return [
                    'type' => 'utilisateur',
                    'icone' => 'bi-person',
                    'couleur' => 'info',
                    'description' => 'Nouvel utilisateur : ' . $user->prenom . ' ' . $user->nom,
                    'date' => $user->created_at,
                    'auteur' => 'Système'
                ];
            });

        // Fusionner et trier toutes les activités - PRENDRE SEULEMENT 4
        $activitesRecentes = $languesRecentes
            ->merge($contenusRecents)
            ->merge($mediasRecents)
            ->merge($usersRecents)
            ->sortByDesc('date')
            ->take(4); // CHANGÉ DE 8 À 4

        // Statistiques d'évolution (comparaison avec le mois dernier)
        $moisDernier = now()->subMonth();
        $statsEvolution = [
            'langues' => \App\Models\Langue::where('created_at', '>=', $moisDernier)->count(),
            'contenus' => \App\Models\Contenu::where('created_at', '>=', $moisDernier)->count(),
            'medias' => \App\Models\Media::where('created_at', '>=', $moisDernier)->count(),
            'users' => \App\Models\User::where('created_at', '>=', $moisDernier)->count(),
        ];
    @endphp

        <!-- Cartes Statistiques Améliorées -->
    <div class="row mb-4 fade-in">
        <div class="col-xl-3 col-md-6 mb-4" style="animation-delay: 0.1s">
            <div class="card stat-card stat-card-primary shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2 fw-semibold" style="color: #64748b;">
                                <i class="bi bi-translate me-1"></i>Langues
                            </h6>
                            <div class="stat-number mb-1">{{ $stats['langues'] }}</div>
                            <div class="d-flex align-items-center">
                                @if($statsEvolution['langues'] > 0)
                                    <span class="stat-trend" style="background: rgba(38, 162, 105, 0.15); color: #26a269;">
                                    <i class="bi bi-arrow-up me-1"></i>+{{ $statsEvolution['langues'] }}
                                </span>
                                @endif
                                <small class="text-muted ms-2">ce mois</small>
                            </div>
                        </div>
                        <div class="stat-icon" style="background: rgba(26, 95, 180, 0.15); color: #1a5fb4;">
                            <i class="bi bi-translate"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 pt-0">
                    <a href="{{ route('admin.langues.index') }}" class="text-decoration-none fw-semibold small" style="color: #1a5fb4;">
                        Voir détails <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4" style="animation-delay: 0.2s">
            <div class="card stat-card stat-card-success shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2 fw-semibold" style="color: #64748b;">
                                <i class="bi bi-file-earmark-text me-1"></i>Contenus
                            </h6>
                            <div class="stat-number mb-1">{{ $stats['contenus'] }}</div>
                            <div class="d-flex align-items-center">
                                @if($statsEvolution['contenus'] > 0)
                                    <span class="stat-trend" style="background: rgba(38, 162, 105, 0.15); color: #26a269;">
                                    <i class="bi bi-arrow-up me-1"></i>+{{ $statsEvolution['contenus'] }}
                                </span>
                                @endif
                                <small class="text-muted ms-2">ce mois</small>
                            </div>
                        </div>
                        <div class="stat-icon" style="background: rgba(38, 162, 105, 0.15); color: #26a269;">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 pt-0">
                    <a href="{{ route('admin.contenus.index') }}" class="text-decoration-none fw-semibold small" style="color: #26a269;">
                        Voir détails <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4" style="animation-delay: 0.3s">
            <div class="card stat-card stat-card-warning shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2 fw-semibold" style="color: #64748b;">
                                <i class="bi bi-images me-1"></i>Médias
                            </h6>
                            <div class="stat-number mb-1">{{ $stats['medias'] }}</div>
                            <div class="d-flex align-items-center">
                                @if($statsEvolution['medias'] > 0)
                                    <span class="stat-trend" style="background: rgba(38, 162, 105, 0.15); color: #26a269;">
                                    <i class="bi bi-arrow-up me-1"></i>+{{ $statsEvolution['medias'] }}
                                </span>
                                @endif
                                <small class="text-muted ms-2">ce mois</small>
                            </div>
                        </div>
                        <div class="stat-icon" style="background: rgba(229, 165, 10, 0.15); color: #e5a50a;">
                            <i class="bi bi-images"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 pt-0">
                    <a href="{{ route('admin.medias.index') }}" class="text-decoration-none fw-semibold small" style="color: #e5a50a;">
                        Voir détails <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4" style="animation-delay: 0.4s">
            <div class="card stat-card stat-card-danger shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2 fw-semibold" style="color: #64748b;">
                                <i class="bi bi-people me-1"></i>Utilisateurs
                            </h6>
                            <div class="stat-number mb-1">{{ $stats['users'] }}</div>
                            <div class="d-flex align-items-center">
                                @if($statsEvolution['users'] > 0)
                                    <span class="stat-trend" style="background: rgba(38, 162, 105, 0.15); color: #26a269;">
                                    <i class="bi bi-arrow-up me-1"></i>+{{ $statsEvolution['users'] }}
                                </span>
                                @endif
                                <small class="text-muted ms-2">ce mois</small>
                            </div>
                        </div>
                        <div class="stat-icon" style="background: rgba(220, 38, 38, 0.15); color: #dc2626;">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 pt-0">
                    <a href="{{ route('admin.users.index') }}" class="text-decoration-none fw-semibold small" style="color: #dc2626;">
                        Voir détails <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu Principal -->
    <div class="row fade-in" style="animation-delay: 0.5s">
        <div class="col-lg-8">
            <!-- Activité Récente Dynamique - SEULEMENT 4 DERNIÈRES -->
            <div class="card activity-card shadow mb-4">
                <div class="card-header card-header-custom">
                    <h5 class="m-0 fw-bold">
                        <i class="bi bi-clock-history me-2"></i>Activité Récente
                    </h5>
                    <span class="badge-custom" style="background: linear-gradient(135deg, #1a5fb4, #26a269); color: white; position: absolute; right: 25px; top: 20px;">
                    {{ $activitesRecentes->count() }} activités
                </span>
                </div>
                <div class="card-body p-4">
                    <div class="activity-list">
                        @forelse($activitesRecentes as $activite)
                            <div class="activity-item">
                                <div class="d-flex align-items-center">
                                    <div class="activity-icon me-3" style="
                                background: {{ $activite['couleur'] === 'primary' ? 'rgba(26, 95, 180, 0.15)' :
                                            ($activite['couleur'] === 'success' ? 'rgba(38, 162, 105, 0.15)' :
                                            ($activite['couleur'] === 'warning' ? 'rgba(229, 165, 10, 0.15)' :
                                            'rgba(8, 145, 178, 0.15)')) }};
                                color: {{ $activite['couleur'] === 'primary' ? '#1a5fb4' :
                                        ($activite['couleur'] === 'success' ? '#26a269' :
                                        ($activite['couleur'] === 'warning' ? '#e5a50a' : '#0891b2')) }};
                            ">
                                        <i class="bi {{ $activite['icone'] }}"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold" style="color: #1a1a2e;">{{ $activite['description'] }}</h6>
                                        <small class="text-muted d-flex align-items-center">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{ $activite['date']->format('d/m/Y à H:i') }}
                                        </small>
                                    </div>
                                    <span class="badge" style="
                                background: {{ $activite['couleur'] === 'primary' ? 'rgba(26, 95, 180, 0.1)' :
                                            ($activite['couleur'] === 'success' ? 'rgba(38, 162, 105, 0.1)' :
                                            ($activite['couleur'] === 'warning' ? 'rgba(229, 165, 10, 0.1)' :
                                            'rgba(8, 145, 178, 0.1)')) }};
                                color: {{ $activite['couleur'] === 'primary' ? '#1a5fb4' :
                                        ($activite['couleur'] === 'success' ? '#26a269' :
                                        ($activite['couleur'] === 'warning' ? '#e5a50a' : '#0891b2')) }};
                                border: 1px solid {{ $activite['couleur'] === 'primary' ? 'rgba(26, 95, 180, 0.2)' :
                                                    ($activite['couleur'] === 'success' ? 'rgba(38, 162, 105, 0.2)' :
                                                    ($activite['couleur'] === 'warning' ? 'rgba(229, 165, 10, 0.2)' :
                                                    'rgba(8, 145, 178, 0.2)')) }};
                            ">
                                {{ ucfirst($activite['type']) }}
                            </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="bi bi-inbox display-4 text-muted opacity-50 mb-3"></i>
                                <p class="text-muted mb-0">Aucune activité récente</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Actions Rapides -->
            <div class="card shadow">
                <div class="card-header card-header-custom">
                    <h5 class="m-0 fw-bold">
                        <i class="bi bi-lightning me-2"></i>Actions Rapides
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ url('/admin/langues/create') }}" class="quick-action-btn w-100 text-start">
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 50px; height: 50px; border-radius: 12px; background: rgba(26, 95, 180, 0.15); color: #1a5fb4; display: flex; align-items: center; justify-content: center; font-size: 22px;">
                                        <i class="bi bi-plus-circle"></i>
                                    </div>
                                    <div>
                                        <strong style="color: #1a1a2e;">Ajouter une Langue</strong>
                                        <br>
                                        <small class="text-muted">Nouvelle langue</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/admin/contenus/create') }}" class="quick-action-btn w-100 text-start">
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 50px; height: 50px; border-radius: 12px; background: rgba(38, 162, 105, 0.15); color: #26a269; display: flex; align-items: center; justify-content: center; font-size: 22px;">
                                        <i class="bi bi-file-earmark-plus"></i>
                                    </div>
                                    <div>
                                        <strong style="color: #1a1a2e;">Créer un Contenu</strong>
                                        <br>
                                        <small class="text-muted">Nouveau contenu culturel</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/admin/medias/create') }}" class="quick-action-btn w-100 text-start">
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 50px; height: 50px; border-radius: 12px; background: rgba(229, 165, 10, 0.15); color: #e5a50a; display: flex; align-items: center; justify-content: center; font-size: 22px;">
                                        <i class="bi bi-upload"></i>
                                    </div>
                                    <div>
                                        <strong style="color: #1a1a2e;">Uploader un Média</strong>
                                        <br>
                                        <small class="text-muted">Image, vidéo ou audio</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/admin/users/create') }}" class="quick-action-btn w-100 text-start">
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 50px; height: 50px; border-radius: 12px; background: rgba(8, 145, 178, 0.15); color: #0891b2; display: flex; align-items: center; justify-content: center; font-size: 22px;">
                                        <i class="bi bi-person-plus"></i>
                                    </div>
                                    <div>
                                        <strong style="color: #1a1a2e;">Ajouter un Utilisateur</strong>
                                        <br>
                                        <small class="text-muted">Nouvel utilisateur</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Carte de Bienvenue Personnalisée -->
            <div class="card welcome-card shadow mb-4">
                <div class="card-body text-center p-4">
                    <div class="welcome-icon">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="font-family: 'Montserrat', sans-serif;">Bienvenue {{ auth()->user()->prenom ?? 'Administrateur' }} !</h4>
                    <p class="mb-3 opacity-90">Plateforme de gestion du patrimoine culturel béninois</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="bi bi-calendar3 me-2"></i>
                        <span class="opacity-90">{{ now()->translatedFormat('l d F Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Statistiques Détaillées -->
            <div class="card shadow mb-4">
                <div class="card-header card-header-custom">
                    <h5 class="m-0 fw-bold">
                        <i class="bi bi-graph-up me-2"></i>Statistiques Globales
                    </h5>
                </div>
                <div class="card-body">
                    <div class="activity-list list-group list-group-flush">
                        <div class="stats-list-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon me-3" style="width: 45px; height: 45px; background: rgba(26, 95, 180, 0.15); color: #1a5fb4;">
                                    <i class="bi bi-translate"></i>
                                </div>
                                <span style="color: #4b5563; font-weight: 500;">Langues actives</span>
                            </div>
                            <span class="stats-badge" style="background: rgba(26, 95, 180, 0.15); color: #1a5fb4;">{{ $stats['langues'] }}</span>
                        </div>
                        <div class="stats-list-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon me-3" style="width: 45px; height: 45px; background: rgba(38, 162, 105, 0.15); color: #26a269;">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <span style="color: #4b5563; font-weight: 500;">Contenus publiés</span>
                            </div>
                            <span class="stats-badge" style="background: rgba(38, 162, 105, 0.15); color: #26a269;">{{ $stats['contenus'] }}</span>
                        </div>
                        <div class="stats-list-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon me-3" style="width: 45px; height: 45px; background: rgba(229, 165, 10, 0.15); color: #e5a50a;">
                                    <i class="bi bi-images"></i>
                                </div>
                                <span style="color: #4b5563; font-weight: 500;">Médias uploadés</span>
                            </div>
                            <span class="stats-badge" style="background: rgba(229, 165, 10, 0.15); color: #e5a50a;">{{ $stats['medias'] }}</span>
                        </div>
                        <div class="stats-list-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon me-3" style="width: 45px; height: 45px; background: rgba(220, 38, 38, 0.15); color: #dc2626;">
                                    <i class="bi bi-people"></i>
                                </div>
                                <span style="color: #4b5563; font-weight: 500;">Utilisateurs actifs</span>
                            </div>
                            <span class="stats-badge" style="background: rgba(220, 38, 38, 0.15); color: #dc2626;">{{ $stats['users'] }}</span>
                        </div>
                        <div class="stats-list-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon me-3" style="width: 45px; height: 45px; background: rgba(8, 145, 178, 0.15); color: #0891b2;">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <span style="color: #4b5563; font-weight: 500;">Régions couvertes</span>
                            </div>
                            <span class="stats-badge" style="background: rgba(8, 145, 178, 0.15); color: #0891b2;">{{ $stats['regions'] }}</span>
                        </div>
                        <div class="stats-list-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon me-3" style="width: 45px; height: 45px; background: rgba(107, 114, 128, 0.15); color: #6b7280;">
                                    <i class="bi bi-chat-dots"></i>
                                </div>
                                <span style="color: #4b5563; font-weight: 500;">Commentaires</span>
                            </div>
                            <span class="stats-badge" style="background: rgba(107, 114, 128, 0.15); color: #6b7280;">{{ $stats['commentaires'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Animation pour les éléments avec délais
            $('.fade-in').each(function(index) {
                $(this).css('animation-delay', (index * 0.1) + 's');
            });

            // Animation hover pour les cartes stats améliorée
            $('.stat-card').on('mouseenter', function() {
                $(this).find('.stat-icon').css({
                    'transform': 'scale(1.15) rotate(8deg)',
                    'transition': 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)'
                });
            }).on('mouseleave', function() {
                $(this).find('.stat-icon').css({
                    'transform': 'scale(1) rotate(0)',
                    'transition': 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)'
                });
            });

            // Animation pour les items d'activité
            $('.activity-item').on('mouseenter', function() {
                $(this).css({
                    'transform': 'translateX(8px)',
                    'transition': 'all 0.3s ease',
                    'box-shadow': '0 4px 12px rgba(26, 95, 180, 0.1)'
                });
            }).on('mouseleave', function() {
                $(this).css({
                    'transform': 'translateX(0)',
                    'transition': 'all 0.3s ease',
                    'box-shadow': 'none'
                });
            });

            // Animation pour les boutons d'actions rapides
            $('.quick-action-btn').on('mouseenter', function() {
                $(this).css({
                    'transform': 'translateY(-5px)',
                    'transition': 'all 0.4s ease',
                    'box-shadow': '0 8px 25px rgba(0,0,0,0.15)'
                });
            }).on('mouseleave', function() {
                $(this).css({
                    'transform': 'translateY(0)',
                    'transition': 'all 0.4s ease',
                    'box-shadow': '0 4px 8px rgba(0,0,0,0.05)'
                });
            });

            // Animation pour les statistiques détaillées
            $('.stats-list-item').on('mouseenter', function() {
                $(this).css({
                    'transform': 'scale(1.02)',
                    'padding-left': '12px',
                    'transition': 'all 0.3s ease'
                });
            }).on('mouseleave', function() {
                $(this).css({
                    'transform': 'scale(1)',
                    'padding-left': '0',
                    'transition': 'all 0.3s ease'
                });
            });

            // Effet de brillance aléatoire sur les cartes
            function randomShimmer() {
                $('.stat-card').each(function() {
                    if (Math.random() > 0.7) { // 30% de chance
                        $(this).addClass('shimmer-card');
                        setTimeout(() => {
                            $(this).removeClass('shimmer-card');
                        }, 3000);
                    }
                });
            }

            // Démarrer l'effet de brillance aléatoire
            setInterval(randomShimmer, 8000);

            // Effet de parallaxe sur la carte de bienvenue
            $(document).on('mousemove', function(e) {
                const welcomeCard = $('.welcome-card');
                if (welcomeCard.length) {
                    const x = (e.clientX / window.innerWidth) * 20 - 10;
                    const y = (e.clientY / window.innerHeight) * 20 - 10;
                    welcomeCard.css({
                        'transform': `perspective(1000px) rotateX(${y}deg) rotateY(${x}deg)`,
                        'transition': 'transform 0.1s ease-out'
                    });
                }
            });

            // Réinitialiser la transformation quand la souris quitte
            $(document).on('mouseleave', function() {
                $('.welcome-card').css({
                    'transform': 'perspective(1000px) rotateX(0) rotateY(0)',
                    'transition': 'transform 0.5s ease-out'
                });
            });

            // Notification de chargement terminé
            setTimeout(() => {
                console.log('Dashboard chargé avec succès');
            }, 1000);
        });
    </script>
@endsection
