<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title') portaldoconcurso.com</title>

        <meta name="description" content="O portal de oportunidade emprego, estágio, freelance (Biscato) em Moçambique">
        <meta name="keywords" content="portal concurso, emprego, jobs, estagio, estágio,  concursos, moçambique, negócio, oportunidade, serviço, mozambique, maputo, contratação, higiene, limpeza, informática, carro, transporte, automoveis, turismo, manutenção, reparação">
        <meta content="Luzépio Joaquim Nhachengo" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- morris css -->
      <!--  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}"> -->

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('assets/css/searchbar.css')}}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        @yield('styles')
    </head>

    <body>

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <div class="header-bg" >
            <!-- Navigation Bar-->
            <header id="topnav" >
                <div class="topbar-main"  style="background: #FF4360">
                    <div style="background: #FF4360" class="container-fluid">
                      <!-- Logo-->
                      <div>
                          <a href="/" class="logo" >
                              <!-- <img src="{{asset('assets/images/logo.png')}}" alt="logo portaldoconcurso" height="26"> -->
                              Motorista
                          </a>
                      </div>
                      <!-- End Logo-->

                      <div class="menu-extras topbar-custom navbar p-0">
                          <!-- Search input -->

                          <ul class="list-inline ml-auto mb-0">

                            <li class="list-inline-item dropdown notification-list nav-user">
                                <a class="nav-link" href="/basedadosMotorista">
                                  <i class="bi bi-car-front"></i>&nbsp;Base de dados de Motorista
                                </a>
                            </li>

                            <li style="margin-right: 250px" class="list-inline-item dropdown notification-list nav-user">
                                <a class="nav-link" href="/centralRisco">
                                  <i class="bi bi-sign-stop-fill"></i>&nbsp;Central de Risco de Motoristas
                                </a>
                            </li>


                              <!-- User-->
                              @guest
                              <li class="list-inline-item dropdown notification-list">
                                  <a class="nav-link" href="/login">
                                    <i class="dripicons-user"></i>&nbsp; Candidato
                                  </a>
                              </li>
                              <li class="list-inline-item dropdown notification-list nav-user">
                                  <a class="nav-link" href="/login">
                                    <i class="fas fa-hospital"></i>&nbsp;Recrutador
                                  </a>
                              </li>

                              @else
                                @if(Auth::user()->privilegio == 'recrutador')
                                  <li class="list-inline-item dropdown notification-list nav-user">
                                      <a class="nav-link" href="/recrutador">
                                        <i class="fas fa-hospital"></i>&nbsp;Recrutador
                                      </a>
                                  </li>
                                @endif
                                @if(Auth::user()->privilegio == 'candidato')
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link" href="/candidato">
                                      <i class="dripicons-user"></i>&nbsp; Candidato
                                    </a>
                                </li>
                                @endif

                              <li class="list-inline-item dropdown notification-list nav-user">
                                  <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                  aria-haspopup="false" aria-expanded="false">
                                    <!--  <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle"> -->
                                      <span class="d-none d-md-inline-block ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                  <!--    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                      <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                      <a class="dropdown-item" href="#"><span class="badge badge-success float-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
                                      <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                                      <div class="dropdown-divider"></div> -->
                                      <a class="dropdown-item" href="/logout"><i class="dripicons-exit text-muted"></i> Logout</a>
                                  </div>
                              </li>

                              @endguest

                              <li class="menu-item list-inline-item">
                                  <!-- Mobile menu toggle-->
                                  <a class="navbar-toggle nav-link">
                                      <div class="lines">
                                          <span></span>
                                          <span></span>
                                          <span></span>
                                      </div>
                                  </a>
                                  <!-- End mobile menu toggle-->
                              </li>

                          </ul>

                      </div>
                      <!-- end menu-extras -->

                        <div class="clearfix"></div>

                    </div> <!-- end container -->
                </div>
                <!-- end topbar-main -->

          </header>
            <!-- End Navigation Bar-->

        </div>
        <!-- header-bg -->

        @yield('content')

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © Copyright 2020 - Portal do Concurso. Todos os Direitos Reservados
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

        <!--Morris Chart
       <script src="{{asset('plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
-->
        <!-- dashboard js -->
    <!--   <script src="{{asset('assets/pages/dashboard.int.js')}}"></script> -->

       <!-- Required datatable js -->
       <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
       <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

       <!-- Buttons examples -->
       <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
       <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.colVis.min.js')}}"></script>

       <!-- Responsive examples -->
       <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
       <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

       <!-- Datatable init js -->
       <script src="{{asset('assets/pages/datatables.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>

        <!-- google maps api -->
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyA_NTMHZDMlgP99BvsMJvrzd31pni_5yz0"></script>
        <!-- Gmaps file -->
        <script src="{{asset('plugins/gmaps/gmaps.min.js')}}"></script>
        <!-- demo codes -->


        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_NTMHZDMlgP99BvsMJvrzd31pni_5yz0"></script> -->
        <script>

        $(".escolar").hide();
        $(".tecnico").hide();
        $(".superior").hide();

        $('#nivel_de_ensino').on('change', function() {

          if(this.value === 'Escolar') {
            $(".escolar").show();
          } else {
            $(".escolar").hide();
          }

          if(this.value === 'Tecnico-Profissional') {
            $(".tecnico").show();
          } else {
            $(".tecnico").hide();
          }

          if(this.value === 'Superior') {
            $(".superior").show();
          } else {
            $(".superior").hide();
          }


        });

        $(".info-utente").click(function (e) { // get dados pessoais do utente
            e.preventDefault();
            $(".sp-loading").show();
            $(".contentUtente").load($(this).attr('href'));
            $(".sp-loading").hide();
        });

        </script>

        @yield('scripts')
    </body>

</html>
