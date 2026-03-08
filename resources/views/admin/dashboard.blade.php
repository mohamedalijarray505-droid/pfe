@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<!-- HERO ADMIN PREMIUM -->
<div style="background: linear-gradient(135deg, #0f172a 0%, #3cff9e 100%); border-radius: 18px; box-shadow: 0 10px 40px #3cff9e33; padding: 36px 30px; margin-bottom: 38px; display: flex; align-items: center; gap: 32px; color: #fff; position: relative; overflow: hidden;">
    <div style="flex:1;">
        <h1 style="font-size:2.2rem; font-weight:700; margin-bottom:18px; letter-spacing:1px;">🎛️ Dashboard <span style='color:#3cff9e;'>Admin</span></h1>
        <p style="font-size:1.1rem; opacity:0.92; margin-bottom:22px;">Gérez les utilisateurs, vidéos, catégories et commentaires avec une interface premium et des statistiques en temps réel.</p>
    </div>
    <div style="flex-shrink:0;">
        <img src="{{ asset('logo.png') }}" alt="Logo Ellyssa FM" style="width:90px; border-radius:16px; box-shadow:0 4px 24px #3cff9e44;">
    </div>
    <div style="position:absolute; top:0; right:0; width:120px; height:120px; background:radial-gradient(circle, #3cff9e33 60%, transparent 100%); z-index:0;"></div>
</div>

<div style="display:flex; gap:20px; flex-wrap:wrap;">
    <!-- Card Utilisateurs -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.13); padding:24px; border-radius:14px; box-shadow:0 4px 18px #3cff9e22;">
        <h3 style="font-size:1.2rem; color:#0f172a;">👤 Utilisateurs</h3>
        <a href="{{ route('admin.users.index') }}" style="color:#3cff9e; text-decoration:underline; font-weight:600;">Voir la liste</a>
    </div>
    <!-- Card Vidéos -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.13); padding:24px; border-radius:14px; box-shadow:0 4px 18px #3cff9e22;">
        <h3 style="font-size:1.2rem; color:#0f172a;">📹 Vidéos</h3>
        <a href="{{ route('admin.videos.index') }}" style="color:#3cff9e; text-decoration:underline; font-weight:600;">Gérer les vidéos</a>
    </div>
    <!-- Card Catégories -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.13); padding:24px; border-radius:14px; box-shadow:0 4px 18px #3cff9e22;">
        <h3 style="font-size:1.2rem; color:#0f172a;">🏷️ Catégories</h3>
        <a href="{{ route('admin.categories.index') }}" style="color:#3cff9e; text-decoration:underline; font-weight:600;">Voir les catégories</a>
    </div>
    <!-- Card Commentaires -->
    <div style="flex:1; min-width:200px; background:rgba(60,255,158,0.13); padding:24px; border-radius:14px; box-shadow:0 4px 18px #3cff9e22;">
        <h3 style="font-size:1.2rem; color:#0f172a;">💬 Commentaire récent</h3>
        @if($lastComment)
            <div style="border-bottom:1px solid rgba(60,255,158,0.2); padding:10px 0;">
                <strong style="color:#3cff9e;">{{ $lastComment->user->name ?? 'Utilisateur' }}</strong>
                <span style="color:#aaa; font-size:12px; margin-left:8px;">
                    {{ $lastComment->created_at->diffForHumans() }}
                </span>
                <p style="margin:5px 0; font-size:13px; color:#0f172a;">
                    {{ Str::limit($lastComment->content, 60) }}
                </p>
                <span style="font-size:12px; color:#aaa;">
                    🎬 {{ $lastComment->video->title ?? 'Vidéo' }}
                </span>
                <div style="margin-top:8px; display:flex; gap:8px;">
                    <form method="POST" action="{{ route('admin.comments.approve', $lastComment->id) }}">
                        @csrf 
                        <button style="background:rgba(60,255,158,0.2); color:#3cff9e; border:1px solid #3cff9e; border-radius:6px; padding:3px 10px; cursor:pointer; font-size:12px; font-weight:600;">
                            ✔ Approuver
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.comments.destroy', $lastComment->id) }}">
                        @csrf 
                        <button style="background:rgba(255,80,80,0.15); color:#ff5050; border:1px solid #ff5050; border-radius:6px; padding:3px 10px; cursor:pointer; font-size:12px; font-weight:600;">
                            🗑 Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @else
            <p style="color:#aaa; font-size:13px;">Aucun commentaire.</p>
        @endif
        <a href="{{ route('admin.comments.index') }}" style="display:inline-block; margin-top:12px; color:#3cff9e; text-decoration:underline; font-size:13px; font-weight:600;">
            Voir tous les commentaires →
        </a>
    </div>
</div>  {{-- fin flex container --}}

<!-- Section Statistiques -->
<div style="margin-top:40px; background:rgba(255,255,255,0.07); padding:24px; border-radius:14px; box-shadow:0 4px 18px #3cff9e22;">
    <h2 style="margin-bottom:20px; color:#0f172a;">📊 Statistiques des interactions</h2>
    <canvas id="interactionChart" height="100"></canvas>
</div>

<!-- Section Notifications -->
@if(isset($notifications) && $notifications->count())
    <div style="margin-top:40px; background:rgba(255,255,255,0.07); padding:24px; border-radius:14px; box-shadow:0 4px 18px #3cff9e22;">
        <h2 style="margin-bottom:20px; color:#0f172a;">🔔 Notifications</h2>
        @foreach($notifications as $notif)
            <div style="border-bottom:1px solid #eee; padding:14px 0; display:flex; align-items:center; gap:18px;">
                <div style="font-size:22px; color:#3cff9e;"><i class="fas fa-envelope"></i></div>
                <div style="flex:1;">
                    <strong>{{ $notif->data['name'] ?? 'Utilisateur' }}</strong> <span style="color:#aaa; font-size:13px;">({{ $notif->data['email'] ?? '' }})</span>
                    <div style="font-size:13px; color:#0f172a; margin:4px 0;">{{ $notif->data['content'] ?? '' }}</div>
                    <span style="font-size:12px; color:#aaa;">{{ $notif->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @endforeach
        <a href="{{ route('admin.notifications.index') }}" class="see-more-btn" style="margin-top:12px;">Voir toutes les notifications</a>
    </div>
@else
    <p>Aucune notification reçue.</p>
@endif
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