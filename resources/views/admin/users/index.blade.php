@extends('layouts.app')

@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h2>👥 Liste des utilisateurs</h2>
</div>

@if($users->count())
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; background:rgba(255,255,255,0.05); border-radius:10px; overflow:hidden;">
            <thead>
                <tr style="background:#0b3d2e; color:#3cff9e; text-align:left;">
                    <th style="padding:12px;">#</th>
                    <th style="padding:12px;">Nom</th>
                    <th style="padding:12px;">Email</th>
                    <th style="padding:12px;">Rôle</th>
                    <th style="padding:12px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr style="border-bottom:1px solid rgba(255,255,255,0.1);">
                    <td style="padding:12px;">{{ $index + 1 }}</td>
                    <td style="padding:12px;">👤 {{ $user->name }}</td>
                    <td style="padding:12px;">📧 {{ $user->email }}</td>
                    <td style="padding:12px;">
                        @if($user->role === 'admin')
                            🔑 Admin
                        @else
                            👤 Utilisateur
                        @endif
                    </td>
                    <td style="padding:12px;">
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button style="background:#ff4d6d; color:#fff; border:none; padding:6px 12px; border-radius:6px; cursor:pointer;">🗑 Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p style="margin-top:20px; color:rgba(255,255,255,0.7);">Aucun utilisateur disponible.</p>
@endif
@endsection
