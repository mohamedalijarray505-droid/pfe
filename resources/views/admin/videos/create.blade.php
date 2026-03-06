@extends('layouts.app')

@section('content')
<div style="max-width:600px; margin:30px auto; background:rgba(255,255,255,0.05); padding:30px; border-radius:12px; backdrop-filter:blur(8px);">
    <h2 style="margin-bottom:20px; font-size:26px; font-weight:600; color:#3cff9e;">
        ➕ Ajouter une vidéo <span style="font-size:18px; color:#fff;">(via lien)</span>
    </h2>

    <form method="POST" action="{{ route('admin.videos.store') }}">
        @csrf

        <!-- Titre -->
        <div style="margin-bottom:15px;">
            <input type="text"
                   name="title"
                   placeholder="Titre"
                   required
                   style="width:100%; padding:12px; border-radius:8px; border:none; outline:none; background:rgba(255,255,255,0.1); color:#fff;">
        </div>

        <!-- Description -->
        <div style="margin-bottom:15px;">
            <textarea name="description"
                      placeholder="Description"
                      style="width:100%; padding:12px; border-radius:8px; border:none; outline:none; background:rgba(255,255,255,0.1); color:#fff; min-height:100px;"></textarea>
        </div>

        <!-- Catégorie -->
        <div style="margin-bottom:15px;">
            <select name="category_id" required style="width:100%; padding:12px; border-radius:8px; border:none; outline:none; background:rgba(255,255,255,0.1); color:#fff;">
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
                   style="width:100%; padding:12px; border-radius:8px; border:none; outline:none; background:rgba(255,255,255,0.1); color:#fff;">
        </div>

        <!-- Bouton -->
        <button type="submit" style="
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:#3cff9e;
            color:#000;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
        " onmouseover="this.style.background='#2fd88a'" onmouseout="this.style.background='#3cff9e'">
            ➕ Ajouter la vidéo
        </button>
    </form>
</div>
@endsection
