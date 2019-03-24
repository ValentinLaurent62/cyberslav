@extends('layouts.app')

@section('content')
    <div class="creerHistoire">
        <div class="card">
            <div class="card-header"><p>{{ __('Création d\'une Histoire') }}</p></div>
            <form method="POST" action="{{ route('enregistrer_histoire') }}">
                @csrf
                <div class="creerChoix">
                    <input id="titre"  placeholder="Titre de l'histoire"  type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" value="{{ old('titre') }}" required autofocus>
                    @if ($errors->has('titre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('titre') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="creerChoix">
                    <textarea rows="4" cols="50" id="pitch"  placeholder="Pitch de l'histoire"  type="text" class="form-control{{ $errors->has('pitch') ? ' is-invalid' : '' }}" name="pitch" value="{{ old('pitch') }}" required></textarea>
                    @if ($errors->has('pitch'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pitch') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="creerChoix">
                    <input id="photo"  placeholder="URL de la couverture"  type="url" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" required>
                    @if ($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="creerChoix">
                    <select id="genre_id" type="number" class="form-control{{ $errors->has('genre_id') ? ' is-invalid' : '' }}" name="genre_id" required>
                        @foreach($genres as $g)
                            <option value="{{$g->id}}">{{$g->label}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('genre_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('genre_id') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Créer l\'histoire') }}
                </button>
            </form>
        </div>
    </div>
@endsection