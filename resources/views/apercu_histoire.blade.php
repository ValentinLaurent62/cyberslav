@extends('layouts.app')

@section('content')
<div class="apercuhistoire">
    <!-- Afficher le titre et l'illustration de l'histoire -->
    <h1>{{$histoire->titre}}</h1>
    <img src="{{$histoire->photo}}">

    <!-- Genre de l'histoire -->
    <br>
    <h2>Genre: {{$genre->label}}</h2>

    <!-- Nom de l'auteur -->
    <br>
    <span> Par: {{$auteur->name}} </span>

    <!-- Score de l'histoire -->
    <br>
    <span> +{{$likes}} / -{{$dislikes}} </span>

    <!-- Description -->
    <br>
    <p> {{$histoire->pitch}}</p>

    <!-- Bouton Like -->
    @if (Auth::user())
        <br><br>
        <!-- Si l'utilisateur connecté est l'auteur,
        remplacer l'option FAVORI par l'activation -->
        @if(Auth::id() == $histoire->user_id)
            <form method="POST" action="{{route('switch', ['id'=>$histoire->id])}}">
                @csrf
                <button type="submit" class="activer">
                    @if($histoire->active)
                        Désactiver
                    @else
                        Activer
                    @endif
                </button>
            </form>
        @else
            <div class="avis">
                <form method="POST" action="{{route('like', ['id'=>$histoire->id])}}">
                    @csrf
                    <button type="submit" class="like">👍</button>
                </form>
                <form method="POST" action="{{route('dislike', ['id'=>$histoire->id])}}">
                    @csrf
                    <button type="submit" class="dislike">👎</button>
                </form>
            </div>
        @endif
    @endif

    <!-- Lien vers le premier chapitre -->
    <br>

    @if(empty($chapitre))<p>Aucun Chapitre trouvé!</p>
    @else<a href="{{route('read', ['id'=>$chapitre->id])}}">Commencer</a>
    @endif
</div>
@endsection