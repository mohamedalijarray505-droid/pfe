@extends('layouts.app')

@section('styles')
<style>
/* Liste déroulante catégories : options toujours visibles (fond clair, texte sombre) */
.admin-video-create select { cursor: pointer; }
.admin-video-create select option {
    background: #fff !important;
    color: #0f172a !important;
}
</style>
@endsection

@section('content')
<div class="admin-video-create" style="max-width:600px; margin:30px auto; background:rgba(255,255,255,0.95); padding:30px; border-radius:12px; box-shadow:0 8px 32px rgba(15,23,42,0.1); border:1px solid rgba(60,255,158,0.15);">
    <h2 style="margin-bottom:20px; font-size:26px; font-weight:600; color:#0f172a;">
        Ajouter une vidéo <span style="font-size:18px; color:#64748b;">(via lien)</span>
    </h2>

    <form method="POST" action="{{ route('admin.videos.store') }}">
        @csrf

        <!-- Titre -->
        <div style="margin-bottom:15px;">
            <input type="text"
                   name="title"
                   placeholder="Titre"
                   required
                   style="width:100%; padding:12px; border-radius:8px; border:1px solid #e2e8f0; outline:none; background:#fff; color:#0f172a;">
        </div>

        <!-- Description -->
        <div style="margin-bottom:15px;">
            <textarea name="description"
                      placeholder="Description"
                      style="width:100%; padding:12px; border-radius:8px; border:1px solid #e2e8f0; outline:none; background:#fff; color:#0f172a; min-height:100px;"></textarea>
        </div>

        <!-- Catégorie -->
        <div style="margin-bottom:15px;">
            <select name="category_id" required style="width:100%; padding:12px; border-radius:8px; border:1px solid #e2e8f0; outline:none; background:#fff; color:#0f172a;">
                <option value="">-- Choisir une catégorie --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Lien vidéo -->
        <div style="margin-bottom:20px;">
            <input type="url"
                   name="video_url"
                   placeholder="Lien vidéo (YouTube, mp4, etc...)"
                   required
                   style="width:100%; padding:12px; border-radius:8px; border:1px solid #e2e8f0; outline:none; background:#fff; color:#0f172a;">
        </div>

        <!-- Bouton -->
        <button type="submit" style="
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:linear-gradient(135deg,#3cff9e,#2fd88a);
            color:#0f172a;
            font-weight:600;
            cursor:pointer;
            transition:transform 0.2s, box-shadow 0.2s;
        ">
            Ajouter la vidéo
        </button>
    </form>
</div>
@endsection
