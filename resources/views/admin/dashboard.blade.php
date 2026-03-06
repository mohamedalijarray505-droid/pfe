@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h1 style="margin-bottom:20px;">🎛️ Dashboard Admin</h1>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <!-- Card Utilisateurs -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.1); padding:20px; border-radius:12px;">
        <h3>👤 Utilisateurs</h3>
        <a href="{{ route('admin.users.index') }}" style="color:#3cff9e; text-decoration:underline;">Voir la liste</a>
    </div>

    <!-- Card Vidéos -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.1); padding:20px; border-radius:12px;">
        <h3>📹 Vidéos</h3>
        <a href="{{ route('admin.videos.index') }}" style="color:#3cff9e; text-decoration:underline;">Gérer les vidéos</a>
    </div>

    <!-- Card Catégories -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.1); padding:20px; border-radius:12px;">
        <h3>🏷️ Catégories</h3>
        <a href="{{ route('admin.categories.index') }}" style="color:#3cff9e; text-decoration:underline;">Voir les catégories</a>
    </div>

    <!-- Card Commentaires -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.1); padding:20px; border-radius:12px;">
        <h3>💬 Commentaires récents</h3>

        @forelse($comments as $comment)
            <div style="border-bottom:1px solid rgba(60,255,158,0.2); padding:10px 0;">
                <strong style="color:#3cff9e;">{{ $comment->user->name ?? 'Utilisateur' }}</strong>
                <span style="color:#aaa; font-size:12px; margin-left:8px;">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
                <p style="margin:5px 0; font-size:13px;">
                    {{ Str::limit($comment->content, 60) }}
                </p>
                <span style="font-size:12px; color:#aaa;">
                    🎬 {{ $comment->video->title ?? 'Vidéo' }}
                </span>

                <div style="margin-top:8px; display:flex; gap:8px;">
                    <form method="POST" action="{{ route('admin.comments.approve', $comment->id) }}">
                        @csrf 
                        <button style="background:rgba(60,255,158,0.2); color:#3cff9e; border:1px solid #3cff9e; border-radius:6px; padding:3px 10px; cursor:pointer; font-size:12px;">
                            ✔ Approuver
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}">
                        @csrf 
                        <button style="background:rgba(255,80,80,0.15); color:#ff5050; border:1px solid #ff5050; border-radius:6px; padding:3px 10px; cursor:pointer; font-size:12px;">
                            🗑 Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p style="color:#aaa; font-size:13px;">Aucun commentaire.</p>
        @endforelse

        <a href="{{ route('admin.comments.index') }}" style="display:inline-block; margin-top:12px; color:#3cff9e; text-decoration:underline; font-size:13px;">
            Voir tous les commentaires →
        </a>
    </div>

</div>  {{-- fin flex container --}}

<!-- Section Statistiques -->
<div style="margin-top:40px; background:rgba(255,255,255,0.05); padding:20px; border-radius:12px;">
    <h2 style="margin-bottom:20px;">📊 Statistiques des interactions</h2>
    <canvas id="interactionChart" height="100"></canvas>
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
            label: 'Live interactions',
            data: [0, 0, 0, 0, 0],
            borderColor: '#3cff9e',
            backgroundColor: 'rgba(60,255,158,0.2)',
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