@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h2>Motoristas</h2>
      <div class="container" id="container">
        <div class="form-container sign-up-container">
            <h1>Criar conta!</h1>

            <span>use as suas credenciais para registrar <br>a sua conta</span>
            <form method="POST" action="{{ route('register') }}">
                @csrf
             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
             @error('name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror


             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
             @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
             @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            <button type="submit">  {{ __('Register') }}</button>
          </form>
        </div>


        <div class="form-container sign-in-container">
          <form method="POST" action="{{ route('login') }}">
            <h1>Entrar</h1>

            <span>use sua a conta para entrar</span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Esqueceu-se da senha?') }}
                </a>
            @endif
            <button type="submit">Sign In</button>
          </form>
        </div>

        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>É um prazer te ver de volta!</h1>
              <p>Para se connectar a plataforma e ver as vagas disponiveis use os suas credenciais</p>
              <button class="ghost" id="signIn">Entrar</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Seja Bem-vindo, Amigo!</h1>
              <p>Crie uma conta e veja as melhores vagas de motorista disponiveis no mercado</p>
              <button class="ghost" id="signUp">Criar conta</button>
            </div>
          </div>
        </div>

      </div>

    </div>
</div>


@endsection
