<!DOCTYPE html>
<html lang="fr" id="htmlTheme" class="theme-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ellyssa FM')</title>

    <!-- Favicon (logo) -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind (optionnel) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* ===== THÈMES (dark par défaut) ===== */
        body {
    font-family: 'Poppins', sans-serif;
    transition: background 0.4s ease, color 0.3s ease;
}
        html.theme-dark body {
    background: linear-gradient(135deg, #0f172a 0%, #3cff9e 100%) fixed;
    color: #1f2937;
    background-image:
        url('data:image/svg+xml;utf8,<svg width="100%" height="220" viewBox="0 0 1440 220" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 120 Q 180 60 360 120 T 720 120 T 1080 120 T 1440 120 V220 H0Z" fill="rgba(60,255,158,0.18)"/><path d="M0 140 Q 180 80 360 140 T 720 140 T 1080 140 T 1440 140 V220 H0Z" fill="rgba(60,255,158,0.12)"/></svg>'),
        linear-gradient(135deg, #0f172a 0%, #3cff9e 100%);
    background-repeat: no-repeat;
    background-position: top center;
    background-size: 100% 220px, cover;
}
        html.theme-light body {
    background: #e2e8f0;
    color: #0f172a;
    background-image: none;
}

        /* ===== NAVBAR ===== */
        .main-navbar {
            padding: 15px 25px;
            transition: background 0.4s ease;
        }
        html.theme-dark .main-navbar { background: #0f172a; }
        html.theme-light .main-navbar { background: #fff; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }

        .navbar-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 20px;
            color: #3cff9e;
            white-space: nowrap;
        }

        .navbar-center {
            flex: 1;
            overflow-x: auto;
        }

        .categories-bar {
            display: flex;
            gap: 15px;
            padding-bottom: 5px;
        }

        .categories-bar::-webkit-scrollbar {
            height: 4px;
        }

        .categories-bar::-webkit-scrollbar-thumb {
            background: #ffffff;
            border-radius: 5px;
        }

        .category-link {
            white-space: nowrap;
            padding: 8px 18px;
            background: rgba(231, 224, 224, 0.97);
            border-radius: 25px;
            color: #030303;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .category-link:hover {
            background: #ffffff;
            color: #000;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid #ff4d4d;
            color: #ff4d4d;
            padding: 10px 18px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
        }

        .logout-btn i {
            margin-right: 6px;
        }

        .logout-btn:hover {
            background: #ff4d4d;
            color: #000;
        }

        /* ===== CONTENT ===== */
        .container {
            padding: 30px;
        }
     /* ===============================
   VIDEO GRID (NETFLIX STYLE)
================================ */
.video-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
}

@media (max-width: 1024px) {
    .video-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 640px) {
    .video-grid { grid-template-columns: 1fr; }
}

/* ===============================
   VIDEO CARD PREMIUM
================================ */
.video-card {
    position: relative;
    background: rgb(255, 255, 255);
    border-radius: 18px;
    overflow: hidden;
    transition: transform .45s cubic-bezier(.4,0,.2,1),
                box-shadow .45s cubic-bezier(.4,0,.2,1);
}

/* Hover Lift */
.video-card:hover {
    transform: translateY(-10px) scale(1.04);
    box-shadow: 0 35px 80px rgba(60,255,158,.35);
    z-index: 20;
}

/* ===============================
   VIDEO PREVIEW
================================ */
.video-wrapper {
    position: relative;
    padding-top: 56.25%;
    overflow: hidden;
}

.video-wrapper iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    transition: transform .8s ease;
}

/* Smooth zoom */
.video-card:hover iframe {
    transform: scale(1.12);
}

/* ===============================
   GRADIENT OVERLAY
================================ */
.video-card::after {
     pointer-events: none;
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,.85),
        rgba(0,0,0,.15),
        transparent
    );
    opacity: 0;
    transition: opacity .45s ease;
}

.video-card:hover::after {
    opacity: 1;
}

/* ===============================
   ACTION BAR (REACTIONS + STATS)
================================ */
.video-actions {
    position: absolute;
    bottom: 14px;
    left: 14px;
    right: 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    opacity: 0;
    transform: translateY(14px);
    transition: all .45s ease;
    z-index: 10;
}

.video-card:hover .video-actions {
    opacity: 1;
    transform: translateY(0);
}

/* ===============================
   REACTION BUTTON (PREMIUM)
================================ */
.reaction-btn {
    background: linear-gradient(135deg, #3cff9e, #2fd88a);
    color: #000;
    padding: 9px 20px;
    border-radius: 30px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    box-shadow: 0 10px 25px rgba(60,255,158,.45);
    transition: transform .2s ease;
}

.reaction-btn:hover {
    transform: scale(1.08);
}

/* ===============================
   REACTION POPUP
================================ */
.reaction-box { position: relative; }

.reaction-popup {
    pointer-events: auto;
    position: absolute;
    bottom: 55px;
    left: 0;
    background: #0f172a;
    padding: 10px 14px;
    border-radius: 40px;
    display: none;
    box-shadow: 0 15px 40px rgba(0,0,0,.6);
}

.reaction-popup form {
    display: flex;
    gap: 10px;
}

.reaction-popup button {
    background: transparent;
    border: none;
    font-size: 26px;
    cursor: pointer;
    transition: transform .2s ease;
}

.reaction-popup button:hover {
    transform: scale(1.45);
}

/* ===============================
   STATS
================================ */
.video-stats {
    font-size: 13px;
    opacity: .9;
    display: flex;
    gap: 12px;
    font-weight: 500;
}

.chart-box {
    height: 350px;
}
.see-more-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-top: 14px;
    padding: 10px 20px;
    background: linear-gradient(135deg, #3cff9e, #2fd88a);
    color: #000;
    font-size: 14px;
    font-weight: 600;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.35s ease;
    box-shadow: 0 10px 25px rgba(60,255,158,0.35);
}

.see-more-btn i {
    transition: transform 0.3s ease;
}

.see-more-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 18px 40px rgba(60,255,158,0.5);
}

.see-more-btn:hover i {
    transform: translateX(5px);
}
/* =========================
   HERO BANNER
========================= */
.back-banner {
    width: 369px;      /* taille réelle */
    margin: 20px auto; /* centré */
    border-radius: 12px;
    overflow: hidden;
}

.back-banner img,
.back-banner video {
    width: 100%;
    height: auto;
    display: block;
}

/* Effet léger premium (sans flou) */
.back-banner:hover img,
.back-banner:hover video {
    transform: scale(1.03);
}

/* Overlay élégant */
.back-banner::after {
    content: "";
    position: absolute;
    inset: 0;

    pointer-events: none; /* 🔥 IMPORTANT */
}
/* ===== MENU CONTAINER ===== */
.menu-container {
    position: relative;
}

/* ===== MENU BUTTON ===== */
.menu-toggle {
    font-size: 22px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background 0.3s ease, color 0.3s ease;
}
html.theme-dark .menu-toggle { color: #ffffff; }
html.theme-dark .menu-toggle:hover { background: rgb(0, 0, 0); }
html.theme-light .menu-toggle { color: #0f172a; }
html.theme-light .menu-toggle:hover { background: #f1f5f9; }

/* ===== DROPDOWN MENU ===== */
.dropdown-menu {
    position: absolute;
    top: 45px;
    left: 0;
    width: 220px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgb(0, 0, 0);
    display: none;
    flex-direction: column;
    overflow: hidden;
    animation: fadeIn 0.25s ease;
    z-index: 999;
}

.dropdown-menu a {
    padding: 14px 18px;
    text-decoration: none;
    color: #030303;
    font-size: 14px;
    transition: background 0.25s ease;
}

.dropdown-menu a:hover {
    background: #f3f4f6;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== LOADER PREMIUM ===== */
.loader-premium {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: linear-gradient(135deg, #3cff9e 0%, #0f172a 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    transition: opacity 0.6s ease;
}
.loader-premium .loader-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 6px solid #fff;
    border-top: 6px solid #3cff9e;
    animation: spinLoader 1s linear infinite;
    box-shadow: 0 0 40px #3cff9e44;
}
@keyframes spinLoader {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
/* Animation d'apparition du contenu */
.fade-in-content {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInContent 1.2s cubic-bezier(.4,0,.2,1) forwards;
}
@keyframes fadeInContent {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== BOUTON DARK MODE ===== */
.theme-toggle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.4);
    background: transparent;
    color: #fff;
    cursor: pointer;
    margin-right: 12px;
    transition: background 0.3s, color 0.3s, border-color 0.3s;
}
html.theme-light .theme-toggle {
    border-color: rgba(15,23,42,0.2);
    color: #0f172a;
}
.theme-toggle:hover {
    background: rgba(255,255,255,0.15);
}
html.theme-light .theme-toggle:hover {
    background: #f1f5f9;
}

/* Mode clair : liens catégories */
html.theme-light .category-link {
    background: #fff;
    color: #0f172a;
    border: 1px solid #e2e8f0;
}
html.theme-light .category-link:hover {
    background: #f1f5f9;
    border-color: #3cff9e;
}

<!-- ===== LOADER PREMIUM ===== -->
<div class="loader-premium" id="loaderPremium">
    <div class="loader-icon"></div>
</div>

    </style>
    @yield('styles')
</head>
<body>


<!-- ===== HEADER ===== -->
<header class="main-navbar">
    <div class="navbar-container">

    <div class="menu-container">
    <button class="menu-toggle" onclick="toggleMenu()">
        ☰
    </button>

    <div class="dropdown-menu" id="dropdownMenu">
        <a href="{{ route('pages.about') }}">من نحن</a>
        <a href="{{ route('pages.charter') }}">ميثاق الشرف</a>
        <a href="{{ route('pages.editorial') }}">الخط التحريري</a>
        <a href="{{ route('pages.regulations') }}">القانون الداخلي</a>
    </div>
</div>

        <!-- LOGO -->
       <a href="/">
        <img src="{{ asset('logo.png') }}" alt="Ellyssa FM" style="height:80px;">
    </a>
    
    
        <!-- CATEGORIES -->
        <div class="navbar-center">
            <div class="categories-bar">
               @foreach($categories as $category)
              <a href="{{ route('categories.show', $category) }}"
              class="category-link">
              {{ $category->name }}
    </a>
         @endforeach
            </div>
        </div>

        <!-- AUTH + DARK MODE -->
        <div class="navbar-right">
            <button type="button" class="theme-toggle" id="themeToggle" aria-label="Mode sombre / clair" title="Changer le thème">
                <i class="fas fa-moon" id="themeIcon"></i>
            </button>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>
        
            @endauth
        </div>

    </div>
</header>

<div class="back-banner">
    <video src="https://elyssafm.tn/video/introfinal.mp4" autoplay loop muted playsinline></video>
</div>

<!-- ===== CONTENT ===== -->
<div class="container fade-in-content" id="mainContent">
    @yield('content')
</div>
<script>
function toggleReactions(videoId) {
    const popup = document.getElementById('reactions-' + videoId);

    // fermer les autres
    document.querySelectorAll('.reaction-popup').forEach(el => {
        if (el !== popup) el.style.display = 'none';
    });

    popup.style.display =
        popup.style.display === 'flex' ? 'none' : 'flex';
}
</script>
@yield('scripts')
<script>
function toggleMenu() {
    const menu = document.getElementById("dropdownMenu");
    menu.style.display = 
        menu.style.display === "flex" ? "none" : "flex";
}

/* Fermer si clique dehors */
window.addEventListener("click", function(e) {
    const container = document.querySelector(".menu-container");
    if (!container.contains(e.target)) {
        document.getElementById("dropdownMenu").style.display = "none";
    }
});

/* ===== DARK MODE ===== */
(function() {
    var KEY = 'ellyssa-theme';
    var html = document.getElementById('htmlTheme');
    var btn = document.getElementById('themeToggle');
    var icon = document.getElementById('themeIcon');
    function isDark() { return html.classList.contains('theme-dark'); }
    function setTheme(dark) {
        html.classList.remove('theme-dark', 'theme-light');
        html.classList.add(dark ? 'theme-dark' : 'theme-light');
        if (icon) {
            icon.className = dark ? 'fas fa-moon' : 'fas fa-sun';
        }
        try { localStorage.setItem(KEY, dark ? 'dark' : 'light'); } catch (e) {}
    }
    function toggleTheme() {
        setTheme(!isDark());
    }
    btn.addEventListener('click', toggleTheme);
    var saved = null;
    try { saved = localStorage.getItem(KEY); } catch (e) {}
    if (saved === 'light') setTheme(false);
    else if (saved === 'dark') setTheme(true);
    else setTheme(true);
})();
</script>
</body>
</html>
