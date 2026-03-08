@extends('layouts.app')

@section('title', 'من نحن - Qui sommes-nous - Ellyssa FM')

@section('styles')
<style>
.page-doc { max-width: 800px; margin: 0 auto; }
.page-doc .page-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, rgba(60,255,158,0.12) 100%);
    border-radius: 16px;
    padding: 2rem 2.5rem;
    margin-bottom: 2rem;
    color: #fff;
    border: 1px solid rgba(60,255,158,0.2);
    box-shadow: 0 8px 32px rgba(15,23,42,0.15);
}
.page-doc .page-hero h1 { font-size: 1.75rem; margin: 0 0 0.5rem; font-weight: 700; }
.page-doc .page-hero .sub { font-size: 1rem; opacity: 0.9; }
.page-doc .page-body {
    background: rgba(255,255,255,0.98);
    border-radius: 14px;
    padding: 2rem 2.5rem;
    box-shadow: 0 8px 32px rgba(15,23,42,0.08);
    border: 1px solid rgba(60,255,158,0.08);
    line-height: 1.7;
    color: #0f172a;
}
.page-doc .page-body h2 { font-size: 1.25rem; margin: 1.5rem 0 0.75rem; color: #0f172a; }
.page-doc .page-body p { margin: 0 0 1rem; }
.page-doc .page-body ul { margin: 0 0 1rem; padding-left: 1.5rem; }
.page-doc .back-link { display: inline-flex; align-items: center; gap: 8px; color: #3cff9e; font-weight: 600; text-decoration: none; margin-bottom: 1rem; }
.page-doc .back-link:hover { text-decoration: underline; }
</style>
@endsection

@section('content')
<div class="page-doc">
    <a href="{{ route('home.public') }}" class="back-link"><i class="fas fa-arrow-left"></i> Retour à l'accueil</a>

    <div class="page-hero">
        <h1>من نحن</h1>
        <p class="sub">Qui sommes-nous — Ellyssa FM</p>
    </div>

    <div class="page-body">
        <p>Ellyssa FM est une plateforme média qui propose des contenus vidéo, des réactions et des échanges avec sa communauté. Nous mettons un point d'honneur à offrir une expérience de qualité, ouverte et respectueuse.</p>

        <h2>Notre mission</h2>
        <p>Informer, divertir et créer du lien avec nos auditeurs et nos utilisateurs, dans le respect de nos valeurs : pluralisme, intégrité et proximité.</p>

        <h2>Nos valeurs</h2>
        <ul>
            <li>Respect et écoute de notre audience.</li>
            <li>Qualité des contenus et transparence de l'information.</li>
            <li>Ouverture à tous les publics et à la diversité des opinions.</li>
        </ul>

        <h2>Nous contacter</h2>
        <p>Pour toute question ou suggestion, n'hésitez pas à nous contacter via le formulaire « Contacter nous » disponible sur la page d'accueil.</p>
    </div>
</div>
@endsection
