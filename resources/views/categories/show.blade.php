@extends('layouts.app')

@section('title', $category->name)

@section('content')

<h1 style="margin-bottom:30px;">📂 {{ $category->name }}</h1>

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
<p>Aucune vidéo dans cette catégorie.</p>
@endif

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