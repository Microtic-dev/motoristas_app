@extends('layouts.appmain')
@section('title')
Titulo de anuncio |
@endsection
@section('content')
@php
 use Carbon\Carbon;
@endphp

<div class="wrapper">
    <div class="container-fluid homepage">
      <div class="container">


      </div>

        <!-- Page-Title -->
        <div class="row">
          <!-- fitros section -->

          <!-- end fitros section -->
          <!-- anuncios section -->
          <div class="col-md-12 mt-4 m_anunicios_home">
            <div class="row">

              <form action="/denunciarMotorista" method="post">
                  @csrf
                <button type="submit" class="btn primary">Cadastrar</button
              </form>

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
