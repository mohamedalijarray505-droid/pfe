<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Register | Ellyssa FM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    :root {
        --ellyssa-primary: #3cff9e;
        --ellyssa-dark: #020617;
        --ellyssa-card: rgba(15, 23, 42, 0.96);
        --ellyssa-border: rgba(60, 255, 158, 0.5);
    }

    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
       background-image:
        url('data:image/svg+xml;utf8,<svg width="100%" height="220" viewBox="0 0 1440 220" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 120 Q 180 60 360 120 T 720 120 T 1080 120 T 1440 120 V220 H0Z" fill="rgba(60,255,158,0.18)"/><path d="M0 140 Q 180 80 360 140 T 720 140 T 1080 140 T 1440 140 V220 H0Z" fill="rgba(60,255,158,0.12)"/></svg>'),
        linear-gradient(135deg, #0f172a 0%, #3cff9e 100%);
    background-repeat: no-repeat;
    background-position: top center;
    background-size: 100% 220px, cover;
    opacity: 1;
    }

    .auth-shell {
        position: relative;
        width: 100%;
        max-width: 980px;
        padding: 24px;
    }

    .auth-shell::before {
        content: "";
        position: absolute;
        inset: 0;
        margin: 18px;
        border-radius: 26px;
        background: radial-gradient(circle at top left, rgba(60,255,158,0.25), transparent 55%);
        opacity: 0.45;
        filter: blur(24px);
        z-index: -1;
    }

    .auth-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
        gap: 28px;
        align-items: stretch;
    }

    .auth-hero {
        padding: 32px 26px;
        border-radius: 24px;
        background: radial-gradient(circle at top left, rgba(60,255,158,0.22), transparent 65%),
                    linear-gradient(145deg, rgba(15,23,42,0.96), rgba(15,23,42,0.9));
        box-shadow: 0 24px 60px rgba(15,23,42,0.9);
        border: 1px solid rgba(148,163,184,0.35);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .auth-hero-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .auth-hero-logo {
        width: 54px;
        height: 54px;
        border-radius: 18px;
        background: radial-gradient(circle at top, rgba(60,255,158,0.55), rgba(15,23,42,0.95));
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 14px 35px rgba(60,255,158,0.55);
    }

    .auth-hero-logo img {
        width: 40px;
        height: 40px;
        object-fit: contain;
    }

    .auth-hero-title {
        font-size: 1.3rem;
        font-weight: 600;
        letter-spacing: 0.03em;
    }

    .auth-hero-subtitle {
        font-size: 0.95rem;
        color: #cbd5f5;
        opacity: 0.9;
        margin-bottom: 24px;
    }

    .auth-hero-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 18px;
    }

    .auth-badge {
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

    .auth-wave {
        margin-top: auto;
        font-size: 0.8rem;
        color: rgba(148,163,184,0.9);
    }

    .auth-card {
        background: var(--ellyssa-card);
        padding: 36px 32px 30px;
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
    }

    .auth-card::before {
        content: "";
        position: absolute;
        inset: -40%;
        background:
            radial-gradient(circle at 0% 0%, rgba(60,255,158,0.18), transparent 60%),
            radial-gradient(circle at 100% 100%, rgba(56,189,248,0.1), transparent 55%);
        opacity: 0.7;
        z-index: -1;
    }

    .auth-card-header {
        margin-bottom: 24px;
    }

    .auth-card-header h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0 0 6px;
        color: #f9fafb;
    }

    .auth-card-header p {
        margin: 0;
        font-size: 0.9rem;
        color: #9ca3af;
    }

    .auth-flash-errors {
        margin-bottom: 18px;
        font-size: 0.82rem;
        border-radius: 10px;
        padding: 9px 11px;
        background: rgba(239,68,68,0.12);
        border: 1px solid rgba(248,113,113,0.5);
        color: #fecaca;
        text-align: left;
    }

    .auth-flash-errors ul {
        margin: 0;
        padding-left: 18px;
    }

    .form-group {
        position: relative;
        margin-bottom: 18px;
        text-align: left;
    }

    .form-group label {
        display: block;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #9ca3af;
        margin-bottom: 6px;
    }

    .form-group input {
        width: 100%;
        padding: 11px 40px 11px 12px;
        border-radius: 12px;
        border: 1px solid rgba(148,163,184,0.7);
        outline: none;
        background: rgba(15,23,42,0.85);
        color: #f9fafb;
        font-size: 0.92rem;
        transition: border-color 0.18s ease, box-shadow 0.18s ease, background 0.18s ease;
    }

    .form-group input::placeholder {
        color: rgba(148,163,184,0.8);
    }

    .form-group input:focus {
        border-color: var(--ellyssa-primary);
        box-shadow: 0 0 0 1px rgba(60,255,158,0.7);
        background: rgba(15,23,42,1);
    }

    .form-group i {
        position: absolute;
        top: 34px;
        right: 13px;
        transform: translateY(-50%);
        color: var(--ellyssa-primary);
        font-size: 1.1rem;
    }

    .auth-submit {
        width: 100%;
        padding: 12px;
        border-radius: 999px;
        border: none;
        background: linear-gradient(135deg, #3cff9e, #2fd88a);
        color: #020617;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.98rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 18px 40px rgba(60,255,158,0.55);
        transition: transform 0.18s ease, box-shadow 0.18s ease, filter 0.18s ease;
    }

    .auth-submit:hover {
        transform: translateY(-1px);
        box-shadow: 0 22px 50px rgba(60,255,158,0.7);
        filter: brightness(1.03);
    }

    .auth-footer {
        margin-top: 18px;
        font-size: 0.85rem;
        color: #9ca3af;
        text-align: center;
    }

    .auth-footer a {
        color: var(--ellyssa-primary);
        text-decoration: none;
        font-weight: 500;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    @media (max-width: 900px) {
        .auth-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .auth-hero {
            order: 2;
        }

        .auth-card {
            order: 1;
            margin: 0 auto;
        }
    }

    @media (max-width: 640px) {
        .auth-shell {
            padding: 16px;
        }

        .auth-card {
            padding: 26px 20px 24px;
            border-radius: 20px;
        }

        .auth-hero {
            padding: 22px 18px;
            border-radius: 18px;
        }
    }
</style>
</head>
<body>

<div class="auth-shell">
    <div class="auth-grid">
        <div class="auth-hero">
            <div>
                <div class="auth-hero-header">
                    <div class="auth-hero-logo">
                        <img src="{{ asset('logo.png') }}" alt="Ellyssa FM">
                    </div>
                    <div>
                        <div class="auth-hero-title">Rejoignez Ellyssa FM</div>
                        <div style="font-size:0.8rem;color:#9ca3af;">Communauté, réactions & participation</div>
                    </div>
                </div>
                <p class="auth-hero-subtitle">
                    Créez votre compte pour réagir en direct, commenter les vidéos et rester informé de toute l’actualité de la radio.
                </p>
                <div class="auth-hero-badges">
                    <span class="auth-badge"><i class="bi bi-stars"></i> Expérience personnalisée</span>
                    <span class="auth-badge"><i class="bi bi-emoji-heart-eyes"></i> Réactions aux contenus</span>
                    <span class="auth-badge"><i class="bi bi-shield-lock"></i> Données protégées</span>
                </div>
            </div>
            <div class="auth-wave">
                Votre email reste confidentiel et ne sera utilisé que pour Ellyssa FM.
            </div>
        </div>

        <div class="auth-card">
            <div class="auth-card-header">
                <h2>Créer un compte</h2>
                <p>Quelques secondes pour rejoindre la communauté</p>
            </div>

            @if ($errors->any())
                <div class="auth-flash-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input id="name" type="text" name="name" placeholder="Votre nom et prénom" value="{{ old('name') }}" required>
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="vous@exemple.com" value="{{ old('email') }}" required>
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" placeholder="Choisissez un mot de passe" required>
                    <i class="bi bi-lock-fill"></i>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" required>
                    <i class="bi bi-lock-fill"></i>
                </div>
                <button type="submit" class="auth-submit">
                    S’inscrire
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </button>
            </form>

            <div class="auth-footer">
                Déjà un compte ?
                <a href="{{ route('login') }}">Connexion</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
