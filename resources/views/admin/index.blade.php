@extends('layouts.appmain')
@section('title')
Base de Dados de Motoristas |
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
          <!-- fitros section -->
          <div class="col-md-12 m_filtro_nav">
            <div class="form-group mt-3 row">
                <div class="col-sm-4">
                    <input class="form-control" type="text" id="keyword"  name="keyword" placeholder="Pesquisa...">
                </div>
                <div class="col-sm-3">
                    <select class="form-control">
                        <option value="null">Categoria</option>
                        <option>A-Motociclo</option>
                        <option>B-Ligeiro</option>
                        <option>C-Pesado</option>
                        <option>G-Profissional</option>
                        <option>P-Serviços Públicos</option>
                      </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control">
                        <option>Localização</option>
                        <option>Maputo</option>
                        <option>Gaza</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-info waves-effect waves-light w-100">Filtrar</button>
                </div>
            </div>
          </div>
          <!-- end fitros section -->
          <!-- anuncios section -->
          <div class="col-md-12 mt-4 m_bd_motoristas">
            <div class="row">
              <div class="col-md-12">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="row perfil">
                          <div class="col-md-4">
                            <img src="{{asset('/assets/images/users/Ellipse.png')}}" class="rounded-circle"/>
                            <span class="nome_motoritsa"><a href="/perfil">Matio Fernando Tambu</a></span>
                          </div>
                          <div class="col-md-4">
                            <p>Categoria de Carta: <b>G - Profissional</b></p>
                            <p>Anos de Experiência: <b> 5</b></p>
                          </div>
                          <div class="col-md-4">
                            <p>Contacto: <b> +258 84 64 ***** </b></p>
                            <p>Localização: <b> Tete</b></p>
                          </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="row perfil">
                          <div class="col-md-4">
                            <img src="{{asset('/assets/images/users/Ellipse.png')}}" class="rounded-circle"/>
                            <span class="nome_motoritsa"><a href="/perfil">Matio Fernando Tambu</a></span>
                          </div>
                          <div class="col-md-4">
                            <p>Categoria de Carta: <b>G - Profissional</b></p>
                            <p>Anos de Experiência: <b> 5</b></p>
                          </div>
                          <div class="col-md-4">
                            <p>Contacto: <b> +258 84 64 ***** </b></p>
                            <p>Localização: <b> Tete</b></p>
                          </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="row perfil">
                          <div class="col-md-4">
                            <img src="{{asset('/assets/images/users/Ellipse.png')}}" class="rounded-circle"/>
                            <span class="nome_motoritsa"><a href="/perfil">Matio Fernando Tambu</a></span>
                          </div>
                          <div class="col-md-4">
                            <p>Categoria de Carta: <b>G - Profissional</b></p>
                            <p>Anos de Experiência: <b> 5</b></p>
                          </div>
                          <div class="col-md-4">
                            <p>Contacto: <b> +258 84 64 ***** </b></p>
                            <p>Localização: <b> Tete</b></p>
                          </div>
                        </div>
                    </div>
                </div>
              </div>

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
