@extends('layouts.app')

@section('content')
<div class="videos-container" style="max-width:1200px;margin:0 auto;padding:20px;">
    <h2 style="margin-bottom:20px;font-size:28px;font-weight:600;">🎬 Gestion des vidéos</h2>

    <a href="{{ route('admin.videos.create') }}" style="
        display:inline-block;
        margin-bottom:20px;
        padding:10px 20px;
        background:#3cff9e;
        color:#000;
        font-weight:600;
        border-radius:8px;
        text-decoration:none;
        transition:0.3s;
    " onmouseover="this.style.background='#2fd88a'" onmouseout="this.style.background='#3cff9e'">
        ➕ Ajouter une vidéo
    </a>


    <table style="width:100%;border-collapse:collapse;background:rgba(255,255,255,0.05);border-radius:10px;overflow:hidden;">
        <thead style="background:rgba(0,0,0,0.3);text-align:left;">
            <tr>
                <th style="padding:12px 15px;">Titre</th>
                <th style="padding:12px 15px;">👍 J’aime</th>
                <th style="padding:12px 15px;">❤️ J’adore</th>
                <th style="padding:12px 15px;">😢 Triste</th>
                <th style="padding:12px 15px;">😡 En colère</th>
                <th style="padding:12px 15px;">🤝 Support</th>
                <th style="padding:12px 15px;">Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
                <tr style="border-bottom:1px solid rgba(255,255,255,0.1);">
                    <td style="padding:12px 15px;font-weight:500;">{{ $video->title }}</td>
                    <td style="padding:12px 15px;">{{ $video->likes_count ?? 0 }}</td>
                    <td style="padding:12px 15px;">{{ $video->love_count ?? 0 }}</td>
                    <td style="padding:12px 15px;">{{ $video->sad_count ?? 0 }}</td>
                    <td style="padding:12px 15px;">{{ $video->angry_count ?? 0 }}</td>
                     <td style="padding:12px 15px;">{{ $video->support ?? 0 }}</td>
                    <td style="padding:12px 15px;">

                        <form method="POST" action="{{ route('admin.videos.toggle', $video) }}">
                        @csrf
                        <button type="submit"
                         style="
                         padding:6px 12px;
                         border:none;
                         border-radius:6px;
                         cursor:pointer;
                         font-weight:500;
                         background:{{ $video->is_active ? '#3cff9e' : '#ff4d4d' }};
                         color:#000;
                          ">
                        {{ $video->is_active ? '👁 Visible' : '🚫 Masquée' }}
                       </button>
                      </form>

                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection
