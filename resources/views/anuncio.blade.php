@extends('layouts.appmain')
@section('title')
Titulo de anuncio |
@endsection
@section('content')

<div class="wrapper">
    <div class="container-fluid homepage">
      <div class="container">
        @if (session('success'))
        <div class="mt-4 alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><i class="icon fa fa-check"></i> {{ session('success') }}</p>
        </div>
        @endif

        @if (session('erro'))
        <div class="mt-4 alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><i class="icon fa fa-check"></i> {{ session('erro') }}</p>
        </div>
        @endif
        @if (session('warning'))
        <div class="mt-4 alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><i class="icon fa fa-check"></i> {{ session('warning') }}</p>
        </div>
        @endif

      </div>

        <!-- Page-Title -->
        <div class="row">

          <!-- anuncios section -->
          <div class="col-md-9 anunciopage postedList">

            <div class="card m-b-30 card-body">
              <section class="navega">
                <span><a href="javascript:history.back();">≪ Voltar</a></span> |
                <span>Categoria:
                     <a href="/categoria/administracao-secretariado">
                        {{ $categoria->categoria }}
                     </a>
                  </span>
              </section>

              <h2>{{$anuncio->titulo}} </h2>
              <p class="nomeInst">Nome da empresa / empregador</p>
              <section class="infoJob clearfix">
                <p>
                  <span class="badge badge-default">{{ $anuncio->provincia }} </span>
                  <span class="badge badge-default">{{ Carbon\Carbon::parse($anuncio->created_at)->format('d-M-Y') }} </span>
                  <span class="badge badge-default">{{ Carbon\Carbon::parse($anuncio->validade)->format('d-M-Y') }} </span>
                </p>
                <p class="local">Local:  <span>Sofala</span>  </p>
                <div class="anuncio-descricao">

                   {!! $anuncio->descricao !!}
                </div>
              </section>
            </div>
        </div>

        <div class="col-md-3 postedList">
          <div class="card m-b-30 card-body">
            <h2 class="detalhesC">Informação Adcional</h2>
            <p><b>Data da Publicação: </b><span class="float-right">{{ Carbon\Carbon::parse($anuncio->created_at)->format('d-M-Y') }}</span></p>
            <p><b>Válido até:  </b><span class="float-right">{{ Carbon\Carbon::parse($anuncio->validade)->format('d-M-Y') }}</span></p>
            <p><b>Email:  </b><span class="float-right"><a href="mailto:{{ $anuncio->email }}">{{ $anuncio->email }}</a></span></p>
            <hr>
              <p><a href="/register">Cria uma conta</a> ou faz <a href="/login">login</a> para candidatar-se </p>
          </div>

          <div class="card m-b-30 card-body">
            <h2 class="detalhesC">Sobre o Recrutador</h2>
            <p>Anonimo</p>
          </div>
        </div>
          <!-- end anuncios section -->

        </div>
        <!-- end page title end breadcrumb -->
                <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

@endsection

<script>



function dateHelper(date){
           var mySQLDate = date;
           var date= new Date(Date.parse(mySQLDate.replace(/-/g, '/')));

           var day = ("0" + date.getDate()).slice(-2);
           var month = ("0" + (date.getMonth() + 1)).slice(-2);

           return date.getFullYear()+"-"+month+"-"+day
       }
</script>
