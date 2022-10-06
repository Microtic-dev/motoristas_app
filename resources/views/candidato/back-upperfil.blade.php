@extends('layouts.appmain')
@section('title')
Perfil |
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

          <!-- perfil do motorista section -->
          <div class="col-md-12 mt-4 m_pefil_motorista">
            <div class="row">
              <div class="col-md-12">
                <section class="col-md-12 navega">
                  <span><a href="/admin"> Dashboard</a></span> |
                  <span><a href="/bd-motoristas">Base de dados de Motoristas</a></span> |
                  <span><a href="#">Perfil</a></span>
                </section>

                <div class="card mt-4 m-b-30">
                      <div class="card-body">
                        <div class="row perfil">
                          <div class="col-md-6">
                            <img src="{{asset('/assets/images/users/Ellipse.png')}}" class="rounded-circle"/>
                            <span class="nome_motoritsa"><a href="#">{{ $motorista->nome }}</a></span>
                          </div>
                          <div class="col-md-6">
                            <p>Contacto: <b> +258 84 64 ***** ; +258 87 64 ***** </b></p>
                            <p>email: <b> {{$motorista->email}}</b></p>
                          </div>
                        </div>
                        <section class="navega"></section>
                        <div class="row detalhes_perfil">
                          <div class="col-md-6">
                            <div class="card m-b-30">
                              <div class="card-body">
                                <h4 class="card-title font-16 mt-0"><i class="dripicons-user"></i> Dados Pessoais</h4>
                                <p>Data de Nascimento: <span class="float-right">25/08/1988</span></p>
                                <p>Género: <span class="float-right"> Masculino</span></p>
                                <p>Nacionalidade: <span class="float-right">Mocambicano</span></p>
                                <p>Residência: <span class="float-right">{{$motorista->endereco}}</span></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card m-b-30">
                              <div class="card-body">
                                <h4 class="card-title font-16 mt-0"><i class="dripicons-user-id"></i> Carta de Condução</h4>
                                <p>Número: <span class="float-right">21988</span></p>
                                <p>Categoria: <span class="float-right"> C - Pesado</span></p>
                                <p>Valido até: <span class="float-right">25/12/2025</span></p>
                                <p>&nbsp;</p>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="card m-b-30">
                              <div class="card-body">
                                <h4 class="card-title font-16 mt-0"><i class="dripicons-suitcase"></i> Experiência Profissional </h4>
                                  <ul>
                                    <li>Transporte passageiro </li>
                                    <li>Ubano/Interdistrital/interprovincial </li>
                                    <li>Transpor de carga- Logo curso/praça </li>
                                    <li>Transporte de Taxi </li>
                                    <li>Transporte particular </li>
                                    <li>Transporte Executivo  </li>
                                    <li>Motociclistas </li>
                                  </ul>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="card m-b-30">
                              <div class="card-body">
                                <h4 class="card-title font-16 mt-0"><i class="dripicons-web"></i> Portugues ,Ingles </h4>
                                  <p>Portugues ,Ingles</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>

            </div>
          </div>
          <!-- end perfil do motorista section -->

        </div>
        <!-- end page title end breadcrumb -->
                <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

@endsection
