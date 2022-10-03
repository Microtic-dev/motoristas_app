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

            <form method="GET" action="{{ route('search') }}">
            @csrf
            <div class="form-group mt-3 row">
                <div class="col-sm-4">
                    <input class="form-control" type="text" id="keyword"  name="keyword" placeholder="Pesquisa...">
                </div>
                <div class="col-sm-3">

                    <select name=categoria for="categoria" class="form-control">
                      @foreach ($categorias as $categoria)
                        @if($categoria_id!=null)
                        @if($categoria->id==$categoria_id)
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                        @endif
                        @e    ndif
                      @endforeach

                        @foreach ($categorias as $categoria)
                          <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                        @endforeach
                      </select>

                </div>
                <div class="col-sm-3">

                    <select name=provincia for="provincia" class="form-control">
                         <option value="null">Localização</option>
                        @foreach ($provincias as $provincia)
                          <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info waves-effect waves-light w-100">Filtrar</button>
                </div>
            </div>

            	</form>

          </div>
          <!-- end fitros section -->
          <!-- anuncios section -->
          <div class="col-md-12 mt-4 m_anunicios_home">
            <div class="row">

              @foreach ($anuncios as $anuncio)
              <div class="col-md-3">
                <div class="card m-b-30">
                      <div class="card-body">
                        <div class="imagem">
                          <img src="{{ asset('/assets/images/logoRectangle.png' )}}" class="img-fluid"/>
                        </div>
                        <h4 class="mt-4"><a href="/anuncio/{{$anuncio->id}}">{{ $anuncio->titulo }}</a></h4>
                          <p>

                            @php
                             global $i, $prov;
                             $i = 0;

                            @endphp

                          @foreach ($anuncios_provincias as $anuncio_provincia)
                            @if($anuncio_provincia->anuncio_id==$anuncio->id)
                                @foreach ($provincias as $provincia)
                                  @if($anuncio_provincia->provincia_id==$provincia->id)

                                  @php
                                   $i++;
                                   $prov = $provincia->name;
                                  @endphp

                                  @endif
                                @endforeach
                            @endif
                          @endforeach

                          @if($i>1)
                             Varios locais
                          @else
                            {{ $prov }}
                          @endif
                           </p>

                    </div>
                </div>
              </div>
              @endforeach

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
