@extends('layouts.app')

@section('content')

    <div class="pageaccueil">
        <img src="{{asset('img/Logo.png')}}" alt="logo">
        <h2>L'histoire dont vous êtes le héros.</h2>
        <p>Plongez dans l'univers cyberpunk et partez à l'aventure ! Donnez vie à vos histoires ou jouez à celle des autres.</p>
        <a class="lienhistoire" href="#listehistoire">Commencer l'aventure</a>
    </div>
    <hr class="separateur">
    <div id="listehistoire">
    <h2>Les histoires </h2>
        <p>Retrouvez l'ensemble des histoires de la communauté d'Historobot. </p>
    <br>

        <div class="contenuhistoire" >

            @foreach($histoires as $h)
                <div class="histoire">
                <a href="{{route('show',['id'=>$h->id])}}" class="Histoires"><p>{{$h->titre}} </p><img src="{{$h->photo}}"></a>
                    <hr>
                    <div class="resume">
                        <span>{{$h->pitch}}</span>
                    </div>

                </div>
            @endforeach

        </div>


    </div>



@endsection