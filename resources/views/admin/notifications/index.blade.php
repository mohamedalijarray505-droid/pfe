@extends('layouts.app')

@section('title', 'Notifications admin')

@section('content')
<h1 style="margin-bottom:24px;">🔔 Notifications reçues</h1>
@if(auth()->user()->isAdmin())
    @if(auth()->user()->notifications->count())
        <div style="background:#fff; border-radius:12px; box-shadow:0 4px 18px #3cff9e22; padding:24px;">
            @foreach(auth()->user()->notifications as $notif)
                <div style="border-bottom:1px solid #eee; padding:14px 0; display:flex; align-items:center; gap:18px;">
                    <div style="font-size:22px; color:#3cff9e;"><i class="fas fa-envelope"></i></div>
                    <div style="flex:1;">
                        <strong>{{ $notif->data['name'] ?? 'Utilisateur' }}</strong> <span style="color:#aaa; font-size:13px;">({{ $notif->data['email'] ?? '' }})</span>
                        <div style="font-size:13px; color:#0f172a; margin:4px 0;">{{ $notif->data['content'] ?? '' }}</div>
                        <span style="font-size:12px; color:#aaa;">{{ $notif->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucune notification reçue.</p>
    @endif
@else
    <p>Vous n'êtes pas administrateur.</p>
@endif
@endsection
