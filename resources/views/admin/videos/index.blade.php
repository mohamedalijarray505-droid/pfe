@extends('layouts.app')

@section('title', 'Gestion des vidéos')
@section('styles')
@include('admin.partials.admin-list-styles')
@endsection

@section('content')
<div class="admin-list-page">
    <div class="admin-list-header">
        <h2 class="admin-list-title">Vidéos</h2>
        <a href="{{ route('admin.videos.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus"></i> Ajouter une vidéo
        </a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>J’aime</th>
                    <th>J’adore</th>
                    <th>Triste</th>
                    <th>En colère</th>
                    <th>Support</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videos as $video)
                <tr>
                    <td style="font-weight:500;">{{ $video->title }}</td>
                    <td>{{ $video->likes_count ?? 0 }}</td>
                    <td>{{ $video->love_count ?? 0 }}</td>
                    <td>{{ $video->sad_count ?? 0 }}</td>
                    <td>{{ $video->angry_count ?? 0 }}</td>
                    <td>{{ $video->support_count ?? 0 }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.videos.toggle', $video) }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="admin-btn {{ $video->is_active ? 'admin-btn-success' : 'admin-btn-danger' }}">
                                {{ $video->is_active ? 'Visible' : 'Masquée' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($videos->isEmpty())
        <p class="admin-empty">Aucune vidéo.</p>
    @endif
</div>
@endsection
