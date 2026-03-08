@extends('layouts.app')

@section('title', 'Liste des utilisateurs')
@section('styles')
@include('admin.partials.admin-list-styles')
@endsection

@section('content')
<div class="admin-list-page">
    <div class="admin-list-header">
        <h2 class="admin-list-title">Utilisateurs</h2>
    </div>

    @if($users->count())
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role === 'admin')
                            <span class="admin-badge admin-badge-approved">Admin</span>
                        @else
                            <span class="admin-badge admin-badge-pending">Utilisateur</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-btn admin-btn-danger" onclick="return confirm('Supprimer cet utilisateur ?');">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="admin-empty">Aucun utilisateur.</p>
    @endif
</div>
@endsection
