<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture Benin - Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
    <!-- Add new fonts for different look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="{{ URL::asset('/adminlte/img/logo-culture-benin.png') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ URL::asset('/adminlte/css/adminlte.css') }}" />

    <!-- DataTables CSS (version stable) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        :root {
            --primary-color: #1a5fb4;
            --secondary-color: #26a269;
            --accent-color: #e5a50a;
            --dark-bg: #1e1e1e;
            --light-bg: #f8f9fa;
            --sidebar-bg: #ffffff;
            --sidebar-hover: #edf5ff;
            --sidebar-active: #1a5fb4;
            --header-bg: #ffffff;
            --card-bg: #ffffff;
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --border-color: #e2e8f0;
        }

        /* Body styling */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
        }

        .app-wrapper {
            background: transparent;
        }

        /* Custom Sidebar */
        .sidebar-custom {
            background-color: var(--sidebar-bg) !important;
            border-right: 1px solid var(--border-color);
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.05);
        }

        .sidebar-custom .nav-link {
            color: var(--text-primary) !important;
            border-radius: 8px;
            margin: 4px 12px;
            padding: 12px 16px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-custom .nav-link:hover {
            background-color: var(--sidebar-hover);
            color: var(--primary-color) !important;
            transform: translateX(8px);
            box-shadow: 0 4px 12px rgba(26, 95, 180, 0.1);
        }

        .sidebar-custom .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white !important;
            box-shadow: 0 6px 20px rgba(26, 95, 180, 0.25);
            font-weight: 600;
            border-left: 4px solid var(--accent-color);
        }

        .sidebar-custom .nav-link.active .nav-icon {
            color: white;
        }

        /* Sidebar brand area */
        .sidebar-brand.brand-custom {
            padding: 20px 15px;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }

        .brand-custom .brand-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .brand-custom .brand-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .brand-custom .brand-image {
            width: 42px;
            height: 42px;
            object-fit: contain;
            margin-right: 15px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.9);
            padding: 4px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .brand-custom .brand-link:hover .brand-image {
            transform: rotate(10deg) scale(1.1);
            background: white;
        }

        .brand-custom .brand-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: white;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .brand-custom .brand-link:hover .brand-text {
            color: #fff;
            letter-spacing: 0.8px;
        }

        /* Improved Header */
        .app-header {
            background: var(--header-bg);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid var(--border-color);
            height: 70px;
        }

        .app-header .navbar {
            height: 100%;
        }

        .app-header .nav-link {
            color: var(--text-primary) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .app-header .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }

        .user-image {
            width: 36px;
            height: 36px;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            box-shadow: 0 4px 12px rgba(26, 95, 180, 0.2);
        }

        /* User dropdown */
        .user-menu .dropdown-menu {
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            border-radius: 12px;
            overflow: hidden;
            margin-top: 8px;
        }

        .user-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 20px;
            text-align: center;
        }

        .user-header img {
            width: 80px;
            height: 80px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        /* Main content */
        .app-content-header {
            background: var(--header-bg);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid var(--border-color);
            padding: 20px 0;
            margin-bottom: 25px;
        }

        .app-content-header .container-fluid {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            position: relative;
        }

        .app-content-header .container-fluid::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        /* Main content area */
        .app-content {
            background: transparent;
        }

        .app-content .container-fluid {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border-color);
            padding: 30px;
        }

        /* Footer */
        .app-footer {
            background: var(--header-bg);
            box-shadow: 0 -2px 15px rgba(0, 0, 0, 0.05);
            border-top: 1px solid var(--border-color);
            margin-top: 30px;
            padding: 20px 0;
        }

        /* Nav headers in sidebar */
        .nav-header {
            color: var(--text-secondary) !important;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 25px 0 10px 20px;
            padding: 8px 16px;
            background: rgba(26, 95, 180, 0.05);
            border-radius: 8px;
            display: inline-block;
        }

        /* Icons in menu */
        .nav-icon {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
            color: var(--primary-color);
        }

        .nav-link.active .nav-icon {
            color: white;
        }

        /* Collapsed sidebar */
        .sidebar-collapsed .brand-custom .brand-text {
            display: none;
        }

        .sidebar-collapsed .brand-custom .brand-image {
            margin-right: 0;
            width: 38px;
            height: 38px;
        }

        .sidebar-collapsed .nav-link {
            justify-content: center;
            padding: 12px;
        }

        .sidebar-collapsed .nav-link p {
            display: none;
        }

        .sidebar-collapsed .nav-header {
            display: none;
        }

        /* DataTables styling */
        .dataTables_wrapper {
            padding: 15px 0;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 95, 180, 0.1);
            outline: none;
        }

        .dataTables_wrapper table.dataTable {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 8px !important;
            margin: 0 4px;
            border: 1px solid var(--border-color) !important;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--primary-color) !important;
            color: white !important;
            border-color: var(--primary-color) !important;
            transform: translateY(-2px);
        }

        /* Custom scrollbar for sidebar */
        .sidebar-wrapper {
            padding: 15px 10px;
        }

        .os-theme-light > .os-scrollbar > .os-scrollbar-track > .os-scrollbar-handle {
            background: rgba(26, 95, 180, 0.3);
        }

        .os-theme-light > .os-scrollbar:hover > .os-scrollbar-track > .os-scrollbar-handle {
            background: rgba(26, 95, 180, 0.5);
        }

        /* Toggle button in header */
        .app-header .nav-link[data-lte-toggle="sidebar"] {
            background: var(--sidebar-hover);
            border-radius: 10px;
            padding: 8px 12px;
            margin-right: 10px;
        }

        .app-header .nav-link[data-lte-toggle="sidebar"]:hover {
            background: var(--primary-color);
            color: white !important;
        }

        /* Search button in header */
        .app-header .nav-link[data-widget="navbar-search"] {
            background: var(--sidebar-hover);
            border-radius: 10px;
            padding: 8px 12px;
            margin-right: 10px;
        }

        .app-header .nav-link[data-widget="navbar-search"]:hover {
            background: var(--secondary-color);
            color: white !important;
        }

        /* Fullscreen button */
        .app-header .nav-link[data-lte-toggle="fullscreen"] {
            background: var(--sidebar-hover);
            border-radius: 10px;
            padding: 8px 12px;
            margin-right: 10px;
        }

        .app-header .nav-link[data-lte-toggle="fullscreen"]:hover {
            background: var(--accent-color);
            color: white !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar-custom .nav-link {
                margin: 4px 8px;
                padding: 10px 12px;
                font-size: 13px;
            }

            .brand-custom .brand-text {
                font-size: 16px;
            }

            .app-content-header .container-fluid {
                font-size: 1.2rem;
            }

            .app-content .container-fluid {
                padding: 20px 15px;
            }
        }

        @media (max-width: 576px) {
            .brand-custom .brand-image {
                width: 36px;
                height: 36px;
            }

            .brand-custom .brand-text {
                font-size: 14px;
            }

            .app-header .navbar-nav .nav-link span.d-none {
                display: none !important;
            }

            .user-menu .dropdown-toggle span {
                display: none;
            }
        }

        /* Animation for page transitions */
        .app-main {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom button styles */
        .btn-custom-primary {
            background: linear-gradient(135deg, var(--primary-color), #1e3a8a);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(26, 95, 180, 0.2);
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(26, 95, 180, 0.3);
            color: white;
        }

        .btn-custom-secondary {
            background: linear-gradient(135deg, var(--secondary-color), #1e7e34);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(38, 162, 105, 0.2);
        }

        .btn-custom-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(38, 162, 105, 0.3);
            color: white;
        }
    </style>

    @yield('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    <!-- Header -->
    <nav class="app-header navbar navbar-expand bg-white border-bottom">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <span class="nav-link text-dark fw-bold">Tableau de Bord Administratif</span>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                        <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                        <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                    </a>
                </li>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="{{ URL::asset('/adminlte/img/user2-160x160.jpg') }}" class="user-image rounded-circle shadow" alt="User Image" />
                        <span class="d-none d-md-inline">Administrateur</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <li class="user-header text-bg-primary">
                            <img src="{{ URL::asset('/adminlte/img/user2-160x160.jpg') }}" class="rounded-circle shadow" alt="User Image" />
                            <p class="mb-0 mt-2">
                                <strong>Administrateur</strong>
                                <small>Culture Benin</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="{{ route('profile.edit') }}" class="btn btn-custom-primary">
                                <i class="bi bi-person me-1"></i>Profil
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-custom-secondary float-end">
                                    <i class="bi bi-box-arrow-right me-1"></i>Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="app-sidebar sidebar-custom shadow ">
        <div class="sidebar-brand brand-custom">
            <a href="{{ url('/admin') }}" class="brand-link text-white">
                <img src="{{ URL::asset('/adminlte/img/logo-culture-benin.png') }}" alt="Culture Benin Logo" class="brand-image opacity-75 shadow" />
                <span class="brand-text fw-bold">ADMIN BENIN CULTURE</span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation">
                    <li class="nav-item">
                        <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') || request()->is('admin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Tableau de Bord</p>
                        </a>
                    </li>

                    <li class="nav-header mt-4">GESTION DU CONTENU</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.langues.index') }}" class="nav-link {{ request()->is('admin/langues*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-translate"></i>
                            <p>Langues</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.contenus.index') }}" class="nav-link {{ request()->is('admin/contenus*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-file-earmark-text"></i>
                            <p>Contenus</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.type_contenus.index') }}" class="nav-link {{ request()->is('admin/type_contenus*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-bookmark-check"></i>
                            <p>Types de Contenus</p>
                        </a>
                    </li>

                    <li class="nav-header mt-4">GESTION DES MÉDIAS</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.medias.index') }}" class="nav-link {{ request()->is('admin/medias*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-images"></i>
                            <p>Médias</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.type_medias.index') }}" class="nav-link {{ request()->is('admin/type_medias*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-tags-fill"></i>
                            <p>Types de Médias</p>
                        </a>
                    </li>

                    <li class="nav-header mt-4">GESTION DES UTILISATEURS</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-lock"></i>
                            <p>Rôles & Permissions</p>
                        </a>
                    </li>

                    <li class="nav-header mt-4">PARAMÈTRES</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.regions.index') }}" class="nav-link {{ request()->is('admin/regions*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-globe-americas"></i>
                            <p>Régions</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.commentaires.index') }}" class="nav-link {{ request()->is('admin/commentaires*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-chat-left-text"></i>
                            <p>Commentaires</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="app-main">
        <div class="app-content-header bg-white border-bottom">
            <div class="container-fluid py-3">
                <h1 class="mb-0">
                    @yield('title')
                </h1>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer bg-white border-top">
        <div class="container-fluid py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <strong class="text-primary">
                        <i class="bi bi-c-circle"></i> 2025 Benin Culture - Système de Gestion Administrative
                    </strong>
                </div>
                <div class="col-md-6 text-md-end">
                    <span class="text-muted">Version 2.1</span>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ URL::asset('/adminlte/js/adminlte.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector('.sidebar-wrapper');
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: 'os-theme-light',
                    autoHide: 'leave',
                    clickScroll: true,
                },
            });
        }

        // Add active class animation
        document.querySelectorAll('.nav-link.active').forEach(link => {
            link.style.animation = 'none';
            setTimeout(() => {
                link.style.animation = 'pulse 0.6s ease';
            }, 100);
        });

        // Add tooltips for collapsed sidebar
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Add CSS animation for pulse effect
        const style = document.createElement('style');
        style.textContent = `
                @keyframes pulse {
                    0% { box-shadow: 0 6px 20px rgba(26, 95, 180, 0.25); }
                    50% { box-shadow: 0 6px 30px rgba(26, 95, 180, 0.4); }
                    100% { box-shadow: 0 6px 20px rgba(26, 95, 180, 0.25); }
                }
            `;
        document.head.appendChild(style);
    });
</script>

@yield('scripts')
</body>
</html>
