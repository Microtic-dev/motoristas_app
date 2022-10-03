<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
          @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
    </style>
        <link href="{{asset('css/login.css')}}" rel="stylesheet">

  </head>
  <body>

    <h2><a href="/">Motoristas</a></h2>

    <div class="container" id="container">
    	<div class="form-container sign-up-container">
          @if(isset($_GET['candidato']))
          <h1>Criar conta candidato!</h1>
    			<span>use as suas credenciais para registrar <br>a sua conta</span>
            <form method="POST" action="{{ route('register') }}">
           @csrf
           <input type="hidden" name="privilegio" value="candidato"/>
           <input type="hidden" name="email" id="email_number"/>
           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome Completo">
           @error('name')
               <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
               </span>
           @enderror
           <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="email" placeholder="Celular">
           @error('celular')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror

           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
           @error('password')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror

          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Senha">
    			<button type="submit">  {{ __('Cadastrar') }}</button>
          <a class="btn btn-link" href="{{route('login','recrutador')}}">
              {{ __('Sou empregador') }}
          </a>
    		</form>
        @else
        <h1>Criar conta Empregador!</h1>
        <span>use as suas credenciais para registrar <br>a sua conta</span>
          <form method="POST" action="{{ route('register') }}">
             @csrf
             <input type="hidden" name="privilegio" value="empregador"/>
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

             <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="email" placeholder="Celular">
             @error('celular')
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
            <button type="submit">  {{ __('Cadastrar') }}</button>
        </form>

        @endif

    	</div>


    	<div class="form-container sign-in-container">
        @if(isset($_GET['candidato']))

          <form method="POST" action="{{ route('login') }}">
              @csrf
            <h1 style="">Candidato</h1>
            <span>use sua a conta para entrar</span>
           <input type="hidden" name="email" id="email_login"/>
            <input id="celular_login" type="number" min="9" maxlength="13" class="form-control @error('number') is-invalid @enderror" name="number" placeholder="Celular" required autocomplete="number" autofocus>
            @error('number')
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
            <button class="" type="submit">Entrar</button>
            <a class="btn btn-link" href="{{route('login','recrutador')}}">
                {{ __('Sou empregador') }}
            </a>
          </form>
        @else

    	  <form method="POST" action="{{ route('login') }}">
            @csrf
    			<h1 style="">Recrutador</h1>
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
    			<button type="submit">Entrar</button>

          <a class="btn btn-link" href="{{route('login','candidato')}}">
              {{ __('Sou candidato') }}
          </a>
    		</form>
        @endif
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
    $('#celular').on('input', function() {
        var email = $('#celular').val();
        $('#email_number').val(email+"@motoristas.co.mz");
    });

    $('#celular_login').on('input', function() {
        var email = $('#celular_login').val();
        $('#email_login').val(email+"@motoristas.co.mz");
    });
    </script>
   <script>

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
 container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
 container.classList.remove("right-panel-active");
});

   </script>
  </body>
</html>
