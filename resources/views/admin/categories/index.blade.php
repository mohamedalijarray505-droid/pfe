@extends('layouts.app')

@section('title', 'Gestion des catégories')
@section('styles')
@include('admin.partials.admin-list-styles')
@endsection

@section('content')
<div class="admin-list-page">
    <a href="{{ route('admin.dashboard') }}" class="admin-back-link">
        <i class="fas fa-arrow-left"></i> Retour au dashboard
    </a>

    <div class="admin-card" style="max-width:560px;">
        <h2 class="admin-card-title">Ajouter une catégorie</h2>
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Nom de la catégorie" required class="admin-form-input">
            <button type="submit" class="admin-btn-primary" style="width:100%; justify-content:center;">
                <i class="fas fa-folder-plus"></i> Ajouter la catégorie
            </button>
        </form>

        <hr class="admin-divider">

        <h3 class="admin-card-title" style="font-size:1.1rem;">Catégories existantes</h3>
        <ul class="admin-list-items">
            @foreach($categories as $category)
            <li class="admin-list-item">
                <span>{{ $category->name }}</span>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn admin-btn-danger" onclick="return confirm('Supprimer cette catégorie ?');">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </li>
            @endforeach
        </ul>

        @if($categories->isEmpty())
            <p class="admin-empty" style="margin:0; padding:1rem 0;">Aucune catégorie.</p>
        @endif
    </div>
</div>
@endsection
