<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ellyssa FM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --ellyssa-primary: #3cff9e;
            --ellyssa-dark: #020617;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
           background-image:
        url('data:image/svg+xml;utf8,<svg width="100%" height="220" viewBox="0 0 1440 220" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 120 Q 180 60 360 120 T 720 120 T 1080 120 T 1440 120 V220 H0Z" fill="rgba(60,255,158,0.18)"/><path d="M0 140 Q 180 80 360 140 T 720 140 T 1080 140 T 1440 140 V220 H0Z" fill="rgba(60,255,158,0.12)"/></svg>'),
        linear-gradient(135deg, #0f172a 0%, #3cff9e 100%);
    background-repeat: no-repeat;
    background-position: top center;
    background-size: 100% 220px, cover;
    opacity: 1;
        }

        .welcome-shell {
            position: relative;
            width: 100%;
            max-width: 980px;
            padding: 24px;
        }

        .welcome-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            margin: 18px;
            border-radius: 26px;
            background: radial-gradient(circle at top left, rgba(60,255,158,0.25), transparent 55%);
            opacity: 0.5;
            filter: blur(24px);
            z-index: -1;
        }

        .welcome-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
            gap: 28px;
            align-items: stretch;
        }

        .welcome-hero {
            padding: 34px 28px;
            border-radius: 24px;
            background: radial-gradient(circle at top left, rgba(60,255,158,0.22), transparent 65%),
                        linear-gradient(145deg, rgba(15,23,42,0.96), rgba(15,23,42,0.9));
            box-shadow: 0 24px 60px rgba(15,23,42,0.9);
            border: 1px solid rgba(148,163,184,0.35);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hero-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }

        .hero-logo {
            width: 62px;
            height: 62px;
            border-radius: 20px;
            background: radial-gradient(circle at top, rgba(60,255,158,0.65), rgba(15,23,42,0.95));
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 18px 40px rgba(60,255,158,0.65);
        }

        .hero-logo img {
            width: 44px;
            height: 44px;
            object-fit: contain;
        }

        .hero-title {
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: 0.04em;
        }

        .hero-subtitle {
            font-size: 0.95rem;
            color: #cbd5f5;
            opacity: 0.92;
            margin-bottom: 20px;
        }

        .hero-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        .hero-tag {
            font-size: 0.8rem;
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid rgba(148,163,184,0.6);
            color: #e5e7eb;
            background: rgba(15,23,42,0.8);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .hero-wave {
            margin-top: auto;
            font-size: 0.8rem;
            color: rgba(148,163,184,0.9);
        }

        .welcome-card {
            background: rgba(15, 23, 42, 0.96);
            padding: 32px 30px 28px;
            border-radius: 24px;
            width: 100%;
            max-width: 420px;
            margin-left: auto;
            border: 1px solid rgba(148,163,184,0.4);
            box-shadow:
                0 24px 70px rgba(15,23,42,1),
                0 0 0 1px rgba(15,23,42,0.9);
            position: relative;
            overflow: hidden;
            text-align: left;
        }

        .welcome-card::before {
            content: "";
            position: absolute;
            inset: -40%;
            background:
                radial-gradient(circle at 0% 0%, rgba(60,255,158,0.18), transparent 60%),
                radial-gradient(circle at 100% 100%, rgba(56,189,248,0.1), transparent 55%);
            opacity: 0.7;
            z-index: -1;
        }

        .welcome-card h1 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #f9fafb;
        }

        .welcome-card p {
            font-size: 0.95rem;
            opacity: 0.9;
            margin-bottom: 24px;
            color: #d1d5db;
        }

        .buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            flex: 1;
            min-width: 130px;
            padding: 12px 0;
            border-radius: 999px;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
            transition: all 0.25s ease;
            cursor: pointer;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login {
            border: 1px solid var(--ellyssa-primary);
            color: var(--ellyssa-primary);
            background: transparent;
        }

        .btn-login:hover {
            background: var(--ellyssa-primary);
            color: #020617;
            box-shadow: 0 14px 30px rgba(60,255,158,0.5);
        }

        .btn-register {
            background: linear-gradient(135deg, #3cff9e, #2fd88a);
            color: #020617;
            border: none;
            box-shadow: 0 16px 36px rgba(60,255,158,0.55);
        }

        .btn-register:hover {
            transform: translateY(-1px);
            box-shadow: 0 20px 46px rgba(60,255,158,0.7);
            filter: brightness(1.03);
        }

        footer {
            margin-top: 22px;
            font-size: 0.78rem;
            opacity: 0.6;
            color: #9ca3af;
        }

        @media (max-width: 900px) {
            .welcome-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .welcome-card {
                margin: 0 auto;
            }
        }

        @media (max-width: 640px) {
            .welcome-shell {
                padding: 16px;
            }

            .welcome-hero {
                padding: 24px 18px;
                border-radius: 18px;
            }

            .welcome-card {
                padding: 26px 20px 22px;
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="welcome-shell">
        <div class="welcome-grid">
            <div class="welcome-hero">
                <div>
                    <div class="hero-header">
                        <div class="hero-logo">
                            <img src="{{ asset('logo.png') }}" alt="Ellyssa FM">
                        </div>
                        <div>
                            <div class="hero-title">Ellyssa FM</div>
                            <div style="font-size:0.85rem;color:#9ca3af;">Radio, vidéos & communauté</div>
                        </div>
                    </div>
                    <p class="hero-subtitle">
                        Découvrez les productions radio, les vidéos de la communauté et réagissez en direct à l’actualité
                        d’Ellyssa FM avec une expérience pensée pour vous.
                    </p>
                    <div class="hero-tags">
                        <span class="hero-tag"><i class="fas fa-broadcast-tower"></i> Antenne & replays</span>
                        <span class="hero-tag"><i class="fas fa-heart"></i> Réactions & commentaires</span>
                        <span class="hero-tag"><i class="fas fa-users"></i> Communauté engagée</span>
                    </div>
                </div>
                <div class="hero-wave">
                    Conseil : créez un compte pour garder l’historique de vos réactions et commentaires.
                </div>
            </div>

            <div class="welcome-card">
                <h1>Bienvenue</h1>
                <p>Choisissez comment vous voulez accéder à l’univers Ellyssa FM.</p>

                <div class="buttons">
                    <a href="{{ route('login') }}" class="btn btn-login">
                        <i class="fas fa-right-to-bracket"></i>
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-register">
                        <i class="fas fa-user-plus"></i>
                        Créer un compte
                    </a>
                </div>

                <footer>
                    © {{ date('Y') }} Ellyssa FM — Tous droits réservés
                </footer>
            </div>
        </div>
    </div>

</body>
</html>
