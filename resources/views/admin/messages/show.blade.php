@extends('layouts.app')

@section('title', 'Message reçu')

@section('content')
<div style="background:#fff; border-radius:12px; box-shadow:0 4px 18px #3cff9e22; padding:32px; max-width:600px; margin:auto;">
    <h2 style="margin-bottom:18px; color:#0f172a;"><i class="fas fa-envelope"></i> Message de {{ $message->name }}</h2>
    <div style="margin-bottom:10px; color:#3cff9e; font-size:15px;">
        <i class="fas fa-user"></i> {{ $message->name }}<br>
        <i class="fas fa-at"></i> {{ $message->email }}<br>
        <i class="fas fa-clock"></i> {{ $message->created_at->diffForHumans() }}
    </div>
    <div style="margin-bottom:18px; font-size:16px; color:#0f172a; background:rgba(60,255,158,0.07); padding:14px 12px; border-radius:8px;">
        {{ $message->content }}
    </div>
    <a href="{{ route('admin.messages.index') }}" class="see-more-btn"><i class="fas fa-arrow-left"></i> Retour à la liste</a>
</div>
@endsection
