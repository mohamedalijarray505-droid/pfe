@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('styles')
<style>
/* ===== ADMIN DASHBOARD THEME ===== */
.admin-dashboard {
    --admin-bg: #0f172a;
    --admin-accent: #3cff9e;
    --admin-accent-dim: rgba(60, 255, 158, 0.15);
    --admin-card: rgba(255, 255, 255, 0.95);
    --admin-text: #0f172a;
    --admin-text-muted: #64748b;
    --admin-border: rgba(60, 255, 158, 0.25);
    --admin-shadow: 0 8px 32px rgba(15, 23, 42, 0.12);
    --admin-radius: 16px;
    --admin-radius-sm: 10px;
}

.admin-dashboard .admin-hero {
    background: linear-gradient(135deg, var(--admin-bg) 0%, #1e293b 50%, var(--admin-accent-dim) 100%);
    border-radius: var(--admin-radius);
    box-shadow: var(--admin-shadow), 0 0 0 1px var(--admin-border);
    padding: 2rem 2.5rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 2rem;
    color: #fff;
    position: relative;
    overflow: hidden;
}

.admin-dashboard .admin-hero::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(60, 255, 158, 0.2) 0%, transparent 70%);
    z-index: 0;
}

.admin-dashboard .admin-hero-content { flex: 1; position: relative; z-index: 1; }
.admin-dashboard .admin-hero h1 {
    font-size: 1.85rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    letter-spacing: 0.5px;
}
.admin-dashboard .admin-hero h1 .admin-hero-accent { color: var(--admin-accent); }
.admin-dashboard .admin-hero p {
    font-size: 1rem;
    opacity: 0.9;
    margin: 0;
    max-width: 520px;
}
.admin-dashboard .admin-hero-logo {
    flex-shrink: 0;
    position: relative;
    z-index: 1;
}
.admin-dashboard .admin-hero-logo img {
    width: 72px;
    height: 72px;
    object-fit: cover;
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
}

.admin-dashboard .admin-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1.25rem;
}

.admin-dashboard .admin-card {
    background: var(--admin-card);
    border-radius: var(--admin-radius-sm);
    padding: 1.5rem;
    box-shadow: var(--admin-shadow);
    border: 1px solid rgba(60, 255, 158, 0.12);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.admin-dashboard .admin-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(60, 255, 158, 0.18);
}

.admin-dashboard .admin-card h3 {
    font-size: 1.1rem;
    color: var(--admin-text);
    margin-bottom: 0.75rem;
    font-weight: 600;
}

.admin-dashboard .admin-card-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--admin-accent);
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    transition: gap 0.2s ease;
}

.admin-dashboard .admin-card-link:hover {
    gap: 10px;
    text-decoration: underline;
}

.admin-dashboard .admin-card-comment {
    border-top: 1px solid var(--admin-border);
    padding-top: 0.75rem;
    margin-top: 0.5rem;
}

.admin-dashboard .admin-card-comment .comment-meta {
    font-size: 0.75rem;
    color: var(--admin-text-muted);
    margin-bottom: 4px;
}

.admin-dashboard .admin-card-comment .comment-author { color: var(--admin-accent); font-weight: 600; }
.admin-dashboard .admin-card-comment .comment-text {
    font-size: 0.85rem;
    color: var(--admin-text);
    margin: 6px 0;
    line-height: 1.4;
}

.admin-dashboard .admin-card-actions {
    display: flex;
    gap: 8px;
    margin-top: 10px;
}

.admin-dashboard .admin-btn {
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 600;
    cursor: pointer;
    border: none;
    transition: transform 0.15s ease, opacity 0.15s ease;
}

.admin-dashboard .admin-btn-approve {
    background: var(--admin-accent-dim);
    color: #059669;
    border: 1px solid var(--admin-accent);
}

.admin-dashboard .admin-btn-destroy {
    background: rgba(239, 68, 68, 0.12);
    color: #dc2626;
    border: 1px solid #dc2626;
}

.admin-dashboard .admin-btn:hover {
    transform: scale(1.03);
    opacity: 0.95;
}

.admin-dashboard .admin-section {
    background: var(--admin-card);
    border-radius: var(--admin-radius-sm);
    padding: 1.5rem;
    margin-top: 2rem;
    box-shadow: var(--admin-shadow);
    border: 1px solid rgba(60, 255, 158, 0.08);
}

.admin-dashboard .admin-section h2 {
    font-size: 1.25rem;
    color: var(--admin-text);
    margin-bottom: 1.25rem;
    font-weight: 600;
}

.admin-dashboard .admin-notif-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #e2e8f0;
}

.admin-dashboard .admin-notif-item:last-of-type { border-bottom: none; }

.admin-dashboard .admin-notif-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: var(--admin-accent-dim);
    color: var(--admin-accent);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.admin-dashboard .admin-notif-body strong { color: var(--admin-text); }
.admin-dashboard .admin-notif-body .admin-notif-meta { font-size: 0.8rem; color: var(--admin-text-muted); }
.admin-dashboard .admin-notif-body .admin-notif-content { font-size: 0.9rem; margin: 4px 0; color: var(--admin-text); }

.admin-dashboard .admin-see-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 1rem;
    padding: 10px 20px;
    background: linear-gradient(135deg, var(--admin-accent), #2fd88a);
    color: #0f172a;
    font-size: 0.9rem;
    font-weight: 600;
    border-radius: 999px;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 6px 20px rgba(60, 255, 158, 0.35);
}

.admin-dashboard .admin-see-more:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(60, 255, 158, 0.45);
}

.admin-dashboard #interactionChart { max-height: 280px; }
</style>
@endsection

@section('content')
<div class="admin-dashboard">
    <!-- Hero -->
    <div class="admin-hero">
        <div class="admin-hero-content">
            <h1>Dashboard <span class="admin-hero-accent">Admin</span></h1>
            <p>Gérez les utilisateurs, vidéos, catégories et commentaires avec une interface claire et des statistiques en temps réel.</p>
        </div>
        <div class="admin-hero-logo">
            <img src="{{ asset('logo.png') }}" alt="Logo Ellyssa FM">
        </div>
    </div>

    <!-- Cards -->
    <div class="admin-cards">
        <div class="admin-card">
            <h3>Utilisateurs</h3>
            <a href="{{ route('admin.users.index') }}" class="admin-card-link">Voir la liste <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <h3>Vidéos</h3>
            <a href="{{ route('admin.videos.index') }}" class="admin-card-link">Gérer les vidéos <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <h3>Catégories</h3>
            <a href="{{ route('admin.categories.index') }}" class="admin-card-link">Voir les catégories <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <h3>Commentaire récent</h3>
            @if($lastComment)
                <div class="admin-card-comment">
                    <div class="comment-meta">
                        <span class="comment-author">{{ $lastComment->user->name ?? 'Utilisateur' }}</span>
                        <span>{{ $lastComment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="comment-text">{{ Str::limit($lastComment->content, 60) }}</p>
                    <span class="admin-notif-meta">Vidéo : {{ $lastComment->video->title ?? '—' }}</span>
                    <div class="admin-card-actions">
                        <form method="POST" action="{{ route('admin.comments.approve', $lastComment->id) }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="admin-btn admin-btn-approve">Approuver</button>
                        </form>
                        <form method="POST" action="{{ route('admin.comments.destroy', $lastComment->id) }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="admin-btn admin-btn-destroy">Supprimer</button>
                        </form>
                    </div>
                </div>
            @else
                <p style="color: var(--admin-text-muted); font-size: 0.9rem;">Aucun commentaire.</p>
            @endif
            <a href="{{ route('admin.comments.index') }}" class="admin-card-link" style="margin-top: 10px;">Voir tous les commentaires <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="admin-section">
        <h2>Statistiques des interactions</h2>
        <canvas id="interactionChart" height="100"></canvas>
    </div>

    <!-- Notifications -->
    @if(isset($notifications) && $notifications->count())
        <div class="admin-section">
            <h2>Notifications</h2>
            @foreach($notifications as $notif)
                <div class="admin-notif-item">
                    <div class="admin-notif-icon"><i class="fas fa-envelope"></i></div>
                    <div class="admin-notif-body">
                        <strong>{{ $notif->data['name'] ?? 'Utilisateur' }}</strong>
                        <span class="admin-notif-meta">({{ $notif->data['email'] ?? '' }})</span>
                        <div class="admin-notif-content">{{ Str::limit($notif->data['content'] ?? '', 120) }}</div>
                        <span class="admin-notif-meta">{{ $notif->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('admin.notifications.index') }}" class="admin-see-more">Voir toutes les notifications <i class="fas fa-arrow-right"></i></a>
        </div>
    @else
        <div class="admin-section">
            <p style="color: var(--admin-text-muted);">Aucune notification reçue.</p>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('interactionChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Likes', 'Love', 'Sad', 'Angry', 'Support'],
        datasets: [{
            label: 'Interactions en direct',
            data: [0, 0, 0, 0, 0],
            borderColor: '#3cff9e',
            backgroundColor: 'rgba(60, 255, 158, 0.15)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        animation: false,
        scales: { y: { beginAtZero: true } }
    }
});
setInterval(() => {
    fetch('/admin/stats/reactions')
        .then(res => res.json())
        .then(data => {
            chart.data.datasets[0].data = [data.like, data.love, data.sad, data.angry, data.support];
            chart.update();
        })
        .catch(err => console.error(err));
}, 3000);
</script>
@endsection
