@extends('layouts.appmain')
@section('title')
Área do Candidato |
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
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Área do Candidato</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
          <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Estado do meu CV <span class="float-right"><a href="/meu-cv" class="btn btn-info btn-sm waves-effect waves-light">Editar</a></span></h4>
                    <div class="text-center">
                        <div class="social-source-icon lg-icon mb-3">
                            <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle width-100">
                        </div>
                        <h5 class="font-16"><a href="#" class="text-dark">{{ ucfirst(Auth::user()->name) }}</a></h5>
                        <p class="text-center"><b>Celular: {{ Auth::user()->celular }}</b></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ $progress }}%</div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                          <p>Dados pessoais <span><i class="dripicons-checkmark float-right text-success"></i></span></p>
                          <p>Contactos <span><i class="dripicons-checkmark float-right text-success"></i></span></p>
                          <p>Formações @if(sizeof($formacoes) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                          <p>Experiências @if(sizeof($experiencias) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                          <p>Conhecimentos @if(sizeof($conhecimentos) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                          <p>Idiomas @if(sizeof($idiomas) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                          <p>Documentos @if(sizeof($documentos) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Candidaturas</h4>
                    <div class="latest-massage minhas-candidaturas">
                      <ul>

                        <li><a href="/anuncio/#">titulo candidatura</a></li>

                      </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Mensagens</h4>
                    <div class="latest-massage">
                        <p class="text-center">Nenhuma Mensagem!</p>
                    </div>

                </div>
            </div>

        </div>
        <!-- end col -->



        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->


@endsection
