@extends('layouts.appmain')
@section('title')
Base de Dados de Motoristas |
@endsection
@section('content')
@php
 use Carbon\Carbon;
@endphp

<div class="wrapper">
    <div class="container-fluid">
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
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Dashboard</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Motoristas</h6>
                            <h4 class="mb-3 mt-0 float-right">{{ $countMotoritas }}</h4>
                        </div>
                        <div>
                            <span class="badge badge-light text-info"> 0 </span> <span class="ml-2">Do período anterior</span>
                        </div>
                      </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-info mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Central de Risco</h6>
                            <h4 class="mb-3 mt-0 float-right">{{ $countCentralRisco }}</h4>
                        </div>
                        <div>
                            <span class="badge badge-light text-info"> 29 </span> <span class="ml-2">Do período anterior</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-pink mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Empregadores</h6>
                            <h4 class="mb-3 mt-0 float-right">{{ $countEmpregador }}</h4>
                        </div>
                        <div>
                            <span class="badge badge-light text-primary"> 0 </span> <span class="ml-2">Do período anterior</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Vagas</h6>
                            <h4 class="mb-3 mt-0 float-right">{{ $countAnuncios }}</h4>
                        </div>
                        <div>
                            <span class="badge badge-light text-info"> 8 </span> <span class="ml-2">Dentro de validade</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Motoristas</h4>
                        <div class="latest-massage">

                          @foreach($motoristas as $motorista)
                            <a href="#" class="latest-message-list ">
                                <div class="border-bottom position-relative mt-3">
                                    <div class="float-left user mr-3">
                                        <h5 class="bg-primary text-center rounded-circle text-white mt-0">{{$motorista->name[0]}}</h5>
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">{{ $motorista->provincia }}</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">{{$motorista->name}}</h5>
                                        <p class="text-muted">{{$motorista->categoria}}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach



                        </div>
                        <hr>
                        <div class="text-center mt-3">
                          <a href="/bd-motoristas">ver mais</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end col -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Central de Risco</h4>
                        <div class="latest-massage">
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom position-relative">
                                    <div class="float-left user mr-3">
                                        <h5 class="bg-primary text-center rounded-circle text-white mt-0">v</h5>
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">Just Now</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Victor Zamora</h5>
                                        <p class="text-muted">Hey! there I'm available...</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <h5 class="bg-success text-center rounded-circle text-white mt-0">p</h5>
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">2 Min. ago</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Patrick Beeler</h5>
                                        <p class="text-muted">I've finished it! See you so...</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle mb-3">
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">6 Min. ago</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Ralph Ramirez</h5>
                                        <p class="text-muted">This theme is awesome!</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <h5 class="bg-pink text-center rounded-circle text-white mt-0">b</h5>
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">01:34 pm</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Bryan Lacy</h5>
                                        <p class="text-muted">I've finished it! See you so...</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle mb-3">
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">02:05 pm</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">James Sorrells</h5>
                                        <p class="text-muted">Hey! there I'm available...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <hr>
                        <div class="text-center mt-3">
                          <a href="/centralRisco">ver mais</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end col -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Empregadores</h4>
                        <div class="latest-massage">
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom position-relative">
                                    <div class="float-left user mr-3">
                                        <h5 class="bg-primary text-center rounded-circle text-white mt-0">v</h5>
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">Just Now</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Victor Zamora</h5>
                                        <p class="text-muted">Hey! there I'm available...</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <h5 class="bg-success text-center rounded-circle text-white mt-0">p</h5>
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">2 Min. ago</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Patrick Beeler</h5>
                                        <p class="text-muted">I've finished it! See you so...</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle mb-3">
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">6 Min. ago</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Ralph Ramirez</h5>
                                        <p class="text-muted">This theme is awesome!</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <h5 class="bg-pink text-center rounded-circle text-white mt-0">b</h5>
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">01:34 pm</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Bryan Lacy</h5>
                                        <p class="text-muted">I've finished it! See you so...</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="latest-message-list">
                                <div class="mt-3 position-relative">
                                    <div class="float-left user mr-3">
                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle mb-3">
                                    </div>
                                    <div class="message-time">
                                        <p class="m-0 text-muted">02:05 pm</p>
                                    </div>
                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">James Sorrells</h5>
                                        <p class="text-muted">Hey! there I'm available...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <hr>
                        <div class="text-center mt-3">
                          <a href="/empregadores">ver mais</a>
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
