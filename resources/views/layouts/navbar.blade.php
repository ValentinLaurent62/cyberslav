<!-- navigation bar -->
<header>
<nav class="navbar navbarpc">

        <a href="{{ url('/') }}"> <img class="logo" src="{{asset('img/Logo.png')}}" alt="logo">

        </a>

            @guest
                <div class="navbarleft">
                <a href="#" class="clicklogin">Connexion</a>
                <a href="#" class="clickregister">S'inscrire</a>
                </div>
                @else
                    @if (Auth::user())
                <p> Bonjour {{ Auth::user()->name }}!</p>

                <a href="{{ route('creer_histoire') }}">Ajouter une histoire</a>
                        <a href="{{ route('creer_chapitre') }}">Ajouter un chapitre</a>
                        <a href="{{ route('lier_chapitre') }}">Lier un chapitre</a>
                      <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        @endif
                        @endguest

</nav>

    <nav class="navbar navbarmobile">

        <a href="{{ url('/') }}"> <img class="logo" src="{{asset('img/Logo.png')}}" alt="logo">

        </a>
        <div class="togglecontainer" >
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>

    </nav>
    <div class="toggle">

        @guest
            <div class="navbarleft">
                <a href="#" class="clicklogin">Connexion</a>
                <a href="#" class="clickregister">S'inscrire</a>
            </div>
            @else
                @if (Auth::user())
                    <p> Bonjour {{ Auth::user()->name }}!</p>
                    <hr>

                    <a href="{{ route('creer_histoire') }}">Ajouter une histoire</a>
                    <a href="{{ route('creer_chapitre') }}">Ajouter un chapitre</a>
                    <a href="{{ route('lier_chapitre') }}">Lier un chapitre</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                @endif
                @endguest
    </div>
</header>

@guest
<div id="login">
    <div class="loginform">
        <h2 class="loginform-header">{{ __('Vous connecter') }}</h2>
        <div class="loginform-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <div class="icon">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png">
                    </div>
                    <input placeholder="Adresse Mail" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <div class="icon">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png">
                    </div>
                    <input placeholder="Mot de Passe" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Se souvenir') }}
                        </label>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Connexion') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<div id="inscription">
<h2 class="loginform-header">{{ __('S\'inscrire') }}</h2>
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <input id="name" placeholder="Pseudo" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <input id="password" placeholder="Mot de Passe" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <input id="password-confirm" placeholder="Comfirmer Mot de Passe" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <div class="form-group row mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Inscription') }}
                </button>
            </div></form>
    </div>
</div>

@endguest