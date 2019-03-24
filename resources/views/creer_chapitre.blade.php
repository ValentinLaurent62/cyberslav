
@extends('layouts.app')

@section('content')
    <div class="creerChapitre">
        <div class="card">
            <div class="card-header"><p>{{ __('Création de chapitre') }}</p></div>
            <form method="POST" action="{{ route('enregistrer_chapitre') }}">
                @csrf
                <div class="creerChoix">
                    <input id="titre" placeholder="Titre du chapitre" type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" value="{{ old('titre') }}" required autofocus>
                    @if ($errors->has('titre'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('titre') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="creerChoix">
                    <input id="titrecourt" placeholder="Titre court du chapitre" type="text" class="form-control{{ $errors->has('titrecourt') ? ' is-invalid' : '' }}" name="titrecourt" value="{{ old('titrecourt') }}" required autofocus>
                    @if ($errors->has('titrecourt'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('titrecourt') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="creerChoix">
                    <textarea rows="4" cols="50" id="texte" placeholder="Texte du chapitre" type="text" class="form-control{{ $errors->has('texte') ? ' is-invalid' : '' }}" name="texte" value="{{ old('texte') }}" required autofocus></textarea>
                    @if ($errors->has('texte'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('texte') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="creerChoix">
                    @if ($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="creerChoix">
                    <textarea rows="4" cols="50" id="question" placeholder="Question du paragraphe" type="text" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" required></textarea>
                    @if ($errors->has('question'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('question') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="creerChoix">
                    <select id="histoire_id" type="number" class="form-control{{ $errors->has('histoire_id') ? ' is-invalid' : '' }}" name="histoire_id" required>
                        @foreach($histoires as $h)
                            <option value="{{$h->id}}">{{$h->titre}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Créer le chapitre') }}
                </button>
            </form>
        </div>
    </div>
@endsection