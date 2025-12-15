@extends('layouts.app')

@section('title', 'À Propos - Benin Culture')

@push('styles')
    <style>
        /* ===== COMPLETELY NEW ABOUT PAGE DESIGN ===== */
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }

        .about-page {
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
            min-height: calc(100vh - 180px);
            padding-top: 40px;
            padding-bottom: 80px;
            position: relative;
            overflow: hidden;
        }

        .about-page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 30%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 95, 180, 0.05) 0%, transparent 100%);
            z-index: 0;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        /* Hero Section - Redesigned */
        .about-hero {
            background: linear-gradient(135deg,
            rgba(26, 95, 180, 0.95) 0%,
            rgba(30, 58, 138, 0.9) 100%);
            border-radius: 28px;
            padding: 6rem 4rem;
            margin-bottom: 4rem;
            color: white;
            position: relative;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 25px 60px rgba(26, 95, 180, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .about-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 80%, rgba(229, 165, 10, 0.25) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(38, 162, 105, 0.25) 0%, transparent 50%);
            animation: gradientPulse 12s ease-in-out infinite alternate;
        }

        @keyframes gradientPulse {
            0% {
                opacity: 0.6;
                transform: scale(1);
            }
            100% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        .about-icon {
            width: 140px;
            height: 140px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(15px);
            border-radius: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            margin: 0 auto 3rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
            animation: floatRotate 8s ease-in-out infinite;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        @keyframes floatRotate {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
            }
            25% {
                transform: translateY(-20px) rotate(5deg);
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.35);
            }
            50% {
                transform: translateY(-10px) rotate(-5deg);
                box-shadow: 0 20px 45px rgba(0, 0, 0, 0.3);
            }
            75% {
                transform: translateY(-15px) rotate(3deg);
                box-shadow: 0 22px 48px rgba(0, 0, 0, 0.32);
            }
        }

        .about-hero h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            background: linear-gradient(45deg, #ffffff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .about-hero p {
            font-size: 1.4rem;
            opacity: 0.95;
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.8;
            font-weight: 400;
            color: #e2e8f0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Sections - New Design */
        .about-section {
            background: #ffffff;
            border-radius: 24px;
            padding: 4rem 3.5rem;
            margin-bottom: 3rem;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .about-section:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        }

        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #1a5fb4, #26a269, #e5a50a);
            border-radius: 24px 24px 0 0;
        }

        .section-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 2.5rem;
            position: relative;
            padding-bottom: 1.2rem;
            letter-spacing: -0.5px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 5px;
            background: linear-gradient(90deg, #1a5fb4, #26a269);
            border-radius: 3px;
        }

        .section-subtitle {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a5fb4;
            margin: 2.5rem 0 1.5rem;
            letter-spacing: -0.3px;
        }

        /* Mission Grid - New Design */
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .mission-card {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            text-align: center;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid #e2e8f0;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1a5fb4, #26a269);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mission-card:hover {
            transform: translateY(-15px) scale(1.02);
            background: #ffffff;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border-color: #1a5fb4;
        }

        .mission-card:hover::before {
            opacity: 1;
        }

        .mission-icon {
            font-size: 3.5rem;
            color: #1a5fb4;
            margin-bottom: 2rem;
            background: rgba(26, 95, 180, 0.12);
            padding: 1.8rem;
            border-radius: 24px;
            transition: all 0.4s ease;
        }

        .mission-card:hover .mission-icon {
            background: linear-gradient(135deg, #1a5fb4, #1e3a8a);
            color: white;
            transform: rotate(15deg) scale(1.1);
            box-shadow: 0 10px 30px rgba(26, 95, 180, 0.3);
        }

        .mission-card h3 {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            color: #1a1a2e;
            letter-spacing: -0.3px;
        }

        .mission-card p {
            color: #64748b;
            line-height: 1.8;
            margin: 0;
            flex-grow: 1;
            font-weight: 400;
            font-size: 1.05rem;
        }

        /* Notre Histoire - New Timeline */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 4rem auto 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #1a5fb4, #26a269, #e5a50a);
            border-radius: 2px;
        }

        .timeline-item {
            margin-bottom: 4rem;
            position: relative;
        }

        .timeline-year {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #1a5fb4, #1e3a8a);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 30px;
            font-weight: 800;
            font-size: 1.2rem;
            z-index: 2;
            box-shadow: 0 10px 25px rgba(26, 95, 180, 0.3);
            min-width: 120px;
            text-align: center;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .timeline-content {
            background: #f8fafc;
            padding: 2.5rem 3rem;
            border-radius: 20px;
            margin-top: 4rem;
            border-left: 5px solid #26a269;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1a5fb4, transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .timeline-item:hover .timeline-content {
            background: #ffffff;
            transform: translateX(10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .timeline-item:hover .timeline-content::before {
            opacity: 1;
        }

        .timeline-content h3 {
            margin-bottom: 1.2rem;
            color: #1a5fb4;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .timeline-content p {
            color: #64748b;
            line-height: 1.8;
            font-size: 1.05rem;
            margin: 0;
        }

        /* Nos Domaines - New Design */
        .domaines-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 2.5rem;
        }

        .domaine-card {
            background: linear-gradient(135deg, rgba(26, 95, 180, 0.08) 0%, rgba(38, 162, 105, 0.08) 100%);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            border: 2px solid rgba(26, 95, 180, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .domaine-card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            border-color: #1a5fb4;
            background: linear-gradient(135deg, rgba(26, 95, 180, 0.12) 0%, rgba(38, 162, 105, 0.12) 100%);
        }

        .domaine-icon {
            font-size: 3rem;
            color: #1a5fb4;
            margin-bottom: 1.5rem;
            transition: all 0.4s ease;
        }

        .domaine-card:hover .domaine-icon {
            color: #26a269;
            transform: rotate(10deg) scale(1.2);
        }

        .domaine-card h4 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            color: #1a1a2e;
            letter-spacing: -0.3px;
        }

        .domaine-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .domaine-card li {
            padding: 0.7rem 0;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .domaine-card li:hover {
            color: #1a5fb4;
            transform: translateX(5px);
        }

        .domaine-card li i {
            color: #26a269;
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .domaine-card li:hover i {
            transform: scale(1.3);
            color: #1a5fb4;
        }

        /* Valeurs - New Design */
        .values-list {
            list-style: none;
            padding: 0;
            max-width: 800px;
            margin: 3rem auto 0;
        }

        .value-item {
            display: flex;
            align-items: flex-start;
            gap: 2.5rem;
            margin-bottom: 3rem;
            padding: 2.5rem;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: 20px;
            border-left: 6px solid #1a5fb4;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .value-item:hover {
            transform: translateX(15px) translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            border-left-color: #26a269;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }

        .value-icon {
            font-size: 3rem;
            color: #1a5fb4;
            flex-shrink: 0;
            background: rgba(26, 95, 180, 0.12);
            padding: 1.5rem;
            border-radius: 20px;
            transition: all 0.4s ease;
        }

        .value-item:hover .value-icon {
            background: linear-gradient(135deg, #1a5fb4, #1e3a8a);
            color: white;
            transform: rotate(15deg) scale(1.1);
            box-shadow: 0 10px 25px rgba(26, 95, 180, 0.3);
        }

        .value-content h3 {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #1a1a2e;
            letter-spacing: -0.3px;
        }

        .value-content p {
            color: #64748b;
            line-height: 1.8;
            margin: 0;
            font-size: 1.05rem;
        }

        /* Statistiques - New Design */
        .stats-about {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2.5rem;
            margin-top: 4rem;
        }

        .stat-about {
            text-align: center;
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(26, 95, 180, 0.3);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.15);
        }

        .stat-about:hover {
            transform: translateY(-15px) scale(1.05);
            box-shadow: 0 25px 50px rgba(26, 95, 180, 0.4);
            background: linear-gradient(135deg, #1e3a8a 0%, #1a5fb4 100%);
        }

        .stat-about::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            right: -50%;
            bottom: -50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: statPulse 4s linear infinite;
        }

        @keyframes statPulse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .stat-number {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 0.8rem;
            line-height: 1;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 1.2rem;
            opacity: 0.95;
            font-weight: 600;
            position: relative;
            z-index: 1;
            letter-spacing: 0.5px;
        }

        /* Équipe - New Design */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .team-member {
            text-align: center;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .team-member:hover {
            transform: translateY(-15px) scale(1.03);
            background: #ffffff;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
            border-color: #26a269;
        }

        .member-avatar {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a5fb4 0%, #26a269 100%);
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
            box-shadow: 0 15px 35px rgba(26, 95, 180, 0.3);
            transition: all 0.4s ease;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .team-member:hover .member-avatar {
            transform: rotate(15deg) scale(1.1);
            background: linear-gradient(135deg, #26a269 0%, #1e7e34 100%);
            box-shadow: 0 20px 40px rgba(38, 162, 105, 0.4);
        }

        .member-name {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 0.8rem;
            color: #1a1a2e;
            letter-spacing: -0.3px;
        }

        .member-role {
            color: #1a5fb4;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .team-member:hover .member-role {
            color: #26a269;
        }

        .member-desc {
            color: #64748b;
            line-height: 1.8;
            font-size: 1rem;
            margin: 0;
        }

        /* CTA - New Design */
        .cta-section {
            background: linear-gradient(135deg,
            rgba(26, 95, 180, 0.12) 0%,
            rgba(38, 162, 105, 0.1) 100%);
            border-radius: 28px;
            padding: 6rem 5rem;
            text-align: center;
            margin-top: 5rem;
            border: 3px solid #1a5fb4;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(26, 95, 180, 0.2);
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            right: -50%;
            bottom: -50%;
            background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.15) 0%, transparent 50%);
            animation: rotateCTA 20s linear infinite;
            z-index: 0;
        }

        @keyframes rotateCTA {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .cta-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.2rem;
            font-weight: 900;
            margin-bottom: 2rem;
            color: #1a1a2e;
            position: relative;
            z-index: 1;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cta-text {
            font-size: 1.4rem;
            color: #64748b;
            margin-bottom: 3rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
            position: relative;
            z-index: 1;
            font-weight: 400;
        }

        .cta-buttons {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .btn-cta {
            padding: 1.3rem 3rem;
            border-radius: 16px;
            font-weight: 700;
            font-size: 1.2rem;
            text-decoration: none;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn-cta:hover::before {
            left: 100%;
        }

        .btn-cta-primary {
            background: linear-gradient(135deg, #1a5fb4 0%, #1e3a8a 100%);
            color: white;
            box-shadow: 0 15px 35px rgba(26, 95, 180, 0.3);
        }

        .btn-cta-primary:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 25px 50px rgba(26, 95, 180, 0.4);
            color: white;
        }

        .btn-cta-secondary {
            background: transparent;
            color: #26a269;
            border-color: #26a269;
            box-shadow: 0 10px 25px rgba(38, 162, 105, 0.15);
        }

        .btn-cta-secondary:hover {
            background: #26a269;
            color: white;
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 20px 40px rgba(38, 162, 105, 0.3);
            border-color: #26a269;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .about-hero {
                padding: 5rem 3rem;
            }

            .about-hero h1 {
                font-size: 3.2rem;
            }

            .about-section {
                padding: 3.5rem 3rem;
            }

            .section-title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 992px) {
            .about-container {
                padding: 0 1.5rem;
            }

            .about-hero {
                padding: 4rem 2.5rem;
                margin-bottom: 3rem;
            }

            .about-hero h1 {
                font-size: 2.8rem;
            }

            .about-hero p {
                font-size: 1.3rem;
            }

            .about-icon {
                width: 120px;
                height: 120px;
                font-size: 3.5rem;
                margin-bottom: 2.5rem;
            }

            .mission-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2.5rem;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-year {
                left: 30px;
                transform: none;
            }

            .timeline-content {
                margin-left: 100px;
            }

            .cta-section {
                padding: 5rem 3rem;
            }

            .cta-title {
                font-size: 2.8rem;
            }
        }

        @media (max-width: 768px) {
            .about-container {
                padding: 0 1rem;
            }

            .about-hero {
                padding: 3.5rem 2rem;
            }

            .about-hero h1 {
                font-size: 2.4rem;
            }

            .about-hero p {
                font-size: 1.2rem;
            }

            .about-icon {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }

            .about-section {
                padding: 3rem 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .mission-grid, .domaines-grid, .team-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }

            .value-item {
                flex-direction: column;
                text-align: center;
                align-items: center;
                gap: 2rem;
            }

            .value-icon {
                margin: 0 auto;
            }

            .cta-section {
                padding: 4rem 2rem;
            }

            .cta-title {
                font-size: 2.2rem;
            }

            .cta-text {
                font-size: 1.2rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
            }

            .btn-cta {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .stats-about {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .about-hero h1 {
                font-size: 2rem;
            }

            .about-hero p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .timeline-year {
                position: relative;
                left: 0;
                transform: none;
                display: inline-block;
                margin-bottom: 1rem;
            }

            .timeline-content {
                margin-left: 0;
                margin-top: 1rem;
            }

            .stats-about {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 3rem;
            }

            .cta-title {
                font-size: 1.9rem;
            }

            .mission-card, .domaine-card, .team-member {
                padding: 2.5rem 1.5rem;
            }
        }

        @media (max-width: 400px) {
            .about-hero {
                padding: 3rem 1.5rem;
            }

            .about-hero h1 {
                font-size: 1.8rem;
            }

            .cta-title {
                font-size: 1.7rem;
            }

            .btn-cta {
                padding: 1.2rem 2rem;
                font-size: 1.1rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="about-page" id="apropos">
        <div class="about-container">
            <!-- Hero Section -->
            <div class="about-hero">
                <div class="about-icon">
                    <i class="bi bi-globe-africa"></i>
                </div>
                <h1>Benin Culture</h1>
                <p>
                    La plateforme numérique pionnière pour la préservation, la documentation
                    et la valorisation du patrimoine culturel béninois. Depuis 2025,
                    nous nous engageons à capturer l'essence de notre culture pour les
                    générations présentes et futures.
                </p>
            </div>

            <!-- Notre Mission -->
            <div class="about-section">
                <h2 class="section-title">Notre Mission</h2>
                <p style="font-size: 1.3rem; line-height: 1.9; color: #64748b; margin-bottom: 2rem; font-weight: 400;">
                    Benin Culture a pour vocation de construire une encyclopédie numérique vivante
                    du patrimoine culturel béninois. Nous combinons innovation technologique
                    et rigueur académique pour préserver l'authenticité de nos traditions
                    tout en les rendant accessibles au monde entier.
                </p>

                <div class="mission-grid">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="bi bi-archive-fill"></i>
                        </div>
                        <h3>Documenter</h3>
                        <p>
                            Collecter, numériser et archiver systématiquement les éléments
                            du patrimoine culturel béninois avec une approche méthodologique rigoureuse.
                        </p>
                    </div>

                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <h3>Préserver</h3>
                        <p>
                            Protéger les traditions, langues, arts et savoirs ancestraux
                            contre l'érosion culturelle et les menaces de standardisation globale.
                        </p>
                    </div>

                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="bi bi-megaphone-fill"></i>
                        </div>
                        <h3>Valoriser</h3>
                        <p>
                            Mettre en lumière la richesse culturelle béninoise à l'échelle internationale,
                            en révélant sa diversité et son caractère unique au monde.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Notre Histoire -->
            <div class="about-section">
                <h2 class="section-title">Notre Histoire</h2>

                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-year">2025</div>
                        <div class="timeline-content">
                            <h3>Fondation de Benin Culture</h3>
                            <p>
                                Naissance de la plateforme suite au constat de l'urgence
                                de préserver le patrimoine culturel face à la mondialisation.
                                Une équipe multidisciplinaire se rassemble pour créer
                                la première encyclopédie numérique exhaustive dédiée à la culture béninoise.
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-year">2026</div>
                        <div class="timeline-content">
                            <h3>Expansion et reconnaissance</h3>
                            <p>
                                Lancement des premières collaborations avec institutions culturelles,
                                universités et communautés locales. Établissement d'un réseau national
                                de contributeurs bénévoles couvrant l'ensemble du territoire béninois.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nos Domaines d'Action -->
            <div class="about-section">
                <h2 class="section-title">Nos Domaines d'Action</h2>
                <p style="font-size: 1.3rem; color: #64748b; margin-bottom: 2rem; font-weight: 400;">
                    Benin Culture explore la richesse culturelle béninoise à travers
                    plusieurs axes thématiques interconnectés et complémentaires :
                </p>

                <div class="domaines-grid">
                    <div class="domaine-card">
                        <div class="domaine-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <h4>Patrimoine Immatériel</h4>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Traditions orales et récits ancestraux</li>
                            <li><i class="bi bi-check-circle-fill"></i> Musiques et danses traditionnelles</li>
                            <li><i class="bi bi-check-circle-fill"></i> Savoirs artisanaux et techniques</li>
                            <li><i class="bi bi-check-circle-fill"></i> Pratiques rituelles et cérémonielles</li>
                        </ul>
                    </div>

                    <div class="domaine-card">
                        <div class="domaine-icon">
                            <i class="bi bi-egg-fried"></i>
                        </div>
                        <h4>Arts Culinaires</h4>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Recettes traditionnelles et plats emblématiques</li>
                            <li><i class="bi bi-check-circle-fill"></i> Techniques de préparation ancestrales</li>
                            <li><i class="bi bi-check-circle-fill"></i> Spécialités régionales et saisonnières</li>
                            <li><i class="bi bi-check-circle-fill"></i> Valeurs nutritionnelles et médicinales</li>
                        </ul>
                    </div>

                    <div class="domaine-card">
                        <div class="domaine-icon">
                            <i class="bi bi-mic-fill"></i>
                        </div>
                        <h4>Linguistique et Langues</h4>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Langues nationales et locales</li>
                            <li><i class="bi bi-check-circle-fill"></i> Dialectes et variations régionales</li>
                            <li><i class="bi bi-check-circle-fill"></i> Expressions idiomatiques et métaphores</li>
                            <li><i class="bi bi-check-circle-fill"></i> Proverbes et sagesses populaires</li>
                        </ul>
                    </div>

                    <div class="domaine-card">
                        <div class="domaine-icon">
                            <i class="bi bi-brush-fill"></i>
                        </div>
                        <h4>Arts Visuels et Plastiques</h4>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Sculptures et statuaires traditionnelles</li>
                            <li><i class="bi bi-check-circle-fill"></i> Peintures corporelles et scarifications</li>
                            <li><i class="bi bi-check-circle-fill"></i> Architecture vernaculaire et habitat</li>
                            <li><i class="bi bi-check-circle-fill"></i> Textiles, tissages et motifs symboliques</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Nos Valeurs -->
            <div class="about-section">
                <h2 class="section-title">Nos Valeurs Fondamentales</h2>

                <ul class="values-list">
                    <li class="value-item">
                        <div class="value-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <div class="value-content">
                            <h3>Authenticité et Intégrité</h3>
                            <p>
                                Nous nous engageons à présenter une représentation fidèle,
                                précise et respectueuse de la culture béninoise, en évitant
                                toute folklorisation ou adaptation réductrice.
                            </p>
                        </div>
                    </li>

                    <li class="value-item">
                        <div class="value-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="value-content">
                            <h3>Inclusion et Diversité</h3>
                            <p>
                                Toutes les communautés, régions et expressions culturelles
                                du Bénin ont leur place dans notre projet. Nous célébrons
                                la diversité comme une force et une richesse.
                            </p>
                        </div>
                    </li>

                    <li class="value-item">
                        <div class="value-icon">
                            <i class="bi bi-lightbulb-fill"></i>
                        </div>
                        <div class="value-content">
                            <h3>Innovation et Excellence</h3>
                            <p>
                                Nous utilisons la technologie comme levier de préservation
                                et de transmission, rendant la culture accessible et attractive
                                pour les nouvelles générations.
                            </p>
                        </div>
                    </li>

                    <li class="value-item">
                        <div class="value-icon">
                            <i class="bi bi-share-fill"></i>
                        </div>
                        <div class="value-content">
                            <h3>Partage et Transmission</h3>
                            <p>
                                Notre mission est de partager la richesse culturelle béninoise
                                avec le monde entier, dans un esprit d'ouverture, de générosité
                                et de transmission intergénérationnelle.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Notre Impact -->
            <div class="about-section">
                <h2 class="section-title">Notre Impact</h2>

                <div class="stats-about">
                    <div class="stat-about">
                        <div class="stat-number">850+</div>
                        <div class="stat-label">Contenus culturels documentés</div>
                    </div>

                    <div class="stat-about">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Régions couvertes</div>
                    </div>

                    <div class="stat-about">
                        <div class="stat-number">58</div>
                        <div class="stat-label">Langues préservées</div>
                    </div>

                    <div class="stat-about">
                        <div class="stat-number">18K+</div>
                        <div class="stat-label">Visiteurs mensuels</div>
                    </div>
                </div>
            </div>

            <!-- Notre Équipe -->
            <div class="about-section">
                <h2 class="section-title">Notre Équipe</h2>
                <p style="font-size: 1.3rem; color: #64748b; margin-bottom: 2rem; font-weight: 400;">
                    Une équipe pluridisciplinaire passionnée par la culture béninoise,
                    composée d'experts, de chercheurs et de technologues dévoués à notre mission.
                </p>

                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="member-name">Dr. Koffi Adékpété</div>
                        <div class="member-role">Anthropologue Culturel</div>
                        <p class="member-desc">
                            Expert en traditions orales et patrimoine immatériel,
                            ancien chercheur à l'Université d'Abomey-Calavi.
                        </p>
                    </div>

                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="member-name">Amina Salami</div>
                        <div class="member-role">Linguiste</div>
                        <p class="member-desc">
                            Spécialiste des langues béninoises, travaille sur la
                            préservation des langues en voie de disparition.
                        </p>
                    </div>

                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="member-name">Jean Kodjo</div>
                        <div class="member-role">Architecte Technologique</div>
                        <p class="member-desc">
                            Architecte de la plateforme, passionné par l'intersection
                            entre technologie et préservation culturelle.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="cta-section">
                <h2 class="cta-title">Rejoignez Notre Mission</h2>
                <p class="cta-text">
                    Ensemble, préservons et valorisons le riche patrimoine culturel du Bénin
                    pour les générations présentes et futures. Que vous soyez passionné,
                    chercheur, étudiant ou simplement curieux, il y a une place pour vous
                    dans cette aventure culturelle.
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('contenus.index') }}" class="btn-cta btn-cta-primary">
                        <i class="bi bi-compass me-2"></i>Explorer la Culture
                    </a>
                    <a href="{{ route('contact') }}" class="btn-cta btn-cta-secondary">
                        <i class="bi bi-envelope me-2"></i>Nous Contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection>
