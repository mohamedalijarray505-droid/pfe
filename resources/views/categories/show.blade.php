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

    <!-- STATS -->
    <div style="margin-top:10px; font-size:14px; opacity:.8;">
        👍 {{ $video->reactions->where('reaction','like')->count() }}
        ❤️ {{ $video->reactions->where('reaction','love')->count() }}
        😢 {{ $video->reactions->where('reaction','sad')->count() }}
        😡 {{ $video->reactions->where('reaction','angry')->count() }}
        🤝 {{ $video->reactions->where('reaction','support')->count() }}
    </div>

    <!-- COMMENTS -->
    <div style="margin-top:15px;">
                <form method="POST" action="/videos/{{ $video->id }}/comment" style="display:flex; gap:8px;">
                    @csrf
                    <input type="text" name="content" placeholder="💬 Commentaire..." required
                           style="flex:1; padding:8px; border-radius:6px; border:none; outline:none; background:rgba(255,255,255,0.1); color:#fff;">
                    <button type="submit" style="padding:8px 12px; border-radius:6px; border:none; background:#3cff9e; color:#000; cursor:pointer;">
                        Envoyer
                    </button>
                </form>
            </div>
</div>

@endforeach
</div>

@else
<p>Aucune vidéo dans cette catégorie.</p>
@endif

@endsection