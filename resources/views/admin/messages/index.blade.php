@extends('layouts.app')

@section('title', 'Messages reçus')

@section('content')
<h1 style="margin-bottom:24px;">📥 Messages reçus</h1>
@if($messages->count())
    <div style="background:#fff; border-radius:12px; box-shadow:0 4px 18px #3cff9e22; padding:24px;">
        @foreach($messages as $msg)
            <div style="border-bottom:1px solid #eee; padding:14px 0; display:flex; align-items:center; gap:18px;">
                <div style="font-size:22px; color:#3cff9e;"><i class="fas fa-envelope"></i></div>
                <div style="flex:1;">
                    <strong>{{ $msg->name }}</strong> <span style="color:#aaa; font-size:13px;">({{ $msg->email }})</span>
                    <div style="font-size:13px; color:#0f172a; margin:4px 0;">{{ Str::limit($msg->content, 80) }}</div>
                    <span style="font-size:12px; color:#aaa;">{{ $msg->created_at->diffForHumans() }}</span>
                </div>
                <a href="{{ route('admin.messages.show', $msg) }}" style="color:#0f172a; font-size:15px; text-decoration:underline;">Voir</a>
            </div>
        @endforeach
        <div style="margin-top:18px;">{{ $messages->links() }}</div>
    </div>
@else
    <p>Aucun message reçu.</p>
@endif
@endsection
