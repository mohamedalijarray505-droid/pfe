@extends('layouts.app')

@section('content')
<div style="max-width:600px; margin:30px auto; background:rgba(255,255,255,0.05); padding:30px; border-radius:12px; backdrop-filter:blur(8px);">

    <h2 style="margin-bottom:20px; font-size:26px; font-weight:600; color:#3cff9e;">
        ➕ Ajouter une catégorie
    </h2>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div style="margin-bottom:15px;">
            <input type="text" 
                   name="name" 
                   placeholder="Nom catégorie" 
                   required
                   style="width:100%; padding:12px; border-radius:8px; border:none; outline:none; background:rgba(255,255,255,0.1); color:#fff;">
        </div>

        <button type="submit" style="
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:#3cff9e;
            color:#000;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
        " onmouseover="this.style.background='#2fd88a'" onmouseout="this.style.background='#3cff9e'">
            📂 Ajouter la catégorie
        </button>
    </form>

    <hr style="border-color:rgba(255,255,255,0.2); margin:30px 0;">

    <h3 style="margin-bottom:15px; font-size:20px; color:#fff;">
        📂 Catégories existantes
    </h3>

    <ul style="list-style:none; padding-left:0;">
        @foreach($categories as $category)
            <li style="padding:10px 15px; margin-bottom:10px; background:rgba(255,255,255,0.1); border-radius:8px; display:flex; justify-content:space-between; align-items:center;">
                <span>{{ $category->name }}</span>
                <!-- Bouton supprimer (optionnel) -->
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="
                        background:#ff4d4f;
                        color:#fff;
                        border:none;
                        padding:5px 10px;
                        border-radius:6px;
                        cursor:pointer;
                        font-size:12px;
                        transition:0.3s;
                    " onmouseover="this.style.background='#e33b3f'" onmouseout="this.style.background='#ff4d4f'">
                        ❌ Supprimer
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

</div>
@endsection
