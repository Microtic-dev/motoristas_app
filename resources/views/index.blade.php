@extends('layouts.appmain')
@section('title')
Motoristas |
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
                        @foreach ($categorias as $categoria)
                          <option>{{$categoria->categoria}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control">
                         <option>Localização</option>
                        @foreach ($provincias as $provincia)
                          <option>{{ $provincia->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-info waves-effect waves-light w-100">Filtrar</button>
                </div>
            </div>
          </div>
          <!-- end fitros section -->
          <!-- anuncios section -->
          <div class="col-md-12 mt-4 m_anunicios_home">
            <div class="row">
              <div class="col-md-3">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="imagem">
                          <img src="{{asset('/assets/images/logo_dark.png')}}" class="img-fluid"/>
                        </div>
                        <h4 class="mt-4"><a href="/anuncio/">Motoristas Particular</a></h4>
                        <p>Maputo</p>
                    </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="imagem">
                          <img src="{{asset('/assets/images/logo.png')}}" class="img-fluid"/>
                        </div>
                        <h4 class="mt-4"><a href="/anuncio/">Motoristas Particular</a></h4>
                        <p>Sofala</p>
                    </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="imagem">
                          <img src="{{asset('/assets/images/Rectangle9.png')}}" class="img-fluid"/>
                        </div>
                        <h4 class="mt-4"><a href="/anuncio/">Motoristas Particular</a></h4>
                        <p>Cabo Delgado</p>
                    </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="imagem">
                          <img src="{{asset('/assets/images/tpm.jpeg')}}" class="img-fluid"/>
                        </div>
                        <h4 class="mt-4"><a href="/anuncio/">Motoristas Particular</a></h4>
                        <p>Sofala</p>
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
