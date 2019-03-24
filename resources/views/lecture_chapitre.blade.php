@extends('layouts.app')

@section('content')

    <div class="lecturechapitre">
        @if(isset($progression))
            <div class="progression">
                @foreach($progression as $p)
                    <a href="{{$p->chapitre_id}}">{{$p->titrecourt}}</a>
                @endforeach
                <br><br>
            </div>
        @endif

        <img class="lecturechapitrebg" width="500px" src="{{$chapitre->photo}}">
        <div class="lecturechapitrecontenu">
            <!-- Afficher le texte du chapitre -->
            <p class="titrechapitre">
                {!! $chapitre->titre !!} </p>

            <!-- Afficher le texte du chapitre -->
            <p class="resumechapitre">
                {!! $chapitre->texte !!} </p>


            <!-- Afficher la question -->
        {{$chapitre->question}}

        <!-- Afficher les réponses possibles -->
            <ul>
                @foreach($reponses as $r)
                    <li><a href="{{$r->chapitre_destination_id}}">{{$r->reponse}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection