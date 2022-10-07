@extends('layouts.appmain')
@section('title')
Denuncia |
@endsection
@section('content')

<div class="wrapper">
    <div class="container-fluid">
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

      <!-- Page-Title -->
      <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <div class="row align-items-center">
                      <div class="col-md-12">
                         <div class="esquerda">
                            <span><h4 class="page-title m-0">Perfil do Motorista</h4></span>
                         </div>
                          <section class="navega">
                          <div class="direita">
                            <span><a href="/admin" >Dashboard</a></span> |
                            <span><a href="/bd-motoristas" >Base de dados Motoristas</a></span> |
                            <span>Perfil do Motorista<a href="#"></a><span>
                           </div>
                          </section>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- end page title end breadcrumb -->

        <div class="row meu-curriculum">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                      <h4 class="mt-0 header-title mb-4 text-center">Motorista Denunciado </h4>
                        <div class="text-center">
                            <div class="social-source-icon lg-icon mb-3">
                                <img src="/assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle width-100">
                            </div>
                            <h5 class="font-16"><a href="#" class="text-dark">{{ ucfirst($denuncia->nome) }}</a></h5>
                            <br>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                              <p><b>Género: </b>{{ $denuncia->sexo }}</p>
                              <p><b>Celular: </b>{{ $denuncia->celular }}</p>
                              <p><b>Email: </b>{{ $denuncia->email }}</p>
                              <p><b>Grau académico: </b>{{ $denuncia->grau_academico }}</p>
                              <p><b>Habilitacao de condução: </b>{{ $denuncia->categoria }}</p>
                              <p><b>Número da carta de ondução: </b>{{ $denuncia->numero_carta_conducao }}</p>
                              <p><b>Data de nascimento: </b>{{ Carbon\Carbon::parse($denuncia->datanascimento)->format('d-M-Y') }}</p>
                              <p><b>Nacionalidade: </b>{{ $denuncia->nacionalidade }}</p>
                              <p><b>Residência: </b>{{ $denuncia->endereco }}</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                      <h4 class="mt-0 header-title mb-4 text-center">Denunciante </h4>
                        <div class="text-center">
                            <div class="social-source-icon lg-icon mb-3">
                                <img src="/assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle width-100">
                            </div>
                            <h5 class="font-16"><a href="#" class="text-dark">{{ ucfirst($denuncia->nome) }}</a></h5>
                            <br>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-12">
                            <p><b>Celular: </b>{{ $denuncia->celular }}</p>
                            <p><b>Email: </b>{{ $denuncia->email }}</p>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="mt-0 header-title mb-4">Curriculum Vitae <span class="float-right"><button  class="btn btn-secondary btn-sm waves-effect waves-light"> CURRICULUM PDF &nbsp;<i class="dripicons-download"></i></button></span></h4>-->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Perfil profissional

                                </h4>
                                <p><b>Nome completo: </b>{{ ucfirst($denuncia->nome) }}</p>
                                <p><b>Celular: </b>{{ $denuncia->celular }}</p>
                                <p><b>Grau Académico: </b>{{ $denuncia->grau_academico }}</p>
                                <p><b>Habilitacao de Condução: </b>{{ $denuncia->categoria }}</p>
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Dados pessoais

                                </h4>
                                <p><b>Data de nascimento: </b>{{ Carbon\Carbon::parse($denuncia->datanascimento)->format('d-M-Y') }}</p>
                                <p><b>Género: </b>{{ $denuncia->sexo }}</p>
                                <p><b>Nacionalidade: </b>{{ $denuncia->nacionalidade }}</p>
                                <p><b>Residência: </b>{{ $denuncia->endereco }}</p>

                            </div>

                          </div>

                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Contactos
                                </h4>
                                <p><b>N° Telefone: </b>{{ $denuncia->celular }}</p>
                                <p><b>N° Telefone Alternativo: </b>{{ $denuncia->telefone_alt }}</p>
                                <p><b>Email: </b>{{ $denuncia->email }}</p>
                            </div>
                          </div>


                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
            <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

@endsection
