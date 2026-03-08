@extends('layouts.app')

@section('title', 'Modération des commentaires')
@section('styles')
@include('admin.partials.admin-list-styles')
@endsection

@section('content')
<div class="admin-list-page">
    <div class="admin-list-header">
        <h2 class="admin-list-title">Modération des commentaires</h2>
    </div>

    <div class="admin-filters">
        @foreach(['all' => 'Tous', 'pending' => 'En attente', 'approved' => 'Approuvés', 'rejected' => 'Rejetés'] as $val => $label)
        <a href="{{ route('admin.comments.index', ['status' => $val === 'all' ? null : $val]) }}"
           class="admin-filter-link {{ request('status', 'all') === $val ? 'active' : '' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>

    @if(session('success'))
        <div class="admin-alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div style="display:flex; flex-direction:column; gap:12px;">
        @forelse($comments as $comment)
        <div class="admin-comment-card">
            <div class="comment-head">
                <div>
                    <span class="comment-author">{{ $comment->user->name ?? 'Utilisateur' }}</span>
                    <span class="comment-meta" style="margin-left:8px;">{{ $comment->created_at->diffForHumans() }}</span>
                    <span class="admin-badge
                        @if($comment->status === 'approved') admin-badge-approved
                        @elseif($comment->status === 'rejected') admin-badge-rejected
                        @else admin-badge-pending
                        @endif" style="margin-left:8px;">
                        {{ ucfirst($comment->status) }}
                    </span>
                </div>
                <div class="admin-comment-actions">
                    @if($comment->status !== 'approved')
                    <form method="POST" action="{{ route('admin.comments.approve', $comment->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="admin-btn admin-btn-success">Approuver</button>
                    </form>
                    @endif
                    @if($comment->status !== 'rejected')
                    <form method="POST" action="{{ route('admin.comments.reject', $comment->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="admin-btn admin-btn-warning">Rejeter</button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" style="display:inline;" onsubmit="return confirm('Supprimer ce commentaire ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-btn admin-btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
            <p class="comment-content">{{ $comment->content }}</p>
            <span class="comment-video">Vidéo : {{ $comment->video->title ?? '—' }}</span>
        </div>
        @empty
        <p class="admin-empty">Aucun commentaire trouvé.</p>
        @endforelse
    </div>

    <div style="margin-top:1.5rem;">
        {{ $comments->withQueryString()->links() }}
    </div>
</div>
@endsection
