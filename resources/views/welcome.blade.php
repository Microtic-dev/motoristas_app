@extends('layouts.appmain')
@section('title')
Oportunidade de emprego, consultoria e prestação  de serviço |
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
          <div class="col-md-2 postedCat">

          <h2 class="mt-4">Tipo</h2>
          <ul>
            <li><a href="/tipo/trabalho">Trabalho</a></li>
            <li><a href="/tipo/Prestação de Serviço">Prestação de Serviço</a></li>
            <li><a href="/tipo/consultoria">Consultoria</a></li>
          </ul>
            <h2 class="mt-4">Local</h2>
            @php $provincias = \App\Models\Provincias::all(); @endphp
            <ul>
             @foreach ($provincias as $key => $provincia)
             <li><a href="/provincia/{{ $provincia->provincia }}">{{ ucfirst($provincia->provincia) }}</a></li>
             @endforeach
           </ul>

           <h2 class="mt-4">Categoria</h2>
           @php $categorias = \App\Models\Categorias::all(); @endphp
           <ul>
            @foreach ($categorias as $key => $categoria)
            <li><a href="/categoria/{{ $categoria->url }}">{{ ucfirst($categoria->categoria) }}</a></li>
            @endforeach
          </ul>

          </div>
          <div class="col-md-7 postedList">
              <div class="page-title-box">
                  <div class="row">
                      <div class="col-md-12">
                        @if(isset($cat))
                        <section class="navegador">
                          <span>Categoria: <a href="/categoria/{{ $cat->url }}">{{ ucfirst($cat->categoria) }}</a></span>
                        </section>
                        @endif
                        @if(isset($prov))
                        <section class="navegador">
                          <span>Província: <a href="/provincia/{{ $prov->provincia }}">{{ ucfirst($prov->provincia) }}</a></span>
                        </section>
                        @endif
                        @if(isset($tipo))
                        <section class="navegador">
                          <span>Tipo: <a href="/tipo/{{ $tipo }}">{{ ucfirst($tipo) }}</a></span>
                        </section>
                        @endif
                        <div class="card m-b-30 card-body">
                          <ul>


                          </ul>
                        </div>

                      </div>
                  </div>

              </div>
          </div>
          <div class="col-md-3">
            <div class="postedRelAdsFirst">
            <section class="pub">Pub</section>
              <a href="https://www.altodegrau.com/" target="_blank">
                <img src="{{asset('assets/images/pub.jpg')}}" class="img-responsive" border="0">
              </a>
            </div>
          </div>

        </div>
        <!-- end page title end breadcrumb -->
                <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

@endsection
