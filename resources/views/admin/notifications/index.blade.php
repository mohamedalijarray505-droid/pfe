@extends('layouts.app')

@section('title', 'Notifications admin')
@section('styles')
@include('admin.partials.admin-list-styles')
@endsection

@section('content')
<div class="admin-list-page">
    <div class="admin-list-header">
        <h2 class="admin-list-title">Notifications reçues</h2>
        <a href="{{ route('admin.dashboard') }}" class="admin-back-link" style="margin-bottom:0;">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
    </div>

    @if(auth()->user()->isAdmin())
        @if(auth()->user()->notifications->count())
            <div class="admin-card" style="max-width:100%;">
                @foreach(auth()->user()->notifications as $notif)
                <div class="admin-notif-item">
                    <div class="admin-notif-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="admin-notif-body">
                        <strong>{{ $notif->data['name'] ?? 'Utilisateur' }}</strong>
                        <span class="admin-notif-email">({{ $notif->data['email'] ?? '' }})</span>
                        <div class="admin-notif-content">{{ $notif->data['content'] ?? '' }}</div>
                        <span class="admin-notif-time">{{ $notif->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="admin-empty">Aucune notification reçue.</p>
        @endif
    @else
        <p class="admin-empty">Vous n'êtes pas administrateur.</p>
    @endif
</div>
@endsection
