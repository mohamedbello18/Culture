@extends('layouts.app')

@section('title', 'Culture Benin - Accueil')

@section('content')
    <section class="hero-section" id="accueil">
        <!-- Carrousel de 4 images locales avec effet zoom out -->
        <div class="carousel-container">
            <div class="carousel-slider">
                <!-- Image 1 : Ganvié - Venise de l'Afrique -->
                <div class="carousel-slide active">
                    <img src="{{ asset('images/culture-benin-1.jpg') }}"
                         alt="Ganvié - La Venise de l'Afrique"
                         class="carousel-img"
                         loading="eager">
                    <div class="carousel-caption">
                        <h3>La Porte du Nom Retoure</h3>

                    </div>
                    <div class="carousel-overlay"></div>
                </div>

                <!-- Image 2 : Palais royaux d'Abomey -->
                <div class="carousel-slide">
                    <img src="{{ asset('images/culture-benin-2.jpg') }}"
                         alt="Palais royaux d'Abomey"
                         class="carousel-img"
                         loading="eager">
                    <div class="carousel-caption">
                        <h3>Palais des Congrès</h3>

                    </div>
                    <div class="carousel-overlay"></div>
                </div>

                <!-- Image 3 : Fête du Vodun -->
                <div class="carousel-slide">
                    <img src="{{ asset('images/culture-benin-3.jpg') }}"
                         alt="Fête du Vodun"
                         class="carousel-img"
                         loading="lazy">
                    <div class="carousel-caption">
                        <h3>La Route des Pêches</h3>

                    </div>
                    <div class="carousel-overlay"></div>
                </div>

                <!-- Image 4 : Fête du Vodun -->
                <div class="carousel-slide">
                    <img src="https://images.unsplash.com/photo-1518991669955-9c7e78ec80d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                         alt="Fête du Vodun"
                         class="carousel-img"
                         loading="lazy">
                    <div class="carousel-overlay"></div>
                </div>

                <!-- Image cinq : Artisanat béninois -->
                <div class="carousel-slide">
                    <img src="{{ asset('images/culture-benin-4.jpg') }}"
                         alt="Artisanat béninois"
                         class="carousel-img"
                         loading="lazy">
                    <div class="carousel-caption">
                        <h3>Plage Fidjrossè</h3>

                    </div>
                    <div class="carousel-overlay"></div>
                </div>
            </div>

            <!-- Contrôles du carrousel -->
            <div class="carousel-controls">
                <button class="carousel-btn prev-btn" aria-label="Image précédente">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="carousel-btn next-btn" aria-label="Image suivante">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="hero-content">
            <h1 class="hero-title">
                Découvrez la Richesse<br>
                <span class="hero-accent">Culturelle du Bénin</span>
            </h1>
            <p class="hero-subtitle">
                Explorez le patrimoine exceptionnel du Bénin à travers ses traditions ancestrales,
                ses langues locales, ses arts vivants et son héritage historique unique.
                Une immersion totale dans l'âme de la nation.
            </p>
            <a href="{{ route('contenus.index') }}" class="btn-hero">
                <i class="bi bi-compass me-2"></i>Commencer l'Exploration
            </a>
        </div>
    </section>

    <section class="stats-section">
        <div class="stats-container">
            <h2 class="section-title">Notre Patrimoine en Chiffres</h2>
            <p class="section-subtitle">
                Découvrez l'étendue de notre collection culturelle à travers ces chiffres significatifs
            </p>

            <div class="stats-grid-premium">
                <div class="stat-card-premium">
                    <div class="stat-icon-wrapper" style="background: linear-gradient(135deg, #006400, #228B22);">
                        <i class="bi bi-journal-richtext stat-icon-premium"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number-premium" data-count="{{ \App\Models\Contenu::count() }}">0</div>
                        <div class="stat-label-premium">Contenus Culturels</div>
                        <div class="stat-description">Articles, documents et ressources</div>
                    </div>
                </div>
                <div class="stat-card-premium">
                    <div class="stat-icon-wrapper" style="background: linear-gradient(135deg, #8B4513, #A0522D);">
                        <i class="bi bi-images stat-icon-premium"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number-premium" data-count="{{ \App\Models\Media::count() }}">0</div>
                        <div class="stat-label-premium">Médias Numériques</div>
                        <div class="stat-description">Images, vidéos et documents</div>
                    </div>
                </div>
                <div class="stat-card-premium">
                    <div class="stat-icon-wrapper" style="background: linear-gradient(135deg, #191970, #4169E1);">
                        <i class="bi bi-translate stat-icon-premium"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number-premium" data-count="{{ \App\Models\Langue::count() }}">0</div>
                        <div class="stat-label-premium">Langues Locales</div>
                        <div class="stat-description">Dialectes et langues préservées</div>
                    </div>
                </div>
                <div class="stat-card-premium">
                    <div class="stat-icon-wrapper" style="background: linear-gradient(135deg, #4B0082, #8A2BE2);">
                        <i class="bi bi-geo-alt stat-icon-premium"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number-premium" data-count="{{ \App\Models\Region::count() }}">0</div>
                        <div class="stat-label-premium">Régions Couvertes</div>
                        <div class="stat-description">Tout le territoire béninois</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contenus" class="section-padding recent-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title-dark">Contenus Récents</h2>
                <p class="section-subtitle-dark">
                    Découvrez les derniers articles et documents culturels ajoutés à notre plateforme
                </p>
                <a href="{{ route('contenus.index') }}" class="section-view-all">
                    Voir tous les contenus <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="content-preview-grid-premium">
                @php
                    $contenusRecents = \App\Models\Contenu::with(['typeContenu', 'region', 'langue', 'auteur'])
                        ->where('statut', 'publié')
                        ->orderBy('created_at', 'desc')
                        ->take(2)
                        ->get();
                @endphp

                @forelse($contenusRecents as $contenu)
                    @php
                        $regionColors = [
                            'Atacora' => '#2F4F4F',
                            'Donga' => '#228B22',
                            'Borgou' => '#191970',
                            'Alibori' => '#4B0082',
                            'Collines' => '#8B0000',
                            'Zou' => '#006400',
                            'Plateau' => '#20B2AA',
                            'Ouémé' => '#DAA520',
                            'Atlantique' => '#B8860B',
                            'Littoral' => '#8B4513',
                            'Mono' => '#8B008B',
                            'Couffo' => '#483D8B'
                        ];
                        $regionColor = $regionColors[$contenu->region->nom_region ?? ''] ?? '#191970';
                    @endphp

                    <div class="preview-card-premium">
                        <!-- Header coloré -->
                        <div class="preview-header" style="background: {{ $regionColor }};">
                            <div class="header-overlay-light"></div>
                            <div class="header-content">
                                <div class="type-badge">
                                    <i class="bi bi-tag-fill me-1"></i>
                                    {{ $contenu->typeContenu->nom ?? 'Article' }}
                                </div>
                                <h3 class="preview-title">{{ Str::limit($contenu->titre, 50) }}</h3>
                            </div>
                        </div>

                        <!-- Corps de la carte -->
                        <div class="preview-body">
                            <p class="preview-text">
                                {{ Str::limit(strip_tags($contenu->texte), 120) }}
                            </p>

                            <div class="preview-meta-grid">
                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                    <div class="meta-content">
                                        <div class="meta-label">Auteur</div>
                                        <div class="meta-value">{{ $contenu->auteur->prenom ?? 'Anonyme' }}</div>
                                    </div>
                                </div>

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    <div class="meta-content">
                                        <div class="meta-label">Région</div>
                                        <div class="meta-value">{{ $contenu->region->nom_region ?? 'Bénin' }}</div>
                                    </div>
                                </div>

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                    <div class="meta-content">
                                        <div class="meta-label">Date</div>
                                        <div class="meta-value">{{ $contenu->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-chat-left-text"></i>
                                    </div>
                                    <div class="meta-content">
                                        <div class="meta-label">Langue</div>
                                        <div class="meta-value">{{ $contenu->langue->nom_langue ?? 'Français' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer avec bouton -->
                        <div class="preview-footer">
                            <a href="{{ route('contenus.show', $contenu->id_contenu) }}" class="preview-btn">
                                <i class="bi bi-eye me-2"></i>
                                Lire l'article
                            </a>
                            <span class="time-ago">
                            <i class="bi bi-clock-history me-1"></i>
                            {{ $contenu->created_at->diffForHumans() }}
                        </span>
                        </div>
                    </div>
                @empty
                    <div class="preview-card-premium empty">
                        <div class="preview-header" style="background: #696969;">
                            <div class="header-content text-center">
                                <i class="bi bi-journal-text" style="font-size: 2rem; margin-bottom: 1rem;"></i>
                                <h3 class="preview-title">Aucun contenu récent</h3>
                            </div>
                        </div>
                        <div class="preview-body text-center">
                            <p class="preview-text">De nouveaux contenus seront bientôt publiés</p>
                            <a href="{{ route('user.contenus.create') }}" class="preview-btn">
                                <i class="bi bi-plus-circle me-2"></i>
                                Créer un contenu
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="medias" class="section-padding media-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title-dark">Médias Récents</h2>
                <p class="section-subtitle-dark">
                    Explorez notre dernière collection d'images et vidéos culturelles
                </p>
                <a href="{{ route('media.index') }}" class="section-view-all">
                    Voir tous les médias <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="media-grid-premium">
                @php
                    $mediasRecents = \App\Models\Media::with(['typeMedia', 'user'])
                        ->orderBy('created_at', 'desc')
                        ->take(4)
                        ->get();
                @endphp

                @forelse($mediasRecents as $media)
                    @php
                        $mediaType = $media->typeMedia->nom ?? 'Document';
                        $typeColors = [
                            'Image' => '#228B22',
                            'Vidéo' => '#191970',
                            'Audio' => '#8B4513',
                            'PDF' => '#8B0000',
                            'Document' => '#696969'
                        ];
                        $typeIcons = [
                            'Image' => 'bi-image',
                            'Vidéo' => 'bi-camera-video',
                            'Audio' => 'bi-music-note-beamed',
                            'PDF' => 'bi-file-earmark-pdf',
                            'Document' => 'bi-file-earmark-text'
                        ];
                        $typeColor = $typeColors[$mediaType] ?? '#696969';
                        $typeIcon = $typeIcons[$mediaType] ?? 'bi-file-earmark';
                    @endphp

                    <div class="media-card-premium">
                        <!-- Thumbnail -->
                        <div class="media-thumbnail-premium">
                            @if($mediaType == 'Image' && Storage::exists($media->Chemin))
                                <div class="thumbnail-container">
                                    <img src="{{ Storage::url($media->Chemin) }}"
                                         alt="{{ $media->description }}"
                                         class="media-image"
                                         loading="lazy">
                                    <div class="thumbnail-overlay">
                                        <a href="{{ route('medias.show', $media->id_media) }}" class="overlay-btn">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="media-placeholder" style="border-color: {{ $typeColor }};">
                                    <div class="placeholder-icon" style="color: {{ $typeColor }};">
                                        <i class="bi {{ $typeIcon }}"></i>
                                    </div>
                                    <div class="placeholder-text">{{ $mediaType }}</div>
                                </div>
                            @endif

                            <!-- Badges -->
                            <div class="media-badges">
                            <span class="type-badge" style="background: {{ $typeColor }};">
                                <i class="bi {{ $typeIcon }} me-1"></i>
                                {{ $mediaType }}
                            </span>
                                <span class="premium-badge">
                                <i class="bi bi-star-fill me-1"></i>
                                Premium
                            </span>
                            </div>
                        </div>

                        <!-- Contenu -->
                        <div class="media-content-premium">
                            <h4 class="media-title">
                                <a href="{{ route('media.show', $media->id_media) }}">
                                    {{ Str::limit($media->description, 40) }}
                                </a>
                            </h4>

                            <div class="media-meta-grid">
                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-calendar3"></i>
                                    </div>
                                    <div class="meta-content">
                                        <div class="meta-label">Ajouté</div>
                                        <div class="meta-value">{{ $media->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                    <div class="meta-content">
                                        <div class="meta-label">Par</div>
                                        <div class="meta-value">{{ $media->user->prenom ?? 'Anonyme' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="media-footer">
                                <div class="price-tag">
                                    <i class="bi bi-coin"></i>
                                    <span></span>
                                </div>
                                <a href="{{ route('media.show', $media->id_media) }}" class="media-btn">
                                    <i class="bi bi-eye me-2"></i>
                                    Voir
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="media-card-premium empty">
                        <div class="media-thumbnail-premium">
                            <div class="media-placeholder" style="border-color: #696969;">
                                <div class="placeholder-icon" style="color: #696969;">
                                    <i class="bi bi-images"></i>
                                </div>
                                <div class="placeholder-text">Aucun média</div>
                            </div>
                        </div>
                        <div class="media-content-premium text-center">
                            <h4 class="media-title">Galerie vide</h4>
                            <p class="media-description">Notre galerie sera bientôt enrichie</p>
                            <a href="{{ route('user.medias.create') }}" class="media-btn">
                                <i class="bi bi-cloud-upload me-2"></i>
                                Uploader un média
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        /* ===== NEW FONT FAMILY ===== */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Slab:wght@300;400;500;600&display=swap');

        * {
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        /* ===== NEW CARROUSEL STYLING ===== */
        .carousel-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .carousel-slider {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }

        .carousel-slide.active {
            opacity: 1;
        }

        .carousel-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation: fadeZoom 20s ease-in-out infinite;
            filter: brightness(0.8) contrast(1.1);
        }

        @keyframes fadeZoom {
            0% {
                transform: scale(1);
                filter: brightness(0.8) contrast(1.1);
            }
            50% {
                transform: scale(1.08);
                filter: brightness(0.9) contrast(1.2);
            }
            100% {
                transform: scale(1);
                filter: brightness(0.8) contrast(1.1);
            }
        }

        .carousel-caption {
            position: absolute;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 800px;
            text-align: center;
            z-index: 10;
            color: white;
            padding: 1.5rem 2rem;
            opacity: 0;
            transition: all 0.8s ease 0.4s;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .carousel-slide.active .carousel-caption {
            opacity: 1;
        }

        .carousel-caption h3 {
            font-family: 'Roboto Slab', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #FFFFFF;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            letter-spacing: 1px;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(25, 25, 112, 0.3), rgba(34, 139, 34, 0.2));
        }

        .carousel-controls {
            position: absolute;
            bottom: 30px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            z-index: 10;
        }

        .carousel-btn {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(8px);
            font-weight: 600;
            outline: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .carousel-btn:hover {
            background: rgba(34, 139, 34, 0.7);
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 25px rgba(34, 139, 34, 0.4);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* ===== HERO SECTION - COMPLETELY REDESIGNED ===== */
        .hero-section {
            position: relative;
            height: 100vh;
            min-height: 700px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            overflow: hidden;
            background: linear-gradient(135deg, #0a1929 0%, #1a3a5f 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 850px;
            padding: 3rem;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .hero-title {
            font-family: 'Roboto Slab', serif;
            font-size: 3.8rem;
            font-weight: 800;
            margin-bottom: 1.8rem;
            line-height: 1.15;
            letter-spacing: -0.5px;
            background: linear-gradient(45deg, #FFFFFF, #90EE90);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 30px rgba(144, 238, 144, 0.3);
        }

        .hero-accent {
            display: block;
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(45deg, #228B22, #90EE90);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            margin-top: 0.5rem;
        }

        .hero-accent::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 4px;
            background: linear-gradient(90deg, #228B22, #90EE90);
            border-radius: 2px;
        }

        .hero-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 3rem;
            line-height: 1.7;
            opacity: 0.9;
            font-weight: 400;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            color: #E0E0E0;
            padding: 0 2rem;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, #228B22, #32CD32);
            color: white;
            padding: 1.2rem 3rem;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 30px rgba(34, 139, 34, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Poppins', sans-serif;
            border: 2px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .btn-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-hero:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(34, 139, 34, 0.6);
            color: white;
        }

        .btn-hero:hover::before {
            left: 100%;
        }

        /* ===== STATISTICS SECTION - DARK THEME ===== */
        .stats-section {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: white;
            padding: 8rem 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 20% 80%, rgba(34, 139, 34, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(25, 25, 112, 0.15) 0%, transparent 50%);
        }

        .stats-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-family: 'Roboto Slab', serif;
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #FFFFFF;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 5px;
            background: linear-gradient(90deg, #228B22, #191970);
            border-radius: 3px;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: #B0B0B0;
            margin-bottom: 5rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            font-weight: 300;
            font-family: 'Poppins', sans-serif;
        }

        /* New Statistics Grid */
        .stats-grid-premium {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .stat-card-premium {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .stat-card-premium::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #228B22, #191970, #8B4513);
            z-index: -1;
            border-radius: 22px;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .stat-card-premium:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .stat-card-premium:hover::before {
            opacity: 1;
        }

        .stat-icon-wrapper {
            width: 90px;
            height: 90px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.4s;
        }

        .stat-card-premium:hover .stat-icon-wrapper {
            transform: rotate(15deg) scale(1.1);
        }

        .stat-icon-premium {
            font-size: 2.5rem;
            color: white;
        }

        .stat-content {
            flex: 1;
        }

        .stat-number-premium {
            font-family: 'Roboto Slab', serif;
            font-size: 3.8rem;
            font-weight: 900;
            margin-bottom: 0.8rem;
            color: #FFFFFF;
            line-height: 1;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #FFFFFF, #90EE90);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label-premium {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: #FFFFFF;
            letter-spacing: 0.5px;
            font-family: 'Poppins', sans-serif;
        }

        .stat-description {
            font-size: 0.95rem;
            color: #B0B0B0;
            opacity: 0.9;
            font-weight: 300;
        }

        /* ===== SECTION HEADER STYLING ===== */
        .section-header {
            margin-bottom: 4rem;
            text-align: center;
            position: relative;
        }

        .section-title-dark {
            font-family: 'Roboto Slab', serif;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            color: #1a1a2e;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        .section-title-dark::before {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: linear-gradient(90deg, #228B22, #191970);
            border-radius: 3px;
        }

        .section-subtitle-dark {
            font-size: 1.15rem;
            color: #666;
            margin-bottom: 2.5rem;
            max-width: 650px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        .section-view-all {
            display: inline-flex;
            align-items: center;
            color: #228B22;
            font-weight: 700;
            text-decoration: none;
            margin-top: 2rem;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            padding: 0.8rem 1.8rem;
            border-radius: 10px;
            background: rgba(34, 139, 34, 0.1);
            border: 2px solid rgba(34, 139, 34, 0.2);
            font-family: 'Poppins', sans-serif;
        }

        .section-view-all:hover {
            color: white;
            background: #228B22;
            transform: translateX(8px);
            box-shadow: 0 6px 20px rgba(34, 139, 34, 0.3);
            border-color: #228B22;
        }

        /* ===== CONTENT CARDS - NEW DESIGN ===== */
        .content-preview-grid-premium {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
        }

        .preview-card-premium {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.08);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .preview-card-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #228B22, #191970);
        }

        .preview-card-premium:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .preview-card-premium.empty {
            background: #f5f5f5;
        }

        .preview-header {
            position: relative;
            padding: 2.5rem 2rem;
            color: white;
            min-height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-overlay-light {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.4), rgba(0,0,0,0.2));
        }

        .header-content {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
        }

        .type-badge {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
            font-family: 'Poppins', sans-serif;
            max-width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .preview-title {
            font-family: 'Roboto Slab', serif;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: white;
            line-height: 1.4;
            text-shadow: 0 2px 5px rgba(0,0,0,0.4);
        }

        .preview-body {
            padding: 2.5rem 2rem;
            flex: 1;
        }

        .preview-text {
            color: #555;
            margin-bottom: 2rem;
            line-height: 1.7;
            font-size: 1.05rem;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        .preview-meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .meta-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .meta-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #228B22, #191970);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(34, 139, 34, 0.2);
        }

        .meta-content {
            flex: 1;
            min-width: 0;
        }

        .meta-label {
            font-size: 0.8rem;
            color: #666;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
            font-family: 'Poppins', sans-serif;
        }

        .meta-value {
            font-size: 1rem;
            color: #1a1a2e;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-family: 'Poppins', sans-serif;
        }

        .preview-footer {
            padding: 1.8rem 2rem;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-top: 1px solid rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .preview-btn {
            background: linear-gradient(135deg, #228B22, #32CD32);
            color: white;
            border: none;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1rem;
            box-shadow: 0 6px 20px rgba(34, 139, 34, 0.25);
            font-family: 'Poppins', sans-serif;
        }

        .preview-btn:hover {
            background: linear-gradient(135deg, #191970, #4169E1);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(25, 25, 112, 0.35);
            color: white;
        }

        .time-ago {
            font-size: 0.9rem;
            color: #666;
            display: flex;
            align-items: center;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        /* ===== MEDIA CARDS - NEW DESIGN ===== */
        .media-grid-premium {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .media-card-premium {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.08);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .media-card-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #191970, #8B4513);
        }

        .media-card-premium:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .media-card-premium.empty {
            background: #f5f5f5;
        }

        .media-thumbnail-premium {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: #f8f9fa;
        }

        .thumbnail-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .media-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .thumbnail-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(34, 139, 34, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .thumbnail-container:hover .thumbnail-overlay {
            opacity: 1;
        }

        .thumbnail-container:hover .media-image {
            transform: scale(1.1);
        }

        .overlay-btn {
            width: 65px;
            height: 65px;
            background: white;
            color: #228B22;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transform: scale(0.8);
            transition: transform 0.4s ease 0.1s;
        }

        .thumbnail-container:hover .overlay-btn {
            transform: scale(1);
        }

        .overlay-btn:hover {
            background: #191970;
            color: white;
            transform: scale(1.1) rotate(15deg);
        }

        .media-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 4px solid;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem;
        }

        .placeholder-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            transition: transform 0.5s ease;
        }

        .media-card-premium:hover .placeholder-icon {
            transform: rotate(20deg) scale(1.1);
        }

        .placeholder-text {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
        }

        .media-badges {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            display: flex;
            justify-content: space-between;
            pointer-events: none;
        }

        .media-badges .type-badge {
            background: rgba(0, 0, 0, 0.7);
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 700;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .premium-badge {
            background: linear-gradient(135deg, #FFD700, #FFEC8B);
            color: #8B7500;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .media-content-premium {
            padding: 2.5rem 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .media-title {
            font-family: 'Roboto Slab', serif;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.4;
            color: #1a1a2e;
        }

        .media-title a {
            color: #1a1a2e;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .media-title a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #228B22;
            transition: width 0.3s ease;
        }

        .media-title a:hover {
            color: #228B22;
        }

        .media-title a:hover::after {
            width: 100%;
        }

        .media-meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .media-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 2px solid #f0f0f0;
        }

        .price-tag {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-weight: 800;
            color: #228B22;
            font-size: 1.2rem;
            background: rgba(34, 139, 34, 0.1);
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            border: 2px solid rgba(34, 139, 34, 0.2);
            font-family: 'Poppins', sans-serif;
        }

        .price-tag i {
            font-size: 1.4rem;
            color: #191970;
        }

        .media-btn {
            background: linear-gradient(135deg, #191970, #4169E1);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1rem;
            box-shadow: 0 6px 20px rgba(25, 25, 112, 0.25);
            font-family: 'Poppins', sans-serif;
        }

        .media-btn:hover {
            background: linear-gradient(135deg, #8B4513, #A0522D);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.35);
            color: white;
        }

        /* ===== SECTIONS ===== */
        .section-padding {
            padding: 8rem 0;
        }

        .recent-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .media-section {
            background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3.2rem;
            }

            .hero-accent {
                font-size: 3.5rem;
            }

            .stats-grid-premium {
                grid-template-columns: repeat(2, 1fr);
            }

            .carousel-caption h3 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 992px) {
            .hero-section {
                min-height: 600px;
            }

            .hero-content {
                padding: 2.5rem;
                margin: 1rem;
            }

            .hero-title {
                font-size: 2.8rem;
            }

            .hero-accent {
                font-size: 3rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
                padding: 0 1rem;
            }

            .btn-hero {
                padding: 1.1rem 2.5rem;
                font-size: 1.1rem;
            }

            .section-title,
            .section-title-dark {
                font-size: 2.5rem;
            }

            .section-subtitle,
            .section-subtitle-dark {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 500px;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .hero-accent {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
                padding: 0;
            }

            .btn-hero {
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .section-title,
            .section-title-dark {
                font-size: 2rem;
            }

            .section-subtitle,
            .section-subtitle-dark {
                font-size: 1rem;
            }

            .carousel-controls {
                bottom: 20px;
                gap: 15px;
            }

            .carousel-btn {
                width: 45px;
                height: 45px;
                font-size: 1.3rem;
            }

            .carousel-caption {
                bottom: 80px;
                padding: 1rem 1.5rem;
            }

            .carousel-caption h3 {
                font-size: 1.8rem;
            }

            .stats-grid-premium {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .stat-card-premium {
                padding: 2rem 1.5rem;
            }

            .stat-icon-wrapper {
                width: 80px;
                height: 80px;
            }

            .stat-icon-premium {
                font-size: 2rem;
            }

            .stat-number-premium {
                font-size: 3rem;
            }

            .content-preview-grid-premium,
            .media-grid-premium {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .preview-meta-grid,
            .media-meta-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .section-padding {
                padding: 5rem 0;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }

            .hero-accent {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .stats-grid-premium {
                gap: 1.5rem;
            }

            .stat-card-premium {
                padding: 1.8rem 1.2rem;
            }

            .stat-number-premium {
                font-size: 2.5rem;
            }

            .section-title,
            .section-title-dark {
                font-size: 1.8rem;
            }

            .carousel-controls {
                bottom: 15px;
                gap: 10px;
            }

            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .carousel-caption {
                bottom: 70px;
                padding: 0.8rem 1.2rem;
            }

            .carousel-caption h3 {
                font-size: 1.4rem;
            }

            .section-padding {
                padding: 4rem 0;
            }

            .container {
                padding: 0 1.2rem;
            }

            .preview-footer,
            .media-footer {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }

        @media (max-width: 400px) {
            .hero-content {
                padding: 1.5rem;
            }

            .hero-title {
                font-size: 1.6rem;
            }

            .hero-accent {
                font-size: 1.8rem;
            }

            .carousel-caption {
                display: none;
            }

            .stat-icon-wrapper {
                width: 70px;
                height: 70px;
            }

            .stat-icon-premium {
                font-size: 1.8rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ===== CARROUSEL AUTO (6 secondes) =====
            let currentSlide = 0;
            const slides = document.querySelectorAll('.carousel-slide');
            const totalSlides = slides.length;
            let slideInterval;

            function goToSlide(n) {
                slides[currentSlide].classList.remove('active');
                currentSlide = (n + totalSlides) % totalSlides;
                slides[currentSlide].classList.add('active');
            }

            function nextSlide() {
                goToSlide(currentSlide + 1);
            }

            function startAutoSlide() {
                slideInterval = setInterval(nextSlide, 6000); // 6 secondes
            }

            // Démarrer le carrousel auto
            startAutoSlide();

            // Contrôles boutons
            document.querySelector('.next-btn').addEventListener('click', function() {
                clearInterval(slideInterval);
                nextSlide();
                setTimeout(startAutoSlide, 6000);
            });

            document.querySelector('.prev-btn').addEventListener('click', function() {
                clearInterval(slideInterval);
                goToSlide(currentSlide - 1);
                setTimeout(startAutoSlide, 6000);
            });

            // Navigation clavier
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    clearInterval(slideInterval);
                    goToSlide(currentSlide - 1);
                    setTimeout(startAutoSlide, 6000);
                } else if (e.key === 'ArrowRight') {
                    clearInterval(slideInterval);
                    nextSlide();
                    setTimeout(startAutoSlide, 6000);
                }
            });

            // Navigation tactile (swipe)
            const carousel = document.querySelector('.carousel-slider');
            let touchStartX = 0;
            let touchEndX = 0;

            carousel.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
                clearInterval(slideInterval);
            });

            carousel.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                setTimeout(startAutoSlide, 6000);
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        // Swipe gauche -> image suivante
                        nextSlide();
                    } else {
                        // Swipe droite -> image précédente
                        goToSlide(currentSlide - 1);
                    }
                }
            }

            // Pause auto-slide au survol
            carousel.addEventListener('mouseenter', () => {
                clearInterval(slideInterval);
            });

            carousel.addEventListener('mouseleave', () => {
                startAutoSlide();
            });

            // ===== ANIMATION DES CHIFFRES =====
            function animateCounter(element) {
                const target = parseInt(element.dataset.count);
                if (target === 0) {
                    element.textContent = '0';
                    return;
                }

                const duration = 1800;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        element.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            }

            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counters = entry.target.querySelectorAll('.stat-number-premium');
                        counters.forEach((counter, index) => {
                            setTimeout(() => {
                                animateCounter(counter);
                            }, index * 250);
                        });
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.3,
                rootMargin: '50px'
            });

            statsObserver.observe(document.querySelector('.stats-section'));

            // ===== ANIMATION DES CARTES =====
            const cardObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 200);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });

            // Observer les cartes de contenu
            document.querySelectorAll('.preview-card-premium').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px)';
                card.style.transition = 'all 0.7s cubic-bezier(0.4, 0, 0.2, 1)';
                cardObserver.observe(card);
            });

            // Observer les cartes média
            document.querySelectorAll('.media-card-premium').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px)';
                card.style.transition = 'all 0.7s cubic-bezier(0.4, 0, 0.2, 1)';
                cardObserver.observe(card);
            });

            // Observer les cartes de statistiques
            document.querySelectorAll('.stat-card-premium').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px)';
                card.style.transition = 'all 0.7s cubic-bezier(0.4, 0, 0.2, 1)';
                cardObserver.observe(card);
            });

            // ===== EFFET PARALLAXE =====
            document.querySelectorAll('.thumbnail-container').forEach(container => {
                container.addEventListener('mousemove', function(e) {
                    const img = this.querySelector('.media-image');
                    if (!img) return;

                    const x = e.clientX - this.getBoundingClientRect().left;
                    const y = e.clientY - this.getBoundingClientRect().top;

                    const moveX = (x / this.offsetWidth - 0.5) * 20;
                    const moveY = (y / this.offsetHeight - 0.5) * 20;

                    img.style.transform = `scale(1.1) translate(${moveX}px, ${moveY}px)`;
                });

                container.addEventListener('mouseleave', function() {
                    const img = this.querySelector('.media-image');
                    if (img) {
                        img.style.transform = 'scale(1.1) translate(0, 0)';
                    }
                });
            });

            // ===== SMOOTH SCROLL =====
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // ===== EFFET DE PARTICULES DANS LE HERO =====
            const heroSection = document.querySelector('.hero-section');
            if (heroSection) {
                const particleCount = 30;
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.style.position = 'absolute';
                    particle.style.width = Math.random() * 5 + 2 + 'px';
                    particle.style.height = particle.style.width;
                    particle.style.background = `rgba(144, 238, 144, ${Math.random() * 0.3 + 0.1})`;
                    particle.style.borderRadius = '50%';
                    particle.style.left = Math.random() * 100 + '%';
                    particle.style.top = Math.random() * 100 + '%';
                    particle.style.zIndex = '1';
                    particle.style.animation = `float ${Math.random() * 10 + 10}s linear infinite`;

                    const style = document.createElement('style');
                    style.textContent = `
                        @keyframes float {
                            0%, 100% {
                                transform: translate(0, 0);
                            }
                            50% {
                                transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px);
                            }
                        }
                    `;
                    document.head.appendChild(style);

                    heroSection.appendChild(particle);
                }
            }
        });
    </script>
@endsection
