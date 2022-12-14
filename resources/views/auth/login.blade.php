<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
          @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
    </style>

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/login.css')}}" rel="stylesheet">
  </head>
  <body>

    <h2><a href="/"><img src="{{asset('assets/images/logo-blue.png')}}" alt="logo motoristas" height="60"></a></h2>

    <div class="container" id="container">
    	<div class="form-container sign-up-container">
          @if(isset($_GET['candidato']))

            <form method="POST" action="{{ route('newCandidato') }}" class="formulario">
              <h1>Criar conta candidato!</h1>
        			<p class="text-center">Use as suas credenciais para registrar a sua conta</p>
           @csrf
           <input type="hidden" name="privilegio" value="candidato"/>
           <input id="name" type="text" class="form-control required @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome Completo">
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

           <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>

           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
           @error('password')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Senha">

          <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" required placeholder="Data de Nascimento">
          <input id="nacionalidade" type="text" class="form-control" name="nacionalidade" required placeholder="Nacionalidade">

          <div class="form-check">
            <label class="form-check-label margin-left-20">Sexo: </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="sexo" type="radio" id="inlineCheckbox1" value="Masculino">
                <label class="form-check-label" for="inlineCheckbox1">Masculino</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="sexo" type="radio" id="inlineCheckbox2" value="Feminino">
                <label class="form-check-label" for="inlineCheckbox2">Feminino</label>
              </div>
          </div>
          <div class="form-group row">
            <label for="example-text-input" class="col-sm-12 col-form-label">N??vel Acad??mico</label>
              <div class="col-sm-6">
                <select class="form-control" id="nivel_de_ensino" name="nivel">
                    <option>N??vel</option>
                    <option value="Escolar">Escolar</option>
                    <option value="Tecnico-Profissional">T??cnico-Profissional</option>
                    <option value="Superior">Superior</option>
                </select>
              </div>
              <div class="col-sm-6">
                <select class="form-control" name="grau_academico">
                    <option>Grau</option>
                    <option class="escolar" value="1?? ?? 5?? Classe">1?? ?? 5?? Classe</option>
                    <option class="escolar" value="6?? ?? 7?? Classe">6?? ?? 7?? Classe</option>
                    <option class="escolar" value="8?? ?? 10?? Classe">8?? ?? 10?? Classe</option>
                    <option class="escolar" value="11?? ?? 12?? Classe">11?? ?? 12?? Classe</option>
                    <option class="tecnico" value="Tecnico B??sico">B??sico</option>
                    <option class="tecnico" value="Tecnico Elementar">Elementar</option>
                    <option class="tecnico" value="Tecnico M??dio">M??dio</option>
                    <option class="superior" value="Bacharelato">Bacharelato</option>
                    <option class="superior" value="Licenciatura">Licenciatura</option>
                    <option class="superior" value="Mestrado">Mestrado</option>
                    <option class="superior" value="Doutoramento">Doutoramento</option>
                    <option class="superior" value="P??s-Doutoramento">P??s-Doutoramento</option>
                </select>
              </div>
          </div>

          <select class="form-control" name="provincia_id" id="provincia" required>
            @php
              $provincias = App\Models\Provincias::all();
            @endphp
              <option selected>Seleccione a Provincia</option>
              @foreach ($provincias as $key => $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
              @endforeach
          </select>
          <textarea class="form-control" name="endereco" id="endereco" rows="3" placeholder="Resid??ncia..."></textarea>
          <select class="form-control" name="categoria_id" id="categoria" required>
            @php
              $categorias = App\Models\Categorias::all();
            @endphp
              <option selected>Habilitacao de Condu????o</option>
              @foreach ($categorias as $key => $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
              @endforeach
          </select>

          <input id="numero_carta_conducao" type="text" class="form-control" name="numero_carta_conducao" placeholder="N??mero da Carta de Condu????o (opcional) ">
          <div class="form-check">
            <label class="form-check-label margin-left-20">A sua carta de condu????o est?? dentro da validade? </label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="validade_conducao" type="radio" id="inlineCheckboxValidadeConducao1" value="Sim">
                <label class="form-check-label" for="inlineCheckboxValidadeConducao1">Sim</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="validade_conducao" type="radio" id="inlineCheckboxValidadeConducao2" value="N??o">
                <label class="form-check-label" for="inlineCheckboxValidadeConducao2">N??o</label>
              </div>
          </div>
          <div class="form-check">
            <label class="form-check-label margin-left-20">J?? foi inibido de conduzir? </label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="inibicao_anterior" type="radio" id="inlineCheckboxInibicao1" value="Sim">
                <label class="form-check-label" for="inlineCheckboxInibicao1">Sim</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="inibicao_anterior" type="radio" id="inlineCheckboxInibicao2" value="N??o">
                <label class="form-check-label" for="inlineCheckboxInibicao2">N??o</label>
              </div>
          </div>

          <textarea class="form-control" name="inibicao_motivo" id="inibicao_motivo" rows="3" placeholder="Motivo da Inibi????o..."></textarea>

          <div class="form-check">
            <label class="form-check-label margin-left-20">J?? se envolveu em acidente de via????o? </label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="envolvimento_acidente" type="radio" id="inlineCheckboxenvolvimentoAcidente1" value="Sim">
                <label class="form-check-label" for="inlineCheckboxenvolvimentoAcidente1">Sim</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="envolvimento_acidente" type="radio" id="inlineCheckboxenvolvimentoAcidente2" value="N??o">
                <label class="form-check-label" for="inlineCheckboxenvolvimentoAcidente2">N??o</label>
              </div>
          </div>
          <textarea class="form-control" name="acidente_descricao" id="acidente_descricao" rows="3" placeholder="Descreve o acidente..."></textarea>

          <button class="mt-5" type="submit">  {{ __('Cadastrar') }}</button>
          <a class="btn btn-link" href="{{route('login','recrutador')}}">
              {{ __('Sou empregador') }}
          </a>
    		</form>
        @else

            <form method="POST" action="{{route('newempregador')}}">
               @csrf
              <h1>Criar conta Empregador!</h1><br>

             <input type="hidden" name="privilegio" value="empregador"/>
             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Empresa">
             @error('name')
                 <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <select class="form-control" id="sector_actividade" name="sector_actividade" required>
                 <option selected value="null">Sector de actividade</option>
                 <option value="transporte">Transporte e Log??stica</option>
                 <option value="comercio">Comercio </option>
                 <option value="industria">Industria </option>
                 <option value="turismo">Turismo </option>
                 <option value="agricultura">Agricultura </option>
                 <option value="minera????o">Minera????o </option>
                 <option value="ONG">ONG</option>
                 <option value="institui????o publica">Institui????o p??blica</option>
                 <option value="Outro">Outro...</option>
             </select>

               <input class="form-control" name="sector_especificado" id="sector_especificado"
               placeholder="Especifique o seu sector de actividade...">

               <input id="nuit" type="number" class="form-control @error('nuit') is-invalid @enderror" name="nuit" value="{{ old('nuit') }}" required autocomplete="nuit" placeholder="nuit">
               @error('nuit')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

             <input id="newemail" type="email" class="form-control @error('email') is-invalid @enderror" name="newemail" value="{{ old('newemail') }}" required autocomplete="email" placeholder="Email">
             @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <input id="representante" type="text" class="form-control @error('representante') is-invalid @enderror" name="representante" value="{{ old('representante') }}" required autocomplete="representante" autofocus placeholder="Representante">
             @error('representante')
                 <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <input id="telefone" type="number" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('celular') }}" required autocomplete="celular" placeholder="Telefone">
             @error('celular')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <input id="telefone_alt" type="number" class="form-control @error('telefone_alt') is-invalid @enderror" name="telefone_alt" value="{{ old('telefone_alt') }}"  autocomplete="telefone_alt" placeholder="Telefone altermativo">
             @error('telefone_alt')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror


             <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}"  autocomplete="website" placeholder="Website">
             @error('website')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <input id="endereco" type="text" class="form-control @error('Endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}" required autocomplete="Endereco" placeholder="Endere??o">
             @error('Endereco')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <select class="form-control" name="provincia_id" id="provincia" required>
               @php
                 $provincias = App\Models\Provincias::all();
               @endphp
                 <option selected>Seleccione a Provincia</option>
                 @foreach ($provincias as $key => $provincia)
                   <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                 @endforeach
             </select>

              <textarea class="form-control" name="sobre" id="sobre" rows="3"  class="form-control @error('sobre') is-invalid @enderror" name="sobre" value="{{ old('sobre') }}"  autocomplete="sobre"placeholder="Sobre a empresa..."></textarea>
             @error('sobre')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <input id="newpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
             @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror

             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
             <br><button type="submit">  {{ __('Cadaastrar') }}</button>
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
    			<h1 style="">Empregador</h1>
    			<span>use sua a conta para entrar</span><br>
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
    			<button type="submit">Entrar</button><br>
          <a class="btn btn-link" href="{{route('login','candidato')}}">
              {{ __('Sou candidato') }}
          </a>
    		</form>
        @endif
    	</div>


    	<div class="overlay-container">
    		<div class="overlay">
    			<div class="overlay-panel overlay-left">
    				<h1>?? um prazer te ver de volta!</h1>
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

    <!--  -->



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

    $('#sector_especificado').hide();

    $('#sector_actividade').on('change', function(){
          if(this.value === 'Outro')
          $('#sector_especificado').show().val();
          else
          $('#sector_especificado').hide();
    });

    $(".escolar").hide();
    $(".tecnico").hide();
    $(".superior").hide();

    $('#nivel_de_ensino').on('change', function() {

      if(this.value === 'Escolar') {
        $(".escolar").show();
      } else {
        $(".escolar").hide();
      }

      if(this.value === 'Tecnico-Profissional') {
        $(".tecnico").show();
      } else {
        $(".tecnico").hide();
      }

      if(this.value === 'Superior') {
        $(".superior").show();
      } else {
        $(".superior").hide();
      }

    });

    $('#inibicao_motivo').hide();
    $('#inlineCheckboxInibicao1').change(function() {
        if(this.checked) {
            $('#inibicao_motivo').show();
        }
    });

    $('#inlineCheckboxInibicao2').change(function() {
        if(this.checked) {
            $('#inibicao_motivo').hide();
        }
    });

    $('#acidente_descricao').hide();
    $('#inlineCheckboxenvolvimentoAcidente1').change(function() {
        if(this.checked) {
            $('#acidente_descricao').show();
        }
    });

    $('#inlineCheckboxenvolvimentoAcidente2').change(function() {
        if(this.checked) {
            $('#acidente_descricao').hide();
        }
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
