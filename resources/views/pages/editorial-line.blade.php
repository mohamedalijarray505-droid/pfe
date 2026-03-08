@extends('layouts.app')

@section('title', 'الخط التحريري - Ligne éditoriale - Ellyssa FM')

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
        <h1>الخط التحريري</h1>
        <p class="sub">Ligne éditoriale — Ellyssa FM</p>
    </div>

    <div class="page-body">
        <p>La ligne éditoriale d'Ellyssa FM fixe les orientations et les priorités de nos programmes : pluralisme, qualité, proximité avec les auditeurs et respect des faits.</p>

        <h2>Principes</h2>
        <ul>
            <li>Pluralité des opinions et équilibre des points de vue dans les débats.</li>
            <li>Priorité à l'information vérifiée et à la distinction claire entre information et opinion.</li>
            <li>Ouverture à la culture, au sport, à la jeunesse et à la vie locale.</li>
            <li>Refus de la désinformation, des discours de haine et des contenus illégaux.</li>
        </ul>

        <h2>Publics</h2>
        <p>Nos contenus s'adressent à tous les publics, dans le respect des différences et des sensibilités. Nous nous engageons à proposer une offre accessible et exigeante.</p>
    </div>
</div>
@endsection
