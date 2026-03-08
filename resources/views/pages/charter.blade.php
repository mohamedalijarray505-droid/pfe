@extends('layouts.app')

@section('title', 'ميثاق الشرف - Charte d\'honneur - Ellyssa FM')

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
        <h1>ميثاق الشرف</h1>
        <p class="sub">Charte d'honneur — Ellyssa FM</p>
    </div>

    <div class="page-body">
        <p>La présente charte d'honneur définit les principes et engagements d'Ellyssa FM en matière de déontologie, d'intégrité et de respect des auditeurs et des partenaires.</p>

        <h2>Engagements</h2>
        <ul>
            <li>Respecter la dignité des personnes et l'égalité de traitement.</li>
            <li>Garantir l'exactitude et l'honnêteté de l'information diffusée.</li>
            <li>Protéger les sources et ne pas divulguer d'informations confidentielles.</li>
            <li>Refuser toute forme de corruption, de pression ou de conflit d'intérêt.</li>
            <li>Œuvrer pour le débat démocratique et la liberté d'expression dans le cadre de la loi.</li>
        </ul>

        <h2>Sanctions</h2>
        <p>Tout manquement à cette charte peut donner lieu à des mesures internes, conformément au règlement intérieur et aux dispositions en vigueur.</p>
    </div>
</div>
@endsection
