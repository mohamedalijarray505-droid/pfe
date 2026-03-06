@extends('layouts.app')

@section('content')
<h2>📩 Envoyer un message à la radio</h2>

@if(session('success'))
    <p style="color:#3cff9e">{{ session('success') }}</p>
@endif

<form method="POST" action="/radio/message">
    @csrf
    <input type="text" name="name" placeholder="Votre nom">
    <input type="email" name="email" placeholder="Email (optionnel)">
    <textarea name="message" placeholder="Votre message"></textarea>
    <button>Envoyer</button>
</form>
@endsection
