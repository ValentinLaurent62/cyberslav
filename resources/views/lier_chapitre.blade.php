@extends('layouts.app')

@section('content')
    <div class="lierChapitre">
                <div class="card">
                    <div class="card-header"><p>{{ __('Liaison') }}</p></div>
                    <form method="POST" action="{{ route('enregistrer_liaison') }}">
                        @csrf


                            <div class="creerChoix">
                                <select id="chapitre_source_id" type="number" class="form-control{{ $errors->has('chapitre_source_id') ? ' is-invalid' : '' }}" name="chapitre_source_id" required>
                                    @foreach($chapitres as $c)
                                        <option value="{{$c->id}}">{{$c->titrecourt}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('chapitre_source_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chapitre_source_id') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <div class="creerChoix">
                                <select id="chapitre_destination_id" type="number" class="form-control{{ $errors->has('chapitre_destination_id') ? ' is-invalid' : '' }}" name="chapitre_destination_id" required>
                                    @foreach($chapitres as $c)
                                        <option value="{{$c->id}}">{{$c->titrecourt}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('chapitre_destination_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chapitre_destination_id') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="creerChoix">
                                <input id="reponse" placeholder="Choix de Réponse" type="text" class="form-control{{ $errors->has('reponse') ? ' is-invalid' : '' }}" name="reponse" required>

                                @if ($errors->has('reponse'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reponse') }}</strong>
                                    </span>
                                @endif
                            </div>



                                <button type="submit" class="btn btn-primary">
                                    {{ __('Créer le Lien') }}
                                </button>


                    </form>
                </div>

    </div>
@endsection
