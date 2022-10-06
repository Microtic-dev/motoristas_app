@extends('layouts.appmain')
@section('title')
Perfil do Motorista - {{ $candidato->nome }} |
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
                        <div class="text-center">
                            <div class="social-source-icon lg-icon mb-3">
                                <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle width-100">
                            </div>
                            <h5 class="font-16"><a href="#" class="text-dark">{{ ucfirst($candidato->nome) }}</a></h5>
                            <p class="text-center"><b>Celular: {{ $candidato->celular }}</b></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ $progress }}%</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                              <p>Dados pessoais <span><i class="dripicons-checkmark float-right text-success"></i></span></p>
                              <p>Contactos <span><i class="dripicons-checkmark float-right text-success"></i></span></p>
                              <p>Experiências @if(sizeof($experiencias) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                              <p>Idiomas @if(sizeof($idiomas) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                              <p>Documentos @if(sizeof($documentos) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>

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
                                <p><b>Nome completo: </b>{{ ucfirst($candidato->nome) }}</p>
                                <p><b>Celular: </b>{{ $candidato->celular }}</p>
                                <p><b>Grau Académico: </b>{{ $candidato->grau_academico }}</p>
                                <p><b>Habilitacao de Condução: </b>{{ $candidato->categoria }}</p>

                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Dados pessoais

                                </h4>
                                <p><b>Data de nascimento: </b>{{ Carbon\Carbon::parse($candidato->datanascimento)->format('d-M-Y') }}</p>
                                <p><b>Género: </b>{{ $candidato->sexo }}</p>
                                <p><b>Nacionalidade: </b>{{ $candidato->nacionalidade }}</p>
                                <p><b>Residência: </b>{{ $candidato->endereco }}</p>


                            </div>

                          </div>

                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Contactos
                                </h4>
                                <p><b>N° Telefone: </b>{{ $candidato->celular }}</p>
                                <p><b>N° Telefone Alternativo: </b>{{ $candidato->telefone_alt }}</p>
                                <p><b>Email: </b>{{ $candidato->email }}</p>
                            </div>


                          </div>


                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Experiências
                                </h4>
                                @if(sizeof($experiencias) < 1)
                                <p class="card-text text-warning">Nenhuma Experiência cadastrada</p>
                                @else
                                <ul>
                                  @foreach ($experiencias as $key => $experiencia)
                                    <li>
                                      <div>
                                        <h4 class="experiencia-empresa">{{ $experiencia->empresa }}</h4>
                                          @php
                                            $startDate = \Carbon\Carbon::parse($experiencia->inicio);
                                            $endDate = \Carbon\Carbon::parse($experiencia->fim);
                                            $diff = $startDate->diffInYears($endDate);
                                          @endphp
                                        <p class="text-muted">{{ $experiencia->cargo }} - {{ Carbon\Carbon::parse($experiencia->inicio)->format('M-Y') }}
                                           @if($experiencia->trabalha_ate_agora == 'Sim')até agora @else até {{ Carbon\Carbon::parse($experiencia->fim)->format('M-Y') }} @endif
                                           @if($diff <= 0)  @else ( {{ $diff }} anos ) @endif
                                          </p>
                                        <p>{{ $experiencia->actividades_exercidas }}</p>
                                        <hr>
                                      </div>

                                    </li>
                                  @endforeach

                                </ul>
                                @endif


                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Idiomas
                                </h4>
                                @if(sizeof($idiomas) < 1)
                                <p class="card-text text-warning">Nenhum idioma cadastrado</p>
                                @else
                                <ul>
                                  @foreach ($idiomas as $key => $idioma)
                                    <li><span class="text-info">*</span> {{ $idioma->idioma }} - {{ $idioma->nivel }}</li>
                                  @endforeach

                                </ul>
                                @endif

                            </div>

                          </div>

                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Documentos
                                </h4>
                                @if(sizeof($documentos) < 1)
                                <p class="card-text text-warning">Nenhum documento carregado</p>
                                @else
                                <ul>
                                  @foreach ($documentos as $key => $documento)
                                    <li><span class="text-info">*</span> <a href="/{{ $documento->ficheiro }}" target="_blank"> {{ $documento->tipo }} </a></li>
                                  @endforeach

                                </ul>
                                @endif

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
