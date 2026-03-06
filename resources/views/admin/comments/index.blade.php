@extends('layouts.app')

@section('title', 'Modération des commentaires')

@section('content')

<h1 style="margin-bottom:20px;">💬 Modération des commentaires</h1>

{{-- Filtres --}}
<div style="display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap;">
    @foreach(['all' => 'Tous', 'pending' => 'En attente', 'approved' => 'Approuvés', 'rejected' => 'Rejetés'] as $val => $label)
        <a href="{{ route('admin.comments.index', ['status' => $val === 'all' ? null : $val]) }}"
           style="padding:8px 18px; border-radius:25px; text-decoration:none; font-size:14px;
                  background: {{ request('status', 'all') === $val ? '#3cff9e' : 'rgba(60,255,158,0.1)' }};
                  color: {{ request('status', 'all') === $val ? '#000' : '#3cff9e' }};
                  border: 1px solid #3cff9e;">
            {{ $label }}
        </a>
    @endforeach
</div>

{{-- Message flash --}}
@if(session('success'))
    <div style="background:rgba(60,255,158,0.15); border:1px solid #3cff9e; color:#3cff9e; padding:12px 18px; border-radius:10px; margin-bottom:20px;">
        ✅ {{ session('success') }}
    </div>
@endif

{{-- Grille de commentaires --}}
<div style="display:flex; flex-direction:column; gap:14px;">

    @forelse($comments as $comment)
    <div style="background:rgba(60,255,158,0.07); border:1px solid rgba(60,255,158,0.2); border-radius:12px; padding:16px 20px;">

        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">

            {{-- Infos utilisateur --}}
            <div>
                <strong style="color:#3cff9e;">{{ $comment->user->name ?? 'Utilisateur' }}</strong>
                <span style="color:#aaa; font-size:12px; margin-left:10px;">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
                <span style="margin-left:10px; font-size:12px; padding:3px 10px; border-radius:20px;
                    background:{{ $comment->status === 'approved' ? 'rgba(60,255,158,0.2)' : ($comment->status === 'rejected' ? 'rgba(255,80,80,0.2)' : 'rgba(255,200,0,0.2)') }};
                    color:{{ $comment->status === 'approved' ? '#3cff9e' : ($comment->status === 'rejected' ? '#ff5050' : '#ffc800') }};">
                    {{ ucfirst($comment->status) }}
                </span>
            </div>

            {{-- Actions --}}
            <div style="display:flex; gap:8px; flex-wrap:wrap;">

                @if($comment->status !== 'approved')
                <form method="POST" action="{{ route('admin.comments.approve', $comment->id) }}">
                    @csrf 
                    <button style="background:rgba(60,255,158,0.2); color:#3cff9e; border:1px solid #3cff9e; border-radius:20px; padding:6px 14px; cursor:pointer; font-size:13px;">
                        ✔ Approuver
                    </button>
                </form>
                @endif

                @if($comment->status !== 'rejected')
                <form method="POST" action="{{ route('admin.comments.reject', $comment->id) }}">
                    @csrf 
                    <button style="background:rgba(255,200,0,0.15); color:#ffc800; border:1px solid #ffc800; border-radius:20px; padding:6px 14px; cursor:pointer; font-size:13px;">
                        ✗ Rejeter
                    </button>
                </form>
                @endif

                <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}"
                      onsubmit="return confirm('Supprimer ce commentaire ?')">
                    @csrf @method('DELETE')
                    <button style="background:rgba(255,80,80,0.15); color:#ff5050; border:1px solid #ff5050; border-radius:20px; padding:6px 14px; cursor:pointer; font-size:13px;">
                        🗑 Supprimer
                    </button>
                </form>

            </div>
        </div>

        {{-- Contenu --}}
        <p style="margin:10px 0 6px; font-size:14px; color:#e2e8f0;">
            {{ $comment->content }}
        </p>

        {{-- Vidéo liée --}}
        <span style="font-size:12px; color:#aaa;">
            🎬 {{ $comment->video->title ?? 'Vidéo' }}
        </span>

    </div>
    @empty
        <p style="color:#aaa;">Aucun commentaire trouvé.</p>
    @endforelse

</div>

{{-- Pagination --}}
<div style="margin-top:24px;">
    {{ $comments->withQueryString()->links() }}
</div>

@endsection