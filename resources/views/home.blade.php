@extends('layouts.app')

@section('title', 'Accueil - Ellyssa FM')

@section('content')

<!-- BOUTON CONTACTER NOUS EN HAUT -->
<div style="text-align:right; margin-bottom:24px; margin-top:-18px;">
    <button onclick="document.getElementById('contactModal').style.display='flex'" class="see-more-btn" style="background:linear-gradient(135deg,#0f172a,#3cff9e);color:#fff;">
        <i class="fas fa-envelope"></i> Contacter Nous
    </button>
</div>

<!-- HERO PREMIUM -->
<div style="background: linear-gradient(135deg, #3cff9e 0%, #0f172a 100%); border-radius: 18px; box-shadow: 0 10px 40px #3cff9e33; padding: 40px 30px; margin-bottom: 40px; display: flex; align-items: center; gap: 32px; color: #fff; position: relative; overflow: hidden;">
    <div style="flex:1;">
        <h1 style="font-size:2.6rem; font-weight:700; margin-bottom:18px; letter-spacing:1px;">Bienvenue sur <span style='color:#3cff9e;'>Ellyssa FM</span></h1>
        <p style="font-size:1.2rem; opacity:0.92; margin-bottom:22px;">Retrouvez les meilleures vidéos, réactions et commentaires de notre communauté. Profitez d'une expérience premium, fluide et interactive !</p>
        <a href="#category-1" class="see-more-btn" style="margin-top:10px;">Découvrir <i class="fas fa-arrow-down"></i></a>
    </div>
    <div style="flex-shrink:0;">
        <img src="{{ asset('logo.png') }}" alt="Logo Ellyssa FM" style="width:120px; border-radius:16px; box-shadow:0 4px 24px #3cff9e44;">
    </div>
    <div style="position:absolute; top:0; right:0; width:120px; height:120px; background:radial-gradient(circle, #3cff9e33 60%, transparent 100%); z-index:0;"></div>
</div>

<h1 style="margin-bottom:30px; font-size:2rem; font-weight:600; color:#0f172a;">🎬 Contenu Ellyssa FM</h1>

@forelse($categories as $category)
<section id="category-{{ $category->id }}" style="margin-bottom:60px;">
    <h2 style="margin:40px 0 20px; font-size:1.8rem; color:#030303;">📂 {{ $category->name }}</h2>
    <a href="{{ route('categories.show', $category) }}"
       class="see-more-btn">
       <span>Voir toutes les vidéos</span>
       <i class="fas fa-arrow-right"></i>
    </a>
    <!-- ===== VIDÉOS ===== -->
    @if($category->videos->count())
    <div class="video-grid">
        @foreach($category->videos as $video)
        <div class="video-card">

            <!-- VIDEO -->
            <div class="video-wrapper">
                <iframe
                    src="{{ $video->embed_url }}"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>

            <!-- REACTIONS -->
            <div style="margin-top:12px;">
                <div class="reaction-box">
                    <button class="reaction-btn"
                        onclick="toggleReactions({{ $video->id }})">
                        👍 Réagir
                    </button>

                    <div class="reaction-popup" id="reactions-{{ $video->id }}">
                        <form method="POST" action="/videos/{{ $video->id }}/react">
                            @csrf
                            <button name="reaction" value="like">👍</button>
                            <button name="reaction" value="love">❤️</button>
                            <button name="reaction" value="sad">😢</button>
                            <button name="reaction" value="angry">😡</button>
                            <button name="reaction" value="support">🤝</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- STATS NOIR CADRES -->
            <div style="margin-top:10px; font-size:16px; font-family: 'Segoe UI', 'Arial', sans-serif; font-weight: bold; color: #111; display: flex; gap: 8px;">
                <span style="background: #f5f5f5; border: 1px solid #ccc; border-radius: 6px; padding: 6px 12px; display: flex; align-items: center; min-width: 60px; justify-content: center;">
                    👍 {{ $video->reactions->where('reaction','like')->count() }}
                </span>
                <span style="background: #f5f5f5; border: 1px solid #ccc; border-radius: 6px; padding: 6px 12px; display: flex; align-items: center; min-width: 60px; justify-content: center;">
                    ❤️ {{ $video->reactions->where('reaction','love')->count() }}
                </span>
                <span style="background: #f5f5f5; border: 1px solid #ccc; border-radius: 6px; padding: 6px 12px; display: flex; align-items: center; min-width: 60px; justify-content: center;">
                    😢 {{ $video->reactions->where('reaction','sad')->count() }}
                </span>
                <span style="background: #f5f5f5; border: 1px solid #ccc; border-radius: 6px; padding: 6px 12px; display: flex; align-items: center; min-width: 60px; justify-content: center;">
                    😡 {{ $video->reactions->where('reaction','angry')->count() }}
                </span>
                <span style="background: #f5f5f5; border: 1px solid #ccc; border-radius: 6px; padding: 6px 12px; display: flex; align-items: center; min-width: 60px; justify-content: center;">
                    🤝 {{ $video->reactions->where('reaction','support')->count() }}
                </span>
            </div>

            <!-- COMMENTS -->
            <div style="margin-top:15px;">
                @php
                    $comments = $video->comments()->where('status','approved')->with('user')->latest()->get();
                    $lastComment = $comments->first();
                @endphp
                <!-- DERNIER COMMENTAIRE ACCEPTÉ -->
                @if($lastComment)
                    <div style="margin-bottom:8px; background:rgba(60,255,158,0.07); padding:8px 12px; border-radius:8px;">
                        <strong style="color:#3cff9e;">{{ $lastComment->user->name ?? 'Utilisateur' }}</strong>
                        <span style="color:#aaa; font-size:12px; margin-left:8px;">{{ $lastComment->created_at->diffForHumans() }}</span>
                        <p style="margin:5px 0; font-size:13px; color:#0f172a;">{{ $lastComment->content }}</p>
                    </div>
                @endif
                <!-- BOUTON AFFICHER TOUS LES COMMENTAIRES -->
                @if($comments->count() > 1)
                    <button onclick="toggleComments({{ $video->id }})" style="margin-bottom:8px; background:#3cff9e; color:#000; border:none; border-radius:8px; padding:6px 16px; cursor:pointer; font-weight:600;">Afficher tous les commentaires</button>
                @endif
                <!-- LISTE TOUS LES COMMENTAIRES (masquée par défaut) -->
                <div id="comments-list-{{ $video->id }}" style="display:none; width:100%; margin-bottom:10px;">
                    @foreach($comments as $comment)
                        <div style="margin-top:10px; background:rgba(60,255,158,0.07); padding:8px 12px; border-radius:8px;">
                            <strong style="color:#3cff9e;">{{ $comment->user->name ?? 'Utilisateur' }}</strong>
                            <span style="color:#aaa; font-size:12px; margin-left:8px;">{{ $comment->created_at->diffForHumans() }}</span>
                            <p style="margin:5px 0; font-size:13px; color:#0f172a;">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
                <!-- FORMULAIRE DE COMMENTAIRE SOUS LA VIDEO -->
                <div style="width:100%; margin-top:12px;">
                    <form method="POST" action="/videos/{{ $video->id }}/comment" style="display:flex; gap:8px;">
                        @csrf
                        <input type="hidden" name="video_id" value="{{ $video->id }}">
                        <input type="text" name="content" placeholder="💬 Commentaire..." required
                               style="flex:1; padding:8px; border-radius:6px; border:none; outline:none; background:#fff; color:#1f2937;">
                        <button type="submit"
                            style="padding:8px 12px; border-radius:6px; border:none; background:#3cff9e; color:#000; cursor:pointer;">
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p style="opacity:0.6;">Aucune vidéo dans cette catégorie.</p>
    @endif
</section>
@empty
<p>Aucune catégorie disponible.</p>
@endforelse

<!-- MODAL CONTACT -->
<div id="contactModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.35); align-items:center; justify-content:center; z-index:9999;">
    <div style="background:#fff; padding:32px 24px; border-radius:16px; min-width:320px; max-width:90vw; box-shadow:0 8px 32px #3cff9e33; position:relative;">
        <button onclick="document.getElementById('contactModal').style.display='none'" style="position:absolute; top:12px; right:12px; background:none; border:none; font-size:22px; color:#0f172a; cursor:pointer;">&times;</button>
        <h2 style="margin-bottom:18px; color:#0f172a;"><i class="fas fa-paper-plane"></i> Envoyer un message à l'admin</h2>
        <form method="POST" action="{{ route('contact.send') }}" style="display:flex; flex-direction:column; gap:12px;">
            @csrf
            <input type="text" name="name" placeholder="Votre nom" required style="padding:8px; border-radius:6px; border:1px solid #eee;">
            <input type="email" name="email" placeholder="Votre email" required style="padding:8px; border-radius:6px; border:1px solid #eee;">
            <textarea name="message" placeholder="Votre message..." required style="padding:8px; border-radius:6px; border:1px solid #eee; min-height:80px;"></textarea>
            <button type="submit" style="background:linear-gradient(135deg,#0f172a,#3cff9e); color:#fff; border:none; border-radius:8px; padding:10px 0; font-weight:600; font-size:16px; cursor:pointer;">
                <i class="fas fa-paper-plane"></i> Envoyer
            </button>
        </form>
    </div>
</div>
<script>
// Fermer le modal si clic dehors
window.addEventListener('click', function(e) {
    const modal = document.getElementById('contactModal');
    if (modal && e.target === modal) {
        modal.style.display = 'none';
    }
});
</script>

@endsection

<script>
function toggleComments(videoId) {
    const el = document.getElementById('comments-list-' + videoId);
    if (el.style.display === 'none' || el.style.display === '') {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var contactBtn = document.querySelector('button[onclick*="contactModal"]');
    if(contactBtn) {
        contactBtn.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('contactModal').style.display = 'flex';
        });
    }
    window.addEventListener('click', function(e) {
        const modal = document.getElementById('contactModal');
        if (modal && e.target === modal) {
            modal.style.display = 'none';
        }
    });
});
</script>
